<?php

$pageTitle = 'Профиль пользователя';
$btnLink = '';
$isLogged = isset($_SESSION['login']) ? $_SESSION['login'] : false;
$user = isset($uriGet) ? R::load('users', $uriGet) : NULL;

if ($isLogged && !$uriGet) {
  $user = R::load('users', $_SESSION['logged_user']['id']);
}

$userId = $user ? $user->id : '';

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
