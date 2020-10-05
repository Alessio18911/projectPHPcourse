<?php

$page_title = 'Редактирование профиля';

$min_avatar_width = $min_avatar_height = 160;
$thumb_avatar_width = $thumb_avatar_height = 48;
$max_avatar_weight = 4194304;
$avatar_name_prefix = "48-";
$is_logged = !empty($_SESSION['login']) ? true : false;
$avatar_folder_location = ROOT . "usercontent/avatars/";

if ($is_logged) {
  $user_id = isset($uri_get) ? $uri_get : $_SESSION['logged_user']['id'];
  $user = R::load('users', $user_id);
  $user_avatar = $user->avatar;

  if (isset($_POST['update-profile'])) {
    $user_name = trim($_POST['name']);
    $user_surname = trim($_POST['surname']);
    $user_email = trim($_POST['email']);
    $user_city = isset($_POST['city']) ? trim($_POST['city']) : NULL;
    $user_country = isset($_POST['country']) ? trim($_POST['country']) : NULL;
    validate_edit_form($user_name, $user_surname, $user_email);

    if (empty($_SESSION['errors'])) {
      $user->name = htmlentities($user_name);
      $user->surname = htmlentities($user_surname);
      $user->email = htmlentities($user_email);
      $user->city = htmlentities($user_city);
      $user->country = htmlentities($user_country);

      if (isset($_POST['delete-avatar']) && isset($user_avatar)) {
        delete_file($avatar_folder_location, $user_avatar, $avatar_name_prefix);
        $user->avatar = $user->avatar_small = $_SESSION['logged_user']['avatar'] = $_SESSION['logged_user']['avatar_small'] = NULL;
      }

      if (!$_FILES['avatar']['error']) {
        $file_params = validate_uploaded_file(
          $_FILES['avatar'],
          $min_avatar_width,
          $min_avatar_height,
          $max_avatar_weight
        );

        if (isset($file_params)) {
          if (isset($user_avatar)) delete_file($avatar_folder_location, $user_avatar, $avatar_name_prefix);

          process_uploaded_file(
            $avatar_folder_location,
            $file_params,
            $avatar_name_prefix,
            $min_avatar_width,
            $min_avatar_height,
            $thumb_avatar_width,
            $thumb_avatar_height
          );

          $user->avatar = $file_params['db_file_name'];
          $user->avatar_small = $avatar_name_prefix . $file_params['db_file_name'];
        }
      }


      if (empty($_SESSION['errors']['file'])) {
        R::store($user);
        header("Location: " .HOST. "profile/" . $user_id);
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
