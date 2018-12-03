-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 06:32 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `img`, `title`, `sub_title`, `created_at`, `updated_at`, `status`) VALUES
(1, '1543855683.png', 'Donate Blood', 'Save life', '2018-12-03 10:32:07', '2018-12-03 11:03:03', 1),
(3, '1543855753.png', 'Donate Blood', 'Save life', '2018-12-03 11:04:14', '2018-12-03 11:04:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bloods`
--

CREATE TABLE `bloods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloods`
--

INSERT INTO `bloods` (`id`, `name`, `detail`, `created_at`, `updated_at`, `image`) VALUES
(1, 'b+', 'B positive', '2018-12-03 01:28:24', '2018-12-03 01:28:24', '1543821203.png'),
(2, 'A+', 'A positive', '2018-12-03 01:30:06', '2018-12-03 01:30:06', '1543821305.png'),
(3, 'A-', 'A negative', '2018-12-03 01:30:38', '2018-12-03 01:30:38', '1543821337.png');

-- --------------------------------------------------------

--
-- Table structure for table `demands`
--

CREATE TABLE `demands` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood` int(11) NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accepted_by` int(11) DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urgency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demands`
--

INSERT INTO `demands` (`id`, `title`, `blood`, `detail`, `date`, `accepted_by`, `code`, `status`, `created_at`, `updated_at`, `added_by`, `location`, `urgency`) VALUES
(1, 'B+ blood', 1, 'Blood required for operation', '2018-12-28', NULL, 'ardRidWK01EDwUj3', 0, '2018-12-03 01:31:19', '2018-12-03 01:31:19', 1, 'Koteshwor', 1),
(2, 'A+', 2, 'Blood required for operation', '2018-12-31', 1, '0B6jYVA8oOv7jaZv', 1, '2018-12-03 01:31:49', '2018-12-03 11:41:07', 1, 'Baneswor', 2),
(3, 'A-', 3, 'Teaching hospital admitted patient', '2018-12-31', 1, 'klAjhOjbVYKJscKl', 1, '2018-12-03 01:32:30', '2018-12-03 11:40:37', 1, 'Kathmandu', 1),
(4, 'B positive', 1, '1 pint blood required', '2018-12-14', 1, 'YEm69KVt6HU4ApK4', 1, '2018-12-03 01:33:05', '2018-12-03 11:31:32', 1, 'Gandaki', 3);

-- --------------------------------------------------------

--
-- Table structure for table `demandstatus`
--

CREATE TABLE `demandstatus` (
  `id` int(10) UNSIGNED NOT NULL,
  `demand_id` int(11) NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demandstatus`
--

INSERT INTO `demandstatus` (`id`, `demand_id`, `message`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Pending', '2018-12-03 01:31:19', '2018-12-03 01:31:19', 0),
(2, 2, 'Pending', '2018-12-03 01:31:49', '2018-12-03 01:31:49', 0),
(3, 3, 'Pending', '2018-12-03 01:32:30', '2018-12-03 01:32:30', 0),
(4, 4, 'Pending', '2018-12-03 01:33:05', '2018-12-03 01:33:05', 0),
(5, 4, 'accepted', '2018-12-03 11:31:32', '2018-12-03 11:31:32', 1),
(6, 3, 'accepted', '2018-12-03 11:40:37', '2018-12-03 11:40:37', 1),
(7, 2, 'accepted', '2018-12-03 11:41:07', '2018-12-03 11:41:07', 1),
(8, 3, 'accepted', '2018-12-03 11:41:36', '2018-12-03 11:41:36', 1),
(9, 3, 'accepted', '2018-12-03 11:41:42', '2018-12-03 11:41:42', 1),
(10, 2, 'accepted', '2018-12-03 11:42:11', '2018-12-03 11:42:11', 1),
(11, 3, 'accepted', '2018-12-03 11:43:00', '2018-12-03 11:43:00', 1),
(12, 2, 'accepted', '2018-12-03 11:44:49', '2018-12-03 11:44:49', 1),
(13, 2, 'accepted', '2018-12-03 11:45:27', '2018-12-03 11:45:27', 1),
(14, 2, 'accepted', '2018-12-03 11:45:57', '2018-12-03 11:45:57', 1),
(15, 2, 'accepted', '2018-12-03 11:46:27', '2018-12-03 11:46:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `source`, `uploaded_by`, `created_at`, `updated_at`, `status`, `image`) VALUES
(1, 'asdad', 'asdad', 1, '2018-12-03 11:15:41', '2018-12-03 11:15:41', 1, '1543856441.jpeg'),
(2, 'zxcasda', 'dsadada', 1, '2018-12-03 11:15:50', '2018-12-03 11:15:50', 1, '1543856450.jpeg'),
(3, 'asdsad', 'adada', 1, '2018-12-03 11:15:57', '2018-12-03 11:15:57', 1, '1543856457.jpeg'),
(4, 'adsad', 'aasdada', 1, '2018-12-03 11:16:07', '2018-12-03 11:16:07', 1, '1543856467.jpeg'),
(5, 'sada', 'dadada', 1, '2018-12-03 11:16:19', '2018-12-03 11:16:19', 1, '1543856478.png'),
(6, 'as', 'sada', 1, '2018-12-03 11:16:26', '2018-12-03 11:16:26', 1, '1543856486.jpeg'),
(7, 'asda', 'dsasada', 1, '2018-12-03 11:16:33', '2018-12-03 11:16:33', 1, '1543856493.png'),
(8, 'asda', 'dasda', 1, '2018-12-03 11:16:44', '2018-12-03 11:16:44', 1, '1543856504.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_11_23_053533_add_type_to_users', 1),
(9, '2018_11_23_062849_create_events_table', 1),
(10, '2018_11_23_101613_create_notices_table', 1),
(11, '2018_11_23_102341_add_status_to_notices', 1),
(12, '2018_11_23_142113_create_gallery_table', 1),
(13, '2018_11_23_165204_add_image_to_gallery', 1),
(14, '2018_11_24_123244_create_demands_table', 1),
(15, '2018_11_24_123556_create_bloods_table', 1),
(16, '2018_11_24_125051_add_image_to_blood', 1),
(17, '2018_11_24_162609_add_added_by_to_demands', 1),
(18, '2018_11_24_162943_add_location_to_demands', 1),
(19, '2018_11_24_165155_add_urgency_to_demands', 1),
(20, '2018_11_25_124902_create_demandstatus_table', 1),
(21, '2018_11_25_124953_create_request_table', 1),
(22, '2018_11_25_125319_create_requeststatus_table', 1),
(23, '2018_11_25_130055_add_status_to_demandstatus', 1),
(24, '2018_11_25_133123_add_fields_to_request', 1),
(25, '2018_11_25_173049_create_jobs_table', 1),
(26, '2018_12_03_103725_create_banners_table', 2),
(27, '2018_12_03_104659_add_status_to_banner', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'z8eGupS4z3IQHnuwDLrpBbaRYq7wgAMrCcEsbrq0', 'http://localhost', 1, 0, 0, '2018-11-28 02:43:59', '2018-11-28 02:43:59'),
(2, NULL, 'Laravel Password Grant Client', 'TyqWK0r4ics2w0FpLndAUzR4nuVdbhzBLvAouHpg', 'http://localhost', 0, 1, 0, '2018-11-28 02:44:00', '2018-11-28 02:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-11-28 02:43:59', '2018-11-28 02:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(10) UNSIGNED NOT NULL,
  `requested_by` int(11) NOT NULL,
  `requested_to` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urgency` int(11) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `requested_by`, `requested_to`, `status`, `code`, `created_at`, `updated_at`, `date`, `urgency`, `message`) VALUES
(1, 1, 1, 1, 'OQrnsSsSzpqiIh9E', '2018-11-28 02:44:27', '2018-11-28 04:08:04', '2018-11-25', 2, 'Accpeted'),
(2, 1, 1, 1, 'lGGgsGdK71Jy8yQt', '2018-11-28 02:44:30', '2018-11-28 04:12:20', '2018-11-25', 2, 'Accpeted'),
(3, 1, 1, 0, NULL, '2018-11-28 02:54:41', '2018-11-28 02:54:41', '2018-11-24', 1, 'dadsa'),
(4, 1, 1, 1, 'BTI64OEksf47B3X8', '2018-11-28 02:55:42', '2018-11-28 04:09:41', '2018-11-24', 1, 'Accpeted'),
(5, 1, 1, 1, 'fjZkVMPOfNc72TYB', '2018-11-28 02:56:20', '2018-11-28 04:08:20', '2018-11-24', 1, 'Accpeted'),
(6, 1, 1, 0, NULL, '2018-11-28 02:57:30', '2018-11-28 02:57:30', '2018-11-24', 1, 'dadsa'),
(7, 1, 1, 1, '2aVKVBF1LO9NY9SR', '2018-11-28 02:59:01', '2018-11-28 04:25:27', '2018-11-24', 1, 'Accpeted'),
(8, 1, 1, 1, 'qCsjHruOob4hRQa0', '2018-11-28 02:59:40', '2018-11-28 04:15:02', '2018-11-24', 1, 'Accpeted'),
(9, 1, 1, 1, 'ViBovIF3sfXCDZPQ', '2018-11-28 03:00:40', '2018-11-28 04:15:59', '2018-11-24', 1, 'Accpeted'),
(10, 1, 1, 1, 'EpGrfbyP1AhpxQQm', '2018-11-28 03:01:05', '2018-11-28 04:31:18', '2018-11-24', 1, 'Accpeted'),
(11, 1, 1, 0, NULL, '2018-11-28 03:02:32', '2018-11-28 03:02:32', '2018-11-24', 1, 'dadsa'),
(12, 1, 1, 0, NULL, '2018-11-28 03:03:03', '2018-11-28 03:03:03', '2018-12-01', 1, 'asdasdsa'),
(13, 1, 1, 0, NULL, '2018-11-28 03:04:18', '2018-11-28 03:04:18', '2018-12-01', 1, 'asdasdsa'),
(14, 1, 1, 0, NULL, '2018-11-28 03:05:08', '2018-11-28 03:05:08', '2018-12-01', 1, 'asdasdsa'),
(15, 1, 1, 0, NULL, '2018-11-28 03:06:57', '2018-11-28 03:06:57', '2018-12-01', 1, 'asdasdsa'),
(16, 1, 1, 0, NULL, '2018-11-28 03:15:06', '2018-11-28 03:15:06', '2018-12-01', 1, 'asdasdsa'),
(17, 1, 1, 0, NULL, '2018-11-28 03:18:14', '2018-11-28 03:18:14', '2018-12-01', 1, 'asdasdsa'),
(18, 1, 1, 0, NULL, '2018-11-28 03:18:35', '2018-11-28 03:18:35', '2018-12-01', 1, 'asdasdsa'),
(19, 1, 1, 0, NULL, '2018-11-28 03:19:15', '2018-11-28 03:19:15', '2018-12-01', 1, 'asdasdsa'),
(20, 1, 1, 0, NULL, '2018-11-28 03:20:00', '2018-11-28 03:20:00', '2018-12-01', 1, 'asdasdsa'),
(21, 1, 1, 0, NULL, '2018-11-28 03:20:06', '2018-11-28 03:20:06', '2018-12-01', 1, 'asdasdsa'),
(22, 1, 1, 0, NULL, '2018-11-28 03:20:45', '2018-11-28 03:20:45', '2018-11-17', 2, 'asdada'),
(23, 1, 1, 0, NULL, '2018-11-28 03:20:49', '2018-11-28 03:20:49', '2018-11-17', 2, 'asdada'),
(24, 1, 1, 0, NULL, '2018-11-28 03:25:41', '2018-11-28 03:25:41', '2018-11-24', 1, 'sdada'),
(25, 1, 1, 0, NULL, '2018-11-30 00:56:23', '2018-11-30 00:56:23', '2018-11-30', 2, 'lllll'),
(26, 1, 1, 0, NULL, '2018-11-30 00:57:27', '2018-11-30 00:57:27', '2018-11-30', 2, 'lllll'),
(27, 1, 1, 0, NULL, '2018-11-30 01:00:25', '2018-11-30 01:00:25', '2018-11-30', 1, 'lll'),
(28, 1, 1, 0, NULL, '2018-11-30 01:03:23', '2018-11-30 01:03:23', '2018-11-30', 1, 'lll'),
(29, 1, 1, 0, NULL, '2018-11-30 02:28:20', '2018-11-30 02:28:20', '2018-11-30', 2, 'asdsadassda'),
(30, 1, 1, 0, NULL, '2018-11-30 02:29:30', '2018-11-30 02:29:30', '2018-11-30', 2, 'asdsadassda'),
(31, 1, 1, 0, NULL, '2018-11-30 02:34:31', '2018-11-30 02:34:31', '2018-11-30', 2, 'asdsadassda'),
(32, 1, 1, 0, NULL, '2018-11-30 02:45:21', '2018-11-30 02:45:21', '2018-11-30', 2, 'asdsadassda'),
(33, 1, 1, 0, NULL, '2018-11-30 03:01:42', '2018-11-30 03:01:42', '2018-11-30', 2, 'asdsadassda'),
(34, 1, 1, 0, NULL, '2018-11-30 03:04:12', '2018-11-30 03:04:12', '2018-11-30', 2, 'asdsadassda'),
(35, 1, 1, 0, NULL, '2018-11-30 03:16:07', '2018-11-30 03:16:07', '2018-11-30', 2, 'asdsadassda'),
(36, 1, 1, 0, NULL, '2018-11-30 03:18:37', '2018-11-30 03:18:37', '2018-11-30', 1, 'weewfew'),
(37, 1, 1, 0, NULL, '2018-11-30 03:19:12', '2018-11-30 03:19:12', '2018-11-30', 1, 'weewfew'),
(38, 1, 1, 0, NULL, '2018-11-30 03:20:25', '2018-11-30 03:20:25', '2018-11-30', 1, 'weewfew'),
(39, 1, 1, 0, NULL, '2018-11-30 03:22:48', '2018-11-30 03:22:48', '2018-11-30', 1, 'weewfew'),
(40, 1, 1, 0, NULL, '2018-11-30 03:32:33', '2018-11-30 03:32:33', '2018-11-30', 1, 'weewfew'),
(41, 1, 1, 0, NULL, '2018-11-30 03:44:26', '2018-11-30 03:44:26', '2018-11-30', 1, 'weewfew'),
(42, 1, 1, 0, NULL, '2018-11-30 03:46:14', '2018-11-30 03:46:14', '2018-11-30', 1, 'weewfew'),
(43, 1, 1, 0, NULL, '2018-11-30 03:47:37', '2018-11-30 03:47:37', '2018-11-16', 2, 'qweqweq'),
(44, 1, 1, 0, NULL, '2018-11-30 03:54:04', '2018-11-30 03:54:04', '2018-11-30', 1, 'adasa'),
(45, 1, 1, 0, NULL, '2018-11-30 03:54:36', '2018-11-30 03:54:36', '2018-11-30', 1, 'adasa'),
(46, 1, 1, 0, NULL, '2018-11-30 03:55:34', '2018-11-30 03:55:34', '2018-11-30', 1, 'sfsfsfs'),
(47, 1, 1, 0, NULL, '2018-11-30 03:57:39', '2018-11-30 03:57:39', '2018-11-30', 1, 'fsafsfa'),
(48, 1, 1, 0, NULL, '2018-11-30 04:02:03', '2018-11-30 04:02:03', '2018-11-30', 1, 'fsafsfa'),
(49, 1, 1, 0, NULL, '2018-11-30 04:03:50', '2018-11-30 04:03:50', '2018-11-30', 1, 'llll'),
(50, 1, 1, 0, NULL, '2018-11-30 04:04:23', '2018-11-30 04:04:23', '2018-11-30', 1, 'llll'),
(51, 1, 1, 0, NULL, '2018-11-30 04:13:14', '2018-11-30 04:13:14', '2018-11-30', 1, 'lll'),
(52, 1, 1, 0, NULL, '2018-11-30 04:15:06', '2018-11-30 04:15:06', '2018-11-30', 1, 'lll'),
(53, 1, 1, 0, NULL, '2018-11-30 04:16:17', '2018-11-30 04:16:17', '2018-11-30', 1, 'lll'),
(54, 1, 1, 0, NULL, '2018-11-30 04:17:06', '2018-11-30 04:17:06', '2018-11-30', 1, 'lll'),
(55, 2, 2, 0, NULL, '2018-11-30 05:00:37', '2018-11-30 05:00:37', '2018-11-23', 1, 'llll'),
(56, 2, 2, 0, NULL, '2018-11-30 05:01:02', '2018-11-30 05:01:02', '2018-11-23', 1, 'llll'),
(57, 2, 2, 0, NULL, '2018-11-30 05:01:41', '2018-11-30 05:01:41', '2018-11-23', 1, 'llll'),
(58, 2, 2, 0, NULL, '2018-11-30 05:03:27', '2018-11-30 05:03:27', '2018-11-23', 1, 'llll'),
(59, 2, 2, 0, NULL, '2018-11-30 05:03:51', '2018-11-30 05:03:51', '2018-11-23', 1, 'llll'),
(60, 2, 1, 0, NULL, '2018-11-30 05:05:24', '2018-11-30 05:05:24', '2018-11-23', 1, 'llll'),
(61, 2, 1, 0, NULL, '2018-11-30 05:06:02', '2018-11-30 05:06:02', '2018-11-23', 1, 'llll'),
(62, 2, 1, 0, NULL, '2018-11-30 05:07:11', '2018-11-30 05:07:11', '2018-11-23', 1, 'llll'),
(63, 1, 1, 0, NULL, '2018-12-02 01:49:13', '2018-12-02 01:49:13', '2018-12-28', 1, 'sdada'),
(64, 1, 1, 0, NULL, '2018-12-02 01:49:28', '2018-12-02 01:49:28', '2018-12-28', 1, 'sdada'),
(65, 1, 1, 0, NULL, '2018-12-02 02:11:05', '2018-12-02 02:11:05', '2018-12-28', 1, 'rrr'),
(66, 1, 1, 0, NULL, '2018-12-02 02:12:52', '2018-12-02 02:12:52', '2018-12-28', 1, 'ppp'),
(67, 1, 1, 0, NULL, '2018-12-02 02:17:16', '2018-12-02 02:17:16', '2018-12-28', 2, 'llll'),
(68, 1, 1, 0, NULL, '2018-12-02 02:17:18', '2018-12-02 02:17:18', '2018-12-28', 2, 'llll'),
(69, 1, 1, 0, NULL, '2018-12-02 02:18:19', '2018-12-02 02:18:19', '2018-12-28', 2, 'llll'),
(70, 1, 1, 0, NULL, '2018-12-02 02:27:25', '2018-12-02 02:27:25', '2018-12-31', 1, 'ewe'),
(71, 1, 1, 0, NULL, '2018-12-02 02:44:37', '2018-12-02 02:44:37', '2018-12-21', 2, 'llll'),
(72, 1, 1, 1, '03zbiZhGKUfwA4Dh', '2018-12-02 02:47:44', '2018-12-02 02:48:26', '2018-12-28', 3, 'Accpeted'),
(73, 1, 1, 1, 'Kt3pz3E98K1iKUPk', '2018-12-02 03:01:14', '2018-12-02 03:04:23', '2018-12-21', 1, 'Accpeted'),
(74, 1, 1, 1, '1kTDsRBKYy76tODZ', '2018-12-02 03:05:48', '2018-12-02 03:07:06', '2018-12-21', 1, 'Accpeted'),
(75, 1, 1, 0, NULL, '2018-12-02 03:15:44', '2018-12-02 03:15:44', '2018-12-30', 1, 'llll'),
(76, 1, 1, 0, NULL, '2018-12-02 03:27:14', '2018-12-02 03:27:14', '2018-12-27', 2, 'lop');

-- --------------------------------------------------------

--
-- Table structure for table `requeststatus`
--

CREATE TABLE `requeststatus` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requeststatus`
--

INSERT INTO `requeststatus` (`id`, `request_id`, `status`, `message`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '', '2018-11-28 04:09:43', '2018-11-28 04:09:43'),
(2, 2, 1, '', '2018-11-28 04:12:20', '2018-11-28 04:12:20'),
(3, 8, 1, '', '2018-11-28 04:15:02', '2018-11-28 04:15:02'),
(4, 9, 1, '', '2018-11-28 04:15:59', '2018-11-28 04:15:59'),
(5, 7, 1, '', '2018-11-28 04:25:27', '2018-11-28 04:25:27'),
(6, 10, 1, '', '2018-11-28 04:31:19', '2018-11-28 04:31:19'),
(7, 72, 1, '', '2018-12-02 02:48:27', '2018-12-02 02:48:27'),
(8, 73, 1, '', '2018-12-02 03:04:23', '2018-12-02 03:04:23'),
(9, 74, 1, '', '2018-12-02 03:07:07', '2018-12-02 03:07:07'),
(10, 77, 0, 'Declined', '2018-12-02 03:31:55', '2018-12-02 03:31:55'),
(11, 78, 0, 'Declined', '2018-12-02 03:33:58', '2018-12-02 03:33:58'),
(12, 79, 0, 'Declined', '2018-12-02 04:01:13', '2018-12-02 04:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) NOT NULL,
  `blood` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `info_status` int(11) NOT NULL DEFAULT '0',
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `country`, `zone`, `district`, `area`, `phone`, `age`, `blood`, `f_url`, `status`, `info_status`, `img`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Kundan karna', 'admin@gmail.com', NULL, '$2y$10$Iex55md610Smwzintc1sT.RmdRphr.HIjgCIxQSLKA/kQxyRAbIb6', 'Nepal', 'Bagmati', 'kathmandu', 'Koteshwor', NULL, 25, 'B+', NULL, 1, 0, 'profile.png', 'pkPygwA8ixP6IG4bWCpcL3TzCBgEmkjpQmzm6B8Y73PZZqXJCpt2bJR2HSWJ', '2018-11-28 02:41:16', '2018-11-28 02:41:16', 'user'),
(2, 'Kundan karna', 'tukibatti@gmail.com', NULL, '$2y$10$oENqf8Bj0700nciNAIU/g.iF1PZSb9SpPVlSDJtE.1c9888S6XMLW', 'Nepal', 'Kathmandu', 'Kathmandu', 'Koteshwor', NULL, 21, 'A+', NULL, 1, 0, 'profile.png', NULL, '2018-11-30 04:59:56', '2018-11-30 04:59:56', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloods`
--
ALTER TABLE `bloods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demands`
--
ALTER TABLE `demands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demandstatus`
--
ALTER TABLE `demandstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requeststatus`
--
ALTER TABLE `requeststatus`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bloods`
--
ALTER TABLE `bloods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `demands`
--
ALTER TABLE `demands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `demandstatus`
--
ALTER TABLE `demandstatus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `requeststatus`
--
ALTER TABLE `requeststatus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
