-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2016 at 11:15 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giadv_local`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbkkdvvtkhac`
--

CREATE TABLE `cbkkdvvtkhac` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbkkdvvtxb`
--

CREATE TABLE `cbkkdvvtxb` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbkkdvvtxk`
--

CREATE TABLE `cbkkdvvtxk` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cbkkdvvtxk`
--

INSERT INTO `cbkkdvvtxk` (`id`, `masothue`, `masokk`, `socv`, `ngaynhap`, `socvlk`, `ngaynhaplk`, `ngayhieuluc`, `ttnguoinop`, `ngaynhan`, `sohsnhan`, `ngaychuyen`, `lydo`, `trangthai`, `uudai`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, '4200284469', '4200284469.1464150108', '001/CTHH', '2016-03-02', '', '0000-00-00', '2016-03-31', 'dsadsadsad', '2016-03-24', '01', '2016-05-25 11:21:57', NULL, 'Đang công bố', 'sdấd', 'sấdsađsad', '2016-05-25 04:21:48', '2016-05-25 04:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `cbkkdvvtxtx`
--

CREATE TABLE `cbkkdvvtxtx` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbkkgdvlt`
--

CREATE TABLE `cbkkgdvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idkk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cskddvlt`
--

CREATE TABLE `cskddvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tencskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaihang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachikd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmdvvtkhac`
--

CREATE TABLE `dmdvvtkhac` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmdvvtxb`
--

CREATE TABLE `dmdvvtxb` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtluot` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtthang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmdvvtxk`
--

CREATE TABLE `dmdvvtxk` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmdvvtxk`
--

INSERT INTO `dmdvvtxk` (`id`, `masothue`, `madichvu`, `loaixe`, `diemdau`, `diemcuoi`, `tendichvu`, `qccl`, `dvt`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, '4200284469', 'DVXK42002844691464150010', 'sdsadsad', 'Mỹ Đinh', 'Hạ Long', 'dsadsad', 'dsadsadsa', 'dsadsadsa', 'dsadsadsadsa', '2016-05-25 04:20:10', '2016-05-25 04:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `dmdvvtxtx`
--

CREATE TABLE `dmdvvtxtx` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dndvlt`
--

CREATE TABLE `dndvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `tendn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachidn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teldn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faxdn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidknopthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucdanhky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dndvlt`
--

INSERT INTO `dndvlt` (`id`, `tendn`, `masothue`, `diachidn`, `teldn`, `faxdn`, `noidknopthue`, `chucdanhky`, `nguoiky`, `diadanh`, `created_at`, `updated_at`) VALUES
(1, 'Công ty TNHH Thành Đạt', '4200284469', '11 đường 23/10', '3818916', '04 397865432', 'Cục Thuế Khánh Hòa', 'Tổng giám đốc', 'Trần Thị Thùy Nga', 'Khánh Hòa', '2016-05-17 23:46:44', '2016-05-18 15:26:16'),
(2, 'Công ty TNHH Minh Châu', '012345678', 'Hoàng Mai - Hà Nội', '043.9876543', '', '', '', '', '', '2016-05-21 01:50:17', '2016-05-21 01:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `donvidvvt`
--

CREATE TABLE `donvidvvt` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendonvi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucdanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dknopthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvxk` tinyint(1) NOT NULL,
  `dvxb` tinyint(1) NOT NULL,
  `dvxtx` tinyint(1) NOT NULL,
  `dvk` tinyint(1) NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvcc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donvidvvt`
--

INSERT INTO `donvidvvt` (`id`, `masothue`, `tendonvi`, `diachi`, `dienthoai`, `giayphepkd`, `fax`, `diadanh`, `chucdanh`, `nguoiky`, `dknopthue`, `dvxk`, `dvxb`, `dvxtx`, `dvk`, `ghichu`, `dvcc`, `created_at`, `updated_at`) VALUES
(1, '4200284469', 'Công ty dịch vụ vận tải Hải Hà', 'Số 01/30 Đường Trường Trinh- Hai Bà Trưng - Hà Nội', '04 397865432', 'Giấy chứng nhận KD số 01/2016 do Sở Tài Chính cấp', '04 397865432', 'Hà Nội', 'Tổng giám đốc', 'Trần Thị Thùy Nga', 'Cục Thuế Khánh Hòa', 0, 0, 0, 0, NULL, '{"dvxk":{"index":"1"},"dvxb":{"index":"1"},"dvxch":{"index":"1"}}', '2016-05-17 23:45:25', '2016-05-24 04:15:56'),
(2, '987654321', 'TNHH Cuộc Sống', 'Liên Ninh - Thanh Trì - Hà Nội', '098765432', 'Giấy chứng nhận kinh doanh số 003/2013 Do Sở Tài Chính cấp', '098765432', 'Hà Nội', 'Giám đốc', 'Nguyễn Thị Minh Tuyết', 'Cục Thuế Thanh Trì', 0, 0, 0, 0, NULL, '{"dvxk":{"index":"1"},"dvxb":{"index":"1"}}', '2016-05-24 07:29:35', '2016-05-24 07:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `general-configs`
--

CREATE TABLE `general-configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `maqhns` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendonvi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teldv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thutruong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ketoan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoilapbieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namhethong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttlh` text COLLATE utf8_unicode_ci,
  `sodvlt` text COLLATE utf8_unicode_ci,
  `sodvvt` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general-configs`
--

INSERT INTO `general-configs` (`id`, `maqhns`, `tendonvi`, `diachi`, `teldv`, `thutruong`, `ketoan`, `nguoilapbieu`, `namhethong`, `ttlh`, `sodvlt`, `sodvvt`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sở Tài Chính Khánh Hòa', NULL, NULL, NULL, NULL, NULL, '2016', '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtkhac`
--

CREATE TABLE `kkdvvtkhac` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtkhacct`
--

CREATE TABLE `kkdvvtkhacct` (
  `id` int(10) UNSIGNED NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `giahl` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtkhacctdf`
--

CREATE TABLE `kkdvvtkhacctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `giahl` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxb`
--

CREATE TABLE `kkdvvtxb` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxbct`
--

CREATE TABLE `kkdvvtxbct` (
  `id` int(10) UNSIGNED NOT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtluot` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtthang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakkluot` double DEFAULT NULL,
  `giakklkluot` double DEFAULT NULL,
  `giakkthang` double DEFAULT NULL,
  `giakklkthang` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxbctdf`
--

CREATE TABLE `kkdvvtxbctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtluot` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtthang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakkluot` double DEFAULT NULL,
  `giakklkluot` double DEFAULT NULL,
  `giakkthang` double DEFAULT NULL,
  `giakklkthang` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxk`
--

CREATE TABLE `kkdvvtxk` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kkdvvtxk`
--

INSERT INTO `kkdvvtxk` (`id`, `masothue`, `masokk`, `socv`, `ngaynhap`, `socvlk`, `ngaynhaplk`, `ngayhieuluc`, `ttnguoinop`, `ngaynhan`, `sohsnhan`, `ngaychuyen`, `lydo`, `trangthai`, `uudai`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, '4200284469', '4200284469.1464150108', '001/CTHH', '2016-03-02', '', '0000-00-00', '2016-03-31', 'dsadsadsad', '2016-03-24', '01', '2016-05-25 11:21:57', NULL, 'Duyệt', 'sdấd', 'sấdsađsad', '2016-05-25 04:21:48', '2016-05-25 04:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxkct`
--

CREATE TABLE `kkdvvtxkct` (
  `id` int(10) UNSIGNED NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `giahl` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kkdvvtxkct`
--

INSERT INTO `kkdvvtxkct` (`id`, `masokk`, `madichvu`, `loaixe`, `diemdau`, `diemcuoi`, `tendichvu`, `qccl`, `dvt`, `giakk`, `giakklk`, `giahl`, `ghichu`, `thuevat`, `created_at`, `updated_at`) VALUES
(1, '4200284469.1464150108', 'DVXK42002844691464150010', 'sdsadsad', 'Mỹ Đinh', 'Hạ Long', 'dsadsad', 'dsadsadsa', 'dsadsadsa', 500000, 0, 10000, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxkctdf`
--

CREATE TABLE `kkdvvtxkctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `giahl` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kkdvvtxkctdf`
--

INSERT INTO `kkdvvtxkctdf` (`id`, `masokk`, `masothue`, `madichvu`, `loaixe`, `diemdau`, `diemcuoi`, `tendichvu`, `qccl`, `dvt`, `giakk`, `giakklk`, `giahl`, `ghichu`, `thuevat`, `created_at`, `updated_at`) VALUES
(2, NULL, '4200284469', 'DVXK42002844691464150010', 'sdsadsad', 'Mỹ Đinh', 'Hạ Long', 'dsadsad', 'dsadsadsa', 'dsadsadsa', 0, 500000, 0, NULL, NULL, '2016-05-26 08:43:30', '2016-05-26 08:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxtx`
--

CREATE TABLE `kkdvvtxtx` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhaplk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uudai` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxtxct`
--

CREATE TABLE `kkdvvtxtxct` (
  `id` int(10) UNSIGNED NOT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdvvtxtxctdf`
--

CREATE TABLE `kkdvvtxtxctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masokk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `giakklk` double DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgdvlt`
--

CREATE TABLE `kkgdvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgdvltct`
--

CREATE TABLE `kkgdvltct` (
  `id` int(10) UNSIGNED NOT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maloaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `sohieu` text COLLATE utf8_unicode_ci,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiakk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgdvltctdf`
--

CREATE TABLE `kkgdvltctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maloaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `sohieu` text COLLATE utf8_unicode_ci,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiakk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_05_11_141911_create_users_table', 1),
('2016_05_11_145830_create_dndvlt_table', 1),
('2016_05_11_171549_create_cskddvlt_table', 1),
('2016_05_11_175237_create_ttphong_table', 1),
('2016_05_11_190543_create_ttcskddvlt_table', 1),
('2016_05_12_084832_create_dmdvvtxk_table', 1),
('2016_05_12_084851_create_kkdvvtxk_table', 1),
('2016_05_12_084900_create_kkdvvtxkct_table', 1),
('2016_05_12_101221_create_donvidvvt_table', 1),
('2016_05_12_101616_create_dmdvvtxb_table', 1),
('2016_05_12_101629_create_kkdvvtxb_table', 1),
('2016_05_12_101638_create_kkdvvtxbct_table', 1),
('2016_05_12_102628_create_dmdvvtxtx_table', 1),
('2016_05_12_102651_create_kkdvvtxtx_table', 1),
('2016_05_12_102701_create_kkdvvtxtxct_table', 1),
('2016_05_12_104427_create_dmdvvtkhac_table', 1),
('2016_05_12_104445_create_kkdvvtkhac_table', 1),
('2016_05_12_104453_create_kkdvvtkhacct_table', 1),
('2016_05_12_143559_create_kkgdvlt_table', 1),
('2016_05_12_165437_create_kkgdvltct_table', 1),
('2016_05_12_165936_create_kkgdvltctdf_table', 1),
('2016_05_13_151803_create_general-configs_table', 1),
('2016_05_13_165328_create_cbkkgdvlt_table', 1),
('2016_05_19_155134_create_kkdvvtxkctdf_table', 1),
('2016_05_19_155151_create_kkdvvtxbctdf_table', 1),
('2016_05_19_155213_create_kkdvvtxtxctdf_table', 1),
('2016_05_19_155230_create_kkdvvtkhacctdf_table', 1),
('2016_05_20_081755_create_cbkkdvvtxk_table', 1),
('2016_05_20_081807_create_cbkkdvvtxb_table', 1),
('2016_05_20_081819_create_cbkkdvvtxtx_table', 1),
('2016_05_20_081831_create_cbkkdvvtkhac_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ttcskddvlt`
--

CREATE TABLE `ttcskddvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `maloaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `sohieu` text COLLATE utf8_unicode_ci,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ttphong`
--

CREATE TABLE `ttphong` (
  `id` int(10) UNSIGNED NOT NULL,
  `maloaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `sohieu` text COLLATE utf8_unicode_ci,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sadmin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pldv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `phone`, `email`, `status`, `maxa`, `mahuyen`, `level`, `sadmin`, `permission`, `pldv`, `created_at`, `updated_at`) VALUES
(1, 'Minh Trần', 'minhtran', '107e8cf7f2b4531f6b2ff06dbcf94e10', NULL, NULL, 'Kích hoạt', NULL, NULL, 'T', 'ssa', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Công ty dịch vụ vận tải Hải Hà', 'haiha', 'e10adc3949ba59abbe56e057f20f883e', '04 397865432', NULL, 'Kích hoạt', NULL, '4200284469', 'H', NULL, '{"dvvt":{"index":"1","create":"1","edit":"1","delete":"1","approve":"1"}}', 'DVVT', '2016-05-17 23:45:25', '2016-05-23 08:39:01'),
(3, 'Công ty TNHH Thành Đạt', 'thanhdat', 'e10adc3949ba59abbe56e057f20f883e', '3818916', NULL, 'Kích hoạt', NULL, '4200284469', 'H', NULL, '{"dvlt":{"index":"1","create":"1","edit":"1","delete":"1","approve":"1"}}', 'DVLT', '2016-05-17 23:46:44', '2016-05-23 08:39:14'),
(4, 'Sở Tài Chính Khánh Hòa', 'stckhanhhoa', 'e10adc3949ba59abbe56e057f20f883e', '04 397865432', NULL, 'Kích hoạt', NULL, '', 'T', NULL, NULL, '', '2016-05-17 23:45:25', '2016-05-17 23:45:25'),
(5, 'Công ty TNHH Minh Châu', 'minhchau', 'e10adc3949ba59abbe56e057f20f883e', '043.9876543', NULL, 'Kích hoạt', NULL, '012345678', 'H', NULL, '{"dvlt":{"index":1,"create":1,"edit":1,"delete":1,"approve":1},"dvvt":{"index":0,"create":0,"edit":0,"delete":0,"approve":0}}', 'DVLT', '2016-05-21 01:50:17', '2016-05-21 01:50:17'),
(6, 'TNHH Cuộc Sống', 'cuocsong', 'e10adc3949ba59abbe56e057f20f883e', '098765432', NULL, 'Kích hoạt', NULL, '987654321', 'H', NULL, '{"dvlt":{"index":0,"create":0,"edit":0,"delete":0,"approve":0},"dvvt":{"index":1,"create":1,"edit":1,"delete":1,"approve":1}}', 'DVVT', '2016-05-24 07:29:35', '2016-05-24 07:29:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cbkkdvvtkhac`
--
ALTER TABLE `cbkkdvvtkhac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbkkdvvtxb`
--
ALTER TABLE `cbkkdvvtxb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbkkdvvtxk`
--
ALTER TABLE `cbkkdvvtxk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbkkdvvtxtx`
--
ALTER TABLE `cbkkdvvtxtx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbkkgdvlt`
--
ALTER TABLE `cbkkgdvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cskddvlt`
--
ALTER TABLE `cskddvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmdvvtkhac`
--
ALTER TABLE `dmdvvtkhac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmdvvtxb`
--
ALTER TABLE `dmdvvtxb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmdvvtxk`
--
ALTER TABLE `dmdvvtxk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmdvvtxtx`
--
ALTER TABLE `dmdvvtxtx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dndvlt`
--
ALTER TABLE `dndvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donvidvvt`
--
ALTER TABLE `donvidvvt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general-configs`
--
ALTER TABLE `general-configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtkhac`
--
ALTER TABLE `kkdvvtkhac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtkhacct`
--
ALTER TABLE `kkdvvtkhacct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtkhacctdf`
--
ALTER TABLE `kkdvvtkhacctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxb`
--
ALTER TABLE `kkdvvtxb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxbct`
--
ALTER TABLE `kkdvvtxbct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxbctdf`
--
ALTER TABLE `kkdvvtxbctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxk`
--
ALTER TABLE `kkdvvtxk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxkct`
--
ALTER TABLE `kkdvvtxkct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxkctdf`
--
ALTER TABLE `kkdvvtxkctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxtx`
--
ALTER TABLE `kkdvvtxtx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxtxct`
--
ALTER TABLE `kkdvvtxtxct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdvvtxtxctdf`
--
ALTER TABLE `kkdvvtxtxctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgdvlt`
--
ALTER TABLE `kkgdvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgdvltct`
--
ALTER TABLE `kkgdvltct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgdvltctdf`
--
ALTER TABLE `kkgdvltctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttcskddvlt`
--
ALTER TABLE `ttcskddvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttphong`
--
ALTER TABLE `ttphong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cbkkdvvtkhac`
--
ALTER TABLE `cbkkdvvtkhac`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbkkdvvtxb`
--
ALTER TABLE `cbkkdvvtxb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbkkdvvtxk`
--
ALTER TABLE `cbkkdvvtxk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cbkkdvvtxtx`
--
ALTER TABLE `cbkkdvvtxtx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbkkgdvlt`
--
ALTER TABLE `cbkkgdvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cskddvlt`
--
ALTER TABLE `cskddvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmdvvtkhac`
--
ALTER TABLE `dmdvvtkhac`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmdvvtxb`
--
ALTER TABLE `dmdvvtxb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmdvvtxk`
--
ALTER TABLE `dmdvvtxk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dmdvvtxtx`
--
ALTER TABLE `dmdvvtxtx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dndvlt`
--
ALTER TABLE `dndvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `donvidvvt`
--
ALTER TABLE `donvidvvt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `general-configs`
--
ALTER TABLE `general-configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kkdvvtkhac`
--
ALTER TABLE `kkdvvtkhac`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtkhacct`
--
ALTER TABLE `kkdvvtkhacct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtkhacctdf`
--
ALTER TABLE `kkdvvtkhacctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxb`
--
ALTER TABLE `kkdvvtxb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxbct`
--
ALTER TABLE `kkdvvtxbct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxbctdf`
--
ALTER TABLE `kkdvvtxbctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxk`
--
ALTER TABLE `kkdvvtxk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kkdvvtxkct`
--
ALTER TABLE `kkdvvtxkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kkdvvtxkctdf`
--
ALTER TABLE `kkdvvtxkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kkdvvtxtx`
--
ALTER TABLE `kkdvvtxtx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxtxct`
--
ALTER TABLE `kkdvvtxtxct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdvvtxtxctdf`
--
ALTER TABLE `kkdvvtxtxctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgdvlt`
--
ALTER TABLE `kkgdvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgdvltct`
--
ALTER TABLE `kkgdvltct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgdvltctdf`
--
ALTER TABLE `kkgdvltctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ttcskddvlt`
--
ALTER TABLE `ttcskddvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ttphong`
--
ALTER TABLE `ttphong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
