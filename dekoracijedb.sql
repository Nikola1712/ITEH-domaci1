-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 09:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dekoracijedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `korpaID` int(11) NOT NULL,
  `proizvodID` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `proizvodID` int(11) NOT NULL,
  `nazivProizvoda` varchar(50) NOT NULL,
  `cena` int(11) DEFAULT NULL,
  `vrstaDekoracijeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`proizvodID`, `nazivProizvoda`, `cena`, `vrstaDekoracijeID`) VALUES
(1, 'Balon broj veliki', 1000, 1),
(2, 'Balon broj mali', 600, 1),
(3, 'Balon srce', 500, 1),
(4, 'Balon zvezda', 500, 1),
(5, 'Balon krug', 500, 1),
(6, 'Balon Miki Maus', 1000, 1),
(7, 'Medenjak komad ', 50, 2),
(8, 'Mafin mali sa motivima', 50, 2),
(9, 'Mafin veliki sa motivima', 75, 2),
(10, 'Popsi', 50, 2),
(11, 'Mala staklena torta', 990, 2),
(12, 'Čokoladna fontana sa 3kg čokolade - bez voća', 15000, 4),
(13, 'Čokoladna fontana sa 3kg čokolade - bez voća', 20000, 4),
(14, 'Čokoladna fontana sa 5kg čokolade - bez voća', 20000, 4),
(15, 'Čokoladna fontana sa 5kg čokolade - sa voćem', 25000, 4),
(16, 'Vatromet unutrašnji 2 komada', 2000, 3),
(17, 'Vatromet unutrašnji 4 komada', 3500, 3),
(18, 'Vatromet unutrašnji 6 komada', 5000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vrstadekoracije`
--

CREATE TABLE `vrstadekoracije` (
  `vrstaDekoracijeID` int(11) NOT NULL,
  `nazivVrsteDekoracije` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vrstadekoracije`
--

INSERT INTO `vrstadekoracije` (`vrstaDekoracijeID`, `nazivVrsteDekoracije`) VALUES
(1, 'Baloni'),
(2, 'Slatki sto'),
(3, 'Vatromet'),
(4, 'Čokoladna fontana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`korpaID`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`proizvodID`),
  ADD KEY `VrstaDekoracijeFK` (`vrstaDekoracijeID`);

--
-- Indexes for table `vrstadekoracije`
--
ALTER TABLE `vrstadekoracije`
  ADD PRIMARY KEY (`vrstaDekoracijeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `korpaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `proizvodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `VrstaDekoracijeFK` FOREIGN KEY (`vrstaDekoracijeID`) REFERENCES `vrstadekoracije` (`vrstaDekoracijeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
