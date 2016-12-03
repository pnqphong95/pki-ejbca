-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2016 at 01:12 PM
-- Server version: 5.7.10-log
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luanvan`
--

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `gv_id` int(10) UNSIGNED NOT NULL,
  `gv_mscb` varchar(15) NOT NULL,
  `gv_matkhau` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gv_ten` varchar(255) NOT NULL,
  `gv_email` varchar(100) NOT NULL,
  `gv_passchuky` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`gv_id`, `gv_mscb`, `gv_matkhau`, `gv_ten`, `gv_email`, `gv_passchuky`) VALUES
(1, '001548', 'c92f1d1f2619172bf87a12e5915702a6', 'Nguyễn Hoàng Minh', 'nhminh@gmail.com', 'c92f1d1f2619172bf87a12e5915702a6'),
(2, '001589', 'd7bbecd663df94d9ac32a626c29f7b22', 'Nguyễn Võ Khả Duyên', 'kduyen@gmail.com', 'd7bbecd663df94d9ac32a626c29f7b22'),
(3, '001534', '11967d5e9addc5416ea9224eee0e91fc', 'Tống Gia Huy', 'ghuy@gmail.com', '11967d5e9addc5416ea9224eee0e91fc'),
(4, '001572', '968855132dc5d0eb2ed7c0fc4ef3421e', 'Huỳnh Trọng Hiếu', 'thieu@gmail.com', '968855132dc5d0eb2ed7c0fc4ef3421e'),
(5, '000111', '21232f297a57a5a743894a0e4a801fc3', 'Quản lý điểm', 'admin@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`gv_id`),
  ADD UNIQUE KEY `gv_mscb` (`gv_mscb`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `gv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
