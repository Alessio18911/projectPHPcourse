<?php

$category_id = $_GET['id'];
$category_to_delete = R::findOne('categories', 'id=?', [$category_id]);
$category_to_delete_name = $category_to_delete->category_name;

if (isset($_POST['delete-category'])) {
  R::trash($category_to_delete);

  $_SESSION['success']['category_deleted'][] = "success";
  header("Location: " .HOST. "admin/categories");
  exit();
}

ob_start();
include ROOT . "admin/templates/categories/category-delete.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
