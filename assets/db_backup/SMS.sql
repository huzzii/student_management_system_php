-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2021 at 01:28 AM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `CITY`
--

CREATE TABLE `CITY` (
  `sr_id` int NOT NULL,
  `sr_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CITY`
--

INSERT INTO `CITY` (`sr_id`, `sr_name`, `state_id`) VALUES
(1, 'MUMBAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `CLASS`
--

CREATE TABLE `CLASS` (
  `sr_id` int NOT NULL,
  `class_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_student` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `floor` int NOT NULL,
  `teach_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `COUNTRY`
--

CREATE TABLE `COUNTRY` (
  `sr_id` int NOT NULL,
  `sr_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `COUNTRY`
--

INSERT INTO `COUNTRY` (`sr_id`, `sr_name`) VALUES
(1, 'INDIA');

-- --------------------------------------------------------

--
-- Table structure for table `STATE`
--

CREATE TABLE `STATE` (
  `sr_id` int NOT NULL,
  `sr_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `STATE`
--

INSERT INTO `STATE` (`sr_id`, `sr_name`, `country_id`) VALUES
(1, 'MAHARASHTRA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `STUDENT`
--

CREATE TABLE `STUDENT` (
  `sr_id` int NOT NULL,
  `sr_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `class_id` int NOT NULL,
  `teach_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_teacher`
--

CREATE TABLE `student_teacher` (
  `sr_id` int NOT NULL,
  `student_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_added_from` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sr_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `TEACHER`
--

CREATE TABLE `TEACHER` (
  `sr_id` int NOT NULL,
  `teach_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `qual_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `tel_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int NOT NULL,
  `city_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `sr_id` int NOT NULL,
  `sr_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int NOT NULL,
  `user_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int NOT NULL,
  `state_id` int NOT NULL,
  `city_id` int NOT NULL,
  `picture` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `sr_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`sr_id`, `sr_name`, `emp_id`, `user_name`, `password`, `country_id`, `state_id`, `city_id`, `picture`, `sr_status`) VALUES
(2, 'Huzaif Shaikh', 1, 'huzzii', '12345', 1, 1, 1, 'jdvjdnd.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CITY`
--
ALTER TABLE `CITY`
  ADD PRIMARY KEY (`sr_id`),
  ADD KEY `ADD_STATE_FK_1` (`state_id`);

--
-- Indexes for table `CLASS`
--
ALTER TABLE `CLASS`
  ADD PRIMARY KEY (`sr_id`),
  ADD KEY `ADD_TEACH_FK_1` (`teach_id`);

--
-- Indexes for table `COUNTRY`
--
ALTER TABLE `COUNTRY`
  ADD PRIMARY KEY (`sr_id`);

--
-- Indexes for table `STATE`
--
ALTER TABLE `STATE`
  ADD PRIMARY KEY (`sr_id`),
  ADD KEY `ADD_COUNTRY_ID_1` (`country_id`);

--
-- Indexes for table `STUDENT`
--
ALTER TABLE `STUDENT`
  ADD PRIMARY KEY (`sr_id`),
  ADD KEY `ADD_CLASS_FK` (`class_id`),
  ADD KEY `ADD_TEACH_FK` (`teach_id`);

--
-- Indexes for table `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD PRIMARY KEY (`sr_id`),
  ADD KEY `ADD_STUDENT_FK` (`student_id`),
  ADD KEY `ADD_TEACK_FK_2` (`teacher_id`);

--
-- Indexes for table `TEACHER`
--
ALTER TABLE `TEACHER`
  ADD PRIMARY KEY (`sr_id`),
  ADD KEY `ADD_CLASS_FK_1` (`class_id`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`sr_id`),
  ADD KEY `ADD_COUNTRY_FK` (`country_id`),
  ADD KEY `ADD_STATE_FK` (`state_id`),
  ADD KEY `ADD_CITY_FK` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CITY`
--
ALTER TABLE `CITY`
  MODIFY `sr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `CLASS`
--
ALTER TABLE `CLASS`
  MODIFY `sr_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `COUNTRY`
--
ALTER TABLE `COUNTRY`
  MODIFY `sr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `STATE`
--
ALTER TABLE `STATE`
  MODIFY `sr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `STUDENT`
--
ALTER TABLE `STUDENT`
  MODIFY `sr_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_teacher`
--
ALTER TABLE `student_teacher`
  MODIFY `sr_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TEACHER`
--
ALTER TABLE `TEACHER`
  MODIFY `sr_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `sr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CITY`
--
ALTER TABLE `CITY`
  ADD CONSTRAINT `ADD_STATE_FK_1` FOREIGN KEY (`state_id`) REFERENCES `STATE` (`sr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `CLASS`
--
ALTER TABLE `CLASS`
  ADD CONSTRAINT `ADD_TEACH_FK_1` FOREIGN KEY (`teach_id`) REFERENCES `TEACHER` (`sr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `STATE`
--
ALTER TABLE `STATE`
  ADD CONSTRAINT `ADD_COUNTRY_ID_1` FOREIGN KEY (`country_id`) REFERENCES `COUNTRY` (`sr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `STUDENT`
--
ALTER TABLE `STUDENT`
  ADD CONSTRAINT `ADD_CLASS_FK` FOREIGN KEY (`class_id`) REFERENCES `CLASS` (`sr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ADD_TEACH_FK` FOREIGN KEY (`teach_id`) REFERENCES `TEACHER` (`sr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD CONSTRAINT `ADD_STUDENT_FK` FOREIGN KEY (`student_id`) REFERENCES `STUDENT` (`sr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ADD_TEACK_FK_2` FOREIGN KEY (`teacher_id`) REFERENCES `TEACHER` (`sr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `TEACHER`
--
ALTER TABLE `TEACHER`
  ADD CONSTRAINT `ADD_CLASS_FK_1` FOREIGN KEY (`class_id`) REFERENCES `CLASS` (`sr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `USER`
--
ALTER TABLE `USER`
  ADD CONSTRAINT `ADD_CITY_FK` FOREIGN KEY (`city_id`) REFERENCES `CITY` (`sr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ADD_COUNTRY_FK` FOREIGN KEY (`country_id`) REFERENCES `COUNTRY` (`sr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ADD_STATE_FK` FOREIGN KEY (`state_id`) REFERENCES `STATE` (`sr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
