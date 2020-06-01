<?php

$pageTitle = 'Профиль пользователя';
$isLogged = isset($_SESSION['login']) && $_SESSION['login'] === 1 ? $_SESSION['login'] : false;
$userParam = '';

if ($uriGet || $uriGet === '0') {
  $userParam = $uriGet;
} elseif ($isLogged) {
  $userParam = $_SESSION['logged_user']['id'];
}

$user = R::load('users', $userParam);
$userId = $user->id;

$isUser = isset($userId) && isset($_SESSION['logged_user']) && $userId === $_SESSION['logged_user']['id'] ? true : false;
$isAdmin = isset($_SESSION['logged_user']) && $_SESSION['logged_user']['role'] === 'admin' ? true : false;
$btnLink = $isAdmin ? $userId : '';

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
