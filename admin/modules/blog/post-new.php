<?php

$postTitle = isset($_POST['title']) ? trim($_POST['title']) : '';
$postContent = isset($_POST['content']) ? trim($_POST['content']) : '';

if (isset($_POST['post-submit'])) {
  if (!$postTitle) $_SESSION['errors']['postTitle'][] = "empty";
  if (!$postContent) $_SESSION['errors']['postContent'][] = "empty";

  if (empty($_SESSION['errors'])) {
    $post = R::dispense('posts');
    $post->title = $postTitle;
    $post->content = $postContent;
    R::store($post);
    $_SESSION['success']['newPost'][] = "success";
    header("Location: " .HOST. "admin/blog");
    exit();
  }
}

ob_start();

include ROOT . "admin/templates/blog/post-new.tpl";

$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>
