<form class="authorization-form" method="POST" action="<?php echo HOST;?>registration">
    <div class="authorization-form__heading">
        <h2 class="heading">Регистрация </h2>
    </div>

    <?php include ROOT . "templates/components/errors.tpl" ?>
    <?php include ROOT . "templates/components/success.tpl" ?>

    <div class="authorization-form__input">
        <input class="input" name="email" type="text" placeholder="Email" />
    </div>
    <div class="authorization-form__input">
        <input class="input" name="password" type="password" placeholder="Пароль" />
    </div>
    <div class="authorization-form__button">
        <button class="primary-button" type="submit" name="register" value="register">Зарегистрироваться</button>
    </div>
    <div class="authorization-form__links">
        <a>Вход на сайт</a>
    </div>
</form>