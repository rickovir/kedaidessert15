-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 02:03 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kedai_dessert`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kode_admin` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(250) NOT NULL,
  `nama_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kode_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'admin', '$2y$10$T0.PkqWonO.igrEuhElNCOzB1YvKrh5..4mI7wrdSX69uIOuNcxKe', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `kode_kategori` int(10) NOT NULL,
  `trash` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga_barang`, `stok`, `deskripsi`, `gambar`, `kode_kategori`, `trash`) VALUES
(3, 'Soufle', 20000, 5, '<p>sgup sdfsa sdfasdf asdfsdf<br></p>', 'default_gerbage.jpg', 1, 'Y'),
(4, 'Custard', 30000, 0, '<p>\r\n\r\nCustard adalah jenis hidangan dengan bahan dasar susu dan telur yang dikentalkan di atas api. Biasanya, custard digunakan sebagai saus pada dessert. Jenis custard adalah Caramel custard dan Blancmange.\r\n\r\n<br></p>', 'custard.jpg', 2, 'N'),
(5, 'Souffle', 20000, 20, '<p>\r\n\r\nSouffle adalah hidangan manis dan lembut yang terbuat dari telur kocok dan bahan-bahan lain lalu dipanggang.\r\n\r\n<br></p>', 'souffle.jpg', 1, 'N'),
(6, 'Es Krim', 30000, 2, '<p>\r\n\r\n\r\n\r\nSiapa yang ngaku Ice Cream Lovers? Yap, es krim ini adalah dessert beku yang dibuat dari produk susu, Loopers.\r\n\r\n\r\n<br></p>', 'ice-cream.jpg', 3, 'N'),
(7, 'Sorbet', 25000, 5, '<p>\r\n\r\nBeda sama es krim, sorbet adalah dessert beku yang dibuat dari puree buah-buahan atau bahan-bahan lain. Sorbet nggak mengandung susu, Loopers. Beberapa jenis sorbet adalah Fruit sherbet dan Liquer sherbet.\r\n\r\n<br></p>', 'sorbet.jpg', 3, 'N'),
(8, 'Hot Pudding', 23500, 0, '<p>\r\n\r\n<p>Mungkin kamu nggak pernah denger istilah hot pudding, Loopers. Ada 2 jenis hot pudding, yakni:</p><p><strong>Molded pudding:</strong> Pudding yang dipanggang dan disajikan seperti souffle, yaitu disajikan setelah diangkat dari oven. Contohnya, Saxon pudding, Rice pudding, dan Frankfurt pudding.</p><p><strong>English pudding:</strong> Hidangan puding spesial dan populer di Inggris yang disajikan dengan sirup buah. Contohnya, Bread and butter puding</p>\r\n\r\n<br></p>', 'hot-pudding.jpg', 1, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kode_customer` int(10) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `password` char(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `trash` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kode_customer`, `nama_customer`, `password`, `email`, `alamat`, `no_telepon`, `trash`) VALUES
(2, 'makanan', '$2y$10$SfiP7hJgoSImjiOfVX8xjuBX3fPl0ryfRdm/aYoLqqbExPpnv.Ezq', 'minuman@minum.com', 'diamana aja ya wkwkw', '8792349237489', 'N'),
(3, 'aaafasdfasdf', '$2y$10$Xa0KAiPT6SdmDohDBXEYP.Ei21AyD/ubkx/vqQmmcPMe4v7vanPBq', 'rickovir@gmail.coma', 'asdfasdf', '123123123', 'N'),
(4, 'asdfsadf', '$2y$10$LiIGX5ypo.GK85lNW0B2Our4wtvm2NyxA48cXd2Nchi6Kohp3Nn4O', 'rickovir@gmail.comas', 'asdfasdfasd', '123123123', 'N'),
(5, 'ricko', '$2y$10$raYJXylqWlnS1.xQBU0sVeBdCWGhzRObrncXwWbtNMz4oxD0rcx22', 'rickovir@outlook.com', 'jalan laksa 2', '62896748695592', 'N'),
(6, 'aaaaaa', '$2y$10$X5Rvgh.Hkbp68WPE2HT7serhr9Ju5H7cPBWGC3mcudox5t/o7qU2m', 'ldkikmi@esaungghl.ac.id', 'sadsd', '089674869559', 'N'),
(7, 'Dina amardian', '$2y$10$.LeI2YG.nfqjaXUkWHVOB.jrEbAWN951kUZiQdwHOW.5gHmXhWvhi', 'dinadian@gmail.com', 'jalan kebon kacang', '0864585464656', 'N'),
(8, 'uvwuevuuewuvewb klasdiov', '$2y$10$ExP8PVQ8KxByIsHv1Cl6IOBA5lUHJB3.F4BiwKfQGeNNQ9CprAs5S', 'uevuev@gmail.com', 'jalan malam', '081212124545', 'N'),
(9, 'Ricko Virnanda', '$2y$10$VBmjgNahgaVgefE1cKhBLONl.yKwhNrn5YxJQHVW3GAFMFN3Wa8se', 'rickovir@yahoo.co.id', 'jalan laksa 2', '089674869559', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `kode_detail` int(10) NOT NULL,
  `banyak` int(5) NOT NULL,
  `kode_barang` int(10) NOT NULL,
  `kode_pesanan` int(9) NOT NULL,
  `trash` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`kode_detail`, `banyak`, `kode_barang`, `kode_pesanan`, `trash`) VALUES
(5, 1, 4, 18, 'N'),
(6, 2, 5, 18, 'N'),
(7, 1, 4, 19, 'N'),
(8, 1, 4, 19, 'N'),
(9, 5, 6, 19, 'N'),
(10, 1, 6, 21, 'N'),
(11, 1, 4, 21, 'N'),
(12, 1, 6, 22, 'N'),
(13, 1, 6, 22, 'N'),
(14, 1, 4, 22, 'N'),
(15, 1, 4, 22, 'N'),
(16, 1, 4, 23, 'N'),
(17, 1, 4, 23, 'N'),
(18, 1, 4, 23, 'N'),
(19, 1, 6, 23, 'N'),
(20, 2, 4, 24, 'N'),
(21, 4, 4, 25, 'N'),
(22, 2, 4, 25, 'N'),
(23, 3, 8, 25, 'N'),
(24, 1, 8, 26, 'N'),
(25, 1, 8, 26, 'N'),
(26, 1, 4, 27, 'N'),
(27, 3, 4, 27, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `trash` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`, `trash`) VALUES
(1, 'Hot Dessert', 'N'),
(2, 'Cold Dessert', 'N'),
(3, 'Frozen Dessert', 'N'),
(4, 'kotak', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kota_pengiriman`
--

CREATE TABLE `kota_pengiriman` (
  `kode_kota` int(9) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `biaya_pengiriman` int(20) NOT NULL,
  `trash` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota_pengiriman`
--

INSERT INTO `kota_pengiriman` (`kode_kota`, `nama_kota`, `biaya_pengiriman`, `trash`) VALUES
(1, 'Makasar', 12000, 'Y'),
(2, 'Jakarta Barat', 10000, 'N'),
(3, 'Jakarta Pusat', 15000, 'N'),
(4, 'Jakarta Selatan', 15000, 'N'),
(5, 'Jakarta Timur', 20000, 'N'),
(6, 'Lampung', 18000, 'Y'),
(7, 'Jakarta Utara', 18000, 'N'),
(8, 'Depok', 25000, 'N'),
(9, 'Tangerang', 25000, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `kode_pesanan` int(10) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `status_lunas` enum('Y','N') NOT NULL DEFAULT 'N',
  `total_harga` int(20) NOT NULL,
  `token` varchar(50) NOT NULL,
  `kode_kota` int(9) NOT NULL,
  `kode_customer` int(10) NOT NULL,
  `trash` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`kode_pesanan`, `tanggal_pesanan`, `alamat`, `status_lunas`, `total_harga`, `token`, `kode_kota`, `kode_customer`, `trash`) VALUES
(15, '2016-12-29', 'jalan matahari', 'Y', 50000, '66a12129605', 2, 9, 'N'),
(16, '2016-12-29', 'jalan matahari', '', 50000, '19c12129a03', 2, 9, 'Y'),
(17, '2016-12-29', 'jalan panjang', 'N', 195000, 'fae12129c35', 2, 9, 'Y'),
(18, '2016-12-29', 'jalan macan', 'Y', 70000, '68512129b82', 2, 9, 'N'),
(19, '2016-12-29', 'jalan kebayoran', 'Y', 220000, 'df612129436', 2, 9, 'N'),
(20, '2016-12-29', '', 'Y', 10000, '28e1212993d', 2, 9, 'N'),
(21, '2016-12-29', 'jalan pangeran', 'Y', 70000, '67a12129a8f', 2, 9, 'N'),
(22, '2016-12-29', 'jalan raja lele\r\n', 'Y', 130000, 'a89121298ca', 2, 9, 'N'),
(23, '2016-12-29', 'jalan cilangkap\r\n', 'Y', 130000, 'eb812129243', 2, 9, 'N'),
(24, '2016-12-30', 'jalan cipadehu\npanjang no. 19 RT 007 Rw 08', 'N', 70000, '0dc12130f83', 2, 9, 'N'),
(25, '2016-12-30', 'jalan gebang\r\n', 'N', 270500, '7BE121305D1', 5, 9, 'N'),
(26, '2016-12-30', 'jalan item', 'N', 57000, 'ACA12130185', 2, 9, 'N'),
(27, '2016-12-30', 'jalan kotak', 'N', 130000, '37412130959', 2, 9, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`kode_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `kota_pengiriman`
--
ALTER TABLE `kota_pengiriman`
  ADD PRIMARY KEY (`kode_kota`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`kode_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `kode_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `kode_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `kode_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kode_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kota_pengiriman`
--
ALTER TABLE `kota_pengiriman`
  MODIFY `kode_kota` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `kode_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
