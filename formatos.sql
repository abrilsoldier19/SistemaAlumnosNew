-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 04:37 AM
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
  `asignatura1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asignatura2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asignatura3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asignatura4` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asignatura5` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asignatura6` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asignatura7` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades4` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades5` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades6` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades7` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades8` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades9` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades10` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades11` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidades12` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `calif_1` double NOT NULL,
  `calif_2` double NOT NULL,
  `calif_3` double NOT NULL,
  `calif_4` double NOT NULL,
  `calif_5` double NOT NULL,
  `calif_6` double NOT NULL,
  `calif_7` double NOT NULL,
  `calif_8` double NOT NULL,
  `calif_9` double NOT NULL,
  `calif_10` double NOT NULL,
  `calif_11` double NOT NULL,
  `calif_12` double NOT NULL,
  `observaciones` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formatos`
--

INSERT INTO `formatos` (`IdFormatos`, `asignatura1`, `asignatura2`, `asignatura3`, `asignatura4`, `asignatura5`, `asignatura6`, `asignatura7`, `nombre`, `unidades1`, `unidades2`, `unidades3`, `unidades4`, `unidades5`, `unidades6`, `unidades7`, `unidades8`, `unidades9`, `unidades10`, `unidades11`, `unidades12`, `calif_1`, `calif_2`, `calif_3`, `calif_4`, `calif_5`, `calif_6`, `calif_7`, `calif_8`, `calif_9`, `calif_10`, `calif_11`, `calif_12`, `observaciones`) VALUES
(1, 'poo', 'base de datos', 'taller de etica', 'poo', 'poo', 'poo', 'poo', 'abril', 'U3', 'U3', 'U6', 'U6', 'U8', 'U7', 'U7', 'U8', 'U8', 'U9', 'U11', 'U3', 6, 6, 5, 7, 7, 8, 6, 8, 7, 6, 9, 10, 'BUEN ALUMNO'),
(4, 'POO', 'BASE DE DATOS', 'GRAFICACION', 'DIBUJO MECANICO', 'MECANICA', 'ELECTROMAGNETISMO', 'QUIMICA', 'ABRIL', 'U3', 'U7', 'U7', 'U8', 'U9', 'U9', 'U9', 'U9', 'U9', 'U8', 'U9', 'U9', 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formatos`
--
ALTER TABLE `formatos`
  ADD PRIMARY KEY (`IdFormatos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formatos`
--
ALTER TABLE `formatos`
  MODIFY `IdFormatos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
