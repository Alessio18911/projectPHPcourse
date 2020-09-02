<?php

$page_title = "Вход на сайт";
$page_class = "authorization-page";

$user_email = isset($_POST['email']) ? trim($_POST['email']) : '';
$user_pass = isset($_POST['password']) ? trim($_POST['password']) : '';

if (isset($_POST['login'])) {
  if (!$user_email) {
    $_SESSION['errors']['email'][] = "empty_with_explanation";
  } else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors']['email'][] = "invalid";
  }

  if (!$user_pass) {
    $_SESSION['errors']['password'][] = "empty";
  }

  if (empty($_SESSION['errors'])) {
    $user = R::findOne('users', 'email = ?', [$user_email]);

    if ($user) {
      if (password_verify($user_pass, $user->password)) {
        $_SESSION['logged_user'] = $user;
        $_SESSION['login'] = 1;
        $_SESSION['role'] = $user->role;
        header("Location: " .HOST. "profile");
        exit();
      } else {
        $_SESSION['errors']['password'][] = "incorrect";
      }
    } else {
      $_SESSION['errors']['email'][] = "incorrect";
    }
  }
}

ob_start();
include ROOT . "templates/login/form-login.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
