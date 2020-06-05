<?php

$pageTitle = 'Профиль пользователя';
$isLogged = !empty($_SESSION['login']) ? true : false;
$userParam = '';

if ($uriGet || $uriGet === '0') {
  $userParam = $uriGet;
} elseif ($isLogged) {
  $userParam = $_SESSION['logged_user']['id'];
}

$user = R::load('users', $userParam);
$userId = $user->id;
$userName = !empty($user->name) ? $user->name : false;
$userAvatar = $user->avatar;
$userCountry = !empty($user->country) ? $user->country : false;
$userCity = !empty($user->city) ? $user->city : false;

$isUser = isset($userId) && isset($_SESSION['logged_user']) && $userId === $_SESSION['logged_user']['id'] ? true : false;
$isAdmin = isset($_SESSION['logged_user']) && $_SESSION['logged_user']['role'] === 'admin' ? true : false;

$btnLink = $isAdmin ? $userId : '';

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
