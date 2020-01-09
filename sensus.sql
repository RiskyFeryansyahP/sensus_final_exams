-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 10 Jan 2020 pada 00.26
-- Versi server: 5.6.38
-- Versi PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sensus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartukeluarga`
--

CREATE TABLE `kartukeluarga` (
  `id` int(11) NOT NULL,
  `no_kk` int(20) NOT NULL,
  `nik` int(20) NOT NULL,
  `status_dalam_keluarga` varchar(20) NOT NULL,
  `ayah` varchar(30) NOT NULL,
  `ibu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kartukeluarga`
--

INSERT INTO `kartukeluarga` (`id`, `no_kk`, `nik`, `status_dalam_keluarga`, `ayah`, `ibu`) VALUES
(1, 1111111111, 7121998, 'Anak', 'Susilo', 'Fatimah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian`
--

CREATE TABLE `kematian` (
  `no_kematian` int(11) NOT NULL,
  `nik` int(20) NOT NULL,
  `tgl_kematian` date NOT NULL,
  `penyebab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kematian`
--

INSERT INTO `kematian` (`no_kematian`, `nik`, `tgl_kematian`, `penyebab`) VALUES
(1, 202000111, '2020-01-17', 'Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendatang`
--

CREATE TABLE `pendatang` (
  `no_pendatang` int(11) NOT NULL,
  `nik` int(20) NOT NULL,
  `tgl_datang` date NOT NULL,
  `alamat_asal` text NOT NULL,
  `alamat_sekarang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pendatang`
--

INSERT INTO `pendatang` (`no_pendatang`, `nik`, `tgl_datang`, `alamat_asal`, `alamat_sekarang`) VALUES
(1, 200111001, '2020-01-08', 'Bandung', 'Malang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `JK` enum('Laki - Laki','Perempuan','','') NOT NULL,
  `RT/RW` varchar(20) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `kewarganegaraan` varchar(25) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `gol_darah` enum('A','B','AB','O') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `tempat`, `tgl_lahir`, `JK`, `RT/RW`, `pekerjaan`, `kewarganegaraan`, `pendidikan_terakhir`, `agama`, `gol_darah`) VALUES
(7121998, 'Risky', 'Malang', '2020-01-07', 'Laki - Laki', '07/01', 'Mahasiswa', 'Indonesia', 'SMK', 'Islam', 'A'),
(24101998, 'Shania Saraswati', 'Malang', '2020-01-24', 'Perempuan', '08/01', 'Mahasiswa', 'Indonesia', 'SMA', 'Islam', 'O'),
(200111001, 'Cindy Puspita Sari', 'Malang', '2001-04-04', 'Laki - Laki', '07/01', 'Pelejar', 'Indonesia', 'SMA', 'Islam', 'B'),
(202000111, 'John Doe', 'Jakarta', '2020-01-10', 'Laki - Laki', '01/01', 'Wiraniaga', 'Indonesia', 'SMK', 'Islam', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `no_petugas` int(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `no_petugas`, `password`, `nama_lengkap`) VALUES
(1, 171111040, 'risky', 'Risky Feryansyah Pribadi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kartukeluarga`
--
ALTER TABLE `kartukeluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`no_kematian`);

--
-- Indeks untuk tabel `pendatang`
--
ALTER TABLE `pendatang`
  ADD PRIMARY KEY (`no_pendatang`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kartukeluarga`
--
ALTER TABLE `kartukeluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kematian`
--
ALTER TABLE `kematian`
  MODIFY `no_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pendatang`
--
ALTER TABLE `pendatang`
  MODIFY `no_pendatang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
