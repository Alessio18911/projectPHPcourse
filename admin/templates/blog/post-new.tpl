<script src="<?=HOST . 'libs/ckeditor/ckeditor.js' ?>"></script>
<div class="admin-page__content-form">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/post-new" enctype="multipart/form-data">
    <div class="admin-form__item">
      <h2 class="heading">Добавить пост </h2>
    </div>

    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>

    <div class="admin-form__item">
      <label class="input__label">Введите название записи <input class="input input--width-label" type="text" name="title" placeholder="Заголовок поста" value="<?=htmlentities($post_title)?>"/>
      </label>
    </div>
    <div class="admin-form__item">
      <?php include ROOT . "admin/templates/_parts/_category-select.tpl" ?>
    </div>
    <div class="admin-form__item">
      <label class="textarea__label mb-10" for="editor">Содержимое поста</label>
      <textarea class="textarea textarea--width-label" placeholder="Введите текст" name="content" id="editor"><?=htmlentities($post_content)?></textarea>
    </div>
    <div class="admin-form__item">
      <div class="block-upload">
        <div class="block-upload__description">
          <div class="block-upload__title">Обложка поста:</div>
          <p>Изображение jpg, jpeg, gif или png, минимальный размер 600х300px. Вес до 12Мб.</p>
          <div class="block-upload__file-wrapper">
            <input class="file-button" type="file" name="cover">
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="admin-form__item buttons">
      <button class="primary-button" type="submit" name="post-submit">Опубликовать</button>
      <a class="secondary-button" href="<?=HOST?>admin/blog">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
  </form>
  </div>

<script>CKEDITOR.replace('editor', {
  filebrowserUploadMethod: 'form',
  filebrowserUploadUrl: '<?=HOST . "libs/ck-upload/upload.php" ?>'
});</script>
