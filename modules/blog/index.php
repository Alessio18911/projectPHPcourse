<?php

$page_title = "Блог - все записи";

$posts_per_page = 3;

if (isset($uri_cat) && isset($uri_get)) {
  $category = R::load('categories', $uri_get);
  $category_id = $category->id;
}

if (!empty($category_id)) {
  $posts_amount = R::count('posts', 'category_id = ?', [$category_id]);
  $category_name = $category->category_name;
  $page_title = "Блог - " . $category_name;
} else {
  $posts_amount = R::count('posts');
}

$pagination = paginate($posts_amount, $posts_per_page);
list($start_offset, $pages_count, $page_number) = [$pagination['start_offset'], $pagination['pages_count'], $pagination['page_number']];

$posts = !empty($category_id) ?
            R::getAll("SELECT p.id, p.title, p.cover_small, c.category_name
              FROM posts AS p INNER JOIN categories AS c ON p.category_id = c.id
              WHERE c.id = ?
              ORDER BY p.id DESC
              LIMIT $start_offset, $posts_per_page", [$category_id]) :
            R::find('posts', "ORDER BY id DESC LIMIT $start_offset, $posts_per_page");

ob_start();
include ROOT . "templates/blog/index.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/template.tpl";
