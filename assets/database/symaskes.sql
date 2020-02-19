-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 05:39 PM
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
-- Table structure for table `detailproses`
--

CREATE TABLE `detailproses` (
  `id` int(11) NOT NULL,
  `pasienproses_id` int(4) NOT NULL,
  `tinggi_badan` int(4) NOT NULL,
  `berat_badan` int(4) NOT NULL,
  `tensi` char(10) NOT NULL,
  `suhu` int(4) NOT NULL,
  `diagnosa` text,
  `tindakan` char(20) NOT NULL,
  `resep` varchar(225) NOT NULL,
  `dokter` char(20) NOT NULL,
  `status_kasir` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailproses`
--

INSERT INTO `detailproses` (`id`, `pasienproses_id`, `tinggi_badan`, `berat_badan`, `tensi`, `suhu`, `diagnosa`, `tindakan`, `resep`, `dokter`, `status_kasir`) VALUES
(1, 0, 165, 72, '160/30', 37, NULL, '', '', '', 0),
(2, 3, 172, 71, '160/32', 37, 'Masuk Angin', 'P3K', '', 'YUSUF HANAFI', 0),
(3, 4, 1102, 10, '100/20', 38, NULL, '', '', '', 0),
(4, 5, 175, 70, '130/80', 36, 'Salah Makan', 'P3K', 'Diapet; Enstronstop; ', 'YUSUF HANAFI', 0);

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
(1, 'P202001561', 'FEBRI', 'Perum. BCK Blok C 11 No.15 RT 03 RW 10', 'SERANG', '1989-07-07', 'Laki-laki', 2147483647, 'UMUM', 0, '', '2020-01-18', 1),
(2, 'P202001189', 'DADANG HERMAWAN', 'Perum Lebak Indah Kramatwatu RT 02 RW 08', 'CILEGON', '1986-07-02', 'Laki-laki', 877717899, 'UMUM', 0, '', '2020-01-22', 1),
(3, 'P202001949', 'ROCHMAT', 'Link. Dimana Aja Ada RT 02 RW 10', 'CILEGON', '1981-05-06', 'Laki-laki', 2147483647, 'BPJS', 1234567890, '', '2020-01-22', 1),
(4, 'P202001973', 'ZEIN MUHAMMAD RAFFI', 'Perum. BCK Blok C 11 No.15 RT 03 RW 10', 'CILEGON', '2020-01-08', 'Laki-laki', 2147483647, 'BPJS', 987654321, '', '2020-01-22', 1),
(5, 'P202002207', 'MUHAMMAD ZAHIR FATHURIZKY', 'Perum. BCK Blok C 11 No.15 RT 03 RW 10', 'SERANG', '2017-05-22', 'Laki-laki', 2147483647, 'UMUM', 0, '', '2020-02-10', 1);

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
  `status` int(1) NOT NULL COMMENT '1: Anamnesa, 2:Poli, 3:Laboraturium, 4:Apotik, 5:Kasir,',
  `catatan` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasienproses`
--

INSERT INTO `pasienproses` (`id_proses`, `nomor`, `id_pasien`, `keluhan_pasien`, `tujuan`, `status`, `catatan`, `created_date`, `updated_date`) VALUES
(1, 1, 1, 'Panas Dingin', 'UMUM', 0, NULL, '2020-01-22 17:14:33', '0000-00-00'),
(2, 2, 2, 'Kepala Sakit', 'UMUM', 0, NULL, '2020-01-22 17:14:45', '0000-00-00'),
(3, 1, 2, 'Sakit Perut, Diare', 'UMUM', 4, NULL, '2020-02-09 05:43:24', '0000-00-00'),
(4, 1, 5, 'Demam', 'KIA', 2, NULL, '2020-02-10 16:47:34', '0000-00-00'),
(5, 1, 1, 'Diare Sudah 3 Hari', 'UMUM', 4, 'Diminumkan obat 3x sehari', '2020-02-19 08:26:19', '0000-00-00');

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
(4, 'yusuf', 'YUSUF HANAFI', 'yusuf7789@gmail.com', '9850ed5f68693a133df799fb94209db3', 8, '0999999', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailproses`
--
ALTER TABLE `detailproses`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `detailproses`
--
ALTER TABLE `detailproses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasienproses`
--
ALTER TABLE `pasienproses`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
