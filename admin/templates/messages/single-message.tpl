<div class="admin-page__content-form admin-page__single-message">
  <form class="admin-form" method="POST" action="#">
    <div class="admin-form__item">
      <h2 class="heading mb-20">Сообщение №1</h2>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Имя отправителя</label>
      <p>Юрий</p>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Email отправителя</label>
      <p>juriy@mail.ru</p>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Текст сообщения</label>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus distinctio id nostrum magnam vel exercitationem quos dolorem architecto, facere a quod nulla quo laborum voluptatum sapiente nam atque voluptatibus quasi.</p>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Прикреплённый файл</label>
      <p>photo1.jpg</p>
    </div>

    <div class="admin-form__item buttons">
      <a class="secondary-button" href="<?=HOST?>admin/messages">Вернуться назад</a>
      <button class="primary-button primary-button--red" type="submit" name="delete-message">Удалить</button>
    </div>
  </form>
</div>
