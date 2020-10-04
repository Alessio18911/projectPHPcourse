const coverDeleteBtn = document.querySelector('#delete-cover');
const avatarDeleteBtn = document.querySelector('#delete-avatar');

function changeLabelText(button) {
  button.addEventListener('change', function (evt) {
    const button = evt.target;
    button.nextElementSibling.textContent = !button.checked ? "Удалить фотографию" : "Отменить удаление фотографии";
  });
}

if (coverDeleteBtn) {
  changeLabelText(coverDeleteBtn);
}

if (avatarDeleteBtn) {
  changeLabelText(avatarDeleteBtn);
}
