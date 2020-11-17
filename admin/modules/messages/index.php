<?php

$new_messages_count = get_new_messages_count();
$messages = R::find('messages', 'ORDER BY id DESC');

ob_start();
include ROOT . "admin/templates/messages/messages.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
