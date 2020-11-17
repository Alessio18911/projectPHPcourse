<?php

function validate_edit_form($name, $surname, $email) {
  if(empty($name)) $_SESSION['errors']['name'][] = "empty";

  if (empty($surname)) $_SESSION['errors']['surname'][] = "empty";

  if (empty($email)) $_SESSION['errors']['email'][] = "empty";
}

function validate_uploaded_file($is_attachment, $file, $acceptable_formats, $max_weight, $min_width = NULL, $min_height = NULL, $ck_editor_msgs = NULL) {
  $file_name = $file['name'];
  $file_temp_path = $file['tmp_name'];
  $file_type = $file['type'];
  $file_size = $file['size'];
  $file_error = $file['error'];
  $kaboom = explode(".", $file_name);
  $file_ext = end($kaboom);

  if (!preg_match($acceptable_formats, $file_name)) {
    isset($ck_editor_msgs) ? $message = $ck_editor_msgs["format_invalid"] : $_SESSION['errors']['file'][] = "format_invalid";
  }

  if ($file_size > $max_weight) {
    isset($ck_editor_msgs) ? $message = $ck_editor_msgs["heavy"] : $_SESSION['errors']['file'][] = "heavy";
  }

  if (!$is_attachment) {
    list($width, $height) = getimagesize($file_temp_path);
    if ($width < $min_width || $height < $min_height) {
      isset($ck_editor_msgs) ? $message = $ck_editor_msgs["small"] : $_SESSION['errors']['file'][] = "small";
    }
  }

  if ($file_error == 4) {
    isset($ck_editor_msgs) ? $message = $ck_editor_msgs["upload_failed"] : $_SESSION['errors']['file'][] = "upload_failed";
  }

  if (isset($message)) {
    return $message;
  } else if(empty($_SESSION['errors']['file'])) {
    return [
      "original_file_name" => $file_name,
      "db_file_name" => rand(100000000000, 999999999999) . "." . $file_ext,
      "temp_loc" => $file_temp_path
    ];
  }
}

function process_uploaded_file($is_attachment, $folder_location, $file_params, $file_name_prefix = NULL, $file_min_width = NULL, $file_min_height = NULL, $small_file_width = NULL, $small_file_height = NULL) {
  $upload_full_size = $folder_location . $file_params['db_file_name'];

  if (!$is_attachment) {
    $upload_preview = $folder_location . $file_name_prefix . $file_params['db_file_name'];

    $file_full_size_params = [
      $file_params['temp_loc'],
      $upload_full_size,
      $file_min_width,
      $file_min_height
    ];

    $file_thumb_params = [
      $file_params['temp_loc'],
      $upload_preview,
      $small_file_width,
      $small_file_height
    ];

    $result = resize_and_crop(...$file_full_size_params);
    $result_thumb = resize_and_crop(...$file_thumb_params);

    if (!$result && !$result_thumb) $_SESSION['errors']['file'][] = "not_saved";
  } else {
    $result = move_uploaded_file($file_params['temp_loc'], $upload_full_size);
    if (!$result) $_SESSION['errors']['file'][] = "not_saved";
  }
}

function delete_file($file_path, $file_name, $file_name_prefix) {
  $full_size = $file_path . $file_name;
  $preview = $file_path . $file_name_prefix . $file_name;
  $files = array($full_size, $preview);

  foreach($files as $file) {
    if (file_exists($file)) {
      unlink($file);
    }
  }
}

function get_url_params($url) {
  $exploded_uri = filter_var(trim(explode("?", $url)[0], "/"), FILTER_SANITIZE_URL);
  $kaboom = explode("/", $exploded_uri);

  if (!(int)end($kaboom) && end($kaboom) != '0') {
    $uri_module = end($kaboom);
    $uri_params = [end($kaboom), NULL];
  } else {
    $uri_params = [$kaboom[0], end($kaboom)];

    if (count($kaboom) > 2) {
      $uri_params[] = $kaboom[1];
    }
  }

  return $uri_params;
}

function paginate($posts_amount, $items_per_page) {
  $pages_count = ceil($posts_amount / $items_per_page);
  if (empty($_GET['page'])) {
    $page_number = 1;
  } else if($_GET['page'] <= $pages_count) {
    $page_number = $_GET['page'];
  } else {
    $page_number = $pages_count;
  }

  $offset_coef = $page_number != 1 ? $page_number - 1 : 0;
  $start_offset = $items_per_page * $offset_coef;

  return [
    'start_offset' => $start_offset,
    'pages_count' => $pages_count,
    'page_number' => $page_number
  ];
}

function increment_id($current_id, $table_name) {
  $next_id = $current_id + 1;
  $next_item = R::findOne($table_name, 'id=?', [$next_id]);

  if (!isset($next_item)) {
    return increment_id($next_id, $table_name);
  } else {
    return $next_id;
  }
}

function decrement_id($current_id, $table_name) {
  $prev_id = $current_id - 1;
  $prev_item = R::findOne($table_name, 'id=?', [$prev_id]);

  if (!isset($prev_item)) {
    return decrement_id($prev_id, $table_name);
  } else {
    return $prev_id;
  }
}

function slide_forward($table_name, $current_id) {
  $last_id = (int)R::getCell("SELECT MAX(id) FROM $table_name");
  $next_id = (int)$current_id < $last_id ? increment_id($current_id, $table_name) : $last_id;
  return [$last_id, $next_id];
}

function slide_back($table_name, $current_id) {
  $first_id = (int)R::getCell("SELECT MIN(id) FROM $table_name");
  $prev_id = (int)$current_id > $first_id ? decrement_id($current_id, $table_name) : $first_id;
  return [$first_id, $prev_id];
}

function getRandomPostIds($min_id, $max_id, $random_ids, $category_id, $post_id) {
  $random_id = R::getCell('SELECT id FROM posts WHERE id = ? AND category_id = ?', [strval(rand($min_id, $max_id)), $category_id]);

  return empty($random_id) || in_array($random_id, $random_ids) || $random_id == $post_id ? getRandomPostIds($min_id, $max_id, $random_ids, $category_id, $post_id) : $random_id;
}

function get_new_messages_count() {
  return R::count('messages', 'WHERE is_new = ?', [1]);
}
?>
