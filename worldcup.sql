-- -- phpMyAdmin SQL Dump
-- -- version 4.1.1
-- -- http://www.phpmyadmin.net
-- --
-- -- Host: localhost
-- -- Generation Time: 2013-12-02 18:42:17
-- -- 服务器版本： 5.6.14-log
-- -- PHP Version: 5.5.6

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET time_zone = "+00:00";


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8 */;

-- --
-- -- Database: `zchat`
-- --
-- CREATE DATABASE IF NOT EXISTS `worldcup` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
 USE `study`;

-- -- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `worldcup_user`;
CREATE TABLE IF NOT EXISTS `worldcup_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
insert into worldcup_user values (0,'cyx','cyx');
insert into worldcup_user values (0,'xwj','xwj');
insert into worldcup_user values (0,'ghw','ghw');

DROP TABLE IF EXISTS `worldcup_record`;
CREATE TABLE IF NOT EXISTS `worldcup_record` (
  MatchID int(11) NOT NULL AUTO_INCREMENT,
  cyx varchar(20),
  xwj varchar(20),
  ghw varchar(20),
  PRIMARY KEY (MatchID)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

insert into worldcup_record values(1,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(2,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(3,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(4,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(5,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(6,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(7,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(8,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(9,"[1,0,0]","[1,0,0]","[2,0,0]");
insert into worldcup_record values(10,"[1,0,0]","[0,0,1]","[0,0,1]");
insert into worldcup_record values(11,"[1,0,0]","[1,0,0]","[1,0,0]");
insert into worldcup_record values(12,"[0,0,1]","[2,0,0]","[1,0,0]");
insert into worldcup_record values(13,"[0,0,2]","[0,0,1]","[1,0,0]");
insert into worldcup_record values(14,"[1,0,0]","[2,0,0]","[0,0,1]");
insert into worldcup_record values(15,"[1,0,0]","[1,0,0]","[1,0,0]");
insert into worldcup_record values(16,"[1,0,0]","[1,0,0]","[1,0,0]");
insert into worldcup_record values(17,"[1,0,0]","[1,0,0]","[0,0,1]");
insert into worldcup_record values(18,"[0,0,0]","[0,0,0]","[0,0,1]");
insert into worldcup_record values(19,"[0,0,0]","[1,0,0]","[0,0,1]");
insert into worldcup_record values(20,"[0,0,0]","[0,0,1]","[1,0,0]");
insert into worldcup_record values(21,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(22,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(23,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(24,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(25,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(26,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(27,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(28,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(29,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(30,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(31,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(32,"[0,0,0]","[0,0,0]","[0,0,0]");
  insert into worldcup_record values(33,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");
insert into worldcup_record values(0,"[0,0,0]","[0,0,0]","[0,0,0]");

