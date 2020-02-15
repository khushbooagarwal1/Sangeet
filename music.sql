-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2016 at 03:05 PM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_users`
--
CREATE DATABASE IF NOT EXISTS `music` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `music`;

CREATE TABLE IF NOT EXISTS `auth_users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_addr` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(15) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'CUSTOMER',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `auth_users`
--

INSERT INTO `auth_users` (`user_id`, `user_name`, `password`, `first_name`, `last_name`, `email_addr`, `address1`, `address2`, `city`, `state`, `country`, `zipcode`, `phone`, `user_type`) VALUES
(1, 'admin', 'password', 'Debabrata', 'Kar', 'debabrata.kar@hotmail.com', 'S5-360, Niladri Vihar', 'Chandrasekharpur', 'Bhubaneswar', 'Orissa', 'India', '751021', '123-234-3433', 'ADMIN'),
(2, 'debakar', 'pass123', 'Debashish', 'Kar', 'debashish.kar@gmail.com', 'VIM - 452, Shailashree Vihar', 'Chandrasekharpur', 'Bhubaneswar', 'Orissa', 'India', '751021', '3292024', 'CUSTOMER'),
(3, 'maria', 'pass999', 'Maria', 'Petersone', 'maria_peterson@gmail.com', '1234, Orange Sunset Blvd', '12th Street, Green Park Avenue', 'Foster', 'Okalahoma', 'USA', '34522', '123-234-3433', 'CUSTOMER'),
(4, 'robby', 'mypassword', 'Robby', 'Whitemore', 'robbywhitemore@gmail.com', '1245, Sunshine Blvd', 'Park Street', 'Baltimore', 'New Jersey', 'Uruguay', '23432', '234-234-2344', 'CUSTOMER'),
(5, 'john', 'pass123', 'John', 'Levester', 'john.levester@gmail.com', '2342, St. Peter Blvd', '5th Lane', 'Liverpool', 'Ohio', 'USA', '34534', '234-232-5433', 'CUSTOMER');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(50) NOT NULL,
  `file_description` varchar(50) NOT NULL,
  `share` varchar(1) NOT NULL DEFAULT 'Y',
  `Date_added` date NOT NULL,
  `file_type` varchar(15) NOT NULL DEFAULT 'audio/mpeg',
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`music_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`user_id`, `music_id`, `file_name`, `file_description`, `share`, `Date_added`, `file_type`, `owner`) VALUES
(1, 14, 'Hum-tum.mp3', '', 'Y', '2016-11-20', 'audio/mpeg', 1),
(2, 17, 'yesss.mp3', '', 'Y', '2016-11-20', 'audio/mpeg', 2),
(2, 18, 'nooo.mp3', '', 'Y', '2016-11-20', 'audio/mpeg', 2),
(1, 21, 'yesss.mp3', '', 'Y', '2016-11-20', 'audio/mpeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Khushboo', 'Agarwal', 'khushbooagarwal503@gmail.com', 'password'),
(2, 'Richa', 'Verma', 'richa.verma598@gmail.com', 'password');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
