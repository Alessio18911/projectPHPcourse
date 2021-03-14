<?php

$page_title = 'Главная страница';
$page_class = 'main-page';

$about_me = R::getAssoc('SELECT section_title, section_content FROM common');

$about_me_title = $about_me['about_title'];
$about_me_content = $about_me['about_content'];
$my_skills_title = $about_me['services_title'];
$my_skills_content = $about_me['services_content'];

$new_posts = R::find('posts', 'ORDER BY timestamp DESC LIMIT 0, 3');

ob_start();
include ROOT . "templates/main/main.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/main/main.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
?>
