<?php

require "./../../config.php";
require "./../resize-and-crop.php";

// Required: anonymous function reference number as explained above.
$funcNum = $_GET['CKEditorFuncNum'];

// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).

if (!$_FILES['upload']['error']) {
  $image_width = 920;
  $image_min_width = 10;
  $image_min_height = 10;
  $image_max_weight = 6291456;

  $image_params = validate_uploaded_file($_FILES['upload'], $image_min_width, $image_min_height, $image_max_weight);

  if(!isset($message)) {
    $db_file_name = rand(100000000000, 999999999999) . "." . $file_ext;
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
  }
}

// Закончил рефакторинг функцией validate_uploaded_file в functions.php
