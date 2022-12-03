-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 11:52 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `approves_manuals`
--

CREATE TABLE `approves_manuals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_leave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groups` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_date` date NOT NULL,
  `approve_td` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_type` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `counting_approves_manuals`
--

CREATE TABLE `counting_approves_manuals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_leave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groups` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve_td` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counting_group_approves`
--

CREATE TABLE `counting_group_approves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_leave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(12, '31', '2022-12-03', '2022-12-04', '2022-11-26 14:16:41', '2022-12-02 16:27:14'),
(13, '23', '2022-12-03', '2022-12-04', '2022-11-27 05:40:32', '2022-12-02 22:44:45'),
(14, '25', '2022-12-01', '2022-12-02', '2022-11-27 05:46:16', '2022-12-01 13:07:51'),
(15, '3', '2022-12-03', '2022-12-04', '2022-11-27 05:47:05', '2022-12-02 17:29:05'),
(16, '32', '2022-12-01', '2022-12-02', '2022-11-27 05:50:06', '2022-12-01 08:01:13'),
(17, '33', '2022-11-28', '2022-11-29', '2022-11-28 06:23:41', '2022-11-28 06:23:41'),
(18, '35', '2022-12-01', '2022-12-02', '2022-11-28 06:27:11', '2022-12-01 05:11:25');

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
  `ap_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_manual_approves`
--

CREATE TABLE `group_manual_approves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_leave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_date` date DEFAULT NULL,
  `time_date` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `map_locations`
--

CREATE TABLE `map_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_url` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visit_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_visit` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(29, '2014_10_12_100000_create_daily_reset', 24),
(30, '2022_10_11_135840_create_group_manual_approve', 25),
(31, '2022_10_19_122642_create_approves_manual_table', 25),
(32, '2022_10_18_071301_rename_book_number_to__book_requests_table', 26),
(33, '2022_10_11_135840_create_counting_group_manual_approve', 27),
(34, '2022_10_19_122642_create_ap_approves_manual_table', 27),
(35, '2022_10_18_071301_rename_book_number_to__book_requehsts_table', 28),
(36, '2022_10_18_071301_rename_xbook_number_to__book_requehsts_table', 29);

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
(2, '3', '2022-11-28', '2022-12-04', '2022-11-14 01:12:29', '2022-11-27 16:17:39'),
(3, '23', '2022-11-28', '2022-12-04', '2022-11-17 07:11:02', '2022-11-27 16:11:28'),
(4, '24', '2022-11-14', '2022-11-20', '2022-11-19 14:01:50', '2022-11-19 14:01:50'),
(5, '9', '2022-11-21', '2022-11-27', '2022-11-21 00:58:49', '2022-11-21 00:58:49'),
(6, '25', '2022-11-28', '2022-12-04', '2022-11-21 05:59:25', '2022-12-01 13:07:51'),
(7, '31', '2022-11-28', '2022-12-04', '2022-11-26 14:16:41', '2022-11-27 16:09:08'),
(8, '32', '2022-11-28', '2022-12-04', '2022-11-27 05:50:06', '2022-11-28 06:20:29'),
(9, '33', '2022-11-28', '2022-12-04', '2022-11-28 06:23:41', '2022-11-28 06:23:41'),
(10, '35', '2022-11-28', '2022-12-04', '2022-11-28 06:27:12', '2022-11-28 06:27:12');

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
(23, 'Falls', 'CheckPoint', '09913183407', '515151', 'falls@gmail.com', NULL, NULL, 'color 2.PNG', '171', '5555', 0, '$2y$10$EsPiGHtXkbZXR1N3gyEG..wEBNb8SFceOzZNVEVWk0vt.79HCbWmi', '1', NULL, 'falls', NULL, '2022-11-16 23:07:28', '2022-11-25 03:20:17'),
(25, 'Admin', 'Access', '09187705134', '247844', 'admin@gmail.com', '', NULL, 'default-profile.png', NULL, 'f17aec3f40caed18a558f4a58cbcffb23d72afee', 1, '$2y$10$9GP0mo4hQvl2ip9UBcXAi.2LS8aYLFtXskQG4m1fulJ9RDlsB64.C', '3', NULL, 'Supper Admin', NULL, '2022-10-17 06:53:09', '2022-10-17 06:53:36'),
(31, 'Juan', 'Dela Cruz', '09198805134', '213994', 'jerhomereantaso8@gmail.com', 'male', 'Samang Norte', 'IMG_20221128_131140.jpg', '7429766', '294cb7ed71d595977af6a21706f692526b83983e', 1, '$2y$10$VXrhYW5yFwmHOYPr0FNkrer8WPSTOro6Lh45885SyAx4fSjQVAiwW', '0', NULL, NULL, NULL, '2022-11-26 05:54:27', '2022-11-28 18:08:01'),
(32, 'Patar', 'CheckPoint', '09913183407', '515151', 'patar@gmail.com', NULL, NULL, 'default-profile.png', NULL, '5555', 0, '$2y$10$7QeQg3bruf1SYmqF.el6qeq5l3YU2XBiYvYgxkZi/MHvn4UVM6sVK', '1', NULL, 'patar', NULL, '2022-11-26 21:47:39', '2022-11-26 21:49:29'),
(33, 'Jasmine', 'zinampan', '09770988356', '791817', 'jasminezinampan30@gmail.com', 'female', 'Mabini , Pangasinan', 'default-profile.png', NULL, 'f6e735b9833aa08ab5574f109376f257af64455b', 1, '$2y$10$H0wg7dBKW4k1oSALMmsN3ekvxs1yJUMGGGwzw9JsABY9.oUkloavy', '0', NULL, NULL, NULL, '2022-11-27 22:21:38', '2022-11-27 22:27:52'),
(34, 'Marcos', 'Hayway', '09123456789', '638734', 'marcos@gmail.com', NULL, NULL, 'default-profile.png', NULL, '0bcf3bf528566b3a36cc4d8bd459a904d889c829', 0, '$2y$10$g/QpL8K6uw5JE67n4DobBOADDXdKtqTp6b.aN2O022RkV4FjyQyzW', '0', NULL, NULL, NULL, '2022-11-27 22:24:25', '2022-11-27 22:24:25'),
(35, 'Jester Einstein', 'Ibasan', '09667263323', '931420', 'jezteribasan@gmail.com', 'male', 'Purok 6, Arnedo , Bolinao Pangasina', 'default-profile.png', NULL, 'e4f042a89ab31d20daa5f7878dd27b6edf8cf23d', 0, '$2y$10$8wuFaRho1lmJaOLQGnLsDOK0kuNNAgeKEJQUDhwptAseZHqunrgvS', '0', NULL, NULL, NULL, '2022-11-27 22:25:52', '2022-11-27 22:27:38'),
(36, 'dan', 'ganda', '09770988356', '425958', 'danilynbanogon@gmail.com', NULL, NULL, 'default-profile.png', NULL, '0531eb71b24f0bce9fbf5654587543f601fa0cce', 0, '$2y$10$jK7wzyNK1AR/bhcVtkYSXOM28l8TaiP1XlAYnIlOYTRgvxgm0u08a', '0', NULL, NULL, NULL, '2022-11-27 22:33:09', '2022-11-27 22:33:09'),
(37, 'Jun', 'Piedad', '09511650330', '915585', 'harrisonopiedad@yahoo.com', NULL, NULL, 'default-profile.png', NULL, 'b2a5ddab31fbc06a6bf82a047ab9c60826753895', 0, '$2y$10$r3zlG3mX9eCkTvHVLxq/uenlR2KAffqyozQhyhubOTKcyWFO5eMYi', '0', NULL, NULL, NULL, '2022-11-28 19:21:24', '2022-11-28 19:21:24'),
(38, 'Juan', 'Dela Cruz', '09187705134', '272607', 'jerhomereantasobusinessmail@gmail.com', 'male', 'Samang Norte Bolinao', 'default-profile.png', NULL, '42cb44a196aec4cf275617e62be8ff2b6e056637', 1, '$2y$10$gD40W..AhTUQEuu2Vuyy4.cUNyOuEY7tIQPaejR2ySuUbSPuzCeNy', '0', NULL, NULL, NULL, '2022-12-02 09:14:54', '2022-12-02 09:24:34'),
(39, 'Lou', 'Jan', '099131873456', '451808', 'jerhomereantaso85@gmail.com', 'female', 'Bolinao', 'default-profile.png', NULL, 'cb6889535a5b0ce573fa2741a98301da0a3f4660', 1, '$2y$10$cc0hS2l09dVb7y9Ke0jXcOLLIamSaZDDQHssb1GZ7/HJ0U8MNo28O', '0', NULL, NULL, NULL, '2022-12-02 09:25:38', '2022-12-02 09:28:36');

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
(43, 23, 'falls', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 15:11:23', '2022-12-01 07:46:23'),
(44, 24, 'patar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-19 14:02:11', '2022-11-19 14:02:11'),
(45, 32, 'patar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 05:50:24', '2022-11-28 06:41:10');

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
-- Indexes for table `approves_manuals`
--
ALTER TABLE `approves_manuals`
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
-- Indexes for table `counting_approves_manuals`
--
ALTER TABLE `counting_approves_manuals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counting_group_approves`
--
ALTER TABLE `counting_group_approves`
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
-- Indexes for table `group_manual_approves`
--
ALTER TABLE `group_manual_approves`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `approves`
--
ALTER TABLE `approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `approves_manuals`
--
ALTER TABLE `approves_manuals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `book_datas`
--
ALTER TABLE `book_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `counting_approves_manuals`
--
ALTER TABLE `counting_approves_manuals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `counting_group_approves`
--
ALTER TABLE `counting_group_approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daily_resets`
--
ALTER TABLE `daily_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_approves`
--
ALTER TABLE `group_approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `group_manual_approves`
--
ALTER TABLE `group_manual_approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `map_locations`
--
ALTER TABLE `map_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff_alerts`
--
ALTER TABLE `staff_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `staff_notifications`
--
ALTER TABLE `staff_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `weekly_counts`
--
ALTER TABLE `weekly_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
