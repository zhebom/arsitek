-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 12:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsitek`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `nama`, `role`, `created_at`, `updated_at`) VALUES
(1, 'ruangteksi', '$2y$10$oWUub4BmWQzFqbhOksZMdOVihJUicJHYPjLJm.RUDNUnP0ZW..d2G', 'Admin', 1, '2023-07-26 13:09:13', '2023-07-26 13:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `pertanyaan`, `keterangan`, `updated_at`) VALUES
(3, 'Bagaimana melakukan pembayaran ?', 'Untuk melakukan pembayaran anda dapat melakukan', '2023-07-02 11:35:15'),
(4, 'Bagaimana cara melakukan pendaftaran.?', 'untuk melakukan pendaftaran anda dapat melakukan klik pada tombol pendaftaran dibawah ini.', '2023-07-09 13:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `midtrans`
--

CREATE TABLE `midtrans` (
  `id` int(11) NOT NULL,
  `server_key` varchar(255) NOT NULL,
  `client_key` varchar(255) NOT NULL,
  `snap` varchar(255) NOT NULL,
  `api` varchar(255) NOT NULL,
  `isProduction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `midtrans`
--

INSERT INTO `midtrans` (`id`, `server_key`, `client_key`, `snap`, `api`, `isProduction`) VALUES
(1, 'SB-Mid-server-cwHft3LdLPzlKt8TO-KLybjA', 'SB-Mid-client-JJL3pk99ZRMjk7_5', 'https://app.sandbox.midtrans.com/snap/v2/vtweb/', 'https://api.sandbox.midtrans.com/v2/', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id` bigint(255) NOT NULL,
  `pelatihan` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kuota` int(255) NOT NULL,
  `biaya` int(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tglpelatihan` date NOT NULL,
  `endpendaftaran` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id`, `pelatihan`, `slug`, `kuota`, `biaya`, `tempat`, `gambar`, `tglpelatihan`, `endpendaftaran`, `updated_at`, `deleted_at`) VALUES
(2, 'Autocad September 2023 Batch 4', 'Autocad-September-2023-Batch-4', 100, 25000, '', 'Pembagian Kelompok SKPI.png', '2023-07-23', '2023-07-20', '2023-07-23 15:54:12', '0000-00-00 00:00:00'),
(4, 'Sketch Up Training good', 'Sketch-Up-Training', 25, 25000, 'Trasa Co-Working Space', 'coworking space.jpeg', '2023-07-23', '2023-07-22', '2023-07-29 03:49:19', '0000-00-00 00:00:00'),
(5, 'Sketch Up Training 2', 'Sketch-Up-Training-2', 10, 50000, 'Trasa Co-Working Space', 'coworking space.jpeg', '2023-07-27', '2023-07-24', '2023-07-26 06:10:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_pelatihan` int(255) NOT NULL,
  `biaya_pelatihan` int(255) NOT NULL,
  `total_pesanan` int(255) NOT NULL,
  `kode_pesanan` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `id_user`, `id_pelatihan`, `biaya_pelatihan`, `total_pesanan`, `kode_pesanan`, `token`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 50000, 1, '1689771261', '', '0000-00-00 00:00:00', '2023-07-19 12:54:21'),
(2, 1, 5, 50000, 1, '1689771863', '', '0000-00-00 00:00:00', '2023-07-19 13:04:23'),
(3, 2, 5, 50000, 1, '1690010482', '', '0000-00-00 00:00:00', '2023-07-22 07:21:22'),
(4, 2, 1, 0, 1, '1690127614', '', '0000-00-00 00:00:00', '2023-07-23 15:53:34'),
(5, 2, 2, 25000, 1, '1690127695', '', '0000-00-00 00:00:00', '2023-07-23 15:54:55'),
(6, 2, 5, 50000, 1, '1690129491', '8dfeb679-44c1-4320-938b-6f277017ed7c', '0000-00-00 00:00:00', '2023-07-23 16:24:51'),
(7, 2, 5, 50000, 1, '1690129664', 'fa652b7d-12a4-4a50-800e-55210681fb8d', '0000-00-00 00:00:00', '2023-07-23 16:27:44'),
(8, 2, 5, 50000, 2, '1690131570', '005b9586-141c-4253-8010-f388a98a0163', '0000-00-00 00:00:00', '2023-07-23 16:59:31'),
(9, 1, 2, 25000, 1, '1690384077', '9f88f658-1f35-4fad-ae9a-b5c0f7e7c61b', '0000-00-00 00:00:00', '2023-07-26 15:07:59'),
(10, 2, 2, 25000, 1, '1690626896', '114ce92a-0d46-4fbd-af57-19d4ed3f755d', '0000-00-00 00:00:00', '2023-07-29 10:34:59'),
(11, 2, 5, 50000, 1, '1690627065', '254b2571-304e-4752-801b-55ea7e41658e', '0000-00-00 00:00:00', '2023-07-29 10:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `situs`
--

CREATE TABLE `situs` (
  `id_situs` int(255) NOT NULL,
  `judul_situs` varchar(255) NOT NULL,
  `desc_situs` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `situs`
--

INSERT INTO `situs` (`id_situs`, `judul_situs`, `desc_situs`, `alamat`, `updated_at`, `deleted_at`) VALUES
(0, 'Ruang Belajar Teksi', 'Merupakan perushaan yang bergerak di bidang pelatihan teknik sipil dalam bidang perancangan, dan pembuatan design.', 'Jl. Nanas No 7', '2023-07-10 06:53:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sosmed`
--

INSERT INTO `sosmed` (`id`, `nama`, `link`, `logo`, `updated_at`, `deleted_at`) VALUES
(4, 'Ruang Teksi', 'https://youtube.com/widhiawan.agung', 'download (1).png', '2023-07-26 07:54:36', '0000-00-00 00:00:00'),
(5, 'Architect Hub', 'https://facebook.com', 'SEMNAS 2023 (1).png', '2023-07-26 07:53:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(25) NOT NULL,
  `role` int(10) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `nama`, `no_ktp`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin@ruangteksi.com', 'cc6b6fc05e689a3e5000269f8712e1c9', 'Admin Punya', '', 2, '2023-07-22', '0000-00-00 00:00:00'),
(2, 'admin2@ruangteksi.com', '$2y$10$6Pp6oQ6Rr1WDOxmSUstH6ey3LR/16FZgecMUWQYVTby1.w6FXFQFi', 'Widhiawan Agung K', '082136505440', 2, '2023-07-22', '2023-07-24 13:41:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `midtrans`
--
ALTER TABLE `midtrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `situs`
--
ALTER TABLE `situs`
  ADD PRIMARY KEY (`id_situs`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `midtrans`
--
ALTER TABLE `midtrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
