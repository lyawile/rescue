CREATE DATABASE  IF NOT EXISTS `eserviceup` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `eserviceup`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: eserviceup
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `bill_items`
--

DROP TABLE IF EXISTS `bill_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bill_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detail` varchar(45) DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL,
  `equivalent_amount` decimal(12,2) NOT NULL,
  `misc_amount` decimal(12,2) NOT NULL,
  `quantity` decimal(12,2) NOT NULL,
  `unit` varchar(45) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bill_id` (`bill_id`),
  KEY `collection_id` (`collection_id`),
  CONSTRAINT `bill_items_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `bill_items_ibfk_2` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill_items`
--

LOCK TABLES `bill_items` WRITE;
/*!40000 ALTER TABLE `bill_items` DISABLE KEYS */;
INSERT INTO `bill_items` VALUES (1,'Test details',60000.00,60000.00,60000.00,1.00,'Each',1,44),(2,'Test details',100000.00,100000.00,100000.00,2.00,'Each',2,44),(3,'Test details',120000.00,120000.00,120000.00,2.00,'Each',1,45),(4,'Test details',200000.00,200000.00,200000.00,4.00,'Each',2,45),(5,'Test details',120000.00,120000.00,120000.00,2.00,'Each',1,46),(6,'Test details',240000.00,240000.00,240000.00,4.00,'Each',1,47),(7,'Test details',300000.00,300000.00,300000.00,6.00,'Each',2,47),(8,'Test details',300000.00,300000.00,300000.00,5.00,'Each',1,48),(9,'Test details',600000.00,600000.00,600000.00,10.00,'Each',1,48),(10,'Test details',120000.00,120000.00,120000.00,2.00,'Each',1,49),(11,'Test details',300000.00,300000.00,300000.00,5.00,'Each',1,49),(12,'Test details',240000.00,240000.00,240000.00,4.00,'Each',1,51);
/*!40000 ALTER TABLE `bill_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(64) DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL,
  `equivalent_amount` decimal(12,2) NOT NULL,
  `misc_amount` decimal(12,2) NOT NULL,
  `expire_date` datetime NOT NULL,
  `generated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payer_idx` int(11) DEFAULT NULL,
  `payer_name` varchar(256) DEFAULT NULL,
  `payer_mobile` varchar(182) NOT NULL,
  `payer_email` varchar(128) DEFAULT NULL,
  `has_reminder` int(1) NOT NULL DEFAULT '0',
  `control_number` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
INSERT INTO `bills` VALUES (43,'NECTA20180803091356',60000.00,60000.00,60000.00,'2018-12-01 00:00:00','2018-08-03 00:00:00',NULL,'sdfsfsfsf','sfsfsfsdfs','fsfsdfsdfsdf',0,NULL),(44,'NECTA20180808084856',160000.00,160000.00,160000.00,'2018-12-01 00:00:00','2018-08-08 00:00:00',NULL,'Zawadi Muhibu Mnamba','0688026388','zawad.mnamba@yahoo.com',0,NULL),(45,'NECTA20180808090220',320000.00,320000.00,320000.00,'2018-12-01 00:00:00','2018-08-08 00:00:00',NULL,'Khadija Yusuph Saibu','0685090488','khadija.yusuph@gmail.com',0,NULL),(46,'NECTA20181003082532',120000.00,120000.00,120000.00,'2018-12-01 00:00:00','2018-10-03 00:00:00',NULL,'Hassan Ally Lyawile','0718440572','webdev271@gmail.com',0,NULL),(47,'NECTA20181004013509',540000.00,540000.00,540000.00,'2018-12-01 00:00:00','2018-10-04 00:00:00',NULL,'Yusuf Hassan Lyawile','0718440572','yusuf.hassan@yahoo.com',0,NULL),(48,'NECTA20181004022145',900000.00,900000.00,900000.00,'2018-12-01 00:00:00','2018-10-04 00:00:00',NULL,'Hassan Ally Lyawile','0718440572','webdev271@gmail.com',0,NULL),(49,'NECTA20181009124512',420000.00,420000.00,420000.00,'2018-12-01 00:00:00','2018-10-09 00:00:00',NULL,'Hassan Ally Lyawile','0718440572','webdev271@gmail.com',0,NULL),(50,'NECTA20181009124647',1000.00,1000.00,1000.00,'2018-12-01 00:00:00','2018-10-09 00:00:00',NULL,'sgsdgsd','gsdgsdgsd','gsdgsdgssg',0,NULL),(51,'NECTA20181009124704',240000.00,240000.00,240000.00,'2018-12-01 00:00:00','2018-10-09 00:00:00',NULL,'sgsdgsd','gsdgsdgsd','gsdgsdgssg',0,NULL);
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection_categories`
--

DROP TABLE IF EXISTS `collection_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collection_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `gsfcode` varchar(45) NOT NULL,
  `detail` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection_categories`
--

LOCK TABLES `collection_categories` WRITE;
/*!40000 ALTER TABLE `collection_categories` DISABLE KEYS */;
INSERT INTO `collection_categories` VALUES (1,'ADA','45451','Ada ya malipo ya mitihani');
/*!40000 ALTER TABLE `collection_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `collection_categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `collection_categorie_id` (`collection_categorie_id`),
  KEY `exam_type_id` (`exam_type_id`),
  CONSTRAINT `collections_ibfk_1` FOREIGN KEY (`collection_categorie_id`) REFERENCES `collection_categories` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `collections_ibfk_2` FOREIGN KEY (`exam_type_id`) REFERENCES `exam_types` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (1,'Ada ya usajili wa shule za sekondari A-level','dsaasdasda','2018-08-02 00:00:00','2019-01-01 00:00:00',60000.00,2,1),(2,'Ada ya usajili wa shule za Sekondari O-level','adadasd','2018-08-02 00:00:00','2018-12-26 00:00:00',50000.00,1,1);
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'eserviceup'
--

--
-- Dumping routines for database 'eserviceup'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-10 11:24:04
