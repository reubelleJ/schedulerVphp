-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 01:46 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employees`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_event`
--

CREATE TABLE IF NOT EXISTS `calendar_event` (
  `id` int(11) NOT NULL,
  `event` varchar(300) DEFAULT NULL,
  `description` text NOT NULL,
  `day` int(8) DEFAULT NULL,
  `month` int(8) DEFAULT NULL,
  `year` int(8) DEFAULT NULL,
  `time_from` varchar(10) NOT NULL,
  `time_until` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_event`
--

INSERT INTO `calendar_event` (`id`, `event`, `description`, `day`, `month`, `year`, `time_from`, `time_until`) VALUES
(1, 'taken work shift', 'Cashier&nbsp;', 16, 12, 2017, '0130', '0900'),
(2, 'Available Shift', 'Leader of the Day position<div>5 hrs</div><div><br></div>', 19, 12, 2017, '0340', '1040'),
(3, 'Will swap morning Monday Shift for any afternoon shift', 'Will be traveling back, need my hours though!', 1, 1, 2018, '0730', '1400');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_users`
--

CREATE TABLE IF NOT EXISTS `calendar_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_users`
--

INSERT INTO `calendar_users` (`id`, `username`, `password`) VALUES
(1, 'user', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar_event`
--
ALTER TABLE `calendar_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_users`
--
ALTER TABLE `calendar_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_event`
--
ALTER TABLE `calendar_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `calendar_users`
--
ALTER TABLE `calendar_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
