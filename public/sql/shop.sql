-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-07-2018 a las 12:33:00
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_date` date DEFAULT NULL,
  `arrived_date` date DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `carts`
--

INSERT INTO `carts` (`id`, `order_date`, `arrived_date`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Pendiente', 2, '2018-06-22 17:52:43', '2018-06-26 15:24:07'),
(2, NULL, NULL, 'Active', 2, '2018-06-26 15:47:45', '2018-06-26 15:47:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_details`
--

DROP TABLE IF EXISTS `cart_details`;
CREATE TABLE IF NOT EXISTS `cart_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) NOT NULL DEFAULT '0',
  `cart_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_details_cart_id_foreign` (`cart_id`),
  KEY `cart_details_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cart_details`
--

INSERT INTO `cart_details` (`id`, `cantidad`, `descuento`, `cart_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 1, 1, '2018-06-22 18:11:53', '2018-06-22 18:11:53'),
(7, 1, 0, 2, 1, '2018-06-26 15:47:45', '2018-06-26 15:47:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `nombre`, `descripcion`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Quae', 'Nihil temporibus ipsum autem error iste.', NULL, '2018-06-18 22:42:22', '2018-06-18 22:42:22'),
(2, 'Veniam', 'Labore laboriosam laboriosam et optio aut cumque.', NULL, '2018-06-18 22:42:22', '2018-06-18 22:42:22'),
(3, 'Labore', 'Est molestias praesentium est aut atque.', NULL, '2018-06-18 22:42:22', '2018-06-18 22:42:22'),
(4, 'Ducimus', 'Eum cumque non sit.', NULL, '2018-06-18 22:42:22', '2018-06-18 22:42:22'),
(5, 'Fuba', 'Tempora temporibus repellat et sint quidem.', NULL, '2018-06-18 22:42:22', '2018-06-27 16:49:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_18_141440_create_categories_table', 2),
(4, '2018_06_18_144933_create_products_table', 3),
(5, '2018_06_18_192912_create_product_images_table', 4),
(6, '2018_06_20_185927_add_column_users_admin', 5),
(7, '2018_06_22_090758_create_carts_table', 6),
(8, '2018_06_22_090923_create_cart_details_table', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_larga` text COLLATE utf8_spanish2_ci,
  `precio` double(8,2) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombre`, `descripcion`, `descripcion_larga`, `precio`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'pariatur', 'Eum laudantium id explicabo quaerat magni.', 'Sunt ut et impedit aspernatur voluptates cupiditate eos. Minus voluptas et modi consequatur. Pariatur fuga quod hic reprehenderit aliquam sint autem.', 36.26, 1, '2018-06-18 21:22:50', '2018-06-20 17:41:34'),
(2, 'neque', 'Sit rerum ipsam voluptatem eum sed qui esse vitae.', 'Ipsam suscipit dignissimos recusandae eum. Tempore atque qui a consequatur. Nobis in aperiam adipisci illo. Delectus pariatur ex quos rerum quo at.', 47.02, 2, '2018-06-18 21:22:50', '2018-06-18 21:22:50'),
(4, 'enim', 'Dolore id id ipsa provident exercitationem ipsam.', 'Et omnis exercitationem quam laudantium. Eveniet qui recusandae ut non nostrum quaerat aut. Necessitatibus expedita alias qui beatae ad expedita ipsa et.', 24.30, 4, '2018-06-18 21:22:50', '2018-06-18 21:22:50'),
(5, 'nulla', 'Ipsum mollitia et aut dolorem.', 'Maiores numquam qui enim omnis voluptas cum modi. Quod aliquam ea quia et tenetur ea. Voluptatem ratione natus sint et qui odit aut.', 4.30, 5, '2018-06-18 21:22:50', '2018-06-18 21:22:50'),
(6, 'sed', 'Dignissimos voluptas ut in.', 'Voluptatum laudantium nemo vitae hic quaerat hic. Laboriosam fugit et dolor id porro id. Iste qui architecto nihil qui accusamus et. Id vitae ratione error quibusdam.', 23.58, 2, '2018-06-18 21:22:50', '2018-06-18 21:22:50'),
(7, 'Voluptatem', 'Ex molestiae rerum.', 'Voluptatem alias eum voluptatem distinctio ullam saepe nulla.', 18.91, 1, '2018-06-18 21:22:50', '2018-06-20 17:37:16'),
(8, 'et', 'Id et ipsam placeat dicta dicta corporis.', 'Ipsa omnis officia repudiandae. Vero impedit inventore qui. Praesentium nam sed quos cum harum qui ad rem.', 4.77, 1, '2018-06-18 21:22:50', '2018-06-18 21:22:50'),
(9, 'error', 'Vel ut nihil mollitia explicabo nobis.', 'Unde consequatur ea eligendi maiores ipsa deleniti. Laudantium sequi vero cupiditate fugiat debitis error officia. Et vel veniam vel maxime.', 19.32, 2, '2018-06-18 21:22:50', '2018-06-18 21:22:50'),
(10, 'expedita', 'Sed officia rerum sint ut.', 'Dolor nam quia et ducimus impedit corrupti omnis molestias. Eaque sequi odio aut quod voluptatibus earum in at. Saepe qui quasi sed qui et ut nisi.', 48.35, 4, '2018-06-18 21:22:50', '2018-06-18 21:22:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `destacado` tinyint(1) NOT NULL DEFAULT '0',
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `product_images`
--

INSERT INTO `product_images` (`id`, `imagen`, `destacado`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'https://lorempixel.com/250/250/?26947', 0, 6, '2018-06-18 22:43:44', '2018-06-18 22:43:44'),
(2, 'https://lorempixel.com/250/250/?72827', 0, 5, '2018-06-18 22:43:44', '2018-06-18 22:43:44'),
(3, 'https://lorempixel.com/250/250/?44698', 0, 3, '2018-06-18 22:43:44', '2018-06-18 22:43:44'),
(4, 'https://lorempixel.com/250/250/?20662', 0, 8, '2018-06-18 22:43:44', '2018-06-18 22:43:44'),
(5, 'https://d3lfzbr90tctqz.cloudfront.net/epi/resource/r/all-in-one-exo-l6x-h1545-intel-celeron/9fde7dd80462c96f80324622c1ffa1b1f2938ff812cbef43d79dfc297cb45605_250', 0, 1, '2018-06-18 22:43:44', '2018-06-18 22:43:44'),
(6, 'https://lorempixel.com/250/250/?41726', 0, 9, '2018-06-18 22:43:44', '2018-06-18 22:43:44'),
(7, 'https://lorempixel.com/250/250/?74581', 0, 4, '2018-06-18 22:43:44', '2018-06-18 22:43:44'),
(9, 'https://lorempixel.com/250/250/?29487', 0, 5, '2018-06-18 22:43:44', '2018-06-18 22:43:44'),
(10, 'https://lorempixel.com/250/250/?22566', 0, 2, '2018-06-18 22:43:44', '2018-06-18 22:43:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(1, 'sejo', 'sejo@mail.com', '$2y$10$Lv8oPndoQxhFeH5uz7n6ZuB.RBcpQkAHQIQiQArRXQLQ9uNVjdAKK', 'XrGonmVecL1TOB71mwuYWKcMFmPPyZs0EHvUu0M0WZeZ2II1wB4pVcvODLHY', '2018-06-18 14:05:59', '2018-06-18 14:05:59', 1),
(2, 'Juan', 'juan@mail.com', '$2y$10$JvtJYGqm/ZOGacd57XUtm.NTKFLtsu8dPq8evdjg8cvXkdlHIWp5e', 'Eo0EIG6ZvoqvqNPMudtlWZXcQeAbi9M7S9dbI22FCkMx7jvwZClqpJPHa7YU', '2018-06-18 19:02:35', '2018-06-18 19:02:35', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
