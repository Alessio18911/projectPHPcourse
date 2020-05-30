<form class="authorization-form" method="POST" action="<?=HOST?>set-new-password">
    <div class="authorization-form__heading">
        <h2 class="heading">Установить новый пароль</h2>
    </div>

    <?php include ROOT . "templates/components/errors.tpl" ?>
    <?php include ROOT . "templates/components/success.tpl" ?>

    <?php if (!isset($newPassReady)): ?>
      <div class="authorization-form__input">
        <input class="input" type="password" name="password" placeholder="Новый пароль" />
      </div>
      <input type="hidden" name="email" value="<?=$_GET['email']?>">
      <input type="hidden" name="resetCode" value="<?=$_GET['code']?>">
      <div class="authorization-form__button">
          <button class="primary-button" type="submit" name="set-new-password" value="set-new-password">Установить пароль</button>
      </div>
    <?php endif; ?>
    <div class="authorization-form__links">
        <a href="<?=HOST?>login">Войти на сайт</a>
        <a href="<?=HOST?>registration">Регистрация</a>
    </div>
</form>
