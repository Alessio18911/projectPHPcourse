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

    "emptyWithExplanation" => [
      "title" => "Введите email",
      "desc" => "Email обязателен для регистрации, входа на сайт или восстановления пароля"
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
      "title" => "Введите пароль длиной не менее 4 символов!"
    ],

    "incorrect" => [
      "title" => "Неверный пароль"
    ]
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
      "title" => "Секретный код неверен",
      "desc" => "Перейдите ещё раз по ссылке из полученного email или повторите процедуру восстановления пароля ещё раз"
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
];

$adminErrorMsgs = [
  "postTitle" => [
    "empty" => [
      "title" => "Заголовок поста должен быть заполнен"
    ]
  ],

  "postContent" => [
    "empty" => [
      "title" => "Текст поста должен быть заполнен"
    ]
  ],

  "file" => [
    "small" => [
      "title" => "Загрузите другую фотографию",
      "desc" => "Размеры обложки должны быть не меньше 600x300px"
    ],

    "heavy" => [
      "title" => "Превышен объём файла",
      "desc" => "Максимальный объём файла изображения 12 Мб"
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
    ]
  ]
];

$adminSuccessMsgs = [
  "newPost" => [
    "success" => [
      "title" => "Пост успешно добавлен"
    ]
  ]
]
?>
