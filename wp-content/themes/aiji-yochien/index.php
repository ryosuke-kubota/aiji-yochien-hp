<?php
/**
 * お知らせ一覧 / 汎用フォールバックテンプレート
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>お知らせ</span>
      </nav>

      <section class="page-section">
        <div class="section-heading section-heading--left section-heading--inline">
          <h2>お知らせ</h2>
          <img class="heading-sprout" src="<?php echo aiji_asset( 'images/icon-sprout.png' ); ?>" alt="" aria-hidden="true">
        </div>

        <div class="news-list" aria-label="お知らせ一覧">
          <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <a class="news-row" href="<?php the_permalink(); ?>">
              <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
              <span class="tag <?php echo esc_attr( aiji_tag_class( get_post() ) ); ?>"><?php echo esc_html( aiji_tag_label( get_post() ) ); ?></span>
              <span><?php the_title(); ?></span>
              <b aria-hidden="true">›</b>
            </a>
            <?php endwhile; ?>
          <?php else : ?>
            <p>お知らせはまだありません。</p>
          <?php endif; ?>
        </div>

        <?php the_posts_pagination( array( 'mid_size' => 2, 'prev_text' => '‹ 前へ', 'next_text' => '次へ ›' ) ); ?>
      </section>
    </main>

<?php get_footer(); ?>
