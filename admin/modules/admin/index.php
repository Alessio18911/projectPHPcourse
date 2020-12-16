<?php

$posts_count = R::count('posts');
$categories_count = R::count('categories');
$comments_count = R::count('comments');
$users_count = R::count('users');
$messages_count = R::count('messages');

ob_start();
include ROOT . "admin/templates/main/main.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
