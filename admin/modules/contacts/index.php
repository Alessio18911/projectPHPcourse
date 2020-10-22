<?php

ob_start();
include ROOT . "admin/templates/contacts/contacts.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";
