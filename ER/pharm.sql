-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2014 at 10:19 PM
-- Server version: 5.5.32-MariaDB
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pharm`
--
CREATE DATABASE IF NOT EXISTS `pharm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pharm`;

-- --------------------------------------------------------

--
-- Table structure for table `academic_rank`
--

CREATE TABLE IF NOT EXISTS `academic_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(45) DEFAULT NULL COMMENT 'ชื่อตำแหน่งภาษาไทย',
  `valueEn` varchar(45) DEFAULT NULL COMMENT 'ชื่อตำแหน่งภาษาอังกฤษ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `academic_rank`
--

INSERT INTO `academic_rank` (`id`, `valueTh`, `valueEn`) VALUES
(1, 'ศาสตราจารย์', 'professor'),
(2, 'ศาสตราจารย์พิเศษ', 'adjunct professor'),
(3, 'ศาสตราจารย์เกียรติคุณ', 'emeritus professor'),
(4, 'รองศาสตราจารย์', 'association professor'),
(5, 'ผู้ช่วยศาสตราจารย์', 'assist professor');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) DEFAULT NULL COMMENT 'อีเมล์(1อีเมล์/1บรรทัด)',
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_email_member1_idx` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `value`, `member_id`) VALUES
(17, 'b@up.ac.th', 31),
(16, 'a@outlook.com', 31),
(40, 'c@outlook.com', 35),
(39, 'f@up.ac.th', 36),
(38, 'e@outlook.com', 36),
(41, 'd@up.ac.th', 35),
(45, 'E2', 55);

-- --------------------------------------------------------

--
-- Table structure for table `graduate`
--

CREATE TABLE IF NOT EXISTS `graduate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(100) DEFAULT NULL COMMENT 'ชื่อเต็มภาษาไทย',
  `valueEn` varchar(100) DEFAULT NULL COMMENT 'ชื่อเต็มภาษาอังกฤษ',
  `graduatelevel_id` int(11) NOT NULL COMMENT 'ระดับปริญญา',
  `abbTh` varchar(10) DEFAULT NULL COMMENT 'ชื่อย่อภาษาไทย',
  `abbEn` varchar(10) DEFAULT NULL COMMENT 'ชื่อย่อภาษาอังกฤษ',
  PRIMARY KEY (`id`),
  KEY `fk_graduate_graduatelevel1_idx` (`graduatelevel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `graduate`
--

INSERT INTO `graduate` (`id`, `valueTh`, `valueEn`, `graduatelevel_id`, `abbTh`, `abbEn`) VALUES
(1, 'บริบาลเภสัชกรรม', '', 1, 'ภ.บ.', ''),
(2, 'เภสัชเวช', 'Bachelor of Science in Pharmacy', 2, 'ภ.ม.', 'B.S.'),
(9, 'วิทยาศาสตร์บัณฑิต', '', 1, 'วท.บ.', ''),
(20, 'เภสัชศาสตร์มหาบัณฑิต(เภสัชเคมี)', '', 2, 'ภ.ม.', ''),
(17, 'เภสัชศาสตร์บัณฑิต', '', 1, 'ภ.บ.', ''),
(18, 'วิทยาศาสตร์มหาบัณฑิต(ชีวเคมี)', '', 2, 'วท.ม.', ''),
(19, 'Doctor of Philosophy(biochemistry)', 'Doctor of Philosophy(biochemistry)', 3, '', 'Ph.D.'),
(21, 'ปริญญาดุษฎีบัณฑิต(เภสัชเคมีและพฤกษเคมี)', '', 3, '', ''),
(22, 'วิทยาศาสตร์บัณฑิต(ชีววิทยา)', '', 1, 'วท.บ.', ''),
(23, 'วิทยาศาสตร์มหาบัณฑิต(วิทยาการพืช)', '', 2, 'วท.ม.', ''),
(24, 'เภสัชศาสตร์บัณฑิต(บริบาลเภสัช)', '', 1, 'ภ.บ.', '');

-- --------------------------------------------------------

--
-- Table structure for table `graduate_level`
--

CREATE TABLE IF NOT EXISTS `graduate_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(45) DEFAULT NULL COMMENT 'ระดับปริญญาภาษาไทย',
  `valueEn` varchar(45) DEFAULT NULL COMMENT 'ระดับปริญญาภาษาอังกฤษ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `graduate_level`
--

INSERT INTO `graduate_level` (`id`, `valueTh`, `valueEn`) VALUES
(1, 'ปริญญาตรี', 'bachelor degree'),
(2, 'ปริญญาโท', 'master degree'),
(3, 'ปริญญาเอก', 'philosophy degree'),
(4, 'อื่นๆ', 'etc.');

-- --------------------------------------------------------

--
-- Table structure for table `jobdescription`
--

CREATE TABLE IF NOT EXISTS `jobdescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(45) DEFAULT NULL,
  `valueEn` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jobdescription`
--

INSERT INTO `jobdescription` (`id`, `valueTh`, `valueEn`) VALUES
(1, 'สายวิชาการ', NULL),
(2, 'สายสนับสนุน', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_type_id` int(11) NOT NULL COMMENT 'ประเภทการลา',
  `date_start` datetime NOT NULL COMMENT 'วันที่เริ่มลา',
  `date_end` datetime NOT NULL COMMENT 'ลาจนถึงวันที่',
  `leave_service_id` int(11) DEFAULT NULL COMMENT 'ลาปฎิบัติราชการ',
  PRIMARY KEY (`id`),
  KEY `fk_leave_leave_type1_idx` (`leave_type_id`),
  KEY `fk_leave_leave_service1_idx` (`leave_service_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `leave_type_id`, `date_start`, `date_end`, `leave_service_id`) VALUES
(10, 1, '2013-12-11 02:10:20', '2013-12-11 02:10:20', NULL),
(11, 4, '2013-12-13 11:45:57', '2013-12-13 11:45:57', NULL),
(12, 9, '2013-12-01 11:21:00', '2013-12-17 11:21:00', 1),
(13, 1, '2014-03-14 00:00:00', '2014-03-18 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_service`
--

CREATE TABLE IF NOT EXISTS `leave_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(45) NOT NULL COMMENT 'ที่',
  `header` varchar(100) NOT NULL COMMENT 'เรื่อง',
  PRIMARY KEY (`id`),
  UNIQUE KEY `number_UNIQUE` (`number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `leave_service`
--

INSERT INTO `leave_service` (`id`, `number`, `header`) VALUES
(1, 'ศธ 2556/18', 'ทดสอบ การลา');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE IF NOT EXISTS `leave_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `value`) VALUES
(1, 'ลาป่วย'),
(2, 'ลาคลอดบุตร'),
(3, 'ลาช่วยเหลือภริยาคลอดบุตร'),
(4, 'ลากิจส่วนตัว'),
(5, 'ลาพักผ่อน'),
(6, 'ลาอุปสมบทหรือลาพิธีฮัจย์'),
(8, 'ลาเข้ารับการตรวจเลือกหรือเข้ารับการเตรียมทหาร'),
(9, 'ลาไปศึกษา ฝึกอบรม ปฎิบัติการวิจัย หรือดูงาน'),
(10, 'ลาปฎิบัติงานองค์การระหว่างประเทศ'),
(11, 'ลาติดตามคู่สมรส'),
(12, 'ลาฟื้นฟูสมรรถภาพด้านอาชีพ');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL COMMENT 'ชื่อเข้าใช้',
  `password` varchar(45) DEFAULT NULL COMMENT 'รหัสผ่าน',
  `prefix_id` int(11) NOT NULL COMMENT 'คำนำหน้า',
  `name` varchar(45) DEFAULT NULL COMMENT 'ชื่อ',
  `surname` varchar(45) DEFAULT NULL COMMENT 'นามสกุล',
  `academic_rank_id` int(11) DEFAULT NULL COMMENT 'ตำแหน่งวิชาการ',
  `position_id` int(11) NOT NULL,
  `sex_id` int(11) NOT NULL COMMENT 'เพศ',
  `date_registered` date DEFAULT NULL COMMENT 'วันบรรจุ',
  `date_start` date DEFAULT NULL COMMENT 'วันเริ่มทำงาน',
  `status_id` int(11) NOT NULL COMMENT 'สถานะการทำงาน',
  `professional_license` varchar(45) DEFAULT NULL COMMENT 'ใบประกอบวิชาชีพ',
  `privilege_id` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_member_academic_rank_idx` (`academic_rank_id`),
  KEY `fk_member_sex1_idx` (`sex_id`),
  KEY `fk_member_status1_idx` (`status_id`),
  KEY `fk_member_prefix1_idx` (`prefix_id`),
  KEY `fk_member_privilege1_idx` (`privilege_id`),
  KEY `fk_member_position1_idx` (`position_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `prefix_id`, `name`, `surname`, `academic_rank_id`, `position_id`, `sex_id`, `date_registered`, `date_start`, `status_id`, `professional_license`, `privilege_id`) VALUES
(1, 'u1', '1234', 1, 'กิตติภัค', 'เจ็งฮั้ว', NULL, 2, 1, '2005-04-01', '2005-04-01', 1, '0', 2),
(2, 'U2', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'คณิตา', 'ดวงแจ่มกาญจน์', NULL, 2, 2, '2013-11-01', '2013-11-02', 2, '0', 2),
(7, 'u3', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'จันทนา', 'คีรีทวีป', NULL, 1, 2, '2013-11-01', '2013-11-30', 1, '1', 2),
(8, 'u4', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'จันทิมา', 'ชูรัศมี', NULL, 2, 2, '2005-04-01', '2005-04-01', 1, '1', 2),
(9, 'u5', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'ชนัดดา', 'สุขจักร์', NULL, 1, 2, '2005-04-01', '2005-04-01', 1, '1', 2),
(11, 'u6', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'ชาลี', 'ทองเรือง', NULL, 1, 1, '2013-11-01', '2013-11-01', 1, '1', 2),
(18, 'u11', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'นิวัฒน์', 'ศักดิ์สิทธิ์', NULL, 1, 1, '2008-05-01', '2013-11-10', 1, '1', 2),
(14, 'u8', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'ณัฐกรณ์', 'ใบแสง', NULL, 1, 1, '2005-04-01', '2005-04-01', 1, '1', 2),
(15, 'u9', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'ธำรง', 'วงษ์ช้าง', NULL, 1, 1, '2005-04-01', '2005-04-01', 1, '1', 2),
(16, 'u10', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'นวัชรนนท์', 'ธนากีรติรัชตุกุล', NULL, 1, 1, '2005-04-01', '2005-04-01', 1, '1', 2),
(17, 'pharm', '67711f47e8ff26ec7c42f27484c6fafd', 3, 'ธัญชนาธร', 'ธัญญ์ชัญญาธารก์', NULL, 4, 2, '2012-10-03', '2012-10-03', 1, '0', 1),
(22, 'u7', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'ณัฐ', 'นาเอก', NULL, 1, 1, '2013-11-01', '2013-11-02', 1, '1', 2),
(23, 'u12', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'นุวัตร', 'วิศวรุ่งโรจน์', NULL, 1, 1, '2013-11-01', '2013-11-02', 1, '1', 2),
(24, 'u13', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'ปวีสา', 'ชวลิตพงศ์พันธุ์', NULL, 1, 2, '2013-11-02', '2013-11-03', 1, '1', 2),
(31, 'u14', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'ปิตินุช', 'ผิวชัย', NULL, 1, 2, '2013-11-01', '2013-11-10', 1, '1', 2),
(35, 'u15', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'พัชรวรรณ', 'ตันอมาตยรัตน์', NULL, 1, 2, '2007-11-01', '2007-11-01', 1, '1', 2),
(36, 'u16', '2e99bf4e42962410038bc6fa4ce40d97', 3, 'พิมพ์ชนก', 'จรุงจิตร', NULL, 1, 2, '2006-10-10', '2006-10-10', 1, '1', 2),
(54, 'u54', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'มณฑล', 'สงวนเสริมศรี', 2, 2, 1, '2008-10-01', '2008-10-01', 1, '0', 2),
(55, 'u55', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'มาลีรักษ์', 'อัตต์สินทอง', NULL, 2, 2, '2007-10-01', '2007-10-01', 1, '1', 2),
(56, 'u56', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'วิชุดา', 'พิพิธพิบูลย์สุข', NULL, 2, 2, '2007-12-01', '2007-12-01', 1, '0', 2),
(57, 'pharm0057', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'ศุภางค์', 'คนดี', NULL, 2, 1, '2004-01-01', '2005-05-01', 1, '1', 2),
(58, 'pharm0058', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'สนธยา', 'สุขยิ่ง', NULL, 2, 2, '2014-03-01', '2014-03-01', 1, '1', 2),
(59, 'pharm0059', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'สุธิดา', 'บุญสม', NULL, 2, 2, '2009-10-01', '2009-10-01', 2, '1', 2),
(60, 'pharm0060', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'สุภาวดี', 'บุญทา', NULL, 2, 2, '2005-05-01', '2005-05-01', 1, '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member_has_graduate`
--

CREATE TABLE IF NOT EXISTS `member_has_graduate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `graduate_id` int(11) NOT NULL COMMENT 'ชื่อวุฒิปริญญา',
  PRIMARY KEY (`id`),
  KEY `fk_member_has_graduate_graduate1_idx` (`graduate_id`),
  KEY `fk_member_has_graduate_member1_idx` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=278 ;

--
-- Dumping data for table `member_has_graduate`
--

INSERT INTO `member_has_graduate` (`id`, `member_id`, `graduate_id`) VALUES
(245, 54, 19),
(244, 54, 18),
(8, 8, 1),
(9, 9, 1),
(14, 15, 1),
(15, 16, 1),
(16, 18, 1),
(267, 56, 22),
(268, 56, 23),
(266, 55, 21),
(264, 55, 17),
(265, 55, 20),
(275, 60, 21),
(123, 22, 1),
(124, 23, 1),
(125, 24, 1),
(274, 60, 17),
(273, 59, 24),
(272, 58, 24),
(271, 57, 21),
(270, 57, 20),
(269, 57, 17),
(132, 31, 1),
(248, 35, 1),
(141, 36, 1),
(243, 54, 17);

-- --------------------------------------------------------

--
-- Table structure for table `member_has_leave`
--

CREATE TABLE IF NOT EXISTS `member_has_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_member_has_leave_leave1_idx` (`leave_id`),
  KEY `fk_member_has_leave_member1_idx` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `member_has_leave`
--

INSERT INTO `member_has_leave` (`id`, `member_id`, `leave_id`) VALUES
(2, 1, 10),
(3, 2, 10),
(4, 7, 10),
(5, 8, 10),
(6, 9, 10),
(7, 11, 10),
(8, 18, 10),
(9, 14, 10),
(10, 15, 10),
(11, 16, 10),
(12, 22, 10),
(13, 23, 10),
(14, 24, 10),
(15, 31, 10),
(16, 35, 10),
(17, 36, 10),
(18, 17, 11),
(19, 8, 12),
(20, 9, 12),
(21, 11, 12),
(22, 18, 12),
(23, 14, 12),
(24, 15, 12),
(25, 17, 12);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(45) DEFAULT NULL COMMENT 'ชื่อตำแหน่ง',
  `valueEn` varchar(45) DEFAULT NULL COMMENT 'position name',
  `jobDescription_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ตำแหน่ง' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `valueTh`, `valueEn`, `jobDescription_id`) VALUES
(1, 'ผู้บริหาร', 'executive', 1),
(2, 'อาจารย์', 'lecturer', 1),
(3, 'ผู้ช่วยสอน', 'officer', 2),
(4, 'เจ้าหน้าที่ฝ่ายบุคคล', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE IF NOT EXISTS `prefix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(45) DEFAULT NULL COMMENT 'คำนำหน้าภาษาไทย',
  `valueEn` varchar(45) DEFAULT NULL COMMENT 'คำนำหน้าภาษาอังกฤษ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `prefix`
--

INSERT INTO `prefix` (`id`, `valueTh`, `valueEn`) VALUES
(1, 'นาย', 'Mr.'),
(2, 'นาง', 'Miss.'),
(3, 'นางสาว', 'Mrs.');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `value`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE IF NOT EXISTS `sex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(45) DEFAULT NULL,
  `valueEn` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`id`, `valueTh`, `valueEn`) VALUES
(1, 'ชาย', 'male'),
(2, 'หญิง', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) DEFAULT NULL COMMENT 'สถานะ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `value`) VALUES
(1, 'ปกติ'),
(2, 'ลาศึกษาต่อ'),
(3, 'เกษียณ');

-- --------------------------------------------------------

--
-- Table structure for table `tel`
--

CREATE TABLE IF NOT EXISTS `tel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(30) DEFAULT NULL COMMENT 'เบอร์โทร(1 เบอร์ต่อ 1 บรรทัด)',
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tel_member1_idx` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tel`
--

INSERT INTO `tel` (`id`, `value`, `member_id`) VALUES
(1, '089-xxx-xxxx', 31),
(2, '054-466-666 ต่อ', 31),
(27, '054-466-666 ต่อ 1100', 35),
(26, '089-xxx-xxxx', 36),
(25, '054-466-666 ต่อ 1111', 36),
(28, '08x-xxx-xxxx', 35),
(36, '089', 55);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
