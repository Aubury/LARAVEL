-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 23 2021 г., 11:12
-- Версия сервера: 10.1.39-MariaDB
-- Версия PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_visit` timestamp NULL DEFAULT NULL,
  `ipAddress` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `patronymic`, `surname`, `phone`, `email`, `email_verified_at`, `password`, `last_visit`, `ipAddress`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Наталья', 'Петровна', 'Обури', '+38(099)999-99-99', 'aubury@ukr.net', NULL, '$2y$10$gIi3fCGOMOBs8SEHnJu5x.S4GrYGG66eIaVxTfkUrd7EYIKA9kzyi', '2021-02-14 14:57:22', '', NULL, '2020-11-15 16:20:38', '2020-11-15 16:20:38');

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Coca-Cola', '2020-11-25 17:04:07', '2020-11-25 17:04:07'),
(2, 'Pepsi-Cola', '2020-11-25 17:07:53', '2020-11-25 17:07:53');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Напитки', '2020-11-25 14:36:50', '2020-11-25 14:36:50');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `ipAddress` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `title`, `img`, `width`, `height`, `size`, `ipAddress`, `created_at`, `updated_at`) VALUES
(1, 'idea501.jpg', 'idea501.jpg', 900, 600, 247490, NULL, '2021-01-21 18:59:56', '2021-01-21 18:59:56'),
(2, 'idea501_31.jpg', 'idea501_31.jpg', 900, 600, 247490, NULL, '2021-01-21 19:04:08', '2021-01-21 19:04:08'),
(3, 'idea501_23.jpg', 'idea501_23.jpg', 900, 600, 247490, NULL, '2021-01-21 19:34:43', '2021-01-21 19:34:43'),
(4, 'close.png', 'close.png', 389, 373, 115432, NULL, '2021-01-21 19:42:35', '2021-01-21 19:42:35'),
(5, 'female.png', 'female.png', 231, 630, 152471, NULL, '2021-01-21 19:44:47', '2021-01-21 19:44:47'),
(6, 'hotpng.com.png', 'hotpng.com.png', 1024, 1024, 238723, NULL, '2021-01-21 20:38:16', '2021-01-21 20:38:16'),
(7, 'Pokazaniia_k.jpg', 'Pokazaniia_k.jpg', 818, 479, 97280, NULL, '2021-01-21 20:54:17', '2021-01-21 20:54:17'),
(8, 'skypeIcon.png', 'skypeIcon.png', 66, 67, 9552, NULL, '2021-01-22 15:36:57', '2021-01-22 15:36:57'),
(9, 'telegramIcon.png', 'telegramIcon.png', 67, 69, 9361, NULL, '2021-01-22 15:36:57', '2021-01-22 15:36:57'),
(10, 'viber.png', 'viber.png', 68, 68, 9250, NULL, '2021-01-22 15:36:57', '2021-01-22 15:36:57'),
(11, 'whatsappIcon.png', 'whatsappIcon.png', 68, 68, 10285, NULL, '2021-01-22 15:36:57', '2021-01-22 15:36:57'),
(12, 'close_43.png', 'close_43.png', 389, 373, 115432, NULL, '2021-01-22 15:46:27', '2021-01-22 15:46:27'),
(13, 'close_blak.png', 'close_blak.png', 981, 980, 40148, NULL, '2021-01-22 15:46:27', '2021-01-22 15:46:27'),
(14, 'close_gray.png', 'close_gray.png', 981, 980, 31503, NULL, '2021-01-22 15:46:27', '2021-01-22 15:46:27'),
(15, 'female_65.png', 'female_65.png', 231, 630, 152471, NULL, '2021-01-22 15:50:44', '2021-01-22 15:50:44'),
(16, 'pepsi_logo.png', 'pepsi_logo.png', 800, 1101, 62009, NULL, '2021-01-22 15:50:44', '2021-01-22 15:50:44'),
(17, 'pepsi-05l.jpg', 'pepsi-05l.jpg', 900, 900, 118202, NULL, '2021-01-22 15:50:44', '2021-01-22 15:50:44'),
(18, 'close_tr.png', 'close_tr.png', 389, 373, 74664, NULL, '2021-01-22 15:53:33', '2021-01-22 15:53:33'),
(19, 'headerImgLeft.png', 'headerImgLeft.png', 570, 823, 731518, NULL, '2021-01-22 15:53:34', '2021-01-22 15:53:34'),
(20, 'hotpng_12.png', 'hotpng_12.png', 1024, 1024, 238723, NULL, '2021-01-22 15:53:34', '2021-01-22 15:53:34'),
(21, 'pepsi_0.5.jpg', 'pepsi_0.5.jpg', 611, 550, 28350, NULL, '2021-01-22 17:13:10', '2021-01-22 17:13:10'),
(22, 'pepsi_logo_69.png', 'pepsi_logo_69.png', 800, 1101, 62009, NULL, '2021-01-22 17:13:10', '2021-01-22 17:13:10'),
(23, 'pepsi-05l_91.jpg', 'pepsi-05l_91.jpg', 900, 900, 118202, NULL, '2021-01-22 17:13:11', '2021-01-22 17:13:11'),
(24, 'idea501_44.jpg', 'idea501_44.jpg', 900, 600, 247490, NULL, '2021-01-22 18:01:54', '2021-01-22 18:01:54'),
(25, 'close_79.png', 'close_79.png', 389, 373, 115432, NULL, '2021-01-23 19:04:03', '2021-01-23 19:04:03'),
(26, 'close_blak_35.png', 'close_blak_35.png', 981, 980, 40148, NULL, '2021-01-23 19:04:03', '2021-01-23 19:04:03'),
(27, 'close_gray_15.png', 'close_gray_15.png', 981, 980, 31503, NULL, '2021-01-23 19:04:04', '2021-01-23 19:04:04'),
(28, 'idea501_98.jpg', 'idea501_98.jpg', 900, 600, 247490, NULL, '2021-01-23 19:30:27', '2021-01-23 19:30:27'),
(29, 'Скриншот 24-01-2021 17_30_44.jpg', 'Скриншот 24-01-2021 17_30_44.jpg', 825, 502, 49054, NULL, '2021-01-24 15:08:51', '2021-01-24 15:08:51'),
(30, 'Скриншот 24-01-2021 17_30_44_6.jpg', 'Скриншот 24-01-2021 17_30_44_6.jpg', 825, 502, 49054, NULL, '2021-01-24 15:11:11', '2021-01-24 15:11:11'),
(31, 'Скриншот 24-01-2021 17_30_44_90.jpg', 'Скриншот 24-01-2021 17_30_44_90.jpg', 825, 502, 49054, NULL, '2021-01-24 15:19:53', '2021-01-24 15:19:53'),
(32, 'hotpng_16.png', 'hotpng_16.png', 1024, 1024, 238723, NULL, '2021-01-24 15:54:55', '2021-01-24 15:54:55'),
(33, 'black_bg_rose.jpg', 'black_bg_rose.jpg', 1500, 600, 82804, NULL, '2021-01-24 15:57:17', '2021-01-24 15:57:17'),
(34, 'pepsi_0_66.jpg', 'pepsi_0_66.jpg', 611, 550, 28350, NULL, '2021-01-24 16:24:50', '2021-01-24 16:24:50'),
(35, 'pepsi_logo_8.png', 'pepsi_logo_8.png', 800, 1101, 62009, NULL, '2021-01-24 16:24:50', '2021-01-24 16:24:50'),
(36, 'pepsi-05l_84.jpg', 'pepsi-05l_84.jpg', 900, 900, 118202, NULL, '2021-01-24 16:24:50', '2021-01-24 16:24:50'),
(37, 'Скриншот 24-01-2021 17_30_44_3.jpg', 'Скриншот 24-01-2021 17_30_44_3.jpg', 825, 502, 49054, NULL, '2021-01-25 15:17:49', '2021-01-25 15:17:49'),
(38, 'black_bg_rose_10.jpg', 'black_bg_rose_10.jpg', 1500, 600, 82804, NULL, '2021-01-25 15:18:25', '2021-01-25 15:18:25'),
(39, 'black_golden_bg.jpg', 'black_golden_bg.jpg', 1500, 540, 100431, NULL, '2021-01-25 15:18:25', '2021-01-25 15:18:25'),
(40, 'black_golden_bg.png', 'black_golden_bg.png', 1920, 600, 415147, NULL, '2021-01-25 15:18:25', '2021-01-25 15:18:25'),
(41, 'pepsi_logo_7.png', 'pepsi_logo_7.png', 800, 1101, 62009, NULL, '2021-01-25 16:11:28', '2021-01-25 16:11:28'),
(42, 'pepsi_0_13.jpg', 'pepsi_0_13.jpg', 611, 550, 28350, NULL, '2021-01-25 16:12:01', '2021-01-25 16:12:01'),
(43, 'pepsi-05l_41.jpg', 'pepsi-05l_41.jpg', 900, 900, 118202, NULL, '2021-01-25 16:12:01', '2021-01-25 16:12:01'),
(44, '2-2.jpg', '2-2.jpg', 650, 428, 31787, NULL, '2021-02-01 15:40:30', '2021-02-01 15:40:30'),
(45, 'подарок банкира.jpg', 'подарок банкира.jpg', 1600, 1000, 656720, NULL, '2021-02-01 15:40:30', '2021-02-01 15:40:30'),
(46, 'IMG_4894.jpg', 'IMG_4894.jpg', 4899, 3266, 941503, NULL, '2021-02-01 16:17:04', '2021-02-01 16:17:04'),
(47, 'female_95.png', 'female_95.png', 231, 630, 152471, NULL, '2021-02-13 19:14:07', '2021-02-13 19:14:07'),
(48, 'female_9.png', 'female_9.png', 231, 630, 152471, NULL, '2021-02-13 19:14:11', '2021-02-13 19:14:11'),
(49, 'female_24.png', 'female_24.png', 231, 630, 152471, NULL, '2021-02-13 19:14:16', '2021-02-13 19:14:16'),
(50, 'female_34.png', 'female_34.png', 231, 630, 152471, NULL, '2021-02-13 19:14:16', '2021-02-13 19:14:16'),
(51, 'female_100.png', 'female_100.png', 231, 630, 152471, NULL, '2021-02-13 19:14:17', '2021-02-13 19:14:17'),
(52, 'female_54.png', 'female_54.png', 231, 630, 152471, NULL, '2021-02-13 19:14:17', '2021-02-13 19:14:17'),
(53, 'female_52.png', 'female_52.png', 231, 630, 152471, NULL, '2021-02-13 19:14:18', '2021-02-13 19:14:18'),
(54, 'female_54.png', 'female_54.png', 231, 630, 152471, NULL, '2021-02-13 19:14:18', '2021-02-13 19:14:18'),
(55, 'female_16.png', 'female_16.png', 231, 630, 152471, NULL, '2021-02-13 19:14:24', '2021-02-13 19:14:24'),
(56, 'female_69.png', 'female_69.png', 231, 630, 152471, NULL, '2021-02-13 19:14:53', '2021-02-13 19:14:53'),
(57, 'female_10.png', 'female_10.png', 231, 630, 152471, NULL, '2021-02-13 19:14:54', '2021-02-13 19:14:54'),
(58, 'female_47.png', 'female_47.png', 231, 630, 152471, NULL, '2021-02-13 19:14:54', '2021-02-13 19:14:54'),
(59, 'female_82.png', 'female_82.png', 231, 630, 152471, NULL, '2021-02-13 19:14:54', '2021-02-13 19:14:54'),
(60, 'female_53.png', 'female_53.png', 231, 630, 152471, NULL, '2021-02-13 19:14:55', '2021-02-13 19:14:55'),
(61, 'female_70.png', 'female_70.png', 231, 630, 152471, NULL, '2021-02-13 19:14:55', '2021-02-13 19:14:55'),
(62, 'female_15.png', 'female_15.png', 231, 630, 152471, NULL, '2021-02-13 19:14:55', '2021-02-13 19:14:55'),
(63, 'female_18.png', 'female_18.png', 231, 630, 152471, NULL, '2021-02-13 19:14:56', '2021-02-13 19:14:56'),
(64, 'female_68.png', 'female_68.png', 231, 630, 152471, NULL, '2021-02-13 19:14:56', '2021-02-13 19:14:56'),
(65, 'female_74.png', 'female_74.png', 231, 630, 152471, NULL, '2021-02-13 19:14:56', '2021-02-13 19:14:56'),
(66, 'female_76.png', 'female_76.png', 231, 630, 152471, NULL, '2021-02-13 19:15:12', '2021-02-13 19:15:12'),
(67, 'moon1.jpg', 'moon1.jpg', 1024, 1369, 218021, NULL, '2021-02-13 19:29:04', '2021-02-13 19:29:04'),
(68, 'blue_moon.jpg', 'blue_moon.jpg', 1333, 529, 131933, NULL, '2021-02-13 19:31:55', '2021-02-13 19:31:55'),
(69, 'black_bg_rose_39.jpg', 'black_bg_rose_39.jpg', 1500, 600, 82804, NULL, '2021-02-13 19:35:06', '2021-02-13 19:35:06'),
(70, '_cloud.png', '_cloud.png', 1200, 1239, 91447, NULL, '2021-02-13 19:43:03', '2021-02-13 19:43:03'),
(71, 'back.jpg', 'back.jpg', 2000, 2000, 314891, NULL, '2021-02-13 19:44:20', '2021-02-13 19:44:20'),
(72, 'back_96.jpg', 'back_96.jpg', 2000, 2000, 314891, NULL, '2021-02-13 19:44:23', '2021-02-13 19:44:23'),
(73, 'skypeIcon_8.png', 'skypeIcon_8.png', 66, 67, 9552, NULL, '2021-02-13 19:48:26', '2021-02-13 19:48:26'),
(74, 'instaIcon.png', 'instaIcon.png', 69, 69, 10022, NULL, '2021-02-13 19:54:16', '2021-02-13 19:54:16'),
(75, 'instaIcon_95.png', 'instaIcon_95.png', 69, 69, 10022, NULL, '2021-02-13 19:54:18', '2021-02-13 19:54:18'),
(76, 'instaIcon_37.png', 'instaIcon_37.png', 69, 69, 10022, NULL, '2021-02-13 19:54:19', '2021-02-13 19:54:19'),
(77, 'instaIcon_29.png', 'instaIcon_29.png', 69, 69, 10022, NULL, '2021-02-13 19:54:20', '2021-02-13 19:54:20'),
(78, 'skypeIcon_42.png', 'skypeIcon_42.png', 66, 67, 9552, NULL, '2021-02-13 20:05:53', '2021-02-13 20:05:53'),
(79, 'skypeIcon_44.png', 'skypeIcon_44.png', 66, 67, 9552, NULL, '2021-02-13 20:06:26', '2021-02-13 20:06:26');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_11_25_183434_create_brands_table', 1),
(3, '2020_11_25_223225_create_images_table', 2),
(4, '2020_12_10_164410_create_products_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mass_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `brand`, `main_img`, `mass_img`, `short_description`, `full_description`, `price`, `amount`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '79', '0', NULL, NULL, NULL, NULL, '2020-12-21 20:14:25', '2020-12-21 20:14:25'),
(2, 'Coca-Cola', 'Напитки', 'Coca-Cola', '0', '0', NULL, NULL, '15.00', NULL, '2020-12-21 20:19:41', '2020-12-21 20:19:41'),
(3, 'Coca-Cola', 'Напитки', 'Coca-Cola', NULL, NULL, NULL, NULL, '15.00', 170, '2021-01-03 18:56:01', '2021-01-03 19:20:36'),
(4, 'Pepsi-Cola 0.5', 'Напитки', 'Pepsi-Cola', '41', '5,6', '<h2><span style=\"background-color: #ffffff; color: #e03e2d;\"><em><strong>Pepsi-Cola</strong></em></span></h2>', '<h4><span style=\"color: #e03e2d;\">Super drink !</span></h4>', '11.00', 170, '2021-01-25 16:43:13', '2021-01-25 16:43:13'),
(5, 'Pepsi-Cola 0.5', 'Напитки', 'Pepsi-Cola', '41', '7,8', '<h2><span style=\"background-color: #ffffff; color: #e03e2d;\"><em><strong>Pepsi-Cola</strong></em></span></h2>', '<h4><span style=\"color: #e03e2d;\">Super drink !</span></h4>', '11.00', 170, '2021-01-25 16:51:49', '2021-01-25 16:51:49'),
(6, 'Pepsi-Cola 0.75', 'Напитки', 'Pepsi-Cola', '16', '44,45', '<h2 style=\"text-align: center;\"><span style=\"font-family: \'arial black\', sans-serif; color: #e03e2d;\"><em><strong>Super drink!</strong></em></span></h2>', '<p><span style=\"background-color: #bfedd2;\"><em>Pepsi 0.75</em></span></p>', '20.00', 10, '2021-02-02 13:17:56', '2021-02-02 13:17:56');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apartment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_visit` timestamp NULL DEFAULT NULL,
  `ipAddress` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `patronymic`, `surname`, `phone`, `city`, `street`, `building`, `apartment`, `email`, `email_verified_at`, `password`, `last_visit`, `ipAddress`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Иван', 'Иванович', 'Иванов', '+38(099)999-99-99', 'Днепр', 'Днепровская', '9', '99', 'ivanov@ukr.net', NULL, '$2y$10$EBlF.eOBsR7k497eZ0Ck9OWGk5RVAJx1cUdhAiyFIwRoTBYSm6BOe', NULL, '', NULL, '2020-11-15 11:28:14', '2020-11-15 11:28:14');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
