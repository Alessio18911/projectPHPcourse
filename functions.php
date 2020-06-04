<?php

function validateEditForm($name, $surname, $email) {
  $name = trim($name);
  $surname = trim($surname);
  $email = trim($email);

  if(empty($name)) {
    $_SESSION['errors']['name'][] = "empty";
  }

  if (empty($surname)) {
    $_SESSION['errors']['surname'][] = "empty";
  }

  if (empty($email)) {
    $_SESSION['errors']['email'][] = "empty";
  }
}

function processUploadedFile($file) {
  $fileName = $file['name'];
  $fileTempPath = $file['tmp_name'];
  $fileType = $file['type'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $kaboom = explode(".", $fileName);
  $fileExt = end($kaboom);

  list($width, $height) = getimagesize($fileTempPath);
  if ($width < 160 || $height < 160) {
    $_SESSION['errors']['file'][] = "smallPhoto";
  }

  if ($fileSize > 4194304) {
    $_SESSION['errors']['file'][] = "heavy";
  }

  if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
    $_SESSION['errors']['file'][] = "formatInvalid";
  }

  if ($fileError == 4) {
    $_SESSION['errors']['file'][] = "uploadFailed";
  }

  return [
    "ext" => $fileExt,
    "tempLoc" => $fileTempPath
  ];
}

function getFileNames($folder, $fileExt) {
  $dbFileName = rand(100000000000, 999999999999) . "." . $fileExt;
  $uploadFile = $folder . $dbFileName;

  return [
    "dbFileName" => $dbFileName,
    "uploadFile" => $uploadFile
  ];
}

function deleteFilesIfExist($files) {
  foreach($files as $file) {
    if (file_exists($file)) {
      unlink($file);
    }
  }
}

?>
