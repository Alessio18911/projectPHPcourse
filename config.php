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

$errorMsgs = [
  "nameEmpty" => [
    "title" => 'Введите имя'
  ],

  "surnameEmpty" => [
    "title" => 'Введите фамилия'
  ],

  "emailEmpty" => [
    "title" => 'Введите email'
  ],

  "emailEmptyRegistration" => [
    "title" => "Введите email",
    "desc" => "Email обязателен для регистрации на сайте"
  ],

  "emailEmptyLogin" => [
    "title" => "Введите email",
    "desc" => "Email обязателен для входа на сайт"
  ],

  "emailEmptyRestore" => [
    "title" => "Введите email",
    "desc" => "Email обязателен для восстановления пароля"
  ],

  "emailInvalid" => [
    "title" => "Введите корректный email"
  ],

  "emailIncorrect" => [
    "title" => "Неверный email"
  ],

  "emailNotExist" => [
    "title" => "Несуществующий email"
  ],

  "emailRegistered" => [
    "title" => "Данный email уже зарегистрирован",
    "desc" => "Используйте другой email или воспользуйтесь <a href=" . HOST . 'lost-password' . " ?>восстановлением пароля</a>"
  ],

  "passEmpty" => [
    "title" => "Введите пароль"
  ],

  "passIncorrect" => [
    "title" => "Неверный пароль"
  ],

  "passShort" => [
    "title" => "Введите пароль длиной не менее 4 символов!"
  ],

  "registrationFailed" => [
    "title" => "Что-то пошло не так",
    "desc" => "Повторите регистрацию"
  ],

  "setNewPasswordFailed" => [
    "title" => "Что-то пошло не так",
    "desc" => "Повторите процедуру сброса пароля ещё раз"
  ],

  "secretCodeIncorrect" => [
    "title" => "Секретный код неверен"
  ]
];

$successMsgs = [
  "emailSent" => [
    "title" => "Проверьте почту",
    "desc" => "Вам был отправлен email со ссылкой для сброса пароля"
  ],

  "newPasswordSet" => [
    "title" => "Пароль успешно обновлён"
  ]
]
?>
