-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: nettauksjon
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
-- Table structure for table `bruker`
--

DROP TABLE IF EXISTS `bruker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bruker` (
  `idbruker` int(11) NOT NULL AUTO_INCREMENT,
  `fornavn` varchar(45) NOT NULL,
  `etternavn` varchar(45) NOT NULL,
  `epost` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `postnr` int(11) NOT NULL,
  PRIMARY KEY (`idbruker`),
  KEY `FK_postnr_idx` (`postnr`),
  CONSTRAINT `FK_post` FOREIGN KEY (`postnr`) REFERENCES `post` (`postnr`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bruker`
--

LOCK TABLES `bruker` WRITE;
/*!40000 ALTER TABLE `bruker` DISABLE KEYS */;
INSERT INTO `bruker` VALUES (1,'Ian','Evangelista','ianevangelista@live.com','Drengsrudveien 73',1383),(2,'Lars','Braathen ','larspro123.gmail.com','Askerjordet 70',1383),(3,'Frida','Kapstad','frida@gmail.com','Kapstadveien 99',1386),(4,'Erling','Nereng','erling@live.com','Askerveien 20',1383),(9,'Tore','Toresen','tore@gmail.com','Tores vei 23',1383),(11,'Jan','Jansen','janbanan@gmail.com','Jans vei 55',1383);
/*!40000 ALTER TABLE `bruker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bud`
--

DROP TABLE IF EXISTS `bud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bud` (
  `idbud` int(11) NOT NULL AUTO_INCREMENT,
  `verdi` varchar(45) NOT NULL,
  `buddato` datetime NOT NULL,
  `idgjenstand` int(11) NOT NULL,
  `idbruker` int(11) NOT NULL,
  PRIMARY KEY (`idbud`),
  KEY `FK_idgjenstand_idx` (`idgjenstand`),
  KEY `FK_idbruker2_idx` (`idbruker`),
  CONSTRAINT `FK_idgjenstand` FOREIGN KEY (`idgjenstand`) REFERENCES `gjenstand` (`idgjenstand`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bud`
--

LOCK TABLES `bud` WRITE;
/*!40000 ALTER TABLE `bud` DISABLE KEYS */;
INSERT INTO `bud` VALUES (1,'500','2018-05-15 21:12:47',1,0),(2,'0','2018-04-13 12:11:34',2,0),(3,'0','2018-04-13 18:11:34',4,0),(4,'0','2018-04-13 18:11:34',5,0),(5,'500','2018-05-15 21:28:29',6,0),(6,'0','2018-04-13 18:11:34',7,0),(7,'0','2018-04-13 18:11:34',8,0),(8,'0','2018-04-13 18:11:34',9,0),(9,'0','2018-05-15 20:49:58',10,0),(10,'0','2018-04-13 18:11:34',12,0),(11,'0','2018-04-13 18:11:34',13,0),(12,'0','2018-04-13 18:11:34',14,0),(13,'0','2018-04-13 18:11:34',3,0),(14,'0','2018-04-13 18:11:34',11,0),(15,'0','2018-04-13 18:11:34',15,0),(16,'4000','2018-03-13 18:11:34',16,0),(17,'5000','2018-03-13 18:11:34',17,0),(18,'6000','2018-03-13 18:11:34',18,0),(33,'0','0000-00-00 00:00:00',1,0);
/*!40000 ALTER TABLE `bud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gjenstand`
--

DROP TABLE IF EXISTS `gjenstand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gjenstand` (
  `idgjenstand` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(45) NOT NULL,
  `beskrivelse` text NOT NULL,
  `bilde` varchar(255) NOT NULL,
  `utlopsdato` datetime NOT NULL,
  `minpris` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `idbruker` int(11) NOT NULL,
  PRIMARY KEY (`idgjenstand`),
  KEY `FK_idkategori_idx` (`idkategori`),
  KEY `FK_idbruker_idx` (`idbruker`),
  CONSTRAINT `FK_idbruker` FOREIGN KEY (`idbruker`) REFERENCES `bruker` (`idbruker`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_idkategori` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gjenstand`
--

LOCK TABLES `gjenstand` WRITE;
/*!40000 ALTER TABLE `gjenstand` DISABLE KEYS */;
INSERT INTO `gjenstand` VALUES (1,'Signert Ibrahimovic Fotballsko','Signert fotballsko av Zlatan Ibrahimovic','zlatansign.jpg','2018-06-22 23:59:59',500,3,1),(2,'Signert Drakt 17/18','Signert drakt av Manchester United 17/18','draktsign.png','2018-06-22 23:59:59',500,2,2),(3,'Signert Fotball 13/14','Signert ball av Manchester United 13/14','ballsign.jpg','2018-04-18 23:59:59',500,1,3),(4,'Signert Fotball 11/12','Signert ball av Manchester United 11/12','ballsign2.jpg','2018-06-25 23:59:59',500,1,2),(5,'Signert Fotball 14/15','Signert ball av Manchester United 14/15','ballsign3.jpg','2018-06-27 23:59:59',500,1,1),(6,'Signert Fotball 07/08','Signert ball av Manchester United 07/08','ballsign4.png','2018-06-30 23:59:59',500,1,1),(7,'Signert Fotball 06/07','Signert ball av Manchester United 06/07','ballsign5.jpg','2018-06-29 23:59:59',500,1,3),(8,'Signert Drakt 17/18','Signert drakt av Manchester United 17/18','draktsign2.jpg','2018-06-19 23:59:59',500,2,3),(9,'Signert Beckham Drakt ','Signert drakt av David Beckham 01/02','draktsign3.jpg','2018-06-23 23:59:59',500,2,2),(10,'Signert CL-finale Drakt 98/99','Signert drakt av Manchester United CL-finale 98/99','draktsign4.jpg','2018-06-28 23:59:59',500,2,2),(11,'Signert Drakt 08/09','Signert drakt av Manchester United 08/09','draktsign5.jpg','2018-04-19 23:59:59',500,2,1),(12,'Signert Scholes Fotballsko','Signert fotballsko av Paul Scholes','skosign2.jpg','2018-06-11 23:59:59',500,3,3),(13,'Signert Rooney Fotballsko','Signert fotballsko av Wayne Rooney','skosign3.jpg','2018-06-08 23:59:59',500,3,2),(14,'Signert Rooney og Mata Fotballsko','Signert fotballsko av Wayne Rooney og Juan Mata','skosign4.png','2018-06-03 23:59:59',500,3,1),(15,'Signert Law Fotballsko','Signert fotballsko av Dennis Law','skosign5.jpg','2018-04-05 23:59:59',500,3,3),(16,'Signert Ronaldo og Rooney Fotballsko','Signert fotballsko av Cristiano Ronaldo og Wayne Rooney','skosign6.jpg','2018-04-04 23:59:59',500,3,2),(17,'Signert Fotball Ferguson','Signert fotball av Sir Alex Ferguson','ballsign6.jpg','2018-04-02 23:59:59',500,1,1),(18,'Signert Drakt 16/17','Signert drakt av Paul Pogba fra 16/17','draktsign6.jpeg','2018-04-01 23:59:59',500,2,1);
/*!40000 ALTER TABLE `gjenstand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(45) NOT NULL,
  `beskrivelsen` text NOT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Fotball','Signert fotball'),(2,'Fotballdrakt','Signert drakt'),(3,'Sko','Signerte sko');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `postnr` int(11) NOT NULL,
  `poststed` varchar(45) NOT NULL,
  PRIMARY KEY (`postnr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1383,'Asker'),(1386,'Vollen');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-15 21:39:59
