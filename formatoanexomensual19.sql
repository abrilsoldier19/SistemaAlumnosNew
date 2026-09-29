-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 08:20 PM
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
-- Table structure for table `formatoanexomensual19`
--

CREATE TABLE `formatoanexomensual19` (
  `Alumno_id` bigint(20) UNSIGNED NOT NULL,
  `NombreAlumno` bigint(20) UNSIGNED NOT NULL,
  `NombreMateria` bigint(20) UNSIGNED NOT NULL,
  `NombreCarrera` bigint(20) UNSIGNED NOT NULL,
  `NombreMaestro` varchar(191) NOT NULL,
  `Semestre` varchar(191) NOT NULL,
  `turno` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salon` varchar(255) NOT NULL,
  `comentarios` text DEFAULT NULL,
  `checkpoint1` tinyint(1) NOT NULL DEFAULT 0,
  `checkpoint2` tinyint(1) NOT NULL DEFAULT 0,
  `checkpoint3` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formatoanexomensual19`
--

INSERT INTO `formatoanexomensual19` (`Alumno_id`, `NombreAlumno`, `NombreMateria`, `NombreCarrera`, `NombreMaestro`, `Semestre`, `turno`, `created_at`, `updated_at`, `salon`, `comentarios`, `checkpoint1`, `checkpoint2`, `checkpoint3`) VALUES
(1, 2, 97, 5, 'Aguilar Covarrubias Norma Aracely', '1er Semestre', 'Matutino', NULL, NULL, 'Salon A', 'Asesorias', 0, 1, 0),
(2, 6, 2, 1, 'Aguilar Covarrubias Norma Aracely', '1er Semestre', 'Matutino', NULL, NULL, 'Salon A', 'ASESORIAS', 0, 1, 0),
(3, 8, 1, 1, 'Aguilar Covarrubias Norma Aracely', '1er Semestre', 'Matutino', NULL, NULL, 'Salon A', 'No ASESORIAS', 0, 1, 0),
(4, 76, 16, 1, 'Aranda Alarcón Graciela', '3er Semestre', 'Matutino', NULL, NULL, 'Salon A', 'psicologia', 1, 0, 0),
(5, 4, 14, 1, 'Aranda Alarcón Graciela', '3er Semestre', 'Matutino', NULL, NULL, 'Salon B', 'Asesoria', 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formatoanexomensual19`
--
ALTER TABLE `formatoanexomensual19`
  ADD PRIMARY KEY (`Alumno_id`),
  ADD KEY `formatoanexoMensual19_alumno_id_foreign` (`NombreAlumno`),
  ADD KEY `formatoanexoMensual19_carrera_id_foreign` (`NombreCarrera`),
  ADD KEY `formatoanexoMensual19_materia_id_foreign` (`NombreMateria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formatoanexomensual19`
--
ALTER TABLE `formatoanexomensual19`
  MODIFY `Alumno_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formatoanexomensual19`
--
ALTER TABLE `formatoanexomensual19`
  ADD CONSTRAINT `formatoanexoMensual19_alumno_id_foreign` FOREIGN KEY (`NombreAlumno`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formatoanexoMensual19_carrera_id_foreign	` FOREIGN KEY (`NombreCarrera`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `formatoanexoMensual19_materia_id_foreign` FOREIGN KEY (`NombreMateria`) REFERENCES `materias` (`IdMaterias`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
