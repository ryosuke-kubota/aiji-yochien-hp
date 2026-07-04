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
            早朝保育は7:30から、延長保育は18:30まで。
            長時間保育と送迎バスで、働くご家庭の毎日もしっかり支えます。
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
            <div><h3>早朝保育</h3><p>早い時間の登園にも対応。先生や友だちとゆったり過ごします。</p></div>
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="登園のイメージ">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">8:30</div>
            <div><h3>登園・自由あそび</h3><p>朝の支度を整えたら、9:30まで好きな遊びをじっくり楽しみます。</p></div>
            <img src="<?php echo aiji_asset( 'images/hero-children-running.png' ); ?>" alt="自由あそびのイメージ">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">10:00</div>
            <div><h3>設定保育</h3><p>英語・体育・音楽などのレッスンや制作を、年齢に合わせて行います。</p></div>
            <img src="<?php echo aiji_asset( 'images/philosophy-craft-circle.png' ); ?>" alt="レッスンのイメージ">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">12:00</div>
            <div><h3>お弁当</h3><p>みんなで楽しく食べながら、食事のマナーも身につけます。</p></div>
            <img src="<?php echo aiji_asset( 'images/card-icon-lunch.png' ); ?>" alt="お弁当のイメージ">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">13:00</div>
            <div><h3>自由あそび・保育</h3><p>外遊びや絵本など、落ち着いた時間と遊びの時間を組み合わせます。</p></div>
            <img src="<?php echo aiji_asset( 'images/philosophy-bubbles-circle.png' ); ?>" alt="外遊びのイメージ">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">14:30</div>
            <div><h3>降園・延長保育</h3><p>月・火・木・金は14:30、水曜は13:30降園。延長保育は18:30までです。</p></div>
            <img src="<?php echo aiji_asset( 'images/card-icon-about-building.png' ); ?>" alt="園舎のイメージ">
          </article>
        </div>
      </section>

      <section class="page-section" id="care">
        <div class="value-grid">
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="" aria-hidden="true">
            <h3>早朝保育</h3>
            <p>朝7:30から受け入れ。早い時間の登園が必要なご家庭も安心です。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-lunch.png' ); ?>" alt="" aria-hidden="true">
            <h3>延長保育</h3>
            <p>降園後は18:30まで延長保育。お仕事帰りのお迎えにも対応します。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-lesson-swimming.png' ); ?>" alt="" aria-hidden="true">
            <h3>夏期保育</h3>
            <p>夏休み中も夏期保育を実施。お泊まり保育など夏ならではの体験も。</p>
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
