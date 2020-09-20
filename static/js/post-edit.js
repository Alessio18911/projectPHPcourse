(function() {
  const deleteCoverBtn = document.querySelector('#delete-cover');

  function ondeleteCoverBtnChange(evt) {
    const deleteCoverLabel = deleteCoverBtn.nextElementSibling;
    deleteCoverLabel.textContent = !evt.target.checked ? "Удалить фотографию" : "Отменить удаление фотографии";
  }

  if (deleteCoverBtn) {
    deleteCoverBtn.addEventListener('change', ondeleteCoverBtnChange);
  }
})();
