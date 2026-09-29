-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 12:43 AM
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
-- Database: `if0_36969989_sistemaalumnos9`
--

-- --------------------------------------------------------

--
-- Table structure for table `especialidades`
--

CREATE TABLE `especialidades` (
  `IdEspecialidad` bigint(20) UNSIGNED NOT NULL,
  `NombreEspecialidad` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `carrera_id` bigint(20) UNSIGNED NOT NULL,
  `reticula` bigint(20) varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `especialidades`
--

INSERT INTO `especialidades` (`IdEspecialidad`, `NombredEspecialidad`, `carrera_id`, `reticula`) VALUES
(1, 'CONTROL Y MONITOREO DE SISTEMAS ELÉCTRICOS DE POTENCIA', 3, 2020);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`IdEspecialidad`),
  ADD KEY `carrera_id` (`carrera_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `IdEspecialidad` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `especialidades`
--
ALTER TABLE `especialidades`
  ADD CONSTRAINT `especialidades_carrera_id` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
