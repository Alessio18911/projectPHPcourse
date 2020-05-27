<?php

$pageTitle = "Регистрация";
$pageClass = "authorization-page";

$userEmail = isset($_POST['email']) ? trim($_POST['email']) : '';
$userPass = isset($_POST['password']) ? trim($_POST['password']) : '';

if (isset($_POST['register'])) {
  if (!$userEmail) {
    $errors[] = ['title' => "Введите email", 'desc' => "<p>Email обязателен для регистрации на сайте</p>"];
  } else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    $errors[] = ['title' => "Введите корректный email"];
  }

  if (!$userPass || (strlen($userPass) < 4)) {
    $errors[] = ['title' => "Введите пароль длиной не менее 4 символов!"];
  }

  if (R::count('users', 'email = ?', array($userEmail))) {
    $errors[] = [
      'title' => "Данный email уже зарегистрирован",
      'desc' => '<p>Используйте другой email или воспользуйтесь <a href="' .HOST. 'lost-password" ?>восстановлением пароля</a></p>'
    ];
  }

  if (empty($errors)) {
    $user = R::dispense('users');
    $user->email = $userEmail;
    $user->role = 'user';
    $user->password = password_hash($userPass, PASSWORD_DEFAULT);
    $result = R::store($user);

    if (is_int($result)) {
      // $success[] = ['title' => "Вы успешно зарегистрировались!"];

      $_SESSION['logged_user'] = $user;
      $_SESSION['login'] = 1;
      $_SESSION['role'] = $user->role;
      header("Location: " .HOST. "profile-edit");
      exit();
    } else {
      $errors[] = ['title' => "Что-то пошло не так, повторите регистрацию"];
    }
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
