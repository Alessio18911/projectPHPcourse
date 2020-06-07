<?php

$pageTitle = "Регистрация";
$pageClass = "authorization-page";

$userEmail = isset($_POST['email']) ? trim($_POST['email']) : '';
$userPass = isset($_POST['password']) ? trim($_POST['password']) : '';

if (isset($_POST['register'])) {
  if (!$userEmail) {
    $_SESSION['errors']['email'][] = "emptyWithExplanation";
  } else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors']['email'][] = "invalid";
  }

  if (!$userPass || (strlen($userPass) < 4)) {
    $_SESSION['errors']['password'][] = "empty";
  }

  if (R::count('users', 'email = ?', array($userEmail))) {
    $_SESSION['errors']['email'][] = "registered";
  }

  if (empty($_SESSION['errors'])) {
    $user = R::dispense('users');
    $user->email = $userEmail;
    $user->role = 'user';
    $user->password = password_hash($userPass, PASSWORD_DEFAULT);
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
