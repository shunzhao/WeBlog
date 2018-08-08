-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: localhost    Database: shunzi
-- ------------------------------------------------------
-- Server version	5.5.53

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
-- Table structure for table `sz_admin`
--

DROP TABLE IF EXISTS `sz_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sz_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(16) NOT NULL DEFAULT 'null',
  `password` char(32) NOT NULL DEFAULT 'null',
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sz_admin`
--

LOCK TABLES `sz_admin` WRITE;
/*!40000 ALTER TABLE `sz_admin` DISABLE KEYS */;
INSERT INTO `sz_admin` VALUES (1,'admin','dc6d30fd26df91e72d77ca85963b7f6f',0,0);
/*!40000 ALTER TABLE `sz_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sz_info`
--

DROP TABLE IF EXISTS `sz_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sz_info` (
  `id` int(1) NOT NULL DEFAULT '1',
  `title` varchar(80) DEFAULT NULL,
  `subname` varchar(80) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `tj` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sz_info`
--

LOCK TABLES `sz_info` WRITE;
/*!40000 ALTER TABLE `sz_info` DISABLE KEYS */;
INSERT INTO `sz_info` VALUES (1,'blog','',NULL,NULL,NULL);
/*!40000 ALTER TABLE `sz_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sz_link`
--

DROP TABLE IF EXISTS `sz_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sz_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sz_link`
--

LOCK TABLES `sz_link` WRITE;
/*!40000 ALTER TABLE `sz_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `sz_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sz_post`
--

DROP TABLE IF EXISTS `sz_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sz_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL DEFAULT '无标题',
  `excerpt` varchar(180) DEFAULT '',
  `content` text,
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sz_post`
--

LOCK TABLES `sz_post` WRITE;
/*!40000 ALTER TABLE `sz_post` DISABLE KEYS */;
INSERT INTO `sz_post` VALUES (1,'关于','',NULL,0,0);
/*!40000 ALTER TABLE `sz_post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-08 20:17:03
