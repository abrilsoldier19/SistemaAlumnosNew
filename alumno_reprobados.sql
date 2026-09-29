-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 02:47 AM
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
-- Table structure for table `alumno_reprobados`
--

CREATE TABLE `alumno_reprobados` (
  `IdAlumno_reprobados` bigint(20) UNSIGNED NOT NULL,
  `Alumno_id` bigint(20) UNSIGNED NOT NULL,
  `Materia_id` bigint(20) UNSIGNED NOT NULL,
  `Calif_Final_id` bigint(20) UNSIGNED NOT NULL,
  `Maestro_id` bigint(20) UNSIGNED NOT NULL,
  `Semestre_id` bigint(20) UNSIGNED NOT NULL,
  `Año_id` bigint(20) UNSIGNED NOT NULL,
  `carrera_id` bigint(20) UNSIGNED NOT NULL,
  `turnos` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salones` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumno_reprobados`
--

INSERT INTO `alumno_reprobados` (`IdAlumno_reprobados`, `Alumno_id`, `Materia_id`, `Calif_Final_id`, `Maestro_id`, `Semestre_id`, `Año_id`, `carrera_id`, `turnos`, `salones`) VALUES
(2, 4, 1, 39, 7, 2, 1, 1, 'Matutino', 'Salon A'),
(3, 1, 2, 38, 7, 2, 1, 1, 'Matutino', 'Salon B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumno_reprobados`
--
ALTER TABLE `alumno_reprobados`
  ADD PRIMARY KEY (`IdAlumno_reprobados`),
  ADD KEY `alumno_reprobados_alumno_id_foreign` (`Alumno_id`),
  ADD KEY `alumno_reprobados_materia_id_foreign` (`Materia_id`),
  ADD KEY `alumno_reprobados_calif_final_id_foreign` (`Calif_Final_id`),
  ADD KEY `alumno_reprobados_maestro_id_foreign` (`Maestro_id`),
  ADD KEY `alumno_reprobados_semestre_id_foreign` (`Semestre_id`),
  ADD KEY `alumno_reprobados_año_semestre_id_foreign` (`Año_id`),
  ADD KEY `alumno_reprobados_carrera_id_foreign` (`carrera_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumno_reprobados`
--
ALTER TABLE `alumno_reprobados`
  MODIFY `IdAlumno_reprobados` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno_reprobados`
--
ALTER TABLE `alumno_reprobados`
  ADD CONSTRAINT `alumno_reprobados_alumno_id_foreign` FOREIGN KEY (`Alumno_id`) REFERENCES `alumnos` (`IdAlumnos`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_año_semestre_id_foreign` FOREIGN KEY (`Año_id`) REFERENCES `año_semestres` (`IdAño_semestres`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_calif_final_id_foreign` FOREIGN KEY (`Calif_Final_id`) REFERENCES `calificacions` (`IdCalificacions`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_maestro_id_foreign` FOREIGN KEY (`Maestro_id`) REFERENCES `calificacions` (`IdCalificacions`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_materia_id_foreign` FOREIGN KEY (`Materia_id`) REFERENCES `materias` (`IdMaterias`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_semestre_id_foreign` FOREIGN KEY (`Semestre_id`) REFERENCES `semestres` (`IdSemestres`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
