(function() {
  const footer = document.querySelector(".section-footer");

  if (footer) {
    let bodyHeight = document.body.clientHeight;
    let windowHeight = document.documentElement.clientHeight;

    if (bodyHeight < windowHeight) {
      footer.classList.add('sticky-footer');
    }
  }
})();


