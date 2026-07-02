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
            本物にふれる体験、専門講師による活動、思いきり遊べる環境。
            子どもたちが楽しみながら「できた！」に出会う保育を紹介します。
          </p>
          <a class="button button--primary" href="<?php echo aiji_page_url( 'schedule' ); ?>">入園のご案内を見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual">
          <img src="<?php echo aiji_asset( 'images/philosophy-craft-circle.png' ); ?>" alt="制作活動をする園児のイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-sprinkles-blue.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#summary">特色</a>
        <a href="#regular">正課</a>
        <a href="#after">課外活動</a>
        <a href="#lunch">給食</a>
      </nav>

      <section class="page-section" id="summary">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>教育の特色</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>正課、課外、遊び場を分けて見せることで、保護者が園生活を具体的に想像できる構成です。</p>
        </div>
        <div class="value-grid">
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/icon-book.png' ); ?>" alt="" aria-hidden="true">
            <h3>充実した正課</h3>
            <p>体を動かす、英語に親しむ、制作するなど、年齢に合わせた活動を日々の保育に組み込みます。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/icon-bag.png' ); ?>" alt="" aria-hidden="true">
            <h3>園内で学べる課外</h3>
            <p>預かり保育や降園後の時間ともつながる、通いやすい課外活動の導線を用意します。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/icon-sprout.png' ); ?>" alt="" aria-hidden="true">
            <h3>遊び込める環境</h3>
            <p>園庭や保育室での自由な遊びを通して、想像力、体力、友だちとの関わりを育てます。</p>
          </article>
        </div>
      </section>

      <section class="page-section soft-panel cream-panel" id="regular">
        <div class="section-heading section-heading--left">
          <h2>正課</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <div class="lesson-grid">
          <article class="lesson-card">
            <img src="<?php echo aiji_asset( 'images/hero-children-running.png' ); ?>" alt="体育あそびのイメージ">
            <h3>体育あそび</h3>
            <p>走る、跳ぶ、登るなど、基礎的な運動を楽しく経験します。</p>
          </article>
          <article class="lesson-card">
            <img src="<?php echo aiji_asset( 'images/philosophy-bubbles-circle.png' ); ?>" alt="英語あそびのイメージ">
            <h3>英語あそび</h3>
            <p>歌やゲームを通して、言葉や異文化に自然に親しみます。</p>
          </article>
          <article class="lesson-card">
            <img src="<?php echo aiji_asset( 'images/philosophy-craft-circle.png' ); ?>" alt="絵画制作のイメージ">
            <h3>絵画・制作</h3>
            <p>素材や道具に触れながら、作る楽しさと表現する力を伸ばします。</p>
          </article>
          <article class="lesson-card">
            <img src="<?php echo aiji_asset( 'images/card-prekindergarten.png' ); ?>" alt="数や文字への興味のイメージ">
            <h3>数・文字への興味</h3>
            <p>遊びや教材を通して、小学校につながる学びの芽を育てます。</p>
          </article>
        </div>
      </section>

      <section class="page-section" id="after">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>課外活動</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>活動名・対象年齢・実施曜日を掲載できるカード型のエリアです。</p>
        </div>
        <div class="event-grid">
          <article class="event-card"><h3>スイミング</h3><p>水に親しみ、できることが増える喜びを感じる活動。</p></article>
          <article class="event-card"><h3>音楽・リズム</h3><p>歌や楽器、和太鼓などを通して、みんなで合わせる楽しさを経験。</p></article>
          <article class="event-card"><h3>作法・所作</h3><p>あいさつや姿勢、相手を思うふるまいを身につける活動。</p></article>
          <article class="event-card"><h3>造形・クラフト</h3><p>卒園制作や季節の制作など、思い出に残る表現活動。</p></article>
        </div>
      </section>

      <section class="page-section soft-panel split-section" id="lunch">
        <div class="text-stack">
          <div class="section-heading section-heading--left">
            <h2>給食</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>
            毎日の給食は、旬の食材や行事食を取り入れながら、楽しく食べる経験を大切にします。
            アレルギー対応などの相談導線もここに配置します。
          </p>
        </div>
        <figure class="photo-card">
          <img src="<?php echo aiji_asset( 'images/card-parenting.png' ); ?>" alt="給食や食育のイメージ">
        </figure>
      </section>
    </main>

<?php get_footer(); ?>
