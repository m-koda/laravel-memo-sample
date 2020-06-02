FROM php:7.3.17-fpm-alpine3.11

## https://github.com/docker-library/php/issues/344#issuecomment-364843883
## composerは別コンテナにしてもいいかも
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

## alpine3.3以降であればapk addに--no-cacheを使うことでrm -rf /var/cache/apk/*は不要
## タイムゾーンをAsia/Tokyoに変更(https://wiki.alpinelinux.org/wiki/Setting_the_timezone)
RUN set -eux \
  && apk update \
  && apk add --no-cache g++ autoconf make gcc \
  && apk add --no-cache nodejs npm \
  && apk add --no-cache tzdata && cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && echo "Asia/Tokyo" > /etc/timezone && apk del tzdata \
  && docker-php-ext-install -j$(nproc) pdo_mysql bcmath mbstring \
  && rm -rf /var/cache/apk/*

RUN mkdir /var/www/src
WORKDIR /var/www/src
