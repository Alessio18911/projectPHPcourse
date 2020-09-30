<?php

$page_title = "Блог";

if (isset($uri_get)) {
  $post = R::findOne('posts', 'id=?', [$uri_get]);

  if (isset($post)) {
    $category_id = $post['category_id'];
    $category_name = R::getCell("SELECT category_name FROM categories WHERE categories.id = ?", [$category_id]);

    $page_title = "Блог - " . $post['title'];

    $translation_terms = [
      'January' => 'Января',
      'February' => 'Февраля',
      'March' => 'Марта',
      'April' => 'Апреля',
      'May' => 'Мая',
      'June' => 'Июня',
      'July' => 'Июля',
      'August' => 'Августа',
      'September' => 'Сентября',
      'October' => 'Октября',
      'November' => 'Ноября',
      'December' => 'Декабря'
    ];

    $post_date = strtr(date('j F Y, G:i', $post['timestamp']), $translation_terms);

    list($last_post_id, $next_post_id) = slide_forward('posts', $uri_get);
    list($first_post_id, $prev_post_id) = slide_back('posts', $uri_get);
  }
}

ob_start();
include ROOT . "templates/blog/single-post.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/template.tpl";
