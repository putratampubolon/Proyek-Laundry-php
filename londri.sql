-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2021 pada 15.54
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `londri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `kode_konsumen` varchar(10) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `alamat_konsumen` text NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`kode_konsumen`, `nama_konsumen`, `alamat_konsumen`, `no_hp`) VALUES
('K001', 'Asrori', 'Pendabah Bawah, Kamal, Bangkalan	\r\n																																										', '088xxxxxxxxx'),
('K002', 'Muzamil', 'Pedebeh								\r\n							', '087xxxxxxxxx'),
('K003', 'Moh. Sukron', '										Pamekasan						\r\n														', '087 xxx xxx xxx'),
('K004', 'Wasil', '								\r\n		Pendabah					', '085xxxxxxxxx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `kode_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga_paket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`kode_paket`, `nama_paket`, `harga_paket`) VALUES
('P001', 'Cuci Basah', '5000'),
('P002', 'Cuci Kering', '6000'),
('P003', 'Cuci Setrika', '8000'),
('P004', 'Cuci Setrika + Pewangi', '10000'),
('P005', 'Cuci + Pewangi', '7500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(10) NOT NULL,
  `kode_konsumen` varchar(10) NOT NULL,
  `kode_paket` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_ambil` date NOT NULL,
  `berat` varchar(10) NOT NULL,
  `grand_total` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `kode_konsumen`, `kode_paket`, `tgl_masuk`, `tgl_ambil`, `berat`, `grand_total`, `status`) VALUES
('T001', 'K001', 'P003', '2021-03-02', '2021-03-06', '5', '40000', 'Closed'),
('T002', 'K002', 'P002', '2021-03-02', '2021-03-02', '4', '24000', 'Closed'),
('T003', 'K002', 'P003', '2021-03-06', '0000-00-00', '7', '56000', 'On Proses'),
('T004', 'K001', 'P002', '2021-03-16', '0000-00-00', '1', '6000', 'Open'),
('T005', 'K003', 'P005', '2021-03-16', '0000-00-00', '5', '37500', 'Open'),
('T006', 'K003', 'P004', '2021-04-08', '0000-00-00', '4', '40000', 'Open'),
('T007', 'K002', 'P001', '2021-04-08', '0000-00-00', '5', '25000', 'Open'),
('T008', 'K001', 'P002', '2021-04-08', '0000-00-00', '9', '54000', 'Open'),
('T009', 'K001', 'P004', '2021-04-10', '0000-00-00', '5', '50000', 'Open');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Muzamil', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`kode_konsumen`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`kode_paket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
