<?php

$page_title = "Блог - все записи";

$posts_per_page = 3;
$is_blog_no_category = $uri_module == 'blog' && !isset($uri_cat) && !isset($uri_get);
$is_category_valid = isset($uri_cat) && isset($uri_get) && is_in_array('categories', 'id', $uri_get);

if ($is_category_valid) {
  $posts_amount = R::count('posts', 'category_id = ?', [$uri_get]);
  $category_name = R::findOne('categories', 'id=?', [$uri_get])['category_name'];
  $page_title = "Блог - " . $category_name;
} else {
  $posts_amount = R::count('posts');
}

$pagination = paginate($posts_amount, $posts_per_page);
$start_offset = $pagination['start_offset'];
$pages_count = $pagination['pages_count'];
$page_number = $pagination['page_number'];

$posts = $is_category_valid ?
            R::getAll("SELECT p.id, p.title, p.cover_small, c.category_name
              FROM posts AS p INNER JOIN categories AS c ON p.category_id = c.id
              WHERE c.id = ?
              ORDER BY p.id DESC
              LIMIT $start_offset, $posts_per_page", [$uri_get]) :
            R::find('posts', "ORDER BY id DESC LIMIT $start_offset, $posts_per_page");

ob_start();
include ROOT . "templates/blog/index.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/template.tpl";
