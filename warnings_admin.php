<?php

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
  ],

  "contacts" => [
    "title" => "Что-то пошло не так",
    "desc" => "Повторите попытку обновления контактов"
  ],

  "message_not_deleted" => [
    "failed" => [
      "title" => "Что-то пошло не так, повторите попытку удаления"
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
  ],

  "contacts" => [
    "success" => [
      "title" => "Контакты успешно обновлены"
    ]
  ],

  "message_deleted" => [
    "success" => [
      "title" => "Сообщение успешно удалено"
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

