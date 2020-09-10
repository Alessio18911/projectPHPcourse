<?php

require "./../../config.php";
require "./../resize-and-crop.php";

// Required: anonymous function reference number as explained above.
$funcNum = $_GET['CKEditorFuncNum'] ;
$folder_location = ROOT . "usercontent/editor-uploads/";

// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).

if (!$_FILES['upload']['error']) {
  $image_width = 920;
  $image_min_width = 10;
  $image_min_height = 10;
  $image_max_weight = 6291456;

  $file_name = $_FILES['upload']['name'];
  $file_temp_path = $_FILES['upload']['tmp_name'];
  $file_type = $_FILES['upload']['type'];
  $file_size = $_FILES['upload']['size'];
  $file_error = $_FILES['upload']['error'];
  $kaboom = explode(".", $file_name);
  $file_ext = end($kaboom);

  list($width, $height) = getimagesize($file_temp_path);
  if ($width < $image_min_width || $height < $image_min_height) $message = $admin_error_msgs["file"]["small"]["title"] . $admin_error_msgs["file"]["small"]["desc"];

  if ($file_size > $image_max_weight) $message = $admin_error_msgs["file"]["heavy"]["desc"];

  if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $file_name)) $message = $admin_error_msgs["file"]["format_invalid"]["title"] . $admin_error_msgs["file"]["format_invalid"]["desc"];

  if ($file_error == 4) $message = $admin_error_msgs["file"]["upload_failed"]["title"] . $admin_error_msgs["file"]["upload_failed"]["desc"];

  if(!isset($message)) {
    $db_file_name = rand(100000000000, 999999999999) . "." . $file_ext;
    $result = resize($file_temp_path, $image_width);

    if (!$result) {
      $message = $admin_error_msgs['file']['not_saved']['title'] . $admin_error_msgs['file']['not_saved']['desc'];
    } else {
      $url = $folder_location . $db_file_name;
      $is_file_uploaded = move_uploaded_file($file_temp_path, $url);
      $message = $is_file_uploaded ? "Файл успешно загружен" : "Что-то пошло не так, попробуйте ещё раз";
      echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    }
  }
}
