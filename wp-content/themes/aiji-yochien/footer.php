<?php
/**
 * サイト共通フッター
 */

$aiji_footer_nav = array(
	array( 'url' => home_url( '/' ), 'label' => 'ホーム' ),
	array( 'url' => aiji_page_url( 'about' ), 'label' => '園の紹介' ),
	array( 'url' => aiji_page_url( 'concept' ), 'label' => '教育について' ),
	array( 'url' => aiji_page_url( 'annual' ), 'label' => '園での生活' ),
	array( 'url' => aiji_page_url( 'events' ), 'label' => '年間行事' ),
	array( 'url' => aiji_page_url( 'schedule' ), 'label' => '入園のご案内' ),
	array( 'url' => aiji_page_url( 'guide' ), 'label' => '未就園児の方へ' ),
	array( 'url' => aiji_page_url( 'news' ), 'label' => 'お知らせ' ),
	array( 'url' => home_url( '/#support' ), 'label' => '子育て支援' ),
	array( 'url' => aiji_page_url( 'about' ) . '#recruit', 'label' => '採用情報' ),
);
?>
    <footer class="site-footer">
      <div class="site-footer__inner">
        <div class="site-footer__brand">
          <a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo aiji_asset( 'images/aiji-logo.png' ); ?>" alt="愛児幼稚園 園章">
            <span>
              <span class="site-footer__eyebrow">学校法人 稲垣学園　認定こども園</span>
              <span class="site-footer__name">愛児幼稚園</span>
            </span>
          </a>
          <p class="site-footer__address">
            〒558-0002 大阪市住吉区長居西3-1-14<br>
            Osaka Metro御堂筋線・JR阪和線「長居駅」から徒歩7分
          </p>
          <p class="site-footer__tel">
            <span class="site-footer__tel-label">TEL</span>
            <a href="tel:0666910502">06-6691-0502</a>
          </p>
          <p class="site-footer__mail">
            <span class="site-footer__tel-label">MAIL</span>
            <a href="mailto:aiji@athena.ocn.ne.jp">aiji@athena.ocn.ne.jp</a>
          </p>
        </div>

        <nav class="site-footer__nav" aria-label="フッターメニュー">
          <p class="site-footer__nav-title">サイトマップ</p>
          <ul>
            <?php foreach ( $aiji_footer_nav as $aiji_footer_item ) : ?>
            <li><a href="<?php echo esc_url( $aiji_footer_item['url'] ); ?>"><?php echo esc_html( $aiji_footer_item['label'] ); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </nav>

        <div class="site-footer__cta">
          <p class="site-footer__cta-title">見学・体験 随時受付中</p>
          <a class="button button--primary" href="<?php echo aiji_page_url( 'guide' ); ?>#tour">園見学・体験のお申し込み<span aria-hidden="true">›</span></a>
          <a class="button button--pink" href="<?php echo aiji_page_url( 'guide' ); ?>#contact">お問い合わせ<span aria-hidden="true">›</span></a>
          <p class="site-footer__cta-note">お電話でのお問い合わせは 10:00〜17:00</p>
        </div>
      </div>

      <img class="site-footer__scenery" src="<?php echo aiji_asset( 'images/footer-landscape.png' ); ?>" alt="" aria-hidden="true">
      <p class="site-footer__copyright">© <?php echo esc_html( date_i18n( 'Y' ) ); ?> 学校法人 稲垣学園 認定こども園 愛児幼稚園</p>

      <button class="to-top" type="button" data-to-top aria-label="ページのトップへ戻る">
        <span aria-hidden="true">↑</span>
        ページの<br>トップへ
      </button>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
