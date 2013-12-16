-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2013 at 02:30 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auto_schedule`
--
CREATE DATABASE IF NOT EXISTS `auto_schedule` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `auto_schedule`;

-- --------------------------------------------------------

--
-- Table structure for table `app_log`
--

CREATE TABLE IF NOT EXISTS `app_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `academic_year_id` int(10) NOT NULL,
  `started` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `number_of_constraint` int(11) NOT NULL,
  `number_of_solved_constraint` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_app_log_master_academic_year` (`academic_year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_academic_year`
--

CREATE TABLE IF NOT EXISTS `master_academic_year` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `semester_id` int(10) NOT NULL,
  `year_start` int(10) NOT NULL,
  `year_end` int(10) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_master_academic_year_master_semester` (`semester_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_class_room`
--

CREATE TABLE IF NOT EXISTS `master_class_room` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `floor` int(2) NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_course`
--

CREATE TABLE IF NOT EXISTS `master_course` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `sks` int(2) NOT NULL,
  `department_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_master_course_master_department` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_day`
--

CREATE TABLE IF NOT EXISTS `master_day` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `day_name` varchar(50) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `master_day`
--

INSERT INTO `master_day` (`id`, `day_name`, `flag`) VALUES
(1, 'minggu', 0),
(2, 'senin', 1),
(3, 'selasa', 1),
(4, 'rabu', 1),
(5, 'kamis', 1),
(6, 'jumat', 1),
(7, 'sabtu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_department`
--

CREATE TABLE IF NOT EXISTS `master_department` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  `faculty_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_master_department_master_faculty` (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_faculty`
--

CREATE TABLE IF NOT EXISTS `master_faculty` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_lecturer`
--

CREATE TABLE IF NOT EXISTS `master_lecturer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `ni` int(10) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_semester`
--

CREATE TABLE IF NOT EXISTS `master_semester` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `semester_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `master_semester`
--

INSERT INTO `master_semester` (`id`, `semester_name`) VALUES
(1, 'ganjil'),
(2, 'genap');

-- --------------------------------------------------------

--
-- Table structure for table `master_shedule`
--

CREATE TABLE IF NOT EXISTS `master_shedule` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `academic_year_id` int(10) NOT NULL,
  `day_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `class_room_id` int(10) NOT NULL,
  `hour_start` int(10) NOT NULL,
  `hour_end` int(10) NOT NULL,
  `counter` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_master_shedule_master_academic_year` (`academic_year_id`),
  KEY `FK_master_shedule_master_day` (`day_id`),
  KEY `FK_master_shedule_master_course` (`course_id`),
  KEY `FK_master_shedule_master_class_room` (`class_room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trx_curriculum`
--

CREATE TABLE IF NOT EXISTS `trx_curriculum` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `academic_year_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `number_of_class` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trx_curriculum_master_academic_year` (`academic_year_id`),
  KEY `FK_trx_curriculum_master_course` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trx_curriculum_room`
--

CREATE TABLE IF NOT EXISTS `trx_curriculum_room` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `trx_curriculum_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trx_curriculum_room_trx_curriculum` (`trx_curriculum_id`),
  KEY `FK_trx_curriculum_room_master_class_room` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trx_lecturer_course`
--

CREATE TABLE IF NOT EXISTS `trx_lecturer_course` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` int(10) NOT NULL,
  `lecturer_id` int(10) NOT NULL,
  `max_sks` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trx_lecturer_course_master_course` (`course_id`),
  KEY `FK_trx_lecturer_course_master_lecturer` (`lecturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trx_lecturer_time`
--

CREATE TABLE IF NOT EXISTS `trx_lecturer_time` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lecturer_id` int(10) NOT NULL,
  `day_id` int(10) NOT NULL,
  `hour_start` int(10) NOT NULL,
  `hour_end` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trx_lecturer_time_master_lecturer` (`lecturer_id`),
  KEY `FK_trx_lecturer_time_master_day` (`day_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trx_room_course`
--

CREATE TABLE IF NOT EXISTS `trx_room_course` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trx_room_course_master_class_room` (`room_id`),
  KEY `FK_trx_room_course_master_course` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_log`
--
ALTER TABLE `app_log`
  ADD CONSTRAINT `FK_app_log_master_academic_year` FOREIGN KEY (`academic_year_id`) REFERENCES `master_academic_year` (`id`);

--
-- Constraints for table `master_academic_year`
--
ALTER TABLE `master_academic_year`
  ADD CONSTRAINT `FK_master_academic_year_master_semester` FOREIGN KEY (`semester_id`) REFERENCES `master_semester` (`id`);

--
-- Constraints for table `master_course`
--
ALTER TABLE `master_course`
  ADD CONSTRAINT `FK_master_course_master_department` FOREIGN KEY (`department_id`) REFERENCES `master_department` (`id`);

--
-- Constraints for table `master_department`
--
ALTER TABLE `master_department`
  ADD CONSTRAINT `FK_master_department_master_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `master_faculty` (`id`);

--
-- Constraints for table `master_shedule`
--
ALTER TABLE `master_shedule`
  ADD CONSTRAINT `FK_master_shedule_master_academic_year` FOREIGN KEY (`academic_year_id`) REFERENCES `master_academic_year` (`id`),
  ADD CONSTRAINT `FK_master_shedule_master_class_room` FOREIGN KEY (`class_room_id`) REFERENCES `master_class_room` (`id`),
  ADD CONSTRAINT `FK_master_shedule_master_course` FOREIGN KEY (`course_id`) REFERENCES `master_course` (`id`),
  ADD CONSTRAINT `FK_master_shedule_master_day` FOREIGN KEY (`day_id`) REFERENCES `master_day` (`id`);

--
-- Constraints for table `trx_curriculum`
--
ALTER TABLE `trx_curriculum`
  ADD CONSTRAINT `FK_trx_curriculum_master_academic_year` FOREIGN KEY (`academic_year_id`) REFERENCES `master_academic_year` (`id`),
  ADD CONSTRAINT `FK_trx_curriculum_master_course` FOREIGN KEY (`course_id`) REFERENCES `master_course` (`id`);

--
-- Constraints for table `trx_curriculum_room`
--
ALTER TABLE `trx_curriculum_room`
  ADD CONSTRAINT `FK_trx_curriculum_room_master_class_room` FOREIGN KEY (`room_id`) REFERENCES `master_class_room` (`id`),
  ADD CONSTRAINT `FK_trx_curriculum_room_trx_curriculum` FOREIGN KEY (`trx_curriculum_id`) REFERENCES `trx_curriculum` (`id`);

--
-- Constraints for table `trx_lecturer_course`
--
ALTER TABLE `trx_lecturer_course`
  ADD CONSTRAINT `FK_trx_lecturer_course_master_course` FOREIGN KEY (`course_id`) REFERENCES `master_course` (`id`),
  ADD CONSTRAINT `FK_trx_lecturer_course_master_lecturer` FOREIGN KEY (`lecturer_id`) REFERENCES `master_lecturer` (`id`);

--
-- Constraints for table `trx_lecturer_time`
--
ALTER TABLE `trx_lecturer_time`
  ADD CONSTRAINT `FK_trx_lecturer_time_master_day` FOREIGN KEY (`day_id`) REFERENCES `master_day` (`id`),
  ADD CONSTRAINT `FK_trx_lecturer_time_master_lecturer` FOREIGN KEY (`lecturer_id`) REFERENCES `master_lecturer` (`id`);

--
-- Constraints for table `trx_room_course`
--
ALTER TABLE `trx_room_course`
  ADD CONSTRAINT `FK_trx_room_course_master_class_room` FOREIGN KEY (`room_id`) REFERENCES `master_class_room` (`id`),
  ADD CONSTRAINT `FK_trx_room_course_master_course` FOREIGN KEY (`course_id`) REFERENCES `master_course` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
