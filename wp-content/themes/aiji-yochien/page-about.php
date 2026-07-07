<?php
/**
 * 園の紹介（スラッグ: about）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>園の紹介</span>
      </nav>

      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <p class="eyebrow"><img src="<?php echo aiji_asset( 'images/icon-house.png' ); ?>" alt="" aria-hidden="true">About</p>
          <h1>園の紹介</h1>
          <p class="subpage-hero__lead">
            子どもたち一人ひとりの毎日を見守り、家庭や地域とともに育てる園でありたい。
            愛児幼稚園の考え方と、安心して過ごせる環境をまとめます。
          </p>
          <a class="button button--primary" href="<?php echo aiji_page_url( 'guide' ); ?>">見学・入園について<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--about">
          <img src="<?php echo aiji_asset( 'images/hero-main.jpg' ); ?>" alt="愛児幼稚園の園舎と園庭で遊ぶ園児たち">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#message">ごあいさつ</a>
        <a href="#policy">教育理念</a>
        <a href="#overview">園の概要</a>
        <a href="#facility">施設紹介</a>
      </nav>

      <section class="page-section soft-panel cream-panel split-section" id="message">
        <div class="text-stack">
          <div class="section-heading section-heading--left">
            <h2>ごあいさつ</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p class="section-lead">「楽しい」「安心できる」幼稚園を目指して。</p>
          <p>
            愛児幼稚園は昭和26年8月に開園し、子どもたち、保護者、地域住民の方々に助けられながら、
            一歩一歩、歩んできました。令和元年に園舎をリニューアルし「認定こども園」としてスタートしました。
          </p>
          <p>
            「先生！だいすき！」と信頼関係を築くことで「安心」できる場となり、「友だち大好き！」と
            先生や友だちと一緒にさまざまな遊びを経験することで、生きる力の基礎や知識を蓄える基礎が形成されると考えます。
          </p>
          <p class="about-signature">理事長　白樫 章行</p>
        </div>
        <?php
        // assets/images/photo-chairman.jpg を置くと理事長の写真に自動で切り替わる
        $aiji_chairman_photo = aiji_photo( 'chairman' );
        ?>
        <figure class="photo-card<?php echo $aiji_chairman_photo ? ' photo-card--portrait' : ''; ?>">
          <img src="<?php echo $aiji_chairman_photo ? $aiji_chairman_photo : aiji_asset( 'images/hero-children-running.png' ); ?>" alt="<?php echo $aiji_chairman_photo ? '理事長 白樫章行' : '園庭で遊ぶ子どもたち'; ?>">
        </figure>
      </section>

      <section class="page-section" id="policy">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>教育理念</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>幼児期（2歳〜5歳）は、性格・人格・個性が作られる大切な時期。心・力・性のバランスを大切に育てます。</p>
        </div>
        <div class="value-grid">
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-lesson-manners.png' ); ?>" alt="" aria-hidden="true">
            <h3>心（マインド）</h3>
            <p>自立心・向上心・競争心・探求心・好奇心を日々の遊びの中で育みます。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-lesson-gym.png' ); ?>" alt="" aria-hidden="true">
            <h3>力（能力）</h3>
            <p>表現力・判断力・理解力・集中力・注意力を、体験を通して伸ばします。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-about-craft.png' ); ?>" alt="" aria-hidden="true">
            <h3>性（パーソナリティ）</h3>
            <p>創造性・積極性・感受性・協調性・社会性を、友だちとの関わりの中で培います。</p>
          </article>
        </div>
      </section>

      <section class="page-section soft-panel" id="overview">
        <div class="section-heading section-heading--left">
          <h2>園の概要</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <dl class="overview-list">
          <dt>名称</dt><dd>学校法人 稲垣学園　認定こども園 愛児幼稚園</dd>
          <dt>所在地</dt><dd>〒558-0002 大阪市住吉区長居西3-1-14</dd>
          <dt>アクセス</dt><dd>地下鉄御堂筋線・JR阪和線「長居」駅から徒歩7分</dd>
          <dt>電話</dt><dd>06-6691-0502</dd>
          <dt>メール</dt><dd>aiji@athena.ocn.ne.jp</dd>
          <dt>対象</dt><dd>2歳児・3歳児（年少）・4歳児（年中）・5歳児（年長）</dd>
          <dt>沿革</dt><dd>昭和26年8月 設立認可・開園。昭和62年 学校法人稲垣学園 設立。平成31年4月 新園舎竣工、「認定こども園」へ移行。</dd>
          <dt>保育時間</dt><dd>早朝保育 7:30〜8:30／通常保育 8:30〜14:30（水曜は13:30降園）／延長保育 18:30まで</dd>
          <dt>休園日</dt><dd>日曜・祝日・土曜・開園記念日（6月第3金曜日）　※夏期・冬期・春期休業あり（休業中も預かり保育を実施）</dd>
          <dt>通園</dt><dd>徒歩・個人送迎・園バス（希望者）</dd>
          <dt>安全</dt><dd>耐震・遮熱断熱性に優れた新園舎（平成31年竣工）、大手セキュリティ会社と契約（24時間安心・カード管理）</dd>
          <dt>嘱託医</dt><dd>内科: 医療法人 てらかど診療所／歯科: 医療法人橘正会 片山歯科医院／薬剤師: 神原 加寿子</dd>
          <dt>認定</dt><dd>ECEQ（公開保育を活用した幼児教育の質向上システム）実施園</dd>
        </dl>
      </section>

      <section class="page-section" id="facility">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>施設紹介</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>平成31年に完成した新園舎は、耐震性・遮熱断熱性に優れた安心の設計。各教室に冷暖房と空間除菌脱臭機を備え、浄水器や午睡用簡易ベッドなど衛生面にも配慮しています。</p>
        </div>
        <div class="facility-grid">
          <article class="facility-card">
            <img src="<?php echo aiji_asset( 'images/kousha.jpg' ); ?>" alt="愛児幼稚園の園舎">
            <h3>園舎・保育室</h3>
            <p>各教室に冷暖房・空間除菌脱臭機を完備。制作や音楽活動など、年齢に合わせた活動が広がります。</p>
          </article>
          <article class="facility-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-about-playground.png' ); ?>" alt="園庭のイメージ">
            <h3>園庭</h3>
            <p>走る、登る、砂で遊ぶなど、体を動かしながら友だちとの関わりを深めます。</p>
          </article>
          <article class="facility-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-about-craft.png' ); ?>" alt="制作活動のイメージ">
            <h3>制作スペース</h3>
            <p>絵画や工作を通して、手を動かす楽しさと表現する力を育てます。</p>
          </article>
          <article class="facility-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-annual-season.png' ); ?>" alt="季節のあそびのイメージ">
            <h3>季節のあそび</h3>
            <p>自然や季節を感じる活動を、日常の保育と行事に取り入れます。</p>
          </article>
        </div>
      </section>

      <section class="page-cta">
        <div>
          <h2>教育についてもあわせてご覧ください</h2>
          <p>カリキュラムやレッスン、子育てサポートなど、毎日の保育内容を整理しています。</p>
        </div>
        <a class="button button--ghost" href="<?php echo aiji_page_url( 'concept' ); ?>">教育についてへ<span aria-hidden="true">›</span></a>
      </section>

      <section class="page-cta" id="recruit">
        <div>
          <h2>採用情報</h2>
          <p>愛児幼稚園では現在、幼稚園教諭を募集しています。詳細はお電話にてお問い合わせください。<br>TEL 06-6691-0502</p>
        </div>
        <a class="button button--primary" href="tel:0666910502">電話で問い合わせる<span aria-hidden="true">›</span></a>
      </section>
    </main>

<?php get_footer(); ?>
