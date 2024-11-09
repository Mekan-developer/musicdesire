-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 22 2024 г., 11:53
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
-- Структура таблицы `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_item_id` bigint UNSIGNED NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cart_items`
--

INSERT INTO `cart_items` (`id`, `session`, `track_item_id`, `price`, `created_at`, `updated_at`) VALUES
(21, 'FfcX9tkSaYVlF183cjiVco68r9YftVQFCaPGUe5v', 5, 700, '2024-03-14 03:43:35', '2024-03-14 03:43:35'),
(23, '3Zi1RC3J8c6gj07R78MlVB3cFRElpqhxNMmlhddH', 9, 1212, '2024-03-20 01:18:41', '2024-03-20 01:18:41');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `favorite_tracks`
--

CREATE TABLE `favorite_tracks` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `track_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favorite_tracks`
--

INSERT INTO `favorite_tracks` (`id`, `user_id`, `track_id`) VALUES
(2, 1, 5),
(3, 1, 6),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback_items`
--

CREATE TABLE `feedback_items` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(510) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ru',
  `sort` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `feedback_items`
--

INSERT INTO `feedback_items` (`id`, `name`, `content`, `image`, `link`, `lang`, `sort`) VALUES
(2, 'Лира Пан', 'Обратилась впервые и была очень порадована результатом. Профессионализм, оперативность, четкое понимание заказа, доброжелательность в общении и, конечно, приятно удивила цена. Валерия, огромная Вам благодарность от меня и от тренера!', '1.jpg', 'https://vk.com/id448241647', 'ru', 0),
(3, 'Лейсан Губайди', 'От всей души хочу поблагодарить за работу. Очень быстро реагируют на все! От первой минуты обращения до конечного результата. Ну, ооочень быстро, качественно, с учетом всех пожеланий. Даже не ожидала. Успехов вам в вашей работе. Рекомендую!!! Не пожалеете!!!', '2.png', 'https://vk.com/leyseng', 'ru', 0),
(4, 'Анна Исканян', 'Спасибо большое! Прекрасная работа. Приятно удивила оперативность, качество, готовность пойти навстречу и цена! Буду обращаться к вам в будущем. Спасибо!', '3.png', 'https://vk.com/id38935322', 'ru', 0),
(5, 'Екатерина Рыболовлева', 'Спасибо большое Валерии за оперативность! Обращаюсь уже повторно, очень рада что Вас нашла. Приятно с Вами сотрудничать.', '4.png', 'https://vk.com/id142069977', 'ru', 0),
(6, 'Ольга Мишина (Марадымова)', 'Выражаю благодарность за профессионализм и терпение! Много раз переделывали композицию, чтобы удовлетворить пожеланиям тренера. Постоянно предлагались разные варианты компановки. На других сайтах предложат 2 варианта и всё, а дальше как хочешь. На данном ресурсе слышат клиента, доводят дело до конца', '5.png', 'https://vk.com/id56849039', 'ru', 0),
(7, 'Татьяна Прокопьева', 'Благодарю Валерию! Менее чем за 2 часа композиция готова! Если у кого дедлайн - только к Валерии!', '6.jpg', 'https://vk.com/taa_tap', 'ru', 0),
(8, 'Людмила Щеменок', 'Большое спасибо за быструю и качественную работу по корректировке и обработке моего КЮРа для выездки!!!! Очень профессионально!!!! Надеюсь воспользоваться ещё услугами Валерии!!! Здоровья и успехов, счастья и удачи!!!!', '7.png', 'https://vk.com/id67316752', 'ru', 0),
(9, 'Natalia Vokuyeva', 'Большущее спасибо! Все сделали меньше, чем за 2 часа. Денег вперёд не попросили 2 варианта - один лучше другого) не знаем теперь какой выбрать)', '8.jpg', 'https://vk.com/id219739081', 'ru', 0),
(10, 'Мария Земскова', 'Валерия, спасибо большое за прекрасную музыку для выступления! Сделали быстро и качественно, учли все пожелания. Нам соединяли две песни, переходы получились идеальными. В следующий раз буду обращаться только к вам! Всем рекомендую этого специалиста.', '9.jpg', 'https://vk.com/id21191255', 'ru', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `location_items`
--

CREATE TABLE `location_items` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `location_items`
--

INSERT INTO `location_items` (`id`, `title`, `subj`) VALUES
(1, 'Адыгея', 'Респ'),
(2, 'Башкортостан', 'Респ'),
(3, 'Бурятия', 'Респ'),
(4, 'Алтай', 'Респ'),
(5, 'Дагестан', 'Респ'),
(6, 'Ингушетия', 'Респ'),
(7, 'Кабардино-Балкарская', 'Респ'),
(8, 'Калмыкия', 'Респ'),
(9, 'Карачаево-Черкесская', 'Респ'),
(10, 'Карелия', 'Респ'),
(11, 'Коми', 'Респ'),
(12, 'Марий Эл', 'Респ'),
(13, 'Мордовия', 'Респ'),
(14, 'Саха /Якутия/', 'Респ'),
(15, 'Северная Осетия - Алания', 'Респ'),
(16, 'Татарстан', 'Респ'),
(17, 'Тыва', 'Респ'),
(18, 'Удмуртская', 'Респ'),
(19, 'Хакасия', 'Респ'),
(20, 'Чеченская', 'Респ'),
(21, 'Чувашская Республика -', 'Чувашия'),
(22, 'Алтайский', 'край'),
(23, 'Краснодарский', 'край'),
(24, 'Красноярский', 'край'),
(25, 'Приморский', 'край'),
(26, 'Ставропольский', 'край'),
(27, 'Хабаровский', 'край'),
(28, 'Амурская', 'обл'),
(29, 'Архангельская', 'обл'),
(30, 'Астраханская', 'обл'),
(31, 'Белгородская', 'обл'),
(32, 'Брянская', 'обл'),
(33, 'Владимирская', 'обл'),
(34, 'Волгоградская', 'обл'),
(35, 'Вологодская', 'обл'),
(36, 'Воронежская', 'обл'),
(37, 'Ивановская', 'обл'),
(38, 'Иркутская', 'обл'),
(39, 'Калининградская', 'обл'),
(40, 'Калужская', 'обл'),
(41, 'Камчатский', 'край'),
(42, 'Кемеровская', 'обл'),
(43, 'Кировская', 'обл'),
(44, 'Костромская', 'обл'),
(45, 'Курганская', 'обл'),
(46, 'Курская', 'обл'),
(47, 'Ленинградская', 'обл'),
(48, 'Липецкая', 'обл'),
(49, 'Магаданская', 'обл'),
(50, 'Московская', 'обл'),
(51, 'Мурманская', 'обл'),
(52, 'Нижегородская', 'обл'),
(53, 'Новгородская', 'обл'),
(54, 'Новосибирская', 'обл'),
(55, 'Омская', 'обл'),
(56, 'Оренбургская', 'обл'),
(57, 'Орловская', 'обл'),
(58, 'Пензенская', 'обл'),
(59, 'Пермский', 'край'),
(60, 'Псковская', 'обл'),
(61, 'Ростовская', 'обл'),
(62, 'Рязанская', 'обл'),
(63, 'Самарская', 'обл'),
(64, 'Саратовская', 'обл'),
(65, 'Сахалинская', 'обл'),
(66, 'Свердловская', 'обл'),
(67, 'Смоленская', 'обл'),
(68, 'Тамбовская', 'обл'),
(69, 'Тверская', 'обл'),
(70, 'Томская', 'обл'),
(71, 'Тульская', 'обл'),
(72, 'Тюменская', 'обл'),
(73, 'Ульяновская', 'обл'),
(74, 'Челябинская', 'обл'),
(75, 'Забайкальский', 'край'),
(76, 'Ярославская', 'обл'),
(77, 'Москва', 'г'),
(78, 'Санкт-Петербург', 'г'),
(79, 'Еврейская', 'Аобл'),
(80, 'Ненецкий', 'АО'),
(81, 'Ханты-Мансийский Автономный округ - Югра', 'АО'),
(82, 'Чукотский', 'АО'),
(83, 'Ямало-Ненецкий', 'АО'),
(84, 'Крым', 'Респ'),
(85, 'Севастополь', 'г'),
(86, 'Байконур', 'г');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_20_061039_create_track_categories_table', 2),
(6, '2024_02_20_071713_create_track_langs_table', 3),
(8, '2024_02_20_071956_create_track_items_table', 4),
(9, '2024_02_20_105154_create_feedback_items_table', 5),
(12, '2024_03_12_094542_create_track_durations_table', 6),
(13, '2024_03_13_042947_create_cart_items_table', 7),
(14, '2024_03_13_065658_create_location_items_table', 8),
(15, '2024_03_13_073537_create_track_blocks_table', 9),
(16, '2024_03_13_092132_add_price_column_to_tracks', 10),
(17, '2024_03_14_040745_create_user_orders_table', 11),
(18, '2024_03_14_042406_create_user_order_items_table', 11),
(19, '2024_03_14_063438_add_price_to_cart_items', 12),
(20, '2024_03_14_092821_create_favorite_tracks_table', 13),
(21, '2024_03_14_114325_add_avatar_to_users', 14),
(22, '2024_03_18_081135_create_user_applies_table', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `track_blocks`
--

CREATE TABLE `track_blocks` (
  `id` bigint UNSIGNED NOT NULL,
  `track_item_id` bigint UNSIGNED NOT NULL,
  `location_item_id` bigint UNSIGNED NOT NULL,
  `blocked_before` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `track_blocks`
--

INSERT INTO `track_blocks` (`id`, `track_item_id`, `location_item_id`, `blocked_before`, `created_at`, `updated_at`) VALUES
(3, 1, 77, '2025-03-14 00:00:00', '2024-03-14 03:06:12', '2024-03-14 03:06:12'),
(4, 3, 77, '2025-03-14 00:00:00', '2024-03-14 03:08:53', '2024-03-14 03:08:53'),
(5, 9, 1, '2025-03-18 00:00:00', '2024-03-18 04:19:45', '2024-03-18 04:19:45'),
(6, 9, 1, '2025-03-20 00:00:00', '2024-03-20 03:05:02', '2024-03-20 03:05:02');

-- --------------------------------------------------------

--
-- Структура таблицы `track_categories`
--

CREATE TABLE `track_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `track_categories`
--

INSERT INTO `track_categories` (`id`, `name_ru`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'Поп', 'Pop', '2024-02-20 03:55:18', '2024-02-20 04:13:01'),
(3, 'Быстрая, яркая', 'Fast, bright', '2024-03-09 02:30:21', '2024-03-09 02:30:21'),
(4, 'Эпичная ', 'Epic', '2024-03-09 02:30:21', '2024-03-09 02:30:21'),
(5, 'Детская', 'For kids', '2024-03-09 02:30:21', '2024-03-09 02:30:21'),
(6, 'Русский-народный', 'Russian-folk', '2024-03-09 02:30:21', '2024-03-09 02:30:21'),
(7, 'Медленная музыка', 'Slow music', '2024-03-09 02:30:21', '2024-03-09 02:30:21'),
(8, 'K-pop', 'K-pop', '2024-03-09 02:30:21', '2024-03-09 02:30:21'),
(9, 'Латинская', 'Latin', '2024-03-09 02:30:21', '2024-03-09 02:30:21'),
(10, 'Цыганская', 'Gypsy', '2024-03-09 02:30:21', '2024-03-09 02:30:21'),
(11, 'Казахская', 'Kazakh', '2024-03-09 02:30:21', '2024-03-09 02:30:21'),
(12, 'Классика', 'Classic', '2024-03-09 02:30:21', '2024-03-09 02:30:21');

-- --------------------------------------------------------

--
-- Структура таблицы `track_durations`
--

CREATE TABLE `track_durations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` int NOT NULL,
  `to` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `track_durations`
--

INSERT INTO `track_durations` (`id`, `name`, `from`, `to`) VALUES
(1, '1:00', 60, NULL),
(2, '1:15', 75, NULL),
(3, '1:30', 90, NULL),
(4, '2:00 - 2:10', 120, 130),
(5, '2:30 - 2:50', 150, 170),
(6, '2:50 - 3:10', 170, 190),
(7, '3:40', 220, NULL);

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

-- --------------------------------------------------------

--
-- Структура таблицы `track_langs`
--

CREATE TABLE `track_langs` (
  `id` bigint UNSIGNED NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `track_langs`
--

INSERT INTO `track_langs` (`id`, `name_ru`, `name_en`) VALUES
(1, 'Русский', 'Russian'),
(2, 'Французский', 'French'),
(3, 'Немецкий', 'Deutch');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Супер админ', 'admin@musicdesire.local', NULL, NULL, '$2y$10$F6AZ74xleMVYnklSs05JqulP.73a4.He5cjzPCp6nzG8b/103C1OC', '6yQMYgaIu15bnehKFkZkA09aa69m3EaGvd9XB362awbdYw4CHfWZhIqC9DV6', '2024-02-15 02:01:03', '2024-03-18 03:09:10'),
(2, 'Emil Rustamov', 'test@mail.ru', NULL, NULL, '$2y$10$OftdVV2301d6OmND.kPE1OWRZyrz4hy7X0NUri5tSP.IbNVa8MGWa', NULL, '2024-03-20 03:00:24', '2024-03-20 03:00:24');

-- --------------------------------------------------------

--
-- Структура таблицы `user_applies`
--

CREATE TABLE `user_applies` (
  `id` bigint UNSIGNED NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `beep` tinyint(1) NOT NULL DEFAULT '0',
  `file` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_applies`
--

INSERT INTO `user_applies` (`id`, `duration`, `user_id`, `beep`, `file`, `description`, `contact`, `name`, `created_at`, `updated_at`) VALUES
(1, 'dwada', NULL, 1, 'public/applies/6oaK5VFI9AcT2vLy8AhKjccRB5alPoauf3aUSZ5q.mp3', 'dwadwa', 'dawdad', 'dwadwa', '2024-03-20 01:47:01', '2024-03-20 01:47:01');

-- --------------------------------------------------------

--
-- Структура таблицы `user_orders`
--

CREATE TABLE `user_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `location_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_orders`
--

INSERT INTO `user_orders` (`id`, `name`, `email`, `phone`, `user_id`, `location_id`, `created_at`, `updated_at`) VALUES
(8, 'вцфв', 'test@test.ru', '862985060', 1, 77, '2024-03-14 03:08:53', '2024-03-14 03:08:53'),
(9, 'Супер админ', 'admin@musicdesire.local', '862985060', 1, 1, '2024-03-18 04:19:45', '2024-03-18 04:19:45'),
(10, 'Emil Rustamov', 'test@mail.ru', '+99364927422', 2, 1, '2024-03-20 03:05:02', '2024-03-20 03:05:02');

-- --------------------------------------------------------

--
-- Структура таблицы `user_order_items`
--

CREATE TABLE `user_order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `track_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_order_items`
--

INSERT INTO `user_order_items` (`id`, `order_id`, `track_id`, `created_at`, `updated_at`) VALUES
(7, 8, 3, '2024-03-14 03:08:53', '2024-03-14 03:08:53'),
(8, 9, 9, '2024-03-18 04:19:45', '2024-03-18 04:19:45'),
(9, 10, 9, '2024-03-20 03:05:02', '2024-03-20 03:05:02');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_track_item_id_foreign` (`track_item_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `favorite_tracks`
--
ALTER TABLE `favorite_tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_tracks_user_id_foreign` (`user_id`),
  ADD KEY `favorite_tracks_track_id_foreign` (`track_id`);

--
-- Индексы таблицы `feedback_items`
--
ALTER TABLE `feedback_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `location_items`
--
ALTER TABLE `location_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `track_blocks`
--
ALTER TABLE `track_blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `track_blocks_track_item_id_foreign` (`track_item_id`),
  ADD KEY `track_blocks_location_item_id_foreign` (`location_item_id`);

--
-- Индексы таблицы `track_categories`
--
ALTER TABLE `track_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `track_durations`
--
ALTER TABLE `track_durations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `track_items`
--
ALTER TABLE `track_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `track_langs`
--
ALTER TABLE `track_langs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `user_applies`
--
ALTER TABLE `user_applies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_applies_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_orders_user_id_foreign` (`user_id`),
  ADD KEY `user_orders_location_id_foreign` (`location_id`);

--
-- Индексы таблицы `user_order_items`
--
ALTER TABLE `user_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_order_items_order_id_foreign` (`order_id`),
  ADD KEY `user_order_items_track_id_foreign` (`track_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `favorite_tracks`
--
ALTER TABLE `favorite_tracks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `feedback_items`
--
ALTER TABLE `feedback_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `location_items`
--
ALTER TABLE `location_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `track_blocks`
--
ALTER TABLE `track_blocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `track_categories`
--
ALTER TABLE `track_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `track_durations`
--
ALTER TABLE `track_durations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `track_items`
--
ALTER TABLE `track_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `track_langs`
--
ALTER TABLE `track_langs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user_applies`
--
ALTER TABLE `user_applies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user_order_items`
--
ALTER TABLE `user_order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_track_item_id_foreign` FOREIGN KEY (`track_item_id`) REFERENCES `track_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favorite_tracks`
--
ALTER TABLE `favorite_tracks`
  ADD CONSTRAINT `favorite_tracks_track_id_foreign` FOREIGN KEY (`track_id`) REFERENCES `track_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_tracks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `track_blocks`
--
ALTER TABLE `track_blocks`
  ADD CONSTRAINT `track_blocks_location_item_id_foreign` FOREIGN KEY (`location_item_id`) REFERENCES `location_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `track_blocks_track_item_id_foreign` FOREIGN KEY (`track_item_id`) REFERENCES `track_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_applies`
--
ALTER TABLE `user_applies`
  ADD CONSTRAINT `user_applies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_orders_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `location_items` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_order_items`
--
ALTER TABLE `user_order_items`
  ADD CONSTRAINT `user_order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `user_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_order_items_track_id_foreign` FOREIGN KEY (`track_id`) REFERENCES `track_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
