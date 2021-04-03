<?php

$page_title = 'Редактирование профиля';

$min_avatar_width = $min_avatar_height = 160;
$thumb_avatar_width = $thumb_avatar_height = 48;
$max_avatar_weight = 4194304;
$avatar_name_prefix = "48-";
$is_logged = !empty($_SESSION['login']) ? true : false;
$avatar_folder_location = ROOT . "usercontent/avatars/";

if ($is_logged) {
  $user_id = isset($uri_get) ? (int)$uri_get : (int)$_SESSION['logged_user']['id'];
  $user = R::load('users', $user_id);

  if (!is_int($user->id)) {
    $user_id = $user->id;
    $user_photo = R::findOne('media', ' user_id = ?', [$user_id]);

    $is_the_same_user = $_SESSION['logged_user']['id'] === $user_id;
    $is_admin = $_SESSION['logged_user']['role'] == 'admin';

    if ($is_the_same_user || $is_admin) {
      $user_name = $user->name;
      $user_surname = $user->surname;
      $user_email = $user->email;
      $user_avatar = isset($user_photo->image) ? $user_photo->image : 'blank-avatar.svg';
      $user_country = isset($user->country) ? $user->country : '';
      $user_city = isset($user->city) ? $user->city : '';

      if (isset($_POST['update-profile'])) {
        $user_name = trim($_POST['name']);
        $user_surname = trim($_POST['surname']);
        $user_email = trim($_POST['email']);
        $user_country = trim($_POST['country']);
        $user_city = trim($_POST['city']);
        validate_edit_form($user_name, $user_surname, $user_email);

        if (empty($_SESSION['errors'])) {
          $user_name = htmlentities($user_name);
          $user_surname = htmlentities($user_surname);
          $user_email = htmlentities($user_email);
          $user_country = !empty($user_country) ? htmlentities($user_country) : NULL;
          $user_city = !empty($user_city) ? htmlentities($user_city) : NULL;

          if (isset($_POST['delete-avatar']) && $user_avatar != 'blank-avatar.svg') {
            delete_file($avatar_folder_location, $user_avatar, $avatar_name_prefix);
            $user_photo->image = $user_photo->thumb = NULL;

            if ($is_the_same_user) $_SESSION['logged_user']['avatar'] = $_SESSION['logged_user']['avatar_small'] = NULL;
          }

          if (!$_FILES['avatar']['error']) {
            $is_attachment = false;
            $acceptable_formats = "/\.(gif|jpg|jpeg|png)$/i";
            $file_params = validate_uploaded_file(
              $is_attachment,
              $_FILES['avatar'],
              $acceptable_formats,
              $max_avatar_weight,
              $min_avatar_width,
              $min_avatar_height);

            if (isset($file_params)) {
              if ($user_avatar != 'blank-avatar.svg') delete_file($avatar_folder_location, $user_avatar, $avatar_name_prefix);

              process_uploaded_file(
                $is_attachment,
                $avatar_folder_location,
                $file_params,
                $avatar_name_prefix,
                $min_avatar_width,
                $min_avatar_height,
                $thumb_avatar_width,
                $thumb_avatar_height
              );

              $user_photo->image = $file_params['db_file_name'];
              $user_photo->thumb = $avatar_name_prefix . $file_params['db_file_name'];

              if ($is_the_same_user) {
                $_SESSION['logged_user']['avatar'] = $file_params['db_file_name'];
                $_SESSION['logged_user']['avatar_small'] = $avatar_name_prefix . $file_params['db_file_name'];
              }
            }
          }

          if (empty($_SESSION['errors']['file'])) {
            R::store($user);
            R::store($user_photo);
            header("Location: " .HOST. "profile/" . $user_id);
            exit();
          }
        }
      }
    } else {
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
