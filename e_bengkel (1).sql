-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jun 2019 pada 08.38
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_bengkel`
--
CREATE DATABASE IF NOT EXISTS `e_bengkel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e_bengkel`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nis_nip` int(11) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `tingkat` varchar(32) DEFAULT NULL,
  `kelas` varchar(60) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `level` enum('aspiran','guru','siswa','kabeng') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nis_nip`, `email`, `nama`, `password`, `tingkat`, `kelas`, `no_hp`, `level`) VALUES
(1, NULL, 'admin@gmail.com', 'Dodi Permana S.Pd', '21232f297a57a5a743894a0e4a801fc3', '', NULL, '085223241556', 'kabeng'),
(2, NULL, 'aspiran@gmail.com', 'aspiran', 'aspiran', '', NULL, '098735653454', 'aspiran'),
(3, NULL, 'guru@gmail.com', 'guru', 'guru', '', NULL, '089245636567', 'guru'),
(4, NULL, 'siswa@gmail.com', 'siswa', 'siswa', '', 'XI-SIJA-B', '0898667766', 'siswa'),
(8, NULL, 'muhammadfarhan_madani@yahoo.com', 'Muhammad Farhan Madani', '43a40eaa41b9fd6fc61c2b930dfbc9e6', 'XI', 'B', '082118671270', 'siswa'),
(10, NULL, 'fajri@gmail.com', 'Fajri Siddiq', '437eb04136c59d226f14527f52726341', 'XI', 'A', '06734326711', 'siswa'),
(15, NULL, 'rudi123@gmail.com', 'Rudi Haryadi ST M.Pd', '1755e8df56655122206c7c1d16b1c7e3', NULL, NULL, '08976152435', 'guru'),
(16, NULL, 'trimans@gmail.com', 'Trimans Yogiana S.Pd', '5fe54e4158ad73047e931d29efcdf3a5', NULL, NULL, '02756278765', 'guru'),
(17, NULL, 'anton@gmail.com', 'Antoni Budiman S.Pd', '784742a66a3a0c271feced5b149ff8db', NULL, NULL, '065782746276', 'guru'),
(18, NULL, 'netty@gmail.com', 'Netty Amaliah S.Pd', '9e30c249f1f20c20cad11d86278d63f3', NULL, NULL, '02675637667', 'guru'),
(19, NULL, 'adi1238@gmail.com', 'Adi Setiadi S.Pd', '7360409d967a24b667afc33a8384ec9e', NULL, NULL, '02675826463', 'guru'),
(20, NULL, 'sri998@gmail.com', 'Sri Rahayu ST M.Pd', '296c2075a196aef15e372a68ae77477b', NULL, NULL, '01827486473', 'guru'),
(21, NULL, 'diky@gmail.com', 'Diky Ridwan S.Kom', '7f724c9fc135fab3538f9d62e57e6e7a', NULL, NULL, '0557254651', 'guru'),
(22, NULL, 'dodi@gmail.com', 'Dodi Permana S.Pd', 'dc82a0e0107a31ba5d137a47ab09a26b', NULL, NULL, '06578726472', 'guru'),
(23, NULL, 'luqman1234@gmail.com', 'Luqman', '754e534eb2460211961ba7308375a731', NULL, NULL, '086552633356', 'aspiran'),
(24, NULL, 'emaa@gmail.co.id', 'Rahmawati Fathimah', 'c65d857e371c030ae1dfb0ea2c63df18', 'XI', 'B', '08657635576', 'siswa'),
(25, NULL, 'amrymusyaffa20@gmail.com', 'Amry Musyaffa Zain', '48b67d25010b51a4b71f4a7b52bed50c', 'XI', 'B', '087823335147', 'siswa'),
(26, NULL, 'aspiran@gmail.com', 'Dhiemas AP', '722e94f8c7295d2a92863448eab67f6c', NULL, NULL, '0893424234', 'aspiran'),
(27, NULL, 'dapa@gmail.co.id', 'Dava Agustiani Rahmawati', 'd32c30cd980bdcf0b908fd9a04ddad03', 'XI', 'A', '086754546376', 'siswa'),
(28, NULL, 'alfa@alfa.id', 'Muhammad Zidane Alfarel Siregar', 'd21fe1e54e2f1e45b793687f78163603', 'XI', 'B', '092765736667', 'siswa'),
(30, NULL, 'bogeng@sch.id', 'Bogeng', '5ebda25c42af3bf24bf447c524447a15', NULL, NULL, '098765432454', 'aspiran'),
(34, NULL, 'diojp23@gmail.com', 'Dio McGregor', '202cb962ac59075b964b07152d234b70', 'XII', 'B', '089620204624', 'siswa'),
(35, NULL, 'dhndr@ig.tv', 'Aurell Dhiendra Niecel Putri', '015f01b488efb0bd18a18590844dc6f6', 'XI', 'B', '087654536765', 'siswa'),
(36, NULL, 'idam@gmail.id', 'Idam Setia', '692670da6ad1522460efeb16e9aef3f0', 'XI', 'B', '089765544566', 'siswa'),
(37, NULL, 'amel@gmail.com', 'Amelia Dewi', 'da0e22de18e3fbe1e96bdc882b912ea4', 'XI', 'B', '098765432123', 'siswa'),
(38, NULL, 'iqbal@gmail.com', 'Muhammad Farhan Iqbal', 'c0ef99bb77c1ddc9c95ad07d641a3a4b', 'XI', 'B', '098765456735', 'siswa'),
(39, NULL, 'dewi@gmail.com', 'Dewi', '1801bc89e752077204c92b3dd9f9f62d', 'XI', 'A', '88756747466', 'siswa'),
(40, NULL, 'Fathur@gmail.com', 'Fathur', '0a7a66b4248731786d53aa2c8c9f7dd5', 'X', 'B', '098765735463', 'siswa'),
(41, NULL, 'siswa@gmail.com', 'siswa', 'bcd724d15cde8c47650fda962968f102', 'X', 'A', '09987665777', 'siswa'),
(42, NULL, 'aspiran@gmail.com', 'Saya Aspiran', 'c0bfa7d96300bf54e1ee211158fbc00e', NULL, NULL, '09857737532', 'aspiran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `no_seri_alat` varchar(50) NOT NULL,
  `lokasi_alat` varchar(255) DEFAULT NULL,
  `nama_alat` varchar(45) DEFAULT NULL,
  `kondisi_alat` varchar(60) DEFAULT NULL,
  `jenis_alat` varchar(60) DEFAULT NULL,
  `jumlah_alat` int(255) DEFAULT NULL,
  `ket_alat` varchar(255) DEFAULT NULL,
  `gambar_alat` varchar(255) DEFAULT NULL,
  `status_alat` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id_alat`, `no_seri_alat`, `lokasi_alat`, `nama_alat`, `kondisi_alat`, `jenis_alat`, `jumlah_alat`, `ket_alat`, `gambar_alat`, `status_alat`) VALUES
(51, '020818MRB4', 'Loker A 1,2', 'Router Mikrotik RB11', 'Baik', 'Tidak Habis Pakai', NULL, '', '../img/alat/Backup_of_NISSAN S15 GD.png', 'Tersedia'),
(56, 'CSSW29601', 'Loker A 1,3', 'Switch 2960', 'Baik', 'Tidak Habis Pakai', NULL, '', '../img/alat/bgindo.png', 'Tersedia'),
(57, 'RB1109JAR', 'Loker B 1,2', 'Router RB11', 'Baik', 'Tidak Habis Pakai', NULL, NULL, '../img/alat/IMG_20190315_083737.jpg', 'Dipinjam'),
(58, 'CT01H', 'Gantungan A(3,1)', 'Crimping Tools', 'Baik', 'Tidak Habis Pakai', 0, '', '../img/alat/Daleman UVKS.PNG', 'Tersedia'),
(59, 'NMCU12', 'Loker B 1,3', 'NodeMCU', 'Baik', 'Tidak Habis Pakai', NULL, NULL, '../img/alat/cerpen2.jpg', 'Tersedia'),
(62, 'BIRU2', 'Digantung', 'Kabel Console', 'Baik', 'Tidak Habis Pakai', 0, '', '../img/alat/5b5e670ad0e36.jpeg', 'Tersedia'),
(63, '14AST', 'Dimana we', 'Laptop', 'Baik', 'Tidak Habis Pakai', NULL, NULL, '../img/alat/haha220px-SMK_Negeri_1_Cimahi.png', 'Dipinjam'),
(70, 'OP1', 'Digantung', 'Obeng +', 'Baik', 'Tidak Habis Pakai', NULL, NULL, '../img/alat/Alat-70-2019-05-19 01.05.23.jpg', 'Tersedia'),
(71, 'UTP1', 'Kardus', 'UTP', '', 'Habis Pakai', 100, '', '../img/alat/Alat-71-2019-05-19 01.05.20.jpg', 'Tersedia'),
(74, 'TM1', 'Laci 1,2', 'Timah', '', 'Habis Pakai', 100, 'Jumlah dalam satuan m(meter)', '../img/alat/Alat-72-2019-05-19 01.05.51.jpg', 'Tersedia'),
(76, 'CSCR1', 'Loker A 2,3', 'Cisco Router', 'Baik', 'Tidak Habis Pakai', 0, '', '../img/alat/Alat-76-2019-05-19 02.05.28.jpg', 'Tersedia'),
(92, 'AG1', 'Deket WC', 'Antenna Grid', 'Baik', 'Tidak Habis Pakai', 0, NULL, '../img/alat/no_image.png', 'Tersedia'),
(93, 'JW1', 'Loker 1,4', 'Kabel Jumper', '', 'Habis Pakai', 100, 'Biji', '../img/alat/no_image.png', 'Tersedia'),
(94, 'SP1', 'Lemari Es', 'Lenovo A6010', 'Baik', 'Tidak Habis Pakai', 0, NULL, '../img/alat/no_image.png', 'Tersedia'),
(95, 'DVDRW', 'Kardus', 'DVD-RW', 'Baik', 'Habis Pakai', 1, NULL, '../img/alat/no_image.png', 'Tersedia'),
(96, 'TMH2', 'Loker A 1,2', 'Timah', '', 'Habis Pakai', 99, 'm', '../img/alat/Alat-96-2019-05-21 09.05.42.png', 'Tersedia'),
(97, 'DVDRW', 'Kardus', 'DVD-R', 'Baik', 'Habis Pakai', 26, 'Unit', '../img/alat/no_image.png', 'Tersedia'),
(98, 'PT1', 'Digantung', 'Pig Tail', 'Baik', 'Tidak Habis Pakai', 0, '', '../img/alat/no_image.png', 'Tersedia'),
(99, 'OM1', 'Loker A 1,2', 'Obeng -', 'Baik', 'Tidak Habis Pakai', 0, '', '../img/alat/Alat-99-2019-05-22 05.05.16.jpeg', 'Tersedia'),
(100, 'TIPR1', 'Laci 1,2', 'Tinta Printer', 'Baik', 'Habis Pakai', 11, 'Botol', '../img/alat/no_image.png', 'Tersedia'),
(104, 'OMK1', 'Ditembok kanan', 'Obeng + Kecil', 'Baik', 'Tidak Habis Pakai', 0, '', '../img/alat/no_image.png', 'Tersedia'),
(106, 'FA1', 'Deket WC', 'Flat Antenna', 'Baik', 'Tidak Habis Pakai', 0, '', '../img/alat/no_image.png', 'Tersedia'),
(107, 'FA2', 'Deket WC', 'Flat Antenna', 'Baik', 'Tidak Habis Pakai', 0, '', '../img/alat/no_image.png', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` int(11) NOT NULL,
  `peminjaman_id_peminjaman` int(11) NOT NULL,
  `alat_id_alat` int(11) NOT NULL,
  `detail_jumlah_pinjam` int(255) NOT NULL,
  `status_detail` varchar(255) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dikembalikan_pada` datetime DEFAULT NULL,
  `kondisi_akhir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id`, `peminjaman_id_peminjaman`, `alat_id_alat`, `detail_jumlah_pinjam`, `status_detail`, `last_modified`, `dikembalikan_pada`, `kondisi_akhir`) VALUES
(127, 83, 100, 2, 'Dipinjam', '2019-06-12 03:32:28', '2019-06-12 10:32:28', ''),
(128, 83, 95, 1, 'Dipinjam', '2019-05-26 01:05:23', '2019-05-26 08:05:23', ''),
(129, 83, 70, 0, 'Dipinjam', '2019-05-26 01:09:30', '2019-05-26 08:09:30', 'Baik'),
(130, 84, 59, 0, 'Dipinjam', '2019-05-30 06:38:10', '2019-05-30 13:38:10', 'Baik'),
(131, 84, 96, 1, 'Dipinjam', '2019-06-12 03:32:28', '2019-06-12 10:32:28', ''),
(132, 85, 97, 1, 'Dipinjam', '2019-06-12 03:32:28', '2019-06-12 10:32:28', ''),
(133, 85, 100, 1, 'Dipinjam', '2019-06-12 03:32:28', '2019-06-12 10:32:28', ''),
(134, 86, 51, 0, 'Dipinjam', '2019-06-12 13:42:58', '2019-06-12 20:42:58', 'Rusak'),
(135, 86, 56, 0, 'Dipinjam', '2019-06-12 03:05:26', '2019-06-12 10:05:26', 'Rusak'),
(136, 86, 96, 3, 'Dipinjam', '2019-06-12 03:32:28', '2019-06-12 10:32:28', ''),
(137, 87, 51, 0, 'Dipinjam', '2019-06-12 13:42:58', '2019-06-12 20:42:58', 'Rusak'),
(138, 87, 57, 0, 'Dipinjam', '2019-06-12 03:16:26', '2019-06-12 10:16:26', 'Baik'),
(139, 88, 63, 0, 'Dipinjam', '2019-06-12 03:16:34', '2019-06-12 10:16:34', 'Baik'),
(140, 88, 97, 9, 'Dipinjam', '2019-06-12 03:32:28', '2019-06-12 10:32:28', ''),
(141, 89, 100, 2, 'Dipinjam', '2019-06-12 03:32:28', '2019-06-12 10:32:28', ''),
(142, 89, 97, 1, 'Dipinjam', '2019-06-12 03:32:28', '2019-06-12 10:32:28', ''),
(143, 89, 96, 1, 'Dipinjam', '2019-06-12 03:32:28', '2019-06-12 10:32:28', ''),
(144, 89, 51, 0, 'Dipinjam', '2019-06-12 13:42:58', '2019-06-12 20:42:58', 'Rusak'),
(145, 90, 51, 0, 'Dipinjam', '2019-06-12 13:42:58', '2019-06-12 20:42:58', 'Rusak'),
(146, 91, 57, 0, 'Menunggu Persetujuan Guru', '2019-06-14 06:34:25', NULL, ''),
(147, 91, 63, 0, 'Menunggu Persetujuan Guru', '2019-06-14 06:34:25', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `alat_id_alat` int(11) NOT NULL,
  `jumlah_pinjam` int(255) NOT NULL,
  `akun_id_siswa` int(11) NOT NULL,
  `status_keranjang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `alat_id_alat`, `jumlah_pinjam`, `akun_id_siswa`, `status_keranjang`) VALUES
(1, 57, 0, 8, 'Dipinjam'),
(2, 51, 0, 8, 'Dipinjam'),
(3, 58, 0, 8, 'Dibatalkan'),
(4, 58, 0, 8, 'Dipinjam'),
(5, 59, 0, 8, 'Dipinjam'),
(6, 51, 0, 8, 'Dipinjam'),
(7, 51, 0, 8, 'Dipinjam'),
(8, 51, 0, 8, 'Dipinjam'),
(9, 56, 0, 8, 'Dipinjam'),
(10, 56, 0, 8, 'Dipinjam'),
(11, 56, 0, 8, 'Dipinjam'),
(12, 56, 0, 8, 'Dipinjam'),
(13, 51, 0, 8, 'Dipinjam'),
(14, 59, 0, 8, 'Dipinjam'),
(15, 58, 0, 8, 'Dipinjam'),
(16, 57, 0, 8, 'Dipinjam'),
(17, 59, 0, 8, 'Dipinjam'),
(18, 57, 0, 8, 'Dipinjam'),
(19, 56, 0, 8, 'Dipinjam'),
(20, 58, 0, 8, 'Dipinjam'),
(21, 59, 0, 8, 'Dipinjam'),
(22, 58, 0, 8, 'Dipinjam'),
(23, 51, 0, 8, 'Dipinjam'),
(24, 63, 0, 8, 'Dipinjam'),
(25, 59, 0, 8, 'Dipinjam'),
(26, 51, 0, 8, 'Dipinjam'),
(27, 62, 0, 8, 'Dipinjam'),
(28, 58, 0, 8, 'Dipinjam'),
(29, 56, 0, 8, 'Dipinjam'),
(30, 51, 0, 8, 'Dipinjam'),
(31, 70, 0, 8, 'Dibatalkan'),
(32, 70, 0, 8, 'Dibatalkan'),
(33, 70, 0, 8, 'Dibatalkan'),
(34, 65, 0, 8, 'Dibatalkan'),
(35, 69, 0, 8, 'Dibatalkan'),
(36, 67, 0, 8, 'Dibatalkan'),
(37, 94, 0, 8, 'Dibatalkan'),
(38, 95, 0, 8, 'Dibatalkan'),
(39, 95, 0, 8, 'Dibatalkan'),
(40, 94, 0, 8, 'Dibatalkan'),
(41, 95, 0, 8, 'Dibatalkan'),
(42, 93, 0, 8, 'Dibatalkan'),
(43, 59, 0, 8, 'Dibatalkan'),
(44, 59, 0, 8, 'Dibatalkan'),
(45, 59, 0, 8, 'Dibatalkan'),
(46, 59, 3, 8, 'Dibatalkan'),
(47, 59, 3, 8, 'Dibatalkan'),
(48, 93, 2, 8, 'Dibatalkan'),
(49, 74, 2, 8, 'Dibatalkan'),
(50, 94, 0, 8, 'Dibatalkan'),
(51, 74, 2, 8, 'Dipinjam'),
(52, 94, 0, 8, 'Dipinjam'),
(53, 93, 3, 8, 'Dipinjam'),
(54, 92, 0, 8, 'Dipinjam'),
(55, 74, 1, 8, 'Dipinjam'),
(56, 93, 1, 8, 'Dipinjam'),
(57, 92, 0, 8, 'Dipinjam'),
(58, 76, 0, 8, 'Dipinjam'),
(59, 93, 5, 8, 'Dibatalkan'),
(60, 70, 0, 8, 'Dipinjam'),
(61, 93, 5, 8, 'Dipinjam'),
(62, 74, 2, 8, 'Dipinjam'),
(63, 63, 0, 8, 'Dipinjam'),
(64, 62, 0, 8, 'Dipinjam'),
(65, 51, 0, 8, 'Dipinjam'),
(66, 57, 0, 8, 'Dipinjam'),
(67, 74, 2, 8, 'Dipinjam'),
(68, 94, 0, 8, 'Dipinjam'),
(69, 95, 1, 8, 'Dibatalkan'),
(70, 74, 1, 8, 'Dipinjam'),
(71, 74, 2, 8, 'Dipinjam'),
(72, 92, 0, 8, 'Dipinjam'),
(73, 74, 2, 8, 'Dipinjam'),
(74, 76, 0, 8, 'Dipinjam'),
(75, 59, 0, 8, 'Dipinjam'),
(76, 74, 3, 8, 'Dipinjam'),
(77, 70, 0, 8, 'Dipinjam'),
(78, 63, 0, 8, 'Dipinjam'),
(79, 62, 0, 8, 'Dipinjam'),
(80, 74, 3, 8, 'Dipinjam'),
(81, 51, 0, 8, 'Dipinjam'),
(82, 56, 0, 8, 'Dipinjam'),
(83, 71, 5, 8, 'Dipinjam'),
(84, 57, 0, 8, 'Dipinjam'),
(85, 94, 0, 8, 'Dipinjam'),
(86, 74, 3, 8, 'Dipinjam'),
(87, 65, 0, 8, 'Dipinjam'),
(88, 93, 2, 8, 'Dipinjam'),
(89, 51, 0, 8, 'Dipinjam'),
(90, 56, 0, 8, 'Dipinjam'),
(91, 57, 0, 8, 'Dipinjam'),
(92, 56, 0, 8, 'Dipinjam'),
(93, 51, 0, 8, 'Dipinjam'),
(94, 57, 0, 8, 'Dipinjam'),
(95, 51, 0, 8, 'Dipinjam'),
(96, 56, 0, 8, 'Dipinjam'),
(97, 93, 3, 8, 'Dipinjam'),
(98, 93, 5, 8, 'Dipinjam'),
(99, 94, 0, 8, 'Dipinjam'),
(100, 71, 5, 8, 'Dipinjam'),
(101, 51, 0, 8, 'Dipinjam'),
(102, 56, 0, 8, 'Dipinjam'),
(103, 57, 0, 8, 'Dipinjam'),
(104, 93, 3, 8, 'Dipinjam'),
(105, 94, 0, 8, 'Dipinjam'),
(106, 76, 0, 8, 'Dipinjam'),
(107, 92, 0, 8, 'Dipinjam'),
(108, 70, 0, 8, 'Dipinjam'),
(109, 71, 5, 8, 'Dipinjam'),
(110, 92, 0, 8, 'Dipinjam'),
(111, 93, 3, 8, 'Dipinjam'),
(112, 57, 0, 8, 'Dipinjam'),
(113, 74, 2, 8, 'Dipinjam'),
(114, 92, 0, 8, 'Dipinjam'),
(115, 74, 10, 8, 'Dibatalkan'),
(116, 93, 66, 8, 'Dibatalkan'),
(117, 71, 65, 8, 'Dibatalkan'),
(118, 96, 10, 8, 'Dibatalkan'),
(119, 70, 0, 8, 'Dibatalkan'),
(120, 96, 10, 8, 'Dibatalkan'),
(121, 74, 5, 8, 'Dibatalkan'),
(122, 96, 10, 8, 'Dipinjam'),
(123, 63, 0, 8, 'Dipinjam'),
(124, 59, 0, 8, 'Dipinjam'),
(125, 93, 1, 8, 'Dipinjam'),
(126, 71, 8, 8, 'Dipinjam'),
(127, 93, 1, 8, 'Dibatalkan'),
(128, 57, 0, 8, 'Dibatalkan'),
(129, 74, 1, 8, 'Dibatalkan'),
(130, 74, 1, 8, 'Dipinjam'),
(131, 51, 0, 8, 'Dipinjam'),
(132, 62, 0, 8, 'Dipinjam'),
(133, 74, 1, 8, 'Dipinjam'),
(134, 93, 2, 8, 'Dipinjam'),
(135, 95, 2, 10, 'Dibatalkan'),
(136, 74, 3, 10, 'Dipinjam'),
(137, 57, 0, 10, 'Dipinjam'),
(138, 62, 0, 10, 'Dibatalkan'),
(139, 93, 1, 8, 'Dipinjam'),
(140, 70, 0, 8, 'Dibatalkan'),
(141, 57, 0, 8, 'Dipinjam'),
(142, 59, 0, 8, 'Dibatalkan'),
(143, 93, 1, 8, 'Dipinjam'),
(144, 71, 1, 8, 'Dipinjam'),
(145, 71, 1, 8, 'Dibatalkan'),
(146, 51, 0, 8, 'Dibatalkan'),
(147, 71, 1, 8, 'Dibatalkan'),
(148, 56, 0, 8, 'Dibatalkan'),
(149, 71, 1, 8, 'Dibatalkan'),
(150, 71, 1, 8, 'Dibatalkan'),
(151, 63, 0, 8, 'Dibatalkan'),
(152, 100, 1, 8, 'Dibatalkan'),
(153, 59, 0, 8, 'Dibatalkan'),
(154, 63, 0, 8, 'Dipinjam'),
(155, 74, 1, 8, 'Dibatalkan'),
(156, 59, 0, 8, 'Dibatalkan'),
(157, 70, 0, 8, 'Dibatalkan'),
(158, 59, 0, 10, 'Dipinjam'),
(159, 70, 0, 10, 'Dipinjam'),
(160, 51, 0, 10, 'Dipinjam'),
(161, 74, 1, 10, 'Dipinjam'),
(162, 51, 0, 8, 'Dipinjam'),
(163, 63, 0, 8, 'Dipinjam'),
(164, 70, 0, 8, 'Dipinjam'),
(165, 59, 0, 8, 'Dipinjam'),
(166, 57, 0, 8, 'Dipinjam'),
(167, 71, 1, 10, 'Dipinjam'),
(168, 100, 1, 10, 'Dipinjam'),
(169, 97, 1, 10, 'Dipinjam'),
(170, 100, 1, 8, 'Dipinjam'),
(171, 97, 1, 8, 'Dipinjam'),
(172, 100, 1, 10, 'Dipinjam'),
(173, 97, 1, 10, 'Dipinjam'),
(174, 51, 0, 8, 'Dipinjam'),
(175, 100, 1, 8, 'Dipinjam'),
(176, 100, 2, 8, 'Dipinjam'),
(177, 95, 1, 8, 'Dipinjam'),
(178, 70, 0, 8, 'Dipinjam'),
(179, 59, 0, 10, 'Dipinjam'),
(180, 96, 1, 10, 'Dipinjam'),
(181, 97, 1, 10, 'Dipinjam'),
(182, 100, 1, 10, 'Dipinjam'),
(183, 70, 0, 8, 'Dibatalkan'),
(184, 51, 0, 8, 'Dibatalkan'),
(185, 56, 0, 8, 'Dibatalkan'),
(186, 51, 0, 8, 'Dibatalkan'),
(187, 51, 0, 8, 'Dibatalkan'),
(188, 51, 0, 8, 'Dibatalkan'),
(189, 51, 0, 8, 'Dibatalkan'),
(190, 51, 0, 8, 'Dibatalkan'),
(191, 51, 0, 8, 'Dibatalkan'),
(192, 51, 0, 8, 'Dibatalkan'),
(193, 56, 0, 8, 'Dibatalkan'),
(194, 51, 0, 8, 'Dibatalkan'),
(195, 63, 0, 8, 'Dibatalkan'),
(196, 63, 0, 8, 'Dibatalkan'),
(197, 51, 0, 8, 'Dibatalkan'),
(198, 56, 0, 8, 'Dibatalkan'),
(199, 97, 1, 8, 'Dibatalkan'),
(200, 97, 1, 8, 'Dibatalkan'),
(201, 97, 1, 8, 'Dibatalkan'),
(202, 97, 1, 8, 'Dibatalkan'),
(203, 97, 1, 8, 'Dibatalkan'),
(204, 97, 1, 8, 'Dibatalkan'),
(205, 97, 1, 8, 'Dibatalkan'),
(206, 97, 1, 8, 'Dibatalkan'),
(207, 97, 1, 8, 'Dibatalkan'),
(208, 97, 1, 8, 'Dibatalkan'),
(209, 97, 1, 8, 'Dibatalkan'),
(210, 97, 1, 8, 'Dibatalkan'),
(211, 97, 1, 8, 'Dibatalkan'),
(212, 97, 1, 8, 'Dibatalkan'),
(213, 97, 1, 8, 'Dibatalkan'),
(214, 97, 1, 8, 'Dibatalkan'),
(215, 97, 1, 8, 'Dibatalkan'),
(216, 97, 1, 8, 'Dibatalkan'),
(217, 97, 1, 8, 'Dibatalkan'),
(218, 96, 1, 8, 'Dibatalkan'),
(219, 96, 1, 8, 'Dibatalkan'),
(220, 96, 1, 8, 'Dibatalkan'),
(221, 96, 1, 8, 'Dibatalkan'),
(222, 96, 1, 8, 'Dibatalkan'),
(223, 96, 1, 8, 'Dibatalkan'),
(224, 97, 1, 8, 'Dibatalkan'),
(225, 51, 0, 8, 'Dibatalkan'),
(226, 59, 0, 8, 'Dibatalkan'),
(227, 51, 0, 8, 'Dibatalkan'),
(228, 57, 0, 8, 'Dibatalkan'),
(229, 95, 1, 8, 'Dibatalkan'),
(230, 51, 0, 8, 'Dibatalkan'),
(231, 56, 0, 8, 'Dibatalkan'),
(232, 56, 0, 8, 'Dibatalkan'),
(233, 51, 0, 8, 'Dibatalkan'),
(234, 56, 0, 8, 'Dibatalkan'),
(235, 57, 0, 8, 'Dibatalkan'),
(236, 51, 0, 8, 'Dibatalkan'),
(237, 51, 0, 8, 'Dibatalkan'),
(238, 51, 0, 8, 'Dibatalkan'),
(239, 51, 0, 8, 'Dibatalkan'),
(240, 51, 0, 8, 'Dibatalkan'),
(241, 51, 0, 8, 'Dibatalkan'),
(242, 51, 0, 8, 'Dibatalkan'),
(243, 56, 0, 8, 'Dibatalkan'),
(244, 57, 0, 8, 'Dibatalkan'),
(245, 63, 0, 8, 'Dibatalkan'),
(246, 59, 0, 8, 'Dibatalkan'),
(247, 51, 0, 8, 'Dibatalkan'),
(248, 56, 0, 8, 'Dibatalkan'),
(249, 57, 0, 8, 'Dibatalkan'),
(250, 59, 0, 8, 'Dibatalkan'),
(251, 63, 0, 8, 'Dibatalkan'),
(252, 71, 1, 8, 'Dibatalkan'),
(253, 51, 0, 8, 'Dibatalkan'),
(254, 57, 0, 8, 'Dibatalkan'),
(255, 56, 0, 8, 'Dibatalkan'),
(256, 74, 1, 8, 'Dibatalkan'),
(257, 56, 0, 8, 'Dibatalkan'),
(258, 51, 0, 8, 'Dibatalkan'),
(259, 57, 0, 8, 'Dibatalkan'),
(260, 97, 3, 8, 'Dibatalkan'),
(261, 51, 0, 8, 'Dibatalkan'),
(262, 56, 0, 8, 'Dibatalkan'),
(263, 57, 0, 8, 'Dibatalkan'),
(264, 51, 0, 8, 'Dibatalkan'),
(265, 51, 0, 8, 'Dibatalkan'),
(266, 51, 0, 8, 'Dibatalkan'),
(267, 57, 0, 8, 'Dibatalkan'),
(268, 71, 1, 8, 'Dibatalkan'),
(269, 56, 0, 8, 'Dibatalkan'),
(270, 57, 0, 8, 'Dibatalkan'),
(271, 51, 0, 8, 'Dibatalkan'),
(272, 51, 0, 8, 'Dibatalkan'),
(273, 56, 0, 8, 'Dibatalkan'),
(274, 57, 0, 8, 'Dibatalkan'),
(275, 59, 0, 8, 'Dibatalkan'),
(276, 63, 0, 8, 'Dibatalkan'),
(277, 51, 0, 8, 'Dibatalkan'),
(278, 51, 0, 8, 'Dibatalkan'),
(279, 51, 0, 8, 'Dibatalkan'),
(280, 56, 0, 8, 'Dibatalkan'),
(281, 56, 0, 8, 'Dibatalkan'),
(282, 51, 0, 8, 'Dibatalkan'),
(283, 57, 0, 8, 'Dibatalkan'),
(284, 56, 0, 8, 'Dibatalkan'),
(285, 51, 0, 8, 'Dibatalkan'),
(286, 56, 0, 8, 'Dibatalkan'),
(287, 51, 0, 8, 'Dibatalkan'),
(288, 57, 0, 8, 'Dibatalkan'),
(289, 59, 0, 8, 'Dibatalkan'),
(290, 63, 0, 8, 'Dibatalkan'),
(291, 70, 0, 8, 'Dibatalkan'),
(292, 51, 0, 8, 'Dibatalkan'),
(293, 51, 0, 8, 'Dibatalkan'),
(294, 51, 0, 8, 'Dibatalkan'),
(295, 56, 0, 8, 'Dibatalkan'),
(296, 56, 0, 8, 'Dibatalkan'),
(297, 51, 0, 8, 'Dibatalkan'),
(298, 56, 0, 8, 'Dibatalkan'),
(299, 51, 0, 8, 'Dibatalkan'),
(300, 56, 0, 8, 'Dibatalkan'),
(301, 56, 0, 8, 'Dibatalkan'),
(302, 56, 0, 8, 'Dibatalkan'),
(303, 56, 0, 8, 'Dibatalkan'),
(304, 56, 0, 8, 'Dibatalkan'),
(305, 51, 0, 8, 'Dibatalkan'),
(306, 51, 0, 8, 'Dibatalkan'),
(307, 56, 0, 8, 'Dibatalkan'),
(308, 51, 0, 8, 'Dibatalkan'),
(309, 51, 0, 8, 'Dibatalkan'),
(310, 100, 1, 8, 'Dibatalkan'),
(311, 100, 1, 8, 'Dibatalkan'),
(312, 100, 1, 8, 'Dibatalkan'),
(313, 51, 0, 8, 'Dibatalkan'),
(314, 100, 1, 8, 'Dibatalkan'),
(315, 100, 1, 8, 'Dibatalkan'),
(316, 100, 1, 8, 'Dibatalkan'),
(317, 51, 0, 8, 'Dipinjam'),
(318, 56, 0, 8, 'Dipinjam'),
(319, 96, 3, 8, 'Dipinjam'),
(320, 51, 0, 10, 'Dipinjam'),
(321, 57, 0, 10, 'Dipinjam'),
(322, 63, 0, 10, 'Dipinjam'),
(323, 63, 0, 10, 'Dibatalkan'),
(324, 97, 9, 10, 'Dipinjam'),
(325, 100, 2, 10, 'Dipinjam'),
(326, 97, 1, 10, 'Dipinjam'),
(327, 96, 1, 10, 'Dipinjam'),
(328, 51, 0, 10, 'Dibatalkan'),
(329, 51, 0, 10, 'Dibatalkan'),
(330, 51, 0, 10, 'Dipinjam'),
(331, 51, 0, 8, 'Dibatalkan'),
(332, 100, 1, 8, 'Dibatalkan'),
(333, 100, 1, 8, 'Dibatalkan'),
(334, 95, 1, 8, 'Dibatalkan'),
(335, 51, 0, 8, 'Dibatalkan'),
(336, 51, 0, 8, 'Dibatalkan'),
(337, 51, 0, 8, 'Dibatalkan'),
(338, 51, 0, 8, 'Dibatalkan'),
(339, 51, 0, 8, 'Dibatalkan'),
(340, 57, 0, 8, 'Dibatalkan'),
(341, 59, 0, 8, 'Dibatalkan'),
(342, 63, 0, 8, 'Dibatalkan'),
(343, 70, 0, 8, 'Dibatalkan'),
(344, 51, 0, 8, 'Dibatalkan'),
(345, 51, 0, 8, 'Dibatalkan'),
(346, 51, 0, 8, 'Dibatalkan'),
(347, 51, 0, 8, 'Dibatalkan'),
(348, 97, 1, 8, 'Dibatalkan'),
(349, 51, 0, 8, 'Dibatalkan'),
(350, 57, 0, 8, 'Dibatalkan'),
(351, 59, 0, 8, 'Dibatalkan'),
(352, 63, 0, 8, 'Dibatalkan'),
(353, 57, 0, 8, 'Dibatalkan'),
(354, 70, 0, 8, 'Dibatalkan'),
(355, 63, 0, 8, 'Dibatalkan'),
(356, 100, 1, 8, 'Dibatalkan'),
(357, 51, 0, 8, 'Dibatalkan'),
(358, 57, 0, 8, 'Dibatalkan'),
(359, 51, 0, 8, 'Dipinjam'),
(360, 57, 0, 10, 'Dipinjam'),
(361, 63, 0, 10, 'Dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id` int(11) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id`, `konten`, `tanggal`) VALUES
(19, 'Kojur tolong segera hubungi saya (Dodi Permana).', '2019-01-26 17:00:00'),
(20, 'Kepada Pengurus SBC, diberitahukan bahwa nanti pulang sekolah ada kumpul di Smart (Meja Bundar).', '2019-01-26 17:00:00'),
(21, 'Sandi Hambali Safar Ke ruangan saya', '2019-01-28 17:00:00'),
(25, 'Kosongkan Workshop paling telat jam 4 sore sudah kosong', '2019-03-31 03:31:37'),
(26, 'Kepada antek antek SBC, perwakilannya mohon menghadap pak Anton', '2019-03-31 03:32:04'),
(27, 'Ada Hibah mikrotik Router dari Latvia, mohon dijaga baik baik. Hargai Pemberian Orang Lain.', '2019-04-07 00:47:44'),
(31, 'Kepada seluruh akhwat jurusan TKJ/SIJA diwajibkan menggunakan jilbab/kerudung segitiga dengan ciput selama beraktifitas di Workshop.', '2019-05-08 00:36:47'),
(10014, '', '2019-05-23 05:50:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `jumlah_alat` int(11) DEFAULT NULL,
  `tanggal_peminjaman` datetime DEFAULT NULL,
  `alat_id_alat` int(11) DEFAULT NULL,
  `akun_id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `tanggal_pengembalian` datetime DEFAULT NULL,
  `denda` decimal(22,2) DEFAULT NULL,
  `struk_peminjaman` varchar(255) DEFAULT NULL,
  `status_peminjaman` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `jumlah_alat`, `tanggal_peminjaman`, `alat_id_alat`, `akun_id`, `id_guru`, `tanggal_pengembalian`, `denda`, `struk_peminjaman`, `status_peminjaman`) VALUES
(83, NULL, '2019-05-26 08:05:23', NULL, 8, 16, '2019-05-26 08:09:30', NULL, 'Bukti Peminjaman_83@2019-05-26_8_5_23.pdf', 'Dikembalikan'),
(84, NULL, '2019-05-26 08:22:00', NULL, 10, 15, '2019-05-30 13:38:11', NULL, 'Bukti Peminjaman_84@2019-05-26_8_22_0.pdf', 'Dikembalikan'),
(85, NULL, '2019-05-26 17:18:15', NULL, 10, 15, '2019-05-26 17:18:15', NULL, 'Bukti Peminjaman_85@2019-05-26_17_18_15.pdf', 'Dikembalikan'),
(86, NULL, '2019-06-12 10:04:33', NULL, 8, 15, '2019-06-12 10:05:41', NULL, 'Bukti Peminjaman_86@2019-06-12_10_4_33.pdf', 'Dikembalikan'),
(87, NULL, '2019-06-12 10:09:18', NULL, 10, 15, '2019-06-12 10:16:26', NULL, 'Bukti Peminjaman_87@2019-06-12_10_9_18.pdf', 'Dikembalikan'),
(88, NULL, '2019-06-12 10:15:10', NULL, 10, 15, '2019-06-12 10:16:34', NULL, 'Bukti Peminjaman_88@2019-06-12_10_15_10.pdf', 'Dikembalikan'),
(89, NULL, '2019-06-12 10:32:28', NULL, 10, 21, '2019-06-12 10:33:53', NULL, 'Bukti Peminjaman_89@2019-06-12_10_32_28.pdf', 'Dikembalikan'),
(90, NULL, '2019-06-12 20:41:56', NULL, 8, 15, '2019-06-12 20:42:58', NULL, 'Bukti Peminjaman_90@2019-06-12_20_41_56.pdf', 'Dikembalikan'),
(91, NULL, NULL, NULL, 10, 15, NULL, NULL, NULL, 'Menunggu Persetujuan Guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `alat_id_alat` (`alat_id_alat`),
  ADD KEY `akun_id` (`akun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;
--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10015;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`alat_id_alat`) REFERENCES `alat` (`id_alat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`akun_id`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
