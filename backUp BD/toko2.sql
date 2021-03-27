-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2021 pada 09.02
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uji_level`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `belibarang`
--

CREATE TABLE `belibarang` (
  `id` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `belibarang`
--

INSERT INTO `belibarang` (`id`, `jumlah_barang`, `total_harga`, `created_at`) VALUES
(507, 9, 68594, '2021-03-08 00:40:43'),
(508, 4, 72000, '2021-03-08 00:42:40'),
(509, 2, 36000, '2021-03-08 01:05:16'),
(510, 5, 18072, '2021-03-08 01:16:34'),
(511, 2, 36000, '2021-03-08 01:23:13'),
(512, 2, 36000, '2021-03-08 01:24:53'),
(513, 1, 18000, '2021-03-08 01:24:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderbarang`
--

CREATE TABLE `orderbarang` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `belibarang_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orderbarang`
--

INSERT INTO `orderbarang` (`id`, `barang_id`, `belibarang_id`, `stock`, `created_at`) VALUES
(112, 39, 507, 3, '2021-03-08 00:40:43'),
(113, 40, 507, 2, '2021-03-08 00:40:43'),
(114, 41, 507, 2, '2021-03-08 00:40:43'),
(115, 42, 507, 2, '2021-03-08 00:40:43'),
(116, 39, 508, 2, '2021-03-08 00:42:40'),
(117, 40, 508, 2, '2021-03-08 00:42:40'),
(118, 40, 509, 2, '2021-03-08 01:05:16'),
(119, 40, 510, 1, '2021-03-08 01:16:34'),
(120, 41, 510, 1, '2021-03-08 01:16:34'),
(121, 42, 510, 3, '2021-03-08 01:16:34'),
(122, 39, 511, 2, '2021-03-08 01:23:13'),
(123, 39, 512, 2, '2021-03-08 01:24:53'),
(124, 39, 513, 1, '2021-03-08 01:24:57');

--
-- Trigger `orderbarang`
--
DELIMITER $$
CREATE TRIGGER `after_insert_databeli` AFTER INSERT ON `orderbarang` FOR EACH ROW BEGIN
	UPDATE stockbarang 
    SET stockbarang.stock = stockbarang.stock - new.stock WHERE stockbarang.id = new.barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `apusbarang` AFTER DELETE ON `orderbarang` FOR EACH ROW BEGIN
UPDATE stockbarang
SET
stockbarang.stock = stockbarang.stock + old.stock WHERE stockbarang.id = OLD.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockbarang`
--

CREATE TABLE `stockbarang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stockbarang`
--

INSERT INTO `stockbarang` (`id`, `nama`, `harga`, `stock`, `gambar`) VALUES
(39, 'bakso', 20000, 0, 'https://cdn.popbela.com/content-images/post/20190306/52364171-2337771719836492-3734331470220321116-n-241ad600ff2d1f123b2097c5c45ec179_750x500.jpg'),
(40, 'bakso', 20000, 993, 'https://www.wisataliburan.com/wp-content/uploads/2019/11/Makanan-Malaysia.jpg'),
(41, 'kejuruan', 20, 19997, 'https://sejarahlengkap.com/wp-content/uploads/2017/03/gitar-1280x720.jpg'),
(42, 'nasi goreng ', 20, 19999995, 'https://images.bisnis-cdn.com/thumb/posts/2019/09/24/1151866/makanansah.jpg?w=744&amp;h=465');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `belibarang`
--
ALTER TABLE `belibarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orderbarang`
--
ALTER TABLE `orderbarang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `belibarang_id` (`belibarang_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT untuk tabel `orderbarang`
--
ALTER TABLE `orderbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `stockbarang`
--
ALTER TABLE `stockbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orderbarang`
--
ALTER TABLE `orderbarang`
  ADD CONSTRAINT `orderbarang_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `stockbarang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderbarang_ibfk_2` FOREIGN KEY (`belibarang_id`) REFERENCES `belibarang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
