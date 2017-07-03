-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2016 at 12:13 AM
-- Server version: 5.7.11-log
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtuts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `BankAccount` varchar(200) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `SSN` int(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`first_name`, `last_name`, `user_city`, `BankAccount`, `Gender`, `SSN`, `phone`, `admin_id`) VALUES
('Admin', 'Admin2', 'Egypt', '', 'Mal', 1194573445, 1156749640, 2),
('qweqw', 'dsfsdf', 'Egypt', 'wowrar1234@gmail.com', 'Male', 1211111, 1156749640, 3);

-- --------------------------------------------------------

--
-- Table structure for table `recep`
--

CREATE TABLE IF NOT EXISTS `recep` (
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `user_city` varchar(200) NOT NULL,
  `BankAccount` varchar(200) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `SSN` int(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `recep_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recep`
--

INSERT INTO `recep` (`first_name`, `last_name`, `user_city`, `BankAccount`, `Gender`, `SSN`, `phone`, `recep_id`) VALUES
('qweqwe', 'sadasd', 'Egypt', 'wowrar1234@gmail.com', 'Female', 121111, 1156749640, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `recep`
--
ALTER TABLE `recep`
  ADD PRIMARY KEY (`recep_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recep`
--
ALTER TABLE `recep`
  MODIFY `recep_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
