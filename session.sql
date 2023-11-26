-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 01:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scolarite`
--

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `Numero` int(11) NOT NULL,
  `Annee` char(5) NOT NULL,
  `Sem` char(1) NOT NULL,
  `SemAb` char(1) DEFAULT NULL,
  `Debut` date DEFAULT NULL,
  `Fin` date DEFAULT NULL,
  `Debsem` date DEFAULT NULL,
  `Finsem` date DEFAULT NULL,
  `Annea` char(5) DEFAULT NULL,
  `Anneab` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`Numero`, `Annee`, `Sem`, `SemAb`, `Debut`, `Fin`, `Debsem`, `Finsem`, `Annea`, `Anneab`) VALUES
(100, '2021', '1', '2', '2021-09-09', '2022-06-09', '2021-09-09', '2022-01-10', '2021', '2022'),
(101, '2022', '2', '1', '2021-09-09', '2022-09-09', '2022-01-17', '2022-09-09', '2021', '2022'),
(102, '2022', '1', '2', '2022-09-09', '2023-06-06', '2022-09-09', '2023-01-16', '2022', '2023'),
(103, '2023', '2', '1', '2022-09-09', '2023-06-09', '2023-01-17', '2023-06-09', '2022', '2023'),
(104, '2023', '1', '2', '2023-09-04', '2024-06-10', '2023-09-04', '2023-12-09', '2023', '2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Numero`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
