-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2018 at 06:37 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peerpal`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `courseCode` varchar(45) NOT NULL,
  `courseName` varchar(240) NOT NULL,
  `courseNo` varchar(60) DEFAULT NULL,
  `schedule` varchar(45) NOT NULL,
  PRIMARY KEY (`courseCode`),
  UNIQUE KEY `courseCode_UNIQUE` (`courseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseCode`, `courseName`, `courseNo`, `schedule`) VALUES
('9358A', 'Web Technologies Lecture', 'IT 324', '3:00 - 4:00 WS');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
CREATE TABLE IF NOT EXISTS `form` (
  `formID` int(11) NOT NULL AUTO_INCREMENT,
  `formName` varchar(140) NOT NULL,
  `formDesc` varchar(1000) DEFAULT 'No description available',
  `due` date NOT NULL,
  `path` varchar(240) NOT NULL,
  PRIMARY KEY (`formID`),
  UNIQUE KEY `formID_UNIQUE` (`formID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`formID`, `formName`, `formDesc`, `due`, `path`) VALUES
(1, 'Web Technology Peer Eval Prelims', 'This is the peer evaluation form for Web Technology Prelims', '2018-01-28', 'form');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `groupID` int(11) NOT NULL AUTO_INCREMENT,
  `groupNo` int(11) NOT NULL,
  PRIMARY KEY (`groupID`),
  UNIQUE KEY `groupID_UNIQUE` (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`groupID`, `groupNo`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `group_form`
--

DROP TABLE IF EXISTS `group_form`;
CREATE TABLE IF NOT EXISTS `group_form` (
  `id` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `courseCodeForm` varchar(45) NOT NULL,
  `formID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groupID_idx` (`groupID`),
  KEY `groupIDForm_idx` (`groupID`),
  KEY `courseCodeForm_idx` (`courseCodeForm`),
  KEY `formID_idx` (`formID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_form`
--

INSERT INTO `group_form` (`id`, `groupID`, `courseCodeForm`, `formID`) VALUES
(1, 1, '9358A', 1),
(2, 2, '9358A', 1),
(3, 3, '9358A', 1),
(4, 4, '9358A', 1),
(5, 5, '9358A', 1),
(6, 6, '9358A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `identification` enum('student','teacher') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `identification`) VALUES
(1, '2165500', 'admin', 'Mary', 'Gelidon', 'teacher'),
(2, '0000', 'admin', 'test', 'test', 'teacher'),
(3, '2163054', '2163054', '2163054', '2163054', 'student'),
(4, '2160316', 'password', 'Victoria', 'Buse', 'student'),
(5, '2000600', 'password', 'Mike', 'Pinto', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

DROP TABLE IF EXISTS `user_course`;
CREATE TABLE IF NOT EXISTS `user_course` (
  `userCourseID` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `courseCode` varchar(45) NOT NULL,
  `groupID` int(11) DEFAULT NULL,
  PRIMARY KEY (`userCourseID`),
  UNIQUE KEY `userCourseID_UNIQUE` (`userCourseID`),
  KEY `id_idx` (`id`),
  KEY `courseCode_idx` (`courseCode`),
  KEY `groupID_idx` (`groupID`),
  KEY `groupIDUser_idx` (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`userCourseID`, `id`, `courseCode`, `groupID`) VALUES
(1, 1, '9358A', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_form`
--
ALTER TABLE `group_form`
  ADD CONSTRAINT `courseCodeForm` FOREIGN KEY (`courseCodeForm`) REFERENCES `course` (`courseCode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `formID` FOREIGN KEY (`formID`) REFERENCES `form` (`formID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `groupID` FOREIGN KEY (`groupID`) REFERENCES `group` (`groupID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_course`
--
ALTER TABLE `user_course`
  ADD CONSTRAINT `courseCode` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `groupIDUser` FOREIGN KEY (`groupID`) REFERENCES `group` (`groupID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
