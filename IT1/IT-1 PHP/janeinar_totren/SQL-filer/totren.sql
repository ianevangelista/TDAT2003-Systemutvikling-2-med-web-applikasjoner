CREATE DATABASE  IF NOT EXISTS `totren` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `totren`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: totren
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
-- Table structure for table `ansatt`
--

DROP TABLE IF EXISTS `ansatt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ansatt` (
  `ansattid` int(11) NOT NULL AUTO_INCREMENT,
  `fornavn` varchar(45) NOT NULL,
  `etternavn` varchar(45) NOT NULL,
  `mob` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`ansattid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ansatt`
--

LOCK TABLES `ansatt` WRITE;
/*!40000 ALTER TABLE `ansatt` DISABLE KEYS */;
INSERT INTO `ansatt` VALUES (1,'Petter','Klausen',22334455,'petter@klausen.no'),(2,'Kari','Trestakk',33223344,'kari@trestakk.no'),(3,'Nils','Hansen',44334455,'nils@hansen.no'),(4,'Trond','Berntsen',77667766,'trond@berntsen.no'),(5,'Nora','Thorsen',88778877,'nora@thorsen.no'),(6,'Bernt','Olsen',99889966,'bernt@olsen.no'),(7,'Viktor','Nilsen',77886677,'viktor@nilsen.no'),(8,'Ole','Paus',88776655,'ole@paus.no'),(9,'Trine','Grande',66776655,'trine@grande.no'),(10,'Erna','Solberg',88778899,'erna@solberg.no');
/*!40000 ALTER TABLE `ansatt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utstyr`
--

DROP TABLE IF EXISTS `utstyr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utstyr` (
  `utstyrid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `merke` varchar(45) NOT NULL,
  `modell` varchar(45) NOT NULL,
  `vekt` int(11) NOT NULL,
  `kjopeaar` int(11) NOT NULL,
  `idansatt` int(11) NOT NULL,
  PRIMARY KEY (`utstyrid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utstyr`
--

LOCK TABLES `utstyr` WRITE;
/*!40000 ALTER TABLE `utstyr` DISABLE KEYS */;
INSERT INTO `utstyr` VALUES (1,'Smartphone','Apple','iPhone 6S',200,2016,1),(2,'Smartphone','Samsung','GalaxyS7',230,2016,2),(3,'Nettbrett','Apple','iPad 2',487,2015,3),(4,'PC','Acer','E3',2200,2013,2),(7,'Smartphone','Sony','Z3',234,2015,3),(9,'PC','Dell','Hyper S2',2300,2012,8);
/*!40000 ALTER TABLE `utstyr` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-11 17:09:49
