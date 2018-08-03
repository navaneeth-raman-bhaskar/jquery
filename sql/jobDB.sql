-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 05:59 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `buildName` varchar(50) DEFAULT NULL,
  `mob` bigint(20) DEFAULT NULL,
  `pin` int(11) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `type`, `buildName`, `mob`, `pin`, `street`, `district`, `state`, `country`, `description`) VALUES
(1, 'student', '', 9567840582, 6773315, 'Bhasuram', '', 'Near MMC Hospital', 'India', 'Contributing to entropy since 1994.'),
(3, 'company', 'first floor, allied complex', 9567000000, 600001, 'kadavanthra', 'ernakulam', 'kerala', 'India', 'Alex corps leading startup..'),
(13, 'company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `logid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `name`, `logid`) VALUES
(1, 'superadmin', 18),
(2, 'admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

CREATE TABLE `applied` (
  `jobid` int(11) NOT NULL,
  `logid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`jobid`, `logid`) VALUES
(1, 1),
(1, 17),
(3, 1),
(3, 23),
(12, 23);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `logid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cid`, `name`, `type`, `logid`) VALUES
(2, 'alex corps', 'startup', 3),
(4, 'new company', 'mnc', 13),
(5, 'new', 'mnc', 16),
(6, 'goooogle', 'mnc', 19),
(7, 'Quest Innovative ', 'other', 21);

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `logid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credential`
--

INSERT INTO `credential` (`logid`, `email`, `password`, `type`, `status`) VALUES
(1, 'navaneethbhasuram@gmail.com', '12345', 'student', 1),
(3, 'alex@gmail.com', '123', 'company', 1),
(5, 'admin@admin.com', 'admin', 'admin', 0),
(13, 'company@company.com', 'company', 'company', 1),
(16, 'new@new.com', '123', 'company', 2),
(17, 'student@student.com', 'student', 'student', 0),
(18, 'superadmin@admin.com', 'superadmin', 'admin', 1),
(19, 'google@gmail.com', 'google', 'company', 0),
(20, 'rohith@gmail.com', '12345', 'student', 0),
(21, 'quest@qis.com', 'quest', 'company', 1),
(22, 'user@user.in', '121', 'student', 0),
(23, 'hacker123@gmail.com', 'hack', 'student', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `cvid` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `logid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`cvid`, `filename`, `logid`) VALUES
(3, 'bridge_physics.pdf', 1),
(1, 'CS  604.pdf', 1),
(9, 'navaneeth latest CV updated.3.pdf', 23),
(8, 'receipt.pdf', 13);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `logid` int(11) NOT NULL,
  `company` varchar(40) NOT NULL,
  `position` varchar(30) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`logid`, `company`, `position`, `fromdate`, `todate`) VALUES
(1, 'google', 'web developer', '2018-06-04', '2018-06-22'),
(23, 'm', 'n', '2018-07-04', '0000-00-00'),
(23, 'n', 'm', '2018-07-03', '2018-07-12'),
(1, 'qst global', 'senior sw dev', '2018-06-22', '0000-00-00'),
(1, 'quest', 'sw trainee', '2018-06-14', '2018-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `feed` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedid`, `name`, `email`, `country`, `feed`) VALUES
(1, 'Navaneeth v', 'navaneethbhasuram@gmail.com', 'canada', 'nothing.........'),
(2, 'www', 'eee@gmail.com', 'australia', 'hihhi'),
(5, 'rrrrrrrrrrrr', 'navaneethbhasuram@gmail.com', 'australia', 'tttttttttttt');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobid` int(11) NOT NULL,
  `logid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `salary` double NOT NULL,
  `closedate` date NOT NULL,
  `skillset` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobid`, `logid`, `title`, `description`, `salary`, `closedate`, `skillset`) VALUES
(1, 3, 'web designer', 'designer in website developing', 4444444, '2018-06-11', 'html,css,js,bootstrap,codeigniter'),
(3, 3, 'web developer', 'php web developer', 2220033, '2018-12-12', 'php,js,bootstrap'),
(5, 3, 'senior web designer ', 'blaahhhblah blaahh', 5555555, '2018-06-30', 'css,html5,js'),
(9, 13, 'android developer', 'senior android developer', 7777777, '2018-06-20', 'java,cpp,c'),
(10, 16, 'embedded designer', 'junior embedded c developer', 2220033, '2018-06-13', 'assembly,c,cpp'),
(11, 19, 'google developer', 'google web designer and developer ', 77888888, '2018-06-07', 'html,css,js,php,go,perl,ruby'),
(12, 21, 'softwaretrainee', 'tainee in java developer and php developer', 2222222, '2018-06-30', 'java,php');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `seen` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `senderid`, `receiverid`, `msg`, `seen`, `time`) VALUES
(1, 1, 3, 'hi', 0, '02:40:15'),
(2, 3, 1, 'hhello', 0, '02:41:13'),
(3, 23, 18, 'hi', 0, '10:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill` varchar(50) NOT NULL,
  `logid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill`, `logid`) VALUES
(' ljnkkl', 23),
('css', 1),
('html', 1),
('java', 1),
('js', 1),
('njk', 23),
('php', 1),
('php', 3),
('sass', 1),
('scss', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `logid` int(11) NOT NULL,
  `online` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`logid`, `online`) VALUES
(1, 0),
(3, 0),
(5, 0),
(13, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studid` int(11) NOT NULL,
  `logid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studid`, `logid`, `name`, `gender`, `dob`) VALUES
(1, 1, 'Navaneeth v', 'male', '1994-03-19'),
(2, 17, 'stud', 'male', '2018-06-04'),
(3, 20, 'rohith', 'male', '2018-06-10'),
(4, 22, 'userin', 'other', '0000-00-00'),
(5, 23, 'hacker', 'other', '2018-07-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`),
  ADD KEY `logid` (`logid`);

--
-- Indexes for table `applied`
--
ALTER TABLE `applied`
  ADD PRIMARY KEY (`jobid`,`logid`),
  ADD KEY `applied_ibfk_2` (`logid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `logid` (`logid`);

--
-- Indexes for table `credential`
--
ALTER TABLE `credential`
  ADD PRIMARY KEY (`logid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`cvid`),
  ADD UNIQUE KEY `filename` (`filename`,`logid`),
  ADD KEY `cv_ibfk_1` (`logid`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`company`,`position`),
  ADD KEY `logid` (`logid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `jobs_ibfk_1` (`logid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill`,`logid`),
  ADD KEY `logid` (`logid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD UNIQUE KEY `logid` (`logid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studid`),
  ADD KEY `logid` (`logid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `credential`
--
ALTER TABLE `credential`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `cvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`id`) REFERENCES `credential` (`logid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`logid`) REFERENCES `credential` (`logid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applied`
--
ALTER TABLE `applied`
  ADD CONSTRAINT `applied_ibfk_2` FOREIGN KEY (`logid`) REFERENCES `credential` (`logid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applied_ibfk_3` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`jobid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`logid`) REFERENCES `credential` (`logid`) ON DELETE CASCADE;

--
-- Constraints for table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`logid`) REFERENCES `credential` (`logid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`logid`) REFERENCES `credential` (`logid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`logid`) REFERENCES `credential` (`logid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`logid`) REFERENCES `credential` (`logid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`logid`) REFERENCES `credential` (`logid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `logid` FOREIGN KEY (`logid`) REFERENCES `credential` (`logid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
