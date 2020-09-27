<?php

$categories =  R::find('categories', 'ORDER BY id ASC');

ob_start();
include ROOT . "admin/templates/categories/index.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";



