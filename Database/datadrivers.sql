-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 02:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datadrivers`
--
CREATE DATABASE IF NOT EXISTS `datadrivers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `datadrivers`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `loginID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `type` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'user is active by default',
  `active_start` date NOT NULL,
  `active_quit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginID`, `email`, `password`, `type`, `active`, `active_start`, `active_quit`) VALUES
(1, 'admin@gmail.com', 'admin', 'Admin', 1, '2022-01-01', NULL),
(2, 'opettaja@gmail.com', 'opettaja', 'Opettaja', 1, '2022-01-01', NULL),
(3, 'oppilas@gmail.com', 'oppilas', 'Oppilas', 1, '2022-01-02', NULL),
(4, 'talkkari@gmail.com', 'talkkari', 'Talkkari', 0, '2022-04-01', '2022-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `testID` int(11) NOT NULL COMMENT 'PK',
  `test_name` varchar(20) NOT NULL,
  `question_1` varchar(255) NOT NULL,
  `question_2` varchar(255) NOT NULL,
  `question_3` varchar(255) NOT NULL,
  `correct_answer_1` tinyint(4) NOT NULL,
  `correct_answer_2` tinyint(4) NOT NULL,
  `correct_answer_3` tinyint(4) NOT NULL,
  `max_score` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`testID`, `test_name`, `question_1`, `question_2`, `question_3`, `correct_answer_1`, `correct_answer_2`, `correct_answer_3`, `max_score`) VALUES
(1, 'Mensan testi', 'Missä sijaitsee kytkin?', 'Mikä on oikea toimintajärjestys?', 'Mikä on suurin sallittu nopeus Suomessa?', 1, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

DROP TABLE IF EXISTS `test_result`;
CREATE TABLE `test_result` (
  `test_resultID` int(11) NOT NULL COMMENT 'PK',
  `userID` int(11) NOT NULL COMMENT 'FK',
  `testID` int(11) NOT NULL COMMENT 'FK',
  `user_answer_1` tinyint(4) NOT NULL,
  `user_answer_2` tinyint(4) NOT NULL,
  `user_answer_3` tinyint(4) NOT NULL,
  `user_score` tinyint(4) NOT NULL,
  `test_done` date NOT NULL,
  `feedback` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`test_resultID`, `userID`, `testID`, `user_answer_1`, `user_answer_2`, `user_answer_3`, `user_score`, `test_done`, `feedback`) VALUES
(1, 1, 1, 1, 2, 3, 2, '2022-04-27', 'Takasin kouluun!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userID` int(11) NOT NULL COMMENT 'PK',
  `loginID` int(11) NOT NULL COMMENT 'FK',
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `loginID`, `first_name`, `last_name`, `address`, `zip_code`, `city`, `state`, `country`, `telephone`) VALUES
(1, 3, 'Jaska', 'Jokunen', 'Nollakuja 1', '68100', 'Keijula', 'Savo', 'Mikamikamaa', '0461122334'),
(2, 2, 'James', 'Gosling', 'First st 1', '10001', 'New York city', 'New York', 'USA', NULL),
(3, 1, 'Kevin ', 'Mitnick', 'Fort Mason, B201', ' 94123', 'Alcatraz Island', 'California', 'USA', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`test_resultID`),
  ADD KEY `user_to_result` (`userID`),
  ADD KEY `test_to_result` (`testID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `user_to_login` (`loginID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE `test_result`
  MODIFY `test_resultID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `test_result`
--
ALTER TABLE `test_result`
  ADD CONSTRAINT `test_to_result` FOREIGN KEY (`testID`) REFERENCES `test` (`testID`),
  ADD CONSTRAINT `user_to_result` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_to_login` FOREIGN KEY (`loginID`) REFERENCES `login` (`loginID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
