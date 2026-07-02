# 愛児幼稚園 WordPress 環境

静的HTMLサイトを WordPress テーマ化したものです。Docker Compose でローカル環境を起動します。

## 構成

```
docker-compose.yml                  # WordPress 6.8 + MySQL 8.0 + wp-cli
wp-content/themes/aiji-yochien/     # テーマ本体（コンテナにマウント）
├── style.css                       # テーマヘッダー + サイト全CSS
├── functions.php                   # アセット読込・ヘルパー・有効化時の自動セットアップ
├── header.php / footer.php         # 共通ヘッダー・フッター
├── front-page.php                  # トップページ（お知らせは投稿から動的表示）
├── page-about.php                  # 園の紹介
├── page-concept.php                # 教育について
├── page-annual.php                 # 園での生活
├── page-schedule.php               # 入園のご案内
├── page-guide.php                  # 未就園児の方へ
├── index.php                       # お知らせ一覧（投稿ページ /news/）
├── single.php                      # お知らせ詳細
├── page.php                        # 汎用固定ページ
└── assets/                         # 画像・JS
```

## 起動手順

```bash
# 1. コンテナ起動
docker compose up -d

# 2. WordPress インストール（初回のみ）
docker compose run --rm wpcli wp core install \
  --url=http://localhost:8080 --title="愛児幼稚園" \
  --admin_user=admin --admin_password=admin \
  --admin_email=admin@example.com --skip-email

# 3. テーマ有効化（初回のみ）
docker compose run --rm wpcli wp theme activate aiji-yochien

# 4. WPデフォルトの Hello world! 投稿を削除（任意）
docker compose run --rm wpcli wp post delete 1 --force
```

- サイト: http://localhost:8080/
- 管理画面: http://localhost:8080/wp-admin/ （admin / admin）

ポートを変えたい場合は `WORDPRESS_PORT=8081 docker compose up -d`。
管理者パスワードはローカル開発用です。公開環境では必ず変更してください。

## テーマ有効化時の自動セットアップ

`functions.php` の `aiji_activate()` が初回有効化時に以下を自動実行します
（`aiji_theme_setup_done` オプションで再実行を防止）:

- パーマリンクを `/%postname%/` に設定
- 固定ページ作成: home / about / concept / annual / schedule / guide / news
- フロントを固定ページ表示にし、`/news/` を投稿一覧ページに割当
- カテゴリー作成: お知らせ (news-info) / 園の様子 (daily) / 行事 (event)
- 静的サイトのお知らせ5件をサンプル投稿として移植（入園説明会は先頭固定）

## お知らせの運用

- 管理画面 → 投稿 から追加。カテゴリーでタグの色が変わります
  （お知らせ=緑 / 園の様子=ピンク / 行事=黄 / その他=青）
- 投稿を「先頭固定表示」にすると、トップの「重要なお知らせ」欄に表示されます

## 停止・リセット

```bash
docker compose down          # 停止（データは保持）
docker compose down -v       # 停止 + DB・WP本体を削除（完全リセット）
```
