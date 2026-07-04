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

navToggle?.addEventListener("click", () => {
  const isOpen = header.classList.toggle("is-open");
  navToggle.setAttribute("aria-expanded", String(isOpen));
});

document.querySelectorAll("[data-nav] a").forEach((link) => {
  link.addEventListener("click", () => {
    header.classList.remove("is-open");
    navToggle?.setAttribute("aria-expanded", "false");
  });
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

// ===== アニメーション =====
const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

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
    ".guide-flow"
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
