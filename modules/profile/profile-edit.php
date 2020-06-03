<?php

$pageTitle = 'Редактирование профиля';
$isLogged = isset($_SESSION['login']) && $_SESSION['login'] === 1 ? true : false;
$avatarFolderLocation = ROOT . "usercontent/avatars/";

if ($isLogged) {
  $userId = $_SESSION['logged_user']['role'] === 'admin' ? $uriGet : $_SESSION['logged_user']['id'];
  $user = R::load('users', $userId);
  $userAvatar = !empty($user->avatar) ? $user->avatar : '';

  if (isset($_POST['update-profile'])) {
    if (trim($_POST['name']) === '') {
      array_push($_SESSION['errors'], "nameEmpty");
    }

    if (trim($_POST['surname']) === '') {
      array_push($_SESSION['errors'], "surnameEmpty");
    }

    if (trim($_POST['email']) === '') {
      array_push($_SESSION['errors'], "emailEmpty");
    }


    if (!$_FILES['avatar']['error']) {
      $fileName = $_FILES['avatar']['name'];
      $fileTempLoc = $_FILES['avatar']['tmp_name'];
      $fileType = $_FILES['avatar']['type'];
      $fileSize = $_FILES['avatar']['size'];
      $fileError = $_FILES['avatar']['error'];
      $kaboom = explode(".", $fileName);
      $fileExt = end($kaboom);

      list($width, $height) = getimagesize($fileTempLoc);
      if ($width < 160 || $height < 160) {
        array_push($_SESSION['errors'], "smallPhoto");
      }

      if ($fileSize > 4194304) {
        array_push($_SESSION['errors'], "heavyPhoto");
      }

      if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
        array_push($_SESSION['errors'], "formatInvalid");
      }

      if ($fileError == 4) {
        array_push($_SESSION['errors'], "uploadFotoFailed");
      }

      $db_file_name = rand(100000000000, 999999999999) . "." . $fileExt;
      $uploadFile = $avatarFolderLocation . $db_file_name;

      $moveResult = move_uploaded_file($fileTempLoc, $uploadFile);

      if (!$moveResult) {
        $_SESSION['errors'] = "fileNotSaved";
      }
    }

    if (empty($_SESSION['errors'])) {
      $user->name = htmlentities($_POST['name']);
      $user->surname = htmlentities($_POST['surname']);
      $user->email = htmlentities($_POST['email']);
      $user->city = htmlentities($_POST['city']);
      $user->country = htmlentities($_POST['country']);

      $avatar = $user->avatar;

      if (!empty($avatar) && !$_FILES['avatar']['error']) {
        $pictureUrl = $avatarFolderLocation . $avatar;

        if (file_exists($pictureUrl)) {
          unlink($pictureUrl);
        }

        $pictureUrl48 = $avatarFolderLocation . '48-' .$avatar;

        if (file_exists($pictureUrl48)) {
          unlink($pictureUrl48);
        }
      }

      if (!empty($db_file_name)) {
        $user->avatar = $db_file_name;
        $user->avatarSmall = '48-' . $db_file_name;
      }

      R::store($user);
      $_SESSION['logged_user']['id'] = $user->id;
      header("Location: " .HOST. "profile/" . $_SESSION['logged_user']['id']);
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
