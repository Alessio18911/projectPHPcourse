<?php

$pageTitle = "Регистрация";
$pageClass = "authorization-page";

$_SESSION['errors'] = [];
$_SESSION['success'] = [];

$userEmail = isset($_POST['email']) ? trim($_POST['email']) : '';
$userPass = isset($_POST['password']) ? trim($_POST['password']) : '';

if (isset($_POST['register'])) {
  if (!$userEmail) {
    array_push($_SESSION['errors'], "emailEmptyRegistration");
  } else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    array_push($_SESSION['errors'], "emailInvalid");
  }

  if (!$userPass || (strlen($userPass) < 4)) {
    array_push($_SESSION['errors'], "passShort");
  }

  if (R::count('users', 'email = ?', array($userEmail))) {
    array_push($_SESSION['errors'], "emailRegistered");
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
      array_push($_SESSION['errors'], "registrationFailed");
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
