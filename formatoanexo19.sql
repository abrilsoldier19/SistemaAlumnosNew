-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 05:53 AM
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
-- Database: `sistemaalumnos9`
--

-- --------------------------------------------------------

--
-- Table structure for table `formatoanexo19`
--

CREATE TABLE `formatoanexo19` (
  `IdFormatoAnexo19` bigint(20) UNSIGNED NOT NULL,
  `alumno_id` bigint(20) UNSIGNED NOT NULL,
  `NombreAlumno` bigint(20) UNSIGNED NOT NULL,
  `NombreMateria` bigint(20) UNSIGNED NOT NULL,
  `NombreCarrera` bigint(20) UNSIGNED NOT NULL,
  `turno` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salon` bigint(20) UNSIGNED NOT NULL,
  `comentarios` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `checkpoint1` tinyint(1) NOT NULL DEFAULT 0,
  `checkpoint2` tinyint(1) NOT NULL DEFAULT 0,
  `checkpoint3` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formatoanexo19`
--

INSERT INTO `formatoanexo19` (`IdFormatoAnexo19`, `alumno_id`, `NombreAlumno`, `NombreMateria`, `NombreCarrera`, `turno`, `created_at`, `updated_at`, `salon`, `comentarios`, `checkpoint1`, `checkpoint2`, `checkpoint3`) VALUES
(1, 1, 1, 2, 6, 1, NULL, NULL, 1, 'ASESORIAS', 0, 1, 0),
(2, 2, 2, 2, 6, 2, NULL, NULL, 2, 'ASESORIAS', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formatoanexo19`
--
ALTER TABLE `formatoanexo19`
  ADD PRIMARY KEY (`IdFormatoAnexo19`),
  ADD KEY `alumno_id` (`alumno_id`),
  ADD KEY `NombreAlumno` (`NombreAlumno`),
  ADD KEY `NombreMateria` (`NombreMateria`),
  ADD KEY `turno` (`turno`),
  ADD KEY `salon` (`salon`),
  ADD KEY `NombreCarrera` (`NombreCarrera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formatoanexo19`
--
ALTER TABLE `formatoanexo19`
  MODIFY `IdFormatoAnexo19` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formatoanexo19`
--
ALTER TABLE `formatoanexo19`
  ADD CONSTRAINT `formatoanexo19_IdAlumno_id` FOREIGN KEY (`alumno_id`) REFERENCES `alumno_reprobados` (`IdAlumno_reprobados`) ON DELETE CASCADE,
  ADD CONSTRAINT `formatoanexo19_carrera_id` FOREIGN KEY (`NombreCarrera`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `formatoanexo19_nombre_alumno_id` FOREIGN KEY (`NombreAlumno`) REFERENCES `alumno_reprobados` (`IdAlumno_reprobados`) ON DELETE CASCADE,
  ADD CONSTRAINT `formatoanexo19_nombre_materia_id` FOREIGN KEY (`NombreMateria`) REFERENCES `materias` (`IdMaterias`) ON DELETE CASCADE,
  ADD CONSTRAINT `formatoanexo19_salon_id` FOREIGN KEY (`salon`) REFERENCES `alumno_reprobados` (`IdAlumno_reprobados`) ON DELETE CASCADE,
  ADD CONSTRAINT `formatoanexo19_turno_id` FOREIGN KEY (`turno`) REFERENCES `alumno_reprobados` (`IdAlumno_reprobados`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
