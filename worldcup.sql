-- -- phpMyAdmin SQL Dump
-- -- version 4.1.1
-- -- http://www.phpmyadmin.net
-- --
-- -- Host: localhost
-- -- Generation Time: 2013-12-02 18:42:17
-- -- 服务器版本： 5.6.14-log
-- -- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8 */;

-- --
-- -- Database: `zchat`
-- --
-- CREATE DATABASE IF NOT EXISTS `worldcup` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
 USE `jRcsNApOlvFlnZYbawZP`;

-- -- --------------------------------------------------------

--
-- 表的结构 `user`
--

-- DROP TABLE IF EXISTS `worldcup_user`;
-- CREATE TABLE IF NOT EXISTS `worldcup_user` (
--   `ID` int(11) NOT NULL AUTO_INCREMENT,
--   `username` varchar(20) NOT NULL,
--   `password` char(32) NOT NULL,
--   PRIMARY KEY (`ID`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
-- insert into worldcup_user values (0,'cyx','cyx');
-- insert into worldcup_user values (0,'xwj','xwj');
-- insert into worldcup_user values (0,'ghw','ghw');

DROP TABLE IF EXISTS `worldcup_match`;
CREATE TABLE IF NOT EXISTS `worldcup_match` (
  MatchID int(11) NOT NULL AUTO_INCREMENT,
  teama varchar(20),
  score varchar(20),
  teamb varchar(20),
  PRIMARY KEY (MatchID)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
INSERT INTO `worldcup_match` VALUES (1,'巴西','3-1','克罗地亚'),(2,'墨西哥','1-0','喀麦隆'),(3,'西班牙','1-5','荷兰'),(4,'智利','3-1','澳大利亚'),(5,'哥伦比亚','3-0','希腊'),(6,'乌拉圭','1-3','哥斯达黎加'),(7,'英格兰','1-2','意大利'),(8,'科特迪瓦','2-1','日本'),(9,'瑞士','2-1','厄瓜多尔'),(10,'法国','3-0','洪都拉斯'),(11,'阿根廷','2-1','波黑'),(12,'德国','4-0','葡萄牙'),(13,'伊朗','0-0','尼日利亚'),(14,'加纳','1-2','美国'),(15,'比利时','2-1','阿尔及利亚'),(16,'巴西','0-0','墨西哥'),(17,'俄罗斯','1-1','韩国'),(18,'澳大利亚','2-3','荷兰'),(19,'西班牙','0-2','智利'),(20,'喀麦隆','0-4','克罗地亚'),(21,'哥伦比亚','2-1','科特迪瓦'),(22,'乌拉圭','2-1','英格兰'),(23,'日本','0-0','希腊'),(24,'意大利','-','哥斯达黎加'),(25,'瑞士','-','法国'),(26,'洪都拉斯','-','厄瓜多尔'),(27,'阿根廷','-','伊朗'),(28,'德国','-','加纳'),(29,'尼日利亚','-','波黑'),(30,'比利时','-','俄罗斯'),(31,'韩国','-','阿尔及利亚'),(32,'美国','-','葡萄牙'),(33,'澳大利亚','-','西班牙'),(34,'荷兰','-','智利'),(35,'喀麦隆','-','巴西'),(36,'克罗地亚','-','墨西哥'),(37,'意大利','-','乌拉圭'),(38,'哥斯达黎加','-','英格兰'),(39,'日本','-','哥伦比亚'),(40,'希腊','-','科特迪瓦'),(41,'尼日利亚','-','阿根廷'),(42,'波黑','-','伊朗'),(43,'洪都拉斯','-','瑞士'),(44,'厄瓜多尔','-','法国'),(45,'美国','-','德国'),(46,'葡萄牙','-','加纳'),(47,'韩国','-','比利时'),(48,'阿尔及利亚','-','俄罗斯');

-- DROP TABLE IF EXISTS `worldcup_record`;
-- CREATE TABLE IF NOT EXISTS `worldcup_record` (
--   MatchID int(11) NOT '-' AUTO_INCREMENT,
--   cyx varchar(20),
--   xwj varchar(20),
--   ghw varchar(20),
--   PRIMARY KEY (MatchID)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- insert into worldcup_record values(1,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(2,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(3,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(4,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(5,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(6,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(7,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(8,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(9,"[1,0,0]","[1,0,0]","[2,0,0]");
-- insert into worldcup_record values(10,"[1,0,0]","[0,0,1]","[0,0,1]");
-- insert into worldcup_record values(11,"[1,0,0]","[1,0,0]","[1,0,0]");
-- insert into worldcup_record values(12,"[0,0,1]","[2,0,0]","[1,0,0]");
-- insert into worldcup_record values(13,"[0,0,2]","[0,0,1]","[1,0,0]");
-- insert into worldcup_record values(14,"[1,0,0]","[2,0,0]","[0,0,1]");
-- insert into worldcup_record values(15,"[1,0,0]","[1,0,0]","[1,0,0]");
-- insert into worldcup_record values(16,"[1,0,0]","[1,0,0]","[1,0,0]");
-- insert into worldcup_record values(17,"[1,0,0]","[1,0,0]","[0,0,1]");
-- insert into worldcup_record values(18,"[0,0,0]","[0,0,0]","[0,0,1]");
-- insert into worldcup_record values(19,"[0,0,0]","[1,0,0]","[0,0,1]");
-- insert into worldcup_record values(20,"[0,0,0]","[0,0,1]","[1,0,0]");
-- insert into worldcup_record values(21,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(22,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(23,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(24,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(25,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(26,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(27,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(28,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(29,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(30,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(31,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(32,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(33,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
-- insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");

