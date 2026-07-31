<?php
/**
 * 採用情報（スラッグ: recruit）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>採用情報</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
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

        <?php aiji_cf7_form( '採用応募' ); ?>
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
