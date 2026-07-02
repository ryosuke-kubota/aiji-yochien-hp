<?php
/**
 * お知らせ詳細
 */

get_header();
?>

    <main class="subpage-main">
      <?php while ( have_posts() ) : the_post(); ?>
      <nav class="breadcrumb" aria-label="パンくず">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span>
        <a href="<?php echo esc_url( get_permalink( (int) get_option( 'page_for_posts' ) ) ); ?>">お知らせ</a><span>›</span>
        <span><?php the_title(); ?></span>
      </nav>

      <article class="page-section soft-panel">
        <div class="section-heading section-heading--left">
          <h2><?php the_title(); ?></h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <p>
          <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
          　<span class="tag <?php echo esc_attr( aiji_tag_class( get_post() ) ); ?>"><?php echo esc_html( aiji_tag_label( get_post() ) ); ?></span>
        </p>
        <div class="text-stack">
          <?php the_content(); ?>
        </div>
      </article>

      <section class="page-cta">
        <div>
          <h2>他のお知らせもご覧ください</h2>
          <p>園からのお知らせ、行事、園の様子を随時更新しています。</p>
        </div>
        <a class="button button--ghost" href="<?php echo esc_url( get_permalink( (int) get_option( 'page_for_posts' ) ) ); ?>">お知らせ一覧へ<span aria-hidden="true">›</span></a>
      </section>
      <?php endwhile; ?>
    </main>

<?php get_footer(); ?>
