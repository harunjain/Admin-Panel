-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2017 at 06:03 PM
-- Server version: 10.0.29-MariaDB
-- PHP Version: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cl53-a-wordp-6pp`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `link` varchar(30) NOT NULL,
  `Address` text NOT NULL,
  `wedo` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `name`, `email`, `contact`, `link`, `Address`, `wedo`) VALUES
(3, 'rajat', 'rahulkr541@gmail.com', 8750030780, 'projects.com', 'h2/41 kunwar singh nagar nangloi', 'generally we are non profit organisation and work for community');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `post` varchar(35) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `name`, `post`, `contact`, `email`) VALUES
(3, 'rajat', 'developer', 8388607, 'rahulkr541@gmail.com'),
(4, 'Rahul', 'ceo', 8388607, 'rajat7719952gmail.com'),
(5, 'rajatkr', 'worker', 999999999999, 'rahulkr541@gmail.com'),
(6, 'Amit', 'Worker', 777777777777, 'rahul.glocious@gmail.com'),
(7, 'ami', '', 0, ''),
(8, '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `email` varchar(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`email`, `name`, `password`) VALUES
('harunjain2@gmail.com', 'harun', 'cXdlcnR5'),
('Kap.shikhar@gmail.com', 'shikhar', 'MTIz'),
('rahulkr541@gmail.com', 'Rahul', 'MTIzNDU2'),
('rajat771995@gmail.com', 'Rajat kumar', 'cmFqYXRrdW1hcg==');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
