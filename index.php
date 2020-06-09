<?php

require_once("./config.php");
require_once(ROOT . "db.php");
require_once(ROOT . "functions.php");
require_once(ROOT . "libs/resize-and-crop.php");

session_start();
$_SESSION['errors'] = [];
$_SESSION['success'] = [];

$uri = getUrlParams($_SERVER['REQUEST_URI'], "/");
$uriModule = $uri[0];
$uriGet = $uri[1];

switch($uriModule) {
  case '':
    require ROOT . "modules/main/index.php";
    break;

  //::::::::::::::::::: USERS :::::::::::::::::

  case 'login':
    require ROOT . "modules/login/login.php";
    break;

  case 'registration':
    require ROOT . "modules/login/registration.php";
    break;

  case 'logout':
    require ROOT . "modules/login/logout.php";
    break;

  case 'lost-password':
    require ROOT . "modules/login/lost-password.php";
    break;

  case 'set-new-password':
    require ROOT . "modules/login/set-new-password.php";
    break;

  case 'profile':
    require ROOT . "modules/profile/profile.php";
    break;

  case 'profile-edit':
    require ROOT . "modules/profile/profile-edit.php";
    break;

  //::::::::::::::::::: OTHERS :::::::::::::::::

  case 'about':
    require ROOT . "modules/about/index.php";
    break;

  case 'blog':
    require ROOT . "modules/blog/index.php";
    break;

  case 'contacts':
    require ROOT . "modules/contacts/index.php";
    break;

  default:
    require ROOT . "modules/main/index.php";
}
?>
