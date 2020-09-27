const onDeleteBtnChange = function onDeleteBtnChange(evt) {
  const deleteLabel = evt.target.nextElementSibling;
  deleteLabel.textContent = !evt.target.checked ? "Удалить фотографию" : "Отменить удаление фотографии";
}

const addHandler = function(button) {
  if (button) {
    button.addEventListener('change', onDeleteBtnChange);
  }
}

const coverDeleteBtn = document.querySelector('#delete-cover');
const avatarDeleteBtn = document.querySelector('#delete-avatar');

addHandler(coverDeleteBtn);
addHandler(avatarDeleteBtn);
