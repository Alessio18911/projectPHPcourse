<?php

$posts_per_page = 5;
$posts_amount = R::count('posts');

$pagination = paginate($posts_amount, $posts_per_page);
list($start_offset, $pages_count, $page_number) = [$pagination['start_offset'], $pagination['pages_count'], $pagination['page_number']];

$posts =  R::getAll("SELECT p.id, p.title FROM posts AS p
                      ORDER BY p.id DESC
                      LIMIT $start_offset, $posts_per_page");

ob_start();
include ROOT . "admin/templates/blog/index.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
?>
