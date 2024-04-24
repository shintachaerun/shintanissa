-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2024 pada 09.51
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
-- Database: `ujikom_shinta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `userid`) VALUES
(2, 'ibu dan anak', 'aaaaaa', '2024-04-23', '289885707-Stock (10).jpg', 2),
(3, 'bbb', 'ccc', '2024-04-23', '834638033-Stock (2).jpg', 3),
(4, 'bbb', 'ttttttttttt', '2024-04-23', '544009197-Stock (6).jpg', 2),
(5, 'ibu dan anak', 'tidak peduli seberapa banyak aku mengatakan aku mencintaimu, aku selalu mencintaimu lebih dari itu. love u more anakku sayang', '2024-04-24', '492159221-Stock (5).jpg', 1),
(7, 'meraih kemenangan', 'meraih impian, membuat saya menjadi bangga pada diri sendiri dan orang sekitar', '2024-04-24', '998424069-Stock (28).jpg', 1),
(8, 'pemandangan', 'pemandangan yang indah', '2024-04-24', '1985536016-Stock (13).jpg', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_foto`
--

CREATE TABLE `komentar_foto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar_foto`
--

INSERT INTO `komentar_foto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(1, 2, 2, 'hi', '2024-04-23'),
(2, 3, 3, 'sayang banget', '2024-04-23'),
(3, 3, 3, 'cakep amayy bapaknya', '2024-04-23'),
(4, 2, 3, 'ko bisa ya disayang gitu sama ibu nya', '2024-04-23'),
(5, 2, 4, 'ih lucukkk', '2024-04-23'),
(6, 3, 4, 'avv ', '2024-04-23'),
(7, 3, 4, 'hihi', '2024-04-23'),
(8, 4, 2, 'ibunya cantik', '2024-04-23'),
(9, 4, 2, '', '2024-04-23'),
(10, 4, 2, '', '2024-04-23'),
(11, 4, 2, '', '2024-04-23'),
(12, 3, 2, 'ica', '2024-04-23'),
(13, 2, 5, 'aaaaa', '2024-04-23'),
(14, 2, 4, 'eh', '2024-04-24'),
(15, 2, 1, 'hihi', '2024-04-24'),
(16, 5, 1, 'hahaha', '2024-04-24'),
(17, 4, 1, 'ibu dan anak', '2024-04-24'),
(18, 7, 1, 'congrats', '2024-04-24'),
(19, 7, 7, 'hii', '2024-04-24'),
(20, 8, 8, 'indah banget', '2024-04-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `like_foto`
--

CREATE TABLE `like_foto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `like_foto`
--

INSERT INTO `like_foto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(5, 2, 2, '2024-04-23'),
(6, 2, 3, '2024-04-23'),
(7, 3, 3, '2024-04-23'),
(8, 2, 4, '2024-04-23'),
(9, 3, 4, '2024-04-23'),
(10, 4, 2, '2024-04-23'),
(11, 3, 2, '2024-04-23'),
(12, 2, 5, '2024-04-23'),
(13, 2, 1, '2024-04-24'),
(14, 3, 1, '2024-04-24'),
(15, 5, 1, '2024-04-24'),
(16, 4, 1, '2024-04-24'),
(18, 7, 1, '2024-04-24'),
(20, 7, 7, '2024-04-24'),
(21, 8, 8, '2024-04-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'adminn', 'majalengka'),
(2, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'ichanissa1919@gmail.com', '', 'sukahaji'),
(3, 'icha', 'c8df182ba487eb4a5255ca0762d5e26a', 'cacanissa@gmail.com', 'caca', 'sukahaji'),
(4, 'syanda', '0b787acd1885949840962a345cecba8f', 'syanda@gmail.com', 'dadaw', 'trajaya'),
(5, 'sofi', '87cb8cc8b2f8fd52e2c3c0a4d8e8185f', 'sofi@gmail.com', 'shofi', 'sukahaji'),
(6, 'syanda', '0b787acd1885949840962a345cecba8f', 'syanda@gmail.com', 'dadaw', 'trajaya'),
(7, 'shelina', '4f377710aff4f185a600193131143eaf', 'shelina21@gmail.com', 'shelina dwi', 'sukahaji'),
(8, 'sakila', 'f63c225f4abe9e13c839680350e7c112', 'sakila@gmail.com', 'sakila nur aziza', 'cicenang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `like_foto`
--
ALTER TABLE `like_foto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `komentar_foto`
--
ALTER TABLE `komentar_foto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `like_foto`
--
ALTER TABLE `like_foto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD CONSTRAINT `komentar_foto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_foto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `like_foto`
--
ALTER TABLE `like_foto`
  ADD CONSTRAINT `like_foto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_foto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
