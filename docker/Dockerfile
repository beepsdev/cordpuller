FROM php:8.0-fpm

RUN apt-get update
RUN apt-get install libgmp-dev build-essential libsodium-dev -y

RUN docker-php-ext-install gmp
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN pecl install libsodium && docker-php-ext-enable sodium