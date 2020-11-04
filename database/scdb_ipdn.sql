-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 03:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scdb_ipdn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(150) NOT NULL,
  `role_name` varchar(150) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `role_name`, `keterangan`) VALUES
(1, 'Admin', 'Hak Akses Full Aplikasi'),
(2, 'Biro 1', 'Biro 1 Kampus Jatinangor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satker`
--

CREATE TABLE `tbl_satker` (
  `id_satker` int(11) NOT NULL,
  `kode_satker` varchar(150) NOT NULL,
  `nama_satker` varchar(150) NOT NULL,
  `alias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_satker`
--

INSERT INTO `tbl_satker` (`id_satker`, `kode_satker`, `nama_satker`, `alias`) VALUES
(1, '448302', 'IPDN KAMPUS JATINANGOR', 'JATINANGOR'),
(2, '352593', 'IPDN KAMPUS JAKARTA', 'JAKARTA'),
(3, '677010', 'IPDN KAMPUS SULAWESI UTARA', 'SULUT'),
(4, '677024', 'IPDN KAMPUS SULAWESI SELATAN', 'SULSEL'),
(5, '677045', 'IPDN KAMPUS SUMATERA BARAT', 'SUMBAR'),
(6, '683070', 'IPDN KAMPUS KALIMANTAN BARAT', 'KALBAR'),
(7, '683084', 'IPDN KAMPUS NUSA TENGGARA BARAT', 'NTB'),
(8, '683091', 'IPDN KAMPUS PAPUA', 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_span`
--

CREATE TABLE `tbl_span` (
  `id_span` int(11) NOT NULL,
  `kode_satker` varchar(150) NOT NULL,
  `nama_satker` varchar(150) NOT NULL,
  `pagu_bp` varchar(150) NOT NULL,
  `realisasi_bp` varchar(150) NOT NULL,
  `persentase_bp` varchar(150) NOT NULL,
  `pagu_bb` varchar(150) NOT NULL,
  `realisasi_bb` varchar(150) NOT NULL,
  `persentase_bb` varchar(150) NOT NULL,
  `pagu_bm` varchar(150) NOT NULL,
  `realisasi_bm` varchar(150) NOT NULL,
  `persentase_bm` varchar(150) NOT NULL,
  `pagu_t` varchar(150) NOT NULL,
  `realisasi_t` varchar(150) NOT NULL,
  `persentase_t` varchar(150) NOT NULL,
  `sisa` varchar(150) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_span`
--

INSERT INTO `tbl_span` (`id_span`, `kode_satker`, `nama_satker`, `pagu_bp`, `realisasi_bp`, `persentase_bp`, `pagu_bb`, `realisasi_bb`, `persentase_bb`, `pagu_bm`, `realisasi_bm`, `persentase_bm`, `pagu_t`, `realisasi_t`, `persentase_t`, `sisa`, `created_date`) VALUES
(1, '448302', 'IPDN KAMPUS JATINANGOR', '112930090000', '94138695189', '83,36%', '201633066000', '133014436771', '65,97%', '17860660000', '4591617484', '25,71%', '332423816000', '231744749444', '69,71%', '100679066556', '2020-11-04'),
(2, '352593', 'IPDN KAMPUS JAKARTA', '23313047000', '19910872044', '85,41%', '22141734000', '15486861127', '69,94%', '1482844000', '939691500', '63,37%', '46937625000', '36337424671', '77,42%', '10600200329', '2020-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(150) NOT NULL,
  `nip` varchar(150) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `nip`, `nama_user`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'Administrator', '202cb962ac59075b964b07152d234b70', 'Admin', '2020-11-02 04:14:16'),
(2, 'apa', 'apa', '21232f297a57a5a743894a0e4a801fc3', 'Biro 1', '2020-11-03 09:06:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_satker`
--
ALTER TABLE `tbl_satker`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `tbl_span`
--
ALTER TABLE `tbl_span`
  ADD PRIMARY KEY (`id_span`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_satker`
--
ALTER TABLE `tbl_satker`
  MODIFY `id_satker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_span`
--
ALTER TABLE `tbl_span`
  MODIFY `id_span` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
