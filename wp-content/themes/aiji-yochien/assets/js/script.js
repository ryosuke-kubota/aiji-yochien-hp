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

// トップのヒーロー見出しを1文字ずつ弾ませて登場させる
const heroCopy = document.querySelector(".hero__copy");
if (!prefersReducedMotion && heroCopy) {
  let charIndex = 0;
  const splitChars = (el) => {
    Array.from(el.childNodes).forEach((node) => {
      if (node.nodeType === Node.TEXT_NODE) {
        const fragment = document.createDocumentFragment();
        Array.from(node.textContent).forEach((ch) => {
          if (ch.trim() === "") {
            fragment.appendChild(document.createTextNode(ch));
            return;
          }
          const span = document.createElement("span");
          span.className = "hero__char";
          span.style.setProperty("--char-i", charIndex);
          span.textContent = ch;
          fragment.appendChild(span);
          charIndex += 1;
        });
        node.replaceWith(fragment);
      } else if (node.nodeType === Node.ELEMENT_NODE && node.tagName !== "BR") {
        splitChars(node);
      }
    });
  };
  const kicker = heroCopy.querySelector(".hero__kicker");
  const heading = heroCopy.querySelector("h1");
  if (kicker) splitChars(kicker);
  if (heading) splitChars(heading);
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
      selector: ".philosophy__copy, .subpage-hero__copy, .text-stack, .page-section__head",
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
  const STAGGER_STEP_MS = 90;
  const STAGGER_MAX_MS = 540;
  const REVEAL_DURATION_MS = 900;

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
    { threshold: 0.12, rootMargin: "0px 0px -36px" }
  );

  targets.forEach(({ variant }, el) => {
    el.classList.add("js-reveal");
    if (variant) {
      el.classList.add(`js-reveal--${variant}`);
    }
    observer.observe(el);
  });
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
