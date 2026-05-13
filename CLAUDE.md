# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## CLAUDE.md maintenance

Keep this file current as the project evolves. Whenever you add, remove, or significantly change any of the following, update this file in the same change set:

- Technology stack, framework/library versions, build tools, package managers, or external services
- Common commands for setup, development, build, linting, testing, deployment, or running a single test
- High-level architecture, request/data flow, route organization, authentication/authorization model, or background jobs
- Major domain concepts, roles, permissions, business logic, database tables, seed data, or integrations
- Repository-specific conventions that future Claude Code sessions need to know

Do not update this file for trivial implementation details, one-off bug fixes, generated files, or file lists that are obvious from the repository tree. Prefer concise, durable guidance over chronological notes.

## Project overview

SISKA is a Laravel 9 / PHP 8.0+ application for plantation and palm-oil information in Kalimantan Tengah. It is primarily a Blade/Livewire app: Laravel routes render Blade pages, Livewire handles login and the interactive data table, and most charts/maps are inline JavaScript in Blade templates.

## Common commands

### Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

The default environment uses MySQL (`DB_CONNECTION=mysql`). Seeders currently do not populate domain data.

### Development

```bash
php artisan serve
npm run dev
```

Run the Laravel server and Vite dev server in separate terminals.

### Build

```bash
npm run build
```

### Tests

```bash
php artisan test
vendor/bin/phpunit
php artisan test --filter ExampleTest
vendor/bin/phpunit tests/Feature/ExampleTest.php
```

`phpunit.xml` configures the test environment with array cache/mail drivers, sync queue, array session driver, and lower bcrypt rounds. SQLite in-memory settings exist but are commented out.

### Useful Laravel commands

```bash
php artisan migrate
php artisan tinker
composer dump-autoload
php artisan vendor:publish --force --tag=livewire:assets --ansi
```

`composer dump-autoload` triggers Laravel package discovery and republishes Livewire assets via Composer scripts.

## Architecture

### Routing and request flow

Web routes are defined in `routes/web.php`; `routes/api.php` only contains the default Sanctum-protected `/api/user` route.

Important web routes:

- `/` → `IndexController@index` → `resources/views/frontends/index.blade.php`
- `/login` → `LoginController@index` → `frontends.login` with `<livewire:login-component />`
- `/logout` → closure that flushes the session and redirects to `/login`
- `/tentang` → `TentangController@index`
- `/map` → `PetaDataController@index` → `frontends.map`
- `/data` → `DataController@index` → `frontends.data` with `<livewire:table-sawit />`
- `/dashboard/sawit/*` → mostly `sawitController` methods for dashboard/chart pages
- `/dashboard/sawit/pabrik` → `FrontendDashboardController@index`

The codebase uses a traditional Laravel MVC shape, but domain queries are mostly direct query-builder calls rather than Eloquent models or service classes.

### Data model and database access

The only Eloquent model present is `app/Models/User.php`. Plantation dashboard data uses the `tbsawit` table directly via `DB::table(...)`.

Key database files:

- `database/migrations/2014_10_12_000000_create_users_table.php` creates users with `username`, `email`, and `password`.
- `database/migrations/2023_08_23_191130_table_sawit.php` creates `tbsawit` with yearly plantation metrics such as area, production, productivity, farmers, commodity, province, and source metadata.
- `database/seeders/DatabaseSeeder.php` has no active seed data.

Important flows:

- `/data` renders `frontends.data`, then `app/Http/Livewire/TableSawit.php` queries `tbsawit` for paginated/sortable table output.
- Dashboard chart pages use `app/Http/Controllers/sawitController.php`, which builds arrays from `tbsawit`, JSON-encodes them, and passes strings to Blade for Highcharts.
- Login uses `app/Http/Livewire/LoginComponent.php`, queries `users` by `username`, verifies the password with `Hash::check`, and stores `username` in the session.

### Authentication pattern

Authentication is custom session-based login, not the standard Laravel guard flow. Templates and controllers check `session('username')` to decide login state. `FrontendDashboardController` manually redirects unauthenticated users to `/login`.

There is a custom `app/Http/Middleware/dashboardMiddleware.php`, but it is not registered in `app/Http/Kernel.php`; do not assume it protects routes unless you wire it up explicitly.

### Views and frontend structure

Main layout:

- `resources/views/layouts/indexLayout.blade.php`

Most frontend pages live in `resources/views/frontends`, extend `layouts.indexLayout`, define `@section('content')`, and use shared nav/footer partials from `resources/views/partials`.

The layout loads:

- Vite entries: `resources/css/app.css`, `resources/js/app.js`
- Livewire styles/scripts
- Alpine.js CDN
- Leaflet CSS/JS-related assets
- Highcharts CDN
- Swiper CDN
- Google Montserrat font
- `@stack('script')` for page-specific scripts

Livewire components:

- `app/Http/Livewire/LoginComponent.php` + `resources/views/livewire/login-component.blade.php`
- `app/Http/Livewire/TableSawit.php` + `resources/views/livewire/table-sawit.blade.php`
- `resources/views/livewire/pagination.blade.php`

### Charts and maps

Chart pages use inline Highcharts scripts in Blade. Controllers prepare JSON strings, and Blade parses them in JavaScript. Representative chart views include:

- `resources/views/frontends/pengusahaan.blade.php`
- `resources/views/frontends/perkebunanbesar.blade.php`
- `resources/views/frontends/perkebunanrakyat.blade.php`
- `resources/views/frontends/mutasitanaman.blade.php`
- `resources/views/frontends/mutasitanamanrakyat.blade.php`

The map implementation is inline in `resources/views/frontends/map.blade.php`. It uses Leaflet with ArcGIS base tiles, reset-view and minimap controls, and WMS overlays from a GeoServer endpoint. `public/js/wms.js` defines the custom `L.tileLayer.betterWms` behavior for clickable/queryable WMS layers.

### Frontend assets and build tooling

Vite is configured in `vite.config.js` with these inputs:

- `resources/css/app.css`
- `resources/js/app.js`

Tailwind is configured through `tailwind.config.js` and `postcss.config.js`.

Static assets are served from `public`, especially:

- `public/assets`
- `public/assets/v1`
- `public/js`
- `public/css`

Blade templates mostly reference images with `asset('assets/...')` or `asset('assets/v1/...')`. Vite handles the app CSS/JS entrypoints; many map/chart dependencies are loaded globally from CDN or `public` assets.

## Repository notes

- `sawitController` is intentionally named with a lowercase initial letter in the current code; match existing references if editing it.
- Several controllers contain commented-out or partially unused code, especially older GeoServer/WFS and information-page routes. Verify current route usage before removing or reviving them.
- The default `README.md` is Laravel boilerplate and does not contain project-specific setup instructions.
- No Cursor rules, `.cursorrules`, GitHub Copilot instructions, or previous `CLAUDE.md` were present when this file was created.
