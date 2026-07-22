<?php
/**
 * 園での生活（スラッグ: annual）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>園での生活</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <h1>園での生活</h1>
          <p class="subpage-hero__lead">
            朝7:30の早朝保育から18:30の延長保育まで。
            登園から降園までの毎日の流れと、安心の預かり体制をご紹介します。
          </p>
          <a class="button button--yellow" href="<?php echo aiji_page_url( 'schedule' ); ?>">入園のご案内も見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--annual">
          <img src="<?php echo aiji_asset( 'images/hero-main.jpg' ); ?>" alt="園庭で走る子どもたちのイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#daily">1日の流れ</a>
        <a href="#care">預かり保育</a>
        <a href="<?php echo aiji_page_url( 'events' ); ?>">年間行事へ</a>
      </nav>

      <section class="page-section soft-panel cream-panel" id="daily">
        <div class="section-heading section-heading--left">
          <h2>1日の流れ</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <div class="schedule-track">
          <?php // assets/images/photo-day-{名前}.jpg を置くと各時間帯の写真が自動で差し替わる ?>
          <article class="schedule-step">
            <div class="schedule-time">7:30</div>
            <div><h3>早朝保育</h3><p>早い時間の登園にも対応。先生や友だちとゆったり過ごします。</p></div>
            <img src="<?php echo aiji_photo( 'day-morning' ) ?: aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="早朝保育のようす">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">8:30</div>
            <div><h3>登園・自由あそび</h3><p>朝の支度を整えたら、9:30まで好きな遊びをじっくり楽しみます。</p></div>
            <img src="<?php echo aiji_photo( 'day-arrival' ) ?: aiji_asset( 'images/hero-children-running.png' ); ?>" alt="登園・自由あそびのようす">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">10:00</div>
            <div><h3>設定保育</h3><p>英語・体育・音楽などのレッスンや制作を、年齢に合わせて行います。</p></div>
            <img src="<?php echo aiji_photo( 'day-lesson' ) ?: aiji_asset( 'images/philosophy-craft-circle.png' ); ?>" alt="設定保育のようす">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">12:00</div>
            <div><h3>お弁当</h3><p>みんなで楽しく食べながら、食事のマナーも身につけます。</p></div>
            <img src="<?php echo aiji_photo( 'day-lunch' ) ?: aiji_asset( 'images/card-icon-lunch.png' ); ?>" alt="お弁当の時間のようす">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">13:00</div>
            <div><h3>自由あそび・保育</h3><p>外遊びや絵本など、落ち着いた時間と遊びの時間を組み合わせます。</p></div>
            <img src="<?php echo aiji_photo( 'day-play' ) ?: aiji_asset( 'images/philosophy-bubbles-circle.png' ); ?>" alt="自由あそびのようす">
          </article>
          <article class="schedule-step">
            <div class="schedule-time">14:30</div>
            <div><h3>降園・延長保育</h3><p>月・火・木・金は14:30、水曜は13:30降園。延長保育は18:30までです。</p></div>
            <img src="<?php echo aiji_photo( 'day-return' ) ?: aiji_asset( 'images/card-icon-about-building.png' ); ?>" alt="降園のようす">
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
            <p>降園後は18:30まで延長保育。当日のお電話でも利用でき、手作りおやつを提供します。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-lesson-swimming.png' ); ?>" alt="" aria-hidden="true">
            <h3>土曜・長期休みの預かり</h3>
            <p>土曜は8:00〜15:00、夏・冬・春休み中は7:30〜18:30で預かり保育を実施します。</p>
          </article>
        </div>
      </section>

      <section class="page-cta">
        <div>
          <h2>年間行事もご覧ください</h2>
          <p>入園式から卒園式まで、1年の行事とフォトギャラリーを別ページでご紹介しています。</p>
        </div>
        <a class="button button--yellow" href="<?php echo aiji_page_url( 'events' ); ?>">年間行事へ<span aria-hidden="true">›</span></a>
      </section>

    </main>

<?php get_footer(); ?>
