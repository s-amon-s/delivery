-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2016 at 02:33 PM
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
-- Table structure for table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
CREATE TABLE IF NOT EXISTS `orders_items` (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `o_id` int(10) UNSIGNED NOT NULL,
  `bib_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `o_id`, `bib_id`) VALUES
(1, 1, 'b00034775'),
(2, 1, 'b00035388'),
(3, 1, 'b00037226'),
(4, 1, 'b00037197'),
(5, 2, 'b00034775'),
(6, 2, 'b00035388'),
(7, 3, 'b00037226'),
(8, 3, 'b00037197'),
(9, 3, 'b00034775'),
(10, 4, 'b00035388'),
(11, 4, 'b00037226'),
(12, 4, 'b00037197'),
(13, 4, 'b00034775'),
(14, 5, 'b00035388'),
(15, 5, 'b00037226'),
(16, 5, 'b00037197'),
(17, 5, 'b00034775'),
(18, 5, 'b00035388'),
(19, 1, 'b00037226');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
