-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 04:19 PM
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
  `gambar` varchar(255) NOT NULL,
  `tglpelatihan` date NOT NULL,
  `endpendaftaran` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id`, `pelatihan`, `slug`, `kuota`, `gambar`, `tglpelatihan`, `endpendaftaran`, `updated_at`, `deleted_at`) VALUES
(1, 'Autocad September 2023 Batch 3', 'Autocad-September-2023-Batch-3', 25, 'Alny (2).png', '2023-07-10', '2023-07-08', '2023-07-02 07:35:38', '0000-00-00 00:00:00'),
(2, 'Autocad September 2023 Batch 4', 'Autocad-September-2023-Batch-4', 100, 'Pembagian Kelompok SKPI.png', '2023-07-23', '2023-07-20', '2023-07-07 17:16:40', '0000-00-00 00:00:00');

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
(0, 'Architect Hub', 'Merupakan perushaan yang bergerak di bidang pelatihan teknik sipil dalam bidang perancangan, dan pembuatan design.', 'Jl. Nanas No 7', '2023-07-07 16:15:08', '0000-00-00 00:00:00');

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
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
