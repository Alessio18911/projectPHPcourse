<?php

$about = R::find('common', 'field_name = ?', ['about']);
$services = R::find('common', 'field_name = ?', ['services']);
$my_contacts = R::find('common', 'field_name = ?', ['contacts']);

var_dump($about);
die();

if (isset($_POST['contacts-edit'])) {
  $about_title = isset($_POST['about_title']) ? trim($_POST['about_title']) : '';
  $about_content = isset($_POST['about_content']) ? trim($_POST['about_content']) : '';
  $services_title = isset($_POST['services_title']) ? trim($_POST['services_title']) : '';
  $services_content = isset($_POST['services_content']) ? trim($_POST['services_content']) : '';
  $my_contacts_title = isset($_POST['my_contacts_title']) ? trim($_POST['my_contacts_title']) : '';
  $my_contacts_content = isset($_POST['my_contacts_content']) ? trim($_POST['my_contacts_content']) : '';

  if (empty($_SESSION['errors'])) {
    $about->title = $about_title;
    $about->content = $about_content;
    $services->title = $services_title;
    $services->content = $services_content;
    $my_contacts->title = $my_contacts_title;
    $my_contacts->content = $my_contacts_content;

    R::store('common');

  }
}

ob_start();
include ROOT . "admin/templates/contacts/contacts.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
