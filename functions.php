<?php

function validateEditForm($name, $surname, $email) {
  if(empty(trim($name))) $_SESSION['errors']['name'][] = "empty";

  if (empty(trim($surname))) $_SESSION['errors']['surname'][] = "empty";

  if (empty(trim($email))) $_SESSION['errors']['email'][] = "empty";
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

function deleteFileIfExist($filePath, $fileName) {
  $file160 = $filePath . $fileName;
  $file48 = $filePath . '48-' .$fileName;
  $files = array($file160, $file48);

  foreach($files as $file) {
    if (file_exists($file)) {
      unlink($file);
    }
  }
}

?>
