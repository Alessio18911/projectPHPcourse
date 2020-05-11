<?php 

$pageTitle = "Регистрация";

if (isset($_POST['register'])) {
    if (!trim($_POST['email'])) {
        $errors[] = ['title' => "Введите email", 'desc' => "<p>Email обязателен для регистрации на сайте</p>"];
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = ['title' => "Введите корректный email"];
    }
    
    if (!trim($_POST['password'])) {
        $errors[] = ['title' => "Введите пароль"];
    }    

    if (R::count('users', 'email = ?', array($_POST['email']))) {
        $errors[] = [
            'title' => "Данный email уже зарегистрирован",
            'desc' => '<p>Используйте другой email или воспользуйтесь <a href="' .HOST. 'lost-password" ?>восстановлением пароля</a></p>'
        ];
    }
    
    if (empty($errors)) {
        $user = R::dispense('users');
        $user->email = $_POST['email'];
        $user->role = 'user';
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        R::store($user);
    }

}

ob_start();

include ROOT . "templates/login/form-registration.tpl";

$content = ob_get_contents();
ob_end_clean();


include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>