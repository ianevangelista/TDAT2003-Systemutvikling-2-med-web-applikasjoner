CREATE DATABASE  IF NOT EXISTS `bildegalleri` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bildegalleri`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: bildegalleri
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

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
-- Table structure for table `bilde`
--

DROP TABLE IF EXISTS `bilde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bilde` (
  `filnavn` varchar(225) NOT NULL,
  `tittel` varchar(225) NOT NULL,
  `beskrivelse` text NOT NULL,
  `dato` datetime NOT NULL,
  `fotograf` int(11) NOT NULL,
  PRIMARY KEY (`filnavn`),
  KEY `FK_bilde_forograf_idx` (`fotograf`),
  CONSTRAINT `FK_bilde_forograf` FOREIGN KEY (`fotograf`) REFERENCES `fotograf` (`fotografid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bilde`
--

LOCK TABLES `bilde` WRITE;
/*!40000 ALTER TABLE `bilde` DISABLE KEYS */;
INSERT INTO `bilde` VALUES ('bilde1.jpg','Utstyr','Smartphone','2017-02-02 14:53:12',1),('bilde10.jpg','Arbeidsplass','Arbeidsplass ved Drammen','2016-05-26 12:28:13',1),('bilde2.jpg','Utstyr','Smartphone','2017-02-02 14:53:12',1),('bilde3.jpg','Utstyr','Smartphone','2017-02-02 14:53:12',2),('bilde4.jpg','Utstyr','Smartphone','2017-02-03 14:53:12',1),('bilde5.jpg','Utstyr','Smartphone','2017-02-03 14:53:12',2),('bilde6.jpg','Utstyr','Smartphone','2016-05-24 16:23:15',1),('bilde7.jpg','Utstyr','Smartphone','2016-05-27 17:23:13',1),('bilde8.jpg','Arbeidsplass','Arbeidsplass ved Bergen','2016-05-22 17:23:13',2),('bilde9.jpg','Arbeidsplass','Arbeidsplass ved Oslo','2016-05-24 16:27:13',2);
/*!40000 ALTER TABLE `bilde` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotograf`
--

DROP TABLE IF EXISTS `fotograf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotograf` (
  `fotografid` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(225) NOT NULL,
  PRIMARY KEY (`fotografid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotograf`
--

LOCK TABLES `fotograf` WRITE;
/*!40000 ALTER TABLE `fotograf` DISABLE KEYS */;
INSERT INTO `fotograf` VALUES (1,'Svein Fotosen'),(2,'Pål Askeladd');
/*!40000 ALTER TABLE `fotograf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleri`
--

DROP TABLE IF EXISTS `galleri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleri` (
  `galleriid` int(11) NOT NULL AUTO_INCREMENT,
  `tittel` varchar(225) NOT NULL,
  `beskrivelse` text NOT NULL,
  PRIMARY KEY (`galleriid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleri`
--

LOCK TABLES `galleri` WRITE;
/*!40000 ALTER TABLE `galleri` DISABLE KEYS */;
INSERT INTO `galleri` VALUES (1,'Arbeidsplass','Bilder fra bedriftens arbeidsplasser'),(2,'Utstyr','Bilder av utstyr som bedriften disponerer');
/*!40000 ALTER TABLE `galleri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleribilde`
--

DROP TABLE IF EXISTS `galleribilde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleribilde` (
  `galleri` int(11) NOT NULL,
  `bilde` varchar(225) NOT NULL,
  PRIMARY KEY (`galleri`,`bilde`),
  KEY `FK_galleribilde_bilde_idx` (`bilde`),
  CONSTRAINT `FK_galleribilde_bilde` FOREIGN KEY (`bilde`) REFERENCES `bilde` (`filnavn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_galleribilde_galleri` FOREIGN KEY (`galleri`) REFERENCES `galleri` (`galleriid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleribilde`
--

LOCK TABLES `galleribilde` WRITE;
/*!40000 ALTER TABLE `galleribilde` DISABLE KEYS */;
INSERT INTO `galleribilde` VALUES (1,'bilde10.jpg'),(1,'bilde8.jpg'),(1,'bilde9.jpg'),(2,'bilde1.jpg'),(2,'bilde2.jpg'),(2,'bilde3.jpg'),(2,'bilde4.jpg'),(2,'bilde5.jpg'),(2,'bilde6.jpg'),(2,'bilde7.jpg');
/*!40000 ALTER TABLE `galleribilde` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `gallerimedbilde`
--

DROP TABLE IF EXISTS `gallerimedbilde`;
/*!50001 DROP VIEW IF EXISTS `gallerimedbilde`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `gallerimedbilde` AS SELECT 
 1 AS `galleriid`,
 1 AS `tittel`,
 1 AS `beskrivelse`,
 1 AS `tilfeldigbilde`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `gallerimedbilde`
--

/*!50001 DROP VIEW IF EXISTS `gallerimedbilde`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `gallerimedbilde` AS select `galleri`.`galleriid` AS `galleriid`,`galleri`.`tittel` AS `tittel`,`galleri`.`beskrivelse` AS `beskrivelse`,(select `galleribilde`.`bilde` from `galleribilde` where (`galleribilde`.`galleri` = `galleri`.`galleriid`) order by rand() limit 1) AS `tilfeldigbilde` from `galleri` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-11 17:09:08
