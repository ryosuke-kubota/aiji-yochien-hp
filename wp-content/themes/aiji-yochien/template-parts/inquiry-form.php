<?php
/**
 * 園見学・体験／お問い合わせ共通フォーム
 *
 * 呼び出し: get_template_part( 'template-parts/inquiry-form', null, array( 'type' => 'tour' | 'contact' ) )
 * 送信先: functions.php の aiji_inquiry_submit()（action: aiji_inquiry_form）
 */

$aiji_type = $args['type'] ?? '';
$aiji_conf = aiji_inquiry_types()[ $aiji_type ] ?? null;
if ( ! $aiji_conf ) {
	return;
}

// 種別ごとの文言・表示項目
$aiji_ui = array(
	'tour'    => array(
		'topic_label'      => 'ご希望の内容',
		'show_date'        => true,
		'message_label'    => 'ご質問・ご要望など',
		'message_required' => false,
		'message_hint'     => 'お子さまの年齢や、聞いてみたいことがあればご記入ください。',
	),
	'contact' => array(
		'topic_label'      => 'お問い合わせ種別',
		'show_date'        => false,
		'message_label'    => 'お問い合わせ内容',
		'message_required' => true,
		'message_hint'     => 'お問い合わせの内容をご記入ください。',
	),
);
$aiji_ui = $aiji_ui[ $aiji_type ];

$aiji_entry_state   = isset( $_GET['entry'] ) ? sanitize_key( $_GET['entry'] ) : '';
$aiji_entry_notices = array(
	'sent'    => array( 'ok', '送信ありがとうございます。内容を確認のうえ、担当者よりご連絡いたします。' ),
	'invalid' => array( 'ng', '入力内容に不備がありました。お手数ですが、必須項目をご確認のうえもう一度送信してください。' ),
	'expired' => array( 'ng', 'ページの有効期限が切れていました。お手数ですが、もう一度送信してください。' ),
	'wait'    => array( 'ng', '送信の間隔が短すぎます。1分ほどおいてからもう一度お試しください。' ),
	'error'   => array( 'ng', '送信に失敗しました。お手数ですが、時間をおいて再度お試しいただくか、お電話（06-6691-0502）にてご連絡ください。' ),
);
?>

<?php if ( isset( $aiji_entry_notices[ $aiji_entry_state ] ) ) : ?>
<p class="entry-notice entry-notice--<?php echo esc_attr( $aiji_entry_notices[ $aiji_entry_state ][0] ); ?>" role="status">
  <?php echo esc_html( $aiji_entry_notices[ $aiji_entry_state ][1] ); ?>
</p>
<?php endif; ?>

<?php if ( 'sent' !== $aiji_entry_state ) : ?>
<form class="entry-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
  <input type="hidden" name="action" value="aiji_inquiry_form">
  <input type="hidden" name="aiji_type" value="<?php echo esc_attr( $aiji_type ); ?>">
  <?php wp_nonce_field( 'aiji_inquiry_form' ); ?>
  <p class="entry-form__hp" aria-hidden="true"><label>この欄には入力しないでください<input type="text" name="aiji_website" tabindex="-1" autocomplete="off"></label></p>

  <div class="entry-form__grid">
    <p class="entry-field">
      <label for="aiji-name">お名前<span class="entry-required">必須</span></label>
      <input id="aiji-name" name="aiji_name" type="text" required autocomplete="name" placeholder="例）愛児 花子">
    </p>
    <p class="entry-field">
      <label for="aiji-kana">ふりがな</label>
      <input id="aiji-kana" name="aiji_kana" type="text" autocomplete="off" placeholder="例）あいじ はなこ">
    </p>
    <p class="entry-field">
      <label for="aiji-phone">電話番号<span class="entry-required">必須</span></label>
      <input id="aiji-phone" name="aiji_phone" type="tel" required autocomplete="tel" pattern="[0-9+\-() ]{10,15}" placeholder="例）090-1234-5678">
    </p>
    <p class="entry-field">
      <label for="aiji-email">メールアドレス<span class="entry-required">必須</span></label>
      <input id="aiji-email" name="aiji_email" type="email" required autocomplete="email" placeholder="例）hanako@example.com">
    </p>
    <p class="entry-field<?php echo $aiji_ui['show_date'] ? '' : ' entry-field--wide'; ?>">
      <label for="aiji-topic"><?php echo esc_html( $aiji_ui['topic_label'] ); ?><span class="entry-required">必須</span></label>
      <select id="aiji-topic" name="aiji_topic" required>
        <option value="">選択してください</option>
        <?php foreach ( $aiji_conf['topics'] as $aiji_topic ) : ?>
        <option value="<?php echo esc_attr( $aiji_topic ); ?>"><?php echo esc_html( $aiji_topic ); ?></option>
        <?php endforeach; ?>
      </select>
    </p>
    <?php if ( $aiji_ui['show_date'] ) : ?>
    <p class="entry-field">
      <label for="aiji-date">ご希望の日時</label>
      <input id="aiji-date" name="aiji_date" type="text" maxlength="100" autocomplete="off" placeholder="例）7月中の平日午前、7/25(土) など">
    </p>
    <?php endif; ?>
    <p class="entry-field entry-field--wide">
      <label for="aiji-message"><?php echo esc_html( $aiji_ui['message_label'] ); ?><?php echo $aiji_ui['message_required'] ? '<span class="entry-required">必須</span>' : ''; ?></label>
      <textarea id="aiji-message" name="aiji_message" rows="6" maxlength="2000"<?php echo $aiji_ui['message_required'] ? ' required' : ''; ?> placeholder="<?php echo esc_attr( $aiji_ui['message_hint'] ); ?>"></textarea>
    </p>
  </div>

  <p class="entry-form__agree">
    <label>
      <input type="checkbox" name="aiji_agree" value="1" required>
      <span>ご入力いただいた個人情報を、このご連絡への回答の目的にのみ使用することに同意します。<span class="entry-required">必須</span></span>
    </label>
  </p>
  <p class="entry-form__submit">
    <button class="button button--primary" type="submit">この内容で送信する<span aria-hidden="true">›</span></button>
  </p>
</form>
<?php endif; ?>
