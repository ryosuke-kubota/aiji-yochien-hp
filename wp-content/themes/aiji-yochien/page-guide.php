<?php
/**
 * 未就園児の方へ（スラッグ: guide）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>未就園児の方へ</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <p class="eyebrow"><img src="<?php echo aiji_asset( 'images/icon-bag.png' ); ?>" alt="" aria-hidden="true">Admission</p>
          <h1>未就園児の方へ</h1>
          <p class="subpage-hero__lead">
            見学会、説明会、申込、面談、入園まで。
            初めての方にも迷わず進んでもらえるようご案内します。
          </p>
          <a class="button button--primary" href="#tour">見学会・説明会を見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--guide">
          <img src="<?php echo aiji_asset( 'images/card-admission.png' ); ?>" alt="未就園児の方へのイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#tour">見学会</a>
        <a href="#flow">入園までの流れ</a>
        <a href="#info">募集概要</a>
        <a href="#contact">お問い合わせ</a>
      </nav>

      <section class="page-section" id="tour">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>見学会・説明会</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>日程・受付時間・内容・申込ボタンを1セットで確認できます。</p>
        </div>
        <div class="event-grid">
          <article class="event-card">
            <h3>新入園児見学会</h3>
            <p>保育中の園内を自由に見学。個別質問にも対応する想定です。</p>
            <a class="button button--small button--primary" href="#contact">申込む<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card">
            <h3>入園説明会</h3>
            <p>保育内容、園生活、入園までの流れ、費用などをまとめて説明します。</p>
            <a class="button button--small button--yellow" href="#contact">申込む<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card">
            <h3>未就園児向け園庭開放</h3>
            <p>親子で参加できる活動や、園の雰囲気にふれる機会を掲載します。</p>
            <a class="button button--small button--blue" href="#contact">相談する<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card">
            <h3>個別相談</h3>
            <p>転入、預かり保育、給食、通園方法などの相談導線を置きます。</p>
            <a class="button button--small button--ghost" href="#contact">問い合わせ<span aria-hidden="true">›</span></a>
          </article>
        </div>
      </section>

      <section class="page-section soft-panel cream-panel" id="flow">
        <div class="section-heading section-heading--left">
          <h2>入園までの流れ</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <div class="guide-flow">
          <article class="guide-flow__item"><h3>資料請求・お問い合わせ</h3><p>まずは園の資料、募集状況、見学可能日を確認します。</p></article>
          <article class="guide-flow__item"><h3>見学会・説明会に参加</h3><p>園の雰囲気、保育内容、入園のご案内を実際にご覧いただきます。</p></article>
          <article class="guide-flow__item"><h3>願書配布・申込</h3><p>必要書類や提出期限をわかりやすく掲載します。</p></article>
          <article class="guide-flow__item"><h3>面談・手続き</h3><p>お子さまの様子やご家庭の希望を伺い、入園準備へ進みます。</p></article>
          <article class="guide-flow__item"><h3>入園</h3><p>新しい生活が安心して始められるよう、持ち物や準備物も案内します。</p></article>
        </div>
      </section>

      <section class="page-section soft-panel" id="info">
        <div class="section-heading section-heading--left">
          <h2>募集概要</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <dl class="overview-list">
          <dt>対象年齢</dt><dd>満3歳児、3歳児、4歳児、5歳児。正式な募集人数に差し替えます。</dd>
          <dt>保育時間</dt><dd>通常保育、預かり保育、長期休暇中の保育を表で整理します。</dd>
          <dt>必要書類</dt><dd>願書、家庭状況調査票、その他必要書類を掲載します。</dd>
          <dt>費用</dt><dd>入園料、保育料、給食費、用品代などを掲載する想定です。</dd>
          <dt>注意事項</dt><dd>参加回数、定員、駐車場、持ち物など、申込前に必要な情報をまとめます。</dd>
        </dl>
      </section>

      <section class="page-cta" id="contact">
        <div>
          <h2>見学・入園について相談する</h2>
          <p>日程、空き状況、未就園児クラスなど、お気軽にお問い合わせください。</p>
        </div>
        <a class="button button--primary" href="mailto:info@example.com">お問い合わせ<span aria-hidden="true">›</span></a>
      </section>
    </main>

<?php get_footer(); ?>
