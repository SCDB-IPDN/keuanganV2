-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 10:18 AM
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
-- Table structure for table `out_pok`
--

CREATE TABLE `out_pok` (
  `id` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pagu` bigint(20) NOT NULL,
  `realisasi` bigint(20) NOT NULL,
  `kembali` bigint(20) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_pok`
--

INSERT INTO `out_pok` (`id`, `id_u`, `nama`, `pagu`, `realisasi`, `kembali`, `tgl`) VALUES
(343, 116, 'Penyelenggaraan Pendidikan Kepamongprajaan', 1017075000, 159487797, 0, '2020-10-16'),
(344, 116, 'Layanan Perkantoran', 119000000, 109738000, 0, '2020-10-16'),
(340, 115, 'Penyelenggaraan Pendidikan Kepamongprajaan', 9431983000, 5037697396, 0, '2020-10-16'),
(341, 115, 'Jurnal', 100000000, 0, 0, '2020-10-16'),
(342, 115, 'Layanan Perkantoran', 19000000, 19000000, 0, '2020-10-16'),
(339, 404, 'Layanan Perkantoran', 22800000, 22795000, 0, '2020-10-19'),
(338, 404, 'Layanan Dukungan Manajemen Satker', 367537000, 317781608, 0, '2020-10-19'),
(336, 403, 'Layanan Perkantoran', 15200000, 10200000, 0, '2020-10-19'),
(337, 404, 'Nilai Capaian Kinerja Reformasi Birokrasi lingkup IPDN', 0, 0, 0, '2020-10-19'),
(335, 403, 'Nilai Capaian Kinerja Reformasi Birokrasi lingkup IPDN', 496380000, 405406900, 2440000, '2020-10-19'),
(334, 403, 'Penanganan Sengketa Hukum Terkait IPDN', 64121000, 56654000, 0, '2020-10-19'),
(332, 402, 'Layanan Perkantoran', 622900000, 211640000, 0, '2020-10-19'),
(333, 403, 'Kebijakan/Regulasi Lingkup IPDN yang ditetapkan', 193013000, 171130152, 0, '2020-10-19'),
(331, 402, 'Publikasi Informasi dan Penanganan Pengaduan Lingkup IPDN', 553952000, 468052294, 0, '2020-10-19'),
(327, 307, 'Layanan Perkantoran', 19000000, 14244700, 0, '2020-10-16'),
(328, 401, 'Kerjasama IPDN', 171280000, 125098160, 0, '2020-10-19'),
(329, 401, 'Layanan Perkantoran', 250000000, 237020927, 0, '2020-10-19'),
(330, 402, 'Kerjasama IPDN', 184174000, 178842500, 0, '2020-10-19'),
(326, 307, 'Pengelolaan Administrasi Keprajaan dan Alumni', 69757000, 36450000, 0, '2020-10-16'),
(325, 306, 'Layanan Perkantoran', 19000000, 9250000, 0, '2020-10-16'),
(324, 306, 'Pengelolaan Administrasi Keprajaan dan Alumni', 111397000, 36877200, 0, '2020-10-16'),
(322, 304, 'Pengelolaan Administrasi Keprajaan dan Alumni', 821956000, 14619000, 0, '2020-10-16'),
(323, 304, 'Layanan Perkantoran', 22800000, 11400000, 0, '2020-10-16'),
(321, 305, 'Layanan Perkantoran', 22800000, 11400000, 0, '2020-10-16'),
(320, 305, 'Revolusi Mental Di Lingkungan IPDN', 0, 0, 0, '2020-10-16'),
(319, 305, 'Pengelolaan Administrasi Keprajaan dan Alumni', 1179297000, 996889139, 1850000, '2020-10-16'),
(317, 303, 'Pengelolaan Administrasi Keprajaan dan Alumni', 835009000, 637689335, 0, '2020-10-16'),
(318, 303, 'Layanan Perkantoran', 72800000, 11400000, 0, '2020-10-16'),
(316, 302, 'Layanan Perkantoran', 22800000, 11400000, 0, '2020-10-16'),
(315, 302, 'Pengelolaan Administrasi Keprajaan dan Alumni', 12955101000, 10721831424, 0, '2020-10-16'),
(314, 301, 'Layanan Perkantoran', 250000000, 196372718, 0, '2020-10-16'),
(313, 301, 'Pengelolaan Administrasi Keprajaan dan Alumni', 175000000, 108112500, 0, '2020-10-16'),
(311, 206, 'Layanan Dukungan Manajemen Satker', 576985000, 93858230, 0, '2020-10-16'),
(312, 206, 'Layanan Perkantoran', 1515380000, 1095468299, 0, '2020-10-16'),
(310, 205, 'Layanan Perkantoran', 2401862000, 2287569986, 0, '2020-10-16'),
(308, 204, 'Layanan Perkantoran', 41073979000, 24177711532, 0, '2020-10-16'),
(309, 205, 'Layanan Dukungan Manajemen Satker', 414697000, 247658556, 0, '2020-10-16'),
(307, 204, 'Layanan Dukungan Manajemen Satker', 1266142000, 1227206045, 0, '2020-10-16'),
(306, 204, 'Layanan Sarana dan Prasarana Internal', 11789810000, 4355117484, 0, '2020-10-16'),
(305, 204, 'Pengelolaan Administrasi Keprajaan dan Alumni', 0, 0, 0, '2020-10-16'),
(303, 203, 'Layanan Perkantoran', 157450665000, 115550209697, 8344000, '2020-10-16'),
(304, 204, 'Penyelenggaraan Pendidikan Kepamongprajaan', 1876416000, 1819445281, 0, '2020-10-16'),
(301, 202, 'Layanan Perkantoran', 45401634000, 31359904854, 0, '2020-10-16'),
(302, 203, 'Layanan Dukungan Manajemen Satker', 457706000, 317959956, 0, '2020-10-16'),
(299, 201, 'Layanan Perkantoran', 275000000, 272790839, 0, '2020-10-16'),
(300, 202, 'Layanan Dukungan Manajemen Satker', 9654439000, 7607938533, 27982000, '2020-10-16'),
(298, 201, 'Layanan Dukungan Manajemen Satker', 100000000, 92966069, 0, '2020-10-16'),
(297, 114, 'Layanan Perkantoran', 15200000, 12300000, 0, '0000-00-00'),
(294, 113, 'Pengelolaan Laboratorium Pendidikan Kepamongprajaan', 254253000, 233506850, 0, '0000-00-00'),
(295, 113, 'Layanan Perkantoran', 15200000, 15199000, 0, '0000-00-00'),
(296, 114, 'Pengelolaan Laboratorium Pendidikan Kepamongprajaan', 141188000, 94499217, 0, '0000-00-00'),
(292, 112, 'Pengelolaan Layanan Perpustakaan', 194025000, 143584000, 0, '0000-00-00'),
(293, 112, 'Layanan Perkantoran', 495386000, 420306000, 0, '0000-00-00'),
(290, 111, 'Pengelolaan Teknologi Informasi Kelembagaan Pendidikan Kepamongprajaan', 609930000, 251787200, 0, '0000-00-00'),
(291, 111, 'Layanan Perkantoran', 15200000, 15200000, 0, '0000-00-00'),
(289, 110, 'Layanan Perkantoran', 19000000, 15561200, 0, '0000-00-00'),
(287, 110, 'Kajian, Penelitian dan Pengabdian Masyarakat Lingkup IPDN', 1594760000, 1243442040, 0, '0000-00-00'),
(288, 110, 'Jurnal', 373952000, 213042550, 0, '0000-00-00'),
(286, 109, 'Layanan Perkantoran', 19000000, 4874500, 0, '0000-00-00'),
(285, 109, 'Kajian, Penelitian dan Pengabdian Masyarakat Lingkup IPDN', 696185000, 390422709, 0, '0000-00-00'),
(284, 108, 'Layanan Perkantoran', 19000000, 10905000, 0, '0000-00-00'),
(283, 108, 'Audit Mutu Pendidikan/Akreditasi', 1262999000, 572979569, 0, '0000-00-00'),
(281, 107, 'Penyelenggaraan Pendidikan Kepamongprajaan', 549054000, 298020900, 0, '0000-00-00'),
(282, 107, 'Layanan Perkantoran', 15200000, 13583000, 0, '0000-00-00'),
(280, 106, 'Layanan Perkantoran', 361496000, 279546802, 0, '0000-00-00'),
(279, 106, 'Modul', 0, 0, 0, '0000-00-00'),
(278, 106, 'Jurnal', 193400000, 88750000, 0, '0000-00-00'),
(277, 106, 'Penyelenggaraan Pendidikan Kepamongprajaan', 839240000, 492590165, 0, '0000-00-00'),
(276, 105, 'Layanan Perkantoran', 546008000, 335430438, 0, '0000-00-00'),
(275, 105, 'Modul', 0, 0, 0, '0000-00-00'),
(273, 105, 'Penyelenggaraan Pendidikan Kepamongprajaan', 2648004000, 1405180354, 0, '0000-00-00'),
(274, 105, 'Jurnal', 325671000, 96663000, 0, '0000-00-00'),
(271, 104, 'Modul', 0, 0, 0, '0000-00-00'),
(272, 104, 'Layanan Perkantoran', 670476000, 582101172, 0, '0000-00-00'),
(270, 104, 'Jurnal', 220138000, 46890000, 0, '0000-00-00'),
(268, 103, 'Layanan Perkantoran', 34200000, 17100000, 0, '0000-00-00'),
(269, 104, 'Penyelenggaraan Pendidikan Kepamongprajaan', 2540049000, 1914281526, 0, '0000-00-00'),
(267, 103, 'Layanan Dukungan Manajemen Satker', 1165857000, 814495850, 0, '0000-00-00'),
(266, 103, 'Perencanaan [SBKU]', 779359000, 449590000, 0, '0000-00-00'),
(265, 102, 'Layanan Perkantoran', 19000000, 19000000, 0, '0000-00-00'),
(263, 102, 'Literatur', 909450000, 449583000, 0, '0000-00-00'),
(264, 102, 'RPS/RTM', 790211000, 385246800, 0, '0000-00-00'),
(261, 101, 'Layanan Perkantoran', 330000000, 243848021, 0, '0000-00-00'),
(262, 102, 'Penyelenggaraan Pendidikan Kepamongprajaan', 1353410000, 946259907, 0, '0000-00-00'),
(260, 101, 'Penyelenggaraan Pendidikan Kepamongprajaan', 456694000, 429567400, 0, '0000-00-00');

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
-- Table structure for table `tbl_satker_biro`
--

CREATE TABLE `tbl_satker_biro` (
  `id_satker_biro` int(11) NOT NULL,
  `kode_satker_biro` varchar(150) NOT NULL,
  `nama_satker_biro` varchar(150) NOT NULL,
  `alias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_satker_biro`
--

INSERT INTO `tbl_satker_biro` (`id_satker_biro`, `kode_satker_biro`, `nama_satker_biro`, `alias`) VALUES
(1, '1292', 'Penyelenggaraan Administrasi Akademik dan Perencanaan Pendidikan Kepamongprajaan', 'BIRO I'),
(2, '1294', 'Pengelolaan Administrasi Umum dan Keuangan Pendidikan Kepamongprajaan', 'BIRO II'),
(3, '1293', 'Penyelenggaraan Administrasi Keprajaan dan Kemahasiswaan', 'BIRO III'),
(4, '1286', 'Penyelenggaraan Administrasi Kerjasama dan Hukum', 'BIRO IV');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_span`
--

CREATE TABLE `tbl_span` (
  `id_span` int(11) NOT NULL,
  `kode_satker` varchar(150) NOT NULL,
  `nama_satker` varchar(150) NOT NULL,
  `pagu_bp` bigint(150) NOT NULL,
  `realisasi_bp` bigint(150) NOT NULL,
  `persentase_bp` varchar(150) NOT NULL,
  `pagu_bb` bigint(150) NOT NULL,
  `realisasi_bb` bigint(150) NOT NULL,
  `persentase_bb` varchar(150) NOT NULL,
  `pagu_bm` bigint(150) NOT NULL,
  `realisasi_bm` bigint(150) NOT NULL,
  `persentase_bm` varchar(150) NOT NULL,
  `pagu_t` bigint(150) NOT NULL,
  `realisasi_t` bigint(150) NOT NULL,
  `persentase_t` varchar(150) NOT NULL,
  `sisa` varchar(150) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_span`
--

INSERT INTO `tbl_span` (`id_span`, `kode_satker`, `nama_satker`, `pagu_bp`, `realisasi_bp`, `persentase_bp`, `pagu_bb`, `realisasi_bb`, `persentase_bb`, `pagu_bm`, `realisasi_bm`, `persentase_bm`, `pagu_t`, `realisasi_t`, `persentase_t`, `sisa`, `created_date`) VALUES
(1, '448302', 'IPDN KAMPUS JATINANGOR', 112930090000, 94138695189, '83,36%', 201633066000, 133014436771, '65,97%', 17860660000, 4591617484, '25,71%', 332423816000, 231744749444, '69,71%', '100679066556', '2020-11-04'),
(2, '352593', 'IPDN KAMPUS JAKARTA', 23313047000, 19910872044, '85,41%', 22141734000, 15486861127, '69,94%', 1482844000, 939691500, '63,37%', 46937625000, 36337424671, '77,42%', '10600200329', '2020-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_span_biro`
--

CREATE TABLE `tbl_span_biro` (
  `id_span_biro` int(11) NOT NULL,
  `kode_satker_biro` varchar(150) NOT NULL,
  `nama_satker_biro` varchar(150) NOT NULL,
  `pagu_bp` varchar(150) NOT NULL,
  `realisasi_bp` bigint(150) NOT NULL,
  `persentase_bp` varchar(150) NOT NULL,
  `pagu_bb` bigint(150) NOT NULL,
  `realisasi_bb` bigint(150) NOT NULL,
  `persentase_bb` varchar(150) NOT NULL,
  `pagu_bm` bigint(150) NOT NULL,
  `realisasi_bm` bigint(150) NOT NULL,
  `persentase_bm` varchar(150) NOT NULL,
  `pagu_t` bigint(150) NOT NULL,
  `realisasi_t` bigint(150) NOT NULL,
  `persentase_t` varchar(150) NOT NULL,
  `sisa` varchar(150) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_span_biro`
--

INSERT INTO `tbl_span_biro` (`id_span_biro`, `kode_satker_biro`, `nama_satker_biro`, `pagu_bp`, `realisasi_bp`, `persentase_bp`, `pagu_bb`, `realisasi_bb`, `persentase_bb`, `pagu_bm`, `realisasi_bm`, `persentase_bm`, `pagu_t`, `realisasi_t`, `persentase_t`, `sisa`, `created_date`) VALUES
(1, '1286', 'Penyelenggaraan Administrasi Kerjasama dan Hukum', '0', 0, '0,00%', 2030457000, 1756528114, '86,51%', 0, 0, '0,00%', 2030457000, 1756528114, '86,51%', '273928886', '2020-11-04');

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

-- --------------------------------------------------------

--
-- Table structure for table `unit_pok`
--

CREATE TABLE `unit_pok` (
  `id_b` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_pok`
--

INSERT INTO `unit_pok` (`id_b`, `id`, `nama`) VALUES
(1286, 404, 'BAGIAN KEPEGAWAIAN'),
(1286, 403, 'BAGIAN HUKUM, ORGANISASI DAN TATA LAKSANA'),
(1286, 402, 'BAGIAN KERJA SAMA DAN HUMAS'),
(1286, 401, 'TU BIRO IV'),
(1293, 307, 'UNIT BIMBINGAN DAN KONSELING PRAJA'),
(1293, 306, 'KOMISI DISIPLIN PRAJA'),
(1293, 305, 'BAGIAN EKSTRAKURIKULER PRAJA'),
(1293, 304, 'BAGIAN DISIPLIN PRAJA'),
(1293, 302, 'BAGIAN KEPRAJAAN'),
(1293, 303, 'BAGIAN PENGASUHAN PRAJA'),
(1293, 301, 'TU BIRO III'),
(1294, 206, 'UNIT POLIKLINIK'),
(1294, 205, 'BAGIAN ADM. PIMPINAN DAN PROTOKOL'),
(1294, 204, 'BAGIAN PERLENGKAPAN DAN PENGELOLAAN BMN'),
(1294, 203, 'BAGIAN KEUANGAN '),
(1294, 202, 'BAGIAN UMUM '),
(1294, 201, 'TU BIRO II'),
(1292, 116, 'PROGRAM PROFESI KEPAMONGPRAJAAN'),
(1292, 114, 'LABORATORIUM MUSEUM'),
(1292, 115, 'PROGRAM PASCASARJANA'),
(1292, 112, 'UNIT PERPUSTAKAAN'),
(1292, 113, 'LABORATORIUM BAHASA'),
(1292, 111, 'TEKNOLOGI PENDIDIKAN'),
(1292, 110, 'LEMBAGA PENGAWASAN DAN PENJAMINAN MUTU INTERNAL'),
(1292, 109, 'LEMBAGA PENGABDIAN MASYARAKAT '),
(1292, 108, 'LEMBAGA RISET DAN PENGKAJIAN STRATEGI PEMERINTAHAN '),
(1292, 107, 'SENAT INSTITUT '),
(1292, 106, 'FAKULTAS HUKUM DAN PEMERINTAHAN '),
(1292, 105, 'FAKULTAS MANAJEMEN PEMERINTAHAN '),
(1292, 1286, 'FAKULTAS POLITIK PEMERINTAHAN '),
(1292, 1293, 'BAGIAN PERENCANAAN '),
(1292, 1294, 'BAGIAN AKADEMIK '),
(1292, 1292, 'TU BIRO I');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `out_pok`
--
ALTER TABLE `out_pok`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_satker_biro`
--
ALTER TABLE `tbl_satker_biro`
  ADD PRIMARY KEY (`id_satker_biro`);

--
-- Indexes for table `tbl_span`
--
ALTER TABLE `tbl_span`
  ADD PRIMARY KEY (`id_span`);

--
-- Indexes for table `tbl_span_biro`
--
ALTER TABLE `tbl_span_biro`
  ADD PRIMARY KEY (`id_span_biro`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `unit_pok`
--
ALTER TABLE `unit_pok`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tbl_satker_biro`
--
ALTER TABLE `tbl_satker_biro`
  MODIFY `id_satker_biro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_span`
--
ALTER TABLE `tbl_span`
  MODIFY `id_span` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_span_biro`
--
ALTER TABLE `tbl_span_biro`
  MODIFY `id_span_biro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
