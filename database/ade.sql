-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2024 pada 03.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ade`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'adminku'),
(2, 'pupu', 'restu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calonsiswa`
--

CREATE TABLE `calonsiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` varchar(50) NOT NULL,
  `jeniskelamin` varchar(30) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `calonsiswa`
--

INSERT INTO `calonsiswa` (`id`, `nama`, `nisn`, `nik`, `tempatlahir`, `tanggallahir`, `jeniskelamin`, `agama`, `email`, `nohp`, `password`, `_status`) VALUES
(7, 'pupu', '23023', '312293', 'Pontianak', '23 Juli 2002', 'Laki-Laki', 'Islam', 'pupu@gmail.com', '08234567890', 'pupu', 1),
(8, 'Restu', '123', '234', 'Pontianak', '23 Juli 2002', 'Laki-Laki', 'Islam', 'restu@gmail.com', '12345567634', 'restu', 1),
(9, 'Jungkay', '098', '567', 'Pontianak', '1 Desember 2002', 'Laki-Laki', 'Kristen', 'jungkay@gmail.com', '081122334455', 'jungkay123', 1),
(10, 'Rames', '999', '888', 'Medan', '20 Januari 2001', 'Laki-Laki', 'Konghucu', 'rames@gmail.com', '089934762345', 'ramessayang', 1),
(11, 'Akong', '777', '000', 'Pontianak', '25 Desember 2002', 'Laki-Laki', 'Kristen', 'akong@gmail.com', '08912340128', 'akong', 1),
(12, 'Ucup', '333', '222', 'Pontianak', '29 Februari 2002', 'Laki-Laki', 'Islam', 'ucup@gmail.com', '080045671234', 'ucup', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `calonsiswa`
--
ALTER TABLE `calonsiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `calonsiswa`
--
ALTER TABLE `calonsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
