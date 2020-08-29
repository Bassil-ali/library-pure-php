-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2020 at 04:39 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wesite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `date`) VALUES
(2, 'bassil 22', '$2y$10$K0CW7bKJ3VTrXTYetqO08eOHWhJLoGR3TMzl1zVwg69jx1GbxZGla', 'Bassil', 'Ali', 'baselali337@gmail.com', '2020-05-23 21:33:56'),
(5, 'bassil', '$2y$10$x5ZPb9nr2zn16.RjRk1ugOXSUB9AHXdrB6ok05XDKwIrlzioIkZ1C', 'Bassil', 'Ali', 'baselali337@gmail.com', '2020-05-26 19:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name_id` int(11) NOT NULL,
  `page_name` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `rank` int(11) NOT NULL,
  `visible` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `item_name_id` (`item_name_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `item_name_id`, `page_name`, `content`, `rank`, `visible`, `status`, `date`) VALUES
(2, 2, 'pdf1', 'this is avengers books', 1, 1, 1, '2020-05-26 19:29:23'),
(3, 3, 'pdf2', 'this is avatar books', 2, 1, 2, '2020-05-26 19:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `website_navbar`
--

DROP TABLE IF EXISTS `website_navbar`;
CREATE TABLE IF NOT EXISTS `website_navbar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(49) NOT NULL,
  `rank` int(11) NOT NULL,
  `visible` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_navbar`
--

INSERT INTO `website_navbar` (`id`, `item_name`, `rank`, `visible`, `date`) VALUES
(1, 'nothing', 1, 1, '2020-05-26 19:24:55'),
(2, 'group books1', 2, 1, '2020-05-26 19:24:55'),
(3, 'group books2', 3, 1, '2020-05-26 19:24:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
