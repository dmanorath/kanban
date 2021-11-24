-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 01:43 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kanbanboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LID` int(11) NOT NULL,
  `LocationName` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LID`, `LocationName`) VALUES
(5, 'Done'),
(3, 'In Progress'),
(2, 'Planning'),
(4, 'Testing'),
(1, 'To Do');

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `CID` int(11) NOT NULL,
  `CatName` varchar(16) NOT NULL,
  `CatSlug` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`CID`, `CatName`, `CatSlug`) VALUES
(1, 'School Work', 'school-work'),
(2, 'Project', 'project');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Title` varchar(256) NOT NULL,
  `Content` text NOT NULL,
  `DateCreated` datetime NOT NULL,
  `DateModified` datetime NOT NULL,
  `DateDue` datetime NOT NULL DEFAULT '9999-12-31 23:59:59',
  `UID` int(11) NOT NULL,
  `LID` int(11) NOT NULL,
  `CID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Title`, `Content`, `DateCreated`, `DateModified`, `DateDue`, `UID`, `LID`, `CID`) VALUES
('Create Kanban Board login page', 'Create an login page for kanban board. When user visit the website, first take them to this login page. Once they login successfully, redirect them to the dashboard.', '2016-10-16 12:23:21', '2016-10-16 21:21:24', '2016-10-26 23:59:59', 1, 2, 2),
('Just Testing out Kanban Board', 'THis is just a test content from kanban board. This content area should be very detailed.', '2016-10-13 00:00:00', '2016-10-15 00:00:00', '2016-10-16 00:00:00', 1, 4, 1),

-- --------------------------------------------------------

--
-- Table structure for table `post_rel`
--

CREATE TABLE `post_rel` (
  `PID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `LID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `FirstName` varchar(16) NOT NULL,
  `LastName` varchar(16) NOT NULL,
  `UserName` varchar(16) NOT NULL,
  `Password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `FirstName`, `LastName`, `UserName`, `Password`) VALUES
(1, 'John', 'Doe', 'johndoe', 'doe1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LID`),
  ADD UNIQUE KEY `LocationName` (`LocationName`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`CID`),
  ADD UNIQUE KEY `CatSlug` (`CatSlug`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `LID` (`LID`),
  ADD KEY `UID` (`UID`),
  ADD KEY `UID_2` (`UID`);

--
-- Indexes for table `post_rel`
--
ALTER TABLE `post_rel`
  ADD KEY `PID` (`PID`),
  ADD KEY `CID` (`CID`),
  ADD KEY `LID` (`LID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `UID` (`UID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`);

--
-- Constraints for table `post_rel`
--
ALTER TABLE `post_rel`
  ADD CONSTRAINT `post_rel_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `post` (`PID`),
  ADD CONSTRAINT `post_rel_ibfk_2` FOREIGN KEY (`CID`) REFERENCES `meta` (`CID`),
  ADD CONSTRAINT `post_rel_ibfk_3` FOREIGN KEY (`LID`) REFERENCES `location` (`LID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
