<?php
/**
 * サイト共通ヘッダー
 */

$aiji_nav_items = array(
	array( 'slug' => 'about', 'label' => '園の紹介' ),
	array( 'slug' => 'concept', 'label' => '教育について' ),
	array( 'slug' => 'annual', 'label' => '園での生活' ),
	array( 'slug' => 'schedule', 'label' => '入園のご案内' ),
	array( 'slug' => 'guide', 'label' => '未就園児の方へ' ),
);
?><!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site-header" data-header>
      <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="愛児幼稚園 トップ">
        <img class="brand__mark" src="<?php echo aiji_asset( 'images/icon-house.png' ); ?>" alt="" aria-hidden="true">
        <span class="brand__text">
          <span class="brand__eyebrow">学校法人　愛児学園</span>
          <span class="brand__name">愛児幼稚園</span>
        </span>
      </a>

      <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
        <span></span>
        <span></span>
        <span></span>
      </button>

      <nav class="site-nav" id="site-nav" aria-label="主なメニュー" data-nav>
        <?php foreach ( $aiji_nav_items as $item ) : ?>
          <a href="<?php echo aiji_page_url( $item['slug'] ); ?>"<?php echo is_page( $item['slug'] ) ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $item['label'] ); ?></a>
        <?php endforeach; ?>
        <a href="<?php echo esc_url( home_url( '/#support' ) ); ?>">子育て支援</a>
      </nav>

      <div class="header-actions">
        <a class="header-pill header-pill--green" href="#">園児・先生の方へ</a>
        <a class="header-pill header-pill--pink" href="<?php echo aiji_page_url( 'guide' ); ?>#contact">お問い合わせ</a>
      </div>
    </header>
