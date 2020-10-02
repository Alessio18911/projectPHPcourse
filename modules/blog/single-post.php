<?php

$page_title = "Блог";

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
              "SELECT c.comment, c.timestamp, u.id AS user_id, u.name AS user_name, u.surname AS user_surname, u.avatar_small AS user_avatar
                FROM comments AS c INNER JOIN users AS u ON c.user_id = u.id
                                    INNER JOIN posts AS p ON c.post_id = p.id
                WHERE p.id = ?", [$post_id]);

    // Форма отправки комментария
    $user_avatar = isset($_SESSION['logged_user']['avatar_small']) ? $_SESSION['logged_user']['avatar_small'] : 'blank-avatar.svg';

    $user_comment = isset($_POST['user_comment']) ? trim($_POST['user_comment']) : '';

    if(isset($_POST['submit-comment'])) {
      if (!$user_comment) {
        $_SESSION['errors']['comment'][] = 'empty';
      } else {
        $comment = R::dispense('comments');
        $comment->comment = $user_comment;
        $comment->timestamp = time();
        $comment->user_id = $_SESSION['logged_user']['id'];
        $comment->post_id = $post_id;
        $result = R::store($comment);

        if (is_int($result)) {
          header("Location: " .HOST. "single-post/" . $post_id);
          $_SESSION['success']['comment'][] = "set";
        } else {
          $_SESSION['errors']['comment'][] = "not_saved";
        }
      }
    }
  }
}

ob_start();
include ROOT . "templates/blog/single-post.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/template.tpl";
