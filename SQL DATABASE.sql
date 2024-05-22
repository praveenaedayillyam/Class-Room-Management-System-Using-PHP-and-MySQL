-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 01:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id_no` int(50) NOT NULL,
  `att_id` int(20) NOT NULL,
  `upload_date` varchar(50) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `student` varchar(40) NOT NULL,
  `no_of_attendence` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `class` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendence_info`
--

CREATE TABLE `attendence_info` (
  `att_id` int(20) NOT NULL,
  `upload_date` varchar(30) NOT NULL,
  `upload_by` varchar(50) NOT NULL,
  `sem` varchar(30) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `duration` text NOT NULL,
  `total_attendence` int(20) NOT NULL,
  `class` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id_no` int(11) NOT NULL,
  `upload_by` varchar(30) NOT NULL,
  `current` varchar(35) NOT NULL,
  `lec_date` varchar(20) NOT NULL,
  `lec_time` varchar(20) NOT NULL,
  `lec_subject` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `link_code` varchar(30) NOT NULL,
  `lec_description` text NOT NULL,
  `class` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_no` int(11) NOT NULL,
  `current` varchar(30) NOT NULL,
  `fromwho` varchar(25) NOT NULL,
  `msg` text NOT NULL,
  `class` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `metirials`
--

CREATE TABLE `metirials` (
  `id_no` int(11) NOT NULL,
  `upload_by` varchar(75) NOT NULL,
  `upload_date` varchar(50) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `syllabus` longblob NOT NULL,
  `syllabus_description` varchar(50) NOT NULL,
  `sylabus_type` varchar(225) NOT NULL,
  `class` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_no` int(20) NOT NULL,
  `current` varchar(100) NOT NULL,
  `from_who` varchar(50) NOT NULL,
  `to_whom` varchar(50) NOT NULL,
  `Sub` varchar(30) NOT NULL,
  `msg` text NOT NULL,
  `Reply` text DEFAULT NULL,
  `reply_time` varchar(100) NOT NULL,
  `class` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_name` varchar(50) NOT NULL,
  `Reg_no` int(20) NOT NULL,
  `Contact_no` bigint(10) NOT NULL,
  `Email_id` varchar(100) NOT NULL,
  `UG_PG` varchar(5) NOT NULL,
  `class_type` varchar(100) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Year_of_Addmission` int(5) NOT NULL,
  `class` int(20) NOT NULL,
  `Parant_Name` varchar(50) NOT NULL,
  `Parent_Contact_No` bigint(10) NOT NULL,
  `Login_id` varchar(20) NOT NULL,
  `passwrd` varchar(20) NOT NULL,
  `photo_type` varchar(255) NOT NULL,
  `photo` longblob NOT NULL,
  `question` int(5) NOT NULL,
  `ans` text NOT NULL,
  `added` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_work`
--

CREATE TABLE `student_work` (
  `work_id` int(11) NOT NULL,
  `upload_by` varchar(30) NOT NULL,
  `current` varchar(35) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `subjectname` varchar(30) NOT NULL,
  `Work` varchar(50) NOT NULL,
  `Topic` varchar(30) NOT NULL,
  `Last_Date` date NOT NULL,
  `descriptn` text NOT NULL,
  `out_of` int(20) NOT NULL,
  `class` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_name` varchar(25) NOT NULL,
  `Contact_no` varchar(10) NOT NULL,
  `Email_id` varchar(30) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Login_id` varchar(20) NOT NULL,
  `passwrd` varchar(20) NOT NULL,
  `photo_type` varchar(255) NOT NULL,
  `Photo` longblob NOT NULL,
  `question` int(5) NOT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_name`, `Contact_no`, `Email_id`, `Department`, `Login_id`, `passwrd`, `photo_type`, `Photo`, `question`, `ans`) VALUES
('Ayshath Thabsheera', '1234567890', 'thabsheera@gmail.com', '', 'thabsheera', '3Wasdfg', '', '', 1, 'lallu');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutor_id` int(20) NOT NULL,
  `Tutor_name` varchar(25) NOT NULL,
  `Contact_no` varchar(10) NOT NULL,
  `Email_id` varchar(30) NOT NULL,
  `UG_PG` varchar(5) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Year_of_Admission` varchar(4) NOT NULL,
  `class_type` varchar(50) NOT NULL,
  `Login_id` varchar(20) NOT NULL,
  `Passwrd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_id`, `Tutor_name`, `Contact_no`, `Email_id`, `UG_PG`, `Department`, `Year_of_Admission`, `class_type`, `Login_id`, `Passwrd`) VALUES
(25, 'Ayshath Thabsheera', '1234567890', 'thabsheera@gmail.com', 'UG', 'Computer Science', '2018', 'core', 'thabsheera', '3Wasdfg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(25) NOT NULL,
  `Login_id` varchar(20) NOT NULL,
  `Email_id` varchar(50) NOT NULL,
  `class_type` int(10) NOT NULL,
  `passwrd` varchar(25) NOT NULL,
  `class1` int(10) NOT NULL DEFAULT 0,
  `class2` int(10) NOT NULL DEFAULT 0,
  `class3` int(10) NOT NULL DEFAULT 0,
  `class4` int(10) NOT NULL DEFAULT 0,
  `class5` int(10) NOT NULL DEFAULT 0,
  `class6` int(10) NOT NULL DEFAULT 0,
  `class7` int(10) NOT NULL DEFAULT 0,
  `class8` int(10) NOT NULL DEFAULT 0,
  `class9` int(10) NOT NULL DEFAULT 0,
  `class10` int(10) NOT NULL DEFAULT 0,
  `current_class` int(20) NOT NULL,
  `work_id` int(20) NOT NULL DEFAULT 0,
  `att_id` int(20) NOT NULL DEFAULT 0,
  `internal` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `Login_id`, `Email_id`, `class_type`, `passwrd`, `class1`, `class2`, `class3`, `class4`, `class5`, `class6`, `class7`, `class8`, `class9`, `class10`, `current_class`, `work_id`, `att_id`, `internal`) VALUES
('Ayshath Thabsheera', 'thabsheera', 'thabsheera@gmail.com', 10, '3Wasdfg', 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_update`
--

CREATE TABLE `work_update` (
  `work_id` int(11) NOT NULL,
  `id_no` int(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `student` varchar(50) NOT NULL,
  `reg_no` int(20) NOT NULL,
  `submitted_date` varchar(50) NOT NULL,
  `mark` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `attendence_info`
--
ALTER TABLE `attendence_info`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `metirials`
--
ALTER TABLE `metirials`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Login_id`);

--
-- Indexes for table `student_work`
--
ALTER TABLE `student_work`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Login_id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Login_id`);

--
-- Indexes for table `work_update`
--
ALTER TABLE `work_update`
  ADD PRIMARY KEY (`id_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `attendence_info`
--
ALTER TABLE `attendence_info`
  MODIFY `att_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `metirials`
--
ALTER TABLE `metirials`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_work`
--
ALTER TABLE `student_work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `tutor_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `work_update`
--
ALTER TABLE `work_update`
  MODIFY `id_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
