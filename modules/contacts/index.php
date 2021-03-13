<?php

$page_title = "Контакты";

$contacts = R::getAssoc('SELECT section_title, section_content FROM common');

$about_title = $contacts['about_title'];
$about_content = $contacts['about_content'];
$services_title = $contacts['services_title'];
$services_content = $contacts['services_content'];
$my_contacts_title = $contacts['contacts_title'];
$my_contacts_content = $contacts['contacts_content'];
$interactive_map = $contacts['map_script'];

$message_name = isset($_POST['name']) ? trim($_POST['name']) : '';
$message_email = isset($_POST['email']) ? trim($_POST['email']) : '';
$message_text = isset($_POST['message']) ? trim($_POST['message']) : '';

if (isset($_POST['send_message'])) {
  if (!$message_name) $_SESSION['errors']['name'][] = "empty";

  if (!$message_email) {
    $_SESSION['errors']['email'][] = "empty";
  } else if (!filter_var($message_email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors']['email'][] = "invalid";
  }

  if (!$message_text) $_SESSION['errors']['message'][] = "empty";

  if (empty($_SESSION['errors'])) {
    $message = R::dispense('messages');
    $message->name = htmlentities($message_name);
    $message->email = htmlentities($message_email);
    $message->message = htmlentities($message_text);
    $message->time = time();
    $message->is_new = 1;

    if (!$_FILES['attachment']['error']) {
      $is_attachment = true;
      $max_weight = 2097152;
      $folder_location = ROOT . "usercontent/contact-form/";
      $acceptable_formats = "/\.(gif|jpg|jpeg|png|doc|docx|rtf|pdf|txt|odt|zip|rar)$/i";
      $file_params = validate_uploaded_file(
        $is_attachment,
        $_FILES['attachment'],
        $acceptable_formats,
        $max_weight,
        NULL,
        NULL);

      if (!empty($file_params)) {
        process_uploaded_file(
          $is_attachment,
          $folder_location,
          $file_params
        );

        $message->file_name = $file_params['db_file_name'];
        $message->file_original_name = $file_params['original_file_name'];
      }
    }

    if (empty($_SESSION['errors']['file'])) {
      R::store($message);
      $message_name = $message_email = $message_text = '';
      $_SESSION['success']['message'][] = "sent";
      header("Location: " .HOST. "contacts");
      die();
    }
  }
}

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/contacts/contacts.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
