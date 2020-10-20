<?php

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
