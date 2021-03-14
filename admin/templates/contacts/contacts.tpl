<script src="<?=HOST . 'libs/ckeditor/ckeditor.js' ?>"></script>
<div class="admin-page__content-form admin-page__contacts">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/contacts">
    <div class="admin-form__item">
      <h2 class="heading">Редактировать контакты</h2>
    </div>

    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>

    <?php include ROOT . "admin/templates/contacts/_parts/_contacts.tpl"?>
    <?php include ROOT . "admin/templates/contacts/_parts/_interactive-map.tpl"?>

    <div class="admin-form__item buttons">
      <button class="primary-button" type="submit" name="contacts-edit">Сохранить изменения</button>
      <a class="secondary-button" href="<?=HOST?>admin">Отмена</a>
    </div>
  </form>
</div>

<script>CKEDITOR.replace('editor-contacts', {
  filebrowserUploadMethod: 'form',
  filebrowserUploadUrl: '<?=HOST . "libs/ck-upload/upload.php" ?>'
});</script>

