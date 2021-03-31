-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 06:51 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecowaste`
--

-- --------------------------------------------------------

--
-- Table structure for table `vegetables`
--

CREATE TABLE `vegetables` (
  `veg_id` int(2) DEFAULT NULL,
  `veg_name` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vegetables`
--

INSERT INTO `vegetables` (`veg_id`, `veg_name`) VALUES
(0, 'Banana'),
(1, 'Beet'),
(2, 'Bittergourd'),
(3, 'Brinjal'),
(4, 'Broccoli'),
(5, 'Cabbage'),
(6, 'Calabash'),
(7, 'Carrot'),
(8, 'Cauliflower'),
(9, 'Chillies(long)'),
(10, 'Chillies(small)'),
(11, 'Chouchou'),
(12, 'Courgette'),
(13, 'Cucumber'),
(14, 'Echalotte'),
(15, 'Eddoes(curry)'),
(16, 'Eddoes(violet)'),
(17, 'Garlic'),
(18, 'Ginger'),
(19, 'Green_peas'),
(20, 'Greens'),
(21, 'Groundnut'),
(22, 'Ladies_finger'),
(23, 'Leek'),
(24, 'Lettuce'),
(25, 'Maize'),
(26, 'Manioc'),
(27, 'Onion'),
(28, 'Patole'),
(29, 'Petsai'),
(30, 'Pineapple'),
(31, 'Pipengaille'),
(32, 'Potato'),
(33, 'Pumpkin'),
(34, 'Rice'),
(35, 'Squash'),
(36, 'Sweet potato'),
(37, 'Sweet_pepper'),
(38, 'Tomato'),
(39, 'Voehm');

-- --------------------------------------------------------

--
-- Table structure for table `veg_per_month`
--

CREATE TABLE `veg_per_month` (
  `veg_id` int(11) NOT NULL,
  `month_no` int(11) NOT NULL,
  `summer_prod` double NOT NULL,
  `summer_demand` double NOT NULL,
  `fulfilled` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veg_per_month`
--

INSERT INTO `veg_per_month` (`veg_id`, `month_no`, `summer_prod`, `summer_demand`, `fulfilled`) VALUES
(0, 3, 10, 100, 0),
(0, 2, 22, 99, 0),
(0, 1, 21, 115, 0),
(0, 4, 7, 78, 0),
(0, 5, 0, 0, 0),
(0, 6, 0, 0, 0),
(0, 7, 0, 0, 0),
(0, 8, 0, 0, 0),
(0, 9, 0, 0, 0),
(0, 10, 0, 0, 0),
(0, 11, 19, 100, 0),
(0, 12, 19, 103, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `veg_per_month`
--
ALTER TABLE `veg_per_month`
  ADD PRIMARY KEY (`veg_id`,`month_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
