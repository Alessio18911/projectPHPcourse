<?php

$pageTitle = 'Редактирование профиля';
$isLogged = isset($_SESSION['login']) && $_SESSION['login'] === 1 ? true : false;
$avatarFolderLocation = ROOT . "usercontent/avatars/";

if ($isLogged) {
  $userId = $_SESSION['logged_user']['role'] === 'admin' ? $uriGet : $_SESSION['logged_user']['id'];
  $user = R::load('users', $userId);
  $userAvatar = !empty($user->avatar) ? $user->avatar : '';

  if (isset($_POST['update-profile'])) {
    validateEditForm($_POST['name'], $_POST['surname'], $_POST['email']);

    if (!$_FILES['avatar']['error']) {
      $file = processUploadedFile($_FILES['avatar']);
      $fileNames = getFileNames($avatarFolderLocation, $file['ext']);

      $moveResult = move_uploaded_file($file['tempLoc'], $fileNames['uploadFile']);

      if (!$moveResult) {
        $_SESSION['errors']['file'][] = "notSaved";
      }

      if (empty($_SESSION['errors']['file'])) {
        $user->avatar = $fileNames['dbFileName'];
        $user->avatarSmall = '48-' . $fileNames['dbFileName'];
      }
    }

    if (empty($_SESSION['errors'])) {
      $user->name = htmlentities($_POST['name']);
      $user->surname = htmlentities($_POST['surname']);
      $user->email = htmlentities($_POST['email']);
      $user->city = htmlentities($_POST['city']);
      $user->country = htmlentities($_POST['country']);

      $avatar = $user->avatar;

      if (!empty($avatar) && !empty($_FILES['avatar']['name'])) {
        $db_file_name160 = $avatarFolderLocation . $avatar;
        $db_file_name48 = $avatarFolderLocation . '48-' .$avatar;

        deleteFilesIfExist([$db_file_name160, $db_file_name48]);
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
