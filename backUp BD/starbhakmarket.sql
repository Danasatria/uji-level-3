-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2021 pada 08.39
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starbhakmarket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `belibarang`
--

CREATE TABLE `belibarang` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockbarang`
--

CREATE TABLE `stockbarang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `stockbarang`
--
DELIMITER $$
CREATE TRIGGER `after_insert_databeli` AFTER INSERT ON `stockbarang` FOR EACH ROW BEGIN
	UPDATE stockbarang 
    SET stockbarang.stock = stockbarang.stock - belibarang.stock WHERE stockbarang.id = belibarang.barang_id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `belibarang`
--
ALTER TABLE `belibarang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `stockbarang`
--
ALTER TABLE `stockbarang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `belibarang`
--
ALTER TABLE `belibarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stockbarang`
--
ALTER TABLE `stockbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `belibarang`
--
ALTER TABLE `belibarang`
  ADD CONSTRAINT `kelas_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `stockbarang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
