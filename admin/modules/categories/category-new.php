<?php

$category_name = '';

if (isset($_POST['create_category'])) {
  $category_name = trim($_POST['category_name']);

  if (!$category_name) {
    $_SESSION['errors']['category_name'][] = "empty";
  } else {
    $category = R::dispense('categories');
    $category->name = $category_name;
    R::store($category);

    $_SESSION['success']['category_new'][] = "success";
    header("Location: " .HOST. "admin/categories");
    exit();
  }
}

ob_start();
include ROOT . "admin/templates/categories/category-new.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
