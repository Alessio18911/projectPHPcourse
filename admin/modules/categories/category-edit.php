<?php

$category_to_edit = R::findOne('categories', 'id=?', [$_GET['id']]);
$category_to_edit_name = $category_to_edit->name;

if (isset($_POST['edit_category'])) {
  $category_to_edit_name = trim($_POST['category_to_edit_name']);

  if (!$category_to_edit_name) {
    $_SESSION['errors']['category_name'][] = "empty";
  } else {
    $category_to_edit->name = $category_to_edit_name;
    R::store($category_to_edit);

    $_SESSION['success']['category_updated'][] = "success";
    header("Location: " .HOST. "admin/categories");
    exit();
  }
}

ob_start();
include ROOT . "admin/templates/categories/category-edit.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
