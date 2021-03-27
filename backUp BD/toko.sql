-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2021 pada 12.19
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
-- Database: `toko`
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

--
-- Trigger `belibarang`
--
DELIMITER $$
CREATE TRIGGER `after_insert_databeli` AFTER INSERT ON `belibarang` FOR EACH ROW BEGIN
	UPDATE stockbarang 
    SET stockbarang.stock = stockbarang.stock - belibarang.stock WHERE stockbarang.id = belibarang.barang_id;
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
  `jenis` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stockbarang`
--

INSERT INTO `stockbarang` (`id`, `nama`, `harga`, `stock`, `jenis`, `gambar`) VALUES
(1, 'Chiki komo', 1000, 12, 'Makanan', 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//96/MTA-5367642/top_chiki_komo_40_pcs-1_dus_-_8gr_-_full01_eej826l3.jpg'),
(3, 'Chiki zeky', 1000, 1, 'Makanan', 'https://id-live-01.slatic.net/p/f1ca62277306947c0a167c2b9b43e4a4.jpg'),
(4, 'Chiki jaguar', 1000, 1, 'makanan', 'https://cf.shopee.co.id/file/1ac3081992e6dba520ddddd0e1a75863'),
(5, 'Chiki ball', 1000, 1, 'makanan', 'https://cf.shopee.co.id/file/02c59b64f8d1cb815ca081b623fcc598'),
(6, 'Kiko', 5000, 1, 'minuman', 'https://cf.shopee.co.id/file/2bf99be093f6fdc11a4135ce58751712'),
(7, 'Susuku', 500, 1, 'Makanan', 'https://cf.shopee.co.id/file/7c97f9c91017657dbed9655fdf785a59'),
(12, 'Permen kacamata', 1000, 10, 'Makanan', 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//87/MTA-2100990/jogjakhas_djogja-market---permen-cokelat-kacamata_full02.jpg'),
(13, 'Coklat koin', 1000, 100, 'Makanan', 'https://ecs7.tokopedia.net/img/cache/700/product-1/2019/1/24/3398311/3398311_e33c262b-5cb8-4a4b-aa87-7b7ea50ffbca_720_720.jpg'),
(14, 'Choyo Choyo', 500, 32, 'Makanan', 'https://ecs7.tokopedia.net/img/cache/700/product-1/2017/11/13/6134407/6134407_38ae431b-22d6-47ac-9a49-82e143c4d250_1000_1085.jpg'),
(15, 'Coklat koin', 1000, 12, 'Makanan', 'https://cf.shopee.co.id/file/7af723e272153298ebbed43acddf992d');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
