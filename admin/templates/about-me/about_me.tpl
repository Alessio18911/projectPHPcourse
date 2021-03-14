<script src="<?=HOST . 'libs/ckeditor/ckeditor.js' ?>"></script>
<div class="admin-page__content-form admin-page__contacts">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/about-me">
    <div class="admin-form__item">
      <h2 class="heading">Редактировать информацию обо мне</h2>
    </div>

    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>

    <?php include ROOT . "admin/templates/about-me/_parts/_my-bio.tpl" ?>
    <?php include ROOT . "admin/templates/about-me/_parts/_skills.tpl" ?>

    <div class="admin-form__item buttons">
      <button class="primary-button" type="submit" name="about_me_edit">Сохранить изменения</button>
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

