-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Nov 2024 pada 01.01
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirproject`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `detail_id` int(11) NOT NULL,
  `kode_produk` varchar(15) DEFAULT NULL,
  `NamaProduk` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `penjualan_id` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`detail_id`, `kode_produk`, `NamaProduk`, `harga`, `jumlah`, `penjualan_id`, `tanggal`) VALUES
(1, 'M.001', 'Nasi Uduk', 20000, 2, 1, '2024-09-11 07:50:54'),
(2, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 1, '2024-09-11 07:50:54'),
(3, 'M.003', 'Ayam Geprek', 15000, 1, 1, '2024-09-11 07:50:54'),
(4, 'M.001', 'Nasi Uduk', 20000, 2, 2, '2024-09-11 07:50:54'),
(5, 'M.003', 'Ayam Geprek', 15000, 2, 2, '2024-09-11 07:50:54'),
(6, 'M.001', 'Nasi Uduk', 20000, 3, 3, '2024-09-11 07:50:54'),
(7, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 3, '2024-09-11 07:50:54'),
(8, 'M.004', 'Ayam Bakar', 10000, 3, 3, '2024-09-11 07:50:54'),
(9, 'M.001', 'Nasi Uduk', 20000, 2, 4, '2024-09-11 07:50:54'),
(10, 'M.003', 'Ayam Geprek', 15000, 3, 4, '2024-09-11 07:50:54'),
(11, 'M.004', 'Ayam Bakar', 10000, 2, 5, '2024-09-11 07:50:54'),
(12, 'M.003', 'Ayam Geprek', 15000, 1, 5, '2024-09-11 07:50:54'),
(13, 'M.001', 'Nasi Uduk', 20000, 2, 6, '2024-09-11 07:50:54'),
(14, 'M.003', 'Ayam Geprek', 15000, 2, 6, '2024-09-11 07:50:54'),
(15, 'M.001', 'Nasi Uduk', 20000, 2, 7, '2024-09-11 07:50:54'),
(16, 'M.001', 'Nasi Uduk', 20000, 2, 8, '2024-09-11 07:50:54'),
(17, 'M.003', 'Ayam Geprek', 15000, 3, 8, '2024-09-11 07:50:54'),
(18, 'M.005', 'Nila Bakar', 25000, 2, 8, '2024-09-11 07:50:54'),
(19, 'M.001', 'Nasi Uduk', 20000, 2, 9, '2024-09-11 07:50:54'),
(20, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 9, '2024-09-11 07:50:54'),
(21, 'M.003', 'Ayam Geprek', 15000, 4, 9, '2024-09-11 07:50:54'),
(22, 'M.001', 'Nasi Uduk', 20000, 1, 10, '2024-09-11 07:50:54'),
(23, 'M.005', 'Nila Bakar', 25000, 5, 10, '2024-09-11 07:50:54'),
(24, 'M.003', 'Ayam Geprek', 15000, 2, 10, '2024-09-11 07:50:54'),
(25, 'M.003', 'Ayam Geprek', 15000, 5, 11, '2024-09-11 07:50:54'),
(26, 'M.001', 'Nasi Uduk', 20000, 5, 11, '2024-09-11 07:50:54'),
(27, 'M.002', 'Nasi Goreng Spesial', 25000, 5, 12, '2024-09-11 07:50:54'),
(28, 'M.003', 'Ayam Geprek', 15000, 2, 12, '2024-09-11 07:50:54'),
(29, 'M.004', 'Ayam Bakar', 10000, 3, 12, '2024-09-11 07:50:54'),
(30, 'M.001', 'Nasi Uduk', 20000, 2, 13, '2024-09-11 07:50:54'),
(31, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 14, '2024-09-11 07:50:54'),
(32, 'M.004', 'Ayam Bakar', 10000, 3, 14, '2024-09-11 07:50:54'),
(33, 'M.005', 'Nila Bakar', 25000, 3, 14, '2024-09-11 07:50:54'),
(34, 'D.002', 'Jus Sirsak', 10000, 3, 14, '2024-09-11 07:50:54'),
(35, 'M.001', 'Nasi Uduk', 20000, 3, 15, '2024-09-11 07:50:54'),
(36, 'M.003', 'Ayam Geprek', 15000, 1, 15, '2024-09-11 07:50:54'),
(37, 'D.002', 'Jus Sirsak', 10000, 1, 15, '2024-09-11 07:50:54'),
(38, 'D.002', 'Jus Sirsak', 10000, 3, 16, '2024-09-11 07:50:54'),
(39, 'M.001', 'Nasi Uduk', 20000, 3, 16, '2024-09-11 07:50:54'),
(40, 'D.002', 'Jus Sirsak', 10000, 3, 17, '2024-09-11 07:50:54'),
(41, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 17, '2024-09-11 07:50:54'),
(44, 'M.003', 'Ayam Geprek', 15000, 1, 17, '2024-09-11 07:50:54'),
(46, 'M.001', 'Nasi Uduk', 20000, 2, 18, '2024-09-11 07:50:54'),
(47, 'D.001', 'Jus Alpukat', 10000, 2, 18, '2024-09-11 07:50:54'),
(48, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 19, '2024-09-11 07:50:54'),
(49, 'M.004', 'Ayam Bakar', 10000, 2, 19, '2024-09-11 07:50:54'),
(50, 'D.001', 'Jus Alpukat', 10000, 5, 19, '2024-09-11 07:50:54'),
(51, 'M.001', 'Nasi Uduk', 20000, 1, 20, '2024-09-11 07:50:54'),
(52, 'M.003', 'Ayam Geprek', 15000, 3, 20, '2024-09-11 07:50:54'),
(53, 'M.001', 'Nasi Uduk', 20000, 2, 21, '2024-09-11 07:50:54'),
(54, 'M.003', 'Ayam Geprek', 15000, 1, 21, '2024-09-11 07:50:54'),
(55, 'D.001', 'Jus Alpukat', 10000, 3, 21, '2024-09-11 07:50:54'),
(56, 'M.001', 'Nasi Uduk', 20000, 5, 22, '2024-09-11 07:50:54'),
(57, 'M.005', 'Nila Bakar', 25000, 5, 22, '2024-09-11 07:50:54'),
(58, 'M.001', 'Nasi Uduk', 20000, 2, 23, '2024-09-11 07:50:54'),
(59, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 23, '2024-09-11 07:50:54'),
(60, 'M.003', 'Ayam Geprek', 15000, 1, 23, '2024-09-11 07:50:54'),
(61, 'M.002', 'Nasi Goreng Spesial', 25000, 3, 24, '2024-09-11 07:50:54'),
(62, 'D.002', 'Jus Sirsak', 10000, 2, 24, '2024-09-11 07:50:54'),
(63, 'M.002', 'Nasi Goreng Spesial', 25000, 2, 25, '2024-09-11 07:50:54'),
(64, 'M.003', 'Ayam Geprek', 15000, 1, 25, '2024-09-11 07:50:54'),
(65, 'M.001', 'Nasi Uduk', 20000, 3, 26, '2024-09-11 07:50:54'),
(66, 'M.004', 'Ayam Bakar', 10000, 3, 26, '2024-09-11 07:50:54'),
(67, 'D.002', 'Jus Sirsak', 10000, 1, 26, '2024-09-11 07:50:54'),
(68, 'D.002', 'Jus Sirsak', 10000, 5, 26, '2024-09-11 07:50:54'),
(69, 'NZAP-7823', 'Roti Aoka', 0, 3, 31, '2024-09-11 13:40:55'),
(70, 'SYRK-4802', 'Miem sedap', 2000, 1, 31, '2024-09-11 13:41:47'),
(71, 'QIYU-9270', 'Mie sedap spicy', 2000, 3, 31, '2024-09-11 13:41:54'),
(72, 'VFTR-1206', 'Ice Cream Cup Coklat', 5000, 3, 31, '2024-09-11 13:42:01'),
(74, 'SYRK-4802', 'Miem sedap', 2000, 1, 32, '2024-09-11 13:45:26'),
(75, 'GABJ-7165', 'bengbeng', 2000, 3, 32, '2024-09-11 13:45:39'),
(76, 'SYRK-4802', 'Miem sedap', 2000, 5, 32, '2024-09-11 13:45:49'),
(77, 'NZAP-7823', 'Roti Aoka', 5000, 5, 34, '2024-09-11 14:05:32'),
(78, 'QIYU-9270', 'Mie sedap spicy', 2000, 4, 34, '2024-09-11 14:05:47'),
(79, 'RYXB-3259', 'Chitato', 6000, 3, 35, '2024-09-11 14:06:35'),
(80, 'WGKD-4865', 'Teh Pucuk', 4000, 3, 36, '2024-09-11 14:11:01'),
(81, 'VFTR-1206', 'Ice Cream Cup Coklat', 5000, 3, 36, '2024-09-11 14:11:06'),
(82, 'RYXB-3259', 'Chitato', 6000, 2, 37, '2024-09-11 14:11:37'),
(83, 'SYRK-4802', 'Miem sedap', 2000, 1, 38, '2024-09-11 14:13:42'),
(84, 'SYRK-4802', 'Miem sedap', 2000, 1, 39, '2024-09-16 13:24:01'),
(85, 'WGKD-4865', 'Teh Pucuk', 4000, 4, 39, '2024-09-16 13:24:08'),
(86, 'VFTR-1206', 'Ice Cream Cup Coklat', 5000, 1, 39, '2024-09-16 13:24:16'),
(87, '1122a', 'Ice Cream Taro ', 3000, 1, 42, '2024-09-16 14:54:56'),
(88, 'RYXB-3259', 'Chitato', 6000, 4, 42, '2024-09-16 14:55:40'),
(89, 'SYRK-4802', 'Miem sedap', 2000, 1, 44, '2024-09-16 14:56:42'),
(90, 'GABJ-7165', 'bengbeng', 2000, 2, 44, '2024-09-16 14:56:47'),
(91, 'SYRK-4802', 'Miem sedap', 2000, 6, 45, '2024-09-16 14:57:17'),
(92, 'NZAP-7823', 'Roti Aoka', 5000, 7, 46, '2024-09-16 14:57:35'),
(93, 'SYRK-4802', 'Miem sedap', 2000, 3, 47, '2024-09-16 14:57:54'),
(94, 'SYRK-4802', 'Miem sedap', 2000, 3, 29, '2024-09-17 13:11:17'),
(95, '1122a', 'Ice Cream Taro ', 3000, 2, 48, '2024-09-17 13:15:49'),
(96, 'QIYU-9270', 'Mie sedap spicy', 2000, 3, 48, '2024-09-17 13:15:53'),
(97, '1122a', 'Ice Cream Taro ', 3000, 3, 49, '2024-09-17 13:24:07'),
(98, 'NZAP-7823', 'Roti Aoka', 5000, 2, 49, '2024-09-17 13:24:15'),
(99, 'RYXB-3259', 'Chitato', 6000, 7, 51, '2024-09-17 13:36:49'),
(100, 'SYRK-4802', 'Miem sedap', 2000, 4, 53, '2024-09-17 13:41:09'),
(101, 'RYXB-3259', 'Chitato', 6000, 3, 54, '2024-09-17 13:44:47'),
(102, '1122a', 'Ice Cream Taro ', 3000, 2, 57, '2024-09-17 14:03:24'),
(103, '1122a', 'Ice Cream Taro ', 3000, 1, 58, '2024-09-17 14:05:30'),
(104, 'NZAP-7823', 'Roti Aoka', 5000, 1, 58, '2024-09-17 14:05:36'),
(105, 'QIYU-9270', 'Mie sedap spicy', 2000, 3, 59, '2024-09-17 14:05:56'),
(106, 'QIYU-9270', 'Mie sedap spicy', 2000, 3, 59, '2024-09-17 14:05:59'),
(107, '1122a', 'Ice Cream Taro ', 3000, 10, 61, '2024-09-17 14:16:34'),
(108, '1122a', 'Ice Cream Taro ', 3000, 10, 63, '2024-09-17 14:18:08'),
(109, 'SYRK-4802', 'Miem sedap', 2000, 2, 63, '2024-09-17 14:18:17'),
(110, 'RYXB-3259', 'Chitato', 6000, 2, 63, '2024-09-17 14:18:22'),
(112, 'RYXB-3259', 'Chitato', 6000, 4, 67, '2024-09-18 02:40:26'),
(113, 'WGKD-4865', 'Teh Pucuk', 4000, 1, 68, '2024-09-18 02:42:11'),
(114, 'RYXB-3259', 'Chitato', 6000, 6, 68, '2024-09-18 02:42:15'),
(115, 'GABJ-7165', 'bengbeng', 2000, 4, 68, '2024-09-18 02:42:19'),
(116, 'NBYR-8519', 'Teh Gelas', 1000, 4, 68, '2024-09-18 02:42:25'),
(117, '1122a', 'Ice Cream Taro ', 3000, 2, 68, '2024-09-18 02:42:45'),
(119, '1122a', 'Ice Cream Taro ', 3000, 3, 72, '2024-09-18 02:45:19'),
(120, 'SYRK-4802', 'Miem sedap', 2000, 2, 74, '2024-09-18 02:55:56'),
(121, 'SYRK-4802', 'Miem sedap', 2000, 2, 75, '2024-09-18 02:59:34'),
(122, 'RYXB-3259', 'Chitato', 6000, 5, 76, '2024-09-18 03:10:20'),
(123, 'SYRK-4802', 'Miem sedap', 2000, 2, 76, '2024-09-18 03:11:52'),
(124, 'SYRK-4802', 'Miem sedap', 2000, 4, 79, '2024-09-18 13:52:44'),
(125, 'NZAP-7823', 'Roti Aoka', 5000, 2, 79, '2024-09-18 13:52:52'),
(126, 'SYRK-4802', 'Miem sedap', 2000, 4, 84, '2024-09-19 00:11:30'),
(127, 'NBYR-8519', 'Teh Gelas', 1000, 10, 84, '2024-09-19 00:11:41'),
(128, 'RYXB-3259', 'Chitato', 6000, 5, 84, '2024-09-19 00:11:49'),
(129, 'GABJ-7165', 'bengbeng', 2000, 4, 84, '2024-09-19 00:11:57'),
(130, 'WGKD-4865', 'Teh Pucuk', 4000, 3, 84, '2024-09-19 00:12:04'),
(131, 'GABJ-7165', 'bengbeng', 2000, 3, 66, '2024-09-22 11:20:44'),
(132, 'SYRK-4802', 'Miem sedap', 2000, 3, 66, '2024-09-22 11:20:48'),
(133, '1122a', 'Ice Cream Taro ', 3000, 1, 66, '2024-09-22 11:20:52'),
(134, 'RYXB-3259', 'Chitato', 6000, 7, 85, '2024-09-22 11:24:36'),
(135, 'RYXB-3259', 'Chitato', 6000, 3, 86, '2024-09-22 11:28:40'),
(136, '1122a', 'Ice Cream Taro ', 3000, 2, 87, '2024-09-22 11:31:12'),
(137, 'SYRK-4802', 'Miem sedap', 2000, 6, 89, '2024-09-22 11:44:58'),
(139, 'SYRK-4802', 'Miem sedap', 2000, 4, 92, '2024-09-22 11:54:45'),
(140, 'SYRK-4802', 'Miem sedap', 2000, 4, 96, '2024-10-02 02:06:50'),
(141, 'NZAP-7823', 'Roti Aoka', 5000, 1, 96, '2024-10-02 02:06:59'),
(142, 'SYRK-4802', 'Miem sedap', 2000, 3, 97, '2024-10-02 07:38:45'),
(143, 'SYRK-4802', 'Miem sedap', 2000, 1, 97, '2024-10-02 07:41:43'),
(144, 'XBOQ-0278', 'Power f', 1000, 1, 98, '2024-10-08 06:36:24'),
(145, 'WGKD-4865', 'Teh Pucuk', 4000, 1, 98, '2024-10-08 06:36:28'),
(146, 'NZAP-7823', 'Roti Aoka', 5000, 1, 98, '2024-10-08 06:36:32'),
(147, 'SFZP-6234', 'Sosis kenzler singles', 9000, 3, 98, '2024-10-08 06:36:42'),
(148, 'QIYU-9270', 'Mie sedap spicy', 2000, 4, 103, '2024-10-15 01:44:33'),
(149, 'NBYR-8519', 'Teh Gelas', 1000, 10, 103, '2024-10-15 01:44:42'),
(150, 'VFTR-1206', 'Ice Cream Cup Coklat', 5000, 5, 104, '2024-10-15 07:03:33'),
(151, 'SFZP-6234', 'Sosis kenzler singles', 9000, 2, 104, '2024-10-15 07:03:43'),
(152, 'QIYU-9270', 'Mie sedap spicy', 2000, 1, 105, '2024-10-15 07:11:46'),
(153, 'VFTR-1206', 'Ice Cream Cup Coklat', 5000, 4, 105, '2024-10-15 07:11:56'),
(154, 'NZAP-7823', 'Roti Aoka', 5000, 1, 107, '2024-10-16 00:38:20'),
(155, 'GABJ-7165', 'bengbeng', 2000, 4, 107, '2024-10-16 00:38:26'),
(156, 'VFTR-1206', 'Ice Cream Cup Coklat', 5000, 1, 113, '2024-10-16 01:14:06'),
(157, 'WGKD-4865', 'Teh Pucuk', 4000, 1, 113, '2024-10-16 01:14:10'),
(160, '1122a', 'Ice Cream Taro ', 3000, 5, 119, '2024-10-16 02:44:42'),
(161, '1122a', 'Ice Cream Taro ', 3000, 5, 119, '2024-10-16 02:44:42'),
(162, '1122a', 'Ice Cream Taro ', 3000, 8, 121, '2024-10-16 02:48:52'),
(163, 'GABJ-7165', 'bengbeng', 2000, 3, 125, '2024-10-16 07:29:59'),
(164, 'NBYR-8519', 'Teh Gelas', 1000, 7, 125, '2024-10-16 07:30:05'),
(165, 'NZAP-7823', 'Roti Aoka', 5000, 8, 125, '2024-10-16 07:30:10'),
(166, 'SFZP-6234', 'Sosis kenzler singles', 9000, 2, 125, '2024-10-16 07:30:19'),
(167, 'CDXL-0486', 'Ice cream cool orange', 2000, 5, 125, '2024-10-16 07:30:25'),
(168, 'TZAP-2914', 'Ice cream crunchy chocolate blueberry', 5000, 2, 125, '2024-10-16 07:30:31'),
(169, 'NZAP-7823', 'Roti Aoka', 5000, 12, 126, '2024-10-16 07:33:56'),
(170, 'MOVX-4501', 'Siip bite 19 gram', 11400, 10, 128, '2024-10-16 11:00:20'),
(171, 'NZAP-7823', 'Roti Aoka', 5000, 5, 128, '2024-10-16 11:00:31'),
(173, 'QIYU-9270', 'Mie sedap spicy', 2000, 3, 130, '2024-10-17 00:56:08'),
(175, 'QIYU-9270', 'Mie sedap spicy', 2000, 8, 132, '2024-10-17 00:59:16'),
(176, 'NZAP-7823', 'Roti Aoka', 5000, 8, 133, '2024-10-17 01:06:58'),
(178, 'NZAP-7823', 'Roti Aoka', 5000, 2, 134, '2024-10-17 01:09:06'),
(180, 'QIYU-9270', 'Mie sedap spicy', 2000, 3, 137, '2024-10-17 01:45:55'),
(182, '1122a', 'Ice Cream Taro ', 3000, 1, 137, '2024-10-17 01:46:18'),
(183, 'QIYU-9270', 'Mie sedap spicy', 2000, 6, 140, '2024-10-21 04:58:10'),
(186, 'TZAP-2914', 'Ice cream crunchy chocolate blueberry', 5000, 1, 141, '2024-10-21 05:27:23'),
(193, 'QIYU-9270', 'Mie sedap spicy', 2000, 3, 159, '2024-10-21 13:22:30'),
(195, 'SYRK-4802', 'Mie sedap', 2000, 1, 159, '2024-10-21 13:22:41'),
(197, 'QIYU-9270', 'Mie sedap spicy', 2000, 3, 160, '2024-10-21 13:26:18'),
(198, 'WGKD-4865', 'Teh Pucuk', 4000, 2, 162, '2024-10-21 13:33:48'),
(199, 'NBYR-8519', 'Teh Gelas', 1000, 1, 162, '2024-10-21 13:33:51'),
(200, 'SFZP-6234', 'Sosis kenzler singles', 9000, 2, 162, '2024-10-21 13:33:56'),
(201, 'TZAP-2914', 'Ice cream crunchy chocolate blueberry', 5000, 1, 162, '2024-10-21 13:34:01'),
(202, 'QIYU-9270', 'Mie sedap spicy', 2000, 1, 166, '2024-10-22 14:29:24'),
(203, 'NZAP-7823', 'Roti Aoka', 5000, 9, 166, '2024-10-22 14:29:28'),
(204, 'WGKD-4865', 'Teh Pucuk', 4000, 5, 167, '2024-10-23 02:23:07'),
(205, 'VFTR-1206', 'Ice Cream Cup Coklat', 5000, 1, 167, '2024-10-23 02:23:12'),
(206, 'NZAP-7823', 'Roti Aoka', 5000, 7, 168, '2024-10-23 02:25:32'),
(207, 'QIYU-9270', 'Mie sedap spicy', 2000, 5, 67185, '2024-10-23 02:28:09'),
(208, 'WGKD-4865', 'Teh Pucuk', 4000, 1, 67185, '2024-10-23 02:28:13'),
(209, 'WGKD-4865', 'Teh Pucuk', 4000, 7, 172, '2024-10-23 02:30:03'),
(210, 'QIYU-9270', 'Mie sedap spicy', 2000, 7, 174, '2024-10-23 02:32:10'),
(211, 'QIYU-9270', 'Mie sedap spicy', 2000, 12, 2147483647, '2024-10-23 02:32:59'),
(212, 'QIYU-9270', 'Mie sedap spicy', 2000, 9, 2147483647, '2024-10-23 02:33:07'),
(214, 'QIYU-9270', 'Mie sedap spicy', 2000, 11, 177, '2024-10-23 02:35:20'),
(216, 'WGKD-4865', 'Teh Pucuk', 4000, 5, 192, '2024-10-23 09:43:29'),
(217, 'QIYU-9270', 'Mie sedap spicy', 2000, 1, 192, '2024-10-23 09:43:36'),
(218, 'QIYU-9270', 'Mie sedap spicy', 2000, 9, 198, '2024-10-23 09:57:45'),
(219, 'WGKD-4865', 'Teh Pucuk', 4000, 1, 198, '2024-10-23 09:57:48'),
(220, 'QUBL-7459', 'ice coklat', 2000, 7, 199, '2024-10-23 10:17:38'),
(221, 'PMEF-1652', 'Tissue Nice', 5000, 1, 199, '2024-10-23 10:17:48'),
(222, 'SYRK-4802', 'Mie sedap', 2000, 1, 199, '2024-10-23 10:17:51'),
(223, 'WGKD-4865', 'Teh Pucuk', 4000, 2, 199, '2024-10-23 10:17:55'),
(224, 'QIYU-9270', 'Mie sedap spicy', 2000, 2, 200, '2024-10-23 10:22:06'),
(225, 'NZAP-7823', 'Roti Aoka', 5000, 1, 200, '2024-10-23 10:22:09'),
(226, 'SYRK-4802', 'Mie sedap', 2000, 5, 202, '2024-10-24 00:02:41'),
(227, 'XBOQ-0278', 'Power f', 1000, 1, 202, '2024-10-24 00:02:55'),
(228, 'QIYU-9270', 'Mie sedap spicy', 2000, 4, 203, '2024-10-24 02:20:33'),
(229, 'NZAP-7823', 'Roti Aoka', 5000, 7, 204, '2024-11-06 23:56:37'),
(230, 'CDXL-0486', 'Ice cream cool orange', 2000, 1, 204, '2024-11-06 23:56:44'),
(231, 'GABJ-7165', 'bengbeng', 2000, 7, 204, '2024-11-06 23:56:49'),
(232, 'SFZP-6234', 'Sosis kenzler singles', 9000, 1, 204, '2024-11-06 23:56:54'),
(233, 'MOVX-4501', 'Siip bite 19 gram', 11400, 2, 204, '2024-11-06 23:56:59');

--
-- Trigger `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `update_stok_after_insert` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
    UPDATE produk
    SET stok = stok - NEW.jumlah
    WHERE kode_produk = NEW.kode_produk; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL,
  `kode_pelanggan` varchar(255) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL,
  `DibuatPada` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `kode_pelanggan`, `NamaPelanggan`, `Alamat`, `NomorTelepon`, `DibuatPada`) VALUES
(1, '', 'elok', 'pyk', '0988877', '2024-08-20 10:50:10.201389'),
(2, '', 'dini', 'leuwiseeng', '08997766', '2024-08-23 12:33:31.592445'),
(4, '', 'Aas', 'panyingkiran', '089977669', '2024-08-29 08:31:16.533730'),
(5, '', 'nabil', 'Majalengka', '09876599', '2024-09-03 02:40:40.417031'),
(6, '', 'tedi', 'Rajagaluh', '08799880', '2024-09-03 12:43:30.728479');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `PelangganID` int(11) DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`penjualan_id`, `tanggal`, `total_harga`, `bayar`, `PelangganID`, `UserID`, `Username`) VALUES
(26, '2024-09-11 14:31:22', 150000, 200000, NULL, 1, 'Yoga Eryana'),
(27, '2024-09-11 14:34:39', NULL, NULL, NULL, 0, NULL),
(28, '2024-09-11 15:19:47', NULL, NULL, NULL, 0, NULL),
(29, '2024-09-11 15:20:27', 6000, 20000, 1, 122, ''),
(30, '2024-09-11 15:20:27', NULL, NULL, NULL, 0, NULL),
(31, '2024-09-11 15:20:28', NULL, NULL, NULL, 0, NULL),
(32, '2024-09-11 15:43:32', 18000, 20000, 2, 122, ''),
(33, '2024-09-11 16:04:34', NULL, NULL, NULL, 0, NULL),
(34, '2024-09-11 16:05:22', 33000, 50000, 4, 122, ''),
(35, '2024-09-11 16:06:29', 18000, 20000, 6, 122, ''),
(36, '2024-09-11 16:10:55', 27000, 50000, 6, 122, ''),
(37, '2024-09-11 16:11:33', 12000, 20000, 4, 122, ''),
(38, '2024-09-11 16:13:38', 2000, 10000, 1, 122, ''),
(39, '2024-09-16 15:23:55', 23000, 50000, 6, 122, ''),
(40, '2024-09-16 15:51:49', NULL, NULL, NULL, 0, NULL),
(41, '2024-09-16 15:52:23', NULL, NULL, NULL, 0, NULL),
(42, '2024-09-16 15:54:50', 27000, 50000, 4, 122, ''),
(43, '2024-09-16 16:56:14', NULL, NULL, NULL, 0, NULL),
(44, '2024-09-16 16:56:36', 6000, 20000, 2, 122, ''),
(45, '2024-09-16 16:57:11', 12000, 20000, 4, 122, ''),
(46, '2024-09-16 16:57:30', 35000, 50000, 1, 122, ''),
(47, '2024-09-16 16:57:49', 6000, 20000, NULL, 122, ''),
(49, '2024-09-17 15:23:54', 19000, 20000, 2, 122, ''),
(57, '2024-09-17 16:03:17', 6000, 10000, 1, 122, ''),
(58, '2024-09-17 16:05:26', 8000, 10000, 1, 122, ''),
(59, '2024-09-17 16:05:50', 12000, 20000, 2, 122, ''),
(60, '2024-09-17 16:16:23', NULL, NULL, NULL, 0, NULL),
(61, '2024-09-17 16:16:29', 30000, 50000, 2, 122, ''),
(62, '2024-09-17 16:17:57', NULL, NULL, NULL, 0, NULL),
(63, '2024-09-17 16:18:02', 46000, 50000, 6, 122, ''),
(64, '2024-09-17 16:26:16', NULL, NULL, NULL, 0, NULL),
(65, '2024-09-18 03:42:54', NULL, NULL, NULL, 0, NULL),
(66, '2024-09-18 03:43:02', 15000, 20000, 2, 119, ' nabil'),
(67, '2024-09-18 04:36:24', 24000, 30000, 2, 122, 'elok'),
(68, '2024-09-18 04:42:07', 58000, 60000, 4, 122, 'elok'),
(69, '2024-09-18 04:43:50', NULL, NULL, NULL, 0, NULL),
(70, '2024-09-18 04:44:11', NULL, NULL, NULL, 0, NULL),
(71, '2024-09-18 04:44:35', NULL, NULL, NULL, 0, NULL),
(73, '2024-09-18 04:55:12', NULL, NULL, 2, 0, NULL),
(74, '2024-09-18 04:55:51', NULL, NULL, NULL, 0, NULL),
(75, '2024-09-18 04:59:29', NULL, NULL, NULL, 0, NULL),
(76, '2024-09-18 05:10:15', NULL, NULL, 2, 0, NULL),
(77, '2024-09-18 15:40:52', NULL, NULL, NULL, 0, NULL),
(78, '2024-09-18 15:46:28', NULL, NULL, NULL, 0, NULL),
(79, '2024-09-18 15:46:28', 18000, 20000, 7, 122, 'elok'),
(80, '2024-09-18 15:54:23', NULL, NULL, NULL, 0, NULL),
(81, '2024-09-18 16:05:34', NULL, NULL, NULL, 0, NULL),
(82, '2024-09-18 16:11:32', NULL, NULL, NULL, 0, NULL),
(83, '2024-09-18 16:43:30', NULL, NULL, NULL, 0, NULL),
(84, '2024-09-19 02:11:24', 68000, 70000, 4, 122, 'elok'),
(85, '2024-09-22 13:24:30', 42000, 50000, 2, 124, 'admin1'),
(86, '2024-09-22 13:28:33', 18000, 20000, 7, 122, 'elok'),
(87, '2024-09-22 13:30:20', 6000, 10000, 1, 122, 'elok'),
(88, '2024-09-22 18:44:42', NULL, NULL, NULL, 0, NULL),
(89, '2024-09-22 13:44:51', 12000, 20000, 1, 119, ' nabil'),
(90, '2024-09-22 13:49:18', NULL, NULL, NULL, 0, NULL),
(91, '2024-09-22 13:53:42', NULL, NULL, NULL, 0, NULL),
(92, '2024-09-22 13:53:43', 8000, 10000, 1, 119, ' nabil'),
(93, '2024-09-22 13:55:38', NULL, NULL, NULL, 0, NULL),
(94, '2024-10-02 04:05:31', NULL, NULL, NULL, 0, NULL),
(95, '2024-10-02 04:06:21', NULL, NULL, NULL, 0, NULL),
(96, '2024-10-02 04:06:44', 13000, 20000, 2, 122, 'elok'),
(97, '2024-10-02 09:38:38', 8000, 20000, 2, 122, 'elok'),
(98, '2024-10-08 08:36:15', 37000, 50000, 1, 122, 'elok'),
(99, '2024-10-08 09:23:10', NULL, NULL, 7, 0, NULL),
(100, '2024-10-08 09:26:17', NULL, NULL, NULL, 0, NULL),
(101, '2024-10-08 09:27:31', NULL, NULL, NULL, 0, NULL),
(102, '2024-10-08 09:29:52', NULL, NULL, NULL, 0, NULL),
(103, '2024-10-15 03:44:25', 18000, 20000, 1, 122, 'elok'),
(104, '2024-10-15 09:03:26', 43000, 50000, 2, 122, 'elok'),
(105, '2024-10-15 09:11:41', 22000, 30000, 1, 119, ' nabil'),
(106, '2024-10-16 02:35:59', NULL, NULL, NULL, 0, NULL),
(107, '2024-10-16 02:38:16', 13000, 20000, 1, 122, 'elok'),
(108, '2024-10-16 03:03:00', NULL, NULL, NULL, 0, NULL),
(109, '2024-10-16 03:10:25', NULL, NULL, NULL, 0, NULL),
(110, '2024-10-16 03:10:29', NULL, NULL, NULL, 0, NULL),
(111, '2024-10-16 03:11:27', NULL, NULL, NULL, 0, NULL),
(112, '2024-10-16 03:11:37', NULL, NULL, NULL, 0, NULL),
(113, '2024-10-16 03:13:24', 9000, 10000, 1, 122, 'elok'),
(114, '2024-10-16 04:39:08', NULL, NULL, NULL, 0, NULL),
(115, '2024-10-16 04:39:26', NULL, NULL, NULL, 0, NULL),
(116, '2024-10-16 04:39:49', NULL, NULL, 1, 0, NULL),
(117, '2024-10-16 04:41:29', NULL, NULL, NULL, 0, NULL),
(119, '2024-10-16 04:44:27', 30000, 50000, 1, 122, 'elok'),
(120, '2024-10-16 04:48:28', NULL, NULL, NULL, 0, NULL),
(121, '2024-10-16 04:48:38', 24000, 30000, 1, 122, 'elok'),
(122, '2024-10-16 06:59:04', NULL, NULL, NULL, 0, NULL),
(123, '2024-10-16 06:59:23', NULL, NULL, NULL, 0, NULL),
(124, '2024-10-16 07:00:01', NULL, NULL, NULL, 0, NULL),
(125, '2024-10-16 09:29:54', 91000, 100000, 4, 122, 'elok'),
(127, '2024-10-16 12:59:45', NULL, NULL, NULL, 0, NULL),
(129, '2024-10-17 02:54:41', NULL, NULL, 7, 0, NULL),
(131, '2024-10-17 02:58:01', NULL, NULL, NULL, 0, NULL),
(132, '2024-10-17 02:59:11', 16000, 20000, 2, 119, ' nabil'),
(133, '2024-10-17 03:06:53', 40000, 50000, 2, 122, 'elok'),
(134, '2024-10-17 03:09:02', 10000, 20000, 1, 122, 'elok'),
(135, '2024-10-17 03:12:07', NULL, NULL, NULL, 0, NULL),
(136, '2024-10-17 03:39:42', NULL, NULL, NULL, 0, NULL),
(137, '2024-10-17 03:45:25', 9000, 10000, 1, 130, 'elok2'),
(138, '2024-10-17 03:50:55', NULL, NULL, NULL, 0, NULL),
(139, '2024-10-20 08:47:28', NULL, NULL, NULL, 0, NULL),
(140, '2024-10-21 06:57:39', 32000, 40000, 1, 119, ' nabil'),
(141, '2024-10-21 07:26:57', 7000, 10000, 1, 122, 'elok'),
(142, '2024-10-21 07:29:43', NULL, NULL, NULL, 0, NULL),
(143, '2024-10-21 14:32:47', NULL, NULL, NULL, 0, NULL),
(144, '2024-10-21 14:39:28', NULL, NULL, NULL, 0, NULL),
(145, '2024-10-21 14:44:40', NULL, NULL, NULL, 0, NULL),
(146, '2024-10-21 14:48:03', NULL, NULL, 0, 0, NULL),
(147, '2024-10-21 14:51:22', NULL, NULL, NULL, 0, NULL),
(148, '2024-10-21 14:51:29', NULL, NULL, NULL, 0, NULL),
(149, '2024-10-21 14:51:42', NULL, NULL, NULL, 0, NULL),
(150, '2024-10-21 14:51:54', NULL, NULL, 0, 0, NULL),
(151, '2024-10-21 14:55:47', NULL, NULL, 0, 0, NULL),
(153, '2024-10-21 15:00:21', NULL, NULL, 2, 0, NULL),
(154, '2024-10-21 15:04:11', NULL, NULL, 0, 0, NULL),
(155, '2024-10-21 15:06:06', NULL, NULL, 0, 0, NULL),
(156, '2024-10-21 15:08:26', NULL, NULL, NULL, 0, NULL),
(157, '2024-10-21 15:08:54', NULL, NULL, 0, 0, NULL),
(158, '2024-10-21 15:18:20', NULL, NULL, 0, 0, NULL),
(159, '2024-10-21 15:21:34', 15000, 20000, 0, 122, 'elok'),
(160, '2024-10-21 15:26:11', 6000, 10000, 1, 122, 'elok'),
(161, '2024-10-21 15:33:35', NULL, NULL, NULL, 0, NULL),
(162, '2024-10-21 15:33:39', 32000, 50000, 0, 122, 'elok'),
(163, '2024-10-21 15:49:05', NULL, NULL, 0, 0, NULL),
(164, '2024-10-22 03:07:47', NULL, NULL, NULL, 0, NULL),
(165, '2024-10-22 05:57:58', NULL, NULL, NULL, 0, NULL),
(166, '2024-10-22 16:29:20', 47000, 50000, 0, 122, 'elok'),
(167, '2024-10-23 04:22:59', 25000, 30000, 0, 122, 'elok'),
(168, '2024-10-23 04:25:26', 35000, 40000, 1, 122, 'elok'),
(169, '2024-10-23 04:27:38', NULL, NULL, NULL, 0, NULL),
(170, '2024-10-23 04:29:31', NULL, NULL, NULL, 0, NULL),
(171, '2024-10-23 04:29:45', NULL, NULL, NULL, 0, NULL),
(172, '2024-10-23 04:29:54', 28000, 50000, 0, 122, 'elok'),
(173, '2024-10-23 04:31:57', NULL, NULL, NULL, 0, NULL),
(174, '2024-10-23 04:32:04', 14000, 20000, 0, 122, 'elok'),
(175, '2024-10-23 04:33:13', NULL, NULL, NULL, 0, NULL),
(176, '2024-10-23 04:33:52', NULL, NULL, NULL, 0, NULL),
(177, '2024-10-23 04:35:15', 22000, 30000, NULL, 122, 'elok'),
(178, '2024-10-23 10:23:55', NULL, NULL, NULL, 0, NULL),
(179, '2024-10-23 10:29:07', NULL, NULL, NULL, 0, NULL),
(180, '2024-10-23 10:32:18', NULL, NULL, NULL, 0, NULL),
(181, '2024-10-23 10:35:31', NULL, NULL, NULL, 0, NULL),
(182, '2024-10-23 10:47:04', NULL, NULL, NULL, 0, NULL),
(183, '2024-10-23 10:47:28', NULL, NULL, NULL, 0, NULL),
(184, '2024-10-23 11:37:35', NULL, NULL, NULL, 0, NULL),
(185, '2024-10-23 11:37:59', NULL, NULL, NULL, 0, NULL),
(186, '2024-10-23 11:38:44', NULL, NULL, NULL, 0, NULL),
(187, '2024-10-23 11:39:17', NULL, NULL, NULL, 0, NULL),
(188, '2024-10-23 11:39:56', NULL, NULL, NULL, 0, NULL),
(189, '2024-10-23 11:40:44', NULL, NULL, NULL, 0, NULL),
(190, '2024-10-23 11:41:25', 35000, 50000, 0, 119, ''),
(191, '2024-10-23 11:43:11', NULL, NULL, NULL, 0, NULL),
(192, '2024-10-23 11:43:25', 22000, 50000, 2, 133, 'ichika'),
(193, '2024-10-23 11:47:52', NULL, NULL, NULL, 0, NULL),
(194, '2024-10-23 11:48:31', NULL, NULL, NULL, 0, NULL),
(195, '2024-10-23 11:48:51', NULL, NULL, NULL, 0, NULL),
(196, '2024-10-23 11:50:40', NULL, NULL, NULL, 0, NULL),
(197, '2024-10-23 11:54:35', NULL, NULL, NULL, 0, NULL),
(198, '2024-10-23 11:57:35', 22000, 50000, 0, 134, 'miku'),
(199, '2024-10-23 12:17:31', 29000, 50000, 0, 135, 'tes'),
(200, '2024-10-23 12:21:59', 9000, 20000, 9, 136, 'tes'),
(201, '2024-10-23 12:24:54', NULL, NULL, NULL, 0, NULL),
(202, '2024-10-24 02:02:30', 11000, 20000, 0, 135, 'tess'),
(203, '2024-10-24 04:20:28', 8000, 10000, 0, 135, 'tess'),
(204, '2024-11-07 00:56:32', 82800, 100000, 2, 136, 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ProdukID` int(11) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `ProdukImg` varchar(200) NOT NULL,
  `kode_produk` varchar(200) NOT NULL,
  `kategori` enum('makanan','minuman','snack','perlengkapan rumah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ProdukID`, `NamaProduk`, `harga`, `stok`, `ProdukImg`, `kode_produk`, `kategori`) VALUES
(1, 'Ice Cream Taro ', 3000.00, 369, 'e36a53ac-3d32-4fa4-95ea-8e1f8ca25c0c.jpg', '1122a', 'snack'),
(7, 'Mie sedap', 2000.00, 163, '9a786f53aa40326bc300fb8ebcba1fa8.jpeg', 'SYRK-4802', 'makanan'),
(9, 'Roti Aoka', 5000.00, 270, 'images.jpeg', 'NZAP-7823', 'snack'),
(10, 'Mie sedap spicy', 2000.00, 405, '3eb6ce9087870268834019003daf0805.jpg', 'QIYU-9270', 'makanan'),
(11, 'Teh Pucuk', 4000.00, 200, 'eeac6a08-301d-401c-81f9-5085e544fec7.jpg', 'WGKD-4865', 'minuman'),
(12, 'Ice Cream Cup Coklat', 5000.00, 231, '20092989_1.jpeg', 'VFTR-1206', 'makanan'),
(13, 'bengbeng', 2000.00, 174, 'db572b217ce298e397ea8fc452302f8a.jpeg', 'GABJ-7165', 'snack'),
(14, 'Teh Gelas', 1000.00, 282, 'd5dd7f75-50a9-42d8-b72a-836ce98a2aa5.jpg', 'NBYR-8519', 'makanan'),
(15, 'Ice cream cool orange', 2000.00, 94, 'a0e118b6-3378-47d8-b0a6-c1b5bbd8e3fd.jpg', 'CDXL-0486', 'snack'),
(16, 'Power f', 1000.00, 98, '5efc0666-708b-4072-8f49-c62c2cffa134.png', 'XBOQ-0278', 'minuman'),
(17, 'Sosis kenzler singles', 9000.00, 140, 'images (1).jpeg', 'SFZP-6234', 'makanan'),
(18, 'Ice cream crunchy chocolate blueberry', 5000.00, 96, 'CrunchyChocoBlueberryprod.png', 'TZAP-2914', 'snack'),
(19, 'Siip bite 19 gram', 11400.00, 78, 'images (2).jpeg', 'MOVX-4501', 'snack'),
(20, 'Ice cream choco berry', 2000.00, 200, 'images (3).jpeg', 'JWDF-0824', 'snack'),
(21, 'ice coklat', 2000.00, 93, 'images (3).jpeg', 'QUBL-7459', 'snack'),
(22, 'Tissue Nice', 5000.00, 199, 'images (4).jpeg', 'PMEF-1652', 'perlengkapan rumah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tambah_stok`
--

CREATE TABLE `tambah_stok` (
  `tambah_id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `kode_produk` varchar(15) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tambah_stok`
--

INSERT INTO `tambah_stok` (`tambah_id`, `tanggal`, `kode_produk`, `jumlah`) VALUES
(1, '2024-01-31 08:39:02', 'M.001', 20),
(2, '2024-01-31 08:39:48', 'M.002', 10),
(3, '2024-01-31 08:41:23', 'M.003', 20),
(4, '2024-01-31 08:43:53', 'M.005', 10),
(5, '0000-00-00 00:00:00', 'M.001', 10),
(6, '0000-00-00 00:00:00', 'M.001', 50),
(7, '0000-00-00 00:00:00', 'D.002', 10),
(8, '2024-10-16 05:51:20', '1122a', 10),
(9, '2024-10-16 05:51:34', '1122a', 10),
(10, '2024-10-16 05:52:18', '1122a', 10),
(11, '2024-10-16 06:04:05', '1122a', 10),
(12, '2024-10-16 06:05:39', '1122a', 10),
(13, '2024-10-16 06:11:06', '1122a', 10),
(14, '2024-10-16 06:11:27', 'WGKD-4865', 20),
(15, '2024-10-16 06:13:47', 'SYRK-4802', 50),
(16, '2024-10-16 06:16:09', '1122a', 100),
(17, '2024-10-16 09:26:20', 'QIYU-9270', 50),
(18, '2024-10-16 12:59:29', 'MOVX-4501', 50),
(19, '2024-10-21 06:56:46', '1122a', 30),
(20, '2024-10-23 04:35:02', 'QIYU-9270', 200),
(21, '2024-10-24 02:24:46', '1122a', 80),
(22, '2024-10-24 02:25:02', 'SYRK-4802', 60),
(23, '2024-10-24 02:25:17', 'NZAP-7823', 200),
(24, '2024-10-24 02:25:34', 'QIYU-9270', 200),
(25, '2024-10-24 02:25:46', 'WGKD-4865', 100),
(26, '2024-10-24 02:28:04', 'VFTR-1206', 200),
(27, '2024-10-24 02:28:21', 'GABJ-7165', 100),
(28, '2024-10-24 02:28:40', 'SFZP-6234', 100),
(29, '2024-10-24 04:20:02', 'WGKD-4865', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` varchar(200) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`, `level`) VALUES
(114, 'Aas', '02bb526de8643b5822091f3a64801e4df6293bfc', 'aas@mail.com', 'Aas Rosmanah', 'Majalengka', 'petugas'),
(116, ' dini', 'e4fc76c0cfb2e65260a64b73d07bfa56462edf01', 'petugas2@mail.com', 'dini', 'leuwiseeng', 'petugas'),
(119, ' nabil', '$2y$10$DxWRWNiS5vTVHbj/Z9rk5uMV5pmnghkXNFC77Z691YKttrAop.eB.', 'petugas4@mail.com', 'nabil', 'leuwiseeng', 'petugas'),
(121, 'dini', '$2y$10$SyuBD86AA9LjCt2TS0mTHOYabe0ZOIw9eSzCkvG3tTCRjV6c8PSC6', 'dini2@mail.com', 'dini', 'leuwiseeng', 'admin'),
(122, 'elok', '$2y$10$OrcInoMdQcdo3Y8GPF47.ObQlIMS4mksL6DXPyYSyXDJqgu1sF8Da', 'elokadmin@mail.com', 'elok cantas', 'panyingkiran', 'admin'),
(124, 'admin1', '$2y$10$aGP.xKmG3LpKG5Wv9ftone7os.oqFFtuTRyxm9G5Qx17NfGDzuSmC', 'admin1@mail.com', 'admin1', 'bogor', 'admin'),
(125, 'petugas1', '$2y$10$ln2aN083W8MDtCEDuCponOacoxQoZ2zkhWfPNWE1qIkG3WlTXv4FO', 'petugas1@mail.com', 'petugas1', 'bandung', 'petugas'),
(126, ' petugas2', '$2y$10$CX5uvFshrmeQXr6H3XZ7gOarsUkLyzPPrM9KrZlRdSylf8nkLCXg.', 'petugas2@gmail.com', 'petugas2', 'panyingkiran', 'petugas'),
(127, 'petugas3', '$2y$10$o9TPAsSP9Jk80V2bintsEOojMZfKJpYz3mqErQunuo1EgupI.woS2', 'petugas3@mail.com', 'petugas3', 'leuwiseeng', 'admin'),
(128, 'petugas5', '$2y$10$38U5RBHk9MLyKB76dsQ1hePJ3Qyn2i9tYlERFT1stubGjHfzE8R/a', 'petugas5@mail.com', 'petugas5', 'Majalengka', 'petugas'),
(129, 'tedi', '$2y$10$CShX89eGC6MDxrvtBSkMY.L3rWUCHZZtR7jVqyM3vSHHZNmICW/fy', 'tedi@mail', 'tedi', 'Majalengka', 'admin'),
(130, 'elok2', '$2y$10$mFQDIGLHQ5qk9eqhvEX/ZOySRgYrEOkCC84R1hW.hK90OZZ3PZmy2', 'elok2@mail', 'elok', 'pyk', 'admin'),
(131, ' layla', '$2y$10$OvLtlhSFudxBqn1XI1HtX.1xi66vCE75G8ku2UQHdF1uUqFZCZB5O', 'layla@mail.com', 'laylatul', 'Majalengka', 'petugas'),
(132, 'miya', '$2y$10$8eM5lUU4ZS27X3I5RbNMt.AQCZECJaeRdEBu1VvOLpmi94X3.4SCC', 'miya@mail.com', 'miyalah', 'panyingkiran', 'petugas'),
(133, 'ichika', '$2y$10$jK6gra5j3o8AFdE6VcJ2Qef/SFf5noUSzPI30Rx7pSxq0XmzmwZQW', 'ichika@mail.com', 'ichika', 'panyingkiran', 'admin'),
(134, 'miku', '$2y$10$S14JkSdQFx/k5LKoU44cwezLOPCtyRniS4H8DarCOvApaAIazFlW.', 'miku@mail.com', 'miku', 'panyingkiran', 'petugas'),
(135, 'tess', '$2y$10$IP1qV5ZJJPd7jqWFuR0VPO4gzuwS59dyBqvYDCSUl1tfCUqbHwTpO', 'tesadmin@mail.com', 'tes', 'panyingkiran', 'admin'),
(136, 'tes', '$2y$10$E/PxYgiArMDl5zVGtiPyku3pE50HYxaIGHzxEQF2eFz5ys8Dm5zk.', 'tespetugas@mail.com', 'tes', 'panyingkiran', 'petugas'),
(137, ' tes2', '$2y$10$Hcl2GSwUGbyxVP9Q5dve5ua/EZxaHztBmbw.EGJpN0lUdqrWv2csK', 'tespetugas2@mail.com', 'tes2', 'Majalengka', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualan_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProdukID`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `tambah_stok`
--
ALTER TABLE `tambah_stok`
  ADD PRIMARY KEY (`tambah_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `ProdukID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tambah_stok`
--
ALTER TABLE `tambah_stok`
  MODIFY `tambah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
