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
          <h1>未就園児の方へ</h1>
          <p class="subpage-hero__lead">
            愛児幼稚園は2歳児から受け入れています。
            園見学や個別相談は随時受付中。まずは園の雰囲気にふれてみませんか。
          </p>
          <a class="button button--primary" href="#tour">見学・相談の案内を見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--guide">
          <img src="<?php echo aiji_asset( 'images/card-admission.png' ); ?>" alt="未就園児の方へのイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#preschool">2歳児クラス</a>
        <a href="#tour">見学・相談</a>
        <a href="#faq">よくあるご質問</a>
        <a href="#contact">お問い合わせ</a>
      </nav>

      <section class="page-section soft-panel cream-panel split-section" id="preschool">
        <div class="text-stack">
          <div class="section-heading section-heading--left">
            <h2>2歳児クラスのご案内</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p class="section-lead">2歳から、はじめての園生活を。</p>
          <p>
            愛児幼稚園では2歳児から受け入れています（募集は若干名）。
            幼児期のいちばん大切な時期を、先生や友だちとの遊びの中でゆっくり育みます。
          </p>
          <p>
            早朝保育7:30から延長保育18:30までの長時間保育と送迎バスで、
            働くご家庭の子育てもしっかり支えます。
          </p>
          <a class="button button--ghost" href="<?php echo aiji_page_url( 'schedule' ); ?>">募集要項・入園の流れを見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="photo-card">
          <img src="<?php echo aiji_asset( 'images/card-parenting.png' ); ?>" alt="2歳児クラスの親子のイメージ">
        </figure>
      </section>

      <section class="page-section" id="tour">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>見学・相談はお気軽に</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>入園前の親子で参加できる機会をご用意しています。日程はお電話でご確認ください。</p>
        </div>
        <div class="event-grid">
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-about-playground.png' ); ?>" alt="" aria-hidden="true">
            <h3>園庭開放　第2・第4土曜日</h3>
            <p>10:30〜12:30に園庭を開放しています。未就園児のお子さまも親子でご参加いただけます。</p>
            <a class="button button--small button--blue" href="#contact">相談する<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-annual-season.png' ); ?>" alt="" aria-hidden="true">
            <h3>未就園児体験　毎月1回</h3>
            <p>6月〜2月に毎月1回、バルーン体験など親子で楽しめる体験の機会をご用意しています。</p>
            <a class="button button--small button--primary" href="#contact">申込む<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="" aria-hidden="true">
            <h3>園見学・個別相談</h3>
            <p>保育中の園内見学や、2歳児クラス・転入・通園方法のご相談は随時承ります。</p>
            <a class="button button--small button--yellow" href="#contact">相談する<span aria-hidden="true">›</span></a>
          </article>
          <article class="event-card event-card--icon">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-documents.png' ); ?>" alt="" aria-hidden="true">
            <h3>募集要項・願書</h3>
            <p>願書配布は9月1日から。募集人数や入園までの流れはこちらです。</p>
            <a class="button button--small button--ghost" href="<?php echo aiji_page_url( 'schedule' ); ?>">入園のご案内へ<span aria-hidden="true">›</span></a>
          </article>
        </div>
      </section>

      <section class="page-section soft-panel" id="faq">
        <div class="section-heading section-heading--left">
          <h2>よくあるご質問</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <div class="faq-list">
          <details class="faq-item">
            <summary>いつから入園できますか？年度の途中からでも入園できますか？</summary>
            <p>年度途中のご入園も可能です。3歳のお誕生日が来たら、満3歳児として入園していただけます。詳しくは園まで直接お問い合わせください。</p>
          </details>
          <details class="faq-item">
            <summary>おむつがまだ取れていないのですが大丈夫ですか？</summary>
            <p>普通のパンツで登園していただきます。園に替えの衣類を用意していますので、失敗したときは随時着替えます。ご安心ください。</p>
          </details>
          <details class="faq-item">
            <summary>偏食が多いのですが大丈夫ですか？</summary>
            <p>苦手な食べものも少しずつ食べられるようになるよう、先生が声かけをしていきます。</p>
          </details>
          <details class="faq-item">
            <summary>子どものことで悩んでいるのですが、相談できますか？</summary>
            <p>随時ご相談を受け付けています。どんなことでもお気軽にお声かけください。</p>
          </details>
        </div>
      </section>

      <section class="page-cta" id="contact">
        <div>
          <h2>見学・入園について相談する</h2>
          <p>日程、空き状況、2歳児クラスなど、お気軽にお問い合わせください。<br>認定こども園 愛児幼稚園　TEL 06-6691-0502</p>
        </div>
        <a class="button button--primary" href="tel:0666910502">電話で問い合わせる<span aria-hidden="true">›</span></a>
      </section>
    </main>

<?php get_footer(); ?>
