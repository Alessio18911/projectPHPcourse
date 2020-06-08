<?php

$pageTitle = "Установить новый пароль";
$pageClass = "authorization-page";
$newPassword = '';

if (!empty($_GET['email']) && !empty($_GET['code'])) {
  $user = R::findOne('users', 'email = ?', [$_GET['email']]);

  if($user) {
    $_SESSION['secretCode'] = $_GET['code'] === $user->recovery_code ? $_GET['code'] : '';

    if (empty($_SESSION['secretCode'])) {
      $_SESSION['errors']['secretCode'][] = 'incorrect';
    } else {
      $_SESSION['user'] = $user;
      $_SESSION['userEmail'] = $user->email;
    }
  } else {
    $_SESSION['errors']['email'][] = 'notExist';
  }
} elseif (isset($_POST['set-new-password'])) {
  $newPassword = !empty($_POST['password']) && strlen($_POST['password']) >= 4 ? trim($_POST['password']) : '';

  if (!$newPassword) {
    $_SESSION['errors']['password'][] = "empty";
  } else {
    $user = $_SESSION['user'];
    $user->password = password_hash(htmlentities($newPassword), PASSWORD_DEFAULT);
    $user->recovery_code = NULL;
    R::store($user);
    $_SESSION['success']['newPassword'][] = "set";
    unset($_SESSION['user']);
    unset($_SESSION['userEmail']);
    unset($_SESSION['secretCode']);
  }
} else {
  header("Location: " .HOST. "lost-password");
  die();
}

ob_start();

include ROOT . "templates/login/set-new-password.tpl";

$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
