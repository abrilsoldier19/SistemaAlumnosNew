-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql209.infinityfree.com
-- Generation Time: Sep 03, 2024 at 12:47 PM
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
(77, 76, 36, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '67, 89, 98, 70, 75', '6to Semestre', 'Asís Cipriano Karime', 2023, 1, 'Matutino', 'Salón B'),
(78, 6, 1, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '9, 8, 8, 8, 8.667', '2do Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón D'),
(79, 6, 15, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '6, 6, 7, 8.3335, 6', '2do Semestre', 'Aranda Alarcón Graciela', 2022, 1, 'Matutino', 'Salón B'),
(80, 8, 9, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '53.3335, 70, 80, 70, 60', '2do Semestre', 'Aranda Alarcón Graciela', 2022, 1, 'Matutino', 'Salón A'),
(81, 6, 4, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '65, 60, 50, 50, 50', '1er Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón A'),
(82, 6, 2, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4', '73.3332, 70, 80, 90', '1er Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón A'),
(83, 6, 5, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5, Unidad 6', '60, 50, 70, 60, 50, 40', '1er Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón A'),
(84, 2, 97, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4', '70, 0, 89.666668, 0', '7mo Semestre', 'Aguilar Covarrubias Norma Aracely', 2023, 3, 'Matutino', 'Salón A'),
(85, 2, 84, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5, Unidad 6', '90, 90, 90, 90, 90, 50', '5to Semestre', 'Aguilar Covarrubias Norma Aracely', 2023, 3, 'Matutino', 'Salón A'),
(86, 8, 1, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '60, 60, 60, 60, 60', '1er Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón A'),
(87, 76, 16, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5, Unidad 6', '90, 90, 90, 90, 90, 90', '3er Semestre', 'Aranda Alarcón Graciela', 2023, 1, 'Matutino', 'Salón A'),
(88, 85, 1, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '70, 70, 75, 60, 50', '1er Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón A'),
(89, 86, 17, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5, Unidad 6', '60, 70, 60, 60, 90, 50', '3er Semestre', 'Aranda Alarcón Graciela', 2022, 1, 'Matutino', 'Salón A'),
(90, 8, 26, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '90, 89, 78.5, 89, 84', '4to Semestre', 'Flores Peña Enrique', 2023, 1, 'Matutino', 'Salón A'),
(91, 76, 13, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '78, 87, 97, 75, 80', '3er Semestre', 'Aranda Alarcón Graciela', 2023, 1, 'Vespertino', 'Salón A'),
(92, 2, 12, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5, Unidad 6, Unidad 7', '60.5, 65, 60, 65, 70, 55, 62', '2do Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón A'),
(93, 85, 9, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '80, 70, 80, 70, 65', '3er Semestre', 'Aldape Suárez Miguel', 2023, 1, 'Matutino', 'Salón A'),
(94, 85, 22, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '90, 80, 70, 80, 70', '4to Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón A'),
(95, 76, 3, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '85, 85, 90, 70, 90', '1er Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón A'),
(96, 85, 3, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '70, 70, 75, 60, 50', '1er Semestre', 'Baltierra Costeira Gabriela', 2022, 1, 'Matutino', 'Salón A'),
(97, 6, 3, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '95, 100, 100, 100, 100', '1er Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón A'),
(98, 8, 3, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '75, 72.5, 85, 70, 80', '1er Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón D'),
(99, 85, 4, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '70, 70, 75, 60, 50', '1er Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón A'),
(100, 6, 9, 'Unidad 1, Unidad 2, Unidad 3, Unidad 4, Unidad 5', '70, 70, 75, 75, 60', '2do Semestre', 'Aguilar Covarrubias Norma Aracely', 2022, 1, 'Matutino', 'Salón C');

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
  MODIFY `IdUnidad` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

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
