<?php

require_once "./../config.php";
require_once "./../db.php";
require_once "./../functions.php";
require_once "./../warnings_admin.php";
require_once ROOT . "libs/resize-and-crop.php";

session_start();
if (!isset($_SESSION['success'])) {
  $_SESSION['success'] = [];
}

if (!isset($_SESSION['errors'])) {
  $_SESSION['errors'] = [];
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: " .HOST. "login");
  die();
}

$uri = get_url_params($_SERVER['REQUEST_URI']);
$uri_module = $uri[0];
$uri_get = $uri[1];
$new_messages_count = get_new_messages_count();

switch($uri_module) {
  case '':
    require ROOT . "admin/modules/admin/index.php";
    break;

  //::::::::::::::::::: ABOUT-ME :::::::::::::::::

  case 'about-me':
    require ROOT . "admin/modules/about-me/index.php";
    break;


  //::::::::::::::::::: CATEGORIES :::::::::::::::::

  case 'categories':
    require ROOT . "admin/modules/categories/index.php";
    break;

  case 'category-new':
    require ROOT . "admin/modules/categories/category-new.php";
    break;

  case 'category-edit':
    require ROOT . "admin/modules/categories/category-edit.php";
    break;

  case 'category-delete':
    require ROOT . "admin/modules/categories/category-delete.php";
    break;

  //::::::::::::::::::: BLOG :::::::::::::::::

  case 'blog':
    require ROOT . "admin/modules/blog/index.php";
    break;

  case 'post-new':
    require ROOT . "admin/modules/blog/post-new.php";
    break;

  case 'post-edit':
    require ROOT . "admin/modules/blog/post-edit.php";
    break;

  case 'post-delete':
    require ROOT . "admin/modules/blog/post-delete.php";
    break;

  //::::::::::::::::::: CONTACTS :::::::::::::::::

  case 'contacts':
    require ROOT . "admin/modules/contacts/index.php";
    break;

  //::::::::::::::::::: MESSAGES :::::::::::::::::

  case 'messages':
    require ROOT . "admin/modules/messages/index.php";
    break;

  case 'single-message':
    require ROOT . "admin/modules/messages/single-message.php";
    break;

  //::::::::::::::::::: PHOTOGALLERY :::::::::::::::::

  case 'photogallery':
    require ROOT . "admin/modules/photogallery/index.php";
    break;

  //::::::::::::::::::: USERS :::::::::::::::::

  case 'users':
    require ROOT . "admin/modules/users/index.php";
    break;

  case 'user-delete':
    require ROOT . "admin/modules/users/user-delete.php";
    break;

  //::::::::::::::::::: SETTINGS :::::::::::::::::

  case 'settings':
    require ROOT . "admin/modules/settings/index.php";
    break;

  default:
    require ROOT . "admin/modules/admin/index.php";
}
?>
