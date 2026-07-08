<?php
/**
 * トップページ
 */

get_header();

// 重要なお知らせ: 先頭固定表示の投稿、なければ最新投稿
$aiji_sticky    = get_option( 'sticky_posts', array() );
$aiji_important = null;
if ( $aiji_sticky ) {
	$found = get_posts(
		array(
			'post__in'            => $aiji_sticky,
			'posts_per_page'      => 1,
			'ignore_sticky_posts' => 1,
		)
	);
	$aiji_important = $found ? $found[0] : null;
}
if ( ! $aiji_important ) {
	$latest         = get_posts( array( 'posts_per_page' => 1 ) );
	$aiji_important = $latest ? $latest[0] : null;
}

// お知らせ一覧: 最新5件
$aiji_news = get_posts( array( 'posts_per_page' => 5 ) );

$aiji_news_page_url = get_option( 'page_for_posts' ) ? get_permalink( (int) get_option( 'page_for_posts' ) ) : home_url( '/' );
?>

    <main>
      <section class="hero section-anchor" id="top">
        <div class="hero__copy">
          <p class="hero__kicker"><span class="hero__kicker-soft">やさしさ</span>　<span class="hero__kicker-strong">つよさ</span></p>
          <h1>かがやく未来へ</h1>
          <p class="hero__lead">
            子どもたち一人ひとりの個性を大切にし、<br>
            心も体も健やかに育つ環境をつくります。
          </p>
          <div class="hero__buttons">
            <a class="button button--primary button--pink" href="<?php echo aiji_page_url( 'schedule' ); ?>">入園をご検討の方へ<span aria-hidden="true">›</span></a>
            <a class="button button--ghost" href="<?php echo aiji_page_url( 'about' ); ?>">園について知る<span aria-hidden="true">›</span></a>
          </div>
        </div>
        <div class="hero__visual" aria-label="園庭で遊ぶ園児たちと愛児幼稚園の園舎の写真">
          <img src="<?php echo aiji_asset( 'images/hero-main.jpg' ); ?>" alt="">
        </div>
        <img class="deco deco--bird" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
        <img class="deco deco-dot deco-dot--cream" src="<?php echo aiji_asset( 'images/deco-dot-yellow.png' ); ?>" alt="" aria-hidden="true">
        <img class="deco deco-leaf" src="<?php echo aiji_asset( 'images/deco-leaf-sprig.png' ); ?>" alt="" aria-hidden="true">
        <img class="deco deco-flower deco-flower--hero" src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">
      </section>

      <?php if ( $aiji_important ) : ?>
      <section class="important" aria-label="重要なお知らせ">
        <div class="important__label">
          <img class="important__bell" src="<?php echo aiji_asset( 'images/deco-bell.png' ); ?>" alt="" aria-hidden="true">
          <span>重要なお知らせ</span>
        </div>
        <div class="important__body" data-announcement>
          <p class="important__title"><span class="important__tag">重要</span><?php echo esc_html( get_the_title( $aiji_important ) ); ?></p>
          <p><?php echo esc_html( wp_strip_all_tags( get_the_excerpt( $aiji_important ) ) ); ?></p>
        </div>
        <a class="important__more" href="<?php echo esc_url( get_permalink( $aiji_important ) ); ?>">
          詳しく見る
          <span aria-hidden="true">›</span>
        </a>
      </section>
      <?php endif; ?>

      <section class="news-panel section-anchor" id="news">
        <div class="news-panel__media">
          <div class="section-heading section-heading--left section-heading--inline">
            <h2>お知らせ</h2>
            <img class="heading-sprout" src="<?php echo aiji_asset( 'images/icon-sprout.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <figure class="blob-photo blob-photo--small">
            <img src="<?php echo aiji_asset( 'images/kousha.jpg' ); ?>" alt="愛児幼稚園の園舎">
          </figure>
        </div>
        <div class="news-list" aria-label="お知らせ一覧">
          <?php foreach ( $aiji_news as $aiji_post ) : ?>
          <a class="news-row" href="<?php echo esc_url( get_permalink( $aiji_post ) ); ?>">
            <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d', $aiji_post ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d', $aiji_post ) ); ?></time>
            <span class="tag <?php echo esc_attr( aiji_tag_class( $aiji_post ) ); ?>"><?php echo esc_html( aiji_tag_label( $aiji_post ) ); ?></span>
            <span><?php echo esc_html( get_the_title( $aiji_post ) ); ?></span>
            <b aria-hidden="true">›</b>
          </a>
          <?php endforeach; ?>
          <a class="button button--ghost news-list__button" href="<?php echo esc_url( $aiji_news_page_url ); ?>">お知らせ一覧を見る<span aria-hidden="true">›</span></a>
        </div>
      </section>

      <div class="story-band">
        <img class="story-band__deco story-band__deco--tree story-band__deco--tree-a" src="<?php echo aiji_asset( 'images/deco-tree-round-ai.png' ); ?>" alt="" aria-hidden="true">
        <img class="story-band__deco story-band__deco--tree story-band__deco--tree-b" src="<?php echo aiji_asset( 'images/deco-tree-round-ai.png' ); ?>" alt="" aria-hidden="true">
        <img class="story-band__deco story-band__deco--tree story-band__deco--tree-c" src="<?php echo aiji_asset( 'images/deco-tree-round-ai.png' ); ?>" alt="" aria-hidden="true">
        <img class="story-band__deco story-band__deco--sprinkles" src="<?php echo aiji_asset( 'images/deco-sprinkles-blue.png' ); ?>" alt="" aria-hidden="true">
        <img class="story-band__deco story-band__deco--flower" src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">
        <img class="story-band__deco story-band__deco--flower2" src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">
        <img class="story-band__deco story-band__deco--house" src="<?php echo aiji_asset( 'images/icon-house.png' ); ?>" alt="" aria-hidden="true">

        <section class="philosophy section-anchor" id="about">
          <div class="philosophy__copy">
            <div class="section-heading section-heading--left">
              <h2>愛児幼稚園の想い</h2>
              <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
            </div>
            <p class="section-lead">思いやり、優しい心。<br>健康で明るく、体力あふれ、<br>想像力たくましい子どもへ。</p>
            <p>
              愛児幼稚園は昭和26年の開園以来、保護者や地域の皆さまに支えられながら、
              「楽しい」「安心できる」幼稚園を目指してきました。
            </p>
            <p>
              遊びのなかで学んで考える幼児教育を大切に、一人一人の子どもと丁寧に向き合い、生きる力の基礎を培います。
            </p>
            <a class="button button--ghost" href="<?php echo aiji_page_url( 'concept' ); ?>">教育について詳しく見る<span aria-hidden="true">›</span></a>
          </div>
          <div class="philosophy__photos">
            <figure class="round-photo round-photo--large">
              <img src="<?php echo aiji_asset( 'images/philosophy-craft-circle.png' ); ?>" alt="制作活動をする園児">
            </figure>
            <figure class="round-photo round-photo--small">
              <img src="<?php echo aiji_asset( 'images/philosophy-bubbles-circle.png' ); ?>" alt="しゃぼん玉で遊ぶ園児">
            </figure>
            <img class="deco deco-flower deco-flower--one" src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">
            <img class="deco deco-flower deco-flower--two" src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">
            <img class="deco deco-sprinkles" src="<?php echo aiji_asset( 'images/deco-sprinkles-blue.png' ); ?>" alt="" aria-hidden="true">
          </div>
        </section>

        <section class="features section-anchor" id="education">
          <div class="section-heading section-heading--center">
            <h2>愛児幼稚園の特長</h2>
            <img class="heading-sprout" src="<?php echo aiji_asset( 'images/icon-sprout.png' ); ?>" alt="" aria-hidden="true">
            <img class="heading-dots heading-dots--feature" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <div class="feature-grid">
            <article class="feature-card">
              <img class="feature-card__icon" src="<?php echo aiji_asset( 'images/icon-book.png' ); ?>" alt="" aria-hidden="true">
              <h3>英語レッスン<span class="tag tag--blue">イチオシ</span></h3>
              <p>約30年続く外国人講師の英会話。歌やカードで楽しく学びます。</p>
              <a class="mini-circle mini-circle--blue" href="<?php echo aiji_page_url( 'concept' ); ?>" aria-label="英語レッスンを詳しく見る">›</a>
            </article>
            <article class="feature-card">
              <img class="feature-card__icon" src="<?php echo aiji_asset( 'images/icon-sprout.png' ); ?>" alt="" aria-hidden="true">
              <h3>体育レッスン<span class="tag tag--green">イチオシ</span></h3>
              <p>なわとび・鉄棒・トランポリンで、楽しみながら体力づくり。</p>
              <a class="mini-circle mini-circle--green" href="<?php echo aiji_page_url( 'concept' ); ?>" aria-label="体育レッスンを詳しく見る">›</a>
            </article>
            <article class="feature-card">
              <img class="feature-card__icon" src="<?php echo aiji_asset( 'images/icon-heart.png' ); ?>" alt="" aria-hidden="true">
              <h3>2歳児から入園OK</h3>
              <p>2歳児から受け入れ。長時間保育で子育てを支えます。</p>
              <a class="mini-circle mini-circle--pink" href="<?php echo aiji_page_url( 'guide' ); ?>" aria-label="入園について詳しく見る">›</a>
            </article>
            <article class="feature-card">
              <img class="feature-card__icon" src="<?php echo aiji_asset( 'images/icon-bag.png' ); ?>" alt="" aria-hidden="true">
              <h3>送迎バス・安心設備</h3>
              <p>送迎バスあり。24時間セキュリティと耐震補強施設で安心です。</p>
              <a class="mini-circle mini-circle--yellow" href="<?php echo aiji_page_url( 'about' ); ?>" aria-label="園の設備を詳しく見る">›</a>
            </article>
          </div>
        </section>
      </div>

      <section class="pickup section-anchor" id="lessons">
        <div class="section-heading section-heading--center">
          <h2>愛児幼稚園の<br class="sp-br">イチオシレッスン</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <p class="pickup__lead">他の園にはない、当園自慢の2つのレッスン。遊びのなかで学んで考える力を育てます。</p>
        <div class="pickup-grid">
          <article class="pickup-card pickup-card--english">
            <figure class="pickup-card__photo">
              <img src="<?php echo aiji_photo( 'lesson-english' ) ?: aiji_asset( 'images/card-prekindergarten.png' ); ?>" alt="英語レッスンを楽しむ園児">
              <span class="pickup-card__badge tag tag--blue">イチオシ</span>
            </figure>
            <div class="pickup-card__body">
              <h3>英語レッスン</h3>
              <p>約30年前から外国人講師による英会話レッスンを実施。物の名前・歌・色カードを使って、遊びながら自然に英語を覚えます。「できた！」「言えた！」の積み重ねが、ことばへの好奇心を大きく育てます。</p>
              <a class="button button--small button--blue" href="<?php echo aiji_page_url( 'concept' ); ?>#regular">レッスンを詳しく見る<span aria-hidden="true">›</span></a>
            </div>
          </article>
          <article class="pickup-card pickup-card--gym">
            <figure class="pickup-card__photo">
              <img src="<?php echo aiji_photo( 'lesson-gym' ) ?: aiji_asset( 'images/hero-children-running.png' ); ?>" alt="体育レッスンで走る園児たち">
              <span class="pickup-card__badge tag tag--green">イチオシ</span>
            </figure>
            <div class="pickup-card__body">
              <h3>体育レッスン</h3>
              <p>体育専任講師のもと、なわとび・鉄棒・トランポリンに楽しく挑戦。体を思いきり動かす毎日が、健康で明るく、体力あふれるたくましい体をつくります。</p>
              <a class="button button--small button--primary" href="<?php echo aiji_page_url( 'concept' ); ?>#regular">レッスンを詳しく見る<span aria-hidden="true">›</span></a>
            </div>
          </article>
        </div>
      </section>

      <section class="link-cards">
        <article class="link-card link-card--pink section-anchor" id="admission">
          <div class="link-card__copy">
            <h2>入園を<br>ご検討の方へ</h2>
            <p>入園の流れや募集要項など、詳しい情報はこちらから。</p>
            <a class="button button--small button--pink" href="<?php echo aiji_page_url( 'schedule' ); ?>">詳しく見る<span aria-hidden="true">›</span></a>
          </div>
          <img src="<?php echo aiji_photo( 'hero-schedule' ) ?: aiji_asset( 'images/card-prekindergarten.png' ); ?>" alt="入園式のようす">
        </article>
        <article class="link-card link-card--yellow section-anchor" id="pre">
          <div class="link-card__copy">
            <h2>未就園児の方へ</h2>
            <p>2歳児クラスや、親子で参加できる活動のご案内はこちら。</p>
            <a class="button button--small button--yellow" href="<?php echo aiji_page_url( 'guide' ); ?>">詳しく見る<span aria-hidden="true">›</span></a>
          </div>
          <img src="<?php echo aiji_asset( 'images/card-admission.png' ); ?>" alt="未就園児の方へのイメージ写真">
        </article>
        <article class="link-card link-card--blue section-anchor" id="events-link">
          <div class="link-card__copy">
            <h2>年間行事</h2>
            <p>入園式から卒園式まで、1年の行事を写真とあわせてご紹介。</p>
            <a class="button button--small button--blue" href="<?php echo aiji_page_url( 'events' ); ?>">詳しく見る<span aria-hidden="true">›</span></a>
          </div>
          <img src="<?php echo aiji_photo( 'hero-events' ) ?: aiji_asset( 'images/hero-children-running.png' ); ?>" alt="運動会のようす">
        </article>
        <img class="deco-card-bird" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
      </section>

      <section class="closing section-anchor" id="life">
        <div class="closing__panel">
          <img class="closing__deco closing__deco--flower" src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">
          <img class="closing__deco closing__deco--bird" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
          <img class="closing__deco closing__deco--leaf" src="<?php echo aiji_asset( 'images/deco-leaf-sprig.png' ); ?>" alt="" aria-hidden="true">
          <p class="closing__eyebrow">園見学・未就園児体験 随時受付中</p>
          <h2>子どもたちの笑顔が、未来をつくる。</h2>
          <p class="closing__lead">
            愛児幼稚園は、これからも子どもたちの成長を見守り続けます。<br>
            園の雰囲気は、実際に見ていただくのがいちばん。お気軽にお越しください。
          </p>
          <div class="closing__actions">
            <a class="button button--primary" href="<?php echo aiji_page_url( 'guide' ); ?>#tour">園見学・体験のお申し込み<span aria-hidden="true">›</span></a>
            <a class="button button--pink" href="<?php echo aiji_page_url( 'guide' ); ?>#contact">お問い合わせ<span aria-hidden="true">›</span></a>
          </div>
          <p class="closing__tel">
            <span class="closing__tel-label">お電話でのお問い合わせ</span>
            <a href="tel:0666910502">06-6691-0502</a>
            <span class="closing__tel-note">受付時間 10:00〜17:00</span>
          </p>
        </div>
      </section>
    </main>

<?php get_footer(); ?>
