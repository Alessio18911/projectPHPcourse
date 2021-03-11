<div class="admin-page__content-form admin-page__contacts admin-page__settings">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/settings">
    <div class="admin-form__item">
      <h2 class="heading">Настройки</h2>
    </div>

    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>

    <?php include ROOT . "admin/templates/settings/_parts/name_slogan.tpl" ?>
    <?php include ROOT . "admin/templates/settings/_parts/status.tpl" ?>
    <?php include ROOT . "admin/templates/settings/_parts/copyrights.tpl" ?>
    <?php include ROOT . "admin/templates/settings/_parts/social.tpl" ?>

    <div class="admin-form__item buttons">
      <button class="primary-button" type="submit" name="settings_edit">Сохранить изменения</button>
      <a class="secondary-button" href="<?=HOST?>admin">Отмена</a>
    </div>
  </form>
</div>

