-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 11:18 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `offerte site`
--

-- --------------------------------------------------------

--
-- Table structure for table `factuur`
--

CREATE TABLE `factuur` (
  `FactuurID` int(255) NOT NULL,
  `KID` int(255) NOT NULL,
  `FNaam` varchar(255) NOT NULL,
  `FPrijs` varchar(255) NOT NULL,
  `FDate` date NOT NULL,
  `FVVDate` date NOT NULL,
  `GebID` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker`
--

CREATE TABLE `gebruiker` (
  `GebruikerID` int(255) NOT NULL,
  `Gebemail` varchar(255) NOT NULL,
  `Gebpass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gebruiker`
--

INSERT INTO `gebruiker` (`GebruikerID`, `Gebemail`, `Gebpass`) VALUES
(1, 'bastiaan228@live.nl', 'bc3657feed8e45f14d229e544ade16945ce7931d9538923ef32ab442b2bcb0f3409b4c279566949b3d00cade01c9ba5c491ddf3c321239fbff7a665b1f6280f3'),
(8, 'a.vanKleef@gmail.com', '4803025b45614c1e4feb857367bc3fd54904badaa9ab420054a52c4bcfc295313e7cadb640ea8214b1cbf2496c2859e4c57564ac51823e54749c371cee786ea4');

-- --------------------------------------------------------

--
-- Table structure for table `gebruikersinfo`
--

CREATE TABLE `gebruikersinfo` (
  `GebruikerID` int(255) NOT NULL,
  `GebVNaam` text NOT NULL,
  `GebANaam` varchar(255) NOT NULL,
  `GebStraat` varchar(255) NOT NULL,
  `GebHnr` int(255) NOT NULL,
  `GebPostc` varchar(255) NOT NULL,
  `GebWoonP` varchar(255) NOT NULL,
  `GebLogo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gebruikersinfo`
--

INSERT INTO `gebruikersinfo` (`GebruikerID`, `GebVNaam`, `GebANaam`, `GebStraat`, `GebHnr`, `GebPostc`, `GebWoonP`, `GebLogo`) VALUES
(1, 'Bastiaan', 'van Kleef', 'Drostlaan', 8, '6941AB', 'Didam', NULL),
(2, 'Albert', 'van Kleef', 'Woerd', 13, '6999ZD', 'Elst', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `KID` int(255) NOT NULL,
  `KEmail` varchar(255) NOT NULL,
  `KVnaam` text NOT NULL,
  `KAnaam` varchar(255) NOT NULL,
  `KStraat` varchar(255) NOT NULL,
  `Khnr` int(255) NOT NULL,
  `KPostc` varchar(255) NOT NULL,
  `Kwp` varchar(255) NOT NULL,
  `KToevoeging` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offerte`
--

CREATE TABLE `offerte` (
  `OffID` int(255) NOT NULL,
  `KID` int(255) NOT NULL,
  `OffNaam` varchar(255) NOT NULL,
  `OffPrijs` int(255) NOT NULL,
  `OffDate` date NOT NULL,
  `OffVVDate` date NOT NULL,
  `GebID` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` int(255) NOT NULL,
  `PNaam` varchar(255) NOT NULL,
  `PPrijs` varchar(255) NOT NULL,
  `PBTW` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`FactuurID`);

--
-- Indexes for table `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`GebruikerID`);

--
-- Indexes for table `gebruikersinfo`
--
ALTER TABLE `gebruikersinfo`
  ADD PRIMARY KEY (`GebruikerID`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`KID`);

--
-- Indexes for table `offerte`
--
ALTER TABLE `offerte`
  ADD PRIMARY KEY (`OffID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `factuur`
--
ALTER TABLE `factuur`
  MODIFY `FactuurID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `GebruikerID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gebruikersinfo`
--
ALTER TABLE `gebruikersinfo`
  MODIFY `GebruikerID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `KID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offerte`
--
ALTER TABLE `offerte`
  MODIFY `OffID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
