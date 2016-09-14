-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2016 at 02:00 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Database: `delivery_tcdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `corporate`
--

DROP TABLE IF EXISTS `corporate`;
CREATE TABLE IF NOT EXISTS `corporate` (
  `c_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `c_name` varchar(100) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_status` int(1) UNSIGNED NOT NULL DEFAULT '1',
  `c_maxRent` int(10) UNSIGNED NOT NULL DEFAULT '5',
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `c_name` (`c_name`),
  UNIQUE KEY `c_address` (`c_address`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corporate`
--

INSERT INTO `corporate` (`c_id`, `c_name`, `c_address`, `c_status`, `c_maxRent`) VALUES
(1, 'TrinityWorld', 'phrom phong', 1, 4),
(2, 'Boon Mee Lab', 'sukhumvit 24', 0, 5),
(5, 'Geetaanjali', 'sukhumvit 22', 0, 5),
(6, 'Sumet Enterprise', 'Bangna Trat', 1, 18),
(7, 'Bhanu Pratap', 'khlongtoei', 1, 12);
