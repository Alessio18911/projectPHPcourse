<?php

$page_title = "Блог - все записи";

$posts_per_page = 3;

$posts_amount = !isset($uri_cat) ? R::count('posts') : R::count('posts', 'category_id = ?', [$uri_get]);

$pagination = paginate($posts_amount, $posts_per_page);
$start_offset = $pagination['start_offset'];
$pages_count = $pagination['pages_count'];
$page_number = $pagination['page_number'];

$posts = !isset($uri_cat) ?
            R::find('posts', "ORDER BY id DESC LIMIT $start_offset, $posts_per_page") :
            R::getAll("SELECT p.id, p.title, p.content, p.timestamp, p.cover, p.cover_small, c.id AS cat_id, c.category_name FROM
              posts AS p INNER JOIN categories AS c ON p.category_id = c.id
              WHERE c.id = $uri_get
              ORDER BY p.id DESC
              LIMIT $start_offset, $posts_per_page");

ob_start();
include ROOT . "templates/blog/index.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/template.tpl";
