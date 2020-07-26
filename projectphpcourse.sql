-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 14 2020 г., 11:12
-- Версия сервера: 10.3.22-MariaDB
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
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`) VALUES
(3, 'Проста', 'ПростаПростаПростаПростаПростаПростаПростаПроста!!!'),
(4, 'Не очень проста', 'Не очень простаНе очень простаНе очень простаНе очень простаНе очень проста'),
(5, 'ываыва', 'ываыва');

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
(1, 'loalwa@rio.br', 'user', '$2y$10$8LyDcjQoKez9CnV1g5ZP3uUENy0lRFBVbnqtETbLWHDS9.BGA4Yn2', NULL, 'Лоалва', 'Браз', 'Рио-де-Жанейро', 'Бразилия', '450161020721.jpg', '48-450161020721.jpg'),
(2, 'freizer@scot.sc', 'user', '$2y$10$qP1c/XW6eYqOK57Xn7rVOuJGYetd8Md2Irvhfx.Kml.8JVrSzBU4C', NULL, 'Джеймс', 'Фрейзер', 'Инвернесс', 'Шотландия', NULL, NULL),
(3, 'andrews@england.gb', 'user', '$2y$10$C2Oli.mgs2ZnZ8NQ27R8BO04ovGSh04FPlPepvjHxYE7a7Lc4gUxG', NULL, 'Джули', 'Эндрюс', 'Уолтон-на-Темзе', 'Англия', '271923315572.jpg', '48-271923315572.jpg'),
(4, 'aster@america.us', 'admin', '$2y$10$pp0XDQA.jAFPayf1caYuR.60PbYNkxLISXwn7lJ4VioquUjvgg0XW', NULL, 'Фред', 'Aстер', 'Омаха', 'США', '907368022945.jpg', '48-907368022945.jpg'),
(6, 'fitz@america.us', 'user', '$2y$10$Sm7cbuPXvhKX3XbuLOtvOeKf4ila3iRmulhmdXAz1xzf3rB.UrIs6', NULL, 'Элла', 'Фицджеральд', 'Ньюпорт-Ньюс', 'США', '441069601794.png', '48-441069601794.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
