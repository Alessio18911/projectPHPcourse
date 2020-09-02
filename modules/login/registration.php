<?php

$page_title = "Регистрация";
$page_class = "authorization-page";

$user_email = isset($_POST['email']) ? trim($_POST['email']) : '';
$user_pass = isset($_POST['password']) ? trim($_POST['password']) : '';

if (isset($_POST['register'])) {
  if (!$user_email) {
    $_SESSION['errors']['email'][] = "empty_with_explanation";
  } else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors']['email'][] = "invalid";
  }

  if (!$user_pass || (strlen($user_pass) < 4)) {
    $_SESSION['errors']['password'][] = "empty";
  }

  if (R::count('users', 'email = ?', array($user_email))) {
    $_SESSION['errors']['email'][] = "registered";
  }

  if (empty($_SESSION['errors'])) {
    $user = R::dispense('users');
    $user->email = $user_email;
    $user->role = 'user';
    $user->password = password_hash($user_pass, PASSWORD_DEFAULT);
    $result = R::store($user);

    if (is_int($result)) {
      $_SESSION['logged_user'] = $user;
      $_SESSION['login'] = 1;
      header("Location: " .HOST. "profile-edit");
      exit();
    } else {
      $_SESSION['errors']['registration'][] = "failed";
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
