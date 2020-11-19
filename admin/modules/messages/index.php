<?php

$messages = R::find('messages', 'ORDER BY id DESC');

if (isset($_GET['message-delete']) && isset($_GET['id'])) {
  $message_to_delete = R::load('messages', (int)$_GET['id']);
  $deletion_result = R::trash($message_to_delete);

  if ($deletion_result) {
    $_SESSION['success']['message_deleted'][] = "success";
    header("Location: " .HOST. "admin/messages");
  } else {
    $_SESSION['errors']['message_not_deleted'][] = "failed";
  }
}

ob_start();
include ROOT . "admin/templates/messages/messages.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
