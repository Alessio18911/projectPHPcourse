<?php

$page_title = "Установить новый пароль";
$page_class = "authorization-page";
$new_password = '';

if (!empty($_GET['email']) && !empty($_GET['code'])) {
  $user = R::findOne('users', 'email = ?', [$_GET['email']]);

  if($user) {
    $_SESSION['secret_code'] = $_GET['code'] === $user->recovery_code ? $_GET['code'] : '';

    if (empty($_SESSION['secret_code'])) {
      $_SESSION['errors']['secret_code'][] = 'incorrect';
    } else {
      $_SESSION['user'] = $user;
      $_SESSION['user_email'] = $user->email;
    }
  } else {
    $_SESSION['errors']['email'][] = 'not_exist';
  }
} elseif (isset($_POST['set-new-password'])) {
  $new_password = !empty($_POST['password']) && strlen($_POST['password']) >= 4 ? trim($_POST['password']) : '';

  if (!$new_password) {
    $_SESSION['errors']['password'][] = "empty";
  } else {
    $user = $_SESSION['user'];
    $user->password = password_hash(htmlentities($new_password), PASSWORD_DEFAULT);
    $user->recovery_code = NULL;
    R::store($user);
    $_SESSION['success']['new_password'][] = "set";
    unset($_SESSION['user']);
    unset($_SESSION['user_email']);
    unset($_SESSION['secret_code']);
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
