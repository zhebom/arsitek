-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2023 at 09:42 AM
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
(1, 'ruangteksi', '$2y$10$DscP3U2/9tYz5IKncpiDpOVCV1wr01zrIICCmwMAwYnp6/NMfLoYm', 'Admin Ruang Teksi', 1, '2023-07-17 14:30:03', '0000-00-00 00:00:00');

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
(1, 'Autocad September 2023 Batch 3', 'Autocad-September-2023-Batch-3', 25, 0, '', 'Alny (2).png', '2023-07-10', '2023-07-08', '2023-07-02 07:35:38', '0000-00-00 00:00:00'),
(2, 'Autocad September 2023 Batch 4', 'Autocad-September-2023-Batch-4', 100, 0, '', 'Pembagian Kelompok SKPI.png', '2023-07-23', '2023-07-20', '2023-07-07 17:16:40', '0000-00-00 00:00:00'),
(4, 'Sketch Up Training', 'Sketch-Up-Training', 25, 0, 'Trasa Co-Working Space', 'coworking space_1.jpeg', '2023-07-23', '2023-07-22', '2023-07-10 07:17:57', '0000-00-00 00:00:00'),
(5, 'Sketch Up Training 2', 'Sketch-Up-Training-2', 100, 50000, 'Trasa Co-Working Space', 'RPL Akuntnasi & Akuntansi_1.png', '2023-07-27', '2023-07-24', '2023-07-12 10:01:03', '0000-00-00 00:00:00');

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
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `id_user`, `id_pelatihan`, `biaya_pelatihan`, `total_pesanan`, `kode_pesanan`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 50000, 1, '1689771261', '0000-00-00 00:00:00', '2023-07-19 12:54:21'),
(2, 1, 5, 50000, 1, '1689771863', '0000-00-00 00:00:00', '2023-07-19 13:04:23'),
(3, 2, 5, 50000, 1, '1690010482', '0000-00-00 00:00:00', '2023-07-22 07:21:22');

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
(2, 'admin2@ruangteksi.com', '$2y$10$MkBqljL9BLBkhf9t14cure8oWUW3o5tS39PCWc858mUImcUc3kms6', 'Widhi', '', 2, '2023-07-22', '0000-00-00 00:00:00');

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
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
