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

$cover_params = [
  "min_width" => 600,
  "min_height" => 300,
  "thumb_width" => 290,
  "thumb_height" => 230,
  "max_weight" => 12582912,
  "name_prefix" => "290-",
  "folder_location" => ROOT . "usercontent/blog/"
]
?>
