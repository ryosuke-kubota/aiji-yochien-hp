<?php
/**
 * 園の紹介（スラッグ: about）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>園の紹介</span>
      </nav>

      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <p class="eyebrow"><img src="<?php echo aiji_asset( 'images/icon-house.png' ); ?>" alt="" aria-hidden="true">About</p>
          <h1>園の紹介</h1>
          <p class="subpage-hero__lead">
            子どもたち一人ひとりの毎日を見守り、家庭や地域とともに育てる園でありたい。
            愛児幼稚園の考え方と、安心して過ごせる環境をまとめます。
          </p>
          <a class="button button--primary" href="<?php echo aiji_page_url( 'guide' ); ?>">見学・入園について<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--about">
          <img src="<?php echo aiji_asset( 'images/news-campus.png' ); ?>" alt="園舎と園庭のイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#message">ごあいさつ</a>
        <a href="#policy">教育理念</a>
        <a href="#overview">園の概要</a>
        <a href="#facility">施設紹介</a>
      </nav>

      <section class="page-section soft-panel cream-panel split-section" id="message">
        <div class="text-stack">
          <div class="section-heading section-heading--left">
            <h2>ごあいさつ</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p class="section-lead">心豊かに、やさしく、たくましく。</p>
          <p>
            愛児幼稚園では、毎日の遊びや行事、制作、自然とのふれあいを通して、
            子どもたちの「やってみたい」という気持ちを育みます。
          </p>
          <p>
            知識を教え込むのではなく、友だちや先生との関わりの中で自分で考え、
            表現し、最後まで取り組む力を伸ばすことを大切にします。
          </p>
        </div>
        <figure class="photo-card">
          <img src="<?php echo aiji_asset( 'images/hero-children-running.png' ); ?>" alt="園庭で遊ぶ子どもたち">
        </figure>
      </section>

      <section class="page-section" id="policy">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>教育理念</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>徳・体・知のバランスを整え、幼児期に必要な心と体と学びの基礎を育てます。</p>
        </div>
        <div class="value-grid">
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/icon-heart.png' ); ?>" alt="" aria-hidden="true">
            <h3>徳</h3>
            <p>素直な心、感謝する心、思いやりの心を日々の生活の中で育みます。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/icon-sprout.png' ); ?>" alt="" aria-hidden="true">
            <h3>体</h3>
            <p>園庭遊びや運動あそびを通して、健やかでたくましい体をつくります。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/icon-book.png' ); ?>" alt="" aria-hidden="true">
            <h3>知</h3>
            <p>制作、音楽、言葉、数への興味を広げ、学ぶ楽しさを感じる環境を整えます。</p>
          </article>
        </div>
      </section>

      <section class="page-section soft-panel" id="overview">
        <div class="section-heading section-heading--left">
          <h2>園の概要</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <dl class="overview-list">
          <dt>名称</dt><dd>学校法人 愛児学園　愛児幼稚園</dd>
          <dt>対象</dt><dd>満3歳児・3歳児・4歳児・5歳児</dd>
          <dt>保育時間</dt><dd>通常保育、預かり保育、長期休暇中の保育を整理して掲載する想定です。</dd>
          <dt>給食</dt><dd>栄養バランスや季節感を大切にした献立を紹介します。</dd>
          <dt>通園</dt><dd>徒歩・送迎・バスなど、実際の運用に合わせて掲載します。</dd>
        </dl>
      </section>

      <section class="page-section" id="facility">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>施設紹介</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>安全性と、子どもたちが自分から遊びたくなる環境づくりを伝えるエリアです。</p>
        </div>
        <div class="facility-grid">
          <article class="facility-card">
            <img src="<?php echo aiji_asset( 'images/news-campus.png' ); ?>" alt="園舎のイメージ">
            <h3>園舎・保育室</h3>
            <p>制作やごっこ遊び、音楽活動など、年齢に合わせた活動が広がる保育室。</p>
          </article>
          <article class="facility-card">
            <img src="<?php echo aiji_asset( 'images/hero-children-running.png' ); ?>" alt="園庭のイメージ">
            <h3>園庭</h3>
            <p>走る、登る、砂で遊ぶなど、体を動かしながら友だちとの関わりを深めます。</p>
          </article>
          <article class="facility-card">
            <img src="<?php echo aiji_asset( 'images/philosophy-craft-circle.png' ); ?>" alt="制作活動のイメージ">
            <h3>制作スペース</h3>
            <p>絵画や工作を通して、手を動かす楽しさと表現する力を育てます。</p>
          </article>
          <article class="facility-card">
            <img src="<?php echo aiji_asset( 'images/philosophy-bubbles-circle.png' ); ?>" alt="外遊びのイメージ">
            <h3>季節のあそび</h3>
            <p>自然や季節を感じる活動を、日常の保育と行事に取り入れます。</p>
          </article>
        </div>
      </section>

      <section class="page-cta">
        <div>
          <h2>教育についてもあわせてご覧ください</h2>
          <p>正課、課外活動、遊び場、給食など、毎日の保育内容を整理しています。</p>
        </div>
        <a class="button button--ghost" href="<?php echo aiji_page_url( 'concept' ); ?>">教育についてへ<span aria-hidden="true">›</span></a>
      </section>
    </main>

<?php get_footer(); ?>
