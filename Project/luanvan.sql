-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2016 at 01:21 PM
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
(5, '00000', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `hocphan`
--

CREATE TABLE `hocphan` (
  `hp_id` int(10) UNSIGNED NOT NULL,
  `hp_ma` varchar(100) NOT NULL,
  `hp_ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hocphan`
--

INSERT INTO `hocphan` (`hp_id`, `hp_ma`, `hp_ten`) VALUES
(1, 'CT101', 'Lập trình căn bản A '),
(2, 'CT102', 'Toán rời rạc 1'),
(3, 'CT103', 'Cấu trúc dữ liệu'),
(4, 'CT104', 'Kiến trúc máy tính'),
(5, 'CT106', 'Hệ cơ sở dữ liệu'),
(6, 'CT107', 'Hệ điều hành'),
(7, 'CT109', 'Phân tích và thiết kế hệ thống TT'),
(8, 'CT110', 'Hệ quản trị cơ sở dữ liệu'),
(9, 'CT112', 'Mạng máy tính'),
(10, 'CT113', 'Nhập môn công nghệ phần mềm '),
(11, 'CT114', 'Lập trình hướng đối tượng C++'),
(12, 'CT116', 'Chuyên đề ngôn ngữ lập trình 1'),
(13, 'CT117', 'Chuyên đề ngôn ngữ lập trình 2'),
(14, 'CT118', 'Chuyên đề ngôn ngữ lập trình 3'),
(15, 'CT119', 'Toán rời rạc 2 '),
(16, 'CT120', 'Phân tích và thiết kế thuật toán'),
(17, 'CT121', 'Tin học lý thuyết'),
(18, 'CT123', 'Quy hoạch tuyến tính - CNTT'),
(19, 'CT125', 'Mô phỏng'),
(20, 'CT126', 'Lý thuyết xếp hàng'),
(21, 'CT127', 'Lý thuyết thông tin'),
(22, 'CT128', 'Kỹ thuật đồ hoạ - CNTT'),
(23, 'CT144', 'Xử lý tín hiệu số'),
(24, 'CT158', 'Nguyên lý ngôn ngữ lập trình'),
(25, 'CT165', 'Ngôn ngữ mô hình hóa UML'),
(26, 'CT167', 'Ngôn ngữ lập trình Java'),
(27, 'CT170', 'Chuyên đề ngôn ngữ lập trình KHMT'),
(28, 'CT302', 'Phát triển phần mềm mã nguồn mở'),
(29, 'CT303', 'Phát triển hệ thống thông tin'),
(30, 'CT304', 'Giao diện người - máy'),
(31, 'CT309', 'Quản lý dự án tin học'),
(32, 'CT311', 'Phương pháp NCKH'),
(33, 'CT312', 'Khai khoáng dữ liệu'),
(34, 'CT313', 'An toàn & bảo mật thông tin'),
(35, 'CT316', 'Xử lý ảnh'),
(36, 'CT317', 'Lập trình nhúng cơ bản'),
(37, 'CT319', 'Lập trình mạng'),
(38, 'CT321', 'Phát triển hệ thống thương mại Đ.Tử'),
(39, 'CT323', 'Chuyên đề về một hệ quản trị CSDL'),
(40, 'CT329', 'Lập trình cho các thiết bị di động'),
(41, 'CT332', 'Trí tuệ nhân tạo'),
(42, 'CT333', 'Quản trị mạng'),
(43, 'CT334', 'Quản trị mạng trên Linux'),
(44, 'CT335', 'Thiết kế & cài đặt mạng'),
(45, 'CT336', 'Truyền thông đa phương tiện'),
(46, 'CT337', 'Đánh giá hiệu năng mạng'),
(47, 'CT338', 'Mạng không dây & di động'),
(48, 'CT339', 'Các hệ thống thông minh'),
(49, 'CT340', 'Hệ nhóm máy tính'),
(50, 'CT341', 'Xây dựng dịch vụ mạng'),
(51, 'CT343', 'Các hệ thống phân tán'),
(52, 'CT344', 'Giải quyết sự cố mạng'),
(53, 'CT349', 'Thương mại điện tử -CNTT'),
(54, 'CT428', 'Lập trình Web'),
(55, 'CT429', 'Thực tập thực tế - Tin học'),
(56, 'CT430', 'Phân tích hệ thống hướng đối tượng'),
(57, 'CT431', 'Hệ quản trị CSDL đa phương tiện'),
(58, 'CT432', 'Tính toán lưới'),
(59, 'CT434', 'An toàn hệ thống & an ninh mạng'),
(60, 'CT439', 'Niên luận Mạng máy tính và truyền thông'),
(61, 'CT529', 'Luận văn tốt nghiệp - TT&MMT ');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `lop_id` int(10) UNSIGNED NOT NULL,
  `lop_ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`lop_id`, `lop_ten`) VALUES
(1, 'DI0897A2'),
(2, 'TC11Z5A1'),
(3, 'TL1101A1'),
(4, 'CP1296C1'),
(5, 'XH11W9A2'),
(7, 'DI1276A2'),
(11, 'DI12Y9A2'),
(12, 'KH13W8C2');

-- --------------------------------------------------------

--
-- Table structure for table `lophocphan`
--

CREATE TABLE `lophocphan` (
  `lhp_id` int(10) UNSIGNED NOT NULL,
  `hp_id` int(10) UNSIGNED NOT NULL,
  `gv_id` int(10) UNSIGNED NOT NULL,
  `lhp_nhom` varchar(5) NOT NULL,
  `sv_id` int(10) UNSIGNED NOT NULL,
  `lhp_diem` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lophocphan`
--

INSERT INTO `lophocphan` (`lhp_id`, `hp_id`, `gv_id`, `lhp_nhom`, `sv_id`, `lhp_diem`) VALUES
(1, 1, 1, '01', 1, 5),
(2, 1, 1, '01', 2, 5),
(3, 1, 1, '01', 3, 7.5),
(5, 1, 1, '01', 4, 6),
(6, 1, 1, '01', 6, 6.7),
(7, 1, 1, '01', 7, 9),
(8, 1, 1, '01', 8, 8),
(9, 1, 1, '01', 9, 8.5),
(10, 1, 1, '01', 10, 7),
(11, 1, 1, '01', 11, 4),
(12, 1, 1, '01', 12, 7),
(13, 1, 1, '01', 13, 8),
(14, 1, 1, '01', 14, 7),
(15, 1, 1, '01', 15, 9),
(16, 10, 2, '03', 22, 8),
(17, 10, 2, '03', 28, 5),
(18, 10, 2, '03', 45, 8),
(19, 10, 2, '03', 33, 4),
(20, 10, 2, '03', 27, 9),
(21, 44, 3, '02', 69, 8),
(22, 44, 3, '02', 68, 8),
(23, 50, 2, '01', 32, 6),
(24, 58, 2, '04', 46, 7),
(25, 18, 1, '04', 29, 6.5),
(26, 38, 1, '01', 64, 5),
(27, 36, 4, '03', 61, 8),
(28, 49, 4, '02', 46, 7),
(29, 10, 2, '03', 65, 7),
(30, 10, 2, '03', 28, 7.5),
(31, 10, 2, '03', 69, 8),
(32, 10, 2, '03', 38, 8.5),
(33, 10, 2, '03', 15, 9),
(34, 10, 2, '03', 13, 8),
(35, 10, 2, '03', 63, 7),
(36, 10, 2, '03', 54, 6.5),
(37, 10, 2, '03', 2, 5),
(38, 10, 2, '03', 9, 8.5),
(39, 10, 2, '03', 26, 9),
(40, 10, 2, '03', 67, 5),
(41, 50, 2, '01', 1, 5),
(42, 50, 2, '01', 14, 7),
(43, 50, 2, '01', 37, 6.5),
(44, 50, 2, '01', 47, 8),
(45, 50, 2, '01', 4, 6),
(46, 50, 2, '01', 5, 8.5),
(47, 50, 2, '01', 6, 6.7),
(48, 50, 2, '01', 7, 9),
(49, 50, 2, '01', 8, 8),
(50, 50, 2, '01', 8, 8),
(51, 50, 2, '01', 9, 8.5),
(52, 50, 2, '01', 10, 7),
(53, 50, 2, '01', 11, 4),
(54, 50, 2, '01', 12, 7),
(55, 58, 2, '04', 69, 8),
(56, 58, 2, '04', 68, 8),
(57, 58, 2, '04', 67, 5),
(58, 58, 2, '04', 66, 8.5),
(59, 58, 2, '04', 65, 7),
(60, 58, 2, '04', 64, 5),
(61, 58, 2, '04', 15, 9),
(62, 58, 2, '04', 61, 8),
(63, 58, 2, '04', 59, 6.5),
(64, 58, 2, '04', 58, 6.5),
(65, 58, 2, '04', 56, 8),
(66, 58, 2, '04', 55, 9),
(67, 58, 2, '04', 54, NULL),
(70, 18, 1, '04', 60, 9),
(71, 18, 1, '04', 59, 6.5),
(72, 18, 1, '04', 49, 5.5),
(73, 18, 1, '04', 57, 8.5),
(74, 18, 1, '04', 69, 8),
(75, 18, 1, '04', 38, 8.5),
(76, 18, 1, '04', 32, 6),
(77, 18, 1, '04', 25, 8),
(78, 18, 1, '04', 29, 6.5),
(79, 18, 1, '04', 36, 8.5),
(80, 18, 1, '04', 13, 8),
(81, 18, 1, '04', 53, 6),
(82, 38, 1, '01', 65, 7),
(83, 38, 1, '01', 64, 5),
(84, 38, 1, '01', 63, 7),
(85, 38, 1, '01', 62, 9),
(86, 38, 1, '01', 61, 8),
(87, 38, 1, '01', 61, 8),
(88, 38, 1, '01', 58, 6.5),
(89, 38, 1, '01', 48, 8),
(90, 38, 1, '01', 33, 4),
(91, 38, 1, '01', 25, 8),
(92, 38, 1, '01', 12, 7),
(93, 38, 1, '01', 24, 8),
(94, 38, 1, '01', 8, 8),
(95, 38, 1, '01', 33, 4),
(96, 44, 3, '02', 6, 4),
(97, 44, 3, '02', 15, 8.5),
(98, 44, 3, '02', 31, 7),
(99, 44, 3, '02', 38, 8.5),
(100, 44, 3, '02', 11, 6),
(101, 44, 3, '02', 23, 8.5),
(102, 44, 3, '02', 15, 7),
(103, 44, 3, '02', 23, 6.5),
(104, 44, 3, '02', 30, 7),
(105, 44, 3, '02', 35, 8.5),
(106, 44, 3, '02', 45, 5),
(107, 44, 3, '02', 25, 6.5);

-- --------------------------------------------------------

--
-- Table structure for table `quyenhocphan`
--

CREATE TABLE `quyenhocphan` (
  `qhp_id` int(10) UNSIGNED NOT NULL,
  `gv_id` int(10) UNSIGNED NOT NULL,
  `hp_id` int(10) UNSIGNED NOT NULL,
  `qhp_quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quyenhocphan`
--

INSERT INTO `quyenhocphan` (`qhp_id`, `gv_id`, `hp_id`, `qhp_quyen`) VALUES
(1, 1, 1, 1),
(2, 1, 18, 1),
(7, 1, 38, 1),
(8, 2, 10, 1),
(9, 2, 50, 1),
(10, 2, 58, 1),
(15, 4, 36, 1),
(16, 4, 49, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `sv_id` int(10) UNSIGNED NOT NULL,
  `sv_mssv` varchar(15) NOT NULL,
  `sv_holot` varchar(255) NOT NULL,
  `sv_ten` varchar(50) NOT NULL,
  `sv_nu` varchar(2) NOT NULL,
  `lop_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`sv_id`, `sv_mssv`, `sv_holot`, `sv_ten`, `sv_nu`, `lop_id`) VALUES
(1, 'B1501399', 'Lê Đông', 'Bình', '', 1),
(2, 'B1407865', 'Ngô Mỹ', 'Dung', 'N', 3),
(3, 'B1308732', 'Cao Hoàng', 'Chuyện', '', 4),
(4, 'B1209878', 'Ngô Minh', 'Khoa', '', 2),
(5, 'B1408795', 'Hà Thái Minh', 'Lộc', '', 3),
(6, 'B1238928', 'Quách Tấn', 'Phát', '', 7),
(7, 'B1309145', 'Nguyễn Xuân', 'Quang', '', 11),
(8, 'B1201276', 'Phạm Hoàng', 'Ân', '', 4),
(9, 'B1250732', 'Nguyễn Thanh', 'Danh', '', 3),
(10, 'B1307612', 'Mai Thị Bảo', 'Luyến', 'N', 4),
(11, 'B1406543', 'Huỳnh Hữu', 'Khiêm', '', 4),
(12, 'B1308743', 'Trần Văn', 'Chính', '', 2),
(13, 'B1204526', 'Trần Anh', 'Tuấn', '', 11),
(14, 'B1307534', 'Trần Thanh', 'Mai', '', 1),
(15, 'B1508765', 'Trần Thị Thu', 'Thủy', 'N', 7),
(22, 'B1309105', 'Trần Khải', 'Anh', '', 3),
(23, 'B1240976', 'Phan Như', 'Thảo', 'N', 11),
(24, 'B1240876', 'Trần Chí', 'Kha', '', 5),
(25, 'B1306754', 'Nguyễn Văn', 'Phúc', '', 7),
(26, 'B1568762', 'Nguyễn Thị Lan', 'Phương', 'N', 4),
(27, 'C1307653', 'Lê Hà', 'Nam', '', 12),
(28, 'C1308752', 'Trần Minh', 'Sơn', '', 3),
(29, 'C1203456', 'Nguyễn Quốc', 'Bảo', '', 7),
(30, 'C1509832', 'Trần Chí', 'Dũng', '', 1),
(31, 'C1509761', 'Phan Thị', 'Hà', 'N', 12),
(32, 'B1404522', 'Ngô Kỳ', 'Anh', '', 11),
(33, 'B1500994', 'Bùi Nhật', 'Hào', '', 12),
(34, 'B1500926', 'Nguyễn Bá', 'Nhật', '', 2),
(35, 'C1408712', 'Trần Nguyễn Phương', 'Uyên', 'N', 5),
(36, 'C1206712', 'Trương Khánh', 'Thoại', '', 5),
(37, 'C1401278', 'Lê Khánh', 'Vy', 'N', 2),
(38, 'C1300136', 'Phạm Minh', 'Đương', '', 1),
(39, 'C1530514', 'Nguyễn Thanh', 'Điền', '', 12),
(40, 'B1506108', 'Bùi Hồ Gia', 'Bảo', '', 2),
(41, 'C1300156', 'Quách Thị Tiểu', 'Nguyệt', 'N', 7),
(42, 'B1205664', 'Phạm Quốc', 'Sử', '', 5),
(43, 'C1300543', 'Nguyễn Hồ Kim Yến', 'Oanh', 'N', 11),
(44, 'C1500657', 'Thạch Thị Chal', 'Thi', 'N', 1),
(45, 'B1504224', 'Bùi Minh', 'Tân', '', 12),
(46, 'B1409489', 'Phạm Duy', 'Tuấn', '', 11),
(47, 'C1409125', 'Đặng Văn', 'Điều', '', 2),
(48, 'B1504896', 'Phan Thành', 'Đạt', '', 5),
(49, 'C1200543', 'Lưu Duyệt', 'An', '', 7),
(50, 'C1404532', 'Nguyễn Khánh', 'Duyên', '', 3),
(51, 'C1503476', 'Lê Văn', 'Hoàng', '', 11),
(52, 'C1400652', 'Nguyễn Trung', 'Trực', '', 1),
(53, 'B1200548', 'Lê Thanh', 'Tùng', '', 3),
(54, 'B1400731', 'Phạm Công Quốc', 'Đạt', '', 11),
(55, 'B1206146', 'Nguyễn Khoa', 'Đăng', '', 5),
(56, 'B1410388', 'Nguyễn Huỳnh Minh', 'Hiếu', '', 2),
(57, 'B1408393', 'Lê Phạm Quang', 'Huy', '', 5),
(58, 'C1300765', 'Lê Quốc', 'Việt', '', 4),
(59, 'B1300655', 'Nguyễn Xuân', 'Đáng', '', 3),
(60, 'B1311324', 'Lê Văn', 'Thuận', '', 1),
(61, 'C1200675', 'Phan Thị Cẩm', 'Thùy', 'N', 7),
(62, 'B1410355', 'Nguyễn Khanh Minh', 'Trí', '', 2),
(63, 'C1450001', 'Lê Bùi Trí', 'Trung', '', 1),
(64, 'C1200012', 'Đặng Tấn', 'Hùng', '', 4),
(65, 'B1509845', 'Dương Nguyễn Băng', 'Khanh', '', 12),
(66, 'B1300761', 'Huỳnh Phương', 'Thanh', '', 5),
(67, 'B1400123', 'Nguyễn Văn', 'Nhân', '', 3),
(68, 'C1409823', 'Dương Quốc', 'Khải', '', 5),
(69, 'B1530045', 'Ngô Huỳnh Quốc', 'Khởi', '', 2);

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
-- Indexes for table `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`hp_id`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`lop_id`);

--
-- Indexes for table `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`lhp_id`),
  ADD KEY `hp_id` (`hp_id`),
  ADD KEY `gv_id` (`gv_id`),
  ADD KEY `sv_id` (`sv_id`);

--
-- Indexes for table `quyenhocphan`
--
ALTER TABLE `quyenhocphan`
  ADD PRIMARY KEY (`qhp_id`),
  ADD KEY `gv_id` (`gv_id`),
  ADD KEY `hp_id` (`hp_id`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`sv_id`),
  ADD UNIQUE KEY `sv_mssv` (`sv_mssv`),
  ADD KEY `lop_id` (`lop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `gv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hocphan`
--
ALTER TABLE `hocphan`
  MODIFY `hp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `lop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lophocphan`
--
ALTER TABLE `lophocphan`
  MODIFY `lhp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `quyenhocphan`
--
ALTER TABLE `quyenhocphan`
  MODIFY `qhp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `sv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD CONSTRAINT `lophocphan_ibfk_1` FOREIGN KEY (`sv_id`) REFERENCES `sinhvien` (`sv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lophocphan_ibfk_2` FOREIGN KEY (`hp_id`) REFERENCES `hocphan` (`hp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lophocphan_ibfk_3` FOREIGN KEY (`gv_id`) REFERENCES `giangvien` (`gv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quyenhocphan`
--
ALTER TABLE `quyenhocphan`
  ADD CONSTRAINT `quyenhocphan_ibfk_1` FOREIGN KEY (`gv_id`) REFERENCES `giangvien` (`gv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quyenhocphan_ibfk_2` FOREIGN KEY (`hp_id`) REFERENCES `lophocphan` (`hp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`lop_id`) REFERENCES `lop` (`lop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
