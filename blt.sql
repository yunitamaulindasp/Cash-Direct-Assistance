-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 05:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blt`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `idpenerima` int(11) NOT NULL,
  `idkriteria` int(11) NOT NULL,
  `idsubkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`idpenerima`, `idkriteria`, `idsubkriteria`) VALUES
(1, 1, 1),
(1, 2, 6),
(1, 12, 7),
(1, 13, 8),
(1, 14, 9),
(1, 15, 10),
(1, 16, 27),
(2, 1, 1),
(2, 2, 17),
(2, 12, 7),
(2, 13, 8),
(2, 14, 19),
(2, 15, 25),
(2, 16, 11),
(3, 1, 12),
(3, 2, 6),
(3, 12, 7),
(3, 13, 8),
(3, 14, 21),
(3, 15, 10),
(3, 16, 11),
(5, 1, 5),
(5, 2, 17),
(5, 12, 14),
(5, 13, 8),
(5, 14, 21),
(5, 15, 10),
(5, 16, 11),
(4, 1, 0),
(4, 2, 0),
(4, 12, 0),
(4, 13, 0),
(4, 14, 0),
(4, 15, 0),
(4, 16, 0),
(5, 1, 5),
(5, 2, 17),
(5, 12, 14),
(5, 13, 8),
(5, 14, 21),
(5, 15, 10),
(5, 16, 11),
(5, 1, 5),
(5, 2, 17),
(5, 12, 14),
(5, 13, 8),
(5, 14, 21),
(5, 15, 10),
(5, 16, 11),
(7, 1, 5),
(7, 2, 6),
(7, 12, 15),
(7, 13, 8),
(7, 14, 19),
(7, 15, 10),
(7, 16, 26);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `tipe_kriteria` enum('B','C') NOT NULL,
  `bobot_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `tipe_kriteria`, `bobot_kriteria`) VALUES
(1, 'Penghasilan', 'B', 20),
(2, 'Tanggungan', 'B', 20),
(12, 'Usia', 'B', 15),
(13, 'Kesehatan', 'B', 15),
(14, 'Pekerjaan', 'B', 15),
(15, 'Kepemilikan Rumah', 'B', 10),
(16, 'Kondisi Rumah', 'B', 5);

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `bantuan` enum('T','I') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`id_penerima`, `nama`, `alamat`, `bantuan`) VALUES
(1, 'D', 'kediri', 'T'),
(2, 'B', 'jember', 'I'),
(3, 'C', 'malang', 'T'),
(7, 'A', 'Surabaya', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_sub` int(11) NOT NULL,
  `id_kri` int(11) NOT NULL,
  `nama_sub` varchar(50) NOT NULL,
  `bobot_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_sub`, `id_kri`, `nama_sub`, `bobot_sub`) VALUES
(1, 1, 'Kurang dari 500.000', 4),
(5, 1, '500.000-1.000.000', 3),
(6, 2, 'Tidak Ada', 1),
(7, 12, 'Kurang dari 35', 1),
(8, 13, 'Sehat', 2),
(9, 14, 'Tidak Bekerja', 4),
(10, 15, 'Milik Sendiri', 2),
(11, 16, 'Dinding Sudah Dikeramik', 1),
(12, 1, '1.000.000-2.000.000', 2),
(13, 1, '2.000.000-4.000.000', 1),
(14, 12, '35-50', 2),
(15, 12, '51-60', 3),
(16, 12, 'Lebih dari 60', 4),
(17, 2, '1-2 orang', 3),
(18, 2, 'Lebih dari 2 orang', 4),
(19, 14, 'Buruh', 3),
(20, 14, 'Petani', 2),
(21, 14, 'Wiraswasta/swasta', 1),
(22, 13, 'Sedang Sakit', 3),
(23, 13, 'Mengidap Penyakit Berbahaya', 4),
(24, 15, 'Sewa', 4),
(25, 15, 'Menumpang', 3),
(26, 16, 'Dinding Batu Bata Merah', 2),
(27, 16, 'Dinding dari Papan Kayu', 3),
(28, 16, 'Dinding dari Bambu', 4),
(29, 17, 'TEST 1', 3),
(30, 17, 'TEST 2', 2),
(31, 17, 'TEST 3', 1),
(32, 0, 'N/A', 0),
(33, 18, 'cbl1', 1),
(34, 18, 'cbl2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `status_user` enum('admin','staf') NOT NULL,
  `pass_user` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `status_user`, `pass_user`) VALUES
(3, 'admin', 'Admin', 'admin', 'adminblt'),
(4, 'Staf', 'Staf', 'staf', 'stafblt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penerima`
--
ALTER TABLE `penerima`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
