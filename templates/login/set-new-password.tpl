<form class="authorization-form" method="POST" action="<?php echo HOST?>set-new-password">
    <div class="authorization-form__heading">
        <h2 class="heading">Установить новый пароль</h2>
    </div>

    <?php include ROOT . "templates/components/errors.tpl" ?>
    <?php include ROOT . "templates/components/success.tpl" ?>

    <div class="authorization-form__input">
        <input class="input" type="password" name="password" placeholder="Новый пароль" />
    </div>
    <div class="authorization-form__button">
        <button class="primary-button" type="submit" name="set-new-password" value="set-new-password">Установить пароль</button>
    </div>
    <div class="authorization-form__links">
        <a href="<?php echo HOST ?>login">Войти на сайт</a>
        <a href="<?php echo HOST; ?>registration">Регистрация</a>
    </div>
</form>
