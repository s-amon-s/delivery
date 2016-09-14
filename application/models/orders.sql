-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2016 at 02:01 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `delivery_tcdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `o_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `o_status` int(1) NOT NULL DEFAULT '1',
  `o_code` varchar(100) NOT NULL DEFAULT 'QwErTy0123456789',
  `o_count` int(11) NOT NULL DEFAULT '0',
  `o_return_date` date DEFAULT NULL,
  `o_delivery_date` date DEFAULT NULL,
  `o_description` varchar(255) NOT NULL,
  `c_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_status`, `o_code`, `o_count`, `o_return_date`, `o_delivery_date`, `o_description`, `c_id`) VALUES
(1, 4, 'ZUs7TEp6ojq5CsJlCqV', 4, '2016-09-28', '2016-09-29', 'description goes here', 1),
(2, 3, 'U78fTMgeZSETP5GDiKu', 2, '2016-09-26', '2016-09-22', 'the new description', 1),
(3, 4, 'es9mL5aJve2zYvVb6JE', 3, '2016-09-25', '2016-09-30', 'description newest', 1),
(4, 4, 'dPBjTlpGO9ikIJs3w1n', 4, '2016-09-27', '2016-09-24', 'describe', 7),
(5, 1, 'MbNDjsLDG73szor8mjU', 3, '2016-09-24', '2016-09-29', 'ffff', 7),
(6, 3, 'rndpEcA4TvN0DnRIxbw', 3, '2016-09-27', '2016-09-29', '1313', 1),
(7, 4, 'GyHRJupPnYJkgZnBGSg', 5, '2016-09-25', '2016-09-29', '123123', 1),
(8, 4, 'GyHRJupPnYJkgZnBGSg', 5, '2016-09-25', '2016-09-29', '123123', 5),
(9, 3, '7l37jgVdHgJzAAeaucZ', 0, '2016-09-27', '2016-09-28', '123123', 2),
(10, 2, '63FnrdEze8xVl0c6si6', 0, '2016-09-27', '2016-09-30', 'bbbb', 2),
(11, 1, 'nAmh8Ov04dt90AqIDTA', 3, '2016-09-26', '2016-09-29', 'qer', 1),
(12, 1, 'nAmh8Ov04dt90AqIDTA', 3, '2016-09-26', '2016-09-29', 'qer', 7),
(13, 4, 'c9jau7ktmfFYQH6UGnX', 4, '2016-09-27', '2016-09-23', 'description goes here', 1);

