<form class="authorization-form" method="POST" action="<?=HOST?>lost-password">
    <div class="authorization-form__heading">
        <h2 class="heading">Восстановить пароль</h2>
    </div>

    <?php include ROOT . "templates/components/errors.tpl" ?>
    <?php include ROOT . "templates/components/success.tpl" ?>

    <div class="authorization-form__input">
        <input class="input" type="text" name="email" placeholder="Email" />
    </div>
    <div class="authorization-form__button">
        <button class="primary-button" type="submit" name="lost-password" value="lost-password">Восстановить пароль</button>
    </div>
    <div class="authorization-form__links">
        <a href="<?=HOST?>login">Войти на сайт</a>
        <a href="<?=HOST?>registration">Регистрация</a>
    </div>
</form>
