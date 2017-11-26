-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 09:05 AM
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
-- Database: `auditor`
--

-- --------------------------------------------------------

--
-- Table structure for table `adb`
--

CREATE TABLE `adb` (
  `aid` int(10) UNSIGNED NOT NULL,
  `adate` datetime NOT NULL,
  `anote` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `udb`
--

CREATE TABLE `udb` (
  `uid` varchar(20) NOT NULL,
  `pw` varchar(20) NOT NULL,
  `uname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `udb`
--

INSERT INTO `udb` (`uid`, `pw`, `uname`) VALUES
('auditor', 'auditor', 'auditor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adb`
--
ALTER TABLE `adb`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `udb`
--
ALTER TABLE `udb`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `UNIQUE` (`pw`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adb`
--
ALTER TABLE `adb`
  MODIFY `aid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
