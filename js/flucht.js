import anime from "animejs/lib/anime.es.js";

const f = d => 5e-6 * d * d;

const moveElement = (element, clientX, clientY, width, height) => {
  const rect = element.getBoundingClientRect();
  const x = rect.left + rect.width / 2;
  const y = rect.top + rect.height / 2;

  const xDiff = x - clientX;
  const xSign = xDiff < 0 ? -1 : 1;
  const yDiff = y - clientY;
  const ySign = yDiff < 0 ? -1 : 1;

  anime({
    targets: element,
    translateX: xSign * f(width - Math.abs(xDiff)),
    translateY: ySign * 10 * f(height - Math.abs(yDiff))
  });
};

const setup = () => {
  const height = document.querySelector(".spray-logo").getBoundingClientRect()
    .height;
  const width =
    window.innerWidth ||
    document.documentElement.clientWidth ||
    document.body.clientWidth;

  const spray = document.querySelector(".spray-logo");
  const v = document.querySelector(".spray-logo .v");
  const a = document.querySelector(".spray-logo .a");

  let clientX = 0,
    clientY = 0;

  let interval;

  const updateMouse = e => {
    clientX = e.clientX;
    clientY = e.clientY;
  };

  const updatePosition = () => {
    moveElement(v, clientX, clientY, width, height);
    moveElement(a, clientX, clientY, width, height);
  };

  spray.addEventListener("mouseenter", () => {
    interval = setInterval(updatePosition, 250);
    document.addEventListener("mousemove", updateMouse);
  });

  spray.addEventListener("mouseleave", () => {
    document.removeEventListener("mousemove", updateMouse);
    clearInterval(interval);

    anime({
      targets: [v, a],
      translateX: 0,
      translateY: 0
    });
  });
};

document.addEventListener("DOMContentLoaded", () => {
  setup();
});
