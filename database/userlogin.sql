-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 05:07 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userlogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

DROP TABLE IF EXISTS `guest`;
CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactno` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `firstname`, `middlename`, `lastname`, `address`, `contactno`) VALUES
(1, 'khurram', 'joe', 'farooq', '63 Clanbrassil Street Lower, Dublin 8', '345678'),
(2, 'khurram', 'asgdhfg', 'farooq', '63 Clanbrassil Street Lower, Dublin 8', 'fsdgfhgjhj'),
(3, 'khurram', 'wretrt', 'farooq', '63 Clanbrassil Street Lower, Dublin 8', '34567'),
(4, 'khurram', 'dasdgfh', 'farooq', '63 Clanbrassil Street Lower, Dublin 8', '5436757');

-- --------------------------------------------------------

--
-- Table structure for table `profilegallery`
--

DROP TABLE IF EXISTS `profilegallery`;
CREATE TABLE `profilegallery` (
  `id` int(11) NOT NULL,
  `name` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `price`, `photo`) VALUES
(1, 'Standard', '2000', 'images/1.jpg'),
(2, 'Superior', '2400', 'images/3.jpg'),
(3, 'Super Deluxe', '2800', 'images/4.jpg'),
(4, 'Jr. Suite', '3800', 'images/5.jpg'),
(5, 'Executive Suite', '4000', 'images/6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` int(5) NOT NULL,
  `extra_bed` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `days` int(2) NOT NULL,
  `checkin` date NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout` date NOT NULL,
  `checkout_time` time NOT NULL,
  `bill` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `guest_id`, `room_id`, `room_no`, `extra_bed`, `status`, `days`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `bill`) VALUES
(1, 1, 1, 0, 0, 'Pending', 0, '2019-08-30', '00:00:00', '0000-00-00', '00:00:00', ''),
(2, 3, 1, 0, 0, 'Pending', 0, '2019-09-01', '00:00:00', '0000-00-00', '00:00:00', ''),
(3, 4, 1, 0, 0, 'Pending', 0, '2020-07-07', '00:00:00', '0000-00-00', '00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Activation_Code` varchar(255) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `Activation_Code`, `UserName`, `Password`, `Active`) VALUES
(19, 'farooq', 'munisahfarooq@gmail.com', '7f5642cd0c851c48e5dfbd492e1cdee9a93cba81b38677376437c6587b3af95e', 'farooq', '9b871512327c09ce91dd649b3f96a63b7408ef267c8cc5710114e629730cb61f', 1),
(20, 'khurram farooq', 'khurram.f1997@gmail.com', 'd829857eb1366e70be857a69886d1555af0d32681beab068afb93492c2e2b843', 'khurram', 'khurram.f1997@gmail.com8023221', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `profilegallery`
--
ALTER TABLE `profilegallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profilegallery`
--
ALTER TABLE `profilegallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
