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
  "name" => [
    "empty" => [
      "title" => 'Введите имя'
    ]
  ],

  "surname" => [
    "empty" => [
      "title" => 'Введите фамилию'
    ]
  ],

  "email" => [
    "empty" => [
      "title" => 'Введите email'
    ],

    "emptyRegistration" => [
      "title" => "Введите email",
      "desc" => "Email обязателен для регистрации на сайте"
    ],

    "emptyLogin" => [
      "title" => "Введите email",
      "desc" => "Email обязателен для входа на сайт"
    ],

    "emptyRestore" => [
      "title" => "Введите email",
      "desc" => "Email обязателен для восстановления пароля"
    ],

    "invalid" => [
      "title" => "Введите корректный email"
    ],

    "incorrect" => [
      "title" => "Неверный email"
    ],

    "notExist" => [
      "title" => "Несуществующий email"
    ],

    "registered" => [
      "title" => "Данный email уже зарегистрирован",
      "desc" => "Используйте другой email или воспользуйтесь <a href=" . HOST . 'lost-password' . " ?>восстановлением пароля</a>"
    ]
  ],

  "password" => [
    "empty" => [
      "title" => "Введите пароль"
    ],

    "incorrect" => [
      "title" => "Неверный пароль"
    ],

    "short" => [
      "title" => "Введите пароль длиной не менее 4 символов!"
    ],
  ],

  "registration" => [
    "failed" => [
      "title" => "Что-то пошло не так",
      "desc" => "Повторите регистрацию"
    ],
  ],

  "settingNewPassword" => [
    "failed" => [
      "title" => "Что-то пошло не так",
      "desc" => "Повторите процедуру сброса пароля ещё раз"
    ]
  ],

  "secretCode" => [
    "incorrect" => [
      "title" => "Секретный код неверен"
    ]
  ],

  "file" => [
    "small" => [
      "title" => "Загрузите другую фотографию",
      "desc" => "Размеры для аватара должны быть не меньше 160x160px"
    ],

    "heavy" => [
      "title" => "Превышен объём файла",
      "desc" => "Максимальный объём файла изображения 4 Мб"
    ],

    "formatInvalid" => [
      "title" => "Неверный формат файла",
      "desc" => "Допускается загрузка только .jpg, jpeg, .gif, .png"
    ],

    "uploadFailed" => [
      "title" => "Что-то пошло не так...",
      "desc" => "Загрузите фото ещё раз"
    ],

    "notSaved" => [
      "title" => "Ошибка сохранения файла",
      "desc" => "Повторите загрузку фото"
    ],

    "uploadFailed" => [
      "title" => "Что-то пошло не так...",
      "desc" => "Загрузите фото ещё раз"
    ]
  ]
];

$successMsgs = [
  "email" => [
    "sent" => [
      "title" => "Проверьте почту",
      "desc" => "Вам был отправлен email со ссылкой для сброса пароля"
    ]
  ],

  "newPassword" => [
    "set" => [
      "title" => "Пароль успешно обновлён"
    ]
  ]
]
?>
