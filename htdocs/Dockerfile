FROM composer:latest AS composer

FROM php:7.2

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /test-mobly-api

COPY ./test-mobly-api/ .

RUN composer install

RUN chmod 777 /test-mobly-api/storage