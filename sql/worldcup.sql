-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 09:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worldcup`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `IDgroup` int(11) NOT NULL,
  `NAMEgroup` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`IDgroup`, `NAMEgroup`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H');

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

CREATE TABLE `stadiums` (
  `IDstad` int(11) NOT NULL,
  `NAMEstad` char(50) DEFAULT NULL,
  `LOCATIONstad` char(100) DEFAULT NULL,
  `IDGROUP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`IDstad`, `NAMEstad`, `LOCATIONstad`, `IDGROUP`) VALUES
(1, 'Khalifa International Stadium', '7C7X+C8Q, Al Waab St, Doha, Qatar', 1),
(2, 'Al-Bayt Stadium', 'Al Khor, Qatar', 2),
(3, 'Al-Janoub Stadium', '5H5F+WP7, Al Wukair, Qatar', 3),
(4, 'Education City Stadium', 'Gurshaiganj Qatar', 4),
(5, 'Stade Al-Rayyan', 'Ar-Rayyan, Qatar', 5),
(6, 'Al-Thumama Stadium', '6GPJ+8X4, Doha, Qatar', 6),
(7, 'Ras Abu Aboud Stadium', '7HQ8+G4, Doha, Qatar', 7),
(8, 'Lusail Iconic Stadium', 'CFCR+75, Lusail, Qatar', 8);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `IDteam` int(11) NOT NULL,
  `NAMETEAM` varchar(50) DEFAULT NULL,
  `NUMplayers` int(11) DEFAULT NULL,
  `CAPITALteam` varchar(60) DEFAULT NULL,
  `CONTINENTteam` varchar(100) DEFAULT NULL,
  `IDGROUP` int(11) DEFAULT NULL,
  `IMG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`IDteam`, `NAMETEAM`, `NUMplayers`, `CAPITALteam`, `CONTINENTteam`, `IDGROUP`, `IMG`) VALUES
(9, 'QATAR', 26, 'Doha', 'Asie', 1, './images/QATAR.png'),
(10, 'ECUADOR', 26, 'Quito', 'Amerique Du SUD', 1, './images/ECUADOR.png'),
(11, 'SENEGAL', 26, 'Dakar', 'Afrique', 1, './images/SENEGAL.png'),
(12, 'NETHERLANDS', 26, 'Amsterdam', 'Europe', 1, './images/NETHERLANDS.png'),
(13, 'ENGLAND', 26, 'Londres', 'Europe', 2, './images/ENGLAND.png'),
(14, 'IRAN', 26, 'Teheran', 'Asie', 2, './images/IRAN.png'),
(15, 'USA', 26, 'Washington', 'Amerique du Nord', 2, './images/USA.png'),
(16, 'PALESTINE', 26, 'El Qods', 'Asie', 2, './images/PALESTINE.png'),
(17, 'ARGENTINA', 26, 'Buenos Aires', 'Amérique du Sud', 3, './images/ARGENTINA.png'),
(18, 'SAUDI ARABIA', 26, 'Riyad', 'Asie', 3, './images/SAUDI_ARABIA.png'),
(19, 'MEXICO', 26, 'Mexico', 'Amérique du Nord', 3, './images/MEXICO.png'),
(20, 'POLAND', 26, 'Warsaw and Krakow', 'Europe', 3, './images/POLAND.png'),
(21, 'FRANCE', 26, 'Paris', 'Europe', 4, './images/FRANCE.png'),
(22, 'DENMARK', 26, 'Copenhague', 'Europe', 4, './images/DENMARK.png'),
(23, 'TUNISIA', 26, 'Tunis', 'Afrique', 4, './images/TUNISIA.png'),
(24, 'AUSTRILIA', 26, 'Canberra', 'Australia', 4, './images/AUSTRILIA.png'),
(25, 'SPAIN', 26, 'Madrid', 'Europe', 5, './images/SPAIN.png'),
(26, 'JAPAN', 26, 'Tokyo', 'Asie', 5, './images/JAPAN.png'),
(27, 'GERMANY', 26, 'Berline', 'Europe', 5, './images/GERMANY.png'),
(28, 'COSTA RICA', 26, 'San Jose', 'Amerique Du Sud', 5, './images/COSTA_RICA.png'),
(29, 'MOROCCO', 26, 'Rabat', 'Afrique', 6, './images/MOROCCO.png'),
(30, 'CROATIA', 26, 'Zagreb', 'Europe', 6, './images/CROATIA.png'),
(31, 'BELGIUM', 26, 'Bruxel', 'Europe', 6, './images/BELGIUM.png'),
(32, 'CANADA', 26, 'Ottawa', 'Amerique Du Nord', 6, './images/CANADA.png'),
(33, 'BRAZIL', 26, 'Brasília', 'Amerique Du Sud', 7, './images/BRAZIL.png'),
(34, 'SERBIA', 26, 'Belgrade', 'Europe', 7, './images/SERBIA.png'),
(35, 'SUISSE', 26, 'Berne', 'Europe', 7, './images/SUISSE.png'),
(36, 'CAMERON', 26, 'Yaoundé', 'Afrique', 7, './images/CAMERON.png'),
(37, 'PORTUGAL', 26, 'Lisbonne', 'Europe', 8, './images/PORTUGAL.png'),
(38, 'GHANA', 26, 'Accra', 'Afrique', 8, './images/GHANA.png'),
(39, 'URUGUAY', 26, 'Montevideo', 'Amderique Du Sud', 8, './images/URUGUAY.png'),
(40, 'SOUTH KOREA', 26, 'Séoul', 'Asie', 8, './images/SOUTH_KOREA.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`IDgroup`),
  ADD UNIQUE KEY `NAMEgroup` (`NAMEgroup`);

--
-- Indexes for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`IDstad`),
  ADD UNIQUE KEY `NAMEstad` (`NAMEstad`),
  ADD KEY `IDGROUP` (`IDGROUP`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`IDteam`),
  ADD UNIQUE KEY `NAMEteam` (`NAMETEAM`),
  ADD UNIQUE KEY `NAMETEAM_2` (`NAMETEAM`),
  ADD KEY `IDGROUP` (`IDGROUP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `IDgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `IDstad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `IDteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD CONSTRAINT `stadiums_ibfk_1` FOREIGN KEY (`IDGROUP`) REFERENCES `groups` (`IDgroup`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`IDGROUP`) REFERENCES `groups` (`IDgroup`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
