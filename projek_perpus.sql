-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 11:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `perlengkapan`
--

CREATE TABLE `perlengkapan` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `jumlah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggaran`
--

CREATE TABLE `tbl_anggaran` (
  `id_anggaran` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `harga` varchar(50) NOT NULL,
  `jumlah_barang` varchar(50) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status` enum('Belum Disetujui','Disetujui') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_anggaran`
--

INSERT INTO `tbl_anggaran` (`id_anggaran`, `nama_barang`, `harga`, `jumlah_barang`, `tanggal_pengajuan`, `status`) VALUES
(2, 'Meja', '20000', '21', '2023-07-23', 'Belum Disetujui'),
(3, 'kipas angin', '100000', '15', '2023-07-22', 'Disetujui'),
(4, 'kertas A4', '45000', '4', '2023-07-12', 'Belum Disetujui'),
(5, 'Papan Tulis Kecil', '15000', '2', '2023-07-12', 'Disetujui'),
(6, 'spidol', '12000', '15', '2023-07-22', 'Belum Disetujui'),
(7, 'Tinta Printer', '45000', '6', '2023-07-22', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_denda`
--

CREATE TABLE `tbl_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biaya_denda`
--

INSERT INTO `tbl_biaya_denda` (`id_biaya_denda`, `harga_denda`, `stat`, `tgl_tetap`) VALUES
(1, '4000', 'Aktif', '2023-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `thn_buku` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `buku_id`, `id_kategori`, `id_rak`, `sampul`, `isbn`, `lampiran`, `title`, `penerbit`, `pengarang`, `thn_buku`, `isi`, `jml`, `tgl_masuk`) VALUES
(8, 'BK008', 2, 1, '0', '132-123-234-231', '0', 'CARA MUDAH BELAJAR PEMROGRAMAN C++', 'INFORMATIKA BANDUNG', 'BUDI RAHARJO ', '2012', '<table class=\"table table-bordered\" style=\"background-color: rgb(255, 255, 255); width: 653px; color: rgb(51, 51, 51);\"><tbody><tr><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Tipe Buku</td><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Kertas</td></tr><tr><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Bahasa</td><td style=\"padding: 8px; line-height: 1.42857; border-color: rgb(244, 244, 244);\">Indonesia</td></tr></tbody></table>', 24, '2019-11-23 11:49:57'),
(9, 'BK009', 2, 2, '1b17ad7108d1b7b035bb5747a9f45481.jpg', '237-1542-3537', '0', 'cara memasukan buku', 'inodes', 'bayu', '2023', '', 18, '2023-07-23 12:20:32'),
(10, 'BK0010', 12, 3, '0', '169 257 098', '0', 'Detik Detik Ujian Nasional Sosiologi', 'Detik Detik', 'Erlangga', '2022', '', 60, '2023-07-13 10:10:38'),
(11, 'BK0011', 11, 3, '0', '133 090 124', '0', 'Detik Detik Ujian Nasional Kimia', 'Detik Detik', 'Erlangga', '2022', '', 60, '2023-07-13 10:12:12'),
(12, 'BK0012', 10, 1, '0', '876 097 097', '0', 'Ilmu Pengetahuan Sejarah Indonesia Kelas 11', 'CV Buana Mitra', 'Agus Hidayat', '2018', '', 39, '2023-07-13 10:14:48'),
(13, 'BK0013', 9, 4, '0', '156 678 986', '0', 'Fikih', 'VC Pena Borneo', 'Wahyu', '2019', '', 40, '2023-08-14 07:55:47'),
(14, 'BK0014', 8, 3, '0', '972 659 097', '0', 'Cerita Abu Nawas', 'gerindro', 'Abasyah', '2022', '', 15, '2023-08-14 07:57:13'),
(15, 'BK0015', 6, 2, '0', '123 158 136', '0', 'Bahasa Indonesia Kelas 12', 'Indonesia maju', 'Agus Hatono', '2023', '', 30, '2023-08-14 07:59:14'),
(16, 'BK0016', 4, 3, '0', '976 972 074', '0', 'Seni Rupa Tanaman Hias', 'Kreatif jaya', 'Tuti Sania', '2019', '', 24, '2023-08-14 08:01:23'),
(17, 'BK0017', 9, 1, '0', '189 0753 241', '0', 'Pendidikan Al Qur\'an Dan Hadist Kelas 10', 'Syariat Islam Book', 'Yusuf Adi', '2021', '', 50, '2023-08-14 08:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `tgl_denda` varchar(255) NOT NULL,
  `status_denda` enum('Belum Dibayar','Sudah Dibayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_denda`
--

INSERT INTO `tbl_denda` (`id_denda`, `pinjam_id`, `denda`, `lama_waktu`, `tgl_denda`, `status_denda`) VALUES
(13, 'PJ001', '4000', 1, '2023-07-20', 'Sudah Dibayar'),
(14, 'PJ0021', '0', 0, '2023-07-20', 'Belum Dibayar'),
(15, 'PJ0022', '8000', 2, '2023-07-23', 'Belum Dibayar'),
(16, 'PJ0023', '4000', 1, '2023-07-23', 'Belum Dibayar'),
(17, 'PJ0024', '4000', 1, '2023-07-23', 'Belum Dibayar'),
(18, 'PJ0025', '8000', 2, '2023-07-25', 'Belum Dibayar'),
(19, 'PJ0026', '4000', 1, '2023-07-25', 'Belum Dibayar'),
(20, 'PJ0027', '0', 0, '2023-07-25', 'Belum Dibayar'),
(21, 'PJ0031', '4000', 1, '2023-07-25', 'Belum Dibayar'),
(22, 'PJ0033', '0', 0, '2023-07-25', 'Belum Dibayar'),
(23, 'PJ0032', '0', 0, '2023-07-25', 'Belum Dibayar'),
(24, 'PJ0030', '0', 0, '2023-07-25', 'Belum Dibayar'),
(25, 'PJ0029', '0', 0, '2023-07-25', 'Belum Dibayar'),
(26, 'PJ0028', '0', 0, '2023-07-25', 'Belum Dibayar'),
(27, 'PJ0034', '0', 0, '2023-07-30', 'Belum Dibayar'),
(28, 'PJ0035', '8000', 2, '2023-08-03', 'Belum Dibayar'),
(29, 'PJ0036', '8000', 2, '2023-08-05', 'Belum Dibayar'),
(30, 'PJ0037', '4000', 1, '2023-08-05', 'Belum Dibayar'),
(31, 'PJ0038', '4000', 1, '2023-08-05', 'Belum Dibayar'),
(32, 'PJ0039', '0', 0, '2023-08-05', 'Belum Dibayar'),
(33, 'PJ0040', '0', 0, '2023-08-05', 'Belum Dibayar'),
(34, 'PJ0041', '0', 0, '2023-08-05', 'Belum Dibayar'),
(35, 'PJ0042', '16000', 4, '2023-08-14', 'Belum Dibayar'),
(36, 'PJ0043', '4000', 1, '2023-08-14', 'Sudah Dibayar'),
(37, 'PJ0044', '37232000', 9308, '2024-01-22', 'Belum Dibayar'),
(38, 'PJ0046', '0', 0, '2024-01-22', 'Belum Dibayar'),
(39, 'PJ0047', '0', 0, '2024-02-19', 'Belum Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Pemrograman'),
(4, 'SENI'),
(6, 'Bahasa'),
(8, 'Komik'),
(9, 'Agama Islam'),
(10, 'Sejarah'),
(11, 'Ilmu Pengetahuan Alam'),
(12, 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_bergabung` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `anggota_id`, `user`, `pass`, `level`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `telepon`, `email`, `tgl_bergabung`, `foto`, `status`) VALUES
(1, 'AG001', 'rianto', '202cb962ac59075b964b07152d234b70', 'Petugas', 'Rianto', 'Martapura', '1999-05-10', 'Laki-Laki', 'Kayutangi', '081234567890', 'rianto@gmail.com', '2019-11-20', 'user_1630303496.png', 'Aktif'),
(2, 'AG002', 'violita', '202cb962ac59075b964b07152d234b70', 'Anggota', 'Violita', 'Banjarmasin', '2002-06-22', 'Perempuan', 'Sungai Andai', '6282191949376', 'silvaniviolita@gmail.com', '2021-08-30', 'user_1691970178.jpg', 'Aktif'),
(10, 'AG005', 'faisal', 'f4668288fdbf9773dd9779d412942905', 'Anggota', 'Faisal', 'Bekasi', '1998-02-04', 'Laki-Laki', 'Jl. HKSN', '0882121921', 'admin@gmail.com', '2023-07-29', 'user_1689218134.png', 'Aktif'),
(18, 'AG0011', 'Apipah', '202cb962ac59075b964b07152d234b70', 'Anggota', 'Apipah', 'Banjarmasin', '2003-05-15', 'Perempuan', 'Sungai Andai', '089615654524', 'apipah@gmail.com', '2023-08-14', 'user_1691978379.jpg', 'Aktif'),
(19, 'AG0019', 'Abay', '202cb962ac59075b964b07152d234b70', 'Anggota', 'Abay', 'Banjarmasin', '2003-05-14', 'Laki-Laki', 'Sungai Lulut', '08971465524', 'abay@gmail.com', '2023-08-14', 'user_1691978556.jpg', 'Aktif'),
(20, 'AG0020', 'Sulaiman', '202cb962ac59075b964b07152d234b70', 'Anggota', 'Sulaiman', 'Banjarmasin', '2006-07-03', 'Laki-Laki', 'Sungai Andai', '08985670942', 'sulaimanoke@gamail.com', '2023-08-14', 'user_1691978617.JPG', 'Aktif'),
(21, 'AG0021', 'risma yanti', '202cb962ac59075b964b07152d234b70', 'Anggota', 'Risma Yanti', 'Banjarmasin', '2007-04-07', 'Perempuan', 'Sungai Bakung', '084545464748', 'risma@gmail.com', '2023-08-14', 'user_1691978677.JPG', 'Aktif'),
(22, 'AG0022', 'nanang', '202cb962ac59075b964b07152d234b70', 'Anggota', 'nanang', 'Banjarmasin', '2008-05-17', 'Laki-Laki', 'Mulawarman', '08782347652', 'nanang@gmail.com', '2023-08-14', 'user_1691978843.png', 'Aktif'),
(23, 'AG0023', 'Maulida', '202cb962ac59075b964b07152d234b70', 'Anggota', 'Maulida', 'Banjarmasin', '2007-06-09', 'Perempuan', 'Sungai Lulut', '089798980854', 'Maulida@gmail.com', '2023-08-14', 'user_1691979040.png', 'Aktif'),
(24, 'AG0024', 'Zainudin', '202cb962ac59075b964b07152d234b70', 'Anggota', 'Zainudin', 'Banjarmasin', '2002-12-15', 'Laki-Laki', 'Sungai Rangas', '087515353486', 'Zainudin@gmail.com', '2023-08-14', 'user_1691979152.jpg', 'Aktif'),
(25, 'AG0025', 'Azizah', '202cb962ac59075b964b07152d234b70', 'Anggota', 'Azizah', 'Martapura', '2007-06-17', 'Perempuan', 'Banjarmasin', '081364374314', 'Azizah@gmail.com', '2023-08-14', 'user_1691979378.jpg', 'Aktif'),
(26, 'AG0026', 'kepsek', '8561863b55faf85b9ad67c52b3b851ac', 'Kepsek', 'Kepsek', 'Banjarmasin', '1998-02-03', 'Laki-Laki', 'Jl. HKSN', '0882121921', 'kepsek@gmail.com', '2023-08-20', 'user_1692496316.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengadaan`
--

CREATE TABLE `tbl_pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengadaan`
--

INSERT INTO `tbl_pengadaan` (`id_pengadaan`, `id_buku`, `tanggal_masuk`, `supplier`, `jumlah`) VALUES
(1, 8, '2023-07-21', 'PT ANU', 2),
(4, 9, '2023-07-23', 'PT RIZA', 6),
(5, 9, '2023-07-28', 'PT RIZA', 4),
(6, 11, '2023-06-21', 'PT Samudra', 30),
(7, 10, '2023-06-21', 'PT Samudra', 30),
(8, 12, '2022-12-02', 'Guru', 15);

--
-- Triggers `tbl_pengadaan`
--
DELIMITER $$
CREATE TRIGGER `pengadaan` AFTER INSERT ON `tbl_pengadaan` FOR EACH ROW UPDATE tbL_buku SET tbL_buku.jml=tbL_buku.jml+NEW.jumlah WHERE tbL_buku.id_buku=NEW.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `pinjam_id`, `anggota_id`, `buku_id`, `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali`) VALUES
(20, 'PJ001', 'AG002', 'BK0013', 'Di Kembalikan', '2023-07-14', 5, '2023-07-19', '2023-07-20'),
(21, 'PJ0021', 'AG005', 'BK0017', 'Di Kembalikan', '2023-07-15', 5, '2023-07-20', '2023-07-20'),
(22, 'PJ0022', 'AG0011', 'BK0015', 'Di Kembalikan', '2023-07-16', 5, '2023-07-21', '2023-07-23'),
(23, 'PJ0023', 'AG0019', 'BK0016', 'Di Kembalikan', '2023-07-17', 5, '2023-07-22', '2023-07-23'),
(24, 'PJ0024', 'AG0020', 'BK0014', 'Di Kembalikan', '2023-07-17', 5, '2023-07-22', '2023-07-23'),
(25, 'PJ0025', 'AG0021', 'BK0012', 'Di Kembalikan', '2023-07-18', 5, '2023-07-23', '2023-07-25'),
(26, 'PJ0026', 'AG0022', 'BK0010', 'Di Kembalikan', '2023-07-19', 5, '2023-07-24', '2023-07-25'),
(27, 'PJ0027', 'AG0023', 'BK008', 'Di Kembalikan', '2023-07-20', 5, '2023-07-25', '2023-07-25'),
(28, 'PJ0028', 'AG002', 'BK0016', 'Di Kembalikan', '2023-07-20', 5, '2023-07-25', '2023-07-25'),
(29, 'PJ0029', 'AG005', 'BK0016', 'Di Kembalikan', '2023-07-20', 5, '2023-07-25', '2023-07-25'),
(30, 'PJ0030', 'AG0024', 'BK009', 'Di Kembalikan', '2023-07-21', 5, '2023-07-26', '2023-07-25'),
(31, 'PJ0031', 'AG005', 'BK0014', 'Di Kembalikan', '2023-07-21', 3, '2023-07-24', '2023-07-25'),
(32, 'PJ0032', 'AG0025', 'BK0017', 'Di Kembalikan', '2023-07-23', 5, '2023-07-28', '2023-07-25'),
(33, 'PJ0033', 'AG002', 'BK0017', 'Di Kembalikan', '2023-07-23', 5, '2023-07-28', '2023-07-25'),
(34, 'PJ0034', 'AG002', 'BK0017', 'Di Kembalikan', '2023-07-25', 5, '2023-07-30', '2023-07-30'),
(35, 'PJ0035', 'AG005', 'BK0016', 'Di Kembalikan', '2023-07-27', 5, '2023-08-01', '2023-08-03'),
(36, 'PJ0036', 'AG0011', 'BK0015', 'Di Kembalikan', '2023-07-29', 5, '2023-08-03', '2023-08-05'),
(37, 'PJ0037', 'AG0019', 'BK0014', 'Di Kembalikan', '2023-07-30', 5, '2023-08-04', '2023-08-05'),
(38, 'PJ0038', 'AG002', 'BK0014', 'Di Kembalikan', '2023-07-30', 5, '2023-08-04', '2023-08-05'),
(39, 'PJ0039', 'AG0020', 'BK0013', 'Di Kembalikan', '2023-08-01', 5, '2023-08-06', '2023-08-05'),
(40, 'PJ0040', 'AG0021', 'BK009', 'Di Kembalikan', '2023-08-03', 5, '2023-08-08', '2023-08-05'),
(41, 'PJ0041', 'AG005', 'BK009', 'Di Kembalikan', '2023-08-03', 5, '2023-08-08', '2023-08-05'),
(42, 'PJ0042', 'AG002', 'BK0017', 'Di Kembalikan', '2023-08-05', 5, '2023-08-10', '2023-08-14'),
(43, 'PJ0043', 'AG005', 'BK0016', 'Di Kembalikan', '2023-08-06', 7, '2023-08-13', '2023-08-14'),
(45, 'PJ0044', 'AG0011', 'BK0016', 'Di Kembalikan', '2023-08-07', 7, '2023-08-14', '2024-01-22'),
(46, 'PJ0046', 'AG002', 'BK0016', 'Di Kembalikan', '2024-01-22', 6, '2024-01-28', '2024-01-22'),
(47, 'PJ0047', 'AG0011', 'BK0017', 'Di Kembalikan', '2024-02-19', 2, '2024-02-21', '2024-02-19'),
(48, 'PJ0048', 'AG002', 'BK0012', 'Dipinjam', '2024-02-20', 2, '2024-02-22', '0');

--
-- Triggers `tbl_pinjam`
--
DELIMITER $$
CREATE TRIGGER `kurangi_buku` AFTER INSERT ON `tbl_pinjam` FOR EACH ROW UPDATE tbL_buku SET tbL_buku.jml=tbL_buku.jml-1 WHERE tbL_buku.buku_id=NEW.buku_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengembalian` AFTER UPDATE ON `tbl_pinjam` FOR EACH ROW IF NEW.status = 'Di Kembalikan' THEN
        UPDATE tbl_buku SET tbl_buku.jml = tbl_buku.jml + 1 
        WHERE NEW.buku_id = tbl_buku.buku_id;
    END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'Rak Buku 1'),
(2, 'Rak Buku 2'),
(3, 'Rak Buku 3'),
(4, 'Rak Buku 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `tbl_anggaran`
--
ALTER TABLE `tbl_anggaran`
  ADD PRIMARY KEY (`id_anggaran`);

--
-- Indexes for table `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  ADD PRIMARY KEY (`id_biaya_denda`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tbl_pengadaan`
--
ALTER TABLE `tbl_pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_anggaran`
--
ALTER TABLE `tbl_anggaran`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  MODIFY `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_pengadaan`
--
ALTER TABLE `tbl_pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
