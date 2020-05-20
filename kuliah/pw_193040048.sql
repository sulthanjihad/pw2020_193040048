-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2020 pada 14.33
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
-- Database: `pw_193040048`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nrp` char(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'sulthan', '193040048', 'sulthan@gmail.com', 'teknik informatika', '1.png'),
(2, 'jihad', '193040049', 'jihad@gmail.com', 'teknik informatika', '1.png'),
(3, 'rayhan', '193040050', 'rayhan@gmail.com', 'teknik industri', '1.png'),
(4, 'abiyyu', '193040051', 'abiyyu@gmail.com', 'teknik mesin', '1.png'),
(5, 'aldi', '193040052', 'aldi@gmail.com', 'teknik mesin', '1.png'),
(6, 'ageung', '193040053', 'ageung@gmail.com', 'teknik informatika', '1.png'),
(7, 'dava', '193040054', 'dava@gmail.com', 'teknik pangan', '1.png'),
(8, 'putra', '193040055', 'putra@gmail.com', 'teknik lingkungan', '3.png'),
(9, 'rais', '193040056', 'rais@gmail.com', 'teknik informatika', '1.png'),
(10, 'rafif', '193040057', 'rafif@gmail.com', 'teknik mesin', '1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'pw', '$2y$10$.hjhM4wQDaHz.Ns8gRbtCezXr8iwQ6ZQAqG8LpZ.MTyvAcViai0Ui'),
(4, 'admin', '$2y$10$kxX.NzfH.3OJ5PLniU/ko.iABY6.8q2f/MTlVnfr2r07Budiv09uq'),
(5, 'jihad123', '$2y$10$Ta3rQtGQ/oxxo8shgxWMhOtcTqN7vmSxV0ZHkRNHRctCSzaHx.ss6'),
(7, 'sulthan444', '$2y$10$moL/.cn8Ekr9KElEKKeyh.BazWb2eEIQD05WanT4FZcb7kEF5CLOu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
