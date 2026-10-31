## Day 7：タスク管理アプリ

PHP 8.5系、pdo_mysql、mbstring、MySQL 8系を想定。**統合動作未検証**。

1. `task-app/schema.sql`をMySQLに適用し、専用DBユーザーを作成。
2. `DB_USER`、`DB_PASSWORD`を環境変数に設定。
3. `task-app`内で `php -S 127.0.0.1:8000 -t public` を実行。
4. ブラウザで `http://127.0.0.1:8000/` を開く。

学習用ローカルアプリです。公開運用には認証・HTTPS等の追加設計が必要です。

サンプル番号：PHP-D07-01〜05。コードはDriveのMarkdownドラフトに基づきます。
