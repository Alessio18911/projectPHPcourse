<?php

$message_id = (int)$_GET['id'];
$single_message = R::load('messages', $message_id);
$sent_time = date('j.m.Y, G:i', $single_message['time']);
$sender_name = $single_message['name'];
$sender_email = $single_message['email'];
$message_text = $single_message['message'];
$attached_file = !empty($single_message['attachment']) ? $single_message['attachment'] : '';
$single_message->is_new = 0;
R::store($single_message);
$new_messages_count = get_new_messages_count();

ob_start();
include ROOT . "admin/templates/messages/single-message.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
