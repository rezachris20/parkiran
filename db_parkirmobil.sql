-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 06:25 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parkirmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_brandmobil`
--

CREATE TABLE `tb_brandmobil` (
  `id` int(11) NOT NULL,
  `nama_brandmobil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_brandmobil`
--

INSERT INTO `tb_brandmobil` (`id`, `nama_brandmobil`) VALUES
(1, 'Honda'),
(2, 'Toyota'),
(3, 'Mitsubishi'),
(4, 'Suzuki'),
(5, 'Daihatsu'),
(6, 'Datsun');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merkmobil`
--

CREATE TABLE `tb_merkmobil` (
  `id_merkmobil` int(11) NOT NULL,
  `nama_merkmobil` varchar(50) NOT NULL,
  `id_brandmobil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_merkmobil`
--

INSERT INTO `tb_merkmobil` (`id_merkmobil`, `nama_merkmobil`, `id_brandmobil`) VALUES
(1, 'MOBILIO', 1),
(2, 'JAZZ', 1),
(3, 'CRV', 1),
(4, 'BRV', 1),
(5, 'HRV', 1),
(6, 'BRIO', 1),
(7, 'CIVIC', 1),
(8, 'ACCORD', 1),
(16, 'CAMRY', 2),
(17, 'COROLLA', 2),
(18, 'VIOS', 2),
(19, 'YARIS', 2),
(20, 'ELTIOS', 2),
(21, 'AGYA', 2),
(22, 'ALPHARD', 2),
(23, 'INNOVA', 2),
(24, 'AVANZA', 2),
(25, 'FORTUNER', 2),
(26, 'RUSH', 2),
(27, 'CALYA', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_parkir`
--

CREATE TABLE `tb_parkir` (
  `id_parkir` int(11) NOT NULL,
  `kode_pelanggan` varchar(255) NOT NULL,
  `masuk` datetime NOT NULL,
  `keluar` datetime NOT NULL,
  `lama_parkir` varchar(50) NOT NULL,
  `bayar` varchar(50) NOT NULL,
  `uang_bayar` varchar(50) NOT NULL,
  `kembali` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_parkir`
--

INSERT INTO `tb_parkir` (`id_parkir`, `kode_pelanggan`, `masuk`, `keluar`, `lama_parkir`, `bayar`, `uang_bayar`, `kembali`) VALUES
(1, '816452079', '2018-12-04 21:25:46', '2018-12-05 21:26:16', '24', '20000', '20000', '0'),
(2, '816452079', '2018-12-05 21:29:14', '2018-12-05 21:29:53', '0', '2000', '2000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `hp_pelanggan` varchar(50) NOT NULL,
  `brand_mobil` varchar(50) NOT NULL,
  `merk_mobil` varchar(50) NOT NULL,
  `plat_mobil` varchar(50) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `kode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `hp_pelanggan`, `brand_mobil`, `merk_mobil`, `plat_mobil`, `qr_code`, `kode`) VALUES
(1, 'Reza Chrismardianto', 'Bojong Depok Baru Jl.Beo 4 Blok BB No.9', '085692381769', '2', 'INNOVA', 'B 1234 EKT', '816452079.png', '816452079');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `id_karyawan`, `foto`) VALUES
(1, 'Reza Chrismardianto', 'admin', '21232f297a57a5a743894a0e4a801fc3', '523012365', 'admin.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_brandmobil`
--
ALTER TABLE `tb_brandmobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_merkmobil`
--
ALTER TABLE `tb_merkmobil`
  ADD PRIMARY KEY (`id_merkmobil`);

--
-- Indexes for table `tb_parkir`
--
ALTER TABLE `tb_parkir`
  ADD PRIMARY KEY (`id_parkir`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_brandmobil`
--
ALTER TABLE `tb_brandmobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_merkmobil`
--
ALTER TABLE `tb_merkmobil`
  MODIFY `id_merkmobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_parkir`
--
ALTER TABLE `tb_parkir`
  MODIFY `id_parkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
