-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jan 2024 pada 16.16
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asoka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbbahan`
--

CREATE TABLE `tbbahan` (
  `id_bahan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbmenu`
--

CREATE TABLE `tbmenu` (
  `id_menu` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(25) NOT NULL,
  `kategori` enum('Makanan','Minuman') NOT NULL DEFAULT 'Makanan',
  `gambar` varchar(259) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbmenu`
--

INSERT INTO `tbmenu` (`id_menu`, `nama`, `harga`, `kategori`, `gambar`) VALUES
(12, 'Ayam Geprek Asoka', 12000, 'Makanan', 'http://[::1]/assalif/gambar/Ayam Geprek Asoka_menu.png'),
(13, 'Ayam Geprek Asoka Dengan Nasi', 17000, 'Minuman', 'http://[::1]/assalif/gambar/Ayam Geprek Asoka Dengan Nasi_menu.png'),
(14, 'Teh Botol', 5000, 'Minuman', 'http://[::1]/assalif/gambar/Teh Botol_menu.png'),
(15, 'Teh Tarik Hanaang', 7000, 'Minuman', 'http://[::1]/assalif/gambar/Teh Tarik Hanaang_menu.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'alif', 'alif', 'Alif Fahzlian'),
(2, 'asep', 'asep', 'Asep Purnama');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbbahan`
--
ALTER TABLE `tbbahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `tbmenu`
--
ALTER TABLE `tbmenu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbbahan`
--
ALTER TABLE `tbbahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbmenu`
--
ALTER TABLE `tbmenu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
