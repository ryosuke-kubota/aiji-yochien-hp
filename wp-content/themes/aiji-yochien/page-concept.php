<?php
/**
 * 教育について（スラッグ: concept）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>教育について</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <p class="eyebrow"><img src="<?php echo aiji_asset( 'images/icon-sprout.png' ); ?>" alt="" aria-hidden="true">Concept</p>
          <h1>教育について</h1>
          <p class="subpage-hero__lead">
            遊びのなかで学んで考える幼児教育。
            子どもの好奇心をぐんぐんアップさせるバランスの取れたカリキュラムで、
            楽しみながら「できた！」に出会う保育を行っています。
          </p>
          <a class="button button--primary" href="<?php echo aiji_page_url( 'schedule' ); ?>">入園のご案内を見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--concept">
          <img src="<?php echo aiji_asset( 'images/philosophy-craft-circle.png' ); ?>" alt="制作活動をする園児のイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-sprinkles-blue.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#summary">特色</a>
        <a href="#regular">カリキュラム</a>
        <a href="#after">子育てサポート</a>
        <a href="#lunch">お昼・食育</a>
      </nav>

      <section class="page-section" id="summary">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>教育の特色</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>基本的な生活習慣を土台に、好奇心・創造性・考える力・文字や数の基礎を、遊びを通してバランスよく育てます。中でも英語レッスンと体育レッスンは、他の園にはない当園のイチオシです。</p>
        </div>
        <div class="value-grid">
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-about-craft.png' ); ?>" alt="" aria-hidden="true">
            <h3>遊びのなかで学ぶ</h3>
            <p>右脳（知恵）と左脳（知識）をバランスよく使い、遊びを通して学びにつながる基礎を培います。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-consult.png' ); ?>" alt="" aria-hidden="true">
            <h3>一人一人と丁寧に</h3>
            <p>「先生！だいすき！」の信頼関係を土台に、安心して挑戦できる環境をつくります。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-annual-season.png' ); ?>" alt="" aria-hidden="true">
            <h3>伝統行事も大切に</h3>
            <p>季節の行事や愛児農園での栽培体験など、心を育てる体験を保育に取り入れています。</p>
          </article>
        </div>
      </section>

      <section class="page-section soft-panel cream-panel" id="regular">
        <div class="section-heading section-heading--left">
          <h2>カリキュラム</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <div class="lesson-grid">
          <article class="lesson-card lesson-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-lesson-english.png' ); ?>" alt="英語レッスンのイメージ">
            <h3>英語レッスン<span class="tag tag--blue">イチオシ</span></h3>
            <p>物の名前・歌・色カードを使って覚える、当園自慢のレッスンです。</p>
          </article>
          <article class="lesson-card lesson-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-lesson-gym.png' ); ?>" alt="体育レッスンのイメージ">
            <h3>体育レッスン<span class="tag tag--green">イチオシ</span></h3>
            <p>なわとび・鉄棒・トランポリンで楽しみながら、たくましい体をつくります。</p>
          </article>
          <article class="lesson-card lesson-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-lesson-music.png' ); ?>" alt="音楽レッスンのイメージ">
            <h3>音楽レッスン</h3>
            <p>楽器を使ってリズム感を養い、みんなで合わせる楽しさを経験します。</p>
          </article>
          <article class="lesson-card lesson-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-lesson-art.png' ); ?>" alt="作文レッスンのイメージ">
            <h3>作文レッスン</h3>
            <p>今覚えている言葉で作文をつくり、表現する楽しさを育てます。</p>
          </article>
          <article class="lesson-card lesson-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-lesson-numbers.png' ); ?>" alt="数のレッスンのイメージ">
            <h3>数のレッスン</h3>
            <p>かんたんな足し算と引き算のおけいこで、学びの芽を育てます。</p>
          </article>
          <article class="lesson-card lesson-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-annual-season.png' ); ?>" alt="愛児農園のイメージ">
            <h3>愛児農園</h3>
            <p>じゃが芋・さつま芋・玉ねぎ・大根作りに挑戦。収穫の喜びを味わいます。</p>
          </article>
        </div>
      </section>

      <section class="page-section" id="after">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>子育てサポート</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>長時間保育と送迎バスで、毎日の通園と子育てをしっかり支えます。</p>
        </div>
        <div class="event-grid">
          <article class="event-card event-card--icon"><img src="<?php echo aiji_asset( 'images/card-icon-annual-calendar.png' ); ?>" alt="" aria-hidden="true"><h3>預かり保育</h3><p>早朝保育7:30から、延長保育は18:30まで。長時間保育に対応します。</p></article>
          <article class="event-card event-card--icon"><img src="<?php echo aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="" aria-hidden="true"><h3>送迎バス</h3><p>送迎バスを運行。ご自宅への搬送サービスもあります。</p></article>
        </div>
      </section>

      <section class="page-section soft-panel split-section" id="lunch">
        <div class="text-stack">
          <div class="section-heading section-heading--left">
            <h2>お昼の時間・食育</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>
            12時からはお弁当の時間。みんなで楽しく食べる経験を大切にしています。
            愛児農園で育てた野菜の収穫など、食育につながる体験も保育に取り入れています。
          </p>
        </div>
        <figure class="photo-card photo-card--icon">
          <img src="<?php echo aiji_asset( 'images/card-icon-lunch.png' ); ?>" alt="お弁当や食育のイメージ">
        </figure>
      </section>
    </main>

<?php get_footer(); ?>
