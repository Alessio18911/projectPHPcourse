<?php 
// echo "<pre><div>";
// print_r($_POST);
// echo "</div></pre>";

$pageTitle = "Регистрация";

if (isset($_POST['register'])) {

    if (!trim($_POST['email'])) {
        $errors[] = ['title' => "Введите email", 'desc' => "<p>Email обязателен для регистрации на сайте</p>"];
    }
    
    if (!trim($_POST['password'])) {
        $errors[] = ['title' => "Введите пароль"];
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