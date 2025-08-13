-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2025 at 02:52 PM
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
-- Database: `jurusan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_agungzumanji123@gmail.com|127.0.0.1', 'i:1;', 1752049695),
('laravel_cache_agungzumanji123@gmail.com|127.0.0.1:timer', 'i:1752049695;', 1752049695),
('laravel_cache_dumadi123@gmail.com|127.0.0.1', 'i:1;', 1752049690),
('laravel_cache_dumadi123@gmail.com|127.0.0.1:timer', 'i:1752049690;', 1752049690),
('pakarjurusan_cache_agungzumanji123@gmail.com|127.0.0.1', 'i:1;', 1752216796),
('pakarjurusan_cache_agungzumanji123@gmail.com|127.0.0.1:timer', 'i:1752216796;', 1752216796),
('pakarjurusan_cache_dumadi123@gmail.com|127.0.0.1', 'i:1;', 1752216839),
('pakarjurusan_cache_dumadi123@gmail.com|127.0.0.1:timer', 'i:1752216839;', 1752216839);

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
-- Table structure for table `jawabans`
--

CREATE TABLE `jawabans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawabans`
--

INSERT INTO `jawabans` (`id`, `siswa_id`, `pertanyaan_id`, `nilai`, `created_at`, `updated_at`, `jawaban`) VALUES
(2, 3, 10, 3, '2025-07-08 15:01:19', '2025-07-08 15:01:19', 'Suka'),
(3, 3, 7, 2, '2025-07-08 15:01:20', '2025-07-08 15:01:20', 'Netral'),
(4, 3, 8, 3, '2025-07-08 15:01:20', '2025-07-08 15:01:20', 'Suka'),
(5, 3, 15, 2, '2025-07-08 15:01:20', '2025-07-08 15:01:20', 'Netral'),
(6, 3, 9, 3, '2025-07-08 15:02:08', '2025-07-08 15:02:08', 'Suka'),
(7, 3, 14, 3, '2025-07-08 15:02:08', '2025-07-08 15:02:08', 'Suka'),
(8, 3, 12, 3, '2025-07-08 15:02:08', '2025-07-08 15:02:08', 'Suka'),
(9, 3, 4, 3, '2025-07-08 15:02:08', '2025-07-08 15:02:08', 'Suka'),
(10, 3, 13, 1, '2025-07-08 15:02:28', '2025-07-08 15:02:28', 'Tidak Suka'),
(11, 3, 3, 3, '2025-07-08 15:02:28', '2025-07-08 15:02:28', 'Suka'),
(12, 3, 2, 2, '2025-07-08 15:02:28', '2025-07-08 15:02:28', 'Netral'),
(13, 3, 6, 2, '2025-07-08 15:02:28', '2025-07-08 15:02:28', 'Netral'),
(14, 3, 16, 3, '2025-07-08 15:02:42', '2025-07-08 15:02:42', 'Suka'),
(15, 3, 5, 2, '2025-07-08 15:02:43', '2025-07-08 15:02:43', 'Netral'),
(16, 3, 11, 3, '2025-07-08 15:02:43', '2025-07-08 15:02:43', 'Suka'),
(17, 4, 12, 3, '2025-07-08 20:35:51', '2025-07-08 21:16:44', 'Suka'),
(18, 4, 8, 3, '2025-07-08 20:35:51', '2025-07-08 21:16:31', 'Suka'),
(19, 4, 6, 1, '2025-07-08 20:35:51', '2025-07-08 21:16:40', 'Tidak Suka'),
(20, 4, 7, 3, '2025-07-08 20:35:51', '2025-07-08 21:16:48', 'Suka'),
(21, 4, 14, 1, '2025-07-08 20:35:56', '2025-07-08 21:16:40', 'Tidak Suka'),
(22, 4, 16, 3, '2025-07-08 20:35:56', '2025-07-08 21:16:19', 'Suka'),
(23, 4, 11, 1, '2025-07-08 20:35:56', '2025-07-08 21:16:44', 'Tidak Suka'),
(24, 4, 13, 1, '2025-07-08 20:35:56', '2025-07-08 21:11:06', 'Tidak Suka'),
(25, 4, 10, 2, '2025-07-08 20:36:04', '2025-07-08 21:16:48', 'Netral'),
(26, 4, 2, 3, '2025-07-08 20:36:04', '2025-07-08 21:11:12', 'Suka'),
(27, 4, 9, 2, '2025-07-08 20:36:04', '2025-07-08 21:16:23', 'Netral'),
(28, 4, 15, 3, '2025-07-08 20:36:04', '2025-07-08 21:16:27', 'Suka'),
(29, 4, 5, 3, '2025-07-08 20:36:09', '2025-07-08 21:16:44', 'Suka'),
(30, 4, 3, 2, '2025-07-08 20:36:09', '2025-07-08 21:16:35', 'Netral'),
(31, 4, 4, 3, '2025-07-08 20:36:09', '2025-07-08 20:36:09', 'Suka'),
(32, 2, 8, 1, '2025-07-08 21:59:37', '2025-07-08 23:47:18', 'Tidak Suka'),
(33, 2, 12, 1, '2025-07-08 21:59:37', '2025-07-09 03:49:59', 'Tidak Suka'),
(34, 2, 6, 1, '2025-07-08 21:59:37', '2025-07-09 01:28:53', 'Tidak Suka'),
(35, 2, 11, 1, '2025-07-08 21:59:37', '2025-07-09 03:49:41', 'Tidak Suka'),
(36, 2, 16, 1, '2025-07-08 21:59:49', '2025-07-09 01:28:48', 'Tidak Suka'),
(37, 2, 2, 3, '2025-07-08 21:59:49', '2025-07-09 01:28:59', 'Suka'),
(38, 2, 15, 3, '2025-07-08 21:59:49', '2025-07-08 21:59:49', 'Suka'),
(39, 2, 7, 3, '2025-07-08 21:59:49', '2025-07-09 01:29:06', 'Suka'),
(40, 2, 10, 3, '2025-07-08 21:59:59', '2025-07-09 01:29:06', 'Suka'),
(41, 2, 3, 1, '2025-07-08 22:00:00', '2025-07-09 03:50:04', 'Tidak Suka'),
(42, 2, 14, 3, '2025-07-08 22:00:00', '2025-07-08 22:00:00', 'Suka'),
(43, 2, 4, 2, '2025-07-08 22:00:00', '2025-07-09 03:49:32', 'Netral'),
(44, 2, 9, 1, '2025-07-08 22:00:09', '2025-07-09 03:49:59', 'Tidak Suka'),
(45, 2, 5, 2, '2025-07-08 22:00:09', '2025-07-08 22:00:09', 'Netral'),
(46, 2, 13, 3, '2025-07-08 22:00:09', '2025-07-09 03:49:37', 'Suka'),
(47, 2, 19, 3, '2025-07-09 01:28:43', '2025-07-09 01:28:43', 'Suka'),
(48, 2, 21, 1, '2025-07-09 01:28:43', '2025-07-09 01:28:43', 'Tidak Suka'),
(49, 2, 18, 2, '2025-07-09 01:28:48', '2025-07-09 03:49:46', 'Netral'),
(50, 2, 26, 2, '2025-07-09 01:28:48', '2025-07-09 01:28:48', 'Netral'),
(51, 2, 17, 3, '2025-07-09 01:28:53', '2025-07-09 01:28:53', 'Suka'),
(52, 2, 23, 2, '2025-07-09 01:28:59', '2025-07-09 01:28:59', 'Netral'),
(53, 2, 20, 3, '2025-07-09 01:28:59', '2025-07-09 01:28:59', 'Suka'),
(54, 2, 22, 1, '2025-07-09 01:29:06', '2025-07-09 01:29:06', 'Tidak Suka'),
(55, 2, 24, 1, '2025-07-09 01:29:12', '2025-07-09 01:29:12', 'Tidak Suka'),
(56, 2, 25, 3, '2025-07-09 01:29:12', '2025-07-09 01:29:12', 'Suka'),
(57, 5, 16, 3, '2025-07-09 02:38:44', '2025-07-09 02:38:44', 'Suka'),
(58, 5, 6, 3, '2025-07-09 02:38:44', '2025-07-09 02:38:44', 'Suka'),
(59, 5, 12, 2, '2025-07-09 02:38:44', '2025-07-09 02:38:44', 'Netral'),
(60, 5, 14, 1, '2025-07-09 02:38:44', '2025-07-09 02:38:44', 'Tidak Suka'),
(61, 5, 24, 3, '2025-07-09 02:38:57', '2025-07-09 02:38:57', 'Suka'),
(62, 5, 26, 2, '2025-07-09 02:38:57', '2025-07-09 02:38:57', 'Netral'),
(63, 5, 10, 3, '2025-07-09 02:38:57', '2025-07-09 02:38:57', 'Suka'),
(64, 5, 3, 1, '2025-07-09 02:38:57', '2025-07-09 02:38:57', 'Tidak Suka'),
(65, 5, 18, 3, '2025-07-09 02:39:03', '2025-07-09 02:39:03', 'Suka'),
(66, 5, 20, 2, '2025-07-09 02:39:03', '2025-07-09 02:39:03', 'Netral'),
(67, 5, 8, 3, '2025-07-09 02:39:03', '2025-07-09 02:39:03', 'Suka'),
(68, 5, 9, 2, '2025-07-09 02:39:03', '2025-07-09 02:39:03', 'Netral'),
(69, 5, 22, 1, '2025-07-09 02:39:09', '2025-07-09 02:39:09', 'Tidak Suka'),
(70, 5, 17, 2, '2025-07-09 02:39:09', '2025-07-09 02:39:09', 'Netral'),
(71, 5, 25, 1, '2025-07-09 02:39:09', '2025-07-09 02:39:09', 'Tidak Suka'),
(72, 5, 4, 1, '2025-07-09 02:39:09', '2025-07-09 02:39:09', 'Tidak Suka'),
(73, 5, 13, 3, '2025-07-09 02:39:14', '2025-07-09 02:39:14', 'Suka'),
(74, 5, 7, 2, '2025-07-09 02:39:14', '2025-07-09 02:39:14', 'Netral'),
(75, 5, 5, 2, '2025-07-09 02:39:14', '2025-07-09 02:39:14', 'Netral'),
(76, 5, 23, 3, '2025-07-09 02:39:14', '2025-07-09 02:39:14', 'Suka'),
(77, 5, 11, 3, '2025-07-09 02:39:19', '2025-07-09 02:39:19', 'Suka'),
(78, 5, 19, 2, '2025-07-09 02:39:19', '2025-07-09 02:39:19', 'Netral'),
(79, 5, 2, 3, '2025-07-09 02:39:19', '2025-07-09 02:39:19', 'Suka'),
(80, 5, 21, 2, '2025-07-09 02:39:19', '2025-07-09 02:39:19', 'Netral'),
(81, 5, 15, 2, '2025-07-09 02:39:21', '2025-07-09 02:39:21', 'Netral'),
(82, 6, 6, 3, '2025-07-09 02:40:59', '2025-07-09 02:40:59', 'Suka'),
(83, 6, 10, 3, '2025-07-09 02:40:59', '2025-07-09 02:40:59', 'Suka'),
(84, 6, 15, 3, '2025-07-09 02:40:59', '2025-07-09 02:40:59', 'Suka'),
(85, 6, 25, 2, '2025-07-09 02:40:59', '2025-07-09 02:40:59', 'Netral'),
(86, 6, 8, 1, '2025-07-09 02:41:14', '2025-07-09 02:41:14', 'Tidak Suka'),
(87, 6, 14, 3, '2025-07-09 02:41:14', '2025-07-09 02:41:14', 'Suka'),
(88, 6, 3, 3, '2025-07-09 02:41:14', '2025-07-09 02:41:14', 'Suka'),
(89, 6, 24, 3, '2025-07-09 02:41:14', '2025-07-09 02:41:14', 'Suka'),
(90, 6, 26, 3, '2025-07-09 02:41:33', '2025-07-09 02:41:33', 'Suka'),
(91, 6, 5, 1, '2025-07-09 02:41:33', '2025-07-09 02:41:33', 'Tidak Suka'),
(92, 6, 9, 1, '2025-07-09 02:41:33', '2025-07-09 02:41:33', 'Tidak Suka'),
(93, 6, 4, 1, '2025-07-09 02:41:33', '2025-07-09 02:41:33', 'Tidak Suka'),
(94, 6, 17, 3, '2025-07-09 02:41:53', '2025-07-09 02:41:53', 'Suka'),
(95, 6, 11, 1, '2025-07-09 02:41:53', '2025-07-09 02:41:53', 'Tidak Suka'),
(96, 6, 22, 3, '2025-07-09 02:41:53', '2025-07-09 02:41:53', 'Suka'),
(97, 6, 20, 3, '2025-07-09 02:41:53', '2025-07-09 02:41:53', 'Suka'),
(98, 6, 13, 1, '2025-07-09 02:42:15', '2025-07-09 02:42:15', 'Tidak Suka'),
(99, 6, 12, 1, '2025-07-09 02:42:15', '2025-07-09 02:42:15', 'Tidak Suka'),
(100, 6, 21, 3, '2025-07-09 02:42:15', '2025-07-09 02:42:15', 'Suka'),
(101, 6, 7, 1, '2025-07-09 02:42:15', '2025-07-09 02:42:15', 'Tidak Suka'),
(102, 6, 19, 3, '2025-07-09 02:42:37', '2025-07-09 02:42:37', 'Suka'),
(103, 6, 18, 3, '2025-07-09 02:42:37', '2025-07-09 02:42:37', 'Suka'),
(104, 6, 23, 3, '2025-07-09 02:42:37', '2025-07-09 02:42:37', 'Suka'),
(105, 6, 2, 1, '2025-07-09 02:42:37', '2025-07-09 02:42:37', 'Tidak Suka'),
(106, 6, 16, 1, '2025-07-09 02:42:46', '2025-07-09 02:42:46', 'Tidak Suka'),
(107, 7, 2, 3, '2025-07-09 03:18:17', '2025-07-09 03:18:17', 'Suka'),
(108, 7, 11, 1, '2025-07-09 03:18:17', '2025-07-09 03:18:17', 'Tidak Suka'),
(109, 7, 8, 1, '2025-07-09 03:18:17', '2025-07-09 03:18:17', 'Tidak Suka'),
(110, 7, 16, 1, '2025-07-09 03:18:17', '2025-07-09 03:18:17', 'Tidak Suka'),
(111, 7, 15, 1, '2025-07-09 03:18:52', '2025-07-09 03:18:52', 'Tidak Suka'),
(112, 7, 9, 3, '2025-07-09 03:18:52', '2025-07-09 03:18:52', 'Suka'),
(113, 7, 17, 1, '2025-07-09 03:18:52', '2025-07-09 03:18:52', 'Tidak Suka'),
(114, 7, 7, 3, '2025-07-09 03:18:52', '2025-07-09 03:18:52', 'Suka'),
(115, 7, 3, 3, '2025-07-09 03:19:20', '2025-07-09 03:19:20', 'Suka'),
(116, 7, 14, 1, '2025-07-09 03:19:20', '2025-07-09 03:19:20', 'Tidak Suka'),
(117, 7, 26, 1, '2025-07-09 03:19:20', '2025-07-09 03:19:20', 'Tidak Suka'),
(118, 7, 22, 1, '2025-07-09 03:19:20', '2025-07-09 03:19:20', 'Tidak Suka'),
(119, 7, 19, 1, '2025-07-09 03:19:37', '2025-07-09 03:19:37', 'Tidak Suka'),
(120, 7, 4, 3, '2025-07-09 03:19:37', '2025-07-09 03:19:37', 'Suka'),
(121, 7, 20, 1, '2025-07-09 03:19:37', '2025-07-09 03:19:37', 'Tidak Suka'),
(122, 7, 5, 3, '2025-07-09 03:19:37', '2025-07-09 03:19:37', 'Suka'),
(123, 7, 12, 1, '2025-07-09 03:19:58', '2025-07-09 03:19:58', 'Tidak Suka'),
(124, 7, 25, 3, '2025-07-09 03:19:58', '2025-07-09 03:19:58', 'Suka'),
(125, 7, 6, 1, '2025-07-09 03:19:58', '2025-07-09 03:19:58', 'Tidak Suka'),
(126, 7, 21, 3, '2025-07-09 03:19:58', '2025-07-09 03:19:58', 'Suka'),
(127, 7, 24, 1, '2025-07-09 03:20:11', '2025-07-09 03:20:11', 'Tidak Suka'),
(128, 7, 13, 1, '2025-07-09 03:20:11', '2025-07-09 03:20:11', 'Tidak Suka'),
(129, 7, 18, 1, '2025-07-09 03:20:11', '2025-07-09 03:20:11', 'Tidak Suka'),
(130, 7, 23, 1, '2025-07-09 03:20:11', '2025-07-09 03:20:11', 'Tidak Suka'),
(131, 7, 10, 1, '2025-07-09 03:20:21', '2025-07-09 03:20:21', 'Tidak Suka'),
(132, 8, 15, 3, '2025-07-09 03:23:58', '2025-07-09 03:23:58', 'Suka'),
(133, 8, 2, 1, '2025-07-09 03:23:58', '2025-07-09 03:23:58', 'Tidak Suka'),
(134, 8, 16, 3, '2025-07-09 03:23:58', '2025-07-09 03:23:58', 'Suka'),
(135, 8, 26, 2, '2025-07-09 03:23:58', '2025-07-09 03:24:00', 'Netral'),
(136, 8, 8, 1, '2025-07-09 03:24:15', '2025-07-09 03:24:15', 'Tidak Suka'),
(137, 8, 22, 1, '2025-07-09 03:24:15', '2025-07-09 03:24:15', 'Tidak Suka'),
(138, 8, 19, 1, '2025-07-09 03:24:15', '2025-07-09 03:24:15', 'Tidak Suka'),
(139, 8, 20, 1, '2025-07-09 03:24:15', '2025-07-09 03:24:15', 'Tidak Suka'),
(140, 8, 13, 3, '2025-07-09 03:24:30', '2025-07-09 03:24:30', 'Suka'),
(141, 8, 25, 3, '2025-07-09 03:24:30', '2025-07-09 03:24:30', 'Suka'),
(142, 8, 10, 1, '2025-07-09 03:24:30', '2025-07-09 03:24:30', 'Tidak Suka'),
(143, 8, 7, 2, '2025-07-09 03:24:30', '2025-07-09 03:24:30', 'Netral'),
(144, 8, 3, 1, '2025-07-09 03:24:48', '2025-07-09 03:24:48', 'Tidak Suka'),
(145, 8, 4, 3, '2025-07-09 03:24:48', '2025-07-09 03:24:48', 'Suka'),
(146, 8, 17, 2, '2025-07-09 03:24:48', '2025-07-09 03:24:48', 'Netral'),
(147, 8, 21, 1, '2025-07-09 03:24:48', '2025-07-09 03:24:48', 'Tidak Suka'),
(148, 8, 12, 3, '2025-07-09 03:25:13', '2025-07-09 03:25:13', 'Suka'),
(149, 8, 6, 1, '2025-07-09 03:25:13', '2025-07-09 03:25:13', 'Tidak Suka'),
(150, 8, 5, 1, '2025-07-09 03:25:13', '2025-07-09 03:25:13', 'Tidak Suka'),
(151, 8, 11, 1, '2025-07-09 03:25:13', '2025-07-09 03:25:13', 'Tidak Suka'),
(152, 8, 14, 3, '2025-07-09 03:25:19', '2025-07-09 03:25:19', 'Suka'),
(153, 9, 5, 3, '2025-07-10 01:25:47', '2025-07-10 01:25:47', 'Suka'),
(154, 9, 23, 3, '2025-07-10 01:25:47', '2025-07-10 01:25:47', 'Suka'),
(155, 9, 19, 3, '2025-07-10 01:25:47', '2025-07-10 01:25:47', 'Suka'),
(156, 9, 21, 1, '2025-07-10 01:25:47', '2025-07-10 01:25:47', 'Tidak Suka'),
(157, 9, 11, 2, '2025-07-10 01:26:08', '2025-07-10 01:26:08', 'Netral'),
(158, 9, 25, 3, '2025-07-10 01:26:08', '2025-07-10 01:26:08', 'Suka'),
(159, 9, 16, 2, '2025-07-10 01:26:08', '2025-07-10 01:26:08', 'Netral'),
(160, 9, 13, 3, '2025-07-10 01:26:08', '2025-07-10 01:26:08', 'Suka'),
(161, 9, 24, 3, '2025-07-10 01:26:33', '2025-07-10 01:26:33', 'Suka'),
(162, 9, 22, 3, '2025-07-10 01:26:33', '2025-07-10 01:26:33', 'Suka'),
(163, 9, 26, 3, '2025-07-10 01:26:33', '2025-07-10 01:26:33', 'Suka'),
(164, 9, 4, 1, '2025-07-10 01:26:33', '2025-07-10 01:26:33', 'Tidak Suka'),
(165, 9, 3, 1, '2025-07-10 01:26:52', '2025-07-10 01:26:52', 'Tidak Suka'),
(166, 9, 17, 1, '2025-07-10 01:26:52', '2025-07-10 01:26:52', 'Tidak Suka'),
(167, 9, 7, 1, '2025-07-10 01:26:52', '2025-07-10 01:26:52', 'Tidak Suka'),
(168, 9, 6, 3, '2025-07-10 01:26:52', '2025-07-10 01:26:52', 'Suka'),
(169, 9, 18, 1, '2025-07-10 01:27:09', '2025-07-10 01:27:09', 'Tidak Suka'),
(170, 9, 14, 1, '2025-07-10 01:27:09', '2025-07-10 01:27:09', 'Tidak Suka'),
(171, 9, 10, 1, '2025-07-10 01:27:09', '2025-07-10 01:27:09', 'Tidak Suka'),
(172, 9, 8, 1, '2025-07-10 01:27:09', '2025-07-10 01:27:09', 'Tidak Suka'),
(173, 9, 15, 1, '2025-07-10 01:27:26', '2025-07-10 01:27:26', 'Tidak Suka'),
(174, 9, 20, 1, '2025-07-10 01:27:26', '2025-07-10 01:27:26', 'Tidak Suka'),
(175, 9, 9, 1, '2025-07-10 01:27:26', '2025-07-10 01:27:26', 'Tidak Suka'),
(176, 9, 2, 1, '2025-07-10 01:27:26', '2025-07-10 01:27:26', 'Tidak Suka'),
(177, 9, 12, 1, '2025-07-10 01:27:33', '2025-07-10 01:27:33', 'Tidak Suka'),
(178, 10, 10, 3, '2025-07-11 02:17:46', '2025-07-11 02:17:46', 'Suka'),
(179, 10, 4, 2, '2025-07-11 02:17:46', '2025-07-11 02:17:46', 'Netral'),
(180, 10, 25, 3, '2025-07-11 02:17:46', '2025-07-11 02:17:46', 'Suka'),
(181, 10, 19, 1, '2025-07-11 02:17:46', '2025-07-11 02:17:46', 'Tidak Suka'),
(182, 10, 5, 3, '2025-07-11 02:18:01', '2025-07-11 02:18:01', 'Suka'),
(183, 10, 3, 2, '2025-07-11 02:18:01', '2025-07-11 02:18:01', 'Netral'),
(184, 10, 18, 3, '2025-07-11 02:18:01', '2025-07-11 02:18:01', 'Suka'),
(185, 10, 23, 3, '2025-07-11 02:18:01', '2025-07-11 02:18:01', 'Suka'),
(186, 10, 2, 3, '2025-07-11 02:18:14', '2025-07-11 02:18:14', 'Suka'),
(187, 10, 24, 2, '2025-07-11 02:18:14', '2025-07-11 02:18:14', 'Netral'),
(188, 10, 20, 1, '2025-07-11 02:18:14', '2025-07-11 02:18:14', 'Tidak Suka'),
(189, 10, 17, 3, '2025-07-11 02:18:14', '2025-07-11 02:18:14', 'Suka'),
(190, 10, 12, 3, '2025-07-11 02:18:27', '2025-07-11 02:18:27', 'Suka'),
(191, 10, 15, 2, '2025-07-11 02:18:27', '2025-07-11 02:18:27', 'Netral'),
(192, 10, 16, 3, '2025-07-11 02:18:27', '2025-07-11 02:18:27', 'Suka'),
(193, 10, 8, 1, '2025-07-11 02:18:27', '2025-07-11 02:18:27', 'Tidak Suka'),
(194, 10, 6, 3, '2025-07-11 02:18:38', '2025-07-11 02:18:38', 'Suka'),
(195, 10, 22, 2, '2025-07-11 02:18:38', '2025-07-11 02:18:38', 'Netral'),
(196, 10, 14, 3, '2025-07-11 02:18:38', '2025-07-11 02:18:38', 'Suka'),
(197, 10, 26, 1, '2025-07-11 02:18:38', '2025-07-11 02:18:38', 'Tidak Suka'),
(198, 10, 11, 3, '2025-07-11 02:19:00', '2025-07-11 02:19:00', 'Suka'),
(199, 10, 21, 3, '2025-07-11 02:19:00', '2025-07-11 02:19:00', 'Suka'),
(200, 10, 9, 2, '2025-07-11 02:19:00', '2025-07-11 02:19:00', 'Netral'),
(201, 10, 7, 2, '2025-07-11 02:19:00', '2025-07-11 02:19:00', 'Netral'),
(202, 10, 13, 3, '2025-07-11 02:19:07', '2025-07-11 02:19:07', 'Suka');

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
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `mata_pelajaran` text NOT NULL,
  `prospek_kerja` text NOT NULL,
  `gaji_rata_rata` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `nama`, `deskripsi`, `mata_pelajaran`, `prospek_kerja`, `gaji_rata_rata`, `created_at`, `updated_at`, `gambar`) VALUES
(2, 'MANAJEMEN PERKANTORAN', 'Jurusan Manajemen Perkantoran adalah program keahlian yang membekali siswa dengan keterampilan administrasi, pengelolaan dokumen, pelayanan publik, serta penggunaan teknologi perkantoran modern. Siswa dilatih untuk menjadi tenaga administrasi profesional yang mampu bekerja secara efisien di lingkungan kantor baik pemerintah maupun swasta.', 'Korespondensi (Surat-menyurat bisnis)\r\n\r\nKearsipan dan Manajemen Dokumen\r\n\r\nOtomatisasi Tata Kelola Kantor\r\n\r\nPelayanan Prima (Customer Service)\r\n\r\nAplikasi Perkantoran (Ms Word, Excel, PowerPoint)\r\n\r\nKomunikasi Bisnis', 'Sekretaris\r\n\r\nResepsionis\r\n\r\nStaf Administrasi\r\n\r\nCustomer Service\r\n\r\nTata Usaha Sekolah / Kampus', 400000.00, '2025-07-08 14:27:17', '2025-07-09 00:18:59', 'jurusan_images/lZEI8KnEsFq0jJ1nb2PkJhz1sVze4xR053MTBP7s.jpg'),
(3, 'AKUTANSI', 'Jurusan Akuntansi adalah program keahlian yang mempelajari cara mencatat, mengelola, dan menganalisis keuangan suatu organisasi, baik perusahaan maupun lembaga pemerintah. Siswa dilatih agar mampu membuat laporan keuangan, menghitung pajak, serta mengoperasikan software akuntansi.\r\nJurusan ini cocok bagi siswa yang teliti, logis, dan menyukai angka.', 'Dasar Akuntansi\r\n\r\nAkuntansi Keuangan\r\n\r\nAkuntansi Biaya\r\n\r\nPajak (Perpajakan)\r\n\r\nEtika Profesi Akuntansi\r\n\r\nAplikasi Komputer Akuntansi (misalnya: MYOB, Accurate)\r\n\r\nAdministrasi Keuangan\r\n\r\nLaporan Keuangan dan Analisis\r\n\r\nSimulasi Digital Bisnis dan PKL', 'Staf Akuntansi / Keuangan\r\n\r\nStaf Pajak (Tax Staff)\r\n\r\nAuditor Internal\r\n\r\nKasir Bank / Teller\r\n\r\nAdministrasi Keuangan\r\n\r\nPembukuan UMKM\r\n\r\nBagian Keuangan Sekolah / Yayasan\r\n\r\nOperator Software Akuntansi', 5500000.00, '2025-07-08 14:30:25', '2025-07-09 00:19:34', 'jurusan_images/4TfhjeglJgL1Zhu2W6uyQpJUfzsbBovYy1aZW2Aq.jpg'),
(4, 'TEKNIK KOMPUTER DAN JARINGAN', 'Jurusan Teknik Komputer dan Jaringan (TKJ) adalah jurusan yang mempelajari tentang perakitan komputer, instalasi jaringan LAN/WAN, administrasi server, dan keamanan jaringan. Siswa dilatih agar mampu menjadi teknisi komputer dan jaringan yang handal, serta memahami dasar-dasar internet dan teknologi jaringan modern.\r\n\r\nJurusan ini cocok bagi siswa yang tertarik pada dunia teknologi, troubleshooting perangkat keras, dan jaringan internet.', 'Dasar Teknik Komputer dan Jaringan\r\n\r\nPerakitan dan Perawatan Komputer\r\n\r\nSistem Operasi Jaringan (Linux/Windows Server)\r\n\r\nJaringan Dasar (LAN, WLAN, WAN)\r\n\r\nAdministrasi Jaringan dan Server\r\n\r\nKeamanan Jaringan (Cybersecurity dasar)\r\n\r\nPemrograman Dasar (HTML, Python, atau C++)\r\n\r\nTeknik Routing dan Switching (Cisco, Mikrotik)\r\n\r\nInternet of Things (opsional)', 'Teknisi Komputer dan Jaringan\r\n\r\nAdmin Jaringan (Network Administrator)\r\n\r\nTeknisi Server dan Data Center\r\n\r\nStaf IT Support\r\n\r\nInstaller CCTV, Fiber Optik, dan Wireless\r\n\r\nTeknisi ISP (IndiHome, Biznet, dll)\r\n\r\nAsisten Programmer\r\n\r\nFreelance Setup Jaringan untuk UKM', 6000.00, '2025-07-08 14:35:09', '2025-07-09 20:41:39', 'jurusan_images/3HhQcAu5x0lxd9nozRxA5WwPVwgkWSKsxjcVcehR.jpg'),
(5, 'TEKNIK SEPEDA MOTOR', 'Jurusan Teknik Sepeda Motor (TBSM/TSM) adalah program keahlian yang mempelajari perawatan, perbaikan, dan modifikasi sepeda motor, baik secara manual maupun menggunakan teknologi modern. Siswa dibekali keterampilan mekanik serta pemahaman tentang sistem mesin, kelistrikan, dan rangka kendaraan roda dua.\r\n\r\nJurusan ini cocok bagi siswa yang suka dunia otomotif, kerja tangan langsung (hands-on), dan ingin langsung bekerja atau membuka bengkel setelah lulus.', 'Gambar Teknik Otomotif\r\n\r\nTeknologi Dasar Otomotif\r\n\r\nPemeliharaan Mesin Sepeda Motor\r\n\r\nSistem Bahan Bakar dan Injeksi\r\n\r\nSistem Kelistrikan dan Elektronik Sepeda Motor\r\n\r\nSistem Pemindah Tenaga dan Rangka\r\n\r\nDiagnostik dan Perbaikan Kerusakan\r\n\r\nBisnis dan Kewirausahaan Bengkel', 'Mekanik sepeda motor (bengkel resmi atau umum)\r\n\r\nTeknisi di dealer motor (AHASS, Yamaha, Suzuki, Kawasaki)\r\n\r\nMontir freelance\r\n\r\nPekerja di industri otomotif (pabrik sparepart)\r\n\r\nWirausahawan (membuka bengkel sendiri, jual beli motor)', 4000000.00, '2025-07-08 14:37:33', '2025-07-09 00:20:00', 'jurusan_images/umxSDn8fv2ZJ7DsZFRDhAGCUaAUuzz4a56dqxwf8.jpg'),
(6, 'TEKNIK KENDARAAN RINGAN', 'Teknik Kendaraan Ringan Otomotif (TKR atau TKRO) adalah jurusan yang fokus pada pembelajaran tentang perawatan, perbaikan, dan rekondisi sistem kendaraan roda empat (mobil), baik dari sisi mekanik, kelistrikan, maupun sistem elektronik modern.\r\n\r\nSiswa dilatih agar mampu bekerja sebagai mekanik profesional, teknisi otomotif, maupun membuka bengkel sendiri. Jurusan ini cocok bagi siswa yang menyukai dunia otomotif, teknologi kendaraan, dan kerja teknis langsung.', 'Beberapa mata pelajaran kejuruan khas di TKR/TKRO:\r\n\r\n    Gambar Teknik Otomotif\r\n\r\n    Teknologi Dasar Otomotif\r\n\r\n    Pemeliharaan Mesin Kendaraan Ringan\r\n\r\n    Sistem Pemindah Tenaga dan Sasis\r\n\r\n    Sistem Suspensi dan Rem\r\n\r\n    Sistem Kemudi dan Roda\r\n\r\n    Sistem Kelistrikan Mobil (starter, pengisian, lampu, dsb.)\r\n\r\n    Sistem Injeksi Bahan Bakar\r\n\r\n    Diagnostik Kendaraan dengan Scanner\r\n\r\n    Praktik Kerja Lapangan (PKL) di bengkel mobil atau dealer resmi', 'Mekanik mobil di bengkel resmi (Toyota, Daihatsu, Mitsubishi, dll)\r\n\r\nTeknisi mobil di bengkel umum\r\n\r\nStaf teknisi di perusahaan logistik / transportasi\r\n\r\nQuality control di pabrik otomotif\r\n\r\nTeknisi AC dan kelistrikan mobil\r\n\r\nWirausahawan bengkel mobil', 5000000.00, '2025-07-08 14:39:39', '2025-07-09 00:20:13', 'jurusan_images/cJIg1H6iEqLdt2cbFBFsAuQIeMq1uRruHpD9bPr2.jpg');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_08_075845_create_penggunas_table', 1),
(5, '2025_07_08_075905_create_siswas_table', 1),
(6, '2025_07_08_075942_create_jurusans_table', 1),
(7, '2025_07_08_080327_create_pertanyaans_table', 1),
(8, '2025_07_08_080346_create_jawabans_table', 1),
(9, '2025_07_08_080413_create_rekomendasis_table', 1),
(10, '2025_07_08_092453_add_gambar_to_jurusans_table', 1),
(11, '2025_07_08_122910_tambah_biodata_ke_penggunas', 1),
(12, '2025_07_08_140328_add_jawaban_to_jawabans_table', 1),
(13, '2025_07_08_151236_update_jawabans_siswa_foreign_key', 1);

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
-- Table structure for table `penggunas`
--

CREATE TABLE `penggunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `peran` varchar(255) NOT NULL DEFAULT 'siswa',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggunas`
--

INSERT INTO `penggunas` (`id`, `nama`, `email`, `email_verified_at`, `password`, `peran`, `remember_token`, `created_at`, `updated_at`, `nama_lengkap`, `nis`, `jenis_kelamin`, `asal_sekolah`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$RRcnLkISdd6fbxNERlxd0evV0pEOppliSFCUAqwbmaVEiGoaXLCZq', 'admin', NULL, '2025-07-08 08:38:48', '2025-07-08 08:38:48', 'Admin Utama', NULL, NULL, NULL),
(2, 'agung dumadi', 'agungdumadi186@gmail.com', NULL, '$2y$12$34xBKc3LvYnyiYZLDeuRter3.6wx3XjII.ehLYgY4d/VlkM8rIE3y', 'siswa', NULL, '2025-07-08 08:41:21', '2025-07-08 08:41:33', 'AGUNG DUMADI', '1201110001', 'Laki-laki', 'SMP N 6 KOTA SERANG'),
(3, 'agung zumanji', 'agungdumadi666@gmail.com', NULL, '$2y$12$zTXfxXd64ATfN85LKtowueWpO/C8Bnhv1w51t1dYbxgVNLFjOwka6', 'siswa', NULL, '2025-07-08 13:38:58', '2025-07-08 15:00:43', 'AGUNG DUMADI', '120121000', 'Laki-laki', 'SMPN 6 KOTA SERANG'),
(4, 'maksudin', 'maksudin123@gmail.com', NULL, '$2y$12$5OgjgB0QcSyLyYVK3sVEy.2wavkXO0FvLxSncxNvoLNWcbKliAdK6', 'siswa', NULL, '2025-07-08 19:46:10', '2025-07-08 20:35:39', 'AGUNG DUMADI', '1201110001', 'Laki-laki', 'SMP N 6 KOTA SERANG'),
(5, 'mufli saputra', 'muflisaputra333@gmail.com', NULL, '$2y$12$8Fy0LfTgiGd/CQwA.EIHquHhCgwmarnjrgzlk54vKc9zpjxPwymV6', 'siswa', NULL, '2025-07-09 02:38:05', '2025-07-09 02:38:38', 'mufli saputra', '1234567', 'Laki-laki', 'SMPN21 KOTA SERANG'),
(6, 'UDIN', 'udinsaputra123@gmail.com', NULL, '$2y$12$mbKD5RSufpk/GTwDVe1h0ub4xEoYBE9LHtaPxe3n/X9Sk/XKzbDzK', 'siswa', NULL, '2025-07-09 02:40:14', '2025-07-09 02:40:50', 'udin saputra', '1232123', 'Laki-laki', 'SMPN 21 KOTA SERANG'),
(7, 'yoga hermawan', 'yoga123@gmail.com', NULL, '$2y$12$BjKrd9P4EVdrShOmgvttxeeR4BXDPvL8dhCDK/jnfO4pe/SBBkIoS', 'siswa', NULL, '2025-07-09 03:17:06', '2025-07-09 03:18:01', 'yoga hermawan', '12312121', 'Laki-laki', 'SMPN 3 KOTA SERANG'),
(8, 'SASUKE', 'sasuke1234@gmail.com', NULL, '$2y$12$6omVbUYE6ZEpFBBtJGttHOFMrFH5YqymMzRVkA0jyXxKPb1U7ACne', 'siswa', NULL, '2025-07-09 03:23:15', '2025-07-09 03:23:45', 'sasuke', '14012100013', 'Laki-laki', 'SMPN 99 KOTA SERANG'),
(9, 'alpinurholis', 'alpinurholis134@gmail.com', NULL, '$2y$12$YqtWb0M122EYs4Fl80vSKOJDsBdYZOWNR3T0uKAGfbarQ993U5qRK', 'siswa', NULL, '2025-07-10 01:24:51', '2025-07-10 01:25:29', 'alfin nurholis', '1234', 'Laki-laki', 'SMPN GUNUNG SARI'),
(10, 'mudofar', 'dofar123@gmail.com', NULL, '$2y$12$R.tUf5y8zLfpncrF7JcdM.eCbDvCbr5bW0EOZHmHT0KI3Qdasduv2', 'siswa', NULL, '2025-07-11 02:15:28', '2025-07-11 02:16:46', 'mudofar', '12012121', 'Laki-laki', 'SMPN 21 KOTA SERANG');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaans`
--

CREATE TABLE `pertanyaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teks` text NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `level_penting` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaans`
--

INSERT INTO `pertanyaans` (`id`, `teks`, `jurusan_id`, `level_penting`, `created_at`, `updated_at`) VALUES
(2, 'Apakah kamu suka mengatur buku catatan atau dokumen agar rapi dan mudah dicari?', 2, 5, '2025-07-08 14:47:52', '2025-07-08 14:49:54'),
(3, 'Apakah kamu senang kalau disuruh mengetik, membuat laporan, atau mencatat hasil rapat di kelas?', 2, 4, '2025-07-08 14:50:16', '2025-07-08 14:50:16'),
(4, 'Apakah kamu suka belajar Microsoft Word dan Excel di komputer sekolah?', 2, 4, '2025-07-08 14:50:50', '2025-07-08 14:50:50'),
(5, 'Apakah kamu merasa nyaman jika berbicara atau membantu orang lain dengan sopan?', 2, 3, '2025-07-08 14:51:24', '2025-07-08 14:51:24'),
(6, 'Apakah kamu suka kegiatan yang teratur dan jelas tugasnya dari awal?', 2, 4, '2025-07-08 14:51:45', '2025-07-08 14:51:45'),
(7, 'Apakah kamu suka menghitung uang, mencatat pengeluaran, atau menyusun laporan keuangan kecil?', 3, 5, '2025-07-08 14:52:33', '2025-07-08 14:52:56'),
(8, 'Apakah kamu suka pelajaran matematika dan soal hitungan logis?', 3, 5, '2025-07-08 14:53:29', '2025-07-08 14:53:29'),
(9, 'Apakah kamu teliti dan tidak suka jika ada kesalahan angka di buku atau catatanmu?', 3, 4, '2025-07-08 14:53:53', '2025-07-08 14:53:53'),
(10, 'Apakah kamu penasaran bagaimana cara kerja kasir, bendahara kelas, atau menghitung pajak?', 3, 3, '2025-07-08 14:54:30', '2025-07-08 14:54:30'),
(11, 'Apakah kamu suka jika semua keuangan tercatat rapi, bahkan untuk uang jajanmu sendiri?', 3, 3, '2025-07-08 14:55:15', '2025-07-08 14:55:15'),
(12, 'Apakah kamu suka utak-atik komputer, seperti pasang kabel, instal game, atau merakit perangkat?', 4, 5, '2025-07-08 14:55:52', '2025-07-08 14:55:52'),
(13, 'Apakah kamu tertarik dengan WiFi, jaringan internet, dan bagaimana komputer bisa saling terhubung?', 4, 4, '2025-07-08 14:56:31', '2025-07-08 14:56:31'),
(14, 'Apakah kamu senang pelajaran TIK atau komputer di sekolah?', 4, 4, '2025-07-08 14:57:23', '2025-07-08 14:57:23'),
(15, 'Apakah kamu suka memperbaiki komputer/laptop yang error?', 4, 4, '2025-07-08 14:58:04', '2025-07-08 14:58:04'),
(16, 'Apakah kamu ingin bekerja di dunia teknologi atau jadi teknisi komputer?', 4, 5, '2025-07-08 14:58:59', '2025-07-08 22:31:04'),
(17, 'Apakah kamu suka melihat atau membantu orang tua/saudara membongkar motor di rumah atau bengkel?', 5, 5, '2025-07-09 01:20:21', '2025-07-09 01:20:21'),
(18, 'Apakah kamu tertarik bagaimana cara mesin motor bekerja?', 5, 4, '2025-07-09 01:20:54', '2025-07-09 01:20:54'),
(19, 'Apakah kamu tidak masalah jika tanganmu kotor saat praktik memperbaiki motor?', 5, 3, '2025-07-09 01:21:40', '2025-07-09 01:21:40'),
(20, 'Apakah kamu senang memperbaiki sesuatu yang rusak, misalnya sepeda atau mainan elektronik?', 5, 4, '2025-07-09 01:22:28', '2025-07-09 01:22:28'),
(21, 'Apakah kamu punya cita-cita membuka bengkel motor sendiri suatu hari nanti?', 5, 5, '2025-07-09 01:23:28', '2025-07-09 01:23:28'),
(22, 'Apakah kamu penasaran bagaimana cara kerja mobil dan mesinnya?', 6, 5, '2025-07-09 01:24:22', '2025-07-09 01:24:22'),
(23, 'Apakah kamu suka melihat atau ingin bekerja di bengkel mobil atau showroom?', 6, 4, '2025-07-09 01:25:04', '2025-07-09 01:25:04'),
(24, 'Apakah kamu suka kegiatan bongkar pasang, termasuk alat-alat besar seperti dongkrak atau obeng?', 6, 4, '2025-07-09 01:25:31', '2025-07-09 01:25:31'),
(25, 'Apakah kamu tertarik dengan mobil listrik, AC mobil, atau sistem rem mobil?', 6, 4, '2025-07-09 01:26:11', '2025-07-09 01:26:11'),
(26, 'Apakah kamu ingin suatu hari bisa memperbaiki atau memodifikasi mobil sendiri?', 6, 5, '2025-07-09 01:26:44', '2025-07-09 01:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasis`
--

CREATE TABLE `rekomendasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `skor_total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekomendasis`
--

INSERT INTO `rekomendasis` (`id`, `siswa_id`, `jurusan_id`, `skor_total`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 14, '2025-07-08 15:02:45', '2025-07-08 15:02:45'),
(3, 4, 2, 12, '2025-07-08 20:36:09', '2025-07-08 21:16:48'),
(4, 2, 5, 12, '2025-07-08 22:00:11', '2025-07-09 03:50:05'),
(5, 5, 3, 13, '2025-07-09 02:39:22', '2025-07-09 02:39:22'),
(6, 6, 5, 15, '2025-07-09 02:42:47', '2025-07-09 02:42:47'),
(7, 7, 2, 13, '2025-07-09 03:20:22', '2025-07-09 03:20:22'),
(8, 8, 4, 15, '2025-07-09 03:25:20', '2025-07-09 03:25:20'),
(9, 9, 6, 15, '2025-07-10 01:27:35', '2025-07-10 01:27:35'),
(10, 10, 4, 14, '2025-07-11 02:19:09', '2025-07-11 02:19:09');

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
('63dE8AqIcXBjAzsvDMywu7tfzQkNykheJEFiySVS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 Edg/139.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQm9vWFJOb3MwQkVZNVV6eWRuc3lOaWxXbjg2MDYxaThzeUNJOFREWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9sb2dpbiI7fX0=', 1754916660),
('tbdiYOfBmidUXCX0M0Exh3op9FiAByG9eT7PGJkI', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 Edg/139.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidmlRcEliNjNjdVo1WWhIcEZyemV5ZjZBM1BJS2FvaUFmTzBWcnBIViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1754916634);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengguna_id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jawabans`
--
ALTER TABLE `jawabans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawabans_pertanyaan_id_foreign` (`pertanyaan_id`),
  ADD KEY `jawabans_siswa_id_foreign` (`siswa_id`);

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
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penggunas_email_unique` (`email`);

--
-- Indexes for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaans_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `rekomendasis`
--
ALTER TABLE `rekomendasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekomendasis_siswa_id_foreign` (`siswa_id`),
  ADD KEY `rekomendasis_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_pengguna_id_foreign` (`pengguna_id`);

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
-- AUTO_INCREMENT for table `jawabans`
--
ALTER TABLE `jawabans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `rekomendasis`
--
ALTER TABLE `rekomendasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawabans`
--
ALTER TABLE `jawabans`
  ADD CONSTRAINT `jawabans_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawabans_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `penggunas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  ADD CONSTRAINT `pertanyaans_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rekomendasis`
--
ALTER TABLE `rekomendasis`
  ADD CONSTRAINT `rekomendasis_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekomendasis_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `penggunas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_pengguna_id_foreign` FOREIGN KEY (`pengguna_id`) REFERENCES `penggunas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
