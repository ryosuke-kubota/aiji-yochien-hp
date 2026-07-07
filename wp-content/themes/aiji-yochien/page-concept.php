<?php
/**
 * 教育について（スラッグ: concept）
 */

get_header();
?>

    <main class="subpage-main">
      <nav class="breadcrumb" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a><span>›</span><span>教育について</span></nav>
      <section class="subpage-hero">
        <div class="subpage-hero__copy">
          <p class="eyebrow"><img src="<?php echo aiji_asset( 'images/icon-sprout.png' ); ?>" alt="" aria-hidden="true">Concept</p>
          <h1>教育について</h1>
          <p class="subpage-hero__lead">
            遊びのなかで学んで考える幼児教育。
            子どもの好奇心をぐんぐんアップさせるバランスの取れたカリキュラムで、
            楽しみながら「できた！」に出会う保育を行っています。
          </p>
          <a class="button button--primary" href="<?php echo aiji_page_url( 'schedule' ); ?>">入園のご案内を見る<span aria-hidden="true">›</span></a>
        </div>
        <figure class="subpage-hero__visual subpage-hero__visual--concept">
          <img src="<?php echo aiji_asset( 'images/philosophy-craft-circle.png' ); ?>" alt="制作活動をする園児のイメージ">
          <img class="subpage-hero__deco" src="<?php echo aiji_asset( 'images/deco-sprinkles-blue.png' ); ?>" alt="" aria-hidden="true">
        </figure>
      </section>

      <nav class="page-tabs" aria-label="ページ内メニュー">
        <a href="#summary">特色</a>
        <a href="#regular">カリキュラム</a>
        <a href="#after">子育てサポート</a>
        <a href="#lunch">お昼・食育</a>
      </nav>

      <section class="page-section" id="summary">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>教育の特色</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>基本的な生活習慣を土台に、好奇心・創造性・考える力・文字や数の基礎を、遊びを通してバランスよく育てます。中でも英語レッスンと体育レッスンは、他の園にはない当園のイチオシです。</p>
        </div>
        <div class="value-grid">
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-about-craft.png' ); ?>" alt="" aria-hidden="true">
            <h3>遊びのなかで学ぶ</h3>
            <p>右脳（知恵）と左脳（知識）をバランスよく使い、遊びを通して学びにつながる基礎を培います。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-guide-consult.png' ); ?>" alt="" aria-hidden="true">
            <h3>一人一人と丁寧に</h3>
            <p>「先生！だいすき！」の信頼関係を土台に、安心して挑戦できる環境をつくります。</p>
          </article>
          <article class="value-card">
            <img src="<?php echo aiji_asset( 'images/card-icon-annual-season.png' ); ?>" alt="" aria-hidden="true">
            <h3>伝統行事も大切に</h3>
            <p>季節の行事や愛児農園での栽培体験など、心を育てる体験を保育に取り入れています。</p>
          </article>
        </div>
      </section>

      <section class="page-section soft-panel cream-panel" id="regular">
        <div class="section-heading section-heading--left">
          <h2>カリキュラム</h2>
          <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
        </div>
        <?php
        // assets/images/photo-{photo}.jpg を置くと、アイコンから実写真に自動で切り替わる
        $aiji_lessons = array(
          array( 'photo' => 'lesson-english', 'icon' => 'card-icon-lesson-english.png', 'title' => '英語レッスン', 'tag' => 'tag--blue', 'body' => '約30年前から、毎週全クラスで外国人講師による英会話指導を実施。物の名前・歌・色カードで楽しく覚えます。' ),
          array( 'photo' => 'lesson-gym', 'icon' => 'card-icon-lesson-gym.png', 'title' => '体育レッスン', 'tag' => 'tag--green', 'body' => '体育専任講師が毎週指導（年長組）。なわとび・鉄棒・トランポリンで楽しみながら、たくましい体をつくります。' ),
          array( 'photo' => 'lesson-music', 'icon' => 'card-icon-lesson-music.png', 'title' => '音楽レッスン', 'tag' => '', 'body' => '楽器を使ってリズム感を養い、みんなで合わせる楽しさを経験します。' ),
          array( 'photo' => 'lesson-writing', 'icon' => 'card-icon-lesson-art.png', 'title' => '作文レッスン', 'tag' => '', 'body' => '今覚えている言葉で作文をつくり、表現する楽しさを育てます。' ),
          array( 'photo' => 'lesson-numbers', 'icon' => 'card-icon-lesson-numbers.png', 'title' => '数のレッスン', 'tag' => '', 'body' => 'かんたんな足し算と引き算のおけいこで、学びの芽を育てます。' ),
          array( 'photo' => 'lesson-farm', 'icon' => 'card-icon-annual-season.png', 'title' => '愛児農園', 'tag' => '', 'body' => 'じゃが芋・さつま芋・玉ねぎ・大根作りに挑戦。収穫の喜びを味わいます。' ),
        );
        ?>
        <div class="lesson-grid">
          <?php foreach ( $aiji_lessons as $aiji_lesson ) :
            $aiji_lesson_photo = aiji_photo( $aiji_lesson['photo'] );
            ?>
          <article class="lesson-card<?php echo $aiji_lesson_photo ? '' : ' lesson-card--icon'; ?>">
            <img src="<?php echo $aiji_lesson_photo ? $aiji_lesson_photo : aiji_asset( 'images/' . $aiji_lesson['icon'] ); ?>" alt="<?php echo esc_attr( $aiji_lesson['title'] ); ?>のようす" loading="lazy">
            <h3><?php echo esc_html( $aiji_lesson['title'] ); ?><?php if ( $aiji_lesson['tag'] ) : ?><span class="tag <?php echo esc_attr( $aiji_lesson['tag'] ); ?>">イチオシ</span><?php endif; ?></h3>
            <p><?php echo esc_html( $aiji_lesson['body'] ); ?></p>
          </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="page-section" id="after">
        <div class="page-section__head">
          <div class="section-heading section-heading--left">
            <h2>子育てサポート</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>長時間保育と送迎バスをはじめ、細やかなサポートで毎日の通園と子育てをしっかり支えます。</p>
        </div>
        <?php
        // assets/images/photo-{photo}.jpg を置くと、アイコンから実写真に自動で切り替わる
        $aiji_supports = array(
          array( 'photo' => 'support-daycare', 'icon' => 'card-icon-annual-calendar.png', 'title' => '預かり保育', 'body' => '早朝保育7:30から、延長保育は18:30まで。当日のお電話でも利用できます。' ),
          array( 'photo' => 'support-bus', 'icon' => 'card-icon-guide-tour.png', 'title' => '送迎バス', 'body' => '希望者は園バスで送迎。効率的なルートでご負担を少なくしています。' ),
          array( 'photo' => 'support-hospital', 'icon' => 'card-icon-guide-consult.png', 'title' => '病院搬送サービス', 'body' => '園内でケガをした場合は園から病院へお連れし、完治するまで通院もお連れします。' ),
          array( 'photo' => 'support-snack', 'icon' => 'card-icon-lunch.png', 'title' => '手作りおやつ', 'body' => '預かり保育では季節のものを取り入れた手作りおやつを提供。食育にもつながります。' ),
          array( 'photo' => 'support-siblings', 'icon' => 'card-icon-lesson-manners.png', 'title' => 'きょうだい入園割引', 'body' => '兄弟・姉妹が在園児または卒園児の場合、入園準備金から1万円を減免します。' ),
          array( 'photo' => 'support-desks', 'icon' => 'card-icon-about-building.png', 'title' => '衛生・安全設備', 'body' => '各教室に空間除菌脱臭機と冷暖房を完備。1人1つの机で、ゆとりのある間隔で過ごせます。' ),
          array( 'photo' => 'support-class', 'icon' => 'icon-heart.png', 'title' => '目の届く児童数', 'body' => 'どの先生にも安心して話せるよう、一人ひとりに寄り添って接しています。入園当初に不安なお子さまも、少しずつ慣れていけるよう見守ります。' ),
          array( 'photo' => 'support-events', 'icon' => 'card-icon-annual-season.png', 'title' => '親子参加型の行事', 'body' => '運動会は親子競技や保護者の出番、賞品もご用意。盆踊りやお餅つきなど、園庭で親子のひとときを楽しめる行事が豊富です。' ),
          array( 'photo' => 'support-water', 'icon' => 'card-icon-lesson-swimming.png', 'title' => '浄水器でおいしいお水', 'body' => 'JIS規格5物質などを除去する浄水器を設置。赤ちゃんのミルクや薬の服用にも使える、安心のお水を提供しています。' ),
          array( 'photo' => 'support-bed', 'icon' => 'icon-house.png', 'title' => '午睡用の簡易ベッド', 'body' => '床から10cmほど高く、埃を吸いにくい衛生的な簡易ベッドを使用。重いお布団の持参は不要です（バスタオル2枚のみ）。' ),
        );
        ?>
        <div class="event-grid">
          <?php foreach ( $aiji_supports as $aiji_support ) :
            $aiji_support_photo = aiji_photo( $aiji_support['photo'] );
            ?>
          <article class="event-card <?php echo $aiji_support_photo ? 'event-card--photo' : 'event-card--icon'; ?>">
            <?php if ( $aiji_support_photo ) : ?>
            <img src="<?php echo $aiji_support_photo; ?>" alt="<?php echo esc_attr( $aiji_support['title'] ); ?>のようす" loading="lazy">
            <?php else : ?>
            <img src="<?php echo aiji_asset( 'images/' . $aiji_support['icon'] ); ?>" alt="" aria-hidden="true">
            <?php endif; ?>
            <h3><?php echo esc_html( $aiji_support['title'] ); ?></h3>
            <p><?php echo esc_html( $aiji_support['body'] ); ?></p>
          </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="page-section soft-panel split-section" id="lunch">
        <div class="text-stack">
          <div class="section-heading section-heading--left">
            <h2>お昼の時間・食育</h2>
            <img class="heading-dots" src="<?php echo aiji_asset( 'images/heading-dots.png' ); ?>" alt="" aria-hidden="true">
          </div>
          <p>
            12時からはお弁当の時間。みんなで楽しく食べる経験を大切にしています。
            愛児農園で育てた野菜の収穫など、食育につながる体験も保育に取り入れています。
          </p>
        </div>
        <?php $aiji_lunch_photo = aiji_photo( 'lunch' ); ?>
        <figure class="photo-card<?php echo $aiji_lunch_photo ? '' : ' photo-card--icon'; ?>">
          <img src="<?php echo $aiji_lunch_photo ? $aiji_lunch_photo : aiji_asset( 'images/card-icon-lunch.png' ); ?>" alt="お弁当の時間のようす">
        </figure>
      </section>
    </main>

<?php get_footer(); ?>
