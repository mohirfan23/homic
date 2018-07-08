-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 08:05 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homic`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pesanan`
--

CREATE TABLE `data_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `alamat_pemesan` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pesanan`
--

INSERT INTO `data_pesanan` (`id_pesanan`, `nama_pemesan`, `alamat_pemesan`, `email`, `jumlah_barang`, `bukti_pembayaran`) VALUES
(1, 'Aditiya Fadillah', '', '', 0, '500.000'),
(2, 'Ikbal Syahrul Shidik', '', '', 0, '1.000.000'),
(3, 'Ilham', '', '', 0, '5.000.000'),
(4, 'Egi', '', '', 0, '2.500.000');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_listrik`
--

CREATE TABLE `pembayaran_listrik` (
  `id_bayar_listrik` int(11) NOT NULL,
  `id_socket` int(11) NOT NULL,
  `kwh` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_listrik`
--

INSERT INTO `pembayaran_listrik` (`id_bayar_listrik`, `id_socket`, `kwh`, `harga`, `tanggal`) VALUES
(1, 1, '200', 500000, '2017-11-12'),
(2, 2, '300', 100000, '2017-11-12'),
(7, 2, '100', 5000, '2017-10-12'),
(8, 2, '100', 5000, '2017-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` enum('Admin','Pengguna') NOT NULL DEFAULT 'Pengguna',
  `status` enum('aktif','b_aktif') NOT NULL DEFAULT 'b_aktif',
  `lat` varchar(100) NOT NULL,
  `lon` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama`, `alamat`, `no_hp`, `username`, `password`, `level`, `status`, `lat`, `lon`, `email`) VALUES
(4, 'Aditiya Fadillah', 'Bekasi', '085715414307', 'adit', '2e445949d370543ad32c166c38b1278d67316509', 'Admin', 'aktif', '', '', 'aditpucuk76@gmail.com'),
(5, 'Ikbal Syahrul Shidiq', 'Bandung', '085615441933', 'ikbal', '407787d868a438469f1705b51ebe2e19b5f98cbf', 'Pengguna', 'b_aktif', '', '', 'ikbalsyahrul@gmail.com'),
(25, 'Muhamad Irfan', 'Jalan Sekeloa Selatan I, Lebak Gede, Bandung City, West Java, Indonesia', '08772226272', 'mohirfan23', '5bbe9a24f046030f2a9e0d62eba48fa94a1c6156', 'Pengguna', 'aktif', '-6.8899425', '107.61888249999993', 'mohirfan689@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datagt`
--

CREATE TABLE `tb_datagt` (
  `id_datagt` int(11) NOT NULL,
  `id_socket` varchar(30) NOT NULL,
  `arus` double(50,2) NOT NULL,
  `daya` double(50,2) NOT NULL,
  `tegangan` double(50,2) NOT NULL,
  `kwh` double(50,2) NOT NULL,
  `relay` char(2) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datagt`
--

INSERT INTO `tb_datagt` (`id_datagt`, `id_socket`, `arus`, `daya`, `tegangan`, `kwh`, `relay`, `tanggal`) VALUES
(13, 'qwCCVag', 0.00, 0.00, 0.00, 0.07, '0', '2018-07-08 11:01:52'),
(14, 'qwCCVag', 0.00, 0.00, 0.00, 0.07, '1', '2018-07-08 11:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datasocket`
--

CREATE TABLE `tb_datasocket` (
  `id_socket` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL DEFAULT '4',
  `no_seri` varchar(100) NOT NULL,
  `set_kwh` varchar(50) NOT NULL DEFAULT '2',
  `set_switch` char(5) NOT NULL DEFAULT 'off',
  `status` enum('aktif','b_aktif') NOT NULL DEFAULT 'b_aktif',
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datasocket`
--

INSERT INTO `tb_datasocket` (`id_socket`, `id_akun`, `no_seri`, `set_kwh`, `set_switch`, `status`, `tanggal`) VALUES
(1, 17, 'jalO932', '', 'off', 'aktif', '2018-07-01'),
(4, 25, 'qwCCVag', '3', 'off', 'aktif', '2018-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `status_bayar` varchar(50) NOT NULL DEFAULT 'kosong',
  `konfirmasi` tinyint(4) NOT NULL DEFAULT '0',
  `jumlah` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_akun`, `status_bayar`, `konfirmasi`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
(18, 25, 'gbr_1530716739.jpg', 1, 1, 500000, '2018-07-04 15:05:48', '2018-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tdl`
--

CREATE TABLE `tdl` (
  `id_tdl` int(11) NOT NULL,
  `gol_tarif` varchar(100) NOT NULL,
  `kelas_daya` varchar(100) NOT NULL,
  `tarif_daya_listrik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdl`
--

INSERT INTO `tdl` (`id_tdl`, `gol_tarif`, `kelas_daya`, `tarif_daya_listrik`) VALUES
(8, 'R1/Konsumen rumah tangga kecil', '1300 VA', '1352'),
(9, 'R-1/Konsumen rumah tangga kecil', '2200 VA', '1467'),
(10, 'R-2/Konsumen rumah tangga menengah', '3500 VA sd 5500 VA', '1467'),
(11, 'R3/Konsumen rumah tangga besar', '6600 VA ke atas', '1467'),
(12, 'B-2/Konsumen bisnis sedang', '6600 VA sd 200kVA', '1467');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `pembayaran_listrik`
--
ALTER TABLE `pembayaran_listrik`
  ADD PRIMARY KEY (`id_bayar_listrik`);

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tb_datagt`
--
ALTER TABLE `tb_datagt`
  ADD PRIMARY KEY (`id_datagt`);

--
-- Indexes for table `tb_datasocket`
--
ALTER TABLE `tb_datasocket`
  ADD PRIMARY KEY (`id_socket`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tdl`
--
ALTER TABLE `tdl`
  ADD PRIMARY KEY (`id_tdl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran_listrik`
--
ALTER TABLE `pembayaran_listrik`
  MODIFY `id_bayar_listrik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_datagt`
--
ALTER TABLE `tb_datagt`
  MODIFY `id_datagt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_datasocket`
--
ALTER TABLE `tb_datasocket`
  MODIFY `id_socket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tdl`
--
ALTER TABLE `tdl`
  MODIFY `id_tdl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
