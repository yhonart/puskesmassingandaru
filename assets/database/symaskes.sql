-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 06:14 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symaskes`
--

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `noreg` varchar(10) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `kotalahir` varchar(50) DEFAULT NULL,
  `tgllahir` char(20) NOT NULL,
  `jeniskelamin` char(10) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `kepesertaan` varchar(10) DEFAULT NULL,
  `nobpjs` int(20) DEFAULT NULL,
  `remarks` text,
  `created_date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `noreg`, `nama`, `alamat`, `kotalahir`, `tgllahir`, `jeniskelamin`, `no_telp`, `kepesertaan`, `nobpjs`, `remarks`, `created_date`, `status`) VALUES
(1, 'P202001561', 'FEBRI', 'Perum. BCK Blok C 11 No.15 RT 03 RW 10', 'SERANG', '07/07/1989', 'Laki-laki', 2147483647, 'UMUM', 0, '', '2020-01-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasienproses`
--

CREATE TABLE `pasienproses` (
  `id_proses` int(11) NOT NULL,
  `nomor` int(4) DEFAULT NULL,
  `id_pasien` int(4) NOT NULL,
  `keluhan_pasien` text NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1 Poli 11 Lab 2 Apotik 3 Kasir 4 Selesai',
  `diagnosa` text,
  `tindakan_dokter` text,
  `resep` varchar(225) DEFAULT NULL,
  `an_dokter` varchar(100) DEFAULT NULL,
  `hasil_lab` text,
  `catatan` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasienproses`
--

INSERT INTO `pasienproses` (`id_proses`, `nomor`, `id_pasien`, `keluhan_pasien`, `tujuan`, `status`, `diagnosa`, `tindakan_dokter`, `resep`, `an_dokter`, `hasil_lab`, `catatan`, `created_date`, `updated_date`) VALUES
(1, 1, 1, 'Panas Dingin', 'UMUM', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-12 16:25:36', '0000-00-00'),
(2, 2, 2, 'Kepala Sakit', 'UMUM', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-12 16:26:03', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `paymenconfig`
--

CREATE TABLE `paymenconfig` (
  `id_conf` int(11) NOT NULL,
  `name_payment` varchar(100) NOT NULL,
  `nominal` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` date NOT NULL,
  `status` int(2) NOT NULL,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_acc`
--

CREATE TABLE `users_acc` (
  `IDUSERS` int(11) NOT NULL,
  `USERNAME` varchar(15) NOT NULL,
  `FULLNAME` varchar(100) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `HAKACC` int(2) NOT NULL COMMENT '1:Administrator 2:Pendaftaran 3:umum 4:lansia 5:gigi 6:mtbs 7:kia 8:apotik 9:lab 10:kasir',
  `NIP` varchar(50) NOT NULL,
  `STATUS` int(1) NOT NULL COMMENT '0 Tidak Aktif 1 Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_acc`
--

INSERT INTO `users_acc` (`IDUSERS`, `USERNAME`, `FULLNAME`, `EMAIL`, `PASSWORD`, `HAKACC`, `NIP`, `STATUS`) VALUES
(1, 'administrator', 'administrator', 'admin@symaskes.com', 'e00cf25ad42683b3df678c61f42c6bda', 1, '900001', 1),
(4, 'yusuf', 'YUSUF HANAFI', 'yusuf7789@gmail.com', '9850ed5f68693a133df799fb94209db3', 2, '0999999', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasienproses`
--
ALTER TABLE `pasienproses`
  ADD PRIMARY KEY (`id_proses`);

--
-- Indexes for table `paymenconfig`
--
ALTER TABLE `paymenconfig`
  ADD PRIMARY KEY (`id_conf`);

--
-- Indexes for table `users_acc`
--
ALTER TABLE `users_acc`
  ADD PRIMARY KEY (`IDUSERS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasienproses`
--
ALTER TABLE `pasienproses`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymenconfig`
--
ALTER TABLE `paymenconfig`
  MODIFY `id_conf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_acc`
--
ALTER TABLE `users_acc`
  MODIFY `IDUSERS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
