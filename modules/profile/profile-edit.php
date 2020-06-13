<?php

$pageTitle = 'Редактирование профиля';
$isLogged = !empty($_SESSION['login']) ? true : false;
$avatarFolderLocation = ROOT . "usercontent/avatars/";

if ($isLogged) {
  $userId = $_SESSION['logged_user']['role'] === 'admin' ? $uriGet : $_SESSION['logged_user']['id'];
  $user = R::load('users', $userId);
  $userAvatar = !empty($user->avatar) ? $user->avatar : '';

  if (isset($_POST['update-profile'])) {
    validateEditForm($_POST['name'], $_POST['surname'], $_POST['email']);

    if (empty($_SESSION['errors'])) {
      $user->name = htmlentities($_POST['name']);
      $user->surname = htmlentities($_POST['surname']);
      $user->email = htmlentities($_POST['email']);
      $user->city = htmlentities($_POST['city']);
      $user->country = htmlentities($_POST['country']);

      if (!$_FILES['avatar']['error']) {
        $fileParams = processUploadedFile($_FILES['avatar']);

        if (!empty($fileParams)) {
          if (!empty($userAvatar)) deleteFile($avatarFolderLocation, $userAvatar);

          $uploadFile160 = $avatarFolderLocation . $fileParams['dbFileName'];
          $uploadFile48 = $avatarFolderLocation . "48-" . $fileParams['dbFileName'];

          $resultPhoto160 = resize_and_crop($fileParams['tempLoc'], $uploadFile160, 160, 160);
          $resultPhoto48 = resize_and_crop($fileParams['tempLoc'], $uploadFile48, 48, 48);

          if (!$resultPhoto160 || !$resultPhoto48) $_SESSION['errors']['file'][] = "notSaved";

          $user->avatar = $fileParams['dbFileName'];
          $user->avatarSmall = '48-' . $fileParams['dbFileName'];
        }
      }

      if (!empty($_POST['delete-avatar']) && !empty($userAvatar)) {
        deleteFile($avatarFolderLocation, $userAvatar);
        $user->avatar = $user->avatarSmall = NULL;
      }

      if (empty($_SESSION['errors']['file'])) {
        R::store($user);
        header("Location: " .HOST. "profile/" . $userId);
        exit();
      }
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
