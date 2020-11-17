<?php

require_once("./../../config.php");
require_once("./../../functions.php");
require_once("./../resize-and-crop.php");

// Required: anonymous function reference number as explained above.
$funcNum = $_GET['CKEditorFuncNum'];

// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).

if (!$_FILES['upload']['error']) {
  $acceptable_formats = "/\.(gif|jpg|jpeg|png)$/i";
  $image_max_weight = 6291456;
  $image_width = 920;
  $image_min_width = 10;
  $image_min_height = 10;
  $is_attachment = false;

  $image_params = validate_uploaded_file($is_attachment, $_FILES['upload'], $acceptable_formats, $image_max_weight, $image_min_width, $image_min_height, $ck_editor_msgs);

  if(is_array($image_params)) {
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

      } else {
        $message = "Что-то пошло не так, попробуйте ещё раз";
      }
    }
  } else {
    $message = $image_params;
    $url = '';
  }

  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
}
