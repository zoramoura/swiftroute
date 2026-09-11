FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    libpq-dev libzip-dev zip unzip git oniguruma-dev postgresql-client

RUN docker-php-ext-install pdo pdo_pgsql mbstring zip bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]