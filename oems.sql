-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2016 at 01:52 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oems`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `course_name`, `status`) VALUES
(42, 'Programming in c,c++', 0),
(43, 'Java and Internet programming', 0),
(44, '.Net programming', 0),
(45, 'Android development', 0),
(46, 'Web Designing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exams`
--

CREATE TABLE `tbl_exams` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `exam_code` varchar(50) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `evaluation` int(11) NOT NULL,
  `date` date NOT NULL,
  `student_name` int(100) NOT NULL,
  `mobile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`id`, `topic_id`, `name`, `file_name`, `status`) VALUES
(29, 155, 'Basics', 'backup.rar', 0),
(30, 148, 'operators', 'Garden Design.zip', 0),
(32, 151, 'Methods', 'crayons.bmp', 0),
(33, 150, 'overview', 'vlc-record-2016-01-09-15h23m35s-7upDancePattalam-YtPak.com.mp4-.mp4', 0),
(34, 152, 'Abstract', 'ui-icons_222222_256x240.png', 0),
(35, 155, 'PHP(with MVC)', 'calendar.gif', 0),
(36, 157, 'script', 'Two-Swan-Enjoying-Nature-.jpg', 0),
(45, 152, 'script', 'varsh.ppt', 0),
(47, 149, 'Web Drivers', 'background.jpg', 0),
(48, 148, ',mnb', '109378874.jpg', 0),
(55, 148, 'mnbvv', 'doc2.docx', 0),
(57, 149, 'Design', 'OOAD PRINTOUT.docx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id` int(11) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `question_type` varchar(100) NOT NULL,
  `level_of_question` int(11) NOT NULL,
  `time_alloted` time NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `right_answer` varchar(100) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `name`, `status`) VALUES
(1, 'student', 0),
(2, 'trainer', 0),
(3, 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skype`
--

CREATE TABLE `tbl_skype` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `approved_by` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `title` varchar(200) NOT NULL,
  `student_id` int(11) NOT NULL,
  `schedule` datetime DEFAULT NULL,
  `reschedule` datetime DEFAULT NULL,
  `approved_schedule` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skype`
--

INSERT INTO `tbl_skype` (`id`, `course_id`, `topic_id`, `trainer_id`, `approved_by`, `date_time`, `title`, `student_id`, `schedule`, `reschedule`, `approved_schedule`, `status`) VALUES
(110, 42, 147, 4, 0, '2016-09-09 17:09:10', '', 4, '2016-09-01 20:30:00', NULL, NULL, 0),
(111, 42, 147, 4, 0, '2016-09-09 17:09:52', '', 4, '2016-09-01 20:00:00', NULL, NULL, 0),
(112, 42, 147, 4, 0, '2016-09-09 17:15:26', '', 4, '2016-09-01 20:30:00', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_online`
--

CREATE TABLE `tbl_student_online` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_online`
--

INSERT INTO `tbl_student_online` (`id`, `email`, `password`, `status`) VALUES
(4, 'varshinisridhar96@gmail.com', '1231', 0),
(5, 'jklm@gmail.com', '1231', 0),
(6, 'shamthalakshmi@gmail.com', 'shantha', 0),
(7, 'jeyapreethakumar@gmail.com', '145', 0),
(8, 'karmarees@yahoo.co.on', '452', 0),
(9, 'pavi@gmail.com', '000', 0),
(10, 'jessi@gmail.com', '012', 0),
(11, 'sanjay@gmail.com', '452', 0),
(14, 'saji@gmail.com', 'saji', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_online_details`
--

CREATE TABLE `tbl_student_online_details` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `skype_id` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_online_details`
--

INSERT INTO `tbl_student_online_details` (`id`, `student_id`, `name`, `role_id`, `course_id`, `trainer_id`, `skype_id`, `mobile`, `address`) VALUES
(30, 4, 'Varshini', 1, 42, 8, 'varshini.sridhar1', '123456789', 'theni'),
(31, 5, 'jeyapreetha', 1, 45, 6, '', '9894593074', 'Madurai'),
(32, 6, 'Shantha', 1, 46, 0, 'nisha.ammu24', '7894561230', 'salem'),
(33, 7, 'bala', 1, 44, 8, 'jeyapreetha27', '9894593074', 'theni'),
(34, 8, 'karnees', 1, 42, 7, 'varshini.sridhar1', '7895462310', 'Madurai'),
(35, 9, 'pavi', 1, 42, 0, 'sai', '7895462310', 'fghjkl;'),
(36, 10, 'jessi', 1, 42, 0, 'jessia', '9629545064', 'sahgv'),
(37, 11, 'sanjay', 1, 43, 0, 'sanjay', '9629545064', ''),
(40, 14, 'SajiKhan', 1, 42, 0, '001', '870p', 'saudi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topic`
--

CREATE TABLE `tbl_topic` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_topic`
--

INSERT INTO `tbl_topic` (`id`, `course_id`, `topic_name`, `status`, `duration`) VALUES
(147, 42, 'Command line arguments ', 0, '01:00:00'),
(148, 42, 'Bitwise Operators in C and C++', 0, '01:00:00'),
(149, 42, 'File I/O in C', 0, '01:00:00'),
(150, 43, 'Overview Of Programming With Java', 0, '02:00:00'),
(151, 43, 'Methods Overiding, Overloading', 0, '02:00:00'),
(152, 43, 'Abstract Class And Methods', 0, '01:00:00'),
(153, 43, 'Object Oriented Concepts', 0, '01:00:00'),
(154, 43, 'Multithreaded Programming', 0, '01:00:00'),
(155, 46, 'PHP', 0, '02:00:00'),
(157, 46, 'JavaScript', 0, '01:00:00'),
(158, 46, 'jQuery', 0, '02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainer`
--

CREATE TABLE `tbl_trainer` (
  `id` int(11) NOT NULL,
  `trainer_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `trainer_skype_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trainer`
--

INSERT INTO `tbl_trainer` (`id`, `trainer_name`, `username`, `password`, `role_id`, `trainer_skype_id`) VALUES
(4, 'Varshini Sridhar', 'qaz', 'plm', 3, 'varshini.sridhar1'),
(6, 'preetha Mariappan', '', 'preetha', 2, 'varshini.sridhar1'),
(7, 'mathavan', '', '', 2, 'mathavan1'),
(8, 'Vaishnavi', '', '', 2, 'Vaishnavi4'),
(20, 'mathi', '', '', 2, 'jeyapreetha27'),
(21, 'nandy', 'swamy', 'swamy', 3, 'nandy001'),
(28, 'vijaya', 'vijaya', 'saji', 2, 'vijaya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_webinar`
--

CREATE TABLE `tbl_webinar` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `schedule` datetime NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `webinar_url` varchar(2000) NOT NULL,
  `meeting_number` varchar(200) NOT NULL,
  `meeting_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_webinar`
--

INSERT INTO `tbl_webinar` (`id`, `course_id`, `topic_id`, `trainer_id`, `date_time`, `title`, `schedule`, `description`, `status`, `webinar_url`, `meeting_number`, `meeting_password`) VALUES
(12, 45, 152, 7, '2016-08-26 17:00:14', 'Workshop in Android', '2016-09-01 07:00:00', 'Android app testing', 0, '', '', ''),
(13, 46, 155, 6, '2016-08-29 11:14:31', 'data security -workshop', '2016-08-26 15:30:00', 'data security -workshop', 0, '', '', ''),
(14, 42, 149, 4, '2016-08-31 11:02:03', 'C progarmming', '2016-08-19 16:00:00', 'c basics', 0, '', '', ''),
(15, 46, 155, 21, '2016-09-06 14:33:58', 'webinar', '2016-09-09 10:00:00', 'abcd', 0, 'https://meetings.webex.com/collabs/meetings/join?uuid=MA2W3WKM3PIHELHCNFM8K0FNIQ-4O2&epwd=e52d421206050e03425d00', '191 256 241', 'abcd1223'),
(16, 42, 155, 28, '2016-09-07 10:42:46', 'qaz', '2016-09-08 17:00:00', 'plm', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_webinar_participants`
--

CREATE TABLE `tbl_webinar_participants` (
  `id` int(11) NOT NULL,
  `webinar_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exams`
--
ALTER TABLE `tbl_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_skype`
--
ALTER TABLE `tbl_skype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_online`
--
ALTER TABLE `tbl_student_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_online_details`
--
ALTER TABLE `tbl_student_online_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_topic`
--
ALTER TABLE `tbl_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_trainer`
--
ALTER TABLE `tbl_trainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_webinar`
--
ALTER TABLE `tbl_webinar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_webinar_participants`
--
ALTER TABLE `tbl_webinar_participants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tbl_exams`
--
ALTER TABLE `tbl_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_skype`
--
ALTER TABLE `tbl_skype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `tbl_student_online`
--
ALTER TABLE `tbl_student_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_student_online_details`
--
ALTER TABLE `tbl_student_online_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_topic`
--
ALTER TABLE `tbl_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `tbl_trainer`
--
ALTER TABLE `tbl_trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_webinar`
--
ALTER TABLE `tbl_webinar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_webinar_participants`
--
ALTER TABLE `tbl_webinar_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
