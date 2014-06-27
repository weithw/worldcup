-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: worldcup
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.13.10.1

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worldcup_match`
--

LOCK TABLES `worldcup_match` WRITE;
/*!40000 ALTER TABLE `worldcup_match` DISABLE KEYS */;
INSERT INTO `worldcup_match` VALUES (1,'巴西','3-1','克罗地亚'),(2,'墨西哥','1-0','喀麦隆'),(3,'西班牙','1-5','荷兰'),(4,'智利','3-1','澳大利亚'),(5,'哥伦比亚','3-0','希腊'),(6,'乌拉圭','1-3','哥斯达黎加'),(7,'英格兰','1-2','意大利'),(8,'科特迪瓦','2-1','日本'),(9,'瑞士','2-1','厄瓜多尔'),(10,'法国','3-0','洪都拉斯'),(11,'阿根廷','2-1','波黑'),(12,'德国','4-0','葡萄牙'),(13,'伊朗','0-0','尼日利亚'),(14,'加纳','1-2','美国'),(15,'比利时','2-1','阿尔及利亚'),(16,'巴西','0-0','墨西哥'),(17,'俄罗斯','1-1','韩国'),(18,'澳大利亚','2-3','荷兰'),(19,'西班牙','0-2','智利'),(20,'喀麦隆','0-4','克罗地亚'),(21,'哥伦比亚','2-1','科特迪瓦'),(22,'乌拉圭','2-1','英格兰'),(23,'日本','0-0','希腊'),(24,'意大利',NULL,'哥斯达黎加'),(25,'瑞士',NULL,'法国'),(26,'洪都拉斯',NULL,'厄瓜多尔'),(27,'阿根廷',NULL,'伊朗'),(28,'德国',NULL,'加纳'),(29,'尼日利亚',NULL,'波黑'),(30,'比利时',NULL,'俄罗斯'),(31,'韩国',NULL,'阿尔及利亚'),(32,'美国',NULL,'葡萄牙'),(33,'澳大利亚',NULL,'西班牙'),(34,'荷兰',NULL,'智利'),(35,'喀麦隆',NULL,'巴西'),(36,'克罗地亚',NULL,'墨西哥'),(37,'意大利',NULL,'乌拉圭'),(38,'哥斯达黎加',NULL,'英格兰'),(39,'日本',NULL,'哥伦比亚'),(40,'希腊',NULL,'科特迪瓦'),(41,'尼日利亚',NULL,'阿根廷'),(42,'波黑',NULL,'伊朗'),(43,'洪都拉斯',NULL,'瑞士'),(44,'厄瓜多尔',NULL,'法国'),(45,'美国',NULL,'德国'),(46,'葡萄牙',NULL,'加纳'),(47,'韩国',NULL,'比利时'),(48,'阿尔及利亚',NULL,'俄罗斯');
/*!40000 ALTER TABLE `worldcup_match` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-20 15:32:36
