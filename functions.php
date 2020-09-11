<?php

function validate_edit_form($name, $surname, $email) {
  if(empty($name)) $_SESSION['errors']['name'][] = "empty";

  if (empty($surname)) $_SESSION['errors']['surname'][] = "empty";

  if (empty($email)) $_SESSION['errors']['email'][] = "empty";
}

function validate_uploaded_file($file, $min_width, $min_height, $max_weight) {
  $file_name = $file['name'];
  $file_temp_path = $file['tmp_name'];
  $file_type = $file['type'];
  $file_size = $file['size'];
  $file_error = $file['error'];
  $kaboom = explode(".", $file_name);
  $file_ext = end($kaboom);
  $file_params = [];

  list($width, $height) = getimagesize($file_temp_path);
  if ($width < $min_width || $height < $min_height) $_SESSION['errors']['file'][] = "small";

  if ($file_size > $max_weight) $_SESSION['errors']['file'][] = "heavy";

  if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $file_name)) $_SESSION['errors']['file'][] = "format_invalid";

  if ($file_error == 4) $_SESSION['errors']['file'][] = "upload_failed";

  if(empty($_SESSION['errors']['file'])) {
    $db_file_name = rand(100000000000, 999999999999) . "." . $file_ext;
    $file_params['db_file_name'] = $db_file_name;
    $file_params['temp_loc'] = $file_temp_path;
  }

  return $file_params;
}

function process_uploaded_file($folder_location, $file_params, $file_name_prefix, $file_min_width, $file_min_height, $small_file_width, $small_file_height) {
  $upload_full_size = $folder_location . $file_params['db_file_name'];
  $upload_preview = $folder_location . $file_name_prefix . $file_params['db_file_name'];

  $file_full_size_params = [$file_params['temp_loc'], $upload_full_size, $file_min_width, $file_min_height];
  $file_thumb_params = [$file_params['temp_loc'], $upload_preview, $small_file_width, $small_file_height];
  $result = resize_and_crop(...$file_full_size_params);
  $result_thumb = resize_and_crop(...$file_thumb_params);

  if (!$result || !$result_thumb) $_SESSION['errors']['file'][] = "not_saved";
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
  $uri_get = NULL;
  $exploded_uri = filter_var(trim(explode("?", $url)[0], "/"), FILTER_SANITIZE_URL);

  $kaboom = explode("/", $exploded_uri);

  if (!(int)end($kaboom) && end($kaboom) != '0') {
    $uri_module = end($kaboom);
  } else {
    $uri_module = $kaboom[0];
    $uri_get = end($kaboom);
  }

  return [$uri_module, $uri_get];
}

function paginate($table_name, $items_per_page) {
  $item_count = R::count($table_name);

  $pages_count = ceil($item_count / $items_per_page);
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
?>
