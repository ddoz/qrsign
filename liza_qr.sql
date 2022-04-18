-- Adminer 4.8.1 MySQL 8.0.21 dump
SET
  NAMES utf8;
SET
  time_zone = '+00:00';
SET
  foreign_key_checks = 0;
SET
  sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
SET
  NAMES utf8mb4;
CREATE DATABASE `liza_qr`;
USE `liza_qr`;
DROP TABLE IF EXISTS `kartu_kuning`;
CREATE TABLE `kartu_kuning` (
    `id` int NOT NULL AUTO_INCREMENT,
    `id_pekerja` int NOT NULL,
    `tahun_cetak` varchar(10) NOT NULL,
    `status_pendaftaran` enum('register', 'signed') NOT NULL,
    `status_kartu` enum('valid', 'invalid') NOT NULL DEFAULT 'valid',
    `signed_date` datetime NOT NULL,
    `signed_by` int NOT NULL,
    `expired_date` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB;
INSERT INTO
  `kartu_kuning` (
    `id`,
    `id_pekerja`,
    `tahun_cetak`,
    `status_pendaftaran`,
    `status_kartu`,
    `signed_date`,
    `signed_by`,
    `expired_date`
  )
VALUES
  (
    2,
    3,
    '2022',
    'signed',
    'valid',
    '2022-04-11 20:12:35',
    18,
    NULL
  ),
  (
    6,
    3,
    '2022',
    'signed',
    'valid',
    '2022-04-12 04:45:20',
    18,
    '2024-04-12 04:45:20'
  ),
  (
    7,
    5,
    '2022',
    'signed',
    'valid',
    '2022-04-12 20:33:14',
    18,
    '2024-04-12 20:33:14'
  ),
  (
    8,
    4,
    '2022',
    'signed',
    'valid',
    '2022-04-12 20:40:32',
    20,
    '2024-04-12 20:40:32'
  ),
  (
    9,
    7,
    '2022',
    'register',
    'valid',
    '0000-00-00 00:00:00',
    0,
    NULL
  );
DROP TABLE IF EXISTS `pekerja`;
CREATE TABLE `pekerja` (
    `id` int NOT NULL AUTO_INCREMENT,
    `no_pendaftaran` varchar(30) NOT NULL,
    `nama_lengkap` varchar(100) NOT NULL,
    `tempat_lahir` varchar(100) NOT NULL,
    `tanggal_lahir` date NOT NULL,
    `jenis_kelamin` enum('Laki-Laki', 'Perempuan') NOT NULL,
    `status_menikah` varchar(100) NOT NULL,
    `agama` varchar(100) NOT NULL,
    `alamat` text NOT NULL,
    `pendidikan_terakhir` varchar(50) NOT NULL,
    `keterampilan` text NOT NULL,
    `waktu_pendaftaran` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `nik` varchar(20) DEFAULT NULL,
    `scan_ktp` varchar(255) DEFAULT NULL,
    `foto` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB;
INSERT INTO
  `pekerja` (
    `id`,
    `no_pendaftaran`,
    `nama_lengkap`,
    `tempat_lahir`,
    `tanggal_lahir`,
    `jenis_kelamin`,
    `status_menikah`,
    `agama`,
    `alamat`,
    `pendidikan_terakhir`,
    `keterampilan`,
    `waktu_pendaftaran`,
    `nik`,
    `scan_ktp`,
    `foto`
  )
VALUES
  (
    3,
    'PKR-00000001',
    'Adam',
    'hsafk',
    '2000-10-03',
    'Laki-Laki',
    'Menikah',
    'Islam',
    'asfasf',
    'D2',
    'asfasg',
    '2022-04-11 19:03:56',
    '3478659759486',
    'c859a27e527c8dfaa60fd892f159f7ab.png',
    '910893a68385af8b56e7b73f6fb40a00.png'
  ),
  (
    6,
    'PKR-00000002',
    'Adam j',
    'hsafk',
    '2000-10-03',
    'Laki-Laki',
    'Menikah',
    'Islam',
    'asfasf',
    'D2',
    'asfasg',
    '2021-04-11 19:03:56',
    '3478659759486',
    'c859a27e527c8dfaa60fd892f159f7ab.png',
    '910893a68385af8b56e7b73f6fb40a00.png'
  ),
  (
    7,
    'PKR-00000003',
    'Adam ja',
    'hsafk',
    '2000-10-03',
    'Laki-Laki',
    'Menikah',
    'Islam',
    'asfasf',
    'D2',
    'asfasg',
    '2021-04-11 19:03:56',
    '3478659759486',
    'c859a27e527c8dfaa60fd892f159f7ab.png',
    '910893a68385af8b56e7b73f6fb40a00.png'
  );
DROP TABLE IF EXISTS `pimpinan`;
CREATE TABLE `pimpinan` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nama_pimpinan` varchar(255) NOT NULL,
    `id_user` int NOT NULL,
    `active` enum('0', '1') NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `remember_token` varchar(100) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    `user_level` enum('0', '1') NOT NULL DEFAULT '0',
    `is_admin` enum('0', '1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
    `nip` varchar(40) DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
INSERT INTO
  `users` (
    `id`,
    `name`,
    `email`,
    `email_verified_at`,
    `password`,
    `remember_token`,
    `created_at`,
    `updated_at`,
    `user_level`,
    `is_admin`,
    `nip`
  )
VALUES
  (
    1,
    'Admin',
    'adam.japal@gmail.com',
    '2022-02-25 23:52:23',
    '$2y$10$ktpjBjxYljYS.sEHZueD1Orzsf.nhYEDywVqf61I4KS3GnN2jMTme',
    NULL,
    '2021-09-24 14:21:13',
    '2021-09-24 14:21:13',
    '1',
    '1',
    NULL
  ),
  (
    18,
    'Pimpinan',
    'pimpinan@mail.com',
    '2022-04-11 12:56:20',
    '$2y$10$901ZE9WCIspcl7XaQr7Jv.GlvqxkBAtOALxbv1A//bKTZl9ZX1422',
    NULL,
    '2022-04-11 12:56:20',
    '2022-04-11 12:56:20',
    '0',
    '0',
    '32895789342695437985'
  ),
  (
    19,
    'Liza',
    'liza@mail.com',
    '2022-04-11 21:47:08',
    '$2y$10$5Gu9ugQbXEqVJ54nFZEwoe.9E5mL.1zt7BVqqxKHcKn./R1d2OgB6',
    NULL,
    '2022-04-11 21:47:08',
    '2022-04-11 21:47:08',
    '1',
    '0',
    '-'
  ),
  (
    20,
    'Hamzani, S.E',
    'hamzani@mail.com',
    '2022-04-12 13:40:09',
    '$2y$10$CPmOlq0iebWQgNcq9mrLFO8gs5hq1oCnIU8qTWrDToYgccIPkGLZi',
    NULL,
    '2022-04-12 13:40:09',
    '2022-04-12 13:40:09',
    '0',
    '0',
    '396142379856'
  );
-- 2022-04-17 13:54:58