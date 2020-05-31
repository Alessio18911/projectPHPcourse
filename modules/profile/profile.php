<?php

$pageTitle = 'Профиль пользователя';
$btnLink = '';
$isLogged = isset($_SESSION['login']) && $_SESSION['login'] === 1 ? $_SESSION['login'] : false; // если залогинен : не залогинен
$userParam = '';

if ($uriGet || $uriGet === '0') {
  $userParam = $uriGet;
} elseif ($isLogged) {
  $userParam = $_SESSION['logged_user']['id'];
}

$user = R::load('users', $userParam);
$userId = $user->id;

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
