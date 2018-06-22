-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `meraki`;
CREATE DATABASE `meraki` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `meraki`;

DROP TABLE IF EXISTS `grants`;
CREATE TABLE `grants` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nic` varchar(50) NOT NULL,
  `clientmac` varchar(50) DEFAULT NULL,
  `nodemac` varchar(50) DEFAULT NULL,
  `clientip` varchar(50) DEFAULT NULL,
  `granturl` text,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nic` (`nic`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `nic`, `telephone`) VALUES
(1,	'John Doe',	'123456789v',	'94771234567');

-- 2018-04-05 06:01:13
