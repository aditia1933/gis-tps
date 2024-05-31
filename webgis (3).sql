-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 06:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_adm` int(12) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_adm` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_adm`, `nip`, `nama_adm`, `email`, `password`, `foto`) VALUES
(1, '19660908 198603 1 01', 'Asep Saifuddin, ST', 'asep13@gmail.com', '123456', '1692563587_0305bee85960dabb0a36.png'),
(15, '19660908 198603 1 01', 'Agam, SE', 'agam11@gmail.com', '212121', '1692563984_1445da05a85c1dfd7f61.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(225) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `foto_berita` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul_berita`, `isi`, `foto_berita`) VALUES
(20, 'Pengangkutan Sampah Liar di Desa kedaung kelurahan unyur', 'Pengangkutan sampah liat di Desa Kedaung Kelurahan Unyur Kecamatan Serang', '1691702220_e29cfeb7fcfa3a71a3da.jpg'),
(21, 'Kegiatan Tim Kebersihan DLH Kota Serang', 'Kegiatan Tim Kebersihan Dinas Linkungan Hidup Kota Serang mengangkut sampah liar di jalur Pengampelan Kelurahan Walantaka.', '1691702421_5c70560d2507d08eb765.jpg'),
(22, 'Normalisasi Irigasi di perumahan Taman Widya Asri', 'Kerja Bakti Gabugan dalam rangka Normalisasi irigasi oleh Dinas Lingkungan Hidup Kota Serang, KORAMIL Serang, Kelurahan Serang dan Perangkat Masyarakat Setempat di Perumahan Taman Widya Asri.', '1691702630_d0318ce0ae925dbdc26e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(20) NOT NULL,
  `nama_lokasi` varchar(500) DEFAULT NULL,
  `alamat_lokasi` text DEFAULT NULL,
  `jenis` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `foto_lokasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `nama_lokasi`, `alamat_lokasi`, `jenis`, `jumlah`, `kondisi`, `latitude`, `longitude`, `foto_lokasi`) VALUES
(1, 'Komp. Kejaksaan', 'Tembong, Kec. Cipocok Jaya, Kota Serang, Banten 42117', 'TPSS', 1, 'Baik', '-6.1335218', '106.1614461', '1690288301_c5a8e5de862d1c7e6fc8.jpg'),
(3, 'SMAN 2 Nancang', 'Jl. Raya Serang - Pandeglang, Tembong, Kec. Cipocok Jaya, Kota Serang, Banten 42126', 'TPSS', 1, 'Baik', '-6.1519279', '106.1588382', '1690288404_09d7561911719caa93ad.jpg'),
(4, 'Komp.ABRI / Bayangkara', 'Jl. Perumahan Cipocok Jaya 60-70, Cipocok Jaya, Kec. Cipocok Jaya, Kota Serang, Banten 42121', 'TPSS', 1, 'Baik', '-6.132364', '106.172014', '1690288494_da228b8cc66d1eb35c45.jpg'),
(5, 'Depan Kel. Cipocok', 'Jl. Bhayangkara 212, Cipocok Jaya, Kec. Cipocok Jaya, Kota Serang, Banten 42121', 'TPSSh', 1, 'Baik', '-6.1337565', '106.1732255', '1690288566_1e9873c02f0a867e1033.jpg'),
(6, 'Prisma', 'Panancangan, Kec. Cipocok Jaya, Kota Serang, Banten 42124', 'TPSS', 1, 'Kurang Baik', '-6.1204268', '106.1872004', '1690288606_e1362c3601c7d20eeef2.jpg'),
(7, 'STIE Bina Bangsa', 'Panancangan, Kec. Cipocok Jaya, Kota Serang, Banten 42124', 'TPSS', 2, 'Kurang Baik', '-6.1205143', '106.1903545', '1690288652_05284e8892bd56c47a6f.jpg'),
(8, 'Komp. Untirta', 'Panancangan, Kec. Cipocok Jaya, Kota Serang, Banten 42124', 'TPS Container', 2, 'Baik', '-6.1215517', '106.1949967', '1690289621_6b4085ece4bd3d7bdeb3.jpg'),
(10, 'Perum. Bumi Mutiara Serang', 'Perum Bumi Mutiara Serang, Banjaragung, Kec. Cipocok Jaya, Kota Serang, Banten', 'TPSS', 1, 'Baik', '-6.1261344', '106.1965808', '1690289032_ae856f19b2c88bf31bec.jpg'),
(11, 'Perum. Banjar Asri', 'Jl. Solo 23, Banjarsari, Kec. Cipocok Jaya, Kota Serang, Banten 42123', 'TPS Container', 1, 'Baik', '-6.1561565', '106.1864702', '1690289093_0ebb1e65f7c70f515fb7.jpg'),
(14, 'Perum.KSB', 'Banjaragung, Kec. Cipocok Jaya, Kota Serang, Banten 42122', 'TPS Container', 1, 'Baik', '-6.1350467', '106.1883617', '1690289409_13285c341e2c08228fd8.jpg'),
(15, 'Kp. Bogeg', 'Jl. Syech Moh. Nawawi, Banjaragung, Kec. Cipocok Jaya, Kota Serang, Banten 42122', 'TPS Container', 1, 'Baik', '-6.1399323887529755', '106.171866239752', '1686551892_b44f9ad3e8724d490365.jpeg'),
(16, 'POLDA', 'Banjarsari, Kec. Cipocok Jaya, Kota Serang, Banten', 'TPS Container', 1, 'Baik', '-6.150611', '106.194221', '1690289509_fe5255a40a12fcd4677d.jpg'),
(17, 'Depan Kec. Cipocok', 'Jl. Bhayangkara Link, Cipocok Jaya, Kec. Cipocok Jaya, Kota Serang, Banten 42121', 'TPST', 1, 'Baik', '-6.1362882', '106.1748029', '1690289755_7a48daed5b854d59c492.jpg'),
(18, 'Perum. Serang Hijau', 'Jl. Puri Serang Hijau, Cipocok Jaya, Kec. Cipocok Jaya, Kota Serang, Banten 42121', 'TPS Container', 1, 'Baik', '-6.1462583', '106.1797338', '1690289319_c050a9b55e72abc06bfa.jpg'),
(19, 'Terminal Pakupatan', 'Panancangan, Kec. Cipocok Jaya, Kota Serang, Banten 42124', 'TPS Container', 1, 'Baik', '-6.1338004', '106.1681784', '1690289224_fa87dd285a8eb5a3f537.jpg'),
(20, 'Perum. Citra gading', 'Cipocok Jaya, Kec. Cipocok Jaya, Kota Serang, Banten 42121.', 'TPS3R', 1, 'Kurang Baik', '-6.1476071', '106.1727206', '1690289173_639529e240e4d7cb8169.jpg'),
(25, 'lokasi A', 'Komplek RSS Pemda blok D2 No.15 Rt.03 Rw.08 Kota Serang Kecamatan Cipocok Jaya', 'TPS Container', 2, 'Baik', '-6.13732347513968', '106.18434905962205', '1692157535_161c98095009cab20320.png'),
(26, 'lokasi B', 'kp.karangsari ds. cinagara kec. malangbong kab. Garut', 'TPSS', 1, 'Baik', '-6.157702162569596', '106.19247436785375', '1692157634_a5cdf75e9194ceb2d17a.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `id_tamu` int(20) NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `alamat_tamu` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(2000) NOT NULL,
  `foto_tamu` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`id_tamu`, `nama_tamu`, `alamat_tamu`, `email`, `pesan`, `foto_tamu`) VALUES
(6, 'muhamad aditia', '', 'muhamadaditia073@gmail.com', 'Perum Serang Hijau TPS Container Lama dalam pengangkutannya sehingga sampah sampai menumpuk dan menyebabkan bau tidak sedap', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_adm` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `id_tamu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
