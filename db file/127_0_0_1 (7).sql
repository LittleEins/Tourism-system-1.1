-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 03:11 PM
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
-- Table structure for table `admin_notifs`
--

CREATE TABLE `admin_notifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sendto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `approves`
--

CREATE TABLE `approves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groups` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_type` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_td` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approves`
--

INSERT INTO `approves` (`id`, `booker_id`, `user_id`, `staff_id`, `first_name`, `last_name`, `destination`, `gender`, `phone`, `email`, `address`, `book_number`, `groups`, `ap_type`, `day`, `approve_td`, `ap_date`, `created_at`, `updated_at`) VALUES
(152, '216', '9', '23', 'Jerhome', 'Reantaso', 'Falls', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'Samang Norte', '644142', '0', NULL, 'monday', 'November 21, 2022 7:46:am  ', '2022-11-21', '2022-11-20 23:46:45', '2022-11-20 23:46:45'),
(153, '217', '9', '23', 'Jerhome', 'Reantaso', 'Falls', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'Samang Norte', '297603', '2', NULL, 'monday', 'November 21, 2022 7:52:am  ', '2022-11-21', '2022-11-20 23:52:41', '2022-11-20 23:52:41'),
(154, '219', '9', '23', 'Jerhome', 'Reantaso', 'Falls', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'Samang Norte', '319223', '1', NULL, 'tuesday', 'November 22, 2022 8:36:am  ', '2022-11-22', '2022-11-22 00:36:59', '2022-11-22 00:36:59'),
(155, '220', '9', '23', 'Jerhome', 'Reantaso', 'Falls', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'Samang Norte', '103486', '0', NULL, 'friday', 'November 25, 2022 8:07:pm  ', '2022-11-25', '2022-11-25 12:07:02', '2022-11-25 12:07:02'),
(156, '220', '9', '23', 'Jerhome', 'Reantaso', 'Falls', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'Samang Norte', '103486', '0', NULL, 'friday', 'November 25, 2022 8:08:pm  ', '2022-11-25', '2022-11-25 12:08:26', '2022-11-25 12:08:26'),
(157, '221', '9', '23', 'Jerhome', 'Reantaso', 'Falls', 'male', '09187705134', 'jerhomereantaso85@gmail.com', 'Samang Norte', '481611', '0', NULL, 'friday', 'November 25, 2022 8:51:pm  ', '2022-11-25', '2022-11-25 12:51:06', '2022-11-25 12:51:06');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `day` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_datas`
--

INSERT INTO `book_datas` (`id`, `booker_id`, `first_name`, `last_name`, `destination`, `gender`, `phone`, `address`, `book_number`, `time_date`, `created_at`, `updated_at`, `day`) VALUES
(115, '218', 'fgdfgdfgdf', 'fgvgdfgdfgdfg', 'Falls', 'male', NULL, 'gdfgfdgdgdfd', '767372', 'November 22, 2022 8:31:am  ', NULL, NULL, NULL);

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
  `status` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_resets`
--

CREATE TABLE `daily_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `today` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomorrow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_resets`
--

INSERT INTO `daily_resets` (`id`, `user_id`, `today`, `tomorrow`, `created_at`, `updated_at`) VALUES
(8, '23', '2022-11-25', '2022-11-26', '2022-11-20 23:25:52', '2022-11-25 11:18:36'),
(9, '9', '2022-11-25', '2022-11-26', '2022-11-21 00:57:34', '2022-11-25 12:40:56'),
(10, '3', '2022-11-25', '2022-11-26', '2022-11-21 01:31:12', '2022-11-25 11:22:15'),
(11, '25', '2022-11-22', '2022-11-23', '2022-11-21 05:59:24', '2022-11-21 22:33:51');

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
  `booker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_date` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_approves`
--

INSERT INTO `group_approves` (`id`, `booker_id`, `first_name`, `last_name`, `destination`, `gender`, `phone`, `address`, `book_number`, `time_date`, `created_at`, `updated_at`) VALUES
(53, '217', 'fgdfg', 'fgdfgfdg', 'Falls', 'female', NULL, 'fgdgdgdg', '297603', 'November 21, 2022 7:51:am  ', NULL, NULL),
(54, '217', 'dfdssddfs', 'cxdfsdfsd', 'Falls', 'male', NULL, 'dfsdfs', '297603', 'November 21, 2022 7:51:am  ', NULL, NULL),
(55, '218', 'fgdfgdfgdf', 'fgvgdfgdfgdfg', 'Falls', 'male', NULL, 'gdfgfdgdgdfd', '767372', 'November 22, 2022 8:31:am  ', NULL, NULL),
(56, '219', 'vcfgbcbgbfghg', 'fgfgdfgd', 'Falls', 'male', NULL, 'fgfgrgertert', '319223', 'November 22, 2022 8:36:am  ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `map_locations`
--

CREATE TABLE `map_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_visit` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `map_locations`
--

INSERT INTO `map_locations` (`id`, `latitude`, `longitude`, `name`, `visit_count`, `total_visit`, `link`, `type`, `date`, `created_at`, `updated_at`) VALUES
(18, '16.306320255841662', '119.85669989483964', 'Falls', '0', '1', '1', 1, 'November 21, 2022', '2022-11-16 23:00:53', '2022-11-25 04:56:30'),
(19, '16.304605989070428', '119.78084923772767', 'Patar', '0', '0', NULL, 1, 'November 19, 2022', '2022-11-19 05:46:10', '2022-11-21 15:06:45'),
(21, '16.385095850998464', '119.89099412374158', 'Bolinao Seafood Grill', '0', '0', '1', 0, NULL, '2022-11-20 23:06:54', '2022-11-20 23:06:54');

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
(13, '2022_10_18_071301_add_book_number_to__book_data_table', 9),
(14, '2014_10_12_000000_create_weekly_datas_table', 10),
(15, '2014_10_12_000000_create_weekly_counts_table', 11),
(16, '2014_10_12_000000_create_map_locations_table', 12),
(18, '2014_10_12_000000_create_notifications_table', 13),
(19, '2022_10_11_135840_create_group_approve', 14),
(20, '2014_10_12_000000_create_reset_analytics_table', 15),
(21, '2014_10_12_000000_create_stuff_own_notif', 16),
(22, '2014_10_12_000000_create_stuff_alert', 17),
(23, '2014_10_12_000000_create_stuff_alerts', 18),
(24, '2014_10_12_000000_create_admin_notif', 19),
(25, '2014_10_12_000000_rename_stuff_alert', 20),
(26, '2014_10_12_000000_rename_stuff_alerts', 21),
(27, '2014_10_12_000000_rename_stuff_notifications', 22),
(28, '2014_10_12_100000_create_daily_resets', 23),
(29, '2014_10_12_100000_create_daily_reset', 24);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creator_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `reset_analytics`
--

CREATE TABLE `reset_analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reset_analytics`
--

INSERT INTO `reset_analytics` (`id`, `staff`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, '2', '2022-11-14', '2022-11-20', '2022-11-14 00:11:27', '2022-11-14 00:55:33'),
(2, '3', '2022-11-21', '2022-11-27', '2022-11-14 01:12:29', '2022-11-21 01:31:12'),
(3, '23', '2022-11-21', '2022-11-27', '2022-11-17 07:11:02', '2022-11-20 20:45:04'),
(4, '24', '2022-11-14', '2022-11-20', '2022-11-19 14:01:50', '2022-11-19 14:01:50'),
(5, '9', '2022-11-21', '2022-11-27', '2022-11-21 00:58:49', '2022-11-21 00:58:49'),
(6, '25', '2022-11-21', '2022-11-27', '2022-11-21 05:59:25', '2022-11-21 05:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `staff_alerts`
--

CREATE TABLE `staff_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sendto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_notifications`
--

CREATE TABLE `staff_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creator_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_notifications`
--

INSERT INTO `staff_notifications` (`id`, `creator_id`, `type`, `message`, `status`, `time`, `date`, `created_at`, `updated_at`) VALUES
(18, 'falls', 'normal', 'Falls is close', 'unread', '7:19:pm', 'November 25, 2022', '2022-11-25 11:19:19', '2022-11-25 11:19:19');

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
(3, 'Tourism', 'Office', '09187705134', '247844', 'bolinaotourism@gmail.com', '', NULL, 'default-profile.png', NULL, 'f17aec3f40caed18a558f4a58cbcffb23d72afee', 1, '$2y$10$9GP0mo4hQvl2ip9UBcXAi.2LS8aYLFtXskQG4m1fulJ9RDlsB64.C', '2', NULL, 'Tourism Office', NULL, '2022-10-17 06:53:09', '2022-10-17 06:53:36'),
(8, 'James', 'Batalla', '09187705133', '931406', 'jerhomereantaso8@gmail.com', 'female', 'Anda', 'default-img', NULL, 'a707572d6f0e8e4ef64aeb26f27dd3fab6df3fec', 1, '$2y$10$HkFSs1B289EHVUn5sWsmiOwBqSCLpumHma8kplj0.yg4T8LghDRaW', '0', NULL, NULL, NULL, '2022-10-17 13:54:20', '2022-10-19 12:52:58'),
(9, 'Jerhome', 'Reantaso', '09187705134', '998186', 'jerhomereantaso85@gmail.com', 'male', 'Samang Norte', 'bootstrap-admin-template-free.jpg', '80928', 'fa0921298659294fd9ddad8e6d895b5e5b4d43c4', 1, '$2y$10$SdaWteBKGdBy7DwPLP5um.TokMplgoOF0gS/eVgvOlTb0WuLbycWC', '0', '189086', NULL, NULL, '2022-10-17 13:58:05', '2022-11-09 17:41:15'),
(23, 'Falls', 'CheckPoint', '09913183407', '515151', 'falls@gmail.com', NULL, NULL, 'color 2.PNG', '171', '5555', 0, '$2y$10$EsPiGHtXkbZXR1N3gyEG..wEBNb8SFceOzZNVEVWk0vt.79HCbWmi', '1', NULL, 'falls', NULL, '2022-11-16 23:07:28', '2022-11-25 03:20:17'),
(25, 'Admin', 'Access', '09187705134', '247844', 'admin@gmail.com', '', NULL, 'default-profile.png', NULL, 'f17aec3f40caed18a558f4a58cbcffb23d72afee', 1, '$2y$10$9GP0mo4hQvl2ip9UBcXAi.2LS8aYLFtXskQG4m1fulJ9RDlsB64.C', '3', NULL, 'Supper Admin', NULL, '2022-10-17 06:53:09', '2022-10-17 06:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creator_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `creator_id`, `type`, `message`, `status`, `time`, `date`, `created_at`, `updated_at`) VALUES
(38, 'falls', 'normal', 'Falls is close', 'seen', '7:19:pm', 'November 25, 2022', '2022-11-25 11:19:19', '2022-11-25 11:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_counts`
--

CREATE TABLE `weekly_counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Monday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tuesday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Wednesday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Thursday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Friday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Saturday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sunday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weekly_counts`
--

INSERT INTO `weekly_counts` (`id`, `user_id`, `location`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`, `date`, `remember_token`, `created_at`, `updated_at`) VALUES
(41, 2, 'falls', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-07 06:46:31', '2022-11-14 00:53:16'),
(42, 10, 'patar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-11 12:28:48', '2022-11-12 13:51:52'),
(43, 23, 'falls', NULL, '2', NULL, NULL, '3', NULL, NULL, NULL, NULL, '2022-11-17 15:11:23', '2022-11-25 12:51:07'),
(44, 24, 'patar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-19 14:02:11', '2022-11-19 14:02:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_notifs`
--
ALTER TABLE `admin_notifs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `daily_resets`
--
ALTER TABLE `daily_resets`
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
-- Indexes for table `map_locations`
--
ALTER TABLE `map_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- Indexes for table `reset_analytics`
--
ALTER TABLE `reset_analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_alerts`
--
ALTER TABLE `staff_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_notifications`
--
ALTER TABLE `staff_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekly_counts`
--
ALTER TABLE `weekly_counts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_notifs`
--
ALTER TABLE `admin_notifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `approves`
--
ALTER TABLE `approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `book_datas`
--
ALTER TABLE `book_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `daily_resets`
--
ALTER TABLE `daily_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_approves`
--
ALTER TABLE `group_approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `map_locations`
--
ALTER TABLE `map_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reset_analytics`
--
ALTER TABLE `reset_analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_alerts`
--
ALTER TABLE `staff_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff_notifications`
--
ALTER TABLE `staff_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `weekly_counts`
--
ALTER TABLE `weekly_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
