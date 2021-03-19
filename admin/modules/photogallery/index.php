<?php

$path = ROOT . "usercontent/";
$dirs = array_values(array_diff(scandir($path), array(".", "..")));
$db_tables_with_photos = ['users', 'posts'];
$files = [];

for($i = 0; $i < count($dirs); $i++) {
  $photos = array_values(array_diff(scandir($path . $dirs[$i]), array(".", "..")));

  foreach($photos as $photo) {
    if (preg_match("/^\d+\.(jpg|png)$/", $photo)) {
      $files[$dirs[$i]][] = $photo;
    }
  }
}

if (isset($_POST['photo_delete'])) {
  $checkboxes_on = [];

  foreach($_POST as $checkbox => $status) {
    if ($status == 'on') {
      $checkboxes_on[] = $checkbox;
    }
  }

  if (!empty($checkboxes_on)) {
    foreach($checkboxes_on as $file) {
      foreach($db_tables_with_photos as $table) {
        // $file_to_delete = R::getCell('SELECT ');
      }
    }


  }


}

ob_start();
include ROOT . "admin/templates/photogallery/photogallery.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
