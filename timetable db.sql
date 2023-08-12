-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 11:01 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `id` int(3) DEFAULT NULL,
  `fName` varchar(20) DEFAULT NULL,
  `fid` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_activity`
--

INSERT INTO `tbl_activity` (`id`, `fName`, `fid`) VALUES
(1, 'Simi', '01'),
(2, 'Mentoring', '02'),
(3, 'G.L', '03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` varchar(50) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `adminpswd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminname`, `adminpswd`) VALUES
('admin@gmail.com', 'admin', 'sstm'),
('admin2@gmail.com', 'admin2', 'sstm2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allocation`
--

CREATE TABLE `tbl_allocation` (
  `sid` int(50) NOT NULL,
  `subid` varchar(10) NOT NULL,
  `bid` int(50) NOT NULL,
  `semid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `fid` int(5) NOT NULL,
  `Status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_allocation`
--

INSERT INTO `tbl_allocation` (`sid`, `subid`, `bid`, `semid`, `pid`, `fid`, `Status`) VALUES
(40, '67', 5, 9, 46, 2, 1),
(41, '68', 5, 9, 46, 3, 1),
(42, '69', 5, 9, 46, 11, 1),
(43, '70', 5, 9, 46, 5, 1),
(44, '72', 5, 9, 46, 5, 1),
(45, '71', 5, 9, 46, 6, 1),
(46, '73', 5, 9, 46, 10, 1),
(47, '60', 6, 7, 46, 7, 1),
(48, '61', 6, 7, 46, 6, 1),
(49, '62', 6, 7, 46, 5, 1),
(50, '66', 6, 7, 46, 5, 1),
(51, '63', 6, 7, 46, 11, 1),
(52, '64', 6, 7, 46, 10, 1),
(53, '65', 6, 7, 46, 2, 1),
(54, '53', 7, 5, 46, 15, 1),
(55, '54', 7, 5, 46, 3, 1),
(56, '55', 7, 5, 46, 4, 1),
(57, '56', 7, 5, 46, 14, 1),
(58, '57', 7, 5, 46, 8, 1),
(59, '58', 7, 5, 46, 3, 1),
(60, '59', 7, 5, 46, 4, 1),
(61, '46', 8, 3, 46, 8, 1),
(62, '47', 8, 3, 46, 7, 1),
(63, '48', 8, 3, 46, 6, 1),
(64, '49', 8, 3, 46, 11, 1),
(65, '50', 8, 3, 46, 4, 1),
(66, '52', 8, 3, 46, 4, 1),
(67, '51', 8, 3, 46, 10, 1),
(68, '39', 9, 1, 46, 9, 1),
(69, '40', 9, 1, 46, 2, 1),
(70, '42', 9, 1, 46, 8, 1),
(71, '44', 9, 1, 46, 8, 1),
(72, '41', 9, 1, 46, 18, 1),
(73, '43', 9, 1, 46, 7, 1),
(74, '45', 9, 1, 46, 7, 1),
(86, '128', 20, 2, 44, 13, 1),
(87, '129', 20, 2, 44, 14, 1),
(88, '130', 20, 2, 44, 15, 1),
(89, '131', 20, 2, 44, 16, 1),
(90, '132', 20, 2, 44, 10, 1),
(92, '134', 20, 2, 44, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE `tbl_batch` (
  `bid` int(5) NOT NULL,
  `pid` int(10) NOT NULL,
  `bName` varchar(100) NOT NULL,
  `bFrom` varchar(10) NOT NULL,
  `bTo` varchar(10) NOT NULL,
  `bCurrentSem` int(10) NOT NULL,
  `bStatus` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`bid`, `pid`, `bName`, `bFrom`, `bTo`, `bCurrentSem`, `bStatus`) VALUES
(5, 46, 'IMCA B5', '2018-08-04', '2023-06-01', 9, 1),
(6, 46, 'IMCA B6', '2019-08-02', '2024-06-04', 7, 1),
(7, 46, 'IMCA B7', '2020-08-04', '2025-06-03', 5, 1),
(8, 46, 'IMCA B8', '2021-08-03', '2026-06-01', 3, 1),
(9, 46, 'IMCA B9', '2022-08-03', '2027-06-01', 1, 1),
(16, 48, 'BCA B1', '2023-04-05', '2023-04-27', 6, 1),
(17, 48, 'BCA B2', '2023-04-13', '2023-04-30', 4, 1),
(18, 48, 'BCA B3', '2023-04-25', '2023-04-15', 2, 1),
(19, 44, 'MCA 12', '2023-04-28', '2023-04-15', 4, 1),
(20, 44, 'MCA B13', '2023-04-11', '2023-04-15', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `fid` int(5) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `fDesignation` varchar(100) NOT NULL,
  `fQualification` varchar(100) NOT NULL,
  `fEmail` varchar(100) NOT NULL,
  `fPhone` bigint(20) NOT NULL,
  `fGender` varchar(100) NOT NULL,
  `fStatus` int(10) NOT NULL DEFAULT 1,
  `fSubcount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`fid`, `fName`, `fDesignation`, `fQualification`, `fEmail`, `fPhone`, `fGender`, `fStatus`, `fSubcount`) VALUES
(2, 'Mintu ', 'Asst. Professor', 'MCA', 'mintu@scmsgroup.org', 9985473210, 'f', 1, 4),
(3, 'Jacob', 'Guest Lecturer', 'MCA', 'jacob@scmsgroup.org', 9658742513, 'm', 1, 4),
(4, 'Sony', 'Professor', 'M.Tech', 'sony@scmsgroup.org', 9544621245, 'f', 1, 4),
(5, 'Reshma', 'Professor', 'MCA', 'reshma@scmsgroup.org', 9547863210, 'f', 1, 4),
(6, 'Arun', 'Professor', 'MCA', 'arun@scmsgroup.org', 9875421630, 'm', 1, 4),
(7, 'Peter', 'Asst. Professor', 'MCA', 'peter@scmsgroup.org', 9856742130, 'm', 1, 4),
(8, 'Latha', 'Professor', 'MCA', 'latha@scmsgroup.org', 956328417, 'f', 1, 4),
(9, 'Anjali', 'Professor', 'MA', 'anjali@scmsgroup.org', 9556526673, 'f', 1, 2),
(10, 'Hiba', 'Professor', 'MCA', 'hiba@scmsgroup.org', 9547310254, 'f', 1, 4),
(11, 'Priya', 'Professor', 'MCA', 'priya@scmsgroup.org', 9541236521, 'f', 1, 4),
(12, 'Simi', 'Librarian', 'B.Lib.Sc', 'simi@scmsgroup.org', 8546721301, 'f', 1, 1),
(13, 'Rejisha', 'Asst. Professor', 'MCA', 'rejisha@scmsgroup.org', 9856214730, 'f', 1, 4),
(14, 'Pramod', 'Asst. Professor', 'MCA', 'pramod@scmsgroup.org', 8965471250, 'm', 1, 4),
(15, 'Jane', 'Professor', 'MCA', 'jane@scmsgroup.org', 9874562103, 'f', 1, 4),
(16, 'Sijo', 'Professor', 'MCA', 'sijo@scmsgroup.org', 9875461230, 'm', 1, 4),
(17, 'Manisha', 'Professor', 'MCA', 'manisha@scmsgroup.org', 9854762130, 'f', 1, 2),
(18, 'Vishal', 'Professor', 'MCA', 'vishal@scmsgroup.org', 8954762103, 'm', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invigilation`
--

CREATE TABLE `tbl_invigilation` (
  `invigilationid` int(3) NOT NULL,
  `fid` int(3) NOT NULL,
  `date` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_invigilation`
--

INSERT INTO `tbl_invigilation` (`invigilationid`, `fid`, `date`, `day`, `session`, `status`) VALUES
(1, 2, '2023-02-06', 'Monday', 'Morning', 1),
(2, 3, '2022-12-06', 'Tuesday', 'Afternoon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mentoringfaculty`
--

CREATE TABLE `tbl_mentoringfaculty` (
  `mid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mentoringfaculty`
--

INSERT INTO `tbl_mentoringfaculty` (`mid`, `bid`, `fid`) VALUES
(1, 5, 2),
(2, 5, 5),
(3, 5, 3),
(4, 5, 4),
(5, 6, 6),
(6, 6, 7),
(7, 6, 8),
(8, 6, 9),
(9, 7, 10),
(10, 7, 11),
(11, 7, 12),
(12, 8, 13),
(13, 8, 14),
(14, 8, 15),
(15, 8, 16),
(16, 9, 17),
(17, 9, 18),
(18, 9, 2),
(19, 9, 3),
(20, 20, 4),
(21, 20, 5),
(22, 20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `pid` int(10) NOT NULL,
  `pName` varchar(100) NOT NULL,
  `semesters` int(2) NOT NULL,
  `pstatus` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`pid`, `pName`, `semesters`, `pstatus`) VALUES
(44, 'MCA', 4, 1),
(46, 'IMCA', 10, 1),
(48, 'BCA', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `semid` int(5) NOT NULL,
  `semName` varchar(50) NOT NULL,
  `semStatus` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`semid`, `semName`, `semStatus`) VALUES
(1, 'One', 1),
(2, 'Two', 1),
(3, 'Three', 1),
(4, 'Four', 1),
(5, 'Five', 1),
(6, 'Six', 0),
(7, 'Seven', 1),
(8, 'Eight', 1),
(9, 'Nine', 1),
(10, 'Ten', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subid` int(3) NOT NULL,
  `subname` varchar(100) NOT NULL,
  `subtype` tinyint(1) NOT NULL,
  `pid` int(5) NOT NULL,
  `semid` int(5) NOT NULL,
  `subcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subid`, `subname`, `subtype`, `pid`, `semid`, `subcount`) VALUES
(39, 'English', 1, 46, 1, 0),
(40, 'Computer Organization and Architecture', 1, 46, 1, 0),
(41, 'Statistics-I', 1, 46, 1, 0),
(42, 'PC Hardware', 1, 46, 1, 0),
(43, 'Programming in C', 1, 46, 1, 0),
(44, 'PC Hardware Practicals', 0, 46, 1, 0),
(45, 'C Practicals', 0, 46, 1, 0),
(46, 'MFCS', 1, 46, 3, 0),
(47, 'Operating Systems', 1, 46, 3, 0),
(48, 'DBMS', 1, 46, 3, 0),
(49, 'Multimedia', 1, 46, 3, 0),
(50, 'C#', 1, 46, 3, 0),
(51, 'Microprocessors', 0, 46, 3, 0),
(52, 'C# Practicals', 0, 46, 3, 0),
(53, 'Operations Research', 1, 46, 5, 0),
(54, 'Compiler Design', 1, 46, 5, 2),
(55, 'Distributed Computing', 1, 46, 5, 0),
(56, 'Computer Networks', 1, 46, 5, 0),
(57, 'Software Engineering', 1, 46, 5, 0),
(58, 'Compiler Design Practicals', 0, 46, 5, 0),
(59, 'Cloud Computing Practicals', 0, 46, 5, 0),
(60, 'PMA', 1, 46, 7, 0),
(61, 'Analysis and Design of Algorithms', 1, 46, 7, 0),
(62, 'OOPs through Java', 1, 46, 7, 0),
(63, 'Software Engineering', 1, 46, 7, 0),
(64, 'OOAD', 1, 46, 7, 0),
(65, 'PHP Programming Practicals', 0, 46, 7, 0),
(66, 'Java Practicals', 0, 46, 7, 0),
(67, 'UI Design', 1, 46, 9, 0),
(68, 'Knowledge Management', 1, 46, 9, 0),
(69, 'ERP', 1, 46, 9, 0),
(70, 'Advanced Java', 1, 46, 9, 0),
(71, 'Information Security (Elective)', 1, 46, 9, 0),
(72, 'Advanced Java Practicals', 0, 46, 9, 0),
(73, 'Python Programming Practical', 0, 46, 9, 0),
(85, 'English-I', 1, 48, 1, 4),
(86, 'Mathematics', 1, 48, 1, 4),
(87, 'Basic Statistics', 1, 48, 1, 4),
(88, 'Computer Fundamentals and Digital Principles', 1, 48, 1, 4),
(89, 'Methodology of Programming and C Language', 1, 48, 1, 4),
(90, 'Software Lab-I', 0, 48, 1, 4),
(91, 'English II', 1, 48, 2, 4),
(92, 'Discrete Mathematics', 1, 48, 2, 4),
(93, 'DBMS', 1, 48, 2, 4),
(94, 'COA', 1, 48, 2, 4),
(95, 'OOP using C++', 1, 48, 2, 4),
(96, 'Software Lab-II', 0, 48, 2, 4),
(97, 'Advanced Statistical Methods', 1, 48, 3, 4),
(98, 'Computer Graphics', 1, 48, 3, 4),
(99, 'Microprocessor and PC Hardware', 1, 48, 3, 4),
(100, 'Operating Systems', 1, 48, 3, 4),
(101, 'Data Structure using C++', 1, 48, 3, 4),
(102, 'Software Lab-III', 0, 48, 3, 4),
(103, 'Operational Research', 1, 48, 4, 4),
(104, 'Design and Analysis of Algorithms', 1, 48, 4, 4),
(105, 'System Analysis and Software Engineering', 1, 48, 4, 4),
(106, 'Linux Administration', 1, 48, 4, 4),
(107, 'Web Programming using PHP', 1, 48, 4, 4),
(108, 'Software Lab-IV', 0, 48, 4, 4),
(109, 'Computer Networks', 1, 48, 5, 4),
(110, 'IT and Environment', 1, 48, 5, 4),
(111, 'Java Programming using Linux', 1, 48, 5, 4),
(112, 'Open Course', 1, 48, 5, 4),
(113, 'Software Lab V', 0, 48, 5, 4),
(114, 'Mini Project in PHP', 0, 48, 5, 4),
(115, 'Cloud Computing', 1, 48, 6, 4),
(116, 'Mobile Application development - Android', 1, 48, 6, 4),
(117, 'Elective', 1, 48, 6, 4),
(118, 'Software Lab VI & Seminar', 0, 48, 6, 4),
(119, 'Main Project', 0, 48, 6, 4),
(120, 'Mathematical and Statistical foundation for Computer Applications', 1, 44, 1, 4),
(121, 'Digital Logic and Computer Organization', 1, 44, 1, 4),
(122, 'Structured Programming in C', 1, 44, 1, 4),
(123, 'Software Engineering and Object Oriented Modeling', 1, 44, 1, 4),
(124, 'Database technology and NoSQL', 1, 44, 1, 4),
(125, 'Database technology Lab', 0, 44, 1, 4),
(126, 'Software Development Lab-I', 0, 44, 1, 4),
(127, 'Employability Skill Training', 1, 44, 1, 4),
(128, 'Organization techniques for Computer Applications', 1, 44, 2, 0),
(129, 'Data Structures and Algorithm Analysis', 1, 44, 2, 0),
(130, 'Computer Networking with TCP/IP', 1, 44, 2, 0),
(131, 'Data Science & Big Data Analytics', 1, 44, 2, 0),
(132, 'Java Lab', 0, 44, 2, 2),
(133, 'Software development Lab-II (PHP)', 0, 44, 1, 4),
(134, 'Data Structures Lab using C', 0, 44, 2, 0),
(135, 'Machine Learning Techniques', 1, 44, 3, 4),
(136, 'Cyber Forensics', 1, 44, 3, 4),
(137, 'Elective I', 1, 44, 3, 4),
(138, 'Elective-2', 1, 44, 3, 4),
(139, 'Python Programming for Data Science', 1, 44, 3, 4),
(140, 'Advanced Operating System Lab using Linux', 0, 44, 3, 4),
(141, 'Mini Project', 0, 44, 3, 4),
(142, 'Employability Skill Training- Phase 2', 1, 44, 3, 4),
(143, 'Seminar', 1, 44, 4, 4),
(144, 'Main Project', 1, 44, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timetable`
--

CREATE TABLE `tbl_timetable` (
  `id` int(5) NOT NULL,
  `bid` int(10) NOT NULL,
  `semid` int(10) NOT NULL,
  `day` varchar(10) NOT NULL,
  `hour` int(5) NOT NULL,
  `subid` int(10) NOT NULL,
  `fid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_timetable`
--

INSERT INTO `tbl_timetable` (`id`, `bid`, `semid`, `day`, `hour`, `subid`, `fid`) VALUES
(1, 5, 9, 'Monday', 1, 67, 2),
(2, 5, 9, 'Monday', 2, 68, 3),
(3, 5, 9, 'Monday', 3, 1, 1),
(4, 5, 9, 'Monday', 4, 69, 11),
(5, 5, 9, 'Monday', 5, 70, 5),
(6, 5, 9, 'Monday', 6, 71, 6),
(7, 5, 9, 'Tuesday', 1, 68, 3),
(8, 5, 9, 'Tuesday', 2, 69, 11),
(9, 5, 9, 'Tuesday', 3, 70, 5),
(10, 5, 9, 'Tuesday', 4, 72, 5),
(11, 5, 9, 'Tuesday', 5, 72, 5),
(12, 5, 9, 'Tuesday', 6, 71, 6),
(13, 5, 9, 'Wednesday', 1, 69, 11),
(14, 5, 9, 'Wednesday', 2, 2, 0),
(15, 5, 9, 'Wednesday', 3, 70, 5),
(16, 5, 9, 'Wednesday', 4, 72, 5),
(17, 5, 9, 'Wednesday', 5, 72, 5),
(18, 5, 9, 'Wednesday', 6, 71, 6),
(19, 5, 9, 'Thursday', 1, 70, 5),
(20, 5, 9, 'Thursday', 2, 71, 6),
(21, 5, 9, 'Thursday', 3, 73, 10),
(22, 5, 9, 'Thursday', 4, 73, 10),
(23, 5, 9, 'Thursday', 5, 67, 2),
(24, 5, 9, 'Thursday', 6, 68, 3),
(25, 5, 9, 'Friday', 1, 73, 10),
(26, 5, 9, 'Friday', 2, 73, 10),
(27, 5, 9, 'Friday', 3, 67, 2),
(28, 5, 9, 'Friday', 4, 68, 3),
(29, 5, 9, 'Friday', 5, 69, 11),
(30, 5, 9, 'Friday', 6, 67, 2),
(31, 5, 9, 'Saturday', 1, 3, 0),
(32, 5, 9, 'Saturday', 2, 3, 0),
(33, 5, 9, 'Saturday', 3, 3, 0),
(34, 5, 9, 'Saturday', 4, 3, 0),
(35, 5, 9, 'Saturday', 5, 3, 0),
(36, 5, 9, 'Saturday', 6, 3, 0),
(37, 6, 7, 'Monday', 1, 60, 7),
(38, 6, 7, 'Monday', 2, 61, 6),
(39, 6, 7, 'Monday', 3, 62, 5),
(40, 6, 7, 'Monday', 4, 64, 10),
(41, 6, 7, 'Monday', 5, 65, 2),
(42, 6, 7, 'Monday', 6, 65, 2),
(43, 6, 7, 'Tuesday', 1, 61, 6),
(44, 6, 7, 'Tuesday', 2, 62, 5),
(45, 6, 7, 'Tuesday', 3, 1, 1),
(46, 6, 7, 'Tuesday', 4, 63, 11),
(47, 6, 7, 'Tuesday', 5, 64, 10),
(48, 6, 7, 'Tuesday', 6, 60, 7),
(49, 6, 7, 'Wednesday', 1, 62, 5),
(50, 6, 7, 'Wednesday', 2, 63, 11),
(51, 6, 7, 'Wednesday', 3, 64, 10),
(52, 6, 7, 'Wednesday', 4, 65, 2),
(53, 6, 7, 'Wednesday', 5, 65, 2),
(54, 6, 7, 'Wednesday', 6, 60, 7),
(55, 6, 7, 'Thursday', 1, 63, 11),
(56, 6, 7, 'Thursday', 2, 64, 10),
(57, 6, 7, 'Thursday', 3, 2, 0),
(58, 6, 7, 'Thursday', 4, 60, 7),
(59, 6, 7, 'Thursday', 5, 61, 6),
(60, 6, 7, 'Thursday', 6, 62, 5),
(61, 6, 7, 'Friday', 1, 63, 11),
(62, 6, 7, 'Friday', 2, 61, 6),
(63, 6, 7, 'Friday', 3, 66, 5),
(64, 6, 7, 'Friday', 4, 66, 5),
(65, 6, 7, 'Friday', 5, 3, 0),
(66, 6, 7, 'Friday', 6, 3, 0),
(67, 6, 7, 'Saturday', 1, 66, 5),
(68, 6, 7, 'Saturday', 2, 66, 5),
(69, 6, 7, 'Saturday', 3, 3, 0),
(70, 6, 7, 'Saturday', 4, 3, 0),
(71, 6, 7, 'Saturday', 5, 3, 0),
(72, 6, 7, 'Saturday', 6, 3, 0),
(73, 7, 5, 'Monday', 1, 53, 15),
(74, 7, 5, 'Monday', 2, 55, 4),
(75, 7, 5, 'Monday', 3, 56, 14),
(76, 7, 5, 'Monday', 4, 57, 8),
(77, 7, 5, 'Monday', 5, 58, 3),
(78, 7, 5, 'Monday', 6, 58, 3),
(79, 7, 5, 'Tuesday', 1, 55, 4),
(80, 7, 5, 'Tuesday', 2, 56, 14),
(81, 7, 5, 'Tuesday', 3, 57, 8),
(82, 7, 5, 'Tuesday', 4, 58, 3),
(83, 7, 5, 'Tuesday', 5, 58, 3),
(84, 7, 5, 'Tuesday', 6, 53, 15),
(85, 7, 5, 'Wednesday', 1, 55, 4),
(86, 7, 5, 'Wednesday', 2, 56, 14),
(87, 7, 5, 'Wednesday', 3, 1, 1),
(88, 7, 5, 'Wednesday', 4, 57, 8),
(89, 7, 5, 'Wednesday', 5, 59, 4),
(90, 7, 5, 'Wednesday', 6, 59, 4),
(91, 7, 5, 'Thursday', 1, 56, 14),
(92, 7, 5, 'Thursday', 2, 57, 8),
(93, 7, 5, 'Thursday', 3, 59, 4),
(94, 7, 5, 'Thursday', 4, 59, 4),
(95, 7, 5, 'Thursday', 5, 53, 15),
(96, 7, 5, 'Thursday', 6, 55, 4),
(97, 7, 5, 'Friday', 1, 53, 15),
(98, 7, 5, 'Friday', 2, 54, 3),
(99, 7, 5, 'Friday', 3, 2, 0),
(100, 7, 5, 'Friday', 4, 3, 0),
(101, 7, 5, 'Friday', 5, 3, 0),
(102, 7, 5, 'Friday', 6, 3, 0),
(103, 7, 5, 'Saturday', 1, 54, 3),
(104, 7, 5, 'Saturday', 2, 3, 0),
(105, 7, 5, 'Saturday', 3, 3, 0),
(106, 7, 5, 'Saturday', 4, 3, 0),
(107, 7, 5, 'Saturday', 5, 3, 0),
(108, 7, 5, 'Saturday', 6, 3, 0),
(109, 8, 3, 'Monday', 1, 46, 8),
(110, 8, 3, 'Monday', 2, 2, 0),
(111, 8, 3, 'Monday', 3, 47, 7),
(112, 8, 3, 'Monday', 4, 48, 6),
(113, 8, 3, 'Monday', 5, 49, 11),
(114, 8, 3, 'Monday', 6, 50, 4),
(115, 8, 3, 'Tuesday', 1, 47, 7),
(116, 8, 3, 'Tuesday', 2, 48, 6),
(117, 8, 3, 'Tuesday', 3, 49, 11),
(118, 8, 3, 'Tuesday', 4, 50, 4),
(119, 8, 3, 'Tuesday', 5, 52, 4),
(120, 8, 3, 'Tuesday', 6, 52, 4),
(121, 8, 3, 'Wednesday', 1, 48, 6),
(122, 8, 3, 'Wednesday', 2, 50, 4),
(123, 8, 3, 'Wednesday', 3, 52, 4),
(124, 8, 3, 'Wednesday', 4, 52, 4),
(125, 8, 3, 'Wednesday', 5, 51, 10),
(126, 8, 3, 'Wednesday', 6, 51, 10),
(127, 8, 3, 'Thursday', 1, 50, 4),
(128, 8, 3, 'Thursday', 2, 47, 7),
(129, 8, 3, 'Thursday', 3, 48, 6),
(130, 8, 3, 'Thursday', 4, 1, 1),
(131, 8, 3, 'Thursday', 5, 49, 11),
(132, 8, 3, 'Thursday', 6, 46, 8),
(133, 8, 3, 'Friday', 1, 46, 8),
(134, 8, 3, 'Friday', 2, 47, 7),
(135, 8, 3, 'Friday', 3, 49, 11),
(136, 8, 3, 'Friday', 4, 51, 10),
(137, 8, 3, 'Friday', 5, 51, 10),
(138, 8, 3, 'Friday', 6, 46, 8),
(139, 8, 3, 'Saturday', 1, 3, 0),
(140, 8, 3, 'Saturday', 2, 3, 0),
(141, 8, 3, 'Saturday', 3, 3, 0),
(142, 8, 3, 'Saturday', 4, 3, 0),
(143, 8, 3, 'Saturday', 5, 3, 0),
(144, 8, 3, 'Saturday', 6, 3, 0),
(145, 9, 1, 'Monday', 1, 39, 9),
(146, 9, 1, 'Monday', 2, 40, 2),
(147, 9, 1, 'Monday', 3, 42, 8),
(148, 9, 1, 'Monday', 4, 41, 18),
(149, 9, 1, 'Monday', 5, 43, 7),
(150, 9, 1, 'Monday', 6, 39, 9),
(151, 9, 1, 'Tuesday', 1, 40, 2),
(152, 9, 1, 'Tuesday', 2, 2, 0),
(153, 9, 1, 'Tuesday', 3, 41, 18),
(154, 9, 1, 'Tuesday', 4, 43, 7),
(155, 9, 1, 'Tuesday', 5, 39, 9),
(156, 9, 1, 'Tuesday', 6, 40, 2),
(157, 9, 1, 'Wednesday', 1, 42, 8),
(158, 9, 1, 'Wednesday', 2, 44, 8),
(159, 9, 1, 'Wednesday', 3, 44, 8),
(160, 9, 1, 'Wednesday', 4, 41, 18),
(161, 9, 1, 'Wednesday', 5, 43, 7),
(162, 9, 1, 'Wednesday', 6, 39, 9),
(163, 9, 1, 'Thursday', 1, 41, 18),
(164, 9, 1, 'Thursday', 2, 40, 2),
(165, 9, 1, 'Thursday', 3, 42, 8),
(166, 9, 1, 'Thursday', 4, 44, 8),
(167, 9, 1, 'Thursday', 5, 44, 8),
(168, 9, 1, 'Thursday', 6, 43, 7),
(169, 9, 1, 'Friday', 1, 3, 0),
(170, 9, 1, 'Friday', 2, 42, 8),
(171, 9, 1, 'Friday', 3, 45, 7),
(172, 9, 1, 'Friday', 4, 45, 7),
(173, 9, 1, 'Friday', 5, 1, 1),
(174, 9, 1, 'Friday', 6, 3, 0),
(175, 9, 1, 'Saturday', 1, 45, 7),
(176, 9, 1, 'Saturday', 2, 45, 7),
(177, 9, 1, 'Saturday', 3, 3, 0),
(178, 9, 1, 'Saturday', 4, 3, 0),
(179, 9, 1, 'Saturday', 5, 3, 0),
(180, 9, 1, 'Saturday', 6, 3, 0),
(181, 20, 2, 'Monday', 1, 128, 13),
(182, 20, 2, 'Monday', 2, 129, 14),
(183, 20, 2, 'Monday', 3, 130, 15),
(184, 20, 2, 'Monday', 4, 131, 16),
(185, 20, 2, 'Monday', 5, 1, 1),
(186, 20, 2, 'Monday', 6, 128, 13),
(187, 20, 2, 'Tuesday', 1, 129, 14),
(188, 20, 2, 'Tuesday', 2, 130, 15),
(189, 20, 2, 'Tuesday', 3, 131, 16),
(190, 20, 2, 'Tuesday', 4, 134, 18),
(191, 20, 2, 'Tuesday', 5, 134, 18),
(192, 20, 2, 'Tuesday', 6, 128, 13),
(193, 20, 2, 'Wednesday', 1, 130, 15),
(194, 20, 2, 'Wednesday', 2, 131, 16),
(195, 20, 2, 'Wednesday', 3, 128, 13),
(196, 20, 2, 'Wednesday', 4, 129, 14),
(197, 20, 2, 'Wednesday', 5, 130, 15),
(198, 20, 2, 'Wednesday', 6, 131, 16),
(199, 20, 2, 'Thursday', 1, 3, 0),
(200, 20, 2, 'Thursday', 2, 134, 18),
(201, 20, 2, 'Thursday', 3, 134, 18),
(202, 20, 2, 'Thursday', 4, 129, 14),
(203, 20, 2, 'Thursday', 5, 132, 10),
(204, 20, 2, 'Thursday', 6, 132, 10),
(205, 20, 2, 'Friday', 1, 3, 0),
(206, 20, 2, 'Friday', 2, 3, 0),
(207, 20, 2, 'Friday', 3, 3, 0),
(208, 20, 2, 'Friday', 4, 3, 0),
(209, 20, 2, 'Friday', 5, 3, 0),
(210, 20, 2, 'Friday', 6, 3, 0),
(211, 20, 2, 'Saturday', 1, 3, 0),
(212, 20, 2, 'Saturday', 2, 3, 0),
(213, 20, 2, 'Saturday', 3, 3, 0),
(214, 20, 2, 'Saturday', 4, 3, 0),
(215, 20, 2, 'Saturday', 5, 3, 0),
(216, 20, 2, 'Saturday', 6, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_allocation`
--
ALTER TABLE `tbl_allocation`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `tbl_invigilation`
--
ALTER TABLE `tbl_invigilation`
  ADD PRIMARY KEY (`invigilationid`);

--
-- Indexes for table `tbl_mentoringfaculty`
--
ALTER TABLE `tbl_mentoringfaculty`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`semid`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `tbl_timetable`
--
ALTER TABLE `tbl_timetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_allocation`
--
ALTER TABLE `tbl_allocation`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  MODIFY `bid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `fid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_invigilation`
--
ALTER TABLE `tbl_invigilation`
  MODIFY `invigilationid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_mentoringfaculty`
--
ALTER TABLE `tbl_mentoringfaculty`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `tbl_timetable`
--
ALTER TABLE `tbl_timetable`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
