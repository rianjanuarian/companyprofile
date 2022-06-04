-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Feb 2022 pada 22.30
-- Versi server: 10.3.32-MariaDB-cll-lve
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u7767386_kentangtech`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `nama`, `password`, `foto`) VALUES
('admin', 'sabhara', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Admin.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `no` int(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` longtext NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`no`, `judul`, `isi`, `foto`, `tanggal`) VALUES
(3, 'aww', '<p>sad</p>', '14102020042856x c.PNG', '2020-10-14'),
(4, 'testes', '<p>sad</p>', '14102020091741snippet.PNG', '2020-11-07'),
(5, 'sadasd', '<p>wkwk</p>', '14102020095700ss.PNG', '2020-10-14'),
(6, 'anima', '<p>annima kamklsdasdsakdksadk</p><p>sadksakdsakdsadsad<span style=\"background-color: rgb(255, 255, 0);\">sadsad<b>sadsadsad</b></span></p><p><span style=\"background-color: rgb(255, 255, 0);\"><b>asd</b></span></p><p><span style=\"background-color: rgb(255, 255, 0);\"><b>sa</b></span></p><p><span style=\"background-color: rgb(255, 255, 0);\"><b>dsa</b></span></p><p><span style=\"background-color: rgb(255, 255, 0);\"><b>d</b></span></p><p><span style=\"background-color: rgb(255, 255, 0);\"><b><br></b></span></p>', '14102020112541halaman depan.PNG', '2020-10-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `kode_penjualan` varchar(13) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`kode_penjualan`, `kode_produk`, `jumlah`) VALUES
('1528216407', '5f871eab79', 2),
('1528216407', '5f871e5345', 3),
('962515754', '5f871eab79', 1),
('1225139624', '5f871eece7', 1),
('383642627', '5f871e5345', 1),
('383642627', '5f871da81e', 1),
('1225869394', '5f871eab79', 1),
('1225869394', '5f871e5345', 1),
('550850826', '5f871e5345', 1),
('550850826', '5f871eab79', 1),
('550850826', '5f871eece7', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(3) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('5f8', 'Charger'),
('5fa', 'Laptop'),
('5fe', 'Mouse Gaming'),
('a', 'aksesoris'),
('BC1', 'VGA'),
('c', 'Processor'),
('Dlq', 'CPU'),
('Hj5', 'HDD'),
('MCU', 'SSD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_penjualan` varchar(13) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `alamat` tinytext NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `kode_pos` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`kode_penjualan`, `username`, `tanggal`, `total`, `status`, `alamat`, `kabupaten`, `kode_pos`) VALUES
('1225139624', 'Boswes', '2020-12-28 04:19:07', 15552000, 'proses', 'Perumahan nasional', 'Bangka Selatan', '76289'),
('1225869394', 'rian', '2020-12-29 03:39:40', 6484000, 'selesai', 'dki', 'Jakarta Barat', '32132'),
('1528216407', 'rofiq', '2020-12-09 12:39:34', 12750000, 'selesai', 'balerejo', 'Bangka', '68992'),
('383642627', 'rian', '2020-12-29 03:01:51', 17924000, 'selesai', 'mastrip', 'Jember', '32132'),
('550850826', 'marsa', '2020-12-29 04:18:29', 22040000, 'selesai', 'jambi', 'Lebak', '32132'),
('962515754', 'Boswes', '2020-12-28 04:16:59', 1307000, 'pending', 'Terminal', 'Gresik', '89976'),
('dsadadw', 'rew', '2020-11-10 14:10:04', 123, 'selesai', 'sdadw32321', 'sadqq', '55643');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kode_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `kode_kategori` varchar(3) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama_produk`, `kode_kategori`, `merk`, `stok`, `harga`, `berat`, `foto`, `create_at`, `update_at`) VALUES
('5f871da81e', '2080 TI 11gb', 'BC1', 'RTX', 5, 12750000, 3000, 'WbjFHTrz.jpg', '2020-10-15 08:03:40', '2020-12-28 02:10:15'),
('5f871e5345', 'Ryzen7 3700X 3.6Ghz', 'c', 'AMD', 4, 5150000, 1000, 'CF2WuDkw.jpg', '2020-10-15 08:03:40', '2020-12-28 02:10:15'),
('5f871eab79', 'Corei3-9100F', 'c', 'Intel', 6, 1300000, 1000, 'PdSmjvBL.jpg', '2020-10-15 08:03:40', '2020-12-28 02:10:15'),
('5f871eece7', ' Ryzen 9 5950X Box', 'c', 'AMD', 2, 15500000, 1000, 'VNqACY8K.jpg', '2020-10-15 08:03:40', '2020-12-28 02:10:15'),
('5f8866e264', 'Asus vn72', '5f8', 'Asus', 6, 120000, 500, 'wg0GinHF.jpg', '2020-10-15 08:12:34', '2020-12-28 02:10:15'),
('5fa95b34b3', ' Ryzen 5 5600X Box ', 'c', 'AMD', 3, 5150000, 1000, 'c9JfBQKo.jpg', '2020-11-09 08:07:32', '2020-12-28 02:10:15'),
('5fe7a80593', 'Casing DeepCool MATREXX 55 Fan RGB 3F Tempered Gla', 'Dlq', 'DeepCool', 2, 1000000, 5000, 'pgEvYsKH.jpg', '2020-12-26 14:15:49', '2020-12-28 02:10:15'),
('5fe7a8871a', 'Aerocool PULSE L240F Liquid Cooling RGB', 'a', 'Aerocool', 2, 1100000, 2000, 'j906KfDE.jpg', '2020-12-26 14:17:59', '2020-12-28 02:10:15'),
('5fe7a90fd3', 'PREDATOR HELIOS 300 PH315-53 i7-10750H 8GB 512GB R', '5fa', 'Acer', 1, 22200000, 7000, 'ZcwH5tWa.jpg', '2020-12-26 14:20:15', '2020-12-28 02:10:15'),
('5fe7a9a514', 'Gaming Chair GC-015 RGB', 'a', 'DragonWar', 1, 2200000, 12000, '7ICcvDw0.jpg', '2020-12-26 14:22:45', '2020-12-28 02:10:15'),
('5fe8796b7a', 'Mouse Logitech G402 / Mouse gaming ', '5fe', 'Logitech', 2, 490000, 300, 'bkavnB3A.jpg', '2020-12-27 05:09:15', '2020-12-28 02:14:50'),
('5fe879cca4', 'Logitech g502 ', '5fe', 'Logitech', 1, 720000, 300, 'spZWAiFS.jpg', '2020-12-27 05:10:52', '2020-12-28 02:14:58'),
('5fe87a2da4', 'Steelseries Sensei Ten Neon Rider ', '5fe', 'Steelseries', 1, 1000000, 300, 'UTD3bcEV.jpg', '2020-12-27 05:12:29', '2020-12-28 02:14:39'),
('5fe87a6dc7', 'Steelseries Rival 310 Gaming Mouse', '5fe', 'Steelseries', 2, 780000, 300, 'J6cPur8h.jpg', '2020-12-27 05:13:33', '2020-12-28 02:15:14'),
('5fe87abc49', 'Razer Basilisk V2 Wired Gaming Mouse', '5fe', 'Razer', 1, 13700000, 300, 'EJef8TSA.jpg', '2020-12-27 05:14:52', '2020-12-28 02:15:29'),
('5fe87b03a4', 'Razer Viper Ultimate Hyperspeed Wireless ', '5fe', 'Razer', 1, 2300000, 300, 'Uk4N9VXi.jpg', '2020-12-27 05:16:03', '2020-12-28 02:15:38'),
('5fe87c12b4', 'PC Gaming Core i7 3770 GTX 1050 Ti', 'Dlq', 'PC gaming', 1, 6700000, 9000, '7ENgdTfp.jpg', '2020-12-27 05:20:34', '2020-12-28 02:11:18'),
('5fe87c92c0', 'Seagate Backup Plus 5TB', 'Hj5', 'Seagate', 2, 1800000, 800, 'y1aZiALW.jpg', '2020-12-27 05:22:42', '2020-12-28 02:11:18'),
('5fe87ceab0', 'ASUS ROG STRIX G512LI-I75TB6T i7-10750H 8GB 512GB', '5fa', 'Asus ROG', 1, 16200000, 8000, 'ue2TicQf.jpg', '2020-12-27 05:24:10', '2020-12-28 02:11:18'),
('5feaaeab54', 'asus laptop', '5fa', 'asus', 2, 2000, 3000, 'q1nz3eSE.jpg', '2020-12-29 04:20:59', '2020-12-29 04:21:12'),
('ff', '2070 Super', 'c', 'Aorus', 3, 7800000, 2000, 'fTKE0PWY.png', '2020-10-15 08:03:40', '2020-12-28 02:11:18'),
('gg', 'CASE / CASING RAPTOR BLACK STRIKE 1607 TEMPERED GL', 'Dlq', 'RAPTOR', 2, 300000, 5000, 'VnfCMUa5.jpg', '2020-10-15 08:04:54', '2020-12-28 02:11:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `Is_Active`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', '$2y$12$i4LMfeFPQpGSNPTaccIkKuwxAkJ4PhBr3JND7FpXwWFjRvchQn17C', 'phpgurukulofficial@gmail.com', 1, '2018-05-27 17:51:00', '2018-10-24 18:21:07'),
(2, 'rian', 'rian', 'rian', 1, '2020-11-25 07:28:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblcategory`
--

INSERT INTO `tblcategory` (`CategoryId`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(8, 'Hardware', 'Hardware', '2020-11-25 07:39:56', NULL, 1),
(9, 'Software', 'Software', '2020-11-25 07:40:06', NULL, 1),
(10, 'Game', 'Game', '2020-11-25 07:40:14', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcomments`
--

CREATE TABLE `tblcomments` (
  `no` int(11) NOT NULL,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblcomments`
--

INSERT INTO `tblcomments` (`no`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(1, '12', 'Anuj', 'anuj@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.', '2018-11-21 11:06:22', 0),
(2, '12', 'Test user', 'test@gmail.com', 'This is sample text for testing.', '2018-11-21 11:25:56', 1),
(3, '7', 'ABC', 'abc@test.com', 'This is sample text for testing.', '2018-11-21 11:27:06', 1),
(4, '13', 'rianjanuarian', 'reeyanrian@gmail.com', 'dgf', '2020-11-25 07:50:23', 1),
(6, '13', 'sad', 'reeyanrian@gmail.com', 'asd', '2020-11-25 18:45:58', 1),
(7, '13', 'andika brook', 'reeyanrian@gmail.com', 'ds', '2020-11-25 18:50:52', 1),
(8, '20', 'rian', 'reeyanrian@gmail.com', 'bagus', '2020-12-29 02:58:24', 1),
(9, '20', 'rian', 'reeyanrian@gmail.com', 'nice', '2020-12-29 03:37:09', 1),
(10, '20', 'rizkiyanuarianto', 'rianreeyan@gmail.com', 'oke', '2020-12-29 03:52:17', 0),
(11, '21', 'rian', 'rianreeyan@gmail.com', 'bagus', '2020-12-29 04:16:09', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'About News Portal', '<font color=\"#7b8898\" face=\"Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif\"><span style=\"font-size: 26px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></font><br>', '2018-06-30 18:01:03', '2018-06-30 19:19:51'),
(2, 'contactus', 'Contact Details', '<p><br></p><p><b>Address :&nbsp; </b>New Delhi India</p><p><b>Phone Number : </b>+91 -01234567890</p><p><b>Email -id : </b>phpgurukulofficial@gmail.com</p>', '2018-06-30 18:01:36', '2018-06-30 19:23:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` longtext DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`) VALUES
(13, 'Fifa 321', 10, 12, '<p style=\"grid-column: main / main; font-size: 16px; line-height: 1.5; margin-top: 0.75rem; margin-bottom: 0.75rem; color: rgb(33, 33, 33); font-family: Roboto, &quot;Roboto Condesed&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Ada banyak keputusan publisher dan developer yang di mata kita, gamer sebagai konsumen, seringkali sulit dilihat sebagai sesuatu yang rasional. Salah satu pemandangan umum yang terjadi pada saat transisi generasi konsol? Keputusan untuk tidak menawarkan upgrade visual yang sama untuk versi PC, yang notabene merupakan platform dinamis yang punya ruang performa lebih kuat. Hal yang terjadi dengan Devil May Cry 5: Special Edition dari Capcom yang punya efek ray-tracing untuk PS5 dan Xbox Series X, namun tidak untuk PC ini, ternyata juga akan terjadi di game sepakbola populer milik EA – FIFA 21. FIFA 21 versi PC tidak akan mendapatkan upgrade visual yang sama dengan versi next-gen.</p><p style=\"grid-column: main / main; font-size: 16px; line-height: 1.5; margin-top: 0.75rem; margin-bottom: 0.75rem; color: rgb(33, 33, 33); font-family: Roboto, &quot;Roboto Condesed&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Apa alasannya? Percaya atau tidak, EA takut upgrade next-gen untuk FIFA 21 versi PC akan membuat kebutuhan spesifikasi minimum untuk game tersebut naik. Hal tersebut diungkapkan oleh Executive Producer – Aaron McHardy dalam pernyataan terbarunya pada Eurogamer. McHardy menyebut bahwa dengan mempertahankan spesifikasi minimum yang bersahabat, FIFA 21 versi PC akan tetap bisa dinikmati oleh sebanyak mungkin gamer. Jika mereka mulai mengaplikasikan update next-gen tahun ini juga, akan ada banyak gamer PC di luar sana yang tidak akan bisa lagi menikmati FIFA. Ini bukan kali pertamanya EA menempuh strategi serupa, mengingat hal sama juga sempat terjadi di FIFA 15 tahun 2014 silam.</p>', '2020-11-25 07:41:26', '2020-12-27 11:13:16', 0, 'Fifa-321', 'f370e63695be5b87076951fea245b78c.jpg'),
(14, 'Xiaomi Hore', 8, 10, '<p><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\">Dear RianBijiGede,</span><br style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\"><br style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\"><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\">As you requested, your password has now been reset. Your new details are as follows:</span><br style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\"><br style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\"><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\">Username: RianBijiGede</span><br style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\"><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\">Password: T9JFTZUU</span><br style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\"><br style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\"><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\">To change your password, please visit this page:&nbsp;</span><a href=\"https://www.unknowncheats.me/forum/profile.php?do=editpassword\" rel=\"noreferrer\" target=\"_blank\" data-saferedirecturl=\"https://www.google.com/url?q=https://www.unknowncheats.me/forum/profile.php?do%3Deditpassword&amp;source=gmail&amp;ust=1606388132571000&amp;usg=AFQjCNHynNY2V4PHMiS5EnR4bCmwRbEQ7g\" style=\"color: rgb(17, 85, 204); font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">https://www.unknowncheats.me/f<wbr>orum/profile.php?do=editpasswo<wbr>rd</a><br style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\"><br style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\"><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\">All the best,</span><br style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\"><span style=\"color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small;\">UnKnoWnCheaTs - Multiplayer Game Hacks and Cheats</span><br></p>', '2020-11-25 12:15:03', '2020-12-27 11:12:46', 0, 'Xiaomi-Hore', 'dd57dce3a60adaf1446eeeabff10be40.jpg'),
(15, 'uzi', 8, 10, '<p>sadsad</p>', '2020-11-25 14:11:48', '2020-12-27 11:12:49', 0, 'uzi', '7be1ed9c41d1e3ea5ac1f8fd1ff0877f.jpg'),
(16, 'uzi', 8, 10, '<p>sadsad</p>', '2020-11-25 18:44:02', '2020-12-27 11:12:53', 0, 'uzi', '7be1ed9c41d1e3ea5ac1f8fd1ff0877f.jpg'),
(17, 'laba laba', 9, 9, '<p style=\"text-align: center;\"><b>Peningkatan jumlah labalaba</b><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span></p><p style=\"text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;;\">asdadwda&nbsp;</span><span style=\"font-family: Tahoma;\">﻿<b>nama saya rofiq</b></span></p>', '2020-12-01 01:44:43', '2020-12-27 11:13:13', 0, 'laba laba', 'VOXA9JmQ.jpg'),
(18, 'tampan gaming', 8, 8, '<p><span style=\"font-family: Verdana;\">﻿dqudqwtuiqwkm,d.qncbqwghn</span><br></p>', '2020-12-01 01:48:48', '2020-12-27 11:12:55', 0, 'tampan-gaming', 'haC0WNE2.jpg'),
(19, 'Intel Kesulitan Penuhi Pesanan Processor', 8, 10, '<p><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Penyebabnya adalah tingginya pertumbuhan industri PC yang cukup mengejutkan. Tingginya pertumbuhan industri PC itu, menurut Swan, disebabkan oleh adanya permintaan yang kuat akan perangkat gaming dan perangkat PC kelas komersial.</span><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Ditambah lagi, Intel memang mengalami kesulitan pada masa transisi dari pabrikasi arsitektur 14nm ke 10nm pada produksi prosesornya.</span><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"></p><div class=\"clearfix\" style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"></div><div class=\"parallax_detail parallaxB\" style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; margin: 0px auto; position: relative;\"><div class=\"parallax_abs\" style=\"width: 430px; height: 0px; position: absolute; top: 0px; left: 0px; clip: rect(auto, auto, auto, auto);\"><div class=\"parallax_fix\" style=\"width: 430px; height: 608px; position: fixed; top: 0px; transform: translateZ(0px); margin: 0px auto;\"><div class=\"parallax_ads\" style=\"width: 430px; height: auto; border: none; position: absolute; left: 215px; top: 0px; transform: translateX(-50%);\"></div></div></div></div><p><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Namun menurut Swan, Intel kini sudah mulai bisa meningkatkan produksi chip-chip prosesor itu, dan diyakini bisa memenuhi permintaan pasar sampai akhir tahun ini.</span><br></p>', '2020-12-27 11:12:14', NULL, 1, 'Intel-Kesulitan-Penuhi-Pesanan-Processor', 'vxFwXoJk.jpg'),
(20, 'Nvidia kembangkan super komputer untuk membantu memecahkan masalah kesahatan', 9, 11, '<p><span style=\"font-family: lato, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\">NVIDIA, yang merupakan sebuah perusahaan alat-alat komunikasi untuk komputer pribadi sedang mengembangkan superkomputer paling kuat di Inggris. Superkomputer ini akan menggunakan kecerdasan buatan (AI) untuk membantu para peneliti memecahkan tantangan medis yang mendesak, termasuk terkait dengan COVID-19. \" SK dan AstraZenca, sama-sama terlibat dalam penelitian vaksin virus corona, akan menjadi dua perusahaan farmasi pertama memanfaatkan tenaga mesin tersebut,\" jelas Nvidia, dikutip dari Reuters</span><br style=\"font-family: lato, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\"><span style=\"font-family: lato, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\">Komputer bernama Cambridge-1, diharapkan bisa online pada akhir tahun di Cambridge, Inggris, akan dibekali sistem NVIDIA DGX SuperPOD. Sistem ini akan mampu memberikan lebih dari 400 petaflops kinerja AI. \" Hal itu berarti komputer tersebut menempati urutan ke-29 dalam daftar 500 teratas superkomputer paling kuat di dunia,\" kata Nvidia.</span><br style=\"font-family: lato, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\"><br style=\"font-family: lato, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\"><br></p>', '2020-12-27 11:20:05', NULL, 1, 'Nvidia-kembangkan-super-komputer-untuk-membantu-memecahkan-masalah-kesahatan', 'HKiklfoe.jpg'),
(21, 'Lenovo luncurkan laptop layar lipat', 8, 10, '<p><span style=\"font-family: lato, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\">Usai dikenalkan pada Januari 2020 lalu, Lenovo akhirnya resmi meluncurkan laptop layar lipat besutannya yakni ThinkPad X1 Fold. Laporan The Verge, Rabu (30/9) menyebut Lenovo juga membuka keran pre-order untuk produk terbarunya itu dengan banderol USD 2.499 atau setara Rp37 juta. Sesuai namanya, ThinkPad X1 Fold merupakan laptop dengan layar yang dapat dilipat. Sekilas, desain perangkat itu mirip tablet berukuran besar, tetapi memiliki fungsi dan kemampuan sebuah laptop.</span><br style=\"font-family: lato, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\"><span style=\"font-family: lato, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\">Laptop itu hadir dengan layar OLED berukuran 13 inci. Adapun penyediaan layar untuk laptop ini ialah LD DIsplay. Terkait spesifikasi, ThinkPad X1 Fold diotaki prosesor Inte Core generasi 11 yang dilengkapi teknologi Intel Hybrid. Kinerja laptop itu didukung RAM 8GB, memori 1TB, baterai 50Wh, dan dua port USB Type-C. Selain itu, laptop layar lipat itu diklaim mempunyai bobot lebih ringan yang pernah dibuuat yaitu 0,9 kilogram.</span><br style=\"font-family: lato, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\"><br style=\"font-family: lato, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\"><br></p>', '2020-12-27 11:23:31', NULL, 1, 'Lenovo-luncurkan-laptop-layar-lipat', 'riDxtSKk.jpg'),
(22, 'Minecraft jadi game paling laris ditahun 2020', 10, 12, '<p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">&nbsp;<a href=\"https://www.detik.com/tag/microsoft\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(86, 43, 119); transition: all 0.3s ease-in-out 0s;\"><strong style=\"font-weight: bold;\">Microsoft</strong>&nbsp;</a>sebagai pemilik Mojang Studios yang mengembangkan Minecraft mengungkap pandemi virus Corona mendorong kenaikan jumlah pemain yang cukup signifikan.</p><div class=\"clearfix\" style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"></div><div class=\"parallax_detail parallaxB\" style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; margin: 0px auto; position: relative;\"><div class=\"parallax_abs\" style=\"width: 430px; height: 0px; position: absolute; top: 0px; left: 0px; clip: rect(auto, auto, auto, auto);\"><div class=\"parallax_fix\" style=\"width: 430px; height: 608px; position: fixed; top: 0px; transform: translateZ(0px); margin: 0px auto;\"><div class=\"parallax_ads\" style=\"width: 430px; height: auto; border: none; position: absolute; left: 215px; top: 0px; transform: translateX(-50%);\"></div></div></div></div><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Pada bulan lalu, Minecraft mencatat kenaikan pemain baru sebanyak 25% dan kenaikan 40% untuk sesi multiplayer. Hanya dalam setahun terakhir, Mojang dan Microsoft berhasil menjual 24 juta kopi&nbsp;<strong style=\"font-weight: bold;\"><a href=\"https://www.detik.com/tag/minecraft\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(0, 0, 0); transition: all 0.3s ease-in-out 0s;\">Minecraft</a></strong>.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Minecraft pertama kali mencapai angka 100 juta penjualan pada tahun 2016, dan popularitasnya sepertinya akan terus menanjak. Tidak hanya populer untuk dimainkan, Minecraft juga merupakan game yang paling banyak ditonton di YouTube setelah ditonton 100,2 miliar kali pada tahun lalu.</p>', '2020-12-27 11:26:15', NULL, 1, 'Minecraft-jadi-game-paling-laris-ditahun-2020', 'P4bI5Dv1.jpg'),
(23, 'Crysis Remastered Bakal Bisa Dimainkan di Nintendo Switch', 10, 12, '<p style=\"margin-top: 16px; margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Rumor ini berasal dari seorang pengguna Twitter dengan nama lashman yang melihat informasi tambahan di situs Crysis Remastered -- kini sudah dihapus -- yang menyebut sejumlah informasi mengenai game yang pada zamannya selalu dijadikan patokan kemampuan gaming sebuah PC tersebut.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">\"Crysis Remaster bakal menghadirkan sejumlah fitur grafis baru, tekstur berkualitas tinggi, dan CryEngine native hardware, dan solusi API ray tracing untuk PC, PlayStation, Xbox, dan -- untuk pertama kalinya -- Nintendo Switch,\" begitu tulisan di situs Crysis Remastered.</p><div style=\"height: 0px;\"></div><div id=\"_forkInArticleAdContainer\" style=\"width: 0px; height: 0px; border: none !important;\"><ins data-revive-zoneid=\"4562\" data-revive-id=\"e91f95c5fd756b81263fe39d57b4175c\" data-revive-blockwords=\"api,bocor\" data-revive-flags=\"yes\" data-revive-category=\"science&amp;technology\" data-revive-keyword=\" crysis remastered dimainkan nintendo switch crysis remastered dimainkan nintendo switch menu crysis remastered dimainkan nintendo switch anggoro suryo jati detikinet crysis remastered foto istimewa jakarta muncul rumor game crysis versi remasternya muncul rumor menyebut game tersedia nintendo switch rumor berasal pengguna twitter nama lashman informasi tambahan situs crysis remastered dihapus menyebut informasi game zamannya dijadikan patokan kemampuan gaming pc crysis remaster menghadirkan fitur grafis tekstur berkualitas cryengine native hardware solusi api ray tracing pc playstation xbox kalinya nintendo switch tulisan situs crysis remastered desain cover game bocor publik mengkonfirmasi kehadiran game nintendo switch crytek pengembangnya angkat bicara peluncuran game baca crysis versi remaster dirilis disebutnya ray tracing fitur hadir konsol generasi ps5 xbox series x dikutip detikinet the verge jumat 1742020 crysis masanya game dijadikan patokan kemampuan gaming pc game memeras kemampuan pc menghasilkan grafis memukau sayangnya game muncul 2013 crysis 3 lanjutan game cryengine basisnya game engine buatan crytek simak video nih tampilan nintendo switch lite praktis \" style=\"text-decoration-line: none; display: contents;\"></ins></div><p></p><div class=\"clearfix\" style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"></div><div class=\"parallax_detail parallaxB\" style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; margin: 0px auto; position: relative;\"><div class=\"parallax_abs\" style=\"width: 430px; height: 0px; position: absolute; top: 0px; left: 0px; clip: rect(auto, auto, auto, auto);\"><div class=\"parallax_fix\" style=\"width: 430px; height: 608px; position: fixed; top: 0px; transform: translateZ(0px); margin: 0px auto;\"><div class=\"parallax_ads\" style=\"width: 430px; height: auto; border: none; position: absolute; left: 215px; top: 0px; transform: translateX(-50%);\"></div></div></div></div><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Bahkan desain cover untuk game tersebut pun kini sudah bocor ke publik, yang semakin mengkonfirmasi kehadiran game tersebut di Nintendo Switch. Crytek sebagai pengembangnya memang belum angkat bicara sama sekali, namun sepertinya peluncuran game tersebut sudah dekat.</p>', '2020-12-27 11:29:12', NULL, 1, 'Crysis-Remastered-Bakal-Bisa-Dimainkan-di-Nintendo-Switch', 'dJPL4A2O.jpg'),
(24, 'Steam Beri Diskon Besar-besaran', 10, 12, '<p><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Ajang diskon tahunan&nbsp;</span><a href=\"https://www.detik.com/tag/steam\" style=\"background: rgb(255, 255, 255); color: rgb(86, 43, 119); transition: all 0.3s ease-in-out 0s; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Steam&nbsp;</a><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">kembali digelar. Ada banyak&nbsp;</span><a href=\"https://www.detik.com/tag/game-pc\" style=\"background: rgb(255, 255, 255); color: rgb(86, 43, 119); transition: all 0.3s ease-in-out 0s; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">game PC</a><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">&nbsp;yang mendapat diskon besar-besaran dan beberapa di antaranya adalah game populer. Apa saja?</span><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Untuk kategori game yang terhitung baru dirilis, ada Soulcalibur VI yang setelah didiskon harganya menjadi Rp 181 ribu. Sementara Devil May Cry 5 yang baru dirilis pada Maret 2019 lalu harganya turun menjadi Rp 329 ribu.</span><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Dalam daftar game terlaris yang dipajang oleh Steam ada sejumlah judul game populer yang mendapat diskon terbilang besar. Sebut saja Monster Hunter: World yang mendapat diskon 50%, sehingga harganya menjadi cuma Rp 249 ribu.</span><br></p>', '2020-12-27 11:31:08', '2020-12-27 11:31:34', 0, 'Steam-Beri-Diskon-Besar-besaran', 'QEtyc1zx.jpg'),
(25, 'Steam Beri Diskon Besar-besaran', 10, 12, '<p><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Ajang diskon tahunan&nbsp;</span><a href=\"https://www.detik.com/tag/steam\" style=\"background: rgb(255, 255, 255); color: rgb(86, 43, 119); transition: all 0.3s ease-in-out 0s; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Steam&nbsp;</a><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">kembali digelar. Ada banyak&nbsp;</span><a href=\"https://www.detik.com/tag/game-pc\" style=\"background: rgb(255, 255, 255); color: rgb(86, 43, 119); transition: all 0.3s ease-in-out 0s; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">game PC</a><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">&nbsp;yang mendapat diskon besar-besaran dan beberapa di antaranya adalah game populer. Apa saja?</span><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Untuk kategori game yang terhitung baru dirilis, ada Soulcalibur VI yang setelah didiskon harganya menjadi Rp 181 ribu. Sementara Devil May Cry 5 yang baru dirilis pada Maret 2019 lalu harganya turun menjadi Rp 329 ribu.</span><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Dalam daftar game terlaris yang dipajang oleh Steam ada sejumlah judul game populer yang mendapat diskon terbilang besar. Sebut saja Monster Hunter: World yang mendapat diskon 50%, sehingga harganya menjadi cuma Rp 249 ribu.</span><br></p>', '2020-12-27 11:33:05', NULL, 1, 'Steam-Beri-Diskon-Besar-besaran', 'KizmWVxH.jpg'),
(26, 'Server PlayerUnknown\'s Battlegrounds Tak Sanggup Tampung Gamer', 10, 12, '<p><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Isu server ini memang bukan hal baru. Sebelumnya sempat diberitakan jika server PlayerUnknown\'s Battlegrounds mengalami hal-hal yang tidak menyenangkan, seperti server down, isu koneksi, server crash, sampai kesulitan untuk login.</span></p><p><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Nah, usut punya usut hal ini dikarena Bluehole selaku pengembang tidak memperkirakan bahwa game-nya ini bakal meledak di pasaran. Dengan demikian, server yang dibangun tidak disesuaikan dengan kapasitas pemain yang sekarang.</span><br style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"></p><div class=\"clearfix\" style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\"></div><div class=\"parallax_detail parallaxB\" style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif; margin: 0px auto; position: relative;\"><div class=\"parallax_abs\" style=\"width: 430px; height: 0px; position: absolute; top: 0px; left: 0px; clip: rect(auto, auto, auto, auto);\"><div class=\"parallax_fix\" style=\"width: 430px; height: 608px; position: fixed; top: 0px; transform: translateZ(0px); margin: 0px auto;\"><div class=\"parallax_ads\" style=\"width: 430px; height: auto; border: none; position: absolute; left: 215px; top: 0px; transform: translateX(-50%);\"></div></div></div></div><p><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Menurut keterangan yang disampaikan tim PlayerUnknown\'s Battlegrounds, pihaknya terus meng-upgrade arsitektur server untuk mengatasi meningkatnya jumlah pemain, baik secara bersamaan maupun untuk pemain baru. Namun, ada kalanya dimana jumlah pemain sangat membludak.</span><br></p>', '2020-12-27 11:36:00', NULL, 1, 'Server-PlayerUnknown\'s-Battlegrounds-Tak-Sanggup-Tampung-Gamer', 'ETzf2lvL.jpg'),
(27, 'Samsung Indonesia Rilis 2 Monitor Gaming', 8, 10, '<p>Monitor ini menggunakan panel QLED Curved, resolusi 5.120x1.440, tingkat kecerahan maksimal sebesar 1000cd?m2. Panel QLED menjanjikan jangkauan warna sRGB hingga 125 persen, dilengkapi dengan kualitas HDR 1000. Monitor juga menghadirkan resolusi Dual QHD 49 inci, setara dengan dua monitor QHD berdampingan. Odyssey G9 menawarkan refresh rate 240Hz, menampilkan 240 frame per detik, empat kali lebih banyak frame dalam setiap detik dibandingkan dengan layar biasa. Monitor juga memiliki waktu respons, response time, 1 ms (GTG), dapat merespons sinyal input grafis dalam 0,001 detik.</p><p><br></p><p><br></p><p><br></p>', '2020-12-27 11:38:45', NULL, 1, 'Samsung-Indonesia-Rilis-2-Monitor-Gaming', 'rnmZcfjA.jpg'),
(28, 'Acer luncur kan laptop dengan bobot 1 kilogram', 8, 10, '<p>Acer baru saja meluncurkan laptop Swift 5 terbaru secara online di acara next@acer yang diadakan di Taipei, Taiwan. Laptop ini menawarkan pengalaman baru dalam menunjang aktivitas penggunanya seperti lebih bertenaga dan ringan ketika dibawa sepanjang hari ke mana saja. General Manager Notebooks IT Products Business Acer Inc James Lin mengatakan, Acer Swift 5 terbaru mendorong batasan akan sebuah laptop tipis dan ringan. \"Ini merupakan perangkat produktivitas bertenaga yang dikemas lebih ramping dan ultra portable. Swift 5 merupakan pilihan terbaik bagi para profesional dengan mobilitas tinggi,\" ungkap Lin dalam keterangan tertulisnya, Kamis (25/6). Acer Swift 5 menjadi laptop super tipis dan ringan yang berada di antara gaya, performa, dan portabilitas. Rangka 14,95 mm (0,59 in.) terbuat dari magnesium-lithium dan magnesium-aluminium yang memungkinkan untuk dikemas dengan prosesor generasi terbaru Intel Core dan grafis yang kuat dari desain arsitektur terbaru Intel Xe dan NVIDIA GeForce MX350 opsional dengan bobot di bawah 1 kilogram.</p><p><br></p>', '2020-12-27 11:41:32', NULL, 1, 'Acer-luncur-kan-laptop-dengan-bobot-1-kilogram', 'gmH2ts0M.jpg'),
(29, 'UKM Indonesia Gunakan Teknologi Digital untuk Fungsi Front Office', 9, 11, '<p>Menurut survei baru yang ditugaskan oleh penyedia solusi pencetakan terkemuka Epson, hampir empat dari lima (78%) usaha kecil dan menengah di Indonesia melaporkan bahwa mereka telah memulai perjalanan transformasi digital. Sentimen ini sesuai dengan apa yang ditunjukkan oleh UKM di negara-negara ASEAN (Association of Southeast Asian Nations) lainnya. Di seluruh wilayah, lebih dari setengah responden (55%) melaporkan berada pada tahap awal transformasi digital. Survei terhadap 864 pembuat keputusan UKM di enam negara ASEAN terbesar berdasarkan PDB mencakup 154 responden dari Indonesia. Survei ini mendapatkan perspektif responden tentang adopsi teknologi, tahap kematangan upaya transformasi digital dan tantangan yang dihadapi bisnis ini dalam sebuah laporan yang berjudul, \"UKM berupaya dalam Transformasi Digital di tengah-tengah rintangan\".</p><p><br></p>', '2020-12-27 11:43:41', NULL, 1, 'UKM-Indonesia-Gunakan-Teknologi-Digital-untuk-Fungsi-Front-Office', 'Yr0mq7Zc.jpg'),
(30, 'Gara-gara locldown warga itali pilih main game fortnite', 10, 12, '<p>Dari catatannya, sebagian besar warga negeri Pizza itu bermain gim sebagai penghibur di rumah mereka. Fortnite dan Call of Duty adalah dua gim yang paling banyak diminati. \"Kami melaporkan peningkatan lebih dari 70% lalu lintas internet melalui jaringan darat kami, dengan kontribusi besar dari gim online seperti Fortnite,\" ungkap Chief Executive Officer Telecom Italia Luigi Gubitosi seperti dilansir Cnet, Sabtu (14/3). Sayangnya, Epic selaku pengembang Fortnite tidak mau berkomentar terkait fenomena tersebut.</p><p><br></p>', '2020-12-27 11:47:27', NULL, 1, 'Gara-gara-locldown-warga-itali-pilih-main-game-fortnite', 'ysP9Mdq4.jpg'),
(31, 'Facebook akhiri dukungannya untuk versi dekstop windows 10', 9, 11, '<p>Terkait pemberhentian itu, Facebook sudah mengirimkan pemberitahuan kepada pengguna aktif di Windows 10. Namun, raksasa jejering sosial itu berjanji akan terus memberikan dukungan untuk aplikasi Messenger. \"Karena Anda menggunakan Facebook untuk aplikasi desktop Windows. Kami ingin memastikan dan Anda harus mengetahui bahwa aplikasi ini akan berhenti berfungsi pada Jumat, 28 Februari 2020. Namun Anda masih dapat mengakses semua teman dan fitur Facebook favorit Anda dengan masuk melalui laman www.facebook.com,\" tulis Facebook seperti dilansir Wccftech.</p><p><br></p>', '2020-12-27 11:49:36', NULL, 1, 'Facebook-akhiri-dukungannya-untuk-versi-dekstop-windows-10', 'H5QYcwZ6.jpg'),
(32, 'Lenovo garap fitur baru yang bisa meredam suara', 8, 10, '<p>Lenovo mengatakan, fitur baru itu bisa diaktifkan melalui pengaturan BIOS di laptop. Ketika sudah aktif, laptop akan disesuaikan dengan fitur tersebut secara dinamis. Fitur itu sejatinya mempengaruhi kipas CPU. Saat aktif, kipas CPU akan memasuki Mode Ultra Quiet tersebut jika kerja CPU tidak terlalu berat. Sementara ketika CPU laptop membutuhkan pendingin, kipas akan berfungsi normal. Fitur bernama Ultra Quiet Mode itu digunakan untuk mengurangi suara yang dihasilkan pada komponen elektronik di laptop Lenovo. Kabar mengenai fitur baru ini pertama kali muncul di situs Weibo setelah seorang mengunggah foto yang menujukkan aktifnya fitur tersebut.</p><p><br></p><p><br></p><p><br></p>', '2020-12-27 11:52:17', NULL, 1, 'Lenovo-garap-fitur-baru-yang-bisa-meredam-suara', 'iMomVNn8.png'),
(33, 'Destiny2 menguras memory hingga 64gb', 10, 12, '<p>Sudah lebih dari seminggu sejak developer Bungie resmi mengkonfirmasi kehadiran Destiny 2. Laporan terbaru menyebutkan, Destiny 2 membutuhkan setidaknya 64 GB kapasitas penyimpanan.</p><p>Informasi persayaratan minimum kapasitas ini diketahui dari situs bungie.net. Syarat ini berlaku untuk PlayStation 4, Xbox One, dan PC yang belakangan dikonfirmasi juga akan menjadi salah satu platform kelahiran Destiny 2.</p><p>Sumber lain menyebutkan, game ini bahkan bisa menyita lebih dari apa yang disebutkan. Dikutip detikINET dari Ubergizmo, Senin (3/4/2017), hal ini karena kemungkinan kapasitas tambahan itu akan hadir bersamaan dengan patch dan lain-lain.</p><p>Karenanya, bagi Anda yang berencana untuk memainkan game sekuel ini, sebaiknya mengosongkan dulu kapasitas penyimpanan seperti yang disebutkan di atas.</p>', '2020-12-27 11:54:51', NULL, 1, 'Destiny2-menguras-memory-hingga-64gb', 'q2fmx6Tz.jpg'),
(34, 'Steam bakal sediakan pembayaran bitcoin', 10, 12, '<p>Penggunan Bitcoin dalam bertransaksi saat ini memang masih menuai pro dan kontra. Meski demikian, hal ini tidak menyurutkan niat Valve yang ingin menggunakan Bitcoin sebagai mata uang dalam bertransaksi di Steam.</p><p>Kabar tersebut diungkap oleh salah seorang pengguna Steam. Melalui forum Reddit, ia berbagi cerita bahwa dirinya telah mendapatkan pengumuman dari Valve terkait penggunaan bitcoin di Steam.</p><p>\"Kami sangat bergembira mengumumkan bahwa Steam akan mulai menerima pembayaran melalui Bitcoin. Kami menggunakan penyedia layanan pembayaran ekternal untuk memproses Bitocoin untuk membantu mitra menjangkau lebih banyak konsumen di Steam</p>', '2020-12-27 11:56:49', NULL, 1, 'Steam-bakal-sediakan-pembayaran-bitcoin', 'CKuamdfS.jpg'),
(35, 'Marsa Makan', 10, 12, '<p>marsa beli nasi&nbsp;</p>', '2020-12-28 07:00:27', NULL, 1, 'Marsa-Makan', 'zho5ZVm9.jpg'),
(36, 'crysis 3', 10, 12, '<p>crisis 3 masu kindonesia</p>', '2020-12-29 03:50:23', NULL, 1, 'crysis-3', 'j3ekxOB6.jpg'),
(37, 'crisis 3', 10, 12, '<p>crisis masuk indonesia</p>', '2020-12-29 04:23:35', NULL, 1, 'crisis-3', 'X6pnjAaR.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(3, 5, 'Bollywood ', 'Bollywood masala', '2018-06-22 15:45:38', '0000-00-00 00:00:00', 1),
(4, 3, 'Cricket', 'Cricket\r\n\r\n', '2018-06-30 09:00:43', '0000-00-00 00:00:00', 1),
(5, 3, 'Football', 'Football', '2018-06-30 09:00:58', '0000-00-00 00:00:00', 1),
(6, 5, 'Television', 'TeleVision', '2018-06-30 18:59:22', '0000-00-00 00:00:00', 1),
(7, 6, 'National', 'National', '2018-06-30 19:04:29', '0000-00-00 00:00:00', 1),
(8, 6, 'International', 'International', '2018-06-30 19:04:43', '0000-00-00 00:00:00', 1),
(9, 7, 'India', 'India', '2018-06-30 19:08:42', '0000-00-00 00:00:00', 1),
(10, 8, 'Indonesia', 'Indonesia', '2020-11-25 07:40:28', NULL, 1),
(11, 9, 'Indonesia', 'Indonesia', '2020-11-25 07:40:47', NULL, 1),
(12, 10, 'Indonesia', 'Indonesia', '2020-11-25 07:41:00', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `nama`, `email`, `nomor_hp`, `password`, `foto`) VALUES
('rofiq', 'muhammad rofiq hidayatullah', 'rofiq@gmail.com', '', 'c81e728d9d4c2f636f067f89cc14862c', ''),
('rofiq', 'rofiq hidayatullah', 'muhammadrofiq999@gmail.com', '089665738234', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', ''),
('', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
('Boswes', 'Boswes12', 'boswes@gmail.com', '082233626508', '7891785577e88a3777e0a64e78a2585d', ''),
('user12', 'user12', 'user12@gmail.com', '08192881823', '4297f44b13955235245b2497399d7a93', ''),
('rian', 'rian', 'reeyanrian@gmail.com', '085236667737', 'cb2b28afc2cc836b33eb7ed86f99e65a', 'defaultpp.jpg'),
('marsa', 'marsa', 'marsa@gmail.com', '0872635482123', 'ad04f7d73d1a9140f0d67387810eef04', 'defaultpp.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `kode_penjualan` (`kode_penjualan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_penjualan`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indeks untuk tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indeks untuk tabel `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
