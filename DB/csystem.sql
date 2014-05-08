-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- โฮสต์: 127.0.0.1
-- เวลาในการสร้าง: 
-- เวอร์ชั่นของเซิร์ฟเวอร์: 5.5.32
-- รุ่นของ PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `csystem`
--
CREATE DATABASE IF NOT EXISTS `csystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `csystem`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `academic_rank`
--

CREATE TABLE IF NOT EXISTS `academic_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(45) DEFAULT NULL COMMENT 'ชื่อตำแหน่งภาษาไทย',
  `valueEn` varchar(45) DEFAULT NULL COMMENT 'ชื่อตำแหน่งภาษาอังกฤษ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(100) DEFAULT NULL COMMENT 'หัวข้อโจทย์',
  `pdf` varchar(100) DEFAULT NULL COMMENT 'โจทย์',
  `start` datetime DEFAULT NULL COMMENT 'เวลาเริ่มทำโจทย์',
  `end` datetime DEFAULT NULL COMMENT 'เวลาสิ้นสุดการทำโจทย์',
  `create` datetime DEFAULT NULL COMMENT 'เวลาสร้างทำโจทย์',
  `member_has_section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL COMMENT 'รหัสวิชา',
  `valueTh` varchar(70) DEFAULT NULL COMMENT 'ชื่อคอร์สภาษาไทย',
  `valueEn` varchar(70) DEFAULT NULL COMMENT 'ชื่อคอร์สภาษาอังกฤษ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `course`
--

INSERT INTO `course` (`id`, `code`, `valueTh`, `valueEn`) VALUES
(1, '235012', 'โครงสร้างข้อมูล', 'data structure and algorithm');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `courseonsemester`
--

CREATE TABLE IF NOT EXISTS `courseonsemester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL COMMENT 'วิชา',
  `semester_id` int(11) NOT NULL COMMENT 'ภาคการศึกษา',
  `yeared_id` int(11) NOT NULL COMMENT 'ปีการศึกษา(พ.ศ.)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) DEFAULT NULL COMMENT 'อีเมล์(1อีเมล์/1บรรทัด)',
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_email_member1_idx` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(45) DEFAULT NULL,
  `valueEn` varchar(45) DEFAULT NULL,
  `abb` varchar(45) DEFAULT NULL,
  `university_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `faculty`
--

INSERT INTO `faculty` (`id`, `valueTh`, `valueEn`, `abb`, `university_id`) VALUES
(1, 'เทคโนโลยีสารสนเทศและการสื่อสาร', 'Information and Communication Technology', 'ICT', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `major`
--

CREATE TABLE IF NOT EXISTS `major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(45) DEFAULT NULL,
  `valueEn` varchar(45) DEFAULT NULL,
  `abb` varchar(10) DEFAULT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- dump ตาราง `major`
--

INSERT INTO `major` (`id`, `valueTh`, `valueEn`, `abb`, `faculty_id`) VALUES
(1, 'วิศวกรรมคอมพิวเตอร์ ', 'Computer Engineering', 'CPE', 1),
(2, 'วิศวกรรมซอฟต์แวร์', 'Software Engineering', 'SE', 1),
(3, 'วิศวกรรมสารสนเทศและการสื่อสาร', 'Information and Communication Engineering', 'ICE', 1),
(4, 'คอมพิวเตอร์ธุรกิจ', 'Business Computer', 'BC', 1),
(5, 'เทคโนโลยีสารสนเทศ', 'Information Technology', 'IT', 1),
(6, 'ภูมิสารสนเทศศาสตร์', 'Geographic Information Science', 'GIS', 1),
(7, 'วิทยาการคอมพิวเตอร์', 'Computer Science', 'CS', 1),
(8, 'เทคโนโลยีคอมพิวเตอร์เคลื่อนที่', 'Mobile Computing Technology', 'MCT', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL COMMENT 'ชื่อเข้าใช้',
  `password` varchar(45) NOT NULL COMMENT 'รหัสผ่าน',
  `fuser` varchar(100) DEFAULT NULL,
  `prefix_id` int(11) DEFAULT NULL COMMENT 'คำนำหน้า',
  `name` varchar(45) DEFAULT NULL COMMENT 'ชื่อ',
  `surname` varchar(45) DEFAULT NULL COMMENT 'นามสกุล',
  `code` varchar(15) DEFAULT NULL,
  `academic_rank_id` int(11) DEFAULT NULL COMMENT 'ตำแหน่งวิชาการ',
  `date_registered` datetime DEFAULT NULL COMMENT 'วันสมัครสมาชิก',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT 'สถานะสมาชิก',
  `privilege_id` int(11) NOT NULL DEFAULT '3' COMMENT 'ประเภทสมาชิก',
  `tel` varchar(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phd` int(1) DEFAULT '0',
  `major_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_member_academic_rank_idx` (`academic_rank_id`),
  KEY `fk_member_status1_idx` (`status`),
  KEY `fk_member_prefix1_idx` (`prefix_id`),
  KEY `fk_member_privilege1_idx` (`privilege_id`),
  KEY `fk_member_major1_idx` (`major_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- dump ตาราง `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `fuser`, `prefix_id`, `name`, `surname`, `code`, `academic_rank_id`, `date_registered`, `status`, `privilege_id`, `tel`, `email`, `phd`, `major_id`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '', 1, 'วัฒนพงศ์', 'สุทธภักดิ์', NULL, NULL, '2014-03-24 16:52:00', 1, 1, '', '', 0, 2),
(2, 'wattanapong.su', '81dc9bdb52d04dc20036dbd8313ed055', '', 1, 'วัฒนพงศ์', 'สุทธภักดิ์', NULL, NULL, NULL, 1, 2, '', '', 0, 2),
(4, 'student', '81dc9bdb52d04dc20036dbd8313ed055', '', 1, '', '', NULL, NULL, NULL, 1, 3, '', '', 0, 2),
(5, '56022926', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายณัฐพล คตภูธร', NULL, '56022926', NULL, NULL, 1, 3, '', '', 0, 1),
(6, '56022937', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายณัฐวุฒิ จันทาพูน', NULL, '56022937', NULL, NULL, 1, 3, '', '', 0, 1),
(7, '56022959', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายธนพล สุขแจ่ม', NULL, '56022959', NULL, NULL, 1, 3, '', '', 0, 1),
(8, '56022960', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นางสาวนิพิษฐา กันทิยะ', NULL, '56022960', NULL, NULL, 1, 3, '', '', 0, 1),
(9, '56022971', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายปฏิพล ปันยวง', NULL, '56022971', NULL, NULL, 1, 3, '', '', 0, 1),
(10, '56022982', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายปราโมทย์ พรหมธิ', NULL, '56022982', NULL, NULL, 1, 3, '', '', 0, 1),
(11, '56022993', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นางสาวพรชนก สุรินทร์', NULL, '56022993', NULL, NULL, 1, 3, '', '', 0, 1),
(12, '56023006', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นางสาวพุทธิพัทธ์ มีอ่วม', NULL, '56023006', NULL, NULL, 1, 3, '', '', 0, 1),
(13, '56023017', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายวัฒชลัช ฐานิศวร์', NULL, '56023017', NULL, NULL, 1, 3, '', '', 0, 1),
(14, '56023028', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายวันเฉลิม กันทะวงค์', NULL, '56023028', NULL, NULL, 1, 3, '', '', 0, 1),
(15, '56023039', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายศรัณย์ เชื้อผู้ดี', NULL, '56023039', NULL, NULL, 1, 3, '', '', 0, 1),
(16, '56023040', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายศุภิสิทธิ์ ไข่กา', NULL, '56023040', NULL, NULL, 1, 3, '', '', 0, 1),
(17, '56023051', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายสยามรัฐ แก้วตา', NULL, '56023051', NULL, NULL, 1, 3, '', '', 0, 1),
(18, '56023084', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นางสาวหทัยรัตน์ อินงาม', NULL, '56023084', NULL, NULL, 1, 3, '', '', 0, 1),
(19, '56023095', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายอดิศร บัวผัด', NULL, '56023095', NULL, NULL, 1, 3, '', '', 0, 1),
(20, '56023129', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นางสาวอิษฎา สนิทรำ', NULL, '56023129', NULL, NULL, 1, 3, '', '', 0, 1),
(21, '56023130', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายเอกชัย บุญเรือง', NULL, '56023130', NULL, NULL, 1, 3, '', '', 0, 1),
(22, '56023590', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นางสาวกรรณิการ์ ทาแกง', NULL, '56023590', NULL, NULL, 1, 3, '', '', 0, 1),
(23, '56023602', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายกฤษฎา ควบพิมาย', NULL, '56023602', NULL, NULL, 1, 3, '', '', 0, 1),
(24, '56023613', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายณัฐวัตร ตาเรือนสอน', NULL, '56023613', NULL, NULL, 1, 3, '', '', 0, 1),
(25, '56023635', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายทัศนัย เคลือบสูงเนิน', NULL, '56023635', NULL, NULL, 1, 3, '', '', 0, 1),
(26, '56023646', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายยศวรรธน์ สันธิ', NULL, '56023646', NULL, NULL, 1, 3, '', '', 0, 1),
(27, '56023668', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายอาทิตย์ ถาตุ่ม', NULL, '56023668', NULL, NULL, 1, 3, '', '', 0, 1),
(28, '56025424', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายพงศกร ไชยปัญญา', NULL, '56025424', NULL, NULL, 1, 3, '', '', 0, 1),
(29, '56025637', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายธนกร อนะวัชกุล', NULL, '56025637', NULL, NULL, 1, 3, '', '', 0, 1),
(30, '56025648', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นายวัชรพันธ์ ผัดดี', NULL, '56025648', NULL, NULL, 1, 3, '', '', 0, 1),
(31, '56025659', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, 'นางสาวปราณิสา เก่งการ', NULL, '56025659', NULL, NULL, 1, 3, '', '', 0, 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `member_has_section`
--

CREATE TABLE IF NOT EXISTS `member_has_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL COMMENT 'หมายเลขสมาชิก',
  `section_id` int(11) NOT NULL COMMENT 'หมู่เรียน',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `prefix`
--

CREATE TABLE IF NOT EXISTS `prefix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(45) DEFAULT NULL COMMENT 'คำนำหน้าภาษาไทย',
  `valueEn` varchar(45) DEFAULT NULL COMMENT 'คำนำหน้าภาษาอังกฤษ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- dump ตาราง `prefix`
--

INSERT INTO `prefix` (`id`, `valueTh`, `valueEn`) VALUES
(1, 'นาย', 'Mr.'),
(2, 'นาง,นางสาว', 'Ms.,Mrs.,Miss');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) DEFAULT NULL COMMENT 'สิทธิ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- dump ตาราง `privilege`
--

INSERT INTO `privilege` (`id`, `value`) VALUES
(1, 'administrator'),
(2, 'teacher'),
(3, 'student');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) DEFAULT NULL COMMENT 'หมู่เรียนที่',
  `courseonSemester_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(20) DEFAULT NULL COMMENT 'ภาคการศึกษา',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- dump ตาราง `semester`
--

INSERT INTO `semester` (`id`, `value`) VALUES
(1, 'ต้น'),
(2, 'ปลาย'),
(3, 'ฤดูร้อน');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tel`
--

CREATE TABLE IF NOT EXISTS `tel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(30) DEFAULT NULL COMMENT 'เบอร์โทร(1 เบอร์ต่อ 1 บรรทัด)',
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tel_member1_idx` (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valueTh` varchar(45) DEFAULT NULL,
  `valueEn` varchar(45) DEFAULT NULL,
  `abb` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `university`
--

INSERT INTO `university` (`id`, `valueTh`, `valueEn`, `abb`) VALUES
(1, 'มหาวิทยาลัยพะเยา', 'University of Phayao', 'UP');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `yeared`
--

CREATE TABLE IF NOT EXISTS `yeared` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) DEFAULT NULL COMMENT 'ปีการศึกษา(พ.ศ.)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=6 ;

--
-- dump ตาราง `yeared`
--

INSERT INTO `yeared` (`id`, `value`) VALUES
(4, 2556),
(5, 2557);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
