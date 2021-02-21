<?php

$about = R::findOne('common', 'field_name = ?', ['about']);
$services = R::findOne('common', 'field_name = ?', ['services']);
$my_contacts = R::findOne('common', 'field_name = ?', ['contacts']);
$my_location = R::findOne('common', 'field_name = ?', ['map']);

if (isset($_POST['contacts-edit'])) {
  $about_title = isset($_POST['about_title']) ? trim($_POST['about_title']) : '';
  $about_content = isset($_POST['about_content']) ? trim($_POST['about_content']) : '';
  $services_title = isset($_POST['services_title']) ? trim($_POST['services_title']) : '';
  $services_content = isset($_POST['services_content']) ? trim($_POST['services_content']) : '';
  $my_contacts_title = isset($_POST['contacts_title']) ? trim($_POST['contacts_title']) : '';
  $my_contacts_content = isset($_POST['contacts_content']) ? trim($_POST['contacts_content']) : '';
  $interactive_map = isset($_POST['interactive_map']) ? trim($_POST['interactive_map']) : '';

  if (!$about_title || !$services_title || !$my_contacts_title) {
    $_SESSION['errors']['post_title'][] = "empty";
  }

  if(!$about_content || !$services_content || !$my_contacts_content || !$interactive_map) {
    $_SESSION['errors']['post_content'][] = "empty";
  }

  if (empty($_SESSION['errors'])) {
    $about->title = $about_title;
    $about->content = $about_content;
    $services->title = $services_title;
    $services->content = $services_content;
    $my_contacts->title = $my_contacts_title;
    $my_contacts->content = $my_contacts_content;
    $my_location->content = $interactive_map;

    $about_id = R::store($about);
    $services_id = R::store($services);
    $my_contacts_id = R::store($my_contacts);
    $my_location_id = R::store($my_location);

    if (is_int($about_id) && is_int($services_id) && is_int($my_contacts_id) && is_int($my_location_id)) {
      $_SESSION['success']['contacts'][] = "success";
    } else {
      $_SESSION['errors']['contacts'][] = "not_saved";
    }
  }
}

ob_start();
include ROOT . "admin/templates/contacts/contacts.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
