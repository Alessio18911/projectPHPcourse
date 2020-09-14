<?php

require_once("./../../config.php");
require_once("./../../functions.php");
require_once("./../resize-and-crop.php");

// Required: anonymous function reference number as explained above.
$funcNum = $_GET['CKEditorFuncNum'];

// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).

if (!$_FILES['upload']['error']) {
  $image_width = 920;
  $image_min_width = 10;
  $image_min_height = 10;
  $image_max_weight = 6291456;

  $image_params = validate_uploaded_file($_FILES['upload'], $image_min_width, $image_min_height, $image_max_weight, $ck_editor_msgs);

  if(!isset($image_params['ck_editor_message'])) {
    $db_file_name = $image_params['db_file_name'];
    $file_temp_path = $image_params['temp_loc'];
    $image_params_to_resize = [$file_temp_path, $image_width];
    $result = resize_and_crop(...$image_params_to_resize);

    if (!$result) {
      $message = $admin_error_msgs['file']['not_saved']['title'] . $admin_error_msgs['file']['not_saved']['desc'];
    } else {
      $upload_destination = ROOT . "usercontent/editor-uploads/" . $db_file_name;

      if (move_uploaded_file($file_temp_path, $upload_destination)) {
        $url = HOST . "usercontent/editor-uploads/" . $db_file_name;
        $message = "Файл успешно загружен";
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
      } else {
        $message = "Что-то пошло не так, попробуйте ещё раз";
      }
    }
  } else {
    $message = $image_params['ck_editor_message'];
    $url = '';
    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
  }
}
