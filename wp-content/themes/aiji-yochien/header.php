<?php
/**
 * サイト共通ヘッダー
 */

$aiji_nav_items = array(
	array( 'slug' => 'about', 'label' => '園の紹介' ),
	array( 'slug' => 'concept', 'label' => '教育について' ),
	array( 'slug' => 'annual', 'label' => '園での生活' ),
	array( 'slug' => 'events', 'label' => '年間行事' ),
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
        <img class="brand__mark" src="<?php echo aiji_asset( 'images/aiji-logo.png' ); ?>" alt="愛児幼稚園 園章">
        <span class="brand__text">
          <span class="brand__eyebrow">学校法人 稲垣学園　認定こども園</span>
          <span class="brand__name">愛児幼稚園</span>
        </span>
      </a>

      <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-menu" data-nav-toggle>
        <span></span>
        <span></span>
        <span></span>
      </button>

      <div class="site-menu" id="site-menu" data-menu>
        <nav class="site-nav" id="site-nav" aria-label="主なメニュー" data-nav>
          <?php foreach ( $aiji_nav_items as $item ) : ?>
            <a href="<?php echo aiji_page_url( $item['slug'] ); ?>"<?php echo is_page( $item['slug'] ) ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $item['label'] ); ?></a>
          <?php endforeach; ?>
          <a href="<?php echo esc_url( home_url( '/#support' ) ); ?>">子育て支援</a>
          <a href="<?php echo aiji_page_url( 'about' ); ?>#recruit">採用情報</a>
        </nav>

        <div class="header-actions">
          <a class="header-pill header-pill--green" href="<?php echo aiji_page_url( 'guide' ); ?>#tour">園見学・体験の方へ<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2.5" y="3" width="11" height="10.5" rx="2"/><path d="M5.5 1.5v3M10.5 1.5v3M5.5 8.5l1.8 1.8 3.2-3.2"/></svg></a>
          <a class="header-pill header-pill--pink" href="<?php echo aiji_page_url( 'guide' ); ?>#contact">お問い合わせ<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1.5" y="3" width="13" height="10" rx="2"/><path d="M2.5 4.5 8 9l5.5-4.5"/></svg></a>
        </div>
      </div>
      <div class="menu-overlay" data-menu-overlay aria-hidden="true"></div>
    </header>
