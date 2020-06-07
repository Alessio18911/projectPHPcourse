<form class="authorization-form" method="POST" action="<?=HOST?>set-new-password">
    <div class="authorization-form__heading">
        <h2 class="heading">Установить новый пароль</h2>
    </div>

    <?php include ROOT . "templates/components/errors.tpl" ?>
    <?php include ROOT . "templates/components/success.tpl" ?>

    <?php if (isset($newPassword) && empty($_SESSION['errors'])): ?>
      <div class="authorization-form__input">
        <input class="input" type="password" name="password" placeholder="Новый пароль" />
      </div>
      <div class="authorization-form__button">
        <button class="primary-button" type="submit" name="set-new-password">Установить пароль</button>
      </div>
    <?php endif; ?>
    <div class="authorization-form__links">
      <?php if(!empty($_SESSION['errors'])): ?>
        <a href="<?=HOST?>lost-password">Забыл пароль</a>
      <?php endif ?>
      <a href="<?=HOST?>login">Войти на сайт</a>
      <a href="<?=HOST?>registration">Регистрация</a>
    </div>
</form>
