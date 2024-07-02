-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 08:17 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adinda`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `no_rek` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `nama_bank`, `pemilik`, `no_rek`, `logo`) VALUES
(1, 'BNI', 'Si Tono', '12345678', 'bni.png'),
(2, 'BRI', 'si Tono', '87873412323', 'bri.png'),
(3, 'Mandiri', 'si Tono', '778734098', 'mandiri.png'),
(4, 'BCA', 'si Tono', '998980342487', 'bca.png');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `berita_id` int(11) NOT NULL,
  `berita_kategori_id` int(11) DEFAULT NULL,
  `judul` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `isi` longtext NOT NULL,
  `tanggal` datetime NOT NULL,
  `jenis` enum('berita','halaman') NOT NULL,
  `status` enum('draft','publish') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`berita_id`, `berita_kategori_id`, `judul`, `slug`, `isi`, `tanggal`, `jenis`, `status`, `user_id`) VALUES
(1, NULL, 'Blog', 'blog', '<p>404 NOT FOUND</p>\r\n', '2024-06-19 08:29:37', 'halaman', 'publish', 3),
(4, NULL, 'FAQ', 'faq', '<p>404 NOT FOUND</p>\r\n', '2024-06-19 08:31:03', 'halaman', 'publish', 3),
(3, NULL, 'Support', 'faq', '<p>404 NOT FOUND</p>\r\n', '2024-06-19 08:28:04', 'halaman', 'publish', 3);

-- --------------------------------------------------------

--
-- Table structure for table `berita_kategori`
--

CREATE TABLE `berita_kategori` (
  `berita_kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `konfigurasi_id` int(11) NOT NULL,
  `nama_key` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tipe` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`konfigurasi_id`, `nama_key`, `isi`, `tipe`) VALUES
(1, 'nama-aplikasi', 'ADINDA THRIFTING', 'umum'),
(2, 'company-name', 'ADINDA THRIFTING', 'umum'),
(3, 'company-address', 'Jl. KH. Hasyim Ashari, RT.001/RW.005, Kenanga, Kec. Tangerang, Kota Tangerang, Banten 15145', 'umum'),
(4, 'company-phone', '084158776953', 'umum'),
(5, 'company-email', 'adinda.thrifting@gmail.com', 'umum'),
(6, 'tema-aktif', 'lte', 'tema'),
(7, 'tema-logo', 'logo-c4ca4238a0b923820dcc509a6f75849b.PNG', 'tema');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `kota` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `nama_pelanggan`, `alamat`, `hp`, `email`, `kota`, `user_id`) VALUES
(11, 'user01', 'alamat akun user 1', '10101010', 'user01@gmail.com', '', 16),
(5, 'akuncoba', 'alamat test', '123456789101', 'coba@gmail.com', '456', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `pembelian_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('daftar','selesai') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`pembelian_id`, `tanggal`, `supplier_id`, `user_id`, `status`) VALUES
(1, '2016-06-23 12:57:23', 3, 4, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `pembelian_detail_id` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`pembelian_detail_id`, `pembelian_id`, `produk_id`, `qty`) VALUES
(1, 1, 8, 2),
(2, 1, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_temp`
--

CREATE TABLE `pembelian_temp` (
  `pembelian_temp_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `invoice` varchar(40) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `total` bigint(20) NOT NULL,
  `kurir` varchar(20) NOT NULL,
  `pelayanan` varchar(50) NOT NULL,
  `ongkir` bigint(20) NOT NULL,
  `berat` int(11) NOT NULL,
  `status` enum('draft','konfirmasi','lunas') NOT NULL,
  `promo` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`penjualan_id`, `invoice`, `pelanggan_id`, `kota`, `alamat`, `tanggal`, `total`, `kurir`, `pelayanan`, `ongkir`, `berat`, `status`, `promo`) VALUES
(20, '1718887731', 8, '456', 'test', '2024-06-20 19:48:51', 433434, 'jne', 'standard', 50000, 100, 'lunas', 0),
(21, '1718892244', 5, '456', 'alamat test', '2024-06-20 21:04:04', 1733543, 'jne', 'standard', 50000, 600, 'lunas', 0),
(28, '1719760888', 9, '', 'santan ilir, rt.03, kab kutai kartanegara, prov kaltim, kodepos:75385', '2024-06-30 22:21:28', 150000, 'pos', 'standard', 50000, 100, 'lunas', 0),
(27, '1719731860', 9, '', 'saaasasasas', '2024-06-30 14:17:40', 150000, 'pos', 'standard', 50000, 100, 'lunas', 0),
(29, '1719766153', 5, '', 'alamat test', '2024-06-30 23:49:13', 343344, 'jne', 'standard', 50000, 1000, 'lunas', 0),
(30, '1719769346', 11, '', 'alamat akun user 1', '2024-07-01 00:42:26', 360000, 'jne', 'standard', 50000, 250, 'lunas', 0),
(31, '1719769571', 11, '', 'alamat akun user 1', '2024-07-01 00:46:11', 360000, 'pos', 'standard', 50000, 450, 'lunas', 0),
(32, '1719769870', 11, '', 'alamat akun user 1', '2024-07-01 00:51:10', 200000, 'jne', 'standard', 50000, 600, 'lunas', 0),
(33, '1719770084', 11, '', 'alamat akun user 1', '2024-07-01 00:54:44', 600000, 'jne', 'standard', 50000, 700, 'lunas', 0),
(34, '1719770355', 11, '', 'alamat akun user 1', '2024-07-01 00:59:15', 125000, 'jne', 'standard', 50000, 500, 'draft', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `penjualan_detail_id` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`penjualan_detail_id`, `penjualan_id`, `produk_id`, `qty`, `harga`, `subtotal`, `keterangan`) VALUES
(30, 26, 17, 1, 343344, 343344, ''),
(29, 25, 15, 1, 150000, 150000, ''),
(28, 24, 15, 1, 150000, 150000, ''),
(27, 23, 17, 1, 343344, 343344, ''),
(26, 22, 15, 1, 150000, 150000, ''),
(25, 21, 16, 1, 200000, 200000, ''),
(24, 21, 13, 1, 1533543, 1533543, ''),
(23, 20, 14, 1, 433434, 433434, ''),
(22, 19, 15, 1, 150000, 150000, 'semoga '),
(21, 19, 14, 1, 433434, 433434, ''),
(20, 18, 12, 1, 22323322, 22323322, ''),
(31, 27, 15, 1, 150000, 150000, ''),
(32, 28, 15, 1, 150000, 150000, ''),
(33, 29, 17, 1, 343344, 343344, ''),
(34, 30, 25, 1, 360000, 360000, ''),
(35, 31, 32, 1, 360000, 360000, ''),
(36, 32, 31, 1, 200000, 200000, ''),
(37, 33, 21, 1, 600000, 600000, ''),
(38, 34, 28, 1, 125000, 125000, '');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_konfirmasi`
--

CREATE TABLE `penjualan_konfirmasi` (
  `konfirmasi_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `penjualan_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_konfirmasi`
--

INSERT INTO `penjualan_konfirmasi` (`konfirmasi_id`, `invoice`, `bank_id`, `pemilik`, `tanggal`, `tanggal_transfer`, `bukti_transfer`, `penjualan_id`) VALUES
(11, '1718892244', 1, 'akuncoba', '2024-06-20 21:12:46', '2024-06-20', 'bukti-1718892244.jpg', 21),
(10, '1718887731', 1, 'coba2', '2024-06-20 19:49:22', '2024-06-20', 'bukti-1718887731.jpg', 20),
(9, '1718853168', 1, 'supriyadi', '2024-06-20 10:13:49', '2024-06-20', 'bukti-1718853168.jpg', 18),
(12, '1719731860', 1, 'aditya', '2024-06-30 15:18:56', '2024-06-30', 'bukti-1719731860.png', 27),
(13, '1719760888', 1, 'adityatessss', '2024-06-30 22:23:44', '2024-06-30', 'bukti-1719760888.jpg', 28),
(14, '1719766153', 1, 'akuncoba', '2024-06-30 23:49:51', '2024-06-30', '', 29),
(15, '1719769346', 1, 'user01', '2024-07-01 00:42:40', '2024-07-01', '', 30),
(16, '1719769571', 1, 'user01', '2024-07-01 00:47:22', '2024-07-01', '', 31),
(17, '1719769870', 1, 'user01', '2024-07-01 00:51:46', '2024-07-01', '', 32),
(18, '1719770084', 1, 'user01', '2024-07-01 00:54:56', '2024-07-01', 'bukti-1719770084.jpg', 33);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `kode_produk` varchar(30) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `toko_id` varchar(100) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `merek_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `ukuran_id` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` double NOT NULL,
  `jumlah_lihat` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `stok` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `kode_produk`, `nama_produk`, `toko_id`, `supplier_id`, `merek_id`, `kategori_id`, `ukuran_id`, `deskripsi`, `harga`, `berat`, `jumlah_lihat`, `jumlah_beli`, `stok`) VALUES
(16, '012354', 'baju biru', '', 2, 6, 8, 9, '<p>ini baju baru</p>\r\n', 200000, 500, 0, 1, '1'),
(21, '34567891', 'Hoodie Nike Big Logo', '', 4, 5, 5, 13, '<p>Hoodie hitam brand nike dengan logo berwarna putih di bagian depan</p>\r\n', 600000, 700, 0, 1, '1'),
(13, 'coba', 'coba', '', 1, 4, 5, 9, '<p>tesssssss</p>\r\n', 1533543, 100, 0, 1, '1'),
(12, 'tessss', 'rrrrrrrrrrrrrrrrrrrrrrr', '1', 1, 4, 8, 9, '<p>rererrerer</p>\r\n', 22323322, 0, 0, 1, '1'),
(14, 'cleana', 'celanaasasasas', '', 1, 5, 7, 9, '<p>dfdfdfdfdfdf</p>\r\n', 433434, 100, 0, 1, '1'),
(20, '23456789', 'FEAR OF GOD 4th collection bomber jacket', '', 4, 5, 5, 12, '<p>Jacket Bomber warna abu abu collection limited fead of god</p>\r\n', 800000, 500, 0, 0, '1'),
(19, '12345', 'MLB YANKEES HOODIE', '', 4, 5, 5, 12, '<p>Desc : Hoodie MLB Yankees warna cream</p>\r\n', 600000, 400, 0, 0, '1'),
(22, '45678912', 'Zara Bomber Jacket', '', 4, 5, 5, 15, '<p>Bomber Jacket brand zara warna navy</p>\r\n', 350000, 500, 0, 0, '1'),
(23, '56789123', 'Lacoste Zip Hoodie', '', 4, 5, 5, 14, '<p>Zip Hoodie brand Lacoste berwarna navy dengan zipper</p>\r\n', 450000, 600, 0, 0, '1'),
(24, '11223344', 'White Shirt Slimfit', '', 5, 8, 8, 13, '<p>Kemeja kerja berwarna putih dari brand Men’s Top dengan cuttingan Slimfit</p>\r\n', 230000, 250, 0, 0, '1'),
(25, '33445566', 'Authentic Shirt', '', 5, 8, 8, 12, '<p>Kemeja lengan pendek dengan motif autentik dari brand Cole</p>\r\n', 350000, 250, 0, 1, '1'),
(26, '33445566', 'Covernat T-Shirt', '', 5, 8, 8, 13, '<p>Atasan wanita dengan model vintage berwarna cokelat</p>\r\n', 360000, 600, 0, 0, '1'),
(27, '44556677', 'White NatGeo Longsleeve', '', 5, 8, 8, 12, '<p>Kaos lengan panjang berwarna putih dari brand National Geographic</p>\r\n', 700000, 700, 0, 0, '1'),
(28, '55667788', 'Yonex Short Pants', '', 6, 9, 7, 14, '<p>Celana pendek dari brand Yonex berwarna abu</p>\r\n', 125000, 500, 0, 0, '1'),
(29, '66778899', 'Carpenter Pants', '', 6, 9, 7, 13, '<p>Celana Motif garis dari brand Rokx dengan karet yang dapat di adjust</p>\r\n', 340000, 640, 0, 0, '1'),
(30, '66778899', 'Celana Tartan Uniqlo', '', 6, 9, 7, 12, '<p>Celana Tartan dari brand Uniqlo dengan motif kotak – kotak</p>\r\n', 260000, 450, 0, 0, '1'),
(31, '77889911', 'Trackpants Adidas', '', 6, 9, 7, 13, '<p>Celana Lari dari brand Adidas berwarna hitam dengan motif 3 garis di bagian samping</p>\r\n', 200000, 600, 0, 1, '1'),
(32, '88991122', 'Cargo TOREAD', '', 6, 9, 7, 12, '<p>Celana Kargo dari brand Toread dengan banyak zipper</p>\r\n', 360000, 450, 0, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_kategori`
--

INSERT INTO `produk_kategori` (`kategori_id`, `nama_kategori`) VALUES
(5, 'Jaket'),
(8, 'Baju'),
(7, 'Celana');

-- --------------------------------------------------------

--
-- Table structure for table `produk_merek`
--

CREATE TABLE `produk_merek` (
  `merek_id` int(11) NOT NULL,
  `nama_merek` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_merek`
--

INSERT INTO `produk_merek` (`merek_id`, `nama_merek`) VALUES
(4, 'Adidas'),
(5, 'uniqloh'),
(8, 'zee'),
(9, 'calibur');

-- --------------------------------------------------------

--
-- Table structure for table `produk_photo`
--

CREATE TABLE `produk_photo` (
  `photo_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_photo`
--

INSERT INTO `produk_photo` (`photo_id`, `produk_id`, `photo`) VALUES
(109, 11, 'produk_11-1.jpg'),
(147, 17, 'produk_17-1.jpg'),
(146, 16, 'produk_16-1.jpg'),
(145, 15, 'produk_15-1.jpg'),
(144, 14, 'produk_14-1.jpg'),
(143, 13, 'produk_13-1.jpg'),
(139, 12, 'produk_12-1.jpg'),
(148, 18, 'produk_18-1.jpg'),
(150, 19, 'produk_19-1.png'),
(151, 20, 'produk_20-1.png'),
(152, 21, 'produk_21-1.png'),
(153, 22, 'produk_22-1.png'),
(154, 23, 'produk_23-1.png'),
(155, 24, 'produk_24-1.png'),
(156, 25, 'produk_25-1.png'),
(157, 26, 'produk_26-1.png'),
(158, 27, 'produk_27-1.png'),
(159, 28, 'produk_28-1.png'),
(160, 29, 'produk_29-1.png'),
(161, 30, 'produk_30-1.png'),
(162, 31, 'produk_31-1.png'),
(163, 32, 'produk_32-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `produk_stok`
--

CREATE TABLE `produk_stok` (
  `stok_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `toko_id` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `stok_mutasi` int(11) NOT NULL,
  `stok_jual` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_stok`
--

INSERT INTO `produk_stok` (`stok_id`, `produk_id`, `toko_id`, `stok`, `stok_mutasi`, `stok_jual`) VALUES
(26, 12, 1, 1, 0, 1),
(27, 13, 1, 1, 0, 1),
(36, 22, 1, 1, 0, 0),
(30, 16, 1, 1, 0, 1),
(35, 21, 1, 1, 0, 1),
(28, 14, 1, 1, 0, 1),
(34, 20, 1, 1, 0, 0),
(33, 19, 1, 1, 0, 0),
(37, 23, 1, 1, 0, 0),
(38, 24, 1, 1, 0, 0),
(39, 25, 1, 1, 0, 1),
(40, 26, 1, 1, 0, 0),
(41, 27, 1, 1, 0, 0),
(42, 28, 1, 1, 0, 0),
(43, 29, 1, 1, 0, 0),
(44, 30, 1, 1, 0, 0),
(45, 31, 1, 1, 0, 1),
(46, 32, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk_ukuran`
--

CREATE TABLE `produk_ukuran` (
  `ukuran_id` int(11) NOT NULL,
  `nama_ukuran` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_ukuran`
--

INSERT INTO `produk_ukuran` (`ukuran_id`, `nama_ukuran`) VALUES
(15, 'S'),
(14, 'M'),
(13, 'L'),
(12, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promo_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `nilai` bigint(20) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `banner_gambar` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`promo_id`, `judul`, `deskripsi`, `nilai`, `mulai`, `selesai`, `banner_gambar`) VALUES
(2, 'Promo 17 Agustus', '<p>Promo 17 Agustus</p>\r\n', 20000, '2018-08-25', '2018-08-25', 'produk_5-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promo_data`
--

CREATE TABLE `promo_data` (
  `promo_data_id` int(11) NOT NULL,
  `promo_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo_data`
--

INSERT INTO `promo_data` (`promo_data_id`, `promo_id`, `produk_id`) VALUES
(1, 4334, 5);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `nama_supplier`, `alamat`, `telepon`, `user_id`) VALUES
(4, 'Pt. Jaya abadi', 'kampung durian', '112233445566', NULL),
(5, 'Pt. Zaia Perkasa', 'Yokohama', '222222222', NULL),
(6, 'Cover', 'Tigaraksa', '3322556644', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `toko_id` int(11) NOT NULL,
  `nama_toko` varchar(1000) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `telepon` varchar(1000) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`toko_id`, `nama_toko`, `alamat`, `telepon`, `kota`, `tipe`) VALUES
(1, 'pusat', 'sas', 'ass', 'bontang', 'pusat');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` varchar(100) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `terakhir_login` datetime NOT NULL,
  `toko` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`user_id`, `nama`, `username`, `password`, `akses`, `photo`, `status`, `terakhir_login`, `toko`) VALUES
(3, 'Administrator ', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'op', '', 'aktif', '2024-07-01 01:02:17', '1'),
(7, 'akuncoba', 'coba', 'a3040f90cc20fa672fe31efcae41d2db', 'member', '', '', '2024-07-01 00:39:41', ''),
(16, 'user01', 'user01', 'b75705d7e35e7014521a46b532236ec3', 'member', '', '', '2024-07-01 00:59:04', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`konfigurasi_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`pembelian_id`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`pembelian_detail_id`);

--
-- Indexes for table `pembelian_temp`
--
ALTER TABLE `pembelian_temp`
  ADD PRIMARY KEY (`pembelian_temp_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualan_id`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`penjualan_detail_id`);

--
-- Indexes for table `penjualan_konfirmasi`
--
ALTER TABLE `penjualan_konfirmasi`
  ADD PRIMARY KEY (`konfirmasi_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `produk_merek`
--
ALTER TABLE `produk_merek`
  ADD PRIMARY KEY (`merek_id`);

--
-- Indexes for table `produk_photo`
--
ALTER TABLE `produk_photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `produk_stok`
--
ALTER TABLE `produk_stok`
  ADD PRIMARY KEY (`stok_id`);

--
-- Indexes for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  ADD PRIMARY KEY (`ukuran_id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `promo_data`
--
ALTER TABLE `promo_data`
  ADD PRIMARY KEY (`promo_data_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`toko_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `konfigurasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `pembelian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `pembelian_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian_temp`
--
ALTER TABLE `pembelian_temp`
  MODIFY `pembelian_temp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `penjualan_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `penjualan_konfirmasi`
--
ALTER TABLE `penjualan_konfirmasi`
  MODIFY `konfirmasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk_merek`
--
ALTER TABLE `produk_merek`
  MODIFY `merek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk_photo`
--
ALTER TABLE `produk_photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `produk_stok`
--
ALTER TABLE `produk_stok`
  MODIFY `stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  MODIFY `ukuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promo_data`
--
ALTER TABLE `promo_data`
  MODIFY `promo_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `toko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
