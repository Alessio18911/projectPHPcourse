<?php

function validateEditForm($name, $surname, $email) {
  if(empty($name)) $_SESSION['errors']['name'][] = "empty";

  if (empty($surname)) $_SESSION['errors']['surname'][] = "empty";

  if (empty($email)) $_SESSION['errors']['email'][] = "empty";
}

function processUploadedFile($file) {
  $fileName = $file['name'];
  $fileTempPath = $file['tmp_name'];
  $fileType = $file['type'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $kaboom = explode(".", $fileName);
  $fileExt = end($kaboom);
  $fileParams = [];

  list($width, $height) = getimagesize($fileTempPath);
  if ($width < 160 || $height < 160) $_SESSION['errors']['file'][] = "small";

  if ($fileSize > 4194304) $_SESSION['errors']['file'][] = "heavy";

  if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) $_SESSION['errors']['file'][] = "formatInvalid";

  if ($fileError == 4) $_SESSION['errors']['file'][] = "uploadFailed";

  if(empty($_SESSION['errors']['file'])) {
    $dbFileName = rand(100000000000, 999999999999) . "." . $fileExt;
    $fileParams['dbFileName'] = $dbFileName;
    $fileParams['tempLoc'] = $fileTempPath;
  }

  return $fileParams;
}

function deleteFile($filePath, $fileName) {
  $file160 = $filePath . $fileName;
  $file48 = $filePath . '48-' .$fileName;
  $files = array($file160, $file48);

  foreach($files as $file) {
    if (file_exists($file)) {
      unlink($file);
    }
  }
}

function getUrlParams($url) {
  $uriGet = NULL;
  $explodedUri = filter_var(trim(explode("?", $url)[0], "/"), FILTER_SANITIZE_URL);

  $kaboom = explode("/", $explodedUri);

  if (!(int)end($kaboom) && end($kaboom) != '0') {
      $uriModule = end($kaboom);
  } else {
      $uriModule = $kaboom[0];
      $uriGet = end($kaboom);
  }

  return [$uriModule, $uriGet];
}
?>
