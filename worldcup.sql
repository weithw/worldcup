-- phpMyAdmin SQL Dump
-- version 4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2013-12-02 18:42:17
-- 服务器版本： 5.6.14-log
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zchat`
--
CREATE DATABASE IF NOT EXISTS `worldcup` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `worldcup`;

-- --------------------------------------------------------

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


DROP TABLE IF EXISTS `worldcup_record`;
CREATE TABLE IF NOT EXISTS `worldcup_record` (
  MatchID int(11) NOT NULL AUTO_INCREMENT,
  xwj varchar(20),
  cyx varchar(20),
  ghw varchar(20),
  user4 varchar(20),
  user5 varchar(20),
  score varchar(20),
  all_bet int(5),
  PRIMARY KEY (MatchID)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
