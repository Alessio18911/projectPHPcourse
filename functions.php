<?php

function validateEditForm($name, $surname, $email) {
  if(empty($name)) $_SESSION['errors']['name'][] = "empty";

  if (empty($surname)) $_SESSION['errors']['surname'][] = "empty";

  if (empty($email)) $_SESSION['errors']['email'][] = "empty";
}

function validateUploadedFile($file, $minWidth, $minHeight, $maxWeight) {
  $fileName = $file['name'];
  $fileTempPath = $file['tmp_name'];
  $fileType = $file['type'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $kaboom = explode(".", $fileName);
  $fileExt = end($kaboom);
  $fileParams = [];

  list($width, $height) = getimagesize($fileTempPath);
  if ($width < $minWidth || $height < $minHeight) $_SESSION['errors']['file'][] = "small";

  if ($fileSize > $maxWeight) $_SESSION['errors']['file'][] = "heavy";

  if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) $_SESSION['errors']['file'][] = "formatInvalid";

  if ($fileError == 4) $_SESSION['errors']['file'][] = "uploadFailed";

  if(empty($_SESSION['errors']['file'])) {
    $dbFileName = rand(100000000000, 999999999999) . "." . $fileExt;
    $fileParams['dbFileName'] = $dbFileName;
    $fileParams['tempLoc'] = $fileTempPath;
  }

  return $fileParams;
}

function processUploadedFile($folderLocation, $fileParams, $fileNamePrefix, $fileMinWidth, $fileMinHeight, $smallFileWidth, $smallFileHeight) {
  $uploadFileBig = $folderLocation . $fileParams['dbFileName'];
  $uploadFileSmall = $folderLocation . $fileNamePrefix . $fileParams['dbFileName'];

  $resultPhotoBig = resize_and_crop($fileParams['tempLoc'], $uploadFileBig, $fileMinWidth, $fileMinHeight);
  $resultPhotoSmall = resize_and_crop($fileParams['tempLoc'], $uploadFileSmall, $smallFileWidth, $smallFileHeight);

  if (!$resultPhotoBig || !$resultPhotoSmall) $_SESSION['errors']['file'][] = "notSaved";
}

function deleteFile($filePath, $fileName, $fileNamePrefix) {
  $fileBig = $filePath . $fileName;
  $fileSmall = $filePath . $fileNamePrefix .$fileName;
  $files = array($fileBig, $fileSmall);

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
