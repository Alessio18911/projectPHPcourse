(function() {
  const deleteAvatarBtn = document.querySelector('#delete-avatar');
  console.dir(deleteAvatarBtn);

  function onDeleteAvatarBtnChange(evt) {
    const deleteAvatarLabel = deleteAvatarBtn.nextElementSibling;
    deleteAvatarLabel.textContent = !evt.target.checked ? "Удалить фотографию" : "Отменить удаление фотографии";
  }

  if (deleteAvatarBtn) {
    deleteAvatarBtn.addEventListener('change', onDeleteAvatarBtnChange);
  }
})();
