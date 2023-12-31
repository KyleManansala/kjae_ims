-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 09:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Insecticides/Pesticides/Fungicides', '2023-11-03 14:17:55', '2023-11-03 14:17:55'),
(2, 'Fertilizers/Granulars', '2023-11-03 14:18:16', '2023-11-03 14:18:16'),
(3, 'Feeds and (Dog/Cat Foods)', '2023-11-03 14:18:29', '2023-11-03 19:37:08'),
(4, 'Certified Seeds', '2023-11-03 14:18:42', '2023-11-03 14:18:42'),
(5, 'Veterinary Medicines', '2023-11-03 14:18:52', '2023-11-03 14:18:52'),
(6, 'Rice', '2023-11-03 14:19:00', '2023-11-03 14:19:00'),
(7, 'Agri-Machineries/Spare Parts', '2023-11-03 14:19:07', '2023-11-03 14:19:07'),
(8, 'Other Farm/Poultry Equipments', '2023-11-03 14:19:17', '2023-11-03 14:19:17');

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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `category_id`, `product_name`, `product_quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'WH1 CLINCHER 100 EC 1000 ML', 2, 1560.00, '2023-11-03 14:14:37', '2023-11-03 14:14:37'),
(2, 1, 'WH1 CLINCHER 100 EC 500 ML', 6, 830.00, '2023-11-03 14:21:55', '2023-11-03 14:21:55'),
(3, 1, 'WH1 ROUND UP 1000 ML', 2, 545.00, '2023-11-03 14:22:09', '2023-11-03 14:22:09'),
(4, 1, 'WH 1 SUREKILL 70 WP 350 GMS', 10, 110.00, '2023-11-03 14:27:29', '2023-11-03 17:42:51'),
(5, 1, 'WH1 2-4-D ESTER S&P 500 ML', 8, 220.00, '2023-11-03 14:28:55', '2023-11-03 14:28:55'),
(6, 1, 'WH1 2-4-D ESTER S&P 1000 ML', 3, 360.00, '2023-11-03 14:29:07', '2023-11-03 14:29:07'),
(7, 1, 'WH1 POST HERB 10% SC 250 ML', 6, 1100.00, '2023-11-03 14:29:18', '2023-11-03 14:29:18'),
(8, 1, 'WH1 POST HERB 10% SC 100 ML', 8, 600.00, '2023-11-03 14:29:37', '2023-11-03 14:29:37'),
(9, 1, 'WH1 BRODAN 31.5 EC 1000 ML', 1, 470.00, '2023-11-03 14:29:53', '2023-11-06 07:52:35'),
(10, 1, 'WH1 BRODAN 31.5 EC 500 ML', 1, 260.00, '2023-11-03 14:30:08', '2023-11-06 07:52:46'),
(11, 1, 'WH1 LANNATE ( Multi crop) 250 GMS', 1, 560.00, '2023-11-03 14:30:28', '2023-11-03 14:30:28'),
(12, 1, 'WH1 LANNATE  100 GMS', 3, 285.00, '2023-11-03 14:31:09', '2023-11-03 14:31:09'),
(13, 1, 'WH1 ATRAZINE S&P 1 KG', 1, 500.00, '2023-11-03 14:31:24', '2023-11-03 14:31:24'),
(14, 1, 'WH1 ALMIX 30 GM RED', 4, 395.00, '2023-11-03 14:32:00', '2023-11-03 14:32:00'),
(15, 1, 'WH1 FRONTIER 1000 ML', 4, 1550.00, '2023-11-03 14:32:11', '2023-11-03 14:32:11'),
(16, 1, 'WH1 HYFER PLUS RED 4-4-14 1000 ML', 2, 320.00, '2023-11-03 14:32:21', '2023-11-03 14:32:21'),
(17, 1, 'WH1 HYFER PLUS GREEN 22-11-9 1000 ML', 4, 320.00, '2023-11-03 14:32:36', '2023-11-03 14:32:36'),
(18, 1, 'WH1 BENEVIA 10 OD 250 ML', 4, 1075.00, '2023-11-03 14:33:21', '2023-11-03 14:33:21'),
(19, 1, 'WH1 AMISTAR 25 SC 250 ML', 2, 1260.00, '2023-11-03 14:33:42', '2023-11-03 14:33:42'),
(20, 1, 'WHI MANCOSAVE 800 WP KG', 2, 415.00, '2023-11-03 14:33:55', '2023-11-03 14:33:55'),
(21, 1, 'WH1 GOLD 20 SC 500 ML', 2, 485.00, '2023-11-03 14:42:51', '2023-11-03 14:42:51'),
(22, 1, 'WH1 MALATHION S&P 1000 ML', 1, 425.00, '2023-11-03 14:43:00', '2023-11-06 07:52:53'),
(23, 1, 'WH1 MALATHION S&P 500 ML', 3, 260.00, '2023-11-03 14:43:12', '2023-11-03 14:43:12'),
(24, 1, 'WH1 MATCH 060 EC 250 ML', 5, 395.00, '2023-11-03 14:43:31', '2023-11-03 14:43:58'),
(25, 1, 'WH1 FINALE 10 EC 1000 ML', 1, 1190.00, '2023-11-03 14:44:17', '2023-11-03 14:45:24'),
(27, 1, 'WH1 FINALE 10 EC 500 ML', 3, 385.00, '2023-11-03 14:46:21', '2023-11-03 14:46:21'),
(28, 1, 'WH1 ONECIDE 15 EC 1000 ML', 3, 1320.00, '2023-11-03 14:46:49', '2023-11-03 14:46:49'),
(29, 1, 'WH1 ONECIDE 15 EC 500 ML', 4, 705.00, '2023-11-03 14:47:24', '2023-11-03 14:47:24'),
(30, 1, 'WH1 ONECIDE 15 EC 250 ML', 2, 410.00, '2023-11-03 14:47:34', '2023-11-03 14:47:34'),
(31, 1, 'WH1 ARMURE 300 EC 250 ML', 1, 750.00, '2023-11-03 14:48:02', '2023-11-03 14:48:02'),
(32, 1, 'HUMUS', 2, 175.00, '2023-11-03 19:13:38', '2023-11-03 19:13:38'),
(33, 1, 'MRJ MEGA GROW FOLIAR', 5, 230.00, '2023-11-03 19:13:53', '2023-11-03 19:13:53'),
(34, 1, 'CROP GIANT 15-15-30 1 KG ALDIZ', 3, 285.00, '2023-11-03 19:14:12', '2023-11-03 19:14:12'),
(35, 1, 'CHIX 2.5 EC QT X 12 JARDINE', 1, 745.00, '2023-11-03 19:14:26', '2023-11-03 19:14:26'),
(36, 1, 'CHIX 2.5 EC 500 ML X 12 JARDINE', 2, 445.00, '2023-11-03 19:14:37', '2023-11-03 19:14:37'),
(37, 1, 'GLYPHOSEL GALLON 375 L TEAMAGRO (980)', 2, 1610.00, '2023-11-03 19:14:47', '2023-11-03 19:14:47'),
(38, 1, 'GLYPHOSEL QT TEAMAGRO', 3, 565.00, '2023-11-03 19:15:03', '2023-11-03 19:15:03'),
(39, 1, 'RICESTAR XTRA 500 ML X 20 BAYER', 2, 1215.00, '2023-11-03 19:15:12', '2023-11-03 19:15:12'),
(40, 1, 'JACKPOT 2.5 EC QT TEAMAGRO', 5, 625.00, '2023-11-03 19:15:25', '2023-11-03 19:15:25'),
(41, 1, 'JACKPOT 2.5 EC 500 ML TEAMAGRO', 6, 345.00, '2023-11-03 19:15:36', '2023-11-03 19:15:36'),
(42, 1, 'ATABRON 250 ML', 0, 590.00, '2023-11-03 19:17:04', '2023-11-06 07:55:31'),
(43, 1, 'ATABRON 500 ML', 3, 1085.00, '2023-11-03 19:17:16', '2023-11-03 19:17:16'),
(44, 1, 'BRACO 2.5 EC 1000 ML', 2, 535.00, '2023-11-03 19:17:41', '2023-11-03 19:17:41'),
(45, 1, 'MAINMAN 80 GMS', 1, 733.00, '2023-11-03 19:17:53', '2023-11-03 19:17:53'),
(46, 1, 'RAKER 400 SC 250 ML', 1, 3155.00, '2023-11-03 19:18:03', '2023-11-03 19:18:03'),
(47, 1, 'LITHOVIT 100 GMS', 2, 127.00, '2023-11-03 19:18:12', '2023-11-03 19:18:12'),
(48, 1, 'GROWTH ENHANCER 1 LTR.', 4, 849.00, '2023-11-03 19:18:21', '2023-11-03 19:18:21'),
(49, 1, 'GROWTH ENHANCER 500 ML', 5, 530.00, '2023-11-03 19:18:32', '2023-11-03 19:18:32'),
(50, 1, 'ACTIVATOR', 5, 585.00, '2023-11-03 19:18:40', '2023-11-03 19:18:40'),
(51, 1, 'SOIL CONDENSER 1 LTR.', 5, 914.00, '2023-11-03 19:18:48', '2023-11-03 19:18:48'),
(52, 1, 'SOIL CONDENSER 500 ML', 5, 550.00, '2023-11-03 19:18:58', '2023-11-03 19:18:58'),
(53, 1, 'SMASH ODOR', 3, 884.00, '2023-11-03 19:19:09', '2023-11-03 19:19:09'),
(54, 1, 'DELTA KING 100 ML', 4, 193.00, '2023-11-03 19:19:21', '2023-11-03 19:19:21'),
(55, 1, 'NIMBECIDINE 250 ML', 3, 310.00, '2023-11-03 19:19:29', '2023-11-03 19:19:29'),
(56, 1, 'KRISS 1000 ML', 3, 685.00, '2023-11-03 19:19:41', '2023-11-03 19:19:41'),
(57, 1, 'KRISS 500 ML', 6, 375.00, '2023-11-03 19:19:50', '2023-11-03 19:19:50'),
(58, 1, 'TANGO', 8, 190.00, '2023-11-03 19:19:59', '2023-11-03 19:19:59'),
(59, 1, 'Z-10', 1, 585.00, '2023-11-03 19:20:09', '2023-11-03 19:20:09'),
(60, 1, 'NEW HIKARI', 2, 245.00, '2023-11-03 19:20:18', '2023-11-03 19:20:18'),
(61, 1, 'MAKAMASA CALCIUM FOLIAR FERTILIZER', 1, 250.00, '2023-11-03 19:20:29', '2023-11-03 19:20:29'),
(62, 1, 'YUREA PLUS', 1, 380.00, '2023-11-03 19:20:38', '2023-11-06 07:54:35'),
(63, 1, '2-4-D ESTER 1000ML (GOLDENFIRE)', 12, 340.00, '2023-11-03 19:21:09', '2023-11-04 03:22:26'),
(64, 1, 'GOLDENFIRE (GLYPHOSET) 1000 ML', 23, 420.00, '2023-11-03 19:21:18', '2023-11-03 19:21:18'),
(65, 1, 'GOLDENFIRE (GLYPHOSET) GAL.', 9, 1425.00, '2023-11-03 19:21:31', '2023-11-03 19:21:31'),
(66, 1, 'BRODAN QT PLANTERS 1000 ML', 3, 470.00, '2023-11-03 19:21:39', '2023-11-03 19:21:39'),
(67, 1, 'POWERMAX 1000 ML', 4, 1090.00, '2023-11-03 19:21:46', '2023-11-03 19:21:46'),
(68, 1, 'POWERMAX 500 ML', 4, 647.00, '2023-11-03 19:22:02', '2023-11-03 19:22:02'),
(69, 1, 'POWERMAX 250 ML', 3, 420.00, '2023-11-03 19:22:09', '2023-11-03 19:22:09'),
(70, 1, 'RUN OUT 1000 ML', 1, 520.00, '2023-11-03 19:22:19', '2023-11-06 07:51:41'),
(71, 1, 'RUN OUT 500 ML', 9, 295.00, '2023-11-03 19:22:30', '2023-11-03 19:22:30'),
(72, 1, 'RUN OUT 250 ML', 16, 180.00, '2023-11-03 19:22:48', '2023-11-03 19:22:48'),
(73, 1, 'CHESS 50 WG 480 GMS', 8, 425.00, '2023-11-03 19:23:01', '2023-11-03 19:23:01'),
(74, 1, 'SEVIN 85- 3 250GMS', 1, 320.00, '2023-11-03 19:23:27', '2023-11-06 07:51:48'),
(75, 1, 'DEVAST 1000 ML', 3, 475.00, '2023-11-03 19:23:36', '2023-11-03 19:23:36'),
(76, 1, 'AGROXONE 1000 ML', 1, 445.00, '2023-11-03 19:23:46', '2023-11-09 08:19:13'),
(77, 1, 'BASTA 1000 ML', 2, 1000.00, '2023-11-03 19:23:56', '2023-11-03 19:23:56'),
(78, 1, 'NUTRIVANT 0-46-30 1 KG', 2, 415.00, '2023-11-03 19:24:10', '2023-11-03 19:24:10'),
(79, 1, 'ATRATIC LURE', 6, 170.00, '2023-11-03 19:24:19', '2023-11-03 19:24:19'),
(80, 1, 'ELICOR', 1, 730.00, '2023-11-03 19:24:27', '2023-11-03 19:24:27'),
(81, 1, 'STRENGTH', 3, 150.00, '2023-11-03 19:24:35', '2023-11-03 19:24:35'),
(82, 1, 'RESIST', 2, 580.00, '2023-11-03 19:24:53', '2023-11-03 19:24:53'),
(83, 1, 'VESSEL ULTRA', 2, 450.00, '2023-11-03 19:25:01', '2023-11-03 19:25:01'),
(84, 1, 'GRETA CROP 15-15-30', 2, 220.00, '2023-11-03 19:25:09', '2023-11-03 19:25:09'),
(85, 1, 'REPIVOX LTR.', 4, 1200.00, '2023-11-03 19:25:53', '2023-11-03 19:25:53'),
(86, 1, 'CABRIO 500 ML', 3, 1915.00, '2023-11-03 19:26:01', '2023-11-03 19:26:01'),
(87, 1, 'CABRIO 250 ML', 1, 1025.00, '2023-11-03 19:26:08', '2023-11-03 19:26:08'),
(88, 1, 'DITHANE 1 KG X 12 CROP KING', 2, 550.00, '2023-11-03 19:26:15', '2023-11-03 19:26:15'),
(89, 1, 'DITHANE 250 GRM X 30 CROP KING', 2, 260.00, '2023-11-03 19:26:23', '2023-11-03 19:26:23'),
(90, 1, 'SOLOMON CD 300 100ML -BAYER', 4, 395.00, '2023-11-03 19:26:31', '2023-11-03 19:26:31'),
(91, 1, 'PREVATHON 250 ML DUPONT', 1, 780.00, '2023-11-03 19:26:38', '2023-11-03 19:26:38'),
(92, 1, 'CLEAN ZONE 1000 ML', 7, 590.00, '2023-11-03 19:26:49', '2023-11-03 19:26:49'),
(93, 1, 'CLEAN ZONE GAL.', 1, 1160.00, '2023-11-03 19:27:11', '2023-11-06 07:49:56'),
(94, 1, 'MACHETE EC 1000 ML', 3, 583.00, '2023-11-03 19:27:27', '2023-11-03 19:27:27'),
(95, 1, 'MACHETE EC 500 ML', 2, 357.00, '2023-11-03 19:27:36', '2023-11-03 19:27:36'),
(96, 1, 'BOXER 1000 ML', 1, 345.00, '2023-11-03 19:27:58', '2023-11-06 07:54:20'),
(97, 1, 'FURAMAX 16.7 KG', 1, 95.00, '2023-11-03 19:28:46', '2023-11-06 07:50:33'),
(98, 1, 'KOTETSU 250 ML', 1, 940.00, '2023-11-03 19:28:53', '2023-11-03 19:28:53'),
(99, 1, 'REGENT 1 KG', 4, 190.00, '2023-11-03 19:29:00', '2023-11-03 19:29:00'),
(100, 1, 'ASCEND 250 ML', 2, 470.00, '2023-11-03 19:29:13', '2023-11-03 19:29:13'),
(101, 1, 'POLYRAM KG', 5, 415.00, '2023-11-03 19:29:25', '2023-11-03 19:29:25'),
(102, 1, 'PEGASUS 500 SC 250 ML', 1, 895.00, '2023-11-03 19:29:36', '2023-11-03 19:29:36'),
(103, 1, 'DACONIL 75 WP 250 GMS', 2, 280.00, '2023-11-03 19:29:45', '2023-11-03 19:29:45'),
(104, 1, 'WH1 2-4-D AMINE S&P 500 ML', 1, 220.00, '2023-11-03 19:29:51', '2023-11-03 19:29:51'),
(105, 1, 'WH1 2-4-D AMINE S&P 1000 ML', 2, 360.00, '2023-11-03 19:29:58', '2023-11-03 19:29:58'),
(106, 1, 'FUTURA 3G 16.7 KG', 110, 16.00, '2023-11-03 19:30:10', '2023-11-03 19:30:10'),
(107, 1, 'WH1 MALATHION S&P 250 ML', 1, 137.00, '2023-11-03 19:30:19', '2023-11-06 07:53:05'),
(108, 1, 'FOLIMAC', 2, 250.00, '2023-11-03 19:30:25', '2023-11-03 19:30:25'),
(109, 1, 'HARVEST MORE 4-0-18', 1, 245.00, '2023-11-03 19:30:32', '2023-11-03 19:30:32'),
(110, 1, 'STEWARD 30 WG 40 GMS', 19, 85.00, '2023-11-03 19:30:41', '2023-11-03 19:30:41'),
(111, 1, 'STAND', 1, 415.00, '2023-11-03 19:31:03', '2023-11-06 07:51:54'),
(112, 1, 'HARVEST MORE 20-20-20', 3, 235.00, '2023-11-03 19:31:17', '2023-11-03 19:31:17'),
(113, 1, 'HARVEST MORE 15-15-30', 4, 235.00, '2023-11-03 19:31:26', '2023-11-03 19:31:26'),
(114, 1, 'STIMULATE', 1, 740.00, '2023-11-03 19:31:35', '2023-11-03 19:31:35'),
(115, 1, 'REV 800 YELLOW', 1, 390.00, '2023-11-03 19:31:43', '2023-11-06 07:51:32'),
(116, 1, 'NUTRI PLUS 9', 10, 365.00, '2023-11-03 19:31:51', '2023-11-03 19:31:51'),
(117, 1, 'DEMOLITHION', 1, 450.00, '2023-11-03 19:32:01', '2023-11-06 07:50:14'),
(118, 1, 'BRODAN 250 ML.', 1, 170.00, '2023-11-03 19:32:14', '2023-11-06 07:54:28'),
(119, 1, 'K-MARVEL', 17, 320.00, '2023-11-03 19:32:21', '2023-11-03 19:32:21'),
(120, 1, 'LASTCARD 1000 ML', 2, 1120.00, '2023-11-03 19:32:32', '2023-11-03 19:32:32'),
(121, 1, 'LASTCARD 500 ML', 2, 690.00, '2023-11-03 19:32:50', '2023-11-03 19:32:50'),
(122, 1, 'RONSTAR 1000 ML', 3, 1795.00, '2023-11-03 19:33:12', '2023-11-03 19:33:12'),
(123, 1, 'RONSTAR 500 ML', 3, 900.00, '2023-11-03 19:33:19', '2023-11-03 19:33:19'),
(124, 1, 'PASTFAT 250 GMS', 10, 450.00, '2023-11-03 19:33:29', '2023-11-03 19:33:29'),
(125, 1, 'K-VESTER 100 GMS', 5, 650.00, '2023-11-03 19:33:38', '2023-11-03 19:33:38'),
(126, 1, 'K-NICLOSA', 12, 650.00, '2023-11-03 19:34:13', '2023-11-03 19:34:13'),
(127, 1, '2-4-D ESTER SAVE WELL', 2, 360.00, '2023-11-03 19:34:22', '2023-11-03 19:34:22'),
(128, 1, 'WH 1 MARSHAL25 ST 180 GMS.', 3, 380.00, '2023-11-03 19:34:30', '2023-11-03 19:34:30'),
(129, 2, 'WH6 UREA HARVESTER GRANULAR', 5, 1780.00, '2023-11-03 19:35:00', '2023-11-03 19:35:00'),
(130, 2, 'WH6 T-14 PHILASIA', 5, 1960.00, '2023-11-03 19:35:22', '2023-11-04 03:19:10'),
(131, 3, 'FIRE BIRD ECONOMIX 25 KG', 2, 875.00, '2023-11-03 19:35:54', '2023-11-03 19:35:54'),
(132, 3, 'BIO-2 TARGET CHICK GROWER CRUMBLE', 2, 1750.00, '2023-11-03 19:36:09', '2023-11-03 19:36:09'),
(133, 3, 'PIGEON FLYER RACING 25 KG', 2, 1000.00, '2023-11-03 19:36:27', '2023-11-03 19:36:27'),
(134, 3, 'PIGEON BREEDER RACING 25 KG', 2, 1000.00, '2023-11-03 19:36:37', '2023-11-03 19:36:37'),
(135, 3, 'FB-1000 CHICK BOOSTER 50 KG', 1, 2000.00, '2023-11-03 19:37:29', '2023-11-03 19:37:29'),
(136, 3, 'FB-2000 STAG DEVELOPER 50 KG', 2, 1900.00, '2023-11-03 19:37:44', '2023-11-03 19:37:44'),
(137, 3, 'FB-3000 CONDITIONER 50 KG', 3, 1750.00, '2023-11-03 19:37:54', '2023-11-03 19:37:54'),
(138, 3, 'FB-4000 PRE-CON (Maintenance) 50 KG', 2, 1700.00, '2023-11-03 19:38:07', '2023-11-03 19:38:07'),
(139, 3, 'TOP BREED ADULT', 40, 1720.00, '2023-11-03 19:38:20', '2023-11-03 19:38:20'),
(140, 3, 'TOP BREED PUPPY', 40, 1855.00, '2023-11-03 19:38:29', '2023-11-03 19:38:29'),
(141, 3, 'SUPREMO INFINITY 3', 1, 1700.00, '2023-11-03 19:38:40', '2023-11-06 07:58:35'),
(142, 3, 'SUPREMO READY MIX  50 KG', 2, 1950.00, '2023-11-03 19:38:57', '2023-11-03 19:38:57'),
(143, 3, 'WARLORD BASIC MIX GRAINS MAINT.', 1, 950.00, '2023-11-03 19:39:13', '2023-11-03 19:39:13'),
(144, 3, 'WARLORD PREM. MIX GRAINS MAINT.', 2, 900.00, '2023-11-03 19:39:28', '2023-11-03 19:39:28'),
(145, 3, 'WARLORD PREM. READY MIX MAINT.', 1, 925.00, '2023-11-03 19:39:41', '2023-11-06 07:52:19'),
(146, 3, 'X0 2 MAINTENANCE FEEDS', 1, 1500.00, '2023-11-03 19:39:55', '2023-11-06 07:53:49'),
(147, 3, 'STARGAIN HOG GROWER PELLET', 1, 1600.00, '2023-11-03 19:40:14', '2023-11-06 07:52:02'),
(148, 3, 'UNO HOG GRWOER PELLET', 1, 2200.00, '2023-11-03 19:40:27', '2023-11-06 07:52:11'),
(149, 3, 'GMP-1 CHICK BOOSTER 50 KG', 1, 2000.00, '2023-11-03 19:40:43', '2023-11-06 07:50:56'),
(150, 1, 'GMP-2 STAG GROWER 50 KG', 38, 1900.00, '2023-11-03 19:40:55', '2023-11-03 19:40:55'),
(151, 3, 'GMP-3 MAINTENANCE 50 KG', 1, 1750.00, '2023-11-03 19:41:07', '2023-11-06 07:51:05'),
(152, 3, 'GMP-4 BREEDER 50 KG', 1, 1650.00, '2023-11-03 19:41:55', '2023-11-06 07:51:14'),
(153, 3, 'XO 1 CHICK BOOSTER SUNJIN', 0, 1650.00, '2023-11-03 19:42:12', '2023-11-06 07:59:02'),
(154, 3, 'XO 2 STAG DEVELOPER SUNJIN', 1, 1750.00, '2023-11-03 19:42:21', '2023-11-03 19:42:21'),
(155, 3, 'XO 3 MAINTENANCE SUNJIN', 1, 1700.00, '2023-11-03 19:42:33', '2023-11-06 07:54:08'),
(156, 3, 'CHICK BOOSTER EXTREME', 1, 1950.00, '2023-11-03 19:42:43', '2023-11-03 19:42:43'),
(157, 3, 'FIESTA BROILER STARTER', 1, 1700.00, '2023-11-03 19:42:54', '2023-11-04 03:17:43'),
(158, 3, 'FIESTA BROILER FINISHER', 1, 1650.00, '2023-11-03 19:43:03', '2023-11-03 19:43:03'),
(159, 3, 'CROWN CHICKEN LAYER 2', 1, 1900.00, '2023-11-03 19:43:17', '2023-11-06 07:50:05'),
(160, 3, 'CROWN DUCK LAYER', 1, 1650.00, '2023-11-03 19:44:26', '2023-11-03 19:44:26'),
(161, 3, 'DUTECH PRE STARTER 40 KG', 1, 2440.00, '2023-11-03 19:44:46', '2023-11-03 19:44:46'),
(162, 3, 'NUCAT 15 KG', 1, 2400.00, '2023-11-03 19:44:59', '2023-11-03 19:44:59'),
(163, 3, 'HOG PREMIUMBROODSOW', 1, 1700.00, '2023-11-03 19:45:11', '2023-11-03 19:45:11'),
(164, 3, 'NEW HOPE CHICKEN LAYER', 1, 1750.00, '2023-11-03 19:45:19', '2023-11-03 19:45:19'),
(165, 3, 'CATTLE GROWER', 250, 1920.00, '2023-11-03 19:45:35', '2023-11-03 19:45:35'),
(166, 3, 'GOAT GROWER', 250, 1920.00, '2023-11-03 19:45:45', '2023-11-03 19:45:45'),
(167, 3, 'MOLASSES', 50, 350.00, '2023-11-03 19:45:54', '2023-11-03 19:45:54'),
(168, 4, 'HYBRID SWEET CORN', 1, 1900.00, '2023-11-03 19:46:21', '2023-11-03 19:46:21'),
(169, 3, 'EGGPLANT LILAC #1061620', 3, 105.00, '2023-11-03 19:46:44', '2023-11-03 19:46:44'),
(170, 4, 'BITTER GOURD (AMPALAYA) #6030121', 4, 105.00, '2023-11-03 19:47:03', '2023-11-03 19:47:03'),
(171, 4, 'SPONGE GOURD (PATOLA) #8102720', 4, 105.00, '2023-11-03 19:47:11', '2023-11-03 19:47:11'),
(172, 4, 'BIO F1 HOT PEPPER #20GL 185', 5, 125.00, '2023-11-03 19:47:20', '2023-11-03 19:47:20'),
(173, 3, 'BIO HOT PEPPER #20GI104', 5, 125.00, '2023-11-03 19:47:33', '2023-11-03 19:47:33'),
(174, 3, 'HYBRID GIAN WHITE PACKCHOI #14040820', 5, 130.00, '2023-11-03 19:47:42', '2023-11-03 19:47:42'),
(175, 3, 'JAPANESE SQUASH LAGKITAN #2072921', 3, 110.00, '2023-11-03 19:47:50', '2023-11-03 19:47:50'),
(176, 4, 'TOMATO ASTIGBLE #4012320', 5, 110.00, '2023-11-03 19:47:59', '2023-11-03 19:47:59'),
(177, 3, 'OKRA SMOOTH GREEN #6011121', 3, 105.00, '2023-11-03 19:48:11', '2023-11-03 19:48:11'),
(178, 4, 'BEAN POLE (SITAO) #6030121', 1, 105.00, '2023-11-03 19:48:23', '2023-11-06 07:49:28'),
(179, 4, 'CUCUMBER PRAISE # 19A206', 3, 135.00, '2023-11-03 19:48:40', '2023-11-03 19:48:40'),
(180, 4, 'GOURD TAGALOG TYPE #161620', 1, 105.00, '2023-11-03 19:48:50', '2023-11-06 07:51:24'),
(181, 4, 'EGGPLANT PURPLE QUEEN', 1, 70.00, '2023-11-03 19:49:00', '2023-11-06 07:50:24'),
(182, 4, 'EGGPLANT PAKBET F1', 5, 70.00, '2023-11-03 19:49:12', '2023-11-03 19:49:12'),
(183, 3, 'BITTER GOURD (GREEN ARROW)', 4, 70.00, '2023-11-03 19:49:27', '2023-11-03 19:49:27'),
(184, 3, 'PECHAY (GREEN SEASON)', 3, 70.00, '2023-11-03 19:49:44', '2023-11-03 19:49:44'),
(185, 4, 'PUMPKIN MALIGAT', 3, 70.00, '2023-11-03 19:49:51', '2023-11-03 19:49:51'),
(186, 4, 'HOTPEPPER KAYEN', 5, 70.00, '2023-11-03 19:50:06', '2023-11-03 19:50:06'),
(187, 4, 'PATOLA TAGALOG', 2, 60.00, '2023-11-03 19:50:20', '2023-11-03 19:50:20'),
(188, 4, 'STRING BEANS (LONG)', 1, 1300.00, '2023-11-03 19:50:29', '2023-11-03 19:50:29'),
(189, 5, 'VETRACIN PREMIUM 5 GM', 1, 18.00, '2023-11-03 19:51:00', '2023-11-03 19:51:00'),
(190, 5, 'VETRACIN GOLD 5 GM', 29, 24.00, '2023-11-03 19:51:12', '2023-11-03 19:51:12'),
(191, 5, 'AMTYL CAPSULE', 369, 15.00, '2023-11-03 19:51:29', '2023-11-03 19:51:29'),
(192, 5, 'VALBAZEN', 15, 250.00, '2023-11-03 19:51:49', '2023-11-03 19:51:49'),
(193, 5, 'SHAMPOOCH DOG', 24, 18.00, '2023-11-03 19:51:58', '2023-11-03 19:51:58'),
(194, 5, 'VITMINPRO', 2, 22.00, '2023-11-03 19:52:07', '2023-11-03 19:52:07'),
(195, 5, 'TOLTRAZURIL', 10, 20.00, '2023-11-03 19:52:17', '2023-11-03 19:52:17'),
(196, 5, 'MULTIMAX VETRACIN', 22, 22.00, '2023-11-03 19:52:29', '2023-11-03 19:52:29'),
(197, 5, 'ROBESTREP VK (SMALL)', 10, 20.00, '2023-11-03 19:52:38', '2023-11-03 19:52:38'),
(198, 5, 'ROBESTREP VK (BIG)', 6, 50.00, '2023-11-03 19:52:53', '2023-11-03 19:52:53'),
(199, 5, 'ROBESTREP VK (BOTTLE)', 3, 140.00, '2023-11-03 19:53:03', '2023-11-03 19:53:03'),
(200, 5, 'LEVOFLOXACIN', 3, 20.00, '2023-11-03 19:53:13', '2023-11-03 19:53:13'),
(201, 5, 'POWDER DEXTROSE', 2, 85.00, '2023-11-03 19:53:22', '2023-11-03 19:53:22'),
(202, 5, 'MULTIVITAMINS BOX (BIG)', 2, 180.00, '2023-11-03 19:53:31', '2023-11-03 19:53:31'),
(203, 5, 'MULTIVITAMINS BOX (SMALL)', 2, 120.00, '2023-11-03 19:53:39', '2023-11-03 19:53:39'),
(204, 5, 'BOXCONTRIMAZINE', 1, 120.00, '2023-11-03 19:53:51', '2023-11-03 19:53:51'),
(205, 5, 'ROBICOMJECT BOX', 1, 300.00, '2023-11-03 19:54:02', '2023-11-03 19:54:02'),
(206, 5, 'IRON (RONDEXTRAN)', 1, 120.00, '2023-11-03 19:54:09', '2023-11-03 19:54:09'),
(207, 5, 'SPECTRUM 5G X 96', 96, 18.00, '2023-11-03 19:54:20', '2023-11-03 19:54:20'),
(208, 5, 'SPECTRUM PLUS 5G X 96', 96, 24.00, '2023-11-03 19:54:32', '2023-11-03 19:54:32'),
(209, 5, 'SUSTAN-Z', 48, 18.00, '2023-11-03 19:54:41', '2023-11-03 19:54:41'),
(210, 5, 'KING PURGA', 48, 24.00, '2023-11-03 19:54:49', '2023-11-03 19:54:49'),
(211, 5, 'WASH OUT', 24, 22.00, '2023-11-03 19:54:56', '2023-11-03 19:54:56'),
(212, 5, 'VOLPLEX', 100, 16.00, '2023-11-03 19:55:04', '2023-11-03 19:55:04'),
(213, 5, 'HAMMER', 200, 12.00, '2023-11-03 19:55:11', '2023-11-03 19:55:11'),
(214, 5, 'B- 50', 200, 15.00, '2023-11-03 19:55:18', '2023-11-03 19:55:18'),
(215, 5, 'RED CELL', 2, 160.00, '2023-11-03 19:55:26', '2023-11-03 19:55:26'),
(216, 6, 'WATERLILY RED (MALAMBOT)', 1, 1000.00, '2023-11-03 19:56:15', '2023-11-06 07:52:26'),
(217, 6, 'JASMINE VIOLET ( MALAMBOT)', 4, 1025.00, '2023-11-03 19:56:34', '2023-11-03 19:56:34'),
(218, 6, 'GOLDEN DRAGON (MAALSA)', 73, 1050.00, '2023-11-03 19:56:47', '2023-11-03 19:56:47'),
(219, 6, 'CHERRY BLOSSOM (MAALSA)', 50, 1075.00, '2023-11-03 19:56:58', '2023-11-03 19:56:58'),
(220, 6, 'JASMINE GREEN (MALAMBOT)', 23, 1075.00, '2023-11-03 19:57:06', '2023-11-03 19:57:06'),
(221, 6, 'R-160 (MALAMBOT)', 1125, 125.00, '2023-11-03 19:57:18', '2023-11-03 19:57:18'),
(222, 6, 'JASMINE BLUE (MALAMBOT)', 50, 1075.00, '2023-11-03 19:57:27', '2023-11-03 19:57:27'),
(223, 7, 'SPARK PLUG', 10, 110.00, '2023-11-03 19:57:49', '2023-11-03 19:57:49'),
(224, 7, 'SPARK PLUG BOSCH', 4, 155.00, '2023-11-03 19:57:57', '2023-11-03 19:57:57'),
(225, 7, 'NATIONAL GREASE', 4, 155.00, '2023-11-03 19:58:06', '2023-11-03 19:58:06'),
(226, 7, 'BRAKE FLUID 270 ML.', 5, 165.00, '2023-11-03 19:58:35', '2023-11-03 19:58:35'),
(227, 7, 'BRAKE FLUID 150 ML.', 5, 145.00, '2023-11-03 19:58:43', '2023-11-03 19:58:43'),
(228, 7, '1 LITER COOLANT GREEN', 2, 250.00, '2023-11-03 19:58:49', '2023-11-09 08:21:33'),
(229, 7, '2 LITER COOLANT PINK', 2, 250.00, '2023-11-03 19:59:00', '2023-11-03 19:59:00'),
(230, 7, 'FILTER 90915-YZZDL', 2, 185.00, '2023-11-03 19:59:07', '2023-11-03 19:59:07'),
(231, 7, 'FILTER 90915-YZZEI', 2, 210.00, '2023-11-03 19:59:17', '2023-11-03 19:59:17'),
(232, 7, 'FILTER C-102 KOSA', 2, 185.00, '2023-11-03 19:59:29', '2023-11-03 19:59:29'),
(233, 7, 'FILTER C-306 MXR', 2, 420.00, '2023-11-03 19:59:38', '2023-11-03 19:59:38'),
(234, 7, 'FILTER C-304 MXR', 2, 235.00, '2023-11-03 19:59:47', '2023-11-03 19:59:47'),
(235, 7, 'FILTER C-806 MXR', 2, 235.00, '2023-11-03 19:59:54', '2023-11-03 19:59:54'),
(236, 7, 'BEARING 6201 NSK', 2, 95.00, '2023-11-03 20:00:04', '2023-11-03 20:00:19'),
(237, 7, 'BEARING 6202 NSK', 2, 120.00, '2023-11-03 20:00:31', '2023-11-03 20:00:31'),
(238, 7, 'BEARING 6203 NSK', 2, 135.00, '2023-11-03 20:00:39', '2023-11-03 20:00:39'),
(239, 7, 'BEARING 6204 NSK', 2, 140.00, '2023-11-03 20:00:48', '2023-11-03 20:00:48'),
(240, 7, 'BEARING 6205 NSK', 2, 150.00, '2023-11-03 20:01:01', '2023-11-03 20:01:01'),
(241, 7, 'BEARING 6206 HLB', 2, 180.00, '2023-11-03 20:01:09', '2023-11-03 20:01:09'),
(242, 7, 'BEARING 6207 NSK', 2, 235.00, '2023-11-03 20:01:20', '2023-11-03 20:01:20'),
(243, 7, 'BEARING 6208 KOYO', 2, 285.00, '2023-11-03 20:01:27', '2023-11-03 20:01:27'),
(244, 7, 'BEARING 6209 KOYO', 2, 450.00, '2023-11-03 20:01:35', '2023-11-03 20:01:35'),
(245, 7, 'BEARING 6210 NSK', 2, 490.00, '2023-11-03 20:01:43', '2023-11-03 20:01:43'),
(246, 7, 'BEARING 6301 ARB', 2, 135.00, '2023-11-03 20:01:53', '2023-11-03 20:01:53'),
(247, 7, 'BEARING 6302 KOYO', 4, 140.00, '2023-11-03 20:02:02', '2023-11-03 20:02:02'),
(248, 7, 'BEARING 6303 ARB', 4, 150.00, '2023-11-03 20:02:10', '2023-11-03 20:02:10'),
(249, 7, 'BEARING 6304 KOYO', 4, 170.00, '2023-11-03 20:02:17', '2023-11-03 20:02:17'),
(250, 7, 'BEARING 6305 NSK', 4, 220.00, '2023-11-03 20:02:25', '2023-11-03 20:02:25'),
(251, 7, 'BEARING 6306 KOYO', 2, 350.00, '2023-11-03 20:02:32', '2023-11-03 20:02:32'),
(252, 7, 'BEARING 6307 KOYO', 2, 400.00, '2023-11-03 20:02:40', '2023-11-03 20:02:40'),
(253, 7, 'BEARING 6308 KOYO', 2, 430.00, '2023-11-03 20:03:03', '2023-11-03 20:03:03'),
(254, 7, 'BEARING 6309 ONSKO', 2, 450.00, '2023-11-03 20:03:11', '2023-11-03 20:03:11'),
(255, 7, 'BEARING 6310 NSK', 2, 550.00, '2023-11-03 20:03:18', '2023-11-03 20:03:18'),
(256, 7, 'APEX 1 LITER (GASOLINE ENGINE)', 23, 380.00, '2023-11-03 20:03:27', '2023-11-03 20:03:27'),
(257, 7, 'APEX 4 LITERS (GASOLINE ENGINE)', 5, 1440.00, '2023-11-03 20:03:36', '2023-11-03 20:03:36'),
(258, 7, 'EXELLO 1 LITER (DIESEL ENGINE)', 24, 380.00, '2023-11-03 20:03:47', '2023-11-03 20:03:47'),
(259, 7, 'EXELLO 4 LITERS (DIESEL ENGINE)', 6, 1440.00, '2023-11-03 20:03:56', '2023-11-03 20:03:56'),
(260, 7, 'CVO 1 LITER (DIESEL ENGINE)', 24, 300.00, '2023-11-03 20:04:04', '2023-11-03 20:04:04'),
(261, 7, 'CVO 4 LITERS (DIESEL ENGINE)', 6, 1155.00, '2023-11-03 20:04:11', '2023-11-03 20:04:11'),
(262, 7, 'POWERTEC 800 ML. (MANUAL)', 11, 300.00, '2023-11-03 20:04:19', '2023-11-03 20:04:19'),
(263, 7, 'POWERTEC 1 LITER (MANUAL)', 12, 370.00, '2023-11-03 20:04:38', '2023-11-03 20:04:38'),
(264, 7, 'POWERTEC 800 ML. (AUTOMATIC)', 12, 315.00, '2023-11-03 20:04:47', '2023-11-03 20:04:47'),
(265, 7, 'POWERTEC 1 LITER (AUTOMATIC)', 12, 380.00, '2023-11-03 20:04:57', '2023-11-03 20:04:57'),
(266, 7, 'PERTUA CAN OIL & METAL TREATMENT', 12, 545.00, '2023-11-03 20:05:08', '2023-11-03 20:05:08'),
(267, 8, 'KAWASAKI SPRAYER W/ MANUAL', 3, 1699.00, '2023-11-03 20:05:35', '2023-11-03 20:05:35'),
(268, 8, 'KAWASAKI SPRAYER W/O MANUAL', 3, 1599.00, '2023-11-03 20:05:47', '2023-11-03 20:05:47'),
(269, 8, 'KNAPSACK 16 L (YELLOW)', 1, 1050.00, '2023-11-03 20:06:00', '2023-11-03 20:06:00'),
(270, 8, 'KNAPSACK 16 L (BLUE)', 1, 1000.00, '2023-11-03 20:06:08', '2023-11-03 20:06:08'),
(271, 8, 'KNAPSACK 20 L (GREEN)', 1, 1100.00, '2023-11-03 20:06:15', '2023-11-03 20:06:15'),
(272, 8, 'BLUE TWINE STRING', 5, 200.00, '2023-11-03 20:06:25', '2023-11-03 20:06:25'),
(273, 8, 'TOLDA 2 YARDS', 3, 170.00, '2023-11-03 20:06:34', '2023-11-03 20:06:34'),
(274, 8, 'TOLDA 4 YARDS', 3, 290.00, '2023-11-03 20:06:42', '2023-11-03 20:06:42'),
(275, 8, 'YELLOW TWINE STRING', 19, 220.00, '2023-11-03 20:06:48', '2023-11-03 20:06:48'),
(276, 8, 'NEEDLE', 117, 10.00, '2023-11-03 20:06:59', '2023-11-03 20:06:59'),
(277, 8, 'ORANGE SPRAYER 3 LITERS', 3, 240.00, '2023-11-03 20:07:07', '2023-11-03 20:07:07'),
(278, 8, 'SQUARE GASKET', 5, 65.00, '2023-11-03 20:07:18', '2023-11-03 20:07:18'),
(279, 8, 'SAPITA JET MATIC', 5, 65.00, '2023-11-03 20:07:27', '2023-11-03 20:07:27'),
(280, 8, 'SAPITA PITCHER', 5, 45.00, '2023-11-03 20:07:34', '2023-11-03 20:07:34'),
(281, 8, 'FOLDED SICKLE', 2, 145.00, '2023-11-03 20:07:41', '2023-11-03 20:07:41'),
(282, 8, 'TABAS RED', 2, 150.00, '2023-11-03 20:07:47', '2023-11-03 20:07:47'),
(283, 8, 'KARET', 10, 110.00, '2023-11-03 20:07:57', '2023-11-03 20:07:57'),
(284, 8, 'TABAS', 2, 265.00, '2023-11-03 20:08:12', '2023-11-03 20:08:12'),
(285, 8, 'WALIS TING-TING W/ HANDLE', 5, 65.00, '2023-11-03 20:08:26', '2023-11-03 20:08:26'),
(286, 8, 'WALIS TING-TING', 5, 40.00, '2023-11-03 20:08:33', '2023-11-03 20:08:33'),
(287, 8, 'WALIS TAMBO', 10, 130.00, '2023-11-03 20:08:43', '2023-11-03 20:08:43'),
(288, 8, 'RAKE ROUND', 2, 150.00, '2023-11-03 20:08:54', '2023-11-03 20:08:54'),
(289, 8, 'PIKO', 2, 265.00, '2023-11-03 20:09:03', '2023-11-03 20:09:03'),
(290, 8, 'KARET WOOD', 5, 55.00, '2023-11-03 20:09:10', '2023-11-03 20:09:10'),
(291, 8, 'SEEDLING BAG 4 X 4 X 7', 100, 4.00, '2023-11-03 20:09:21', '2023-11-03 20:09:21'),
(292, 8, 'SEEDLING BAG 5 X 5 X 8', 100, 5.00, '2023-11-03 20:09:27', '2023-11-03 20:09:27'),
(293, 8, 'ASAROL LARGE ( MR. COCK)', 1, 280.00, '2023-11-03 20:09:34', '2023-11-03 20:09:34'),
(294, 8, 'ASAROL MEDIUM ( MR. COCK)', 1, 230.00, '2023-11-03 20:09:44', '2023-11-03 20:09:44'),
(295, 8, 'ASAROL SMALL ( MR. COCK)', 1, 210.00, '2023-11-03 20:09:54', '2023-11-03 20:09:54'),
(296, 8, 'SCRATCH PEN LIGHT (GREEN)', 4, 275.00, '2023-11-03 20:10:08', '2023-11-03 20:10:08'),
(297, 8, 'AUTOMATIC FEEDERER 10 KG', 5, 175.00, '2023-11-03 20:10:16', '2023-11-03 20:10:16'),
(298, 8, 'AUTOMATIC FEEDERER 7 KG', 5, 155.00, '2023-11-03 20:10:25', '2023-11-03 20:10:25'),
(299, 8, 'FEEDING CUP X-LARGE', 5, 35.00, '2023-11-03 20:10:31', '2023-11-03 20:10:31'),
(300, 8, 'FEEDING CUP LARGE', 5, 30.00, '2023-11-03 20:10:40', '2023-11-03 20:10:40'),
(301, 8, 'FEEDING CUP SMALL', 5, 20.00, '2023-11-03 20:10:45', '2023-11-03 20:10:45'),
(302, 8, 'RUBBER POT (1 SIZE ONLY) MED.', 5, 35.00, '2023-11-03 20:10:52', '2023-11-03 20:10:52'),
(303, 8, 'PLASTIC POT SMALL', 5, 30.00, '2023-11-03 20:10:59', '2023-11-03 20:10:59'),
(304, 8, 'PLASTIC POT BIG', 5, 40.00, '2023-11-03 20:11:07', '2023-11-03 20:11:07'),
(305, 8, 'WATERER 1/4 GALLON (ARVET) (BAS & BODY)', 5, 45.00, '2023-11-03 20:11:14', '2023-11-03 20:11:14'),
(306, 8, 'WATERER 1/2 GALLON (ARVET) (BAS & BODY)', 5, 50.00, '2023-11-03 20:11:23', '2023-11-03 20:11:23'),
(307, 8, 'IMPORTED AUTOMATIC FEEDERER  1/2 KG.', 5, 75.00, '2023-11-03 20:11:30', '2023-11-03 20:11:30'),
(308, 8, 'IMPORTED AUTOMATIC FEEDERER  4 KG.', 5, 170.00, '2023-11-03 20:11:41', '2023-11-03 20:11:41'),
(309, 8, 'IMPORTED AUTOMATIC FEEDERER  6 KG.', 5, 240.00, '2023-11-03 20:11:49', '2023-11-03 20:11:49'),
(310, 8, 'GARDEN SET', 2, 550.00, '2023-11-03 20:11:58', '2023-11-03 20:11:58'),
(311, 8, 'ROOSTER SILICON GLOVES', 4, 150.00, '2023-11-03 20:12:05', '2023-11-03 20:12:05'),
(312, 8, 'ROOSTER CORD (THICK)', 10, 35.00, '2023-11-03 20:12:15', '2023-11-03 20:12:15'),
(313, 8, 'ROOSTER CORD (THIN)', 10, 25.00, '2023-11-03 20:12:56', '2023-11-03 20:12:56'),
(314, 8, 'SPRAY NOZZLE', 21, 150.00, '2023-11-03 20:13:12', '2023-11-03 20:13:12'),
(315, 8, 'SYRINGE', 96, 10.00, '2023-11-03 20:13:26', '2023-11-03 20:13:26');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_01_113147_create_categories_table', 1),
(6, '2023_11_01_113253_create_inventories_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'KJAE IMS', 'kjaeims@gmail.com', NULL, '$2y$10$vFfsZX40cxXewurxYPK4YOL6ckyk02kYUO/fDM1c1okNw/SZpjbLa', 'jPHUMQBWQhtCXioXhPSDCStvdRL1ssR547Oxpzu9JqlytIWkNnKJ8mBLOuPN', '2023-11-02 22:33:49', '2023-11-04 15:19:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
