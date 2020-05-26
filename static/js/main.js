const footer = document.querySelector(".section-footer");
let bodyHeight = document.body.clientHeight;
let windowHeight = document.documentElement.clientHeight;

if (footer && (bodyHeight < windowHeight)) {
  footer.classList.add('sticky-footer');
}
