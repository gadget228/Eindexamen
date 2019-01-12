-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 03:52 PM
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
(8, 'a.vanKleef@gmail.com', '4803025b45614c1e4feb857367bc3fd54904badaa9ab420054a52c4bcfc295313e7cadb640ea8214b1cbf2496c2859e4c57564ac51823e54749c371cee786ea4'),
(9, 'testuser@test.nl', 'c12834f1031f6497214f27d4432f26517ad494156cb88d512bdb1dc4b57db2d692a3dfa269a19b0a0a2a0fd7d6a2a885e33c839c93c206da30a187392847ed27');

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
  `GebKvk` int(255) NOT NULL,
  `GebIban` varchar(255) NOT NULL,
  `GebLogo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gebruikersinfo`
--

INSERT INTO `gebruikersinfo` (`GebruikerID`, `GebVNaam`, `GebANaam`, `GebStraat`, `GebHnr`, `GebPostc`, `GebWoonP`, `GebKvk`, `GebIban`, `GebLogo`) VALUES
(1, 'Bastiaan', 'van Kleef', 'Drostlaan', 8, '6941AB', 'Didam', 123456, 'NL35 INGB 0003 1544 1824', NULL),
(2, 'Albert', 'van Kleef', 'Woerd', 13, '6999ZD', 'Elst', 0, '', NULL),
(3, 'Tester', 'Test', 'Drostlaan', 8, '6941AB', 'Didam', 165231, 'NL35 INGB 0003 1544 1824', NULL);

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
  `KToevoeging` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`KID`, `KEmail`, `KVnaam`, `KAnaam`, `KStraat`, `Khnr`, `KPostc`, `Kwp`, `KToevoeging`) VALUES
(1, 'testesd@test.hnl', 'Teste', 'Test', 'awdad', 1, '3411AB', 'DAsda', NULL),
(2, 'bastiaan228@live.nl', 'Bastiaan', 'van Kleef', 'Drostlaan', 8, '6941AB', 'Didam', NULL),
(3, 'mobiel228@gmail.com', 'asdasd', 'asdas', 'asda', 4, '1234AB', 'Didam', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offerte`
--

CREATE TABLE `offerte` (
  `OffID` int(255) NOT NULL,
  `KID` int(255) NOT NULL,
  `OffNaam` varchar(255) NOT NULL,
  `OffRef` varchar(255) NOT NULL,
  `OffPrijs` int(255) DEFAULT NULL,
  `OffDate` date NOT NULL,
  `OffVVDate` date NOT NULL,
  `GebID` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offerte`
--

INSERT INTO `offerte` (`OffID`, `KID`, `OffNaam`, `OffRef`, `OffPrijs`, `OffDate`, `OffVVDate`, `GebID`) VALUES
(213123, 2, 'Offerte Utrecht Huis', 'A. van Kleef', NULL, '2019-01-11', '2019-01-31', 1),
(5, 3, 'adsasd', 'A. ban kLefe', NULL, '2019-01-12', '2019-01-26', 1),
(13245, 3, 'Offerte Utrecht CS', 'A. van Kleef', NULL, '2019-01-12', '2019-01-26', 1);

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
  `OfferteID` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PID`, `PNaam`, `PPrijs`, `PAantal`, `PBTW`, `GEBID`, `ExcDate`, `OfferteID`) VALUES
(1, 'Tegels leggen', '5000', 0, 21, 1, '2019-01-11', 0),
(2, 'adadada', '15145', 8, 45, 1, '2019-01-24', 213123),
(3, 'Tegels leggen', '1313', 214, 21, 1, '2019-01-18', 213123),
(4, 'asdsa', '123', 3, 12, 1, '2019-01-12', 5),
(5, 'Tegels leggen', '45', 1313, 13, 1, '2019-01-12', 13245),
(6, 'Fundering leggen', '15', 13, 25, 1, '2019-01-24', 13245),
(7, 'Muren plaatsen', '5000', 10, 15, 1, '2019-02-20', 13245);

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
  MODIFY `GebruikerID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gebruikersinfo`
--
ALTER TABLE `gebruikersinfo`
  MODIFY `GebruikerID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `KID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `offerte`
--
ALTER TABLE `offerte`
  MODIFY `OffID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213124;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
