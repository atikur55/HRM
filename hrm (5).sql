-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 02:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_mobile` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_company` varchar(255) DEFAULT NULL,
  `client_address` text DEFAULT NULL,
  `client_priority` varchar(255) NOT NULL DEFAULT 'high' COMMENT 'high,middle,low',
  `client_website` text DEFAULT NULL,
  `client_note` text DEFAULT NULL,
  `client_meeting_date` datetime DEFAULT NULL,
  `client_created_by` int(11) NOT NULL,
  `client_updated_by` int(11) DEFAULT NULL,
  `created_time` timestamp NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client_name`, `client_mobile`, `client_email`, `client_company`, `client_address`, `client_priority`, `client_website`, `client_note`, `client_meeting_date`, `client_created_by`, `client_updated_by`, `created_time`, `updated_time`) VALUES
(8, 'fasdf', '32432231', 'weraw@gmail.com', 'fasd', 'fgsdfs', 'middle', 'fasdf', 'dsfds', '2020-12-23 02:46:00', 1, 1, '2020-12-01 07:16:35', '2020-12-01 07:16:35'),
(9, 'dfas', 'dasf', 'fdsa', 'fdas', 'fdsaf', 'high', 'fdas', 'fdas', NULL, 1, NULL, '2020-12-01 07:18:21', '2020-12-01 07:18:21'),
(11, 'Arif Onoy', '012345678', 'onoy@gmail.com', 'Onoy BD', 'sdfsf34543', 'high', 'google.com', 'abc', NULL, 51, NULL, '2021-06-24 07:04:34', '2021-06-24 07:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `client_contacts`
--

CREATE TABLE `client_contacts` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_mobile` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_message_subject` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_contacts`
--

INSERT INTO `client_contacts` (`id`, `client_id`, `client_name`, `client_mobile`, `client_email`, `client_message`, `created_at`, `updated_at`, `client_message_subject`) VALUES
(2, 23, 'fsdaf', '2341234', 'test@test.com', 'dfas', '2020-12-31 08:16:51', NULL, 'msdfas  fas '),
(3, 23, 'fasdf', 'dsafasd32423', 'dsfa', 'dsafa', '2020-12-31 08:34:51', NULL, 'fdsfas sda f'),
(4, 23, 'fasdf', 'fds', 'fadsf', 'dasf', '2020-12-31 08:53:51', NULL, NULL),
(6, 20, 'rrr', '32432432', 'rr@r.com', 'fdasf', '2020-12-31 10:18:27', NULL, NULL),
(7, 20, 'fads', '3243243', 'fdasf@wadf.com', 'sadfs', '2020-12-31 10:14:28', NULL, NULL),
(8, 20, 'client3', NULL, 'client3@gmail.com', 'dasfsdf', '2020-12-31 10:20:58', NULL, NULL),
(9, 20, 'client3', NULL, 'client3@gmail.com', 'sdaf', '2020-12-31 10:26:58', NULL, NULL),
(10, 20, 'client3', NULL, 'client3@gmail.com', 'fsda', '2020-12-31 10:22:59', NULL, 'dsfas'),
(11, 20, 'client3', NULL, 'client3@gmail.com', 'fdf', '2020-12-31 10:29:59', NULL, 'fasd'),
(12, 20, NULL, NULL, NULL, 'from postmane dsfaf  fdas das f', '2020-12-31 11:01:34', NULL, 'from postmane'),
(13, 20, NULL, NULL, NULL, 'asdf asdf asdf asdf asd f', '2020-12-31 12:14:54', NULL, 'hu'),
(14, 24234234, NULL, NULL, NULL, 'asdf asdf asdf asdf asd f', '2020-12-31 12:33:54', NULL, 'hu'),
(15, 40, 'client@example.com', NULL, 'client@example.com', 'gh', '2021-01-28 04:51:58', NULL, 'dsh'),
(16, 40, 'client@example.com', NULL, 'client@example.com', 'f', '2021-01-31 06:20:49', NULL, 'srtyuio'),
(17, 41, NULL, NULL, NULL, 'this is demo message', '2021-02-08 05:27:58', NULL, 'Hello Admin');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trading_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdl_exempt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'photo.jpg',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `c_name`, `trading_name`, `unit_number`, `complex`, `street_number`, `street`, `district`, `city`, `code`, `sdl_exempt`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ESSENTIAL INFOTECH', 'dfbvdfbv', '12134', 'fdvbdfvb', '1234', 'hujfuyg', 'MNU', 'MNU', '123', 'on', 'D:\\ms786saadman\\project\\tmp\\php6127.tmp', 'inactive', '2021-06-06 07:42:47', '2021-06-06 07:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `empoyer_fillings`
--

CREATE TABLE `empoyer_fillings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uif_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_register` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `same_as_residential` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lin1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lin2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lin3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empoyer_fillings`
--

INSERT INTO `empoyer_fillings` (`id`, `c_name`, `pay_number`, `uif_number`, `c_register`, `same_as_residential`, `lin1`, `lin2`, `lin3`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ESSENTIAL INFOTECH', '12346', '1234564', '132459674879', 'Same as residential', 'fgbfg', 'fbnfgnbfg', 'gfgf', '123', 0, '2021-06-06 08:22:19', '2021-06-06 08:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `list_qty_price_total` text NOT NULL,
  `total_expense` float NOT NULL,
  `expense_date` datetime NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `category_id`, `list_qty_price_total`, `total_expense`, `expense_date`, `comment`, `created_at`, `updated_at`, `created_by`) VALUES
(6, 5, 'mouse_5435_5435_29539225.00,mouse_5435_543_2951205.00', 2, '2019-02-11 00:00:00', NULL, NULL, NULL, NULL),
(7, 5, 'dasd_543540_3453543_1877138762220.00', 2, '2018-12-24 00:00:00', NULL, NULL, NULL, NULL),
(8, 5, 'adfa_2_3_6.00,fasdf_4_2_8.00', 14, '2021-01-13 00:00:00', NULL, NULL, NULL, NULL),
(10, 5, 'fasd_2_3_6.00', 6, '2021-03-19 00:00:00', NULL, NULL, NULL, NULL),
(11, 5, 'adsf_3_2_6.00', 6, '2021-06-15 00:00:00', NULL, NULL, NULL, NULL),
(12, 4, 'gdg_4_4_16.00', 16, '2021-01-30 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(11) NOT NULL,
  `expense_category_name` varchar(255) NOT NULL,
  `timstamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `expense_category_name`, `timstamp`, `created_by`) VALUES
(4, 'chair', '2020-11-30 06:13:45', 1),
(5, 'table', '2020-11-30 06:13:52', 1),
(7, 'Default', '2020-11-30 06:23:37', 1),
(8, 'mobile', '2021-06-24 11:04:51', 51),
(9, 'TV', '2021-06-24 11:14:36', 51);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `emp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `created_at`, `updated_at`, `emp_name`, `file_title`, `description`, `file`, `user_id`) VALUES
(36, '2021-02-08 05:03:24', NULL, '42', 'Fab-21', 'Your salary', '1612760604.pdf', 3),
(37, '2021-06-24 06:43:15', NULL, '57', 'news', 'news', '1624516995.pdf', 51);

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
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2020_12_08_134537_workspace', 2),
(7, '2020_12_08_134923_userworkspaces', 2),
(8, '2020_12_09_130943_projects', 3),
(9, '2020_12_09_131206_userprojects', 4),
(10, '2020_12_10_135153_tasks', 5),
(11, '2020_12_13_142145_usertasks', 5),
(12, '2021_01_22_004746_create_files_table', 6),
(13, '2021_06_03_150832_create_week_pays_table', 7),
(14, '2021_06_06_122849_create_employers_table', 8),
(15, '2021_06_06_123655_create_empoyer_fillings_table', 9),
(16, '2021_06_06_142433_create_new_employees_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `new_employees`
--

CREATE TABLE `new_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_fre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_app` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ident_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_c_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brance_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_rel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `same_as_residential` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codetwo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jobtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_employees`
--

INSERT INTO `new_employees` (`id`, `c_name`, `pay_fre`, `first_name`, `last_name`, `employe_time`, `date_birth`, `date_app`, `ident_type`, `passport_no`, `passport_c_code`, `id_number`, `email`, `pay_method`, `bank_name`, `acc_number`, `brance_code`, `acc_type`, `holder_rel`, `unit_number`, `complex`, `street_number`, `street`, `district`, `city`, `code`, `same_as_residential`, `line1`, `line2`, `line3`, `codetwo`, `jobtitle`, `tax_number`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Monthly,ending on 31st', 'arif', 'rahman', 'fulltime', '2021-06-06', '2021-06-07', 'passport', '12346', 'BD134', '134568578/9', 'arif@gmail.com', 'etf', 'ABSA', '1234564', '1345', 'current(cheque)', 'Own', '13648', 'bdfghdfgh', '12345345', 'dfgdfgbdfg', 'dsgdrgdg', 'dgrg', '12321', 'Same as residential', 'fghbfgh', 'dfgdfgdf', 'dfgdfgdfg', 'gdfgdfg', 'dfgfdgdfg', 'gdfgdgdrgdrg', 0, '2021-06-06 09:35:37', NULL),
(2, 'DATASOFT', 'Monthly,ending on 31st', 'zahid', 'Zaman', 'fulltime', '2021-06-07', '2021-06-08', 'passport', '123456', '1534684', '16548', 'a@gmail.com', 'cash', 'CAPITEC', '16348649', '10165', 'current(cheque)', 'Own', '134534563', 'asfsfrd', '456354', 'sddsfsdf', 'sdvfdsv', 'sdvdsvsd', '13245', 'Same as residential', 'vdsvds', 'dsvdsvsdv', 'sdvsdvsdv', '1235', 'fgbgfbnfg', '1324565', 0, '2021-06-07 05:32:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('02894073fbf6e53a409d23db2a52f2f54b0d7136d36201f4fe485e953fb62ef851933ec83050284f', 1, 4, 'EITDEV', '[]', 0, '2020-11-29 09:52:01', '2020-11-29 09:52:01', '2021-11-29 15:52:01'),
('03bbeae5eef970d40f4df4c67fbb5a19c1b5201f0ca5ad2213e344ea807036127ce80518489ce484', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:36:04', '2021-03-31 06:36:04', '2022-03-31 08:36:04'),
('0443cace1258cf05eb33a10f3e404b958634644416dbeddb6881439e933bffc181667b35499a3f29', 42, 4, 'EITDEV', '[]', 0, '2021-02-08 10:42:51', '2021-02-08 10:42:51', '2022-02-08 12:42:51'),
('0572b60d67437c9ebfb85c3a0ea000baacfbfcdeacd0bf2d9d612826fcf8fd88b633077e20d68108', 41, 4, 'EITDEV', '[]', 0, '2021-02-08 10:44:00', '2021-02-08 10:44:00', '2022-02-08 12:44:00'),
('0bf50cfef037e965386fae36dfe8dc0fc20ca89ec54e8bf4e31d192f9d25922e6574e708836aabd9', 41, 4, 'EITDEV', '[]', 0, '2021-02-08 10:43:15', '2021-02-08 10:43:15', '2022-02-08 12:43:15'),
('0ca80d125f20820304c46001b7aab63fb5af8ec7bd8a655e37b22b410bddc7b120b4d5b4c5e5d777', 1, 4, 'EITDEV', '[]', 0, '2020-11-29 09:55:19', '2020-11-29 09:55:19', '2021-11-29 15:55:19'),
('0fbd51b4e36cec6888dece771a95bc18415d1a6fee52f075a518caca38e8fd26384b873435940fe1', 2, 4, 'EITDEV', '[]', 0, '2020-11-29 10:06:06', '2020-11-29 10:06:06', '2021-11-29 16:06:06'),
('0fe4de7fbdf29061fb0a2e04bdfb319db29784256c6dc69d65dae36607d1162ea67f1edd9164dbdd', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:08:01', '2021-03-31 06:08:01', '2022-03-31 08:08:01'),
('10493b3ac8066a60f325b5a2be315961b85d8a6c27228f02099215bd8b922b2f77fe64f8f8a37295', 42, 4, 'EITDEV', '[]', 0, '2021-02-08 05:17:24', '2021-02-08 05:17:24', '2022-02-08 07:17:24'),
('127c9890b956fb482b3405aa53a5f0b66688f9bf0a4bd488be6683dec84b46bfdfd5804c1588b106', 43, 4, 'EITDEV', '[]', 0, '2021-02-19 20:30:00', '2021-02-19 20:30:00', '2022-02-19 22:30:00'),
('176d7dbe8776c1f57e0956dd3a39185c13ca59736a75956753ff094419408dcce8acbda8f5594645', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 07:35:12', '2021-03-31 07:35:12', '2022-03-31 09:35:12'),
('19500f10c5aabc8428e6f109326a68457bdc70c5127058ebf02405b0eea4f1ec1698f65e710e714c', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:23:28', '2021-03-31 06:23:28', '2022-03-31 08:23:28'),
('1ae0d2e017e4340d872ce32fe1d8679e5ca15c3134209a69d540a26cbbdb0c79f7aed0128aab48f0', 5, 4, 'EITDEV', '[]', 0, '2020-11-29 10:14:21', '2020-11-29 10:14:21', '2021-11-29 16:14:21'),
('1ba31e89b0eac275a7aff0b47ad8cfdbe3371f7d4ba663055cb27c74de85edcb485c44a14389ebd6', 5, 4, 'EITDEV', '[]', 0, '2020-11-29 10:13:16', '2020-11-29 10:13:16', '2021-11-29 16:13:16'),
('1cb0bac87b9ba0c63f57e6e1052c0dbe97a3a672bafae7a7004f8daa6e3532a2cd243271167b1582', 1, 4, 'EITDEV', '[]', 0, '2020-11-29 10:10:04', '2020-11-29 10:10:04', '2021-11-29 16:10:04'),
('1eaf1d5b0649f5822ff3e6334ea54a4bdd60752267b9e4dad2fa1f2e11da6d9afb9bc24d75b89041', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 07:33:37', '2021-03-31 07:33:37', '2022-03-31 09:33:37'),
('2486c489c52146e4ebbcf3bbe244200539bb6e883049c0a3b1d0e00425de2fe8be03f1415583baf4', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 11:50:53', '2021-03-31 11:50:53', '2022-03-31 13:50:53'),
('2fabd6611b309615766c486d2e65e2eb6d4e5ff9d661e43e73ea6b7057e81dc6c38a65d07af20274', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:06:52', '2021-03-31 06:06:52', '2022-03-31 08:06:52'),
('30318bc63d62356bc73087a4fa8e8b03bcad46c56e4f02dc77ee7ab659c04dea544eeaf3d7ecc2de', 41, 4, 'EITDEV', '[]', 0, '2021-02-08 07:21:38', '2021-02-08 07:21:38', '2022-02-08 09:21:38'),
('30da1bb09c25dfc4cf2248bd603a16f61e17255d7e240aae4912fe2690e050a5132a0223e8f9d37d', 1, 4, 'EITDEV', '[]', 0, '2021-02-08 10:44:07', '2021-02-08 10:44:07', '2022-02-08 12:44:07'),
('315190a7196c09bd1804629ba2e7baa794624a7f700bb5fa13c697c9f87974e3d10e98cb4bb96c3e', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 05:15:34', '2021-03-31 05:15:34', '2022-03-31 07:15:34'),
('31704efb45eda5c608f26fc7de306b1d93f0675f523566f3d22cd35c371aeb87e9019a94f4ce9e66', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:07:59', '2021-03-31 06:07:59', '2022-03-31 08:07:59'),
('342129215726f11414631a9c1d55bdca0fe3e30fe2acb86551337d517fe0d85294d23d8b9031593b', 2, 4, 'EITDEV', '[]', 0, '2020-12-31 11:14:14', '2020-12-31 11:14:14', '2021-12-31 17:14:14'),
('3491c2cc4a315d70c5206f9e6f57a237133e6732213fe9aa3aa9b68cdc631e146cb6b8caea6dd9ab', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:26:22', '2021-03-31 06:26:22', '2022-03-31 08:26:22'),
('366441f04b553937c09af21c83172cd4769c9a16cbbfa4043b211534d617d2c650361fc390968738', 1, 4, 'EITDEV', '[]', 0, '2020-11-29 09:34:25', '2020-11-29 09:34:25', '2021-11-29 15:34:25'),
('3d7e7c5c07ef04d1f7afada81ebbf98052bc04b8b2760ed24526a71d94b9536445a3e7c4eb6266e3', 20, 4, 'EITDEV', '[]', 0, '2020-12-31 12:51:07', '2020-12-31 12:51:07', '2021-12-31 18:51:07'),
('3faca3c8357c91266fd37ce1cb1bc0bb1a9ccb195507e46e80636296792dfd12f99f8acc6c786947', 2, 4, 'EITDEV', '[]', 0, '2020-11-29 10:05:56', '2020-11-29 10:05:56', '2021-11-29 16:05:56'),
('42462aaf169be4634c8818fa376097472e354f2f843104a9eee96eba139dd8923004eff3e62fabe6', 1, 4, 'EITDEV', '[]', 0, '2021-02-08 10:42:06', '2021-02-08 10:42:06', '2022-02-08 12:42:06'),
('50cc8cd12d0a1328d3a8494cc8d79e226bb0c9844f71ad83bc37b431894d120a7593b55435675d95', 1, 4, 'EITDEV', '[]', 0, '2021-01-25 06:18:24', '2021-01-25 06:18:24', '2022-01-25 12:18:24'),
('5314d3beb33cb804a28c2b2d46ec8a1ff1a1dfc9dd319281c0497f03d3bc057e6a1ff49d87f6c0a5', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:06:54', '2021-03-31 06:06:54', '2022-03-31 08:06:54'),
('5853f04f9472baa3e6843a0c0f757d1ef8671ac268edce80a15edbfe610cb067f10141b247fb8a34', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 05:00:44', '2021-03-31 05:00:44', '2022-03-31 07:00:44'),
('5a8548cf8f9ee36e04636d800c58bb44f819c836f9967cc2ab2c6690486fbbf6cfcab98bfa48db2c', 42, 4, 'EITDEV', '[]', 0, '2021-02-07 12:14:51', '2021-02-07 12:14:51', '2022-02-07 14:14:51'),
('5b8987fd4c386a51062b4089c7bca08ac71aab33a29e51d429d1a2af494ac2283c70071a3350f296', 42, 4, 'EITDEV', '[]', 0, '2021-02-08 09:11:10', '2021-02-08 09:11:10', '2022-02-08 11:11:10'),
('5c246b09904958f6a1b3bd219be577b29aac5150ca243d9f8fa32bbd8df8cc9146e6268f8850f404', 1, 4, 'EITDEV', '[]', 0, '2021-05-03 20:23:13', '2021-05-03 20:23:13', '2022-05-03 22:23:13'),
('60dc7932be0bbc24d2662744271ac80744f36de6ca49547ab00b1a66bd6e2466bbd91aadf9fce332', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:22:17', '2021-03-31 06:22:17', '2022-03-31 08:22:17'),
('67b62cf872611dd2921bbcff0b656ef099dd7740a6ef356e9028ae085dd0aa2fb66465d39559994b', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 07:54:37', '2021-03-31 07:54:37', '2022-03-31 09:54:37'),
('68f311d773699ec515ee24ce42f988e825eadc43439e8d9cc03fef21e4b308fa27898d673fa8f5f2', 1, 4, 'EITDEV', '[]', 0, '2020-11-29 10:00:50', '2020-11-29 10:00:50', '2021-11-29 16:00:50'),
('6e225aa7455361af3aca1bf8fe500c41e1d62e21f8fc2f0bbdf3b64600cbb4c579b4fe88814b5881', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:20:02', '2021-03-31 06:20:02', '2022-03-31 08:20:02'),
('6ec0f1daf4bb9184ccc5d04882a04e1a5b70b3bd9a237223a261c261ea3c4b5455ffe55c40e83d62', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:06:51', '2021-03-31 06:06:51', '2022-03-31 08:06:51'),
('6ef7242b976fac7bf02aa7bee86fde3fbab4a4c992be371ee1168ba5b8994b35af5c548ffc62d429', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:08:00', '2021-03-31 06:08:00', '2022-03-31 08:08:00'),
('70611aebfd5754a587df60c4ce36a9fc7c106bf96bf8e4ce769bb5cf7bc99ce5c0f3eec04ea9ff24', 42, 4, 'EITDEV', '[]', 0, '2021-02-08 05:04:54', '2021-02-08 05:04:54', '2022-02-08 07:04:54'),
('726a23cbb4fbe48df4485f6d4967587086b8379065773ec9e78beffdf715c0ff0f7aee7bf6afa499', 42, 4, 'EITDEV', '[]', 0, '2021-02-08 10:43:37', '2021-02-08 10:43:37', '2022-02-08 12:43:37'),
('77cf74f0aa8e788166caedf95f38fdad2024584eefcaa2afa4ecba1d5105f8011597f5054a4fce83', 1, 4, 'EITDEV', '[]', 0, '2020-11-29 09:41:54', '2020-11-29 09:41:54', '2021-11-29 15:41:54'),
('7930c75427928ba398d907f4ebdffdf70bfbfa7605f0cc795c12e475854c81b1b0c3c2dac96f1fb6', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:07:07', '2021-03-31 06:07:07', '2022-03-31 08:07:07'),
('79a9d22ad02e5d40b348556a60ec6dacfdf182fb9effce0e23385a3b3fc058c677c4b834b7ebe143', 1, 4, 'EITDEV', '[]', 0, '2021-04-04 12:23:04', '2021-04-04 12:23:04', '2022-04-04 14:23:04'),
('7a32a9e3a3a6cb16f857ee390715c00be708494405a6b1ed8419f7ac908f91fd94033081a06b471a', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 05:41:50', '2021-03-31 05:41:50', '2022-03-31 07:41:50'),
('7ef30c459d81f738f2d62cc3a9265652dc90a79cb36daaf33020430d51e5d850a4b335b182c4eac9', 42, 4, 'EITDEV', '[]', 0, '2021-02-08 07:20:24', '2021-02-08 07:20:24', '2022-02-08 09:20:24'),
('7fd3d917974b945579bf3b1fad8a6724d97cfd50aea2cd75636558929e238f10a6d26f1a8d511d20', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:06:23', '2021-03-31 06:06:23', '2022-03-31 08:06:23'),
('8393642ffeb12c3e10cd82f0be934a394abd1f9f024a7a4793598f415c113f77e238843a5d056533', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 07:31:24', '2021-03-31 07:31:24', '2022-03-31 09:31:24'),
('84bf037af061009afc5d2777cf7c6b67c9315025214a6b9035c73a3109301518508379c97f280a61', 43, 4, 'EITDEV', '[]', 0, '2021-02-08 06:31:13', '2021-02-08 06:31:13', '2022-02-08 08:31:13'),
('87deb50db7876924bb356d4782d54b6ffa151dadfd0bfabf0ef78961fa485cc56237962adc425770', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:39:22', '2021-03-31 06:39:22', '2022-03-31 08:39:22'),
('8a8795114e4e379d9e64645f988b8fd0ee684c8862f54ab100d7dd5782fda381e8f667543976d809', 42, 4, 'EITDEV', '[]', 0, '2021-02-08 06:33:00', '2021-02-08 06:33:00', '2022-02-08 08:33:00'),
('8c16a6b1980cf623c930ad4b54d5df9d70cc041dfb2e7dd9813b5a60dfe752eb10a63ee08c401d17', 42, 4, 'EITDEV', '[]', 0, '2021-02-08 10:45:30', '2021-02-08 10:45:30', '2022-02-08 12:45:30'),
('8cf1a859fe07a27aa0aaa3406dfc4082b2ad3744deb6de47fc594d2b34d2d0661cd1dd8f9b1d8a2d', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:26:46', '2021-03-31 06:26:46', '2022-03-31 08:26:46'),
('8f2f3d798993f9a600bbef4515fd00d4bdda58a53b7787d04b20ff1cfd5122a9db6ff0780ced8b8b', 43, 4, 'EITDEV', '[]', 0, '2021-02-10 15:45:45', '2021-02-10 15:45:45', '2022-02-10 17:45:45'),
('9683ce7b3c290d41060fc4f0dfc708acfd8629a55223f89c13f3cd4bdd56a9c78385f797806200f9', 1, 4, 'EITDEV', '[]', 0, '2021-04-05 09:46:21', '2021-04-05 09:46:21', '2022-04-05 11:46:21'),
('96e6feb6195070ad1ca07d42d4ca18d225549e31d74e4937970d9707be66589d5ee0e194053a0e54', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:42:10', '2021-03-31 06:42:10', '2022-03-31 08:42:10'),
('9802128851f9a2e051f1150eabd7f58a955a211459afa1cae4a8b604917f50311d4de439f23a577a', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 05:41:55', '2021-03-31 05:41:55', '2022-03-31 07:41:55'),
('98aaa3456cdeb4f488681d84524fc90954df0a0a3ba2b7afa954552176067a48dc7ffed3aa0a2174', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:21:58', '2021-03-31 06:21:58', '2022-03-31 08:21:58'),
('98d48e9f655edcb4528042266a6200459850549983325c6109201c1e445d925e53c7f9cacdac989e', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 05:55:01', '2021-03-31 05:55:01', '2022-03-31 07:55:01'),
('99b97e3eb1e69c210a82b6e2778d489531a42cacd00816ead11b9790e9953494095424309fa03c90', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 05:00:24', '2021-03-31 05:00:24', '2022-03-31 07:00:24'),
('99c0ea0d62c5cdf9bc666db8e38e04558f7314f351408281596288fae203c8e93785c1f66b058cab', 43, 4, 'EITDEV', '[]', 0, '2021-02-08 07:15:37', '2021-02-08 07:15:37', '2022-02-08 09:15:37'),
('9af12c88947b0fb387877807a5716b367f3074820e743265a06df6966165903c377b3aa132bb6c7a', 43, 4, 'EITDEV', '[]', 0, '2021-02-16 19:14:36', '2021-02-16 19:14:36', '2022-02-16 21:14:36'),
('9b698f3f9237fb98511a9ce95a2c386b07a240fc252d6bf4cd277591e499492e15a3a3a7e0a5fea5', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:06:53', '2021-03-31 06:06:53', '2022-03-31 08:06:53'),
('a19fde01e3a16159e0d410841b66f8a3985313e0c5a2ac8bc440e76544ea338a5a370f68fe769b69', 20, 4, 'EITDEV', '[]', 0, '2020-12-31 11:08:29', '2020-12-31 11:08:29', '2021-12-31 17:08:29'),
('a1b8161a3a13e8c5ecb6b8c345f083fe53647c6805ef718c2ce7f9a7dd668096e6f5d245581dfa91', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:44:45', '2021-03-31 06:44:45', '2022-03-31 08:44:45'),
('a2c562b7767437ca5b44b6a27ccdd29844fe320aed4f864b284d12928704a97e9749fcbf05a628b8', 1, 4, 'EITDEV', '[]', 0, '2020-11-29 10:03:40', '2020-11-29 10:03:40', '2021-11-29 16:03:40'),
('a5c716d39328b9d21086c5a9fd575f3305b7e44b65cc2929ae99397c06db57816dde66b059ef66d4', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 11:50:59', '2021-03-31 11:50:59', '2022-03-31 13:50:59'),
('a72835e83723faf1c1e9d0cbcf903a5eef6df9556913cb5846633856d821bb8091b480ba17e09ee5', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 07:39:09', '2021-03-31 07:39:09', '2022-03-31 09:39:09'),
('a7931f445c22264dc878cfabcac8b5a4d92acd11afcc24052e3e7c13f60977f15ad1f2e0b96287a5', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:26:47', '2021-03-31 06:26:47', '2022-03-31 08:26:47'),
('ad817692824e68ce0ff964aa85df1293be663d2a0de666ae0d92d2a64a03d67c9af80d5596b54ba3', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 07:30:02', '2021-03-31 07:30:02', '2022-03-31 09:30:02'),
('ad950303e621e3a6090d8b11fbda9e1c774e765e75fc5ec1649047700b3e541b1d0d23a9d5cbb015', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 08:31:23', '2021-03-31 08:31:23', '2022-03-31 10:31:23'),
('af729a150abb0b2cf1ab5045bd7ad0c0cb24fa784b2775dec30e57bd8643d40294aa3bdc5d3671f9', 43, 4, 'EITDEV', '[]', 0, '2021-02-19 20:29:25', '2021-02-19 20:29:25', '2022-02-19 22:29:25'),
('b006bc66a9d76cab3ba58758330ce59b16f6c786cdc64c14d1a5158fb77ef3813ba18a0e9cd02234', 41, 4, 'EITDEV', '[]', 0, '2021-02-08 05:57:30', '2021-02-08 05:57:30', '2022-02-08 07:57:30'),
('b178887110583c3a529ced2cbd8c31b6957d41da1de31f50cf3fe9193c09f7abe37c2374a7ec24a3', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:22:17', '2021-03-31 06:22:17', '2022-03-31 08:22:17'),
('b684c07fab2bff75681c7c46d456b4ed4a3beca8d6d62357b2157a9b8a412db20cf84739606c04a7', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 15:38:38', '2021-03-31 15:38:38', '2022-03-31 17:38:38'),
('b78c05972bc738c7026848e1da5f5764a37ab16ebf4b98ac8fc9c93a37717bb375382dbfae6c1b4a', 43, 4, 'EITDEV', '[]', 0, '2021-02-08 06:26:51', '2021-02-08 06:26:51', '2022-02-08 08:26:51'),
('b7b19bd6dff2448d84d15f634348ca5259d0979a656e0c0df77fb04e8090ae0d069cf1ec9ef5dd91', 43, 4, 'EITDEV', '[]', 0, '2021-02-08 06:29:44', '2021-02-08 06:29:44', '2022-02-08 08:29:44'),
('b9cb0b9f9c83bad79a3ab0c3e74e50e78848fcec38e10b8146cbc3e7ed6a7e879d3f3887817f2f51', 42, 4, 'EITDEV', '[]', 0, '2021-02-16 19:15:55', '2021-02-16 19:15:55', '2022-02-16 21:15:55'),
('bc8a474012a05a991f9634ed7b2ae93c0a2c68c9fe1ccc0aa9192c39156cae5cb15d38042f115206', 2, 4, 'EITDEV', '[]', 0, '2020-11-29 10:10:51', '2020-11-29 10:10:51', '2021-11-29 16:10:51'),
('bdf3a0c0ec5079f559f5c5272a4e7b43debe9031624d4d6aba159ce09e585bb4cf015298d487d834', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:24:54', '2021-03-31 06:24:54', '2022-03-31 08:24:54'),
('bf57a8d7e22e6f88944400ae24366e7b591ca683d6d9a67f43cbb55e456858bb8b8e264d272155cf', 1, 4, 'EITDEV', '[]', 0, '2021-02-08 06:02:05', '2021-02-08 06:02:05', '2022-02-08 08:02:05'),
('c3535e82fbb641f5d8e01c21135e421d43a45c06c4537ba291ecd5683bbe510f2efe535928cf44ca', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 07:35:52', '2021-03-31 07:35:52', '2022-03-31 09:35:52'),
('c573062feeb3f0e9f34bb23202469c0fb32ddef3715ed24d98f6e73db19ee328e6c32662ef94376c', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 05:01:25', '2021-03-31 05:01:25', '2022-03-31 07:01:25'),
('cb5c5e053299c2aab18e91c392f4139965032b623d3b220b0412d9a484f73a3b0d2cffcb0be3a712', 5, 4, 'EITDEV', '[]', 0, '2020-11-29 10:09:05', '2020-11-29 10:09:05', '2021-11-29 16:09:05'),
('cc3f363b545fe199ea3cd0a10ff1eb110313a0c266573c88bed67426e1daf52d0acfc32d45c13c96', 1, 4, 'EITDEV', '[]', 0, '2020-11-29 09:34:32', '2020-11-29 09:34:32', '2021-11-29 15:34:32'),
('cc5d03c13045c3a6d1722fdf935cf5a34579b7453c863f8f5e5aab85b7967c16495b863a53451c7f', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:18:58', '2021-03-31 06:18:58', '2022-03-31 08:18:58'),
('d596009579c617d0b58bf970e9ded4a34a543782e564a5a1bf36dffe700c3cbfb5f856ca309d217f', 42, 4, 'EITDEV', '[]', 0, '2021-02-16 19:13:51', '2021-02-16 19:13:51', '2022-02-16 21:13:51'),
('d7379101b8c2d578b426cd07a34e7edcd67f734f2453f534897ef6c0cc518d686e50c3e6a97a7d5c', 20, 4, 'EITDEV', '[]', 0, '2020-12-31 11:12:35', '2020-12-31 11:12:35', '2021-12-31 17:12:35'),
('dadfc27111d3e2ea4b773565a9ceae788fae9f826361d7a8d2784cf8e33c03380fe0fad0bc17abec', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 06:26:45', '2021-03-31 06:26:45', '2022-03-31 08:26:45'),
('df8675935b7b91ea3c8ea8a59839c324e1be7b2b8499f3cf2b53f68d132d3feb6321856a4ad4187f', 43, 4, 'EITDEV', '[]', 0, '2021-02-08 06:27:15', '2021-02-08 06:27:15', '2022-02-08 08:27:15'),
('e285eb6b912fbee80700ed9dd619eb39f5cdabd5bcc233410612a83ec01e56b72eb6542184836721', 1, 4, 'EITDEV', '[]', 0, '2021-03-31 05:10:30', '2021-03-31 05:10:30', '2022-03-31 07:10:30'),
('e3537091374a1b102f370d20b131cf801383f9ba924d023f56fb14a5029399decefa01beb7a526dd', 1, 4, 'EITDEV', '[]', 0, '2021-02-08 05:08:23', '2021-02-08 05:08:23', '2022-02-08 07:08:23'),
('e386cf0c893b57d95359a2425f8bea02e2aa89ad0c914d893f2d1e277222078fbf1f19185cde1bdf', 2, 4, 'EITDEV', '[]', 0, '2020-11-29 10:05:21', '2020-11-29 10:05:21', '2021-11-29 16:05:21'),
('e39c4261158ba847b8c9b7c0b13b3fb3248c2f6ba439d053ecd60fb10d54a6baa34a7eda3eea160e', 1, 4, 'EITDEV', '[]', 0, '2021-04-04 05:20:25', '2021-04-04 05:20:25', '2022-04-04 07:20:25'),
('e4e479d6c70b7fcfa8ae8dd65a6558b828e9d51f7f569d8bf20e2d1455853a117cfe1b7d7f55a0b5', 43, 4, 'EITDEV', '[]', 0, '2021-02-08 06:42:13', '2021-02-08 06:42:13', '2022-02-08 08:42:13'),
('e7f0e0f167d27dfa2fded3ebb03041b59c702f8e5ee64facb2f1d7d2f060f85dae99a5c9080dbc74', 2, 4, 'EITDEV', '[]', 1, '2020-11-29 10:10:31', '2020-11-29 10:10:31', '2021-11-29 16:10:31'),
('ec0d0c27ff246ad67e4d7987d547f583c795d1964746331791975d674378963337fa705028801ed7', 43, 4, 'EITDEV', '[]', 0, '2021-02-16 19:12:35', '2021-02-16 19:12:35', '2022-02-16 21:12:35'),
('f48d3cfc2d25c944ca1d44dded576838ad56b81cc51dd79227173b098a0df06a11f5a4ab63f11c29', 5, 4, 'EITDEV', '[]', 0, '2020-11-29 10:12:32', '2020-11-29 10:12:32', '2021-11-29 16:12:32'),
('f99ad55a942b7eb2b86e29204c54f6b67fe9b2223a3ebf6319bd76ad5116c19fe743e2ef78569a98', 1, 4, 'EITDEV', '[]', 0, '2021-02-07 12:21:49', '2021-02-07 12:21:49', '2022-02-07 14:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'Oy7plxYNQTPs5IYOtiGrtqx2sh9BW53yyw4RT3Ev', NULL, 'http://localhost', 1, 0, 0, '2020-11-29 16:55:31', '2020-11-29 16:55:31'),
(2, NULL, 'Laravel Password Grant Client', 'mKjMR41oKz7qpIKxPAYh7AiCsTVeEMnEvMLDIQEG', 'users', 'http://localhost', 0, 1, 0, '2020-11-29 16:55:31', '2020-11-29 16:55:31'),
(3, NULL, 'authToken', '00zaPss8wdpLO1mBJ7iY7iNFEjmaDXq7GIueopt3', NULL, 'http://localhost', 1, 0, 0, '2020-11-29 08:49:42', '2020-11-29 08:49:42'),
(4, NULL, 'Laravel Personal Access Client', 'yPXAgIKulaMSPvEC3xfwUD81KosThfjly0lZBknM', NULL, 'http://localhost', 1, 0, 0, '2020-11-29 09:03:40', '2020-11-29 09:03:40'),
(5, NULL, 'Laravel Password Grant Client', 'QNb2FdGdqQW6SniCK5xVOClHDD0Nci5FHD3DtBHD', 'users', 'http://localhost', 0, 1, 0, '2020-11-29 09:03:40', '2020-11-29 09:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-29 16:55:31', '2020-11-29 16:55:31'),
(2, 3, '2020-11-29 08:49:42', '2020-11-29 08:49:42'),
(3, 4, '2020-11-29 09:03:40', '2020-11-29 09:03:40');

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
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `salary` double DEFAULT NULL,
  `deduction` double DEFAULT NULL,
  `allowance` double DEFAULT NULL,
  `bonus` double DEFAULT NULL,
  `payment_created_at` timestamp NULL DEFAULT NULL,
  `payment_updated_at` timestamp NULL DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `fromdate` datetime DEFAULT NULL,
  `todate` datetime DEFAULT NULL,
  `attendance_count` int(11) DEFAULT NULL,
  `holidays` int(11) DEFAULT NULL,
  `leaves` int(11) DEFAULT NULL,
  `absent` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `approve_key` int(11) DEFAULT NULL COMMENT '1 if done, 2 if pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `reference`, `salary`, `deduction`, `allowance`, `bonus`, `payment_created_at`, `payment_updated_at`, `month`, `year`, `fromdate`, `todate`, `attendance_count`, `holidays`, `leaves`, `absent`, `comment`, `approve_key`) VALUES
(4, 1, 24997, 33, NULL, 15, '2020-11-24 05:13:57', '2021-01-14 05:49:54', NULL, NULL, '2020-11-01 00:00:00', '2020-11-30 00:00:00', NULL, NULL, NULL, NULL, 'test', 1),
(6, 14, 3, 0, NULL, 2000, '2021-01-21 06:27:44', NULL, NULL, NULL, '2021-01-01 00:00:00', '2021-01-20 00:00:00', 0, NULL, NULL, NULL, NULL, 1),
(7, 6, NULL, 0, NULL, 0, '2021-01-21 06:41:12', NULL, NULL, NULL, '2021-01-01 00:00:00', '2021-01-20 00:00:00', 0, NULL, NULL, NULL, NULL, 1),
(8, 2, 25000, 1000, 1000, 2000, '2021-01-21 06:43:45', '2021-01-21 12:49:31', NULL, NULL, '2021-01-14 00:00:00', '2021-01-20 00:00:00', NULL, NULL, NULL, NULL, NULL, 1),
(9, 5, 25000, 0, NULL, 0, '2021-01-21 06:44:35', NULL, NULL, NULL, '2021-01-01 00:00:00', '2021-01-20 00:00:00', 2, NULL, NULL, NULL, NULL, 1),
(16, 11, 25000, 0, NULL, 0, '2021-01-26 06:49:16', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 2),
(17, 21, 20000, 0, NULL, 0, '2021-01-28 01:07:51', NULL, NULL, NULL, '2021-01-01 00:00:00', '2021-01-29 00:00:00', 0, NULL, NULL, NULL, NULL, 1),
(18, 21, 20000, 2000, NULL, 3000, '2021-01-28 01:10:35', NULL, NULL, NULL, '2021-02-01 00:00:00', '2021-02-28 00:00:00', 0, NULL, NULL, NULL, 'test', 1),
(19, 28, 20000, 0, NULL, 0, '2021-01-28 01:24:47', NULL, NULL, NULL, '2021-01-01 00:00:00', '2021-01-20 00:00:00', 0, NULL, NULL, NULL, NULL, 2),
(20, 28, 20000, 4323, NULL, 3423, '2021-01-28 01:25:18', NULL, NULL, NULL, '2021-01-14 00:00:00', '2021-01-30 00:00:00', 0, NULL, NULL, NULL, 'cfg', 1),
(22, 31, NULL, 0, NULL, 0, '2021-02-08 05:05:42', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status` enum('Ongoing','Finished','OnHold') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ongoing',
  `project_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_start_date` date DEFAULT NULL,
  `project_end_date` date DEFAULT NULL,
  `project_budget` int(11) DEFAULT 0,
  `project_workspace_id` int(11) NOT NULL,
  `project_created_by` int(11) NOT NULL,
  `project_created_at` timestamp NULL DEFAULT NULL,
  `project_updated_at` timestamp NULL DEFAULT NULL,
  `assign_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_status`, `project_description`, `project_start_date`, `project_end_date`, `project_budget`, `project_workspace_id`, `project_created_by`, `project_created_at`, `project_updated_at`, `assign_to`) VALUES
(21, 'test', 'OnHold', 'test', '2020-12-20', '2020-12-23', 3, 16, 16, '2020-12-09 19:05:37', '2021-01-14 02:38:56', NULL),
(22, 'vczvxzc', 'OnHold', 'cXZ', NULL, NULL, NULL, 16, 16, '2020-12-09 20:54:59', NULL, NULL),
(26, 'rr', 'Finished', NULL, NULL, NULL, NULL, 16, 1, '2021-01-14 02:05:38', NULL, NULL),
(35, 'test', 'OnHold', 'dsfa', '2021-01-11', NULL, NULL, 21, 1, '2021-01-13 19:43:58', '2021-01-28 03:41:59', NULL),
(36, 'gfdg', 'Finished', 'dgdg', '2021-01-30', '2021-01-30', 5, 19, 1, '2021-01-29 23:28:40', NULL, NULL),
(37, 'saas1', 'Ongoing', 'saas1', '2021-03-17', '2021-03-20', NULL, 22, 1, '2021-03-17 01:19:18', NULL, NULL),
(42, 'abc', 'Ongoing', 'abc', '2021-06-23', '2021-06-23', 250, 24, 51, '2021-06-23 06:09:59', NULL, NULL),
(43, 'abc', 'Ongoing', 'abc', '2021-06-23', '2021-06-23', 12000, 25, 51, '2021-06-22 23:13:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registered_client_projects`
--

CREATE TABLE `registered_client_projects` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_details` text DEFAULT NULL,
  `project_deadline` date DEFAULT NULL,
  `project_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_client_projects`
--

INSERT INTO `registered_client_projects` (`id`, `client_id`, `project_name`, `project_details`, `project_deadline`, `project_status`, `created_at`, `updated_at`) VALUES
(2, 20, 'test uuu', 'test uuughsdfg sd', '2020-12-14', 'Running', '2020-12-31 10:21:21', '2021-01-14 07:25:06'),
(3, 26, 'sdfg', NULL, '2020-12-27', 'Running', '2021-01-14 07:03:07', '2021-01-14 07:23:08'),
(4, 40, 'Courier Management - Plabon Datta', 'dgh', '2021-01-28', 'Complete', '2021-01-28 04:44:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clock_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_format` int(11) DEFAULT NULL,
  `iprestriction` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `country`, `timezone`, `clock_comment`, `rfid`, `time_format`, `iprestriction`, `opt`) VALUES
(1, 'Bangladesh', 'Asia/Dhaka', NULL, NULL, 1, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_start_date` datetime DEFAULT NULL,
  `task_assign_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_project_id` int(11) NOT NULL,
  `task_milestone_id` int(11) DEFAULT NULL,
  `task_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'todo',
  `task_order` int(11) DEFAULT 0,
  `task_created_at` timestamp NULL DEFAULT NULL,
  `task_updated_at` timestamp NULL DEFAULT NULL,
  `task_end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `task_priority`, `task_description`, `task_start_date`, `task_assign_to`, `task_project_id`, `task_milestone_id`, `task_status`, `task_order`, `task_created_at`, `task_updated_at`, `task_end_date`) VALUES
(58, 'cc', 'Low', 'cc cc as asdf ads', '2020-12-09 00:00:00', '1122_SAYEED, SAADMAN+001122_DEMO, MANAGER', 24, NULL, 'inprogress', 22, '2020-12-21 06:02:40', '2020-12-21 10:58:49', '2020-12-17 00:00:00'),
(60, 'my task', 'Low', NULL, '2020-12-15 00:00:00', '001133_DEMO, EMPLOYEE+10487_a', 25, NULL, 'todo', 12, '2020-12-21 10:51:59', NULL, '2020-12-25 00:00:00'),
(61, 'android ui sghsdf', 'Middle', 'fadsf  adf', '2020-12-09 00:00:00', '001133_DEMO, EMPLOYEE', 25, NULL, 'inprogress', 20, '2020-12-21 11:24:00', '2020-12-21 11:20:01', '2020-12-31 00:00:00'),
(62, 'daadsf', 'Middle', 'sdfafs', '2020-12-03 00:00:00', '10487_a+001133_DEMO, EMPLOYEE+10320_dd+001122_DEMO, MANAGER', 23, NULL, 'complete', 0, '2020-12-22 08:08:02', '2020-12-23 08:47:21', '2020-12-09 00:00:00'),
(63, 'fdsadf', 'Middle', 'fsdaf', '2020-12-02 00:00:00', '1122_SAYEED, SAADMAN', 21, NULL, 'inprogress', 14, '2020-12-22 09:39:13', '2021-01-13 20:54:00', '2020-12-18 00:00:00'),
(65, 'dsaf', 'Top', 'fsdaf', '2020-12-19 00:00:00', '001122_DEMO, MANAGER', 24, NULL, 'todo', 8, '2020-12-23 07:36:20', NULL, '2020-12-15 00:00:00'),
(66, 'sfdh', 'Middle', 'hs', '2020-12-13 00:00:00', '001122_DEMO, MANAGER', 23, NULL, 'inprogress', 14, '2020-12-23 08:25:22', NULL, '2020-12-16 00:00:00'),
(67, 'saad', 'Middle', 'ertfgar', '2021-01-07 00:00:00', '10320_dd', 34, NULL, 'inprogress', 14, '2021-01-13 19:01:57', NULL, '2021-01-07 00:00:00'),
(68, 'rest api fixing', 'Low', 'fdd', '2021-01-28 00:00:00', '288628_shaun', 35, NULL, 'complete', 0, '2021-01-28 04:00:00', NULL, '2021-01-28 00:00:00'),
(69, 'aa', 'Top', 'aa', '2021-03-17 00:00:00', '1122_SAYEED, SAADMAN+10320_dd', 37, NULL, 'complete', 1, '2021-03-17 01:28:19', '2021-03-17 01:52:22', '2021-03-17 00:00:00'),
(70, 'jkjj', 'Low', '414', '2021-03-19 00:00:00', '1122_SAYEED, SAADMAN', 37, NULL, 'inprogress', 8, '2021-03-18 06:02:19', NULL, '2021-03-19 00:00:00'),
(71, 'task', 'Middle', NULL, '2021-03-24 00:00:00', '1122_SAYEED, SAADMAN', 38, NULL, 'inprogress', 6, '2021-03-24 05:42:10', NULL, '2021-03-25 00:00:00'),
(72, 'iii', 'Top', 'kkk', NULL, '001133_DEMO, EMPLOYEE', 40, NULL, 'inprogress', 4, '2021-03-24 10:02:01', NULL, NULL),
(73, 'cv v', 'Top', 'cffc', NULL, '001133_DEMO, EMPLOYEE+1122_SAYEED, SAADMAN', 40, NULL, 'todo', 4, '2021-03-24 10:38:01', NULL, NULL),
(74, 'gbg', 'Top', 'gfgg', NULL, '001133_DEMO, EMPLOYEE', 40, NULL, 'inprogress', 2, '2021-03-24 10:27:02', NULL, NULL),
(75, 'ygyg', 'Top', 'tgty', '2021-03-04 00:00:00', '10320_dd', 36, NULL, 'todo', 2, '2021-03-28 23:23:47', NULL, '2021-03-12 00:00:00'),
(76, 'abc', 'Top', 'dsfdsfsdf', '2021-06-23 00:00:00', '333335_jhon mac', 42, NULL, 'complete', 0, '2021-06-22 19:05:02', NULL, '2021-06-24 00:00:00'),
(77, 'abc', 'Top', 'rgrfdg', '2021-06-23 00:00:00', '83330_tarik jaman', 43, NULL, 'todo', 0, '2021-06-22 23:41:04', NULL, '2021-06-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_data`
--

CREATE TABLE `tbl_company_data` (
  `id` int(11) UNSIGNED NOT NULL,
  `reference` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `jobposition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `companyemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `idno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `startdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `dateregularized` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leaveprivilege` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_company_data`
--

INSERT INTO `tbl_company_data` (`id`, `reference`, `company`, `department`, `jobposition`, `companyemail`, `idno`, `startdate`, `dateregularized`, `reason`, `leaveprivilege`) VALUES
(1, 1, 'TETS', 'DFGH', '', '', '001122', '2020-02-01', '2020-02-01', '', 3),
(2, 2, '', '', '', '', '001133', '2020-02-01', '2020-02-01', '', 3),
(4, 4, '', 'GRAPHICS', '', 'fdas@gad.com', 'DSAF', '1970-01-01', '1970-01-01', '', 3),
(5, 5, '', '', '', 'test@test.com', '1122', '1970-01-01', '1970-01-01', '', 3),
(6, 6, 'ESSENTIAL-INFOTECH', 'GRAPHICS', '', 'test@test.com', '3333', '2020-11-02', '2020-12-05', '', NULL),
(7, 7, 'ESSENTIAL-INFOTECH', 'WEB DEVELOPMENT', '', 'fdas@gad.com', '10005', '2020-11-11', '2020-11-18', '', 3),
(8, 8, '', '', '', '', '10069', '1970-01-01', '1970-01-01', '', NULL),
(9, 9, '', '', '', '', '10351', '1970-01-01', '1970-01-01', '', NULL),
(10, 10, 'ESSENTIAL-INFOTECH', 'WEB DEVELOPMENT', '', '', '10487', '1970-01-01', '1970-01-01', '', 3),
(11, 11, '', '', '', '', '10320', '1970-01-01', '1970-01-01', '', NULL),
(12, 12, '', '', '', '', '10376', '1970-01-01', '1970-01-01', '', NULL),
(13, 13, 'ESSENTIAL-INFOTECH', 'WEB DEVELOPMENT', '', 'w@w.com', '112233', '2020-11-18', '2020-11-14', '', 3),
(14, 14, 'ESSENTIAL-INFOTECH', '', '', 'fdas@gad.com', '112244', '2020-12-16', '2020-12-09', '', 3),
(15, 22, '', '0', '', '', '953822', '', NULL, '', NULL),
(16, 23, '', '0', '', '', '380123', '', NULL, '', NULL),
(17, 24, 'TETS', 'WEB DEVELOPMENT', 'SENIOR WEB DEVELOPER', 'w@w.comf', 'FSADFASDF', '2021-01-04', '2021-01-25', '', 3),
(18, 25, '', '0', '', '', '719925', '', NULL, '', NULL),
(19, 26, 'TETS', 'FRONT END', '', '', '837126', '2020-11-01', '2020-11-01', '', NULL),
(20, 27, '', '0', '', '', '496827', '', NULL, '', NULL),
(21, 28, 'TETS', 'FRONT END', '', '', '10363', '2020-11-01', '2020-11-01', '', 3),
(22, 29, 'TETS', 'WEB DEVELOPMENT', 'JUNIOR WEB DEVELOPER', 'eitwebdeveloper@gmail.com', '1036323', '2021-02-26', '2021-03-04', '', 3),
(23, 30, 'TETS', 'WEB DEVELOPMENT', 'JUNIOR WEB DEVELOPER', 'eitwebdeveloper@gmail.com', '221133', '2021-02-16', '2021-03-04', '', 3),
(24, 31, '', '0', '', '', '778231', '', NULL, '', NULL),
(25, 32, '', '0', '', '', '696932', '', NULL, '', NULL),
(26, 33, '', '0', '', '', '206233', '', NULL, '', NULL),
(27, 34, '', '0', '', '', '143434', '', NULL, '', NULL),
(28, 35, '', '0', '', '', '333335', '', NULL, '', NULL),
(29, 36, 'TETS', 'WEB DEVELOPMENT', 'JUNIOR WEB DEVELOPER', 'arif@gmail.com', '10140', '2021-06-22', '2021-06-22', '', 3),
(30, 37, 'TETS', 'GRAPHICS', 'JUNIOR WEB DEVELOPER', 'arif@gmail.com', '25566', '2021-06-23', '2021-06-23', NULL, 3),
(31, 38, 'ESSENTIAL INFOTECH', 'WEB DEVELOPMENT', 'JUNIOR WEB DEVELOPER', 'ei@gmail.com', '10132', '2021-06-23', '2021-06-23', NULL, 3),
(32, 39, 'ESSENTIAL INFOTECH', 'WEB DEVELOPMENT', 'SENIOR WEB DEVELOPER', 'eit@gmail.com', '12345', '2021-06-23', '2021-06-23', NULL, 3),
(33, 42, 'ESSENTIAL INFOTECH', 'WEB DEVELOPMENT', '', 'drsrg@gmail.com', '83330', '2020-11-01', '2020-11-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_company`
--

CREATE TABLE `tbl_form_company` (
  `id` int(11) UNSIGNED NOT NULL,
  `company` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_form_company`
--

INSERT INTO `tbl_form_company` (`id`, `company`) VALUES
(10, 'TETS'),
(11, 'EIT'),
(12, 'ESSENTIAL INFOTECH'),
(13, 'DATASOFT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_department`
--

CREATE TABLE `tbl_form_department` (
  `id` int(11) UNSIGNED NOT NULL,
  `department` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_form_department`
--

INSERT INTO `tbl_form_department` (`id`, `department`) VALUES
(5, 'Web Development'),
(6, 'Graphics'),
(7, 'FRONT END'),
(8, 'DFGH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_jobtitle`
--

CREATE TABLE `tbl_form_jobtitle` (
  `id` int(11) UNSIGNED NOT NULL,
  `jobtitle` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `dept_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_form_jobtitle`
--

INSERT INTO `tbl_form_jobtitle` (`id`, `jobtitle`, `dept_code`) VALUES
(9, 'JUNIOR WEB DEVELOPER', 5),
(10, 'SENIOR WEB DEVELOPER', 5),
(12, 'GRAPHIC DESIGNER', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_leavegroup`
--

CREATE TABLE `tbl_form_leavegroup` (
  `id` int(11) UNSIGNED NOT NULL,
  `leavegroup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leaveprivileges` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_form_leavegroup`
--

INSERT INTO `tbl_form_leavegroup` (`id`, `leavegroup`, `description`, `leaveprivileges`, `status`) VALUES
(3, 'GOVT LEAVE', 'TEST', '3,4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_leavetype`
--

CREATE TABLE `tbl_form_leavetype` (
  `id` int(11) UNSIGNED NOT NULL,
  `leavetype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percalendar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_form_leavetype`
--

INSERT INTO `tbl_form_leavetype` (`id`, `leavetype`, `limit`, `percalendar`) VALUES
(3, 'GOVT LEAVE', '15', 'Monthly'),
(4, 'GOVT HOLYDAYS', '15', 'Monthly'),
(5, 'SICK', '12', 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_people`
--

CREATE TABLE `tbl_people` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `idno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civilstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthplace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homeaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employmentstatus` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employmenttype` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_people`
--

INSERT INTO `tbl_people` (`id`, `user_id`, `idno`, `firstname`, `mi`, `lastname`, `age`, `gender`, `emailaddress`, `civilstatus`, `height`, `weight`, `mobileno`, `birthday`, `nationalid`, `birthplace`, `homeaddress`, `employmentstatus`, `employmenttype`, `avatar`, `salary`, `emergency_contact`, `father`, `mother`) VALUES
(1, NULL, NULL, 'MANAGER', '', 'DEMO', NULL, '', 'manager@example.com', '', NULL, NULL, NULL, '2020-01-03', '', '', '', 'Archived', NULL, '', '24997', 'test_tset_test', 'test', 'test'),
(2, NULL, NULL, 'DEMO TEST', '', 'EMPLOYEE DSFAS', NULL, '', 'employee@example.com', '', NULL, NULL, NULL, '2020-01-03', '', '', '', 'Active', NULL, '006.jpg', '25000', NULL, '', ''),
(4, NULL, NULL, 'DEMO 2', 'DEMO2', 'DEMO', 20, 'MALE', 'demo2@example.com', 'SINGLE', '6', '3', '544165465', '1998-01-17', '35654156', 'DHAKA', '52156', 'Active', 'Regular', 'logo.png', NULL, NULL, '', ''),
(5, NULL, NULL, 'SAADMAN', 'SAAD', 'SAYEED', 26, 'MALE', 'saadman@gmail.com', 'MARRIED', '200', '84', '3243432', '1996-12-14', '35654156', 'DHAKA', '52156', 'Active', 'Regular', '330px-Pierre-Person.jpg', '25000', NULL, '', ''),
(6, NULL, NULL, 'TEST', 'TEST', 'TEST', 22, 'FEMALE', 'demo3@example.com', 'MARRIED', '4', '3', '343432432', '2003-08-20', '35654156', 'DHAKA', '52156', 'Active', 'Trainee', 'logo2.png', NULL, NULL, '', ''),
(10, NULL, NULL, 'A', 'A', 'A', 33, 'MALE', 'a@a.com', 'MARRIED', '22', '22', '01937570729', '1970-01-01', '', 'DHAKA', '52156', 'Archived', 'Regular', '', NULL, NULL, '', ''),
(11, NULL, NULL, 'DD', 'DD', 'DD', 22, 'MALE', 'dd@d.com', 'SINGLE', '22', '22', '324', '2020-11-13', '35654156', 'DHAKA', '52156', 'Archived', 'Regular', '330px-Pierre-Person.jpg', '25000', NULL, '', ''),
(12, NULL, NULL, 'Y', 'Y', 'Y', 22, 'MALE', 'y@y.com', 'SINGLE', '33', '33', '53425', '2020-11-12', '35654156', 'DHAKA', '52156', 'Active', NULL, '330px-Pierre-Person.jpg', NULL, 'testc_testc_22222', 'testf', 'testm'),
(13, NULL, NULL, 'W', 'W', 'W', 22, 'MALE', 'w@w.com', 'SINGLE', '22', '22', '32432', '2020-11-25', '35654156', 'DHAKA', '52156', 'Active', 'Regular', 'Moon.jpg', '30000', NULL, '', ''),
(14, NULL, NULL, 'A', 'A', 'A', 22, 'MALE', 'ddvv@d.com', 'SINGLE', '22', '22', '32432', '2020-12-23', '3243', 'DHAKA', '52156', 'Active', 'Regular', '006.jpg', '3', 'test_test_1111', 'test fa', 'ma'),
(22, NULL, NULL, NULL, '', 'emp14', NULL, '', 'emp14@gmail.com', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, '', 'emp22', NULL, '', 'emp22@gmail.com', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, 'SAADMAN', 'A', 'AA', NULL, 'MALE', 'a444@a.com', 'MARRIED', '23', '32', '01937570729', '1970-01-01', 'ESAF', '', '', 'Active', 'Trainee', '', '3', 'fadsf_fdfads_dsfasdf', 'sdafsad', 'fsdaf'),
(25, NULL, NULL, NULL, '', 'emp1', NULL, '', 'emp1@gmail.com', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, 'ATIKUR', 'RAHMAN', 'ATIKUR RAHMAN', NULL, 'MALE', 'atikur@gmail.com', 'UNMARRIED', '23', '32', '01937570728', '1970-01-01', '', '', '52156', 'Active', 'Regular', NULL, '20000', '__', 'Delwar', 'Afroza'),
(27, NULL, NULL, NULL, '', 'Atikur Rahman Tuhin', NULL, '', 'atikurrahmantuhin041@gmail.com', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, 'AERTSET', 'EDTED', 'SHAUN', 464, 'MALE', 'shaun@example.com', 'SINGLE', '55', '55', '456746464', '1970-01-01', '', 'FGDG', 'DGDGDGD', 'Active', 'Regular', '', '20000', '54646464_ytryr_456464646', 'fhgfhfh', 'fhfh'),
(29, NULL, NULL, 'GSDGD', 'S', 'SHAUN', 33, 'MALE', 'eitwebdeveloper@gmail.com', 'MARRIED', '3', '18', '06666665', '2021-02-18', '324324', 'NAOGAON', 'GSDGHFDHDSAF', 'Active', 'Regular', 'en_badge_web_generic.png', '12121', 'Laila Arjuman_Mother_+8806666665', 'gsdgd', 'gsdgd'),
(30, 19, NULL, 'RR', 'S', 'S222', 33, 'MALE', 'eitwebdeveloper@gmail.com', 'MARRIED', '3', '70', '06666665', '2021-02-17', '324324432', 'NAOGAON', 'GSDGHFDH', 'Active', 'Regular', 'brnnda-cmyk-logo-white-02.png', '323', 'Laila Arjuman_Mother_06666665', 'gsdgd', 'gsdgd'),
(31, 19, NULL, 'SA', 'SA', 'E1', 0, 'MALE', 'e1@gmail.com', 'SINGLE', NULL, NULL, '000000', '1970-01-01', NULL, 'DSF', 'DFSD', '', '', 'applouncher.png', NULL, 'sadf_sdaf_fsd', 'dfadf', 'fsdf'),
(32, 19, NULL, 'GIAS', 'UDDIN', 'SAMIR', 14, 'MALE', 'samir@gmail.com', 'SINGLE', '14', NULL, NULL, '1970-01-01', NULL, 'FASD', 'SDF', '', '', 'Circle Image.png', NULL, '__', 'ss', 'ss'),
(33, NULL, NULL, NULL, '', 'bi1', NULL, '', 'bi1@example.com', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, '', 'Frank', NULL, '', 'frank.chize@jelocorp.com', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(35, 51, NULL, NULL, '', 'jhon mac', NULL, '', 'eitwebdeveloper@gmail.com', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
(36, 51, NULL, 'ATIKUR', 'RAHMAN', 'ARIF', 20, 'MALE', 'arif@gmail.com', 'SINGLE', '120', '120', '012345678', '2021-06-22', '6445552244', 'DHAKA', 'SDFSF34543', 'Active', 'Regular', 'survey.png', '120', 'arif_arif_012345678', 'Delwar', 'Afroza'),
(37, 51, NULL, 'ATIKUR', 'RAHMAN', 'ARIF', 25, 'MALE', 'arif@gmail.com', 'SINGLE', '120', '150', '012345678', '2021-06-23', '6445552244', 'DHAKA', 'SDFSF34543', 'Active', 'Regular', 'survey.png', '20000', 'arif_arif_012345678', 'Delwar', 'Afroza'),
(38, 51, NULL, 'X', 'Y', 'Z', 25, 'MALE', 'arif@gmail.com', 'SINGLE', '250', '250', '012345678', '2021-06-23', '6445552245', 'DHAKA', 'SDFSF34543', 'Active', 'Regular', 'survey.png', '25000', 'arif_arif_012345678', 'Delwar', 'Afrozaa'),
(39, 51, NULL, 'ZAHID', 'RAHMAN', 'ZZZ', 25, 'MALE', 'zahid@gmail.com', 'SINGLE', '160', '160', '01316526272', '2021-06-23', '6445552247', 'DHAKA', '112FRTGHRTHYTR', 'Active', 'Regular', 'survey.png', '25000', 'zahid_aaa_01361918171', 'abc', 'efg'),
(42, 51, '83330', 'TARIK', 'JAMAN', 'MUNSHI', 22, 'MALE', 'arif@gmail.com', 'SINGLE', '120', '140', '012345678', '2021-06-23', '6445552244', 'DHAKA', 'SDFSF34543', 'Active', 'Regular', 'survey.png', '12000', 'arif_arif_012345678', 'Delwar', 'Afroza');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_people_attendance`
--

CREATE TABLE `tbl_people_attendance` (
  `id` int(11) UNSIGNED NOT NULL,
  `reference` int(11) DEFAULT NULL,
  `idno` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `date` date DEFAULT NULL,
  `employee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `timein` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalhours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `status_timein` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `status_timeout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_people_attendance`
--

INSERT INTO `tbl_people_attendance` (`id`, `reference`, `idno`, `date`, `employee`, `timein`, `timeout`, `totalhours`, `status_timein`, `status_timeout`, `reason`, `comment`, `created_at`, `ip`) VALUES
(1, 2, '001133', '2020-10-19', 'EMPLOYEE, DEMO ', '2020-10-19 05:32:00 AM', '2020-10-19 06:35:08 AM', '1.0', 'Ok', 'Ok', '', '', '2020-10-19 09:32:57', NULL),
(3, 1, '001122', '2020-10-28', 'DEMO, MANAGER ', '2020-10-28 05:57:00 PM', '2020-10-28 12:39:52 PM', '5.17', 'Ok', 'Ok', '', '', '2020-10-27 11:57:13', NULL),
(4, 2, '001133', '2020-11-09', 'EMPLOYEE, DEMO ', '2020-11-09 12:50:45 PM', '2020-11-09 1:50:45 PM', '1.0', 'Late In', 'On Time', '', '', '2020-11-09 06:50:45', NULL),
(5, 1, '001122', '2020-11-10', 'DEMO, MANAGER ', '2020-11-10 12:44:39 PM', '2020-11-10 12:44:45 PM', '0.0', 'Late In', 'Early Out', '', '', '2020-11-10 06:44:39', NULL),
(6, 2, '001133', '2020-11-11', 'EMPLOYEE, DEMO ', '2020-11-11 11:13:20 AM', '2020-11-11 11:13:50 AM', '0.0', 'Late In', 'On Time', '', '', '2020-11-11 05:13:20', NULL),
(7, 10, '10487', '2020-11-15', 'A, A A', '2020-11-15 12:44:44 PM', '2020-11-15 12:45:24 PM', '0.0', 'Ok', 'Ok', '', '', '2020-11-15 06:44:44', NULL),
(8, 11, '10320', '2020-11-15', 'DD, DD DD', '2020-11-15 01:10:16 PM', '2020-11-15 01:10:19 PM', '0.0', 'Ok', 'Ok', '', '', '2020-11-15 07:10:16', NULL),
(9, 12, '10376', '2020-11-15', 'Y, Y Y', '2020-11-15 01:13:55 PM', '2020-11-15 01:14:17 PM', '0.0', 'Ok', 'Ok', '', '', '2020-11-15 07:13:55', NULL),
(10, 2, '001133', '2020-11-16', 'EMPLOYEE DSFAS, DEMO TEST ', '2020-11-16 01:47:35 PM', '2021-01-06 06:53:07 PM', '1229.5', 'Late In', 'On Time', '', '', '2020-11-16 07:47:35', NULL),
(11, 5, '1122', '2020-11-16', 'SAYEED, SAADMAN SAAD', '2020-11-16 01:51:44 PM', '2020-12-28 12:13:12 PM', '1006.21', 'Late In', 'Early Out', '', '', '2020-11-16 07:51:44', NULL),
(12, 1, '001122', '2020-11-22', 'DEMO, MANAGER ', '2020-11-22 12:05:43 PM', '2020-12-31 06:41:24 PM', '942.35', 'Ok', 'Ok', '', '', '2020-11-22 06:05:43', NULL),
(13, 14, '112244', '2020-12-28', 'A, A A', '2020-12-28 11:52:22 AM', '2020-12-28 11:52:28 AM', '0.0', 'Ok', 'Ok', '', '', '2020-12-28 05:52:22', NULL),
(14, 5, '1122', '2020-12-28', 'SAYEED, SAADMAN SAAD', '2020-12-28 12:13:16 PM', '2020-12-28 12:19:24 PM', '0.6', 'Late In', 'Early Out', '', '', '2020-12-28 06:13:16', NULL),
(15, 5, '1122', '2020-12-31', 'SAYEED, SAADMAN SAAD', '2020-12-31 06:40:01 PM', '2021-01-03 11:47:19 AM', '65.7', 'Late In', 'Early Out', '', '', '2020-12-31 12:40:01', NULL),
(16, 1, '001122', '2020-12-31', 'DEMO, MANAGER ', '2020-12-31 06:42:07 PM', '2020-12-31 06:42:59 PM', '0.0', 'Ok', 'Ok', '', '', '2020-12-31 12:42:07', NULL),
(17, 5, '1122', '2021-01-03', 'SAYEED, SAADMAN SAAD', '2021-01-03 11:50:49 AM', '2021-01-03 11:51:23 AM', '0.0', 'Late In', 'Early Out', '', '', '2021-01-03 05:50:49', NULL),
(18, 13, '112233', '2021-01-03', 'W, W W', '2021-01-03 11:54:17 AM', '2021-01-03 11:54:23 AM', '0.0', 'Ok', 'Ok', '', '', '2021-01-03 05:54:17', NULL),
(19, 5, '1122', '2021-01-04', 'SAYEED, SAADMAN SAAD', '2021-01-04 10:53:05 AM', NULL, '', 'Late In', '', '', '', '2021-01-04 04:53:06', NULL),
(20, 19, '487219', '2021-01-05', 'EMP5,  ', '2021-01-05 05:36:08 PM', '2021-01-05 05:36:36 PM', '0.0', 'Ok', 'Ok', '', '', '2021-01-05 11:36:08', NULL),
(21, 20, '524120', '2021-01-05', 'EMP7,  ', '2021-01-05 05:51:49 PM', '2021-01-05 05:52:27 PM', '0.0', 'Ok', 'Ok', '', '', '2021-01-05 11:51:49', NULL),
(22, 20, '524120', '2021-01-06', '', '2021-01-06 06:44:28 PM', NULL, '', 'Ok', '', '', '', '2021-01-06 12:44:28', NULL),
(23, 22, '953822', '2021-01-06', 'EMP14,  ', '2021-01-06 06:46:22 PM', '2021-01-06 06:48:44 PM', '0.2', 'Ok', 'Ok', '', '', '2021-01-06 12:46:22', NULL),
(24, 1, '001122', '2021-01-06', 'DEMO, MANAGER ', '2021-01-06 06:54:00 PM', '2021-02-08 08:48:00 AM', '781.54', 'Ok', 'Ok', '', '', '2021-01-06 12:54:00', NULL),
(25, 11, '10320', '2021-01-06', 'DD, DD DD', '2021-01-06 06:54:22 PM', '2021-02-08 08:49:28 AM', '781.55', 'Ok', 'Ok', '', '', '2021-01-06 12:54:22', NULL),
(26, 28, '10363', '2021-01-31', 'SHAUN, AERTSET EDTED', '2021-01-31 08:51:10 AM', NULL, '', 'Ok', '', '', '', '2021-01-31 06:51:10', NULL),
(27, 31, '778231', '2021-02-08', 'E1, SA SA', '2021-02-08 06:19:14 AM', '2021-02-08 06:19:21 AM', '0.0', 'Ok', 'Ok', '', '', '2021-02-08 04:19:14', NULL),
(28, 32, '696932', '2021-02-08', 'GIAS UDDIN SAMIR,  ', '2021-02-08 08:04:20 AM', '2021-02-08 08:17:50 AM', '0.13', 'Ok', 'Ok', '', '', '2021-02-08 06:04:20', NULL),
(29, 1, '001122', '2021-02-08', 'DEMO, MANAGER ', '2021-02-08 08:48:03 AM', '2021-03-29 07:48:17 AM', '1175.0', 'Ok', 'Ok', '', '', '2021-02-08 06:48:03', NULL),
(30, 2, '001133', '2021-02-08', 'EMPLOYEE DSFAS, DEMO TEST ', '2021-02-08 08:48:14 AM', '2021-03-29 08:53:42 AM', '1176.5', 'Late In', 'On Time', '', '', '2021-02-08 06:48:14', NULL),
(31, 11, '10320', '2021-02-08', 'DD, DD DD', '2021-02-08 08:49:31 AM', NULL, '', 'Ok', '', '', '', '2021-02-08 06:49:31', NULL),
(32, 31, '778231', '2021-02-16', 'E1, SA SA', '2021-02-16 09:14:10 PM', '2021-02-16 09:16:17 PM', '0.2', 'Ok', 'Ok', '', '', '2021-02-16 19:14:10', NULL),
(33, 1, '001122', '2021-03-29', 'DEMO, MANAGER ', '2021-03-29 07:49:08 AM', '2021-03-29 07:49:33 AM', '0.0', 'Ok', 'Ok', '', '', '2021-03-29 05:49:08', NULL),
(34, 2, '001133', '2021-03-29', 'EMPLOYEE DSFAS, DEMO TEST ', '2021-03-29 08:54:05 AM', '2021-03-29 12:01:33 PM', '3.7', 'Late In', 'On Time', '', '', '2021-03-29 06:54:05', NULL),
(35, 2, '001133', '2021-03-31', 'EMPLOYEE DSFAS, DEMO TEST ', '2021-03-31 06:27:04 AM', '2021-03-31 06:27:15 AM', '0.0', 'Late In', 'Early Out', '', '', '2021-03-31 04:27:04', NULL),
(36, 2, '001133', '2021-04-01', 'EMPLOYEE DSFAS, DEMO TEST ', '2021-04-01 08:39:47 AM', '2021-04-01 08:39:59 AM', '0.0', 'Late In', 'On Time', '', '', '2021-04-01 06:39:47', NULL),
(42, 51, '83330', '2021-06-24', 'MUNSHI, TARIK JAMAN', '2021-06-24 04:18:58 PM', NULL, '', 'Late In', '', '', '', '2021-06-24 10:18:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_people_leaves`
--

CREATE TABLE `tbl_people_leaves` (
  `id` int(11) UNSIGNED NOT NULL,
  `reference` int(11) DEFAULT NULL,
  `idno` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `typeid` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `leavefrom` date DEFAULT NULL,
  `leaveto` date DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archived` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_people_leaves`
--

INSERT INTO `tbl_people_leaves` (`id`, `reference`, `idno`, `employee`, `typeid`, `type`, `leavefrom`, `leaveto`, `returndate`, `reason`, `status`, `comment`, `archived`) VALUES
(1, 2, '001133', 'EMPLOYEE, DEMO', 3, 'GOVT LEAVE', '2020-11-12', '2020-11-19', '2021-01-14', 'SDFA', 'Approved', 'ASDAD', NULL),
(2, 2, '001133', 'EMPLOYEE, DEMO', 3, 'GOVT LEAVE', '2020-11-12', '2020-11-04', '2020-11-10', 'DFGDS', 'Approved', 'DFASDF', NULL),
(3, 2, '001133', 'EMPLOYEE, DEMO', 3, 'GOVT LEAVE', '2020-11-11', '2020-11-12', '2020-11-12', 'GHURTE JAMU', 'Pending', NULL, NULL),
(4, 28, '288628', 'SHAUN, AERTSET', 4, 'GOVT HOLYDAYS', '2021-01-28', '2021-01-28', '2021-01-29', 'SDFBN', 'Pending', NULL, NULL),
(6, 51, '83330', 'MUNSHI, TARIK', 3, 'GOVT LEAVE', '2021-06-23', '2021-06-24', '2021-06-25', 'FEVER', 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_people_schedules`
--

CREATE TABLE `tbl_people_schedules` (
  `id` int(11) UNSIGNED NOT NULL,
  `reference` int(11) DEFAULT NULL,
  `idno` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datefrom` date DEFAULT NULL,
  `dateto` date DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `restday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archive` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_people_schedules`
--

INSERT INTO `tbl_people_schedules` (`id`, `reference`, `idno`, `employee`, `intime`, `outime`, `datefrom`, `dateto`, `hours`, `restday`, `archive`) VALUES
(2, 1, '001122', 'DEMO, MANAGER', '05:07 PM', '06:08 PM', '2020-10-03', '2020-10-30', 3, 'Monday, Tuesday', 1),
(6, 2, '001133', 'EMPLOYEE DEMO', '04:11 AM', '07:11 AM', '2020-11-10', '2020-11-27', 6, 'Monday, Tuesday, Wednesday', 0),
(8, 5, '1122', 'SAYEED SAADMAN', '10:00 AM', '06:00 PM', '2020-11-01', '2020-11-25', 8, 'Friday, Saturday', 0),
(9, 12, '10376', 'Y Y', '01:20 AM', '02:30 PM', '2020-11-16', '2020-11-24', 9, 'Friday, Saturday', 0),
(10, 51, '83330', 'MUNSHI TARIK', '10:00 AM', '06:00 PM', '2021-06-23', '2021-06-23', 8, 'Wednesday', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_views`
--

CREATE TABLE `tbl_report_views` (
  `id` int(11) UNSIGNED NOT NULL,
  `report_id` int(11) DEFAULT NULL,
  `last_viewed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_report_views`
--

INSERT INTO `tbl_report_views` (`id`, `report_id`, `last_viewed`, `title`) VALUES
(1, 1, 'May, 30 2021', 'Employee List Report'),
(2, 2, 'Jun, 23 2021', 'Employee Attendance Report'),
(3, 3, 'Jan, 28 2021', 'Employee Leaves Report'),
(4, 4, 'Jan, 28 2021', 'Employee Schedule Report'),
(5, 5, '', 'Organizational Profile'),
(6, 6, 'Jan, 28 2021', 'User Accounts Report'),
(7, 7, 'Jan, 30 2021', 'Employee Birthdays');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL DEFAULT 'black',
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `user_id`, `theme`, `timestamps`) VALUES
(3, 1, 'black', '2021-04-20 19:27:14'),
(4, 17, 'black', '2020-11-17 06:41:42'),
(5, 22, 'white', '2020-12-31 06:46:40'),
(6, 20, 'white', '2020-12-31 10:31:24'),
(7, 25, 'white', '2021-01-05 09:36:28'),
(8, 38, 'black', '2021-01-21 10:51:53'),
(9, 2, 'white', '2021-03-24 11:29:10'),
(10, 37, 'black', '2021-06-06 06:04:57'),
(11, 51, 'white', '2021-06-22 08:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `userprojects`
--

CREATE TABLE `userprojects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userprojects`
--

INSERT INTO `userprojects` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 4, 6, NULL, NULL),
(2, 1, 6, NULL, NULL),
(3, 5, 6, NULL, NULL),
(4, 3, 6, NULL, NULL),
(36, 5, 1, NULL, NULL),
(37, 5, 1, NULL, NULL),
(38, 5, 1, NULL, NULL),
(51, 3, 21, NULL, NULL),
(52, 2, 21, NULL, NULL),
(53, 10, 21, NULL, NULL),
(54, 5, 22, NULL, NULL),
(55, 2, 22, NULL, NULL),
(56, 1, 22, NULL, NULL),
(67, 5, 1, NULL, NULL),
(68, 8, 1, NULL, NULL),
(69, 2, 1, NULL, NULL),
(70, 2, 1, NULL, NULL),
(71, 3, 1, NULL, NULL),
(72, 5, 1, NULL, NULL),
(73, 16, 1, NULL, NULL),
(74, 2, 1, NULL, NULL),
(75, 3, 1, NULL, NULL),
(76, 5, 1, NULL, NULL),
(77, 15, 1, NULL, NULL),
(78, 3, 1, NULL, NULL),
(79, 4, 1, NULL, NULL),
(80, 15, 1, NULL, NULL),
(81, 1, 1, NULL, NULL),
(82, 5, 1, NULL, NULL),
(83, 16, 1, NULL, NULL),
(84, 5, 1, NULL, NULL),
(85, 8, 1, NULL, NULL),
(86, 2, 1, NULL, NULL),
(87, 4, 1, NULL, NULL),
(88, 5, 1, NULL, NULL),
(89, 8, 1, NULL, NULL),
(90, 2, 1, NULL, NULL),
(91, 4, 1, NULL, NULL),
(92, 5, 1, NULL, NULL),
(93, 8, 1, NULL, NULL),
(94, 2, 1, NULL, NULL),
(95, 4, 1, NULL, NULL),
(96, 5, 1, NULL, NULL),
(97, 8, 1, NULL, NULL),
(98, 2, 1, NULL, NULL),
(99, 4, 1, NULL, NULL),
(106, 16, 21, NULL, NULL),
(112, 15, 35, NULL, NULL),
(113, 39, 35, NULL, NULL),
(114, 15, 36, NULL, NULL),
(115, 3, 37, NULL, NULL),
(116, 15, 37, NULL, NULL),
(128, 52, 42, NULL, NULL),
(129, 57, 43, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reference` int(11) DEFAULT NULL,
  `idno` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `role_id` int(11) DEFAULT NULL,
  `acc_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `reference`, `idno`, `name`, `email`, `role_id`, `acc_type`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '001122', 'DEMO, MANAGER', 'manager@example.com', 1, 2, 0, '$2y$10$mDAH.R8JG5ThPelt4zRXc.8sxizt.tqXQfndx5s/W/3j0Sq6xS3LG', 'J6W7u9tyRIyjK04QQLpXOgummfHLyhnhnleHVZNLDM5sK52xYFQ0Vx05NKl9', '2018-10-31 12:10:04', '2018-10-31 12:10:04'),
(2, NULL, 2, '001133', 'DEMO, EMPLOYEE', 'employee@example.com', 2, 1, 1, '$2y$10$3qjhKES39RmTl4k7PQWJ.OfG4uFzzF/iYJI8A1BLgYs2uDEfe5pry', '', '2018-12-21 05:20:18', '2018-12-21 05:20:18'),
(3, NULL, 5, '1122', 'SAYEED, SAADMAN', '786saadman@gmail.com', 1, 2, 1, '$2y$10$p6ECdxmxENR2P7p1HZS3Cevv5A1jE/c2s3uk37nkVc66tTtXMMmqq', NULL, '2020-11-10 07:44:13', '2020-11-10 07:44:13'),
(6, NULL, NULL, NULL, 'b', 'b@b.com', 2, 1, 1, '$2y$10$886/1yatAyM5R89PNtMxDeaqmCLgIzUQPvasZ9TmSMAr1rInk5xtG', NULL, '2020-11-15 06:47:59', '2020-11-15 06:47:59'),
(7, NULL, NULL, NULL, 'c', 'c@c.com', 2, 1, 1, '$2y$10$UOxokkfm1s1e4oGsPqt/OOcWLpb8PSntmDdLJaC9u1sdT7UX4gWu2', NULL, '2020-11-15 06:49:22', '2020-11-15 06:49:22'),
(15, NULL, 11, '10320', 'dd', 'dd@d.com', 2, 2, 0, '$2y$10$o2E6YVpnCEgv6D31odTkLebrysZ5tc0T/XHkSvtpGTSSOCp1mnAnm', NULL, '2020-11-15 07:04:05', '2020-11-15 07:04:05'),
(20, NULL, NULL, NULL, 'client3 c', 'client3@gmail.com', 3, 3, 1, '$2y$10$IJkRe50bA1M5Eg0TivN6Lum6hRMbyuGCrc0UNh7CYi4f0CEPyuDiy', NULL, '2020-12-31 06:03:25', '2020-12-31 06:03:25'),
(35, NULL, 23, '380123', 'emp22', 'emp22@gmail.com', 2, 1, 1, '$2y$10$WGxjluHYjuDL24A7MtCdDuuWKZngkz3mE39RoVFQSmplJnciN0ONq', NULL, '2021-01-14 07:56:27', '2021-01-14 07:56:27'),
(36, NULL, 25, '719925', 'emp1', 'emp1@gmail.com', 2, 1, 1, '$2y$10$yM/AcfLKDwN/OHuINjNlxu362lePZGwzRoO7D0gqcz/2K5SxO8wx.', NULL, '2021-01-14 12:03:10', '2021-01-14 12:03:10'),
(37, NULL, 19, '837126', 'Atikur Rahman', 'atikur@gmail.com', 1, 2, 1, '$2y$10$tHeZqunsVQCAU7XRf46.6e19ieI/s2JXP8i3k1bW8xB5mgMVD76K6', NULL, '2021-11-20 11:46:30', '2021-11-20 10:47:22'),
(38, NULL, 27, '496827', 'Atikur Rahman Tuhin', 'atikurrahmantuhin041@gmail.com', 2, 2, 1, '$2y$10$/HjK.jd1wnSSym0nTHy88.v3ivJqdcAbuoDU9tPqhxYq54USAl/l6', NULL, '2021-01-21 10:50:25', '2021-01-21 10:50:25'),
(39, NULL, 28, '288628', 'shaun', 'shaun@example.com', 2, 1, 1, '$2y$10$U1r4BonNGAyQ0fB.C0OTCuqTfjDP40G931Bz1mGCsAjlDWJ0JTRAm', NULL, '2021-01-27 12:05:33', '2021-01-27 12:05:33'),
(40, NULL, NULL, NULL, 'client@example.com', 'client@example.com', 3, 3, 1, '$2y$10$ilZQqcI1agNGC6xUpg7YxOntbRJx7osPOgAHPacVwouYKqQlPW2pG', NULL, '2021-01-28 08:01:57', '2021-01-28 08:01:57'),
(41, NULL, NULL, NULL, 'employee', 'employee2@example.com', 3, 3, 1, '$2y$10$vdaiK80gpIADINLzhGRdfOdN8ZAnLMFd.AB78E.Jm.GWVGbW8scMm', NULL, '2021-02-07 12:01:23', '2021-02-07 12:01:23'),
(42, NULL, 31, '778231', 'e1', 'e1@gmail.com', 2, 1, 1, '$2y$10$0Rs2Fes05BgMgkb7SNZwteFB/AQacSDp7tnJmKFNBd2wHX1e3aYdG', 'imDdwJTILXfOs1wMAstcV2GqcPaCvGcVtCnEe0cDBmX1D1dJLtN2j65Gy4Lp', '2021-02-07 12:03:23', '2021-02-07 12:03:23'),
(43, NULL, 32, '696932', 'Gias Uddin Samir', 'samir@gmail.com', 1, 2, 1, '$2y$10$MCj1GJ5rN2H3jPXfp8pddOYYKX0dF3lcHP4r92m1o7S4tD.V4Wyri', NULL, '2021-02-08 06:03:15', '2021-02-08 06:03:15'),
(44, NULL, NULL, NULL, 'JeloCorp', 'admin@jelocorp.co.za', 3, 3, 1, '$2y$10$JTKeUV0SY.GC74nSdXIj1.Aiva6Q3.z2d5jgpIeUQsdVIChcnBBg.', NULL, '2021-03-02 10:57:39', '2021-03-02 10:57:39'),
(45, NULL, NULL, NULL, 'Optic Software Solutions', 'admin@oss.co.za', 3, 3, 1, '$2y$10$DX2pItlqACeLTFFBtHzG/eFiG9ZDi9jtO3gygFBlTVBNvXJ2twJGm', NULL, '2021-03-02 10:59:29', '2021-03-02 10:59:29'),
(46, NULL, NULL, NULL, 'Tester1234', 'tester1234@gmail.com', 3, 3, 1, '$2y$10$2Lo1qvwXHY56E5UbkLudkOCzlOoiEo22NLn7Ba1No3O/XNhLMX2Ta', NULL, '2021-03-09 15:26:20', '2021-03-09 15:26:20'),
(47, NULL, NULL, NULL, 'bi', 'bi@example.com', 3, 3, 1, '$2y$10$6kMvBy5NUrF6Qvg2uVjLUO320ikr.VzqFZyQE1yYNrYBvrK/XX8.i', NULL, '2021-03-21 05:17:57', '2021-03-21 05:17:57'),
(48, NULL, 33, '206233', 'bi1', 'bi1@example.com', 2, 1, 1, '$2y$10$broRANTI76FwBrAY.cK9O.DzUDUq995wzVZet1sy1OlKFN7sHzb0.', NULL, '2021-03-21 05:19:29', '2021-03-21 05:19:29'),
(49, NULL, 34, '143434', 'Frank', 'frank.chize@jelocorp.com', 2, 1, 1, '$2y$10$2ML.ZfYlsqE1iYH2abICL.NtiRHHWj8.7//Fp8hPJGZycwe65uAHe', NULL, '2021-04-09 11:22:54', '2021-04-09 11:22:54'),
(50, NULL, NULL, NULL, 'Divan', 'divanserfontein@gmail.com', 3, 3, 1, '$2y$10$JYdAL5SzI726cqd2SiYlQeUOjhqPgbOzIMR..QBjOyRPThyYK91XC', NULL, '2021-04-20 19:44:12', '2021-04-20 19:44:12'),
(51, NULL, NULL, '444444', 'Mac Evan', 'eitwebdeveloper1@gmail.com', 3, 3, 1, '$2y$10$UiRmFCrqQSiAzDychFOf9ezeEVHnn0UMVCqlgar3ScfPQulmrtVVa', NULL, '2021-06-21 04:47:29', '2021-06-21 04:47:29'),
(52, 51, 35, '333335', 'jhon mac', 'eitwebdeveloper@gmail.com', 2, 1, 1, '$2y$10$Mu5YSm4BsACw0KCo8QV5Su/vXYZQ188MebxEbhhlYNMlMo88iUSbi', NULL, '2021-06-22 09:58:39', '2021-06-22 09:58:39'),
(57, 51, NULL, '83330', 'tarik jaman', 'tariqmolla8@gmail.com', 2, 1, 1, '$2y$10$eIvdXvV7dHay59WdBP6/rO/Ix6KZqDem2qQwhMstwY1uyoAcSWyQO', NULL, '2021-06-23 10:34:08', '2021-06-23 10:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `perm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`id`, `role_id`, `perm_id`) VALUES
(1798, 1, 1),
(1799, 1, 2),
(1800, 1, 22),
(1801, 1, 21),
(1802, 1, 23),
(1803, 1, 24),
(1804, 1, 25),
(1805, 1, 3),
(1806, 1, 31),
(1807, 1, 32),
(1808, 1, 4),
(1809, 1, 41),
(1810, 1, 42),
(1811, 1, 43),
(1812, 1, 44),
(1813, 1, 5),
(1814, 1, 52),
(1815, 1, 53),
(1816, 1, 9),
(1817, 1, 91),
(1818, 1, 7),
(1819, 1, 8),
(1820, 1, 81),
(1821, 1, 82),
(1822, 1, 83),
(1823, 1, 10),
(1824, 1, 101),
(1825, 1, 102),
(1826, 1, 103),
(1827, 1, 104),
(1828, 1, 11),
(1829, 1, 111),
(1830, 1, 112),
(1831, 1, 12),
(1832, 1, 121),
(1833, 1, 122),
(1834, 1, 13),
(1835, 1, 131),
(1836, 1, 132),
(1837, 1, 14),
(1838, 1, 141),
(1839, 1, 142),
(1840, 1, 15),
(1841, 1, 151),
(1842, 1, 152),
(1843, 1, 153),
(1887, 3, 1),
(1888, 3, 2),
(1889, 3, 22),
(1890, 3, 21),
(1891, 3, 23),
(1892, 3, 24),
(1893, 3, 25),
(1894, 3, 3),
(1895, 3, 31),
(1896, 3, 32),
(1897, 3, 4),
(1898, 3, 41),
(1899, 3, 42),
(1900, 3, 43),
(1901, 3, 44),
(1902, 3, 5),
(1903, 3, 52),
(1904, 3, 53),
(1905, 3, 9),
(1906, 3, 91),
(1907, 3, 7),
(1908, 3, 8),
(1909, 3, 81),
(1910, 3, 82),
(1911, 3, 11),
(1912, 3, 111),
(1913, 3, 112),
(1914, 3, 12),
(1915, 3, 121),
(1916, 3, 122),
(1917, 3, 13),
(1918, 3, 131),
(1919, 3, 132),
(1920, 3, 15),
(1921, 3, 151),
(1922, 3, 152),
(1923, 3, 153);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `role_name`, `state`) VALUES
(1, 'MANAGER', 'Active'),
(2, 'EMPLOYEE', 'Active'),
(3, 'CLIENT', 'Active'),
(6, 'MARKETER', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `usertasks`
--

CREATE TABLE `usertasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usertasks`
--

INSERT INTO `usertasks` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`, `task_id`) VALUES
(1, 5, 16, NULL, NULL, 5),
(2, 8, 16, NULL, NULL, 5),
(3, 2, 16, NULL, NULL, 5),
(4, 5, 16, NULL, NULL, 6),
(5, 8, 16, NULL, NULL, 6),
(6, 8, 16, NULL, NULL, 7),
(7, 2, 16, NULL, NULL, 7),
(8, 2, 16, NULL, NULL, 8),
(9, 8, 16, NULL, NULL, 9),
(10, 8, 16, NULL, NULL, 10),
(11, 8, 16, NULL, NULL, 11),
(12, 2, 16, NULL, NULL, 11),
(13, 8, 16, NULL, NULL, 12),
(14, 2, 16, NULL, NULL, 12),
(15, 5, 16, NULL, NULL, 13),
(16, 8, 16, NULL, NULL, 13),
(17, 8, 16, NULL, NULL, 14),
(18, 2, 16, NULL, NULL, 14),
(19, 8, 16, NULL, NULL, 16),
(20, 2, 16, NULL, NULL, 16),
(21, 8, 16, NULL, NULL, 17),
(22, 2, 16, NULL, NULL, 17),
(23, 5, 16, NULL, NULL, 19),
(24, 8, 16, NULL, NULL, 19),
(25, 2, 16, NULL, NULL, 19),
(26, 1, 15, NULL, NULL, 20),
(27, 4, 15, NULL, NULL, 21),
(28, 1, 15, NULL, NULL, 21),
(29, 4, 15, NULL, NULL, 22),
(30, 1, 15, NULL, NULL, 23),
(31, 4, 15, NULL, NULL, 24),
(32, 1, 15, NULL, NULL, 24),
(33, 4, 15, NULL, NULL, 25),
(34, 1, 15, NULL, NULL, 25),
(35, 4, 15, NULL, NULL, 27),
(36, 4, 15, NULL, NULL, 28);

-- --------------------------------------------------------

--
-- Table structure for table `userworkspaces`
--

CREATE TABLE `userworkspaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `workspace_id` int(11) NOT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userworkspaces`
--

INSERT INTO `userworkspaces` (`id`, `user_id`, `workspace_id`, `permission`, `created_at`, `updated_at`) VALUES
(10, 1, 16, 'owner', NULL, NULL),
(13, 1, 21, 'owner', NULL, NULL),
(14, 1, 22, 'owner', NULL, NULL),
(16, 51, 24, 'owner', NULL, NULL),
(17, 51, 25, 'owner', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `week_pays`
--

CREATE TABLE `week_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `colors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wdays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_w_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_w_f_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_fifteen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_f_interm_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `half_month_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_end_v` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_end_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_l_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_m_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twice_month_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `week_pays`
--

INSERT INTO `week_pays` (`id`, `colors`, `wdays`, `weekDate`, `e_w_date`, `e_w_f_date`, `month_fifteen`, `month_f_interm_day`, `half_month_date`, `month_end_v`, `month_end_day`, `month_end_date`, `t_l_d`, `t_m_d`, `twice_month_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'weekly', 'Sunday', '6-6-2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Month End', NULL, NULL, 0, NULL, NULL),
(2, 'monthly15th', '---choose---', NULL, NULL, NULL, '2021-6-15', '17', '2021-06-29', NULL, NULL, NULL, 'Month End', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

CREATE TABLE `workspace` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `lang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workspace`
--

INSERT INTO `workspace` (`id`, `workspace_name`, `slug`, `created_by`, `lang`, `created_at`, `updated_at`) VALUES
(16, 'saad', 'saad', 3, 'en', '2020-12-09 19:19:36', '2020-12-22 08:29:28'),
(18, 'ggg', 'ggg', 3, 'en', '2021-01-14 01:22:17', NULL),
(19, 'www', 'www', 1, 'en', '2021-01-14 01:38:17', '2021-01-26 06:17:42'),
(21, 'rwr', 'rwr', 1, 'en', '2021-01-14 03:34:28', NULL),
(22, 'Saas', 'saas', 1, 'en', '2021-03-17 01:58:12', NULL),
(24, 'testings', 'testings', 51, 'en', '2021-06-23 06:00:38', '2021-06-23 06:30:50'),
(25, 'crud', 'crud', 51, 'en', '2021-06-22 23:39:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_contacts`
--
ALTER TABLE `client_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empoyer_fillings`
--
ALTER TABLE `empoyer_fillings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_employees`
--
ALTER TABLE `new_employees`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_client_projects`
--
ALTER TABLE `registered_client_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company_data`
--
ALTER TABLE `tbl_company_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_company`
--
ALTER TABLE `tbl_form_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_department`
--
ALTER TABLE `tbl_form_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_jobtitle`
--
ALTER TABLE `tbl_form_jobtitle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_leavegroup`
--
ALTER TABLE `tbl_form_leavegroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_leavetype`
--
ALTER TABLE `tbl_form_leavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_people`
--
ALTER TABLE `tbl_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_people_attendance`
--
ALTER TABLE `tbl_people_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_people_leaves`
--
ALTER TABLE `tbl_people_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_people_schedules`
--
ALTER TABLE `tbl_people_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_report_views`
--
ALTER TABLE `tbl_report_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprojects`
--
ALTER TABLE `userprojects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertasks`
--
ALTER TABLE `usertasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userworkspaces`
--
ALTER TABLE `userworkspaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `week_pays`
--
ALTER TABLE `week_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workspace`
--
ALTER TABLE `workspace`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client_contacts`
--
ALTER TABLE `client_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empoyer_fillings`
--
ALTER TABLE `empoyer_fillings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `new_employees`
--
ALTER TABLE `new_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `registered_client_projects`
--
ALTER TABLE `registered_client_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_company_data`
--
ALTER TABLE `tbl_company_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_form_company`
--
ALTER TABLE `tbl_form_company`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_form_department`
--
ALTER TABLE `tbl_form_department`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_form_jobtitle`
--
ALTER TABLE `tbl_form_jobtitle`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_form_leavegroup`
--
ALTER TABLE `tbl_form_leavegroup`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_form_leavetype`
--
ALTER TABLE `tbl_form_leavetype`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_people`
--
ALTER TABLE `tbl_people`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_people_attendance`
--
ALTER TABLE `tbl_people_attendance`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_people_leaves`
--
ALTER TABLE `tbl_people_leaves`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_people_schedules`
--
ALTER TABLE `tbl_people_schedules`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_report_views`
--
ALTER TABLE `tbl_report_views`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userprojects`
--
ALTER TABLE `userprojects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users_permissions`
--
ALTER TABLE `users_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1924;

--
-- AUTO_INCREMENT for table `usertasks`
--
ALTER TABLE `usertasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `userworkspaces`
--
ALTER TABLE `userworkspaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `week_pays`
--
ALTER TABLE `week_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workspace`
--
ALTER TABLE `workspace`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
