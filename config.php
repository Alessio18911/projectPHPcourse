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

    "empty_with_explanation" => [
      "title" => "Введите email",
      "desc" => "Email обязателен для регистрации, входа на сайт или восстановления пароля"
    ],

    "invalid" => [
      "title" => "Введите корректный email"
    ],

    "incorrect" => [
      "title" => "Неверный email"
    ],

    "not_exist" => [
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

  "setting_new_password" => [
    "failed" => [
      "title" => "Что-то пошло не так",
      "desc" => "Повторите процедуру сброса пароля ещё раз"
    ]
  ],

  "secret_code" => [
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

    "format_invalid" => [
      "title" => "Неверный формат файла",
      "desc" => "Допускается загрузка только .jpg, jpeg, .gif, .png"
    ],

    "upload_failed" => [
      "title" => "Что-то пошло не так...",
      "desc" => "Загрузите фото ещё раз"
    ],

    "not_saved" => [
      "title" => "Ошибка сохранения файла",
      "desc" => "Повторите загрузку фото"
    ]
  ]
];

$success_msgs = [
  "email" => [
    "sent" => [
      "title" => "Проверьте почту",
      "desc" => "Вам был отправлен email со ссылкой для сброса пароля"
    ]
  ],

  "new_password" => [
    "set" => [
      "title" => "Пароль успешно обновлён"
    ]
  ]
];

$admin_error_msgs = [
  "post_title" => [
    "empty" => [
      "title" => "Заголовок поста должен быть заполнен"
    ]
  ],

  "post_content" => [
    "empty" => [
      "title" => "Текст поста должен быть заполнен"
    ]
  ],

  "category_name" => [
    "empty" => [
      "title" => "Название категории должно быть заполнено"
    ]
  ],

  "posts_by_category" => [
    "exist" => [
      "title" => "В блоге есть посты с данной категорией. Если Вы действительно хотите удалить выбранную категорию, удалите сначала все посты с ней"
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

    "format_invalid" => [
      "title" => "Неверный формат файла",
      "desc" => "Допускается загрузка только .jpg, jpeg, .gif, .png"
    ],

    "upload_failed" => [
      "title" => "Что-то пошло не так...",
      "desc" => "Загрузите фото ещё раз"
    ],

    "not_saved" => [
      "title" => "Ошибка сохранения файла",
      "desc" => "Повторите загрузку фото"
    ]
  ]
];

$admin_success_msgs = [
  "new_post" => [
    "success" => [
      "title" => "Пост успешно добавлен"
    ]
  ],

  "post_updated" => [
    "success" => [
      "title" => "Пост успешно обновлён"
    ]
  ],

  "post_deleted" => [
    "success" => [
      "title" => "Удаление поста завершено"
    ]
  ],

  "category_new" => [
    "success" => [
      "title" => "Категория успешно добавлена"
    ]
  ],

  "category_updated" => [
    "success" => [
      "title" => "Категория успешно обновлёна"
    ]
  ],

  "category_deleted" => [
    "success" => [
      "title" => "Удаление категории завершено"
    ]
  ]
];

$ck_editor_msgs = [
  "small" => "Загрузите другую фотографию: размеры обложки должны быть не меньше 600x300px",
  "heavy" => "Максимальный объём файла изображения 6 Мб",
  "format_invalid" => "Неверный формат файла: допускается загрузка только .jpg, jpeg, .gif, .png",
  "upload_failed" => "Что-то пошло не так... Загрузите фото ещё раз",
  "not_saved" => "Ошибка сохранения файла, повторите загрузку фото",
  "common_mistake" => "Что-то пошло не так, попробуйте ещё раз",
  "success" => "Файл успешно загружен"
];

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
