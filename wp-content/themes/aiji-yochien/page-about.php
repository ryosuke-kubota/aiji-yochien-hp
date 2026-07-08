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
          <img src="<?php echo aiji_asset( 'images/kousha.jpg' ); ?>" alt="愛児幼稚園の園舎と園庭で遊ぶ園児たち">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-flower.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#message">ごあいさつ</a>
        <a href="#policy">教育理念</a>
        <a href="#features">愛児幼稚園の特徴</a>
        <a href="#overview">園の概要</a>
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

      <section class="page-section" id="features">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>愛児幼稚園の特徴</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>預かり保育や送迎バスなどの手厚いサポートから、安心の設備まで。愛児幼稚園ならではの特徴をご紹介します。</p>
        </div>
        <?php
        // assets/images/photo-{photo}.jpg を置くと、アイコンから実写真に自動で切り替わる
        $aiji_features = array(
          array( 'photo' => 'support-daycare', 'icon' => 'card-icon-annual-calendar.png', 'title' => '預かり保育が充実', 'body' => 'ホームクラス（預かり保育）は自由がきき、当日のお電話でもOK。18:30までお預かりします。早朝保育は7:30〜8:30です。' ),
          array( 'photo' => 'support-class', 'icon' => 'icon-heart.png', 'title' => '目の届く児童数', 'body' => 'どの先生にも安心して話せるよう、一人ひとりに寄り添って接しています。入園当初に不安なお子さまも、少しずつ慣れていけるよう見守ります。' ),
          array( 'photo' => 'support-teachers', 'icon' => 'card-icon-lesson-english.png', 'title' => '専任講師も充実', 'body' => '約30年前から毎週、全クラスで外国人講師による英会話指導を実施。体育も専任講師が毎週1回、年長組に指導しています。' ),
          array( 'photo' => 'support-events', 'icon' => 'card-icon-annual-season.png', 'title' => '親子参加型の行事も', 'body' => '運動会は親子競技や保護者の出番、賞品もご用意。盆踊りやお餅つきなど、園庭で親子のひとときを楽しめる行事が豊富です。' ),
          array( 'photo' => 'support-bus', 'icon' => 'card-icon-guide-consult.png', 'title' => '病院搬送サービス', 'body' => '園内でケガをした場合は園から病院へお連れし、完治するまで通院もお連れします。' ),
          array( 'photo' => 'support-desks', 'icon' => 'card-icon-about-building.png', 'title' => '衛生対策も行っています', 'body' => '各教室に空間除菌脱臭機と冷暖房を完備。1人1つの机で、ゆとりのある間隔で過ごせます。' ),
          array( 'photo' => 'support-siblings', 'icon' => 'card-icon-lesson-manners.png', 'title' => 'きょうだい入園でオトク！', 'body' => '兄弟・姉妹が在園児または卒園児の場合、入園準備金から1万円を減免します。' ),
          array( 'photo' => 'support-snack', 'icon' => 'card-icon-lunch.png', 'title' => '預かり保育のおやつ', 'body' => '手作りおやつを提供しています。季節のものを取り入れて食べものへの興味を育てる、食育にもつながる時間です。' ),
          array( 'photo' => 'support-water', 'icon' => 'card-icon-lesson-swimming.png', 'title' => '浄水器でおいしいお水を', 'body' => 'JIS規格5物質などを除去する浄水器を設置。赤ちゃんのミルクや薬の服用にも使える、安心のお水を提供しています。' ),
          array( 'photo' => 'support-bed', 'icon' => 'icon-house.png', 'title' => '午睡用の簡易ベッド', 'body' => '床から10cmほど高く、埃を吸いにくい衛生的な簡易ベッドを使用。重いお布団の持参は不要です（バスタオル2枚のみ）。' ),
        );
        ?>
        <div class="event-grid">
          <?php foreach ( $aiji_features as $aiji_feature ) :
            $aiji_feature_photo = aiji_photo( $aiji_feature['photo'] );
            ?>
          <article class="event-card <?php echo $aiji_feature_photo ? 'event-card--photo' : 'event-card--icon'; ?>">
            <?php if ( $aiji_feature_photo ) : ?>
            <img src="<?php echo $aiji_feature_photo; ?>" alt="<?php echo esc_attr( $aiji_feature['title'] ); ?>のようす" loading="lazy">
            <?php else : ?>
            <img src="<?php echo aiji_asset( 'images/' . $aiji_feature['icon'] ); ?>" alt="" aria-hidden="true">
            <?php endif; ?>
            <h3><?php echo esc_html( $aiji_feature['title'] ); ?></h3>
            <p><?php echo esc_html( $aiji_feature['body'] ); ?></p>
          </article>
          <?php endforeach; ?>
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
          <p>愛児幼稚園では現在、幼稚園教諭を募集しています。募集要項と応募フォームは採用情報ページをご覧ください。<br>お電話でのご相談も歓迎です。TEL 06-6691-0502</p>
        </div>
        <a class="button button--primary" href="<?php echo aiji_page_url( 'recruit' ); ?>">採用情報・応募フォームへ<span aria-hidden="true">›</span></a>
      </section>
    </main>

<?php get_footer(); ?>
