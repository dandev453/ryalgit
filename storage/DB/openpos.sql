-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2022 a las 15:57:00
-- Versión del servidor: 5.7.17
-- Versión de PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `openpos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'CURSOS', '63895b590d94f_.jpg', '2022-11-30 22:36:11', '2022-12-02 05:56:41'),
(2, 'CALZADOS', '6397327e7a9a5_.png', '2022-11-30 22:36:11', '2022-12-12 17:54:50'),
(3, 'CELULARES', '63895a5b19cd7_.png', '2022-11-30 22:36:11', '2022-12-02 05:52:27'),
(4, 'COMPUTADORES', '6390be2b91b5a_.jpg', '2022-11-30 22:36:11', '2022-12-07 20:24:11'),
(5, 'CEREALES INTEGRAL', '63895a3718464_.jpg', '2022-12-02 05:51:40', '2022-12-03 16:36:28'),
(6, 'PARA CABALLERO', '6390bd7295e0b_.jpg', '2022-12-03 16:51:27', '2022-12-07 20:21:06'),
(7, 'ELÉCTRONICA', '639354d0a3405_.jpg', '2022-12-08 06:15:16', '2022-12-09 19:31:28'),
(8, 'LIMPIEZA', '639730c5b4a77_.jpg', '2022-12-12 17:46:31', '2022-12-12 17:46:45'),
(9, 'BEBIDAS', '639731f38821a_.jpg', '2022-12-12 17:51:33', '2022-12-12 17:51:47'),
(10, 'HIGIENE PERSONAL', '639733b4c54f6_.jpg', '2022-12-12 17:58:58', '2022-12-12 17:59:16'),
(11, 'HERRAMIENTAS Y PARA EL HOGAR', '6397360e7e207_.jpg', '2022-12-12 18:08:48', '2022-12-12 18:09:18'),
(12, 'COSMETICOS', '6397369738a19_.jpg', '2022-12-12 18:11:23', '2022-12-12 18:11:35'),
(13, 'SALSAS Y ADERESOS', '639737f7d1dce_.jpg', '2022-12-12 18:13:25', '2022-12-12 18:18:33'),
(14, 'TEXTILES DE HOGAR Y DECORACIÓN', '63973a629cbaa_.webp', '2022-12-12 18:26:44', '2022-12-12 18:27:46'),
(15, 'SNACKS', '63973b5744616_.png', '2022-12-12 18:31:24', '2022-12-12 18:31:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxpayer_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denominations`
--

CREATE TABLE `denominations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('BILLETE','MONEDA','OTRO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BILLETE',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `denominations`
--

INSERT INTO `denominations` (`id`, `type`, `value`, `image`, `created_at`, `updated_at`) VALUES
(1, 'BILLETE', '1000', NULL, '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(2, 'BILLETE', '500', NULL, '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(3, 'BILLETE', '200', NULL, '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(4, 'BILLETE', '100', NULL, '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(5, 'BILLETE', '50', NULL, '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(6, 'MONEDA', '10', NULL, '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(7, 'BILLETE', '20', NULL, '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(8, 'MONEDA', '5', NULL, '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(9, 'MONEDA', '1', NULL, '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(10, 'MONEDA', '0.5', NULL, '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(11, 'OTRO', '0', NULL, '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(12, 'OTRO', 'MONEDAS BITCOIN', NULL, '2022-12-03 16:37:50', '2022-12-03 16:37:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_07_24_045623_create_categories_table', 1),
(6, '2021_07_24_045955_create_products_table', 1),
(7, '2021_08_11_012449_create_permission_tables', 1),
(8, '2022_11_18_220047_companies_table', 1),
(9, '2022_11_18_220826_denominations_table', 1),
(10, '2022_11_18_223633_sales_table', 1),
(11, '2022_11_19_100905_sale_details_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'category.index', 'web', '2022-11-30 23:51:16', '2022-11-30 23:51:16'),
(2, 'category.edit', 'web', '2022-12-01 16:42:22', '2022-12-01 16:42:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock` int(11) NOT NULL,
  `alerts` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `barcode`, `cost`, `price`, `stock`, `alerts`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'LARAVEL LIVEWIRE', '750100655987', '200.00', '200.00', 100, 10, '6387acd56d33d_.gif', 1, '2022-11-30 22:36:11', '2022-11-30 23:19:49'),
(2, 'RUNNING NIKE', '750100655014', '200.00', '200.00', 100, 10, '63973c8e10585_.jpg', 2, '2022-11-30 22:36:11', '2022-12-12 18:37:02'),
(3, 'IPHONE 11', '750100655541', '900.00', '100.00', 20, 5, '6387aca1991c9_.png', 3, '2022-11-30 22:36:11', '2022-12-01 18:10:21'),
(4, 'PC GAMER', '750100655812', '790.00', '190.00', 200, 10, '6387acc20a664_.jpg', 4, '2022-11-30 22:36:11', '2022-11-30 23:19:30'),
(5, 'item prueba', '759101615731', '20.00', '200.00', 200, 2, '6388b61f4d9bb_.png', 1, '2022-12-01 12:42:08', '2022-12-01 18:11:43'),
(6, 'DESODORANTE AXE', '7791293025803', '80.00', '80.00', 100, 10, '6388d880566c2_.jpg', 10, '2022-12-01 20:37:47', '2022-12-12 18:01:26'),
(7, 'JABON PROTEX', '7702010420337', '35.00', '35.00', 100, 10, '6388d8e0701e3_.jpg', 10, '2022-12-01 20:40:00', '2022-12-12 18:00:32'),
(8, 'SET DE SABANAS HOME LIVING', '7450004059062', '60.00', '60.00', 100, 10, '6388d9f7ef201_.jpg', 14, '2022-12-01 20:44:05', '2022-12-12 18:28:13'),
(9, 'PAPEL HIGIENICO BLOOM', '781159412981', '45.00', '45.00', 100, 10, '638945039d545_.jpg', 10, '2022-12-01 20:47:24', '2022-12-12 18:04:58'),
(10, 'AUDIFONOS MARCA SAMSUNG XG.', '6999969795659', '100.00', '100.00', 10, 10, '6388db2e450b0_.webp', 7, '2022-12-01 20:49:50', '2022-12-12 17:50:10'),
(11, 'Crema dental colgate triple acción 100ml', '7509546000343', '28.00', '28.00', 100, 10, '638933381bc1b_.jpg', 10, '2022-12-02 03:03:23', '2022-12-12 18:05:34'),
(12, 'Jabón las llaves limpieza activa', '75971670', '6.00', '6.00', 1000, 10, '63893465e35a3_.jpg', 10, '2022-12-02 03:10:29', '2022-12-12 18:00:11'),
(13, 'Cepillo dental colgate', '6910021007206', '9.45', '9.45', 100, 10, '638935f70f2eb_.jpg', 10, '2022-12-02 03:17:11', '2022-12-12 18:04:38'),
(14, 'Morfose ossion Hair style', '8699009441710', '39.00', '39.00', 100, 10, '63893698ecd7c_.jpg', 10, '2022-12-02 03:19:52', '2022-12-12 18:06:34'),
(15, 'Club social integral 156 g 6 unidades', '7622210611307', '25.00', '25.00', 100, 10, '63893817d9454_.jpg', 5, '2022-12-02 03:26:15', '2022-12-12 18:05:14'),
(16, 'kchis kesito tosineta 145g', '7592708001777', '18.90', '18.90', 100, 10, '63893b5c0a964_.jpg', 15, '2022-12-02 03:40:12', '2022-12-12 18:33:40'),
(17, 'Belvita hony bran', '7590011890910', '25.90', '25.90', 100, 10, '63893d1d9a00b_.jpg', 5, '2022-12-02 03:44:50', '2022-12-12 17:41:58'),
(18, 'Café JP gourmet 500g', '7595531000030', '61.90', '61.90', 100, 10, '63893d94bc2a5_.jpg', 9, '2022-12-02 03:49:40', '2022-12-12 18:06:03'),
(19, 'Avena quaker en hojuela 900g', '7591184002001', '47.25', '47.25', 100, 10, '63893e9fa1aff_.jpg', 5, '2022-12-02 03:54:07', '2022-12-12 17:41:31'),
(20, 'Susy choco 200g', '7591016154724', '32.78', '32.78', 100, 10, '6389405a464c3_.jpg', 15, '2022-12-02 03:58:30', '2022-12-12 18:50:27'),
(21, 'Galletas Marria tentazione italia 200g', '7597089000029', '28.91', '28.92', 100, 10, '638940e46b392_.jpg', 5, '2022-12-02 04:03:48', '2022-12-12 17:48:39'),
(22, 'galletas soda puig', '7591082000048', '25.99', '25.99', 100, 10, '6389416d80d9f_.jpg', 15, '2022-12-02 04:06:05', '2022-12-12 18:50:43'),
(23, 'Galletas sorbeticos vainilla 120g', '7590011890972', '13.28', '13.28', 100, 10, '6389432465217_.jpg', 15, '2022-12-02 04:12:09', '2022-12-12 18:51:16'),
(24, 'Doritos mega queso 150g', '7591206003252', '26.70', '26.70', 100, 10, '638943bfbe9d4_.jpg', 15, '2022-12-02 04:15:59', '2022-12-12 18:33:15'),
(25, 'Desodorante speed tick 24/7 50g', '7509546052755', '47.50', '47.50', 100, 10, '638944abb7333_.jpg', 10, '2022-12-02 04:19:55', '2022-12-12 18:01:12'),
(26, 'Detergente alive 900g', '7597597003000', '28.91', '28.91', 100, 10, '63894702e611e_.jpg', 8, '2022-12-02 04:29:54', '2022-12-12 18:32:48'),
(28, 'Cinturon para cabllero', '017149661412', '32.00', '32.00', 99, 10, '638b46dc69b54_.jpg', 6, '2022-12-03 16:53:02', '2022-12-03 16:54:53'),
(29, 'Leche purisima', '7591210000575', '24.00', '24.00', 100, 10, '638b6b69127ad_.jpg', 9, '2022-12-03 19:29:06', '2022-12-12 17:56:54'),
(30, 'Polvo compacto silky soft ', '7591566015841', '100.00', '100.00', 100, 10, '638b6bec5eb6c_.jpg', 12, '2022-12-03 19:31:56', '2022-12-12 18:12:12'),
(31, 'Metylosa supergel', '7591288658623', '50.00', '50.00', 100, 10, '638b6c4e3a400_.jpg', 11, '2022-12-03 19:33:34', '2022-12-12 18:09:45'),
(32, 'Tang bebida mezcla en polvo', '7622201676360', '18.00', '18.00', 100, 10, '638b6cc6b2da4_.jpg', 9, '2022-12-03 19:35:34', '2022-12-12 17:56:27'),
(33, 'Mini printer xprinter modelo pos58', '58IIHBU24220027', '99.00', '99.00', 100, 100, '638b6d809ffe5_.jpg', 7, '2022-12-03 19:38:40', '2022-12-12 18:03:17'),
(34, 'Ketchup underwood tomatoes 397g', '7591072005978', '1.87', '1.87', 100, 10, '638b6eab837c2_.jpg', 13, '2022-12-03 19:43:39', '2022-12-12 18:18:17'),
(35, 'Handheld1d 2D barcode Scanner Model WH5600-2D', 'WH56002D22F28562', '45.00', '45.00', 100, 10, '638b700a037ac_.jpg', 7, '2022-12-03 19:49:30', '2022-12-12 18:02:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-11-30 23:35:20', '2022-11-30 23:35:20'),
(2, 'customer', 'web', '2022-12-01 12:25:13', '2022-12-01 12:25:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `items` int(11) NOT NULL,
  `cash` decimal(10,2) NOT NULL,
  `change` decimal(10,2) NOT NULL,
  `status` enum('PAID','PENDING','CANCELLED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PAID',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `total`, `items`, `cash`, `change`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(7, '580.58', 16, '580.58', '0.00', 'PAID', 11, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(8, '164.90', 6, '164.90', '0.00', 'PAID', 11, '2022-12-02 04:54:25', '2022-12-02 04:54:25'),
(9, '49.45', 2, '49.45', '0.00', 'PAID', 11, '2022-12-02 04:59:44', '2022-12-02 04:59:44'),
(10, '32.00', 1, '32.00', '0.00', 'PAID', 11, '2022-12-03 16:54:53', '2022-12-03 16:54:53'),
(11, '99.00', 1, '99.00', '0.00', 'PAID', 11, '2022-12-08 18:24:06', '2022-12-08 18:24:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_details`
--

CREATE TABLE `sale_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sale_details`
--

INSERT INTO `sale_details` (`id`, `price`, `quantity`, `product_id`, `sale_id`, `created_at`, `updated_at`) VALUES
(12, '32.78', '1.00', 20, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(13, '18.90', '1.00', 16, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(14, '28.91', '1.00', 21, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(15, '47.50', '1.00', 25, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(16, '42.00', '1.00', 14, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(17, '28.91', '1.00', 26, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(18, '26.70', '1.00', 24, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(19, '28.00', '1.00', 11, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(20, '36.00', '1.00', 15, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(21, '9.45', '1.00', 13, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(22, '61.90', '1.00', 18, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(23, '100.00', '1.00', 17, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(24, '47.25', '1.00', 19, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(25, '13.28', '1.00', 23, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(26, '40.00', '1.00', 7, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(27, '19.00', '1.00', 12, 7, '2022-12-02 04:53:08', '2022-12-02 04:53:08'),
(28, '9.45', '2.00', 13, 8, '2022-12-02 04:54:25', '2022-12-02 04:54:25'),
(29, '42.00', '1.00', 14, 8, '2022-12-02 04:54:25', '2022-12-02 04:54:25'),
(30, '40.00', '1.00', 7, 8, '2022-12-02 04:54:25', '2022-12-02 04:54:25'),
(31, '19.00', '1.00', 12, 8, '2022-12-02 04:54:25', '2022-12-02 04:54:25'),
(32, '45.00', '1.00', 9, 8, '2022-12-02 04:54:25', '2022-12-02 04:54:25'),
(33, '9.45', '1.00', 13, 9, '2022-12-02 04:59:44', '2022-12-02 04:59:44'),
(34, '40.00', '1.00', 7, 9, '2022-12-02 04:59:44', '2022-12-02 04:59:44'),
(35, '32.00', '1.00', 28, 10, '2022-12-03 16:54:53', '2022-12-03 16:54:53'),
(36, '99.00', '1.00', 33, 11, '2022-12-08 18:24:06', '2022-12-08 18:24:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` enum('ADMIN','EMPLOYEE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ADMIN',
  `status` enum('ACTIVE','LOCKED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `profile`, `status`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Santa Reilly', NULL, 'rprosacco@example.org', 'ADMIN', 'ACTIVE', '2022-11-30 22:36:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'sVKwhF2vsd', '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(2, 'Dr. Adrain Spencer', NULL, 'autumn92@example.net', 'ADMIN', 'ACTIVE', '2022-11-30 22:36:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'IkdK9nNE7g', '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(3, 'Prof. Eugene Emard Jr.', NULL, 'tkeebler@example.com', 'ADMIN', 'ACTIVE', '2022-11-30 22:36:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'qZ1NSvVkh5', '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(4, 'Laurel Ondricka', NULL, 'bartoletti.mireille@example.com', 'ADMIN', 'ACTIVE', '2022-11-30 22:36:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'iVAmerrX2h', '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(5, 'Jewell Lind', NULL, 'evalyn.wisoky@example.net', 'ADMIN', 'ACTIVE', '2022-11-30 22:36:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'H2Hn4y0wIj', '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(6, 'Dr. Kenneth Haley DVM', NULL, 'shanon91@example.net', 'ADMIN', 'ACTIVE', '2022-11-30 22:36:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '5SBS3rNXvc', '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(7, 'Prof. Afton Murphy MD', NULL, 'oschneider@example.net', 'ADMIN', 'ACTIVE', '2022-11-30 22:36:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'gbq8qGewhr', '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(8, 'Prof. Kiley Yundt', NULL, 'hlindgren@example.org', 'ADMIN', 'ACTIVE', '2022-11-30 22:36:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Vg8KslXyzJ', '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(9, 'Mrs. Claudia Rogahn', NULL, 'reilly.efren@example.org', 'ADMIN', 'ACTIVE', '2022-11-30 22:36:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'tHgM6te58Q', '2022-11-30 22:36:11', '2022-11-30 22:36:11'),
(10, 'Naruto', NULL, 'naruty@example.net', 'ADMIN', 'ACTIVE', '2022-11-30 22:36:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'DsisOM95YI', '2022-11-30 22:36:11', '2022-12-04 01:05:56'),
(11, 'Daniel Virguez', '6671147', 'dkinslert@gmail.com', 'ADMIN', 'ACTIVE', NULL, '$2y$10$usovWb0FazTqLNSnf2AvCuPoKsQyevQbwgtak6TTbzgFGsv0THuMu', NULL, 'AUCzAffmocrnXRxHtZtyqquANfyKMZt7lLIMUsugwNeS99re8CpEmuvyZptX', '2022-11-30 22:36:11', '2022-12-08 08:26:37'),
(12, 'Roberto Perez', '9562166445', 'rperez@example.com', 'ADMIN', 'ACTIVE', NULL, '$2y$10$cOVsyKtL2ChsWDUhClsX8e.Daq0ecq6K7IJoCputf.X05ffKRTcsG', NULL, NULL, '2022-11-30 22:36:11', '2022-12-04 02:21:05'),
(13, 'Test User', NULL, 'test@example.com', 'ADMIN', 'ACTIVE', '2022-11-30 22:36:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'XRmihCRHsn', '2022-11-30 22:36:11', '2022-11-30 22:36:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `denominations`
--
ALTER TABLE `denominations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_details_product_id_foreign` (`product_id`),
  ADD KEY `sale_details_sale_id_foreign` (`sale_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `denominations`
--
ALTER TABLE `denominations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
