-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09.05.2022 klo 17:28
-- Palvelimen versio: 10.4.21-MariaDB
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

-- --------------------------------------------------------

--
-- Rakenne taululle `answer`
--

CREATE TABLE `answer` (
  `answerID` int(11) NOT NULL,
  `answer_1` varchar(255) NOT NULL,
  `answer_2` varchar(255) NOT NULL,
  `answer_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `answer`
--

INSERT INTO `answer` (`answerID`, `answer_1`, `answer_2`, `answer_3`) VALUES
(1, 'Testivastaus1_1', 'Testivastaus1_2', 'Testivastaus1_3');

-- --------------------------------------------------------

--
-- Rakenne taululle `certificate`
--

CREATE TABLE `certificate` (
  `certificateID` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `certificate`
--

INSERT INTO `certificate` (`certificateID`, `file`) VALUES
(1, 'Tiedosto');

-- --------------------------------------------------------

--
-- Rakenne taululle `message`
--

CREATE TABLE `message` (
  `messageID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `message`
--

INSERT INTO `message` (`messageID`, `studentID`, `message`, `user_type`, `date`) VALUES
(1, 1, 'Testiviesti', 'oppilas', '2022-05-09');

-- --------------------------------------------------------

--
-- Rakenne taululle `question`
--

CREATE TABLE `question` (
  `questionID` int(11) NOT NULL,
  `question_1` varchar(255) NOT NULL,
  `question_2` varchar(255) NOT NULL,
  `question_3` varchar(255) NOT NULL,
  `correct_answer_1` int(11) NOT NULL,
  `correct_answer_2` int(11) NOT NULL,
  `correct_answer_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `question`
--

INSERT INTO `question` (`questionID`, `question_1`, `question_2`, `question_3`, `correct_answer_1`, `correct_answer_2`, `correct_answer_3`) VALUES
(1, 'Testikysymys1_1', 'Testikysymys1_2', 'Testikysymys1_3', 1, 2, 3);

-- --------------------------------------------------------

--
-- Rakenne taululle `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `certificateID` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `total_result` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `student`
--

INSERT INTO `student` (`studentID`, `certificateID`, `first_name`, `last_name`, `email`, `total_result`) VALUES
(1, 1, 'Testi1', 'Testinen1', 'testi1@gmail.com', 0);

-- --------------------------------------------------------

--
-- Rakenne taululle `test`
--

CREATE TABLE `test` (
  `testID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `answerID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `result` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `test`
--

INSERT INTO `test` (`testID`, `studentID`, `answerID`, `questionID`, `result`) VALUES
(1, 1, 1, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificateID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `message_ibfk_1` (`studentID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `certificateID` (`certificateID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`),
  ADD KEY `test_ibfk_1` (`answerID`),
  ADD KEY `test_ibfk_2` (`questionID`),
  ADD KEY `test_ibfk_3` (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Rajoitteet taululle `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`certificateID`) REFERENCES `certificate` (`certificateID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Rajoitteet taululle `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`answerID`) REFERENCES `answer` (`answerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `test_ibfk_3` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
