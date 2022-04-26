-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 07 2022 г., 13:31
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db_demo_template`
--
CREATE DATABASE IF NOT EXISTS `db_demo_template` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_demo_template`;

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image_before` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image_after` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejection_reason` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`application_id`, `user_id`, `title`, `description`, `category`, `path_image_before`, `path_image_after`, `status`, `rejection_reason`, `created_at`) VALUES
(1, 1, 'Заявка', 'Описание заявки', 'Первая', 'images/before/1_1642840763_1668043113.png', 'images/after/1_1642840926_385689363.jpg', 'Одобрена', NULL, '2022-01-22 08:39:23'),
(2, 1, 'Заявка', 'Описание заявки', 'Вторая', 'images/before/1_1642840776_1985462668.png', 'images/after/1_1642840922_2091463324.jpg', 'Одобрена', NULL, '2022-01-22 08:39:36'),
(3, 1, 'Заявка', 'Описание заявки', 'Для проверки удаления', 'images/before/1_1642840786_1916426004.png', 'images/after/1_1642840918_122012052.jpg', 'Одобрена', NULL, '2022-01-22 08:39:46'),
(4, 1, 'Заявка', 'Описание заявки', 'Первая', 'images/before/1_1642840796_2031245472.png', 'images/after/1_1642840914_1875516438.jpg', 'Одобрена', NULL, '2022-01-22 08:39:56'),
(5, 1, 'Заявка', 'Описание заявки', 'Вторая', 'images/before/1_1642840809_1798930935.png', 'images/after/1_1642840910_169087720.jpg', 'Одобрена', NULL, '2022-01-22 08:40:09'),
(6, 1, 'Заявка', 'Описание заявки', 'Для проверки удаления', 'images/before/1_1642840896_1547824468.png', 'images/after/1_1642840905_37375808.jpg', 'Одобрена', NULL, '2022-01-22 08:41:36'),
(7, 1, 'Заявка', 'Описание заявки', 'Первая', 'images/before/1_1642841007_713752062.png', NULL, 'Новая', NULL, '2022-01-22 08:43:27'),
(8, 1, 'Заявка', 'Описание заявки', 'Вторая', 'images/before/1_1642841018_1110675804.png', NULL, 'Новая', NULL, '2022-01-22 08:43:38'),
(9, 1, 'Заявка', 'Описание заявки', 'Для проверки удаления', 'images/before/1_1642841033_284693512.png', NULL, 'Новая', NULL, '2022-01-22 08:43:53'),
(10, 1, 'Заявка', 'Описание заявки', 'Первая', 'images/before/1_1642841045_1805954956.png', NULL, 'Отклонена', 'Причина отклонения', '2022-01-22 08:44:05'),
(11, 1, 'Заявка', 'Описание заявки', 'Вторая', 'images/before/1_1642841055_1266418189.png', NULL, 'Отклонена', 'Причина отклонения', '2022-01-22 08:44:15'),
(12, 1, 'Заявка', 'Описание заявки', 'Для проверки удаления', 'images/before/1_1642841064_735178279.png', NULL, 'Отклонена', 'Причина отклонения', '2022-01-22 08:44:24');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Первая'),
(2, 'Вторая'),
(3, 'Для проверки удаления');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `email`, `password`, `remember_token`, `role`) VALUES
(1, 'Администратор', 'admin', '1@1', '$2y$10$p9IOREOKwh3TYiZeNtdsl.Nnv8qCvR6JZAD0iTenlnCujj3fU0i/.', 'dsBaGSKoMYqkbUJTqlmPIgIaEcdgneGbOJa5Yd2Wp1gmZs0wDw9YzBLSTBaD', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
