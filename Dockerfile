FROM php:8.4-fpm-alpine

# Runtime extensions Laravel 13 / this app needs.
# pdo_pgsql -> PostGIS DB, gd -> image handling, zip/intl/bcmath -> Laravel core + composer.
RUN apk add --no-cache \
        libpng-dev \
        libzip-dev \
        icu-dev \
        oniguruma-dev \
        libpq-dev \
    && docker-php-ext-install pdo_pgsql pdo_mysql gd zip bcmath intl opcache

# Composer binary (run `composer install` inside the container).
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html