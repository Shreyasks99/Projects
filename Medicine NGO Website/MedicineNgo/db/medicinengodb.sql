-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 12:55 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicinengodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `AREA_ID` int(11) NOT NULL,
  `CITY_ID` int(11) NOT NULL,
  `STATE_ID` int(11) NOT NULL,
  `AREA_NAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`AREA_ID`, `CITY_ID`, `STATE_ID`, `AREA_NAME`) VALUES
(2, 3, 1, 'old panvel'),
(3, 3, 1, 'new panvel'),
(5, 3, 1, 'sector 26');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CITY_ID` int(11) NOT NULL,
  `STATE_ID` int(11) NOT NULL,
  `CITY_NAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CITY_ID`, `STATE_ID`, `CITY_NAME`) VALUES
(3, 1, 'panvel'),
(4, 1, 'kharghar'),
(5, 1, 'khandeshwar'),
(7, 1, 'turbhe'),
(8, 1, 'thane'),
(9, 1, 'rasayani');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `COUNTRY_ID` int(11) NOT NULL,
  `COUNTRY_NAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`COUNTRY_ID`, `COUNTRY_NAME`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `DONOR_ID` int(11) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `FATHER_NAME` varchar(150) NOT NULL,
  `GENDER` varchar(150) NOT NULL,
  `DOB` date NOT NULL,
  `ORGANIZATION` varchar(111) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `ADDRESS` text NOT NULL,
  `AREA` varchar(150) NOT NULL,
  `CITY` varchar(150) NOT NULL,
  `PINCODE` varchar(150) NOT NULL,
  `STATE` varchar(150) NOT NULL,
  `COUNTRY` varchar(150) NOT NULL,
  `CONTACT_1` varchar(150) NOT NULL,
  `CONTACT_2` varchar(150) NOT NULL,
  `VOLUNTARY` text NOT NULL,
  `LAST_D_DATE` date NOT NULL,
  `DONOR_PIC` varchar(150) NOT NULL,
  `STATUS` varchar(111) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`DONOR_ID`, `NAME`, `FATHER_NAME`, `GENDER`, `DOB`, `ORGANIZATION`, `EMAIL`, `ADDRESS`, `AREA`, `CITY`, `PINCODE`, `STATE`, `COUNTRY`, `CONTACT_1`, `CONTACT_2`, `VOLUNTARY`, `LAST_D_DATE`, `DONOR_PIC`, `STATUS`, `username`, `password`) VALUES
(1, 'tushar', 'aa', 'Male', '2020-02-05', 'Personal', 'tushar@gmail.com', 'at panvel', 'old panvel', 'panvel', '421306', 'maharastra', 'India', '9922840819', '9922719281', 'Yes', '2001-02-27', 'donor_image/b1.jpg', '0', 'tushar', 'tushar'),
(7, 'meenu', 'jayesh', 'Female', '2020-04-15', 'Commercial Organization', 'meenu@gmail.com', 'at kharghar', 'near station', 'panvel', '421302', 'maharastra', 'india', '9933838372', '8822273727', 'No', '0000-00-00', 'donor_image/meenu.jpg', '1', 'meenu', 'meenu'),
(8, 'saloni', 'sham', 'Female', '2020-04-01', 'Personal', 'saloni@gmail.com', 'at rasayani,aradhana building', 'near pillai collage', 'panvel', '231234', 'maharastra', 'india', '8822738272', '2344343232', 'Yes', '2020-04-20', 'donor_image/saloni.jpg', '1', 'saloni', 'saloni');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `mid` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `medicine_brand` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `man_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `donated_id` int(11) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `donor_number` bigint(20) NOT NULL,
  `image` varchar(30) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'not collected',
  `stock` varchar(50) NOT NULL DEFAULT 'yet to arrived',
  `donated` varchar(20) NOT NULL DEFAULT 'not yet'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`mid`, `medicine_name`, `medicine_brand`, `type`, `man_date`, `exp_date`, `donated_id`, `donor_name`, `donor_number`, `image`, `quantity`, `status`, `stock`, `donated`) VALUES
(2, 'dcold-total', 'dcold', 'drug', '2020-01-09', '2020-04-23', 7, 'meenu', 9933838372, 'medicine_image/445WhatsApp Ima', 0, 'collected', 'In Stock', 'not yet'),
(3, 'sanitizer', 'sun pharma', 'sanitizer', '2020-04-07', '2020-04-14', 7, 'meenu', 9933838372, 'medicine_image/640back2.png', 500, 'collected', 'In Stock', 'not yet'),
(4, 'clorine drops', 'cipla', 'liquid drops', '2020-04-15', '2020-04-21', 7, 'meenu', 9933838372, 'medicine_image/717back.png', 500, 'not collected', 'yet to arrived', 'not yet'),
(5, 'ear infection drop', 'cipla', 'liquid drops', '2020-04-24', '2020-04-02', 7, 'meenu', 9933838372, 'medicine_image/352back2.png', 500, 'not collected', 'yet to arrived', 'not yet');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `CONTACT` text NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `MESSAGE` text NOT NULL,
  `STATUS` text NOT NULL,
  `LOGS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `NAME`, `CONTACT`, `EMAIL`, `MESSAGE`, `STATUS`, `LOGS`) VALUES
(1, 'sudhir joshi', '9922840444', 'sudhirjoshi@gmail.com', 'hey there!we are co-ordinator of the orphanage home. we often need medicine for the people can you help us? we live in Kharghar. please let me know or call me.', '0', '2020-04-19 14:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `STATE_ID` int(11) NOT NULL,
  `STATE_NAME` varchar(150) NOT NULL,
  `COUNTRY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`STATE_ID`, `STATE_NAME`, `COUNTRY_ID`) VALUES
(1, 'maharastra', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`AREA_ID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CITY_ID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`COUNTRY_ID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`DONOR_ID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`STATE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `AREA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CITY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `COUNTRY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `DONOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `STATE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
