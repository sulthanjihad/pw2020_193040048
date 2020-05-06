-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Apr 2020 pada 16.04
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_193040048`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `Id` int(11) NOT NULL,
  `Cover` varchar(30) NOT NULL,
  `NamaBuku` varchar(30) NOT NULL,
  `Pengarang` varchar(50) NOT NULL,
  `Penerbit` varchar(50) NOT NULL,
  `Harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`Id`, `Cover`, `NamaBuku`, `Pengarang`, `Penerbit`, `Harga`) VALUES
(1, '1.jpg', 'more of you', 'Acha sinaga & Andy', 'Elex Media Komputindo', 'Rp72.000'),
(2, '2.jpg', 'Mariposa', 'Luluk Hf', 'Coconut Books', 'Rp99.000'),
(3, '3.jpg', 'Loventure', 'Indri Octa Safitry', 'Bhuana Ilmu Populer', 'Rp59.000'),
(4, '4.jpg', 'Koala and her story', 'Puteri Raka', 'Elex Media Komputindo', 'Rp92.000'),
(5, '5.jpg', 'Laskar', 'Annisa Fitriani', 'Black swan books', 'Rp97.000'),
(6, '6.jpg', 'Neraka Dunia', 'Nur St.Iskanda', 'Kepustakaan Populer Gramedia', 'Rp65.000'),
(7, '7.jpg', 'Selena', 'Tere Liye', 'Gramedia pustaka utama', 'Rp85.000'),
(8, '8.jpg', 'Bulan dan Bintang', 'Indriya', 'Penerbit Galaxy media', 'Rp95.000'),
(9, '9.jpg', 'Journal of Terror-titisan-', 'Sweta Kartika', 'M&C!', 'Rp90.000'),
(10, '10.jpg', 'Pelukis Bisu-The silent Patien', 'Alex Michaelides', 'Gramedia Pustaka Utama', 'Rp85.000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
