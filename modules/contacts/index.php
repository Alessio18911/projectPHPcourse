<?php

$page_title = "Контакты";

$about = R::getRow('SELECT * FROM common WHERE field_name = ? LIMIT 1', ['about']);
$services = R::getRow('SELECT * FROM common WHERE field_name = ? LIMIT 1', ['services']);
$my_contacts = R::getRow('SELECT * FROM common WHERE field_name = ? LIMIT 1', ['contacts']);

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
    R::store($message);

    $message_name = $message_email = $message_text = '';
    $_SESSION['success']['message'][] = "sent";
  }
}

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/contacts/contacts.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
