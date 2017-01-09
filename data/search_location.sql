-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2017 at 03:55 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.6.28-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gpis`
--

-- --------------------------------------------------------

--
-- Table structure for table `search_location`
--

CREATE TABLE IF NOT EXISTS `search_location` (
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `search_words` varchar(255) NOT NULL,
  `search_count` int(11) NOT NULL,
  UNIQUE KEY `lat-lon` (`latitude`) COMMENT 'unique-lat-long'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_location`
--

INSERT INTO `search_location` (`latitude`, `longitude`, `search_words`, `search_count`) VALUES
(48.019573, 66.92368399999998, 'Kazakhstan', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
