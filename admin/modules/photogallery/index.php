<?php

$path = ROOT . "usercontent/";
$dirs = array_values(array_diff(scandir($path), array(".", "..")));
$files = [];

for($i = 0; $i < count($dirs); $i++) {
  $photos = array_values(array_diff(scandir($path . $dirs[$i]), array(".", "..")));

  foreach($photos as $photo) {
    if (preg_match("/^\d+(.jpg|.png)$/", $photo)) {
      $files[$dirs[$i]][] = $photo;
    }
  }
}

ob_start();
include ROOT . "admin/templates/photogallery/photogallery.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
