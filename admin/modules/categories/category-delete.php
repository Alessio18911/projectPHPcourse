<?php

$category_to_delete_name = '';

ob_start();
include ROOT . "admin/templates/categories/category-delete.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
