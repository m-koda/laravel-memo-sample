FROM nginx:1.18.0-alpine

## alpine3.3以降であればapk addに--no-cacheを使うことでrm -rf /var/cache/apk/*は不要
## タイムゾーンをAsia/Tokyoに変更(https://wiki.alpinelinux.org/wiki/Setting_the_timezone)
RUN set -eux \
  && apk update \
  && apk add --no-cache tzdata && cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && echo "Asia/Tokyo" > /etc/timezone && apk del tzdata \
  && rm -rf /var/cache/apk/*

COPY ./conf.d/default.conf /etc/nginx/conf.d/default.conf
