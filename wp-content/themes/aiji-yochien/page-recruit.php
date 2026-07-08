<?php
/**
 * 採用情報（スラッグ: recruit）
 */

get_header();

$aiji_entry_state = isset( $_GET['entry'] ) ? sanitize_key( $_GET['entry'] ) : '';
$aiji_entry_notices = array(
	'sent'    => array( 'ok', 'ご応募ありがとうございます。内容を確認のうえ、担当者よりご連絡いたします。' ),
	'invalid' => array( 'ng', '入力内容に不備がありました。お手数ですが、必須項目をご確認のうえもう一度送信してください。' ),
	'expired' => array( 'ng', 'ページの有効期限が切れていました。お手数ですが、もう一度送信してください。' ),
	'wait'    => array( 'ng', '送信の間隔が短すぎます。1分ほどおいてからもう一度お試しください。' ),
	'error'   => array( 'ng', '送信に失敗しました。お手数ですが、時間をおいて再度お試しいただくか、お電話（06-6691-0502）にてご連絡ください。' ),
);
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>採用情報</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <p class="eyebrow"><img src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">Recruit</p>
          <h1>採用情報</h1>
          <p class="subpage-hero__lead">
            愛児幼稚園では、いっしょに子どもたちの成長を見守ってくださる仲間を募集しています。
            見学だけでも歓迎です。お気軽にご応募ください。
          </p>
          <a class="button button--primary" href="#entry">応募フォームへ<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--recruit">
          <?php // assets/images/photo-hero-recruit.jpg を置くと自動で差し替わる ?>
          <img src="<?php echo aiji_photo( 'hero-recruit' ) ?: aiji_photo( 'support-teachers' ); ?>" alt="先生たちのようす">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#jobs">募集要項</a>
        <a href="#entry">応募フォーム</a>
      </nav>

      <section class="page-section soft-panel" id="jobs">
        <div class="section-heading section-heading--left">
          <h2>募集要項</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <dl class="overview-list">
          <dt>募集職種</dt><dd>幼稚園教諭・保育補助・預かり保育スタッフ　※雇用形態や勤務時間はご相談ください</dd>
          <dt>勤務地</dt><dd>認定こども園 愛児幼稚園（大阪市住吉区長居西3-1-14／Osaka Metro御堂筋線・JR阪和線「長居駅」から徒歩7分）</dd>
          <dt>選考の流れ</dt><dd>応募フォームまたはお電話でご連絡 → 園見学・面接 → 採用のご連絡</dd>
          <dt>お問い合わせ</dt><dd>TEL 06-6691-0502（受付時間 10:00〜17:00）　採用担当まで</dd>
        </dl>
      </section>

      <section class="page-section soft-panel cream-panel" id="entry">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>応募フォーム</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>下記のフォームからご応募ください。内容を確認のうえ、担当者よりご連絡いたします。</p>
        </div>

        <?php if ( isset( $aiji_entry_notices[ $aiji_entry_state ] ) ) : ?>
        <p class="entry-notice entry-notice--<?php echo esc_attr( $aiji_entry_notices[ $aiji_entry_state ][0] ); ?>" role="status">
          <?php echo esc_html( $aiji_entry_notices[ $aiji_entry_state ][1] ); ?>
        </p>
        <?php endif; ?>

        <?php if ( 'sent' !== $aiji_entry_state ) : ?>
        <form class="entry-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
          <input type="hidden" name="action" value="aiji_recruit_entry">
          <?php wp_nonce_field( 'aiji_recruit_entry' ); ?>
          <p class="entry-form__hp" aria-hidden="true"><label>この欄には入力しないでください<input type="text" name="aiji_website" tabindex="-1" autocomplete="off"></label></p>

          <div class="entry-form__grid">
            <p class="entry-field">
              <label for="aiji-name">お名前<span class="entry-required">必須</span></label>
              <input id="aiji-name" name="aiji_name" type="text" required autocomplete="name" placeholder="例）愛児 花子">
            </p>
            <p class="entry-field">
              <label for="aiji-kana">ふりがな</label>
              <input id="aiji-kana" name="aiji_kana" type="text" autocomplete="off" placeholder="例）あいじ はなこ">
            </p>
            <p class="entry-field">
              <label for="aiji-phone">電話番号<span class="entry-required">必須</span></label>
              <input id="aiji-phone" name="aiji_phone" type="tel" required autocomplete="tel" pattern="[0-9+\-() ]{10,15}" placeholder="例）090-1234-5678">
            </p>
            <p class="entry-field">
              <label for="aiji-email">メールアドレス<span class="entry-required">必須</span></label>
              <input id="aiji-email" name="aiji_email" type="email" required autocomplete="email" placeholder="例）hanako@example.com">
            </p>
            <p class="entry-field entry-field--wide">
              <label for="aiji-job">希望職種<span class="entry-required">必須</span></label>
              <select id="aiji-job" name="aiji_job" required>
                <option value="">選択してください</option>
                <?php foreach ( aiji_entry_jobs() as $aiji_job ) : ?>
                <option value="<?php echo esc_attr( $aiji_job ); ?>"><?php echo esc_html( $aiji_job ); ?></option>
                <?php endforeach; ?>
              </select>
            </p>
            <p class="entry-field entry-field--wide">
              <label for="aiji-message">自己PR・ご質問など</label>
              <textarea id="aiji-message" name="aiji_message" rows="6" maxlength="2000" placeholder="保有資格や経験、園見学のご希望などがあればご記入ください。"></textarea>
            </p>
          </div>

          <p class="entry-form__agree">
            <label>
              <input type="checkbox" name="aiji_agree" value="1" required>
              <span>ご入力いただいた個人情報を、採用選考に関するご連絡の目的にのみ使用することに同意します。<span class="entry-required">必須</span></span>
            </label>
          </p>
          <p class="entry-form__submit">
            <button class="button button--primary" type="submit">応募内容を送信する<span aria-hidden="true">›</span></button>
          </p>
        </form>
        <?php endif; ?>
      </section>

      <section class="page-cta">
        <div>
          <h2>お電話でのご応募・ご相談も歓迎です</h2>
          <p>「まずは園の雰囲気を見てみたい」という方も、お気軽にご連絡ください。<br>認定こども園 愛児幼稚園　TEL 06-6691-0502</p>
        </div>
        <a class="button button--ghost" href="tel:0666910502">電話で問い合わせる<span aria-hidden="true">›</span></a>
      </section>
    </main>

<?php get_footer(); ?>
