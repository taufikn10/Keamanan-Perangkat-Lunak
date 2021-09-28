-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2021 pada 04.07
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kpll`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log`
--

CREATE TABLE `tb_log` (
  `id` int(50) NOT NULL,
  `id_users` int(50) NOT NULL,
  `waktu_log` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_log`
--

INSERT INTO `tb_log` (`id`, `id_users`, `waktu_log`) VALUES
(1, 12, '2021-09-27 16:44:09'),
(2, 9, '2021-09-27 18:05:08'),
(3, 12, '2021-09-27 19:21:29'),
(4, 12, '2021-09-27 19:30:23'),
(5, 12, '2021-09-27 19:59:14'),
(6, 8, '2021-09-27 22:56:59'),
(7, 11, '2021-09-27 23:02:50'),
(8, 17, '2021-09-28 08:13:58'),
(9, 17, '2021-09-28 08:15:31'),
(10, 7, '2021-09-28 08:17:39'),
(11, 7, '2021-09-28 08:51:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_resetpass`
--

CREATE TABLE `tb_resetpass` (
  `id` int(50) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `otp` varchar(100) NOT NULL,
  `id_users` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verifikasi` enum('1','0') NOT NULL,
  `level` enum('Mahasiswa','Dosen','Staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `username`, `email`, `password`, `verifikasi`, `level`) VALUES
(7, 'dospem', 'email.example@dosen.unesa.ac.id', '$2y$10$ZvHyKhKHlc16gvhXboiZXuzJiCvEDpw/srOLzvN1XbgO5A3.SXx0K', '1', 'Dosen'),
(8, 'dosen2', 'example.dosen2@dosen.unesa.ac.id', '$2y$10$N7BQF2Q4kLaskJtdSTlXA.jXLbeqHHL6N7oD/TK2ihVHt.SboserW', '1', 'Dosen'),
(9, 'dosen3', 'dosen3.example@dosen.unesa.ac.id', '$2y$10$F0NCqqPkod.eJrOc5s1O4OsQ.WuO9jiaQ/Ok9Ib6sDvmUBwGwGx4K', '0', 'Dosen'),
(11, 'azizz25', 'muhammadaziiz.19030@mhs.unesa.ac.id', '$2y$10$QNCNrH1fE0GFDcYqqUNBV.cMVoUrk/zigm2H/F3378VV9wZw5CgW6', '1', 'Mahasiswa'),
(14, 'imamarif', 'imam.19006@mhs.unesa.ac.id', '$2y$10$R6PbY54ParHyTUOmIMOso.utyIdbZAwl2wlihnjnrwsCsopPCIvSC', '1', 'Mahasiswa'),
(15, 'staf1', 'example.mail@staff.unesa.ac.id', '$2y$10$z2NEuDDwLxWK4xoYnxfyouHW9O.cifOPsFNN7ZFAULjNZbfiC6v52', '1', 'Staff'),
(16, 'ibnoe', 'moh.19020@mhs.unesa.ac.id', '$2y$10$0rFike7wdiLhOpBRhX5fFe9WhsrzFXynz8ga88mzsKT8n/D1DPFl2', '0', 'Mahasiswa'),
(17, 'taufik10', 'taufik.19019@mhs.unesa.ac.id', '$2y$10$RiRnIPIxKTOtMc7uVnXfHudKsa4PbntfsAyaLw.h5R17.BdaENvnC', '1', 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_resetpass`
--
ALTER TABLE `tb_resetpass`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_resetpass`
--
ALTER TABLE `tb_resetpass`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
