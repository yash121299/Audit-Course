-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2019 at 09:36 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `audit_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `allotment`
--

CREATE TABLE `allotment` (
  `FNAME` varchar(30) NOT NULL,
  `MNAME` varchar(30) NOT NULL,
  `LNAME` varchar(20) NOT NULL,
  `RNO` int(11) NOT NULL,
  `EMAILID` varchar(30) NOT NULL,
  `CNAME` varchar(30) NOT NULL,
  `CID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allotment`
--

INSERT INTO `allotment` (`FNAME`, `MNAME`, `LNAME`, `RNO`, `EMAILID`, `CNAME`, `CID`) VALUES
('Yash', 'Gulab', 'Rathod', 1711044, 'yash.gr@somaiya.edu', 'Android', 'UCEC402'),
('Umang', 'Rajesh', 'Savla', 1711046, 'u.savla@somaiya.edu', 'Fundamentals of Python', 'UCEC407'),
('Aashay', 'Dharmesh', 'Shah', 1711047, 'aashay.shah@somaiya.edu', 'Machine_Learning', 'UCEC401');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `ID` varchar(10) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `DEPT` varchar(40) DEFAULT NULL,
  `MIN` int(11) DEFAULT NULL,
  `MAX` int(11) DEFAULT NULL,
  `ALLOTED` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `NAME`, `DEPT`, `MIN`, `MAX`, `ALLOTED`) VALUES
('UCEC401', 'Machine_Learning', 'Computer Engineering', NULL, 1, 1),
('UCEC402', 'Android', 'Computer Engineering', NULL, 1, 1),
('UCEC403', 'Web Programming', 'Information Technology', NULL, 1, 0),
('UCEC404', 'Javascript', 'Information Technology', NULL, 1, 0),
('UCEC405', 'Robotics', 'Mechanical Engineering', NULL, 1, 0),
('UCEC406', 'German', 'Mechanical Engineering', NULL, 1, 0),
('UCEC407', 'Fundamentals of Python', 'Electronic and Telecommunication', NULL, 1, 1),
('UCEC408', 'Django Framework', 'Electronic and Telecommunication', NULL, 1, 0),
('UCEC409', 'Eyantra', 'Electronic Engineering', NULL, 1, 0),
('UCEC410', 'French', 'Electronic Engineering', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FNAME` varchar(40) DEFAULT NULL,
  `MNAME` varchar(40) DEFAULT NULL,
  `LNAME` varchar(40) DEFAULT NULL,
  `POST` varchar(40) DEFAULT NULL,
  `DEPT` varchar(40) DEFAULT NULL,
  `EDUCATION` varchar(255) DEFAULT NULL,
  `COURSE` varchar(30) NOT NULL,
  `EMAILID` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FNAME`, `MNAME`, `LNAME`, `POST`, `DEPT`, `EDUCATION`, `COURSE`, `EMAILID`) VALUES
('Anjali', 'Santoshkumar', 'Chachra', 'Assistant Professor', 'Computer Engineering', 'Master of Engineering-Computer Engineering, Bachelor of Engineering-Information Technology', 'Android', 'fac2android@somaiya.edu'),
('Rupali', 'Pankaj', 'Patil', 'Assistant Professor', 'Electronic and Telecommunication', 'Master of Engineering-Electronic Engineering, Bachelor of Engineering-Electronic and Telecommuincation', 'Django Framewrok', 'fac7df@somaiya.edu'),
('Parul', 'Viresh', 'Sindhwad', 'Assistant Professor', 'Electronic Engineering', 'Master of Engineering-Electronic and Telecommuincation, Bachelor of Engineering-Electronic and Telecommuincation', 'E-Yantra', 'fac9eyantra@somaiya.edu'),
('Deepa', ' ', 'Jain', 'Assistant Professor', 'Electronic Engineering', 'Master of Engineering-Embedded System, Bachelor of Engineering-Information Technology', 'French', 'fac10french@somaiya.edu'),
('Ruchira', 'A', 'Jadhav', 'Associate Professor', 'Electronic and Telecommuincation', 'Master of Engineering-Electrical Engineering, Bachelor of Engineering-Electronic and Telecommuincation', 'Fundamentals of Python', 'fac8fop@somaiya.edu'),
('Chithra', 'Biju', 'Menon', 'Assistant Professor', 'Mechanical Engineering', 'Bachelor of Engineering-Mechanical Engineering', 'German', 'fac6ger@somaiya.edu'),
('Sagar', 'Damodarrao', 'Korde', 'Assistant Professor', 'Information Technology', 'Master of Engineering-Computer Engineering, Bachelor of Engineering-Information Technology', 'Javasvript', 'fac4javascr@somaiya.edu'),
('Mansi', 'Manoj', 'Kambli', 'Assistant Professor', 'Computer Engineering', 'Master of Engineering-Computer Engineering, Bachelor of Engineering-Electronics', 'Machine Learning', 'fac1ml@somaiya.edu'),
('Kashinath', 'Nimba', 'Patil', 'Professor', 'Mechanical Engineering', 'Master of Engineering-Energy Sciences, Bachelor of Engineering-Mechanical Engineering', 'Robotics', 'fac5robo@somaiya.edu'),
('Ravindra', ' ', 'Divakar', 'Associate Professor', 'Information Technology', 'Master of Science-Computer Science, Bachelor of Engineering-Electronics and Telecommunication', 'Web Programming', 'fac3wp@somaiya.edu');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `FNAME` varchar(30) DEFAULT NULL,
  `MNAME` varchar(30) DEFAULT NULL,
  `LNAME` varchar(30) DEFAULT NULL,
  `DEPT` varchar(40) NOT NULL,
  `EDUCATION` varchar(255) DEFAULT NULL,
  `EMAILID` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`FNAME`, `MNAME`, `LNAME`, `DEPT`, `EDUCATION`, `EMAILID`) VALUES
('Deepak', 'H', 'Sharma', 'Computer Engineering', NULL, 'hod_comp@somaiya.edu'),
('Ameya', 'K', 'Naik', 'Electronic and Telecommunication', NULL, 'hod_extc@somaiya.edu'),
('Jagannath', 'A', 'Nirmal', 'Electronic Engineering', NULL, 'hod_etrx@somaiya.edu'),
('Irfan', 'A', 'Siddavatam', 'Information Technology', NULL, 'hod_it@somaiya.edu'),
('Ramesh', 'R', 'Lekurwale', 'Mechanical Engineering', NULL, 'hod_mech@somaiya.edu');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `EMAILID` varchar(40) NOT NULL,
  `PASSWORD` varchar(40) DEFAULT NULL,
  `ROLE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`EMAILID`, `PASSWORD`, `ROLE`) VALUES
('aashay.shah@somaiya.edu', 'aashayshah', 'student'),
('admin@somaiya.edu', 'admin', 'admin'),
('advaith.m@somaiya.edu', 'advaithmahesh', 'student'),
('anisha.sinha@somaiya.edu', 'anishasinha', 'student'),
('anvil.m@somaiya.edu', 'anvilmahajan', 'student'),
('dharmil.shah@somaiya.edu', 'dharmilshah', 'student'),
('dheer.k@somaiya.edu', 'dheerkachalia', 'student'),
('fac10french@somaiya.edu', 'french', 'faculty'),
('fac1ml@somaiya.edu', 'machinelearn', 'faculty'),
('fac2android@somaiya.edu', 'android', 'faculty'),
('fac3wp@somaiya.edu', 'webprogram', 'faculty'),
('fac4javascr@somaiya.edu', 'javascript', 'faculty'),
('fac5robo@somaiya.edu', 'robotics', 'faculty'),
('fac6ger@somaiya.edu', 'german', 'faculty'),
('fac7df@somaiya.edu', 'django', 'faculty'),
('fac8fop@somaiya.edu', 'python', 'faculty'),
('fac9eyantra@somaiya.edu', 'eyantra', 'faculty'),
('harsh.vasa@somaiya.edu', 'harshvasa', 'student'),
('hitamnsh.mehta@somaiya.edu', 'hitanshmehta', 'student'),
('hod_comp@somaiya.edu', 'computer', 'hod'),
('hod_etrx@somaiya.edu', 'electronic', 'hod'),
('hod_extc@somaiya.edu', 'telecommunication', 'hod'),
('hod_it@somaiya.edu', 'informationtech', 'hod'),
('hod_mech@somaiya.edu', 'mechanical', 'hod'),
('kinnari.tanna@somaiya.edu', 'kinnaritanna', 'student'),
('mohill.k@somaiya.edu', 'mohillkhona', 'student'),
('nipun.shah@somaiya.edu', 'nipunshah', 'student'),
('prithvi.shah@somaiya.edu', 'prithvishah', 'student'),
('priyam.j@somaiya.edu', 'priyamjain', 'student'),
('rahil.thakker@somaiya.edu', 'rahilthakker', 'student'),
('saiyam.shah@somaiya.edu', 'saiyamshah', 'student'),
('shakshi.g@somaiya.edu', 'shakshigandhi', 'student'),
('tirth.jhaveri@somaiya.edu', 'tirthjhaveri', 'student'),
('u.savla@somaiya.edu', 'umangsavla', 'student'),
('vraj.b@somaiya.edu', 'vrajb', 'student'),
('yash.gr@somaiya.edu', 'yashrathod', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `FNAME` varchar(30) DEFAULT NULL,
  `MNAME` varchar(30) DEFAULT NULL,
  `LNAME` varchar(30) DEFAULT NULL,
  `RNO` int(11) NOT NULL,
  `PREF1` varchar(40) DEFAULT NULL,
  `PREF2` varchar(40) DEFAULT NULL,
  `PREF3` varchar(40) DEFAULT NULL,
  `EMAILID` varchar(40) DEFAULT NULL,
  `TIME` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`FNAME`, `MNAME`, `LNAME`, `RNO`, `PREF1`, `PREF2`, `PREF3`, `EMAILID`, `TIME`) VALUES
('Yash', 'Gulab', 'Rathod', 1711044, 'UCEC402', 'UCEC404', 'UCEC408', 'yash.gr@somaiya.edu', '2019-07-16 03:54:30'),
('Umang', 'Rajesh', 'Savla', 1711046, 'UCEC401', 'UCEC407', 'UCEC402', 'u.savla@somaiya.edu', '2019-06-21 19:31:38'),
('Aashay', 'Dharmesh', 'Shah', 1711047, 'UCEC401', 'UCEC402', 'UCEC403', 'aashay.shah@somaiya.edu', '2019-06-21 19:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE `student_detail` (
  `FNAME` varchar(30) DEFAULT NULL,
  `MNAME` varchar(30) DEFAULT NULL,
  `LNAME` varchar(30) DEFAULT NULL,
  `RNO` varchar(10) NOT NULL,
  `DEPT` varchar(100) DEFAULT NULL,
  `PREV_AC` varchar(1000) DEFAULT NULL,
  `EMAILID` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`FNAME`, `MNAME`, `LNAME`, `RNO`, `DEPT`, `PREV_AC`, `EMAILID`) VALUES
('Yash', 'Gulab', 'Rathod', '1711044', 'Computer Engineering', ' ', 'yash.gr@somaiya.edu'),
('Umang', 'Rajesh', 'Savla', '1711046', 'Computer Engineering', ' ', 'u.savla@somaiya.edu'),
('Aashay', 'Dharmesh', 'Shah', '1711047', 'Computer Engineering', ' ', 'aashay.shah@somaiya.edu'),
('Prithvi', 'Vipul', 'Shah', '1711052', 'Computer Engineering', ' ', 'prithvi.shah@somaiya.edu'),
('Vraj', 'Aniruddh', 'Brahmbhatt', '1712007', 'Electronic Engineering', ' ', 'vraj.b@somaiya.edu'),
('Nipun', 'Sanjay', 'Shah', '1712050', 'Electronic Engineering', ' ', 'nipun.shah@somaiya.edu'),
('Rahil', 'Binal', 'Thakker', '1712059', 'Electronic Engineering', ' ', 'rahil.thakker@somaiya.edu'),
('Mohill', 'Mayur', 'Khona', '1712087', 'Electronic Engineering', ' ', 'mohill.k@somaiya.edu'),
('Saiyam', 'Nimesh', 'Shah', '1713115', 'Electronic and Telecommunication Engineering', ' ', 'saiyam.shah@somaiya.edu'),
('Advaith', ' ', 'Mahesh', '1714003', 'Information Technology', ' ', 'advaith.m@somaiya.edu'),
('Shakshi', 'Alkesh', 'Gandhi', '1714018', 'Information Technology', ' ', 'shakshi.g@somaiya.edu'),
('Priyam', 'Manojkumar', 'Jain', '1714022', 'Information Technology', ' ', 'priyam.j@somaiya.edu'),
('Harsh', 'Paras', 'Vasa', '1714062', 'Information Technology', ' ', 'harsh.vasa@somaiya.edu'),
('Tirth', 'Jignesh', 'Jhaveri', '1715093', 'Mechanical Engineering', ' ', 'tirth.jhaveri@somaiya.edu'),
('Dheer', 'Apurva', 'Kachalia', '1715094', 'Mechanical Engineering', ' ', 'dheer.k@somaiya.edu'),
('Anvil', 'Vijay', 'Mahajan', '1715101', 'Mechanical Engineering', ' ', 'anvilm@somaiya.edu'),
('Hitansh', 'Sanjay', 'Mehta', '1715103', 'Mechanical Engineering', ' ', 'hitasnh.mehta@somaiya.edu'),
('Dharmil', 'Vipul', 'Shah', '1715112', 'Electronic and Telecommunication Engineering', ' ', 'dharmil.shah@somaiya.edu'),
('Kinnari', 'Manoj', 'Tanna', '1715119', 'Electronic and Telecommunication Engineering', ' ', 'kinnari.tanna@somaiya.edu'),
('Anisha', ' ', 'Sinha', '1715125', 'Electronic and Telecommunication Engineering', ' ', 'anisha.sinha@somaiya.edu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allotment`
--
ALTER TABLE `allotment`
  ADD UNIQUE KEY `RNO` (`RNO`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`,`NAME`),
  ADD UNIQUE KEY `NAME` (`NAME`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`COURSE`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`DEPT`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`EMAILID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`RNO`),
  ADD UNIQUE KEY `EMAILID` (`EMAILID`),
  ADD UNIQUE KEY `PREF1` (`PREF1`,`PREF2`,`PREF3`);

--
-- Indexes for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD PRIMARY KEY (`RNO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
