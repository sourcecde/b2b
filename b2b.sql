-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2018 at 05:30 PM
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
-- Database: `b2b`
--

-- --------------------------------------------------------

--
-- Table structure for table `b2b_item`
--

CREATE TABLE `b2b_item` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `created_on` date NOT NULL,
  `isdeleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `isblocked` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b2b_item`
--

INSERT INTO `b2b_item` (`id`, `name`, `image`, `description`, `quantity`, `category`, `created_on`, `isdeleted`, `isblocked`) VALUES
(1, 'Item9', 'Screenshot (3).png', 'Descriptionsok', '900', 'option2', '2018-01-09', 'N', 'N'),
(2, 'Item', 'Screenshot (3).png', 'Testtt', '73', 'option3', '2018-01-09', 'N', 'N'),
(3, 'Salesmans Item', 'IMG_20170716_143907916.jpg', 'Item descriptionssss', '20', 'option3', '0000-00-00', 'N', 'N'),
(4, 'ss', 'Screenshot (2).png', 'ss', '10', 'option2', '0000-00-00', 'N', 'N'),
(5, 'aa', 'Screenshot (2).png', 'aaa', '10', 'option2', '2018-01-09', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `b2b_party`
--

CREATE TABLE `b2b_party` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `gstin` varchar(50) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `office_no` int(15) NOT NULL,
  `isdeleted` enum('N','Y') NOT NULL DEFAULT 'N',
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b2b_party`
--

INSERT INTO `b2b_party` (`id`, `name`, `address`, `city`, `state`, `pin`, `gstin`, `mobile_no`, `office_no`, `isdeleted`, `created_on`) VALUES
(1, 'Suvam Basak', '3 shantinagar road', 'uttarpara', 'West Bengal', '712232', '1235', 2147483647, 2147483647, 'N', '2018-01-09'),
(2, 'Testy', 'Test address', 'Test City', 'Test State', '000', '0909', 1010, 1010, 'N', '2018-01-09'),
(4, 'Test20', 'Test2 hey', 'Test2', 'Test2', '1234', '007', 9090, 90909, 'N', '2018-01-09'),
(5, 'Suvam Basak', 'Bari', 'uttarpara', 'West Bengal', '7', '007', 2147483, 2100, 'N', '2018-01-09'),
(6, 'Salesmans pty', 'salesmn', 'sal', 'sal', '9090', '60979', 789456, 456231, 'N', '2018-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `b2b_users`
--

CREATE TABLE `b2b_users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `pwd` varchar(200) DEFAULT NULL,
  `created_on` date NOT NULL,
  `isdeleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `isblocked` enum('Y','N') NOT NULL DEFAULT 'N',
  `type` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b2b_users`
--

INSERT INTO `b2b_users` (`id`, `name`, `address`, `mobile`, `dob`, `gender`, `username`, `pwd`, `created_on`, `isdeleted`, `isblocked`, `type`) VALUES
(1, 'Admin', 'Admin', 0, '2018-01-08', '#', 'admin', 'admin', '2018-01-08', 'N', 'N', 'admin'),
(2, 'Suvam Basak', '3 shantinagar road', 7, '2018-01-01', 'female', 'user', 'user', '2018-01-08', 'N', 'N', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b2b_item`
--
ALTER TABLE `b2b_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b2b_party`
--
ALTER TABLE `b2b_party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b2b_users`
--
ALTER TABLE `b2b_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `b2b_item`
--
ALTER TABLE `b2b_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `b2b_party`
--
ALTER TABLE `b2b_party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `b2b_users`
--
ALTER TABLE `b2b_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
