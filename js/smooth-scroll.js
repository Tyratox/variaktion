const scrollTo = id => {
  const element = document.getElementById(id);
  window.scrollTo({
    top: element.offsetTop - 70 /*navbar*/,
    behavior: "smooth"
  });
  history.pushState({}, "", "#" + id);
};

const smoothScroll = e => {
  e.preventDefault();
  e.stopPropagation();

  const id = e.target.getAttribute("href").substring(2);

  scrollTo(id);
};

document.addEventListener("DOMContentLoaded", () => {
  if (window.location.hash.length > 1) {
    const id = window.location.hash.substring(1);
    setTimeout(() => scrollTo(id), 50);
  }
  if (window.location.pathname === "/") {
    document.querySelectorAll("a[href]").forEach(el => {
      if (el.getAttribute("href").startsWith("/#")) {
        el.addEventListener("click", smoothScroll);
      }
    });
  }
});
