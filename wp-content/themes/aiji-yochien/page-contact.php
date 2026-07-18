<?php
/**
 * お問い合わせ（スラッグ: contact）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>お問い合わせ</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <p class="eyebrow"><img src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">Contact</p>
          <h1>お問い合わせ</h1>
          <p class="subpage-hero__lead">
            入園のこと、未就園児クラスのこと、預かり保育のこと。
            どんなことでも、お気軽にお問い合わせください。
          </p>
          <a class="button button--primary" href="#form">お問い合わせフォームへ<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--contact">
          <?php // assets/images/photo-hero-contact.jpg を置くと自動で差し替わる ?>
          <img src="<?php echo aiji_photo( 'hero-contact' ) ?: aiji_asset( 'images/hero-main.jpg' ); ?>" alt="園庭で遊ぶ子どもたちのようす">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#tel">お電話でのお問い合わせ</a>
        <a href="#form">お問い合わせフォーム</a>
        <a href="<?php echo aiji_page_url( 'guide' ); ?>#faq">よくあるご質問</a>
      </nav>

      <section class="page-section soft-panel" id="tel">
        <div class="section-heading section-heading--left">
          <h2>お電話でのお問い合わせ</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <div class="tel-panel">
          <p class="tel-panel__lead">お急ぎの方は、お電話がいちばん確実です。</p>
          <a class="tel-panel__number" href="tel:0666910502">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            06-6691-0502
          </a>
          <p class="tel-panel__note">受付時間 10:00〜17:00</p>
          <p class="tel-panel__hint">スマートフォンの方は、番号をタップするとそのまま発信できます。</p>
        </div>
      </section>

      <section class="page-section soft-panel cream-panel" id="form">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>お問い合わせフォーム</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>2〜3日たっても返信がない場合は、お手数ですがお電話にてご連絡ください。</p>
        </div>
        <?php aiji_cf7_form( 'お問い合わせ' ); ?>
      </section>

      <section class="page-cta">
        <div>
          <h2>園見学・体験のお申し込みはこちら</h2>
          <p>園の雰囲気を実際に見てみたい方は、園見学・体験ページからお申し込みいただけます。</p>
        </div>
        <a class="button button--yellow" href="<?php echo aiji_page_url( 'tour' ); ?>">園見学・体験へ<span aria-hidden="true">›</span></a>
      </section>
    </main>

<?php get_footer(); ?>
