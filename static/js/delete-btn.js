const onDeleteBtnChange = function onDeleteBtnChange(evt) {
  const deleteLabel = evt.target.nextElementSibling;
  deleteLabel.textContent = !evt.target.checked ? "Удалить фотографию" : "Отменить удаление фотографии";
}

const changeLabelText = function(button) {
  if (button) {
    button.addEventListener('change', onDeleteBtnChange);
  }
}

const coverDeleteBtn = document.querySelector('#delete-cover');
const avatarDeleteBtn = document.querySelector('#delete-avatar');

changeLabelText(coverDeleteBtn);
changeLabelText(avatarDeleteBtn);
