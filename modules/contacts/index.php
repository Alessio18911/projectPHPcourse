<?php

$page_title = "Контакты";

$about = R::getRow('SELECT * FROM common WHERE field_name = ?', ['about']);
$services = R::getRow('SELECT * FROM common WHERE field_name = ?', ['services']);
$my_contacts = R::getRow('SELECT * FROM common WHERE field_name = ?', ['contacts']);

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/contacts/contacts.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
