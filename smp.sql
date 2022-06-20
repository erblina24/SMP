-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 04:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smp`
--

-- --------------------------------------------------------

--
-- Table structure for table `pikturat_smp`
--

CREATE TABLE `pikturat_smp` (
  `ID_SMP` int(11) NOT NULL,
  `TitulliPiktures_SMP` varchar(50) NOT NULL,
  `Piktori_SMP` varchar(50) NOT NULL,
  `StiliPikturimit_SMP` varchar(50) NOT NULL,
  `DimensioniPiktures_SMP` int(50) NOT NULL,
  `VitiPikturimit_SMP` int(11) NOT NULL,
  `PershkrimiPiktures_SMP` varchar(250) NOT NULL,
  `CmimiPiktures_SMP` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pikturat_smp`
--

INSERT INTO `pikturat_smp` (`ID_SMP`, `TitulliPiktures_SMP`, `Piktori_SMP`, `StiliPikturimit_SMP`, `DimensioniPiktures_SMP`, `VitiPikturimit_SMP`, `PershkrimiPiktures_SMP`, `CmimiPiktures_SMP`) VALUES
(12, 'Mona Lisa', 'Leonardo Davinci', 'Realizem', 30, 1514, 'Mona Lisa është një pikturë e portretit gjysmë të gjatë nga artisti italian Leonardo da Vinci. E konsideruar si një kryevepër arketipale e Rilindjes Italiane, ajo është përshkruar si \"më e njohura, më e vizituara, më e shkruara, më e kënduara, vepra ', 3000.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pikturat_smp`
--
ALTER TABLE `pikturat_smp`
  ADD PRIMARY KEY (`ID_SMP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pikturat_smp`
--
ALTER TABLE `pikturat_smp`
  MODIFY `ID_SMP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
