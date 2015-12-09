-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	5.6.15-log

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
-- Table structure for table `career`
--

DROP TABLE IF EXISTS `career`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `career` (
  `Id_Career` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Color` char(11) NOT NULL,
  PRIMARY KEY (`Id_Career`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `career`
--

LOCK TABLES `career` WRITE;
/*!40000 ALTER TABLE `career` DISABLE KEYS */;
INSERT INTO `career` VALUES (1,'Licenciatura en Computación','#FA4B4B'),(2,'Ingeniería Sistemas Computacio','#654BFA'),(3,'Ingeniería en Desarrollo de So','#E8FA4B');
/*!40000 ALTER TABLE `career` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_circustance`
--

DROP TABLE IF EXISTS `catalog_circustance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog_circustance` (
  `Id_Catalog_Circustance` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_Catalog_Circustance`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_circustance`
--

LOCK TABLES `catalog_circustance` WRITE;
/*!40000 ALTER TABLE `catalog_circustance` DISABLE KEYS */;
INSERT INTO `catalog_circustance` VALUES (1,'Suspensión de clases'),(2,'Día Festivo'),(3,'No se presentó maestro'),(4,'No se presentaron alumnos');
/*!40000 ALTER TABLE `catalog_circustance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_hour`
--

DROP TABLE IF EXISTS `catalog_hour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog_hour` (
  `Id_Catalog_Hour` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(4) NOT NULL,
  PRIMARY KEY (`Id_Catalog_Hour`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_hour`
--

LOCK TABLES `catalog_hour` WRITE;
/*!40000 ALTER TABLE `catalog_hour` DISABLE KEYS */;
INSERT INTO `catalog_hour` VALUES (1,'7-9'),(2,'9-11'),(3,'11-1'),(4,'4-6'),(5,'6-8'),(6,'8-10');
/*!40000 ALTER TABLE `catalog_hour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratory`
--

DROP TABLE IF EXISTS `laboratory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratory` (
  `Id_Laboratory` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `NoStudents` int(11) DEFAULT '0',
  PRIMARY KEY (`Id_Laboratory`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratory`
--

LOCK TABLES `laboratory` WRITE;
/*!40000 ALTER TABLE `laboratory` DISABLE KEYS */;
INSERT INTO `laboratory` VALUES (1,'Laboratorio A','MACS',32),(2,'Laboratorio F','Nuevas computadoras',45);
/*!40000 ALTER TABLE `laboratory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register` (
  `Id_Register` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Laboratory` int(11) NOT NULL,
  `Id_Student` int(11) DEFAULT NULL,
  `Id_RegisterCircustance` int(11) DEFAULT NULL,
  `Id_User` int(11) NOT NULL,
  `StudentsAssistanceNumber` int(11) DEFAULT '0',
  `Comments` varchar(100) DEFAULT NULL,
  `Date` datetime NOT NULL,
  `Id_Catalog_Hour` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Register`),
  KEY `Fk_Id_Student_Register_Student` (`Id_Student`),
  KEY `Fk_Id_Laboratory_Register_Laboratory` (`Id_Laboratory`),
  KEY `Fk_Id_User_Register_User` (`Id_User`),
  KEY `Fk_Id_Catalog_Hour_Register_Catalog_Hour_idx` (`Id_Catalog_Hour`),
  KEY `Fk_Id_RegisterCircustance_Register_Catalog_Circustance` (`Id_RegisterCircustance`),
  CONSTRAINT `Fk_Id_Catalog_Hour_Register_Catalog_Hour` FOREIGN KEY (`Id_Catalog_Hour`) REFERENCES `catalog_hour` (`Id_Catalog_Hour`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_Id_Laboratory_Register_Laboratory` FOREIGN KEY (`Id_Laboratory`) REFERENCES `laboratory` (`Id_Laboratory`),
  CONSTRAINT `Fk_Id_RegisterCircustance_Register_Catalog_Circustance` FOREIGN KEY (`Id_RegisterCircustance`) REFERENCES `catalog_circustance` (`Id_Catalog_Circustance`),
  CONSTRAINT `Fk_Id_Student_Register_Student` FOREIGN KEY (`Id_Student`) REFERENCES `student` (`Id_Student`),
  CONSTRAINT `Fk_Id_User_Register_User` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES (1,2,NULL,NULL,1,32,NULL,'2015-12-07 08:00:00',1),(2,2,NULL,NULL,1,22,NULL,'2015-12-07 10:00:00',2),(3,1,NULL,NULL,1,44,NULL,'2015-12-07 12:00:00',3),(4,2,NULL,NULL,1,45,NULL,'2015-12-07 18:00:00',5),(5,1,NULL,NULL,1,5,NULL,'2015-12-07 20:00:00',6),(6,2,NULL,NULL,1,33,NULL,'2015-11-05 00:00:00',1),(7,1,NULL,NULL,1,50,NULL,'2015-11-05 00:00:00',2);
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `register_teacher`
--

DROP TABLE IF EXISTS `register_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register_teacher` (
  `Id_Register_Teacher` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Stuff_Teacher` int(11) NOT NULL,
  `Id_Register` int(11) NOT NULL,
  PRIMARY KEY (`Id_Register_Teacher`),
  KEY `Fk_Id_Stuff_Teacher_Stuff_Teacher_Register` (`Id_Stuff_Teacher`),
  KEY `Fk_Id_Register_Register_Register_Teacher_idx` (`Id_Register`),
  CONSTRAINT `Fk_Id_Register_Register_Register_Teacher` FOREIGN KEY (`Id_Register`) REFERENCES `register` (`Id_Register`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_Id_Stuff_Teacher_Stuff_Teacher_Register` FOREIGN KEY (`Id_Stuff_Teacher`) REFERENCES `stuff_teacher` (`Id_Stuff_Teacher`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register_teacher`
--

LOCK TABLES `register_teacher` WRITE;
/*!40000 ALTER TABLE `register_teacher` DISABLE KEYS */;
INSERT INTO `register_teacher` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,5);
/*!40000 ALTER TABLE `register_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `Id_Student` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Career` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `SecondLastName` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_Student`),
  KEY `Fk_Id_Career_Student_Career` (`Id_Career`),
  CONSTRAINT `Fk_Id_Career_Student_Career` FOREIGN KEY (`Id_Career`) REFERENCES `career` (`Id_Career`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stuff`
--

DROP TABLE IF EXISTS `stuff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stuff` (
  `Id_Stuff` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Career` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Semester` tinyint(4) NOT NULL,
  PRIMARY KEY (`Id_Stuff`),
  KEY `FK_Id_Career_Teacher_Career` (`Id_Career`),
  CONSTRAINT `FK_Id_Career_Teacher_Career` FOREIGN KEY (`Id_Career`) REFERENCES `career` (`Id_Career`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stuff`
--

LOCK TABLES `stuff` WRITE;
/*!40000 ALTER TABLE `stuff` DISABLE KEYS */;
INSERT INTO `stuff` VALUES (1,1,'Matemáticas',2),(2,2,'Cálculo',4),(3,3,'Álgebra',7),(4,1,'Programación I',2),(5,1,'Estructura de Datos',4);
/*!40000 ALTER TABLE `stuff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stuff_teacher`
--

DROP TABLE IF EXISTS `stuff_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stuff_teacher` (
  `Id_Stuff_Teacher` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Stuff` int(11) NOT NULL,
  `Id_Teacher` int(11) NOT NULL,
  `Id_Catalog_Hour` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Stuff_Teacher`),
  KEY `Fk_Id_Stuff_Stuff_Teacher_Stuff` (`Id_Stuff`),
  KEY `Fk_Id_Teacher_Stuff_Teacher_Teacher` (`Id_Teacher`),
  KEY `Fk_Id_Catalog_Hour_Stuff_Teacher` (`Id_Catalog_Hour`),
  CONSTRAINT `Fk_Id_Catalog_Hour_Stuff_Teacher` FOREIGN KEY (`Id_Catalog_Hour`) REFERENCES `catalog_hour` (`Id_Catalog_Hour`),
  CONSTRAINT `Fk_Id_Stuff_Stuff_Teacher_Stuff` FOREIGN KEY (`Id_Stuff`) REFERENCES `stuff` (`Id_Stuff`),
  CONSTRAINT `Fk_Id_Teacher_Stuff_Teacher_Teacher` FOREIGN KEY (`Id_Teacher`) REFERENCES `teacher` (`Id_Teacher`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stuff_teacher`
--

LOCK TABLES `stuff_teacher` WRITE;
/*!40000 ALTER TABLE `stuff_teacher` DISABLE KEYS */;
INSERT INTO `stuff_teacher` VALUES (1,1,1,1),(2,2,2,2),(3,3,1,3),(4,4,2,5),(5,5,1,6);
/*!40000 ALTER TABLE `stuff_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `Id_Teacher` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `SecondLastName` varchar(30) DEFAULT NULL,
  `Enrollment` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_Teacher`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1,'Jesús','Hernández','','JS123'),(2,'Jaime Francisco','Duarte','Pinzón','2013086208');
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `NameEmail` varchar(50) NOT NULL,
  `Password` varchar(16) NOT NULL,
  PRIMARY KEY (`Id_User`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Jaime','jaime@hotmail.com','asd');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'project'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_get_register_info` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_register_info`(IN id INT)
BEGIN
  SELECT rt.Id_Register_Teacher as id,
		CASE ch.Id_Catalog_Hour
			WHEN  1 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T08:00:00')
            WHEN  2 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T10:00:00')
            WHEN  3 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T12:00:00')
            WHEN  4 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T16:00:00')
            WHEN  5 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T18:00:00')
            WHEN  6 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T20:00:00')
        END as start,
		CASE ch.Id_Catalog_Hour
			WHEN  1 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T08:00:00')
            WHEN  2 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T10:00:00')
            WHEN  3 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T12:00:00')
            WHEN  4 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T16:00:00')
            WHEN  5 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T18:00:00')
            WHEN  6 THEN  CONCAT(DATE_FORMAT(r.Date,'%Y-%m-%d') , 'T20:00:00')
        END as end,
        r.Comments,
        CONCAT(t.Name, ' ',t.LastName, ' ', IFNULL(t.SecondLastName, ''), ' - ',
        l.Name, ' - ', s.Name, ' - ', s.Semester, ' - ', c.Name, ' - ' ,r.StudentsAssistanceNumber
        ,' - ',IFNULL(cc.Description, ''))as title,
        c.Color as color,
        ch.Id_Catalog_Hour as Id_Catalog_Hour,
        t.Id_Teacher as Id_Teacher,
        cc.Id_Catalog_Circustance as Id_Catalog_Circustance,
        r.StudentsAssistanceNumber as StudentsAssistanceNumber,
        r.StudentsAssistanceNumber as students,
        l.Id_Laboratory as Id_Laboratory,
        c.Id_Career,
        s.Semester
  FROM register_teacher rt LEFT JOIN register r ON r.Id_Register = rt.Id_Register
						  LEFT JOIN stuff_teacher st ON st.Id_Stuff_Teacher = rt.Id_Stuff_Teacher
						  LEFT JOIN teacher t ON t.Id_Teacher = st.Id_Teacher
						  LEFT JOIN laboratory l ON l.Id_Laboratory = r.Id_Laboratory
						  LEFT JOIN catalog_circustance cc ON cc.Id_Catalog_Circustance = r.Id_RegisterCircustance
						  LEFT JOIN catalog_hour ch ON ch.Id_Catalog_Hour = r.Id_Catalog_Hour
						  LEFT JOIN stuff s ON s.Id_Stuff = st.Id_Stuff
                          LEFT JOIN career c ON c.Id_Career = s.Id_Career
	WHERE ISNULL(id) OR rt.Id_Register_Teacher = id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_get_report` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_report`(IN reportMonth DATETIME)
BEGIN
	SELECT 
		SUM(r.StudentsAssistanceNumber) as Total,
		SUM(r.StudentsAssistanceNumber / (WEEK(reportMonth) * 5)) as DailyAvg,
		c.Name,
		c.Id_Career
	FROM register_teacher rt LEFT JOIN register r ON r.Id_Register = rt.Id_Register
						  LEFT JOIN stuff_teacher st ON st.Id_Stuff_Teacher = rt.Id_Stuff_Teacher
						  LEFT JOIN teacher t ON t.Id_Teacher = st.Id_Teacher
						  LEFT JOIN laboratory l ON l.Id_Laboratory = r.Id_Laboratory
						  LEFT JOIN catalog_circustance cc ON cc.Id_Catalog_Circustance = r.Id_RegisterCircustance
						  LEFT JOIN catalog_hour ch ON ch.Id_Catalog_Hour = r.Id_Catalog_Hour
						  LEFT JOIN stuff s ON s.Id_Stuff = st.Id_Stuff
						  LEFT JOIN career c ON c.Id_Career = s.Id_Career
	  WHERE MONTH(r.Date) = MONTH(reportMonth) AND YEAR(r.Date) = YEAR(reportMonth)
	  GROUP BY c.Id_Career;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-08 21:55:53
