<?php

if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {
  if ($_SESSION['logged_user']['role'] === 'user') {
    $user = R::load('users', $_SESSION['logged_user']['id']);

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
        $_SESSION['logged_user']['id'] = $user;
        header("Location: " .HOST. "profile");
        exit();
      }
    }

  }
} else {
  header("Location: " .HOST. "login");
  exit();
}

$pageTitle = 'Редактирование профиля';

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile-edit.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
