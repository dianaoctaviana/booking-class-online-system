-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2019 pada 04.38
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjam_kelas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `baak`
--

CREATE TABLE `baak` (
  `idbaak` int(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_peminjaman`
--

CREATE TABLE `form_peminjaman` (
  `idform` int(20) NOT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `rencana_awal` varchar(10) DEFAULT NULL,
  `rencana_akhir` varchar(10) DEFAULT NULL,
  `id_ruangan` int(10) DEFAULT NULL,
  `keperluan` varchar(40) DEFAULT NULL,
  `STATUS` varchar(30) DEFAULT 'Pending',
  `alasan` varchar(50) DEFAULT '-',
  `id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_peminjaman`
--

INSERT INTO `form_peminjaman` (`idform`, `tanggal_peminjaman`, `rencana_awal`, `rencana_akhir`, `id_ruangan`, `keperluan`, `STATUS`, `alasan`, `id`) VALUES
(2, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Ruangan Dipakai', 'admin'),
(3, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Ruangan Dipakai', 'admin'),
(5, NULL, NULL, NULL, NULL, NULL, 'Pending', '-Ruangan Penuh', 'if318027'),
(6, NULL, NULL, NULL, NULL, NULL, 'Pending', '-Ruangan Penuh', 'if318027'),
(14, '0000-00-00', '00:34', '14:03', 1, 'Praktikum 3', 'Disetujui', '-', 'if318012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `idlaporan` int(20) NOT NULL,
  `idform` int(20) DEFAULT NULL,
  `idbaak` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `idMahasiswa` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`idMahasiswa`, `nama`, `id_user`) VALUES
(11318012, 'Diana Naibaho', 'if318012'),
(11318027, 'David Simatupang', 'if318027'),
(11318037, 'Frisda Sianipar', 'if318037'),
(11318041, 'Chandra Lomo', 'if318040'),
(11318048, 'Theresia Tampubolon', 'if318048');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(10) NOT NULL,
  `USER` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `LEVEL` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `USER`, `nama`, `PASSWORD`, `LEVEL`) VALUES
(1, 'admin', 'admin', 'admin', 'Admin'),
(2, 'user', 'user', 'user', 'user'),
(3, 'BAAK1', 'BAAK1', 'BAAK1', 'Admin'),
(4, 'BAAK2', 'BAAK2', 'BAAK2', 'Admin'),
(5, 'BAAK3', 'BAAK3', 'BAAK3', 'Admin'),
(6, 'if318012', 'Diana', 'if318012', 'user'),
(7, 'if318027', 'David Simatupang', 'if318027', 'user'),
(8, 'if318037', 'Frisda', 'if318037', 'user'),
(9, 'if318040', 'Candra', 'if318040', 'user'),
(10, 'if318048', 'Teresia', 'if318048', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(10) NOT NULL,
  `nama_ruangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'GD711'),
(2, 'GD712'),
(3, 'GD713'),
(4, 'GD525'),
(5, 'GD811'),
(6, 'GD812'),
(7, 'GD721'),
(8, 'GD722'),
(9, 'GD723'),
(10, 'GD724'),
(11, 'GD725'),
(12, 'GD726'),
(13, 'GD914'),
(14, 'GD924'),
(15, 'GD925'),
(16, 'GD926'),
(17, 'GD932'),
(18, 'GD934'),
(19, 'GD935'),
(20, 'GD936'),
(21, 'GD512'),
(22, 'GD513'),
(23, 'GD514'),
(24, 'GD515'),
(25, 'GD813'),
(26, 'GD524'),
(27, 'GD814'),
(28, 'GD815'),
(29, 'GD824'),
(30, 'GD825'),
(31, 'GD826'),
(32, 'GD912'),
(33, 'GD913'),
(34, 'GD923'),
(35, 'GD927'),
(36, 'GD928'),
(37, 'GD929'),
(38, 'GD933'),
(39, 'GD937'),
(40, 'GD938'),
(41, 'GD939'),
(42, 'GD942'),
(43, 'GD943'),
(44, 'GD944');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `baak`
--
ALTER TABLE `baak`
  ADD PRIMARY KEY (`idbaak`);

--
-- Indeks untuk tabel `form_peminjaman`
--
ALTER TABLE `form_peminjaman`
  ADD PRIMARY KEY (`idform`),
  ADD KEY `kka` (`id_ruangan`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idlaporan`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`idMahasiswa`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `form_peminjaman`
--
ALTER TABLE `form_peminjaman`
  MODIFY `idform` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `form_peminjaman`
--
ALTER TABLE `form_peminjaman`
  ADD CONSTRAINT `kka` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
