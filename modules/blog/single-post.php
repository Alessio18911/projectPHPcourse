<?php

if (isset($uri_get)) {
  $is_post_exists = is_in_array('posts', 'id', $uri_get);

  if ($is_post_exists) {
    $query = "SELECT posts.id, posts.title, posts.content, posts.timestamp, posts.cover, categories.id AS cat_id,     categories.category_name
    FROM posts INNER JOIN categories ON posts.category_id = categories.id
    WHERE posts.id = $uri_get";

    $post = R::getRow($query);
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
  }
}

ob_start();
include ROOT . "templates/blog/single-post.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/template.tpl";
