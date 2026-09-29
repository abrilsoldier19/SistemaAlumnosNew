-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 02:59 AM
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
-- Table structure for table `calificacions`
--

CREATE TABLE `calificacions` (
  `IdCalificacions` bigint(20) UNSIGNED NOT NULL,
  `Alumno_id` bigint(20) UNSIGNED NOT NULL,
  `Materia_id` bigint(20) UNSIGNED NOT NULL,
  `comentarios` text DEFAULT NULL,
  `U1` double NOT NULL,
  `U2` double NOT NULL,
  `U3` double NOT NULL,
  `U4` double NOT NULL,
  `U5` double NOT NULL,
  `U6` double NOT NULL,
  `U7` double NOT NULL,
  `U8` double NOT NULL,
  `U9` double NOT NULL,
  `U10` double NOT NULL,
  `U11` double NOT NULL,
  `U12` double NOT NULL,
  `Calificacion_Final` double NOT NULL,
  `Semester` varchar(191) NOT NULL,
  `Maestro_id` bigint(20) UNSIGNED NOT NULL,
  `Añosemestre` year(4) NOT NULL,
  `Carrera_id` bigint(20) UNSIGNED NOT NULL,
  `turno` varchar(255) NOT NULL,
  `salon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `calificacions`
--

INSERT INTO `calificacions` (`IdCalificacions`, `Alumno_id`, `Materia_id`, `comentarios`, `U1`, `U2`, `U3`, `U4`, `U5`, `U6`, `U7`, `U8`, `U9`, `U10`, `U11`, `U12`, `Calificacion_Final`, `Semester`, `Maestro_id`, `Añosemestre`, `Carrera_id`, `turno`, `salon`) VALUES
(1, 6, 1, 'buena', 9, 9, 8, 8, 8, 8, 8, 9, 9, 9, 9, 9, 8.5833333333333, '2do Semestre', 'Aguilar Covarrubias Norma Aracely', '2022', 1, 'Matutino', 'Salon D'),
(37, 6, 9, 'excelente', 9, 6, 7, 7, 6, 6, 8, 8, 6, 7, 6, 8, 7, '2do Semestre', 'Aguilar Covarrubias Norma Aracely', '2022', 1, 'Matutino', 'Salon C'),
(38, 6, 15, NULL, 6, 6, 7, 5, 6, 8, 9, 7, 7, 6, 7, 6, 6.6666666666667, '2do Semestre', 'Aranda Alarcón Graciela', '2022', 1, 'Matutino', 'Salon B'),
(39, 8, 9, NULL, 5, 7, 8, 7, 6, 6, 6, 7, 8, 6, 7, 7, 6.6666666666667, '2do Semestre', 'Aranda Alarcón Graciela', '2022', 1, 'Matutino', 'Salon A'),
(66, 2, 1, NULL, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, '3er Semestre', 'Aguilar Covarrubias Norma Aracely', '2022', 1, 'Matutino', 'Salon A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calificacions`
--
ALTER TABLE `calificacions`
  ADD PRIMARY KEY (`IdCalificacions`),
  ADD KEY `calificacions_alumno_id_foreign` (`Alumno_id`),
  ADD KEY `calificacions_carrera_id_foreign` (`Carrera_id`),
  ADD KEY `calificacions_materia_id_foreign` (`Materia_id`),
  ADD KEY `calificacions_maestro_id_foreign` (`Maestro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calificacions`
--
ALTER TABLE `calificacions`
  MODIFY `IdCalificacions` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calificacions`
--
ALTER TABLE `calificacions`
  ADD CONSTRAINT `calificacions_alumno_id_foreign` FOREIGN KEY (`Alumno_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificacions_carrera_id_foreign` FOREIGN KEY (`Carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `calificacions_materia_id_foreign` FOREIGN KEY (`Materia_id`) REFERENCES `materias` (`IdMaterias`) ON DELETE CASCADE;
  ADD CONSTRAINT `calificacions_maestro_id_foreign` FOREIGN KEY (`Maestro_id`) REFERENCES `maestros` (`IdMaestros`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
