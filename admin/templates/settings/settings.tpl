<script src="<?=HOST . 'libs/ckeditor/ckeditor.js' ?>"></script>
<div class="admin-page__content-form admin-page__contacts admin-page__settings">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/contacts">
    <div class="admin-form__item">
      <h2 class="heading">Настройки</h2>
    </div>

    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>

    <div class="admin-form__item">
      <h3 class="heading">Общие</h3>
      <label class="input__label">Название сайта
        <input class="input input--width-label" type="text" name="site_title" placeholder="Название сайта" value=""/>
      </label>
      <label class="input__label">Слоган
        <input class="input input--width-label" type="text" name="site_slogan" placeholder="Слоган" value=""/>
      </label>
    </div>

    <div class="admin-form__item">
      <h3 class="heading">Статус</h3>
      <label class="input__label">Статус
        <input class="input input--width-label" type="text" name="status" placeholder="Статус" value=""/>
      </label>
      <label class="input__label">Статус подробнее
        <input class="input input--width-label" type="text" name="status_detailed" placeholder="Статус подробнее" value=""/>
      </label>
    </div>

    <div class="admin-form__item">
      <h3 class="heading">Авторские права</h3>
      <label class="input__label">Автор
        <input class="input input--width-label" type="text" name="copyrights_author" placeholder="Создатель сайта" value=""/>
      </label>
      <label class="input__label">Год выпуска
        <input class="input input--width-label" type="text" name="copyrights_year" placeholder="Год выпуска" value=""/>
      </label>
    </div>

    <div class="admin-form__item">
      <h3 class="heading">Социальные кнопки</h3>
      <label class="input__label">Youtube
        <input class="input input--width-label" type="text" name="social__yt" placeholder="Ссылка на Youtube" value=""/>
      </label>
      <label class="input__label">Instagram
        <input class="input input--width-label" type="text" name="social__insta" placeholder="Ссылка на Instagram" value=""/>
      </label>
      <label class="input__label">Facebook
        <input class="input input--width-label" type="text" name="social__fb" placeholder="Ссылка на Facebook" value=""/>
      </label>
      <label class="input__label">VKontakte
        <input class="input input--width-label" type="text" name="social__vk" placeholder="Ссылка на VK" value=""/>
      </label>
      <label class="input__label">Linked In
        <input class="input input--width-label" type="text" name="social__in" placeholder="Ссылка на LinkedIn" value=""/>
      </label>
      <label class="input__label">Github
        <input class="input input--width-label" type="text" name="social__github" placeholder="Ссылка на Github" value=""/>
      </label>
    </div>

    <div class="admin-form__item buttons">
      <button class="primary-button" type="submit" name="settings-edit">Сохранить изменения</button>
      <a class="secondary-button" href="<?=HOST?>admin">Отмена</a>
    </div>
  </form>
</div>

