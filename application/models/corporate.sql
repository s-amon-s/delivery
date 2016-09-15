-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2016 at 02:32 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delivery_tcdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `corporate`
--

DROP TABLE IF EXISTS `corporate`;
CREATE TABLE IF NOT EXISTS `corporate` (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `c_name` varchar(100) NOT NULL DEFAULT 'not mentioned',
  `contact_person` varchar(255) NOT NULL DEFAULT 'not mentioned',
  `c_phone` varchar(18) NOT NULL DEFAULT 'not mentioned',
  `c_address` varchar(255) NOT NULL DEFAULT 'not mentioned',
  `c_status` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `c_maxRent` int(10) UNSIGNED NOT NULL DEFAULT '5',
  `c_maxDay` int(10) UNSIGNED NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`),
  UNIQUE KEY `c_name` (`c_name`),
  UNIQUE KEY `c_address` (`c_address`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corporate`
--

INSERT INTO `corporate` (`id`, `c_name`, `contact_person`, `c_phone`, `c_address`, `c_status`, `c_maxRent`, `c_maxDay`) VALUES
(1, 'Trinity World', 'Amon Mishra', '0922828604', 'khlongtoei Bangkok', 1, 5, 5),
(2, 'Boon Mee Lab', 'Rapee Ji', '0912347659','sukhumvit 24', 0, 5, 6),
(3, 'Geetaanjali', 'Ramesh Ji', '0877625431','sukhumvit 22', 0, 5, 7),
(4, 'Sumet Enterprise', 'Nana Ji', '0892028065','Bangna Trat', 1, 18, 4),
(5, 'Bhanu Pratap', 'Main Hi', '0897876215','Ramkola', 1, 12, 12);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
