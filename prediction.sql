-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 01:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prediction`
--

-- --------------------------------------------------------

--
-- Table structure for table `prediction_probability`
--

CREATE TABLE `prediction_probability` (
  `cyclone` float NOT NULL,
  `earthquake` float NOT NULL,
  `flood` float NOT NULL,
  `wildfire` float NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prediction_probability`
--

INSERT INTO `prediction_probability` (`cyclone`, `earthquake`, `flood`, `wildfire`, `timestamp`) VALUES
(0.000133544, 0.699015, 0.299504, 0.00134819, 1606816289),
(0.699015, 0.000133544, 0.299504, 0.00134819, 1606816299);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prediction_probability`
--
ALTER TABLE `prediction_probability`
  ADD PRIMARY KEY (`timestamp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
