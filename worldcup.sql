-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: 210.30.96.51    Database: study
-- ------------------------------------------------------
-- Server version	5.5.31-0ubuntu0.12.10.1

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
-- Table structure for table `worldcup_match`
--

DROP TABLE IF EXISTS `worldcup_match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worldcup_match` (
  `MatchID` int(11) NOT NULL AUTO_INCREMENT,
  `teama` varchar(20) DEFAULT NULL,
  `score` varchar(20) DEFAULT NULL,
  `teamb` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`MatchID`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worldcup_match`
--

LOCK TABLES `worldcup_match` WRITE;
/*!40000 ALTER TABLE `worldcup_match` DISABLE KEYS */;
INSERT INTO `worldcup_match` VALUES (1,'巴西','3-1','克罗地亚'),(2,'墨西哥','1-0','喀麦隆'),(3,'西班牙','1-5','荷兰'),(4,'智利','3-1','澳大利亚'),(5,'哥伦比亚','3-0','希腊'),(6,'乌拉圭','1-3','哥斯达黎加'),(7,'英格兰','1-2','意大利'),(8,'科特迪瓦','2-1','日本'),(9,'瑞士','2-1','厄瓜多尔'),(10,'法国','3-0','洪都拉斯'),(11,'阿根廷','2-1','波黑'),(12,'德国','4-0','葡萄牙'),(13,'伊朗','0-0','尼日利亚'),(14,'加纳','1-2','美国'),(15,'比利时','2-1','阿尔及利亚'),(16,'巴西','0-0','墨西哥'),(17,'俄罗斯','1-1','韩国'),(18,'澳大利亚','2-3','荷兰'),(19,'西班牙','0-2','智利'),(20,'喀麦隆','0-4','克罗地亚'),(21,'哥伦比亚','2-1','科特迪瓦'),(22,'乌拉圭','2-1','英格兰'),(23,'日本','0-0','希腊'),(24,'意大利','0-1','哥斯达黎加'),(25,'瑞士','2-5','法国'),(26,'洪都拉斯','1-2','厄瓜多尔'),(27,'阿根廷','1-0','伊朗'),(28,'德国','2-2','加纳'),(29,'尼日利亚','1-0','波黑'),(30,'比利时','1-0','俄罗斯'),(31,'韩国','2-4','阿尔及利亚'),(32,'美国','2-2','葡萄牙'),(33,'澳大利亚','0-3','西班牙'),(34,'荷兰','2-0','智利'),(35,'喀麦隆','1-4','巴西'),(36,'克罗地亚','1-3','墨西哥'),(37,'意大利','0-1','乌拉圭'),(38,'哥斯达黎加','0-0','英格兰'),(39,'日本','1-4','哥伦比亚'),(40,'希腊','2-1','科特迪瓦'),(41,'尼日利亚','2-3','阿根廷'),(42,'波黑','3-1','伊朗'),(43,'洪都拉斯','0-3','瑞士'),(44,'厄瓜多尔','0-0','法国'),(45,'美国','0-1','德国'),(46,'葡萄牙','2-1','加纳'),(47,'韩国','0-1','比利时'),(48,'阿尔及利亚','1-1','俄罗斯'),(49,'巴西','1-1','智利'),(50,'哥伦比亚','2-0','乌拉圭'),(51,'荷兰','-','墨西哥'),(52,'哥斯达黎加','-','希腊'),(53,'法国','-','尼日利亚'),(54,'德国','-','阿尔及利亚'),(55,'阿根廷','-','瑞士'),(56,'比利时','-','美国');
/*!40000 ALTER TABLE `worldcup_match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worldcup_record`
--

DROP TABLE IF EXISTS `worldcup_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worldcup_record` (
  `MatchID` int(11) NOT NULL AUTO_INCREMENT,
  `cyx` varchar(20) DEFAULT NULL,
  `xwj` varchar(20) DEFAULT NULL,
  `ghw` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`MatchID`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worldcup_record`
--

LOCK TABLES `worldcup_record` WRITE;
/*!40000 ALTER TABLE `worldcup_record` DISABLE KEYS */;
INSERT INTO `worldcup_record` VALUES (1,'[0,0,0]','[0,0,0]','[0,0,0]'),(2,'[0,0,0]','[0,0,0]','[0,0,0]'),(3,'[0,0,0]','[0,0,0]','[0,0,0]'),(4,'[0,0,0]','[0,0,0]','[0,0,0]'),(5,'[0,0,0]','[0,0,0]','[0,0,0]'),(6,'[0,0,0]','[0,0,0]','[0,0,0]'),(7,'[0,0,0]','[0,0,0]','[0,0,0]'),(8,'[0,0,0]','[0,0,0]','[0,0,0]'),(9,'[1,0,0]','[1,0,0]','[2,0,0]'),(10,'[1,0,0]','[0,0,1]','[0,0,1]'),(11,'[1,0,0]','[1,0,0]','[1,0,0]'),(12,'[0,0,1]','[2,0,0]','[1,0,0]'),(13,'[0,0,2]','[0,0,1]','[1,0,0]'),(14,'[1,0,0]','[2,0,0]','[0,0,1]'),(15,'[1,0,0]','[1,0,0]','[1,0,0]'),(16,'[1,0,0]','[1,0,0]','[1,0,0]'),(17,'[1,0,0]','[1,0,0]','[0,0,1]'),(18,'[0,0,0]','[0,0,0]','[0,0,1]'),(19,'[0,0,0]','[1,0,0]','[0,0,1]'),(20,'[0,0,0]','[0,0,1]','[1,0,0]'),(21,'[0,0,0]','[0,0,0]','[0,0,0]'),(22,'[0,0,0]','[0,0,0]','[0,0,0]'),(23,'[0,0,0]','[0,0,0]','[0,0,0]'),(24,'[1,0,0]','[1,0,0]','[1,0,0]'),(25,'[0,0,1]','[0,0,1]','[1,0,0]'),(26,'[0,0,1]','[0,0,1]','[0,0,1]'),(27,'[0,0,0]','[1,0,0]','[1,0,0]'),(28,'[0,0,0]','[1,0,0]','[1,0,0]'),(29,'[0,1,0]','[1,0,0]','[0,0,1]'),(30,'[1,0,0]','[1,0,0]','[0,0,1]'),(31,'[0,1,0]','[0,0,1]','[0,0,1]'),(32,'[0,0,1]','[0,0,1]','[1,0,0]'),(33,'[0,0,1]','[0,0,1]','[0,0,1]'),(34,'[1,0,0]','[1,0,0]','[0,0,1]'),(35,'[0,0,1]','[0,0,1]','[0,0,1]'),(36,'[0,1,0]','[1,0,0]','[0,0,1]'),(37,'[1,0,0]','[0,0,1]','[1,0,0]'),(38,'[0,1,0]','[1,0,0]','[1,0,0]'),(39,'[0,0,1]','[0,1,0]','[0,0,1]'),(40,'[0,0,1]','[0,0,1]','[0,1,0]'),(41,'[0,1,0]','[0,0,1]','[1,0,0]'),(42,'[1,0,0]','[1,0,0]','[0,0,1]'),(43,'[0,0,1]','[0,0,1]','[0,0,1]'),(44,'[0,0,1]','[0,0,1]','[0,0,1]'),(45,'[0,0,1]','[0,0,1]','[0,0,1]'),(46,'[1,0,0]','[0,0,1]','[1,0,0]'),(47,'[0,0,1]','[0,0,1]','[0,0,1]'),(48,'[0,0,1]','[1,0,0]','[1,0,0]'),(49,'[2,0,0]','[3,0,0]','[2,0,0]'),(50,'[2,0,0]','[2,0,0]','[2,0,0]'),(51,'[2,0,0]','[2,0,0]','[0,0,0]'),(52,'[2,0,0]','[0,0,2]','[0,0,0]'),(53,'[0,0,0]','[0,0,0]','[0,0,0]'),(54,'[0,0,0]','[0,0,0]','[0,0,0]'),(55,'[0,0,0]','[0,0,0]','[0,0,0]'),(56,'[0,0,0]','[0,0,0]','[0,0,0]'),(57,'[0,0,0]','[0,0,0]','[0,0,0]'),(58,'[0,0,0]','[0,0,0]','[0,0,0]'),(59,'[0,0,0]','[0,0,0]','[0,0,0]'),(60,'[0,0,0]','[0,0,0]','[0,0,0]'),(61,'[0,0,0]','[0,0,0]','[0,0,0]'),(62,'[0,0,0]','[0,0,0]','[0,0,0]'),(63,'[0,0,0]','[0,0,0]','[0,0,0]'),(64,'[0,0,0]','[0,0,0]','[0,0,0]');
/*!40000 ALTER TABLE `worldcup_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worldcup_user`
--

DROP TABLE IF EXISTS `worldcup_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worldcup_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worldcup_user`
--

LOCK TABLES `worldcup_user` WRITE;
/*!40000 ALTER TABLE `worldcup_user` DISABLE KEYS */;
INSERT INTO `worldcup_user` VALUES (1,'cyx','cyx'),(2,'xwj','xwj'),(3,'ghw','ghw');
/*!40000 ALTER TABLE `worldcup_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-29 13:26:36
