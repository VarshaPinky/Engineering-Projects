-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 06:53 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `Author_Id` int(11) NOT NULL,
  `Author_Name` varchar(20) DEFAULT NULL,
  `Author_books` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Author_Id`, `Author_Name`, `Author_books`) VALUES
(1234, 'Kuvempu', 10),
(1235, 'Bendre', 1),
(2000111, 'J.R.R Tolkein', 22),
(2000112, 'ChristopherPaolini', 8),
(2000113, 'Anton P.Chekov', 52),
(2000121, 'Markus Zusack', 6);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_by`
--

CREATE TABLE `borrowed_by` (
  `Me_Id` int(11) NOT NULL,
  `B_Date_Issue` date NOT NULL,
  `B_Date_Due` date NOT NULL,
  `B_Fine` decimal(5,2) DEFAULT NULL,
  `Bk_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `Memb_Id` int(11) NOT NULL,
  `P_Date_Issue` date NOT NULL,
  `P_Date_Due` date NOT NULL,
  `P_Fine` decimal(5,2) DEFAULT NULL,
  `Pr_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `b_location`
--

CREATE TABLE `b_location` (
  `Boo_Id` int(11) NOT NULL,
  `B_Location` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_location`
--

INSERT INTO `b_location` (`Boo_Id`, `B_Location`) VALUES
(3000111, 'Par'),
(3000112, 'Ban'),
(3000114, 'Del'),
(3000116, 'Ban'),
(3000120, 'Che'),
(3000121, 'Che');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `B_Id` int(11) NOT NULL,
  `B_Genre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`B_Id`, `B_Genre`) VALUES
(1, 'Folk'),
(3000111, 'Comedy'),
(3000112, 'Comedy'),
(3000114, 'Fiction'),
(3000120, 'Fiction'),
(3000121, 'Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `Lib_Id` int(11) NOT NULL,
  `Lib_Name` varchar(20) NOT NULL,
  `Lib_psswd` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`Lib_Id`, `Lib_Name`, `Lib_psswd`) VALUES
(6000111, 'Amak', 'amak125'),
(6000112, 'Yediah', 'yedi176');

-- --------------------------------------------------------

--
-- Table structure for table `libr_location`
--

CREATE TABLE `libr_location` (
  `Li_Id` int(11) NOT NULL,
  `Li_Loc` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libr_location`
--

INSERT INTO `libr_location` (`Li_Id`, `Li_Loc`) VALUES
(6000111, 'Par'),
(6000112, 'Ber');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Mem_Id` int(11) NOT NULL,
  `Mem_Name` varchar(20) NOT NULL,
  `Mem_Email` varchar(50) DEFAULT NULL,
  `Mem_Contact` int(11) NOT NULL,
  `M_DOB` date NOT NULL,
  `Membership_start` date NOT NULL,
  `Membership_End` date NOT NULL,
  `Mem_psswd` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Mem_Id`, `Mem_Name`, `Mem_Email`, `Mem_Contact`, `M_DOB`, `Membership_start`, `Membership_End`, `Mem_psswd`) VALUES
(5000111, 'Anagha M', 'anagha@gmail.com', 718257382, '1999-01-18', '2019-02-23', '2019-04-23', 'anagha181'),
(5000112, 'Harshitha', 'harshitha@gmail.com', 816372598, '2003-07-28', '2019-02-28', '2019-04-28', 'harshitha124');

-- --------------------------------------------------------

--
-- Table structure for table `member_card`
--

CREATE TABLE `member_card` (
  `Mbr_Id` int(11) NOT NULL,
  `Mbr_Name` varchar(20) DEFAULT NULL,
  `Type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_card`
--

INSERT INTO `member_card` (`Mbr_Id`, `Mbr_Name`, `Type`) VALUES
(5000111, 'Anagha M', '0'),
(5000112, 'Harshitha', '1');

-- --------------------------------------------------------

--
-- Table structure for table `novel`
--

CREATE TABLE `novel` (
  `Book_Id` int(11) NOT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `Book_Name` varchar(50) NOT NULL,
  `Book_Language` varchar(12) DEFAULT NULL,
  `Book_Availability` char(1) NOT NULL,
  `Book_Reserve` char(1) DEFAULT NULL,
  `Auth_Id` int(11) DEFAULT NULL,
  `Publ_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `novel`
--

INSERT INTO `novel` (`Book_Id`, `ISBN`, `Book_Name`, `Book_Language`, `Book_Availability`, `Book_Reserve`, `Auth_Id`, `Publ_Id`) VALUES
(1, 12, 'Malegalli Madumagalu', 'Kannada', 'Y', 'N', 1234, 1),
(2, 13, 'Nakutanti', 'Kannada', 'Y', 'N', 1235, 2),
(3000111, 999812415, 'The Lord of the Rings', 'German', 'y', 'n', 2000111, 1000112),
(3000112, 999812416, 'Eragon', 'English', 'y', 'y', 2000112, 1000118),
(3000114, 999812418, 'Tiger in the Tunnel', 'Hindi', 'n', 'n', 2000117, 1000112),
(3000116, 999812420, 'Silmarillion', 'German', 'y', 'y', 2000111, 1000118),
(3000120, 999812424, 'Malgudi Days', 'English', 'y', 'y', 2000119, 1000111),
(3000121, 999812430, 'The Book Thief', 'English', 'y', 'n', 2000121, 1000112);

-- --------------------------------------------------------

--
-- Table structure for table `periodical`
--

CREATE TABLE `periodical` (
  `Periodical_Id` int(11) NOT NULL,
  `Per_Name` varchar(20) NOT NULL,
  `Volume` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periodical`
--

INSERT INTO `periodical` (`Periodical_Id`, `Per_Name`, `Volume`, `Price`) VALUES
(4000112, 'Tinkle-DoubleDigest', 234, 100),
(4000113, 'TinkleDigest', 218, 70),
(4000114, 'Vogue', 34, 50),
(4000115, 'AutomobilesToday', 128, 45),
(4000116, 'IndiaToday', 254, 100);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `Pub_Id` int(11) NOT NULL,
  `Pub_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`Pub_Id`, `Pub_Name`) VALUES
(1, 'PrakashPublications'),
(2, 'SapnaPUblications'),
(1000118, 'Simon & schuster');

-- --------------------------------------------------------

--
-- Table structure for table `p_location`
--

CREATE TABLE `p_location` (
  `Per_Id` int(11) NOT NULL,
  `P_Location` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `writes`
--

CREATE TABLE `writes` (
  `P_Id` int(11) NOT NULL,
  `A_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Author_Id`),
  ADD UNIQUE KEY `Author_Name` (`Author_Name`);

--
-- Indexes for table `borrowed_by`
--
ALTER TABLE `borrowed_by`
  ADD PRIMARY KEY (`Me_Id`),
  ADD KEY `Bk_Id` (`Bk_Id`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`Memb_Id`),
  ADD KEY `Pr_Id` (`Pr_Id`);

--
-- Indexes for table `b_location`
--
ALTER TABLE `b_location`
  ADD PRIMARY KEY (`Boo_Id`,`B_Location`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`B_Id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`Lib_Id`);

--
-- Indexes for table `libr_location`
--
ALTER TABLE `libr_location`
  ADD PRIMARY KEY (`Li_Id`,`Li_Loc`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Mem_Id`);

--
-- Indexes for table `member_card`
--
ALTER TABLE `member_card`
  ADD PRIMARY KEY (`Mbr_Id`);

--
-- Indexes for table `novel`
--
ALTER TABLE `novel`
  ADD PRIMARY KEY (`Book_Id`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Indexes for table `periodical`
--
ALTER TABLE `periodical`
  ADD PRIMARY KEY (`Periodical_Id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`Pub_Id`);

--
-- Indexes for table `p_location`
--
ALTER TABLE `p_location`
  ADD PRIMARY KEY (`Per_Id`,`P_Location`);

--
-- Indexes for table `writes`
--
ALTER TABLE `writes`
  ADD PRIMARY KEY (`P_Id`,`A_Id`),
  ADD KEY `A_Id` (`A_Id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed_by`
--
ALTER TABLE `borrowed_by`
  ADD CONSTRAINT `borrowed_by_ibfk_1` FOREIGN KEY (`Bk_Id`) REFERENCES `novel` (`Book_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowed_by_ibfk_2` FOREIGN KEY (`Me_Id`) REFERENCES `member` (`Mem_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_ibfk_1` FOREIGN KEY (`Memb_Id`) REFERENCES `member` (`Mem_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrows_ibfk_2` FOREIGN KEY (`Pr_Id`) REFERENCES `periodical` (`Periodical_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `b_location`
--
ALTER TABLE `b_location`
  ADD CONSTRAINT `b_location_ibfk_1` FOREIGN KEY (`Boo_Id`) REFERENCES `novel` (`Book_Id`);

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`B_Id`) REFERENCES `novel` (`Book_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `libr_location`
--
ALTER TABLE `libr_location`
  ADD CONSTRAINT `libr_location_ibfk_1` FOREIGN KEY (`Li_Id`) REFERENCES `librarian` (`Lib_Id`);

--
-- Constraints for table `member_card`
--
ALTER TABLE `member_card`
  ADD CONSTRAINT `member_card_ibfk_1` FOREIGN KEY (`Mbr_Id`) REFERENCES `member` (`Mem_Id`);

--
-- Constraints for table `p_location`
--
ALTER TABLE `p_location`
  ADD CONSTRAINT `p_location_ibfk_1` FOREIGN KEY (`Per_Id`) REFERENCES `periodical` (`Periodical_Id`);

--
-- Constraints for table `writes`
--
ALTER TABLE `writes`
  ADD CONSTRAINT `writes_ibfk_1` FOREIGN KEY (`P_Id`) REFERENCES `periodical` (`Periodical_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `writes_ibfk_2` FOREIGN KEY (`A_Id`) REFERENCES `author` (`Author_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
