-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 14 2021 г., 12:57
-- Версия сервера: 10.3.22-MariaDB-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `projectphpcourse`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Америка'),
(2, 'Европа'),
(3, 'Азия'),
(4, 'Африка'),
(5, 'Австралия'),
(6, 'Антарктида');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int(11) UNSIGNED DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `comment`, `timestamp`, `user_id`, `post_id`) VALUES
(1, 'Хоть родилась и прожила значительную часть жизни в Бразилии, очень люблю Францию. Частенько была в ней', 1601668774, 1, 21),
(2, 'И мне очень нравится! Но мне так и не удалось съездить туда. А так хотелось бы увидеть своими глазами Елисейские поля, Триумфальную арку, Эйфелеву башню...', 1601670712, 4, 21),
(3, 'И в Чили была. Интересно, да, но всё же моё сердце принадлежало Бразилии.', 1601670812, 1, 22),
(4, 'ухтыж!!!', 1601804820, 1, 21),
(5, 'вапще.....', 1601804848, 1, 17),
(6, 'сингапур -- для дохлых кур!', 1601804866, 1, 19),
(7, 'всегда была уверена, что слово \"е(г)ипет\" пишется через \"бэ\". а оно воно как...', 1601804906, 1, 11),
(8, 'Канада... а оно вам нада??? ))))', 1601804927, 1, 2),
(9, 'вот! вот, куда хочу!', 1601804944, 1, 9),
(10, 'Слава героям!!!!', 1601805029, 2, 20),
(11, 'индийская картоха со специями -- страшно вкусная!', 1601805059, 2, 13),
(12, 'соглашусь с предыдущим комментатором.', 1601805077, 2, 11),
(13, 'могу ли я... хочу ли я... г.вно ли я.. магнолия.. а!!! точно!!! МОНГОЛИЯ!', 1601805157, 2, 18),
(14, 'а моё сердце навеки принажделит Зембину. хоть это и не видно с первого взгляда.', 1601805211, 2, 22),
(15, 'вапще, ну. только не ясно, куда они засунули всех крокодилов.', 1601805323, 3, 17),
(16, 'испанские оливки лучшие в мире. жирные, красивые.', 1601805350, 3, 15),
(17, 'о, ёлки палки. как там жить?', 1601805378, 3, 7),
(18, 'аж как захожу, сразу розой пахнет', 1601805427, 5, 8),
(19, 'а это точно Зимбабве?', 1601805459, 5, 12),
(20, 'да всё видно ёпта.', 1601805482, 5, 22),
(21, 'Героям сала! :-)', 1601841071, 1, 20),
(22, 'Куры дохнут с диктатуры!', 1601841129, 1, 19),
(23, 'Конго! Мигрируй на Mongo )', 1601841181, 1, 17),
(24, 'А в Чили омоновцев мочили.', 1601841242, 1, 22),
(25, 'Зембин - Гремлин - Кремлин.', 1601841287, 1, 22),
(26, 'А где гасконец ?', 1601841331, 1, 21),
(27, 'Как то раз один болтун, врун колдун и хохотун....', 1601841417, 3, 22),
(28, 'И ругался день-денской бывший дядька их морской, хоть имел участок свой под Москвой.', 1601841460, 3, 21),
(29, 'Якщо можеш - завитай до мене ти, якщо можеш - спий моей воды. Якщо вириш - розкажи мени, про що ти мрииш, коли живеш на самоти.', 1601841541, 3, 20),
(30, 'А в лукаморье перегар - на гектар. И вот хватил его удар и чтоб избегнуть Божих кар, кот диктует про татар мемуар.', 1601841627, 3, 19),
(31, 'Констанцияяяяяяяяяяя! Констанцияяяяяяяяяяя! Фрустрацияяяяяя! Деменцияяяяяя!', 1601841680, 3, 18),
(32, 'Один конголезец устроился на работу в нефтяную компанию. Ему выдали рабочую одежду: комбез, сапоги и каску. Он взял каску. Думает: \"Что такое?\" Достал карандаш и стал им по каске стучать. \"Ух ты? какой классный там-там!\" - думает.', 1601841879, 3, 17),
(33, 'Создал же бог такую красоту!', 1601849031, 1, 14),
(34, 'Были времена...', 1601849173, 1, 10),
(35, 'Австралия', 1601849413, 1, 5),
(36, 'М-дааа', 1601849524, 5, 17),
(37, 'Гаити, Гаити, не бывали мы там!', 1601849572, 5, 3),
(38, 'Томб дё ля нейжё.', 1601849609, 5, 21),
(39, 'Холодноватенько, батенька.', 1601849656, 5, 7),
(40, 'Да вы что?!', 1602190271, 1, 19),
(41, 'Ох, Элла, ты потрясающе поёшь!', 1602192167, 6, 21),
(42, 'Согласен: Элла шикарная женщина!', 1602192441, 4, 21),
(43, 'Последнее время по-иному воспринимаю эту страну...', 1602530415, 4, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `common`
--

CREATE TABLE `common` (
  `id` int(11) NOT NULL,
  `section_title` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `section_content` text CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `common`
--

INSERT INTO `common` (`id`, `section_title`, `section_content`) VALUES
(1, 'about_title', 'Обо мне'),
(2, 'about_content', '<p>Занимаюсь разработкой современных сайтов и приложений. Мне нравится делать интересные и современные проекты. Этот сайт я сделал в рамках&nbsp;обучения в школе онлайн обучения WebCademy. Чуть позже я обновлю в нём свой контент. А пока посмотрите, как тут всё классно!</p>'),
(3, 'services_title', 'Направления, которыми я занимаюсь'),
(4, 'services_content', '<ul>\r\n	<li>Верстка сайтов</li>\r\n	<li>Frontend</li>\r\n	<li>Посадка на CMS WordPress</li>\r\n	<li>Создание админ-панелей вручную для небольших сайтов</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `section_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `section_title`, `section_content`) VALUES
(1, 'contacts_title', 'Контакты'),
(2, 'contacts_content', '<p><strong>Email</strong>:&nbsp;<a href=\"mailto:hi@digitalnomad.pro\">hi@digitalnomad.pro</a></p>\r\n\r\n<p><strong>Мобильный</strong>:&nbsp;<a href=\"tel:+79055557788\">+7 (905) 555-77-88</a></p>\r\n\r\n<p><strong>Адрес</strong>: Москва, Преcненская набережная, д. 6, стр. 2</p>'),
(3, 'map_title', 'Интерактивная карта'),
(4, 'map_script', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0a445eecd07b59fdc916372a1f5c4f4b5cbf83e53eb25be53ae332f394390925&width=100%25&height=708&id=map&lang=ru_RU&scroll=true\"></script>');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  `is_new` int(11) UNSIGNED DEFAULT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_original_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `time`, `is_new`, `file_name`, `file_original_name`) VALUES
(1, 'Юрий', 'jorik@england.en', 'Привет! Бедный Йорик...', 1605730316, 0, NULL, NULL),
(2, 'Чёрная королева', 'regina@zazerk.rg', 'Слыхала я ТАКУЮ чепуху, по сравнению с которой ЭТО разумно, как толковый словарь!', 1605730375, 1, NULL, NULL),
(3, 'Йагупоп', 'krivie@zerk.gub', 'Хи-хи, да Вы, голубчик, ДУРАК С ПОЛОВИНОЙ!', 1605730413, 1, NULL, NULL),
(4, 'Шеф', 'chief@multik.com', 'Встречаемся в н-цать часов в аэропорту', 1605730440, 1, NULL, NULL),
(5, 'Колобок', 'kolobok@multik.com', 'Шеф! А я Вас вижу!', 1605892162, 0, NULL, NULL),
(6, 'Лепрекон', 'gnom@irish.ie', 'Моё золото!! Не отдам никому!!!', 1605986041, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `timestamp` int(11) UNSIGNED DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `cover` varchar(191) DEFAULT NULL,
  `cover_small` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `timestamp`, `category_id`, `cover`, `cover_small`) VALUES
(2, 'Канада', '<p>Пост о Канаде</p>', 1601501917, 1, '984966854770.jpg', '290-984966854770.jpg'),
(3, 'Гаити', '<p>Пост о Гаити</p>', 1601501936, 1, '621640974874.jpg', '290-621640974874.jpg'),
(5, 'Австралия', '<p>Пост об Австралии и фильме &quot;Челюсти&quot;</p>', 1613932172, 5, '309620624209.png', '290-309620624209.png'),
(7, 'Антарктида', '<p>Пост об Антарктиде</p>', 1601502018, 6, '238438018867.jpg', '290-238438018867.jpg'),
(8, 'Болгария', '<p>Пост о Болгарии</p>', 1601502044, 2, '817703705578.jpg', '290-817703705578.jpg'),
(9, 'Гренландия', '<p>Пост о Гренландии</p>', 1601502069, 1, '738792308652.jpg', '290-738792308652.jpg'),
(10, 'Греция', '<p>Пост о Греции</p>', 1601502168, 2, '804373035668.jpg', '290-804373035668.jpg'),
(11, 'Египет', '<p>Пост о Египте</p>', 1601502192, 4, '554101580763.jpg', '290-554101580763.jpg'),
(12, 'Зимбабве', '<p>Пост о Зимбабве</p>', 1601502214, 4, '311842829612.jpg', '290-311842829612.jpg'),
(13, 'Индия', '<p>Пост об Индии</p>', 1601502231, 3, '553751176934.jpg', '290-553751176934.jpg'),
(14, 'Исландия', '<p>Пост об Исландии</p>', 1601502249, 2, '846729631551.jpg', '290-846729631551.jpg'),
(15, 'Испания', '<p>Пост об Испании</p>', 1601502273, 2, '973251857076.jpg', '290-973251857076.jpg'),
(16, 'Китай', '<p>Пост о Китае</p>', 1601502289, 3, '758267612063.jpg', '290-758267612063.jpg'),
(17, 'Конго', '<p>Пост о Конго</p>', 1601502306, 4, '725205505614.jpg', '290-725205505614.jpg'),
(18, 'Монголия', '<p>Пост о Монголии</p>', 1601502322, 3, '223385715329.jpg', '290-223385715329.jpg'),
(19, 'Сингапур', '<p>Пост о Сингапуре</p>', 1601502339, 3, '825303515614.jpg', '290-825303515614.jpg'),
(20, 'Украина', '<p>Пост об Украине</p>', 1601502357, 2, '363071970580.jpg', '290-363071970580.jpg'),
(21, 'Франция', '<p>Пост о Франции</p>', 1601502373, 2, '744613164445.jpg', '290-744613164445.jpg'),
(22, 'Чили', '<p>Пост о Чили</p>', 1615714755, 1, '157518607901.jpg', '290-157518607901.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `section_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `section_title`, `section_text`) VALUES
(1, 'site_title', 'Digital Nomad'),
(2, 'site_slogan', 'Сайт IT-специалиста'),
(3, 'status_checkbox', 'on'),
(4, 'status', 'Свободен для новых проектов'),
(5, 'status_detailed', 'Рассматриваю предложения по вёрстке и frontend-разработке'),
(6, 'status_page_link', 'status-page.php'),
(7, 'copyrights_author', '© Юрий Ключевский'),
(8, 'copyrights_year', 'Создано в Webcademy.ru в 2020'),
(9, 'social_yt', NULL),
(10, 'social_insta', 'www.my-insta.com'),
(11, 'social_fb', 'www.fb.com/me'),
(12, 'social_vk', NULL),
(13, 'social_in', '#'),
(14, 'social_github', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recovery_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_small` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `password`, `recovery_code`, `name`, `surname`, `city`, `country`, `avatar`, `avatar_small`) VALUES
(1, 'loalwa@rio.br', 'user', '$2y$10$8LyDcjQoKez9CnV1g5ZP3uUENy0lRFBVbnqtETbLWHDS9.BGA4Yn2', NULL, 'Лоалва', 'Браз', 'Рио-де-Жанейро', 'Бразилия', '383155297617.jpg', '48-383155297617.jpg'),
(2, 'freizer@scot.sc', 'user', '$2y$10$qP1c/XW6eYqOK57Xn7rVOuJGYetd8Md2Irvhfx.Kml.8JVrSzBU4C', NULL, 'Джеймс', 'Фрейзер', 'Инвернесс', 'Шотландия', NULL, NULL),
(3, 'andrews@england.gb', 'user', '$2y$10$C2Oli.mgs2ZnZ8NQ27R8BO04ovGSh04FPlPepvjHxYE7a7Lc4gUxG', NULL, 'Джули', 'Эндрюс', 'Уолтон-на-Темзе', 'Англия', '864880272825.jpg', '48-864880272825.jpg'),
(4, 'aster@america.us', 'admin', '$2y$10$pp0XDQA.jAFPayf1caYuR.60PbYNkxLISXwn7lJ4VioquUjvgg0XW', NULL, 'Фред', 'Aстер', 'Омаха', 'США', '438811574243.jpg', '48-438811574243.jpg'),
(5, 'fitz@america.us', 'user', '$2y$10$Sm7cbuPXvhKX3XbuLOtvOeKf4ila3iRmulhmdXAz1xzf3rB.UrIs6', NULL, 'Элла', 'Фицджеральд', 'Ньюпорт-Ньюс', 'США', '179513565310.png', '48-179513565310.png'),
(6, 'sordi@italy.it', 'user', '$2y$10$ASaHlai45/pv3NYgOwxxYObkEzS6D1qGXW3FmGw2nWoTCrRKJb2PW', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'marlon@france.fr', 'user', '$2y$10$PGTsw/lCOlOHyV9SJ8KFk.6fQujZNmhUf9boFETWT2ak4XrjmSKh6', NULL, 'Марлон', 'Брандо', NULL, NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `common`
--
ALTER TABLE `common`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `common`
--
ALTER TABLE `common`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
