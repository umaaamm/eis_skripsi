-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2018 at 03:09 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `email`, `username`, `password`, `bagian`, `level`) VALUES
(5, 'njjn', 's', 'd', 'd', 'penjaminan', 'Pimpinan'),
(6, 'Kurniawan Gigih Lutfi Umam', 'umam.tekno@gmail.com', 'b', 'b', 'operasional', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_atk`
--

CREATE TABLE `tbl_atk` (
  `id_atk` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_atk`
--

INSERT INTO `tbl_atk` (`id_atk`, `nama_barang`) VALUES
(1, 'Penah'),
(4, 'buku'),
(5, 'penggaris');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(100) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bagian`
--

INSERT INTO `tbl_bagian` (`id_bagian`, `nama_bagian`, `divisi`, `username`, `password`, `level`) VALUES
(1, 'umam', 'Operasional', 'a', 'a', 'Biasa'),
(2, 'Kurniawan Gigih Lutfi Umam', 'penjaminan', 'Managerff', 'ff', 'Biasa'),
(3, 'Kurniawan f Lutfi Umam', 'penjaminan', 'staff', 'f', 'Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_baru`
--

CREATE TABLE `tbl_barang_baru` (
  `id_barang_baru` int(11) NOT NULL,
  `nama_peminta` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `alasan` text NOT NULL,
  `s_admin` varchar(100) NOT NULL,
  `s_pimpinan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_baru`
--

INSERT INTO `tbl_barang_baru` (`id_barang_baru`, `nama_peminta`, `nama_barang`, `jumlah`, `alasan`, `s_admin`, `s_pimpinan`) VALUES
(1, 'Kurniawan Gigih Lutfi Umam', 'baju', 12, 'ddfdasgsfgh', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_atk` int(11) NOT NULL,
  `nama_peminta` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_keluar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`id_barang_keluar`, `id_atk`, `nama_peminta`, `bagian`, `jumlah`, `tanggal_keluar`) VALUES
(2, 1, 'Kurniawan Gigih Lutfi Umam', 'operasional', 126, '2018-10-08 12:17:01'),
(3, 1, 'eis yuniar azmi', 'penjaminan', 160, '2018-10-07 18:36:26'),
(4, 1, 'Kurniawan Gigih Lutfi Umam', 'penjaminan', 580, '2018-10-07 17:13:55'),
(5, 5, 'Kurniawan Gigih Lutfi Umam', 'operasional', 12, '2018-10-07 17:18:18'),
(6, 4, 'Kurniawan Gigih Lutfi Umam', 'operasional', 100, '2018-10-07 17:18:47'),
(7, 4, 'Kurniawan Gigih Lutfi Umam', 'operasional', 4, '2018-10-07 17:20:05'),
(8, 4, 'Kurniawan Gigih Lutfi Umam', 'penjaminan', 67, '2018-10-07 17:23:06'),
(9, 1, 'Kurniawan Gigih Lutfi Umam', 'operasional', 500, '2018-10-07 18:38:13');

--
-- Triggers `tbl_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `tgr_stok_kluar` AFTER INSERT ON `tbl_barang_keluar` FOR EACH ROW BEGIN
UPDATE tbl_persedian SET stok_b = stok_b -NEW.jumlah
 WHERE id_atk=NEW.id_atk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_keluar` BEFORE UPDATE ON `tbl_barang_keluar` FOR EACH ROW BEGIN
UPDATE tbl_persedian SET stok_b = stok_b -NEW.jumlah
 WHERE id_atk=NEW.id_atk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id_barang_m` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `id_atk` int(11) NOT NULL,
  `stok_t` int(11) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id_barang_m`, `id_suplier`, `id_atk`, `stok_t`, `tanggal_masuk`) VALUES
(1, 2, 1, 10, '2018-10-07 16:10:01'),
(2, 2, 4, 100, '2018-10-07 16:12:22'),
(3, 0, 1, 0, '2018-10-07 18:34:24'),
(4, 2, 1, 500, '2018-10-07 16:52:59'),
(5, 2, 4, 10, '2018-10-07 17:19:31'),
(6, 2, 4, 80, '2018-10-07 17:22:48'),
(7, 2, 5, 100, '2018-10-07 18:04:04'),
(8, 2, 5, 10, '2018-10-07 18:04:22'),
(9, 2, 5, 10, '2018-10-07 18:05:02'),
(11, 2, 5, 10, '2018-10-07 18:05:37'),
(12, 2, 1, 102, '2018-10-07 18:27:19'),
(13, 2, 4, 10, '2018-10-08 11:40:29');

--
-- Triggers `tbl_barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `tgr_stok` AFTER INSERT ON `tbl_barang_masuk` FOR EACH ROW BEGIN
UPDATE tbl_persedian SET stok_b = stok_b + NEW.stok_t
 WHERE id_atk=NEW.id_atk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update` AFTER UPDATE ON `tbl_barang_masuk` FOR EACH ROW BEGIN
UPDATE tbl_persedian SET stok_b = stok_b + NEW.stok_t
 WHERE id_atk=NEW.id_atk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_persedian`
--

CREATE TABLE `tbl_persedian` (
  `id_persediaan` int(11) NOT NULL,
  `id_atk` int(11) NOT NULL,
  `stok_b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_persedian`
--

INSERT INTO `tbl_persedian` (`id_persediaan`, `id_atk`, `stok_b`) VALUES
(1, 1, 100),
(3, 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`id_suplier`, `nama_suplier`, `alamat`, `no_telp`) VALUES
(2, 'eis yuniar azmi', 'karang mana', '085758547924');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_atk`
--
ALTER TABLE `tbl_atk`
  ADD PRIMARY KEY (`id_atk`);

--
-- Indexes for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `tbl_barang_baru`
--
ALTER TABLE `tbl_barang_baru`
  ADD PRIMARY KEY (`id_barang_baru`);

--
-- Indexes for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id_barang_m`);

--
-- Indexes for table `tbl_persedian`
--
ALTER TABLE `tbl_persedian`
  ADD PRIMARY KEY (`id_persediaan`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_atk`
--
ALTER TABLE `tbl_atk`
  MODIFY `id_atk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_barang_baru`
--
ALTER TABLE `tbl_barang_baru`
  MODIFY `id_barang_baru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id_barang_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_persedian`
--
ALTER TABLE `tbl_persedian`
  MODIFY `id_persediaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
