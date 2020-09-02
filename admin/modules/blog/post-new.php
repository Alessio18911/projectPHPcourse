<?php

$min_cover_width = 600;
$min_cover_height = 300;
$small_cover_width = 290;
$small_cover_height = 230;
$max_cover_weight = 12582912;
$cover_name_prefix = "290-";
$cover_folder_location = ROOT . "usercontent/blog/";

$post_title = isset($_POST['title']) ? trim($_POST['title']) : '';
$post_content = isset($_POST['content']) ? trim($_POST['content']) : '';

if (isset($_POST['post-submit'])) {
  if (!$post_title) $_SESSION['errors']['post_title'][] = "empty";
  if (!$post_content) $_SESSION['errors']['post_content'][] = "empty";

  if (empty($_SESSION['errors'])) {
    $post = R::dispense('posts');
    $post->title = $post_title;
    $post->content = $post_content;
    $post->timestamp = time();

    if (!$_FILES['cover']['error']) {
      $file_params = validateUploadedFile($_FILES['cover'], $min_cover_width, $min_cover_height, $max_cover_weight);

      if (!empty($file_params)) {
        process_uploaded_file($cover_folder_location, $file_params, $cover_name_prefix, $min_cover_width, $min_cover_height, $small_cover_width, $small_cover_height);

        $post->cover = $file_params['db_file_name'];
        $post->cover_small = $cover_name_prefix . $file_params['db_file_name'];
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
