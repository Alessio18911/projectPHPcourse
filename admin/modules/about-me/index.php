<?php

$about_me = R::getAssoc('SELECT section_title, section_content FROM common');

$about_title = $about_me['about_title'];
$about_content = $about_me['about_content'];
$services_title = $about_me['services_title'];
$services_content = $about_me['services_content'];

if (isset($_POST['about_me_edit'])) {
  $about_title = $about_me['about_title'] = isset($_POST['about_title']) ? trim($_POST['about_title']) : '';
  $about_content = $about_me['about_content'] = isset($_POST['about_content']) ? trim($_POST['about_content']) : '';
  $services_title = $about_me['services_title'] = isset($_POST['services_title']) ? trim($_POST['services_title']) : '';
  $services_content = $about_me['services_content'] = isset($_POST['services_content']) ? trim($_POST['services_content']) : '';

  if (!$about_title || !$services_title) {
    $_SESSION['errors']['post_title'][] = "empty";
  }

  if(!$about_content || !$services_content) {
    $_SESSION['errors']['post_content'][] = "empty";
  }

  if (empty($_SESSION['errors'])) {
    foreach($about_me as $about_me_title => $about_me_value) {
      R::exec('UPDATE common SET section_content = ? WHERE section_title = ?', [$about_me_value, $about_me_title]);
    }

    $_SESSION['success']['about_me'][] = "success";
  }
}

ob_start();
include ROOT . "admin/templates/about-me/about_me.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
