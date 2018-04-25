-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2014 at 07:30 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbmining`
--

-- --------------------------------------------------------

--
-- Table structure for table `atribut`
--

CREATE TABLE IF NOT EXISTS `atribut` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `atribut` varchar(100) NOT NULL,
  `nilai_atribut` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `atribut`
--

INSERT INTO `atribut` (`id`, `atribut`, `nilai_atribut`) VALUES
(1, 'total', 'total'),
(2, 'jenis_barang', 'Laptop'),
(3, 'jenis_barang', 'PC'),
(4, 'merek', 'Acer'),
(5, 'merek', 'Toshiba'),
(6, 'merek', 'Axioo'),
(7, 'tahun', '2003'),
(8, 'tahun', '2004'),
(9, 'tahun', '2005'),
(10, 'tahun', '2007'),
(11, 'tahun', '2008'),
(12, 'tahun', '2009'),
(13, 'tahun', '2010'),
(14, 'tahun', '2011'),
(15, 'harga', '7500000'),
(16, 'harga', '12000000'),
(17, 'harga', '13000000'),
(18, 'harga', '13500000'),
(19, 'harga', '9000000'),
(20, 'harga', '6500000'),
(21, 'harga', '11000000'),
(22, 'harga', '19000000'),
(23, 'harga', '15000000'),
(24, 'harga', '7000000'),
(25, 'harga', '10000000'),
(26, 'harga', '15500000');

-- --------------------------------------------------------

--
-- Table structure for table `data_survey`
--

CREATE TABLE IF NOT EXISTS `data_survey` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `data_survey`
--

INSERT INTO `data_survey` (`id`, `kode_barang`, `jenis_barang`, `merek`, `tahun`, `harga`, `status`) VALUES
(1, '3322', 'Laptop', 'Axioo', '2004', '7500000', 'Laris'),
(2, '5651', 'PC', 'Toshiba', '2009', '12000000', 'Laris'),
(3, '8819', 'PC', 'Toshiba', '2010', '13000000', 'Laris'),
(4, '1328', 'PC', 'Toshiba', '2009', '12000000', 'Laris'),
(5, '1376', 'PC', 'Axioo', '2010', '13500000', 'Laris'),
(6, '5513', 'Laptop', 'Acer', '2002', '9000000', 'Laris'),
(7, '7074', 'Laptop', 'Toshiba', '2003', '6500000', 'Tidak Laris'),
(8, '6005', 'Laptop', 'Toshiba', '2005', '12000000', 'Tidak Laris'),
(9, '1329', 'PC', 'Axioo', '2010', '13000000', 'Laris'),
(10, '6646', 'Laptop', 'Axioo', '2008', '11000000', 'Laris'),
(11, '6469', 'Laptop', 'Acer', '2011', '19000000', 'Tidak Laris'),
(12, '6336', 'PC', 'Toshiba', '2010', '13000000', 'Laris'),
(13, '1241', 'Laptop', 'Acer', '2007', '15000000', 'Tidak Laris'),
(14, '2770', 'PC', 'Toshiba', '2010', '13000000', 'Laris'),
(15, '6322', 'Laptop', 'Toshiba', '2003', '7000000', 'Tidak Laris'),
(16, '2431', 'PC', 'Toshiba', '2009', '12000000', 'Laris'),
(17, '2212', 'Laptop', 'Axioo', '2008', '11000000', 'Laris'),
(18, '1174', 'Laptop', 'Acer', '2004', '10000000', 'Laris'),
(19, '5535', 'PC', 'Axioo', '2009', '12000000', 'Laris'),
(20, '1337', 'PC', 'Toshiba', '2010', '13000000', 'Laris'),
(21, '7334', 'Laptop', 'Acer', '2004', '10000000', 'Laris'),
(22, '1244', 'Laptop', 'Axioo', '2005', '9000000', 'Laris'),
(23, '8005', 'PC', 'Toshiba', '2010', '13000000', 'Laris'),
(24, '6221', 'PC', 'Axioo', '2009', '12000000', 'Laris'),
(25, '1021', 'Laptop', 'Acer', '2007', '15500000', 'Tidak Laris');

-- --------------------------------------------------------

--
-- Table structure for table `iterasi_c45`
--

CREATE TABLE IF NOT EXISTS `iterasi_c45` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iterasi` varchar(3) NOT NULL,
  `atribut_gain_ratio_max` varchar(255) NOT NULL,
  `atribut` varchar(100) NOT NULL,
  `nilai_atribut` varchar(100) NOT NULL,
  `jml_kasus_total` varchar(5) NOT NULL,
  `jml_laris` varchar(5) NOT NULL,
  `jml_tdk_laris` varchar(5) NOT NULL,
  `entropy` varchar(10) NOT NULL,
  `inf_gain` varchar(10) NOT NULL,
  `split_info` varchar(10) NOT NULL,
  `gain_ratio` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `iterasi_c45`
--

INSERT INTO `iterasi_c45` (`id`, `iterasi`, `atribut_gain_ratio_max`, `atribut`, `nilai_atribut`, `jml_kasus_total`, `jml_laris`, `jml_tdk_laris`, `entropy`, `inf_gain`, `split_info`, `gain_ratio`) VALUES
(1, '1', 'jenis_barang', 'Total', 'Total', '25', '19', '6', '0.795', '', '', '0'),
(2, '2', 'jenis_barang', 'jenis_barang', 'Laptop', '13', '7', '6', '0.9957', '0.2772', '0.9988', '0.2775'),
(3, '3', 'jenis_barang', 'jenis_barang', 'PC', '12', '12', '0', '0', '0.2772', '0.9988', '0.2775'),
(4, '4', 'jenis_barang', 'merek', 'Acer', '6', '3', '3', '1', '0.183', '1.5413', '0.1187'),
(5, '5', 'jenis_barang', 'merek', 'Toshiba', '11', '8', '3', '0.8454', '0.183', '1.5413', '0.1187'),
(6, '6', 'jenis_barang', 'merek', 'Axioo', '8', '8', '0', '0', '0.183', '1.5413', '0.1187'),
(7, '7', 'jenis_barang', 'tahun', '2003', '2', '0', '2', '0', '0.715', '2.6975', '0.2651'),
(8, '8', 'jenis_barang', 'tahun', '2004', '3', '3', '0', '0', '0.715', '2.6975', '0.2651'),
(9, '9', 'jenis_barang', 'tahun', '2005', '2', '1', '1', '1', '0.715', '2.6975', '0.2651'),
(10, '10', 'jenis_barang', 'tahun', '2007', '2', '0', '2', '0', '0.715', '2.6975', '0.2651'),
(11, '11', 'jenis_barang', 'tahun', '2008', '2', '2', '0', '0', '0.715', '2.6975', '0.2651'),
(12, '12', 'jenis_barang', 'tahun', '2009', '5', '5', '0', '0', '0.715', '2.6975', '0.2651'),
(13, '13', 'jenis_barang', 'tahun', '2010', '7', '7', '0', '0', '0.715', '2.6975', '0.2651'),
(14, '14', 'jenis_barang', 'tahun', '2011', '1', '0', '1', '0', '0.715', '2.6975', '0.2651'),
(15, '15', 'jenis_barang', 'harga', '7500000', '1', '1', '0', '0', '0.639', '3.1631', '0.202'),
(16, '16', 'jenis_barang', 'harga', '12000000', '6', '5', '1', '0.65', '0.639', '3.1631', '0.202'),
(17, '17', 'jenis_barang', 'harga', '13000000', '6', '6', '0', '0', '0.639', '3.1631', '0.202'),
(18, '18', 'jenis_barang', 'harga', '13500000', '1', '1', '0', '0', '0.639', '3.1631', '0.202'),
(19, '19', 'jenis_barang', 'harga', '9000000', '2', '2', '0', '0', '0.639', '3.1631', '0.202'),
(20, '20', 'jenis_barang', 'harga', '6500000', '1', '0', '1', '0', '0.639', '3.1631', '0.202'),
(21, '21', 'jenis_barang', 'harga', '11000000', '2', '2', '0', '0', '0.639', '3.1631', '0.202'),
(22, '22', 'jenis_barang', 'harga', '19000000', '1', '0', '1', '0', '0.639', '3.1631', '0.202'),
(23, '23', 'jenis_barang', 'harga', '15000000', '1', '0', '1', '0', '0.639', '3.1631', '0.202'),
(24, '24', 'jenis_barang', 'harga', '7000000', '1', '0', '1', '0', '0.639', '3.1631', '0.202'),
(25, '25', 'jenis_barang', 'harga', '10000000', '2', '2', '0', '0', '0.639', '3.1631', '0.202'),
(26, '26', 'jenis_barang', 'harga', '15500000', '1', '0', '1', '0', '0.639', '3.1631', '0.202'),
(27, '1', 'merek', 'Total', 'Total', '13', '7', '6', '0.9957', '', '', '0'),
(28, '2', 'merek', 'merek', 'Acer', '6', '3', '3', '1', '0.5342', '1.5262', '0.35'),
(29, '3', 'merek', 'merek', 'Toshiba', '3', '0', '3', '0', '0.5342', '1.5262', '0.35'),
(30, '4', 'merek', 'merek', 'Axioo', '4', '4', '0', '0', '0.5342', '1.5262', '0.35'),
(31, '5', 'merek', 'tahun', '2003', '2', '0', '2', '0', '0.8419', '2.4346', '0.3458'),
(32, '6', 'merek', 'tahun', '2004', '3', '3', '0', '0', '0.8419', '2.4346', '0.3458'),
(33, '7', 'merek', 'tahun', '2005', '2', '1', '1', '1', '0.8419', '2.4346', '0.3458'),
(34, '8', 'merek', 'tahun', '2007', '2', '0', '2', '0', '0.8419', '2.4346', '0.3458'),
(35, '9', 'merek', 'tahun', '2008', '2', '2', '0', '0', '0.8419', '2.4346', '0.3458'),
(36, '10', 'merek', 'tahun', '2009', '0', '0', '0', '0', '0.8419', '2.4346', '0.3458'),
(37, '11', 'merek', 'tahun', '2010', '0', '0', '0', '0', '0.8419', '2.4346', '0.3458'),
(38, '12', 'merek', 'tahun', '2011', '1', '0', '1', '0', '0.8419', '2.4346', '0.3458'),
(39, '13', 'merek', 'harga', '7500000', '1', '1', '0', '0', '0.9957', '3.2389', '0.3074'),
(40, '14', 'merek', 'harga', '12000000', '1', '0', '1', '0', '0.9957', '3.2389', '0.3074'),
(41, '15', 'merek', 'harga', '13000000', '0', '0', '0', '0', '0.9957', '3.2389', '0.3074'),
(42, '16', 'merek', 'harga', '13500000', '0', '0', '0', '0', '0.9957', '3.2389', '0.3074'),
(43, '17', 'merek', 'harga', '9000000', '2', '2', '0', '0', '0.9957', '3.2389', '0.3074'),
(44, '18', 'merek', 'harga', '6500000', '1', '0', '1', '0', '0.9957', '3.2389', '0.3074'),
(45, '19', 'merek', 'harga', '11000000', '2', '2', '0', '0', '0.9957', '3.2389', '0.3074'),
(46, '20', 'merek', 'harga', '19000000', '1', '0', '1', '0', '0.9957', '3.2389', '0.3074'),
(47, '21', 'merek', 'harga', '15000000', '1', '0', '1', '0', '0.9957', '3.2389', '0.3074'),
(48, '22', 'merek', 'harga', '7000000', '1', '0', '1', '0', '0.9957', '3.2389', '0.3074'),
(49, '23', 'merek', 'harga', '10000000', '2', '2', '0', '0', '0.9957', '3.2389', '0.3074'),
(50, '24', 'merek', 'harga', '15500000', '1', '0', '1', '0', '0.9957', '3.2389', '0.3074'),
(51, '1', 'tahun', 'Total', 'Total', '6', '3', '3', '1', '', '', '0'),
(52, '2', 'tahun', 'tahun', '2003', '0', '0', '0', '0', '1', '1.4875', '0.6723'),
(53, '3', 'tahun', 'tahun', '2004', '2', '2', '0', '0', '1', '1.4875', '0.6723'),
(54, '4', 'tahun', 'tahun', '2005', '0', '0', '0', '0', '1', '1.4875', '0.6723'),
(55, '5', 'tahun', 'tahun', '2007', '2', '0', '2', '0', '1', '1.4875', '0.6723'),
(56, '6', 'tahun', 'tahun', '2008', '0', '0', '0', '0', '1', '1.4875', '0.6723'),
(57, '7', 'tahun', 'tahun', '2009', '0', '0', '0', '0', '1', '1.4875', '0.6723'),
(58, '8', 'tahun', 'tahun', '2010', '0', '0', '0', '0', '1', '1.4875', '0.6723'),
(59, '9', 'tahun', 'tahun', '2011', '1', '0', '1', '0', '1', '1.4875', '0.6723'),
(60, '10', 'tahun', 'harga', '7500000', '0', '0', '0', '0', '1', '2.2516', '0.4441'),
(61, '11', 'tahun', 'harga', '12000000', '0', '0', '0', '0', '1', '2.2516', '0.4441'),
(62, '12', 'tahun', 'harga', '13000000', '0', '0', '0', '0', '1', '2.2516', '0.4441'),
(63, '13', 'tahun', 'harga', '13500000', '0', '0', '0', '0', '1', '2.2516', '0.4441'),
(64, '14', 'tahun', 'harga', '9000000', '1', '1', '0', '0', '1', '2.2516', '0.4441'),
(65, '15', 'tahun', 'harga', '6500000', '0', '0', '0', '0', '1', '2.2516', '0.4441'),
(66, '16', 'tahun', 'harga', '11000000', '0', '0', '0', '0', '1', '2.2516', '0.4441'),
(67, '17', 'tahun', 'harga', '19000000', '1', '0', '1', '0', '1', '2.2516', '0.4441'),
(68, '18', 'tahun', 'harga', '15000000', '1', '0', '1', '0', '1', '2.2516', '0.4441'),
(69, '19', 'tahun', 'harga', '7000000', '0', '0', '0', '0', '1', '2.2516', '0.4441'),
(70, '20', 'tahun', 'harga', '10000000', '2', '2', '0', '0', '1', '2.2516', '0.4441'),
(71, '21', 'tahun', 'harga', '15500000', '1', '0', '1', '0', '1', '2.2516', '0.4441');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`) VALUES
('manager', '1d0258c2440a8d19e716292b231e3190', 'Manager Perusahaan', 'manager.perusahaan@yahoo.com', '081267771344', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `mining_c45`
--

CREATE TABLE IF NOT EXISTS `mining_c45` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atribut` varchar(100) NOT NULL,
  `nilai_atribut` varchar(100) NOT NULL,
  `jml_kasus_total` varchar(5) NOT NULL,
  `jml_laris` varchar(5) NOT NULL,
  `jml_tdk_laris` varchar(5) NOT NULL,
  `entropy` varchar(10) NOT NULL,
  `inf_gain` varchar(10) NOT NULL,
  `inf_gain_temp` varchar(10) NOT NULL,
  `split_info` varchar(10) NOT NULL,
  `split_info_temp` varchar(10) NOT NULL,
  `gain_ratio` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `mining_c45`
--

INSERT INTO `mining_c45` (`id`, `atribut`, `nilai_atribut`, `jml_kasus_total`, `jml_laris`, `jml_tdk_laris`, `entropy`, `inf_gain`, `inf_gain_temp`, `split_info`, `split_info_temp`, `gain_ratio`) VALUES
(1, 'Total', 'Total', '6', '3', '3', '1', '', '', '', '', '0'),
(2, 'tahun', '2003', '0', '0', '0', '0', '1', '0', '1.4875', '', '0.6723'),
(3, 'tahun', '2004', '2', '2', '0', '0', '1', '0', '1.4875', '-0.5283208', '0.6723'),
(4, 'tahun', '2005', '0', '0', '0', '0', '1', '0', '1.4875', '', '0.6723'),
(5, 'tahun', '2007', '2', '0', '2', '0', '1', '0', '1.4875', '-0.5283208', '0.6723'),
(6, 'tahun', '2008', '0', '0', '0', '0', '1', '0', '1.4875', '', '0.6723'),
(7, 'tahun', '2009', '0', '0', '0', '0', '1', '0', '1.4875', '', '0.6723'),
(8, 'tahun', '2010', '0', '0', '0', '0', '1', '0', '1.4875', '', '0.6723'),
(9, 'tahun', '2011', '1', '0', '1', '0', '1', '0', '1.4875', '-0.4308270', '0.6723'),
(10, 'harga', '7500000', '0', '0', '0', '0', '1', '0', '2.2516', '', '0.4441'),
(11, 'harga', '12000000', '0', '0', '0', '0', '1', '0', '2.2516', '', '0.4441'),
(12, 'harga', '13000000', '0', '0', '0', '0', '1', '0', '2.2516', '', '0.4441'),
(13, 'harga', '13500000', '0', '0', '0', '0', '1', '0', '2.2516', '', '0.4441'),
(14, 'harga', '9000000', '1', '1', '0', '0', '1', '0', '2.2516', '-0.4308270', '0.4441'),
(15, 'harga', '6500000', '0', '0', '0', '0', '1', '0', '2.2516', '', '0.4441'),
(16, 'harga', '11000000', '0', '0', '0', '0', '1', '0', '2.2516', '', '0.4441'),
(17, 'harga', '19000000', '1', '0', '1', '0', '1', '0', '2.2516', '-0.4308270', '0.4441'),
(18, 'harga', '15000000', '1', '0', '1', '0', '1', '0', '2.2516', '-0.4308270', '0.4441'),
(19, 'harga', '7000000', '0', '0', '0', '0', '1', '0', '2.2516', '', '0.4441'),
(20, 'harga', '10000000', '2', '2', '0', '0', '1', '0', '2.2516', '-0.5283208', '0.4441'),
(21, 'harga', '15500000', '1', '0', '1', '0', '1', '0', '2.2516', '-0.4308270', '0.4441');

-- --------------------------------------------------------

--
-- Table structure for table `pohon_keputusan_c45`
--

CREATE TABLE IF NOT EXISTS `pohon_keputusan_c45` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `atribut` varchar(100) NOT NULL,
  `nilai_atribut` varchar(100) NOT NULL,
  `id_parent` char(3) DEFAULT NULL,
  `jml_laris` varchar(5) NOT NULL,
  `jml_tdk_laris` varchar(5) NOT NULL,
  `keputusan` varchar(100) NOT NULL,
  `diproses` varchar(10) NOT NULL,
  `kondisi_atribut` varchar(255) NOT NULL,
  `looping_kondisi` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pohon_keputusan_c45`
--

INSERT INTO `pohon_keputusan_c45` (`id`, `atribut`, `nilai_atribut`, `id_parent`, `jml_laris`, `jml_tdk_laris`, `keputusan`, `diproses`, `kondisi_atribut`, `looping_kondisi`) VALUES
(1, 'jenis_barang', 'Laptop', '0', '7', '6', '?', 'Sudah', 'AND jenis_barang = ~Laptop~', 'Belum'),
(2, 'jenis_barang', 'PC', '0', '12', '0', 'Laris', 'Belum', 'AND jenis_barang = ~PC~', 'Belum'),
(3, 'merek', 'Acer', '1', '3', '3', '?', 'Sudah', 'AND jenis_barang = ~Laptop~ AND merek = ~Acer~', 'Sudah'),
(4, 'merek', 'Toshiba', '1', '0', '3', 'Tidak Laris', 'Belum', 'AND jenis_barang = ~Laptop~ AND merek = ~Toshiba~', 'Sudah'),
(5, 'merek', 'Axioo', '1', '4', '0', 'Laris', 'Belum', 'AND jenis_barang = ~Laptop~ AND merek = ~Axioo~', 'Sudah'),
(6, 'tahun', '2003', '3', '0', '0', 'Kosong', 'Belum', 'AND jenis_barang = ~Laptop~ AND merek = ~Acer~ AND tahun = ~2003~', 'Sudah'),
(7, 'tahun', '2004', '3', '2', '0', 'Laris', 'Belum', 'AND jenis_barang = ~Laptop~ AND merek = ~Acer~ AND tahun = ~2004~', 'Sudah'),
(8, 'tahun', '2005', '3', '0', '0', 'Kosong', 'Belum', 'AND jenis_barang = ~Laptop~ AND merek = ~Acer~ AND tahun = ~2005~', 'Sudah'),
(9, 'tahun', '2007', '3', '0', '2', 'Tidak Laris', 'Belum', 'AND jenis_barang = ~Laptop~ AND merek = ~Acer~ AND tahun = ~2007~', 'Sudah'),
(10, 'tahun', '2008', '3', '0', '0', 'Kosong', 'Belum', 'AND jenis_barang = ~Laptop~ AND merek = ~Acer~ AND tahun = ~2008~', 'Sudah'),
(11, 'tahun', '2009', '3', '0', '0', 'Kosong', 'Belum', 'AND jenis_barang = ~Laptop~ AND merek = ~Acer~ AND tahun = ~2009~', 'Sudah'),
(12, 'tahun', '2010', '3', '0', '0', 'Kosong', 'Belum', 'AND jenis_barang = ~Laptop~ AND merek = ~Acer~ AND tahun = ~2010~', 'Sudah'),
(13, 'tahun', '2011', '3', '0', '1', 'Tidak Laris', 'Belum', 'AND jenis_barang = ~Laptop~ AND merek = ~Acer~ AND tahun = ~2011~', 'Sudah');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
