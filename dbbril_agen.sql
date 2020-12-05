-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 11:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbril_agen`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbo_agen`
--

CREATE TABLE `dbo_agen` (
  `id` int(11) NOT NULL,
  `no_lisensi` varchar(128) DEFAULT NULL,
  `nama_agen` varchar(128) DEFAULT NULL,
  `id_agen_level` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `status_tgl` date NOT NULL,
  `wilayah_kerja` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbo_agen`
--

INSERT INTO `dbo_agen` (`id`, `no_lisensi`, `nama_agen`, `id_agen_level`, `status`, `status_tgl`, `wilayah_kerja`) VALUES
(1, '1001', 'SITI', 1, 1, '0000-00-00', 'JAKARTA'),
(2, '1003', 'SARIOH', 3, 1, '0000-00-00', 'JAKARTA'),
(3, '1004', 'TIKNO', 4, 1, '0000-00-00', 'JAKARTA'),
(4, '1002', 'LUKMAN', 2, 0, '0000-00-00', 'JAKARTA'),
(5, '1005', 'SUGIMIN', 2, 1, '0000-00-00', 'JAKARTA'),
(6, '3001', 'TITIS', 4, 1, '0000-00-00', 'YOGYAKARTA'),
(7, '3003', 'MULYADI', 3, 1, '0000-00-00', 'YOGYAKARTA'),
(8, '3004', 'JUMINI', 2, 1, '0000-00-00', 'YOGYAKARTA'),
(9, '3002', 'JOKO', 1, 1, '0000-00-00', 'YOGYAKARTA'),
(10, '2001', 'JATMIKO', 4, 1, '0000-00-00', 'PONTIANAK'),
(11, '2002', 'JAMILAH', 3, 1, '0000-00-00', 'PONTIANAK'),
(12, '2003', 'SULAIMAN', 2, 1, '0000-00-00', 'PONTIANAK'),
(13, '2004', 'BEKTI', 1, 1, '0000-00-00', 'PONTIANAK');

-- --------------------------------------------------------

--
-- Table structure for table `dbo_agen_level`
--

CREATE TABLE `dbo_agen_level` (
  `id` int(11) NOT NULL,
  `level` varchar(128) NOT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbo_agen_level`
--

INSERT INTO `dbo_agen_level` (`id`, `level`, `keterangan`, `urutan`) VALUES
(1, 'FU', 'Field Underwriter', 4),
(2, 'UM', 'Unit Manajer', 1),
(3, 'SM', 'Sales Manajer', 2),
(4, 'RM', 'Regional Manajer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dbo_agen_struktur`
--

CREATE TABLE `dbo_agen_struktur` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `id_agen` int(11) NOT NULL,
  `berlaku_mulai` date NOT NULL,
  `berlaku_akhir` date NOT NULL,
  `status` int(11) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbo_agen`
--
ALTER TABLE `dbo_agen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agen_level` (`id_agen_level`);

--
-- Indexes for table `dbo_agen_level`
--
ALTER TABLE `dbo_agen_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbo_agen_struktur`
--
ALTER TABLE `dbo_agen_struktur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agen` (`id_agen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbo_agen`
--
ALTER TABLE `dbo_agen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dbo_agen_level`
--
ALTER TABLE `dbo_agen_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dbo_agen_struktur`
--
ALTER TABLE `dbo_agen_struktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dbo_agen`
--
ALTER TABLE `dbo_agen`
  ADD CONSTRAINT `dbo_agen_ibfk_1` FOREIGN KEY (`id_agen_level`) REFERENCES `dbo_agen_level` (`id`);

--
-- Constraints for table `dbo_agen_struktur`
--
ALTER TABLE `dbo_agen_struktur`
  ADD CONSTRAINT `dbo_agen_struktur_ibfk_1` FOREIGN KEY (`id_agen`) REFERENCES `dbo_agen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
