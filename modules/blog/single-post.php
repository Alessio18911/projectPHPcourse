<?php

$page_title = "Блог - пост";
$is_single_post = $uri_module === "single-post";

if (isset($uri_get)) {
  $post = R::findOne('posts', 'id=?', [$uri_get]);

  if (isset($post)) {
    $is_logged = !empty($_SESSION['login']) ? true : false;

    // Заголовок и дата с временем поста
    $page_title = "Блог - " . $post['title'];
    $post_id = $post['id'];
    $post_date = strtr(date('j F Y, G:i', $post['timestamp']), $translation_terms);

    // ID и название категории поста
    $category_id = $post['category_id'];
    $category_name = R::getCell("SELECT category_name FROM categories WHERE categories.id = ?", [$category_id]);

    // Пагинация по постам
    list($first_post_id, $prev_post_id) = slide_back('posts', $post_id);
    list($last_post_id, $next_post_id) = slide_forward('posts', $post_id);

    // Имеющиеся комментарии к данному посту
    $comments = R::getAll(
              "SELECT c.comment, c.timestamp, u.id AS user_id, u.name AS user_name, u.surname AS user_surname, md.thumb AS avatar
                FROM comments AS c INNER JOIN users AS u ON c.user_id = u.id
                                   INNER JOIN posts AS p ON c.post_id = p.id
                                   INNER JOIN media AS md ON c.user_id = md.user_id
                WHERE p.id = ?
                ORDER BY c.timestamp ASC", [$post_id]);

    $comments_amount = count($comments);
    $comments_word = get_right_word($comments_amount);

    // Форма отправки комментария
    require_once(ROOT . 'modules/blog/_parts/submit-comment.php');

    // Связанные по категории посты
    require_once(ROOT . 'modules/blog/_parts/related-posts.php');
  }
}

ob_start();
include ROOT . "templates/blog/single-post.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/template.tpl";
