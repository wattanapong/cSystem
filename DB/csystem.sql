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
  PRIMARY KEY (`id`),
  KEY `fk_faculty_university1_idx` (`university_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

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
  PRIMARY KEY (`id`),
  KEY `fk_major_faculty_idx` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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
  `username` varchar(45) DEFAULT NULL COMMENT 'ชื่อเข้าใช้',
  `password` varchar(45) DEFAULT NULL COMMENT 'รหัสผ่าน',
  `fuser` varchar(100) DEFAULT NULL,
  `prefix_id` int(11) NOT NULL COMMENT 'คำนำหน้า',
  `name` varchar(45) DEFAULT NULL COMMENT 'ชื่อ',
  `surname` varchar(45) DEFAULT NULL COMMENT 'นามสกุล',
  `academic_rank_id` int(11) DEFAULT NULL COMMENT 'ตำแหน่งวิชาการ',
  `date_registered` datetime DEFAULT NULL COMMENT 'วันสมัครสมาชิก',
  `status` int(1) NOT NULL COMMENT 'สถานะสมาชิก',
  `privilege_id` int(11) NOT NULL DEFAULT '3' COMMENT 'ประเภทสมาชิก',
  `tel` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phd` int(1) DEFAULT '0',
  `major_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_member_academic_rank_idx` (`academic_rank_id`),
  KEY `fk_member_status1_idx` (`status`),
  KEY `fk_member_prefix1_idx` (`prefix_id`),
  KEY `fk_member_privilege1_idx` (`privilege_id`),
  KEY `fk_member_major1_idx` (`major_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- dump ตาราง `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `fuser`, `prefix_id`, `name`, `surname`, `academic_rank_id`, `date_registered`, `status`, `privilege_id`, `tel`, `email`, `phd`, `major_id`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '', 1, 'วัฒนพงศ์', 'สุทธภักดิ์', NULL, '2014-03-24 16:52:00', 1, 1, '', '', 0, 2),
(2, 'wattanapong.su', '81dc9bdb52d04dc20036dbd8313ed055', '', 1, 'วัฒนพงศ์', 'สุทธภักดิ์', NULL, NULL, 0, 2, '', '', 0, 2),
(4, 'student', '81dc9bdb52d04dc20036dbd8313ed055', '', 1, '', '', NULL, NULL, 0, 3, '', '', 0, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `university`
--

INSERT INTO `university` (`id`, `valueTh`, `valueEn`, `abb`) VALUES
(1, 'มหาวิทยาลัยพะเยา', 'University of Phayao', 'UP');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `fk_faculty_university1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `major`
--
ALTER TABLE `major`
  ADD CONSTRAINT `fk_major_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
