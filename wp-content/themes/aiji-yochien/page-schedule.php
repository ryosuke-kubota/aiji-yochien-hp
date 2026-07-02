<?php
/**
 * 入園のご案内（スラッグ: schedule）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>入園のご案内</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <p class="eyebrow"><img src="<?php echo aiji_asset( 'images/icon-book.png' ); ?>" alt="" aria-hidden="true">Daily Schedule</p>
          <h1>入園のご案内</h1>
          <p class="subpage-hero__lead">
            登園、朝の活動、クラス活動、給食、降園、預かり保育。
            保護者が園生活を具体的にイメージできる時系列で紹介します。
          </p>
          <a class="button button--primary" href="<?php echo aiji_page_url( 'guide' ); ?>#tour">見学会で雰囲気を見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--schedule">
          <img src="<?php echo aiji_asset( 'images/card-prekindergarten.png' ); ?>" alt="親子活動のイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-dot-yellow.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#daily">幼児クラス</a>
        <a href="#care">預かり保育</a>
        <a href="#point">生活のポイント</a>
      </nav>

      <section class="page-section soft-panel cream-panel" id="daily">
        <div class="section-heading section-heading--left">
          <h2>幼児クラスの1日</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <div class="schedule-track">
          <article class="schedule-step">
            <div class="schedule-time">7:30</div>
            <div><h3>順次登園・預かり保育</h3><p>朝の支度を整え、先生や友だちとゆったり過ごします。</p></div>
            <img src="<?php echo aiji_asset( 'images/card-admission.png' ); ?>" alt="登園のイメージ">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">9:30</div>
            <div><h3>朝の会・クラス活動</h3><p>歌、制作、文字や数、園庭遊びなど、年齢に合わせた活動を行います。</p></div>
            <img src="<?php echo aiji_asset( 'images/philosophy-craft-circle.png' ); ?>" alt="制作活動のイメージ">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">12:00</div>
            <div><h3>昼食</h3><p>給食を通して、食べる楽しさや食事のマナーを身につけます。</p></div>
            <img src="<?php echo aiji_asset( 'images/card-parenting.png' ); ?>" alt="昼食のイメージ">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">13:00</div>
            <div><h3>午後の活動</h3><p>外遊び、絵本、制作の続きなど、落ち着いた時間と遊びの時間を組み合わせます。</p></div>
            <img src="<?php echo aiji_asset( 'images/philosophy-bubbles-circle.png' ); ?>" alt="外遊びのイメージ">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">14:00</div>
            <div><h3>降園・預かり保育開始</h3><p>通常降園後は、必要に応じて預かり保育へつながります。</p></div>
            <img src="<?php echo aiji_asset( 'images/news-campus.png' ); ?>" alt="園舎のイメージ">
          </article>
        </div>
      </section>

      <section class="page-section" id="care">
        <div class="value-grid">
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/icon-bag.png' ); ?>" alt="" aria-hidden="true">
            <h3>朝の預かり</h3>
            <p>早い時間の登園が必要なご家庭向けの導線を掲載します。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/icon-heart.png' ); ?>" alt="" aria-hidden="true">
            <h3>午後の預かり</h3>
            <p>降園後のおやつ、遊び、休息の流れを整理します。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/icon-sprout.png' ); ?>" alt="" aria-hidden="true">
            <h3>長期休暇</h3>
            <p>夏・冬・春休み中の保育時間や利用条件を掲載します。</p>
          </article>
        </div>
      </section>

      <section class="page-section soft-panel split-section" id="point">
        <div class="text-stack">
          <div class="section-heading section-heading--left">
            <h2>生活のポイント</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>
            1日の中で、子どもたちは遊び・学び・食事・休息をバランスよく経験します。
            正課や行事だけでなく、身支度や片付けなどの生活習慣も大切にしています。
          </p>
        </div>
        <figure class="photo-card">
          <img src="<?php echo aiji_asset( 'images/hero-children-running.png' ); ?>" alt="園庭遊びのイメージ">
        </figure>
      </section>
    </main>

<?php get_footer(); ?>
