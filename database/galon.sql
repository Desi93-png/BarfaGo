-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2025 pada 19.10
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
-- Database: `galon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_hp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `no_hp`) VALUES
(1, 'Kiko', 'kikoeskrim', 'admin1234', '089083794582');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_satuan` float DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_produk`, `nama_produk`, `harga_satuan`, `jumlah`, `subtotal`) VALUES
(31, 30, 1, 'Le Minerale 15L', 22000, 1, 22000),
(42, 36, 2, 'Aqua 19L', 21000, 1, 21000),
(43, 36, 4, 'Galon Kosong', 36000, 1, 36000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_hp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama`, `username`, `password`, `no_hp`) VALUES
(1, 'Pino Anggur', 'pinoesserut', 'kurir1234', '089083794582');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `alamat` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `username`, `password`, `nama`, `email`, `no_hp`, `alamat`) VALUES
(1, 'despa', 'DPangestuti84', 'Desi Pangestutii', 'yogurt@gmail.com', '081226062407', 'Desa Wonogiri RT 67 RW 190, Kecamatan Y, Kabupaten X'),
(5, 'desi', 'd', 'd', 'd', '4', 'd'),
(6, 'erdwfew', 'affea', '', '', '', ''),
(7, 'sx', 'xs', '', '', '', ''),
(8, 'dw', 'ewd', '', '', '', ''),
(9, '', '', '', '', '', ''),
(10, 'andi', 'andi05', 'Muhammad Nur Wahyandi', 'andi.com', '081', 'Desa Kemiri'),
(11, 'coco12', 'coco1290', 'Coco Melon', 'coco@gmail.com', '081967278923', 'Desa Coco Melon'),
(12, 'melon23', 'melon1234', 'Coco Melonn', 'melon@gmai.com', '081345234892', 'Desa Coco Melon RT 1 RW 2'),
(13, 'randguy', '1234', 'Random Guy', 'randguy@gmail.com', '081', 'bumi'),
(14, 'randguy2', '12345', 'random guyyyyy', 'randguyyy@gmail.com', '081929', 'bumiii'),
(15, 'randdude', '1234', 'random dude', 'randdude@gmailcom', '081898', 'galaksi bima sakti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `link` varchar(150) NOT NULL,
  `status_bayar` varchar(15) NOT NULL,
  `status_kirim` varchar(15) NOT NULL,
  `total_harga` float NOT NULL,
  `tanggal_pesan` date NOT NULL DEFAULT curdate(),
  `metode_bayar` varchar(10) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `username`, `nama`, `email`, `no_hp`, `alamat`, `link`, `status_bayar`, `status_kirim`, `total_harga`, `tanggal_pesan`, `metode_bayar`, `bukti_bayar`) VALUES
(30, 'randguy', 'Random Guy', 'randguy@gmail.com', '081', 'bumi', 'https://maps.app.goo.gl/W625bFBkKdUB3MCT8', 'Sudah dibayar', 'Selesai', 45000, '2025-06-11', 'e-money', '20250611144006Marc Márquez on his Ducati Desmosedici GP25; 2025.jpeg'),
(36, 'randdude', 'Random Dude', 'randdude@gmailcom', '081898', 'Galaksi Bima Sakti - Bumi', 'https://maps.app.goo.gl/W625bFBkKdUB3MCT8', 'Sudah dibayar', 'Diproses', 59000, '2025-06-12', 'e-money', '20250612190926idxkC64uff_1746776550863.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `harga` float NOT NULL,
  `stok` float NOT NULL,
  `gambar` varchar(15) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_produk`, `nama_produk`, `harga`, `stok`, `gambar`, `deskripsi`) VALUES
(1, 'Le Minerale 15L', 22000, 0, 'LeMinerale.png', 'Produk ini dijual bersama galonnya (bukan isi ulang).'),
(2, 'Aqua 19L', 21000, 80, 'Aqua.png', 'Produk ini hanya berisi air, tidak termasuk galon. Jika belum memiliki galon AQUA, silakan pilih produk dengan galon kosong.'),
(3, 'Air Isi Ulang', 6000, 0, 'IsiUlang.png', 'Anda harus sudah memiliki galon sendiri untuk membeli produk ini. Harga hanya untuk airnya saja.\r\n'),
(4, 'Galon Kosong', 36000, 0, 'GalonKosong.png', 'Kapasitas 19L. Harga hanya untuk galon saja, tidak termasuk isi air.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
