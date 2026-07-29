# SISKA Laravel — Docker Deployment Runbook

Everything needed to run the SISKA Laravel app alongside the existing nginx /
GeoServer / PostGIS containers on the `disbun` server. Replace `DOMAIN` with the
real hostname (e.g. `sawitkalteng.id`) and `<set-strong-password>` with real
secrets before applying.

---

## Architecture

Already running on the server (do **not** redefine these):

| Container       | Image                  | Network            | Role                         |
|-----------------|------------------------|--------------------|------------------------------|
| `nginx`         | `nginx:alpine`         | `webservice_default` | TLS termination, reverse proxy |
| `geoserver-db`  | `kartoza/postgis:15-3.3` | `geoserver_default` | PostGIS database             |
| `geoserver`     | `kartoza/geoserver:latest` | `geoserver_default` + `webservice_default` | WMS tiles |

Added by this setup:

| Container   | Image                  | Network                                      | Role            |
|-------------|------------------------|----------------------------------------------|-----------------|
| `siska-app` | `php:8.4-fpm-bookworm` (+ext) | `webservice_default` + `geoserver_default` | Laravel PHP-FPM |

- nginx terminates HTTPS, serves static files from `public/`, and `fastcgi_pass`es `.php` to `siska-app:9000`.
- `siska-app` reaches PostGIS at `geoserver-db:5432` (same network) and is reached by nginx (same network).
- App code is bind-mounted at `/home/disbun/larasiska` → `/var/www/html` (read-write in app, read-only in nginx). `git pull` on the host is instantly visible to both — no image rebuild for code changes.

---

## Repo files (versioned, deployed via the workflow)

- `Dockerfile` — PHP-FPM image (Debian bookworm + extensions + composer).
- `docker-compose.yml` — the `siska-app` service joining two external networks.
- `.dockerignore` — keeps secrets/build/deploy files out of the image context.
- `.github/workflows/deploy.yml` — push-to-main + manual SSH deploy.

### `Dockerfile`
Debian (not Alpine) base — Alpine hit a partial repo index on the server. The
image runs FPM as `www-data` (**uid 33 on Debian** — see Storage perms below).

```dockerfile
FROM php:8.4-fpm-bookworm

RUN apt-get update && apt-get install -y --no-install-recommends \
        libpq-dev libpng-dev libzip-dev libicu-dev unzip \
    && docker-php-ext-install pdo_pgsql pdo_mysql gd zip bcmath intl opcache \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
```

### `docker-compose.yml` (the app service)
`geoserver-db` is in a different compose project, so it's referenced as an
external network (no `depends_on` across projects — start `geoserver-db` first).

```yaml
services:
  app:
    build: .
    container_name: siska-app
    restart: unless-stopped
    working_dir: /var/www/html
    volumes:
      - /home/disbun/larasiska:/var/www/html
    networks:
      - webnet
      - dbnet

networks:
  webnet:
    external: true
    name: webservice_default     # nginx lives here -> fastcgi_pass app:9000
  dbnet:
    external: true
    name: geoserver_default       # geoserver-db lives here -> DB_HOST=geoserver-db
```

---

## nginx server block — managed on the server (NOT in the repo)

The repo's `docker/` folder was removed from history. The nginx config lives
directly on the server at `/home/disbun/webservice/nginx/conf.d/siska.conf`
(that dir is mounted read-only into the nginx container as `/etc/nginx/conf.d`).

### `siska.conf`
Hardened Laravel block. Key points: `fastcgi_pass app:9000`, only `index.php`
may execute, `/vendor/` is **not** blocked (Livewire publishes to
`public/vendor/livewire`), `/.well-known/acme-challenge/` stays reachable for
certbot renewals.

```nginx
# Replace DOMAIN with your hostname. First-time cert bootstrap:
#   1. comment the whole `server { listen 443 ... }` block + the `return 301`
#   2. docker exec nginx nginx -s reload
#   3. docker exec certbot certbot certonly --webroot -w /var/www/certbot \
#        -d DOMAIN -m you@example.com --agree-tos --no-eff-email
#   4. uncomment both, docker exec nginx nginx -s reload

server {
    listen 80;
    listen [::]:80;
    server_name DOMAIN;

    location /.well-known/acme-challenge/ { root /var/www/certbot; }
    location / { return 301 https://$host$request_uri; }   # comment on first-time issuance
}

server {
    listen 443 ssl;
    listen [::]:443 ssl;
    http2 on;
    server_name DOMAIN;
    root /var/www/html/public;
    index index.php;
    client_max_body_size 512M;

    ssl_certificate     /etc/letsencrypt/live/DOMAIN/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/DOMAIN/privkey.pem;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers HIGH:!aNULL:!MD5;
    ssl_prefer_server_ciphers off;
    ssl_session_cache shared:SSL:10m;
    ssl_session_timeout 1d;

    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header Referrer-Policy "strict-origin-when-cross-origin" always;
    add_header Strict-Transport-Security "max-age=63072000; includeSubDomains" always;
    server_tokens off;

    error_log  /var/log/nginx/siska-error.log;
    access_log /var/log/nginx/siska-access.log;

    location ~ /\.(?!well-known).* { deny all; access_log off; log_not_found off; }
    location ~* ^/(\.env|\.env\..*|composer\.(json|lock)|package\.json|artisan|phpunit\.xml|webpack\.mix\.js)$ { deny all; access_log off; log_not_found off; }
    # NOTE: `vendor` is NOT listed — Livewire assets live in public/vendor/livewire.
    location ~ ^/(app|bootstrap|config|database|resources|routes|tests)/ { deny all; access_log off; log_not_found off; }

    location / {
        index index.php;
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ^~ /storage/ {
        autoindex off;
        location ~* \.(php|phtml|phar|pht|phps|php3|php4|php5|php7|cgi|pl|py|sh|asp|aspx)$ { deny all; }
    }

    location = /index.php {
        try_files $uri =404;
        fastcgi_pass app:9000;
        fastcgi_index index.php;
        include /etc/nginx/fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_hide_header X-Powered-By;
        fastcgi_param APPLICATION_ENV production;
    }
    location ~ \.php$ { deny all; }
    location ~ /\.ht { deny all; }
    location = /favicon.ico { log_not_found off; access_log off; }
}
```

### nginx also needs the app code mounted (one-time)
Add this volume to the **existing** nginx service and recreate it (brief blip
for all sites on that nginx):
```yaml
    - /home/disbun/larasiska:/var/www/html:ro
```
```bash
cd /home/disbun/webservice && docker compose up -d --force-recreate nginx
```
Without this volume, nginx returns 404 for every static file (the request falls
through to Laravel, which has no route for `/build/...`).

---

## Database — PostGIS, not MySQL

The app was originally MySQL; it now runs on the existing PostGIS container.
The migrations are Postgres-clean (plain `id()` / `float` / `string` / `timestamps`).

### `.env` (server, `/home/disbun/larasiska/.env`)
```
APP_URL=https://DOMAIN
DB_CONNECTION=pgsql
DB_HOST=geoserver-db
DB_PORT=5432
DB_DATABASE=siskadb
DB_USERNAME=x
DB_PASSWORD=<postgres-pass>
```

### Create the `siskadb` database (one-time)
```bash
docker exec geoserver-db createdb -U x siskadb
```
(Or use the existing `gis` database — but then `users`/`tbsawit` share the
GeoServer spatial DB. A separate `siskadb` is cleaner.)

---

## Storage permissions — critical, and easy to get wrong

The FPM worker runs as `www-data`. On the **Debian** image that is **uid 33**
(Alpine's `www-data` is uid 82 — the cause of a `tempnam()` error when we
switched base). Storage must be owned by 33, and `chown` needs `sudo` because
prior `docker compose exec` runs created files as root.

```bash
cd /home/disbun/larasiska
sudo chown -R 33:33 storage bootstrap/cache
docker compose exec -T --user www-data app php artisan optimize:clear
docker compose restart app
```

The workflow runs `migrate`/`optimize:clear` as `--user www-data` too, so it
won't re-create root-owned cache files on the next deploy.

---

## Server bootstrap (one-time)

```bash
cd /home/disbun
git clone https://github.com/ultramenid/siska-laravel.git larasiska
cd larasiska
cp .env.example .env
# edit .env (see Database section above)

# storage perms
sudo chown -R 33:33 storage bootstrap/cache

# build + composer + frontend, all inside containers (host needs no PHP/Node)
docker compose build app
docker compose run --rm --no-deps app composer install --no-dev --optimize-autoloader --no-interaction
docker run --rm -v "$PWD:/app" -w /app node:20-alpine sh -c "npm ci && npm run build"

# start app, then key + migrate
docker compose up -d app
docker compose exec -T app php artisan key:generate
docker compose exec -T --user www-data app php artisan migrate --force
```

---

## GitHub Actions deploy (`.github/workflows/deploy.yml`)

Triggers: push to `main` + manual "Run workflow". Builds run **inside
containers** over SSH (host has no PHP/Node); artisan runs as `www-data`.

```yaml
name: Deploy
on:
  push:
    branches: [main]
  workflow_dispatch:
concurrency:
  group: deploy-production
  cancel-in-progress: false
jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - name: Deploy over SSH
        uses: appleboy/ssh-action@v1
        with:
          host: ${{ secrets.SSH_HOST }}
          username: ${{ secrets.SSH_USER }}
          password: ${{ secrets.SSH_PASSWORD }}
          port: ${{ secrets.SSH_PORT || 22 }}
          script: |
            set -e
            cd /home/disbun/larasiska
            git pull --ff-only
            docker compose build app
            docker compose run --rm --no-deps app composer install --no-dev --optimize-autoloader --no-interaction
            docker run --rm -v "$PWD:/app" -w /app node:20-alpine sh -c "npm ci && npm run build"
            docker compose up -d app
            docker compose exec -T --user www-data app php artisan migrate --force
            docker compose exec -T --user www-data app php artisan optimize:clear
            docker compose restart app
```

### GitHub secrets
`SSH_HOST`, `SSH_USER`, `SSH_PASSWORD` (password auth — consider a dedicated
deploy key later), `SSH_PORT` (optional, default 22).

### Server-side prerequisites
- Deploy user in the `docker` group: `sudo usermod -aG docker disbun`.
- Clone on `main`: `cd /home/disbun/larasiska && git checkout main`.
- After any history rewrite on `main`, the server clone diverges — reset it:
  `git fetch origin && git reset --hard origin/main` (safe: `.env`/`storage` are gitignored).

---

## GeoServer

### Networking — proxy by container name, not public IP
nginx's `geo.conf` should `proxy_pass http://geoserver:8080;` (internal port
8080, not the host-mapped 8600). For nginx to resolve `geoserver`, the
container must be on `webservice_default`:
```bash
docker network connect webservice_default geoserver   # quick, no restart
```
Durable: add `webservice_default` as an external network to the geoserver
compose (see below) and `docker compose up -d`.

### `geoserver/docker-compose.yml` (on the server, NOT in the repo)
```yaml
services:
  geoserver-db:
    image: kartoza/postgis:15-3.3
    container_name: geoserver-db
    environment:
      - POSTGRES_DB=gis
      - POSTGRES_USER=x
      - POSTGRES_PASS=<postgres-pass>
      - ALLOW_IP_RANGE=0.0.0.0/0
    volumes:
      - /home/disbun/geoserver/pg_data:/var/lib/postgresql
    ports: ["5432:5432"]
    restart: unless-stopped
    healthcheck:
      test: ["CMD-SHELL", "pg_isready -U docker -d gis"]
      interval: 10s
      timeout: 5s
      retries: 5
    networks: [default]

  geoserver:
    image: kartoza/geoserver:latest
    container_name: geoserver
    volumes:
      - /home/disbun/geoserver/geodata:/opt/geoserver/data_dir
    ports: ["8600:8080"]
    restart: unless-stopped
    depends_on:
      geoserver-db: { condition: service_healthy }
    environment:
      - INITIAL_MEMORY=2G
      - MAXIMUM_MEMORY=4G
      - GEOSERVER_ADMIN_PASSWORD=<set-strong-password>
      - JAVA_OPTS=-Dorg.geoserver.web.csp.strict=false
      - HTTPS_PROXY_NAME=geoserver.DOMAIN
      - HTTPS_PROXY_PORT=443
      - HTTP_SCHEME=https
    networks: [default, webnet]

networks:
  default:
    name: geoserver_default
  webnet:
    external: true
    name: webservice_default
```

### Rotate the GeoServer admin password
`GEOSERVER_ADMIN_PASSWORD` is applied **only on first init**; with an existing
`data_dir` a `.updatepassword.lock` skips it, so editing the env + recreating
does **not** change the running password. Rotate via the web UI:
`https://geoserver.DOMAIN/geoserver/web/` → Security → Users → admin → Edit →
new password → Save. Then update the env value in the compose to match.

### 429 Too Many Requests on WMS tiles
The GeoServer **Control Flow module** (`controlflow.properties` in the data
dir, no web UI) caps `wms.getmap` at 30/s — a map pan's tile burst trips it.
Raise the rate cap (keep the global concurrency limit):
```bash
sed -i 's#^user.ows.wms.getmap=30/s#user.ows.wms.getmap=500/s#' /home/disbun/geoserver/geodata/controlflow.properties
docker restart geoserver
```
If the map then loads but feels slow/sequential, raise the concurrency caps:
```bash
sed -i 's#^user=6#user=50#; s#^ip=10#ip=50#; s#^ows.wms.getmap=10#ows.wms.getmap=50#' /home/disbun/geoserver/geodata/controlflow.properties
docker restart geoserver
```

---

## Day-to-day operations

### Code update (normal deploy)
Handled automatically by the workflow on push to `main`. Manually:
```bash
cd /home/disbun/larasiska
git pull --ff-only
docker compose run --rm --no-deps app composer install --no-dev --optimize-autoloader --no-interaction
docker run --rm -v "$PWD:/app" -w /app node:20-alpine sh -c "npm ci && npm run build"
docker compose exec -T --user www-data app php artisan optimize:clear
docker compose restart app
```
No image rebuild — code is bind-mounted. The FPM `opcache` holds old bytecode
until restart, hence `restart app`.

### Image rebuild (only when `Dockerfile` changes)
```bash
docker compose up -d --build app
```

### nginx config change
```bash
nano /home/disbun/webservice/nginx/conf.d/<file>.conf
docker exec nginx nginx -t && docker exec nginx nginx -s reload
```

### Reload after adding a network volume to nginx
Recreate (brief downtime for all sites): `cd /home/disbun/webservice && docker compose up -d --force-recreate nginx`

---

## Troubleshooting

| Symptom | Cause | Fix |
|---|---|---|
| `tempnam(): file created in the system's temporary directory` | `storage/` not writable by FPM (uid 33) | `sudo chown -R 33:33 storage bootstrap/cache` + restart app |
| `429 Too Many Requests` on WMS tiles | GeoServer Control Flow `user.ows.wms.getmap=30/s` | raise to `500/s` in `controlflow.properties` + `docker restart geoserver` |
| `livewire.js 403 Forbidden` | nginx deny rule blocked `/vendor/` | remove `vendor` from the `^(app\|bootstrap\|...)` deny regex + reload |
| `host not found in upstream "app"` / `"geoserver"` | container not running or not on `webservice_default` | start it + `docker network connect webservice_default <name>` |
| Static files 404 but PHP works | nginx missing the code volume | add `/home/disbun/larasiska:/var/www/html:ro` to nginx + recreate |
| `git pull --ff-only` fails in workflow | server clone diverged (e.g. after history rewrite) | `git fetch origin && git reset --hard origin/main` on the server |
| `composer: not found` / `npm: not found` in workflow | host has no PHP/Node | builds run in containers via the workflow — only `git` + `docker` needed on host |
| `service "app" is not running` (exec) | app container exited | `docker compose up -d app`; check `docker compose logs app` |

---

## Notes / gotchas

- **`docker/` folder is not in the repo** (purged from history). nginx and
  geoserver configs are managed directly on the server. Don't commit them with
  secrets — keep passwords as env/placeholders.
- **`.env` is gitignored** and lives only on the server. `APP_KEY` is set via
  `php artisan key:generate` (one-time, never in the workflow — it would reset
  sessions/cookies every deploy).
- **`public/build/` is gitignored** and rebuilt each deploy inside a node container.
- **Debian vs Alpine uid**: `www-data` is 33 on Debian, 82 on Alpine. If you
  ever switch the base image back, re-chown storage to the new uid.
- **Two networks are required** for `siska-app`: `webservice_default` (nginx) and
  `geoserver_default` (DB). A container can't attach to the same network twice,
  so if nginx and geoserver-db ever share one network, use a single network instead.