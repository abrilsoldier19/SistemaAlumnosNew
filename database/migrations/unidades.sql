
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 04:47 AM
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
-- Table structure for table `unidades`
--

CREATE TABLE `unidades` (
  `IdUnidad` bigint(20) UNSIGNED NOT NULL,
  `Alumno_id` bigint(20) UNSIGNED NOT NULL,
  `Materia_id` bigint(20) UNSIGNED NOT NULL,
  `NumeroUnidad` TEXT NOT NULL,  
  `Calificacion_Parcial` TEXT NOT NULL,
  `Semester` varchar(191) NOT NULL,
  `Maestro` varchar(191) NOT NULL,
  `Añosemestre` year(4) NOT NULL,
  `Carrera_id` bigint(20) UNSIGNED NOT NULL,
  `turno` varchar(255) NOT NULL,
  `salon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Constraints for dumped tables
--
ALTER TABLE `unidades`
  MODIFY `IdUnidad` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- Constraints for table `unidades`
--
ALTER TABLE `unidades`
  ADD CONSTRAINT `unidades_alumno_id_foreign` FOREIGN KEY (`Alumno_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unidades_carrera_id_foreign` FOREIGN KEY (`Carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `unidades_materia_id_foreign` FOREIGN KEY (`Materia_id`) REFERENCES `materias` (`IdMaterias`) ON DELETE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
