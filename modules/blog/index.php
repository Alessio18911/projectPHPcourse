<?php

$page_title = "Блог - все записи";

$posts_per_page = 3;

$pagination = paginate('posts', $posts_per_page);
$start_offset = $pagination['start_offset'];
$pages_count = $pagination['pages_count'];
$page_number = $pagination['page_number'];

$posts =  R::find('posts', "ORDER BY id DESC LIMIT $start_offset, $posts_per_page");

ob_start();
include ROOT . "templates/blog/index.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/template.tpl";
