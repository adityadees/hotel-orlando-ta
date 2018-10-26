-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 11:46 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_kode` varchar(15) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `booking_awal` date NOT NULL,
  `booking_akhir` date NOT NULL,
  `booking_deskripsi` text NOT NULL,
  `booking_status` enum('proses','checkin','checkout') NOT NULL,
  `booking_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_kode`, `kamar_id`, `booking_awal`, `booking_akhir`, `booking_deskripsi`, `booking_status`, `booking_tanggal`) VALUES
('BOH1180717221', 2, '2018-06-13', '2018-06-14', '444', 'checkin', '2018-06-13 06:21:01'),
('BOH11807172212', 2, '2018-05-08', '2018-05-08', '444', 'checkin', '2018-05-08 06:21:01'),
('BOH1180717229', 2, '2018-07-17', '2018-08-27', '444', 'checkin', '2018-07-17 06:21:01'),
('BOH11807172292', 2, '2018-05-08', '2018-05-08', '444', 'checkin', '2018-05-08 06:21:01'),
('BOH21807171', 3, '2018-06-13', '2018-06-13', '', 'checkin', '2018-06-13 06:25:29'),
('BOH218071712', 3, '2018-08-15', '2018-08-15', '', 'checkin', '2018-08-15 06:25:29'),
('BOH21807176', 3, '2018-07-17', '2018-08-25', '', 'checkin', '2018-07-17 06:25:29'),
('BOH218071762', 3, '2018-08-15', '2018-08-15', '', 'checkin', '2018-08-15 06:25:29'),
('BOH3180717490', 1, '2018-07-17', '2018-07-28', 'aa', 'checkout', '2018-07-17 23:49:23'),
('BOH31807174902', 1, '2018-02-15', '2018-02-15', 'aa', 'checkout', '2018-02-15 23:49:23'),
('BOH3180717491', 1, '2018-06-13', '2018-06-13', 'aa', 'checkout', '2018-06-13 23:49:23'),
('BOH31807174912', 1, '2018-04-15', '2018-04-15', 'aa', 'checkout', '2018-04-15 23:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_transfer`
--

CREATE TABLE `bukti_transfer` (
  `bt_id` int(11) NOT NULL,
  `booking_kode` varchar(15) NOT NULL,
  `bt_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_transfer`
--

INSERT INTO `bukti_transfer` (`bt_id`, `booking_kode`, `bt_file`) VALUES
(1, 'BOH1180717229', '75091ae4a5874e3db6fb2f76fffde203.png'),
(2, 'BOH21807176', '23f98d1834c0aa0ef4ee1da2dcddbfd4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `booking_kode` varchar(15) NOT NULL,
  `customer_nama` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_tel` char(12) NOT NULL,
  `customer_tgl_lahir` date NOT NULL,
  `customer_kota` varchar(50) NOT NULL,
  `customer_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `booking_kode`, `customer_nama`, `customer_email`, `customer_tel`, `customer_tgl_lahir`, `customer_kota`, `customer_alamat`) VALUES
(14, 'BOH1180717229', 'adityads', 'adityads@ymail.com', '082222', '2018-07-17', 'palembang', 'jl. aaaa'),
(15, 'BOH21807176', 'magnum', 'danielsilverw@gmail.com', '2312', '2018-07-26', 'Aceh barat', 'jl.aaaa'),
(16, 'BOH3180717490', 'magnum', 'asdsa@aaa.com', '082222', '2018-07-08', 'Aceh barat', 'jl.aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `fasilitas_id` int(11) NOT NULL,
  `fasilitas_nama` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`fasilitas_id`, `fasilitas_nama`) VALUES
(1, 'AC'),
(2, 'Toilet'),
(3, 'Bathoob'),
(4, 'Kamar'),
(5, 'Pancoran'),
(6, 'AC'),
(7, 'Toilet'),
(8, 'Bathoob'),
(9, 'Kamar'),
(10, 'Pancoran');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` varchar(15) NOT NULL,
  `kuisioner_id` int(11) NOT NULL,
  `feedback_nilai` enum('Ya','Tidak') NOT NULL,
  `feedback_email` varchar(50) NOT NULL,
  `feedback_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `kuisioner_id`, `feedback_nilai`, `feedback_email`, `feedback_tanggal`) VALUES
('FED26071893', 2, 'Ya', '', '2018-07-26 20:56:12'),
('FED26071893', 3, 'Tidak', '', '2018-07-26 20:56:13'),
('FED26071893', 4, 'Ya', '', '2018-07-26 20:56:13'),
('FED260718199', 2, 'Tidak', 'adityads@ymail.com', '2018-07-26 20:56:35'),
('FED260718199', 3, 'Ya', 'adityads@ymail.com', '2018-07-26 20:56:35'),
('FED260718199', 4, 'Ya', 'adityads@ymail.com', '2018-07-26 20:56:35'),
('FED260718756', 2, 'Tidak', 'danielsilverw@gmail.com', '2018-07-26 20:56:43'),
('FED260718756', 3, 'Ya', 'danielsilverw@gmail.com', '2018-07-26 20:56:43'),
('FED260718756', 4, 'Ya', 'danielsilverw@gmail.com', '2018-07-26 20:56:43'),
('FED260718243', 2, 'Ya', 'syukronrushadi@yahoo.co.id', '2018-07-26 20:56:50'),
('FED260718243', 3, 'Ya', 'syukronrushadi@yahoo.co.id', '2018-07-26 20:56:50'),
('FED260718243', 4, 'Ya', 'syukronrushadi@yahoo.co.id', '2018-07-26 20:56:50'),
('FED26071839', 2, 'Ya', 'asdsa@aaa.com', '2018-07-26 20:56:57'),
('FED26071839', 3, 'Tidak', 'asdsa@aaa.com', '2018-07-26 20:56:57'),
('FED26071839', 4, 'Ya', 'asdsa@aaa.com', '2018-07-26 20:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `gambar_id` int(11) NOT NULL,
  `tipe_kode` varchar(15) NOT NULL,
  `gambar_judul` varchar(25) NOT NULL,
  `gambar_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`gambar_id`, `tipe_kode`, `gambar_judul`, `gambar_file`) VALUES
(4, 'R001', 'asd', 'b71cb7a01262e4587ea76fd0fecd56f4.jpg'),
(5, 'R001', 'terss', 'b7fce29be7627008499406fdddd456e2.jpg'),
(6, 'R001', '', 'dd4bdf019c76ba147a33ab94fd828580.jpg'),
(9, 'R0027', 'Ra', '5b2ba6f16ca1df25559e5969d20a2a99.png');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `kamar_id` int(11) NOT NULL,
  `tipe_kode` varchar(5) NOT NULL,
  `kamar_status` enum('tersedia','booking','dipakai') NOT NULL DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kamar_id`, `tipe_kode`, `kamar_status`) VALUES
(1, 'R001', 'booking'),
(2, 'R003', 'tersedia'),
(3, 'R003', 'dipakai'),
(4, 'R001', 'tersedia'),
(5, 'R002', 'tersedia'),
(6, 'R0027', 'tersedia'),
(7, 'R001', 'tersedia'),
(8, 'R001', 'tersedia'),
(9, 'R001', 'tersedia'),
(10, 'R001', 'tersedia'),
(11, 'R002', 'tersedia'),
(12, 'R002', 'tersedia'),
(13, 'R0027', 'tersedia'),
(14, 'R003', 'tersedia'),
(15, 'R005', 'tersedia'),
(16, 'R003', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_layanan`
--

CREATE TABLE `kategori_layanan` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL,
  `kategori_ket` text NOT NULL,
  `kategori_gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_layanan`
--

INSERT INTO `kategori_layanan` (`kategori_id`, `kategori_nama`, `kategori_ket`, `kategori_gambar`) VALUES
(2, 'Restaurant', 'Tempat makan sehat menu dihidangkan dari berbagai jenis bahan alami', '51e0e2853a24154efbc47108a4a1fc56.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `kuisioner_id` int(11) NOT NULL,
  `kuisioner_pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuisioner`
--

INSERT INTO `kuisioner` (`kuisioner_id`, `kuisioner_pertanyaan`) VALUES
(2, 'Bagaimana pelayan kami?'),
(3, 'Apakah anda menyukai pelayanan kami?'),
(4, 'Apakah fasilitas kami memuaskan anda?');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `layanan_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `layanan_nama` varchar(50) NOT NULL,
  `layanan_harga` int(11) NOT NULL,
  `layanan_satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`layanan_id`, `kategori_id`, `layanan_nama`, `layanan_harga`, `layanan_satuan`) VALUES
(5, 2, 'Ikan Lele', 25000, 'Porsi');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `booking_kode` varchar(15) NOT NULL,
  `pembayaran_total` int(11) NOT NULL,
  `pembayaran_status` enum('menunggu','lunas') NOT NULL DEFAULT 'menunggu',
  `pembayaran_metode` enum('ditempat','transfer') NOT NULL,
  `pembayaran_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `booking_kode`, `pembayaran_total`, `pembayaran_status`, `pembayaran_metode`, `pembayaran_date`) VALUES
(5, 'BOH1180717229', 82000, 'lunas', 'transfer', '2018-07-18 05:03:35'),
(6, 'BOH21807176', 58000, 'lunas', 'transfer', '2018-07-19 18:39:23'),
(7, 'BOH3180717490', 500000, 'menunggu', 'transfer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promo_id` int(11) NOT NULL,
  `tipe_kode` varchar(5) NOT NULL,
  `promo_min_hari` int(11) NOT NULL,
  `promo_diskon` int(11) NOT NULL,
  `promo_start` date NOT NULL,
  `promo_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`promo_id`, `tipe_kode`, `promo_min_hari`, `promo_diskon`, `promo_start`, `promo_end`) VALUES
(1, 'R003', 20, 10, '2018-07-15', '2018-07-19'),
(2, 'R001', 3, 50, '2018-07-17', '2018-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `slide_id` int(11) NOT NULL,
  `slide_judul` varchar(25) NOT NULL,
  `slide_ket` text NOT NULL,
  `slide_gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_judul`, `slide_ket`, `slide_gambar`) VALUES
(1, 'Tes Slide', '363.3', '11babc2bf6e0132734832f82fdc20f9e.jpg'),
(3, 'terasdas', 'aa', '567b68e0b1a020754b0d2f18ae8b9398.png');

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `tipe_kode` varchar(5) NOT NULL,
  `tipe_nama` varchar(50) NOT NULL,
  `tipe_harga` int(11) NOT NULL,
  `tipe_deskripsi` text NOT NULL,
  `tipe_fasilitas` text NOT NULL,
  `tipe_gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`tipe_kode`, `tipe_nama`, `tipe_harga`, `tipe_deskripsi`, `tipe_fasilitas`, `tipe_gambar`) VALUES
('R001', 'Deluxe', 100000, 'aaab1', '1,2,4', 'a3ddb81db56f974640cc4cd9520a1495.jpg'),
('R002', 'Excelent', 150000, 'asdsad1', '1,4', 'de896791e8fda42a3d46eb32f2ea195b.jpg'),
('R0027', 'External', 500000, 'Price no bookings', '1,2,3,5,6,7,8,9,10', 'e5010788235e5d963973d7f066fe10fe.jpg'),
('R003', 'Private Room', 20000, 'asdas', '1', 'be536ba07be13bb8d60f736bb4cc3ae4.jpg'),
('R005', 'Room Super', 123200, 'asd', '1,4,6,7,10', 'c43f00761e8cce3f192ce3604ccb1c0c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_nik` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_tel` int(11) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_foto` varchar(50) NOT NULL,
  `user_role` enum('admin','resepsionis','manajemen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_nik`, `user_nama`, `user_username`, `user_password`, `user_email`, `user_tel`, `user_alamat`, `user_foto`, `user_role`) VALUES
(1233, 'Aditya Dharmawan Saputraa', 'adityads', '202cb962ac59075b964b07152d234b70', 'aad@aa.com', 82371, 'asdaa', 'avatar-01.jpg\r\n', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_kode`),
  ADD KEY `room_kode` (`kamar_id`);

--
-- Indexes for table `bukti_transfer`
--
ALTER TABLE `bukti_transfer`
  ADD PRIMARY KEY (`bt_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `booking_kode` (`booking_kode`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`fasilitas_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD KEY `kuisioner_id` (`kuisioner_id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`gambar_id`),
  ADD KEY `room_kode` (`tipe_kode`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kamar_id`),
  ADD KEY `room_kode` (`tipe_kode`);

--
-- Indexes for table `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`kuisioner_id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`layanan_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `booking_kode` (`booking_kode`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promo_id`),
  ADD KEY `tipe_kode` (`tipe_kode`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`tipe_kode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukti_transfer`
--
ALTER TABLE `bukti_transfer`
  MODIFY `bt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `fasilitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `gambar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `kuisioner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `layanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`kamar_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`booking_kode`) REFERENCES `booking` (`booking_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`kuisioner_id`) REFERENCES `kuisioner` (`kuisioner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`tipe_kode`) REFERENCES `tipe` (`tipe_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`tipe_kode`) REFERENCES `tipe` (`tipe_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_layanan` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`booking_kode`) REFERENCES `booking` (`booking_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `promo_ibfk_1` FOREIGN KEY (`tipe_kode`) REFERENCES `tipe` (`tipe_kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
