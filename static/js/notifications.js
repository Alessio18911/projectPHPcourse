(function() {
  const notifications = document.querySelector('.notifications');

  if (notifications) {
    let targetY = window.scrollY + notifications.getBoundingClientRect().top - 200;

    window.scroll({
      top: targetY,
      behavior: 'smooth'
    });

    if (notifications.classList.contains('notifications--success')) {
      notifications.style.maxHeight = "0";
    }
  }
})();
