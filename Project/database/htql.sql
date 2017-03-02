-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2017 at 06:26 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `htql`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangdiem`
--

CREATE TABLE IF NOT EXISTS `bangdiem` (
  `bangdiem_id` int(11) NOT NULL AUTO_INCREMENT,
  `lhp_id` int(11) NOT NULL,
  `sv_mssv` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `diemso` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bangdiem`
--

INSERT INTO `bangdiem` (`lhp_id`, `sv_mssv`, `diemso`) VALUES
(1, 'B1307612', 9),
(1, 'B1308743', 7.5),
(5, 'B1308732', 9.5),
(5, 'C1409125', 6),
(5, 'C1509761', 7),
(5, 'B1306754', 7.5);

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE IF NOT EXISTS `giangvien` (
  `gv_mscb` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `gv_hoten` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gv_matkhau` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `gv_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gv_admin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`gv_mscb`, `gv_hoten`, `gv_matkhau`, `gv_email`, `gv_admin`) VALUES
('0000', 'Trần Quang Phúc', 'd983574cd14803a8309347458a7f4cd2', 'tqphuc@ctu.edu.vn', b'0'),
('1111', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@ctu.edu.vn', b'1'),
('1230', 'Phan Thượng Cang', 'ac3d490765f3a8004895efcb690b5072', 'ptcang@ctu.edu.vn', b'0'),
('1533', 'Trần Công Án', '7fca4e2331b1068a3f4fe6d143590c3e', 'tcan@ctu.edu.vn', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `hocphan`
--

CREATE TABLE IF NOT EXISTS `hocphan` (
  `hp_mahp` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `hp_tenhp` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocphan`
--

INSERT INTO `hocphan` (`hp_mahp`, `hp_tenhp`) VALUES
('CT101', 'Lập trình căn bản A '),
('CT102', 'Toán rời rạc 1'),
('CT103', 'Cấu trúc dữ liệu'),
('CT104', 'Kiến trúc máy tính'),
('CT106', 'Hệ cơ sở dữ liệu'),
('CT107', 'Hệ điều hành'),
('CT109', 'Phân tích và thiết kế hệ thống TT'),
('CT110', 'Hệ quản trị cơ sở dữ liệu'),
('CT112', 'Mạng máy tính'),
('CT113', 'Nhập môn công nghệ phần mềm '),
('CT114', 'Lập trình hướng đối tượng C++'),
('CT116', 'Chuyên đề ngôn ngữ lập trình 1'),
('CT117', 'Chuyên đề ngôn ngữ lập trình 2'),
('CT118', 'Chuyên đề ngôn ngữ lập trình 3'),
('CT119', 'Toán rời rạc 2 '),
('CT120', 'Phân tích và thiết kế thuật toán'),
('CT121', 'Tin học lý thuyết'),
('CT123', 'Quy hoạch tuyến tính - CNTT'),
('CT125', 'Mô phỏng'),
('CT126', 'Lý thuyết xếp hàng'),
('CT127', 'Lý thuyết thông tin'),
('CT128', 'Kỹ thuật đồ hoạ - CNTT'),
('CT144', 'Xử lý tín hiệu số'),
('CT158', 'Nguyên lý ngôn ngữ lập trình'),
('CT165', 'Ngôn ngữ mô hình hóa UML'),
('CT167', 'Ngôn ngữ lập trình Java'),
('CT170', 'Chuyên đề ngôn ngữ lập trình KHMT'),
('CT302', 'Phát triển phần mềm mã nguồn mở'),
('CT303', 'Phát triển hệ thống thông tin'),
('CT304', 'Giao diện người - máy'),
('CT309', 'Quản lý dự án tin học'),
('CT311', 'Phương pháp NCKH'),
('CT312', 'Khai khoáng dữ liệu'),
('CT313', 'An toàn & bảo mật thông tin'),
('CT316', 'Xử lý ảnh'),
('CT317', 'Lập trình nhúng cơ bản'),
('CT319', 'Lập trình mạng'),
('CT321', 'Phát triển hệ thống thương mại Đ.Tử'),
('CT323', 'Chuyên đề về một hệ quản trị CSDL'),
('CT329', 'Lập trình cho các thiết bị di động'),
('CT332', 'Trí tuệ nhân tạo'),
('CT333', 'Quản trị mạng'),
('CT334', 'Quản trị mạng trên Linux'),
('CT335', 'Thiết kế & cài đặt mạng'),
('CT336', 'Truyền thông đa phương tiện'),
('CT337', 'Đánh giá hiệu năng mạng'),
('CT338', 'Mạng không dây & di động'),
('CT339', 'Các hệ thống thông minh'),
('CT340', 'Hệ nhóm máy tính'),
('CT341', 'Xây dựng dịch vụ mạng'),
('CT343', 'Các hệ thống phân tán'),
('CT344', 'Giải quyết sự cố mạng'),
('CT349', 'Thương mại điện tử -CNTT'),
('CT428', 'Lập trình Web'),
('CT429', 'Thực tập thực tế - Tin học'),
('CT430', 'Phân tích hệ thống hướng đối tượng'),
('CT431', 'Hệ quản trị CSDL đa phương tiện'),
('CT432', 'Tính toán lưới'),
('CT434', 'An toàn hệ thống & an ninh mạng'),
('CT439', 'Niên luận Mạng máy tính và truyền thông'),
('CT529', 'Luận văn tốt nghiệp - TT&MMT ');

-- --------------------------------------------------------

--
-- Table structure for table `khokhoa`
--

CREATE TABLE IF NOT EXISTS `khokhoa` (
  `khoa_id` int(11) NOT NULL AUTO_INCREMENT,
  `khoa_congkhai` text COLLATE utf8_unicode_ci NOT NULL,
  `khoa_bimat` text COLLATE utf8_unicode_ci,
  `khoa_matkhaukhoa` varbinary(255) NOT NULL,
  `gv_mscb` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lophocphan`
--

CREATE TABLE IF NOT EXISTS `lophocphan` (
  `lhp_id` int(11) NOT NULL AUTO_INCREMENT,
  `hp_mahp` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `lhp_nhom` int(11) NOT NULL,
  `gv_mscb` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `lhp_bangdiemkhoa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lhp_dakhoa` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lophocphan`
--

INSERT INTO `lophocphan` (`hp_mahp`, `lhp_nhom`, `gv_mscb`, `lhp_bangdiemkhoa`, `lhp_dakhoa`) VALUES
('CT319', 1, '1533', NULL, b'0'),
('CT319', 2, '1533', NULL, b'0'),
('CT101', 5, '1230', NULL, b'0'),
('CT170', 1, '1230', NULL, b'0'),
('CT529', 1, '1533', NULL, b'0'),
('CT432', 2, '1111', NULL, b'0'),
('CT302', 2, '0000', NULL, b'0'),
('CT332', 1, '0000', NULL, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `lopquanly`
--

CREATE TABLE IF NOT EXISTS `lopquanly` (
  `lop_malop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lop_tenlop` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lopquanly`
--

INSERT INTO `lopquanly` (`lop_malop`, `lop_tenlop`) VALUES
('DI1395A1', 'Hệ thống thông tin 1 K39'),
('DI13V7A2', 'Công nghệ thông tin 2 K39'),
('DI14V7A3', 'Công nghệ thông tin 2 K40'),
('DI15Y9A2', 'Truyền thông mạng máy tính 2 K41');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE IF NOT EXISTS `sinhvien` (
  `sv_mssv` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sv_ho` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sv_ten` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sv_nu` bit(1) NOT NULL DEFAULT b'0',
  `lop_malop` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`sv_mssv`, `sv_ho`, `sv_ten`, `sv_nu`, `lop_malop`) VALUES
('B1200548', 'Lê Thanh', 'Tùng', b'0', 'DI14V7A3'),
('B1201276', 'Phạm Hoàng', 'Ân', b'0', 'DI1395A1'),
('B1204526', 'Trần Anh', 'Tuấn', b'0', 'DI1395A1'),
('B1205664', 'Phạm Quốc', 'Sử', b'0', 'DI13V7A2'),
('B1206146', 'Nguyễn Khoa', 'Đăng', b'0', 'DI14V7A3'),
('B1209878', 'Ngô Minh', 'Khoa', b'0', 'DI1395A1'),
('B1238928', 'Quách Tấn', 'Phát', b'0', 'DI1395A1'),
('B1240876', 'Trần Chí', 'Kha', b'0', 'DI1395A1'),
('B1240976', 'Phan Như', 'Thảo', b'1', 'DI1395A1'),
('B1250732', 'Nguyễn Thanh', 'Danh', b'0', 'DI1395A1'),
('B1300655', 'Nguyễn Xuân', 'Đáng', b'0', 'DI14V7A3'),
('B1300761', 'Huỳnh Phương', 'Thanh', b'0', 'DI15Y9A2'),
('B1306754', 'Nguyễn Văn', 'Phúc', b'0', 'DI13V7A2'),
('B1307534', 'Trần Thanh', 'Mai', b'0', 'DI1395A1'),
('B1307612', 'Mai Thị Bảo', 'Luyến', b'1', 'DI1395A1'),
('B1308732', 'Cao Hoàng', 'Chuyện', b'0', 'DI1395A1'),
('B1308743', 'Trần Văn', 'Chính', b'0', 'DI1395A1'),
('B1309105', 'Trần Khải', 'Anh', b'0', 'DI1395A1'),
('B1309145', 'Nguyễn Xuân', 'Quang', b'0', 'DI1395A1'),
('B1311324', 'Lê Văn', 'Thuận', b'0', 'DI14V7A3'),
('B1400123', 'Nguyễn Văn', 'Nhân', b'0', 'DI15Y9A2'),
('B1400731', 'Phạm Công Quốc', 'Đạt', b'0', 'DI14V7A3'),
('B1404522', 'Ngô Kỳ', 'Anh', b'0', 'DI13V7A2'),
('B1406543', 'Huỳnh Hữu', 'Khiêm', b'0', 'DI1395A1'),
('B1407865', 'Ngô Mỹ', 'Dung', b'1', 'DI1395A1'),
('B1408393', 'Lê Phạm Quang', 'Huy', b'0', 'DI14V7A3'),
('B1408795', 'Hà Thái Minh', 'Lộc', b'0', 'DI1395A1'),
('B1409489', 'Phạm Duy', 'Tuấn', b'0', 'DI13V7A2'),
('B1410355', 'Nguyễn Khanh Minh', 'Trí', b'0', 'DI14V7A3'),
('B1410388', 'Nguyễn Huỳnh Minh', 'Hiếu', b'0', 'DI14V7A3'),
('B1500926', 'Nguyễn Bá', 'Nhật', b'0', 'DI13V7A2'),
('B1500994', 'Bùi Nhật', 'Hào', b'0', 'DI13V7A2'),
('B1501399', 'Lê Đông', 'Bình', b'0', 'DI1395A1'),
('B1504224', 'Bùi Minh', 'Tân', b'0', 'DI13V7A2'),
('B1504896', 'Phan Thành', 'Đạt', b'0', 'DI13V7A2'),
('B1506108', 'Bùi Hồ Gia', 'Bảo', b'0', 'DI13V7A2'),
('B1508765', 'Trần Thị Thu', 'Thủy', b'1', 'DI1395A1'),
('B1509845', 'Dương Nguyễn Băng', 'Khanh', b'0', 'DI15Y9A2'),
('B1530045', 'Ngô Huỳnh Quốc', 'Khởi', b'0', 'DI15Y9A2'),
('B1568762', 'Nguyễn Thị Lan', 'Phương', b'1', 'DI13V7A2'),
('C1200012', 'Đặng Tấn', 'Hùng', b'0', 'DI15Y9A2'),
('C1200543', 'Lưu Duyệt', 'An', b'0', 'DI13V7A2'),
('C1200675', 'Phan Thị Cẩm', 'Thùy', b'1', 'DI14V7A3'),
('C1203456', 'Nguyễn Quốc', 'Bảo', b'0', 'DI13V7A2'),
('C1206712', 'Trương Khánh', 'Thoại', b'0', 'DI13V7A2'),
('C1300136', 'Phạm Minh', 'Đương', b'0', 'DI13V7A2'),
('C1300156', 'Quách Thị Tiểu', 'Nguyệt', b'1', 'DI13V7A2'),
('C1300543', 'Nguyễn Hồ Kim Yến', 'Oanh', b'1', 'DI13V7A2'),
('C1300765', 'Lê Quốc', 'Việt', b'0', 'DI14V7A3'),
('C1307653', 'Lê Hà', 'Nam', b'0', 'DI13V7A2'),
('C1308752', 'Trần Minh', 'Sơn', b'0', 'DI13V7A2'),
('C1400652', 'Nguyễn Trung', 'Trực', b'0', 'DI14V7A3'),
('C1401278', 'Lê Khánh', 'Vy', b'1', 'DI13V7A2'),
('C1404532', 'Nguyễn Khánh', 'Duyên', b'0', 'DI13V7A2'),
('C1408712', 'Trần Nguyễn Phương', 'Uyên', b'1', 'DI13V7A2'),
('C1409125', 'Đặng Văn', 'Điều', b'0', 'DI13V7A2'),
('C1409823', 'Dương Quốc', 'Khải', b'0', 'DI15Y9A2'),
('C1450001', 'Lê Bùi Trí', 'Trung', b'0', 'DI14V7A3'),
('C1500657', 'Thạch Thị Chal', 'Thi', b'1', 'DI13V7A2'),
('C1503476', 'Lê Văn', 'Hoàng', b'0', 'DI13V7A2'),
('C1509761', 'Phan Thị', 'Hà', b'1', 'DI13V7A2'),
('C1509832', 'Trần Chí', 'Dũng', b'0', 'DI13V7A2'),
('C1530514', 'Nguyễn Thanh', 'Điền', b'0', 'DI13V7A2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangdiem`
--
ALTER TABLE `bangdiem`
 ADD PRIMARY KEY (`bangdiem_id`), ADD UNIQUE KEY `unique_lhp_sv` (`lhp_id`,`sv_mssv`), ADD KEY `lhp_id` (`lhp_id`), ADD KEY `sv_mssv` (`sv_mssv`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
 ADD PRIMARY KEY (`gv_mscb`), ADD UNIQUE KEY `gv_email` (`gv_email`);

--
-- Indexes for table `hocphan`
--
ALTER TABLE `hocphan`
 ADD PRIMARY KEY (`hp_mahp`);

--
-- Indexes for table `khokhoa`
--
ALTER TABLE `khokhoa`
 ADD PRIMARY KEY (`khoa_id`), ADD KEY `gv_mscb` (`gv_mscb`);

--
-- Indexes for table `lophocphan`
--
ALTER TABLE `lophocphan`
 ADD PRIMARY KEY (`lhp_id`), ADD KEY `gv_mscb` (`gv_mscb`), ADD KEY `hp_mahp` (`hp_mahp`);

--
-- Indexes for table `lopquanly`
--
ALTER TABLE `lopquanly`
 ADD PRIMARY KEY (`lop_malop`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
 ADD PRIMARY KEY (`sv_mssv`), ADD KEY `lop_malop` (`lop_malop`);
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bangdiem`
--
ALTER TABLE `bangdiem`
ADD CONSTRAINT `bangdiem_cua_lhp` FOREIGN KEY (`lhp_id`) REFERENCES `lophocphan` (`lhp_id`),
ADD CONSTRAINT `sinhvien_cothongtin` FOREIGN KEY (`sv_mssv`) REFERENCES `sinhvien` (`sv_mssv`);

--
-- Constraints for table `khokhoa`
--
ALTER TABLE `khokhoa`
ADD CONSTRAINT `khoa_cua_giangvien` FOREIGN KEY (`gv_mscb`) REFERENCES `giangvien` (`gv_mscb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lophocphan`
--
ALTER TABLE `lophocphan`
ADD CONSTRAINT `lop_hoc_hocphan` FOREIGN KEY (`hp_mahp`) REFERENCES `hocphan` (`hp_mahp`),
ADD CONSTRAINT `lophocphan_do_gv` FOREIGN KEY (`gv_mscb`) REFERENCES `giangvien` (`gv_mscb`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
ADD CONSTRAINT `sinhvien_thuoc_lop` FOREIGN KEY (`lop_malop`) REFERENCES `lopquanly` (`lop_malop`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
