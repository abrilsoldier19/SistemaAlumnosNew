-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql209.infinityfree.com
-- Generation Time: Aug 29, 2024 at 11:10 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `unidades`
--

CREATE TABLE `unidades` (
  `IdUnidad` bigint(20) UNSIGNED NOT NULL,
  `Alumno_id` bigint(20) UNSIGNED NOT NULL,
  `Materia_id` bigint(20) UNSIGNED NOT NULL,
  `NumeroUnidad` text NOT NULL,
  `Calificacion_Parcial` text NOT NULL,
  `Semester` varchar(191) NOT NULL,
  `Maestro` varchar(191) NOT NULL,
  `Añosemestre` year(4) NOT NULL,
  `Carrera_id` bigint(20) UNSIGNED NOT NULL,
  `turno` varchar(255) NOT NULL,
  `salon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `unidades`
--

INSERT INTO `unidades` (`IdUnidad`, `Alumno_id`, `Materia_id`, `NumeroUnidad`, `Calificacion_Parcial`, `Semester`, `Maestro`, `Añosemestre`, `Carrera_id`, `turno`, `salon`) VALUES
(77, 76, 36, 'Unidad 1, Unidad 2', '67, 89', '5to Semestre', 'Asís Cipriano Karime', 2023, 1, 'Matutino', 'Salón B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`IdUnidad`),
  ADD KEY `unidades_alumno_id_foreign` (`Alumno_id`),
  ADD KEY `unidades_carrera_id_foreign` (`Carrera_id`),
  ADD KEY `unidades_materia_id_foreign` (`Materia_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `unidades`
--
ALTER TABLE `unidades`
  MODIFY `IdUnidad` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `unidades`
--
ALTER TABLE `unidades`
  ADD CONSTRAINT `unidades_alumno_id_foreign` FOREIGN KEY (`Alumno_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unidades_carrera_id_foreign` FOREIGN KEY (`Carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `unidades_materia_id_foreign` FOREIGN KEY (`Materia_id`) REFERENCES `materias` (`IdMaterias`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
