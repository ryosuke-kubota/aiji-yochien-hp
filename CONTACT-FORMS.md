# お問い合わせ・園見学フォーム（Contact Form 7）

お問い合わせ／園見学・体験／採用応募の3フォームは **Contact Form 7（CF7）** で作っています。
送信内容は **Flamingo** で管理画面にも保存されます。

- テンプレート側は「タイトルでCF7フォームを探して出力」する作りです（[functions.php](wp-content/themes/aiji-yochien/functions.php) の `aiji_cf7_form()`）。
  - お問い合わせページ → タイトル **「お問い合わせ」** のフォームを表示
  - 園見学・体験ページ → タイトル **「園見学・体験」** のフォームを表示
- そのため本番でも**フォームのタイトルをこの3つと完全一致**で作れば、IDが違っても自動でつながります。

> ⚠️ CF7のフォーム設定は**データベースに保存**されます（テーマ/Git管理外）。
> このため自動デプロイには乗りません。本番では下記の手順で**同じフォームを作成**してください。

---

## 本番（エックスサーバー）での初回セットアップ

### 1. プラグインを2つ入れる

WordPress管理画面 → プラグイン → 新規追加 で以下を検索してインストール・有効化。

- **Contact Form 7**（フォーム本体）
- **Flamingo**（送信内容を管理画面に保存）

### 2. お問い合わせフォームを作る

管理画面 → お問い合わせ（Contact Form 7）→ 新規追加。
**タイトルを「お問い合わせ」**（完全一致）にして、各タブを以下に置き換える。

**［フォーム］タブ:**

```
[hidden your-subject "お問い合わせ"]
<div class="entry-form__grid">
  <p class="entry-field">
    <label>お名前<span class="entry-required">必須</span></label>
    [text* your-name autocomplete:name placeholder "例）愛児 花子"]
  </p>
  <p class="entry-field">
    <label>ふりがな</label>
    [text your-kana placeholder "例）あいじ はなこ"]
  </p>
  <p class="entry-field">
    <label>電話番号<span class="entry-required">必須</span></label>
    [tel* your-phone autocomplete:tel placeholder "例）090-1234-5678"]
  </p>
  <p class="entry-field">
    <label>メールアドレス<span class="entry-required">必須</span></label>
    [email* your-email autocomplete:email placeholder "例）hanako@example.com"]
  </p>
  <p class="entry-field entry-field--wide">
    <label>お問い合わせ種別<span class="entry-required">必須</span></label>
    [select* your-topic first_as_label "選択してください" "入園について" "未就園児クラス・園見学について" "預かり保育について" "採用について" "その他"]
  </p>
  <p class="entry-field entry-field--wide">
    <label>お問い合わせ内容<span class="entry-required">必須</span></label>
    [textarea* your-message x6 placeholder "お問い合わせの内容をご記入ください。"]
  </p>
</div>
<p class="entry-form__agree">[acceptance your-consent] ご入力いただいた個人情報を、このご連絡への回答の目的にのみ使用することに同意します。[/acceptance]</p>
<p class="entry-form__submit">[submit class:button class:button--primary "この内容で送信する"]</p>
```

**［メール］タブ:**

- 件名: `【お問い合わせ】[your-name] 様より（[your-topic]）`
- 追加ヘッダー: `Reply-To: [your-email]`（返信しやすくする）
- メッセージ本文:

```
お問い合わせがありました。

お名前: [your-name]
ふりがな: [your-kana]
電話番号: [your-phone]
メールアドレス: [your-email]
種別: [your-topic]

【お問い合わせ内容】
[your-message]
```

- 「送信先」は園のメールアドレスにしてください（既定は管理者メール `[_site_admin_email]`）。

### 3. 園見学・体験フォームを作る

同じく新規追加。**タイトルを「園見学・体験」**（完全一致）に。

**［フォーム］タブ:**

```
[hidden your-subject "園見学・体験"]
<div class="entry-form__grid">
  <p class="entry-field">
    <label>お名前<span class="entry-required">必須</span></label>
    [text* your-name autocomplete:name placeholder "例）愛児 花子"]
  </p>
  <p class="entry-field">
    <label>ふりがな</label>
    [text your-kana placeholder "例）あいじ はなこ"]
  </p>
  <p class="entry-field">
    <label>電話番号<span class="entry-required">必須</span></label>
    [tel* your-phone autocomplete:tel placeholder "例）090-1234-5678"]
  </p>
  <p class="entry-field">
    <label>メールアドレス<span class="entry-required">必須</span></label>
    [email* your-email autocomplete:email placeholder "例）hanako@example.com"]
  </p>
  <p class="entry-field">
    <label>ご希望の内容<span class="entry-required">必須</span></label>
    [select* your-topic first_as_label "選択してください" "園見学" "未就園児体験" "園庭開放" "個別相談"]
  </p>
  <p class="entry-field">
    <label>ご希望の日時</label>
    [text your-date placeholder "例）7月中の平日午前、7/25(土) など"]
  </p>
  <p class="entry-field entry-field--wide">
    <label>ご質問・ご要望など</label>
    [textarea your-message x6 placeholder "お子さまの年齢や、聞いてみたいことがあればご記入ください。"]
  </p>
</div>
<p class="entry-form__agree">[acceptance your-consent] ご入力いただいた個人情報を、このご連絡への回答の目的にのみ使用することに同意します。[/acceptance]</p>
<p class="entry-form__submit">[submit class:button class:button--primary "この内容で送信する"]</p>
```

**［メール］タブ:**

- 件名: `【園見学・体験】[your-name] 様より（[your-topic]）`
- 追加ヘッダー: `Reply-To: [your-email]`
- メッセージ本文:

```
園見学・体験の申し込みがありました。

お名前: [your-name]
ふりがな: [your-kana]
電話番号: [your-phone]
メールアドレス: [your-email]
ご希望の内容: [your-topic]
ご希望の日時: [your-date]

【ご質問・ご要望など】
[your-message]
```

### 3.5 採用応募フォームを作る

同じく新規追加。**タイトルを「採用応募」**（完全一致）に。

**［フォーム］タブ:**

```
[hidden your-subject "採用応募"]
<div class="entry-form__grid">
  <p class="entry-field">
    <label>お名前<span class="entry-required">必須</span></label>
    [text* your-name autocomplete:name placeholder "例）愛児 花子"]
  </p>
  <p class="entry-field">
    <label>ふりがな</label>
    [text your-kana placeholder "例）あいじ はなこ"]
  </p>
  <p class="entry-field">
    <label>電話番号<span class="entry-required">必須</span></label>
    [tel* your-phone autocomplete:tel placeholder "例）090-1234-5678"]
  </p>
  <p class="entry-field">
    <label>メールアドレス<span class="entry-required">必須</span></label>
    [email* your-email autocomplete:email placeholder "例）hanako@example.com"]
  </p>
  <p class="entry-field entry-field--wide">
    <label>希望職種<span class="entry-required">必須</span></label>
    [select* your-job first_as_label "選択してください" "幼稚園教諭" "保育補助" "預かり保育スタッフ" "その他"]
  </p>
  <p class="entry-field entry-field--wide">
    <label>自己PR・ご質問など</label>
    [textarea your-message x6 placeholder "保有資格や経験、園見学のご希望などがあればご記入ください。"]
  </p>
</div>
<p class="entry-form__agree">[acceptance your-consent] ご入力いただいた個人情報を、採用選考に関するご連絡の目的にのみ使用することに同意します。[/acceptance]</p>
<p class="entry-form__submit">[submit class:button class:button--primary "応募内容を送信する"]</p>
```

**［メール］タブ:**

- 件名: `【採用応募】[your-name] 様（[your-job]）`
- 追加ヘッダー: `Reply-To: [your-email]`
- メッセージ本文:

```
採用の応募がありました。

お名前: [your-name]
ふりがな: [your-kana]
電話番号: [your-phone]
メールアドレス: [your-email]
希望職種: [your-job]

【自己PR・ご質問など】
[your-message]
```

- 「送信先」は採用担当のメールアドレスにしてください（既定は管理者メール `[_site_admin_email]`）。

### 4. 表示・保存の確認

- お問い合わせページ（/contact/）と園見学・体験ページ（/tour/）を開き、フォームが表示されるか確認。
- テスト送信して、園のメールに届くか＆管理画面 **Flamingo → 受信メッセージ** に残るかを確認。

---

## 迷惑メールに入りにくくする設定

フォームからのメールが迷惑メールに入る主因は「送信元（From）の認証」です。
**エックスサーバーで作成したメールボックスから認証付きで送り、送信元をそのアドレスに揃える**と、
SPF/DKIM が一致して迷惑メール判定されにくくなります。応募者のアドレスは送信元ではなく返信先に入れます。

### ① WP Mail SMTP プラグインで、園のメールボックスから送る（最重要）

WordPress 標準の送信（PHP mail）は認証がなく弾かれやすいため、作成済みのメールボックスから SMTP 認証で送ります。

1. プラグイン → 新規追加 →「**WP Mail SMTP**」をインストール・有効化
2. 送信方法（Mailer）: **その他の SMTP（Other SMTP）**
3. SMTP ホスト: `svXXXX.xserver.jp`（メール設定に記載のホスト名）
4. 暗号化: **SSL / ポート 465**（または STARTTLS / 587）
5. 認証（Authentication）: **ON**
   - ユーザー名: 作成したメールアドレス全体（例: `info@ドメイン`）
   - パスワード: そのメールボックスのパスワード
6. From Email: 園のメールアドレス、From Name: `認定こども園 愛児幼稚園`
7. **「Force From Email」を ON**（CF7 側の送信元を強制的に揃える）

### ② CF7 の送信元（From）を園のアドレスにする

各フォーム →「メール」タブ:

- 送信元: `認定こども園 愛児幼稚園 <園のメールアドレス>`
- 返信先（Reply-To）: `[your-email]`（設定済み。返信は応募者へ届く）
- ⚠️ **送信元に `[your-email]`（応募者のアドレス）は絶対に入れない** — なりすまし扱いでほぼ迷惑メール行きになります。
  （初期状態は CF7 既定の `wordpress@ドメイン`。①の Force From を使うか、ここを園のアドレスに直す）

### ③ エックスサーバーで DKIM を有効化

- サーバーパネル →「**DKIM設定**」→ 対象ドメインを「有効」に
- SPF はエックスサーバーで DNS を管理していれば自動設定済み（独自 DNS の場合は SPF レコードにエックスサーバーを含める）
- 余裕があれば **DMARC** レコード（DNS に TXT）も追加するとさらに堅くなります

---

## 補足

- **見た目の調整は不要**です。テーマ側のCSS（`entry-form` 系）がCF7の出力にそのまま効くように作ってあります。
- CF7・Flamingo未インストールのときは、フォーム位置に「お電話でご連絡ください」という案内が自動表示されます（サイトは壊れません）。
- **迷惑メール対策**を強めたい場合は、CF7の設定から **reCAPTCHA v3** を追加できます（Googleのサイトキー登録が必要）。
- 送信元メールは既定でサイトドメインの `wordpress@ドメイン` になります。到達率を上げたい場合は、園の独自ドメインの送信専用アドレスに変更してください。
- 3フォームとも同じ作りなので、項目やメール文面の変更は管理画面のCF7だけで完結します。
