-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 06:00 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

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
  `FactuurID` varchar(255) NOT NULL,
  `KID` int(255) NOT NULL,
  `FNaam` varchar(255) NOT NULL,
  `FacRef` varchar(255) NOT NULL,
  `FPrijs` varchar(255) DEFAULT NULL,
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
(1, 'admin@admin.nl', '4d0b24ccade22df6d154778cd66baf04288aae26df97a961f3ea3dd616fbe06dcebecc9bbe4ce93c8e12dca21e5935c08b0954534892c568b8c12b92f26a2448');

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
  `GebTelnummer` varchar(255) NOT NULL,
  `GebKvk` int(255) NOT NULL,
  `GebIban` varchar(255) NOT NULL,
  `GebBTWNr` varchar(255) NOT NULL,
  `GebLogo` varchar(255) DEFAULT NULL,
  `GebPermision` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gebruikersinfo`
--

INSERT INTO `gebruikersinfo` (`GebruikerID`, `GebVNaam`, `GebANaam`, `GebStraat`, `GebHnr`, `GebPostc`, `GebWoonP`, `GebTelnummer`, `GebKvk`, `GebIban`, `GebBTWNr`, `GebLogo`, `GebPermision`) VALUES
(1, 'Admin', 'Administrator', 'AdminStraat', 5, '9612AB', 'AdminStad', '21311241', 12345, 'NL35 INGB 123123 12412', '124124124', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `KID` int(255) NOT NULL,
  `KEmail` varchar(255) NOT NULL,
  `KAanspraak` varchar(255) NOT NULL,
  `KVnaam` text NOT NULL,
  `KAnaam` varchar(255) NOT NULL,
  `KStraat` varchar(255) NOT NULL,
  `Khnr` int(255) NOT NULL,
  `KPostc` varchar(255) NOT NULL,
  `Kwp` varchar(255) NOT NULL,
  `KToevoeging` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offerte`
--

CREATE TABLE `offerte` (
  `OffID` varchar(255) NOT NULL,
  `KID` int(255) NOT NULL,
  `OffNaam` varchar(255) NOT NULL,
  `OffRef` varchar(255) NOT NULL,
  `OffPrijs` int(255) DEFAULT NULL,
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
  `PAantal` int(255) NOT NULL,
  `PBTW` int(255) NOT NULL,
  `GEBID` int(255) NOT NULL,
  `ExcDate` date NOT NULL,
  `OfferteID` varchar(255) DEFAULT NULL,
  `FactuurID` varchar(255) DEFAULT NULL
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
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `GebruikerID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gebruikersinfo`
--
ALTER TABLE `gebruikersinfo`
  MODIFY `GebruikerID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `KID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
