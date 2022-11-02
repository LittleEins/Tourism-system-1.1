-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 01:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tr_db`
--
CREATE DATABASE IF NOT EXISTS `tr_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tr_db`;

-- --------------------------------------------------------

--
-- Table structure for table `approves`
--

CREATE TABLE `approves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stuff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groups` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_td` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approves`
--

INSERT INTO `approves` (`id`, `booker_id`, `user_id`, `stuff_id`, `first_name`, `last_name`, `destination`, `gender`, `phone`, `email`, `address`, `book_number`, `groups`, `day`, `approve_td`, `created_at`, `updated_at`) VALUES
(21, '106', '9', '2', 'Jerhome', 'Reantaso', 'falls', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'samang', '641507', '2', NULL, 'October 25, 2022 8:47:pm  ', '2022-10-26 03:47:42', '2022-10-26 03:47:42'),
(22, '107', '9', '2', 'Jerhome', 'Reantaso', 'falls', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'samang', '487520', '0', NULL, 'October 27, 2022 4:41:am  ', '2022-10-27 11:41:16', '2022-10-27 11:41:16'),
(23, '111', '9', '10', 'Jerhome', 'Reantaso', 'tundol', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'samang', '986170', '0', NULL, 'October 27, 2022 4:50:am  ', '2022-10-27 11:50:17', '2022-10-27 11:50:17'),
(24, '109', '9', '10', 'Jerhome', 'Reantaso', 'tundol', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'samang', '282518', '0', NULL, 'October 27, 2022 4:50:am  ', '2022-10-27 11:50:54', '2022-10-27 11:50:54'),
(25, '113', '9', '10', 'Jerhome', 'Reantaso', 'tundol', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'samang', '503120', '1', NULL, 'October 29, 2022 12:33:am  ', '2022-10-29 07:33:02', '2022-10-29 07:33:02'),
(26, '115', '9', '10', 'Jerhome', 'Reantaso', 'tundol', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'samang', '871984', '0', NULL, 'October 29, 2022 12:50:am  ', '2022-10-29 07:50:49', '2022-10-29 07:50:49'),
(27, '116', '9', '10', 'Jerhome', 'Reantaso', 'tundol', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'samang', '226590', '0', NULL, 'October 29, 2022 12:55:am  ', '2022-10-29 07:55:26', '2022-10-29 07:55:26'),
(28, '118', '9', '2', 'Jerhome', 'Reantaso', 'falls', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'samang', '276461', '1', NULL, 'November 1, 2022 10:45:am  ', '2022-11-01 17:45:47', '2022-11-01 17:45:47'),
(29, '122', '9', '2', 'Jerhome', 'Reantaso', 'falls', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'Samang Norte', '530221', '1', 'Tue', 'November 1, 2022 9:50:pm  ', '2022-11-02 04:50:27', '2022-11-02 04:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `book_datas`
--

CREATE TABLE `book_datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_datas`
--

INSERT INTO `book_datas` (`id`, `booker_id`, `first_name`, `last_name`, `destination`, `gender`, `phone`, `address`, `book_number`, `time_date`, `created_at`, `updated_at`) VALUES
(75, '106', 'cvcv', 'gdf', 'falls', 'female', NULL, 'dfs', '641507', 'October 25, 2022 8:46:pm  ', NULL, NULL),
(76, '106', 'dfsdf', 'dfsdf', 'falls', 'male', NULL, 'fds', '641507', 'October 25, 2022 8:46:pm  ', NULL, NULL),
(77, '113', 'james', 'kuro', 'tundol', 'female', NULL, 'samang', '503120', 'October 29, 2022 12:32:am  ', NULL, NULL),
(78, '118', 'gdfg', 'dfgd', 'falls', 'male', NULL, 'samang', '276461', 'November 1, 2022 9:45:am  ', NULL, NULL),
(80, '122', 'fgfd', 'fbgfd', 'falls', 'female', NULL, 'fgfg', '530221', 'November 1, 2022 3:53:pm  ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_requests`
--

CREATE TABLE `book_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groups` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_requests`
--

INSERT INTO `book_requests` (`id`, `user_id`, `first_name`, `last_name`, `destination`, `gender`, `phone`, `email`, `address`, `groups`, `book_number`, `time_date`, `created_at`, `updated_at`) VALUES
(124, '8', 'James', 'Batalla', 'falls', 'female', '09187705133', 'jerhomereantaso8@gmail.com', 'Anda', 'solo', '220440', 'November 1, 2022 5:24:pm  ', '2022-11-02 00:24:59', '2022-11-02 00:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_approves`
--

CREATE TABLE `group_approves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stuff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_11_135840_create_book_data', 1),
(6, '2022_10_18_011335_create_book_request', 2),
(7, '2022_10_18_015732_add_time_date_to_book_datas_table', 3),
(8, '2022_10_18_070656_add_email_to_book_requests_table', 4),
(9, '2022_10_18_071301_add_gender_to_users_table', 5),
(10, '2022_10_18_071301_add_book_number_to__book_requests_table', 6),
(11, '2022_10_19_122642_create_approves_table', 7),
(12, '2022_10_21_043546_create_group_approves_table', 8),
(13, '2022_10_18_071301_add_book_number_to__book_data_table', 9);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `book_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `otp`, `email`, `gender`, `address`, `img_name`, `img_size`, `verification_code`, `is_verified`, `password`, `role`, `book_number`, `location`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Falls', 'CheckPoint', '09187705134', '247844', 'falls@gmail.com', '', NULL, 'default-profile.png', '6459', 'f17aec3f40caed18a558f4a58cbcffb23d72afee', 1, '$2y$10$9GP0mo4hQvl2ip9UBcXAi.2LS8aYLFtXskQG4m1fulJ9RDlsB64.C', '1', NULL, 'falls', NULL, '2022-10-17 06:53:09', '2022-11-01 09:16:06'),
(3, 'admin', 'admin', '09187705134', '247844', 'admin@gmail.com', '', NULL, 'default-profile.png', NULL, 'f17aec3f40caed18a558f4a58cbcffb23d72afee', 1, '$2y$10$9GP0mo4hQvl2ip9UBcXAi.2LS8aYLFtXskQG4m1fulJ9RDlsB64.C', '2', NULL, NULL, NULL, '2022-10-17 06:53:09', '2022-10-17 06:53:36'),
(8, 'James', 'Batalla', '09187705133', '931406', 'jerhomereantaso8@gmail.com', 'female', 'Anda', 'default-img', NULL, 'a707572d6f0e8e4ef64aeb26f27dd3fab6df3fec', 1, '$2y$10$HkFSs1B289EHVUn5sWsmiOwBqSCLpumHma8kplj0.yg4T8LghDRaW', '0', NULL, NULL, NULL, '2022-10-17 13:54:20', '2022-10-19 12:52:58'),
(9, 'Jerhome', 'Reantaso', '09187705134', '998186', 'jerhomereantaso85@gmail.com', 'male', 'Samang Norte', 'bootstrap-admin-template-free.jpg', '80928', 'fa0921298659294fd9ddad8e6d895b5e5b4d43c4', 1, '$2y$10$SdaWteBKGdBy7DwPLP5um.TokMplgoOF0gS/eVgvOlTb0WuLbycWC', '0', '189086', NULL, NULL, '2022-10-17 13:58:05', '2022-11-01 09:59:37'),
(10, 'Tundol', 'CheckPoint', '09187705134', '247844', 'tundol@gmail.com', '', NULL, 'messages-1.jpg', '6459', 'f17aec3f40caed18a558f4a58cbcffb23d72afee', 1, '$2y$10$9GP0mo4hQvl2ip9UBcXAi.2LS8aYLFtXskQG4m1fulJ9RDlsB64.C', '1', NULL, 'tundol', NULL, '2022-10-17 06:53:09', '2022-10-17 14:50:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approves`
--
ALTER TABLE `approves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_datas`
--
ALTER TABLE `book_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `group_approves`
--
ALTER TABLE `group_approves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `approves`
--
ALTER TABLE `approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `book_datas`
--
ALTER TABLE `book_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_approves`
--
ALTER TABLE `group_approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
