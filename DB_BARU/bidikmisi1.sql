-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 01:29 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidikmisi1`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(5) NOT NULL,
  `npm` int(9) NOT NULL,
  `nama_mahasiswa` varchar(40) NOT NULL,
  `program_studi` varchar(40) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `npm`, `nama_mahasiswa`, `program_studi`, `tahun`) VALUES
(16435, 213305046, 'Vikhi Nur Aliffiyan', 'Teknik Listrik (D3)', 2021),
(29846, 213304041, 'Nabilah Lathifah', 'Teknik Komputer Kontrol (D3)', 2021),
(36779, 214308035, 'Fadly Fadillah', 'Teknik Perkeretapian (D4)', 2021),
(39596, 203307050, 'Dika Saputra', 'Teknologi Informasi (D3)', 2020),
(49236, 213305013, 'Gilbert Kent Utomo', 'Teknik Listrik (D3)', 2021),
(51338, 213101099, 'Fingkan Tria Lestari', 'Administrasi Bisnis (D3)', 2021),
(55123, 213101072, 'Fitrian Aini Fahriza', 'Administrasi Bisnis (D3)', 2021),
(55193, 214308011, 'Fadli Firnansyah', 'Teknik Perkeretapian (D4)', 2021),
(58523, 203202029, 'Siti Sarah', 'Komputerisasi Akuntansi (D3)', 2020),
(61167, 213101084, 'Reni Nor Fatimah', 'Administrasi Bisnis (D3)', 2021),
(74948, 203304031, 'Shesarina Sriberlian Putri', 'Teknik Komputer Kontrol (D3)', 2020),
(75323, 193305021, 'Tika Putri Lestari', 'Teknik Listrik (D3)', 2019),
(78536, 203106090, 'Devi Dwi Agustin', 'Bahasa Inggris (D3)', 2020),
(78749, 214308016, 'Mega Rahayu', 'Teknik Perkeretapian (D4)', 2021),
(87935, 213106030, 'Anisa Nurul Istiqomah ', 'Bahasa Inggris (D3)', 2021),
(92599, 213101117, 'Silvia Damayanti', 'Administrasi Bisnis (D3)', 2021),
(94485, 213209036, 'Daning Indri Ariani', 'Akuntansi (D3)', 2021),
(95886, 213101031, 'Adellya Wahyu Nilasari', 'Administrasi Bisnis (D3)', 2021),
(97838, 203307090, 'Rida Setyo Dewi ', 'Teknologi Informasi (D3)', 2020),
(99847, 193304018, 'Kusuma Mawar Dani', 'Teknik Komputer Kontrol (D3)', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `bobot_alternatif`
--

CREATE TABLE `bobot_alternatif` (
  `id_ba` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `alternatif1` varchar(16) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot_alternatif`
--

INSERT INTO `bobot_alternatif` (`id_ba`, `id_kriteria`, `alternatif1`, `bobot`) VALUES
(888, 73425, '22249', 2),
(6770, 25892, '16435', 9),
(7038, 64596, '22249', 3),
(7565, 73425, '21483', 4),
(12652, 79468, '22249', 2),
(17154, 25892, '36779', 1),
(23596, 79468, '21483', 2),
(27383, 64596, '21483', 8),
(29376, 73425, '36779', 3),
(31725, 25892, '21483', 1),
(38180, 86663, '36779', 5),
(42867, 64596, '21381', 5),
(44611, 79468, '36779', 1),
(51594, 73425, '21381', 2),
(56686, 79468, '21381', 2),
(67283, 86663, '21381', 7),
(69104, 64596, '16435', 8),
(74767, 86663, '16435', 5),
(79303, 64596, '36779', 5),
(84056, 25892, '21381', 9),
(92105, 25892, '22249', 9),
(94289, 79468, '16435', 2),
(98711, 86663, '21483', 5),
(99299, 73425, '16435', 8),
(99475, 86663, '22249', 7);

-- --------------------------------------------------------

--
-- Table structure for table `bobot_kriteria`
--

CREATE TABLE `bobot_kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `kriteria1` int(5) NOT NULL,
  `kriteria2` int(5) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot_kriteria`
--

INSERT INTO `bobot_kriteria` (`id_kriteria`, `kriteria1`, `kriteria2`, `bobot`) VALUES
(6471, 79468, 79468, 0.11),
(6581, 73425, 73425, 0.06),
(10816, 79468, 79468, 0.06),
(11870, 86663, 86663, 0.11),
(12728, 64596, 64596, 0.65),
(13050, 79468, 79468, 0.11),
(15172, 64596, 64596, 0.11),
(16105, 25892, 25892, 0.11),
(32226, 79468, 79468, 0.07),
(33418, 73425, 73425, 0.11),
(44989, 64596, 64596, 0.07),
(45541, 73425, 73425, 0.11),
(47504, 64596, 64596, 0.11),
(52018, 86663, 86663, 0.65),
(52730, 25892, 25892, 0.11),
(53262, 73425, 73425, 0.07),
(64055, 25892, 25892, 0.06),
(69008, 86663, 86663, 0.07),
(73389, 25892, 25892, 0.07),
(78065, 73425, 73425, 0.65),
(82944, 64596, 64596, 0.06),
(85616, 86663, 86663, 0.11),
(86492, 79468, 79468, 0.65),
(88733, 25892, 25892, 0.65),
(98648, 86663, 86663, 0.06);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(5) NOT NULL,
  `id_alternatif` int(5) NOT NULL,
  `hasil` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `hasil`) VALUES
(9979, 36779, 0.20806488458662),
(13419, 21483, 0.20806488458662),
(19858, 36779, 0.20806488458662),
(30699, 21483, 0.20806488458662),
(31785, 22249, 0.10158053462401),
(36419, 16435, 0.33114180766355),
(39494, 21381, 0.15114788853919),
(40497, 16435, 0.33114180766355),
(43009, 22249, 0.10158053462401),
(43866, 16435, 0.33114180766355),
(53004, 36779, 0.20806488458662),
(55373, 21381, 0.15114788853919),
(57301, 21483, 0.20806488458662),
(59054, 36779, 0.20806488458662),
(61774, 36779, 0.20806488458662),
(61924, 22249, 0.10158053462401),
(64063, 21483, 0.20806488458662),
(66159, 21381, 0.15114788853919),
(75929, 21381, 0.15114788853919),
(76993, 16435, 0.33114180766355),
(81152, 21483, 0.20806488458662),
(92526, 22249, 0.10158053462401),
(95909, 16435, 0.33114180766355),
(99176, 21381, 0.15114788853919),
(99743, 22249, 0.10158053462401);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `bobot`) VALUES
(1, 'Bahasa Inggris (D3)', 1),
(2, 'Administrasi Bisnis (D3)', 2),
(3, 'Komputerisasi Akuntansi (D3)', 3),
(4, 'Akuntansi (D3)', 4),
(5, 'Mesin Otomotif (D3)', 5),
(6, 'Teknik Komputer Kontrol (D3)', 6),
(7, 'Teknik Listrik (D3)', 7),
(8, 'Teknologi Informasi (D3)', 8),
(9, 'Teknik Perkeretapian (D4)', 9);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `nama_kriteria` varchar(25) NOT NULL,
  `bobot` int(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `created_at`, `updated_at`, `deleted_at`) VALUES
(25892, '   Pemegang KIP atau BSM', 9, '2022-04-04 20:17:05', '2022-05-15 19:56:02', NULL),
(64596, '   Penghasilan Orang Tua', 2, '2022-04-04 20:14:48', '2022-05-17 22:14:09', NULL),
(73425, '     Tanggungan Orang Tua', 4, '2022-04-04 20:17:18', '2022-05-17 22:14:34', NULL),
(79468, '  Pekerjaan Orang Tua', 5, '2022-04-04 20:16:45', '2022-05-17 22:15:04', NULL),
(86663, '  Rumah  tinggal keluarga', 4, '2022-04-04 20:16:19', '2022-05-17 22:15:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_Skriteria` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `nama_sub` varchar(45) NOT NULL,
  `bobot_sb` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_Skriteria`, `id_kriteria`, `nama_sub`, `bobot_sb`) VALUES
(13742, 64596, ' 750.000 – 2 juta   ', 8),
(15587, 64596, ' 2 juta – 3 juta   ', 5),
(15934, 64596, ' 3 juta – 4 juta   ', 3),
(19942, 73425, '5 orang atau lebih', 8),
(26979, 86663, 'Menumpang', 7),
(31336, 25892, 'Ya ', 9),
(33882, 25892, 'Tidak ', 1),
(38944, 79468, 'Lainnya', 7),
(41572, 79468, 'Swasta ', 5),
(45298, 79468, 'Petani ', 4),
(47988, 73425, '4 orang     ', 6),
(49391, 73425, '3 orang ', 4),
(56121, 79468, 'Wirausaha ', 3),
(65934, 73425, 'kurang dari sama atau sama dengan 2 orang', 2),
(74444, 73425, 'Lainnya ', 1),
(76689, 86663, 'Menyewa       ', 4),
(93233, 86663, 'Milik Sendiri', 2),
(98444, 79468, 'PNS/TNI/POLRI   ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id_Sadmin` int(5) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username_Sadmin` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `akses` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id_Sadmin`, `nama_lengkap`, `username_Sadmin`, `password`, `akses`, `created_at`, `updated_at`) VALUES
(1322, 'Tika Nia', 'nikatika@gmail.com', '$2y$10$ElOtTHD/ECLvW3E2.sNJxe3zRxa9sklIlYnC0wmmJESVHgT0uI/yK', 'Admin', '2022-05-15 17:31:14', '2022-05-16 21:18:34'),
(33333, 'Reonaldo', 'Rey@gmail.com', '$2y$10$leFic9f2wxeCb7Wb80D9huRWOOYMIGXFbuJX0kz30rw6voSnmK2De', 'Super Administrator', NULL, '2022-05-16 21:19:56'),
(51641, 'SUBANI baskoro', 'subani@gmail.com', '$2y$10$/6aOcbnl.iPbqqdX8y5VLuw1RmPOB7q3YS9NfNeCN7bQy8/7Bzm/K', 'Super Administrator', '2022-05-07 23:25:00', '2022-05-16 21:14:24'),
(71366, 'zZA', 'baru@gmail.com', '$2y$10$/6aOcbnl.iPbqqdX8y5VLuw1RmPOB7q3YS9NfNeCN7bQy8/7Bzm/K', 'Admin', '2022-05-08 12:22:09', '2022-05-16 21:14:24'),
(86398, 'mulaiiaqqxsAAuuuu', 'mulai2@gmail.com', '$2y$10$/6aOcbnl.iPbqqdX8y5VLuw1RmPOB7q3YS9NfNeCN7bQy8/7Bzm/K', 'Super Administrator', '2022-04-23 23:11:21', '2022-05-16 21:14:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `bobot_alternatif`
--
ALTER TABLE `bobot_alternatif`
  ADD PRIMARY KEY (`id_ba`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_Skriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id_Sadmin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
