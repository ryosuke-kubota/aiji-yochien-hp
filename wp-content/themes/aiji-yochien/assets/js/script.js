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
