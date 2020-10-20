(function() {
  const target = document.querySelector('.notifications__title');

  if (target) {
    let targetY = window.scrollY + target.getBoundingClientRect().top;

    window.scroll({
      top: targetY,
      behavior: 'smooth'
    });
  }
})();
