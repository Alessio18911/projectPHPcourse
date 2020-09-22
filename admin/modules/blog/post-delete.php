<?php

$post_id = $_GET['id'];
$post_to_delete = R::load('posts', $post_id);
$post_title = $post_to_delete->title;

if (isset($_POST['post-delete'])) {
  R::trash($post_to_delete);
  $_SESSION['success']['post-deleted'][] = "success";
  header("Location: " .HOST. "admin/blog");
  exit();
}

ob_start();

include ROOT . "admin/templates/blog/post-delete.tpl";
$content = ob_get_contents();
ob_end_clean();
include ROOT . "admin/templates/template.tpl";
