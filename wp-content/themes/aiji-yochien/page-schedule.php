<?php
/**
 * 入園のご案内（スラッグ: schedule）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>入園のご案内</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <p class="eyebrow"><img src="<?php echo aiji_asset( 'images/icon-book.png' ); ?>" alt="" aria-hidden="true">Admission Guide</p>
          <h1>入園のご案内</h1>
          <p class="subpage-hero__lead">
            願書配布は9月1日から、願書受付は10月1日から。
            2歳児から受け入れています。募集要項と入園までの流れをご案内します。
          </p>
          <a class="button button--primary" href="<?php echo aiji_page_url( 'guide' ); ?>#tour">見学会で雰囲気を見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--schedule">
          <img src="<?php echo aiji_asset( 'images/card-prekindergarten.png' ); ?>" alt="親子活動のイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-dot-yellow.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#dates">募集スケジュール</a>
        <a href="#flow">入園までの流れ</a>
        <a href="#info">募集概要</a>
        <a href="#fees">保育料・諸費用</a>
        <a href="#contact">お問い合わせ</a>
      </nav>

      <section class="page-section" id="dates">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>園児募集スケジュール</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>見学やご相談は随時、お電話で受け付けています。</p>
        </div>
        <div class="event-grid">
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-documents.png' ); ?>" alt="" aria-hidden="true">
            <h3>願書配布　9月1日から</h3>
            <p>入園願書は9月1日から園にて配布します。お気軽にお越しください。</p>
            <a class="button button--small button--primary" href="#contact">問い合わせる<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-annual-calendar.png' ); ?>" alt="" aria-hidden="true">
            <h3>願書受付　10月1日から</h3>
            <p>10月1日から受付開始。定員になり次第締め切らせていただきます。</p>
            <a class="button button--small button--yellow" href="#contact">問い合わせる<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-about-playground.png' ); ?>" alt="" aria-hidden="true">
            <h3>2歳児から受け入れます</h3>
            <p>2歳児クラスからの入園が可能。詳しくは未就園児の方へのページをご覧ください。</p>
            <a class="button button--small button--blue" href="<?php echo aiji_page_url( 'guide' ); ?>">詳しく見る<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="" aria-hidden="true">
            <h3>園見学・個別相談</h3>
            <p>入園や転入、預かり保育、通園方法のご相談は随時承ります。</p>
            <a class="button button--small button--ghost" href="<?php echo aiji_page_url( 'guide' ); ?>#tour">見学の案内を見る<span aria-hidden="true">›</span></a>
          </article>
        </div>
      </section>

      <section class="page-section soft-panel cream-panel" id="flow">
        <div class="section-heading section-heading--left">
          <h2>入園までの流れ</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <div class="guide-flow">
          <article class="guide-flow__item"><img class="guide-flow__icon" src="<?php echo aiji_asset( 'images/card-icon-guide-consult.png' ); ?>" alt="" aria-hidden="true"><div><h3>資料請求・お問い合わせ</h3><p>まずは園の資料、募集状況、見学可能日を確認します。</p></div></article>
          <article class="guide-flow__item"><img class="guide-flow__icon" src="<?php echo aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="" aria-hidden="true"><div><h3>見学会・説明会に参加</h3><p>園の雰囲気、保育内容、入園のご案内を実際にご覧いただきます。</p></div></article>
          <article class="guide-flow__item"><img class="guide-flow__icon" src="<?php echo aiji_asset( 'images/card-icon-guide-documents.png' ); ?>" alt="" aria-hidden="true"><div><h3>願書配布・申込</h3><p>願書配布は9月1日から、受付は10月1日からです。</p></div></article>
          <article class="guide-flow__item"><img class="guide-flow__icon" src="<?php echo aiji_asset( 'images/card-icon-lesson-manners.png' ); ?>" alt="" aria-hidden="true"><div><h3>面談・手続き</h3><p>お子さまの様子やご家庭の希望を伺い、入園準備へ進みます。</p></div></article>
          <article class="guide-flow__item"><img class="guide-flow__icon" src="<?php echo aiji_asset( 'images/card-icon-about-building.png' ); ?>" alt="" aria-hidden="true"><div><h3>入園</h3><p>新しい生活が安心して始められるよう、持ち物や準備物も案内します。</p></div></article>
        </div>
      </section>

      <section class="page-section soft-panel" id="info">
        <div class="section-heading section-heading--left">
          <h2>募集概要</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <dl class="overview-list">
          <dt>入園資格</dt><dd>2歳児より就学始期に達するまでの幼児</dd>
          <dt>募集人数</dt><dd>2才児: 若干名／年少クラス（3才児）: 30名／年中クラス（4才児）: 20名／年長クラス（5才児）: 若干名</dd>
          <dt>願書配布</dt><dd>9月1日から</dd>
          <dt>募集期間</dt><dd>10月1日〜 願書受付開始（受付時間 10:00〜17:00）　※定員になり次第締め切らせていただきます。</dd>
          <dt>説明会</dt><dd>新入園児説明会・制服渡し: 1月中旬の指定日に保護者同伴でご出席ください。</dd>
          <dt>保育時間</dt><dd>早朝保育 7:30〜／通常保育 8:30〜14:30（水曜は13:30降園）／延長保育 18:30まで</dd>
          <dt>通園</dt><dd>徒歩・個人送迎・園バス（希望者）</dd>
          <dt>備考</dt><dd>子育て世帯の保護者の負担軽減が拡充されています。詳しくは園にお問い合わせください。</dd>
        </dl>
      </section>

      <section class="page-section" id="fees">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>保育料・諸費用</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>1号認定の場合の主な費用です。金額や詳細は変更になる場合がありますので、最新の情報は園にご確認ください。</p>
        </div>
        <h3 class="fees-subheading">入園前にお支払いいただくもの</h3>
        <dl class="overview-list">
          <dt>入園準備金</dt><dd>40,000円（保育環境の維持・充実および入園手続きにかかる事務手数料）</dd>
          <dt>保育用品代</dt><dd>制服代（体操服含む）約40,000円 ※必要な物のみの購入も可／夏制服 約9,000円／通園靴 約900円／通園カバン 約3,000円／防災ズキン 約3,000円</dd>
          <dt>きょうだい減免</dt><dd>兄弟・姉妹が在園児または卒園児の場合、入園準備金から1万円を減免。同時に2名以上入園の場合は1人分の冬制服一式を全額減免します。</dd>
        </dl>
        <h3 class="fees-subheading">在園時に毎月お支払いいただくもの</h3>
        <dl class="overview-list">
          <dt>保育充実費</dt><dd>4,600円（外国人講師による英語教育など、保育の充実のための費用）</dd>
          <dt>給食費</dt><dd>5,300円（2号認定は6,800円、3号認定は基本保育料に含む）</dd>
          <dt>PTA費</dt><dd>500円</dd>
          <dt>保育環境充実費</dt><dd>2,000円</dd>
        </dl>
        <h3 class="fees-subheading">ご利用される方のみお支払いいただくもの</h3>
        <dl class="overview-list">
          <dt>預かり保育利用料</dt><dd>利用した分をお支払いいただきます。長時間の利用が必要な場合は2号認定の支給をご案内します。</dd>
          <dt>園バス代</dt><dd>月額4,000円（希望者）</dd>
          <dt>遠足費・行事費</dt><dd>遠足は人数割（最大約3,000円）。行事ごとに事前にご案内します。</dd>
        </dl>
      </section>

      <section class="page-cta" id="contact">
        <div>
          <h2>入園について相談する</h2>
          <p>募集状況、願書、2歳児クラスなど、お気軽にお問い合わせください。<br>認定こども園 愛児幼稚園　TEL 06-6691-0502</p>
        </div>
        <a class="button button--primary" href="tel:0666910502">電話で問い合わせる<span aria-hidden="true">›</span></a>
      </section>
    </main>

<?php get_footer(); ?>
