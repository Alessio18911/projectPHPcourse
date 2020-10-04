<?php

$page_title = 'Профиль пользователя';
$is_logged = !empty($_SESSION['login']) ? true : false;
$user_param = '';

if (isset($uri_get)) {
  $user_param = $uri_get;
} elseif ($is_logged) {
  $user_param = $_SESSION['logged_user']['id'];
}

$user = R::load('users', $user_param);
$user_id = $user->id;
$user_name = !empty($user->name) ? $user->name : false;
$user_avatar = isset($user->avatar) ? $user->avatar : 'blank-avatar.svg';
$user_country = !empty($user->country) ? $user->country : false;
$user_city = !empty($user->city) ? $user->city : false;

$is_user = isset($user_id) && isset($_SESSION['logged_user']) && $user_id === $_SESSION['logged_user']['id'] ? true : false;
$is_admin = isset($_SESSION['logged_user']) && $_SESSION['logged_user']['role'] === 'admin' ? true : false;

$btnLink = $is_admin ? $user_id : '';

$comments = R::getAll(
    "SELECT c.comment, c.timestamp, c.post_id, u.id AS user_id, u.name AS user_name, u.surname AS user_surname, u.avatar_small AS user_avatar, p.title AS post_title
    FROM comments AS c INNER JOIN users AS u ON c.user_id = u.id
                       INNER JOIN posts AS p ON c.post_id = p.id
    WHERE u.id = ?", [$user_id]);

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
