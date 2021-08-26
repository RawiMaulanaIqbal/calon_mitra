-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 03:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calonmitra`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_mitra`
--

CREATE TABLE `calon_mitra` (
  `id_calon` int(11) NOT NULL,
  `kode_calon_mitra` varchar(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `no_hp` int(12) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `status2` varchar(100) NOT NULL,
  `status3` varchar(100) NOT NULL,
  `tindak_lanjut` varchar(225) NOT NULL,
  `janji` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_mitra`
--

INSERT INTO `calon_mitra` (`id_calon`, `kode_calon_mitra`, `tanggal`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `user`, `no_hp`, `pic`, `status`, `status2`, `status3`, `tindak_lanjut`, `janji`) VALUES
(15, '0001', '2021-08-23', 'a', 'b', 'c', 'd', 'e', 1, 'Preti Epira', 'sosialisasi', 'tertarik', 'deal', 'ab', 'ba');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin'),
(3, 'Preti Epira', '082136205769', 'Preti'),
(4, 'Hawari Putri Ningsih', '082387641301', 'Hawari'),
(5, 'M. Fikri Marjoko', '085265365388', 'Fikri'),
(6, 'Ari Saputra', '082283937382', 'Saputra'),
(7, 'Nawla Ikhtia', '081261515558', 'Nawla'),
(8, 'Shahirania Syasali', '082170811611', 'Shahirania');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_mitra`
--
ALTER TABLE `calon_mitra`
  ADD PRIMARY KEY (`id_calon`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_mitra`
--
ALTER TABLE `calon_mitra`
  MODIFY `id_calon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
