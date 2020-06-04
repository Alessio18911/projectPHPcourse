<?php

$pageTitle = "Вход на сайт";
$pageClass = "authorization-page";

$userEmail = isset($_POST['email']) ? trim($_POST['email']) : '';
$userPass = isset($_POST['password']) ? trim($_POST['password']) : '';

if (isset($_POST['login'])) {
  if (!$userEmail) {
    $_SESSION['errors'][] = "emailEmptyLogin";
  } else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors'][] = "emailInvalid";
  }

  if (!$userPass) {
    $_SESSION['errors'][] = "passEmpty";
  }

  if (empty($_SESSION['errors'])) {
    $user = R::findOne('users', 'email = ?', [$userEmail]);

    if ($user) {
      if (password_verify($userPass, $user->password)) {
        $_SESSION['logged_user'] = $user;
        $_SESSION['login'] = 1;
        header("Location: " .HOST. "profile");
        exit();
      } else {
        $_SESSION['errors'][] = "passIncorrect";
      }
    } else {
      $_SESSION['errors'][] = "emailIncorrect";
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
