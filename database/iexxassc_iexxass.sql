-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2026 at 12:26 PM
-- Server version: 8.0.46-0ubuntu0.24.04.3
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iexxassc_iexxass`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint UNSIGNED NOT NULL,
  `subtitle` json NOT NULL,
  `title` json NOT NULL,
  `content` json NOT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `subtitle`, `title`, `content`, `background_image`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"WHO WE ARE\", \"id\": \"SIAPA KAMI\"}', '{\"en\": \"About Us\", \"id\": \"Tentang Kami\"}', '{\"en\": \"I’exxass is a technology company operating in the field of Information and Communication Technology (ICT), with core expertise in website development, Networking and CCTV, as well as IT consultancy. We are committed to delivering innovative, efficient, and secure digital solutions to help businesses grow and adapt in a rapidly evolving digital era. Supported by a team of experienced professionals with a strong passion for technology.\", \"id\": \"I\'exxass adalah perusahaan teknologi yang bergerak di bidang Teknologi Informasi dan Komunikasi (TIK), dengan keahlian utama dalam pengembangan situs web, Jaringan dan CCTV, serta konsultasi TI. Kami berkomitmen untuk memberikan solusi digital yang inovatif, efisien, dan aman untuk membantu bisnis tumbuh dan beradaptasi di era digital yang berkembang pesat. Didukung oleh tim profesional berpengalaman dengan semangat yang kuat terhadap teknologi.\"}', 'content/about-us/fa61bb63-1f66-44a3-a739-30672bd36b47.webp', '2026-07-04 19:42:23', '2026-07-05 04:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'User has been updated', 'App\\Models\\User', 'updated', 1, 'App\\Models\\User', 1, '{\"old\": {\"email\": \"admin@admin.com\", \"updated_at\": \"2026-07-05T01:11:55.000000Z\"}, \"attributes\": {\"email\": \"admin@iexxass.com\", \"updated_at\": \"2026-07-05T01:49:43.000000Z\"}}', NULL, '2026-07-04 18:49:43', '2026-07-04 18:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('iexxass-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:2;', 1783598996),
('iexxass-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1783598996;', 1783598996),
('iexxass-cache-6b8b7582e5543ceae16c0999674953b4', 'i:1;', 1783598900),
('iexxass-cache-6b8b7582e5543ceae16c0999674953b4:timer', 'i:1783598900;', 1783598900),
('iexxass-cache-activitylog_cleaned_today', 'b:1;', 1783641600),
('iexxass-cache-spam_lock_127.0.0.1', 'b:1;', 1783599673),
('iexxass-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:88:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:17:\"view_any_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:13:\"view_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"create_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:15:\"update_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:15:\"delete_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:19:\"delete_any_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:21:\"force_delete_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:25:\"force_delete_any_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:16:\"restore_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:20:\"restore_any_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:18:\"replicate_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:16:\"reorder_activity\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:16:\"view_any_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"view_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"create_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:14:\"update_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:14:\"delete_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:18:\"delete_any_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:20:\"force_delete_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:24:\"force_delete_any_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:15:\"restore_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:19:\"restore_any_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:17:\"replicate_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:15:\"reorder_contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:28:\"view_any_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:24:\"view_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:26:\"create_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:26:\"update_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:26:\"delete_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:30:\"delete_any_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:32:\"force_delete_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:36:\"force_delete_any_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:27:\"restore_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:31:\"restore_any_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:29:\"replicate_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:27:\"reorder_file_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:34:\"view_any_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:30:\"view_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:32:\"create_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:32:\"update_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:32:\"delete_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:36:\"delete_any_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:38:\"force_delete_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:42:\"force_delete_any_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:33:\"restore_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:37:\"restore_any_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:35:\"replicate_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:33:\"reorder_file_upload_example_image\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:29:\"view_any_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:25:\"view_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:27:\"create_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:27:\"update_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:27:\"delete_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:31:\"delete_any_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:33:\"force_delete_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:37:\"force_delete_any_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:28:\"restore_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:32:\"restore_any_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:30:\"replicate_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:28:\"reorder_multi_upload_example\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:13:\"view_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:9:\"view_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:11:\"create_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:11:\"update_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:11:\"delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:15:\"delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:17:\"force_delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:21:\"force_delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:12:\"restore_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:16:\"restore_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:14:\"replicate_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:12:\"reorder_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:13:\"view_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:9:\"view_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:11:\"create_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:11:\"update_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:11:\"delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:15:\"delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:78;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:17:\"force_delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:21:\"force_delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:12:\"restore_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:16:\"restore_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:14:\"replicate_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:12:\"reorder_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:18:\"access_admin_panel\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:22:\"manage_system_settings\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:15:\"manage_about_us\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:15:\"manage_services\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}}}', 1783616821);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_22_031146_create_contacts_table', 1),
(7, '2026_07_05_011142_create_activity_log_table', 1),
(8, '2026_07_05_011142_create_permission_tables', 1),
(9, '2026_07_05_011143_add_event_column_to_activity_log_table', 1),
(10, '2026_07_05_011144_add_batch_uuid_column_to_activity_log_table', 1),
(11, '2026_07_05_022932_create_about_us_table', 2),
(12, '2026_07_05_030422_create_service_settings_table', 3),
(13, '2026_07_05_030422_create_services_table', 3),
(15, '2026_07_05_105210_make_dynamic_columns_translatable', 4),
(16, '2026_07_08_141932_create_projects_table', 5),
(17, '2026_07_08_141946_create_project_images_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_any_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(2, 'view_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(3, 'create_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(4, 'update_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(5, 'delete_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(6, 'delete_any_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(7, 'force_delete_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(8, 'force_delete_any_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(9, 'restore_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(10, 'restore_any_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(11, 'replicate_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(12, 'reorder_activity', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(13, 'view_any_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(14, 'view_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(15, 'create_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(16, 'update_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(17, 'delete_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(18, 'delete_any_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(19, 'force_delete_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(20, 'force_delete_any_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(21, 'restore_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(22, 'restore_any_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(23, 'replicate_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(24, 'reorder_contact', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(25, 'view_any_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(26, 'view_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(27, 'create_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(28, 'update_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(29, 'delete_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(30, 'delete_any_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(31, 'force_delete_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(32, 'force_delete_any_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(33, 'restore_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(34, 'restore_any_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(35, 'replicate_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(36, 'reorder_file_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(37, 'view_any_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(38, 'view_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(39, 'create_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(40, 'update_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(41, 'delete_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(42, 'delete_any_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(43, 'force_delete_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(44, 'force_delete_any_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(45, 'restore_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(46, 'restore_any_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(47, 'replicate_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(48, 'reorder_file_upload_example_image', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(49, 'view_any_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(50, 'view_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(51, 'create_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(52, 'update_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(53, 'delete_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(54, 'delete_any_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(55, 'force_delete_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(56, 'force_delete_any_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(57, 'restore_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(58, 'restore_any_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(59, 'replicate_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(60, 'reorder_multi_upload_example', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(61, 'view_any_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(62, 'view_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(63, 'create_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(64, 'update_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(65, 'delete_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(66, 'delete_any_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(67, 'force_delete_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(68, 'force_delete_any_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(69, 'restore_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(70, 'restore_any_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(71, 'replicate_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(72, 'reorder_role', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(73, 'view_any_user', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(74, 'view_user', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(75, 'create_user', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(76, 'update_user', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(77, 'delete_user', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(78, 'delete_any_user', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(79, 'force_delete_user', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(80, 'force_delete_any_user', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(81, 'restore_user', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(82, 'restore_any_user', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(83, 'replicate_user', 'web', '2026-07-04 18:11:54', '2026-07-04 18:11:54'),
(84, 'reorder_user', 'web', '2026-07-04 18:11:55', '2026-07-04 18:11:55'),
(85, 'access_admin_panel', 'web', '2026-07-04 18:11:55', '2026-07-04 18:11:55'),
(86, 'manage_system_settings', 'web', '2026-07-04 18:11:55', '2026-07-04 18:11:55'),
(87, 'manage_about_us', 'web', '2026-07-04 19:32:29', '2026-07-04 19:32:29'),
(88, 'manage_services', 'web', '2026-07-04 20:05:21', '2026-07-04 20:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `order_column` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_column` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2026-07-04 18:11:55', '2026-07-04 18:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` json NOT NULL,
  `detail_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` json DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_column` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon`, `description`, `detail_image`, `features`, `price`, `created_at`, `updated_at`, `order_column`) VALUES
(1, '{\"en\": \"IT Consultant\", \"id\": \"Konsultan TI\"}', 'content/services/052a8af5-83b5-4a2f-84e9-27e4695c9318.webp', '{\"en\": \"We help you make smarter technology decisions. From system integration to digital transformation strategies, Iexxass provides expert guidance to ensure your IT investments drive real business impact.\", \"id\": \"Kami membantu Anda membuat keputusan teknologi yang lebih cerdas. Dari integrasi sistem hingga strategi transformasi digital, Iexxass memberikan panduan ahli untuk memastikan investasi TI Anda mendorong dampak bisnis yang nyata.\"}', 'content/services/86236d76-6da7-424f-9710-30409b79e94f.webp', '{\"en\": [\"Expert IT Consulting — We provide strategic guidance to help businesses choose the right technologies that align with their goals.\", \"End-to-End System Integration — Our team ensures seamless integration between your devices, network, and software systems for better operational efficiency\", \"Future-Proof Strategies — We design solutions that not only solve today’s challenges but also prepare your business for future growth.\", \"Managed Support Services — We offer ongoing monitoring, maintenance, and technical support to ensure your systems run smoothly.\"], \"id\": [\"Konsultasi TI Ahli — Kami memberikan panduan strategis untuk membantu bisnis memilih teknologi yang tepat yang sejalan dengan tujuan mereka.\", \"Integrasi Sistem Menyeluruh (End-to-End) — Tim kami memastikan integrasi yang mulus antara perangkat, jaringan, dan sistem perangkat lunak Anda untuk efisiensi operasional yang lebih baik.\", \"Strategi Tahan Masa Depan (Future-Proof) — Kami merancang solusi yang tidak hanya memecahkan tantangan saat ini, tetapi juga mempersiapkan bisnis Anda untuk pertumbuhan di masa depan.\", \"Layanan Dukungan Terkelola — Kami menawarkan pemantauan berkelanjutan, pemeliharaan, dan dukungan teknis untuk memastikan sistem Anda berjalan dengan lancar.\"]}', NULL, '2026-07-05 01:32:49', '2026-07-05 04:43:25', 2),
(2, '{\"en\": \"Networking & CCTV Solutions\", \"id\": \"Solusi Jaringan & CCTV\"}', 'content/services/935b612f-70b9-4ce1-91c9-1b93282e8520.webp', '{\"en\": \"Iexxass provides reliable and scalable network infrastructure and CCTV system design, installation, and maintenance services\", \"id\": \"Iexxass menyediakan layanan desain, instalasi, dan pemeliharaan infrastruktur jaringan serta sistem CCTV yang andal dan dapat diskalakan.\"}', 'content/services/63d76300-b4d1-4de4-92a8-3f82df3476e1.webp', '{\"en\": [\"Free Consultation — Free consultation to help you determine your CCTV and network service needs, including system design, device placement, and Access Point planning.\", \"Installation by a Professional Team —Our experienced technicians handle CCTV installation, access point setup and configuration, as well as structured network cabling—performed neatly, efficiently, and in accordance with security standards\", \"After-Sales Support — Responsive technical support to ensure your CCTV and network systems remain stable, secure, and performing optimally.\", \"Exclusive Promotions — Take advantage of our special offers and seasonal deals for new clients.\"], \"id\": [\"Konsultasi Gratis — Konsultasi gratis untuk membantu Anda menentukan kebutuhan layanan CCTV dan jaringan Anda, termasuk desain sistem, penempatan perangkat, dan perencanaan Access Point.\", \"Instalasi oleh Tim Profesional — Teknisi kami yang berpengalaman menangani instalasi CCTV, pengaturan dan konfigurasi access point, serta pengkabelan jaringan terstruktur—dilakukan dengan rapi, efisien, dan sesuai dengan standar keamanan.\", \"Dukungan Purnajual — Dukungan teknis yang responsif untuk memastikan sistem CCTV dan jaringan Anda berjalan lancar.\", \"Promosi Eksklusif — Manfaatkan penawaran khusus dan promo musiman kami untuk klien baru.\"]}', 'Rp. 750.000', '2026-07-04 20:47:32', '2026-07-05 04:42:15', 1),
(3, '{\"en\": \"Web Developer\", \"id\": \"Pengembang Web\"}', 'content/services/c23d0a9e-f4da-4e8d-aada-a2197c262776.webp', '{\"en\": \"Web design and develop high-performance, responsive, and secure websites that enhance your brand’s digital presence.  From corporate profiles to e-commerce platforms, we create custom web solutions that are visually engaging and technically robust.\", \"id\": \"Desain dan pengembangan web berkinerja tinggi, responsif, dan aman yang meningkatkan kehadiran digital merek Anda. Dari profil perusahaan hingga platform e-commerce, kami menciptakan solusi web khusus yang menarik secara visual dan kuat secara teknis.\"}', 'content/services/d75f94e0-c49b-4923-a900-4941d153057a.webp', '{\"en\": [\"Free Consultation — Get a complimentary consultation session to discuss your website goals and strategy.\", \"Tailored Design — Every website is built based on your vision and business objectives.\", \"Design Satisfaction Guarantee — We offer up to 3 free design revisions to make sure you love the final result.\", \"Free Domain — Enjoy 1 year of free domain registration for your website.\", \"Free VA Scanning — Complimentary vulnerability assessment scanning to identify potential security risks on your website.\", \"After-Sales Support — We provide 3 months of technical support after your site goes live..\", \"Exclusive Promotions — Take advantage of our special offers and seasonal deals for new clients.\"], \"id\": [\"Konsultasi Gratis — Dapatkan sesi konsultasi gratis untuk mendiskusikan tujuan dan strategi situs web Anda.\", \"Desain yang Disesuaikan — Setiap situs web dibangun berdasarkan visi dan tujuan bisnis Anda.\", \"Jaminan Kepuasan Desain — Kami menawarkan hingga 3 kali revisi desain gratis untuk memastikan Anda menyukai hasil akhirnya.\", \"Domain Gratis — Nikmati pendaftaran domain gratis selama 1 tahun untuk situs web Anda.\", \"Pemindaian VA Gratis — Pemindaian penilaian kerentanan (vulnerability assessment) secara cuma-cuma untuk mengidentifikasi potensi risiko keamanan di situs web Anda.\", \"Dukungan Purnajual — Kami menyediakan dukungan teknis selama 3 bulan setelah situs Anda ditayangkan secara langsung (live).\", \"Promosi Eksklusif — Manfaatkan penawaran khusus dan promo musiman kami untuk klien baru.\"]}', 'Rp. 3.500.000', '2026-07-05 02:06:33', '2026-07-05 04:45:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_settings`
--

CREATE TABLE `service_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `subtitle` json NOT NULL,
  `title` json NOT NULL,
  `quote_title` json NOT NULL,
  `quote_subtitle` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_settings`
--

INSERT INTO `service_settings` (`id`, `subtitle`, `title`, `quote_title`, `quote_subtitle`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"WHAT WE OFFER\", \"id\": \"APA YANG KAMI TAWARKAN\"}', '{\"en\": \"Our Services\", \"id\": \"Layanan Kami\"}', '{\"en\": \"Upgrade Your Business to Be More Professional with I’Exxass\", \"id\": \"Tingkatkan Bisnis Anda Menjadi Lebih Profesional bersama I\'Exxass\"}', '{\"en\": \"Transforming The Future of Connectivity\", \"id\": \"Mengubah Masa Depan Konektivitas\"}', '2026-07-04 20:10:34', '2026-07-05 04:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ckcVJ6a7WpMHuPa4vIzWl7JqMmHlYnh3YUSQAufU', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiYWw1TWl6ZEplVTY4bFdDd3lQUlhjZThlOGV6NkdxcjJycGdjYmRQYyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8ud2VsbC1rbm93bi9hcHBzcGVjaWZpYy9jb20uY2hyb21lLmRldnRvb2xzLmpzb24iO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6IjcwYjM5ZDVlMDFkMWE1N2ViMjA3YTA3MzMwODBhM2U2NmE2MjUxZDI3ZTNkNTA4NmMxNTlkODZkYmQ3MjcxZDYiO3M6MTg6Imxhc3RfYWN0aXZpdHlfdGltZSI7aToxNzgzNTk5ODI5O3M6NjoibG9jYWxlIjtzOjI6ImlkIjt9', 1783599907);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` bigint UNSIGNED NOT NULL,
  `username` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'super_admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `avatar`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@iexxass.com', NULL, '$2y$12$K0rH8JC1q.Ai/iA2xG4x7.rcc7aGxqG7YG3cMoJey22ImIOBOXjpG', 'super_admin', '51HK9BBByFbrvJbdAthsmD05UBFvVBqk6IuGroaqY5Y1w7QkE3F2AcGF24kX', NULL, 1, '2026-07-04 18:11:55', '2026-07-04 18:49:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_images_project_id_foreign` (`project_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_settings`
--
ALTER TABLE `service_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_settings`
--
ALTER TABLE `service_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
