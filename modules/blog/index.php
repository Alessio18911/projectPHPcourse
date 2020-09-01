<?php

$pageTitle = "Блог - все записи";

if (isset($uriGet)) {
  $post = R::load('posts', $uriGet);

  $translationTerms = [
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

  $postDate = strtr(date('j F Y, G:i', $post['timestamp']), $translationTerms);

  ob_start();
  include ROOT . "templates/blog/single-post.tpl";
  $content = ob_get_contents();
  ob_end_clean();

} else {
  $posts_count = R::count('posts');
  $posts_per_page = 1;
  $pages_count = ceil($posts_count / $posts_per_page);
  if (empty($_GET['page'])) {
    $page_number = 1;
  } else if($_GET['page'] <= $pages_count) {
    $page_number = $_GET['page'];
  } else {
    $page_number = $pages_count;
  }

  $offset_coef = $page_number != 1 ? $page_number - 1 : 0;
  $start_offset = $posts_per_page * $offset_coef;
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
