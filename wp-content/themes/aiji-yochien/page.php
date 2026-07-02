<?php
/**
 * 汎用固定ページ
 */

get_header();
?>

    <main class="subpage-main">
      <?php while ( have_posts() ) : the_post(); ?>
      <nav class="breadcrumb" aria-label="パンくず">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span><?php the_title(); ?></span>
      </nav>

      <article class="page-section soft-panel">
        <div class="section-heading section-heading--left">
          <h2><?php the_title(); ?></h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <div class="text-stack">
          <?php the_content(); ?>
        </div>
      </article>
      <?php endwhile; ?>
    </main>

<?php get_footer(); ?>
