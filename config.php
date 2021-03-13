<?php

$protocol = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on" ? "https://" : "http://";

define("HOST", $protocol . $_SERVER["HTTP_HOST"] . "/");
define("ROOT", __DIR__ . "/");
define("DB_HOST", "localhost");
define("DB_NAME", "projectPHPcourse");
define("DB_USER", "root");
define("DB_PASS", "root");

define("SITE_NAME", "Сайт Digital Nomad");
define("SITE_EMAIL", "info@project.com");

$translation_terms = [
  'January' => 'Января',
  'February' => 'Февраля',
  'March' => 'Марта',
  'April' => 'Апреля',
  'May' => 'Мая',
  'June' => 'Июня',
  'July' => 'Июля',
  'August' => 'Августа',
  'September' => 'Сентября',
  'October' => 'Октября',
  'November' => 'Ноября',
  'December' => 'Декабря'
];
?>
