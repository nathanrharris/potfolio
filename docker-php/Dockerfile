FROM php:8.3.4-fpm-alpine3.19
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli

RUN apk add --virtual build-dependencies --no-cache autoconf gcc g++ make freetype-dev zlib-dev libpng-dev libjpeg-turbo-dev libmcrypt-dev openssl ca-certificates libxml2-dev oniguruma-dev

RUN docker-php-ext-configure gd --enable-gd --with-freetype=/usr/include/freetype2/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd
RUN docker-php-ext-enable gd
