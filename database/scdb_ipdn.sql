-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 08:17 AM
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
-- Table structure for table `output_sas`
--

CREATE TABLE `output_sas` (
  `No` int(11) NOT NULL,
  `kode_satker` varchar(50) DEFAULT NULL,
  `id_b` varchar(50) DEFAULT NULL,
  `id_c` varchar(50) DEFAULT NULL,
  `pagu` bigint(20) DEFAULT NULL,
  `realisasi` bigint(20) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `output_sas`
--

INSERT INTO `output_sas` (`No`, `kode_satker`, `id_b`, `id_c`, `pagu`, `realisasi`, `ket`) VALUES
(1, '448302', '1286', '401', 54457000, 54399400, 'Kerjasama Dengan Pemerintah Daerah'),
(2, '448302', '1286', '401', 68193000, 67923100, 'Kerjasama Dengan Perguruan Tinggi (PTN/PTS)'),
(3, '448302', '1286', '401', 232804000, 208550160, 'Kerjasama Dengan Lembaga Lainnya'),
(4, '448302', '1286', '402', 188468000, 166625402, 'Peraturan Menteri Dalam Negeri Terkait IPDN'),
(5, '448302', '1286', '402', 4545000, 4504750, 'Peraturan Rektor Terkait Tindak Lanjut dari permendagri Nomor 42 dan 43 Tahun 2018'),
(6, '448302', '1286', '403', 64121000, 56654000, 'Pelaksanaan Bantuan Hukum'),
(7, '448302', '1286', '404', 164512000, 141507300, 'Pengelolaan Informasi dan Pengaduan'),
(8, '448302', '1286', '404', 389440000, 326544994, 'Dokumentasi dan Publikasi'),
(9, '448302', '1286', '405', 408580000, 325996000, 'Pelaksanaan Reformasi Birokrasi'),
(10, '448302', '1286', '405', 87800000, 79410900, 'Pemantauan dan Evaluasi Reformasi Birokrasi'),
(11, '448302', '1286', '406', 367537000, 317781608, 'Pengelolaan kepegawaian'),
(12, '448302', '1292', '101', 1214627000, 855953707, 'Penyelenggaraan Administrasi Keakademikan'),
(13, '448302', '1292', '101', 1956559000, 1420923626, 'Penyelenggaraan Fakultas Politik Pemerintahan'),
(14, '448302', '1292', '101', 2031386000, 1012734367, 'Penyelenggaraan Fakultas Manajemen Pemerintahan'),
(15, '448302', '1292', '101', 1143371000, 865487844, 'Penyelenggaraan Pelatihan'),
(16, '448302', '1292', '101', 3339757000, 2782739451, 'Evaluasi Penyelenggaraan Pendidikan'),
(17, '448302', '1292', '101', 555534000, 310998113, 'Penyelenggaraan Fakultas Hukum Tata Pemerintahan'),
(18, '448302', '1292', '101', 21633000, 21632400, 'Peningkatan  dan Pengembangan Kualitas dan Kompetensi Tenaga Pendidik'),
(19, '448302', '1292', '101', 2924290000, 1645632679, 'Penyelenggaraan Administrasi Keakademikan Program Pasca Sarjana'),
(20, '448302', '1292', '101', 2421356000, 1043963251, 'Penyelenggaraan Pendidikan Program Magister (S2)'),
(21, '448302', '1292', '101', 3557269000, 2263101266, 'Penyelenggaraan Pendidikan Program Doktoral (S3)'),
(22, '448302', '1292', '101', 529068000, 508162671, 'Evaluasi Penyelenggaraan Pendidikan'),
(23, '448302', '1292', '101', 648440000, 136395797, 'Penyelenggaraan Administrasi Keakademikan Program Profesi Kepamongprajaan'),
(24, '448302', '1292', '101', 320345000, 33240000, 'Penyelenggaraan Pendidikan Program Profesi Kepamongprajaan'),
(25, '448302', '1292', '101', 48290000, 0, 'Evaluasi Penyelenggaraan Pendidikan'),
(26, '448302', '1292', '102', 673561000, 358446990, 'Akreditasi Pendidikan Kepamongprajaan'),
(27, '448302', '1292', '102', 589438000, 345223979, 'Audit Mutu Internal'),
(28, '448302', '1292', '103', 304425000, 187275709, 'Rencana Aksi, Kaji Tindak, Evaluasi, dan Seminar Hasil Pelaksanaan Pengabdian Masyarakat'),
(29, '448302', '1292', '103', 8800000, 8794500, 'Pelaksanaan Program Pengabdian Masyarakat Desa Binaan Berbasis Interdisipliner'),
(30, '448302', '1292', '103', 89957000, 44105000, 'Pelaksanaan Pengabdian Masyarakat Desa Binaan Berbasis Program Studi'),
(31, '448302', '1292', '103', 205930000, 71439500, 'Pelaksanaan Pengabdian Masyarakat Berbasis Riset dan Kajian'),
(32, '448302', '1292', '103', 87073000, 85779000, 'Pelaksanaan Pengabdian Masyarakat Bersinergi dengan Praktek Lapangan'),
(33, '448302', '1292', '103', 218110000, 216983020, 'Pelaksanaan Kajian Pemerintahan'),
(34, '448302', '1292', '103', 1204811000, 1058767940, 'Pelaksanaan Penelitian Mandiri, Kelompok dan Unggulan'),
(35, '448302', '1292', '103', 52679000, 0, 'Seminar Hasil Kajian dan Penelitian'),
(36, '448302', '1292', '103', 119160000, 27367980, 'Evaluasi, Rencana Aksi, dan Publikasi Hasil Pelaksanaan Penelitian'),
(37, '448302', '1292', '104', 194025000, 143584000, 'Administrasi Dan Layanan Perpustakaan'),
(38, '448302', '1292', '105', 609930000, 255767200, 'Pengelolaan Data dan Informasi'),
(39, '448302', '1292', '106', 473952000, 247736950, 'Jurnal Lembaga'),
(40, '448302', '1292', '106', 207391000, 54285000, 'Jurnal Fakultas'),
(41, '448302', '1292', '106', 531818000, 176765000, 'Jurnal Program Diploma'),
(42, '448302', '1292', '107', 254253000, 253529850, 'Laboratorium Bahasa'),
(43, '448302', '1292', '107', 141188000, 94499217, 'Laboratorium dan Museum Sejarah Pemerintahan'),
(44, '448302', '1292', '108', 39850000, 39597600, 'PENETAPAN TEMA LITERATUR, PENULISAN, EDITOR, SELEKSI PROPOSAL PENULISAN DAN KOMPILASI DATA'),
(45, '448302', '1292', '108', 642850000, 463862000, 'PENYUSUNAN LITERATUR'),
(46, '448302', '1292', '108', 76250000, 26963400, 'WORKSHOP PENYUSUNAN LITERATUR'),
(47, '448302', '1292', '108', 150000000, 0, 'PENCETAKAN BUKU LITERATUR'),
(48, '448302', '1292', '108', 500000, 0, 'PELAPORAN KEGIATAN'),
(49, '448302', '1292', '109', 1800000, 1800000, 'PENETAPAN PENULISAN  RPS DAN RTM PENGAJARAN'),
(50, '448302', '1292', '109', 136462000, 136012000, 'PENYUSUNAN RPS DAN RTM PENGAJARAN'),
(51, '448302', '1292', '109', 302229000, 76548800, 'WORKSHOP PENYUSUNAN RPS DAN RTM PENGAJARAN'),
(52, '448302', '1292', '109', 112500000, 111441600, 'PENCETAKAN BUKU RPS DAN RTM PENGAJARAN'),
(53, '448302', '1292', '109', 500000, 500000, 'PELAPORAN KEGIATAN'),
(54, '448302', '1292', '109', 1800000, 1800000, 'PENETAPAN PENULIS RPS DAN RTM PELATIHAN'),
(55, '448302', '1292', '109', 56145000, 53145000, 'PENYUSUNAN RPS DAN RTM PELATIHAN'),
(56, '448302', '1292', '109', 88275000, 45448800, 'WORKSHOP PENYUSUNAN RPS DAN RTM PELATIHAN'),
(57, '448302', '1292', '109', 90000000, 0, 'PENCETAKAN BUKU RPS DAN RTM PELATIHAN'),
(58, '448302', '1292', '109', 500000, 500000, 'LAPORAN KEGIATAN'),
(59, '448302', '1292', '110', 126966000, 92648050, 'Persiapan'),
(60, '448302', '1292', '110', 391079000, 225181850, 'Pelaksanaan'),
(61, '448302', '1292', '110', 28000000, 8232400, 'Pelaporan'),
(62, '448302', '1292', '110', 22015000, 16461700, 'Kompilasi'),
(63, '448302', '1292', '110', 50449000, 6375000, 'Persiapan'),
(64, '448302', '1292', '110', 63860000, 30631000, 'Pelaksanaan'),
(65, '448302', '1292', '110', 31250000, 16165000, 'Pelaporan'),
(66, '448302', '1292', '110', 65740000, 63740000, 'Kompilasi'),
(67, '448302', '1292', '111', 454024000, 284125050, 'Penyusunan rencana program dan Penyusunan rencana anggaran'),
(68, '448302', '1292', '111', 711833000, 514530800, 'Pelaksanaan pemantauan dan evaluasi'),
(69, '448302', '1293', '301', 1078416000, 677040835, 'Penyelenggaraan Bimbingan dan Pengawasan Praja'),
(70, '448302', '1293', '301', 1179297000, 1000668139, 'Penyelenggaraan Kegiatan Ekstrakurikuler Praja'),
(71, '448302', '1293', '301', 647269000, 329341160, 'Penyelenggaraan Administrasi Keprajaan dan Kemahasiswaan'),
(72, '448302', '1293', '301', 11907913000, 11004183431, 'Penerimaan Calon Praja IPDN'),
(73, '448302', '1293', '301', 87370000, 42257000, 'Pengelolaan Data Alumni'),
(74, '448302', '1293', '301', 84711000, 49457690, 'Survei Tingkat Kepuasan Stakeholder Terhadap Alumni Pendidikan Tinggi Kepamongprajaan'),
(75, '448302', '1293', '301', 1162541000, 51496200, 'Penyelenggaraan Penegakan Disiplin Praja'),
(76, '448302', '1294', '201', 3302144000, 2291115484, 'Pengadaan perangkat pengolah data dan komunikasi'),
(77, '448302', '1294', '201', 7361566000, 1386505000, 'Pengadaan peralatan fasilitas perkantoran'),
(78, '448302', '1294', '201', 1126100000, 677497000, 'Pembangunan/renovasi gedung dan bangunan'),
(79, '448302', '1294', '202', 457706000, 327236756, 'Pengelolaan keuangan dan perbendaharaan'),
(80, '448302', '1294', '202', 12012263000, 9295163234, 'Pelayanan umum, Pelayanan rumah tangga dan perlengkapan'),
(81, '448302', '1294', '203', 121863240000, 93656799482, 'Gaji dan Tunjangan'),
(82, '448302', '1294', '203', 130307746000, 87856768412, 'Operasional dan Pemeliharaan Kantor'),
(83, '448302', '1286', '401', 54457000, 54399400, 'Kerjasama Dengan Pemerintah Daerah'),
(84, '448302', '1286', '401', 68193000, 67923100, 'Kerjasama Dengan Perguruan Tinggi (PTN/PTS)'),
(85, '448302', '1286', '401', 232804000, 208550160, 'Kerjasama Dengan Lembaga Lainnya'),
(86, '448302', '1286', '402', 188468000, 166625402, 'Peraturan Menteri Dalam Negeri Terkait IPDN'),
(87, '448302', '1286', '402', 4545000, 4504750, 'Peraturan Rektor Terkait Tindak Lanjut dari permendagri Nomor 42 dan 43 Tahun 2018'),
(88, '448302', '1286', '403', 64121000, 56654000, 'Pelaksanaan Bantuan Hukum'),
(89, '448302', '1286', '404', 164512000, 141507300, 'Pengelolaan Informasi dan Pengaduan'),
(90, '448302', '1286', '404', 389440000, 326544994, 'Dokumentasi dan Publikasi'),
(91, '448302', '1286', '405', 408580000, 325996000, 'Pelaksanaan Reformasi Birokrasi'),
(92, '448302', '1286', '405', 87800000, 79410900, 'Pemantauan dan Evaluasi Reformasi Birokrasi'),
(93, '448302', '1286', '406', 367537000, 317781608, 'Pengelolaan kepegawaian'),
(94, '448302', '1292', '101', 1214627000, 855953707, 'Penyelenggaraan Administrasi Keakademikan'),
(95, '448302', '1292', '101', 1956559000, 1420923626, 'Penyelenggaraan Fakultas Politik Pemerintahan'),
(96, '448302', '1292', '101', 2031386000, 1012734367, 'Penyelenggaraan Fakultas Manajemen Pemerintahan'),
(97, '448302', '1292', '101', 1143371000, 865487844, 'Penyelenggaraan Pelatihan'),
(98, '448302', '1292', '101', 3339757000, 2782739451, 'Evaluasi Penyelenggaraan Pendidikan'),
(99, '448302', '1292', '101', 555534000, 310998113, 'Penyelenggaraan Fakultas Hukum Tata Pemerintahan'),
(100, '448302', '1292', '101', 21633000, 21632400, 'Peningkatan  dan Pengembangan Kualitas dan Kompetensi Tenaga Pendidik'),
(101, '448302', '1292', '101', 2924290000, 1645632679, 'Penyelenggaraan Administrasi Keakademikan Program Pasca Sarjana'),
(102, '448302', '1292', '101', 2421356000, 1043963251, 'Penyelenggaraan Pendidikan Program Magister (S2)'),
(103, '448302', '1292', '101', 3557269000, 2263101266, 'Penyelenggaraan Pendidikan Program Doktoral (S3)'),
(104, '448302', '1292', '101', 529068000, 508162671, 'Evaluasi Penyelenggaraan Pendidikan'),
(105, '448302', '1292', '101', 648440000, 136395797, 'Penyelenggaraan Administrasi Keakademikan Program Profesi Kepamongprajaan'),
(106, '448302', '1292', '101', 320345000, 33240000, 'Penyelenggaraan Pendidikan Program Profesi Kepamongprajaan'),
(107, '448302', '1292', '101', 48290000, 0, 'Evaluasi Penyelenggaraan Pendidikan'),
(108, '448302', '1292', '102', 673561000, 358446990, 'Akreditasi Pendidikan Kepamongprajaan'),
(109, '448302', '1292', '102', 589438000, 345223979, 'Audit Mutu Internal'),
(110, '448302', '1292', '103', 304425000, 187275709, 'Rencana Aksi, Kaji Tindak, Evaluasi, dan Seminar Hasil Pelaksanaan Pengabdian Masyarakat'),
(111, '448302', '1292', '103', 8800000, 8794500, 'Pelaksanaan Program Pengabdian Masyarakat Desa Binaan Berbasis Interdisipliner'),
(112, '448302', '1292', '103', 89957000, 44105000, 'Pelaksanaan Pengabdian Masyarakat Desa Binaan Berbasis Program Studi'),
(113, '448302', '1292', '103', 205930000, 71439500, 'Pelaksanaan Pengabdian Masyarakat Berbasis Riset dan Kajian'),
(114, '448302', '1292', '103', 87073000, 85779000, 'Pelaksanaan Pengabdian Masyarakat Bersinergi dengan Praktek Lapangan'),
(115, '448302', '1292', '103', 218110000, 216983020, 'Pelaksanaan Kajian Pemerintahan'),
(116, '448302', '1292', '103', 1204811000, 1058767940, 'Pelaksanaan Penelitian Mandiri, Kelompok dan Unggulan'),
(117, '448302', '1292', '103', 52679000, 0, 'Seminar Hasil Kajian dan Penelitian'),
(118, '448302', '1292', '103', 119160000, 27367980, 'Evaluasi, Rencana Aksi, dan Publikasi Hasil Pelaksanaan Penelitian'),
(119, '448302', '1292', '104', 194025000, 143584000, 'Administrasi Dan Layanan Perpustakaan'),
(120, '448302', '1292', '105', 609930000, 255767200, 'Pengelolaan Data dan Informasi'),
(121, '448302', '1292', '106', 473952000, 247736950, 'Jurnal Lembaga'),
(122, '448302', '1292', '106', 207391000, 54285000, 'Jurnal Fakultas'),
(123, '448302', '1292', '106', 531818000, 176765000, 'Jurnal Program Diploma'),
(124, '448302', '1292', '107', 254253000, 253529850, 'Laboratorium Bahasa'),
(125, '448302', '1292', '107', 141188000, 94499217, 'Laboratorium dan Museum Sejarah Pemerintahan'),
(126, '448302', '1292', '108', 39850000, 39597600, 'PENETAPAN TEMA LITERATUR, PENULISAN, EDITOR, SELEKSI PROPOSAL PENULISAN DAN KOMPILASI DATA'),
(127, '448302', '1292', '108', 642850000, 463862000, 'PENYUSUNAN LITERATUR'),
(128, '448302', '1292', '108', 76250000, 26963400, 'WORKSHOP PENYUSUNAN LITERATUR'),
(129, '448302', '1292', '108', 150000000, 0, 'PENCETAKAN BUKU LITERATUR'),
(130, '448302', '1292', '108', 500000, 0, 'PELAPORAN KEGIATAN'),
(131, '448302', '1292', '109', 1800000, 1800000, 'PENETAPAN PENULISAN  RPS DAN RTM PENGAJARAN'),
(132, '448302', '1292', '109', 136462000, 136012000, 'PENYUSUNAN RPS DAN RTM PENGAJARAN'),
(133, '448302', '1292', '109', 302229000, 76548800, 'WORKSHOP PENYUSUNAN RPS DAN RTM PENGAJARAN'),
(134, '448302', '1292', '109', 112500000, 111441600, 'PENCETAKAN BUKU RPS DAN RTM PENGAJARAN'),
(135, '448302', '1292', '109', 500000, 500000, 'PELAPORAN KEGIATAN'),
(136, '448302', '1292', '109', 1800000, 1800000, 'PENETAPAN PENULIS RPS DAN RTM PELATIHAN'),
(137, '448302', '1292', '109', 56145000, 53145000, 'PENYUSUNAN RPS DAN RTM PELATIHAN'),
(138, '448302', '1292', '109', 88275000, 45448800, 'WORKSHOP PENYUSUNAN RPS DAN RTM PELATIHAN'),
(139, '448302', '1292', '109', 90000000, 0, 'PENCETAKAN BUKU RPS DAN RTM PELATIHAN'),
(140, '448302', '1292', '109', 500000, 500000, 'LAPORAN KEGIATAN'),
(141, '448302', '1292', '110', 126966000, 92648050, 'Persiapan'),
(142, '448302', '1292', '110', 391079000, 225181850, 'Pelaksanaan'),
(143, '448302', '1292', '110', 28000000, 8232400, 'Pelaporan'),
(144, '448302', '1292', '110', 22015000, 16461700, 'Kompilasi'),
(145, '448302', '1292', '110', 50449000, 6375000, 'Persiapan'),
(146, '448302', '1292', '110', 63860000, 30631000, 'Pelaksanaan'),
(147, '448302', '1292', '110', 31250000, 16165000, 'Pelaporan'),
(148, '448302', '1292', '110', 65740000, 63740000, 'Kompilasi'),
(149, '448302', '1292', '111', 454024000, 284125050, 'Penyusunan rencana program dan Penyusunan rencana anggaran'),
(150, '448302', '1292', '111', 711833000, 514530800, 'Pelaksanaan pemantauan dan evaluasi'),
(151, '448302', '1293', '301', 1078416000, 677040835, 'Penyelenggaraan Bimbingan dan Pengawasan Praja'),
(152, '448302', '1293', '301', 1179297000, 1000668139, 'Penyelenggaraan Kegiatan Ekstrakurikuler Praja'),
(153, '448302', '1293', '301', 647269000, 329341160, 'Penyelenggaraan Administrasi Keprajaan dan Kemahasiswaan'),
(154, '448302', '1293', '301', 11907913000, 11004183431, 'Penerimaan Calon Praja IPDN'),
(155, '448302', '1293', '301', 87370000, 42257000, 'Pengelolaan Data Alumni'),
(156, '448302', '1293', '301', 84711000, 49457690, 'Survei Tingkat Kepuasan Stakeholder Terhadap Alumni Pendidikan Tinggi Kepamongprajaan'),
(157, '448302', '1293', '301', 1162541000, 51496200, 'Penyelenggaraan Penegakan Disiplin Praja'),
(158, '448302', '1294', '201', 3302144000, 2291115484, 'Pengadaan perangkat pengolah data dan komunikasi'),
(159, '448302', '1294', '201', 7361566000, 1386505000, 'Pengadaan peralatan fasilitas perkantoran'),
(160, '448302', '1294', '201', 1126100000, 677497000, 'Pembangunan/renovasi gedung dan bangunan'),
(161, '448302', '1294', '202', 457706000, 327236756, 'Pengelolaan keuangan dan perbendaharaan'),
(162, '448302', '1294', '202', 12012263000, 9295163234, 'Pelayanan umum, Pelayanan rumah tangga dan perlengkapan'),
(163, '448302', '1294', '203', 121863240000, 93656799482, 'Gaji dan Tunjangan'),
(164, '448302', '1294', '203', 130307746000, 87856768412, 'Operasional dan Pemeliharaan Kantor'),
(165, '448302', '1286', '401', 54457000, 54399400, 'Kerjasama Dengan Pemerintah Daerah'),
(166, '448302', '1286', '401', 68193000, 67923100, 'Kerjasama Dengan Perguruan Tinggi (PTN/PTS)'),
(167, '448302', '1286', '401', 232804000, 208550160, 'Kerjasama Dengan Lembaga Lainnya'),
(168, '448302', '1286', '402', 188468000, 166625402, 'Peraturan Menteri Dalam Negeri Terkait IPDN'),
(169, '448302', '1286', '402', 4545000, 4504750, 'Peraturan Rektor Terkait Tindak Lanjut dari permendagri Nomor 42 dan 43 Tahun 2018'),
(170, '448302', '1286', '403', 64121000, 56654000, 'Pelaksanaan Bantuan Hukum'),
(171, '448302', '1286', '404', 164512000, 141507300, 'Pengelolaan Informasi dan Pengaduan'),
(172, '448302', '1286', '404', 389440000, 326544994, 'Dokumentasi dan Publikasi'),
(173, '448302', '1286', '405', 408580000, 325996000, 'Pelaksanaan Reformasi Birokrasi'),
(174, '448302', '1286', '405', 87800000, 79410900, 'Pemantauan dan Evaluasi Reformasi Birokrasi'),
(175, '448302', '1286', '406', 367537000, 317781608, 'Pengelolaan kepegawaian'),
(176, '448302', '1292', '101', 1214627000, 855953707, 'Penyelenggaraan Administrasi Keakademikan'),
(177, '448302', '1292', '101', 1956559000, 1420923626, 'Penyelenggaraan Fakultas Politik Pemerintahan'),
(178, '448302', '1292', '101', 2031386000, 1012734367, 'Penyelenggaraan Fakultas Manajemen Pemerintahan'),
(179, '448302', '1292', '101', 1143371000, 865487844, 'Penyelenggaraan Pelatihan'),
(180, '448302', '1292', '101', 3339757000, 2782739451, 'Evaluasi Penyelenggaraan Pendidikan'),
(181, '448302', '1292', '101', 555534000, 310998113, 'Penyelenggaraan Fakultas Hukum Tata Pemerintahan'),
(182, '448302', '1292', '101', 21633000, 21632400, 'Peningkatan  dan Pengembangan Kualitas dan Kompetensi Tenaga Pendidik'),
(183, '448302', '1292', '101', 2924290000, 1645632679, 'Penyelenggaraan Administrasi Keakademikan Program Pasca Sarjana'),
(184, '448302', '1292', '101', 2421356000, 1043963251, 'Penyelenggaraan Pendidikan Program Magister (S2)'),
(185, '448302', '1292', '101', 3557269000, 2263101266, 'Penyelenggaraan Pendidikan Program Doktoral (S3)'),
(186, '448302', '1292', '101', 529068000, 508162671, 'Evaluasi Penyelenggaraan Pendidikan'),
(187, '448302', '1292', '101', 648440000, 136395797, 'Penyelenggaraan Administrasi Keakademikan Program Profesi Kepamongprajaan'),
(188, '448302', '1292', '101', 320345000, 33240000, 'Penyelenggaraan Pendidikan Program Profesi Kepamongprajaan'),
(189, '448302', '1292', '101', 48290000, 0, 'Evaluasi Penyelenggaraan Pendidikan'),
(190, '448302', '1292', '102', 673561000, 358446990, 'Akreditasi Pendidikan Kepamongprajaan'),
(191, '448302', '1292', '102', 589438000, 345223979, 'Audit Mutu Internal'),
(192, '448302', '1292', '103', 304425000, 187275709, 'Rencana Aksi, Kaji Tindak, Evaluasi, dan Seminar Hasil Pelaksanaan Pengabdian Masyarakat'),
(193, '448302', '1292', '103', 8800000, 8794500, 'Pelaksanaan Program Pengabdian Masyarakat Desa Binaan Berbasis Interdisipliner'),
(194, '448302', '1292', '103', 89957000, 44105000, 'Pelaksanaan Pengabdian Masyarakat Desa Binaan Berbasis Program Studi'),
(195, '448302', '1292', '103', 205930000, 71439500, 'Pelaksanaan Pengabdian Masyarakat Berbasis Riset dan Kajian'),
(196, '448302', '1292', '103', 87073000, 85779000, 'Pelaksanaan Pengabdian Masyarakat Bersinergi dengan Praktek Lapangan'),
(197, '448302', '1292', '103', 218110000, 216983020, 'Pelaksanaan Kajian Pemerintahan'),
(198, '448302', '1292', '103', 1204811000, 1058767940, 'Pelaksanaan Penelitian Mandiri, Kelompok dan Unggulan'),
(199, '448302', '1292', '103', 52679000, 0, 'Seminar Hasil Kajian dan Penelitian'),
(200, '448302', '1292', '103', 119160000, 27367980, 'Evaluasi, Rencana Aksi, dan Publikasi Hasil Pelaksanaan Penelitian'),
(201, '448302', '1292', '104', 194025000, 143584000, 'Administrasi Dan Layanan Perpustakaan'),
(202, '448302', '1292', '105', 609930000, 255767200, 'Pengelolaan Data dan Informasi'),
(203, '448302', '1292', '106', 473952000, 247736950, 'Jurnal Lembaga'),
(204, '448302', '1292', '106', 207391000, 54285000, 'Jurnal Fakultas'),
(205, '448302', '1292', '106', 531818000, 176765000, 'Jurnal Program Diploma'),
(206, '448302', '1292', '107', 254253000, 253529850, 'Laboratorium Bahasa'),
(207, '448302', '1292', '107', 141188000, 94499217, 'Laboratorium dan Museum Sejarah Pemerintahan'),
(208, '448302', '1292', '108', 39850000, 39597600, 'PENETAPAN TEMA LITERATUR, PENULISAN, EDITOR, SELEKSI PROPOSAL PENULISAN DAN KOMPILASI DATA'),
(209, '448302', '1292', '108', 642850000, 463862000, 'PENYUSUNAN LITERATUR'),
(210, '448302', '1292', '108', 76250000, 26963400, 'WORKSHOP PENYUSUNAN LITERATUR'),
(211, '448302', '1292', '108', 150000000, 0, 'PENCETAKAN BUKU LITERATUR'),
(212, '448302', '1292', '108', 500000, 0, 'PELAPORAN KEGIATAN'),
(213, '448302', '1292', '109', 1800000, 1800000, 'PENETAPAN PENULISAN  RPS DAN RTM PENGAJARAN'),
(214, '448302', '1292', '109', 136462000, 136012000, 'PENYUSUNAN RPS DAN RTM PENGAJARAN'),
(215, '448302', '1292', '109', 302229000, 76548800, 'WORKSHOP PENYUSUNAN RPS DAN RTM PENGAJARAN'),
(216, '448302', '1292', '109', 112500000, 111441600, 'PENCETAKAN BUKU RPS DAN RTM PENGAJARAN'),
(217, '448302', '1292', '109', 500000, 500000, 'PELAPORAN KEGIATAN'),
(218, '448302', '1292', '109', 1800000, 1800000, 'PENETAPAN PENULIS RPS DAN RTM PELATIHAN'),
(219, '448302', '1292', '109', 56145000, 53145000, 'PENYUSUNAN RPS DAN RTM PELATIHAN'),
(220, '448302', '1292', '109', 88275000, 45448800, 'WORKSHOP PENYUSUNAN RPS DAN RTM PELATIHAN'),
(221, '448302', '1292', '109', 90000000, 0, 'PENCETAKAN BUKU RPS DAN RTM PELATIHAN'),
(222, '448302', '1292', '109', 500000, 500000, 'LAPORAN KEGIATAN'),
(223, '448302', '1292', '110', 126966000, 92648050, 'Persiapan'),
(224, '448302', '1292', '110', 391079000, 225181850, 'Pelaksanaan'),
(225, '448302', '1292', '110', 28000000, 8232400, 'Pelaporan'),
(226, '448302', '1292', '110', 22015000, 16461700, 'Kompilasi'),
(227, '448302', '1292', '110', 50449000, 6375000, 'Persiapan'),
(228, '448302', '1292', '110', 63860000, 30631000, 'Pelaksanaan'),
(229, '448302', '1292', '110', 31250000, 16165000, 'Pelaporan'),
(230, '448302', '1292', '110', 65740000, 63740000, 'Kompilasi'),
(231, '448302', '1292', '111', 454024000, 284125050, 'Penyusunan rencana program dan Penyusunan rencana anggaran'),
(232, '448302', '1292', '111', 711833000, 514530800, 'Pelaksanaan pemantauan dan evaluasi'),
(233, '448302', '1293', '301', 1078416000, 677040835, 'Penyelenggaraan Bimbingan dan Pengawasan Praja'),
(234, '448302', '1293', '301', 1179297000, 1000668139, 'Penyelenggaraan Kegiatan Ekstrakurikuler Praja'),
(235, '448302', '1293', '301', 647269000, 329341160, 'Penyelenggaraan Administrasi Keprajaan dan Kemahasiswaan'),
(236, '448302', '1293', '301', 11907913000, 11004183431, 'Penerimaan Calon Praja IPDN'),
(237, '448302', '1293', '301', 87370000, 42257000, 'Pengelolaan Data Alumni'),
(238, '448302', '1293', '301', 84711000, 49457690, 'Survei Tingkat Kepuasan Stakeholder Terhadap Alumni Pendidikan Tinggi Kepamongprajaan'),
(239, '448302', '1293', '301', 1162541000, 51496200, 'Penyelenggaraan Penegakan Disiplin Praja'),
(240, '448302', '1294', '201', 3302144000, 2291115484, 'Pengadaan perangkat pengolah data dan komunikasi'),
(241, '448302', '1294', '201', 7361566000, 1386505000, 'Pengadaan peralatan fasilitas perkantoran'),
(242, '448302', '1294', '201', 1126100000, 677497000, 'Pembangunan/renovasi gedung dan bangunan'),
(243, '448302', '1294', '202', 457706000, 327236756, 'Pengelolaan keuangan dan perbendaharaan'),
(244, '448302', '1294', '202', 12012263000, 9295163234, 'Pelayanan umum, Pelayanan rumah tangga dan perlengkapan'),
(245, '448302', '1294', '203', 121863240000, 93656799482, 'Gaji dan Tunjangan'),
(246, '448302', '1294', '203', 130307746000, 87856768412, 'Operasional dan Pemeliharaan Kantor');

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
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `umur`) VALUES
(1, 'Apa', '0'),
(2, 'aku', '0'),
(3, 'Kamu', '0'),
(4, 'Apa', '0'),
(5, 'aku', '0'),
(6, 'Kamu', '0'),
(7, 'Apa', 'L'),
(8, 'aku', 'L'),
(9, 'Kamu', 'L'),
(10, '', ''),
(11, '', ''),
(12, '', ''),
(13, 'INSTITUT PEMERINTAHAN DALAM NEGERI', ''),
(14, 'BERDASARKAN DATA SPAN', ''),
(15, '', ''),
(16, '', ''),
(17, '', ''),
(18, '', ''),
(19, 'No.', 'Kod'),
(20, '', ''),
(21, '010.01.12.', ''),
(22, '1', '448'),
(23, '', '128'),
(24, '', '129'),
(25, '', '129'),
(26, '', '129'),
(27, '', '129'),
(28, '2', '352'),
(29, '3', '677'),
(30, '4', '677'),
(31, '5', '677'),
(32, '6', '683'),
(33, '7', '683'),
(34, '8', '683'),
(35, '', ''),
(36, '', ''),
(37, 'Sumber', ''),
(38, 'Data Sistem Perbendaharaan dan Anggaran Negara ( S', ''),
(39, '', ''),
(40, '', ''),
(41, '', ''),
(42, '', '');

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
  `sisa` bigint(150) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_span`
--

INSERT INTO `tbl_span` (`id_span`, `kode_satker`, `nama_satker`, `pagu_bp`, `realisasi_bp`, `persentase_bp`, `pagu_bb`, `realisasi_bb`, `persentase_bb`, `pagu_bm`, `realisasi_bm`, `persentase_bm`, `pagu_t`, `realisasi_t`, `persentase_t`, `sisa`, `created_date`) VALUES
(1, '448302', 'IPDN KAMPUS JATINANGOR', 112930090000, 94138695189, '83.36%', 201633066000, 133014436771, '65.97%', 17860660000, 4591617484, '25.71%', 332423816000, 231744749444, '69.71%', 100679066556, '2020-11-06'),
(2, '352593', 'IPDN KAMPUS JAKARTA', 23313047000, 19910872044, '85.41%', 22141734000, 15486861127, '69.94%', 1482844000, 939691500, '63.37%', 46937625000, 36337424671, '77.42%', 10600200329, '2020-11-06'),
(3, '677010', 'IPDN KAMPUS SULAWESI UTARA', 6758697000, 5645353721, '83.53%', 25101764000, 19423902649, '77.38%', 322000000, 58560000, '18.19%', 32182461000, 25127816370, '78.08%', 7054644630, '2020-11-06'),
(4, '677024', 'IPDN KAMPUS SULAWESI SELATAN', 8374205000, 7212784549, '86.13%', 23132225000, 17522416082, '75.75%', 253500000, 198500000, '78.30%', 31759930000, 24933700631, '78.51%', 6826229369, '2020-11-06'),
(5, '677045', 'IPDN KAMPUS SUMATERA BARAT', 7285747000, 6094496495, '83.65%', 23053939000, 16927697439, '73.43%', 279920000, 245863000, '87.83%', 30619606000, 23268056934, '75.99%', 7351549066, '2020-11-06'),
(6, '683070', 'IPDN KAMPUS KALIMANTAN BARAT', 4756188000, 3970708811, '83.49%', 14462094000, 10603599670, '73.32%', 7073478000, 4996394500, '70.64%', 26291760000, 19570702981, '74.44%', 6721057019, '2020-11-06'),
(7, '683084', 'IPDN KAMPUS NUSA TENGGARA BARAT', 9856653000, 8430873717, '85.53%', 19481863000, 14151013920, '72.64%', 461417000, 180714350, '39.17%', 29799933000, 22762601987, '76.38%', 7037331013, '2020-11-06'),
(8, '683091', 'IPDN KAMPUS PAPUA', 5078831000, 4035796375, '79.46%', 25156863000, 19405458730, '77.14%', 1216600000, 750000000, '61.65%', 31452294000, 24191255105, '76.91%', 7261038895, '2020-11-06');

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
(1, '1286', 'Penyelenggaraan Administrasi Kerjasama dan Hukum', '0', 0, '0.00%', 2030457000, 1756528114, '86.51%', 0, 0, '0.00%', 2030457000, 1756528114, '86.51%', '273928886', '2020-11-06'),
(2, '1292', 'Penyelenggaraan Administrasi Akademik dan Perencanaan Pendidikan Kepamongprajaan', '0', 0, '0.00%', 28215394000, 18849927193, '66.81%', 180000000, 178000000, '98.89%', 28395394000, 19027927193, '67.01%', '9367466807', '2020-11-06'),
(3, '1293', 'Penyelenggaraan Administrasi Keprajaan dan Kemahasiswaan', '0', 0, '0.00%', 16147517000, 13347590682, '82.66%', 0, 0, '0.00%', 16147517000, 13347590682, '82.66%', '2799926318', '2020-11-06'),
(4, '1294', 'Pengelolaan Administrasi Umum dan Keuangan Pendidikan Kepamongprajaan', '112930090000', 94138695189, '83.36%', 155239698000, 99060390782, '63.81%', 17680660000, 4413617484, '24.96%', 285850448000, 197612703455, '69.13%', '88237744545', '2020-11-06');

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

-- --------------------------------------------------------

--
-- Table structure for table `unit_sas`
--

CREATE TABLE `unit_sas` (
  `id` int(11) NOT NULL,
  `kode_satker` varchar(50) DEFAULT NULL,
  `id_c` varchar(50) DEFAULT NULL,
  `id_b` varchar(50) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_sas`
--

INSERT INTO `unit_sas` (`id`, `kode_satker`, `id_c`, `id_b`, `ket`) VALUES
(1, '448302', '401', '1286', 'Kerjasama IPDN'),
(2, '448302', '402', '1286', 'Kebijakan/Regulasi Lingkup IPDN yang ditetapkan'),
(3, '448302', '403', '1286', 'Penanganan Sengketa Hukum Terkait IPDN'),
(4, '448302', '404', '1286', 'Publikasi Informasi dan Penanganan Pengaduan Lingkup IPDN'),
(5, '448302', '405', '1286', 'Nilai Capaian Kinerja Reformasi Birokrasi lingkup IPDN'),
(6, '448302', '406', '1286', 'Layanan Dukungan Manajemen Satker'),
(7, '448302', '101', '1292', 'Penyelenggaraan Pendidikan Kepamongprajaan'),
(8, '448302', '102', '1292', 'Audit Mutu Pendidikan/Akreditasi'),
(9, '448302', '103', '1292', 'Kajian, Penelitian dan Pengabdian Masyarakat Lingkup IPDN'),
(10, '448302', '104', '1292', 'Pengelolaan Layanan Perpustakaan'),
(11, '448302', '105', '1292', 'Pengelolaan Teknologi Informasi Kelembagaan Pendidikan Kepamongprajaan'),
(12, '448302', '106', '1292', 'Jurnal'),
(13, '448302', '107', '1292', 'Pengelolaan Laboratorium Pendidikan Kepamongprajaan'),
(14, '448302', '108', '1292', 'Literatur'),
(15, '448302', '109', '1292', 'RPS/RTM'),
(16, '448302', '110', '1292', 'Perencanaan [SBKU]'),
(17, '448302', '111', '1292', 'Layanan Dukungan Manajemen Satker'),
(18, '448302', '301', '1293', 'Pengelolaan Administrasi Keprajaan dan Alumni'),
(19, '448302', '201', '1294', 'Layanan Sarana dan Prasarana Internal'),
(20, '448302', '202', '1294', 'Layanan Dukungan Manajemen Satker'),
(21, '448302', '203', '1294', 'Layanan Perkantoran'),
(22, '448302', '401', '1286', 'Kerjasama IPDN'),
(23, '448302', '402', '1286', 'Kebijakan/Regulasi Lingkup IPDN yang ditetapkan'),
(24, '448302', '403', '1286', 'Penanganan Sengketa Hukum Terkait IPDN'),
(25, '448302', '404', '1286', 'Publikasi Informasi dan Penanganan Pengaduan Lingkup IPDN'),
(26, '448302', '405', '1286', 'Nilai Capaian Kinerja Reformasi Birokrasi lingkup IPDN'),
(27, '448302', '406', '1286', 'Layanan Dukungan Manajemen Satker'),
(28, '448302', '101', '1292', 'Penyelenggaraan Pendidikan Kepamongprajaan'),
(29, '448302', '102', '1292', 'Audit Mutu Pendidikan/Akreditasi'),
(30, '448302', '103', '1292', 'Kajian, Penelitian dan Pengabdian Masyarakat Lingkup IPDN'),
(31, '448302', '104', '1292', 'Pengelolaan Layanan Perpustakaan'),
(32, '448302', '105', '1292', 'Pengelolaan Teknologi Informasi Kelembagaan Pendidikan Kepamongprajaan'),
(33, '448302', '106', '1292', 'Jurnal'),
(34, '448302', '107', '1292', 'Pengelolaan Laboratorium Pendidikan Kepamongprajaan'),
(35, '448302', '108', '1292', 'Literatur'),
(36, '448302', '109', '1292', 'RPS/RTM'),
(37, '448302', '110', '1292', 'Perencanaan [SBKU]'),
(38, '448302', '111', '1292', 'Layanan Dukungan Manajemen Satker'),
(39, '448302', '301', '1293', 'Pengelolaan Administrasi Keprajaan dan Alumni'),
(40, '448302', '201', '1294', 'Layanan Sarana dan Prasarana Internal'),
(41, '448302', '202', '1294', 'Layanan Dukungan Manajemen Satker'),
(42, '448302', '203', '1294', 'Layanan Perkantoran'),
(43, '448302', '401', '1286', 'Kerjasama IPDN'),
(44, '448302', '402', '1286', 'Kebijakan/Regulasi Lingkup IPDN yang ditetapkan'),
(45, '448302', '403', '1286', 'Penanganan Sengketa Hukum Terkait IPDN'),
(46, '448302', '404', '1286', 'Publikasi Informasi dan Penanganan Pengaduan Lingkup IPDN'),
(47, '448302', '405', '1286', 'Nilai Capaian Kinerja Reformasi Birokrasi lingkup IPDN'),
(48, '448302', '406', '1286', 'Layanan Dukungan Manajemen Satker'),
(49, '448302', '101', '1292', 'Penyelenggaraan Pendidikan Kepamongprajaan'),
(50, '448302', '102', '1292', 'Audit Mutu Pendidikan/Akreditasi'),
(51, '448302', '103', '1292', 'Kajian, Penelitian dan Pengabdian Masyarakat Lingkup IPDN'),
(52, '448302', '104', '1292', 'Pengelolaan Layanan Perpustakaan'),
(53, '448302', '105', '1292', 'Pengelolaan Teknologi Informasi Kelembagaan Pendidikan Kepamongprajaan'),
(54, '448302', '106', '1292', 'Jurnal'),
(55, '448302', '107', '1292', 'Pengelolaan Laboratorium Pendidikan Kepamongprajaan'),
(56, '448302', '108', '1292', 'Literatur'),
(57, '448302', '109', '1292', 'RPS/RTM'),
(58, '448302', '110', '1292', 'Perencanaan [SBKU]'),
(59, '448302', '111', '1292', 'Layanan Dukungan Manajemen Satker'),
(60, '448302', '301', '1293', 'Pengelolaan Administrasi Keprajaan dan Alumni'),
(61, '448302', '201', '1294', 'Layanan Sarana dan Prasarana Internal'),
(62, '448302', '202', '1294', 'Layanan Dukungan Manajemen Satker'),
(63, '448302', '203', '1294', 'Layanan Perkantoran');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `output_sas`
--
ALTER TABLE `output_sas`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `out_pok`
--
ALTER TABLE `out_pok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
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
-- Indexes for table `unit_sas`
--
ALTER TABLE `unit_sas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `output_sas`
--
ALTER TABLE `output_sas`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `out_pok`
--
ALTER TABLE `out_pok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id_span` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_span_biro`
--
ALTER TABLE `tbl_span_biro`
  MODIFY `id_span_biro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `unit_sas`
--
ALTER TABLE `unit_sas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
