-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 03:28 AM
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
-- Table structure for table `formatos`
--

CREATE TABLE `formatos` (
  `IdFormatos` bigint(20) NOT NULL,
  `observaciones` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `calificacion_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formatos`
--

INSERT INTO `formatos` (`IdFormatos`, `observaciones`, `calificacion_id`) VALUES
(1, 'hello',1),
(2, 'bien hecho', 37),
(3, 'falto a clase', 38),
(4, 'falto a clase', 39),
(5, 'hello',1),
(6, 'bien hecho', 37),
(7, 'falto a clase', 38),
(8, 'falto a clase', 39),
(9, 'no fue a clase', 68),
(10, 'Comentario 1', 69),
(11, 'Comentario 2', 70),
(12, 'Comentario 3', 71),
(13, 'Comentario 4', 72),
(14, 'Comentario 5', 73),
(15, 'Comentario 1', 74),
(16, 'Comentario 2', 37),
(17, 'Comentario 3', 38),
(18, 'Comentario 4', 39),
(19, 'Comentario 5', 68),
(20, 'Comentario 1', 69),
(21, 'Comentario 2', 70),
(22, 'Comentario 3', 71),
(23, 'Comentario 4', 72),
(24, 'Comentario 5', 68),
(25, 'Comentario 1', 73),
(26, 'Comentario 2', 74),
(27, 'Comentario 3', 37),
(28, 'Comentario 4', 38),
(29, 'Comentario 5', 39),
(30, 'Comentario 1', 68),
(31, 'Comentario 2', 69),
(32, 'Comentario 3', 70),
(33, 'Comentario 4', 71),
(34, 'Comentario 5', 68);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formatos`
--
ALTER TABLE `formatos`
  ADD PRIMARY KEY (`IdFormatos`),
  ADD KEY `calificacion_id` (`calificacion_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formatos`
--
ALTER TABLE `formatos`
  MODIFY `IdFormatos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formatos`
--
ALTER TABLE `formatos`
  ADD CONSTRAINT `formatos_calificacion_id` FOREIGN KEY (`calificacion_id`) REFERENCES `calificacions` (`IdCalificacions`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
