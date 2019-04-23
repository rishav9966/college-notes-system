-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2019 at 02:46 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RGTECH`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `password`) VALUES
('admin', '$2y$10$uzq6CwkllQnoMnp1YD5n9.Dg5FLJohtyEVNO2dqErhpMY18KixuJe');

-- --------------------------------------------------------

--
-- Table structure for table `ASSIGNMENTS`
--

CREATE TABLE `ASSIGNMENTS` (
  `filepath` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `lastdate` date NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ASSIGNMENTS`
--

INSERT INTO `ASSIGNMENTS` (`filepath`, `filename`, `description`, `lastdate`, `datetime`) VALUES
('../docs/FET/COMPUTER SCIENCE/B.TECH/SEM1/COMPUTER BASICS/assignment/C.pdf', 'C.pdf', '', '2019-04-02', '2019-03-30 15:26:28'),
('../docs/FET/COMPUTER SCIENCE/DIPLOMA/SEM2/COMPUTER BASICS/assignment/', 'Introduction to OpenCV-Python Tutorials â€” OpenCV 3.0.0-dev documentation.pdf', '', '2019-04-03', '2019-04-01 06:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `COLLEGE_LIST`
--

CREATE TABLE `COLLEGE_LIST` (
  `college_id` int(11) NOT NULL,
  `faculty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `COLLEGE_LIST`
--

INSERT INTO `COLLEGE_LIST` (`college_id`, `faculty`) VALUES
(1, 'FET'),
(2, 'FCM'),
(5, 'RCN'),
(6, 'MEDICAL');

-- --------------------------------------------------------

--
-- Table structure for table `COURSE`
--

CREATE TABLE `COURSE` (
  `course_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `COURSE`
--

INSERT INTO `COURSE` (`course_id`, `dept_id`, `course`) VALUES
(1, 1, 'B.TECH'),
(2, 1, 'B.TECH MS'),
(3, 1, 'M.TECH'),
(4, 1, 'BCA'),
(5, 1, 'DIPLOMA'),
(6, 2, 'B.TECH'),
(7, 2, 'B.SC'),
(8, 2, 'M.TECH'),
(9, 2, 'M.SC'),
(10, 2, 'PhD'),
(11, 1, 'PhD'),
(22, 9, 'BBA'),
(23, 15, 'B.TECH');

-- --------------------------------------------------------

--
-- Table structure for table `DEAN`
--

CREATE TABLE `DEAN` (
  `id` int(11) NOT NULL,
  `COLLEGE` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DEPT_LIST`
--

CREATE TABLE `DEPT_LIST` (
  `dept_id` int(11) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `dept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DEPT_LIST`
--

INSERT INTO `DEPT_LIST` (`dept_id`, `faculty`, `dept`) VALUES
(1, 'FET', 'COMPUTER SCIENCE'),
(2, 'FET', 'DEPT OF BIOTECH'),
(3, 'FET', 'DEPT OF MECHANICAL'),
(5, 'FET', 'DEPT OF ELECTRONICS'),
(6, 'FET', 'DEPT OF ELECTRICAL'),
(7, 'FET', 'DEPT OF AGRICULTURE'),
(8, 'FET', 'APPLIED SCIENCE'),
(9, 'FCM', 'DIGITAL MARKETING'),
(10, 'FCM', 'E COMMERCE'),
(15, 'FET', 'DEPT OF CIVIL');

-- --------------------------------------------------------

--
-- Table structure for table `NOTES`
--

CREATE TABLE `NOTES` (
  `filepath` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `NOTES`
--

INSERT INTO `NOTES` (`filepath`, `filename`, `description`, `datetime`) VALUES
('../docs/FET/COMPUTER SCIENCE/B.TECH/SEM1/COMPUTER BASICS/notes/', 'C.pdf', 'c basic\r\n', '2019-03-30 18:26:05'),
('../docs/FET/COMPUTER SCIENCE/B.TECH/SEM1/COMPUTER BASICS/notes/', 'C (copy).pdf', ' c basic loops', '2019-03-30 19:13:18'),
('../docs/FET/COMPUTER SCIENCE/B.TECH/SEM1/COMPUTER BASICS/notes/', 'Introduction to OpenCV-Python Tutorials â€” OpenCV 3.0.0-dev documentation.pdf', 'into to opencv', '2019-03-31 15:38:19'),
('../docs/FET/COMPUTER SCIENCE/B.TECH/SEM1/COMPUTER BASICS/notes/', 'c basic.pdf', 'c basic', '2019-04-01 09:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `PROFESSOR`
--

CREATE TABLE `PROFESSOR` (
  `prof_id` int(11) NOT NULL,
  `prof_name` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'normal',
  `email` varchar(100) NOT NULL,
  `mobile` int(15) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PROFESSOR`
--

INSERT INTO `PROFESSOR` (`prof_id`, `prof_name`, `college`, `dept_id`, `userid`, `role`, `email`, `mobile`, `password`) VALUES
(1, 'HARI OM SHARAN', 'FET', 1, 'hariom.sharan', 'dean', 'hari@gmail.com', 0, '$2y$10$NKgQ56NJxSIZS30FKyTj6OaaC88LZ4Askoil2cLM8HhPIoC7W3zp2'),
(2, 'ASHISH SINGH', 'FET', 1, 'ashish.singh', 'normal', 'ashish@gmail.com', 0, '$2y$10$NKgQ56NJxSIZS30FKyTj6OaaC88LZ4Askoil2cLM8HhPIoC7W3zp2'),
(3, 'PREETI SINGH', 'FET', 1, 'preeti.singh', 'normal', 'preeti@gmail.com', 0, '$2y$10$NKgQ56NJxSIZS30FKyTj6OaaC88LZ4Askoil2cLM8HhPIoC7W3zp2'),
(4, 'RAVI PRAKASH VERMA', 'FET', 1, 'r.p.varma', 'normal', 'rpv@gmail.com', 0, '$2y$10$NKgQ56NJxSIZS30FKyTj6OaaC88LZ4Askoil2cLM8HhPIoC7W3zp2'),
(5, 'SUNIL AVASTHI', 'FET ', 1, 'sunil.avasthi', 'normal', '', 0, '$2y$10$Ke3bUASBgvX6PjrqJNY6ruFv1TIzyCVgK0qnHE//pQJ72FGe3I0gO');

-- --------------------------------------------------------

--
-- Table structure for table `SEMESTER`
--

CREATE TABLE `SEMESTER` (
  `sem_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SEMESTER`
--

INSERT INTO `SEMESTER` (`sem_id`, `course_id`, `sem`) VALUES
(1, 1, 'SEM1'),
(2, 1, 'SEM2'),
(3, 1, 'SEM3'),
(4, 1, 'SEM4'),
(5, 1, 'SEM5'),
(6, 1, 'SEM6'),
(7, 1, 'SEM7'),
(8, 1, 'SEM8'),
(9, 2, 'SEM1'),
(10, 2, 'SEM2'),
(11, 2, 'SEM3'),
(12, 2, 'SEM4'),
(13, 2, 'SEM5'),
(14, 2, 'SEM6'),
(15, 2, 'SEM7'),
(16, 2, 'SEM8'),
(17, 5, 'SEM1'),
(18, 5, 'SEM2'),
(19, 5, 'SEM3'),
(20, 5, 'SEM4'),
(21, 5, 'SEM5'),
(22, 5, 'SEM6'),
(31, 22, 'SEM1'),
(32, 22, 'SEM2'),
(33, 22, 'SEM3'),
(34, 22, 'SEM4'),
(35, 22, 'SEM5'),
(36, 22, 'SEM6'),
(37, 23, 'SEM1'),
(38, 23, 'SEM2'),
(39, 23, 'SEM3'),
(40, 23, 'SEM4'),
(41, 23, 'SEM5'),
(42, 23, 'SEM6'),
(43, 23, 'SEM7'),
(44, 23, 'SEM8');

-- --------------------------------------------------------

--
-- Table structure for table `STUDENT`
--

CREATE TABLE `STUDENT` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile` int(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SUBJECT_TABLE`
--

CREATE TABLE `SUBJECT_TABLE` (
  `sub_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `professor` varchar(100) NOT NULL,
  `prof_userid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SUBJECT_TABLE`
--

INSERT INTO `SUBJECT_TABLE` (`sub_id`, `sem_id`, `subject`, `professor`, `prof_userid`) VALUES
(1, 1, 'MATHEMATICS 1', 'VINOD YADAV', '0'),
(2, 1, 'PHYSICS 1', 'SUNIL', ''),
(3, 1, 'COMPUTER BASICS', 'ASHISH SINGH', 'ashish.singh'),
(4, 1, 'PROFESSIONAL COMMUNICATION', 'DEEKSHA AVASHTHI', '0'),
(5, 1, 'ENGINEERING MECHANICS', 'RAGHVENDRA SINGH', '0'),
(6, 1, 'ENVIRONMENT AND ECOLOGY', 'DEEKSHA RANJAN', '0'),
(7, 2, 'ENGINEERING MATHEMATICS II', 'RATI VAJPAYEE', '0'),
(8, 2, 'ENGINEERING PHYSICS II', 'SUNIL', '0'),
(9, 18, 'COMPUTER BASICS', 'ASHISH SINGH', 'ashish.singh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `COLLEGE_LIST`
--
ALTER TABLE `COLLEGE_LIST`
  ADD PRIMARY KEY (`faculty`),
  ADD KEY `college_id` (`college_id`),
  ADD KEY `college_id_2` (`college_id`);

--
-- Indexes for table `COURSE`
--
ALTER TABLE `COURSE`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `DEAN`
--
ALTER TABLE `DEAN`
  ADD PRIMARY KEY (`COLLEGE`),
  ADD KEY `dean_id` (`id`);

--
-- Indexes for table `DEPT_LIST`
--
ALTER TABLE `DEPT_LIST`
  ADD PRIMARY KEY (`dept_id`) USING BTREE;

--
-- Indexes for table `PROFESSOR`
--
ALTER TABLE `PROFESSOR`
  ADD PRIMARY KEY (`prof_id`);

--
-- Indexes for table `SEMESTER`
--
ALTER TABLE `SEMESTER`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `STUDENT`
--
ALTER TABLE `STUDENT`
  ADD PRIMARY KEY (`roll_no`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD KEY `sid` (`id`);

--
-- Indexes for table `SUBJECT_TABLE`
--
ALTER TABLE `SUBJECT_TABLE`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `COLLEGE_LIST`
--
ALTER TABLE `COLLEGE_LIST`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `COURSE`
--
ALTER TABLE `COURSE`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `DEAN`
--
ALTER TABLE `DEAN`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DEPT_LIST`
--
ALTER TABLE `DEPT_LIST`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `PROFESSOR`
--
ALTER TABLE `PROFESSOR`
  MODIFY `prof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `SEMESTER`
--
ALTER TABLE `SEMESTER`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `STUDENT`
--
ALTER TABLE `STUDENT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SUBJECT_TABLE`
--
ALTER TABLE `SUBJECT_TABLE`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
