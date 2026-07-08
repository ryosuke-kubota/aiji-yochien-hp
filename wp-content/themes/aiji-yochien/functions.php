<?php
/**
 * 愛児幼稚園テーマ 基本設定
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const AIJI_THEME_VERSION = '1.25.1';

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

/** 園章をファビコンとして出力 */
function aiji_favicon(): void {
	echo '<link rel="icon" href="' . aiji_asset( 'images/aiji-logo.png' ) . '" type="image/png">' . "\n";
}
add_action( 'wp_head', 'aiji_favicon' );

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
		'events'   => '年間行事',
		'schedule' => '入園のご案内',
		'guide'    => '未就園児の方へ',
		'news'     => 'お知らせ',
		'recruit'  => '採用情報',
		'tour'     => '園見学・体験',
		'contact'  => 'お問い合わせ',
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
		array( '2024-05-10', 'news-info', '園児募集のお知らせ', '願書配布は9月1日から、願書受付は10月1日からです。2歳児から受け入れます。詳しくは園（TEL: 06-6691-0502）までお問い合わせください。', true ),
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

/* =========================================
   管理画面カスタマイズ（投稿者向けダッシュボード）
   ========================================= */

/** 「投稿」を「お知らせ」表記に変更 */
function aiji_rename_post_labels(): void {
	$post_type = get_post_type_object( 'post' );
	if ( ! $post_type ) {
		return;
	}
	$labels                = $post_type->labels;
	$labels->name          = 'お知らせ';
	$labels->singular_name = 'お知らせ';
	$labels->menu_name     = 'お知らせ';
	$labels->name_admin_bar = 'お知らせ';
	$labels->add_new       = '新規追加';
	$labels->add_new_item  = 'お知らせを追加';
	$labels->edit_item     = 'お知らせを編集';
	$labels->new_item      = '新しいお知らせ';
	$labels->view_item     = 'お知らせを表示';
	$labels->search_items  = 'お知らせを検索';
	$labels->not_found     = 'お知らせが見つかりません';
	$labels->all_items     = 'お知らせ一覧';
	$post_type->menu_icon  = 'dashicons-megaphone';
}
add_action( 'init', 'aiji_rename_post_labels' );

/** 新規投稿URLの ?aiji_cat=スラッグ でカテゴリーを自動セット */
function aiji_preset_category( int $post_id, WP_Post $post ): void {
	if ( 'auto-draft' !== $post->post_status || 'post' !== $post->post_type || empty( $_GET['aiji_cat'] ) ) {
		return;
	}
	$term = get_term_by( 'slug', sanitize_key( wp_unslash( $_GET['aiji_cat'] ) ), 'category' );
	if ( $term instanceof WP_Term ) {
		wp_set_post_categories( $post_id, array( $term->term_id ) );
	}
}
add_action( 'wp_insert_post', 'aiji_preset_category', 10, 2 );

/** ダッシュボードに「かんたん投稿」ウィジェットを追加 */
function aiji_dashboard_widget(): void {
	wp_add_dashboard_widget( 'aiji_quick_post', '📣 お知らせをかんたん投稿', 'aiji_dashboard_widget_render' );

	// かんたん投稿を最上部へ移動
	global $wp_meta_boxes;
	$widget = $wp_meta_boxes['dashboard']['normal']['core']['aiji_quick_post'];
	unset( $wp_meta_boxes['dashboard']['normal']['core']['aiji_quick_post'] );
	$wp_meta_boxes['dashboard']['normal']['high']['aiji_quick_post'] = $widget;
}
add_action( 'wp_dashboard_setup', 'aiji_dashboard_widget' );

/** かんたん投稿ウィジェットの中身 */
function aiji_dashboard_widget_render(): void {
	$buttons = array(
		array( 'news-info', '📢 お知らせを書く', '#70ad42' ),
		array( 'event', '🎈 行事レポートを書く', '#e9a60f' ),
		array( 'daily', '🌸 園の様子を書く', '#ed6f79' ),
	);
	echo '<style>
		.aiji-qp-buttons { display: grid; gap: 10px; margin: 4px 0 14px; }
		.aiji-qp-buttons a { display: block; padding: 14px 18px; border-radius: 10px; color: #fff !important; font-size: 15px; font-weight: 700; text-decoration: none; text-align: center; }
		.aiji-qp-buttons a:hover { opacity: 0.88; }
		.aiji-qp-steps { margin: 0; padding: 12px 14px; border-radius: 8px; background: #f6f7f7; line-height: 1.9; }
	</style>';
	echo '<div class="aiji-qp-buttons">';
	foreach ( $buttons as [ $slug, $label, $color ] ) {
		$url = admin_url( 'post-new.php?aiji_cat=' . $slug );
		echo '<a href="' . esc_url( $url ) . '" style="background:' . esc_attr( $color ) . ';">' . esc_html( $label ) . '</a>';
	}
	echo '<a href="' . esc_url( admin_url( 'admin.php?page=aiji-gallery' ) ) . '" style="background:#5ba0d5;">📷 フォトギャラリーに写真を追加</a>';
	echo '</div>';
	echo '<p class="aiji-qp-steps">
		<strong>書き方（3ステップ）</strong><br>
		1. タイトルと本文を入力（写真は「＋」→「画像」で何枚でも追加OK）<br>
		2. 右上の「公開」を押す<br>
		3. トップの「重要なお知らせ」に載せたいときは、右側の「概要」パネルで「ブログのトップに固定」にチェック
	</p>';
	echo '<p class="aiji-qp-steps" style="margin-top:10px;">
		<strong>📷 写真のあげ方（記事は不要です）</strong><br>
		上の「フォトギャラリーに写真を追加」を押して、
		<strong>「＋ 行事を追加」→ 行事名を入力 →「＋ 写真を追加」→「保存する」</strong>だけ。<br>
		年間行事ページに行事ごとのカードが並び、クリックでその行事の写真をまとめて見られます。
	</p>';
	echo '<p><a href="' . esc_url( admin_url( 'edit.php' ) ) . '">→ これまでのお知らせ一覧を見る</a></p>';
}

/** 投稿一覧のカテゴリー列をサイトと同じ色バッジに */
function aiji_admin_columns( array $columns ): array {
	$new = array();
	foreach ( $columns as $key => $label ) {
		if ( 'categories' === $key ) {
			$new['aiji_cat_badge'] = 'カテゴリー';
			continue;
		}
		$new[ $key ] = $label;
	}
	return $new;
}
add_filter( 'manage_post_posts_columns', 'aiji_admin_columns' );

function aiji_admin_columns_render( string $column, int $post_id ): void {
	if ( 'aiji_cat_badge' !== $column ) {
		return;
	}
	$colors = array(
		'news-info' => '#70ad42',
		'daily'     => '#ed6f79',
		'event'     => '#e9a60f',
	);
	foreach ( get_the_category( $post_id ) as $cat ) {
		$color = $colors[ $cat->slug ] ?? '#5ba0d5';
		echo '<span style="display:inline-block;margin:1px 4px 1px 0;padding:2px 10px;border-radius:999px;color:#fff;background:' . esc_attr( $color ) . ';font-size:11px;font-weight:700;">' . esc_html( $cat->name ) . '</span>';
	}
	if ( is_sticky( $post_id ) ) {
		echo '<span style="display:inline-block;margin:1px 0;padding:2px 10px;border-radius:999px;color:#fff;background:#ee7887;font-size:11px;font-weight:700;">★ 重要（トップ固定）</span>';
	}
}
add_action( 'manage_post_posts_custom_column', 'aiji_admin_columns_render', 10, 2 );

/** 使わない管理メニュー・ダッシュボードウィジェットを非表示 */
function aiji_cleanup_admin_menu(): void {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'aiji_cleanup_admin_menu' );

function aiji_cleanup_dashboard(): void {
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );       // WordPressニュース
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );   // クイックドラフト
	remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' ); // サイトヘルス
	remove_action( 'welcome_panel', 'wp_welcome_panel' );              // ようこそパネル
}
add_action( 'wp_dashboard_setup', 'aiji_cleanup_dashboard', 20 );

/**
 * 差し替え写真の検索。assets/images/photo-{名前}.jpg（.jpeg/.png）が
 * 置かれていればそのURLを、なければ null を返す。
 * 例: photo-june.jpg → 6月の行事カード / photo-lesson-english.jpg → 英語レッスンカード
 */
function aiji_photo( string $name ): ?string {
	foreach ( array( 'jpg', 'jpeg', 'png' ) as $ext ) {
		$rel = 'images/photo-' . $name . '.' . $ext;
		if ( file_exists( get_template_directory() . '/assets/' . $rel ) ) {
			return aiji_asset( $rel );
		}
	}
	return null;
}

/**
 * 月別行事サムネイル。photo-{月英名}.jpg があればそれを優先し、
 * なければフォールバック画像を返す。
 */
function aiji_month_thumb( string $month_en, string $fallback ): string {
	return aiji_photo( $month_en ) ?? aiji_asset( $fallback );
}

/**
 * 行事フォトギャラリーのグループ一覧。
 * 管理画面「フォトギャラリー」で保存した「行事名＋写真セット」
 * （option: aiji_gallery_groups = [ [ 'title' => 行事名, 'ids' => 添付ID配列 ], ... ]）を返す。
 */
function aiji_gallery_groups(): array {
	$out = array();
	foreach ( (array) get_option( 'aiji_gallery_groups', array() ) as $group ) {
		$title  = isset( $group['title'] ) ? (string) $group['title'] : '';
		$images = array();
		foreach ( (array) ( $group['ids'] ?? array() ) as $id ) {
			$src = wp_get_attachment_image_url( absint( $id ), 'large' );
			if ( ! $src ) {
				continue;
			}
			$alt      = get_post_meta( absint( $id ), '_wp_attachment_image_alt', true );
			$images[] = array(
				'src' => $src,
				'alt' => $alt ? $alt : ( $title ? $title : '行事の写真' ),
			);
		}
		if ( ! $images ) {
			continue;
		}
		$out[] = array(
			'title'  => $title,
			'images' => $images,
		);
	}
	return $out;
}

/* =========================================
   フォトギャラリー管理画面（写真を選んで保存するだけ）
   ========================================= */

function aiji_gallery_admin_menu(): void {
	add_menu_page(
		'フォトギャラリー',
		'フォトギャラリー',
		'upload_files',
		'aiji-gallery',
		'aiji_gallery_admin_page',
		'dashicons-format-gallery',
		21
	);
}
add_action( 'admin_menu', 'aiji_gallery_admin_menu' );

function aiji_gallery_admin_assets( string $hook ): void {
	if ( 'toplevel_page_aiji-gallery' === $hook ) {
		wp_enqueue_media();
	}
}
add_action( 'admin_enqueue_scripts', 'aiji_gallery_admin_assets' );

/** フォトギャラリー管理画面の描画（行事ごとに写真をまとめる） */
function aiji_gallery_admin_page(): void {
	$groups = (array) get_option( 'aiji_gallery_groups', array() );
	?>
	<div class="wrap">
		<h1>📷 フォトギャラリー</h1>
		<?php if ( isset( $_GET['updated'] ) ) : ?>
			<div class="notice notice-success is-dismissible"><p>ギャラリーを保存しました。年間行事ページに反映されています。</p></div>
		<?php endif; ?>
		<p style="font-size:14px;line-height:1.9;">
			<strong>行事ごとに写真をまとめて</strong>、年間行事ページの「行事フォトギャラリー」に載せられます。記事を書く必要はありません。<br>
			使い方: <strong>「＋ 行事を追加」→ 行事名を入力 →「＋ 写真を追加」→ 最後に「保存する」</strong>
		</p>
		<style>
			.aiji-gallery-group { max-width: 900px; margin: 0 0 18px; padding: 16px 18px; border: 1px solid #dcdcde; border-radius: 10px; background: #fff; }
			.aiji-gallery-group__head { display: flex; gap: 10px; align-items: center; margin-bottom: 12px; }
			.aiji-gallery-group__head input { flex: 1; max-width: 420px; }
			.aiji-group-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 10px; margin-bottom: 12px; }
			.aiji-gallery-thumb { position: relative; }
			.aiji-gallery-thumb img { display: block; width: 100%; aspect-ratio: 4 / 3; object-fit: cover; border-radius: 8px; }
			.aiji-thumb-remove { position: absolute; top: 6px; right: 6px; width: 26px; height: 26px; border: 0; border-radius: 50%; background: rgba(0, 0, 0, 0.65); color: #fff; font-size: 15px; line-height: 1; cursor: pointer; }
		</style>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" id="aiji-gallery-form">
			<?php wp_nonce_field( 'aiji_save_gallery' ); ?>
			<input type="hidden" name="action" value="aiji_save_gallery">
			<input type="hidden" name="aiji_gallery_groups" id="aiji-gallery-groups-input" value="">
			<div id="aiji-groups">
				<?php foreach ( $groups as $group ) : ?>
				<div class="aiji-gallery-group">
					<div class="aiji-gallery-group__head">
						<input type="text" class="aiji-group-title regular-text" placeholder="行事名（例: 運動会）" value="<?php echo esc_attr( $group['title'] ?? '' ); ?>">
						<button type="button" class="button-link-delete aiji-group-delete">この行事を削除</button>
					</div>
					<div class="aiji-group-grid">
						<?php foreach ( (array) ( $group['ids'] ?? array() ) as $id ) :
							$thumb = wp_get_attachment_image_url( absint( $id ), 'medium' );
							if ( ! $thumb ) {
								continue;
							}
							?>
							<div class="aiji-gallery-thumb" data-id="<?php echo esc_attr( absint( $id ) ); ?>">
								<img src="<?php echo esc_url( $thumb ); ?>" alt="">
								<button type="button" class="aiji-thumb-remove" aria-label="この写真を外す">×</button>
							</div>
						<?php endforeach; ?>
					</div>
					<button type="button" class="button aiji-group-add">＋ 写真を追加</button>
				</div>
				<?php endforeach; ?>
			</div>
			<p>
				<button type="button" class="button button-hero" id="aiji-group-new">＋ 行事を追加</button>
				<button type="submit" class="button button-primary button-hero">保存する</button>
			</p>
			<p class="description">× で写真を外す・「この行事を削除」で行事ごと外せます（写真自体は削除されません）。最後に「保存する」を押してください。</p>
		</form>
	</div>
	<script>
	jQuery(function ($) {
		var groupsWrap = $("#aiji-groups");
		var frame = null;
		var currentGrid = null;

		var thumbHtml = function (id, url) {
			return '<div class="aiji-gallery-thumb" data-id="' + id + '">' +
				'<img src="' + url + '" alt="">' +
				'<button type="button" class="aiji-thumb-remove" aria-label="この写真を外す">×</button>' +
				"</div>";
		};
		var groupHtml =
			'<div class="aiji-gallery-group">' +
			'<div class="aiji-gallery-group__head">' +
			'<input type="text" class="aiji-group-title regular-text" placeholder="行事名（例: 運動会）" value="">' +
			'<button type="button" class="button-link-delete aiji-group-delete">この行事を削除</button>' +
			"</div>" +
			'<div class="aiji-group-grid"></div>' +
			'<button type="button" class="button aiji-group-add">＋ 写真を追加</button>' +
			"</div>";

		$("#aiji-group-new").on("click", function () {
			groupsWrap.append(groupHtml);
			groupsWrap.find(".aiji-group-title").last().trigger("focus");
		});

		groupsWrap.on("click", ".aiji-group-add", function () {
			currentGrid = $(this).closest(".aiji-gallery-group").find(".aiji-group-grid");
			if (!frame) {
				frame = wp.media({
					title: "この行事に載せる写真を選ぶ",
					button: { text: "この写真を追加" },
					library: { type: "image" },
					multiple: "add"
				});
				frame.on("select", function () {
					frame.state().get("selection").each(function (attachment) {
						var id = attachment.get("id");
						if (currentGrid.find('.aiji-gallery-thumb[data-id="' + id + '"]').length) {
							return;
						}
						var sizes = attachment.get("sizes") || {};
						var url = (sizes.medium || sizes.full || {}).url || attachment.get("url");
						currentGrid.append(thumbHtml(id, url));
					});
				});
			}
			frame.open();
		});

		groupsWrap.on("click", ".aiji-thumb-remove", function () {
			$(this).closest(".aiji-gallery-thumb").remove();
		});

		groupsWrap.on("click", ".aiji-group-delete", function () {
			if (window.confirm("この行事をギャラリーから削除しますか？（写真自体は残ります）")) {
				$(this).closest(".aiji-gallery-group").remove();
			}
		});

		// 保存時にDOMからグループ構成をJSON化して送る
		$("#aiji-gallery-form").on("submit", function () {
			var groups = [];
			groupsWrap.find(".aiji-gallery-group").each(function () {
				var ids = $(this).find(".aiji-gallery-thumb").map(function () {
					return $(this).data("id");
				}).get();
				if (!ids.length) {
					return;
				}
				groups.push({ title: $(this).find(".aiji-group-title").val() || "", ids: ids });
			});
			$("#aiji-gallery-groups-input").val(JSON.stringify(groups));
		});
	});
	</script>
	<?php
}

/** フォトギャラリーの保存処理 */
function aiji_gallery_save(): void {
	if ( ! current_user_can( 'upload_files' ) ) {
		wp_die( 'この操作を行う権限がありません。' );
	}
	check_admin_referer( 'aiji_save_gallery' );

	$raw    = isset( $_POST['aiji_gallery_groups'] ) ? wp_unslash( $_POST['aiji_gallery_groups'] ) : '';
	$data   = json_decode( $raw, true );
	$groups = array();
	if ( is_array( $data ) ) {
		foreach ( $data as $group ) {
			$ids = array_values(
				array_filter(
					array_map( 'absint', (array) ( $group['ids'] ?? array() ) ),
					'wp_attachment_is_image'
				)
			);
			if ( ! $ids ) {
				continue;
			}
			$groups[] = array(
				'title' => sanitize_text_field( $group['title'] ?? '' ),
				'ids'   => $ids,
			);
		}
	}
	update_option( 'aiji_gallery_groups', $groups );

	wp_safe_redirect( admin_url( 'admin.php?page=aiji-gallery&updated=1' ) );
	exit;
}
add_action( 'admin_post_aiji_save_gallery', 'aiji_gallery_save' );

/* =========================================
   採用エントリーフォーム
   ========================================= */

/** 応募内容の保存先。管理画面「採用応募」からのみ閲覧でき、手動での新規作成は不可 */
function aiji_entry_post_type(): void {
	register_post_type(
		'aiji_entry',
		array(
			'labels'        => array(
				'name'          => '採用応募',
				'singular_name' => '採用応募',
				'menu_name'     => '採用応募',
				'all_items'     => '応募一覧',
				'edit_item'     => '応募内容',
				'search_items'  => '応募を検索',
			),
			'public'        => false,
			'show_ui'       => true,
			'menu_position' => 26,
			'menu_icon'     => 'dashicons-id-alt',
			'supports'      => array( 'title', 'editor' ),
			'capabilities'  => array( 'create_posts' => 'do_not_allow' ),
			'map_meta_cap'  => true,
		)
	);
}
add_action( 'init', 'aiji_entry_post_type' );

/** 採用ページで選べる希望職種の一覧 */
function aiji_entry_jobs(): array {
	return array( '幼稚園教諭', '保育補助', '預かり保育スタッフ', 'その他' );
}

/** 採用エントリーフォームの送信処理（未ログインの応募者が使う） */
function aiji_entry_submit(): void {
	$back = aiji_page_url( 'recruit' );

	// ハニーポット: 人間には見えない欄に入力があればボットとみなし、何も保存せず成功画面へ
	if ( ! empty( $_POST['aiji_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'entry', 'sent', $back ) . '#entry' );
		exit;
	}

	if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['_wpnonce'] ), 'aiji_recruit_entry' ) ) {
		wp_safe_redirect( add_query_arg( 'entry', 'expired', $back ) . '#entry' );
		exit;
	}

	// 連投防止: 同一IPからの送信は60秒に1回まで
	$ip_key = 'aiji_entry_' . md5( $_SERVER['REMOTE_ADDR'] ?? '' );
	if ( get_transient( $ip_key ) ) {
		wp_safe_redirect( add_query_arg( 'entry', 'wait', $back ) . '#entry' );
		exit;
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['aiji_name'] ?? '' ) );
	$kana    = sanitize_text_field( wp_unslash( $_POST['aiji_kana'] ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['aiji_phone'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['aiji_email'] ?? '' ) );
	$job     = sanitize_text_field( wp_unslash( $_POST['aiji_job'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['aiji_message'] ?? '' ) );
	$agree   = ! empty( $_POST['aiji_agree'] );

	$is_valid = '' !== $name
		&& preg_match( '/^[0-9+\-() ]{10,15}$/', $phone )
		&& is_email( $email )
		&& in_array( $job, aiji_entry_jobs(), true )
		&& mb_strlen( $message ) <= 2000
		&& $agree;
	if ( ! $is_valid ) {
		wp_safe_redirect( add_query_arg( 'entry', 'invalid', $back ) . '#entry' );
		exit;
	}

	$body    = sprintf(
		"お名前: %s\nふりがな: %s\n電話番号: %s\nメールアドレス: %s\n希望職種: %s\n\n【自己PR・ご質問など】\n%s",
		$name,
		$kana,
		$phone,
		$email,
		$job,
		'' !== $message ? $message : '（記入なし）'
	);
	$post_id = wp_insert_post(
		array(
			'post_type'    => 'aiji_entry',
			'post_status'  => 'private',
			'post_title'   => sprintf( '%s（%s）', $name, $job ),
			'post_content' => $body,
		),
		true
	);
	if ( is_wp_error( $post_id ) ) {
		wp_safe_redirect( add_query_arg( 'entry', 'error', $back ) . '#entry' );
		exit;
	}

	set_transient( $ip_key, 1, MINUTE_IN_SECONDS );

	// 管理者へ通知メール。送信できない環境でも応募は管理画面「採用応募」に残る
	wp_mail(
		get_option( 'admin_email' ),
		'【採用応募】' . $name . ' 様（' . $job . '）',
		$body . "\n\n応募一覧: " . admin_url( 'edit.php?post_type=aiji_entry' )
	);

	wp_safe_redirect( add_query_arg( 'entry', 'sent', $back ) . '#entry' );
	exit;
}
add_action( 'admin_post_aiji_recruit_entry', 'aiji_entry_submit' );
add_action( 'admin_post_nopriv_aiji_recruit_entry', 'aiji_entry_submit' );

/* =========================================
   園見学・体験／お問い合わせフォーム
   ========================================= */

/** フォーム種別ごとの設定。topics が選択肢のホワイトリスト、page が送信後の戻り先 */
function aiji_inquiry_types(): array {
	return array(
		'tour'    => array(
			'label'  => '園見学・体験',
			'topics' => array( '園見学', '未就園児体験', '園庭開放', '個別相談' ),
			'page'   => 'tour',
		),
		'contact' => array(
			'label'  => 'お問い合わせ',
			'topics' => array( '入園について', '未就園児クラス・園見学について', '預かり保育について', '採用について', 'その他' ),
			'page'   => 'contact',
		),
	);
}

/** 見学申し込み・お問い合わせの保存先。管理画面「お問い合わせ」からのみ閲覧でき、手動での新規作成は不可 */
function aiji_inquiry_post_type(): void {
	register_post_type(
		'aiji_inquiry',
		array(
			'labels'        => array(
				'name'          => 'お問い合わせ',
				'singular_name' => 'お問い合わせ',
				'menu_name'     => 'お問い合わせ',
				'all_items'     => '受信一覧',
				'edit_item'     => 'お問い合わせ内容',
				'search_items'  => 'お問い合わせを検索',
			),
			'public'        => false,
			'show_ui'       => true,
			'menu_position' => 27,
			'menu_icon'     => 'dashicons-email-alt',
			'supports'      => array( 'title', 'editor' ),
			'capabilities'  => array( 'create_posts' => 'do_not_allow' ),
			'map_meta_cap'  => true,
		)
	);
}
add_action( 'init', 'aiji_inquiry_post_type' );

/** 園見学・体験／お問い合わせフォームの送信処理（未ログインの訪問者が使う） */
function aiji_inquiry_submit(): void {
	$types = aiji_inquiry_types();
	$type  = sanitize_key( $_POST['aiji_type'] ?? '' );
	if ( ! isset( $types[ $type ] ) ) {
		wp_safe_redirect( home_url( '/' ) );
		exit;
	}
	$conf = $types[ $type ];
	$back = aiji_page_url( $conf['page'] );

	// ハニーポット: 人間には見えない欄に入力があればボットとみなし、何も保存せず成功画面へ
	if ( ! empty( $_POST['aiji_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'entry', 'sent', $back ) . '#form' );
		exit;
	}

	if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['_wpnonce'] ), 'aiji_inquiry_form' ) ) {
		wp_safe_redirect( add_query_arg( 'entry', 'expired', $back ) . '#form' );
		exit;
	}

	// 連投防止: 同一IPからの送信は60秒に1回まで（見学・問い合わせ共通）
	$ip_key = 'aiji_inquiry_' . md5( $_SERVER['REMOTE_ADDR'] ?? '' );
	if ( get_transient( $ip_key ) ) {
		wp_safe_redirect( add_query_arg( 'entry', 'wait', $back ) . '#form' );
		exit;
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['aiji_name'] ?? '' ) );
	$kana    = sanitize_text_field( wp_unslash( $_POST['aiji_kana'] ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['aiji_phone'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['aiji_email'] ?? '' ) );
	$topic   = sanitize_text_field( wp_unslash( $_POST['aiji_topic'] ?? '' ) );
	$date    = sanitize_text_field( wp_unslash( $_POST['aiji_date'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['aiji_message'] ?? '' ) );
	$agree   = ! empty( $_POST['aiji_agree'] );

	// お問い合わせは本文必須、園見学・体験は任意
	$is_valid = '' !== $name
		&& preg_match( '/^[0-9+\-() ]{10,15}$/', $phone )
		&& is_email( $email )
		&& in_array( $topic, $conf['topics'], true )
		&& mb_strlen( $date ) <= 100
		&& mb_strlen( $message ) <= 2000
		&& ( 'contact' !== $type || '' !== $message )
		&& $agree;
	if ( ! $is_valid ) {
		wp_safe_redirect( add_query_arg( 'entry', 'invalid', $back ) . '#form' );
		exit;
	}

	$lines = array(
		'種別: ' . $conf['label'],
		'お名前: ' . $name,
		'ふりがな: ' . $kana,
		'電話番号: ' . $phone,
		'メールアドレス: ' . $email,
		'内容: ' . $topic,
	);
	if ( '' !== $date ) {
		$lines[] = 'ご希望の日時: ' . $date;
	}
	$body    = implode( "\n", $lines ) . "\n\n【メッセージ】\n" . ( '' !== $message ? $message : '（記入なし）' );
	$post_id = wp_insert_post(
		array(
			'post_type'    => 'aiji_inquiry',
			'post_status'  => 'private',
			'post_title'   => sprintf( '%s（%s: %s）', $name, $conf['label'], $topic ),
			'post_content' => $body,
		),
		true
	);
	if ( is_wp_error( $post_id ) ) {
		wp_safe_redirect( add_query_arg( 'entry', 'error', $back ) . '#form' );
		exit;
	}

	set_transient( $ip_key, 1, MINUTE_IN_SECONDS );

	// 管理者へ通知メール。送信できない環境でも内容は管理画面「お問い合わせ」に残る
	wp_mail(
		get_option( 'admin_email' ),
		'【' . $conf['label'] . '】' . $name . ' 様より（' . $topic . '）',
		$body . "\n\n受信一覧: " . admin_url( 'edit.php?post_type=aiji_inquiry' )
	);

	wp_safe_redirect( add_query_arg( 'entry', 'sent', $back ) . '#form' );
	exit;
}
add_action( 'admin_post_aiji_inquiry_form', 'aiji_inquiry_submit' );
add_action( 'admin_post_nopriv_aiji_inquiry_form', 'aiji_inquiry_submit' );
