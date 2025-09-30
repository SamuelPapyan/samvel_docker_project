FROM php:8.4-fpm-alpine AS base

RUN apk add --no-cache \
    php84-cli \
    php84-pear \
    php84-dev \
    autoconf \
    dpkg-dev \
    dpkg \
    file \
    g++ \
    gcc \
    libc-dev \
    make \
    pkgconf \
    re2c \
    linux-headers \
    $PHPIZE_DEPS

RUN docker-php-ext-install pdo_mysql opcache

WORKDIR /app

EXPOSE 9000