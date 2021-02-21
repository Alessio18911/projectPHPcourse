<?php

$user_id = $_GET['id'];
$user_to_delete = R::findOne('users', 'id=?', [$user_id]);
$user_to_delete_name = $user_to_delete->name;
$user_to_delete_surname = $user_to_delete->surname;
$user_role = $user_to_delete->role;
$user_to_delete_avatar = $user_to_delete->avatar;
$avatar_path = ROOT . "usercontent/avatars/";
$avatar_name_prefix = "48-";

if (isset($_POST['delete-user'])) {
  if ($user_role != 'admin') {
    $deletion_result = R::trash($user_to_delete);

    if (isset($user_to_delete_avatar)) {
      delete_file($avatar_path, $user_to_delete_avatar, $avatar_name_prefix);
    }

    if (!$deletion_result) {
      $_SESSION['errors']['user_deleted'][] = "failed";
    }

    $_SESSION['success']['user_deleted'][] = "success";
  } else {
    $_SESSION['errors']['admin_unremovable'][] = 'failed';
  }

  header("Location: " .HOST. "admin/users");
  exit();
}

ob_start();
include ROOT . "admin/templates/users/user-delete.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
