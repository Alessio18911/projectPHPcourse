<?php

$page_title = "Блог - все записи";

if (isset($uri_get)) {
  $post = R::load('posts', $uri_get);

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

  ob_start();
  include ROOT . "templates/blog/single-post.tpl";
  $content = ob_get_contents();
  ob_end_clean();

} else {
  $posts_per_page = 1;

  $pagination = paginate('posts', $posts_per_page);
  $start_offset = $pagination['start_offset'];
  $pages_count = $pagination['pages_count'];
  $page_number = $pagination['page_number'];

  $posts =  R::find('posts', "ORDER BY id DESC LIMIT $start_offset, $posts_per_page");

  ob_start();
  include ROOT . "templates/blog/all-posts.tpl";
  $content = ob_get_contents();
  ob_end_clean();
}

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/blog/index.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";

?>
