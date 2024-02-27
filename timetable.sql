-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 01:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_activity`
--

INSERT INTO `tbl_activity` (`id`, `fName`, `fid`) VALUES
(1, 'Simi', '01'),
(2, 'Mentoring', '02'),
(3, 'G.L', '03'),
(4, 'Break', '04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` varchar(50) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `adminpswd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_allocation`
--

INSERT INTO `tbl_allocation` (`sid`, `subid`, `bid`, `semid`, `pid`, `fid`, `Status`) VALUES
(40, '67', 5, 9, 46, 5, 1),
(41, '68', 5, 9, 46, 6, 1),
(42, '69', 5, 9, 46, 14, 1),
(43, '70', 5, 9, 46, 8, 1),
(44, '72', 5, 9, 46, 8, 1),
(45, '71', 5, 9, 46, 9, 1),
(46, '73', 5, 9, 46, 13, 1),
(47, '60', 6, 7, 46, 10, 1),
(48, '61', 6, 7, 46, 9, 1),
(49, '62', 6, 7, 46, 8, 1),
(50, '66', 6, 7, 46, 8, 1),
(51, '63', 6, 7, 46, 14, 1),
(52, '64', 6, 7, 46, 13, 1),
(53, '65', 6, 7, 46, 5, 1),
(54, '53', 7, 5, 46, 18, 1),
(55, '54', 7, 5, 46, 6, 1),
(56, '55', 7, 5, 46, 7, 1),
(57, '56', 7, 5, 46, 17, 1),
(58, '57', 7, 5, 46, 11, 1),
(59, '58', 7, 5, 46, 6, 1),
(60, '59', 7, 5, 46, 7, 1),
(61, '46', 8, 3, 46, 11, 1),
(62, '47', 8, 3, 46, 10, 1),
(63, '48', 8, 3, 46, 9, 1),
(64, '49', 8, 3, 46, 14, 1),
(65, '50', 8, 3, 46, 7, 1),
(66, '52', 8, 3, 46, 7, 1),
(67, '51', 8, 3, 46, 13, 1),
(68, '39', 9, 1, 46, 12, 1),
(69, '40', 9, 1, 46, 5, 1),
(70, '42', 9, 1, 46, 11, 1),
(71, '44', 9, 1, 46, 11, 1),
(72, '41', 9, 1, 46, 21, 1),
(73, '43', 9, 1, 46, 10, 1),
(74, '45', 9, 1, 46, 10, 1),
(86, '128', 20, 2, 44, 16, 1),
(87, '129', 20, 2, 44, 17, 1),
(88, '130', 20, 2, 44, 18, 1),
(89, '131', 20, 2, 44, 19, 1),
(90, '132', 20, 2, 44, 13, 1),
(92, '134', 20, 2, 44, 21, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`bid`, `pid`, `bName`, `bFrom`, `bTo`, `bCurrentSem`, `bStatus`) VALUES
(5, 46, 'IMCA B5', '2018-08-04', '2023-06-01', 9, 1),
(6, 46, 'IMCA B6', '2019-08-02', '2024-06-04', 7, 1),
(7, 46, 'IMCA B7', '2020-08-04', '2025-06-03', 5, 1),
(8, 46, 'IMCA B8', '2021-08-03', '2026-06-01', 3, 1),
(9, 46, 'IMCA B9', '2022-08-03', '2027-06-01', 1, 1),
(16, 48, 'BCA B1', '2023-04-05', '2023-04-27', 6, 0),
(17, 48, 'BCA B2', '2023-04-13', '2023-04-30', 4, 0),
(18, 48, 'BCA B3', '2023-04-25', '2023-04-15', 2, 0),
(19, 44, 'MCA 12', '2023-04-28', '2023-04-15', 4, 0),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`fid`, `fName`, `fDesignation`, `fQualification`, `fEmail`, `fPhone`, `fGender`, `fStatus`, `fSubcount`) VALUES
(5, 'Mintu ', 'Asst. Professor', 'MCA', 'mintu@scmsgroup.org', 9985473210, 'f', 1, 4),
(6, 'Jacob', 'Guest Lecturer', 'MCA', 'jacob@scmsgroup.org', 9658742513, 'm', 1, 4),
(7, 'Sony', 'Professor', 'M.Tech', 'sony@scmsgroup.org', 9544621245, 'f', 1, 4),
(8, 'Reshma', 'Professor', 'MCA', 'reshma@scmsgroup.org', 9547863210, 'f', 1, 4),
(9, 'Arun', 'Professor', 'MCA', 'arun@scmsgroup.org', 9875421630, 'm', 1, 4),
(10, 'Peter', 'Asst. Professor', 'MCA', 'peter@scmsgroup.org', 9856742130, 'm', 1, 4),
(11, 'Latha', 'Professor', 'MCA', 'latha@scmsgroup.org', 956328417, 'f', 1, 4),
(12, 'Anjali', 'Professor', 'MA', 'anjali@scmsgroup.org', 9556526673, 'f', 1, 2),
(13, 'Hiba', 'Professor', 'MCA', 'hiba@scmsgroup.org', 9547310254, 'f', 1, 4),
(14, 'Priya', 'Professor', 'MCA', 'priya@scmsgroup.org', 9541236521, 'f', 1, 4),
(15, 'Simi', 'Librarian', 'B.Lib.Sc', 'simi@scmsgroup.org', 8546721301, 'f', 1, 1),
(16, 'Rejisha', 'Asst. Professor', 'MCA', 'rejisha@scmsgroup.org', 9856214730, 'f', 1, 4),
(17, 'Pramod', 'Asst. Professor', 'MCA', 'pramod@scmsgroup.org', 8965471250, 'm', 1, 4),
(18, 'Jane', 'Professor', 'MCA', 'jane@scmsgroup.org', 9874562103, 'f', 1, 4),
(19, 'Sijo', 'Professor', 'MCA', 'sijo@scmsgroup.org', 9875461230, 'm', 1, 4),
(20, 'Manisha', 'Professor', 'MCA', 'manisha@scmsgroup.org', 9854762130, 'f', 1, 2),
(21, 'Vishal', 'Professor', 'MCA', 'vishal@scmsgroup.org', 8954762103, 'm', 1, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`semid`, `semName`, `semStatus`) VALUES
(1, 'One', 1),
(2, 'Two', 1),
(3, 'Three', 1),
(4, 'Four', 1),
(5, 'Five', 1),
(6, 'Six', 1),
(7, 'Seven', 1),
(8, 'Eight', 1),
(9, 'Nine', 1),
(10, 'Ten', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_storage`
--

CREATE TABLE `tbl_storage` (
  `id` int(10) NOT NULL,
  `stored_date` datetime NOT NULL,
  `tbl_timetable_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(54, 'Compiler Design', 1, 46, 5, 1),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_timetable`
--

INSERT INTO `tbl_timetable` (`id`, `bid`, `semid`, `day`, `hour`, `subid`, `fid`) VALUES
(1, 5, 9, 'Monday', 1, 67, 5),
(2, 5, 9, 'Monday', 2, 3, 3),
(3, 5, 9, 'Monday', 3, 1, 1),
(4, 5, 9, 'Monday', 4, 69, 14),
(5, 5, 9, 'Monday', 5, 70, 8),
(6, 5, 9, 'Monday', 6, 71, 9),
(7, 5, 9, 'Tuesday', 1, 68, 6),
(8, 5, 9, 'Tuesday', 2, 69, 14),
(9, 5, 9, 'Tuesday', 3, 70, 8),
(10, 5, 9, 'Tuesday', 4, 72, 8),
(11, 5, 9, 'Tuesday', 5, 72, 8),
(12, 5, 9, 'Tuesday', 6, 71, 9),
(13, 5, 9, 'Wednesday', 1, 69, 14),
(14, 5, 9, 'Wednesday', 2, 70, 8),
(15, 5, 9, 'Wednesday', 3, 72, 8),
(16, 5, 9, 'Wednesday', 4, 72, 8),
(17, 5, 9, 'Wednesday', 5, 71, 9),
(18, 5, 9, 'Wednesday', 6, 67, 5),
(19, 5, 9, 'Thursday', 1, 70, 8),
(20, 5, 9, 'Thursday', 2, 71, 9),
(21, 5, 9, 'Thursday', 3, 73, 13),
(22, 5, 9, 'Thursday', 4, 73, 13),
(23, 5, 9, 'Thursday', 5, 67, 5),
(24, 5, 9, 'Thursday', 6, 68, 6),
(25, 5, 9, 'Friday', 1, 73, 13),
(26, 5, 9, 'Friday', 2, 73, 13),
(27, 5, 9, 'Friday', 3, 67, 5),
(28, 5, 9, 'Friday', 4, 4, 0),
(29, 5, 9, 'Friday', 5, 68, 6),
(30, 5, 9, 'Friday', 6, 69, 14),
(31, 6, 7, 'Monday', 1, 60, 10),
(32, 6, 7, 'Monday', 2, 61, 9),
(33, 6, 7, 'Monday', 3, 62, 8),
(34, 6, 7, 'Monday', 4, 64, 13),
(35, 6, 7, 'Monday', 5, 65, 5),
(36, 6, 7, 'Monday', 6, 65, 5),
(37, 6, 7, 'Tuesday', 1, 61, 9),
(38, 6, 7, 'Tuesday', 2, 62, 8),
(39, 6, 7, 'Tuesday', 3, 1, 1),
(40, 6, 7, 'Tuesday', 4, 63, 14),
(41, 6, 7, 'Tuesday', 5, 64, 13),
(42, 6, 7, 'Tuesday', 6, 60, 10),
(43, 6, 7, 'Wednesday', 1, 62, 8),
(44, 6, 7, 'Wednesday', 2, 63, 14),
(45, 6, 7, 'Wednesday', 3, 64, 13),
(46, 6, 7, 'Wednesday', 4, 65, 5),
(47, 6, 7, 'Wednesday', 5, 65, 5),
(48, 6, 7, 'Wednesday', 6, 60, 10),
(49, 6, 7, 'Thursday', 1, 63, 14),
(50, 6, 7, 'Thursday', 2, 64, 13),
(51, 6, 7, 'Thursday', 3, 60, 10),
(52, 6, 7, 'Thursday', 4, 61, 9),
(53, 6, 7, 'Thursday', 5, 62, 8),
(54, 6, 7, 'Thursday', 6, 63, 14),
(55, 6, 7, 'Friday', 1, 61, 9),
(56, 6, 7, 'Friday', 2, 66, 8),
(57, 6, 7, 'Friday', 3, 66, 8),
(58, 6, 7, 'Friday', 4, 4, 0),
(59, 6, 7, 'Friday', 5, 66, 8),
(60, 6, 7, 'Friday', 6, 66, 8),
(61, 7, 5, 'Monday', 1, 53, 18),
(62, 7, 5, 'Monday', 2, 55, 7),
(63, 7, 5, 'Monday', 3, 56, 17),
(64, 7, 5, 'Monday', 4, 57, 11),
(65, 7, 5, 'Monday', 5, 58, 6),
(66, 7, 5, 'Monday', 6, 58, 6),
(67, 7, 5, 'Tuesday', 1, 55, 7),
(68, 7, 5, 'Tuesday', 2, 56, 17),
(69, 7, 5, 'Tuesday', 3, 57, 11),
(70, 7, 5, 'Tuesday', 4, 58, 6),
(71, 7, 5, 'Tuesday', 5, 58, 6),
(72, 7, 5, 'Tuesday', 6, 53, 18),
(73, 7, 5, 'Wednesday', 1, 55, 7),
(74, 7, 5, 'Wednesday', 2, 56, 17),
(75, 7, 5, 'Wednesday', 3, 1, 1),
(76, 7, 5, 'Wednesday', 4, 57, 11),
(77, 7, 5, 'Wednesday', 5, 59, 7),
(78, 7, 5, 'Wednesday', 6, 59, 7),
(79, 7, 5, 'Thursday', 1, 56, 17),
(80, 7, 5, 'Thursday', 2, 57, 11),
(81, 7, 5, 'Thursday', 3, 59, 7),
(82, 7, 5, 'Thursday', 4, 59, 7),
(83, 7, 5, 'Thursday', 5, 53, 18),
(84, 7, 5, 'Thursday', 6, 55, 7),
(85, 7, 5, 'Friday', 1, 53, 18),
(86, 7, 5, 'Friday', 2, 54, 6),
(87, 7, 5, 'Friday', 3, 54, 6),
(88, 7, 5, 'Friday', 4, 4, 0),
(89, 7, 5, 'Friday', 5, 3, 0),
(90, 7, 5, 'Friday', 6, 54, 6),
(91, 8, 3, 'Monday', 1, 46, 11),
(92, 8, 3, 'Monday', 2, 47, 10),
(93, 8, 3, 'Monday', 3, 48, 9),
(94, 8, 3, 'Monday', 4, 50, 7),
(95, 8, 3, 'Monday', 5, 52, 7),
(96, 8, 3, 'Monday', 6, 52, 7),
(97, 8, 3, 'Tuesday', 1, 47, 10),
(98, 8, 3, 'Tuesday', 2, 48, 9),
(99, 8, 3, 'Tuesday', 3, 49, 14),
(100, 8, 3, 'Tuesday', 4, 50, 7),
(101, 8, 3, 'Tuesday', 5, 52, 7),
(102, 8, 3, 'Tuesday', 6, 52, 7),
(103, 8, 3, 'Wednesday', 1, 48, 9),
(104, 8, 3, 'Wednesday', 2, 50, 7),
(105, 8, 3, 'Wednesday', 3, 46, 11),
(106, 8, 3, 'Wednesday', 4, 47, 10),
(107, 8, 3, 'Wednesday', 5, 49, 14),
(108, 8, 3, 'Wednesday', 6, 46, 11),
(109, 8, 3, 'Thursday', 1, 50, 7),
(110, 8, 3, 'Thursday', 2, 47, 10),
(111, 8, 3, 'Thursday', 3, 1, 1),
(112, 8, 3, 'Thursday', 4, 49, 14),
(113, 8, 3, 'Thursday', 5, 51, 13),
(114, 8, 3, 'Thursday', 6, 51, 13),
(115, 8, 3, 'Friday', 1, 46, 11),
(116, 8, 3, 'Friday', 2, 48, 9),
(117, 8, 3, 'Friday', 3, 49, 14),
(118, 8, 3, 'Friday', 4, 4, 0),
(119, 8, 3, 'Friday', 5, 51, 13),
(120, 8, 3, 'Friday', 6, 51, 13),
(121, 9, 1, 'Monday', 1, 39, 12),
(122, 9, 1, 'Monday', 2, 40, 5),
(123, 9, 1, 'Monday', 3, 42, 11),
(124, 9, 1, 'Monday', 4, 41, 21),
(125, 9, 1, 'Monday', 5, 43, 10),
(126, 9, 1, 'Monday', 6, 39, 12),
(127, 9, 1, 'Tuesday', 1, 40, 5),
(128, 9, 1, 'Tuesday', 2, 42, 11),
(129, 9, 1, 'Tuesday', 3, 41, 21),
(130, 9, 1, 'Tuesday', 4, 43, 10),
(131, 9, 1, 'Tuesday', 5, 39, 12),
(132, 9, 1, 'Tuesday', 6, 40, 5),
(133, 9, 1, 'Wednesday', 1, 42, 11),
(134, 9, 1, 'Wednesday', 2, 41, 21),
(135, 9, 1, 'Wednesday', 3, 43, 10),
(136, 9, 1, 'Wednesday', 4, 39, 12),
(137, 9, 1, 'Wednesday', 5, 42, 11),
(138, 9, 1, 'Wednesday', 6, 41, 21),
(139, 9, 1, 'Thursday', 1, 43, 10),
(140, 9, 1, 'Thursday', 2, 40, 5),
(141, 9, 1, 'Thursday', 3, 44, 11),
(142, 9, 1, 'Thursday', 4, 44, 11),
(143, 9, 1, 'Thursday', 5, 45, 10),
(144, 9, 1, 'Thursday', 6, 45, 10),
(145, 9, 1, 'Friday', 1, 45, 10),
(146, 9, 1, 'Friday', 2, 45, 10),
(147, 9, 1, 'Friday', 3, 1, 1),
(148, 9, 1, 'Friday', 4, 4, 0),
(149, 9, 1, 'Friday', 5, 44, 11),
(150, 9, 1, 'Friday', 6, 44, 11),
(151, 20, 2, 'Monday', 1, 128, 16),
(152, 20, 2, 'Monday', 2, 129, 17),
(153, 20, 2, 'Monday', 3, 130, 18),
(154, 20, 2, 'Monday', 4, 131, 19),
(155, 20, 2, 'Monday', 5, 1, 1),
(156, 20, 2, 'Monday', 6, 128, 16),
(157, 20, 2, 'Tuesday', 1, 129, 17),
(158, 20, 2, 'Tuesday', 2, 130, 18),
(159, 20, 2, 'Tuesday', 3, 131, 19),
(160, 20, 2, 'Tuesday', 4, 134, 21),
(161, 20, 2, 'Tuesday', 5, 134, 21),
(162, 20, 2, 'Tuesday', 6, 128, 16),
(163, 20, 2, 'Wednesday', 1, 130, 18),
(164, 20, 2, 'Wednesday', 2, 131, 19),
(165, 20, 2, 'Wednesday', 3, 134, 21),
(166, 20, 2, 'Wednesday', 4, 134, 21),
(167, 20, 2, 'Wednesday', 5, 128, 16),
(168, 20, 2, 'Wednesday', 6, 129, 17),
(169, 20, 2, 'Thursday', 1, 131, 19),
(170, 20, 2, 'Thursday', 2, 129, 17),
(171, 20, 2, 'Thursday', 3, 130, 18),
(172, 20, 2, 'Thursday', 4, 3, 0),
(173, 20, 2, 'Thursday', 5, 3, 0),
(174, 20, 2, 'Thursday', 6, 3, 0),
(175, 20, 2, 'Friday', 1, 3, 0),
(176, 20, 2, 'Friday', 2, 3, 0),
(177, 20, 2, 'Friday', 3, 132, 13),
(178, 20, 2, 'Friday', 4, 132, 13),
(179, 20, 2, 'Friday', 5, 3, 0),
(180, 20, 2, 'Friday', 6, 3, 0);

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
-- Indexes for table `tbl_storage`
--
ALTER TABLE `tbl_storage`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `fid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
-- AUTO_INCREMENT for table `tbl_storage`
--
ALTER TABLE `tbl_storage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `tbl_timetable`
--
ALTER TABLE `tbl_timetable`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
