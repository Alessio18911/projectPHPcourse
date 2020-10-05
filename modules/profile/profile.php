<?php

$page_title = 'Профиль пользователя';
$is_logged = !empty($_SESSION['login']) ? true : false;

if (isset($uri_get)) {
  $user_id_param = $uri_get;
} else {
  $user_id_param = $is_logged ? $_SESSION['logged_user']['id'] : NULL;
}

if (!empty($user_id_param)) {
  $user = R::load('users', $user_id_param);
  $user_id = $user->id;

  if (!empty($user_id)) {
    $user_name = !empty($user->name) ? $user->name : false;
    $user_avatar = isset($user->avatar) ? $user->avatar : 'blank-avatar.svg';
    $user_country = !empty($user->country) ? $user->country : false;
    $user_city = !empty($user->city) ? $user->city : false;

    if ($is_logged) {
      $is_admin = $_SESSION['logged_user']['role'] === 'admin' ? true : false;
      $is_this_user = $_SESSION['logged_user']['role'] === 'user' && $_SESSION['logged_user']['id'] === $user_id ? true : false;
    }

    $comments = R::getAll(
        "SELECT c.comment, c.timestamp, c.post_id, u.id AS user_id, u.name AS user_name, u.surname AS user_surname, u.avatar_small AS user_avatar, p.title AS post_title
        FROM comments AS c INNER JOIN users AS u ON c.user_id = u.id
                          INNER JOIN posts AS p ON c.post_id = p.id
        WHERE u.id = ?", [$user_id]);
  }
}


include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
