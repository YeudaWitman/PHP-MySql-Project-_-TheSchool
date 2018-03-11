-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 09:19 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `admin_role` enum('owner','manager','sales') COLLATE utf8_bin NOT NULL DEFAULT 'sales',
  `admin_phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `admin_email` varchar(20) COLLATE utf8_bin NOT NULL,
  `admin_password` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_image` varchar(500) COLLATE utf8_bin NOT NULL DEFAULT 'empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `admin_name`, `admin_role`, `admin_phone`, `admin_email`, `admin_password`, `admin_image`) VALUES
(1, 'yeuda', 'owner', '0526549948', 'yeudaww@gmail.com', '202cb962ac59075b964b07152d234b70', 'https://gravatar.com/avatar/cd62d88a83461e0b1daa8f2fa31c4dcb?s=512&d=https://codepen.io/assets/avatars/user-avatar-512x512-6e240cf350d2f1cc07c2bed234c3a3bb5f1b237023c204c782622e80d6b212ba.png'),
(2, 'Hu Peng', 'manager', 'number', '', '202cb962ac59075b964b07152d234b70', 'empty'),
(3, 'john doe', 'sales', '0526549948', '', '', 'empty'),
(4, 'Average Joe', 'sales', '', '', '', 'empty'),
(10, 'hdhd', 'sales', 'number', '', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(25) NOT NULL,
  `course_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `course_description` text COLLATE utf8_bin NOT NULL,
  `course_image` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_capacity` int(25) NOT NULL DEFAULT '20'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`, `course_image`, `course_capacity`) VALUES
(1, 'HTML 5', 'Hyper Text Markup Language', 'https://cdn.worldvectorlogo.com/logos/html5.svg', 30),
(2, 'CSS 3', 'Cascading Style Sheets', 'https://cdn.worldvectorlogo.com/logos/css-3.svg', 20),
(3, 'Javascript', 'JavaScript, often abbreviated as JS, is a high-level, dynamic, weakly typed, prototype-based, multi-paradigm, and interpreted programming language. Alongside HTML and CSS, JavaScript is one of the three core technologies of World Wide Web content production. It is used to make webpages interactive and provide online programs, including video games. The majority of websites employ it, and all modern web browsers support it without the need for plug-ins by means of a built-in JavaScript engine. Each of the many JavaScript engines represent a different implementation of JavaScript, all based on the ECMAScript specification, with some engines not supporting the spec fully, and with many engines supporting additional features beyond ECMA.', 'https://cdn.worldvectorlogo.com/logos/javascript.svg', 10),
(8, 'jQuery', 'jQuery is a cross-platform JavaScript library designed to simplify the client-side scripting of HTML. It is free, open-source software using the permissive MIT License. Web analysis indicates that it is the most widely deployed JavaScript library by a large margin', '00.JPG', 20);

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`course_id`, `student_id`) VALUES
(1, 2),
(1, 5),
(1, 6),
(1, 7),
(1, 9),
(1, 46),
(2, 1),
(2, 5),
(2, 7),
(2, 9),
(3, 1),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 78);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `student_phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `student_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `student_image` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `student_phone`, `student_email`, `student_image`) VALUES
(1, 'Thomas E. Funderburg', '0525689489', 'ThomasEFunderburg@rhyta.com', 'empty'),
(2, 'Gerald M. Pace', '0549322106', 'GeraldMPace@dayrep.com', 'empty'),
(3, 'Charles P. Archey', '0533909248', 'CharlesPArchey@teleworm.us', 'empty'),
(4, 'Hilda J. Turner', '0537996951', 'HildaJTurner@rhyta.com', 'empty'),
(5, 'Peter G. Hammond', '0524199410', 'PeterGHammond@jourrapide.com', 'empty'),
(6, 'Milissa J. Stubbs', '0773893715', 'MilissaJStubbs@rhyta.com', 'empty'),
(7, 'Darrell J. Lee', '0527972994', 'DarrellJLee@jourrapide.com', 'empty'),
(8, 'Stephenie M. Staley', '0587405624', ' StephenieMStaley@rhyta.com', 'empty'),
(9, 'Marcus D. Johnson', '0522207554', 'MarcusDJohnson@teleworm.us', 'empty'),
(110, 'Rosa L. Gross', '0582472620', ' RosaLGross@dayrep.com', 'uploads/5aa44092b17b13.54434173.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD UNIQUE KEY `id` (`course_id`);

--
-- Indexes for table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`course_id`,`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
