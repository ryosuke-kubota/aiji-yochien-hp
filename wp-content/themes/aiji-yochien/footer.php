<?php
/**
 * サイト共通フッター
 */
?>
    <footer class="site-footer">
      <div class="site-footer__info">
        <p class="site-footer__name">学校法人 稲垣学園　認定こども園 愛児幼稚園</p>
        <p class="site-footer__address">〒558-0002 大阪市住吉区長居西3-1-14　TEL <a href="tel:0666910502">06-6691-0502</a></p>
      </div>
      <img src="<?php echo aiji_asset( 'images/footer-landscape.png' ); ?>" alt="" aria-hidden="true">
      <button class="to-top" type="button" data-to-top aria-label="ページのトップへ戻る">
        <span aria-hidden="true">↑</span>
        ページの<br>トップへ
      </button>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
