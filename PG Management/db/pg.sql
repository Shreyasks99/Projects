-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 12:27 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`aid` int(11) NOT NULL,
  `aname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `pg`
--

CREATE TABLE IF NOT EXISTS `pg` (
`pid` int(11) NOT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `paddr` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `foodType` varchar(255) DEFAULT NULL,
  `targetGender` varchar(2) DEFAULT NULL,
  `minFees` int(11) DEFAULT NULL,
  `maxFees` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg`
--

INSERT INTO `pg` (`pid`, `pname`, `paddr`, `phone`, `foodType`, `targetGender`, `minFees`, `maxFees`) VALUES
(1, 'Paradise', 'Near Police station, Moodabidri', 252552, 'veg', 'B', 3500, 3500),
(2, 'VeenaPG', 'Laxmibai Circle, Moodabidri', 214748, 'nonveg', 'M', 4000, 5500);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`rid` int(11) NOT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rid`, `comment`, `stars`, `pid`, `uid`) VALUES
(1, 'very good', 4, 1, 1),
(2, 'Super Awesome', 3, 1, 2),
(4, 'good', 3, 1, 1),
(8, 'test', 4, 1, 1),
(9, 'test', 3, 2, 1),
(10, 'test', 3, 2, 1),
(11, 'test', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`uid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `password`) VALUES
(1, 'testuser1', '1234'),
(2, 'Test User 2', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `pg`
--
ALTER TABLE `pg`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`rid`), ADD KEY `FK_pg_pid` (`pid`), ADD KEY `FK_users_uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pg`
--
ALTER TABLE `pg`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
ADD CONSTRAINT `FK_pg_pid` FOREIGN KEY (`pid`) REFERENCES `pg` (`pid`),
ADD CONSTRAINT `FK_users_uid` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
