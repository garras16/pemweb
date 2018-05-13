-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Mei 2018 pada 15.45
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resume`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `hobi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `hobi`) VALUES
(1, 'Stefanus Alvin Susanto', 'Bandar Lampung', '1998-06-16', 'Jl. P. Tidore Gang Gotong Royong No.19 Jagabaya 2', 'Watching, Sleeping'),
(2, 'Muhammad Aditya Fajrianto', 'Bandar Lampung', '1998-07-31', 'Jl. Dermayu Blok D6 No 22 Beringin Raya, Kemiling', 'Gaming'),
(3, 'Hafidza Anindita Warsito', 'Metro', '1998-10-26', '28 Purwosari Metro utara', 'Nyanyi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `start` year(4) NOT NULL,
  `end` year(4) NOT NULL,
  `pemilik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `experience`
--

INSERT INTO `experience` (`id`, `name`, `organization`, `start`, `end`, `pemilik`) VALUES
(1, 'Sekretaris Umum', 'UNITY SMK 2 MEI', 2013, 2016, 1),
(2, 'Kepala Biro Komunikasi dan Informasi', 'UKM Katolik Universitas Lampung', 2018, 0000, 1),
(3, 'Anggota Biro Kesekretariatan', 'Himpunan Mahasiswa Jurusan Ilmu Komputer Universitas Lampung', 2017, 2018, 2),
(4, 'Anggota Badan Khusus', 'Himpunan Mahasiswa Jurusan Ilmu Komputer Universitas Lampung', 2018, 0000, 2),
(5, 'Anggota Bidang Kaderisasi', 'Himpunan Mahasiswa Jurusan Ilmu Komputer Universitas Lampung', 2017, 2018, 3),
(6, 'Bendahara Umum', 'Himpunan Mahasiswa Jurusan Ilmu Komputer Universitas Lampung', 2018, 0000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `id_orang` int(11) NOT NULL,
  `tipe` enum('ps','ls','ss','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skill`
--

INSERT INTO `skill` (`id`, `nama`, `value`, `id_orang`, `tipe`) VALUES
(1, 'HTML', 20, 1, 'ps'),
(2, 'CSS', 42, 1, 'ps'),
(5, 'crafting', 25, 1, 'ls'),
(6, 'cost management', 63, 1, 'ss'),
(7, 'public relationship', 30, 1, 'ss'),
(8, 'Javascript', 11, 1, 'ps'),
(10, 'fishing', 50, 1, 'ls'),
(11, 'PHP', 5, 1, 'ps');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
