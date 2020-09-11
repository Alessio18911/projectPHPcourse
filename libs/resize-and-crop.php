<?php

function resize_and_crop(...$args) {
  $source_path = func_get_arg(0);
  if (!file_exists($source_path)) return false;
  if (!getimagesize($source_path)) return false;

  $args_number = func_num_args();
  if ($args_number > 2) {
    $result_width = func_get_arg(2);
    $result_height = func_get_arg(3);
    $thumbnail_image_path = func_get_arg(1);
  } else {
    $max_side_length = func_get_arg(1);
  }

  list($source_width, $source_height, $source_type) = getimagesize($source_path);

  switch ($source_type) {
    case IMAGETYPE_GIF:
      $source_gdim = imagecreatefromgif($source_path);
      break;
    case IMAGETYPE_JPEG:
      $source_gdim = imagecreatefromjpeg($source_path);
      break;
    case IMAGETYPE_PNG:
      $source_gdim = imagecreatefrompng($source_path);
      break;
  }

  if ($args_number > 2) {
    $source_aspect_ratio = $source_width / $source_height;
    $desired_aspect_ratio = $result_width / $result_height;

    if ($source_aspect_ratio > $desired_aspect_ratio) {
      $temp_height = $result_height;
      $temp_width = (int) ($result_height * $source_aspect_ratio);
    } else {
      $temp_width = $result_width;
      $temp_height = (int) ($result_width / $source_aspect_ratio);
    }
  } else {
    if ($source_width > $max_side_length) {
      $temp_width = $max_side_length;
      $temp_height = $max_side_length / $source_width * $source_height;
    } else if($source_height > $max_side_length) {
      $temp_height = $max_side_length;
      $temp_width = $max_side_length / $source_height * $source_width;
    }
  }

  $temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
  imagecopyresampled(
    $temp_gdim,
    $source_gdim,
    0,
    0,
    0,
    0,
    $temp_width,
    $temp_height,
    $source_width,
    $source_height
  );

  if ($args_number > 2) {
    $x0 = ($temp_width - $result_width) / 2;
    $y0 = ($temp_height - $result_height) / 2;
    $desired_gdim = imagecreatetruecolor($result_width, $result_height);
    imagecopy(
      $desired_gdim,
      $temp_gdim,
      0,
      0,
      $x0,
      $y0,
      $result_width,
      $result_height
    );
  }

  if ($args_number > 2) {
    imagejpeg($desired_gdim, $thumbnail_image_path, 90);
    imagedestroy($desired_gdim);
  } else {
    imagejpeg($temp_gdim, $source_path, 90);
    imagedestroy($temp_gdim);
  }

  imagedestroy($source_gdim);
  return true;
}

