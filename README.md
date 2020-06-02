# laravel-memo-sample

## laravel-uiの導入

```bash
$ docker-compose exec php-fpm composer require laravel/ui "^1.0"
$ docker-compose exec php-fpm php artisan ui vue --auth
Vue scaffolding installed successfully.
Please run "npm install && npm run dev" to compile your fresh scaffolding.
Authentication scaffolding generated successfully.
$ docker-compose exec php-fpm npm install
$ docker-compose exec php-fpm npm run dev
```
