<?php
/**
 * 未就園児の方へ（スラッグ: guide）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>未就園児の方へ</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <p class="eyebrow"><img src="<?php echo aiji_asset( 'images/icon-bag.png' ); ?>" alt="" aria-hidden="true">Admission</p>
          <h1>未就園児の方へ</h1>
          <p class="subpage-hero__lead">
            愛児幼稚園は2歳児から受け入れています。
            願書配布は9月1日から、願書受付は10月1日から。
            初めての方にも迷わず進んでもらえるようご案内します。
          </p>
          <a class="button button--primary" href="#tour">見学会・説明会を見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--guide">
          <img src="<?php echo aiji_asset( 'images/card-admission.png' ); ?>" alt="未就園児の方へのイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#tour">見学会</a>
        <a href="#flow">入園までの流れ</a>
        <a href="#info">募集概要</a>
        <a href="#contact">お問い合わせ</a>
      </nav>

      <section class="page-section" id="tour">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>見学会・説明会</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>園児募集のスケジュールです。見学やご相談は随時、お電話で受け付けています。</p>
        </div>
        <div class="event-grid">
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-documents.png' ); ?>" alt="" aria-hidden="true">
            <h3>願書配布　9月1日から</h3>
            <p>入園願書は9月1日から園にて配布します。お気軽にお越しください。</p>
            <a class="button button--small button--primary" href="#contact">問い合わせる<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-annual-calendar.png' ); ?>" alt="" aria-hidden="true">
            <h3>願書受付　10月1日から</h3>
            <p>10月1日から受付開始。定員になり次第締め切らせていただきます。</p>
            <a class="button button--small button--yellow" href="#contact">問い合わせる<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-about-playground.png' ); ?>" alt="" aria-hidden="true">
            <h3>2歳児から受け入れます</h3>
            <p>2歳児クラスからの入園が可能。長時間保育で子育てを支えます。</p>
            <a class="button button--small button--blue" href="#contact">相談する<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-consult.png' ); ?>" alt="" aria-hidden="true">
            <h3>園見学・個別相談</h3>
            <p>入園や転入、預かり保育、通園方法のご相談は随時承ります。</p>
            <a class="button button--small button--ghost" href="#contact">問い合わせる<span aria-hidden="true">›</span></a>
          </article>
        </div>
      </section>

      <section class="page-section soft-panel cream-panel" id="flow">
        <div class="section-heading section-heading--left">
          <h2>入園までの流れ</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <div class="guide-flow">
          <article class="guide-flow__item"><img class="guide-flow__icon" src="<?php echo aiji_asset( 'images/card-icon-guide-consult.png' ); ?>" alt="" aria-hidden="true"><div><h3>資料請求・お問い合わせ</h3><p>まずは園の資料、募集状況、見学可能日を確認します。</p></div></article>
          <article class="guide-flow__item"><img class="guide-flow__icon" src="<?php echo aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="" aria-hidden="true"><div><h3>見学会・説明会に参加</h3><p>園の雰囲気、保育内容、入園のご案内を実際にご覧いただきます。</p></div></article>
          <article class="guide-flow__item"><img class="guide-flow__icon" src="<?php echo aiji_asset( 'images/card-icon-guide-documents.png' ); ?>" alt="" aria-hidden="true"><div><h3>願書配布・申込</h3><p>必要書類や提出期限をわかりやすく掲載します。</p></div></article>
          <article class="guide-flow__item"><img class="guide-flow__icon" src="<?php echo aiji_asset( 'images/card-icon-lesson-manners.png' ); ?>" alt="" aria-hidden="true"><div><h3>面談・手続き</h3><p>お子さまの様子やご家庭の希望を伺い、入園準備へ進みます。</p></div></article>
          <article class="guide-flow__item"><img class="guide-flow__icon" src="<?php echo aiji_asset( 'images/card-icon-about-building.png' ); ?>" alt="" aria-hidden="true"><div><h3>入園</h3><p>新しい生活が安心して始められるよう、持ち物や準備物も案内します。</p></div></article>
        </div>
      </section>

      <section class="page-section soft-panel" id="info">
        <div class="section-heading section-heading--left">
          <h2>募集概要</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <dl class="overview-list">
          <dt>募集人数</dt><dd>2才児: 若干名／年少クラス（3才児）: 30名／年中クラス（4才児）: 20名／年長クラス（5才児）: 若干名</dd>
          <dt>願書配布</dt><dd>9月1日から</dd>
          <dt>募集期間</dt><dd>10月1日〜 願書受付開始　※定員になり次第締め切らせていただきます。</dd>
          <dt>保育時間</dt><dd>早朝保育 7:30〜／通常保育 8:30〜14:30（水曜は13:30降園）／延長保育 18:30まで</dd>
          <dt>通園</dt><dd>送迎バスあり</dd>
          <dt>備考</dt><dd>子育て世帯の保護者の負担軽減が拡充されています。詳しくは園にお問い合わせください。</dd>
        </dl>
      </section>

      <section class="page-cta" id="contact">
        <div>
          <h2>見学・入園について相談する</h2>
          <p>日程、空き状況、2歳児クラスなど、お気軽にお問い合わせください。<br>認定こども園 愛児幼稚園　TEL 06-6691-0502</p>
        </div>
        <a class="button button--primary" href="tel:0666910502">電話で問い合わせる<span aria-hidden="true">›</span></a>
      </section>
    </main>

<?php get_footer(); ?>
