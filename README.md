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

## Memoモデル等の作成

```
$ docker-compose exec php-fpm php artisan make:model --all Memo
```

・作成されたマイグレーションファイルの修正

・ルートファイル(routes/web.php)の修正

・usersテーブルとmemosテーブルのhasMany(1対多)を定義

・factoryを使ってmemosテーブルの初期データを作成

## MemoControllerの各種メソッド(CRUD)の実装

## バリデーションの追加
・フォームリクエストの作成

```bash
$ docker-compose exec php-fpm php artisan make:request StoreMemo
```

## 一覧ページへのページネーションの追加

## mass assignment対策の追加

## ポリシーの追加

```bash
$ docker-compose exec php-fpm php artisan make:policy MemoPolicy --model=Memo
```

## パスワードリセットのメール送信をキューを使うように変更
https://aregsar.com/blog/2020/how-to-queue-laravel-password-reset-email/

・notificationの作成

```bash
$ docker-compose exec php-fpm php artisan make:notification Auth/QueuedResetPassword
```

## タグ機能の追加

### vue-tags-inputの追加
・package.jsonに以下を追加

```json
"@johmun/vue-tags-input": "^2.1.0"
```

・npm installの実行

```bash
$ docker-compose exec php-fpm npm install
```

・tagsテーブルの作成

```bash
$ docker-compose exec php-fpm php artisan make:migration create_tags_table --create=tags
```

・中間テーブル(memo_tagテーブル)の作成

```bash
$ docker-compose exec php-fpm php artisan make:migration create_memo_tag_table --create=memo_tag
```

※中間テーブルの命名はアルファベット順でテーブル名を並べて_(アンダースコア)でつなげる
https://readouble.com/laravel/5.5/ja/eloquent-relationships.html#many-to-many

・migrationの実行

```bash
$ docker-compose exec php-fpm php artisan migrate
```

・Tagモデルの作成

```bash
$ docker-compose exec php-fpm php artisan make:model Tag
```