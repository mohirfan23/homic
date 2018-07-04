-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2018 at 10:49 AM
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
  `id_gateway` int(11) NOT NULL,
  `kwh` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_listrik`
--

INSERT INTO `pembayaran_listrik` (`id_bayar_listrik`, `id_socket`, `id_gateway`, `kwh`, `harga`, `tanggal`) VALUES
(1, 1, 1, '200', 500000, '2017-11-12'),
(2, 2, 2, '300', 100000, '2017-11-12'),
(7, 2, 2, '100', 5000, '2017-10-12'),
(8, 2, 2, '100', 5000, '2017-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Admin','Pengguna') NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama`, `alamat`, `no_hp`, `username`, `password`, `level`, `email`) VALUES
(4, 'Aditiya Fadillah', 'Bekasi', '085715414307', 'adit', '2e445949d370543ad32c166c38b1278d67316509', 'Admin', 'aditpucuk76@gmail.com'),
(5, 'Ikbal Syahrul Shidiq', 'Bandung', '085615441933', 'ikbal', '407787d868a438469f1705b51ebe2e19b5f98cbf', 'Pengguna', 'ikbalsyahrul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datagt`
--

CREATE TABLE `tb_datagt` (
  `id_datagt` int(11) NOT NULL,
  `id_gateway` varchar(30) NOT NULL,
  `suhu` double(50,2) NOT NULL,
  `kelembaban` double(50,2) NOT NULL,
  `gas` double(50,2) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datagt`
--

INSERT INTO `tb_datagt` (`id_datagt`, `id_gateway`, `suhu`, `kelembaban`, `gas`, `tanggal`) VALUES
(1, '1', 12.30, 38.00, 30.00, '2017-01-01'),
(2, '1', 25.00, 30.00, 12.00, '2017-02-02'),
(3, '1', 29.00, 13.00, 15.00, '2017-03-10'),
(4, '1', 40.00, 30.98, 30.00, '2017-04-04'),
(5, '2', 30.10, 31.11, 32.33, '2017-05-05'),
(6, '2', 20.99, 30.99, 45.00, '2017-06-09'),
(7, '2', 30.15, 35.10, 33.00, '2017-07-11'),
(8, '1', 45.00, 34.00, 22.34, '2017-08-10'),
(9, '2', 36.33, 33.33, 25.22, '2017-09-11'),
(10, '1', 34.35, 24.25, 36.50, '2017-10-12'),
(11, '2', 45.33, 44.23, 34.35, '2017-11-02'),
(12, '3', 40.00, 30.20, 30.33, '2017-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datasocket`
--

CREATE TABLE `tb_datasocket` (
  `id_datasocket` int(11) NOT NULL,
  `id_socket` varchar(30) NOT NULL,
  `id_gateway` varchar(30) NOT NULL,
  `arus` double(50,2) NOT NULL,
  `daya` double(50,2) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datasocket`
--

INSERT INTO `tb_datasocket` (`id_datasocket`, `id_socket`, `id_gateway`, `arus`, `daya`, `tanggal`, `waktu`) VALUES
(1, '1', '1', 20.00, 40.00, '2017-01-01', '09:25:25'),
(2, '1', '1', 10.00, 200.00, '2017-02-02', '10:25:00'),
(3, '2', '2', 45.50, 300.00, '2017-03-03', '11:28:29'),
(4, '3', '2', 25.45, 400.00, '2017-04-04', '12:31:00'),
(5, '2', '2', 10.00, 53.45, '2017-05-05', '13:33:33'),
(6, '4', '4', 25.00, 40.00, '2017-11-13', '05:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reggt`
--

CREATE TABLE `tb_reggt` (
  `id_reggt` int(11) NOT NULL,
  `id_gateway` varchar(30) NOT NULL,
  `id_socket` varchar(30) NOT NULL,
  `ip_gateway` int(11) NOT NULL,
  `ip_socket` varchar(30) NOT NULL,
  `akses` varchar(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reggt`
--

INSERT INTO `tb_reggt` (`id_reggt`, `id_gateway`, `id_socket`, `ip_gateway`, `ip_socket`, `akses`, `username`, `password`) VALUES
(1, '1', '1', 1, '1', 'pppp', 'adit', '2e445949d370543ad32c166c38b1278d67316509');

-- --------------------------------------------------------

--
-- Table structure for table `tb_regsocket`
--

CREATE TABLE `tb_regsocket` (
  `id_regsocket` int(11) NOT NULL,
  `id_socket` varchar(30) NOT NULL,
  `id_gateway` varchar(30) NOT NULL,
  `gol_daya` int(50) NOT NULL,
  `ip_socket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_regsocket`
--

INSERT INTO `tb_regsocket` (`id_regsocket`, `id_socket`, `id_gateway`, `gol_daya`, `ip_socket`) VALUES
(1, '1', '1', 8, '1');

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
  ADD PRIMARY KEY (`id_datasocket`);

--
-- Indexes for table `tb_reggt`
--
ALTER TABLE `tb_reggt`
  ADD PRIMARY KEY (`id_reggt`);

--
-- Indexes for table `tb_regsocket`
--
ALTER TABLE `tb_regsocket`
  ADD PRIMARY KEY (`id_regsocket`);

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
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_datagt`
--
ALTER TABLE `tb_datagt`
  MODIFY `id_datagt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_datasocket`
--
ALTER TABLE `tb_datasocket`
  MODIFY `id_datasocket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_reggt`
--
ALTER TABLE `tb_reggt`
  MODIFY `id_reggt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_regsocket`
--
ALTER TABLE `tb_regsocket`
  MODIFY `id_regsocket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tdl`
--
ALTER TABLE `tdl`
  MODIFY `id_tdl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
