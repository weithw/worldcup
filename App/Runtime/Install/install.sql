/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50610
 Source Host           : localhost
 Source Database       : talk

 Target Server Version : 50610
 File Encoding         : utf-8

 Date: 05/15/2014 22:53:26 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `talk_feed`
-- ----------------------------
DROP TABLE IF EXISTS `talk_feed`;
CREATE TABLE `talk_feed` (
  `feedid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(8) NOT NULL,
  `template` text,
  `data` text,
  `type` varchar(30) NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `create_time` int(11) DEFAULT '0',
  PRIMARY KEY (`feedid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `talk_message`
-- ----------------------------
DROP TABLE IF EXISTS `talk_message`;
CREATE TABLE `talk_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_uid` int(11) NOT NULL,
  `receiver_uid` int(11) NOT NULL,
  `last_uid` int(11) DEFAULT NULL,
  `last_content` text,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `talk_message_chat`
-- ----------------------------
DROP TABLE IF EXISTS `talk_message_chat`;
CREATE TABLE `talk_message_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ms_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `content` text,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `talk_notify`
-- ----------------------------
DROP TABLE IF EXISTS `talk_notify`;
CREATE TABLE `talk_notify` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `from_uid` mediumint(8) DEFAULT NULL,
  `to_uid` mediumint(8) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `source_id` mediumint(8) unsigned DEFAULT '0',
  `appid` mediumint(8) unsigned DEFAULT '0',
  `type` tinyint(1) DEFAULT '0' COMMENT '1话题',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `talk_settings`
-- ----------------------------
DROP TABLE IF EXISTS `talk_settings`;
CREATE TABLE `talk_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(30) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `talk_settings`
-- ----------------------------
BEGIN;
INSERT INTO `talk_settings` VALUES ('1', 'site', 'a:8:{s:4:\"name\";s:28:\"TalkPiece 开源垂直社区\";s:4:\"logo\";s:9:\"TalkPiece\";s:8:\"keywords\";s:21:\"开源 垂直  社区\";s:3:\"des\";s:42:\"帮创业者打造小而美的垂直社区\";s:9:\"copyright\";s:21:\"Powered By  TalkPiece\";s:8:\"interval\";s:2:\"10\";s:6:\"statis\";s:13:\"ET火星人\r\n\";s:8:\"badwords\";s:33:\"周恩来|毛泽东|习近平|TMD\";}'), ('2', 'email', 'a:7:{s:10:\"email_open\";s:1:\"0\";s:9:\"smtp_host\";s:0:\"\";s:9:\"smtp_port\";s:0:\"\";s:9:\"smtp_user\";s:0:\"\";s:8:\"smtp_pwd\";s:0:\"\";s:9:\"from_name\";s:0:\"\";s:10:\"from_email\";s:0:\"\";}'), ('3', 'score', 'a:5:{s:6:\"signup\";s:2:\"10\";s:5:\"login\";s:2:\"10\";s:13:\"upload_avatar\";s:2:\"15\";s:9:\"add_topic\";s:2:\"10\";s:8:\"add_post\";s:1:\"5\";}');
COMMIT;

-- ----------------------------
--  Table structure for `talk_topic`
-- ----------------------------
DROP TABLE IF EXISTS `talk_topic`;
CREATE TABLE `talk_topic` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `view_num` int(10) unsigned DEFAULT '0',
  `post_num` int(10) unsigned NOT NULL DEFAULT '0',
  `is_stick` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  `closed` tinyint(1) unsigned DEFAULT '0',
  `closed_time` int(11) unsigned DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `update_time` int(11) DEFAULT NULL,
  `last_post_time` int(11) unsigned DEFAULT '0',
  `last_post_uid` mediumint(8) unsigned DEFAULT '0',
  PRIMARY KEY (`tid`),
  KEY `subject` (`subject`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `talk_topic_category`
-- ----------------------------
DROP TABLE IF EXISTS `talk_topic_category`;
CREATE TABLE `talk_topic_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `topic_num` int(10) DEFAULT '0',
  `post_num` int(10) DEFAULT '0',
  `view_sort` int(5) NOT NULL,
  `des` text,
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `talk_topic_post`
-- ----------------------------
DROP TABLE IF EXISTS `talk_topic_post`;
CREATE TABLE `talk_topic_post` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `tid` int(10) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `first` tinyint(1) DEFAULT '0',
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `talk_user`
-- ----------------------------
DROP TABLE IF EXISTS `talk_user`;
CREATE TABLE `talk_user` (
  `uid` mediumint(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `area` varchar(255) DEFAULT NULL,
  `intro` text,
  `salt` varchar(100) DEFAULT NULL,
  `at_num` int(8) DEFAULT '0',
  `inbox_num` int(8) DEFAULT '0',
  `credit` int(11) DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `last_post` int(11) unsigned DEFAULT '0',
  `last_login_time` int(11) DEFAULT NULL,
  `avatar` tinyint(1) NOT NULL DEFAULT '0',
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `is_active` (`is_active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `talk_user_follow`
-- ----------------------------
DROP TABLE IF EXISTS `talk_user_follow`;
CREATE TABLE `talk_user_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_uid` int(11) DEFAULT NULL,
  `to_uid` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `talk_user_token`
-- ----------------------------
DROP TABLE IF EXISTS `talk_user_token`;
CREATE TABLE `talk_user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '1.激活注册 2.找回密码',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
