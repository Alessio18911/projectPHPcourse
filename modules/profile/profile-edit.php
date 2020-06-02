<?php

$pageTitle = 'Редактирование профиля';
$isLogged = isset($_SESSION['login']) && $_SESSION['login'] === 1 ? true : false;

if ($isLogged) {
  $userId = $_SESSION['logged_user']['role'] === 'admin' ? $uriGet : $_SESSION['logged_user']['id'];
  $user = R::load('users', $userId);

  if (isset($_POST['update-profile'])) {
    if (trim($_POST['name']) === '') {
      $errors[] = ['title' => 'Введите имя'];
    }

    if (trim($_POST['surname']) === '') {
      $errors[] = ['title' => 'Введите фамилию'];
    }

    if (trim($_POST['email']) === '') {
      $errors[] = ['title' => 'Введите Email'];
    }

    if (empty($errors)) {
      $user->name = htmlentities($_POST['name']);
      $user->surname = htmlentities($_POST['surname']);
      $user->email = htmlentities($_POST['email']);
      $user->city = htmlentities($_POST['city']);
      $user->country = htmlentities($_POST['country']);

      R::store($user);
      $_SESSION['logged_user']['id'] = $user->id;
      header("Location: " .HOST. "profile");
      exit();
    }
  }
} else {
  header("Location: " .HOST. "login");
  exit();
}

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile-edit.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
