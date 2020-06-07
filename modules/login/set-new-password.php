<?php

$pageTitle = "Установить новый пароль";
$pageClass = "authorization-page";

if (isset($_SESSION['email']) && isset($_SESSION['code'])) {
  $user = R::findOne('users', 'email = ?', [$_SESSION['email']]);

  if($user) {
    $userEmail = $user->email;
    $secretCode = $_SESSION['code'] === $user->recovery_code ? $_SESSION['code'] : '';
    $newPassword = '';

    if (!$secretCode) {
      $_SESSION['errors']['secretCode'][] = 'incorrect';
    } else if (isset($_POST['set-new-password'])) {
      $newPassword = !empty($_POST['password']) && strlen($_POST['password']) >= 4 ? $_POST['password'] : '';

      $user->password = password_hash($newPassword, PASSWORD_DEFAULT);
        $user->recovery_code = '';
        R::store($user);
        $_SESSION['success']['newPassword'][] = "set";
        $_SESSION['email'] = '';
        $_SESSION['code'] = '';
    }
  } else {
    $_SESSION['errors']['email'][] = 'notExist';
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
