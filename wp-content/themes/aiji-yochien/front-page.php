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
            <a class="button button--primary button--pink" href="<?php echo aiji_page_url( 'guide' ); ?>">入園をご検討の方へ<span aria-hidden="true">›</span></a>
            <a class="button button--ghost" href="<?php echo aiji_page_url( 'about' ); ?>">園について知る<span aria-hidden="true">›</span></a>
          </div>
        </div>
        <div class="hero__visual" aria-label="園庭で走る園児たちの写真">
          <img src="<?php echo aiji_asset( 'images/hero-children-running.png' ); ?>" alt="">
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
            <img src="<?php echo aiji_asset( 'images/news-campus.png' ); ?>" alt="園舎と園庭の写真">
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
            <p class="section-lead">愛され、見守られ、<br>自分らしく育つ毎日を。</p>
            <p>
              愛児幼稚園は、家庭や地域とのつながりを大切にしながら、
              子どもたちの「やってみたい！」という気持ちを育みます。
            </p>
            <p>
              豊かな体験を通して、思いやりの心とたくましく生きる力を育てていきます。
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
              <img class="feature-card__icon" src="<?php echo aiji_asset( 'images/icon-sprout.png' ); ?>" alt="" aria-hidden="true">
              <h3>豊かな自然環境</h3>
              <p>のびのびと体を動かし、自然とのふれあいを大切にしています。</p>
              <a class="mini-circle mini-circle--green" href="<?php echo aiji_page_url( 'concept' ); ?>" aria-label="豊かな自然環境を詳しく見る">›</a>
            </article>
            <article class="feature-card">
              <img class="feature-card__icon" src="<?php echo aiji_asset( 'images/icon-heart.png' ); ?>" alt="" aria-hidden="true">
              <h3>思いやりの心を育む</h3>
              <p>友だちや先生との関わりの中で、やさしさや感謝の心を育てます。</p>
              <a class="mini-circle mini-circle--pink" href="<?php echo aiji_page_url( 'concept' ); ?>" aria-label="思いやりの心を詳しく見る">›</a>
            </article>
            <article class="feature-card">
              <img class="feature-card__icon" src="<?php echo aiji_asset( 'images/icon-book.png' ); ?>" alt="" aria-hidden="true">
              <h3>主体性を伸ばす教育</h3>
              <p>遊びや体験を通して、子どもたちの「やりたい！」を応援します。</p>
              <a class="mini-circle mini-circle--blue" href="<?php echo aiji_page_url( 'concept' ); ?>" aria-label="主体性を伸ばす教育を詳しく見る">›</a>
            </article>
            <article class="feature-card">
              <img class="feature-card__icon" src="<?php echo aiji_asset( 'images/icon-bag.png' ); ?>" alt="" aria-hidden="true">
              <h3>安心のサポート体制</h3>
              <p>子育てご家庭を支え、安心して通える環境づくりに努めています。</p>
              <a class="mini-circle mini-circle--yellow" href="<?php echo aiji_page_url( 'guide' ); ?>" aria-label="安心のサポート体制を詳しく見る">›</a>
            </article>
          </div>
        </section>
      </div>

      <section class="link-cards">
        <article class="link-card link-card--pink section-anchor" id="admission">
          <div class="link-card__copy">
            <h2>入園を<br>ご検討の方へ</h2>
            <p>入園の流れや募集要項など、詳しい情報はこちらから。</p>
            <a class="button button--small button--pink" href="<?php echo aiji_page_url( 'guide' ); ?>">詳しく見る<span aria-hidden="true">›</span></a>
          </div>
          <img src="<?php echo aiji_asset( 'images/card-admission.png' ); ?>" alt="未就園児の方へのイメージ写真">
        </article>
        <article class="link-card link-card--yellow section-anchor" id="pre">
          <div class="link-card__copy">
            <h2>未就園児の方へ</h2>
            <p>親子で参加できる活動やクラスのご案内はこちら。</p>
            <a class="button button--small button--yellow" href="<?php echo aiji_page_url( 'guide' ); ?>#tour">詳しく見る<span aria-hidden="true">›</span></a>
          </div>
          <img src="<?php echo aiji_asset( 'images/card-prekindergarten.png' ); ?>" alt="未就園児クラスのイメージ写真">
        </article>
        <article class="link-card link-card--blue section-anchor" id="support">
          <div class="link-card__copy">
            <h2>子育て支援</h2>
            <p>子育て中の方への支援やイベント情報はこちら。</p>
            <a class="button button--small button--blue" href="<?php echo aiji_page_url( 'guide' ); ?>#contact">詳しく見る<span aria-hidden="true">›</span></a>
          </div>
          <img src="<?php echo aiji_asset( 'images/card-parenting.png' ); ?>" alt="子育て支援のイメージ写真">
        </article>
        <img class="deco-card-bird" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
      </section>

      <section class="closing section-anchor" id="life">
        <h2>子どもたちの笑顔が、未来をつくる。</h2>
        <p>愛児幼稚園は、これからも子どもたちの成長を見守り続けます。</p>
      </section>
    </main>

<?php get_footer(); ?>
