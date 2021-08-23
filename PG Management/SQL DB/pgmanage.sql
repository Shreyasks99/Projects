-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2020 at 07:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pgmanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `userId` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
`adminNo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userId`, `password`, `adminNo`) VALUES
('poorvi', '123', 1),
('Poonam', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
`guest_id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `firstName`, `lastName`, `email`, `phone`, `room_no`) VALUES
(12, 'poonam ', 'pandey', 'iampandey@hotmail.com', 2147483647, 106);

-- --------------------------------------------------------

--
-- Table structure for table `pg_rooms`
--

CREATE TABLE IF NOT EXISTS `pg_rooms` (
  `room_no` int(10) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_rooms`
--

INSERT INTO `pg_rooms` (`room_no`, `status`) VALUES
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(108, 0),
(110, 0),
(111, 0),
(112, 0),
(113, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`adminNo`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
 ADD PRIMARY KEY (`guest_id`), ADD KEY `FK_room` (`room_no`);

--
-- Indexes for table `pg_rooms`
--
ALTER TABLE `pg_rooms`
 ADD PRIMARY KEY (`room_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `adminNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `guest`
--
ALTER TABLE `guest`
ADD CONSTRAINT `FK_room` FOREIGN KEY (`room_no`) REFERENCES `pg_rooms` (`room_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
