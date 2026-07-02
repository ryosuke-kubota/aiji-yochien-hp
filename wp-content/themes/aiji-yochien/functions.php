<?php
/**
 * 愛児幼稚園テーマ 基本設定
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const AIJI_THEME_VERSION = '1.0.0';

/** テーマサポート */
function aiji_setup(): void {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'aiji_setup' );

/** CSS / JS の読み込み */
function aiji_enqueue_assets(): void {
	wp_enqueue_style( 'aiji-style', get_stylesheet_uri(), array(), AIJI_THEME_VERSION );
	wp_enqueue_script( 'aiji-script', get_template_directory_uri() . '/assets/js/script.js', array(), AIJI_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'aiji_enqueue_assets' );

/** テーマ内アセットURL */
function aiji_asset( string $path ): string {
	return esc_url( get_template_directory_uri() . '/assets/' . ltrim( $path, '/' ) );
}

/** スラッグから固定ページURLを取得（未作成ならホームへ） */
function aiji_page_url( string $slug ): string {
	$page = get_page_by_path( $slug );
	return $page ? esc_url( get_permalink( $page ) ) : esc_url( home_url( '/' ) );
}

/**
 * タグ色クラス。先頭固定（重要）は緑、それ以外はカテゴリーで決まる。
 * 参考デザイン: 重要なお知らせ=緑 / 通常のお知らせ=青 / 園の様子=ピンク / 行事=黄
 */
function aiji_tag_class( WP_Post $post ): string {
	if ( is_sticky( $post->ID ) ) {
		return 'tag--green';
	}
	$map = array(
		'news-info' => 'tag--blue',
		'daily'     => 'tag--pink',
		'event'     => 'tag--yellow',
	);
	$cats = get_the_category( $post->ID );
	$slug = $cats ? $cats[0]->slug : '';
	return $map[ $slug ] ?? 'tag--blue';
}

/** 投稿の先頭カテゴリー名 */
function aiji_tag_label( WP_Post $post ): string {
	$cats = get_the_category( $post->ID );
	return $cats ? $cats[0]->name : 'お知らせ';
}

/**
 * テーマ有効化時の初期セットアップ。
 * 固定ページ・カテゴリー・サンプル投稿を作成し、表示設定を静的サイトと同じ構成にする。
 * 一度実行したら option でスキップする。
 */
function aiji_activate(): void {
	if ( get_option( 'aiji_theme_setup_done' ) ) {
		return;
	}

	update_option( 'permalink_structure', '/%postname%/' );

	$pages = array(
		'home'     => 'ホーム',
		'about'    => '園の紹介',
		'concept'  => '教育について',
		'annual'   => '園での生活',
		'schedule' => '入園のご案内',
		'guide'    => '未就園児の方へ',
		'news'     => 'お知らせ',
	);
	$page_ids = array();
	foreach ( $pages as $slug => $title ) {
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			$page_ids[ $slug ] = $existing->ID;
			continue;
		}
		$page_ids[ $slug ] = wp_insert_post(
			array(
				'post_type'   => 'page',
				'post_status' => 'publish',
				'post_name'   => $slug,
				'post_title'  => $title,
			)
		);
	}

	// フロントを固定ページ表示にし、お知らせ一覧を投稿ページに割り当てる
	// （page_for_posts は show_on_front が 'page' のときだけ有効。フロントの見た目はfront-page.phpが担う）
	if ( ! empty( $page_ids['home'] ) && ! empty( $page_ids['news'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $page_ids['home'] );
		update_option( 'page_for_posts', $page_ids['news'] );
	}

	$categories = array(
		'news-info' => 'お知らせ',
		'daily'     => '園の様子',
		'event'     => '行事',
	);
	$cat_ids = array();
	foreach ( $categories as $slug => $name ) {
		$term = term_exists( $slug, 'category' );
		if ( ! $term ) {
			$term = wp_insert_term( $name, 'category', array( 'slug' => $slug ) );
		}
		$cat_ids[ $slug ] = is_array( $term ) ? (int) $term['term_id'] : (int) $term;
	}

	// 静的サイトのお知らせをサンプル投稿として移植
	$posts = array(
		array( '2024-05-10', 'news-info', '令和7年度 入園説明会のお知らせ', '6月15日(日)に入園説明会を開催します。詳しくはこちらをご確認ください。', true ),
		array( '2024-04-28', 'daily', '春の遠足に行ってきました！', '天気にも恵まれ、子どもたちは元気いっぱい春の自然を楽しみました。', false ),
		array( '2024-04-15', 'news-info', '令和7年度 未就園児クラスのご案内', '親子で楽しめる制作あそびと園庭開放を予定しています。', false ),
		array( '2024-04-01', 'news-info', 'ホームページをリニューアルしました', '愛児幼稚園のホームページをリニューアルしました。今後ともよろしくお願いいたします。', false ),
		array( '2024-03-25', 'event', '4月の行事予定を掲載しました', '入園式、始業式、対面式など、4月の行事予定をお知らせします。', false ),
	);
	$sticky = array();
	foreach ( $posts as [ $date, $cat, $title, $body, $is_sticky ] ) {
		$post_id = wp_insert_post(
			array(
				'post_type'     => 'post',
				'post_status'   => 'publish',
				'post_title'    => $title,
				'post_content'  => $body,
				'post_date'     => $date . ' 09:00:00',
				'post_category' => array( $cat_ids[ $cat ] ),
			)
		);
		if ( $is_sticky && $post_id ) {
			$sticky[] = $post_id;
		}
	}
	if ( $sticky ) {
		update_option( 'sticky_posts', $sticky );
	}

	flush_rewrite_rules();
	update_option( 'aiji_theme_setup_done', 1 );
}
add_action( 'after_switch_theme', 'aiji_activate' );
