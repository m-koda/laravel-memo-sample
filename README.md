# laravel-memo-sample

## laravel/uiの導入

```bash
$ docker-compose exec php-fpm composer require laravel/ui "^1.0"
$ docker-compose exec php-fpm php artisan ui vue --auth
Vue scaffolding installed successfully.
Please run "npm install && npm run dev" to compile your fresh scaffolding.
Authentication scaffolding generated successfully.
$ docker-compose exec php-fpm npm install
$ docker-compose exec php-fpm npm run dev
```

## 初期ユーザーの作成

・seederファイルの作成

```bash
$ docker-compose exec php-fpm php artisan make:seeder UsersTableSeeder
```

・database/seeds/UsersTableSeeder.phpの修正

・database/seeds/DatabaseSeeder.phpの修正

・migrateと同時にseedを実行

```bash
$ docker-compose exec php-fpm php artisan migrate --seed
```

## Memoモデルの作成

```
$ docker-compose exec php-fpm php artisan migrate --seed
```

・作成されたマイグレーションファイルの修正

・ルートファイル(routes/web.php)の修正