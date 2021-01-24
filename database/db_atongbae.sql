-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 08:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_atongbae`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Id_Admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Id_Admin`, `username`, `Password`) VALUES
(1, 'Baleedev', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `Id_Barang` int(11) NOT NULL,
  `Nama_Barang` varchar(255) NOT NULL,
  `Id_user` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `Berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`Id_Barang`, `Nama_Barang`, `Id_user`, `Id`, `Berat`) VALUES
(8, 'Tang', 1, 5, 1),
(9, 'Seng', 2, 5, 11),
(10, 'Keramik', 1, 3, 5),
(11, 'Granit', 3, 4, 6),
(12, 'Semen', 1, 4, 10),
(13, 'Semen', 1, 4, 10),
(14, 'Semen', 1, 4, 10),
(15, 'Pintu', 4, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lacak`
--

CREATE TABLE `tbl_lacak` (
  `Id_lacak` int(11) NOT NULL,
  `No_Resi` varchar(1000) NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lacak`
--

INSERT INTO `tbl_lacak` (`Id_lacak`, `No_Resi`, `Tanggal`, `Info`) VALUES
(1, 'ATONGBAE001', '2021-01-24 13:41:15', 'Petugas Kami Dalam Perjalanan kerumah Anda'),
(2, 'AB001', '2021-01-24 13:48:53', 'Petugas Kami Dalam Perjalanan kerumah Anda'),
(3, '1', '2021-01-24 13:56:12', 'Petugas Kami Dalam Perjalanan kerumah Anda'),
(4, '2', '2021-01-24 13:57:40', 'Petugas Kami Dalam Perjalanan kerumah Anda'),
(5, '75', '2021-01-24 13:59:55', 'Petugas Kami Dalam Perjalanan kerumah Anda'),
(6, '148', '2021-01-24 14:24:12', 'Petugas Kami Dalam Perjalanan kerumah Anda'),
(7, '221', '2021-01-24 14:32:18', 'Petugas Kami Dalam Perjalanan kerumah Anda'),
(8, '1', '2021-01-24 00:00:00', 'Petugas Kami Dalam Perjelanan Mengirimkan Barang'),
(11, '1', '2021-01-24 16:56:49', 'Barang Anda Sedang Dalam Perjalanan Pengiriman'),
(15, '1', '2021-01-24 19:57:50', 'Barang Anda Sudah Sampai Di Daerah Anda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ongkir`
--

CREATE TABLE `tbl_ongkir` (
  `Id` int(11) NOT NULL,
  `Daerah_Asal` varchar(255) NOT NULL,
  `Daerah_Tujuan` varchar(255) NOT NULL,
  `Kurir` varchar(100) NOT NULL,
  `ETA` varchar(50) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ongkir`
--

INSERT INTO `tbl_ongkir` (`Id`, `Daerah_Asal`, `Daerah_Tujuan`, `Kurir`, `ETA`, `Harga`) VALUES
(3, 'Gondang', 'Mataram', 'JNE EXPRESS', '1-2 Jam', 5000),
(4, 'Gondang', 'Lombok Timur', 'TIKI', '1-5 Jam', 5000),
(5, 'Gondang', 'Tanjung', 'JNE EXPRESS', '1-2 Jam', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman`
--

CREATE TABLE `tbl_pengiriman` (
  `Id_Pengirim` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `Id_Barang` int(11) NOT NULL,
  `Nama_Penerima` varchar(100) NOT NULL,
  `Daerah_Asal` varchar(255) NOT NULL,
  `Daerah_Tujuan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Kurir` varchar(20) NOT NULL,
  `ETA` varchar(25) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Total_Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengiriman`
--

INSERT INTO `tbl_pengiriman` (`Id_Pengirim`, `Id_user`, `Id`, `Id_Barang`, `Nama_Penerima`, `Daerah_Asal`, `Daerah_Tujuan`, `Alamat`, `Phone`, `Kurir`, `ETA`, `Harga`, `Total_Harga`) VALUES
(1, 2, 5, 9, 'Haris', 'Gondang', 'Tanjung', 'Tanjung, Karang Baru', '083115709217', 'JNE EXPRESS', '1-2 Jam', 5000, 10000),
(2, 2, 5, 9, 'Daim', 'Gondang', 'Tanjung', 'Tanjung, Karang Baru', '083115709390', 'JNE EXPRESS', '1-2 Jam', 5000, 10000),
(3, 2, 5, 9, 'Daim', 'Gondang', 'Tanjung', 'Tanjung, Karang Baru', '083115709390', 'JNE EXPRESS', '1-2 Jam', 5000, 10000),
(4, 2, 5, 9, 'Daim', 'Gondang', 'Tanjung', 'Tanjung, Karang Baru', '083115709390', 'JNE EXPRESS', '1-2 Jam', 5000, 10000),
(5, 1, 4, 13, 'Sandi', 'Gondang', 'Lombok Timur', 'Lombok Timur', '083115709323', 'TIKI', '1-5 Jam', 5000, 10000),
(6, 1, 4, 13, 'Samsul', 'Gondang', 'Lombok Timur', 'Lotim', '082342786523', 'TIKI', '1-5 Jam', 5000, 10000),
(7, 1, 4, 13, 'Dian', 'Gondang', 'Lombok Timur', 'Lotim', '083115709390', 'TIKI', '1-5 Jam', 5000, 10000),
(8, 1, 4, 13, 'Sahrul', 'Gondang', 'Lombok Timur', 'Lotim', '083115709217', 'TIKI', '1-5 Jam', 5000, 10000),
(9, 1, 4, 13, 'Sinta', 'Gondang', 'Lombok Timur', 'Lotim', '083115709221', 'TIKI', '1-5 Jam', 5000, 10000),
(10, 1, 4, 14, 'Nana', 'Gondang', 'Lombok Timur', 'Lombok Timur', '083115709398', 'TIKI', '1-5 Jam', 5000, 10000),
(11, 2, 5, 9, 'Zami', 'Gondang', 'Tanjung', 'Lombok Timur', '083115709656', 'JNE EXPRESS', '1-2 Jam', 5000, 10000),
(12, 4, 5, 15, 'Delon', 'Gondang', 'Tanjung', 'Tanjung, Karang Baru', '083115709390', 'JNE EXPRESS', '1-2 Jam', 5000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resi`
--

CREATE TABLE `tbl_resi` (
  `Id_Resi` int(11) NOT NULL,
  `Id_Pengiriman` int(11) NOT NULL,
  `No_Resi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resi`
--

INSERT INTO `tbl_resi` (`Id_Resi`, `Id_Pengiriman`, `No_Resi`) VALUES
(7, 8, 1),
(8, 9, 2),
(9, 10, 75),
(10, 11, 148),
(11, 12, 221);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saran`
--

CREATE TABLE `tbl_saran` (
  `Id_saran` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_saran`
--

INSERT INTO `tbl_saran` (`Id_saran`, `username`, `email`, `subjek`, `pesan`) VALUES
(2, 'BaleeDev', 'iqballelouch9@gmail.com', 'Saran', 'Ini Website Keren');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `Id_user` int(11) NOT NULL,
  `Nama_Toko` varchar(100) NOT NULL,
  `Nama_User` varchar(100) NOT NULL,
  `Daerah` varchar(150) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`Id_user`, `Nama_Toko`, `Nama_User`, `Daerah`, `Phone`, `Email`, `Deskripsi`) VALUES
(1, 'UD Ananda', 'Desi', 'Gondang', '083115709375', 'iqballelouch9@gmai.com', 'UD Ananda Merupaka toko bahan bangunan yang berada diwilayah Gondang, Kecamatan Gangga yang murah meriah'),
(2, 'UD Makmur Jaya', 'Ikbal', 'Gondang', '083115709378', 'iqballelouch2@gmai.com', 'Toko Makmur Jaya Serba Ada'),
(3, 'UD Jaya Abadi', 'Adi', 'Gondang', '083115709654', 'iqballelouch1@gmai.com', 'Toko Bahan Bangunan'),
(4, 'UD BaleeDev', 'Lelouch', 'Gondang', '083115709375', 'iqballelouch9@gmai.com', 'BaleeDev merupakan toko serba ada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`Id_Barang`),
  ADD KEY `barang_user` (`Id_user`),
  ADD KEY `barang_ongkir` (`Id`);

--
-- Indexes for table `tbl_lacak`
--
ALTER TABLE `tbl_lacak`
  ADD PRIMARY KEY (`Id_lacak`);

--
-- Indexes for table `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD PRIMARY KEY (`Id_Pengirim`),
  ADD KEY `send_user` (`Id_user`),
  ADD KEY `send_ongkir` (`Id`),
  ADD KEY `send_barang` (`Id_Barang`);

--
-- Indexes for table `tbl_resi`
--
ALTER TABLE `tbl_resi`
  ADD PRIMARY KEY (`Id_Resi`),
  ADD KEY `resi_pengiriman` (`Id_Pengiriman`);

--
-- Indexes for table `tbl_saran`
--
ALTER TABLE `tbl_saran`
  ADD PRIMARY KEY (`Id_saran`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `Id_Barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_lacak`
--
ALTER TABLE `tbl_lacak`
  MODIFY `Id_lacak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  MODIFY `Id_Pengirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_resi`
--
ALTER TABLE `tbl_resi`
  MODIFY `Id_Resi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_saran`
--
ALTER TABLE `tbl_saran`
  MODIFY `Id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `barang_ongkir` FOREIGN KEY (`Id`) REFERENCES `tbl_ongkir` (`Id`),
  ADD CONSTRAINT `barang_user` FOREIGN KEY (`Id_user`) REFERENCES `tbl_user` (`Id_user`);

--
-- Constraints for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD CONSTRAINT `send_barang` FOREIGN KEY (`Id_Barang`) REFERENCES `tbl_barang` (`Id_Barang`),
  ADD CONSTRAINT `send_ongkir` FOREIGN KEY (`Id`) REFERENCES `tbl_ongkir` (`Id`),
  ADD CONSTRAINT `send_user` FOREIGN KEY (`Id_user`) REFERENCES `tbl_user` (`Id_user`);

--
-- Constraints for table `tbl_resi`
--
ALTER TABLE `tbl_resi`
  ADD CONSTRAINT `resi_pengiriman` FOREIGN KEY (`Id_Pengiriman`) REFERENCES `tbl_pengiriman` (`Id_Pengirim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
