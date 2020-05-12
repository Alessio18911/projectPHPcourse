<?php

$pageTitle = "Восстановить пароль";
$userEmail = isset($_POST['email']) ? trim($_POST['email']) : '';

if (isset($_POST['lost-password'])) {
  if (!$userEmail) {

    $errors[] = ['title' => "Введите email", 'desc' => "<p>Email обязателен для восстановления пароля</p>"];
  } else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    $errors[] = ['title' => "Введите корректный email"];
  }

  if (empty($errors)) {
    $user = R::findOne('users', 'email = ?', [$userEmail]);

    if ($user) {

      function random_str($num = 30) {
        return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $num);
      }
      $recovery_code = random_str();
      $user->recovery_code = $recovery_code;
      R::store($user);

      $recovery_message = "<p>Код сброса пароля: <b>$recovery_code</b></p>";
      $recovery_message .= "<p>для сброса пароля перейдите по ссылке ниже и установите новый пароль: </p>";
      $recovery_link = HOST . "set-new-password?email={$userEmail}&code={$recovery_code}";
      $recovery_message .= '<p><a href="' . $recovery_link . '">Установить новый пароль</a></p>';

      $headers = "MIME-Version: 1.0" . PHP_EOL
        . "Content-Type: text/html; charset=utf-8" .PHP_EOL
        . "From: " . "=?utf-8?B?" . base64_encode(SITE_NAME) . "?=" . "<" . SITE_EMAIL . ">" . PHP_EOL
        . "Reply-To: " . SITE_EMAIL . PHP_EOL;

      $resultEmail = mail($userEmail, 'Востановление доступа', $recovery_message, $headers);

      if ($resultEmail) {
        $success[] = ['title' => 'Проверьте почту', 'desc' => '<p>Вам был отправлен email со ссылкой для сброса пароля</p>'];
      } else {
        $errors[] = ['title' => 'Что-то пошло не так', 'desc' => '<p>Повторите процедуру сброса пароля ещё раз</p>'];
      }
    } else {
      $errors[] = ['title' => "Несуществующий email"];
    }
  }
}

ob_start();

include ROOT . "templates/login/lost-password.tpl";

$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>

