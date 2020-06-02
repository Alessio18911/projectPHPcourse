<form class="authorization-form" method="POST" action="<?=HOST?>login">
    <div class="authorization-form__heading">
        <h2 class="heading">Вход на сайт </h2>
    </div>

    <?php include ROOT . "templates/components/errors.tpl" ?>
    <?php include ROOT . "templates/components/success.tpl" ?>

    <div class="authorization-form__input">
        <input class="input" type="text" name="email" placeholder="Email" value="<?=$userEmail?>" />
    </div>
    <div class="authorization-form__input">
        <input class="input" type="password" name="password" placeholder="Пароль" />
    </div>
    <div class="authorization-form__button">
        <button class="primary-button" type="submit" name="login" value="login">Вход на сайт</button>
    </div>
    <div class="authorization-form__links">
        <a href="<?=HOST?>lost-password">Забыл пароль</a>
        <a href="<?=HOST?>registration">Регистрация</a>
    </div>
</form>
