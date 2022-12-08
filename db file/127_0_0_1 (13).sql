-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 05:52 AM
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

--
-- Dumping data for table `admin_notifs`
--

INSERT INTO `admin_notifs` (`id`, `sender`, `type`, `message`, `status`, `sendto`, `time`, `date`, `created_at`, `updated_at`) VALUES
(31, 'Tourism Office', 'alert', 'dfdf', 'unread', 'all_staffs', '11:01:am', 'December 7, 2022', '2022-12-07 03:01:47', '2022-12-07 03:01:47'),
(32, 'Tourism Office', 'alert', 'cfgdfg', 'unread', 'all_staffs', '11:05:am', 'December 7, 2022', '2022-12-07 03:05:59', '2022-12-07 03:05:59'),
(33, 'Tourism Office', 'normal', 'gfhgf', 'unread', 'all_staffs', '11:07:am', 'December 7, 2022', '2022-12-07 03:07:20', '2022-12-07 03:07:20'),
(34, 'Tourism Office', 'normal', 'gfgfd', 'unread', 'all_staffs', '11:08:am', 'December 7, 2022', '2022-12-07 03:08:46', '2022-12-07 03:08:46'),
(35, 'Tourism Office', 'normal', 'fgdfg', 'unread', 'all_staffs', '11:12:am', 'December 7, 2022', '2022-12-07 03:12:36', '2022-12-07 03:12:36');

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
(182, '242', '48', '46', 'Jeff', 'Gonzales', 'Falls Check Point', 'male', '09287477850', 'espinozabusnila@gmail.com', 'Burgos, Pangasinan', '356874', '0', NULL, 'tuesday', 'December 6, 2022 7:29:am  ', '2022-12-06', '2022-12-05 23:29:18', '2022-12-05 23:29:18'),
(183, '243', '48', '49', 'Jeff', 'Gonzales', 'Light House', 'male', '09287477850', 'espinozabusnila@gmail.com', 'Burgos, Pangasinan', '407182', '0', NULL, 'tuesday', 'December 6, 2022 7:43:am  ', '2022-12-06', '2022-12-05 23:43:34', '2022-12-05 23:43:34'),
(184, '245', '52', '53', 'Jerhome', 'Reantaso', 'Falls Check Point', 'male', '09187705134', 'jerhomereantaso8@gmail.com', 'Samang Norte Bolinao Pangasinan', '457407', '0', NULL, 'wednesday', 'December 7, 2022 8:09:pm  ', '2022-12-07', '2022-12-07 12:09:43', '2022-12-07 12:09:43'),
(185, '246', '52', '53', 'Jerhome', 'Reantaso', 'Falls Check Point', 'male', '09187705134', 'jerhomereantaso8@gmail.com', 'Samang Norte Bolinao Pangasinan', '855999', '0', NULL, 'wednesday', 'December 7, 2022 8:19:pm  ', '2022-12-07', '2022-12-07 12:19:40', '2022-12-07 12:19:40'),
(186, '247', '52', '53', 'Jerhome', 'Reantaso', 'Falls Check Point', 'male', '09187705134', 'jerhomereantaso8@gmail.com', 'Samang Norte Bolinao Pangasinan', '191947', '0', NULL, 'wednesday', 'December 7, 2022 8:46:pm  ', '2022-12-07', '2022-12-07 12:46:37', '2022-12-07 12:46:37'),
(187, '248', '52', '53', 'Jerhome', 'Reantaso', 'Falls Check Point', 'male', '09187705134', 'jerhomereantaso8@gmail.com', 'Samang Norte Bolinao Pangasinan', '569514', '0', NULL, 'wednesday', 'December 7, 2022 8:52:pm  ', '2022-12-07', '2022-12-07 12:52:33', '2022-12-07 12:52:33'),
(188, '249', '52', '53', 'Jerhome', 'Reantaso', 'Falls Check Point', 'male', '09187705134', 'jerhomereantaso8@gmail.com', 'Samang Norte Bolinao Pangasinan', '232310', '0', NULL, 'wednesday', 'December 7, 2022 8:59:pm  ', '2022-12-07', '2022-12-07 12:59:17', '2022-12-07 12:59:17'),
(189, '250', '52', '53', 'Jerhome', 'Reantaso', 'Falls Check Point', 'male', '09187705134', 'jerhomereantaso8@gmail.com', 'Samang Norte Bolinao Pangasinan', '614480', '0', NULL, 'wednesday', 'December 7, 2022 9:05:pm  ', '2022-12-07', '2022-12-07 13:05:26', '2022-12-07 13:05:26'),
(190, '251', '54', '53', 'Genster', 'Sampaiso', 'Falls Check Point', 'male', '09913183407', 'jerhomereantaso85@gmail.com', 'Alaminos', '654344', '0', NULL, 'wednesday', 'December 7, 2022 9:20:pm  ', '2022-12-07', '2022-12-07 13:20:22', '2022-12-07 13:20:22'),
(191, '252', '54', '53', 'Genster', 'Sampaiso', 'Falls Check Point', 'male', '09913183407', 'jerhomereantaso85@gmail.com', 'Alaminos', '135825', '0', NULL, 'thursday', 'December 8, 2022 8:00:am  ', '2022-12-08', '2022-12-08 00:00:40', '2022-12-08 00:00:40'),
(192, '253', '54', '53', 'Genster', 'Sampaiso', 'Falls Check Point', 'male', '09913183407', 'jerhomereantaso85@gmail.com', 'Alaminos', '407360', '0', NULL, 'thursday', 'December 8, 2022 8:46:am  ', '2022-12-08', '2022-12-08 00:46:49', '2022-12-08 00:46:49');

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

--
-- Dumping data for table `approves_manuals`
--

INSERT INTO `approves_manuals` (`id`, `booker_id`, `user_id`, `staff_id`, `first_name`, `last_name`, `destination`, `gender`, `email`, `phone`, `address`, `book_number`, `time_leave`, `groups`, `day`, `ap_date`, `approve_td`, `ap_type`, `created_at`, `updated_at`) VALUES
(44, '46', '46', '46', 'fgfdgfdg', 'fgdfgfdg', 'Falls Check Point', 'male', 'jerhom@gmail.com', '56456546464', 'ghgfhfghfgf', '409328', '20', 'solo', 'sunday', '2022-12-04', 'December 4, 2022 8:13:pm  ', 'manual', '2022-12-04 12:13:37', '2022-12-04 12:13:37'),
(45, '46', '46', '46', 'James', 'Kaluwag', 'Falls Check Point', 'male', 'Jake@gmail.com', '09187705134', 'Samang Norte', '650963', '07', 'solo', 'tuesday', '2022-12-06', 'December 6, 2022 7:58:am  ', 'manual', '2022-12-05 23:58:19', '2022-12-05 23:58:19'),
(46, '53', '53', '53', 'Jake', 'Reantaso', 'Falls Check Point', 'male', 'haord@gmail.com', '56456546464', 'Bolinao', '600157', '1670464020', 'solo', 'thursday', '2022-12-08', 'December 8, 2022 8:48:am  ', 'manual', '2022-12-08 00:48:02', '2022-12-08 00:48:02');

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

--
-- Dumping data for table `book_requests`
--

INSERT INTO `book_requests` (`id`, `user_id`, `first_name`, `last_name`, `destination`, `gender`, `phone`, `email`, `address`, `groups`, `book_number`, `status`, `time_date`, `created_at`, `updated_at`) VALUES
(253, '54', 'Genster', 'Sampaiso', 'Falls Check Point', 'male', '09913183407', 'jerhomereantaso85@gmail.com', 'Alaminos', 'solo', '407360', 'approve', 'December 8, 2022 8:44:am  ', '2022-12-08 00:44:57', '2022-12-08 00:46:49');

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
(12, '31', '2022-12-06', '2022-12-07', '2022-11-26 14:16:41', '2022-12-05 19:43:10'),
(13, '23', '2022-12-03', '2022-12-04', '2022-11-27 05:40:32', '2022-12-02 22:44:45'),
(14, '25', '2022-12-04', '2022-12-05', '2022-11-27 05:46:16', '2022-12-04 11:03:54'),
(15, '3', '2022-12-08', '2022-12-09', '2022-11-27 05:47:05', '2022-12-08 00:23:05'),
(16, '32', '2022-12-01', '2022-12-02', '2022-11-27 05:50:06', '2022-12-01 08:01:13'),
(17, '33', '2022-11-28', '2022-11-29', '2022-11-28 06:23:41', '2022-11-28 06:23:41'),
(18, '35', '2022-12-01', '2022-12-02', '2022-11-28 06:27:11', '2022-12-01 05:11:25'),
(19, '45', '2022-12-04', '2022-12-05', '2022-12-03 05:20:31', '2022-12-03 18:40:21'),
(20, '39', '2022-12-03', '2022-12-04', '2022-12-03 05:38:29', '2022-12-03 05:38:29'),
(21, '46', '2022-12-06', '2022-12-07', '2022-12-04 02:41:09', '2022-12-05 23:01:12'),
(22, '48', '2022-12-06', '2022-12-07', '2022-12-05 23:11:39', '2022-12-05 23:11:39'),
(23, '49', '2022-12-06', '2022-12-07', '2022-12-05 23:43:04', '2022-12-05 23:43:04'),
(24, '51', '2022-12-06', '2022-12-07', '2022-12-06 02:24:54', '2022-12-06 02:24:54'),
(25, '52', '2022-12-08', '2022-12-09', '2022-12-06 02:43:03', '2022-12-07 23:32:37'),
(26, '53', '2022-12-08', '2022-12-09', '2022-12-06 15:00:56', '2022-12-07 23:56:19'),
(27, '54', '2022-12-08', '2022-12-09', '2022-12-07 13:16:26', '2022-12-07 23:54:54');

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

--
-- Dumping data for table `map_locations`
--

INSERT INTO `map_locations` (`id`, `latitude`, `longitude`, `name`, `img_name`, `color`, `link_url`, `visit_count`, `total_visit`, `link`, `type`, `date`, `created_at`, `updated_at`) VALUES
(100, '16.307937629560012', '119.86536738325877', 'Falls2', '1670338498.PNG', '#11e4d6', 'https://goo.gl/maps/a3CXKkUmWYrC2KLg6', '0', '0', '1', 0, NULL, '2022-12-06 06:54:58', '2022-12-06 06:54:58'),
(101, '16.307690632632685', '119.86981341024669', 'Falls3', '1670338557.PNG', '#05ddfa', 'https://goo.gl/maps/mcfKg578WtM8iwJE8', '0', '0', '1', 0, NULL, '2022-12-06 06:55:57', '2022-12-06 06:55:57'),
(103, '16.295950488964717', '119.86194169428178', 'Falls Check Point', '1670338817.png', '#1a86f9', NULL, '1', '2', '1', 1, NULL, '2022-12-06 07:00:17', '2022-12-08 00:56:15'),
(105, '16.339681213711188', '119.79331264768406', 'PatarBeach', '1670467004.png', '#00fa6c', 'https://goo.gl/maps/ww2RDbghvUyef7tPA', '0', NULL, '1', 0, NULL, '2022-12-07 18:36:44', '2022-12-07 18:36:44'),
(106, '16.34330519803635', '119.79889164207057', 'Patar Check Point', NULL, '#1968e6', NULL, '0', '0', NULL, 1, NULL, '2022-12-07 18:38:22', '2022-12-07 18:38:22'),
(107, '16.30793561749041', '119.78558487791555', 'LightHouse Check Point', '1670467272.png', '#14e12c', NULL, '0', '0', NULL, 1, NULL, '2022-12-07 18:41:12', '2022-12-07 18:41:12'),
(109, '16.366195870498117', '119.86417548650648', 'ABODE21 GUEST HOUSE', '1670468267.PNG', '#1a6aea', 'https://goo.gl/maps/i9VU85dbFggugx1FA', '0', NULL, '1', 0, NULL, '2022-12-07 18:57:47', '2022-12-07 18:57:47'),
(111, '16.35557699346231', '119.81231217486139', 'AMS BEACH RESORT', '1670468558.PNG', '#33a1e6', 'https://goo.gl/maps/973CQyJnBebuXVJa6', '0', NULL, '1', 0, NULL, '2022-12-07 19:02:38', '2022-12-07 19:02:38'),
(112, '16.386732546645014', '119.89005868465802', 'BADAK RESTOBAR', '1670468701.PNG', '#000000', 'https://goo.gl/maps/xebuXyi3C3GRRND2A', '0', NULL, '1', 0, NULL, '2022-12-07 19:05:01', '2022-12-07 19:05:01'),
(115, '16.386938553381277', '119.87638609999998', 'BIRDLAND BEACH CLUB INC.', '1670469114.PNG', '#2a7be5', 'https://goo.gl/maps/zC85Ai82zbSgcdb29', '0', NULL, '1', 0, NULL, '2022-12-07 19:11:54', '2022-12-07 19:11:54'),
(116, '16.38521822206691', '119.89075098151586', 'BOLINAO SEAFOOD GRILL ATBP.', '1670469425.PNG', '#0a12f5', 'https://goo.gl/maps/aKGjZVkAqmECew8GA', '0', NULL, '1', 0, NULL, '2022-12-07 19:17:05', '2022-12-07 19:17:05'),
(117, '16.305107246607683', '119.78107157116452', 'BUCCAT TRANSIENTHOUSE', '1670469533.PNG', '#2e14f0', 'https://goo.gl/maps/7oQzgWRAPEaZstZm8', '0', NULL, '1', 0, NULL, '2022-12-07 19:18:53', '2022-12-07 19:18:53'),
(120, '16.322262410735078', '119.78480628465802', 'CARINOS BEACH RESORT', '1670470707.PNG', '#5795e5', 'https://goo.gl/maps/kMvj5EfHH4M63KXc7', '0', NULL, '1', 0, NULL, '2022-12-07 19:38:27', '2022-12-07 19:38:27'),
(121, '16.30369012272426', '119.78121045767098', 'BETTYS WHITESAND BEACH', '1670470832.PNG', '#000000', 'https://goo.gl/maps/kHPW6dCFGt3LftwJA', '0', NULL, '1', 0, NULL, '2022-12-07 19:40:32', '2022-12-07 19:40:32'),
(122, '16.3363303938514', '119.79135522166608', 'ALONAS TRADITIONAL FILIPINO RESTHOUSE', '1670470980.PNG', '#2964a3', 'https://goo.gl/maps/jtZwEoPjZuGH57ScA', '0', NULL, '1', 0, NULL, '2022-12-07 19:43:00', '2022-12-07 19:43:00'),
(123, '16.359657289158733', '119.91535547116449', 'A and H HILLSIDE RESORT', '1670471156.PNG', '#455dd3', 'https://goo.gl/maps/GYqsWpNatFzpMqRM6', '0', NULL, '1', 0, NULL, '2022-12-07 19:45:56', '2022-12-07 19:45:56'),
(125, '16.30611943156136', '119.86009819467856', 'Falls1', '1670471345.PNG', '#383cad', 'https://goo.gl/maps/czmi7i5VKqwrJsRs8', '0', NULL, '1', 0, NULL, '2022-12-07 19:49:05', '2022-12-07 19:49:05'),
(126, '16.38490805118961', '119.89334321002194', 'Tourism Office', '1670473277.PNG', '#00ff6e', 'https://goo.gl/maps/wksAsZpUqEnWBqwF7', '0', NULL, '1', 2, NULL, '2022-12-07 20:21:17', '2022-12-07 20:21:17');

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
(2, '3', '2022-12-05', '2022-12-11', '2022-11-14 01:12:29', '2022-12-05 01:16:38'),
(3, '23', '2022-11-28', '2022-12-04', '2022-11-17 07:11:02', '2022-11-27 16:11:28'),
(4, '24', '2022-11-14', '2022-11-20', '2022-11-19 14:01:50', '2022-11-19 14:01:50'),
(5, '9', '2022-11-21', '2022-11-27', '2022-11-21 00:58:49', '2022-11-21 00:58:49'),
(6, '25', '2022-11-21', '2022-11-27', '2022-11-21 05:59:25', '2022-12-04 11:03:54'),
(7, '31', '2022-12-05', '2022-12-11', '2022-11-26 14:16:41', '2022-12-04 23:16:29'),
(8, '32', '2022-11-28', '2022-12-04', '2022-11-27 05:50:06', '2022-11-28 06:20:29'),
(9, '33', '2022-11-28', '2022-12-04', '2022-11-28 06:23:41', '2022-11-28 06:23:41'),
(10, '35', '2022-11-28', '2022-12-04', '2022-11-28 06:27:12', '2022-11-28 06:27:12'),
(11, '45', '2022-11-21', '2022-11-27', '2022-12-03 05:20:32', '2022-12-03 18:40:21'),
(12, '39', '2022-11-28', '2022-12-04', '2022-12-03 05:38:30', '2022-12-03 05:38:30'),
(13, '46', '2022-12-05', '2022-12-11', '2022-12-04 02:41:09', '2022-12-05 23:01:12'),
(14, '48', '2022-12-05', '2022-12-11', '2022-12-05 23:11:40', '2022-12-05 23:11:40'),
(15, '49', '2022-12-05', '2022-12-11', '2022-12-05 23:43:04', '2022-12-05 23:43:04'),
(16, '51', '2022-12-05', '2022-12-11', '2022-12-06 02:24:54', '2022-12-06 02:24:54'),
(17, '52', '2022-12-05', '2022-12-11', '2022-12-06 02:43:04', '2022-12-06 02:43:04'),
(18, '53', '2022-12-05', '2022-12-11', '2022-12-06 15:00:57', '2022-12-06 15:00:57'),
(19, '54', '2022-12-05', '2022-12-11', '2022-12-07 13:16:26', '2022-12-07 13:16:26');

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
(25, 'Admin', 'Access', '09187705134', '247844', 'admin@gmail.com', '', NULL, 'default-profile.png', NULL, 'f17aec3f40caed18a558f4a58cbcffb23d72afee', 1, '$2y$10$9GP0mo4hQvl2ip9UBcXAi.2LS8aYLFtXskQG4m1fulJ9RDlsB64.C', '3', NULL, 'Supper Admin', NULL, '2022-10-17 06:53:09', '2022-10-17 06:53:36'),
(52, 'Jerhome', 'Reantaso', '09187705134', '156461', 'jerhomereantaso8@gmail.com', 'male', 'Samang Norte Bolinao Pangasinan', 'default-profile.png', NULL, 'de492f750a8bd10af8f7aa90b0e8a4f75dbc76b8', 1, '$2y$10$SJEHO/Wi1ZWidpaYRtVA0.0EvAajYcIS.temvou71/2XLiNTAmibO', '0', NULL, NULL, NULL, '2022-12-05 18:42:06', '2022-12-05 18:42:50'),
(53, 'Falls Check Point', 'CheckPoint', '09913183407', '515151', 'falls@gmail.com', NULL, NULL, 'default-profile.png', NULL, '5555', 0, '$2y$10$.d0plVfz4A0n6TzfsyWhG.Nl0.pw5yQP5b1C029QrYZKok5tIJUR2', '1', NULL, 'falls check point', NULL, '2022-12-06 07:00:37', '2022-12-06 07:00:37'),
(54, 'Genster', 'Sampaiso', '09913183407', '708892', 'jerhomereantaso85@gmail.com', 'male', 'Alaminos', 'default-profile.png', NULL, '04624218e37776f066574b529ca481ba338a691b', 1, '$2y$10$m1m1ewVKQiyZZc0psob/8uk8MaSxNEtttJ0YLPKr1vjU0tsspksne', '0', NULL, NULL, NULL, '2022-12-07 05:14:04', '2022-12-07 05:15:26');

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
(41, 'Tourism Office', 'normal', 'Falls is close.', 'seen', '7:50:am', 'December 6, 2022', '2022-12-05 23:50:32', '2022-12-05 23:50:32'),
(42, 'Tourism Office', 'alert', 'fvv', 'unread', '9:04:am', 'December 6, 2022', '2022-12-06 01:04:09', '2022-12-06 01:04:09'),
(43, 'Tourism Office', 'normal', 'test1', 'unread', '9:28:am', 'December 6, 2022', '2022-12-06 01:28:02', '2022-12-06 01:28:02'),
(44, 'Tourism Office', 'normal', 'dfdf', 'unread', '9:49:am', 'December 6, 2022', '2022-12-06 01:49:01', '2022-12-06 01:49:01'),
(45, 'Tourism Office', 'alert', 'fgfdg', 'unread', '10:28:am', 'December 7, 2022', '2022-12-07 02:28:35', '2022-12-07 02:28:35');

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
(45, 32, 'patar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 05:50:24', '2022-11-28 06:41:10'),
(46, 45, 'falls check point', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-03 05:30:45', '2022-12-04 02:18:17'),
(47, 46, 'falls check point', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-04 02:44:40', '2022-12-05 23:29:18'),
(48, 49, 'light house', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-05 23:43:35', '2022-12-05 23:43:36'),
(49, 53, 'falls check point', NULL, NULL, '1', '2', NULL, NULL, NULL, NULL, NULL, '2022-12-07 12:09:43', '2022-12-08 00:46:49');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `approves`
--
ALTER TABLE `approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `approves_manuals`
--
ALTER TABLE `approves_manuals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `book_datas`
--
ALTER TABLE `book_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `counting_approves_manuals`
--
ALTER TABLE `counting_approves_manuals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `counting_group_approves`
--
ALTER TABLE `counting_group_approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `daily_resets`
--
ALTER TABLE `daily_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_approves`
--
ALTER TABLE `group_approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `group_manual_approves`
--
ALTER TABLE `group_manual_approves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `map_locations`
--
ALTER TABLE `map_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staff_alerts`
--
ALTER TABLE `staff_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `staff_notifications`
--
ALTER TABLE `staff_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `weekly_counts`
--
ALTER TABLE `weekly_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
