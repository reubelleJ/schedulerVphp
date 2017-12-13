-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2017 at 09:46 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered_companies`
--

CREATE TABLE `registered_companies` (
  `company_name` tinytext NOT NULL,
  `company_email` text NOT NULL,
  `company_page` text NOT NULL,
  `company_password` text NOT NULL,
  `address` text NOT NULL,
  `city` tinytext NOT NULL,
  `state` tinytext NOT NULL,
  `zipcode` int(11) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_companies`
--

INSERT INTO `registered_companies` (`company_name`, `company_email`, `company_page`, `company_password`, `address`, `city`, `state`, `zipcode`, `date_registered`) VALUES
('companyA', 'companyA@acomp.com', 'ACOMPANY.COM', '', '', '', '', 0, '0000-00-00'),
('companyA', 'companyA@acomp.com', 'ACOMPANY.COM', '', '', '', '', 0, '0000-00-00'),
('companyB', 'companyB@bcomp.com', 'BCOMPANY.com', '', '', '', '', 0, '0000-00-00'),
('companyB', 'companyB@bcomp.com', 'BCOMPANY.com', '', '', '', '', 0, '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
