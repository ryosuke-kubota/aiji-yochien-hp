<?php
/**
 * 園見学・体験（スラッグ: tour）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>園見学・体験</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <h1>園見学・体験</h1>
          <p class="subpage-hero__lead">
            園の雰囲気は、実際に見ていただくのがいちばん。
            園見学は随時、親子で楽しめる体験も毎月ご用意しています。
          </p>
          <a class="button button--primary" href="#form">申し込みフォームへ<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--tour">
          <?php // assets/images/photo-hero-tour.jpg を置くと自動で差し替わる ?>
          <img src="<?php echo aiji_photo( 'hero-tour' ) ?: aiji_asset( 'images/kousha.jpg' ); ?>" alt="愛児幼稚園の園舎">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#menu">見学・体験メニュー</a>
        <a href="#form">申し込みフォーム</a>
        <a href="<?php echo aiji_page_url( 'guide' ); ?>#faq">よくあるご質問</a>
      </nav>

      <section class="page-section" id="menu">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>見学・体験メニュー</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>ご都合に合わせてお選びください。日程のご相談もお気軽にどうぞ。</p>
        </div>
        <div class="event-grid">
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="" aria-hidden="true">
            <h3>園見学　随時</h3>
            <p>保育中の園内をご覧いただけます。2歳児クラス・転入・通園方法のご相談も承ります。</p>
            <a class="button button--small button--primary" href="#form">申し込む<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-annual-season.png' ); ?>" alt="" aria-hidden="true">
            <h3>未就園児体験　毎月1回</h3>
            <p>6月〜2月に毎月1回、バルーン体験など親子で楽しめる体験の機会をご用意しています。</p>
            <a class="button button--small button--yellow" href="#form">申し込む<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-about-playground.png' ); ?>" alt="" aria-hidden="true">
            <h3>園庭開放　第2・第4土曜日</h3>
            <p>10:30〜12:30に園庭を開放しています。未就園児のお子さまも親子でご参加いただけます。</p>
            <a class="button button--small button--blue" href="#form">申し込む<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-consult.png' ); ?>" alt="" aria-hidden="true">
            <h3>個別相談　随時</h3>
            <p>入園や子育てのこと、預かり保育のことなど、どんなことでもご相談ください。</p>
            <a class="button button--small button--ghost" href="#form">相談する<span aria-hidden="true">›</span></a>
          </article>
        </div>
      </section>

      <section class="page-section soft-panel cream-panel" id="form">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>申し込みフォーム</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>ご希望の内容と日時をお知らせください。担当者より日程のご連絡をいたします。</p>
        </div>
        <?php aiji_cf7_form( '園見学・体験' ); ?>
      </section>

      <section class="page-cta">
        <div>
          <h2>お電話でのお申し込みも歓迎です</h2>
          <p>「今週見に行きたい」などお急ぎの場合は、お電話が確実です。<br>認定こども園 愛児幼稚園　TEL 06-6691-0502（受付時間 10:00〜17:00）</p>
        </div>
        <a class="button button--ghost" href="tel:0666910502">電話で申し込む<span aria-hidden="true">›</span></a>
      </section>
    </main>

<?php get_footer(); ?>
