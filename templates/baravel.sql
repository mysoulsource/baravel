-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 05:38 PM
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
(1, '1544723992.jpeg', 'sadad', 'ada', '2018-12-13 12:14:53', '2018-12-13 12:14:53', 1);

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
(1, 'B+', 'B positive', NULL, NULL, 'b-pos.png'),
(2, 'A+', 'A positive', NULL, NULL, 'A-pos.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'molestiae', 'category.jpg', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 1),
(2, 'est', 'category.jpg', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 2),
(3, 'perspiciatis', 'category.jpg', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 3),
(4, 'enim', 'category.jpg', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 4),
(5, 'est', 'category.jpg', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 5),
(6, 'nesciunt', 'category.jpg', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 6),
(7, 'aut', 'category.jpg', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 7),
(8, 'cupiditate', 'category.jpg', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 8),
(9, 'magnam', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 9),
(10, 'incidunt', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 10),
(11, 'adipisci', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 11),
(12, 'tempora', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 13),
(13, 'sed', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 15),
(14, 'dolor', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 17),
(15, 'facilis', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 19),
(16, 'molestiae', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 21),
(17, 'consectetur', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 23),
(18, 'dolor', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 25),
(19, 'est', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 27),
(20, 'temporibus', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 29),
(21, 'cumque', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 31),
(22, 'ea', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 33),
(23, 'velit', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 35),
(24, 'voluptatum', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 37),
(25, 'aspernatur', 'category.jpg', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 39),
(26, 'consequaturasdada', 'category.jpg', '2018-12-12 10:09:43', '2018-12-13 11:48:35', 1),
(27, 'laborum', 'category.jpg', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 43),
(28, 'aperiam', 'category.jpg', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 45),
(29, 'necessitatibus', 'category.jpg', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 47),
(30, 'aspernatur', 'category.jpg', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 49);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 51, 7, 'A quae.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(2, 52, 6, 'Delectus ut dolorem.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(3, 53, 9, 'Dolore ut.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(4, 54, 10, 'Soluta ipsa.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(5, 55, 6, 'Soluta cumque.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(7, 57, 8, 'Voluptates est.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(9, 59, 10, 'Porro dicta et.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(10, 60, 9, 'Culpa sit pariatur.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(11, 61, 10, 'Distinctio est voluptas.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(13, 63, 8, 'Laborum quam consectetur.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(14, 64, 10, 'Possimus expedita eum.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(15, 65, 7, 'Aut qui.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(16, 66, 7, 'Praesentium aspernatur.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(17, 67, 6, 'Et sed.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(18, 68, 9, 'Dolorem qui.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(19, 69, 8, 'Numquam consequatur omnis.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(20, 70, 7, 'Suscipit et ut.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(22, 72, 3, 'In perferendis.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(23, 73, 10, 'Dicta dolores.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(24, 74, 6, 'Minima eum sint.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(25, 75, 10, 'Est qui voluptatem.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(26, 76, 7, 'Saepe vitae odio.', '2018-12-12 10:09:44', '2018-12-12 10:09:44'),
(27, 77, 6, 'Distinctio cumque.', '2018-12-12 10:09:45', '2018-12-12 10:09:45'),
(28, 78, 7, 'Eum reprehenderit impedit.', '2018-12-12 10:09:45', '2018-12-12 10:09:45'),
(29, 79, 8, 'Autem autem pariatur.', '2018-12-12 10:09:45', '2018-12-12 10:09:45'),
(30, 80, 3, 'Voluptatem placeat.', '2018-12-12 10:09:45', '2018-12-12 10:09:45');

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
  `urgency` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demands`
--

INSERT INTO `demands` (`id`, `title`, `blood`, `detail`, `date`, `accepted_by`, `code`, `status`, `created_at`, `updated_at`, `added_by`, `location`, `urgency`, `deleted_at`) VALUES
(1, 'asda', 1, 'asdada', '2018-12-05', NULL, 'hqB4TjO2KgBnSRJX', 0, '2018-12-13 10:37:02', '2018-12-13 10:37:02', 1, 'asdada', 1, NULL),
(2, 'asS', 1, 'asASA', '2018-12-07', NULL, 'Qp6kZVtxMBeCxvbd', 0, '2018-12-16 08:09:11', '2018-12-16 08:09:11', 1, 'ASs', 1, NULL);

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
(1, 1, 'Pending', '2018-12-13 10:37:02', '2018-12-13 10:37:02', 0),
(2, 2, 'Pending', '2018-12-16 08:09:11', '2018-12-16 08:09:11', 0);

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

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `organizer`, `detail`, `img`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '1544978787.jpeg', '2018-12-13', 1, '2018-12-16 11:01:27', '2018-12-16 11:01:27'),
(2, 'sdsa', 'dadada', 'aLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '1544979167.jpeg', '2018-12-18', 1, '2018-12-16 11:07:47', '2018-12-16 11:07:47'),
(3, 'sadad', 'adaad', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '1544979192.jpeg', '2018-12-20', 1, '2018-12-16 11:08:12', '2018-12-16 11:08:12'),
(4, 'safad', 'adad', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '1544979331.jpeg', '2018-12-18', 1, '2018-12-16 11:10:31', '2018-12-16 11:10:31'),
(5, 'asdad', 'daadsada', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '1544979366.jpeg', '2018-12-19', 1, '2018-12-16 11:11:06', '2018-12-16 11:11:06'),
(6, 'asd', 'ada', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '1544979393.jpeg', '2018-12-10', 1, '2018-12-16 11:11:33', '2018-12-16 11:11:33');

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
(1, 'asdada', 'sadada', 1, '2018-12-13 11:14:46', '2018-12-16 11:04:55', 1, '1544978995.jpeg');

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

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"displayName\":\"App\\\\Events\\\\SendRequestEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":7:{s:5:\\\"event\\\";O:27:\\\"App\\\\Events\\\\SendRequestEvent\\\":3:{s:7:\\\"request\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:11:\\\"App\\\\Request\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"requested_to\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:6:\\\"socket\\\";N;}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1544717523, 1544717523),
(2, 'default', '{\"displayName\":\"App\\\\Listeners\\\\SendRequestMailListener\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Events\\\\CallQueuedListener\",\"command\":\"O:36:\\\"Illuminate\\\\Events\\\\CallQueuedListener\\\":7:{s:5:\\\"class\\\";s:37:\\\"App\\\\Listeners\\\\SendRequestMailListener\\\";s:6:\\\"method\\\";s:6:\\\"handle\\\";s:4:\\\"data\\\";a:1:{i:0;O:27:\\\"App\\\\Events\\\\SendRequestEvent\\\":3:{s:7:\\\"request\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:11:\\\"App\\\\Request\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"requested_to\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:6:\\\"socket\\\";N;}}s:5:\\\"tries\\\";N;s:9:\\\"timeoutAt\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;}\"}}', 0, NULL, 1544717523, 1544717523);

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
(26, '2018_12_03_103725_create_banners_table', 1),
(27, '2018_12_03_104659_add_status_to_banner', 1),
(28, '2018_12_06_164603_add_softdelete_to_demands', 1),
(29, '2018_12_06_164838_add_softdelete_to_requests', 1),
(30, '2018_12_07_094354_create_userdetail_table', 1),
(31, '2018_12_12_080239_create_categories_table', 1),
(32, '2018_12_12_080305_create_posts_table', 1),
(33, '2018_12_12_080325_create_comments_table', 1),
(34, '2018_12_12_082326_add_user_to_category', 1),
(35, '2018_12_12_085749_add_image_to_posts', 1);

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

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `image`, `detail`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'asdada', '1544721616.jpeg', 'asdada', '1', NULL, '2018-12-13 11:35:16', 1);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_on` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `category_id`, `user_id`, `tags`, `published_on`, `slug`, `created_at`, `updated_at`, `image`) VALUES
(2, 'Ad.', 'Ea.', 12, 14, 'eum', '2018-12-13 12:07:41', 'quaerat', '2018-12-12 10:09:43', '2018-12-13 12:07:41', 'post.jpg'),
(3, 'Enim.', 'Molestiae.', 13, 16, 'et', NULL, 'esse', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(4, 'Animi alias.', 'Culpa.', 14, 18, 'officiis', NULL, 'amet', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(6, 'Quam consequuntur.', 'Commodi eligendi.', 16, 22, 'autem', NULL, 'deserunt', '2018-12-12 10:09:43', '2018-12-12 12:19:56', '1544637896.png'),
(7, 'Iusto voluptas.', 'Aut.', 17, 24, 'quia', NULL, 'impedit', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(8, 'Eum.', 'Fugit.', 18, 26, 'non', NULL, 'est', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(9, 'Ut.', 'Molestiae.', 19, 28, 'harum', NULL, 'expedita', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(10, 'Non.', 'Hic velit.', 20, 30, 'accusamus', NULL, 'fugiat', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(11, 'Itaque.', 'Consectetur.', 21, 32, 'nihil', NULL, 'et', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(12, 'Ducimus veritatis.', 'Ab occaecati.', 22, 34, 'accusantium', NULL, 'perferendis', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(13, 'Aut.', 'Quo.', 23, 36, 'sunt', NULL, 'enim', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(14, 'Consequatur totam.', 'Ex.', 24, 38, 'autem', NULL, 'odit', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(15, 'Optio.', 'Nihil neque.', 25, 40, 'cumque', NULL, 'quia', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(16, 'Ab.', 'Dolorem ad.', 26, 42, 'sint', NULL, 'a', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(17, 'Eveniet nostrum.', 'Maiores minus.', 27, 44, 'quia', NULL, 'ut', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'post.jpg'),
(20, 'Qui.', 'Minus corrupti.', 30, 50, 'voluptatem', NULL, 'molestiae', '2018-12-12 10:09:43', '2018-12-12 12:17:42', '1544637762.jpeg');

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
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `requested_by`, `requested_to`, `status`, `code`, `created_at`, `updated_at`, `date`, `urgency`, `message`, `deleted_at`) VALUES
(1, 1, 1, 0, NULL, '2018-12-13 10:27:03', '2018-12-13 10:27:03', '2018-12-13', 1, 'sadada', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Victoria Runolfsdottir', 'admin@gmail.com', '2018-12-12 10:09:41', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 0, 0, 'profile.png', '2RY8GZpO7cdPyqsFQSNrDu518stwe2ikzyzDoJZwD1Jj8apTUauJ7xsQYOs3', '2018-12-12 10:09:41', '2018-12-16 08:40:50', 'admin'),
(2, 'Berry O\'Keefe', 'burley.swaniawski@example.org', '2018-12-12 10:09:41', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '2', NULL, 1, 1, 'profile.png', '7Fj7Au6KVS', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 'user'),
(3, 'Margret Lueilwitz', 'tremblay.sincere@example.net', '2018-12-12 10:09:41', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '2', NULL, 1, 1, 'profile.png', 'KPrc8LwQAO', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 'user'),
(4, 'Miss Beulah Thompson Jr.', 'adela.reichel@example.com', '2018-12-12 10:09:41', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'hifXRet7WC', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 'user'),
(5, 'June Erdman', 'suzanne.oberbrunner@example.com', '2018-12-12 10:09:41', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'GS9GBs18rG', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 'user'),
(6, 'Deshawn Reichert DDS', 'afritsch@example.com', '2018-12-12 10:09:41', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', '9S9l9twmnR', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 'user'),
(7, 'Jamarcus Morar PhD', 'dbogisich@example.org', '2018-12-12 10:09:41', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'AZaidkyDRa', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 'user'),
(8, 'Hershel McClure', 'sschowalter@example.net', '2018-12-12 10:09:41', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', '7a5vvXdqdG', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 'user'),
(9, 'Mr. Alexandre Brakus II', 'katharina66@example.com', '2018-12-12 10:09:41', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'IGsXALgk4s', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 'user'),
(10, 'Nyasia Morissette', 'gardner03@example.net', '2018-12-12 10:09:41', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'RqomCrpbuO', '2018-12-12 10:09:41', '2018-12-12 10:09:41', 'user'),
(11, 'Ryder Sipes III', 'blanche90@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'Hr3aAQ617d', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(12, 'Crystel Waters', 'ajohnston@example.com', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'MMtrfIusYG', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(13, 'Alessia Mertz', 'hartmann.matteo@example.org', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'YWYB6cvt36', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(14, 'Bo Zboncak', 'wmoore@example.org', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', '5yCk9pHpIC', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(15, 'Davion Klocko', 'wilfred31@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'rygJkwcSNw', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(16, 'Mrs. Raquel Durgan II', 'rebecca.carroll@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'l7ivxfQPnE', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(17, 'Dr. Alexandria Schoen', 'cadams@example.com', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', '6DNmaFnij9', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(18, 'Ms. Anissa Wisoky', 'antwon.connelly@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'FxR6zbtXo3', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(19, 'Ms. Clementine Kautzer V', 'farrell.gwendolyn@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'gtR5rXFKkz', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(20, 'Krystel Fahey', 'okon.daryl@example.com', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'l0CeZKCixG', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(21, 'Mrs. Hertha Schulist', 'elissa.collins@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'YvKzvACGkM', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(22, 'Tomasa Kuphal Sr.', 'rhaag@example.com', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'YVLttz85l2', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(23, 'Nicklaus Fritsch', 'fay.elta@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'oD7V087seG', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(24, 'Ms. Jewel Johns PhD', 'kennedi.swift@example.com', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'W69Pavr81q', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(25, 'Bonita Bechtelar', 'frutherford@example.com', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', '0te9KOcneW', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(26, 'Dr. Kip Predovic II', 'waino47@example.com', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'hZjCgJL3wS', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(27, 'Art Erdman', 'swift.jonatan@example.com', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'ghtJLXfP51', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(28, 'Hallie Brown', 'zmcclure@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'I9pwJpqbX0', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(29, 'Alverta Balistreri', 'leon.ziemann@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'yzKNDEvkQm', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(30, 'Scotty Quigley III', 'graham.kirlin@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', '8NMkMUqQGJ', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(31, 'Helen Mayer', 'bauch.irma@example.com', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'xVg301ccd2', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(32, 'Abigale O\'Kon I', 'suzanne72@example.org', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'AHcHsXrOMc', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(33, 'Prof. Alexandre Schuppe', 'earl77@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'U0dtLK9NpM', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(34, 'Narciso Durgan', 'goldner.garland@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'CMtNhcfbLK', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(35, 'Jared O\'Conner', 'janice34@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'TKESa4C1iR', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(36, 'Malcolm Rutherford', 'allie62@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'fLKukQ2NnW', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(37, 'Astrid Streich', 'stanton.andreane@example.net', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'pozm3Ohcef', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(38, 'Dr. Bennie Dicki', 'imogene21@example.org', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', '60ocjea8F1', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(39, 'Madyson Frami', 'willms.aurelia@example.com', '2018-12-12 10:09:42', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'bRydihgoyd', '2018-12-12 10:09:42', '2018-12-12 10:09:42', 'user'),
(40, 'Dr. Karson Collins V', 'bziemann@example.com', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'wIQr1XZXh1', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(41, 'Aletha Christiansen Jr.', 'kshlerin.deonte@example.com', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'oBEXm9tz6j', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(42, 'Cheyanne Armstrong', 'keanu.stehr@example.net', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'lxsUFwN9kA', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(43, 'Dr. Solon Wyman', 'dena85@example.com', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'XqlS5pD9pj', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(44, 'Donna Koch Sr.', 'cruickshank.mohamed@example.com', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'lid6eOrSCf', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(45, 'Lacey O\'Reilly MD', 'dane.goyette@example.com', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'QrGMoFVztq', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(46, 'Ms. Rosamond Hills DVM', 'macy36@example.org', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'I5exwZvW2o', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(47, 'Maxime Gutkowski', 'prohaska.ruthie@example.net', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'KUnNRHZurE', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(48, 'Brenden Sipes IV', 'simonis.pete@example.com', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'cdUGpdWeM8', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(49, 'Felicita Volkman', 'krajcik.noel@example.net', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'Kw5xkatulS', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(50, 'Jasmin Wyman', 'ojohns@example.com', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'CJTncOKqMl', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(51, 'Clinton Klein', 'smith.cara@example.com', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'v82Q5yiGQx', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(52, 'Raul Doyle', 'marjolaine32@example.org', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'FmanpbqQ0p', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(53, 'Aliya Greenholt I', 'shammes@example.net', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'nbMoRpVXGy', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(54, 'Kyla Reinger III', 'tianna.vandervort@example.net', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'vmldh8HT3e', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(55, 'Olin Legros', 'abshire.harley@example.com', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 've7ryOMMZI', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(56, 'Dr. Loyal Nienow', 'zmiller@example.net', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'YMkDabQ8dA', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(57, 'Dr. Elmer Kub', 'trystan99@example.com', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'YzEDYtViwc', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(58, 'Ulices Reilly', 'reichert.aubrey@example.com', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'Ezytf2UR7T', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(59, 'Zoila Hamill', 'norberto14@example.net', '2018-12-12 10:09:43', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'nnVAOicHpx', '2018-12-12 10:09:43', '2018-12-12 10:09:43', 'user'),
(60, 'Dr. Berneice Bartoletti PhD', 'ntorp@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'gute40n9Hv', '2018-12-12 10:09:44', '2018-12-13 11:10:33', 'admin'),
(61, 'Mr. Floy Cruickshank V', 'luna.kuvalis@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'RTxV8mjaTN', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(62, 'Tiffany Kub II', 'joe07@example.org', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'wXcc6eGKfA', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(63, 'Marianne Mante', 'jerome57@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'h1cMG8O28T', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(64, 'Prof. Verla Herman DVM', 'runolfsson.antwon@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', '9EFd2FysHc', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(65, 'Ayana Jones', 'hauck.winnifred@example.org', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', '4TpgEJGKMT', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(66, 'Tanner Friesen III', 'fbernier@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'RQx1f2qosF', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(67, 'Celestino Schowalter', 'nbarrows@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'eOEYbmUZsb', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(68, 'Bridie Pagac', 'douglas.minnie@example.org', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'B6k7gv4To9', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(69, 'Michele Ernser', 'wjacobs@example.org', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'ry5S3F5tta', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(70, 'Ernestina Altenwerth', 'rolfson.lauretta@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'fCv8h8g2jA', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(71, 'Elvie Treutel', 'schmeler.dayana@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'fRDv8zbnPG', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(72, 'Miss Laurence Hegmann', 'gbrown@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'RWMUFZyFk7', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(73, 'Mr. Albert Schoen', 'spencer.emil@example.org', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'OWacPggiHA', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(74, 'Mr. Keeley Cremin PhD', 'rice.lexie@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'CisnaPrTeF', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(75, 'Gertrude Kiehn', 'wyatt16@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', '8wluVbzuPX', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(76, 'Addie Stamm', 'amalia74@example.net', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'OcOHICCSqV', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(77, 'Kathlyn Langworth', 'jennyfer.crona@example.com', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'dJSe3xWnu1', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(78, 'Jerrold Veum DDS', 'mallory25@example.org', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', '3HpzKM7o21', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(79, 'Ansel Effertz', 'lorena.lueilwitz@example.net', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'q8sANy3K4U', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user'),
(80, 'Prof. Keyshawn Hand', 'ntowne@example.org', '2018-12-12 10:09:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Nepal', 'Bagmati', 'Kathmandu', 'Koteshwor', '9843581383', 25, '1', NULL, 1, 1, 'profile.png', 'wXNvQHxgiU', '2018-12-12 10:09:44', '2018-12-12 10:09:44', 'user');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

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
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bloods`
--
ALTER TABLE `bloods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `demands`
--
ALTER TABLE `demands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `demandstatus`
--
ALTER TABLE `demandstatus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requeststatus`
--
ALTER TABLE `requeststatus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
