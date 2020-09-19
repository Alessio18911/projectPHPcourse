<?php

$min_cover_width = 600;
$min_cover_height = 300;
$small_cover_width = 290;
$small_cover_height = 230;
$max_cover_weight = 12582912;
$cover_name_prefix = "290-";
$cover_folder_location = ROOT . "usercontent/blog/";

$post_to_edit = R::load('posts', $_GET['id']);
$post_to_edit_cover_small = $post_to_edit->cover_small;

if (isset($_POST['post-edit'])) {
  $post_title = isset($_POST['title']) ? $_POST['title'] : '';
  $post_content = isset($_POST['content']) ? $_POST['content'] : '';

  if (!$post_title) $_SESSION['errors']['post_title'][] = "empty";
  if (!$post_content) $_SESSION['errors']['post_content'][] = "empty";

  if (empty($_SESSION['errors'])) {
    $post_to_edit->title = $post_title;
    $post_to_edit->content = $post_content;
    $post_to_edit->timestamp = time();

    if (!$_FILES['cover']['error']) {
      $file_params = validate_uploaded_file($_FILES['cover'], $min_cover_width, $min_cover_height, $max_cover_weight);

      if (!empty($file_params)) {
        process_uploaded_file($cover_folder_location, $file_params, $cover_name_prefix, $min_cover_width, $min_cover_height, $small_cover_width, $small_cover_height);

        $post_to_edit->cover = $file_params['db_file_name'];
        $post_to_edit->cover_small = $cover_name_prefix . $file_params['db_file_name'];
      }
    }

    if (empty($_SESSION['errors']['file'])) {
      R::store($post_to_edit);
      $_SESSION['success']['post-updated'][] = "success";
      header("Location: " .HOST. "admin/blog");
      exit();
    }
  }
} else {
  $post_title = $post_to_edit->title;
  $post_content = $post_to_edit->content;
}

ob_start();

include ROOT . "admin/templates/blog/post-edit.tpl";

$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>
