-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2018 at 08:09 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bpom`
--

-- --------------------------------------------------------

--
-- Table structure for table `thasilpemeriksaan`
--

CREATE TABLE `thasilpemeriksaan` (
  `idhasilpemeriksaan` int(11) NOT NULL,
  `idpemeriksaan` int(11) NOT NULL,
  `idsarana` int(11) NOT NULL,
  `hasil` varchar(50) NOT NULL,
  `Keterangan` varchar(50) NOT NULL,
  `tglinput` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thasilpemeriksaan`
--

INSERT INTO `thasilpemeriksaan` (`idhasilpemeriksaan`, `idpemeriksaan`, `idsarana`, `hasil`, `Keterangan`, `tglinput`) VALUES
(1, 4, 1, 'MK', 'OOOHHH', '2018-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `tjabatan`
--

CREATE TABLE `tjabatan` (
  `idjabatan` int(11) NOT NULL,
  `namajabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tjabatan`
--

INSERT INTO `tjabatan` (`idjabatan`, `namajabatan`) VALUES
(1, 'ADMIN'),
(2, 'PIMPINAN'),
(3, 'STAFF');

-- --------------------------------------------------------

--
-- Table structure for table `tjenissarana`
--

CREATE TABLE `tjenissarana` (
  `idjenissarana` int(11) NOT NULL,
  `namajenissarana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tjenissarana`
--

INSERT INTO `tjenissarana` (`idjenissarana`, `namajenissarana`) VALUES
(2, 'GUDANG FARMASI'),
(3, 'RUMAH SAKIT'),
(4, 'PUSKESMAS'),
(5, 'KLINIK');

-- --------------------------------------------------------

--
-- Table structure for table `tkabkota`
--

CREATE TABLE `tkabkota` (
  `idkabkota` int(11) NOT NULL,
  `namakabkota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkabkota`
--

INSERT INTO `tkabkota` (`idkabkota`, `namakabkota`) VALUES
(1, 'Kabupaten Agam'),
(2, 'Kabupaten Dharmasraya'),
(3, 'Kabupaten Kepulauan Mentawai	'),
(4, 'Kabupaten Lima Puluh Kota'),
(5, 'Kabupaten Padang Pariaman'),
(6, 'Kabupaten Pasaman'),
(7, 'Kabupaten Pasaman Barat'),
(8, 'Kabupaten Pesisir Selatan'),
(9, 'Kabupaten Sijunjung'),
(10, 'Kabupaten Solok'),
(11, 'Kabupaten Solok Selatan'),
(12, 'Kabupaten Tanah Datar'),
(13, 'Kota Bukittinggi'),
(14, 'Kota Padang'),
(15, 'Kota Padangpanjang'),
(16, 'Kota Pariaman'),
(17, 'Kota Payakumbuh'),
(18, 'Kota Sawahlunto'),
(19, 'Kota Solok');

-- --------------------------------------------------------

--
-- Table structure for table `tkegiatan`
--

CREATE TABLE `tkegiatan` (
  `idkegiatan` int(11) NOT NULL,
  `namakegiatan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkegiatan`
--

INSERT INTO `tkegiatan` (`idkegiatan`, `namakegiatan`, `keterangan`) VALUES
(1, 'PEMERIKSAAN SARANA PELAYANAN FARMASI', 'TEST'),
(2, 'Pemeriksaan Sarana Pelayanan Distribusi', '-'),
(3, 'Pemeriksaan Sarana Pelayanan Produksi', '-'),
(6, 'RAXIA', 'OOOHHH');

-- --------------------------------------------------------

--
-- Table structure for table `tpemeriksaan`
--

CREATE TABLE `tpemeriksaan` (
  `idpemeriksaan` int(11) NOT NULL,
  `nosurattugas` varchar(30) NOT NULL,
  `idkegiatan` int(11) NOT NULL,
  `tglpemeriksaan` date NOT NULL,
  `idkabkota` int(11) NOT NULL,
  `tglsurattugas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpemeriksaan`
--

INSERT INTO `tpemeriksaan` (`idpemeriksaan`, `nosurattugas`, `idkegiatan`, `tglpemeriksaan`, `idkabkota`, `tglsurattugas`) VALUES
(4, 'X/IX/172/2018', 2, '2018-09-19', 19, '2018-09-03'),
(5, 'XCC/VV/213', 1, '2018-09-12', 13, '2018-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `tpetugaspemeriksa`
--

CREATE TABLE `tpetugaspemeriksa` (
  `idpetugaspemeriksa` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpemeriksaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpetugaspemeriksa`
--

INSERT INTO `tpetugaspemeriksa` (`idpetugaspemeriksa`, `iduser`, `idpemeriksaan`) VALUES
(10, 1, 4),
(11, 3, 4),
(12, 10, 4),
(13, 11, 4),
(14, 1, 5),
(15, 3, 5),
(16, 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tsarana`
--

CREATE TABLE `tsarana` (
  `idsarana` int(11) NOT NULL,
  `namasarana` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `namapemilik` varchar(50) NOT NULL,
  `idkabkota` int(11) NOT NULL,
  `idjenissarana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsarana`
--

INSERT INTO `tsarana` (`idsarana`, `namasarana`, `alamat`, `namapemilik`, `idkabkota`, `idjenissarana`) VALUES
(1, 'RUMAH SAKIT SEMEN PADANG', 'jalan xxx', 'PT.SEMENINDONESIA', 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `iduser` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idjabatan` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`iduser`, `nip`, `nama`, `email`, `idjabatan`, `username`, `password`, `status`) VALUES
(1, '131400012', 'FITRI ANTONI', 'fitriantoni08@gmail.com', 1, '131400012', '202cb962ac59075b964b07152d234b70', 1),
(3, '1234567', 'UCUP', 'david.dpkd@gmail.com', 2, 'UCUP', '3FC7F3EF71444CDBE27696757B4FD7ED', 1),
(10, '32122', 'DODITA', 'phinix54@yahoo.com', 3, 'dodit', '283e120c52156ac255c15364c0dc6d97', 1),
(11, '32123', 'DEDEH', 'filmgudang910@gmail.com', 3, 'dedeh', 'be15f8788624b3f618a6fa7b296cc709', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `t_bantuhasil`
-- (See below for the actual view)
--
CREATE TABLE `t_bantuhasil` (
`idhasilpemeriksaan` int(11)
,`namasarana` varchar(50)
,`hasil` varchar(50)
,`tglinput` date
,`namajenissarana` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `t_bantuhasil`
--
DROP TABLE IF EXISTS `t_bantuhasil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `t_bantuhasil`  AS  select `thasilpemeriksaan`.`idhasilpemeriksaan` AS `idhasilpemeriksaan`,`tsarana`.`namasarana` AS `namasarana`,`thasilpemeriksaan`.`hasil` AS `hasil`,`thasilpemeriksaan`.`tglinput` AS `tglinput`,`tjenissarana`.`namajenissarana` AS `namajenissarana` from ((`thasilpemeriksaan` join `tsarana`) join `tjenissarana`) where ((`thasilpemeriksaan`.`idsarana` = `tsarana`.`idsarana`) and (`tsarana`.`idjenissarana` = `tjenissarana`.`idjenissarana`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thasilpemeriksaan`
--
ALTER TABLE `thasilpemeriksaan`
  ADD PRIMARY KEY (`idhasilpemeriksaan`),
  ADD KEY `idpemeriksaan` (`idpemeriksaan`),
  ADD KEY `idsarana` (`idsarana`);

--
-- Indexes for table `tjabatan`
--
ALTER TABLE `tjabatan`
  ADD PRIMARY KEY (`idjabatan`);

--
-- Indexes for table `tjenissarana`
--
ALTER TABLE `tjenissarana`
  ADD PRIMARY KEY (`idjenissarana`);

--
-- Indexes for table `tkabkota`
--
ALTER TABLE `tkabkota`
  ADD PRIMARY KEY (`idkabkota`);

--
-- Indexes for table `tkegiatan`
--
ALTER TABLE `tkegiatan`
  ADD PRIMARY KEY (`idkegiatan`);

--
-- Indexes for table `tpemeriksaan`
--
ALTER TABLE `tpemeriksaan`
  ADD PRIMARY KEY (`idpemeriksaan`),
  ADD KEY `idkegiatan` (`idkegiatan`),
  ADD KEY `idkabkota` (`idkabkota`),
  ADD KEY `tglsurattugas` (`tglsurattugas`);

--
-- Indexes for table `tpetugaspemeriksa`
--
ALTER TABLE `tpetugaspemeriksa`
  ADD PRIMARY KEY (`idpetugaspemeriksa`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idpemeriksaan` (`idpemeriksaan`);

--
-- Indexes for table `tsarana`
--
ALTER TABLE `tsarana`
  ADD PRIMARY KEY (`idsarana`),
  ADD KEY `idkabkota` (`idkabkota`),
  ADD KEY `idjenissarana` (`idjenissarana`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `idjabatan` (`idjabatan`),
  ADD KEY `idjabatan_2` (`idjabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thasilpemeriksaan`
--
ALTER TABLE `thasilpemeriksaan`
  MODIFY `idhasilpemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tjabatan`
--
ALTER TABLE `tjabatan`
  MODIFY `idjabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tjenissarana`
--
ALTER TABLE `tjenissarana`
  MODIFY `idjenissarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tkabkota`
--
ALTER TABLE `tkabkota`
  MODIFY `idkabkota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tkegiatan`
--
ALTER TABLE `tkegiatan`
  MODIFY `idkegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tpemeriksaan`
--
ALTER TABLE `tpemeriksaan`
  MODIFY `idpemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tpetugaspemeriksa`
--
ALTER TABLE `tpetugaspemeriksa`
  MODIFY `idpetugaspemeriksa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tsarana`
--
ALTER TABLE `tsarana`
  MODIFY `idsarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `thasilpemeriksaan`
--
ALTER TABLE `thasilpemeriksaan`
  ADD CONSTRAINT `thasilpemeriksaan_ibfk_1` FOREIGN KEY (`idpemeriksaan`) REFERENCES `tpemeriksaan` (`idpemeriksaan`),
  ADD CONSTRAINT `thasilpemeriksaan_ibfk_2` FOREIGN KEY (`idsarana`) REFERENCES `tsarana` (`idsarana`);

--
-- Constraints for table `tpemeriksaan`
--
ALTER TABLE `tpemeriksaan`
  ADD CONSTRAINT `tpemeriksaan_ibfk_1` FOREIGN KEY (`idkegiatan`) REFERENCES `tkegiatan` (`idkegiatan`),
  ADD CONSTRAINT `tpemeriksaan_ibfk_2` FOREIGN KEY (`idkabkota`) REFERENCES `tkabkota` (`idkabkota`);

--
-- Constraints for table `tpetugaspemeriksa`
--
ALTER TABLE `tpetugaspemeriksa`
  ADD CONSTRAINT `tpetugaspemeriksa_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tuser` (`iduser`),
  ADD CONSTRAINT `tpetugaspemeriksa_ibfk_2` FOREIGN KEY (`idpemeriksaan`) REFERENCES `tpemeriksaan` (`idpemeriksaan`);

--
-- Constraints for table `tsarana`
--
ALTER TABLE `tsarana`
  ADD CONSTRAINT `tsarana_ibfk_1` FOREIGN KEY (`idjenissarana`) REFERENCES `tjenissarana` (`idjenissarana`),
  ADD CONSTRAINT `tsarana_ibfk_2` FOREIGN KEY (`idkabkota`) REFERENCES `tkabkota` (`idkabkota`);

--
-- Constraints for table `tuser`
--
ALTER TABLE `tuser`
  ADD CONSTRAINT `tuser_ibfk_1` FOREIGN KEY (`idjabatan`) REFERENCES `tjabatan` (`idjabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
