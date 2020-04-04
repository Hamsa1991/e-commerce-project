-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 01:34 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_01_084846_create_products_table', 1),
(5, '2020_04_01_085545_create_orders_table', 1),
(6, '2020_04_01_090945_create_orders_products_table', 1),
(7, '2020_04_02_113005_add_user_id_to_orders_products', 2),
(8, '2020_04_02_113201_add_product_id_to_orders_products', 2),
(9, '2020_04_02_115424_rename_table', 3),
(10, '2020_04_02_115848_add_user_id_to_order_product', 4),
(11, '2020_04_02_115903_add_product_id_to_order_product', 4),
(12, '2020_04_02_120223_add_product_id_to_order_product', 5),
(13, '2020_04_02_132408_add_transaction_id_to_orders', 6),
(14, '2020_04_03_120838_create_payments_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` double UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `user_id`, `transaction_id`, `created_at`, `updated_at`) VALUES
(79, 177.6, 1, '1202004040950', '2020-04-04 06:50:30', '2020-04-04 06:50:40'),
(84, 198, 1, '1202004041121', '2020-04-04 08:20:57', '2020-04-04 08:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `product_id`, `order_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 4, 35, 10, '2020-04-02 09:11:24', '2020-04-02 09:11:24'),
(2, 3, 35, 1, '2020-04-02 09:11:24', '2020-04-02 09:11:24'),
(3, 2, 36, 4, '2020-04-02 09:58:47', '2020-04-02 09:58:47'),
(4, 6, 37, 2, '2020-04-03 06:57:52', '2020-04-03 06:57:52'),
(5, 3, 38, 5, '2020-04-03 07:00:21', '2020-04-03 07:00:21'),
(6, 3, 39, 1, '2020-04-03 07:00:50', '2020-04-03 07:00:50'),
(7, 6, 40, 1, '2020-04-03 07:05:20', '2020-04-03 07:05:20'),
(8, 6, 41, 1, '2020-04-03 07:06:44', '2020-04-03 07:06:44'),
(9, 3, 42, 1, '2020-04-03 07:07:53', '2020-04-03 07:07:53'),
(10, 3, 43, 1, '2020-04-03 07:08:46', '2020-04-03 07:08:46'),
(11, 3, 44, 1, '2020-04-03 07:09:46', '2020-04-03 07:09:46'),
(12, 3, 45, 1, '2020-04-03 07:13:52', '2020-04-03 07:13:52'),
(13, 3, 46, 1, '2020-04-03 07:15:40', '2020-04-03 07:15:40'),
(14, 3, 47, 1, '2020-04-03 07:19:27', '2020-04-03 07:19:27'),
(15, 3, 48, 1, '2020-04-03 07:22:33', '2020-04-03 07:22:33'),
(16, 4, 49, 1, '2020-04-03 09:38:24', '2020-04-03 09:38:24'),
(17, 6, 49, 10, '2020-04-03 09:38:24', '2020-04-03 09:38:24'),
(18, 4, 50, 1, '2020-04-03 09:39:30', '2020-04-03 09:39:30'),
(19, 6, 50, 10, '2020-04-03 09:39:30', '2020-04-03 09:39:30'),
(20, 4, 51, 1, '2020-04-03 09:40:19', '2020-04-03 09:40:19'),
(21, 6, 51, 10, '2020-04-03 09:40:19', '2020-04-03 09:40:19'),
(22, 4, 52, 1, '2020-04-03 11:00:00', '2020-04-03 11:00:00'),
(23, 6, 52, 10, '2020-04-03 11:00:00', '2020-04-03 11:00:00'),
(24, 4, 53, 12, '2020-04-03 11:24:08', '2020-04-03 11:24:08'),
(25, 6, 53, 2, '2020-04-03 11:24:08', '2020-04-03 11:24:08'),
(26, 3, 54, 1, '2020-04-03 11:28:51', '2020-04-03 11:28:51'),
(27, 16, 54, 11, '2020-04-03 11:28:51', '2020-04-03 11:28:51'),
(28, 4, 55, 1, '2020-04-03 12:38:42', '2020-04-03 12:38:42'),
(29, 3, 55, 4, '2020-04-03 12:38:42', '2020-04-03 12:38:42'),
(30, 3, 56, 3, '2020-04-03 13:00:07', '2020-04-03 13:00:07'),
(31, 6, 56, 1, '2020-04-03 13:00:07', '2020-04-03 13:00:07'),
(32, 3, 57, 3, '2020-04-03 13:00:55', '2020-04-03 13:00:55'),
(33, 6, 57, 1, '2020-04-03 13:00:55', '2020-04-03 13:00:55'),
(34, 6, 58, 1, '2020-04-03 13:55:17', '2020-04-03 13:55:17'),
(35, 2, 58, 10, '2020-04-03 13:55:17', '2020-04-03 13:55:17'),
(36, 3, 59, 1, '2020-04-03 14:22:06', '2020-04-03 14:22:06'),
(37, 3, 60, 1, '2020-04-03 14:30:15', '2020-04-03 14:30:15'),
(38, 3, 61, 1, '2020-04-03 14:39:23', '2020-04-03 14:39:23'),
(39, 5, 62, 1, '2020-04-03 14:55:14', '2020-04-03 14:55:14'),
(40, 4, 63, 1, '2020-04-03 15:03:38', '2020-04-03 15:03:38'),
(41, 6, 64, 1, '2020-04-03 15:05:09', '2020-04-03 15:05:09'),
(42, 4, 65, 1, '2020-04-03 15:08:01', '2020-04-03 15:08:01'),
(43, 5, 66, 1, '2020-04-03 15:10:59', '2020-04-03 15:10:59'),
(44, 4, 67, 1, '2020-04-03 15:17:03', '2020-04-03 15:17:03'),
(47, 4, 70, 1, '2020-04-03 15:54:13', '2020-04-03 15:54:13'),
(48, 4, 71, 1, '2020-04-03 16:40:20', '2020-04-03 16:40:20'),
(49, 4, 72, 2, '2020-04-04 06:04:39', '2020-04-04 06:04:39'),
(50, 4, 73, 1, '2020-04-04 06:07:38', '2020-04-04 06:07:38'),
(51, 5, 74, 1, '2020-04-04 06:09:59', '2020-04-04 06:09:59'),
(52, 3, 74, 3, '2020-04-04 06:09:59', '2020-04-04 06:09:59'),
(53, 4, 75, 1, '2020-04-04 06:13:28', '2020-04-04 06:13:28'),
(54, 4, 76, 1, '2020-04-04 06:14:56', '2020-04-04 06:14:56'),
(55, 5, 77, 2, '2020-04-04 06:29:02', '2020-04-04 06:29:02'),
(56, 5, 78, 2, '2020-04-04 06:47:02', '2020-04-04 06:47:02'),
(57, 5, 79, 2, '2020-04-04 06:50:30', '2020-04-04 06:50:30'),
(58, 4, 80, 1, '2020-04-04 06:51:51', '2020-04-04 06:51:51'),
(59, 4, 81, 1, '2020-04-04 06:54:53', '2020-04-04 06:54:53'),
(60, 4, 82, 1, '2020-04-04 06:57:04', '2020-04-04 06:57:04'),
(61, 3, 83, 4, '2020-04-04 08:19:14', '2020-04-04 08:19:14'),
(62, 4, 84, 2, '2020-04-04 08:20:57', '2020-04-04 08:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'product 1', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 33, 'image5.jpg', NULL, NULL),
(2, 'product 2', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 20, 'image4.jpg', NULL, NULL),
(3, 'product 3', 'desciption here', 10, 'image.jpg', NULL, NULL),
(4, 'product 4', 'test description', 99, 'image6.jpg', NULL, NULL),
(5, 'product 5', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 88.8, 'image5.jpg', '2020-04-02 13:49:12', '2020-04-02 13:49:12'),
(6, 'product 6', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 333, 'image3.jpg', '2020-04-02 13:49:12', '2020-04-02 13:49:12'),
(7, 'product 7', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.\r\nLorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.\r\nLorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.\r\nLorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.\r\nLorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 11, 'image.jpg', '2020-04-02 13:50:21', '2020-04-02 13:50:21'),
(8, 'product 8', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.\r\nLorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.\r\nLorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 440, 'image6.jpg', '2020-04-02 13:50:21', '2020-04-02 13:50:21'),
(9, 'product 9', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 45, 'image1.jpg', '2020-04-02 13:51:40', '2020-04-02 13:51:40'),
(10, 'product 10', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 3, 'image3.jpg', '2020-04-02 13:51:40', '2020-04-02 13:51:40'),
(11, 'product 11', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 34.9, 'image5.jpg', '2020-04-02 13:52:26', '2020-04-02 13:52:26'),
(12, 'product 12', 'Lorem ipsum, or lipsum as it is sometimes known,', 122, 'image3.jpg', '2020-04-02 13:52:26', '2020-04-02 13:52:26'),
(13, 'product 13', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 33.3, 'image5.jpg', '2020-04-02 13:58:32', '2020-04-02 13:58:32'),
(14, 'product 14', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 22.9, 'image4.jpg', '2020-04-02 13:58:32', '2020-04-02 13:58:32'),
(15, 'product 15', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 10, 'image1.jpg', '2020-04-02 13:59:20', '2020-04-02 13:59:20'),
(16, 'product 16', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 32, 'image.jpg', '2020-04-02 13:59:20', '2020-04-02 13:59:20'),
(17, 'product 17', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 123, 'image6.jpg', '2020-04-02 14:00:20', '2020-04-02 14:00:20'),
(18, 'product18', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 87, 'image6.jpg', '2020-04-02 14:00:20', '2020-04-02 14:00:20'),
(19, 'product 19', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 14, 'image6.jpg', '2020-04-02 14:00:59', '2020-04-02 14:00:59'),
(20, 'test 20', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 145, 'image3.jpg', '2020-04-02 14:00:59', '2020-04-02 14:00:59'),
(21, 'test 21', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.', 90, 'image5.jpg', '2020-04-02 14:58:54', '2020-04-02 14:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hamsa Safadi', 'hamsaalsafadi@gmail.com', NULL, '$2y$10$bsQ4GUvJAagj.B5M.B7Ke.afyk7sqLvGTIl.Sx1ljNnKSeHb3C0Bq', NULL, '2020-04-01 13:03:43', '2020-04-01 13:03:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
