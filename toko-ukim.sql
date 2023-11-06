-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2023 pada 13.48
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko-ukim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chatting`
--

CREATE TABLE `chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pelanggan_send` text DEFAULT NULL,
  `admin_send` text DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chatting`
--

INSERT INTO `chatting` (`id_chatting`, `id_pelanggan`, `id_user`, `pelanggan_send`, `admin_send`, `time`) VALUES
(1, 6, 1, 'halo admin', NULL, '2023-11-06 11:46:38'),
(2, 6, 1, NULL, 'iya yahya, ada yang bisa dibantu?', '2023-11-06 11:48:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(30) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_diskon`, `qty`) VALUES
(1, '20231106JFAVCTEX', 3, 3),
(2, '20231106JFAVCTEX', 6, 1),
(3, '20231106MGL9NOEA', 3, 10),
(4, '20231106KLW8CDNJ', 18, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `nama_diskon` varchar(125) NOT NULL,
  `tgl_selesai` varchar(15) NOT NULL,
  `diskon` int(11) NOT NULL,
  `member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `nama_diskon`, `tgl_selesai`, `diskon`, `member`) VALUES
(1, 'lYMJS', '0', '0', 0, 1),
(2, 'lYMJS', '0', '0', 0, 2),
(3, 'lYMJS', '0', '0', 0, 3),
(4, 'H71Ni', '0', '0', 0, 1),
(5, 'H71Ni', '0', '0', 0, 2),
(6, 'H71Ni', '0', '0', 0, 3),
(7, 'W6sv8', '0', '0', 0, 1),
(8, 'W6sv8', '0', '0', 0, 2),
(9, 'W6sv8', '0', '0', 0, 3),
(10, '4NEbx', '0', '0', 0, 1),
(11, '4NEbx', '0', '0', 0, 2),
(12, '4NEbx', '0', '0', 0, 3),
(13, 'VcHi3', '0', '0', 0, 1),
(14, 'VcHi3', '0', '0', 0, 2),
(15, 'VcHi3', '0', '0', 0, 3),
(16, '7bNjJ', '0', '0', 0, 1),
(17, '7bNjJ', 'Sale Of Day', '2023-11-30', 5, 2),
(18, '7bNjJ', '0', '0', 0, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pupuk'),
(2, 'Obat Pembasmi'),
(3, 'Bibit Benih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritik` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `isi_kritik` text DEFAULT NULL,
  `jawab_kritik` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_kritik`, `id_pelanggan`, `id_user`, `isi_kritik`, `jawab_kritik`) VALUES
(1, 6, 1, 'bagus banget', NULL),
(2, 1, 1, NULL, 'terimakasih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nm_pel` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlpon` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `email` varchar(125) DEFAULT NULL,
  `password` varchar(125) NOT NULL,
  `level_member` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nm_pel`, `alamat`, `no_tlpon`, `username`, `email`, `password`, `level_member`, `point`) VALUES
(1, 'hana', 'Kuningan', '0891291829182', 'hana', 'rizkihasbiallah06@gmail.com', 'akuadalah', 3, 735),
(2, 'Reno', 'Kuningan, Jabar', '08987654367', 'reno', 'reno@gmail.com', 'reno', 3, 0),
(3, 'Zaskia', 'Kuningan', '089876567654', 'zaskia', 'zaskia@gmail.com', 'zaskia', 3, 105),
(6, 'Yahya', 'Kuningan, Jawa Barat', '089987645321', 'coba', 'coba@gmail.com', 'coba', 3, 245);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `harga`, `stok`, `tipe`, `gambar`) VALUES
('4NEbx', 1, 'Furadan', 'Pupuk Furadan', '15000', 1000, 1, 'images.jpeg'),
('7bNjJ', 2, 'Gramoxon', 'Obat Pembasmi Hama Gramoxon', '23000', 1000, 1, 'images1.jpeg'),
('H71Ni', 1, 'Urea', 'Pupuk Urea', '13000', 1000, 1, 'pupuk1.png'),
('lYMJS', 1, 'NPK', 'Pupuk NPK', '12000', 1000, 1, 'pupuk.png'),
('VcHi3', 2, 'Roundup', 'Obat Pembasmi Hama Roundup', '8000', 1000, 1, 'pupuk4.png'),
('W6sv8', 1, 'KCL', 'Pupuk KCL', '10000', 1000, 1, 'pupuk2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(30) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_transaksi` varchar(15) NOT NULL,
  `total_bayar` varchar(15) NOT NULL,
  `status_order` int(11) NOT NULL,
  `type_order` int(11) NOT NULL DEFAULT 1,
  `bukti_pembayaran` text NOT NULL,
  `grand_total` varchar(15) NOT NULL,
  `provinsi` varchar(125) NOT NULL,
  `kota` varchar(125) NOT NULL,
  `expedisi` varchar(125) NOT NULL,
  `paket` varchar(125) NOT NULL,
  `estimasi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `tgl_transaksi`, `total_bayar`, `status_order`, `type_order`, `bukti_pembayaran`, `grand_total`, `provinsi`, `kota`, `expedisi`, `paket`, `estimasi`) VALUES
('20231106KLW8CDNJ', 6, '2023-11-06', '187000', 1, 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-12.jpg', '115000', 'Kalimantan Utara', 'Malinau', 'tiki', 'ECO', '5 Hari'),
('20231106MGL9NOEA', 6, '2023-11-06', '120000', 0, 1, '0', '120000', 'Jawa Barat', 'Kuningan', 'jne', 'CTC', '1-2 Hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(1, 'Admin', 'Kuningan Jawa Barat', '085156727368', 'admin', 'admin', 1),
(2, 'Pemilik', 'Kuningan, Jawa Barat', '089887654323', 'pemilik', 'pemilik', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritik`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
