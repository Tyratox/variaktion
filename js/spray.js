const spray = (
  selector,
  minRotation = -40,
  maxRotation = 40,
  minScale = 0.8,
  minX = -50,
  maxX = 0,
  minY = -50,
  maxY = 0
) => {
  const el = document.querySelector(selector);
  const rows = el.querySelectorAll(".dot-row");
  const dots = [];

  const rotation = minRotation + (maxRotation - minRotation) * Math.random();
  const scale = minScale + (1.0 - minScale) * Math.random();
  const x = minX + (maxX - minX) * Math.random();
  const y = minY + (maxY - minY) * Math.random();

  el.style.transform = `translate(${x}%, ${y}%) rotateZ(${rotation}deg) scale(${scale})`;

  const _spray_row = (rowIndex, callback) => {
    if (rowIndex >= rows.length) {
      callback();
      return;
    }

    const row = rows[rowIndex];
    const top = parseFloat(row.getAttribute("data-top"));
    const leftFrom =
      parseFloat(row.getAttribute("data-left-from")) - Math.random() * 5;
    const leftTo =
      parseFloat(row.getAttribute("data-left-to")) + Math.random() * 5;
    const diff = leftTo - leftFrom;

    const _spray_dot = (dotIndex, cb) => {
      if (dotIndex > diff) {
        cb();
        return;
      }

      const dot = document.createElement("div");
      dot.classList.add("dot");
      dot.style.top = top + "%";
      dot.style.left = leftFrom + dotIndex + "%";

      row.appendChild(dot);
      requestAnimationFrame(() => dot.classList.add("visible"));
      dots.push(dot);

      requestAnimationFrame(() => _spray_dot(dotIndex + 5, cb));
    };

    _spray_dot(0, () =>
      requestAnimationFrame(() => _spray_row(rowIndex + 1, callback))
    );
  };

  _spray_row(0, () => {
    el.style.backgroundColor = "#000";
    dots.forEach(dot => dot.remove());
  });
};

document.addEventListener("DOMContentLoaded", () =>
  setTimeout(() => {
    spray(".spray div.v", -40, 0, 0.8, -15, 0, -15, 0);
    spray(".spray div.a", 0, 40, 0.8, 0, 15, 0, 15);
  }, 1000)
);
