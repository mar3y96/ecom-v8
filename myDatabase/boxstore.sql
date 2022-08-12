-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 06:47 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boxstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pre` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `pre`) VALUES
(1, 'admin 2', 'admin@admin.com', '$2y$10$6apCZWmi.sUvPJdZYzeUL.dcC6fqw0CDv9zJfxAd3H7ZgRnsv9Kf6', '4sXcREkA4tDBjsjesyJd5Tw8aPQdZEWYMH8YX3eQtzZRRbrEJHfy9cLeCrZC', NULL, '2019-02-11 18:30:38', 1),
(2, 'salah 2', 'salah@gmail.com', '$2y$10$h2onw6tSq/6Kfbbt4jNe5uJ8AwwNT4Zre.p0LY7yeqrKTX4jS1laC', 'bNo1zw1gNPMfps8Xe0gaLpPzZwkN6s6wrKVqUGfHdxKHju9ByRhm168Yru5A', '2019-02-11 16:39:07', '2019-02-11 18:32:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"link\":\"admin\\/orders\\/43\\/show\",\"message\":\"<span style=\\\"color:blue\\\"> \\u062a\\u0645 \\u0625\\u0633\\u062a\\u0631\\u062c\\u0627\\u0639 \\r\\n                    \\u0637\\u0644\\u0628 <\\/span>\"}', '0', '2019-02-25 15:21:51', '2019-02-25 15:21:51'),
(2, '{\"link\":\"admin\\/orders\\/45\\/show\",\"message\":\"<span style=\\\"color:blue\\\"> \\u0637\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f <\\/span>\"}', '0', '2019-02-26 17:47:54', '2019-02-26 17:47:54'),
(3, '{\"link\":\"admin\\/orders\\/43\\/show\",\"message\":\"<span style=\\\"color:blue\\\"> \\u062a\\u0645 \\u0625\\u0633\\u062a\\u0631\\u062c\\u0627\\u0639 \\r\\n                    \\u0637\\u0644\\u0628 <\\/span>\"}', '0', '2019-02-26 18:29:48', '2019-02-26 18:29:48'),
(4, '{\"link\":\"admin\\/orders\\/45\\/show\",\"message\":\"<span style=\\\"color:blue\\\"> \\u062a\\u0645 \\u0625\\u0633\\u062a\\u0631\\u062c\\u0627\\u0639 \\r\\n                    \\u0637\\u0644\\u0628 <\\/span>\"}', '1', '2019-02-26 18:29:53', '2019-02-26 21:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `code`, `value`, `status`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '1234', 20, 'new', '2019-02-27', '2019-02-12 22:00:00', '2019-02-17 13:40:37'),
(3, '45110', 60, 'new', '2019-02-18', '2019-02-17 11:07:51', '2019-02-17 14:23:50'),
(4, '25355', 66, 'new', '2019-02-21', '2019-02-17 11:10:24', '2019-02-17 15:48:33'),
(5, '26711', 21, 'new', '2019-02-28', '2019-02-17 12:04:30', '2019-02-24 11:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_22_071909_create_admins_table', 1),
(4, '2019_01_22_071910_create_admin_password_resets_table', 1),
(5, '2019_01_22_073051_create_products_table', 1),
(6, '2019_01_22_141106_users_add_l_name', 1),
(8, '2019_01_30_164613_create_settings_table', 2),
(13, '2019_01_31_165134_create_orders_table', 3),
(14, '2019_01_31_191140_create_order_product', 3),
(15, '2019_02_04_214655_create_contacts_table', 4),
(16, '2019_02_05_201433_create_product_images_table', 5),
(20, '2019_02_07_020417_create_print_images_table', 6),
(21, '2019_02_07_021244_create_print_designs_table', 7),
(22, '2019_02_10_083304_create_product_user_table', 8),
(23, '2019_02_11_195210_add_pre_to_admin', 9),
(25, '2019_02_14_161837_create_discounts_table', 10),
(27, '2019_02_21_151000_create_taxes_table', 11),
(28, '2019_02_21_181956_create_admin_notifications_table', 12),
(29, '2019_02_24_122722_add_discount_to_order', 13),
(30, '2019_02_24_170303_add_best_offer_to_product', 14),
(31, '2019_02_24_192145_add_details_to_order', 15),
(32, '2019_02_28_110216_create_subscribes_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `shipping` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `count`, `subtotal`, `discount`, `shipping`, `total`, `status`, `f_name`, `s_name`, `email`, `phone`, `address`, `city_id`, `user_id`, `created_at`, `updated_at`, `discount_id`) VALUES
(43, 4, 480, 96, 85, 469, 'canceled-user', 'mohammed', 'maray', 'tutor@gmail.com', '1151899828', 'address', 'أسوان', 1, '2019-02-24 17:44:55', '2019-02-26 18:29:48', 1),
(44, 1, 120, NULL, 40, 160, 'undelivered', 'mohammed', 'maray', 'tutor@gmail.com', '1151899828', 'address', 'القاهرة', 1, '2019-02-24 17:55:30', '2019-02-25 15:31:15', NULL),
(45, 3, 450, NULL, 40, 490, 'canceled-user', 'ali', 'ali2', 'user@user.com', '1151899828', 'address', 'القاهرة', 1, '2019-02-26 17:47:54', '2019-02-26 18:29:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(20) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `product_id`, `order_id`, `qty`, `total`, `size`, `created_at`, `updated_at`) VALUES
(49, 8, 43, 21, 233, 's', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `print_designs`
--

CREATE TABLE `print_designs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `style_image_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `design` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `print_designs`
--

INSERT INTO `print_designs` (`id`, `name`, `phone`, `email`, `style_image_id`, `qty`, `color`, `description`, `design`, `created_at`, `updated_at`) VALUES
(2, 'mohammed maray', '01151899828', 'mohamedmaray9674@gmail.com', 1, 20, '#00ff00', 'this is my first order', '1549594559-t2.png', '2019-02-08 00:55:59', '2019-02-08 00:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `print_images`
--

CREATE TABLE `print_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `print_images`
--

INSERT INTO `print_images` (`id`, `image`, `title`, `created_at`, `updated_at`) VALUES
(1, '1549539410-t1.png', 't-shert 1', '2019-02-07 09:36:50', '2019-02-07 09:36:50'),
(2, '1549539410-t2.png', 't-shert-2', '2019-02-07 09:36:50', '2019-02-07 09:36:50'),
(3, '1549539410-t3.png', 't-shert 3', '2019-02-07 09:36:50', '2019-02-07 09:36:50'),
(4, '1549539411-t4.png', 't-shert 4', '2019-02-07 09:36:51', '2019-02-07 09:36:51'),
(5, '1549539411-t5.png', 't-shert 5', '2019-02-07 09:36:51', '2019-02-07 09:36:51'),
(7, '1549542530-t4.png', 'Quran 2', '2019-02-07 10:28:50', '2019-02-07 10:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_num` int(11) NOT NULL,
  `available_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `best_offer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_ar`, `name_en`, `main_image`, `short_description_ar`, `short_description_en`, `price`, `description_ar`, `description_en`, `size`, `category_id`, `product_num`, `available_count`, `created_at`, `updated_at`, `best_offer`) VALUES
(4, 'هودو حريمي', 'hood women', '1549388849-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '250', 'تي شيرت حريمي', 'women t-shert for all women sizes', 'S|M|L|X', 2, 430502, 0, '2019-02-05 15:47:29', '2019-02-24 15:34:40', NULL),
(7, 'تي شيرت 2', 't-shert 2', '1549483654-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '120', 'asdsadads', 'adsaadsd', '3X', 1, 966682, 0, '2019-01-29 10:51:45', '2019-02-24 10:56:09', NULL),
(8, 'تي شيرت 1', 't-shert 1', '1548769815-1536588793.jpg', 'تي شيرت رجالي', 'men t-shert', '150', 'asdsadads', 'adsaadsd', 'S|M|L', 1, 143988, 0, '2019-01-29 10:51:28', '2019-02-17 15:32:21', NULL),
(9, 'تي شيرت 2', 't-shert 2', '1549483654-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '120', 'asdsadads', 'adsaadsd', '3X', 1, 966689, 0, '2019-01-29 10:51:45', '2019-02-17 15:48:33', NULL),
(10, 'تي شيرت', 't-shert', '1551356170-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 731117, 15, '2019-02-28 10:16:10', '2019-02-28 10:16:10', NULL),
(11, 'تي شيرت', 't-shert', '1551356352-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 716305, 15, '2019-02-28 10:19:12', '2019-02-28 10:19:12', NULL),
(12, 'تي شيرت', 't-shert', '1551356370-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 920991, 15, '2019-02-28 10:19:30', '2019-02-28 10:19:30', NULL),
(13, 'تي شيرت', 't-shert', '1551357054-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 753352, 15, '2019-02-28 10:30:54', '2019-02-28 10:30:54', NULL),
(14, 'تي شيرت', 't-shert', '1551357564-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 98960, 15, '2019-02-28 10:39:24', '2019-02-28 10:39:24', NULL),
(15, 'تي شيرت', 't-shert', '1551357736-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 392387, 15, '2019-02-28 10:42:16', '2019-02-28 10:42:16', NULL),
(16, 'تي شيرت', 't-shert', '1551357831-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 704250, 15, '2019-02-28 10:43:51', '2019-02-28 10:43:51', NULL),
(17, 'تي شيرت', 't-shert', '1551359176-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 36011, 15, '2019-02-28 11:06:16', '2019-02-28 11:06:16', NULL),
(18, 'تي شيرت', 't-shert', '1551359229-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 781001, 15, '2019-02-28 11:07:09', '2019-02-28 11:07:09', NULL),
(19, 'تي شيرت', 't-shert', '1551359333-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 853789, 15, '2019-02-28 11:08:53', '2019-02-28 11:08:53', NULL),
(20, 'تي شيرت', 't-shert', '1551359379-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 123205, 15, '2019-02-28 11:09:39', '2019-02-28 11:09:39', NULL),
(21, 'تي شيرت', 't-shert', '1551359422-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 668012, 15, '2019-02-28 11:10:22', '2019-02-28 11:10:22', NULL),
(22, 'تي شيرت', 't-shert', '1551359523-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 298033, 15, '2019-02-28 11:12:03', '2019-02-28 11:12:03', NULL),
(23, 'تي شيرت', 't-shert', '1551359546-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 939483, 15, '2019-02-28 11:12:26', '2019-02-28 11:12:26', NULL),
(24, 'تي شيرت', 't-shert', '1551359660-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '300', 'تي شيرت حريمي', 'women t-shert', 'M|L', 2, 805152, 15, '2019-02-28 11:14:20', '2019-02-28 11:14:20', NULL),
(25, 'تي شيرت', 't-shert', '1551359763-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 466983, 12, '2019-02-28 11:16:03', '2019-02-28 11:16:03', NULL),
(26, 'تي شيرت', 't-shert', '1551360155-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 159484, 12, '2019-02-28 11:22:35', '2019-02-28 11:22:35', NULL),
(27, 'تي شيرت', 't-shert', '1551360270-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 304537, 12, '2019-02-28 11:24:30', '2019-02-28 11:24:30', NULL),
(28, 'تي شيرت', 't-shert', '1551360370-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 644112, 12, '2019-02-28 11:26:10', '2019-02-28 11:26:10', NULL),
(29, 'تي شيرت', 't-shert', '1551360441-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 95553, 12, '2019-02-28 11:27:21', '2019-02-28 11:27:21', NULL),
(30, 'تي شيرت', 't-shert', '1551360561-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 248824, 12, '2019-02-28 11:29:21', '2019-02-28 11:29:21', NULL),
(31, 'تي شيرت', 't-shert', '1551360639-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 453322, 12, '2019-02-28 11:30:39', '2019-02-28 11:30:39', NULL),
(32, 'تي شيرت', 't-shert', '1551360755-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 986793, 12, '2019-02-28 11:32:35', '2019-02-28 11:32:35', NULL),
(33, 'تي شيرت', 't-shert', '1551360970-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 805581, 12, '2019-02-28 11:36:10', '2019-02-28 11:36:10', NULL),
(34, 'تي شيرت', 't-shert', '1551361327-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 449249, 12, '2019-02-28 11:42:07', '2019-02-28 11:42:07', NULL),
(35, 'تي شيرت', 't-shert', '1551361406-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 250739, 12, '2019-02-28 11:43:26', '2019-02-28 11:43:26', NULL),
(36, 'تي شيرت', 't-shert', '1551361517-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 262132, 12, '2019-02-28 11:45:17', '2019-02-28 11:45:17', NULL),
(37, 'تي شيرت', 't-shert', '1551362191-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 780852, 12, '2019-02-28 11:56:31', '2019-02-28 11:56:31', NULL),
(38, 'تي شيرت', 't-shert', '1551362212-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 859188, 12, '2019-02-28 11:56:52', '2019-02-28 11:56:52', NULL),
(39, 'تي شيرت', 't-shert', '1551362241-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 495905, 12, '2019-02-28 11:57:21', '2019-02-28 11:57:21', NULL),
(40, 'تي شيرت', 't-shert', '1551362650-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 402499, 12, '2019-02-28 12:04:10', '2019-02-28 12:04:10', NULL),
(41, 'تي شيرت', 't-shert', '1551362749-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 496369, 12, '2019-02-28 12:05:49', '2019-02-28 12:05:49', NULL),
(42, 'تي شيرت', 't-shert', '1551364064-b-off-picts.png', 'تي شيرت رجالي', 'men t-shert', '212', 'تي شيرت رجالي', 'men t-shert', 'S', 1, 480415, 12, '2019-02-28 12:27:44', '2019-02-28 12:27:44', NULL),
(43, 'تي شيرت', 't-shert', '1551374097-a-pic1.png', 'تي شيرت حريمي', 'men t-shert', '232', 'sad', 'asd', 'M|L', 1, 546209, 20, '2019-02-28 15:14:57', '2019-02-28 15:14:57', NULL),
(44, 'تي شيرت', 't-shert', '1551374858-a-pic1.png', 'تي شيرت حريمي', 'men t-shert', '232', 'sad', 'asd', 'M|L', 1, 580714, 20, '2019-02-28 15:27:38', '2019-02-28 15:27:38', NULL),
(45, 'تي شيرت', 't-shert', '1551375153-a-pic1.png', 'تي شيرت حريمي', 'men t-shert', '232', 'sad', 'asd', 'M|L', 1, 644557, 20, '2019-02-28 15:32:33', '2019-02-28 15:32:33', NULL),
(46, 'تي شيرت', 't-shert', '1551375203-a-pic1.png', 'تي شيرت حريمي', 'men t-shert', '232', 'sad', 'asd', 'M|L', 1, 555098, 20, '2019-02-28 15:33:23', '2019-02-28 15:33:23', NULL),
(47, 'تي شيرت', 't-shert', '1551375242-a-pic1.png', 'تي شيرت حريمي', 'men t-shert', '232', 'sad', 'asd', 'M|L', 1, 253718, 20, '2019-02-28 15:34:02', '2019-02-28 15:34:02', NULL),
(48, 'تي شيرت', 't-shert111', '1551385711-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 426656, 20, '2019-02-28 18:28:31', '2019-02-28 18:28:31', NULL),
(49, 'تي شيرت', 't-shert111', '1551385732-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 708182, 20, '2019-02-28 18:28:52', '2019-02-28 18:28:52', NULL),
(50, 'تي شيرت', 't-shert111', '1551385936-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 586211, 20, '2019-02-28 18:32:16', '2019-02-28 18:32:16', NULL),
(51, 'تي شيرت', 't-shert111', '1551385973-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 355924, 20, '2019-02-28 18:32:53', '2019-02-28 18:32:53', NULL),
(52, 'تي شيرت', 't-shert111', '1551386187-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 366231, 20, '2019-02-28 18:36:27', '2019-02-28 18:36:27', NULL),
(53, 'تي شيرت', 't-shert111', '1551386211-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 325802, 20, '2019-02-28 18:36:51', '2019-02-28 18:36:51', NULL),
(54, 'تي شيرت', 't-shert111', '1551386222-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 889202, 20, '2019-02-28 18:37:02', '2019-02-28 18:37:02', NULL),
(55, 'تي شيرت', 't-shert111', '1551386276-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 413094, 20, '2019-02-28 18:37:56', '2019-02-28 18:37:56', NULL),
(56, 'تي شيرت', 't-shert111', '1551386338-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 663871, 20, '2019-02-28 18:38:58', '2019-02-28 18:38:58', NULL),
(57, 'تي شيرت', 't-shert111', '1551386352-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 820646, 20, '2019-02-28 18:39:12', '2019-02-28 18:39:12', NULL),
(58, 'تي شيرت', 't-shert111', '1551386379-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 278979, 20, '2019-02-28 18:39:39', '2019-02-28 18:39:39', NULL),
(59, 'تي شيرت', 't-shert111', '1551386393-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 279871, 20, '2019-02-28 18:39:53', '2019-02-28 18:39:53', NULL),
(60, 'تي شيرت', 't-shert111', '1551386760-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 271433, 20, '2019-02-28 18:46:00', '2019-02-28 18:46:00', NULL),
(61, 'تي شيرت', 't-shert111', '1551387593-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 592318, 20, '2019-02-28 18:59:53', '2019-02-28 18:59:53', NULL),
(62, 'تي شيرت', 't-shert111', '1551387634-a-pic1.png', 'asd', 'asd', '1', 'asd', 'dsa', 'L', 1, 493923, 20, '2019-02-28 19:00:34', '2019-02-28 19:00:34', NULL),
(63, 'تي شيرت', 't-shert', '1551387749-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 768388, 20, '2019-02-28 19:02:29', '2019-02-28 19:02:29', NULL),
(64, 'تي شيرت', 't-shert', '1551387791-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 442192, 20, '2019-02-28 19:03:11', '2019-02-28 19:03:11', NULL),
(65, 'تي شيرت', 't-shert', '1551387875-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 286686, 20, '2019-02-28 19:04:35', '2019-02-28 19:04:35', NULL),
(66, 'تي شيرت', 't-shert', '1551388051-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 496014, 20, '2019-02-28 19:07:31', '2019-02-28 19:07:31', NULL),
(67, 'تي شيرت', 't-shert', '1551388075-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 735856, 20, '2019-02-28 19:07:55', '2019-02-28 19:07:55', NULL),
(68, 'تي شيرت', 't-shert', '1551388193-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 32687, 20, '2019-02-28 19:09:53', '2019-02-28 19:09:53', NULL),
(69, 'تي شيرت', 't-shert', '1551389016-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 523382, 20, '2019-02-28 19:23:36', '2019-02-28 19:23:36', NULL),
(70, 'تي شيرت', 't-shert', '1551389933-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 834362, 20, '2019-02-28 19:38:53', '2019-02-28 19:38:53', NULL),
(71, 'تي شيرت', 't-shert', '1551389972-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 836375, 20, '2019-02-28 19:39:32', '2019-02-28 19:39:32', NULL),
(72, 'تي شيرت', 't-shert', '1551390597-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 41758, 20, '2019-02-28 19:49:57', '2019-02-28 19:49:57', NULL),
(73, 'تي شيرت', 't-shert', '1551390629-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 741643, 20, '2019-02-28 19:50:29', '2019-02-28 19:50:29', NULL),
(74, 'تي شيرت', 't-shert', '1551391793-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '77', 'jjj', 'jjjj', 'L', 1, 774091, 20, '2019-02-28 20:09:53', '2019-02-28 20:09:53', NULL),
(75, 'asd', 'asd', '1551391880-a-pic.png', 'asd', 'asd', '2', 'sad', 'ads', 'M', 2, 986101, 20, '2019-02-28 20:11:20', '2019-02-28 20:11:20', NULL),
(76, 'asd', 'asd', '1551391965-a-pic.png', 'asd', 'asd', '2', 'sad', 'ads', 'M', 2, 414397, 20, '2019-02-28 20:12:45', '2019-02-28 20:12:45', NULL),
(77, 'asd', 'asd', '1551392000-a-pic.png', 'asd', 'asd', '2', 'sad', 'ads', 'M', 2, 684664, 20, '2019-02-28 20:13:20', '2019-02-28 20:13:20', NULL),
(78, 'asd', 'asd', '1551392006-a-pic.png', 'asd', 'asd', '2', 'sad', 'ads', 'M', 2, 284584, 20, '2019-02-28 20:13:26', '2019-02-28 20:13:26', NULL),
(79, 'asd', 'asd', '1551392030-a-pic.png', 'asd', 'asd', '2', 'sad', 'ads', 'M', 2, 653274, 20, '2019-02-28 20:13:50', '2019-02-28 20:13:50', NULL),
(80, 'asd', 'asd', '1551392331-a-pic.png', 'asd', 'asd', '2', 'sad', 'ads', 'M', 2, 29932, 20, '2019-02-28 20:18:51', '2019-02-28 20:18:51', NULL),
(81, 'asd', 'asd', '1551392550-a-pic.png', 'asd', 'asd', '2', 'sad', 'ads', 'M', 2, 748325, 20, '2019-02-28 20:22:30', '2019-02-28 20:22:30', NULL),
(82, 'asd', 'asd', '1551392644-a-pic.png', 'asd', 'asd', '2', 'sad', 'ads', 'M', 2, 706570, 20, '2019-02-28 20:24:04', '2019-02-28 20:24:04', NULL),
(83, 'asd', 'asd', '1551392713-a-pic.png', 'asd', 'asd', '2', 'sad', 'ads', 'M', 2, 760517, 20, '2019-02-28 20:25:13', '2019-02-28 20:25:13', NULL),
(84, 'asd', 'asd', '1551393185-a-pic.png', 'asd', 'asd', '2', 'sad', 'ads', 'M', 2, 184233, 20, '2019-02-28 20:33:05', '2019-02-28 20:33:05', NULL),
(85, 'تي شيرت', 't-shert', '1551535530-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '333', 'hhh', 'kkk', 'M', 1, 999005, 20, '2019-03-02 12:05:30', '2019-03-02 12:05:30', NULL),
(86, 'تي شيرت', 't-shert', '1551535633-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '333', 'hhh', 'kkk', 'M', 1, 432202, 20, '2019-03-02 12:07:13', '2019-03-02 12:07:13', NULL),
(87, 'تي شيرت', 't-shert', '1551538506-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '22', 'as', 'asa', 'L', 1, 873623, 20, '2019-03-02 12:55:06', '2019-03-02 12:55:06', NULL),
(88, 'تي شيرت', 't-shert', '1551539021-a-pic.png', 'تي شيرت حريمي', 'women t-shert', '22', 'as', 'asa', 'L', 1, 57873, 20, '2019-03-02 13:03:41', '2019-03-02 13:03:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(6, '1549403623-contact1.png', 4, '2019-02-05 19:53:43', '2019-02-05 19:53:43'),
(7, '1549403623-Layer 15.jpg', 4, '2019-02-05 19:53:43', '2019-02-05 19:53:43'),
(8, '1549403623-Layer 16.jpg', 4, '2019-02-05 19:53:43', '2019-02-05 19:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_user`
--

CREATE TABLE `product_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_user`
--

INSERT INTO `product_user` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 12, 1, NULL, NULL),
(2, 11, 1, NULL, NULL),
(3, 13, 1, NULL, NULL),
(4, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `siteTitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_ar` text COLLATE utf8mb4_unicode_ci,
  `about_en` text COLLATE utf8mb4_unicode_ci,
  `about_section1_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'a-pic.png',
  `about_section2_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'a-pic1.png',
  `vision_ar` text COLLATE utf8mb4_unicode_ci,
  `vision_en` text COLLATE utf8mb4_unicode_ci,
  `mission_ar` text COLLATE utf8mb4_unicode_ci,
  `mission_en` text COLLATE utf8mb4_unicode_ci,
  `goals_ar` text COLLATE utf8mb4_unicode_ci,
  `goals_en` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `siteTitle`, `tags`, `description`, `about_ar`, `about_en`, `about_section1_image`, `about_section2_image`, `vision_ar`, `vision_en`, `mission_ar`, `mission_en`, `goals_ar`, `goals_en`, `phone`, `phone2`, `facebook`, `twitter`, `instagram`, `google_plus`, `site_url`, `site_email`, `address_en`, `address_ar`, `created_at`, `updated_at`) VALUES
(1, 'box store', NULL, 'description', 'عن الموقع', 'about us', '1548880751.png', '1548881047.png', 'رؤيتنا', 'vision', 'رسالتنا', 'mission', 'أهدافنا', 'goals', '01151899828', '01063678520', NULL, NULL, NULL, NULL, NULL, 'boxstore@gmail.com', 'El Hay El Sabe , Madinet Naser, cairo, Egypt', 'الحي السابع , مدينة نصر', NULL, '2019-02-18 15:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'mohammedmaray9674@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `city_name_ar`, `city_name_en`, `value`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', 'cairo', 40, NULL, NULL),
(2, 'الجيزه', 'giza', 45, NULL, NULL),
(3, 'أسوان', 'Aswan', 85, '2019-02-24 13:18:41', '2019-02-24 13:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `email_verified_at`, `password`, `city_id`, `gender`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohammed', 'maray 22', 'user@user.com', NULL, '$2y$10$IWOPZfndC6VNGxck8I3JaOMGEpQU3Jymi5..D8w4SFS7IllWG5HxC', 'Cairo', 'male', 'InQXgToZJYkmt20tSrTFaHsDuNZRhrTTyGrUHdFVjpVpf2Jk3QwJo5lYKBCh', '2019-01-31 15:12:04', '2019-02-12 12:47:27'),
(2, 'ahmed', 'marey', 'ahmed@gmail.com', NULL, '$2y$10$EQy7N1ijjGkFchCK6fIqPOr8y7.HsEyjm1Pa/h00USazF0d/5MgAy', 'Cairo', 'male', 'Y5GPHdjrK1XyDVgyLlxBZx2ZnhknGJ951hcGaqsc59MxEjZV36yRna8Z8qRZ', '2019-02-04 18:20:44', '2019-02-04 18:42:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_discount_id_foreign` (`discount_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `print_designs`
--
ALTER TABLE `print_designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print_images`
--
ALTER TABLE `print_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_num_unique` (`product_num`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_user`
--
ALTER TABLE `product_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_user_product_id_foreign` (`product_id`),
  ADD KEY `product_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `print_designs`
--
ALTER TABLE `print_designs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `print_images`
--
ALTER TABLE `print_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_user`
--
ALTER TABLE `product_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_user`
--
ALTER TABLE `product_user`
  ADD CONSTRAINT `product_user_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
