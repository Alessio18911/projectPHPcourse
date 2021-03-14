<?php

$contacts = R::getAssoc('SELECT section_title, section_content FROM contacts');

$my_contacts_title = $contacts['contacts_title'];
$my_contacts_content = $contacts['contacts_content'];
$interactive_map = $contacts['map_script'];

if (isset($_POST['contacts-edit'])) {
  $my_contacts_title = $contacts['contacts_title'] = isset($_POST['contacts_title']) ? trim($_POST['contacts_title']) : '';
  $my_contacts_content = $contacts['contacts_content'] = isset($_POST['contacts_content']) ? trim($_POST['contacts_content']) : '';
  $interactive_map = $contacts['map_script'] = isset($_POST['interactive_map']) ? trim($_POST['interactive_map']) : '';

  if (!$my_contacts_title) {
    $_SESSION['errors']['post_title'][] = "empty";
  }

  if(!$my_contacts_content || !$interactive_map) {
    $_SESSION['errors']['post_content'][] = "empty";
  }

  if (empty($_SESSION['errors'])) {
    foreach($contacts as $contacts_title => $contacts_value) {
      R::exec('UPDATE contacts SET section_content = ? WHERE section_title = ?', [$contacts_value, $contacts_title]);
    }

    $_SESSION['success']['contacts'][] = "success";
  }
}

ob_start();
include ROOT . "admin/templates/contacts/contacts.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
