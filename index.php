<?php
require_once("./config.php");
require_once(ROOT . "db.php");
require_once(ROOT . "functions.php");
require_once(ROOT . "warnings.php");
require_once(ROOT . "libs/resize-and-crop.php");

session_start();
$_SESSION['errors'] = [];

if (!isset($_SESSION['success'])) {
  $_SESSION['success'] = [];
}

$uri = get_url_params($_SERVER['REQUEST_URI']);
list($uri_module, $uri_get) = [$uri[0], $uri[1]];
$uri_cat = isset($uri[2]) ? $uri[2] : NULL;
$new_messages_count = get_new_messages_count();

switch($uri_module) {
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

  case 'single-post':
    require ROOT . "modules/blog/single-post.php";
    break;

  case 'contacts':
    require ROOT . "modules/contacts/index.php";
    break;

  default:
    require ROOT . "modules/main/index.php";
}
?>
