<?php 

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://';

define('HOST', $protocol . $_SERVER['HTTP_HOST'] . '/');
define('ROOT', __DIR__ . '/');
define('DB_HOST', 'localhost');
define('DB_NAME', 'projectPHPcourse');
define('DB_USER', 'root');
define('DB_PASS', 'root');


?>