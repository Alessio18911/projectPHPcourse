<?php

$post_to_delete = R::load('posts', $_GET['id']);
$post_id = $post_to_delete->id;

if (isset($_POST['post-delete'])) {
  R::trash($post_to_delete);
  $_SESSION['success']['post-deleted'][] = "success";
  header("Location: " .HOST. "admin/blog");
  exit();

} else {
  $post_title = $post_to_delete->title;
}

ob_start();

include ROOT . "admin/templates/blog/post-delete.tpl";
$content = ob_get_contents();
ob_end_clean();
include ROOT . "admin/templates/template.tpl";

?>

<!-- 1. Вынести параметры загружаемых файлов в конфиг
    2. Оттестировать обновление и удаление постов
    3. Кнопка удаления обложки
    4. Попробовать сделать категории постов
 -->



