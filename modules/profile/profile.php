<?php

$pageTitle = 'Профиль пользователя';
$btnLink = '';

if(isset($uriArray[1])) {
  $user = R::load('users', $uriArray[1]);
} elseif(isset($_SESSION['login']) && $_SESSION['login'] === 1) {
  $_SESSION['isLoggedIn'] = true;
  $user = R::load('users', $_SESSION['logged_user']['id']);

  if ($user->role === 'admin') {
    $btnLink = $user->id;
  }
} else {
  $userNotLoggedIn = true;
}

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
