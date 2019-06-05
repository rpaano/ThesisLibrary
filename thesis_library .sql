-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 12:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_thesis`
--

CREATE TABLE `add_thesis` (
  `addthesis_id` int(15) NOT NULL,
  `title` varchar(30) NOT NULL,
  `thesis_file` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `author_1` varchar(50) NOT NULL,
  `author_2` varchar(50) NOT NULL,
  `author_3` varchar(50) NOT NULL,
  `year_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_thesis`
--

INSERT INTO `add_thesis` (`addthesis_id`, `title`, `thesis_file`, `location`, `description`, `author_1`, `author_2`, `author_3`, `year_id`) VALUES
(59, 'test entry', '5-Twilight-Midnight-Sun.pdf', 'uploads/5-Twilight-Midnight-Sun.pdf', 'wefw', 'Kathrina Ira Abacahin Mitchell', 'Kathrina Ira Abacahin Mitchell', 'Kathrina Ira Abacahin Mitchell', 11),
(62, 'test entry', '2-Twilight-New-Moon.pdf', 'uploads/2-Twilight-New-Moon.pdf', 'efesf', 'sefs', 'sef', 'sef', 11),
(63, 'test entry', '2-Twilight-New-Moon.pdf', 'uploads/2-Twilight-New-Moon.pdf', 'efesf', 'sefs', 'sef', 'sef', 11),
(64, 'test entry', '2-Twilight-New-Moon.pdf', 'uploads/2-Twilight-New-Moon.pdf', 'efesf', 'sefs', 'sef', 'sef', 11),
(65, 'test entry', '2-Twilight-New-Moon.pdf', 'uploads/2-Twilight-New-Moon.pdf', 'efesf', 'sefs', 'sef', 'sef', 12),
(66, 'test entry', '3-Twilight-Eclipse.pdf', 'uploads/3-Twilight-Eclipse.pdf', 'sfs', 'sefs', 'sef', 'sef', 12);

-- --------------------------------------------------------

--
-- Table structure for table `add_year`
--

CREATE TABLE `add_year` (
  `year_id` int(15) NOT NULL,
  `year` year(4) NOT NULL,
  `profile_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_year`
--

INSERT INTO `add_year` (`year_id`, `year`, `profile_id`) VALUES
(11, 2015, 5),
(12, 2016, 4),
(13, 2017, 2),
(14, 2018, 1),
(15, 2019, 3),
(27, 1998, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(15) NOT NULL,
  `usern` varchar(100) NOT NULL,
  `userp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `usern`, `userp`) VALUES
(1, 'rpaano', 'thesis'),
(2, 'rbantonare', 'thesis'),
(3, 'kmitchell', 'thesis'),
(4, 'jurot', 'thesis'),
(5, 'ikhalifa', 'thesis'),
(6, 'rlaurente', 'thesis'),
(7, 'jkouner', 'thesis'),
(8, 'rminaj', 'thesis'),
(9, 'romel', 'paano'),
(10, 'romels', 'paano'),
(11, '1', '1'),
(12, 'q', 'q'),
(13, '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(15) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `contactnum` decimal(10,0) NOT NULL,
  `position` varchar(50) NOT NULL,
  `login_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `lastname`, `firstname`, `middlename`, `contactnum`, `position`, `login_id`) VALUES
(1, 'Paano', 'Romel Nin~o', 'Orongan', '9353472592', 'Proect_Manager_Char_lang', 1),
(2, 'Mitchell', 'Kathrina Ira', 'Abacahin', '9177719540', 'Backend_na_poros_Frontend_Ang_Gihimo', 3),
(3, 'Urot', 'Julius', 'Del Pilar', '9058682839', 'Backend_na_poros_Frontend_Ang_Gihimo', 4),
(4, 'Bantonare', 'Ricky', 'Dano', '9359050172', 'poros_Frontend_Ang_Gihimo', 2),
(5, 'Khalifa', 'Kathrina Ira', 'Prostitute', '9177719540', 'Uwagan_sa_Divisoria', 5),
(6, 'Minaj', 'Ricky', 'Nono', '9359050172', 'Singer_sa_Divisoria', 8),
(7, 'romel', 'paano', 'romel', '0', '', 9),
(8, 'romel', 'paano', 'svsd', '2345678', 'dfbd', 10),
(9, 'romel', 'paano', 'efse', '0', 'sfvs', 11),
(10, 'romel', 'paano', 'efse', '0', 'sfvs', 11),
(11, 'drgdr', 'sgsef', 'ssefs', '0', 'sefsef', 12),
(12, '1234', '1', '1', '12345', '1', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_thesis`
--
ALTER TABLE `add_thesis`
  ADD PRIMARY KEY (`addthesis_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `add_year`
--
ALTER TABLE `add_year`
  ADD PRIMARY KEY (`year_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `login_id` (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_thesis`
--
ALTER TABLE `add_thesis`
  MODIFY `addthesis_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `add_year`
--
ALTER TABLE `add_year`
  MODIFY `year_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_thesis`
--
ALTER TABLE `add_thesis`
  ADD CONSTRAINT `add_thesis_ibfk_1` FOREIGN KEY (`year_id`) REFERENCES `add_year` (`year_id`);

--
-- Constraints for table `add_year`
--
ALTER TABLE `add_year`
  ADD CONSTRAINT `add_year_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
