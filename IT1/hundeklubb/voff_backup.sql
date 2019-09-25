-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: voff
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
-- Table structure for table `hund`
--

DROP TABLE IF EXISTS `hund`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hund` (
  `hundid` int(11) NOT NULL AUTO_INCREMENT,
  `hundenavn` varchar(45) DEFAULT NULL,
  `rase` varchar(45) DEFAULT NULL,
  `medlemid` int(11) DEFAULT NULL,
  PRIMARY KEY (`hundid`),
  KEY `FK_hund_idx` (`medlemid`),
  CONSTRAINT `FK_hund` FOREIGN KEY (`medlemid`) REFERENCES `medlem` (`medlemid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hund`
--

LOCK TABLES `hund` WRITE;
/*!40000 ALTER TABLE `hund` DISABLE KEYS */;
INSERT INTO `hund` VALUES (1,'Felix','Malteser',3),(2,'Charmy','Pekingneser',4),(3,'Roxy','Beagle',1),(4,'Divo','Pitbull',2),(5,'Ben','Malteser',7),(6,'Timmy','Pekingneser',4),(7,'Kristian Jr.','Pomeranian',9),(8,'Martinius','Beagle',10),(9,'hei','hei',1),(10,'efe','ere',1);
/*!40000 ALTER TABLE `hund` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medlem`
--

DROP TABLE IF EXISTS `medlem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medlem` (
  `medlemid` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `mobil` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`medlemid`),
  UNIQUE KEY `medlemid_UNIQUE` (`medlemid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medlem`
--

LOCK TABLES `medlem` WRITE;
/*!40000 ALTER TABLE `medlem` DISABLE KEYS */;
INSERT INTO `medlem` VALUES (1,'Kari Knudsen','Gullerhaugveien 5','11111111'),(2,'Erling Nereng','Gulleråsveien 8A','22222222'),(3,'Per Hansen','Badstulia 4','33333333'),(4,'Ian Evangelista','Drengsrudveien 73','44444444'),(7,'Karl Karlsen','Karlsenveien 22','12345678'),(9,'Kristian Kristiansen','Kristians vei 23','56565656'),(10,'Martin Martinsen','Martins vei 44','83838383'),(15,'hei','hei','1929232');
/*!40000 ALTER TABLE `medlem` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-01 18:09:35
