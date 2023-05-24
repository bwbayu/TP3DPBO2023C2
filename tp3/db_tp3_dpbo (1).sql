-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 10:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tp3_dpbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `idol`
--

CREATE TABLE `idol` (
  `IDOL_ID` int(11) NOT NULL,
  `GROUP_ID` int(11) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `IDOL_NAME` varchar(50) NOT NULL,
  `REAL_NAME` varchar(100) NOT NULL,
  `IDOL_AGE` int(11) NOT NULL,
  `IDOL_NATIONALITY` varchar(50) NOT NULL,
  `IDOL_BORN` date NOT NULL,
  `IDOL_HEIGHT` int(11) NOT NULL,
  `IDOL_IMAGE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idol`
--

INSERT INTO `idol` (`IDOL_ID`, `GROUP_ID`, `ROLE_ID`, `IDOL_NAME`, `REAL_NAME`, `IDOL_AGE`, `IDOL_NATIONALITY`, `IDOL_BORN`, `IDOL_HEIGHT`, `IDOL_IMAGE`) VALUES
(1, 1, 1, 'Wendy', 'Shon Seung-wan', 29, 'South Korea', '1994-02-21', 159, 'wendy.jpg'),
(8, 2, 1, 'haerin', 'Kang Hae-rin', 17, 'south korea', '2006-05-15', 165, 'haerin.jpg'),
(9, 1, 2, 'seulgi', 'Kang Seul-gi', 29, 'south korea', '1994-02-10', 161, 'seulgi.jpg'),
(10, 2, 1, 'Hanni', 'Hanni Pham', 18, 'vietnam', '2004-10-06', 162, 'hanni.jpg'),
(11, 7, 1, 'Yunjin', 'Huh Yun-jin', 21, 'American', '2001-10-08', 172, 'yunjin.jpg'),
(12, 9, 1, 'shuhua', 'Yeh Shu Hua', 23, 'Taiwanese', '2000-01-06', 161, 'shuhua.jpg'),
(13, 4, 1, 'DO', 'Doh Kyung-soo', 30, 'south korea', '1993-01-12', 173, 'do.jpg'),
(14, 8, 1, 'Rose', 'Roseanne Park', 26, 'Australian', '1997-02-11', 168, 'rose.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `idol_group`
--

CREATE TABLE `idol_group` (
  `GROUP_ID` int(11) NOT NULL,
  `GROUP_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idol_group`
--

INSERT INTO `idol_group` (`GROUP_ID`, `GROUP_NAME`) VALUES
(1, 'Blue Velvet'),
(2, 'NewJeans'),
(4, 'EXO'),
(7, 'LE SSERAFIM'),
(8, 'Blackpink'),
(9, 'GI-DLE');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ROLE_ID`, `ROLE_NAME`) VALUES
(1, 'Main Vocalist'),
(2, 'Dancer'),
(10, 'Visual'),
(11, 'Leader');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idol`
--
ALTER TABLE `idol`
  ADD PRIMARY KEY (`IDOL_ID`),
  ADD KEY `RELATIONSHIP_1_FK` (`GROUP_ID`),
  ADD KEY `RELATIONSHIP_2_FK` (`ROLE_ID`);

--
-- Indexes for table `idol_group`
--
ALTER TABLE `idol_group`
  ADD PRIMARY KEY (`GROUP_ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idol`
--
ALTER TABLE `idol`
  MODIFY `IDOL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `idol_group`
--
ALTER TABLE `idol_group`
  MODIFY `GROUP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `idol`
--
ALTER TABLE `idol`
  ADD CONSTRAINT `idol_ibfk_1` FOREIGN KEY (`GROUP_ID`) REFERENCES `idol_group` (`GROUP_ID`),
  ADD CONSTRAINT `idol_ibfk_2` FOREIGN KEY (`ROLE_ID`) REFERENCES `role` (`ROLE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
