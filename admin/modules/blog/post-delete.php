<?php

$post_id = $_GET['id'];
$post_to_delete = R::load('posts', $post_id);
$post_to_delete_title = $post_to_delete->title;
$post_to_delete_cover = $post_to_delete->cover;


if (isset($_POST['post-delete'])) {
  if (isset($post_to_delete_cover)) {
    $cover_to_delete_path = ROOT . "usercontent/blog/";
    $cover_to_delete_name = $post_to_delete_cover;
    $cover_name_prefix = "290-";
    delete_file($cover_to_delete_path, $cover_to_delete_name, $cover_name_prefix);
  }
  R::trash($post_to_delete);

  $_SESSION['success']['post_deleted'][] = "success";
  header("Location: " .HOST. "admin/blog");
  exit();
}

ob_start();

include ROOT . "admin/templates/blog/post-delete.tpl";
$content = ob_get_contents();
ob_end_clean();
include ROOT . "admin/templates/template.tpl";
