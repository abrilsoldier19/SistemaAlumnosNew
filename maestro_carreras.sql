-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2025 at 07:51 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlcensec_ense_mlc`
--

-- --------------------------------------------------------

--
-- Table structure for table `maestro_carreras`
--

CREATE TABLE `maestro_carreras` (
  `IdMaestroCarreras` bigint(20) UNSIGNED NOT NULL,
  `Maestro_id` bigint(20) UNSIGNED NOT NULL,
  `Carrera_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maestro_carreras`
--
ALTER TABLE `maestro_carreras`
  ADD PRIMARY KEY (`IdMaestroCarreras`),
  ADD KEY `Maestro_id` (`Maestro_id`),
  ADD KEY `Carrera_id` (`Carrera_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maestro_carreras`
--
ALTER TABLE `maestro_carreras`
  MODIFY `IdMaestroCarreras` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `maestro_carreras`
--
ALTER TABLE `maestro_carreras`
  ADD CONSTRAINT `carreras_id` FOREIGN KEY (`Carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `maestros_id` FOREIGN KEY (`Maestro_id`) REFERENCES `maestros` (`IdMaestros`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
