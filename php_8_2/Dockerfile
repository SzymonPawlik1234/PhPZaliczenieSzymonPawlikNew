FROM php:8.2-fpm
ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && \
  DEBIAN_FRONTEND=noninteractive apt install -y nano vim curl git acl zip gnupg cron

RUN set -x && \
    DEBIAN_FRONTEND=noninteractive apt install -y mariadb-client

RUN DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends apt-utils

RUN set -x \
    && apt-get install -y zlib1g-dev libicu-dev g++ \
    && docker-php-ext-install intl

RUN set -x \
    && apt-get install -y libpng-dev libmcrypt-dev libxslt-dev libzip-dev \
    && pecl install mcrypt \
    && docker-php-ext-enable mcrypt

RUN set -x \
    && docker-php-ext-install xsl pdo_mysql soap zip bcmath

RUN set -x \
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev \
    && docker-php-ext-configure gd -with-freetype --with-jpeg \
    && docker-php-ext-install gd

RUN set -x && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache

RUN apt-get update && apt-get install -y libsodium-dev
RUN docker-php-ext-install sodium

RUN set -x \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

RUN apt-get update \
        && mkdir -p /tmpbuild/libsodium \
        && cd /tmpbuild/libsodium \
        && curl -L https://download.libsodium.org/libsodium/releases/libsodium-1.0.18.tar.gz -o libsodium-1.0.18.tar.gz \
        && tar xfvz libsodium-1.0.18.tar.gz && cd /tmpbuild/libsodium/libsodium-1.0.18/ \
        && ./configure \
        && make \
        && make install \
        && mv src/libsodium /usr/local/ \
        && rm -Rf /tmpbuild/ \
        && curl https://packages.sury.org/php/apt.gpg -o /etc/apt/trusted.gpg.d/php.gpg \
        && rm -rf /var/lib/apt/lists/* \
        && docker-php-ext-install sodium

ENV DEBIAN_FRONTEND teletype


