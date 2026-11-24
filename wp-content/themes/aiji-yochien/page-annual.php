<?php
/**
 * 園での生活（スラッグ: annual）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>園での生活</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <h1>園での生活</h1>
          <p class="subpage-hero__lead">
            朝7:30の早朝保育から19:00の延長保育まで。
            登園から降園までの毎日の流れと、安心の預かり体制をご紹介します。
          </p>
          <ul class="care-hours" aria-label="預かりの時間">
            <li class="care-hours__early">早朝保育<b>7:30〜</b></li>
            <li class="care-hours__late">延長保育<b>〜19:00</b></li>
          </ul>
          <a class="button button--yellow" href="<?php echo aiji_page_url( 'schedule' ); ?>">入園のご案内も見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--annual">
          <img src="<?php echo aiji_asset( 'images/hero-main.jpg' ); ?>" alt="園庭で走る子どもたちのイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-bird-card.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#daily">1日の流れ</a>
        <a href="#care">預かり保育</a>
        <a href="<?php echo aiji_page_url( 'events' ); ?>">年間行事へ</a>
      </nav>

      <section class="page-section soft-panel cream-panel" id="daily">
        <div class="section-heading section-heading--left">
          <h2>1日の流れ</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <?php // JSが有効なときだけタブで切り替える。無効なら幼児・乳児を続けて表示する ?>
        <div class="age-tabs" role="tablist" aria-label="1日の流れのクラス" data-age-tabs hidden>
          <button class="age-tabs__tab" type="button" role="tab" id="tab-daily-kids" aria-controls="daily-kids" aria-selected="true">幼児<small>3〜5歳児</small></button>
          <button class="age-tabs__tab" type="button" role="tab" id="tab-daily-infant" aria-controls="daily-infant" aria-selected="false" tabindex="-1">乳児<small>1・2歳児</small></button>
        </div>
        <div class="age-panel" id="daily-kids" role="tabpanel" aria-labelledby="tab-daily-kids">
          <h3 class="age-panel__title">幼児（3〜5歳児）</h3>
          <div class="schedule-track">
            <?php // assets/images/photo-day-{名前}.jpg を置くと各時間帯の写真が自動で差し替わる ?>
            <article class="schedule-step">
              <div class="schedule-time">7:30</div>
              <div><h3>早朝保育</h3><p>早い時間の登園にも対応。先生や友だちとゆったり過ごします。</p></div>
              <img src="<?php echo aiji_photo( 'day-morning' ) ?: aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="早朝保育のようす">
            </article>
            <article class="schedule-step">
              <div class="schedule-time">8:30</div>
              <div><h3>登園・自由あそび</h3><p>朝の支度を整えたら、好きな遊びをじっくり楽しみます。</p></div>
              <img src="<?php echo aiji_photo( 'day-arrival' ) ?: aiji_asset( 'images/hero-children-running.png' ); ?>" alt="登園・自由あそびのようす">
            </article>
            <article class="schedule-step">
              <div class="schedule-time">10:00</div>
              <div><h3>設定保育</h3><p>英語教育・体育教育や、音楽あそび・制作などを、年齢に合わせて行います。</p></div>
              <img src="<?php echo aiji_photo( 'day-lesson' ) ?: aiji_asset( 'images/philosophy-craft-circle.png' ); ?>" alt="設定保育のようす">
            </article>
            <article class="schedule-step">
              <div class="schedule-time">11:30</div>
              <div><h3>お弁当給食</h3><p>みんなで楽しく食べながら、食事のマナーも身につけます。</p></div>
              <img src="<?php echo aiji_photo( 'day-lunch' ) ?: aiji_asset( 'images/card-icon-lunch.png' ); ?>" alt="お弁当給食の時間のようす">
            </article>
            <article class="schedule-step">
              <div class="schedule-time">13:00</div>
              <div><h3>自由あそび・保育</h3><p>外遊びや絵本など、落ち着いた時間と遊びの時間を組み合わせます。</p></div>
              <img src="<?php echo aiji_photo( 'day-play' ) ?: aiji_asset( 'images/philosophy-bubbles-circle.png' ); ?>" alt="自由あそびのようす">
            </article>
            <article class="schedule-step">
              <div class="schedule-time">14:30</div>
              <div><h3>降園</h3><p>月・火・木・金は14:30、水曜は13:30降園です。</p></div>
              <img src="<?php echo aiji_photo( 'day-return' ) ?: aiji_asset( 'images/card-icon-about-building.png' ); ?>" alt="降園のようす">
            </article>
            <article class="schedule-step">
              <div class="schedule-time">19:00</div>
              <div><h3>延長保育</h3><p>降園後は19:00まで延長保育。当日のお電話でも利用でき、手作りおやつを提供します。</p></div>
              <img src="<?php echo aiji_photo( 'day-extended' ) ?: aiji_asset( 'images/card-icon-lunch.png' ); ?>" alt="延長保育のようす">
            </article>
          </div>
        </div>
        <div class="age-panel age-panel--infant" id="daily-infant" role="tabpanel" aria-labelledby="tab-daily-infant">
          <h3 class="age-panel__title">乳児（1・2歳児）</h3>
          <div class="schedule-track">
            <article class="schedule-step schedule-step--simple">
              <div class="schedule-time">9:50</div>
              <div><h3>排泄</h3></div>
            </article>
            <article class="schedule-step schedule-step--simple">
              <div class="schedule-time">10:00</div>
              <div><h3>設定保育</h3></div>
            </article>
            <article class="schedule-step schedule-step--simple">
              <div class="schedule-time">11:30</div>
              <div><h3>お弁当給食</h3></div>
            </article>
            <article class="schedule-step schedule-step--simple">
              <div class="schedule-time">13:00</div>
              <div><h3>お昼寝</h3></div>
            </article>
            <article class="schedule-step schedule-step--simple">
              <div class="schedule-time">14:30</div>
              <div><h3>起床</h3></div>
            </article>
            <article class="schedule-step schedule-step--simple">
              <div class="schedule-time">15:00</div>
              <div><h3>おやつ</h3></div>
            </article>
            <article class="schedule-step schedule-step--simple">
              <div class="schedule-time">15:30</div>
              <div><h3>降園</h3></div>
            </article>
            <article class="schedule-step schedule-step--simple">
              <div class="schedule-time">19:00</div>
              <div><h3>延長保育</h3><p>降園後は19:00まで延長保育を利用できます。</p></div>
            </article>
          </div>
        </div>
      </section>

      <section class="page-section" id="care">
        <div class="value-grid value-grid--four">
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-tour.png' ); ?>" alt="" aria-hidden="true">
            <h3>早朝保育</h3>
            <p>朝<strong class="care-time">7:30</strong>から受け入れ。早い時間の登園が必要なご家庭も安心です。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-lunch.png' ); ?>" alt="" aria-hidden="true">
            <h3>延長保育</h3>
            <p>降園後は<strong class="care-time">19:00</strong>まで延長保育。当日のお電話でも利用でき、手作りおやつを提供します。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-annual-calendar.png' ); ?>" alt="" aria-hidden="true">
            <h3>土曜の預かり</h3>
            <p>土曜は<strong class="care-time">8:00〜15:00</strong>で預かり保育を実施します。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-lesson-swimming.png' ); ?>" alt="" aria-hidden="true">
            <h3>長期休みの預かり</h3>
            <p>夏・冬・春休み中も<strong class="care-time">7:30〜19:00</strong>で預かり保育を実施します。</p>
          </article>
        </div>
      </section>

      <section class="page-cta">
        <div>
          <h2>年間行事もご覧ください</h2>
          <p>入園式から卒園式まで、1年の行事とフォトギャラリーを別ページでご紹介しています。</p>
        </div>
        <a class="button button--yellow" href="<?php echo aiji_page_url( 'events' ); ?>">年間行事へ<span aria-hidden="true">›</span></a>
      </section>

    </main>

<?php get_footer(); ?>
