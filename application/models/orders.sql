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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `o_status` int(1) NOT NULL DEFAULT '1',
  `o_code` varchar(100) NOT NULL DEFAULT 'QwErTy0123456789',
  `o_count` int(11) NOT NULL DEFAULT '0',
  `o_cancle_date` date DEFAULT NULL,
  `o_submit_date` date DEFAULT NULL,
  `o_confirm_date` date DEFAULT NULL,
  `o_ship_date` date DEFAULT NULL,
  `o_deliver_date` date DEFAULT NULL,
  `o_return_date` date DEFAULT NULL,
  `o_complete_date` date DEFAULT NULL,
  `o_decline_date` date DEFAULT NULL,
  `o_description` varchar(255) NOT NULL,
  `staff_note` varchar(255) NOT NULL,
  `user_note` varchar(255) NOT NULL,
  `c_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `o_status`, `o_code`, `o_count`, `o_cancle_date`, `o_submit_date`, `o_confirm_date`, `o_ship_date`, `o_deliver_date`, `o_return_date`, `o_complete_date`, `o_decline_date`, `o_description`, `staff_note`, `user_note`, `c_id`) VALUES
(1, 2, 'QwErTy0123456789', 4, NULL, '2016-09-15', NULL, NULL, NULL, NULL, NULL, NULL, 'order description goes here', 'staff note goes here', 'user note goes here', 1),
(2, 1, 'QwErTy0121236789', 2, NULL, '2016-09-15', NULL, NULL, NULL, NULL, NULL, NULL, 'order description goes here', 'staff note goes here', 'user note goes here', 2),
(3, 3, 'QwErTy0124566789', 3, NULL, '2016-09-15', NULL, NULL, NULL, NULL, NULL, NULL, 'order description goes here', 'staff note goes here', 'user note goes here', 3),
(4, 4, 'QwErTy0127896789', 4, NULL, '2016-09-15', NULL, NULL, NULL, NULL, NULL, NULL, 'order description goes here', 'staff note goes here', 'user note goes here', 4),
(5, 2, 'QwErTy0127896789', 5, NULL, '2016-09-15', NULL, NULL, NULL, NULL, NULL, NULL, 'order description goes here', 'staff note goes here', 'user note goes here', 5),
(6, 5, 'QwErTy0126666789', 1, NULL, '2016-09-15', NULL, NULL, NULL, NULL, NULL, NULL, 'order description goes here', 'staff note goes here', 'user note goes here', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
