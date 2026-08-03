const header = document.querySelector("[data-header]");
const navToggle = document.querySelector("[data-nav-toggle]");
const toTop = document.querySelector("[data-to-top]");
const announcement = document.querySelector("[data-announcement]");
const announcementNext = document.querySelector("[data-announcement-next]");

const announcements = [
  {
    title: "令和7年度 入園説明会のお知らせ",
    body: "6月15日(日)に入園説明会を開催します。詳しくはこちらをご確認ください。"
  },
  {
    title: "未就園児クラス 体験日のご案内",
    body: "親子で楽しめる制作あそびと園庭開放を予定しています。"
  },
  {
    title: "園庭開放のお知らせ",
    body: "地域の皆さまに向けた園庭開放日を更新しました。"
  }
];

let announcementIndex = 0;

// サイドメニューの開閉（オーバーレイクリック・Escでも閉じる）
const menuOverlay = document.querySelector("[data-menu-overlay]");

const setMenu = (isOpen) => {
  header.classList.toggle("is-open", isOpen);
  document.body.classList.toggle("menu-open", isOpen);
  navToggle?.setAttribute("aria-expanded", String(isOpen));
};

navToggle?.addEventListener("click", () => {
  setMenu(!header.classList.contains("is-open"));
});

menuOverlay?.addEventListener("click", () => setMenu(false));

document.addEventListener("keydown", (event) => {
  if (event.key === "Escape" && header.classList.contains("is-open")) {
    setMenu(false);
  }
});

document.querySelectorAll("[data-menu] a").forEach((link) => {
  link.addEventListener("click", () => setMenu(false));
});

announcementNext?.addEventListener("click", () => {
  announcementIndex = (announcementIndex + 1) % announcements.length;
  const item = announcements[announcementIndex];
  announcement.innerHTML = `
    <p class="important__title"><span class="important__tag">重要</span>${item.title}</p>
    <p>${item.body}</p>
  `;
});

toTop?.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});

// ある程度スクロールしたらトップへ戻るボタンを表示し、リングに読み進み具合を反映する
const TO_TOP_SHOW_Y = 480;
const toTopRing = document.querySelector("[data-to-top-ring]");
const TO_TOP_RING_LENGTH = 2 * Math.PI * 21; // circle r=21 の周長。CSSのstroke-dasharrayと揃える
const updateToTop = () => {
  if (!toTop) return;
  toTop.classList.toggle("is-shown", window.scrollY > TO_TOP_SHOW_Y);
  if (toTopRing) {
    const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
    const progress = maxScroll > 0 ? Math.min(window.scrollY / maxScroll, 1) : 0;
    toTopRing.style.strokeDashoffset = String(TO_TOP_RING_LENGTH * (1 - progress));
  }
};
updateToTop();
window.addEventListener("scroll", updateToTop, { passive: true });

// ===== アニメーション =====
const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

// heroクリップパスのSMILモーフはCSSでは止められないため、ここで除去する
if (prefersReducedMotion) {
  document.querySelectorAll("#aiji-hero-clip animate").forEach((el) => el.remove());
}

// テキストを1文字ずつ span で包み、--char-i に通し番号を入れる。
// 文字単位で時間差をつけて動かすために使う。戻り値は次に使える通し番号。
const splitChars = (el, className, startIndex = 0) => {
  let index = startIndex;
  Array.from(el.childNodes).forEach((node) => {
    if (node.nodeType === Node.TEXT_NODE) {
      const fragment = document.createDocumentFragment();
      Array.from(node.textContent).forEach((ch) => {
        if (ch.trim() === "") {
          fragment.appendChild(document.createTextNode(ch));
          return;
        }
        const span = document.createElement("span");
        span.className = className;
        span.style.setProperty("--char-i", index);
        span.textContent = ch;
        fragment.appendChild(span);
        index += 1;
      });
      node.replaceWith(fragment);
    } else if (node.nodeType === Node.ELEMENT_NODE && node.tagName !== "BR") {
      index = splitChars(node, className, index);
    }
  });
  return index;
};

// トップのヒーロー見出しを1文字ずつ弾ませて登場させる
const heroCopy = document.querySelector(".hero__copy");
if (!prefersReducedMotion && heroCopy) {
  let charIndex = 0;
  const kicker = heroCopy.querySelector(".hero__kicker");
  const heading = heroCopy.querySelector("h1");
  if (kicker) charIndex = splitChars(kicker, "hero__char", charIndex);
  if (heading) charIndex = splitChars(heading, "hero__char", charIndex);
  heroCopy.closest(".hero")?.classList.add("hero--chars");
}

// スクロールに合わせて要素を方向つきでふわっと表示する
if (!prefersReducedMotion && "IntersectionObserver" in window) {
  const revealPlans = [
    {
      selector:
        ".important, .news-panel, .closing, .page-cta, .overview-list, .features .section-heading, .page-section > .section-heading, .pickup .section-heading, .pickup__lead",
      variant: ""
    },
    {
      // page-section__head はブロックごと動かすと中の見出しが二重に動くため、
      // 見出し以外（説明文）だけをフェードの対象にする
      selector: ".philosophy__copy, .subpage-hero__copy, .text-stack, .page-section__head > p",
      variant: "left"
    },
    {
      selector: ".philosophy__photos, .photo-card",
      variant: "right"
    },
    {
      selector: ".subpage-hero__visual",
      variant: "zoom"
    }
  ];
  const staggerContainers = [
    ".feature-grid",
    ".pickup-grid",
    ".link-cards",
    ".value-grid",
    ".lesson-grid",
    ".facility-grid",
    ".event-grid",
    ".month-grid",
    ".schedule-track",
    ".guide-flow",
    ".event-gallery"
  ];
  // ゆったり順番に出したいのでカード間の間隔を広めに取る
  const STAGGER_STEP_MS = 110;
  const STAGGER_MAX_MS = 520;
  // CSSのトランジション（最長1.25s）が終わってから後片付けする
  const REVEAL_DURATION_MS = 1400;

  const targets = new Map();
  revealPlans.forEach(({ selector, variant }) => {
    document.querySelectorAll(selector).forEach((el) => {
      targets.set(el, { delay: 0, variant });
    });
  });
  document.querySelectorAll(staggerContainers.join(",")).forEach((grid) => {
    Array.from(grid.children).forEach((child, index) => {
      if (child.tagName === "IMG") return; // 浮遊する装飾画像は対象外
      targets.set(child, { delay: Math.min(index * STAGGER_STEP_MS, STAGGER_MAX_MS), variant: "" });
    });
  });

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const { delay } = targets.get(el) || { delay: 0 };
        el.style.transitionDelay = `${delay}ms`;
        el.classList.add("is-visible");
        observer.unobserve(el);
        // 表示後はクラスを外し、カード自身のホバー用transitionへ戻す
        window.setTimeout(() => {
          el.classList.remove("js-reveal", "js-reveal--left", "js-reveal--right", "js-reveal--zoom", "is-visible");
          el.style.transitionDelay = "";
        }, REVEAL_DURATION_MS + delay);
      });
    },
    // 高さの違う要素でも「上端が画面下から80px入った時点」で揃って動き出すようにする。
    // 割合(threshold)で見ると背の高いセクションほど動き出しが遅れ、急に出る印象になる。
    { threshold: 0, rootMargin: "0px 0px -80px 0px" }
  );

  targets.forEach(({ variant }, el) => {
    el.classList.add("js-reveal");
    if (variant) {
      el.classList.add(`js-reveal--${variant}`);
    }
    observer.observe(el);
  });
}

// セクション見出しを、1文字ずつふわっとせり上がらせる（全ページ共通）
if (!prefersReducedMotion) {
  const riseTargets = document.querySelectorAll(".section-heading h2");
  if (riseTargets.length) {
    const riseObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-risen");
          riseObserver.unobserve(entry.target);
        });
      },
      // 見出しが少し見えてから動き始める
      { threshold: 0, rootMargin: "0px 0px -90px 0px" }
    );
    riseTargets.forEach((heading) => {
      // 見出しごとに0から数え直し、どの見出しも左端から順に上がるようにする
      splitChars(heading, "heading-char");
      // 文字を「隠れた床」から出すため、1文字ずつ内側にもう1枚包む。
      // 外側が窓（はみ出しを隠す）、内側が動く役割。
      heading.querySelectorAll(".heading-char").forEach((box) => {
        const inner = document.createElement("span");
        inner.className = "heading-char__in";
        inner.textContent = box.textContent;
        box.textContent = "";
        box.appendChild(inner);
      });
      // 親のフェードインと重なると文字の動きが埋もれるので、見出しブロックは動かさない
      heading
        .closest(".section-heading")
        ?.classList.remove("js-reveal", "js-reveal--left", "js-reveal--right", "js-reveal--zoom");
      // 本文や写真を含む大きなブロックの中にある見出しは、そのブロックのフェードを残す。
      // 代わりに文字が上がり始めるのを少し遅らせ、ブロック → 文字の順に見えるようにする。
      if (heading.closest(".js-reveal")) {
        heading.style.setProperty("--rise-offset", "0.35s");
      }
      heading.classList.add("heading-rise");
      riseObserver.observe(heading);
    });
  }
}

// 行事フォトギャラリーのライトボックス（行事ごとの写真セットをスライダーで閲覧）
const galleryItems = Array.from(document.querySelectorAll(".event-gallery__item"));
if (galleryItems.length > 0) {
  const lightbox = document.createElement("div");
  lightbox.className = "aiji-lightbox";
  lightbox.setAttribute("role", "dialog");
  lightbox.setAttribute("aria-modal", "true");
  lightbox.setAttribute("aria-label", "写真の拡大表示");
  lightbox.innerHTML = `
    <button class="aiji-lightbox__close" type="button" aria-label="閉じる">×</button>
    <button class="aiji-lightbox__nav aiji-lightbox__nav--prev" type="button" aria-label="前の写真">‹</button>
    <figure class="aiji-lightbox__figure">
      <img src="" alt="">
      <figcaption class="aiji-lightbox__caption"></figcaption>
      <p class="aiji-lightbox__counter" aria-live="polite"></p>
    </figure>
    <button class="aiji-lightbox__nav aiji-lightbox__nav--next" type="button" aria-label="次の写真">›</button>
  `;
  document.body.appendChild(lightbox);

  const lightboxImg = lightbox.querySelector("img");
  const lightboxCaption = lightbox.querySelector(".aiji-lightbox__caption");
  const lightboxCounter = lightbox.querySelector(".aiji-lightbox__counter");
  const closeButton = lightbox.querySelector(".aiji-lightbox__close");
  const prevButton = lightbox.querySelector(".aiji-lightbox__nav--prev");
  const nextButton = lightbox.querySelector(".aiji-lightbox__nav--next");
  // クリックしたカード（行事）の写真セットだけをスライドで見せる
  let photos = [];
  let photoIndex = 0;
  let groupTitle = "";
  let lastFocused = null;

  const renderPhoto = () => {
    const photo = photos[photoIndex];
    if (!photo) return;
    lightboxImg.src = photo.src;
    lightboxImg.alt = photo.alt || groupTitle;
    lightboxCaption.textContent = groupTitle;
    const hasMultiple = photos.length > 1;
    lightboxCounter.textContent = hasMultiple ? `${photoIndex + 1} / ${photos.length}` : "";
    prevButton.style.display = hasMultiple ? "" : "none";
    nextButton.style.display = hasMultiple ? "" : "none";
  };

  const showNext = () => {
    photoIndex = (photoIndex + 1) % photos.length;
    renderPhoto();
  };
  const showPrev = () => {
    photoIndex = (photoIndex - 1 + photos.length) % photos.length;
    renderPhoto();
  };

  const openLightbox = (item) => {
    const img = item.querySelector("img");
    const caption = item.querySelector("figcaption");
    groupTitle = caption ? caption.textContent : (img ? img.alt : "");
    photos = img ? [{ src: img.src, alt: img.alt }] : [];
    if (item.dataset.gallery) {
      try {
        const parsed = JSON.parse(item.dataset.gallery);
        if (Array.isArray(parsed) && parsed.length > 0) photos = parsed;
      } catch (error) {
        // JSONが壊れていてもサムネイル1枚で表示する
      }
    }
    photoIndex = 0;
    renderPhoto();
    lightbox.classList.add("is-open");
    lastFocused = document.activeElement;
    closeButton.focus();
  };

  const closeLightbox = () => {
    lightbox.classList.remove("is-open");
    lastFocused?.focus();
  };

  galleryItems.forEach((item) => {
    item.setAttribute("tabindex", "0");
    item.setAttribute("role", "button");
    item.addEventListener("click", () => openLightbox(item));
    item.addEventListener("keydown", (event) => {
      if (event.key === "Enter" || event.key === " ") {
        event.preventDefault();
        openLightbox(item);
      }
    });
  });

  nextButton.addEventListener("click", showNext);
  prevButton.addEventListener("click", showPrev);
  closeButton.addEventListener("click", closeLightbox);

  // スマホでは指を横に払っても写真を切り替えられるようにする
  const SWIPE_THRESHOLD_PX = 45;
  let swipeStartX = 0;
  let swipeStartY = 0;
  let isSwiping = false;

  lightbox.addEventListener(
    "touchstart",
    (event) => {
      // 指が2本以上のとき（拡大操作）は写真を切り替えない
      isSwiping = event.touches.length === 1 && photos.length > 1;
      if (!isSwiping) return;
      swipeStartX = event.touches[0].clientX;
      swipeStartY = event.touches[0].clientY;
    },
    { passive: true }
  );

  lightbox.addEventListener(
    "touchend",
    (event) => {
      if (!isSwiping) return;
      isSwiping = false;
      const touch = event.changedTouches[0];
      const moveX = touch.clientX - swipeStartX;
      const moveY = touch.clientY - swipeStartY;
      // 動きが小さいときや、縦方向のほうが大きいときは切り替えない
      if (Math.abs(moveX) < SWIPE_THRESHOLD_PX || Math.abs(moveX) < Math.abs(moveY)) return;
      if (moveX < 0) {
        showNext();
      } else {
        showPrev();
      }
    },
    { passive: true }
  );
  lightbox.addEventListener("click", (event) => {
    if (event.target === lightbox) closeLightbox();
  });
  document.addEventListener("keydown", (event) => {
    if (!lightbox.classList.contains("is-open")) return;
    if (event.key === "Escape") closeLightbox();
    if (photos.length > 1 && event.key === "ArrowRight") showNext();
    if (photos.length > 1 && event.key === "ArrowLeft") showPrev();
  });
}
