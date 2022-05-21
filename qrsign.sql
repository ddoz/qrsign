-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2022 at 01:38 PM
-- Server version: 5.7.37
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrsign`
--

-- --------------------------------------------------------

--
-- Table structure for table `kartu_kuning`
--

CREATE TABLE `kartu_kuning` (
  `id` int(11) NOT NULL,
  `id_pekerja` int(11) NOT NULL,
  `tahun_cetak` varchar(10) NOT NULL,
  `status_pendaftaran` enum('register','process','signed') NOT NULL,
  `status_kartu` enum('valid','invalid') NOT NULL DEFAULT 'valid',
  `signed_date` datetime NOT NULL,
  `signed_by` int(11) NOT NULL,
  `expired_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_kuning`
--

INSERT INTO `kartu_kuning` (`id`, `id_pekerja`, `tahun_cetak`, `status_pendaftaran`, `status_kartu`, `signed_date`, `signed_by`, `expired_date`) VALUES
(2, 3, '2022', 'signed', 'valid', '2022-04-11 20:12:35', 18, NULL),
(6, 3, '2022', 'signed', 'valid', '2022-04-12 04:45:20', 18, '2024-04-12 04:45:20'),
(7, 5, '2022', 'signed', 'valid', '2022-04-12 20:33:14', 18, '2024-04-12 20:33:14'),
(8, 4, '2022', 'signed', 'valid', '2022-04-12 20:40:32', 20, '2024-04-12 20:40:32'),
(16, 12, '2022', 'signed', 'valid', '2022-05-20 01:14:30', 18, '2024-05-20 01:14:30'),
(20, 13, '2022', 'signed', 'valid', '2022-05-20 08:29:56', 18, '2024-05-20 08:29:56'),
(21, 14, '2022', 'signed', 'valid', '2022-05-20 08:47:22', 20, '2024-05-20 08:47:22'),
(23, 14, '2022', 'register', 'valid', '0000-00-00 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pekerja`
--

CREATE TABLE `pekerja` (
  `id` int(11) NOT NULL,
  `no_pendaftaran` varchar(30) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `status_menikah` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan_terakhir` varchar(50) NOT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `tahun_lulus` varchar(10) NOT NULL,
  `ijazah` text,
  `keterampilan` text NOT NULL,
  `tahun_keterampilan` varchar(10) DEFAULT NULL,
  `keterampilan_2` text,
  `tahun_keterampilan2` varchar(10) DEFAULT NULL,
  `keterampilan_3` text,
  `tahun_keterampilan3` varchar(10) DEFAULT NULL,
  `waktu_pendaftaran` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nik` varchar(20) DEFAULT NULL,
  `scan_ktp` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerja`
--

INSERT INTO `pekerja` (`id`, `no_pendaftaran`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status_menikah`, `agama`, `alamat`, `pendidikan_terakhir`, `nama_sekolah`, `tahun_lulus`, `ijazah`, `keterampilan`, `tahun_keterampilan`, `keterampilan_2`, `tahun_keterampilan2`, `keterampilan_3`, `tahun_keterampilan3`, `waktu_pendaftaran`, `nik`, `scan_ktp`, `foto`, `id_user`) VALUES
(3, 'PKR-00000001', 'Adam', 'hsafk', '2000-10-03', 'Laki-Laki', 'Menikah', 'Islam', 'asfasf', 'D2', NULL, '', NULL, 'asfasg', NULL, NULL, NULL, NULL, NULL, '2022-04-11 19:03:56', '3478659759486', 'c859a27e527c8dfaa60fd892f159f7ab.png', '910893a68385af8b56e7b73f6fb40a00.png', NULL),
(6, 'PKR-00000002', 'Adam j', 'hsafk', '2000-10-03', 'Laki-Laki', 'Menikah', 'Islam', 'asfasf', 'D2', NULL, '', NULL, 'asfasg', NULL, NULL, NULL, NULL, NULL, '2021-04-11 19:03:56', '3478659759486', 'c859a27e527c8dfaa60fd892f159f7ab.png', '910893a68385af8b56e7b73f6fb40a00.png', NULL),
(7, 'PKR-00000003', 'Anya', 'hsafk', '2000-10-03', 'Perempuan', 'Menikah', 'Islam', 'asfasf', 'D2', NULL, '', NULL, 'asfasg', NULL, NULL, NULL, NULL, NULL, '2021-04-11 19:03:56', '3478659759486', 'c859a27e527c8dfaa60fd892f159f7ab.png', '910893a68385af8b56e7b73f6fb40a00.png', NULL),
(8, 'PKR-00000004', 'Testing', 'bandar lampung', '1992-11-12', 'Laki-Laki', 'Menikah', 'Islam', 'bandar lampung', 'D2', NULL, '', NULL, 'testing', NULL, NULL, NULL, NULL, NULL, '2022-04-16 14:17:55', '1111', '830c485d01a29bbe6dea829dff67ed35.png', 'ff1e57143a4c0902d52b243d017ddd46.png', NULL),
(9, 'PKR-00000005', 'Liza Permata Ayu', 'Padang Ratu', '2000-06-09', 'Perempuan', 'Belum Menikah', 'Islam', 'Padang Ratu', 'S1', NULL, '', NULL, 'banyak', NULL, NULL, NULL, NULL, NULL, '2022-04-16 14:23:08', '1234567890', 'c822a540c7db8024d5a75493cd5116d8.jpg', 'cee8fab905bbd9ce0e0527383cee8250.jpg', NULL),
(10, 'PKR-00000006', 'Liza Permata Ayu', 'tanggamus', '2000-06-09', 'Perempuan', 'Belum Menikah', 'Islam', 'asdsrwe', 'D1', NULL, '', NULL, 'e', NULL, NULL, NULL, NULL, NULL, '2022-04-16 14:27:45', '1234567890', '9fd37de2b3b94c6505c7e6658c58bc59.jpg', '6d7a3007ee88e370524af6ce433d939f.jpg', NULL),
(11, 'PKR-00000007', 'permata', 'tanggamus', '2000-06-09', 'Perempuan', 'Belum Menikah', 'Islam', 'lomnjh', 'D1', NULL, '', NULL, 'p', NULL, NULL, NULL, NULL, NULL, '2022-04-16 15:04:35', '1234', '41a9026e665c3b836dad6f93b6215708.JPG', '1b3108733208ecdcd5c6af21cdbd0f2b.JPG', NULL),
(12, 'PKR-00000008', 'ada', 'asfasd', '2022-05-26', 'Laki-Laki', 'Menikah', 'Islam', 'asfs', 'SMA', NULL, '2021', NULL, 'asf', '2021', '', '', '', '', '2022-05-19 18:13:29', '12423', 'a809be66540e61815045cdfbca1545f5.jpeg', 'c7bd0477e7e36bf4f8bcd6c7bb4ed39a.jpeg', 24),
(13, 'PKR-00000009', 'lzaa', 'tanggamus', '2001-06-09', 'Perempuan', 'Belum Menikah', 'Islam', 'tanggamus lampung', 'D1', NULL, '20018', NULL, 'banyak', '2018', '', '', '', '', '2022-05-20 01:18:15', '54321', 'f15424a05c5f5b5bc4aaface6587ea5c.JPG', 'c7f31fac89cebae0a8ff3a44af4770cf.JPG', 28),
(14, 'PKR-00000010', 'Liza Permata Ayu', 'Padang Ratu', '2000-06-09', 'Perempuan', 'Belum Menikah', 'Islam', 'Padang Ratu, Kec. Wonosobo, Kab Tanggamus', 'S1', NULL, '2018', NULL, 'banyak', '2018', '', '', '', '', '2022-05-20 01:45:49', '1806030706980003', '3a447b0e648af27e5a7973315e6f5a80.jpeg', '8446e3484b44fa994551f3c2e781eef0.JPG', 29);

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id` int(11) NOT NULL,
  `nama_pimpinan` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_level` enum('0','1','2') NOT NULL DEFAULT '0',
  `is_admin` enum('0','1') NOT NULL DEFAULT '0',
  `nip` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_level`, `is_admin`, `nip`) VALUES
(1, 'Admin', 'adam.japal@gmail.com', '2022-02-25 23:52:23', '$2y$10$ktpjBjxYljYS.sEHZueD1Orzsf.nhYEDywVqf61I4KS3GnN2jMTme', NULL, '2021-09-24 14:21:13', '2021-09-24 14:21:13', '1', '1', NULL),
(18, 'Pimpinan', 'pimpinan@mail.com', '2022-04-11 12:56:20', '$2y$10$901ZE9WCIspcl7XaQr7Jv.GlvqxkBAtOALxbv1A//bKTZl9ZX1422', NULL, '2022-04-11 12:56:20', '2022-04-11 12:56:20', '0', '0', '32895789342695437985'),
(19, 'Liza', 'liza@mail.com', '2022-04-11 21:47:08', '$2y$10$5Gu9ugQbXEqVJ54nFZEwoe.9E5mL.1zt7BVqqxKHcKn./R1d2OgB6', NULL, '2022-04-11 21:47:08', '2022-04-11 21:47:08', '1', '0', '-'),
(20, 'Hamzani, S.E', 'hamzani@mail.com', '2022-04-12 13:40:09', '$2y$10$ilJGDTIGPBnpJXHv1tTq7e1hEGNAG9MFO0PuwXecAr1HmDR1MKUOS', NULL, '2022-04-12 13:40:09', '2022-04-12 13:40:09', '0', '0', '396142379856'),
(22, 'Liza Permata Ayu', 'liza.permataayu@gmail.com', '2022-05-20 20:25:29', '$2y$10$c4MUwyXY4fEb/UOMNwIM0ehBpyq6EysLv7PD/M.sZaWTggmIXzRoa', NULL, '2022-04-16 21:11:07', '2022-04-16 21:11:07', '0', '0', '1234567'),
(24, 'Adam', 'adam.magnifed@gmail.com', '2022-05-20 05:22:40', '$2y$10$OXGTXASN.K2m7./IHdxNzOW5JtXFmtVcS.Ld1zq5HxMqtdpyXFcVK', NULL, NULL, NULL, '2', '0', NULL),
(29, 'lizapermata', 'liza_permata_ayu@teknokrat.ac.id', '2022-05-20 09:26:59', '$2y$10$KqWBS7f/JCp4PHyKensDgeB5VIZA2Ykb5kbLR9hdBvrtCLL0zIsqK', NULL, NULL, NULL, '2', '0', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kartu_kuning`
--
ALTER TABLE `kartu_kuning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kartu_kuning`
--
ALTER TABLE `kartu_kuning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pekerja`
--
ALTER TABLE `pekerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
