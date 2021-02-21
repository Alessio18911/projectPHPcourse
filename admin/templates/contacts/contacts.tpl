<script src="<?=HOST . 'libs/ckeditor/ckeditor.js' ?>"></script>
<div class="admin-page__content-form admin-page__contacts">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/contacts">
    <div class="admin-form__item">
      <h2 class="heading">Редактировать контакты</h2>
    </div>

    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>

    <div class="admin-form__item">
      <label class="input__label">Заголовок
        <input class="input input--width-label" type="text" name="about_title" placeholder="Заголовок раздела" value="<?=$about['title']?>"/>
      </label>
      <label class="textarea__label mb-10" for="editor-about">Содержимое раздела</label>
      <textarea class="textarea textarea--width-label" placeholder="Введите текст" name="about_content" id="editor-about"><?=$about['content']?></textarea>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Заголовок
        <input class="input input--width-label" type="text" name="services_title" placeholder="Заголовок раздела" value="<?=$services['title']?>"/>
      </label>
      <label class="textarea__label mb-10" for="editor-services">Содержимое раздела</label>
      <textarea class="textarea textarea--width-label" placeholder="Введите текст" name="services_content" id="editor-services">
        <?=$services['content']?>
      </textarea>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Заголовок
        <input class="input input--width-label" type="text" name="contacts_title" placeholder="Заголовок раздела" value="<?=$my_contacts['title']?>"/>
      </label>
      <label class="textarea__label mb-10" for="editor-contacts">Содержимое раздела</label>
      <textarea class="textarea textarea--width-label" placeholder="Введите текст" name="contacts_content" id="editor-contacts"><?=$my_contacts['content']?></textarea>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Заголовок
        <input class="input input--width-label" type="text" name="interactive_map_title" placeholder="Заголовок раздела" value="Интерактивная карта" readonly/>
      </label>
      <label class="textarea__label mb-10" for="interactive-map">Вставьте ссылку из конструктора на карту</label>
      <textarea class="textarea textarea--width-label" placeholder="Введите текст" name="interactive_map" id="interactive-map"><?=$my_location['content']?></textarea>
    </div>

    <div class="admin-form__item buttons">
      <button class="primary-button" type="submit" name="contacts-edit">Сохранить изменения</button>
      <a class="secondary-button" href="<?=HOST?>admin">Отмена</a>
    </div>
  </form>
</div>

<script>CKEDITOR.replace('editor-about', {
  filebrowserUploadMethod: 'form',
  filebrowserUploadUrl: '<?=HOST . "libs/ck-upload/upload.php" ?>'
});</script>
<script>CKEDITOR.replace('editor-services', {
  filebrowserUploadMethod: 'form',
  filebrowserUploadUrl: '<?=HOST . "libs/ck-upload/upload.php" ?>'
});</script>
<script>CKEDITOR.replace('editor-contacts', {
  filebrowserUploadMethod: 'form',
  filebrowserUploadUrl: '<?=HOST . "libs/ck-upload/upload.php" ?>'
});</script>

