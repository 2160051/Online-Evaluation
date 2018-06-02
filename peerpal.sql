-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: peerpal
-- ------------------------------------------------------
-- Server version	5.7.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `courseCode` varchar(45) NOT NULL,
  `courseName` varchar(240) NOT NULL,
  `courseDescription` varchar(240) DEFAULT NULL,
  `schedule` varchar(45) NOT NULL,
  PRIMARY KEY (`courseCode`),
  UNIQUE KEY `courseCode_UNIQUE` (`courseCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES ('9358A','Web Technologies Lecture','Intro to web technologies','3:00 - 4:00 WS'),('9362','Network Lec','Administration and Maintainance','11:00 - 12:30 TF'),('9364B','Web Technologies Laboratory','Application of Technology','1:00 - 2:30 TF');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form` (
  `formID` int(11) NOT NULL AUTO_INCREMENT,
  `formName` varchar(140) NOT NULL,
  `formDesc` varchar(1000) DEFAULT 'No description available',
  `due` date NOT NULL,
  PRIMARY KEY (`formID`),
  UNIQUE KEY `formID_UNIQUE` (`formID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `groupID` int(11) NOT NULL AUTO_INCREMENT,
  `groupNo` int(11) NOT NULL,
  `schedule` varchar(45) NOT NULL,
  PRIMARY KEY (`groupID`),
  UNIQUE KEY `groupID_UNIQUE` (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_form`
--

DROP TABLE IF EXISTS `group_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_form` (
  `id` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `courseCodeForm` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `groupID_idx` (`groupID`),
  KEY `groupIDForm_idx` (`groupID`),
  KEY `courseCodeForm_idx` (`courseCodeForm`),
  CONSTRAINT `courseCodeForm` FOREIGN KEY (`courseCodeForm`) REFERENCES `course` (`courseCode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `groupID` FOREIGN KEY (`groupID`) REFERENCES `group` (`groupID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_form`
--

LOCK TABLES `group_form` WRITE;
/*!40000 ALTER TABLE `group_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_course`
--

DROP TABLE IF EXISTS `user_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_course` (
  `userCourseID` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `courseCode` varchar(45) NOT NULL,
  `groupID` int(11) DEFAULT NULL,
  PRIMARY KEY (`userCourseID`),
  UNIQUE KEY `userCourseID_UNIQUE` (`userCourseID`),
  KEY `id_idx` (`id`),
  KEY `courseCode_idx` (`courseCode`),
  KEY `groupID_idx` (`groupID`),
  KEY `groupIDUser_idx` (`groupID`),
  CONSTRAINT `courseCode` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `groupIDUser` FOREIGN KEY (`groupID`) REFERENCES `group` (`groupID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_course`
--

LOCK TABLES `user_course` WRITE;
/*!40000 ALTER TABLE `user_course` DISABLE KEYS */;
INSERT INTO `user_course` VALUES (1,4,'9358A',NULL),(2,5,'9364B',NULL),(3,5,'9362',NULL);
/*!40000 ALTER TABLE `user_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `identification` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'2165500','admin','Mary','Gelidon',''),(2,'0000','admin','test','test',''),(3,'2163054','2163054','2163054','2163054',''),(4,'2160316','password','Victoria','Buse','student'),(5,'2166244','password','Chari','Parayno','student');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-02 16:59:17
