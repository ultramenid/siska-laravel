FROM php:8.4-fpm-bookworm

# Runtime extensions Laravel 13 / this app needs.
# Debian apt resolves these reliably (the Alpine build hit a partial repo index).
RUN apt-get update && apt-get install -y --no-install-recommends \
        libpq-dev \
        libpng-dev \
        libzip-dev \
        libicu-dev \
        unzip \
    && docker-php-ext-install pdo_pgsql pdo_mysql gd zip bcmath intl opcache \
    && rm -rf /var/lib/apt/lists/*

# Composer binary (run `composer install` inside the container).
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html