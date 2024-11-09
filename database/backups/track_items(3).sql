-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 18 2024 г., 10:32
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `musicdesire`
--

-- --------------------------------------------------------

--
-- Структура таблицы `track_items`
--

CREATE TABLE `track_items` (
  `id` bigint UNSIGNED NOT NULL,
  `category` int NOT NULL,
  `lang` int NOT NULL,
  `lyrics` tinyint(1) NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `track_items`
--

INSERT INTO `track_items` (`id`, `category`, `lang`, `lyrics`, `name_ru`, `name_en`, `image`, `file`, `full`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 0, 'Трек №1', 'Track №1', NULL, 'kc3E5OMmw4eNOyln07vj7VfJy8XccFCmheiY2yzr.mp3', NULL, 0, '2024-02-20 06:43:29', '2024-03-12 06:36:03'),
(3, 3, 1, 0, 'Трек №2', 'Track №2', NULL, 'OTV4pD80uh9bnuC2WeaqnoRSAtyGKIlEUGeMtV87.mp3', NULL, 0, '2024-03-12 02:11:58', '2024-03-12 06:36:08'),
(4, 3, 1, 1, 'Трек №4', 'Track №4', NULL, 'X5d89WfeeYItjc4DOw3dK8jifkB9mdrd1pjeeyLs.mp3', NULL, 0, '2024-03-12 02:12:05', '2024-03-12 06:36:12'),
(5, 1, 2, 1, 'Трек №5', 'Track №5', NULL, 'OijUo7cooXfF5yOxhMiccTquwmfey3O9DXpMHRxo.mp3', NULL, 700, '2024-03-12 02:12:14', '2024-03-13 06:38:30'),
(6, 1, 1, 1, 'Трек №6', 'Track №6', NULL, '7rqahLiKWl1YjHLYZRTlLMBybaUPHM0m2OLGdEwI.mp3', NULL, 0, '2024-03-12 02:12:20', '2024-03-12 02:12:20'),
(7, 1, 1, 1, 'Трек №7', 'Track №7', NULL, '8HPHHPSEsLw3R8R3E1fQOe0G1gyhrvRF602rwYOg.mp3', NULL, 0, '2024-03-12 02:12:36', '2024-03-12 02:12:36'),
(8, 1, 1, 1, 'Трек №8', 'Track №8', NULL, 'g1MzuEp6dCBPrXzuOkqFdIatUkxgwURLDrwDeRtu.mp3', NULL, 100, '2024-03-18 03:46:06', '2024-03-18 03:46:06'),
(9, 1, 1, 1, 'Трек №9', 'Track №9', NULL, 'sqU0zPiVs8WOcaMHB8keuvTAiy2JWtqmey0w2nXE.mp3', 'kSK58GZC7ywjp6LIsGFraJ1emKSSYc28RflPYznG.mp3', 1212, '2024-03-18 03:51:03', '2024-03-18 03:51:03');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `track_items`
--
ALTER TABLE `track_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `track_items`
--
ALTER TABLE `track_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
