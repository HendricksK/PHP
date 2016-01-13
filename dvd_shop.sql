-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2016 at 11:12 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dvd_shop`
--
CREATE DATABASE IF NOT EXISTS `dvd_shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dvd_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `Category_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `category_name`) VALUES
(1, 'comedy'),
(2, 'action');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `sa_id_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `name`, `surname`, `contact_number`, `sa_id_number`, `address`, `email`) VALUES
(1, 'Bob', 'Marley', '1234567890', '1234567890123', '2 Kingston way, kingston island', 'bob@thewailersband.com'),
(2, 'Peter', 'Tosh', '0987654321', '098765432123', '12 legalize it way, kingson, a landmasss ', 'peter@thewailersband.com'),
(4, 'Amber', 'Toshj', '8723812387127', '0987654321', '12 flemming road, jurrasic street, london town, 4567', 'dfhdsbbfha@sjhfdj.com');

-- --------------------------------------------------------

--
-- Table structure for table `dvd`
--

CREATE TABLE IF NOT EXISTS `dvd` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '0',
  `description` varchar(255) DEFAULT '0',
  `release_date` varchar(20) DEFAULT '0',
  `category_id` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dvd`
--

INSERT INTO `dvd` (`ID`, `name`, `description`, `release_date`, `category_id`) VALUES
(1, 'Inception', 'A thief who steals corporate secrets through use of the dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.', '2012', 1),
(2, 'The Dark Knight', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, the caped crusader must come to terms with one of the greatest psychological tests of his ability to fight injustice.', '2012', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dvd_orders`
--

CREATE TABLE IF NOT EXISTS `dvd_orders` (
  `dvd_orders_ID` int(50) unsigned NOT NULL,
  `order_id` int(50) unsigned NOT NULL,
  `dvd_id` int(50) NOT NULL,
  PRIMARY KEY (`dvd_orders_ID`),
  KEY `order_id` (`order_id`),
  KEY `dvd_id` (`dvd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dvd_orders`
--

INSERT INTO `dvd_orders` (`dvd_orders_ID`, `order_id`, `dvd_id`) VALUES
(0, 0, 2),
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orders_ID` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `rent_date` varchar(50) DEFAULT NULL,
  `due_date` varchar(50) DEFAULT NULL,
  `actual_return_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`orders_ID`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_ID`, `customer_id`, `rent_date`, `due_date`, `actual_return_date`) VALUES
(1, 1, '13-01-2016', '15-01-2016', NULL),
(2, 1, '13-01-2016', '15-01-2016', NULL),
(3, 2, '2016-01-13', '2016-01-15', '2016-01-14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
