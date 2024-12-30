-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 05:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_isbn` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_publisher` varchar(255) NOT NULL,
  `book_publication_year` varchar(255) NOT NULL,
  `book_category` varchar(255) NOT NULL,
  `book_code` varchar(255) NOT NULL,
  `book_shelf_location` varchar(255) NOT NULL,
  `book_stock` varchar(255) NOT NULL,
  `book_stock_borrowing` int(11) DEFAULT NULL,
  `book_status` int(11) NOT NULL,
  `book_cover` varchar(255) NOT NULL,
  `book_updated_at` varchar(255) NOT NULL,
  `book_created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_isbn`, `book_title`, `book_author`, `book_publisher`, `book_publication_year`, `book_category`, `book_code`, `book_shelf_location`, `book_stock`, `book_stock_borrowing`, `book_status`, `book_cover`, `book_updated_at`, `book_created_at`) VALUES
('3216549879632', 'Soul', 'Agus', 'Kompas', '2022', 'thriller', '98765412', 'R24', '1', 0, 1, '1735481953.webp', '2024-12-29 21:19:13', '2024-12-29 21:19:13'),
('4561327891456', 'Bigger & Better', 'Kevin', 'gramedia', '2014', 'fiction', '78945815658566', 'R36', '0', 1, 1, '1735482647.png', '2024-12-29 21:30:47', '2024-12-29 21:30:47'),
('4567891322583', 'The Book of Art', 'Regina', 'gramedia', '2022', 'thriller', '788543245', 'R44', '0', 1, 1, '1735482283.jpg', '2024-12-29 21:24:43', '2024-12-29 21:24:43'),
('7418523691234', 'A Million To One', 'Tony', 'kompas', '2022', 'fiction', '45613274855', 'R58', '0', 1, 1, '1735482407.jpeg', '2024-12-30 00:45:41', '2024-12-29 21:26:47'),
('7531599876541', 'Design of Books', 'Debbie', 'Kompas', '2023', 'thriller', '123654875', 'R46', '3', 0, 1, '1735482171.png', '2024-12-29 21:22:51', '2024-12-29 21:22:51'),
('7894563214785', 'Bisnis Modern', 'Wilson', 'Gramedia', '2021', 'action', '78945456132', 'R31', '1', 1, 1, '1735573587.webp', '2024-12-30 22:46:28', '2024-12-30 22:46:28'),
('9517532587456', 'My Book Covers', 'John Doe', 'Kompas', '2019', 'action', '1324876545', 'R34', '1324876545', 0, 1, '1735482546.jpg', '2024-12-30 22:49:39', '2024-12-29 21:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE `borrowing` (
  `borrowing_id` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `book_isbn` varchar(255) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_code` varchar(255) NOT NULL,
  `book_shelf_location` varchar(255) NOT NULL,
  `book_cover` varchar(255) NOT NULL,
  `borrowing_qty` int(11) NOT NULL,
  `borrowing_start_date` varchar(255) NOT NULL,
  `borrowing_end_date` varchar(255) NOT NULL,
  `borrowing_overdue` varchar(255) DEFAULT NULL,
  `borrowing_status` int(11) NOT NULL,
  `borrowing_updated_at` varchar(255) NOT NULL,
  `borrowing_created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`borrowing_id`, `member_id`, `book_isbn`, `member_name`, `book_title`, `book_code`, `book_shelf_location`, `book_cover`, `borrowing_qty`, `borrowing_start_date`, `borrowing_end_date`, `borrowing_overdue`, `borrowing_status`, `borrowing_updated_at`, `borrowing_created_at`) VALUES
('B2024122917062098', '9876543219876541', '4561327891456', 'Jesslyn', 'Bigger & Better', '78945815658566', 'R36', '1735482647.png', 1, '2024-12-30 00:06:20', '2025-01-05 17:30:09', NULL, 0, '2024-12-30 00:28:54', '2024-12-30 00:06:20'),
('B2024122917300967', '1234567891234567', '4561327891456', 'james', 'Bigger & Better', '78945815658566', 'R36', '1735482647.png', 1, '2024-12-30 00:30:09', '2025-01-05 17:30:09', NULL, 0, '2024-12-30 00:30:15', '2024-12-30 00:30:09'),
('B2024122917312567', '9876543219876541', '4561327891456', 'Jesslyn', 'Bigger & Better', '78945815658566', 'R36', '1735482647.png', 1, '2024-12-30 00:31:25', '2025-01-05 17:31:25', NULL, 0, '2024-12-30 00:32:21', '2024-12-30 00:31:25'),
('B2024122917334556', '1234567891234567', '9517532587456', 'james', 'My Book Cover', '1324876545', 'R34', '1735482546.jpg', 1, '2024-12-30 00:33:45', '2025-01-05 17:33:45', NULL, 2, '2024-12-30 00:37:57', '2024-12-30 00:33:45'),
('B2024122917435344', '1234567891234567', '9517532587456', 'james', 'My Book Cover', '1324876545', 'R34', '1735482546.jpg', 1, '2024-12-30 00:43:53', '2025-01-05 17:43:53', NULL, 0, '2024-12-30 00:44:23', '2024-12-30 00:43:53'),
('B2024122917444294', '1234567891234567', '9517532587456', 'james', 'My Book Cover', '1324876545', 'R34', '1735482546.jpg', 1, '2024-12-30 00:44:42', '2025-01-05 17:44:42', NULL, 2, '2024-12-30 00:44:47', '2024-12-30 00:44:42'),
('B2024122917451433', '9876543219876541', '7418523691234', 'Jesslyn', 'A Million To One', '45613274855', 'R58', '1735482407.jpeg', 1, '2024-12-30 00:45:14', '2025-01-05 17:45:14', NULL, 1, '2024-12-30 00:45:14', '2024-12-30 00:45:14'),
('B2024122917582543', '9876543219876541', '4567891322583', 'Jesslyn', 'The Book of Art', '788543245', 'R44', '1735482283.jpg', 1, '2024-12-30 00:58:25', '2024-12-28 17:58:25', 'YES', 1, '2024-12-30 00:58:25', '2024-12-30 00:58:25'),
('B2024122919343995', '1234567891234562', '4561327891456', 'Jembut Newman', 'Bigger & Better', '78945815658566', 'R36', '1735482647.png', 1, '2024-12-30 02:34:39', '2024-12-28 19:34:39', NULL, 1, '2024-12-30 02:34:39', '2024-12-30 02:34:39'),
('B2024122919495860', '1234567891234562', '7418523691234', 'Jembut Newman', 'A Million To One', '45613274855', 'R58', '1735482407.jpeg', 1, '2024-12-30 02:49:58', '2024-12-28 19:49:58', NULL, 1, '2024-12-30 02:49:58', '2024-12-30 02:49:58'),
('B2024122919520722', '7418529637896541', '1234657891234', 'Jesslyn Gabrielle', 'Lights Around', '9876556', 'R12', '1735479592.jpg', 1, '2024-12-30 02:52:07', '2024-12-28 19:52:07', NULL, 1, '2024-12-30 02:52:07', '2024-12-30 02:52:07'),
('B2024123015541740', '1234567891234567', '7894563214785', 'John Doe', 'Bisnis Modern', '78945456132', 'R31', '1735573587.webp', 1, '2024-12-30 22:54:17', '2025-01-06 15:54:17', NULL, 0, '2024-12-30 22:55:04', '2024-12-30 22:54:17'),
('B2024123015555935', '1234567891234567', '7894563214785', 'John Doe', 'Bisnis Modern', '78945456132', 'R31', '1735573587.webp', 1, '2024-12-30 22:55:59', '2025-01-06 15:55:59', NULL, 2, '2024-12-30 22:56:34', '2024-12-30 22:55:59'),
('B2024123015584538', '1234567891234567', '7894563214785', 'John Doe', 'Bisnis Modern', '78945456132', 'R31', '1735573587.webp', 1, '2024-12-30 22:58:45', '2024-12-29 15:58:45', NULL, 1, '2024-12-30 22:58:45', '2024-12-30 22:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_updated_at` varchar(255) NOT NULL,
  `category_created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_updated_at`, `category_created_at`) VALUES
(8, 'action', '2024-12-29 14:43:09', '2024-12-29 14:43:09'),
(9, 'thriller', '2024-12-29 14:43:36', '2024-12-29 14:43:36'),
(10, 'anime', '2024-12-29 14:43:38', '2024-12-29 14:43:38'),
(11, 'fiction', '2024-12-29 19:03:03', '2024-12-29 14:43:44');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` varchar(255) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_status` int(11) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_updated_at` varchar(255) NOT NULL,
  `member_created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_email`, `member_status`, `member_password`, `member_updated_at`, `member_created_at`) VALUES
('1234567891234567', 'John Doe', 'johndoe@gmail.com', 1, '$2y$12$DP/hHkjgfgK0g7j/ma2RUuLCZ7pD3X25XGLFIQxXpWaRRolAsr.1q', '2024-12-30 22:40:50', '2024-12-30 22:40:50');

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
(1, '2024_12_29_053539_create_categories_table', 1),
(2, '0001_01_01_000000_create_users_table', 2),
(3, '0001_01_01_000001_create_cache_table', 2),
(4, '0001_01_01_000002_create_jobs_table', 2),
(5, '2024_12_29_081035_create_members_table', 3),
(6, '2024_12_29_081628_create_members_table', 4),
(7, '2024_12_29_081802_create_members_table', 5),
(8, '2024_12_29_082001_create_members_table', 6),
(9, '2024_12_29_082041_create_members_table', 7),
(10, '2024_12_29_092445_create_books_table', 8),
(11, '2024_12_29_154932_create_borrowings_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2WACHXjDcPZ9IMjr2jkQKVssq9XmXmO3qc5V8q0b', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS0FLSzdoZWx1T2pVNndMQUdoQWNKTndlYTE1YXFCaGZqZGFqVEZDbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib29rIjt9czo3OiJ1c2VyX2lkIjtpOjE7czo4OiJ1c2VybmFtZSI7czo1OiJhZG1pbiI7fQ==', 1735573652),
('3spbXwQ2Jzmur0HuNjYos1HgRslRNWOxjFJaOIHn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoid1ZpM2FsckZzTlpKQWozQTNwOHhmbXpZVWx6RGhtMkQ2UzVHaXUyMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735572863),
('4hDtDISIzf40OEO2TViBevVKqPpXtmjUnU1kwMqB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic0t5ZkV0ckJ6ZnphR1dHRkVDaW1MWDBoeHhVdDJMUnh0VmtwQTBVZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NzoidXNlcl9pZCI7aToxO3M6ODoidXNlcm5hbWUiO3M6NToiYWRtaW4iO30=', 1735574058),
('6dZTcA5pl77pgPhgPGYfpmbt1xrSJweuVebFqJT6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSVExVGpqeHJHMjVmRnlXYURvcXVmeUlpWmpYb0U3ajBVUGJEbUZqRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735573024),
('6J2WVRmwJnJBO9VAEf16pkdTr3lS8M1VyBRjvG9T', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib0VLRmY1a3M5T2dUTENMYlpDZXRFNG5RRmsxdlRHS3dVNFFnYXNTbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735573077),
('CBCQW1bkOxhvS8bYSznRswVUkIHmfYKyZ5tj5uJ0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoielpkRWpGaTVUUkF6MmpjVDU4aEhUaElPUm81STlldmNYcUx4elRLcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXRlZ29yeSI7fXM6NzoidXNlcl9pZCI7aToxO3M6ODoidXNlcm5hbWUiO3M6NToiYWRtaW4iO30=', 1735573415),
('cECyHlUkcovv4dl5F42NH7v5TR8neEIdHfQdP31l', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNElBbHVXRzl6YzRaaUtqQ2t4am1GWWhQcDZJcnBEaDBzTmpTZ1haOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NzoidXNlcl9pZCI7aToxO3M6ODoidXNlcm5hbWUiO3M6NToiYWRtaW4iO30=', 1735574160),
('cnICSKCBrWoHWtKfrlI7ITKk80tMa60Zkfg1XNHW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiamNaaGxZWFRHd2hSbHZwOTlGTmxqUUp6RHhYcVJzZDl1aDlVbFdJciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXRlZ29yeSI7fXM6NzoidXNlcl9pZCI7aToxO3M6ODoidXNlcm5hbWUiO3M6NToiYWRtaW4iO30=', 1735573317),
('Cqs8iV7UX2OejpwN48b56JygeWcCqOidkrnPWtIp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZXVBdHBONHNyZG8yWUZUbWZJODJNN3l6TXlWUWY2WnZ1aDlLRGh6MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib3Jyb3dpbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735574132),
('egdqwur9XnqivhzZwmi64kY3f38FNsntrBmXCbjI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibjhnZUN5cnFoUzFEZzAzQzIxdzVJYk1zRGI3ckJ0ZjBuYVJib21yViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib3Jyb3dpbmciO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735574194),
('emPQu7lHX7MUZT2U7DMsbXhVXOSnXEAGfIRYZ2gn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFNSZ2hoQ1lXdGhpSERFaXY5dEdLTm5XM2FVNHd0S0FZdXhKenNrMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbi91c2VyIjt9fQ==', 1735572664),
('fklboSV1UTqsDr8BnAUcifrVvJg2Je0c31DnT8t2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU1VlbG00ZG5vOEtPdlpxWmlMTWZjTDZHeHE1U1E0ajFIdE9HemJRZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735572936),
('IL4FyLHTgqDgD9RFMAQBge0MdtwiXWaHvRlmqjYL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiMTlCaVFvVzRGTm10eXloWWNpYWpWSm5ZbUdrYWpYMUd4TUZTMXVacSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib3Jyb3dpbmciO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735574165),
('KMjSqhiy9XLXYrR6YemoE6hnh32Yg9Zm3lKswNoj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNmxDazFMYnJ4WkZjWkJBZlgwNjNJSWM1ZFQ3emd5VmFnOHBNRkdsNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib3Jyb3dpbmciO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735574104),
('LnnkvOM8CAIks7L64EJEPeUoKtVgNSGsUGaKDVRA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQlduTGE2TW8zWkFlZXR3WXljUHhpVmFhUlFlUXlUeVJZOWQwaHRxcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib29rIjt9czo3OiJ1c2VyX2lkIjtpOjE7czo4OiJ1c2VybmFtZSI7czo1OiJhZG1pbiI7fQ==', 1735573697),
('N0zhdiM5RNCL6lZDkNfatEhzfbYAlncAqoKn7wij', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUzFOU0g5cVhWTloyY3hGbGJlNHpJRXFJdkFGaEtldkhSdnpOaEtibyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXRlZ29yeSI7fXM6NzoidXNlcl9pZCI7aToxO3M6ODoidXNlcm5hbWUiO3M6NToiYWRtaW4iO30=', 1735573380),
('N1C5SqmdQmnXZ2MlEduKwAsyr3Y2q26MKjOe7ELK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUUxuTGlNT2pnakdRdEdoRFdVbWQzWEJ5am0zS053T0JybVI1cmlUeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735572657),
('n2l36oZCObuJ8CjB2To22xRaaaBXVVTPwNlJ6hEK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaU9JRFNudzloaTlxbE44WE85MHVaQXN5cURMVWVaRHZjUnV5aVVITyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kaXNjb3ZlcnlNZW1iZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Im1lbWJlcl9pZCI7czoxNjoiMTIzNDU2Nzg5MTIzNDU2NyI7czoxMToibWVtYmVyX25hbWUiO3M6ODoiSm9obiBEb2UiO3M6MTM6Im1lbWJlcl9zdGF0dXMiO2k6MTt9', 1735574325),
('Nlg7FbeLgPZjYoaxGzDGQ6eABK0cVh7Fty1npJCM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiN2hrcDdMM251dVoweDdpNWNwZ1NSRkZLSVNqZXZSdkdTUjlEamdkaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib3Jyb3dpbmciO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735574035),
('OFkeNvE9mJJ9yQ6VB9Oy99vZLO3tTGw9HVCEiTVY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoid0oxQjNobVpmWnY2WFJwNU5UTUVXSzhsUlpPckZGTEZ0aWFmZ2VnNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib29rIjt9czo3OiJ1c2VyX2lkIjtpOjE7czo4OiJ1c2VybmFtZSI7czo1OiJhZG1pbiI7fQ==', 1735573830),
('oYcilKcdy2a9oAJ5OEeJftQpQKPkrRkajHylet2z', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSUNOQUNEdjF4NEhFQzdISDRoSEpPMkU2TURLQjRsanV3cDc2Uk9qdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735573113),
('OzhPwXIEJOOvbZmMjRB167RDfSpVftUrDf2RDJQ7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV0ZETHU4eWFVQkszSTc0SGIxc0JpZENxTURoSVJ0MHpQVVc0a3J3ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735572993),
('RFdrDFQuU1VsdlAG0BZz3mmRmS3yfUZ7kEIq4igZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSDNwSk9CS0JNSzkwa09zcFVaanp4SllORzFJcU9jZDJnUmlGZ2dVQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735573250),
('tNRnTNmhDGy7RmUarr32RVIPj0zbZpibh58FrTm1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNHFGeXEweDRDckhKYWtlS0ZIVlpSaXlsRDV3eW1RUUVJOUlEOGo4diI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735573155),
('VEsEjKt8BmjoFZvX967iLFdJmlyp4wowm2adObPo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYVp6cFk5UjEyS0hBUjByZUxtOTcxSGp3R0NBQnZ6TzdOWTRKWFV2RSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC8/c2VhcmNoPWJpc25pcyI7fXM6NzoidXNlcl9pZCI7aToxO3M6ODoidXNlcm5hbWUiO3M6NToiYWRtaW4iO30=', 1735574229),
('vs13h1AzPiYSlEk5ihnqBjZ8SLUcFhtTt7rZqN2L', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiamJlclo0eVBRZG81S2pRaG1aekxEVTRpbENVZ2RHZDVINFJlTkIxRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib29rIjt9czo3OiJ1c2VyX2lkIjtpOjE7czo4OiJ1c2VybmFtZSI7czo1OiJhZG1pbiI7fQ==', 1735573588),
('vsmYgprZvMlzD8GUtQSbp0Z2tzgczqIHR15ia567', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicmI5Z1UwUUZXYjcxTUJDWE9zbEZqdVBsRENDWnJXMXhJUFZxNUpmYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib29rIjt9czo3OiJ1c2VyX2lkIjtpOjE7czo4OiJ1c2VybmFtZSI7czo1OiJhZG1pbiI7fQ==', 1735573779),
('wbvwQjq8CPsfR5NnsSr5Di1AIIdRwEA4XhJuEmCr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQnF0WVVpT0UyMHlLZGVMeFNLV1Z1c01KNTlvYW01alVPb1VYcnptRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735572969),
('wR1BLJSZ1AYWqdthZfd1sN08YSweZz9DdjKuki9l', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaVBuWjdEaXFQS0xHY1NJNGUyVXdRUnZuZTlia0NFb0JPc29YMjlZciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735572594),
('x7eJSNjMgOS2xGPd3qCew6yG6V4BipoUEjnpFnuY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiR1duOWZUcUJWUWpVM3haNmc1WnJGN1RCRmtIQWRRaDZheDF1SVl0cSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib29rIjt9czo3OiJ1c2VyX2lkIjtpOjE7czo4OiJ1c2VybmFtZSI7czo1OiJhZG1pbiI7fQ==', 1735573747),
('xTn4GwnYPrEDrzTCuR4PgvxtUzG5WTVjrFNnjZec', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiZ2JseXlySUx2ZmV1Q1hFcXFCMFcwVWxyZDVnWGpUTDl6WTVVZ1lRTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbi91c2VyIjt9fQ==', 1735573202),
('yoDKHsDzsnmffWk0T5z9ELSInCbaD7EGck19JSqg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaklHd2FIOHlQY1VDdUtmVWtGbmtjcjI0TG1OVEpaeGNKUFJWNmhDWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZW1iZXIiO31zOjc6InVzZXJfaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjt9', 1735572758);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_password`) VALUES
(1, 'admin', '$2y$12$mr0XI11bZiHhXnOc2rmU1O3IURnndm.Dmeu.oj22Ac8cq0HL5DM.i');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_isbn`),
  ADD UNIQUE KEY `book_code` (`book_code`);

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`borrowing_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `check_borrowing_overdue` ON SCHEDULE EVERY 1 DAY STARTS '2024-12-30 01:02:08' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE borrowing
    SET borrowing_overdue = 'YES'
    WHERE borrowing_end_date < CURDATE()
    AND borrowing_status = 1
    AND borrowing_overdue IS NULL;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
