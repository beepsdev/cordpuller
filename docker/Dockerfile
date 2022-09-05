FROM php:8.1-fpm

RUN apt-get update
RUN apt-get install libgmp-dev build-essential libsodium-dev -y

RUN docker-php-ext-install gmp
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN pecl install redis
RUN docker-php-ext-enable redis
#RUN pecl install libsodium && docker-php-ext-enable sodium