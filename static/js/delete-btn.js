class BtnDelete {
  constructor(button) {
    this.button = button;
  }

  onDeleteBtnChange(evt) {
    const deleteLabel = evt.target.nextElementSibling;
    deleteLabel.textContent = !evt.target.checked ? "Удалить фотографию" : "Отменить удаление фотографии";
  }
}

const coverDeleteBtn = document.querySelector('#delete-cover');
if (coverDeleteBtn) {
  const coverDeleteButton = new BtnDelete(coverDeleteBtn);
  coverDeleteButton.button.addEventListener('change', coverDeleteButton.onDeleteBtnChange);
}

const avatarDeleteBtn = document.querySelector('#delete-avatar');
if (avatarDeleteBtn) {
  const avatarDeleteButton = new BtnDelete(avatarDeleteBtn);
  avatarDeleteButton.button.addEventListener('change', avatarDeleteButton.onDeleteBtnChange);
}
