-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2023 at 10:04 AM
-- Server version: 10.6.11-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eCommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(150) NOT NULL,
  `brand_image` varchar(250) NOT NULL,
  `brand_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_image`, `brand_slug`) VALUES
(1, 'Intel', 'd4d24e905d65f47fb0600f535223abbe.png', 'intel'),
(2, 'BMW', 'cb7734d775d2f9d8c897f44e476ded69.png', 'bmw'),
(3, 'Dell Technologies', '68c1f6c4ea4e1d2b597f5e33d343ea3a.png', 'dell-technologies'),
(4, 'Mcdonalds', '61f5584bcff2df413e98afe5897cc5e6.png', 'mcdonalds'),
(6, 'test', '1bf8db27d77e17cae156ad338fb89dd6.jpg', 'test'),
(7, 'Calvin Klein', '623b7445674ac88995f9cd485d8e0fda.jpg', 'calvin-klein');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `category_image` varchar(250) NOT NULL,
  `category_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`, `category_slug`) VALUES
(2, 'Electronics', 'c2e704303411471b175f61923b620676.webp', 'electronics'),
(3, 'Clothes', '23e5db1d6e9877d8d81d1e87c95bca59.jpg', 'clothes'),
(4, 'Bags & Wallets', '33e271be784b566b69a571fa5a60a246.jpg', 'bags-&-wallets');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(250) NOT NULL,
  `discount_amount` smallint(6) NOT NULL,
  `expiration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `VendorId` int(11) DEFAULT NULL,
  `coupon_status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `discount_amount`, `expiration_date`, `VendorId`, `coupon_status`) VALUES
(1, 'hamzawy15', 15, '2023-06-22 10:24:00', 7, 1),
(2, 'hamzawy18', 18, '2023-06-30 10:25:00', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `get_product_data`
-- (See below for the actual view)
--
CREATE TABLE `get_product_data` (
`product_id` int(11)
,`product_name` varchar(250)
,`product_slug` varchar(250)
,`product_code` varchar(250)
,`product_quantity` int(11)
,`product_tags` varchar(250)
,`product_price` double
,`product_short_description` text
,`product_long_description` text
,`product_thumbnail` varchar(250)
,`product_status` binary(1)
,`sub_category_id` int(11)
,`brand_id` int(11)
,`vendor_id` int(11)
,`product_colors` varchar(250)
,`offer_id` int(11)
,`offer_product_id` int(11)
,`hot_deal` tinyint(4)
,`featured_product` tinyint(4)
,`special_offer` tinyint(4)
,`special_deal` tinyint(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `get_sub_categories`
-- (See below for the actual view)
--
CREATE TABLE `get_sub_categories` (
`sub_category_id` int(11)
,`sub_category_name` varchar(150)
,`sub_category_slug` varchar(150)
,`sub_category_image` varchar(250)
,`selected_category_id` int(11)
,`created_at` timestamp
,`category_name` varchar(150)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `get_vendor_data`
-- (See below for the actual view)
--
CREATE TABLE `get_vendor_data` (
`id` bigint(20) unsigned
,`photo` varchar(250)
,`name` varchar(255)
,`email` varchar(255)
,`username` varchar(200)
,`shop_name` varchar(200)
,`created_at` timestamp
,`shop_description` text
,`phone_number` varchar(20)
,`address` varchar(200)
,`vendor_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_26_192132_create_notifications_table', 1),
(6, '2023_05_31_194504_notifications', 2),
(7, '2023_06_17_182128_add_social_login', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_code` varchar(250) DEFAULT NULL,
  `product_tags` varchar(250) NOT NULL,
  `product_colors` varchar(250) NOT NULL,
  `product_short_description` text NOT NULL,
  `product_long_description` text DEFAULT NULL,
  `product_slug` varchar(250) NOT NULL,
  `product_price` double NOT NULL,
  `product_thumbnail` varchar(250) NOT NULL,
  `product_status` binary(1) NOT NULL DEFAULT '',
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_code`, `product_tags`, `product_colors`, `product_short_description`, `product_long_description`, `product_slug`, `product_price`, `product_thumbnail`, `product_status`, `sub_category_id`, `brand_id`, `vendor_id`, `product_quantity`) VALUES
(1, 'logo-print cotton T-shirt', 'Calvin1', 'tshirt,calvin', 'red,green,yellow,blue', 'logo-print cotton T-shirt from CALVIN KLEIN featuring black, cotton, logo print to the front, round neck, short sleeves and straight hem.', '<div class=\"ltr-92qs1a\" style=\"box-sizing: border-box; flex-flow: column nowrap; gap: var(--spacers-c8); display: flex; color: #222222; font-family: \'Farfetch Basis\', \'Helvetica Neue\', Arial, sans-serif; font-size: 16px; background-color: #ffffff;\">\r\n<h4 class=\"ltr-2pfgen-Body-BodyBold\" style=\"margin: 0px; box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"BodyBold\">Composition</h4>\r\n<p class=\"ltr-4y8w0i-Body\" style=\"margin: 0px; box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"Body\"><span class=\"ltr-4y8w0i-Body\" style=\"box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"Body\">Organic Cotton 100%</span></p>\r\n<p class=\"ltr-4y8w0i-Body\" style=\"margin: 0px; box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"Body\">&nbsp;</p>\r\n</div>\r\n<div class=\"ltr-92qs1a\" style=\"box-sizing: border-box; flex-flow: column nowrap; gap: var(--spacers-c8); display: flex; color: #222222; font-family: \'Farfetch Basis\', \'Helvetica Neue\', Arial, sans-serif; font-size: 16px; background-color: #ffffff;\">\r\n<h4 class=\"ltr-2pfgen-Body-BodyBold\" style=\"margin: 0px; box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"BodyBold\">Washing instructions</h4>\r\n<p class=\"ltr-4y8w0i-Body\" style=\"margin: 0px; box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"Body\">Machine Wash</p>\r\n<p class=\"ltr-4y8w0i-Body\" style=\"margin: 0px; box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"Body\">&nbsp;</p>\r\n</div>\r\n<div class=\"ltr-92qs1a\" style=\"box-sizing: border-box; flex-flow: column nowrap; gap: var(--spacers-c8); display: flex; color: #222222; font-family: \'Farfetch Basis\', \'Helvetica Neue\', Arial, sans-serif; font-size: 16px; background-color: #ffffff;\">\r\n<h4 class=\"ltr-2pfgen-Body-BodyBold\" style=\"margin: 0px; box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"BodyBold\">Wearing</h4>\r\n<p class=\"ltr-4y8w0i-Body\" style=\"margin: 0px; box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"Body\">The model is 1.85 m wearing size M</p>\r\n<div style=\"box-sizing: border-box;\">The model is also styled with:&nbsp;<a class=\"ltr-1gz2lez-Body\" style=\"box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height); background-color: transparent; cursor: pointer; transition-property: color, text-decoration; transition-duration: var(--motion-functional-duration-s); transition-timing-function: var(--motion-functional-easing-standard);\" href=\"https://www.farfetch.com/eg/shopping/men/polo-ralph-lauren-logo-patch-cotton-cargo-shorts-item-19670190.aspx\" data-ffref=\"pp_stl_detail_links\" data-component=\"LinkDark\">Polo Ralph Lauren logo-patch cotton cargo shorts</a>,&nbsp;<a class=\"ltr-1gz2lez-Body\" style=\"box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height); background-color: transparent; cursor: pointer; transition-property: color, text-decoration; transition-duration: var(--motion-functional-duration-s); transition-timing-function: var(--motion-functional-easing-standard);\" href=\"https://www.farfetch.com/eg/shopping/men/asics-gel-1130-low-top-sneakers-item-17627735.aspx\" data-ffref=\"pp_stl_detail_links\" data-component=\"LinkDark\">ASICS Gel-1130 low-top sneakers</a></div>\r\n<div style=\"box-sizing: border-box;\">&nbsp;</div>\r\n</div>\r\n<div class=\"ltr-92qs1a\" style=\"box-sizing: border-box; flex-flow: column nowrap; gap: var(--spacers-c8); display: flex; color: #222222; font-family: \'Farfetch Basis\', \'Helvetica Neue\', Arial, sans-serif; font-size: 16px; background-color: #ffffff;\">\r\n<h4 class=\"ltr-2pfgen-Body-BodyBold\" style=\"margin: 0px; box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"BodyBold\">Product IDs</h4>\r\n<p class=\"ltr-4y8w0i-Body\" style=\"margin: 0px; box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"Body\">FARFETCH ID:&nbsp;<span class=\"ltr-4y8w0i-Body\" dir=\"ltr\" style=\"box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"Body\">19667543</span></p>\r\n<p class=\"ltr-4y8w0i-Body\" style=\"margin: 0px; box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"Body\">Brand style ID:&nbsp;<span class=\"ltr-4y8w0i-Body\" dir=\"ltr\" style=\"box-sizing: border-box; font-family: var(--typography-body-font-family); font-size: var(--typography-body-font-size); line-height: var(--typography-body-line-height);\" data-component=\"Body\">K10K111133</span></p>\r\n</div>', 'logo-print-cotton-t-shirt', 390.5, 'fd1e5c8620dd7be3c591e7df82164471.webp', 0x31, 3, 7, 7, 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int(11) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `image_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `product_image`, `image_product_id`) VALUES
(1, '54527d2d08eff6faae4689e350e6a84a.webp', 1),
(2, '1f8be4908ff805608e5e1d66ad1ca513.webp', 1),
(3, 'b222d66e6f34f0473a161489f18f6b24.webp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_offers`
--

CREATE TABLE `product_offers` (
  `offer_id` int(11) NOT NULL,
  `hot_deal` tinyint(4) DEFAULT 0,
  `featured_product` tinyint(4) DEFAULT 0,
  `special_offer` tinyint(4) DEFAULT 0,
  `special_deal` tinyint(4) DEFAULT 0,
  `offer_product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_offers`
--

INSERT INTO `product_offers` (`offer_id`, `hot_deal`, `featured_product`, `special_offer`, `special_deal`, `offer_product_id`) VALUES
(1, 1, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(150) NOT NULL,
  `sub_category_image` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_slug` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `sub_category_image`, `category_id`, `sub_category_slug`, `created_at`) VALUES
(2, 'Mobiles', 'b28fb8bbf7d007635f048670a5c612ef.jpg', 2, 'mobiles', '2023-06-18 09:09:48'),
(3, 'T-shirts', '5caac2d25cf948a457d6645d66851a3f.webp', 3, 't-shirts', '2023-06-18 09:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `role` varchar(15) NOT NULL,
  `username` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `social_id` varchar(255) DEFAULT NULL,
  `social_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`, `role`, `username`, `status`, `phone_number`, `address`, `social_id`, `social_type`) VALUES
(18, 'Mustafa Hamzawy', 'admin@gmail.com', NULL, '$2y$10$5AgQIAnBIeZMHouOAXKu4.cKa8MzJtOvHM//O4dfCvlQEno1G4q3C', 'mNegtgw5nqKmOLdNZ99bmWbGHAQZw9kuwvLiHYAK6GiUeNBeeCVqNb80cJE9', '2023-06-18 08:32:47', NULL, NULL, 'admin', 'hamzawy1', 1, NULL, NULL, NULL, NULL),
(21, 'Mustafa Mahmoud', 'vendor2@gmail.com', NULL, '$2y$10$Dn68crfXX/HrMR0JtxXuEe6WmLczTQURy82GQX5SlU5H380bD21d2', 'hypQ7YBboQcqJ7z6kRZnR86fCPmgETg51bSg3vZ0J9KOUFpYunkJwCmrd7Uh', '2023-06-18 06:33:45', '2023-06-18 07:33:42', NULL, 'vendor', 'mustafa_vendor_1', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_shop`
--

CREATE TABLE `vendor_shop` (
  `vendor_id` int(11) NOT NULL,
  `shop_name` varchar(200) DEFAULT NULL,
  `shop_description` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_shop`
--

INSERT INTO `vendor_shop` (`vendor_id`, `shop_name`, `shop_description`, `user_id`) VALUES
(7, NULL, NULL, 21);

-- --------------------------------------------------------

--
-- Structure for view `get_product_data`
--
DROP TABLE IF EXISTS `get_product_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `get_product_data`  AS SELECT DISTINCT `product`.`product_id` AS `product_id`, `product`.`product_name` AS `product_name`, `product`.`product_slug` AS `product_slug`, `product`.`product_code` AS `product_code`, `product`.`product_quantity` AS `product_quantity`, `product`.`product_tags` AS `product_tags`, `product`.`product_price` AS `product_price`, `product`.`product_short_description` AS `product_short_description`, `product`.`product_long_description` AS `product_long_description`, `product`.`product_thumbnail` AS `product_thumbnail`, `product`.`product_status` AS `product_status`, `product`.`sub_category_id` AS `sub_category_id`, `product`.`brand_id` AS `brand_id`, `product`.`vendor_id` AS `vendor_id`, `product`.`product_colors` AS `product_colors`, `po`.`offer_id` AS `offer_id`, `po`.`offer_product_id` AS `offer_product_id`, `po`.`hot_deal` AS `hot_deal`, `po`.`featured_product` AS `featured_product`, `po`.`special_offer` AS `special_offer`, `po`.`special_deal` AS `special_deal` FROM (`product` join `product_offers` `po` on(`product`.`product_id` = `po`.`offer_product_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `get_sub_categories`
--
DROP TABLE IF EXISTS `get_sub_categories`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `get_sub_categories`  AS SELECT `sub`.`sub_category_id` AS `sub_category_id`, `sub`.`sub_category_name` AS `sub_category_name`, `sub`.`sub_category_slug` AS `sub_category_slug`, `sub`.`sub_category_image` AS `sub_category_image`, `sub`.`category_id` AS `selected_category_id`, `sub`.`created_at` AS `created_at`, `category`.`category_name` AS `category_name` FROM (`sub_category` `sub` join `category` on(`sub`.`category_id` = `category`.`category_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `get_vendor_data`
--
DROP TABLE IF EXISTS `get_vendor_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `get_vendor_data`  AS SELECT `users`.`id` AS `id`, `users`.`photo` AS `photo`, `users`.`name` AS `name`, `users`.`email` AS `email`, `users`.`username` AS `username`, `vendor_shop`.`shop_name` AS `shop_name`, `users`.`created_at` AS `created_at`, `vendor_shop`.`shop_description` AS `shop_description`, `users`.`phone_number` AS `phone_number`, `users`.`address` AS `address`, `vendor_shop`.`vendor_id` AS `vendor_id` FROM (`users` join `vendor_shop` on(`users`.`id` = `vendor_shop`.`user_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD KEY `coupon_vendor_shop_vendor_id_fk` (`VendorId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_product__fk` (`vendor_id`),
  ADD KEY `product_brand_brand_id_fk` (`brand_id`),
  ADD KEY `product_sub_category_sub_category_id_fk` (`sub_category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_images_product_product_id_fk` (`image_product_id`);

--
-- Indexes for table `product_offers`
--
ALTER TABLE `product_offers`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `product_offers_product_product_id_fk` (`offer_product_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD KEY `sub_category_category_category_id_fk` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_shop`
--
ALTER TABLE `vendor_shop`
  ADD PRIMARY KEY (`vendor_id`),
  ADD KEY `vendor_shop_users_id_fk` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_offers`
--
ALTER TABLE `product_offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vendor_shop`
--
ALTER TABLE `vendor_shop`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `coupon_vendor_shop_vendor_id_fk` FOREIGN KEY (`VendorId`) REFERENCES `vendor_shop` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_brand_brand_id_fk` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_product__fk` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_shop` (`vendor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_sub_category_sub_category_id_fk` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`sub_category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_product_id_fk` FOREIGN KEY (`image_product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_offers`
--
ALTER TABLE `product_offers`
  ADD CONSTRAINT `product_offers_product_product_id_fk` FOREIGN KEY (`offer_product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_category_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_shop`
--
ALTER TABLE `vendor_shop`
  ADD CONSTRAINT `vendor_shop_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=CURRENT_USER EVENT `update_coupon_status` ON SCHEDULE EVERY 1 HOUR STARTS '2023-04-23 22:29:54' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE coupon set coupon_status = '0' where expiration_date < NOW()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
