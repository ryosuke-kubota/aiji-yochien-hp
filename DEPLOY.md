# デプロイ手順（エックスサーバー）

`main` ブランチに push すると、GitHub Actions がテーマ
（`wp-content/themes/aiji-yochien/`）をエックスサーバーへ FTPS で自動転送します。

- ワークフロー定義: [.github/workflows/deploy.yml](.github/workflows/deploy.yml)
- デプロイされるもの: **テーマフォルダのみ**
- 触れないもの: 本番の WordPress 設定・データベース・アップロード画像（`wp-content/uploads/`）・プラグイン

---

## 初回だけ必要な設定

### 1. エックスサーバーの FTP 情報を控える

サーバーパネル →「FTPアカウント設定」で対象ドメインを開き、以下を確認します。

| 項目 | 例 | GitHub に登録する Secret 名 |
|------|-----|------------------------------|
| FTPサーバー（ホスト名） | `svXXXX.xserver.jp` | `FTP_SERVER` |
| ユーザー名（FTPアカウント名） | `example-account` | `FTP_USERNAME` |
| パスワード | （設定したパスワード） | `FTP_PASSWORD` |

> パスワードが分からない場合は、同画面でFTPアカウントを追加すると新しいパスワードを発行できます。

### 2. GitHub にシークレットを登録する

リポジトリの **Settings → Secrets and variables → Actions → New repository secret** から、
上表の3つを登録します。

- `FTP_SERVER`
- `FTP_USERNAME`
- `FTP_PASSWORD`

### 3. 転送先パスを確認する

`deploy.yml` の `server-dir` は現在こうなっています。

```
/aijiyouchien.webosaka.work/public_html/wp-content/themes/aiji-yochien/
```

FTPソフト（FileZilla等）で一度接続し、テーマの実際の場所がこのパスと合っているか確認してください。
違う場合は `deploy.yml` の `server-dir` の1行だけ書き換えます。
（エックスサーバーは FTP ルートから見て `/ドメイン名/public_html/…` の構造です）

---

## 使い方（2回目以降）

普段どおり `main` に push するだけです。

```bash
git add -A
git commit -m "変更内容"
git push
```

- 進捗・結果はリポジトリの **Actions** タブで確認できます。
- 手動で流したいときは Actions タブ →「Deploy theme to Xserver」→ **Run workflow**。

## 仕組みのメモ

- **差分転送**: 初回は全ファイル、2回目以降は変更のあったファイルだけ転送します
  （転送先に `.ftp-deploy-sync-state.json` という管理ファイルが作られます。消さないでください）。
- **PHP構文チェック**: デプロイ前に全PHPファイルを `php -l` で検査し、
  壊れたPHPがあればデプロイを中止します。
- **同時実行の防止**: デプロイ中に次のpushがあっても、前のデプロイが終わってから実行されます。

## トラブル時

- `530 Login incorrect` → Secret のユーザー名・パスワードを確認。
- `550 ... No such file or directory` → `server-dir` のパスが本番と違う。手順3を確認。
- 接続できない → エックスサーバー側でFTP接続の制限（アクセス制限）がかかっていないか確認。
