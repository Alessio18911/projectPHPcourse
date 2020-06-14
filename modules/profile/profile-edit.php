<?php

$pageTitle = 'Редактирование профиля';

$minAvatarWidth = $minAvatarHeight = 160;
$thumbAvatarWidth = $thumbAvatarHeight = 48;
$maxAvatarWeight = 4194304;
$avatarNamePrefix = "48-";
$isLogged = !empty($_SESSION['login']) ? true : false;
$avatarFolderLocation = ROOT . "usercontent/avatars/";

if ($isLogged) {
  $userId = $_SESSION['logged_user']['role'] === 'admin' ? $uriGet : $_SESSION['logged_user']['id'];
  $user = R::load('users', $userId);
  $userAvatar = !empty($user->avatar) ? $user->avatar : '';

  if (isset($_POST['update-profile'])) {
    $userName = trim($_POST['name']);
    $userSurname = trim($_POST['surname']);
    $userEmail = trim($_POST['email']);
    $userCity = isset($_POST['city']) ? trim($_POST['city']) : NULL;
    $userCountry = isset($_POST['country']) ? trim($_POST['country']) : NULL;
    validateEditForm($userName, $userSurname, $userEmail);

    if (empty($_SESSION['errors'])) {
      $user->name = htmlentities($userName);
      $user->surname = htmlentities($userSurname);
      $user->email = htmlentities($userEmail);
      $user->city = htmlentities($userCity);
      $user->country = htmlentities($userCountry);

      if (!$_FILES['avatar']['error']) {
        $fileParams = processUploadedFile($_FILES['avatar'], $minAvatarWidth, $minAvatarHeight, $maxAvatarWeight);

        if (!empty($fileParams)) {
          if (!empty($userAvatar)) deleteFile($avatarFolderLocation, $userAvatar);

          $uploadFile160 = $avatarFolderLocation . $fileParams['dbFileName'];
          $uploadFile48 = $avatarFolderLocation . $avatarNamePrefix . $fileParams['dbFileName'];

          $resultPhoto160 = resize_and_crop($fileParams['tempLoc'], $uploadFile160, $minAvatarWidth, $minAvatarHeight);
          $resultPhoto48 = resize_and_crop($fileParams['tempLoc'], $uploadFile48, $thumbAvatarWidth, $thumbAvatarHeight);

          if (!$resultPhoto160 || !$resultPhoto48) $_SESSION['errors']['file'][] = "notSaved";

          $user->avatar = $fileParams['dbFileName'];
          $user->avatarSmall = $avatarNamePrefix . $fileParams['dbFileName'];
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
