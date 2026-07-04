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
          <p class="eyebrow"><img src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">Annual Events</p>
          <h1>園での生活</h1>
          <p class="subpage-hero__lead">
            朝7:30の早朝保育から18:30の延長保育までの毎日の流れと、
            入園式、遠足、運動会など、成長が見える1年の行事をご紹介します。
          </p>
          <a class="button button--yellow" href="<?php echo aiji_page_url( 'schedule' ); ?>">入園のご案内も見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--annual">
          <img src="<?php echo aiji_asset( 'images/hero-children-running.png' ); ?>" alt="園庭で走る子どもたちのイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#daily">1日の流れ</a>
        <a href="#care">預かり保育</a>
        <a href="#spring">年間行事</a>
        <a href="#gallery">ギャラリー</a>
        <a href="#nature">愛児農園</a>
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

      <section class="page-section soft-panel" id="spring">
        <div class="section-heading section-heading--left">
          <h2>月別行事</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <div class="month-grid">
          <article class="month-card"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-guide-documents.png' ); ?>" alt="" aria-hidden="true"><h3>4月</h3><ul><li>入園式</li></ul></article>
          <article class="month-card"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-guide-consult.png' ); ?>" alt="" aria-hidden="true"><h3>5月</h3><ul><li>健康診断</li><li>プラネタリウム</li></ul></article>
          <article class="month-card"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-annual-season.png' ); ?>" alt="" aria-hidden="true"><h3>6月</h3><ul><li>保育参観</li><li>じゃがいも掘り</li></ul></article>
          <article class="month-card"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-lesson-swimming.png' ); ?>" alt="" aria-hidden="true"><h3>7月</h3><ul><li>プール開き</li><li>七夕まつり</li><li>盆踊り・夏期保育</li></ul></article>
          <article class="month-card" id="summer"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-about-building.png' ); ?>" alt="" aria-hidden="true"><h3>8月</h3><ul><li>夏期保育</li><li>お泊まり保育</li></ul></article>
          <article class="month-card"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-annual-calendar.png' ); ?>" alt="" aria-hidden="true"><h3>9月</h3><ul><li>2学期スタート</li></ul></article>
          <article class="month-card" id="autumn"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-lesson-gym.png' ); ?>" alt="" aria-hidden="true"><h3>10月</h3><ul><li>運動会</li><li>お芋掘り</li><li>秋の遠足</li></ul></article>
          <article class="month-card"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-about-craft.png' ); ?>" alt="" aria-hidden="true"><h3>11月</h3><ul><li>作品展</li></ul></article>
          <article class="month-card" id="winter"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-lesson-music.png' ); ?>" alt="" aria-hidden="true"><h3>12月</h3><ul><li>クリスマス会</li><li>おもちつき</li></ul></article>
          <article class="month-card"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-lesson-manners.png' ); ?>" alt="" aria-hidden="true"><h3>1月</h3><ul><li>3学期スタート</li><li>お正月あそび</li></ul></article>
          <article class="month-card"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-about-playground.png' ); ?>" alt="" aria-hidden="true"><h3>2月</h3><ul><li>豆まき</li><li>おゆうぎ会</li></ul></article>
          <article class="month-card"><img class="month-card__icon" src="<?php echo aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="" aria-hidden="true"><h3>3月</h3><ul><li>お別れ遠足</li><li>卒園式</li></ul></article>
        </div>
      </section>

      <section class="page-section" id="gallery">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>行事フォトギャラリー</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>行事の様子を写真でご紹介します。写真をクリックすると大きく表示されます。</p>
        </div>
        <div class="event-gallery">
          <figure class="event-gallery__item">
            <img src="<?php echo aiji_asset( 'images/hero-children-running.png' ); ?>" alt="運動会で走る子どもたち" loading="lazy">
            <figcaption>運動会</figcaption>
          </figure>
          <figure class="event-gallery__item">
            <img src="<?php echo aiji_asset( 'images/philosophy-bubbles-circle.png' ); ?>" alt="プール開き・水あそびの様子" loading="lazy">
            <figcaption>プール開き・水あそび</figcaption>
          </figure>
          <figure class="event-gallery__item">
            <img src="<?php echo aiji_asset( 'images/philosophy-craft-circle.png' ); ?>" alt="作品展の制作活動" loading="lazy">
            <figcaption>作品展</figcaption>
          </figure>
          <figure class="event-gallery__item">
            <img src="<?php echo aiji_asset( 'images/card-admission.png' ); ?>" alt="秋の遠足の様子" loading="lazy">
            <figcaption>秋の遠足</figcaption>
          </figure>
          <figure class="event-gallery__item">
            <img src="<?php echo aiji_asset( 'images/card-parenting.png' ); ?>" alt="保育参観・親子行事の様子" loading="lazy">
            <figcaption>保育参観</figcaption>
          </figure>
          <figure class="event-gallery__item">
            <img src="<?php echo aiji_asset( 'images/news-campus.png' ); ?>" alt="入園式を迎えた園舎" loading="lazy">
            <figcaption>入園式</figcaption>
          </figure>
        </div>
      </section>

      <section class="page-section split-section" id="nature">
        <div class="soft-panel text-stack">
          <div class="section-heading section-heading--left">
            <h2>愛児農園</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>
            愛児農園では、じゃが芋・さつま芋・玉ねぎ・大根作りに挑戦します。
            じゃがいも掘りやお芋掘りなど収穫の体験が、食べものへの感謝や食育につながっています。
          </p>
        </div>
        <figure class="photo-card">
          <img src="<?php echo aiji_asset( 'images/news-campus.png' ); ?>" alt="園庭と園舎のイメージ">
        </figure>
      </section>
    </main>

<?php get_footer(); ?>
