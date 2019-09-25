-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: Nettbutikk
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
  `brukerid` int(11) NOT NULL AUTO_INCREMENT,
  `fornavn` varchar(45) DEFAULT NULL,
  `etternavn` varchar(45) DEFAULT NULL,
  `epost` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `postnr` int(11) DEFAULT NULL,
  PRIMARY KEY (`brukerid`),
  KEY `FK_post_idx` (`postnr`),
  CONSTRAINT `FK_post` FOREIGN KEY (`postnr`) REFERENCES `post` (`postnr`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bruker`
--

LOCK TABLES `bruker` WRITE;
/*!40000 ALTER TABLE `bruker` DISABLE KEYS */;
INSERT INTO `bruker` VALUES (1,'Frida','Kapstad','frida@kapstad.com','oppå heien 43',1386),(2,'Jan Fredrik','Winther','janfredrik@winther.no','Hagaveien 28',1386),(3,'Gulla','Winther','gulla@winther.no','Heiatoppen 23',1386),(5,'Cecilie','Heien','frida@yahoo.no','Heienveien 34',1386),(6,'Cie','knupp','cecile@kapstad.no','Gudolf Blakstads vei 62',1386),(7,'Theo','Dahle','cecilie@yahoo.no','Gudolf Blakstads vei 62',1386),(8,'Anders','Lysgard','cecile@kapstad.no','Gudolf Blakstads vei 62',1386),(9,'Guro','Kapstad','guro@dahle.com','Gudolf Blakstads vei 21',1386),(15,'Sander','Winther','sander@heggis.no','Heggedalsveiein40',1386);
/*!40000 ALTER TABLE `bruker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bud`
--

DROP TABLE IF EXISTS `bud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bud` (
  `budid` int(11) NOT NULL AUTO_INCREMENT,
  `verdi` int(11) DEFAULT NULL,
  `gjenstandid` int(11) DEFAULT NULL,
  `brukerid` int(11) DEFAULT NULL,
  `buddato` date DEFAULT NULL,
  PRIMARY KEY (`budid`),
  KEY `FK_idbruker2_idx` (`brukerid`),
  KEY `FK_gjenstand_idx` (`gjenstandid`),
  CONSTRAINT `FK_brukerid` FOREIGN KEY (`brukerid`) REFERENCES `bruker` (`brukerid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_gjenstand` FOREIGN KEY (`gjenstandid`) REFERENCES `gjenstand` (`gjenstandid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bud`
--

LOCK TABLES `bud` WRITE;
/*!40000 ALTER TABLE `bud` DISABLE KEYS */;
INSERT INTO `bud` VALUES (1,400,1,1,'2023-05-20'),(2,666,1,1,'2018-05-14'),(3,345,4,3,'2018-05-14'),(4,345,4,3,'2018-05-14'),(5,345,4,3,'2018-05-14'),(6,675,6,1,'2018-05-14'),(7,100,7,2,'2018-05-14'),(8,100,7,1,'2018-05-14'),(9,149,7,1,'2018-05-14'),(10,149,7,1,'2018-05-14'),(11,5000,4,1,'2018-05-14'),(12,5000,4,1,'2018-05-14'),(13,3500,3,1,'2018-05-16');
/*!40000 ALTER TABLE `bud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gjenstand`
--

DROP TABLE IF EXISTS `gjenstand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gjenstand` (
  `gjenstandid` int(11) NOT NULL AUTO_INCREMENT,
  `bilde` varchar(45) DEFAULT NULL,
  `beskrivelse` varchar(45) DEFAULT NULL,
  `navn` varchar(45) DEFAULT NULL,
  `utlopsdato` date DEFAULT NULL,
  `kategoriid` int(11) DEFAULT NULL,
  `minpris` varchar(45) DEFAULT NULL,
  `brukerid` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`gjenstandid`),
  KEY `FK_kategori_idx` (`kategoriid`),
  KEY `FK_selger_idx` (`brukerid`),
  CONSTRAINT `FK_kategori` FOREIGN KEY (`kategoriid`) REFERENCES `kategori` (`kategoriid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_selger` FOREIGN KEY (`brukerid`) REFERENCES `bruker` (`brukerid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gjenstand`
--

LOCK TABLES `gjenstand` WRITE;
/*!40000 ALTER TABLE `gjenstand` DISABLE KEYS */;
INSERT INTO `gjenstand` VALUES (1,'prikketegrønnkjole.jpg','hei','hei','2018-06-06',1,'299',1,'0'),(2,'blomsterkjole.jpg','kjole med blomstermønster','summervibes','2019-06-20',1,'149',1,'1'),(3,'grønnkjole.jpg','Grønn kjole','greeny','2020-01-01',1,'135',2,'0'),(4,'stripekjole.jpg','stripete kjole med farger','streepy','2015-05-26',1,'299',1,'0'),(5,'blåstramkjole.jpg','Blå stram kjole','Stram kjole','2018-06-07',1,'149',1,'1'),(6,'hvittskjorte.jpg','Hvit basic tskjorte','Hvit t-skjorte','2018-08-03',3,'99',2,'0'),(7,'svartskjørt.jpg','Svart kult olaskjørt','olaskjørt','2019-01-01',2,'149',3,'0'),(8,'adidas.jpg','Rød adidas bukse','adidas','2019-01-01',2,'99',1,'0'),(9,'denimjakke.jpg','Denim løs jakke','Denimcool','2019-01-01',3,'129',1,'0'),(10,'denimshorts.jpg','olashorts','olashorts','2019-01-01',2,'300',1,'0'),(11,'furjakke.jpg','pelsjakke med kule detaljer','furjacket','2019-01-01',3,'249',1,'0'),(12,'hvitesleng.jpg','perfekt for sommerkvelder','hvite sleng','2019-01-01',2,'360',1,'0'),(13,'losshorts.jpg','chilleshorts trenger enhver','chilleshorts','2019-01-01',2,'450',1,'0'),(14,'militarshorts.jpg','kul millitærbukse ','milla','2019-01-01',2,'500',1,'0'),(15,'svartskjørt.jpg','Fint stramt skjørt','Svart skjørt','2018-12-12',2,'149',1,'0');
/*!40000 ALTER TABLE `gjenstand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `kategoriid` int(11) NOT NULL,
  `kategori` varchar(45) NOT NULL,
  `beskrivelse` varchar(45) NOT NULL,
  PRIMARY KEY (`kategoriid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'kjoler','Alt fra lange galla til hverdagskjoler'),(2,'underdeler','skjørt, bukser og shorts'),(3,'overdeler','gensere, jakker og tskjorter');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `postnr` int(11) NOT NULL AUTO_INCREMENT,
  `poststed` varchar(45) NOT NULL,
  PRIMARY KEY (`postnr`)
) ENGINE=InnoDB AUTO_INCREMENT=1387 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1386,'Asker');
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

-- Dump completed on 2018-05-16 15:47:06
