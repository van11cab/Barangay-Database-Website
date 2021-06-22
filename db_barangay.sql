-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 03:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barangay`
--

-- --------------------------------------------------------

--
-- Table structure for table `head of household`
--

CREATE TABLE `head of household` (
  `resident_id` int(11) NOT NULL,
  `House_Num` varchar(30) NOT NULL,
  `id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `head of household`
--

INSERT INTO `head of household` (`resident_id`, `House_Num`, `id`) VALUES
(70, 'Block 11, Lot 5, 1', 14);

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE `household` (
  `House_Num_plus_purok_id` varchar(30) NOT NULL,
  `Monthly_contribution` float NOT NULL,
  `hh_members` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`House_Num_plus_purok_id`, `Monthly_contribution`, `hh_members`) VALUES
('Block 11, Lot 5, 1', 123.12, ''),
('Block 11, Lot 5, 2', 123.12, ''),
('Block 11, Lot 5, 3', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `purok`
--

CREATE TABLE `purok` (
  `purok_id` int(5) NOT NULL,
  `purok_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purok`
--

INSERT INTO `purok` (`purok_id`, `purok_name`) VALUES
(1, 'Purok Mangga'),
(2, 'Purok Santol'),
(3, 'Purok Sampaguita'),
(4, 'Purok Santan'),
(5, 'Purok Magbago');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `resident_id` int(11) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `MI` varchar(5) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Birthdate` date NOT NULL,
  `Contact_Num` varchar(12) NOT NULL,
  `Civil_Status` varchar(20) NOT NULL,
  `Occupation` text NOT NULL,
  `House_Num` varchar(30) NOT NULL,
  `purok_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `LastName`, `FirstName`, `MI`, `Age`, `Gender`, `Birthdate`, `Contact_Num`, `Civil_Status`, `Occupation`, `House_Num`, `purok_id`) VALUES
(1, 'Eugenio', 'Leila', 'K.', 20, 'female', '2001-02-25', '09095315821', 'Single', 'Student', 'Block 11, Lot 5, 1', 1),
(65, 'Quinco', 'Kris Kyle', 'C.', 20, 'female', '2021-06-01', '09095315821', 'Single', 'Student', 'Block 11, Lot 5, 2', 2),
(67, 'Cabuga', 'Van Joseph', 'P.', 20, 'male', '2021-06-09', '09784512120', 'Single', 'Student', 'Block 11, Lot 5, 1', 1),
(68, 'Cabuga', 'Van Joseph', 'P.', 20, 'male', '2021-06-09', '09784512120', 'Single', 'Student', 'Block 11, Lot 5, 1', 1),
(69, 'Cabuga', 'Van Joseph', 'P.', 20, 'male', '2021-06-09', '09784512120', 'Single', 'Student', 'Block 11, Lot 5, 1', 1),
(70, 'Cabuga', 'Van Joseph', 'P.', 20, 'male', '2021-06-09', '09784512120', 'Single', 'Student', 'Block 11, Lot 5, 1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `head of household`
--
ALTER TABLE `head of household`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `resident_id` (`resident_id`),
  ADD UNIQUE KEY `House_Num` (`House_Num`);

--
-- Indexes for table `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`House_Num_plus_purok_id`);

--
-- Indexes for table `purok`
--
ALTER TABLE `purok`
  ADD PRIMARY KEY (`purok_id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`resident_id`),
  ADD KEY `purok_id` (`purok_id`),
  ADD KEY `House_Num` (`House_Num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `head of household`
--
ALTER TABLE `head of household`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purok`
--
ALTER TABLE `purok`
  MODIFY `purok_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `resident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `head of household`
--
ALTER TABLE `head of household`
  ADD CONSTRAINT `head of household_ibfk_1` FOREIGN KEY (`House_Num`) REFERENCES `household` (`House_Num_plus_purok_id`),
  ADD CONSTRAINT `head of household_ibfk_2` FOREIGN KEY (`resident_id`) REFERENCES `resident` (`resident_id`);

--
-- Constraints for table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`purok_id`) REFERENCES `purok` (`purok_id`),
  ADD CONSTRAINT `resident_ibfk_2` FOREIGN KEY (`House_Num`) REFERENCES `household` (`House_Num_plus_purok_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
