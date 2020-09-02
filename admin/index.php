<?php

require_once "./../config.php";
require_once "./../db.php";
require_once ROOT . "functions.php";
require_once ROOT . "libs/resize-and-crop.php";

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: " .HOST. "login");
  die();
}

$uri = get_url_params($_SERVER['REQUEST_URI']);
$uri_module = $uri[0];
$uri_get = $uri[1];

switch($uri_module) {
  case '':
    require ROOT . "admin/modules/admin/index.php";
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

  //::::::::::::::::::: USERS :::::::::::::::::

  default:
    require ROOT . "admin/modules/admin/index.php";
}
?>
