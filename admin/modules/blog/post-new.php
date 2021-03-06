<?php

$post_title = isset($_POST['title']) ? trim($_POST['title']) : '';
$post_content = isset($_POST['content']) ? trim($_POST['content']) : '';
$categories = R::find('categories', 'ORDER BY category_name');

if (isset($_POST['post-submit'])) {
  if (!$post_title) $_SESSION['errors']['post_title'][] = "empty";
  if (!$post_content) $_SESSION['errors']['post_content'][] = "empty";

  if (empty($_SESSION['errors'])) {
    $post = R::dispense('posts');
    $post->title = $post_title;
    $post->content = $post_content;
    $post->timestamp = time();
    $post->category_id = $_POST['post-category'];

    if (!$_FILES['cover']['error']) {
      $is_attachment = false;
      $acceptable_formats = "/\.(gif|jpg|jpeg|png)$/i";
      $file_params = validate_uploaded_file(
        $is_attachment,
        $_FILES['cover'],
        $acceptable_formats,
        $cover_params["max_weight"],
        $cover_params["min_width"],
        $cover_params["min_height"]);

      if (!empty($file_params)) {
        process_uploaded_file(
          $is_attachment,
          $cover_params["folder_location"],
          $file_params,
          $cover_params["name_prefix"],
          $cover_params["min_width"],
          $cover_params["min_height"],
          $cover_params["thumb_width"],
          $cover_params["thumb_height"]);

        $post->cover = $file_params['db_file_name'];
        $post->cover_small = $cover_params["name_prefix"] . $file_params['db_file_name'];
      }
    }

    if (empty($_SESSION['errors']['file'])) {
      R::store($post);
      $_SESSION['success']['new_post'][] = "success";
      header("Location: " .HOST. "admin/blog");
      exit();
    }
  }
}

ob_start();
include ROOT . "admin/templates/blog/post-new.tpl";
$content = ob_get_contents();
ob_end_clean();
include ROOT . "admin/templates/template.tpl";

?>
