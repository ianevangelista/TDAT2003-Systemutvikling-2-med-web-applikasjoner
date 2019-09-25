-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: elvelangs
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Table structure for table `kano`
--

DROP TABLE IF EXISTS `kano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kano` (
  `kanonr` int(11) NOT NULL AUTO_INCREMENT,
  `merke` varchar(45) DEFAULT NULL,
  `farge` varchar(45) DEFAULT NULL,
  `arsmodell` varchar(45) DEFAULT NULL,
  `pris` varchar(45) DEFAULT NULL,
  `selgerid` int(11) DEFAULT NULL,
  PRIMARY KEY (`kanonr`),
  KEY `FK_kano_idx` (`selgerid`),
  CONSTRAINT `FK_kano` FOREIGN KEY (`selgerid`) REFERENCES `selger` (`selgerid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kano`
--

LOCK TABLES `kano` WRITE;
/*!40000 ALTER TABLE `kano` DISABLE KEYS */;
INSERT INTO `kano` VALUES (1,'Møller-Hansen','Rød','2004','8000',2),(2,'Berg-Hansen','Gul','2010','12000',1),(3,'Bauta 1',NULL,NULL,NULL,8),(4,'FastRider','Grønn','2018','18500',8);
/*!40000 ALTER TABLE `kano` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selger`
--

DROP TABLE IF EXISTS `selger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selger` (
  `selgerid` int(11) NOT NULL AUTO_INCREMENT,
  `fornavn` varchar(45) DEFAULT NULL,
  `etternavn` varchar(45) DEFAULT NULL,
  `mobil` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`selgerid`),
  UNIQUE KEY `selgerid_UNIQUE` (`selgerid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selger`
--

LOCK TABLES `selger` WRITE;
/*!40000 ALTER TABLE `selger` DISABLE KEYS */;
INSERT INTO `selger` VALUES (1,'Kari','Nordmann','11111111','kari@live.com'),(2,'Sara','Nordmann','22222222','sara@live.com'),(3,'Erling','Nereng','33333333','erling@live.com'),(4,'Tore','Tang','44444444','tore@live.com'),(7,'Ivar','Aasen',NULL,NULL),(8,'Jan','Banan','999999999','janbanan@live.com'),(9,'ian','evangelista','83923923','ian@.com');
/*!40000 ALTER TABLE `selger` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-23 18:10:00
