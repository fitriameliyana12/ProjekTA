-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2019 at 07:53 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_penjualan` int(5) NOT NULL,
  `kode_obat` int(5) NOT NULL,
  `jml_beli` int(5) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `harga` int(7) NOT NULL,
  `total` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_penjualan`, `kode_obat`, `jml_beli`, `jenis`, `harga`, `total`) VALUES
(1, 3, 5, 'Satuan', 5000, 25000),
(2, 3, 5, 'Satuan', 5000, 25000),
(3, 3, 5, 'Satuan', 5000, 25000),
(4, 3, 5, 'Satuan', 5000, 25000),
(5, 3, 5, 'Satuan', 5000, 25000),
(6, 3, 1, 'Satuan', 5000, 5000),
(6, 6, 1, 'Dos', 490000, 490000),
(7, 4, 2, 'Satuan', 1000, 2000),
(8, 3, 1, 'Satuan', 5000, 5000),
(8, 3, 2, 'Satuan', 5000, 10000),
(8, 6, 3, 'Strip', 10000, 30000),
(9, 3, 3, 'Satuan', 5000, 15000),
(9, 3, 5, 'Satuan', 5000, 25000),
(10, 3, 10, 'Satuan', 5000, 50000),
(10, 3, 20, 'Satuan', 5000, 100000),
(12, 4, 50, 'Satuan', 1000, 50000),
(18, 3, 10, 'Satuan', 5000, 50000),
(23, 3, 10, 'Strip', 30000, 300000),
(24, 3, 50, 'Satuan', 5000, 250000),
(25, 4, 3, 'Strip', 6000, 18000),
(26, 3, 2, 'Strip', 30000, 60000),
(27, 8, 1, 'Strip', 5000, 5000),
(28, 6, 1, 'Dos', 490000, 490000),
(29, 6, 2, 'Pack', 190000, 380000),
(30, 6, 2, 'Pack', 190000, 380000),
(31, 6, 2, 'Pack', 190000, 380000),
(32, 6, 2, 'Pack', 190000, 380000),
(33, 6, 2, 'Pack', 190000, 380000),
(34, 3, 2, 'Pack', 290000, 580000),
(35, 4, 2, 'Strip', 6000, 12000),
(36, 4, 10, 'Satuan', 1000, 10000),
(36, 6, 3, 'Strip', 10000, 30000),
(37, 4, 5, 'Satuan', 1000, 5000),
(37, 8, 2, 'Strip', 5000, 10000),
(38, 8, 10, 'Satuan', 1000, 10000),
(38, 3, 5, 'Strip', 30000, 150000),
(39, 11, 4, 'Strip', 5000, 20000),
(39, 12, 30, 'Satuan', 2000, 60000),
(40, 4, 2, 'Strip', 6000, 12000),
(41, 4, 3, 'Satuan', 1000, 3000),
(41, 4, 1, 'Strip', 6000, 6000),
(42, 4, 5, 'Satuan', 1000, 5000),
(42, 4, 6, 'Satuan', 1000, 6000),
(43, 9, 10, 'Strip', 4000, 40000),
(43, 11, 6, 'Strip', 5000, 30000),
(44, 11, 5, 'Strip', 5000, 25000),
(45, 8, 2, 'Pack', 19000, 38000),
(46, 6, 5, 'Strip', 10000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` int(5) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `stok_obat` int(5) NOT NULL,
  `id_supplier` int(3) NOT NULL,
  `kategori_obat` varchar(100) NOT NULL,
  `tgl_expired` date NOT NULL,
  `gambar_obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `stok_obat`, `id_supplier`, `kategori_obat`, `tgl_expired`, `gambar_obat`) VALUES
(3, 'Panadol', 4868, 3, 'tablet', '2019-04-07', 'panadol3.jpg'),
(4, 'Amoxicillin', 4, 2, 'tablet', '2019-06-06', 'a.jpg'),
(6, 'Sanmol', 2931, 2, 'tablet', '2019-06-20', 'a2.jpg'),
(8, 'vitacimin', 4937, 2, 'tablet', '2019-06-20', 'vitacimin2.jpg'),
(9, 'paramex', 960, 2, 'tablet', '2019-06-29', 'paramex.jpg'),
(11, 'komix', 40, 2, 'sirup', '2019-07-27', 'komik.jpg'),
(12, 'hemaviton', 100, 2, 'kapsul', '2019-07-19', 'hemaviton1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_order` int(5) NOT NULL,
  `id_user` int(2) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `diskon` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_order`, `id_user`, `tgl_penjualan`, `diskon`) VALUES
(1, 1, '2019-05-17', 0),
(2, 1, '2019-05-17', 0),
(3, 1, '2019-05-17', 0),
(4, 1, '2019-05-17', 0),
(5, 1, '2019-05-17', 0),
(6, 1, '2019-05-17', 0),
(7, 1, '2019-05-17', 0),
(8, 1, '2019-05-18', 0),
(9, 1, '2019-05-19', 0),
(10, 1, '2019-05-28', 0),
(11, 1, '2019-06-13', 0),
(12, 1, '2019-06-13', 0),
(13, 1, '2019-06-13', 0),
(14, 1, '2019-06-13', 0),
(15, 1, '2019-06-13', 0),
(17, 1, '2019-06-13', 0),
(18, 1, '2019-06-18', 0),
(22, 1, '2019-06-19', 0),
(23, 1, '2019-06-19', 0),
(24, 1, '2019-06-19', 0),
(25, 1, '2019-06-20', 0),
(26, 1, '2019-06-20', 0),
(27, 1, '2019-06-20', 0),
(28, 1, '2019-06-20', 0),
(29, 1, '2019-06-20', 0),
(30, 1, '2019-06-20', 0),
(31, 1, '2019-06-20', 0),
(32, 1, '2019-06-20', 0),
(33, 1, '2019-06-20', 0),
(34, 1, '2019-06-21', 0),
(35, 1, '2019-06-22', 0),
(36, 1, '2019-06-23', 0),
(37, 1, '2019-06-23', 0),
(38, 1, '2019-06-24', 0),
(39, 1, '2019-06-24', 0),
(40, 1, '2019-06-25', 0),
(41, 1, '2019-06-25', 5),
(42, 1, '2019-06-25', 0),
(43, 1, '2019-06-25', 2),
(44, 1, '2019-06-25', 0),
(45, 1, '2019-06-26', 5),
(46, 1, '2019-06-26', 10);

-- --------------------------------------------------------

--
-- Table structure for table `satuan_obat`
--

CREATE TABLE `satuan_obat` (
  `kode_obat` int(5) NOT NULL,
  `harga_satuan` int(6) NOT NULL,
  `harga_strip` int(6) NOT NULL,
  `harga_pack` int(6) NOT NULL,
  `harga_dus` int(6) NOT NULL,
  `jumlah_strip` int(2) NOT NULL,
  `jumlah_pack` int(2) NOT NULL,
  `jumlah_dus` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan_obat`
--

INSERT INTO `satuan_obat` (`kode_obat`, `harga_satuan`, `harga_strip`, `harga_pack`, `harga_dus`, `jumlah_strip`, `jumlah_pack`, `jumlah_dus`) VALUES
(3, 5000, 30000, 290000, 1650000, 6, 20, 60),
(4, 1000, 6000, 125000, 350000, 4, 10, 20),
(6, 1250, 10000, 190000, 490000, 3, 15, 35),
(8, 1000, 5000, 19000, 45000, 6, 20, 50),
(9, 1000, 4000, 10000, 25000, 4, 10, 25),
(11, 1000, 5000, 18000, 36000, 6, 20, 40),
(12, 2000, 10000, 60000, 100000, 6, 15, 25);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(3) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telepon`) VALUES
(2, 'Pt. Irfak semesta alam', 'Tes', '0818238123'),
(3, 'PT.Haqiqi maju makmur', 'jalan kebon agung', '08974653745');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `telepon`, `email`, `username`, `password`, `password2`, `level`) VALUES
(1, 'Faris Helmi', 'Bangil', '081913451204', 'faris.helmi2@gmail.com', 'faris', 'c73f227db1b523334ea3aef35bf06af8', 'faris123', '1'),
(3, 'pemilik', 'malang', '081234567890', '', 'pemilik', '58399557dae3c60e23c78606771dfa3d', 'pemilik', '3'),
(6, 'Faris', 'Bangil', '089898999765', 'farishelmi20@gmail.com', 'farishelmi', 'c73f227db1b523334ea3aef35bf06af8', 'faris123', '2');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `v_penjualan` (
`no_order` int(5)
,`id_user` int(2)
,`diskon` int(3)
,`nama` varchar(200)
,`tgl_penjualan` date
,`jumlah_obat` decimal(32,0)
,`total_bayar` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Structure for view `v_penjualan`
--
DROP TABLE IF EXISTS `v_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penjualan`  AS  select `p`.`no_order` AS `no_order`,`p`.`id_user` AS `id_user`,`p`.`diskon` AS `diskon`,`u`.`nama` AS `nama`,`p`.`tgl_penjualan` AS `tgl_penjualan`,(select sum(`detail_penjualan`.`jml_beli`) from `detail_penjualan` where (`detail_penjualan`.`id_penjualan` = `p`.`no_order`)) AS `jumlah_obat`,(select sum(`detail_penjualan`.`total`) from `detail_penjualan` where (`detail_penjualan`.`id_penjualan` = `p`.`no_order`)) AS `total_bayar` from ((`penjualan` `p` join `detail_penjualan` `dp`) join `user` `u`) where ((`p`.`no_order` = `dp`.`id_penjualan`) and (`p`.`id_user` = `u`.`id`)) group by `p`.`no_order` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `satuan_obat`
--
ALTER TABLE `satuan_obat`
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `kode_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `no_order` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`no_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `satuan_obat`
--
ALTER TABLE `satuan_obat`
  ADD CONSTRAINT `satuan_obat_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
