const mobileMenu = document.getElementById("mobile-menu");
const mobileMenuOpenBtn = document.getElementById("mobile-menu-open-btn");
const mobileMenuCloseBtn = document.getElementById("mobile-menu-close-btn");

mobileMenuOpenBtn.onclick = () => {
  mobileMenu.classList.remove("hidden");
};
mobileMenuCloseBtn.onclick = () => {
  mobileMenu.classList.add("hidden");
};
