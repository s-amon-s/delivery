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
-- Table structure for table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
CREATE TABLE IF NOT EXISTS `orders_items` (
  `oi_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `o_id` int(10) UNSIGNED NOT NULL,
  `bib_id` varchar(100) NOT NULL,
  PRIMARY KEY (`oi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`oi_id`, `o_id`, `bib_id`) VALUES
(1, 13, 'b00034775'),
(2, 13, 'b00035388'),
(3, 13, 'b00037226'),
(4, 13, 'b00037197');
