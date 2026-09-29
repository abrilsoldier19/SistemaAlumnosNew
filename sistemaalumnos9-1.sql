-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 02:13 AM
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
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `IdAlumnos` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `materia` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maestro` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `semestre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `calificacion_final` double NOT NULL,
  `carrera` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`IdAlumnos`, `nombre`, `correo`, `materia`, `maestro`, `semestre`, `calificacion_final`, `carrera`) VALUES
(1, 'Abril Mejia Rangel', 'avril.rock1471@gmail.com', 'Redes', 'Aguilar Covarrubias Norma Aracely', '2do Semestre', 9, 'Ing. Informática'),
(2, 'Abril Mejia Rangel', 'avril.rock1471@gmail.com', 'Base De Datos', 'Aldape Suárez Miguel', '2do Semestre', 8.4166666666667, 'Ing. Informática'),
(4, 'Luis', 'luis19@outlook.com', 'Programación Orientada A Objetos', 'Aguilera Mancilla Héctor', '2do Semestre', 8, '	\r\nIng. Informática');

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
(1, 8, 1, 39, 1, 2, 1, 1, 'Matutino', 'Salon A'),
(2, 6, 2, 38, 38, 2, 1, 1, 'Matutino', 'Salon B'),
(3, 1, 87, 72, 72, 1, 1, 5, 'Matutino', 'Salon A');

-- --------------------------------------------------------

--
-- Table structure for table `archivos`
--

CREATE TABLE `archivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Alumno_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archivos`
--

INSERT INTO `archivos` (`id`, `Alumno_id`, `file_path`, `created_at`, `updated_at`) VALUES
(21, 6, 'Abril_Mejia_Rangel_19052155.pdf', '2023-06-08 23:30:36', '2023-06-09 04:40:08'),
(23, 2, 'Jesus_22054456.pdf', '2023-06-08 23:30:47', '2023-06-09 04:47:27'),
(24, 2, 'Jesus_22054456.pdf', '2023-06-09 05:37:38', '2023-06-09 05:37:38'),
(30, 86, 'Berenice_Sanchez_22052645.pdf', '2023-08-18 01:19:43', '2023-08-18 01:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `año_semestres`
--

CREATE TABLE `año_semestres` (
  `IdAño_semestres` bigint(20) UNSIGNED NOT NULL,
  `Año` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `año_semestres`
--

INSERT INTO `año_semestres` (`IdAño_semestres`, `Año`) VALUES
(1, '2022'),
(2, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(191) NOT NULL,
  `contenido` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `titulo`, `contenido`, `created_at`, `updated_at`) VALUES
(1, 'Hola', 'Nota admin', '2023-04-13 13:18:31', '2023-04-13 13:18:31');

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
  `Maestro` varchar(191) NOT NULL,
  `Añosemestre` year(4) NOT NULL,
  `Carrera_id` bigint(20) UNSIGNED NOT NULL,
  `turno` varchar(255) NOT NULL,
  `salon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `calificacions`
--

INSERT INTO `calificacions` (`IdCalificacions`, `Alumno_id`, `Materia_id`, `comentarios`, `U1`, `U2`, `U3`, `U4`, `U5`, `U6`, `U7`, `U8`, `U9`, `U10`, `U11`, `U12`, `Calificacion_Final`, `Semester`, `Maestro`, `Añosemestre`, `Carrera_id`, `turno`, `salon`) VALUES
(1, 6, 1, 'buena', 9, 9, 8, 8, 8, 8, 0, 0, 0, 0, 0, 0, 8.3333333333333, '2do Semestre', 'Aguilar Covarrubias Norma Aracely', '2022', 1, 'Matutino', 'Salon D'),
(37, 6, 9, 'excelente', 9, 6, 7, 7, 6, 6, 8, 8, 6, 7, 6, 8, 7, '2do Semestre', 'Aguilar Covarrubias Norma Aracely', '2022', 1, 'Matutino', 'Salon C'),
(38, 6, 15, NULL, 6, 6, 7, 5, 6, 8, 9, 7, 7, 6, 7, 6, 6.6666666666667, '2do Semestre', 'Aranda Alarcón Graciela', '2022', 1, 'Matutino', 'Salon B'),
(39, 8, 9, NULL, 5, 7, 8, 7, 6, 6, 6, 7, 8, 6, 7, 7, 6.6666666666667, '2do Semestre', 'Aranda Alarcón Graciela', '2022', 1, 'Matutino', 'Salon A'),
(68, 6, 4, 'regular', 7, 6, 5, 5, 5, 5, 5, 5, 5, 5, 5, 7, 5.5, '1er Semestre', 'Aguilar Covarrubias Norma Aracely', '2022', 1, 'Matutino', 'Salon A'),
(69, 6, 2, 'buena', 7, 8, 7, 8, 9, 8, 9, 6, 9, 9, 9, 9, 7.8333333333333, '1er Semestre', 'Aguilar Covarrubias Norma Aracely', '2022', 1, 'Matutino', 'Salon A'),
(70, 6, 5, 'excelente', 6, 5, 7, 6, 5, 4, 6, 6, 4, 4, 5, 4, 5.5, '1er Semestre', 'Aguilar Covarrubias Norma Aracely', '2022', 1, 'Matutino', 'Salon A'),
(71, 2, 97, 'buen alumno', 8, 9, 8, 9, 7, 6, 0, 0, 0, 0, 0, 0, 3.9166666666667, '1er Semestre', 'Aguilar Covarrubias Norma Aracely', '2023', 5, 'Matutino', 'Salon A'),
(72, 2, 84, 'siempre entrega todo', 9, 9, 9, 9, 9, 5, 6, 8, 9, 9, 9, 8, 8.3333333333333, '1er Semestre', 'Aguilar Covarrubias Norma Aracely', '2023', 5, 'Matutino', 'Salon A'),
(73, 8, 1, 'falta regularmente a clase', 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, '1er Semestre', 'Aguilar Covarrubias Norma Aracely', '2022', 1, 'Matutino', 'Salon A'),
(74, 76, 16, NULL, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, '3er Semestre', 'Aranda Alarcón Graciela', '2023', 1, 'Matutino', 'Salon A'),
(75, 85, 1, NULL, 8, 8, 7, 6, 5, 5, 7, 8, 9, 8, 8, 9, 6.5, '1er Semestre', 'Aguilar Covarrubias Norma Aracely', '2022', 1, 'Matutino', 'Salon A'),
(76, 86, 17, NULL, 6, 6, 7, 6, 9, 5, 8, 8, 7, 8, 8, 7, 6.5, '3er Semestre', 'Aranda Alarcón Graciela', '2022', 1, 'Matutino', 'Salon A');

-- --------------------------------------------------------

--
-- Table structure for table `carreras`
--

CREATE TABLE `carreras` (
  `IdCarreras` bigint(20) UNSIGNED NOT NULL,
  `NombreCarrera` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carreras`
--

INSERT INTO `carreras` (`IdCarreras`, `NombreCarrera`) VALUES
(1, 'Ing. Informática'),
(2, 'Ing. Electrónica'),
(3, 'Ing. En Gestión Empresarial'),
(4, 'Ing. Industrial'),
(5, 'Ing. Mecánica'),
(6, 'Ing. En Energías Renovables');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formatoanexo14`
--

CREATE TABLE `formatoanexo14` (
  `IdFormato14` bigint(20) NOT NULL,
  `Alumno_id` bigint(20) UNSIGNED NOT NULL,
  `Materia_id` bigint(20) UNSIGNED NOT NULL,
  `Maestro` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Semestre_id` bigint(20) UNSIGNED NOT NULL,
  `Carrera_id` bigint(20) UNSIGNED NOT NULL,
  `Turno` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Salon` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `U1` double NOT NULL,
  `U2` double NOT NULL,
  `U3` double NOT NULL,
  `U4` double NOT NULL,
  `U5` double NOT NULL,
  `U6` double NOT NULL,
  `U7` double NOT NULL,
  `U8` double NOT NULL,
  `observaciones` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formatoanexo14`
--

INSERT INTO `formatoanexo14` (`IdFormato14`, `Alumno_id`, `Materia_id`, `Maestro`, `Semestre_id`, `Carrera_id`, `Turno`, `Salon`, `U1`, `U2`, `U3`, `U4`, `U5`, `U6`, `U7`, `U8`, `observaciones`) VALUES
(1, 6, 1, 'Aguilar Covarrubias Norma Aracely', 1, 1, 'Matutino', 'D', 9, 9, 8, 8, 8, 8, 8, 9, NULL),
(2, 6, 2, 'Aguilar Covarrubias Norma Aracely', 1, 1, 'Matutino', 'A', 8, 8, 8, 9, 9, 9, 9, 9, NULL),
(3, 6, 3, '1', 1, 1, 'Matutino', 'A', 88, 99, 77, 78, 92, 90, 87, 94, NULL),
(4, 2, 1, 'Aguilar Covarrubias Norma Aracely', 1, 1, 'Matutino', 'A', 8, 8, 8, 8, 8, 8, 8, 8, NULL),
(5, 86, 17, 'Aranda Alarcón Graciela', 3, 1, 'Matutino', 'A', 6, 6, 7, 7, 9, 5, 8, 8, 'el docente vino a clase');

-- --------------------------------------------------------

--
-- Table structure for table `formatoanexo19`
--

CREATE TABLE `formatoanexo19` (
  `IdFormatoAnexo19` bigint(20) UNSIGNED NOT NULL,
  `Alumno` bigint(20) UNSIGNED NOT NULL,
  `Materia` bigint(20) UNSIGNED NOT NULL,
  `Carrera` bigint(20) UNSIGNED NOT NULL,
  `Maestro` varchar(191) NOT NULL,
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
-- Dumping data for table `formatoanexo19`
--

INSERT INTO `formatoanexo19` (`IdFormatoAnexo19`, `Alumno`, `Materia`, `Carrera`, `Maestro`, `Semestre`, `turno`, `created_at`, `updated_at`, `salon`, `comentarios`, `checkpoint1`, `checkpoint2`, `checkpoint3`) VALUES
(1, 2, 97, 5, 'Aguilar Covarrubias Norma Aracely', '1er Semestre', 'Matutino', NULL, NULL, 'Salón A', 'Asesoriass', 1, 1, 0),
(2, 6, 2, 1, 'Aguilar Covarrubias Norma Aracely', '1er Semestre', 'Matutino', NULL, NULL, 'Salón A', 'ASESORIAS', 1, 1, 0),
(3, 8, 1, 1, 'Aguilar Covarrubias Norma Aracely', '1er Semestre', 'Matutino', NULL, NULL, 'Salón A', 'No asesorias', 0, 1, 0),
(4, 6, 15, 1, 'Aranda Alarcón Graciela', '2do Semestre', 'Matutino', NULL, NULL, 'Salón B', 'psicologia', 1, 0, 0),
(5, 8, 9, 1, 'Aranda Alarcón Graciela', '2do Semestre', 'Matutino', NULL, NULL, 'Salón A', 'Asesoria', 0, 1, 0);

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
(1, 2, 97, 5, 'Aguilar Covarrubias Norma Aracely', '1er Semestre', 'Matutino', NULL, NULL, 'Salón A', 'Asesoriass', 1, 1, 1),
(2, 6, 2, 1, 'Aguilar Covarrubias Norma Aracely', '1er Semestre', 'Matutino', NULL, NULL, 'Salón A', 'ASESORIAS', 0, 1, 0),
(3, 8, 1, 1, 'Aguilar Covarrubias Norma Aracely', '1er Semestre', 'Matutino', NULL, NULL, 'Salón A', 'No asesorias', 1, 0, 0),
(4, 6, 15, 1, 'Aranda Alarcón Graciela', '2do Semestre', 'Matutino', NULL, NULL, 'Salón B', 'psicologia', 1, 1, 0),
(5, 8, 9, 1, 'Aranda Alarcón Graciela', '2do Semestre', 'Matutino', NULL, NULL, 'Salón A', 'Asesoria', 0, 1, 0);

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
(1, 'no entrego trabajos la alumna', 73),
(2, 'trabaja bien la alumna en la unidad 2', 37),
(3, 'no entrego las tareas de la unidad 1', 38),
(4, 'Falto la semana de unidad 3', 39),
(5, 'helloo', 39),
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

-- --------------------------------------------------------

--
-- Table structure for table `maestros`
--

CREATE TABLE `maestros` (
  `IdMaestros` bigint(20) UNSIGNED NOT NULL,
  `NombreMaestro` varchar(255) NOT NULL,
  `Correos` varchar(255) NOT NULL,
  `carrera_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `maestros`
--

INSERT INTO `maestros` (`IdMaestros`, `NombreMaestro`, `Correos`, `carrera_id`) VALUES
(1, 'Alejandra Gonzalez Martinez', 'alejandra.gm@saltillo.tecnm.mx', 1),
(2, 'Ana Victoria Ferniza Sandoval', 'ana.fs@saltillo.tecnm.mx', 1),
(3, 'Araceli Campos Ortiz', 'araceli.co@saltillo.tecnm.mx', 1),
(4, 'Carlos Itzcoatl Garcia Saavedra', 'carlos.gs@saltillo.tecnm.mx', 1),
(5, 'Carmen Melida Hernandez Calderon', 'carmen.hc@saltillo.tecnm.mx', 1),
(6, 'Celina Gaytan Tanguma', 'celina.gt@saltillo.tecnm.mx', 1),
(7, 'Claudia Cardenas Aguirre', 'claudia.ca@saltillo.tecnm.mx', 1),
(8, 'Davila Rios Maria Del Socorro', 'maria.dr@saltillo.tecnm.mx', 1),
(9, 'Eliana Sarahi Sanchez Gonzalez', 'eliana.sg@saltillo.tecnm.mx', 1),
(10, 'Fabio Lopez Campos', 'fabio.lc@saltillo.tecnm.mx', 1),
(11, 'Felipe De Jesus Mendoza Morales', 'felipe.mm@saltillo.tecnm.mx', 1),
(12, 'Gallegos Hernandez Elda Roxana', 'elda.gh@saltillo.tecnm.mx', 1),
(13, 'Helue Isabel De La Barrera Gomez', 'helue.dl@saltillo.tecnm.mx', 1),
(14, 'Ignacio Davila Rios', 'ignacio.dr@saltillo.tecnm.mx', 1),
(15, 'Iris Anahi Escobar Martinez', 'iris.em@saltillo.tecnm.mx', 1),
(16, 'Juanita Elena Gongora Solis', 'juanita.gs@saltillo.tecnm.mx', 1),
(17, 'Juan Vazquez Carrillo', 'juan.vc@saltillo.tecnm.mx', 1),
(18, 'Laura Esquivel Lopez', 'laura.el@saltillo.tecnm.mx', 1),
(19, 'Liset Mancinas Perez', 'liset.mp@saltillo.tecnm.mx', 1),
(20, 'Luis Manuel Ferniza Perez', 'luis.fp@saltillo.tecnm.mx', 1),
(21, 'lucia.vg@saltillo.tecnm.mx', 'Lucia Marisol Valdes Gonzalez', 1),
(22, 'Maria Antonieta Hernandez Santana', 'maria.hs@saltillo.tecnm.mx', 1),
(23, 'Maria Del Refugio Quijano Urbano', 'maria.qu@saltillo.tecnm.mx', 1),
(24, 'Martha Patricia Alvarez Sandoval', 'martha.as@saltillo.tecnm.mx', 1),
(25, 'Mayra Berino Valdes', 'mayra.bv@saltillo.tecnm.mx', 1),
(26, 'Muniz Jimenez Araceli Estefania', 'estefania.mj@saltillo.tecnm.mx', 1),
(27, 'Nancy Fabiola Hernandez Garcia', 'nancy.hg@saltillo.tecnm.mx', 1),
(28, 'Olga Lidia Vidal Vazquez', 'olga.vv@saltillo.tecnm.mx', 1),
(29, 'Olmedo Landeros Irma Karina', 'irma.ol@saltillo.tecnm.mx', 1),
(30, 'Pena Cruz Guadalupe Del Socorro', 'guadalupe.pc@saltillo.tecnm.mx', 1),
(31, 'Ramon Valverde', 'ramon.vl@saltillo.tecnm.mx', 1),
(32, 'Rocio Cipactli Sanchez Montes', 'rocio.sm@saltillo.tecnm.mx', 1),
(33, 'Sanchez Hernandez Laura Acacia', 'laura.sh@saltillo.tecnm.mx', 1),
(34, 'Sandra Marisol Torres Oyervides', 'sandra.to@saltillo.tecnm.mx', 1),
(35, 'Sergio Iga Berlanga', 'sergio.ib@saltillo.tecnm.mx', 1),
(36, 'Silvia Polendo Luis', 'silvia.pl@saltillo.tecnm.mx', 1),
(37, 'Solis Galindo Marco Antonio', 'marco.sg@saltillo.tecnm.mx', 1),
(38, 'Sorkee Quiroz Roxana Karina', 'roxana.sq@saltillo.tecnm.mx', 1),
(39, 'Valdez Perez J. Santos', 'jose.vp@saltillo.tecnm.mx', 1),
(40, 'Velazquez Rodriguez Liliana', 'liliana.rv@saltillo.tecnm.mx', 1),
(41, 'Veronica Martinez Villafuerte', 'veronica.mv@saltillo.tecnm.mx', 1),
(42, 'Victor Arturo Ferniza Perez', 'victor.fp@saltillo.tecnm.mx', 1),
(43, 'Villegas Balderas Abril Rocio', 'abril.vb@saltillo.tecnm.mx', 1),
(44, 'Zavala Aguillon Brenda', 'brenda.za@saltillo.tecnm.mx', 1),
(45, 'Virginia Flores Gaytan', 'virginia.fg@saltillo.tecnm.mx', 1),
(46, 'Mario Alberto De La Rosa Cepeda', 'mario.dr@saltillo.tecnm.mx', 1),
(47, 'Manuel Rodarte Carrillo', 'manuel.rc@saltillo.tecnm.mx', 1),
(48, 'Juan Carlos Loyola Licea', 'juan.ll@saltillo.tecnm.mx', 1),
(49, 'Aida Isolda Fernandez De La Cerda', 'aida.fd@saltillo.tecnm.mx', 1),
(50, 'SANDOVAL NUNEZ MARIA DE LOURDES', 'maria.sn@saltillo.tecnm.mx', 1),
(51, 'MARTINEZ PEREZ RENE', 'rene.mp@saltillo.tecnm.mx', 1),
(52, 'Fernando Miguel Viesca Farias', 'fernando.vf@saltillo.tecnm.mx', 1),
(53, 'Pedro Angel Gonzalez Barrera', 'pedro.gb@saltillo.tecnm.mx', 1),
(54, 'Marcelino Vargas Lopez', 'marcelino.vl@saltillo.tecnm.mx', 1),
(55, 'Dalia Veronica Aguillon Padilla', 'dalia.ap@saltillo.tecnm.mx', 1),
(56, 'Hilda Araceli Torres Plata', 'hilda.tp@saltillo.tecnm.mx', 1),
(57, 'Adriana Marisol Rangel Rodriguez', 'adriana.rr@saltillo.tecnm.mx', 1),
(58, 'Adriana Marisol Rangel Rodriguez', 'ojeda.sd@saltillo.tecnm.mx', 1),
(59, 'Norma Hernandez Flores', 'norma.hf@saltillo.tecnm.mx', 1),
(60, 'RUIZ MUNIZ JORGE ALBERTO', 'jorge.rm@saltillo.tecnm.mx', 1),
(61, 'Rene Sanchez Ramos', 'rene.sr@saltillo.tecnm.mx', 1),
(62, 'Lopez Fernandez Fabio Alberto', 'fabio.lf@saltillo.tecnm.mx', 1),
(63, 'Raul Rodolfo Ramos Salas', 'raul.rs@saltillo.tecnm.mx', 1),
(64, 'Juan Francisco Benavides Ramos', 'juan.br@saltillo.tecnm.mx', 1),
(65, 'Salas Lopez Sergio Emmanuel', 'sergio.sl@saltillo.tecnm.mx', 1),
(66, 'Romina Denisse Sanchez Gonzalez', 'romina.sg@saltillo.tecnm.mx', 1),
(67, 'Juan Antonio Ruiz Muniz', 'juan.rm@saltillo.tecnm.mx', 1),
(68, 'Flores Villa Miguel Angel', 'miguel.fv@saltillo.tecnm.mx', 1),
(69, 'Justino Barrales Montes', 'justino.bm@saltillo.tecnm.mx', 1),
(70, 'Juan Angel Sanchez Espinoza', 'juan.se@saltillo.tecnm.mx', 1),
(71, 'Juan Eudes Castro Perez', 'juan.cp@saltillo.tecnm.mx', 1),
(72, 'Jose Ignacio Garcia Alvarez', 'jose.ga@saltillo.tecnm.mx', 1),
(73, 'Badillo Mata Jesus Leonardo', 'leonardo.bm@saltillo.tecnm.mx', 1),
(74, 'Araceli Elizabeth Rodriguez Contreras', 'araceli.rc@saltillo.tecnm.mx', 1),
(75, 'Cerda Leon Erwin Rommel', 'erwin.cl@saltillo.tecnm.mx', 1),
(76, 'Silvia Deyanira Rodriguez Luna', 'silvia.rl@saltillo.tecnm.mx', 1),
(77, 'Gerardo Emanuel Villarreal Sifuentes', 'gerardo.vs@saltillo.tecnm.mx', 1),
(78, 'Ramos Oliveira Jorge Alberto', 'jorge.ro@saltillo.tecnm.mx', 1),
(79, 'Alicia Guadalupe Del Bosque', 'alicia.db@saltillo.tecnm.mx', 1),
(80, 'Olivia Garcia Calvillo', 'olivia.gc@saltillo.tecnm.mx', 1),
(81, 'Arturo Alejandro Dominguez Martinez', 'arturo.dm@saltillo.tecnm.mx', 1),
(82, 'Juan Fraustro De La O', 'juan.fd@saltillo.tecnm.mx', 1),
(83, 'Velasco Pacheco Ariana Elizabeth', 'ariana.vp@saltillo.tecnm.mx', 1),
(84, 'Patricia Gonzalez Ordaz', 'patricia.go@saltillo.tecnm.mx', 1),
(85, 'Claudia Maria Sanchez Suarez', 'claudia.ss@saltillo.tecnm.mx', 1),
(86, 'Jose Gallegos Martinez', 'jose.gm@saltillo.tecnm.mx', 1),
(87, 'Moreno Posada Humberto', 'humberto.mp@saltillo.tecnm.mx', 1),
(88, 'Juan Jose Contreras Gaytan', 'juan.cg@saltillo.tecnm.mx', 1),
(89, 'PINA VILLANUEVA MARIA ISABEL', 'maria.pv@saltillo.tecnm.mx', 1),
(90, 'Eduardo Sorkee Quiroz', 'eduardo.sq@saltillo.tecnm.mx', 1),
(91, 'Leonilo Rodriguez Borrego', 'leonilo.rb@saltillo.tecnm.mx', 1),
(92, 'Sergio Nava Oyervides', 'sergio.no@saltillo.tecnm.mx', 1),
(93, 'Octavio Mendez Hernandez', 'octavio.mh@saltillo.tecnm.mx', 1),
(94, 'Benito Rodarte Fuentes', 'benito.rf@saltillo.tecnm.mx', 1),
(95, 'Jesus Cantu Perez', 'jesus.cp@saltillo.tecnm.mx', 1),
(96, 'Ismael Luevano Martinez', 'ismael.lm@saltillo.tecnm.mx', 1),
(97, 'Cueto Rodriguez Maria Magdalena', 'maria.cr@saltillo.tecnm.mx', 1),
(98, 'Narda Lucely Reyes Acosta', 'narda.ra@saltillo.tecnm.mx', 1),
(99, 'Juan Gilberto Navarro Rodriguez', 'juan.nr@saltillo.tecnm.mx', 1),
(100, 'Eduardo Fernandez Chavez', 'eduardo.fc@saltillo.tecnm.mx', 1),
(101, 'Valdivia Lugo Eduardo', 'eduardo.vl@saltillo.tecnm.mx', 1),
(102, 'Alfredo Salazar Garcia', 'alfredo.sg@saltillo.tecnm.mx', 1),
(103, 'Claudia Maria Fraustro Gaona', 'claudia.fg@saltillo.tecnm.mx', 1),
(104, 'Ruiz Y Ruiz Hector Efrain', 'hector.ry@saltillo.tecnm.mx', 1),
(105, 'Sandoval Nunez Juan Manuel', 'juan.sn@saltillo.tecnm.mx', 1),
(106, 'David Andres Valdes Martinez', 'david.vm@saltillo.tecnm.mx', 1),
(107, 'Jesus David Flores Cortes', 'jesus.fc@saltillo.tecnm.mx', 1),
(108, 'Miguel Maldonado Leza', 'miguel.ml@saltillo.tecnm.mx', 1),
(109, 'Edna Marina Gonzalez Martinez', 'edna.gm@saltillo.tecnm.mx', 1),
(110, 'Mora Gonzalez Ada Paulina', 'adriana.mg@saltillo.tecnm.mx', 1),
(111, 'Alejandro Lopez Lopez', 'alejandro.ll@saltillo.tecnm.mx', 1),
(112, 'PINA VILLANUEVA MARTHA PATRICIA', 'martha.pv@saltillo.tecnm.mx', 1),
(113, 'Jesus Enrique Aguirre Garcia', 'jesus.ag@saltillo.tecnm.mx', 1),
(114, 'Hilda Azucena Escobedo Villarreal', 'hilda.ev@saltillo.tecnm.mx', 1),
(115, 'De La Pena Fuentes Jose Ruben', 'jose.dl3@saltillo.tecnm.mx', 1),
(116, 'Karina Cabrera Chagoyan', 'karina.cc@saltillo.tecnm.mx', 1),
(117, 'CASTANUELA FUENTES LUIS ENRIQUE', 'luis.cf@saltillo.tecnm.mx', 1),
(118, 'Sergio Arturo Mendoza Morales', 'sergio.mm@saltillo.tecnm.mx', 1),
(119, 'Ricardo Flores Cano', 'ricardo.fc@saltillo.tecnm.mx', 1),
(120, 'Martinez Lopez Miguel Angel', 'miguel.ml@saltillo.tecnm.mx', 1),
(121, 'Judith Magaly Moreno Rubio', 'judith.mr@saltillo.tecnm.mx', 1),
(122, 'Jose Luis Gaytan Malacara', 'jose.gm@saltillo.tecnm.mx', 1),
(123, 'MONA PENA LUIS JAVIER', 'luis.mp@saltillo.tecnm.mx', 1),
(124, 'Ernesto Linan Garcia', 'ernesto.lg@saltillo.tecnm.mx', 1),
(125, 'Espinoza Arzola Jesus Alberto', 'jesus.ea@saltillo.tecnm.mx', 1),
(126, 'Oscar Martinez Martinez', 'oscar.mm@saltillo.tecnm.mx', 1),
(127, 'Patricia Virginia Salas Hernandez', 'patricia.sh@saltillo.tecnm.mx', 1),
(128, 'GARZA CASTANON ALFONSO', 'alfonso.gc@saltillo.tecnm.mx', 1),
(129, 'MANRIQUE PENA PAOLA DENIS', 'paola.mp@saltillo.tecnm.mx', 1),
(130, 'VAZQUEZ ESQUIVEL ANA LAURA', 'ana.ve@saltillo.tecnm.mx', 1),
(131, 'Armando Flores Valdes', 'armando.fv@saltillo.tecnm.mx', 1),
(132, 'Jonam Leonel Sanchez Cuevas', 'joham.sc@saltillo.tecnm.mx', 1),
(133, 'Melendez Olivares Ana Karen', 'ana.mo@saltillo.tecnm.mx', 1),
(134, 'Alejandro Soto Trevino', 'alejandro.st@saltillo.tecnm.mx', 1);


-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias` (
  `IdMaterias` bigint(20) UNSIGNED NOT NULL,
  `NombreMateria` varchar(191) NOT NULL,
  `carrera_id` bigint(20) UNSIGNED NOT NULL,
  `semestre_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`IdMaterias`, `NombreMateria`, `carrera_id`, `semestre_id`) VALUES
(1, 'Cálculo Diferencial', 1, 1),
(2, 'Fundamentos de investigación', 1, 1),
(3, 'Fundamentos de programación', 1, 1),
(4, 'Matemáticas Discretas', 1, 1),
(5, 'Taller de Administración', 1, 1),
(6, 'Taller de Ética', 1, 1),
(7, 'Cálculo Integral', 1, 2),
(8, 'Programación orientada a objetos', 1, 2),
(9, 'Contabilidad financiera', 1, 2),
(10, 'Química', 1, 2),
(11, 'Álgebra Lineal', 1, 2),
(12, 'Física General', 1, 2),
(13, 'Cálculo Vectorial', 1, 3),
(14, 'Estructura de Datos', 1, 3),
(15, 'Cultura Empresarial', 1, 3),
(16, 'Fundamentos de Base de Datos', 1, 3),
(17, 'Probabilidad y estadística', 1, 3),
(18, 'Principios Eléctricos y Aplicaciones Digitales', 1, 3),
(19, 'Arquitectura de computadoras', 1, 4),
(20, 'Desarrollo Sustentable', 1, 4),
(21, 'Ecuaciones Diferenciales', 1, 4),
(22, 'Fundamentos de telecomunicaciones', 1, 4),
(23, 'Investigación de operaciones', 1, 4),
(24, 'Programación Web', 1, 4),
(25, 'Taller de Base de Datos', 1, 5),
(26, 'Tópicos Avanzados de Programación', 1, 5),
(27, 'Métodos Numéricos', 1, 5),
(28, 'Redes de Computadoras', 1, 5),
(29, 'Taller de Sistemas Operativos', 1, 5),
(30, 'Graficación', 1, 5),
(31, 'Administración de Base de Datos', 1, 6),
(32, 'Lenguajes de Interfaz', 1, 6),
(33, 'Taller de Investigación I', 1, 6),
(34, 'Conmutación y Enrutamiento de Redes de Datos', 1, 6),
(35, 'Sistemas Operativos', 1, 6),
(36, 'Fundamentos de Ingeniería de Software', 1, 6),
(37, 'Administración de Redes', 1, 7),
(38, 'Lenguajes y Autómatas I', 1, 7),
(39, 'Programación Funcional y Lógica', 1, 7),
(40, 'Sistemas Programables', 1, 7),
(41, 'Taller de Investigación II', 1, 7),
(42, 'Simulación', 1, 7),
(43, 'Gestión de Proyectos de Software', 1, 8),
(44, 'Ingeniería de Software', 1, 8),
(45, 'Inteligencia Artificial', 1, 8),
(46, 'Lenguajes y Autómatas II', 1, 8),
(47, 'Programación para Dispositivos Móviles', 1, 8),
(48, 'Internet de las cosas', 1, 8),
(49, 'Big Data y Analisis de Datos', 1, 9),
(50, 'Cómputo en la Nube', 1, 9),
(51, 'Ciencia de datos', 1, 9),
(52, 'Cálculo Diferencial', 3, 1),
(53, 'Química', 3, 1),
(54, 'Probabilidad y  Estadistica', 3, 1),
(55, 'Desarrollo Humano  Integral', 3, 1),
(56, 'Fundamentos de  Investigacion', 3, 1),
(57, 'Taller de Etica', 3, 1),
(58, 'Cálculo Integral', 3, 2),
(59, 'Mecánica Clásica', 3, 2),
(60, 'Electromagnetismo', 3, 2),
(61, 'Tecnología de los Materiales', 3, 2),
(62, 'Dibujo Asistido por Computadora', 3, 2),
(63, 'Comunicación Humana', 3, 2),
(64, 'Cálculo Vectorial', 3, 3),
(65, 'Álgebra lineal', 3, 3),
(66, 'Circuitos Eléctricos I', 3, 3),
(67, 'Mediciones Eléctricas', 3, 3),
(68, 'Mecánica de Fluidos y Termodinámica', 3, 3),
(69, 'Programación', 3, 3),
(70, 'Ecuaciones Diferenciales', 3, 4),
(71, 'Teoría Electromagnética', 3, 4),
(72, 'Circuitos Eléctricos II', 4, 4),
(73, 'Electrónica Analógica', 3, 4),
(74, 'Física Moderna', 3, 4),
(75, 'Métodos Numéricos', 3, 4),
(76, 'Control I', 3, 5),
(77, 'Equipos Mecánicos', 3, 5),
(78, 'Transformadores', 3, 5),
(79, 'Instalaciones Eléctricas', 3, 5),
(80, 'Electrónica Digital', 3, 5),
(81, 'Desarrollo sustentable', 3, 5),
(82, 'Control II', 3, 6),
(83, 'Potencia Fluidica', 3, 6),
(84, 'Motores de Inducción y Especiales', 3, 6),
(85, 'Máquinas Sincrónicas y de CD', 3, 6),
(86, 'Instalaciones eléctricas Industriales', 3, 6),
(87, 'Taller de Investigación I', 3, 6),
(88, 'Control de Máquinas Eléctricas', 3, 7),
(89, 'Electrónica Industrial', 3, 7),
(90, 'Centrales Eléctricas', 3, 7),
(91, 'Modelado de Sistemas Eléctricos de Potencia', 3, 7),
(92, 'Fundamentos y Tecnología Aplicada en Robótica', 3, 7),
(93, 'Taller de Investigación II', 3, 7),
(94, 'Sistemas de Iluminación', 3, 8),
(95, 'Instrumentación', 3, 8),
(96, 'Calidad de la Energía Eléctrica', 3, 8),
(97, 'Controladores Lógicos Programables', 3, 8),
(98, 'Pruebas y Mantenimiento Eléctrico', 3, 8),
(99, 'Legislación en Materia Eléctrica', 3, 8),
(100, 'Gestión Empresarial y Liderazgo', 3, 8),
(101, 'Costos y Presupuestos de Proyectos Eléctricos', 3, 9),
(102, 'Tópicos Selectos de Ingeniería de Control', 3, 9),
(103, 'Curso Avanzado de PLC', 3, 9),
(104, 'Cálculo Diferencial', 2, 1),
(105, 'Mecánica Clásica', 2, 1),
(106, 'Química', 2, 1),
(107, 'Comunicación Humana', 5, 1),
(108, 'Fundamentos de Investigación', 2, 1),
(109, 'Seminario de Ética', 2, 1),
(110, 'Cálculo Integral', 2, 2),
(111, 'Probabilidad y Estadística', 2, 2),
(112, 'Desarrollo  Sustentable', 2, 2),
(113, 'Mediciones Eléctricas', 2, 2),
(114, 'Tópicos Selectos de  Física', 2, 2),
(115, 'Desarrollo Humano', 2, 2),
(116, 'Electromagnetismo', 2, 3),
(117, 'Álgebra Lineal', 2, 3),
(118, 'Cálculo Vectorial', 2, 3),
(119, 'Física de  Semiconductores', 5, 3),
(120, 'Programación  Estructurada', 2, 3),
(121, 'Marco Legal de la  Empresa', 2, 4),
(122, 'Circuitos Eléctricos I', 2, 4),
(123, 'Ecuaciones  Diferenciales', 2, 4),
(124, 'Análisis Numérico', 2, 4),
(125, 'Diodos y Transistores', 2, 4),
(126, 'Programación Visual', 2, 4),
(127, 'Introducción a las  Telecomunicaciones', 2, 5),
(128, 'Circuitos Eléctricos II', 2, 5),
(129, 'Teoría  Electromagnética', 2, 5),
(130, 'Diseño con  Transistores', 2, 5),
(131, 'Diseño Digital', 2, 5),
(132, 'Desarrollo Profesional', 2, 5),
(133, 'Máquinas Eléctricas', 2, 6),
(134, 'Control I', 2, 6),
(135, 'Fundamentos  Financieros', 2, 6),
(136, 'Amplificadores  Operacionales', 2, 6),
(137, 'Diseño Digital con  VHDL', 2, 6),
(138, 'Taller de  Investigación I', 2, 6),
(139, 'Potencia Fluídica', 2, 6),
(140, 'Control de Máquinas  Eléctricas', 2, 7),
(141, 'Control II', 2, 7),
(142, 'Instrumentación', 2, 7),
(143, 'Electrónica de  Potencia', 2, 7),
(144, 'Microcontroladores', 2, 7),
(148, 'Taller de  Investigación II', 2, 7),
(149, 'Optoelectrónica', 2, 7),
(150, 'Controladores  Lógicos Programables', 2, 8),
(151, 'Control Digital', 2, 8),
(152, 'Tópicos Selectos de  Ingeniería Electrónica  I', 2, 8),
(153, 'Fundamentos y  Tecnología Aplicada  en Robótica', 2, 8),
(154, 'Administración  Gerencial', 2, 8),
(155, 'Desarrollo y  Evaluación de  Proyectos', 2, 8),
(156, 'Curso Avanzado de  PLC', 2, 9),
(157, 'Tópicos Selectos de  Ingeniería Electrónica  II', 2, 9),
(158, 'Control Inteligente', 2, 9),
(159, 'Dinámica Social', 4, 1),
(160, 'Cálculo Diferencial', 4, 1),
(161, 'Desarrollo Humano', 4, 1),
(162, 'Fundamentos de  Gestión Empresarial', 4, 1),
(163, 'Fundamentos de  Física', 4, 1),
(164, 'Fundamentos de  Química', 4, 1),
(165, 'Legislación Laboral', 4, 2),
(166, 'Cálculo Integral', 4, 2),
(167, 'Contabilidad Orientada  a los Negocios', 4, 2),
(168, 'Desarrollo  Sustentable', 4, 2),
(169, 'Taller de Ética', 4, 2),
(170, 'Software de Aplicación  Ejecutivo', 4, 2),
(171, 'Marco Legal de las  Organizaciones', 4, 3),
(172, 'Probabilidad y  Estadística Descriptiva', 4, 3),
(173, 'Costos  Empresariales', 4, 3),
(174, 'Fundamentos de  Investigación', 4, 3),
(175, 'Economía  Empresarial', 4, 3),
(176, 'Álgebra Lineal', 4, 3),
(177, 'Ingeniería de  Procesos', 4, 4),
(178, 'Estadística  Inferencial I', 4, 4),
(179, 'Instrumentos de  Presupuestación Empresaria', 4, 4),
(180, 'Diseño  Organizacional', 4, 4),
(181, 'Entorno  Macroeconómico', 4, 4),
(182, 'Habilidades  Directivas I', 4, 4),
(183, 'Gestión de la  Producción I', 4, 5),
(184, 'Estadística  Inferencial II', 4, 5),
(185, 'Finanzas en las  Organizaciones', 4, 5),
(186, 'Mercadotecnia', 4, 5),
(187, 'Taller de  Investigación I', 4, 5),
(188, 'Habilidades  Directivas II', 4, 5),
(189, 'Gestión de la  Producción II', 4, 6),
(190, 'Investigación de  Operaciones', 4, 6),
(191, 'El Emprendedor y la  Innovación', 4, 6),
(192, 'Ingeniería  Económica', 4, 6),
(193, 'Gestión del Capital  Humano', 4, 6),
(194, 'Taller de  Investigación II', 4, 6),
(195, 'Gestión Logística', 4, 7),
(196, 'Gestión de procesos de  Manufactura Esbelta', 4, 7),
(197, 'Plan de Negocios', 4, 7),
(198, 'Cadena de  Suministro', 4, 7),
(199, 'Sistemas de  Información de la  Mercadotecnia', 4, 7),
(200, 'Gestión Estratégica', 4, 7),
(201, 'Modelos de Simulación  y Logística', 4, 8),
(202, 'Calidad Aplicada a la  Gestión Empresaria', 4, 8),
(203, 'Administración de la  Salud y Seguridad  Ocupacional', 4, 8),
(204, 'Mercadotecnia  electrónica', 4, 8),
(205, 'Compras', 4, 8),
(206, 'Desarrollo de Productos,  Empaque, Embalaje y  Transportación', 4, 8),
(207, 'Logística y Aspectos  Técnicos del Comercio  Internacional', 4, 8),
(208, 'Fundamentos de Investigación', 5, 1),
(209, 'Taller de Ética', 5, 1),
(210, 'Cálculo Diferencial', 5, 1),
(211, 'Taller de Herramientas Intelectuales', 5, 1),
(212, 'Química', 5, 1),
(213, 'Dibujo Industrial', 5, 1),
(214, 'Electricidad y Electrónica Industrial', 5, 2),
(215, 'Propiedades de los Materiales', 5, 2),
(216, 'Cálculo Integral', 5, 2),
(217, 'Ingeniería de Sistema', 5, 2),
(218, 'Probabilidad y Estadística', 5, 2),
(219, 'Análisis de la Realidad Nacional', 5, 2),
(220, 'Taller de liderazgo', 5, 2),
(221, 'Metrología y Normalización', 5, 3),
(222, 'Álgebra Lineal', 5, 3),
(223, 'Cálculo Vectorial', 5, 3),
(224, 'Economía', 5, 3),
(225, 'Estadística Inferencial I', 5, 3),
(226, 'Estudio de Trabajo I', 5, 3),
(227, 'Proceso de Manufactura', 5, 4),
(228, 'Física', 5, 4),
(229, 'Algoritmos y Lenguajes de Programación', 5, 4),
(230, 'Investigación de Operaciones I', 5, 4),
(231, 'Estadística Inferencial II', 5, 4),
(232, 'Estudio de Trabajo II', 5, 4),
(233, 'Higiene y Seguridad Industrial', 5, 4),
(234, 'Administración de Proyectos', 5, 5),
(235, 'Administración de Costos', 5, 5),
(236, 'Administración de Operaciones I', 5, 5),
(237, 'Investigación de Operaciones II', 5, 5),
(238, 'Estadística y Control de Calidad', 5, 5),
(239, 'Desarrollo Sustentable', 5, 5),
(240, 'Ergonomía', 5, 5),
(241, 'Taller de Investigación I', 5, 6),
(242, 'Ingeniería Económica', 5, 6),
(243, 'Administración de Operaciones II', 5, 6),
(244, 'Simulación', 5, 6),
(245, 'Administración de Mantenimiento', 5, 6),
(246, 'Mercadotecnia', 5, 6),
(247, 'Requerimientos de la Industria Automotriz', 5, 6),
(248, 'Taller de Investigación II', 5, 7),
(249, 'Planificación Financiera', 5, 7),
(250, 'Planeación y Diseño de Instalaciones', 5, 7),
(251, 'Sistemas de Manufactura', 5, 7),
(252, 'Logística y Cadena de Suministros', 5, 7),
(253, 'Administración de los Sistemas de Calidad', 5, 7),
(254, 'Ingeniería de Calidad', 5, 7),
(255, 'Formulación y Evaluación de Proyectos', 5, 8),
(256, 'Relaciones Industriales', 5, 8),
(257, 'Simulación Avanzada', 5, 8),
(258, 'Sistemas Avanzados de Manufactura', 5, 8),
(259, 'Manufactura Integrada por Computadora', 5, 8),
(260, 'Seminario de Nuevas Tecnologías', 5, 8),
(261, 'Seminario de Competitividad', 5, 8),
(262, 'Fundamentos de  Investigación', 6, 1),
(263, 'Taller de ética', 6, 1),
(264, 'Cálculo diferencial', 6, 1),
(265, 'Química', 6, 1),
(266, 'Dibujo asistido por computadora', 6, 1),
(267, 'Fundamentos de administración', 6, 1),
(268, 'Probabilidad y estadística', 6, 2),
(269, 'Metrología y normalización', 6, 2),
(270, 'Cálculo integral', 6, 2),
(271, 'Álgebra lineal', 6, 2),
(272, 'Mineralogía y obtención de materiales', 6, 2),
(273, 'Taller de seguridad e higiene', 6, 2),
(274, 'Electricidad, magnetismo y óptica', 6, 3),
(275, 'Mecánica clásica', 6, 3),
(276, 'Cálculo vectorial', 6, 3),
(277, 'Química orgánica', 6, 3),
(278, 'Desarrollo sustentable', 6, 3),
(279, 'Física del estado sólido', 6, 3),
(280, 'Caracterización estructural', 6, 4),
(281, 'Producción de metales no ferrosos', 6, 4),
(282, 'Ecuaciones diferenciales', 6, 4),
(283, 'Materiales poliméricos', 6, 4),
(284, 'Termodinámica para ingeniería en materiales', 6, 4),
(285, 'Comportamiento mecánico de materiales', 6, 4),
(286, 'Técnicas de análisis', 6, 5),
(287, 'Diagramas de equilibrio', 6, 5),
(288, 'Fenómenos de transporte', 6, 5),
(289, 'Programación de métodos numéricos', 6, 5),
(290, 'Equilibrio físico-químico', 6, 5),
(291, 'Análisis de fallas mecánicas', 6, 5),
(292, 'Taller de investigación I', 6, 6),
(293, 'Transiciones de fases', 6, 6),
(294, 'Solidificación', 6, 6),
(295, 'Producción de metales ferrosos', 6, 6),
(296, 'Cinética', 6, 6),
(297, 'Corrosión y degradación de materiales', 6, 6),
(298, 'Taller de investigación II', 6, 7),
(299, 'Tratamientos  Térmicos', 6, 7),
(300, 'Materiales cerámicos', 6, 7),
(301, 'Procesos de manufactura', 6, 7),
(302, 'Calidad', 6, 7),
(303, 'Introducción a los nanomateriales', 6, 7),
(304, 'Formulación y evaluación de proyectos', 6, 8),
(305, 'Materiales compuestos', 6, 8),
(306, 'Introducción a los biomateriales', 6, 8),
(307, 'Tecnología de las arenas', 6, 8),
(308, 'Modelos y diseño  de colada', 6, 8),
(309, 'Fundiciones de  hierro', 6, 8),
(310, 'Polímeros  Avanzados', 6, 8),
(311, 'Ingeniería de  Superficies', 6, 8),
(312, 'Diseño y  Simulación', 6, 8),
(313, 'Fundiciones de aleaciones no ferrosas', 6, 9),
(314, 'Estadística aplicada', 6, 9),
(315, 'Simulación de proc. de fundición', 6, 9),
(316, 'Materiales  Avanzados', 6, 9),
(317, 'Mat. Cerámicos y Comp. avanzados', 6, 9),
(318, 'Cálculo Diferencial', 7, 1),
(319, 'Taller de Ética', 7, 1),
(320, 'Fundamentos de Investigación', 7, 1),
(321, 'Química', 7, 1),
(322, 'Metrología y Normalización', 7, 1),
(323, 'Dibujo Mecánico', 7, 1),
(324, 'Cálculo Integral', 7, 2),
(325, 'Álgebra Lineal', 7, 2),
(326, 'Probabilidad y Estadística', 7, 2),
(327, 'Ingeniería de Materiales Metálicos', 7, 2),
(328, 'Algoritmos y Programación', 7, 2),
(329, 'Proceso Administrativo', 7, 2),
(330, 'Cálculo Vectorial', 7, 3),
(331, 'Estática', 7, 3),
(332, 'Calidad', 7, 3),
(333, 'Ingeniería de Materiales no Metálicos', 7, 3),
(334, 'Electromagnetismo', 7, 3),
(335, 'Contabilidad y Costos', 7, 3),
(336, 'Ecuaciones Diferenciales', 7, 4),
(337, 'Mecánica de Materiales I', 7, 4),
(338, 'Dinámica', 7, 4),
(339, 'Procesos de Manufactura', 7, 4),
(340, 'Sistemas Electrónicos', 7, 4),
(341, 'Métodos Numéricos', 7, 4),
(342, 'Mecánica de Materiales II', 7, 5),
(343, 'Mecanismos', 7, 5),
(344, 'Termodinámica', 7, 5),
(345, 'Mecánica de Fluidos', 7, 5),
(346, 'Circuitos y Máquinas Eléctricas', 7, 5),
(347, 'Desarrollo Sustentable', 7, 5),
(348, 'Diseño Mecánico I', 7, 6),
(349, 'Vibraciones Mecánicas', 7, 6),
(350, 'Transferencia de Calor', 7, 6),
(351, 'Sistemas e Instalaciones Hidráulicas', 7, 6),
(352, 'Instrumentación y Control', 7, 6),
(353, 'Taller de Investigación I', 7, 6),
(354, 'Diseño Mecánico II', 7, 7),
(355, 'Higiene y Seguridad Industrial', 7, 7),
(356, 'Máquinas de Fluidos Compresibles', 7, 7),
(357, 'Máquinas de Fluidos Incompresibles', 7, 7),
(358, 'Automatización Industrial', 7, 7),
(359, 'Taller de Investigación II', 1, 7),
(360, 'Mantenimiento', 7, 8),
(361, 'Sistemas de Generación  de Energía', 7, 8),
(362, 'Refrigeración y Aire  Acondicionado', 7, 8),
(363, 'Gestión de  Proyectos', 7, 8),
(364, 'Automatización de  Procesos de  Manufactura', 7, 8),
(365, 'Diseño para  Manufactura', 7, 8),
(366, 'Circuitos Hidráulicos y  Nuemáticos', 7, 8),
(367, 'Diseño Asistido por  Computadora', 7, 9),
(368, 'Diseño del Producto', 7, 9),
(369, 'Diseño de Sistemas  de Manufactura', 7, 9),
(370, 'Manufactura Asistida  por Computadora', 7, 9),
(371, 'Cálculo Diferencial', 8, 1),
(372, 'Química', 8, 1),
(373, 'Taller de Ética', 8, 1),
(374, 'Dibujo Asistido por Computadora', 8, 1),
(375, 'Metrología y Normalización', 8, 1),
(376, 'Fundamentos de Investigación', 8, 1),
(377, 'Cálculo Integral', 8, 2),
(378, 'Álgebra Lineal', 8, 2),
(379, 'Ciencia e Ingeniería de los Materiales', 8, 2),
(380, 'Programación Básica', 8, 2),
(381, 'Estadística y Control de Calidad', 8, 2),
(382, 'Administración y Contabilidad', 8, 2),
(383, 'Cálculo Vectorial', 8, 3),
(384, 'Procesos de Fabricación', 8, 3),
(385, 'Electromagnetismo', 8, 3),
(386, 'Estadística', 8, 3),
(387, 'Métodos Numéricos', 8, 3),
(388, 'Desarrollo Sustentable', 8, 3),
(389, 'Ecuaciones Diferenciales', 8, 4),
(390, 'Dinámica', 8, 4),
(391, 'Análisis de Circuitos Eléctricos', 8, 4),
(392, 'Mecánica de Materiales', 8, 4),
(393, 'Fundamentos de Termodinámica', 8, 4),
(394, 'Taller de Investigación I', 8, 4),
(395, 'Máquinas Eléctricas', 8, 5),
(396, 'Mecanismos', 8, 5),
(397, 'Electrónica Analógica', 8, 5),
(398, 'Análisis de Fluidos', 8, 5),
(399, 'Programación Avanzada', 8, 5),
(400, 'Taller de Investigación II', 8, 5),
(402, 'Electrónica de Potencia Aplicada', 8, 6),
(403, 'Vibraciones Mecánicas', 8, 6),
(404, 'Diseño de Elementos Mecánicos', 8, 6),
(405, 'Electrónica Digital', 8, 6),
(406, 'Instrumentación', 8, 6),
(407, 'Administración del Mantenimiento', 8, 6),
(408, 'Dinámica de Sistemas', 8, 7),
(409, 'Manufactura Avanzada', 8, 7),
(410, 'Circuitos Hidráulicos y Neumáticos', 8, 7),
(411, 'Mantenimiento', 8, 7),
(412, 'Microcontroladores', 8, 7),
(413, 'Diseño Asistido por Computadora', 8, 7),
(414, 'Control', 8, 8),
(415, 'Formulación y Evaluación de Proyectos', 8, 8),
(416, 'Controladores Lógicos Programables', 8, 8),
(417, 'Sistemas Avanzados de Manufactura', 8, 8),
(418, 'Redes Industriales', 8, 8),
(419, 'Robótica', 8, 9),
(420, 'Tópicos Selectos de la Automatización Industrial', 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_22_012813_create_permission_tables', 1),
(6, '2021_08_22_020736_create_blogs_table', 1),
(7, '2023_01_07_072042_create_carreras_table', 2),
(8, '2023_01_07_072124_create_semestres_table', 3),
(9, '2023_01_12_052959_create_maestros_table', 4),
(10, '2023_01_14_214503_create_año_semestres_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 6),
(5, 'App\\Models\\User', 8),
(5, 'App\\Models\\User', 76),
(5, 'App\\Models\\User', 77),
(5, 'App\\Models\\User', 84),
(5, 'App\\Models\\User', 85),
(5, 'App\\Models\\User', 86),
(7, 'App\\Models\\User', 5),
(7, 'App\\Models\\User', 9),
(7, 'App\\Models\\User', 10),
(7, 'App\\Models\\User', 11),
(7, 'App\\Models\\User', 12),
(7, 'App\\Models\\User', 13),
(7, 'App\\Models\\User', 14),
(7, 'App\\Models\\User', 15),
(7, 'App\\Models\\User', 16),
(7, 'App\\Models\\User', 17),
(7, 'App\\Models\\User', 18),
(7, 'App\\Models\\User', 19),
(7, 'App\\Models\\User', 20),
(7, 'App\\Models\\User', 21),
(7, 'App\\Models\\User', 22),
(7, 'App\\Models\\User', 23),
(7, 'App\\Models\\User', 24),
(7, 'App\\Models\\User', 25),
(7, 'App\\Models\\User', 26),
(7, 'App\\Models\\User', 27),
(7, 'App\\Models\\User', 28),
(7, 'App\\Models\\User', 29),
(7, 'App\\Models\\User', 30),
(7, 'App\\Models\\User', 31),
(7, 'App\\Models\\User', 32),
(7, 'App\\Models\\User', 33),
(7, 'App\\Models\\User', 34),
(7, 'App\\Models\\User', 35),
(7, 'App\\Models\\User', 36),
(7, 'App\\Models\\User', 37),
(7, 'App\\Models\\User', 38),
(7, 'App\\Models\\User', 39),
(7, 'App\\Models\\User', 40),
(7, 'App\\Models\\User', 41),
(7, 'App\\Models\\User', 42),
(7, 'App\\Models\\User', 43),
(7, 'App\\Models\\User', 44),
(7, 'App\\Models\\User', 45),
(7, 'App\\Models\\User', 46),
(7, 'App\\Models\\User', 47),
(7, 'App\\Models\\User', 48),
(7, 'App\\Models\\User', 50),
(7, 'App\\Models\\User', 51),
(7, 'App\\Models\\User', 52),
(7, 'App\\Models\\User', 53),
(7, 'App\\Models\\User', 54),
(7, 'App\\Models\\User', 55),
(7, 'App\\Models\\User', 56),
(7, 'App\\Models\\User', 57),
(7, 'App\\Models\\User', 58),
(7, 'App\\Models\\User', 59),
(7, 'App\\Models\\User', 60),
(7, 'App\\Models\\User', 61),
(7, 'App\\Models\\User', 62),
(7, 'App\\Models\\User', 63),
(7, 'App\\Models\\User', 64),
(7, 'App\\Models\\User', 65),
(7, 'App\\Models\\User', 66),
(7, 'App\\Models\\User', 67),
(7, 'App\\Models\\User', 68),
(7, 'App\\Models\\User', 69),
(7, 'App\\Models\\User', 70),
(7, 'App\\Models\\User', 71),
(7, 'App\\Models\\User', 72),
(7, 'App\\Models\\User', 73),
(7, 'App\\Models\\User', 74),
(7, 'App\\Models\\User', 75),
(8, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ver-rol', 'web', '2022-11-25 13:55:58', '2022-11-25 13:55:58'),
(2, 'crear-rol', 'web', '2022-11-25 13:55:58', '2022-11-25 13:55:58'),
(3, 'editar-rol', 'web', '2022-11-25 13:55:58', '2022-11-25 13:55:58'),
(4, 'borrar-rol', 'web', '2022-11-25 13:55:58', '2022-11-25 13:55:58'),
(5, 'ver-blog', 'web', '2022-11-25 13:55:58', '2022-11-25 13:55:58'),
(6, 'crear-blog', 'web', '2022-11-25 13:55:58', '2022-11-25 13:55:58'),
(7, 'editar-blog', 'web', '2022-11-25 13:55:58', '2022-11-25 13:55:58'),
(8, 'borrar-blog', 'web', '2022-11-25 13:55:58', '2022-11-25 13:55:58'),
(9, 'Alumno-rol', 'web', '2023-01-13 02:10:58', '2023-01-13 02:10:58'),
(10, 'Maestro-rol', 'web', '2023-01-15 05:26:58', '2023-01-15 05:26:58'),
(11, 'Administrador-rol', 'web', '2023-04-25 01:16:18', '2023-04-25 01:16:18'),
(12, 'gestionar-propia-calificacion', 'web', '2023-04-25 10:39:17', '2023-04-25 10:39:17'),
(13, 'ver-calificaciones', 'web', '2023-04-25 10:57:25', '2023-04-25 10:57:25'),
(14, 'ver-maestros', 'web', '2023-04-25 10:57:33', '2023-04-25 10:57:33'),
(15, 'ver-materias', 'web', '2023-04-25 10:57:46', '2023-04-25 10:57:46'),
(16, 'agregar-calificacion', 'web', '2023-04-25 11:00:57', '2023-04-25 11:00:57'),
(17, 'editar-calificacion', 'web', '2023-04-25 11:01:20', '2023-04-25 11:01:20'),
(18, 'borrar-calificacion', 'web', '2023-04-25 11:01:42', '2023-04-25 11:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'Alumno', 'web', '2023-01-16 18:52:53', '2023-01-16 18:52:53'),
(7, 'Maestro', 'web', '2023-01-16 18:53:11', '2023-01-16 18:53:11'),
(8, 'Administrador', 'web', '2023-01-16 18:53:59', '2023-01-16 18:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 7),
(1, 8),
(2, 5),
(2, 7),
(2, 8),
(3, 5),
(3, 7),
(3, 8),
(4, 5),
(4, 7),
(4, 8),
(5, 8),
(6, 8),
(7, 8),
(8, 8),
(9, 5),
(10, 7),
(11, 8),
(13, 5),
(13, 7),
(13, 8),
(14, 7),
(14, 8),
(15, 7),
(15, 8),
(16, 5),
(16, 7),
(16, 8),
(17, 5),
(17, 7),
(17, 8),
(18, 5),
(18, 7),
(18, 8);

-- --------------------------------------------------------

--
-- Table structure for table `semestres`
--

CREATE TABLE `semestres` (
  `IdSemestres` bigint(20) UNSIGNED NOT NULL,
  `Semestre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semestres`
--

INSERT INTO `semestres` (`IdSemestres`, `Semestre`) VALUES
(1, '1er Semestre'),
(2, '2do Semestre'),
(3, '3er Semestre'),
(4, '4to Semestre'),
(5, '5to Semestre'),
(6, '6to Semestre'),
(7, '7mo Semestre'),
(8, '8vo Semestre');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jesus', 'admin@admin.com', NULL, '$2y$10$3FdDPsR9suStXWkL0vUtn.ao1/gok.EPytZSFamNKVG7LFL2MfNrG', NULL, '2023-01-16 10:24:40', '2023-04-19 19:56:32'),
(2, 'jesus', 'jesus@tec.com.mx', NULL, '$2y$10$B9y/HrFxkRXdzwpW7ttPBumiBotIi6wicWu5pWnDpjwoCuGjaz1D6', NULL, '2023-01-16 12:08:55', '2023-01-16 12:08:55'),
(4, 'Pepito', 'pepito@tec.com.mx', NULL, '$2y$10$jbb4lGKVQm75CKAnoAQsQ.tYiEEZSUN.8BSR9/uyweM1azZkP9/Te', NULL, '2023-02-11 05:05:34', '2023-02-11 05:05:34'),
(5, 'Homero', 'homero@tec.com.mx', NULL, '$2y$10$Y5p4D1fBZIwOR1BkMaEzFOkGwTFkq0zAIc6muUSgaUKLu0LNquOmC', NULL, '2023-04-14 08:57:48', '2023-04-14 08:57:48'),
(6, 'Abril Mejia Rangel', 'avril.rock1471@gmail.com', NULL, '$2y$10$69.oEaVical94wTOiitZreLcogr9p2fsFCAs6mY3JKG03OjB8wkH.', NULL, '2023-04-18 14:12:53', '2023-04-18 14:12:53'),
(8, 'Luis', 'luis19@outlook.com', NULL, '$2y$10$JAW599bfQVaPUVQM80VPSei8T/udKCfu8nZn66AM48mPsSKbw3xwO', NULL, '2023-04-20 02:19:45', '2023-04-20 02:19:45'),
(9, 'Aguilar Covarrubias Norma Aracely', 'norma.ac@tec.com.mx', NULL, '$2y$10$yF83Nw24SfvfW1dijdDdDuXp1rHnLQrCsGNGbqchCFbzn6Rl9Bxw6', NULL, '2023-04-22 15:25:25', '2023-04-22 15:25:25'),
(10, 'Aguilera Mancilla Héctor', 'hector.am@tec.com.mx', NULL, '$2y$10$WpkOAmn18O3FkcEuYgOeZOPA8rNUJMUQKlkeVQ2VIHCExfQDjAYta', NULL, '2023-04-22 15:26:28', '2023-04-22 15:26:28'),
(11, 'Aldape Suárez Miguel', 'miguel.as@tec.com.mx', NULL, '$2y$10$sQHN0vr9S.4s2y4zF2TonObQO7fgxOy/3fEpfI5daQWa86Z2p6MJ.', NULL, '2023-04-22 15:27:54', '2023-04-22 15:27:54'),
(12, 'Aranda Alarcón Graciela', 'graciela.aa@tec.com.mx', NULL, '$2y$10$.rNycZ3X1JTli9NIlIrjouyBFeR0knp6jEVUZGMwO/vxvd524nYX2', NULL, '2023-04-22 15:28:44', '2023-04-22 15:28:44'),
(13, 'Asís Cipriano Karime', 'karime.ac@tec.com.mx', NULL, '$2y$10$D6J4/P.S/Ue8Ns6E57rf4.b40NHuPvs0s7JhyGdeyDrcS/K0L9tnC', NULL, '2023-04-22 15:29:37', '2023-04-22 15:29:37'),
(14, 'Baltierra Costeira Gabriela', 'gabriela.bc@tec.com.mx', NULL, '$2y$10$PIAJtgyC4h/Wlf4hMnx7J.OxNYh4fUHduui4vZbe0GN5qciaE/Rny', NULL, '2023-04-22 15:30:43', '2023-04-22 15:30:43'),
(15, 'Botello Reyes Mario Alan', 'mario.alan.br@tec.com.mx', NULL, '$2y$10$xSNVbi.VnHWrSpuD04oUs.hxV6TxJSY/dPrkbORKomK1uvt4dblOu', NULL, '2023-04-22 15:32:41', '2023-04-22 15:32:41'),
(16, 'Coronado Ríos Reyes', 'reyes.cr@tec.com.mx', NULL, '$2y$10$I/nqZk8Y9JzLoWRRrM2O7eiSzFzEiIPppdWCKvkY6Zjtr.j6G25gW', NULL, '2023-04-22 15:34:49', '2023-04-22 15:34:49'),
(17, 'Cortes Guerrero David', 'david.cg@tec.com.mx', NULL, '$2y$10$93Vw05zC.U8nX6QlIJmykO0KMBvWCb88LPrK6EPqtrm0Nn4kZpsUO', NULL, '2023-04-22 15:36:32', '2023-04-22 15:36:32'),
(18, 'Cortez Del Valle Homero', 'homero.cdelv@tec.com.mx', NULL, '$2y$10$qWOGdCDsJEcZh/6zFogeHexEOl13CBzRxd.qUfSNlDxDN9gs9LqWC', NULL, '2023-04-22 15:39:15', '2023-04-22 15:39:15'),
(19, 'De Hoyos Valdés Jaime', 'jaime.hv@tec.com.mx', NULL, '$2y$10$TubemhR7vuvEz2.5RD2V7eG2HO5GLbRulsgAILet3GfsxQLrDmwuG', NULL, '2023-04-22 15:41:12', '2023-04-22 15:41:12'),
(20, 'De Los Santos Flores Hugo Alberto', 'hugo.alberto.sf@tec.com.mx', NULL, '$2y$10$0IUwmcnr.64wC1Kpl8Vje.4DPCsXXnBvzNg/g.HvtBmmUNdBiHgf.', NULL, '2023-04-22 15:41:52', '2023-04-22 15:41:52'),
(21, 'Díaz Blanco Deniss Itzhel', 'itzhel.deniss.db@tec.com.mx', NULL, '$2y$10$UTJgLEQxNvBxP1l0GbVpI.TAa2MlZNyATxlOu/ERr32O80gJPoXc2', NULL, '2023-04-22 15:44:34', '2023-04-22 15:44:34'),
(22, 'Díaz Menchaca José Raúl', 'jose.raul.dm@tec.com.mx', NULL, '$2y$10$1F1T0lU3l/Oj2v6vGLpc0etLT36EogKigZAetz6Ohme3EoCdem836', NULL, '2023-04-22 15:45:12', '2023-04-22 15:45:12'),
(23, 'Duarte Sánchez Ricardo Fidel', 'fidel.ricardo.ds@tec.com.mx', NULL, '$2y$10$upICSoAO7yLKtf514yBPkOW4INLkgZmuRRHLvQDumpSmUgSzj0rvG', NULL, '2023-04-22 15:45:56', '2023-04-22 15:45:56'),
(24, 'Escoto Sánchez Héctor Javier', 'hector.javier.es@tec.com.mx', NULL, '$2y$10$.KPUyNvc2hDElxgVh1x8vOEYVKL9IudLDOM7ZR2fvaOiCcvOl8UX.', NULL, '2023-04-22 15:46:39', '2023-04-22 15:46:39'),
(25, 'Flores Flores Irasema', 'irasema.flores@tec.com.mx', NULL, '$2y$10$EhQfLTRUxwCOmoibDW/Exu62amQGLRTVi6Y.EFsOEWG8i.FOBfxjy', NULL, '2023-04-22 15:47:16', '2023-04-22 15:47:16'),
(26, 'Flores Peña Enrique', 'enrique.fp@tec.com.mx', NULL, '$2y$10$J08dc8CFYLE/MaCy.r4OEODm1a/af.D/MnQNQvJLl8Xsv7dAWKQlG', NULL, '2023-04-22 15:49:13', '2023-04-22 15:49:13'),
(27, 'Franco Cuellar Mónica Patricia', 'monica.patricia.fc@tec.com.mx', NULL, '$2y$10$g.67RtlxhGLM72Ehruo3M./rPWjlFT4uYkkGN7SjZDThG5MPFmoeO', NULL, '2023-04-22 15:50:24', '2023-04-22 15:50:24'),
(28, 'Fuentes Puente Edna Marcela', 'edna.marcela.fp@tec.com.mx', NULL, '$2y$10$GjRj3yjYVTfrBYcxvETPAO8x20TUQHLP1FoLwrjPGRYZ3bwTRU0Ja', NULL, '2023-04-22 15:51:23', '2023-04-22 15:51:23'),
(29, 'Garcia Vazquez Victor Alfonso', 'victor.alfonso.gv@tec.com.mx', NULL, '$2y$10$YvyarOdvsbT4eVVgWq1NKuIQMcP4PZ6q19SNQOVM3pDuG8MTUgLl.', NULL, '2023-04-22 15:52:04', '2023-04-22 15:52:04'),
(30, 'Garcia Plata Maria Antonieta', 'antonieta.maria.gp@tec.com.mx', NULL, '$2y$10$zCm10h41OxcRdeRCuNpDVexnLKqLa0KGUZADAKbNJX.S1dU0U0S.6', NULL, '2023-04-22 15:53:12', '2023-04-22 15:53:12'),
(31, 'González Escobedo Carmina', 'carmina.ge@tec.com.mx', NULL, '$2y$10$nR2n6OnLQO/0iEVyPyokb.sSKsCTP2ADN1cF1eh7jJ1jGA112f1qS', NULL, '2023-04-22 15:53:44', '2023-04-22 15:53:44'),
(32, 'González Puente Isaac', 'isaac.gp@tec.com.mx', NULL, '$2y$10$BfpjV6ipgUuJGg5BoWUcrO34G0u0qGHp7iMyIeMVhD1819SGzyPqa', NULL, '2023-04-22 15:54:49', '2023-04-22 15:54:49'),
(33, 'González Puente Zaida Aydeé', 'zaida.aydee.gp@tec.com.mx', NULL, '$2y$10$.zU6/MZhy1Rks5vrIm4.VuOWqqPi3rPlr3McEq6PS7.38rjeiY6CS', NULL, '2023-04-22 15:55:58', '2023-04-22 15:55:58'),
(34, 'Gonzalez Rodriguez Laura Elena', 'laura.elena.gr@tec.com.mx', NULL, '$2y$10$EfZZu53n4DZ6KPwQx6S70Op4tOOpN9hZU7wYie1kdCJsXGQtPQYyO', NULL, '2023-04-22 15:56:42', '2023-04-22 15:56:42'),
(35, 'González Treviño Gibran Jalil', 'gilbran.jalil.gt@tec.com.mx', NULL, '$2y$10$PFGM7X7IPU/SK8d.VNX6UOjibRxKUGj6rgTdznHnaV7TTvpCx64UC', NULL, '2023-04-22 15:57:17', '2023-04-22 15:57:17'),
(36, 'González Zamarripa Gregorio', 'gregorio.gz@tec.com.mx', NULL, '$2y$10$Z6wPX.4l50UQFoZA0KM/t.IKn/2TxRKZKNjgBj4RydMryd24vQnpS', NULL, '2023-04-22 16:00:29', '2023-04-22 16:00:29'),
(37, 'Hernández Córdova Adriana', 'adriana.hc@tec.com.mx', NULL, '$2y$10$PoCcQrAToUd9ASMRggW1xOSFiqerXYD.BvxJQyHlg3r3SI3WVC/jK', NULL, '2023-04-22 16:06:31', '2023-04-22 16:06:31'),
(38, 'Hernandez Rodriguez Héctor', 'hector.hr@tec.com.mx', NULL, '$2y$10$fP5eE6dTQ5LYLehaa1Bk3uT7PsnAeK35FJuDi/L.oNtRHgkhZF5YG', NULL, '2023-04-22 16:07:55', '2023-04-22 16:07:55'),
(39, 'Hernändez Treviño José Mario', 'jose.mario.ht@tec.com.mx', NULL, '$2y$10$rvVlLTMZkFLckpIRxfcAde5jTzIRhwXB0KqPLqdaz9pXcRMtyw2JS', NULL, '2023-04-22 16:14:51', '2023-04-22 16:14:51'),
(40, 'Herrera Valdez Ernesto', 'ernesto.hv@tec.com.mx', NULL, '$2y$10$6MO7cUJAlUMIIZDrrjyM4ugm6zwa4FnETt4JAepg6CPy8.u5JYJjq', NULL, '2023-04-22 16:15:30', '2023-04-22 16:15:30'),
(41, 'Jasso Ibarra Sandra Lilia', 'sandra.lilia.ji@tec.com.mx', NULL, '$2y$10$JJRq1TcXT7HLGUm7o4e3tuubIocPb8AwT.LV/OCRyBsz24dvw9Wbe', NULL, '2023-04-22 16:16:42', '2023-04-22 16:16:42'),
(42, 'Jiménez Zavala Felipe', 'felipe.jz@tec.com.mx', NULL, '$2y$10$pBd47WZRCN8vENv5FAvImOBRJTOPPErAy6m61lZzHTGcxlQo63PCe', NULL, '2023-04-22 16:17:26', '2023-04-22 16:17:26'),
(43, 'Jordán Marmolejo Luís Gerardo', 'luis.gerardo.jm@tec.com.mx', NULL, '$2y$10$6yvliydvrWLDLKyccKyGGO2PYjWVHmwDhIa/i8AlBjLb1/Pf60S1W', NULL, '2023-04-22 16:20:28', '2023-04-22 16:20:28'),
(44, 'López Cepeda Jonathan', 'joanathan.lc@tec.com.mx', NULL, '$2y$10$fnZVnibMyR6TcdgXy1FvOe5zJ1W1OQ0D0Ekbd2GKSqpNIC77Cdu3O', NULL, '2023-04-22 16:21:33', '2023-04-22 16:21:33'),
(45, 'Martínez Flores Rocío', 'rocio.mf@tec.com.mx', NULL, '$2y$10$JNb25tOgerFVB4bZAASTIeDmDPh2S4zbKAZOOxGdVGvs4/QOphpay', NULL, '2023-04-22 16:23:15', '2023-04-22 16:23:15'),
(46, 'Martínez García Ruth Margarita', 'ruth.margarita.mg@tec.com.mx', NULL, '$2y$10$4YTuv0O3p9RGomEwvbMvz.IHwUOUhg.IBJv3brzCicgY.h.0ZB/HG', NULL, '2023-04-22 16:28:03', '2023-04-22 16:28:03'),
(47, 'Martínez Narvaez Jorge Alberto', 'jorge.alberto.mn@tec.com.mx', NULL, '$2y$10$6el6CSYQ.o862URS9YPb4O/NQuI/PGQQdr/aswCppHzaSOfNDwE7y', NULL, '2023-04-22 16:28:50', '2023-04-22 16:28:50'),
(48, 'Martinez Campos Javier', 'javier.mc@tec.com.mx', NULL, '$2y$10$ZqETEmUjy0LyNo3kg7BTqek2t3tjVF.prg/9oVvjZhuDhGKxJ06Y6', NULL, '2023-04-22 16:29:43', '2023-04-22 16:29:43'),
(50, 'Martínez Vela Verónica', 'veronica.mv@tec.com.mx', NULL, '$2y$10$55Jeu.qrosgUL9EqQQWDXOUgyMij9ahdBiycoOTf9kqMX8UXzUYO6', NULL, '2023-04-22 16:30:56', '2023-04-22 16:30:56'),
(51, 'Medina Guzmán Laura', 'laura.mg@tec.com.mx', NULL, '$2y$10$fO9PsZ6V6t63T3Us8HLPVeYObWhqxiIzVglhwAjPVZ8gt0ZnAdt5K', NULL, '2023-04-22 16:31:55', '2023-04-22 16:31:55'),
(52, 'Meléndez López Edith Margot', 'edith.margot.ml@tec.com.mx', NULL, '$2y$10$7TNgNPvq8eXWzN5R1zHGv.9BzpuL1igKd3NRjQqMcrykYf0Gs1QQu', NULL, '2023-04-22 16:32:53', '2023-04-22 16:32:53'),
(53, 'Morales Medina José Luís', 'jose.luis.mm@tec.com.mx', NULL, '$2y$10$PRrW9xPwWFv0aedcCFwLHum7Q2gJoR91p.7MRCzZQASRHg84K7.Bi', NULL, '2023-04-22 16:35:47', '2023-04-22 16:35:47'),
(54, 'Morte Real Lorena', 'lorena.mr@tec.com.mx', NULL, '$2y$10$Q/t2nwE4gOE38Ix5TzwYmu6L6iOU6MQeQtHSGd8oniPecWKU09wL.', NULL, '2023-04-22 16:36:19', '2023-04-22 16:36:19'),
(55, 'Moreno Rodriguez Jairo Cristopher Hassan', 'cris.hassan.mrj@tec.com.mx', NULL, '$2y$10$pVklZewN3pC3RmmoZ3.1suj4/tSA.GMQTBLIl961rYTVzwkKlSFuK', NULL, '2023-04-22 16:37:38', '2023-04-22 16:37:38'),
(56, 'Narváez García Francisco Javier', 'francisco.javier.ng@tec.com.mx', NULL, '$2y$10$31lx9ipoiJW5vS6A5FkL4.npUwwFF/VCwP4LevUoTzKlQkLLW6E8y', NULL, '2023-04-22 16:38:36', '2023-04-22 16:38:36'),
(57, 'Olvera Pecina Ismael', 'ismael.op@tec.com.mx', NULL, '$2y$10$/I.1Tyry6yXbiOxOINZ7YeOR7PTe1Z59LjTwjP7VOvdXIP52cyorG', NULL, '2023-04-22 16:39:10', '2023-04-22 16:39:10'),
(58, 'Ortiz Valdez Andres Eduardo', 'andres.eduardo.ov@tec.com.mx', NULL, '$2y$10$85kncIodyY/HXEhbBeobd.wkhsn2uLli6W8iuwdaMIwZXBW3ME3PK', NULL, '2023-04-22 16:41:16', '2023-04-22 16:41:16'),
(59, 'Picazo Rodríguez Nallely Guadalupe', 'nallely.guadalupe.pr@tec.com.mx', NULL, '$2y$10$gSq1q2uLTFPCIPtx.VhiUeglyDZQRQEZ6C/LBRgl797L53DhcZ2Q2', NULL, '2023-04-22 16:42:07', '2023-04-22 16:42:07'),
(60, 'Ramos Arellano Juan de Dios', 'juan.ra@tec.com.mx', NULL, '$2y$10$S9Xn5/svzRkD.Pgz309dDeJ/eDDgNsuxpCedrdBaUzB8YGENQcaWq', NULL, '2023-04-22 16:42:49', '2023-04-22 16:42:49'),
(61, 'Razo Vazquez Axel Sebastian', 'ax.sebastian.rv@tec.com.mx', NULL, '$2y$10$B9UEubypUzs7PfC5x63Ose27RsiAquEM0r4r1rYsLUImDisrbJV16', NULL, '2023-04-22 16:44:49', '2023-04-22 16:44:49'),
(62, 'Renteria Avilez Martha Elena', 'martha.elena.ra@tec.com.mx', NULL, '$2y$10$d99Wk46VMUnSWHtCzmjPRu/er57TSMz1SGWUbLvX84n/1I02W0VyK', NULL, '2023-04-22 16:45:36', '2023-04-22 16:45:36'),
(63, 'Riojas Rodríguez Guillermo', 'guillermo.rdgz@tec.com.mx', NULL, '$2y$10$3qmNIlm/1iT12b8vllEdxuJ932Gnv0hnpXAng6LhL9tPPCRyI4Gmi', NULL, '2023-04-22 16:47:18', '2023-04-22 16:47:18'),
(64, 'Riojas Rodríguez Rubén Miguel', 'ruben.miguel.rdgz@tec.com.mx', NULL, '$2y$10$Jok/.lq1H1AmeeOBH1I3cewiPHLQGCw0TjsuQo5EqCA2H1eSS.qWS', NULL, '2023-04-22 16:48:05', '2023-04-22 16:48:05'),
(65, 'Rivas Aguilar Antonio', 'antonio.ra@tec.com.mx', NULL, '$2y$10$MRmPV9tqTGQQek1MbXJ6DuFIqDaaDhFRQlQFiD7hkTuWYeJ2M.Hki', NULL, '2023-04-22 16:49:50', '2023-04-22 16:49:50'),
(66, 'Rodríguez Campos Alejandro', 'alejandro.rc@tec.com.mx', NULL, '$2y$10$xCgzfvp4UkFzgAdpKROGaOzncl9DoqnD9DwJ6iiuQgr/V6tvPyiPe', NULL, '2023-04-22 16:50:35', '2023-04-22 16:50:35'),
(67, 'Rodríguez Campos Claudia', 'claudia.rc@tec.com.mx', NULL, '$2y$10$nyywI1a7ckV9r8RKxdKyjuxoPhN2thX9a.7fH/FemuQpkXXtSUyXK', NULL, '2023-04-22 16:51:20', '2023-04-22 16:51:20'),
(68, 'Romero Peña Jesús Manuel', 'manuel.jesus.rp@tec.com.mx', NULL, '$2y$10$Qrjk8JCKCBCAOb7lJWt5V.vzQ6FwLS8ArtjNXwaQteTwa3VsKLq7m', NULL, '2023-04-22 16:53:54', '2023-04-22 16:53:54'),
(69, 'Salas Torres Luis Horacio', 'luis.horacio.st@tec.com.mx', NULL, '$2y$10$fm5O8bPgtMHKlbnXWgS5C.1eoCwyHeTQNZ5ztq3wLXXPbxCllfCrG', NULL, '2023-04-22 16:54:38', '2023-04-22 16:54:38'),
(70, 'Sánchez Esquivel César', 'cesar.se@tec.com.mx', NULL, '$2y$10$Cd9QIUZmUBQNLSCZBYsuDuox/zrqEvMvUwLzpP.babSHZO3ns7uo.', NULL, '2023-04-22 16:58:05', '2023-04-22 16:58:05'),
(71, 'Sánchez Hernández Raúl de Jesús', 'raul.jesus.sh@tec.com.mx', NULL, '$2y$10$P.0qeZSvcAgxXyAtZm4wbeycXLVsJfhRZF8e4aOk/qK5/gFq8Cagy', NULL, '2023-04-22 16:58:45', '2023-04-22 16:58:45'),
(72, 'Sánchez Montemayor Jesús', 'jesus.sm@tec.com.mx', NULL, '$2y$10$I2gH3NFg39oHJgjtAqRIvewoIZeAdmjTOdKEjjHVwihxHEa.pKFei', NULL, '2023-04-22 16:59:20', '2023-04-22 16:59:20'),
(73, 'Sánchez Uribe Jesus Adolfo', 'jesus.adolf.su@tec.com.mx', NULL, '$2y$10$eeJm8MpAboK4jaVI.R.GcOMREDhZ2lsCj1/6AFc6XwohJGz/7lpJ2', NULL, '2023-04-22 17:00:02', '2023-04-22 17:00:02'),
(74, 'Valadez Zamarron Mayela del Carmen', 'maye.carmen.vz@tec.com.mx', NULL, '$2y$10$o4OfkaD.1AMsSGK7jaNcaOPjTNdq4e905LZHiVQuQVfzivnb4MRii', NULL, '2023-04-22 17:00:34', '2023-04-22 17:00:34'),
(75, 'Zertuche Zuñiga Homero', 'homero.z@tec.com.mx', NULL, '$2y$10$izvLOHkqGn0RIpe.r.J1TucBPZOvH2z5tDGbf80ShJVyUJm4KRSGK', NULL, '2023-04-22 17:01:20', '2023-04-22 17:01:20'),
(76, 'Pancho', 'pancho@tec.com.mx', NULL, '$2y$10$BWxcgMTSxzjBQe0pXurLcOKSuVYmPpoZVOqsmN4ObiIuJ6tOdh2LG', NULL, '2023-07-04 11:26:53', '2023-07-04 11:27:38'),
(77, 'Jose Luis', 'jose@tec.com.mx', NULL, '$2y$10$kbkgKpE6zoIMQJj356t3Ue/pfxa9IY0oxUht7SQuAf.s8MHiX3rSe', NULL, '2023-07-28 13:39:10', '2023-07-28 13:39:10'),
(85, 'Jonathan', 'jonathan@tec.com.mx', NULL, '$2y$10$i/bu6/n50imOM38xoeFNfuhiJKcWcM8iM05hp2ZIKWNIAOSJ1Xweu', NULL, '2023-07-29 06:18:32', '2023-07-29 06:18:32'),
(86, 'Berenice Sanchez', 'bere@tec.com.mx', NULL, '$2y$10$5eJzzsuWEv9KVA9zyJZEcewf4XucgjRFgM/KTRruUNymduiJnyheq', NULL, '2023-08-17 22:33:09', '2023-08-17 22:33:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`IdAlumnos`);

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
-- Indexes for table `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archivos_alumno_id_foreign` (`Alumno_id`);

--
-- Indexes for table `año_semestres`
--
ALTER TABLE `año_semestres`
  ADD PRIMARY KEY (`IdAño_semestres`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calificacions`
--
ALTER TABLE `calificacions`
  ADD PRIMARY KEY (`IdCalificacions`),
  ADD KEY `calificacions_alumno_id_foreign` (`Alumno_id`),
  ADD KEY `calificacions_carrera_id_foreign` (`Carrera_id`),
  ADD KEY `calificacions_materia_id_foreign` (`Materia_id`);

--
-- Indexes for table `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`IdCarreras`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `formatoanexo14`
--
ALTER TABLE `formatoanexo14`
  ADD PRIMARY KEY (`IdFormato14`) USING BTREE,
  ADD KEY `formatoanexo14_alumno_id_foreign` (`Alumno_id`),
  ADD KEY `formatoanexo14_carrera_id_foreign` (`Carrera_id`),
  ADD KEY `formatoanexo14_semestre_id_foreign` (`Semestre_id`),
  ADD KEY `formatoanexo14_materia_id_foreign` (`Materia_id`);

--
-- Indexes for table `formatoanexo19`
--
ALTER TABLE `formatoanexo19`
  ADD PRIMARY KEY (`IdFormatoAnexo19`),
  ADD KEY `formatoanexo19_alumno_id_foreign` (`Alumno`),
  ADD KEY `formatoanexo19_carrera_id_foreign` (`Carrera`),
  ADD KEY `formatoanexo19_materia_id_foreign` (`Materia`);

--
-- Indexes for table `formatoanexomensual19`
--
ALTER TABLE `formatoanexomensual19`
  ADD PRIMARY KEY (`Alumno_id`),
  ADD KEY `formatoanexoMensual19_alumno_id_foreign` (`NombreAlumno`),
  ADD KEY `formatoanexoMensual19_carrera_id_foreign` (`NombreCarrera`),
  ADD KEY `formatoanexoMensual19_materia_id_foreign` (`NombreMateria`);

--
-- Indexes for table `formatos`
--
ALTER TABLE `formatos`
  ADD PRIMARY KEY (`IdFormatos`),
  ADD KEY `calificacion_id` (`calificacion_id`);

--
-- Indexes for table `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`IdMaestros`),
  ADD KEY `carrera_id` (`carrera_id`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`IdMaterias`),
  ADD KEY `carrera_id` (`carrera_id`),
  ADD KEY `semestre_id` (`semestre_id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `semestres`
--
ALTER TABLE `semestres`
  ADD PRIMARY KEY (`IdSemestres`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `IdAlumnos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alumno_reprobados`
--
ALTER TABLE `alumno_reprobados`
  MODIFY `IdAlumno_reprobados` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `año_semestres`
--
ALTER TABLE `año_semestres`
  MODIFY `IdAño_semestres` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calificacions`
--
ALTER TABLE `calificacions`
  MODIFY `IdCalificacions` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `carreras`
--
ALTER TABLE `carreras`
  MODIFY `IdCarreras` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formatoanexo14`
--
ALTER TABLE `formatoanexo14`
  MODIFY `IdFormato14` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `formatoanexo19`
--
ALTER TABLE `formatoanexo19`
  MODIFY `IdFormatoAnexo19` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `formatoanexomensual19`
--
ALTER TABLE `formatoanexomensual19`
  MODIFY `Alumno_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `formatos`
--
ALTER TABLE `formatos`
  MODIFY `IdFormatos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `maestros`
--
ALTER TABLE `maestros`
  MODIFY `IdMaestros` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `IdMaterias` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `semestres`
--
ALTER TABLE `semestres`
  MODIFY `IdSemestres` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno_reprobados`
--
ALTER TABLE `alumno_reprobados`
  ADD CONSTRAINT `alumno_reprobados_alumno_id_foreign` FOREIGN KEY (`Alumno_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_año_semestre_id_foreign` FOREIGN KEY (`Año_id`) REFERENCES `año_semestres` (`IdAño_semestres`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_calif_final_id_foreign` FOREIGN KEY (`Calif_Final_id`) REFERENCES `calificacions` (`IdCalificacions`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_maestro_id_foreign` FOREIGN KEY (`Maestro_id`) REFERENCES `calificacions` (`IdCalificacions`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_materia_id_foreign` FOREIGN KEY (`Materia_id`) REFERENCES `materias` (`IdMaterias`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_reprobados_semestre_id_foreign` FOREIGN KEY (`Semestre_id`) REFERENCES `semestres` (`IdSemestres`) ON DELETE CASCADE;

--
-- Constraints for table `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_alumno_id_foreign` FOREIGN KEY (`Alumno_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `calificacions`
--
ALTER TABLE `calificacions`
  ADD CONSTRAINT `calificacions_alumno_id_foreign` FOREIGN KEY (`Alumno_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificacions_carrera_id_foreign` FOREIGN KEY (`Carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `calificacions_materia_id_foreign` FOREIGN KEY (`Materia_id`) REFERENCES `materias` (`IdMaterias`) ON DELETE CASCADE;

--
-- Constraints for table `formatoanexo14`
--
ALTER TABLE `formatoanexo14`
  ADD CONSTRAINT `formatoanexo14_alumno_id_foreign` FOREIGN KEY (`Alumno_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formatoanexo14_carrera_id_foreign` FOREIGN KEY (`Carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `formatoanexo14_materia_id_foreign` FOREIGN KEY (`Materia_id`) REFERENCES `materias` (`IdMaterias`) ON DELETE CASCADE,
  ADD CONSTRAINT `formatoanexo14_semestre_id_foreign` FOREIGN KEY (`Semestre_id`) REFERENCES `semestres` (`IdSemestres`);

--
-- Constraints for table `formatoanexo19`
--
ALTER TABLE `formatoanexo19`
  ADD CONSTRAINT `formatoanexo19_alumno_id_foreign` FOREIGN KEY (`Alumno`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formatoanexo19_carrera_id_foreign	` FOREIGN KEY (`Carrera`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `formatoanexo19_materia_id_foreign` FOREIGN KEY (`Materia`) REFERENCES `materias` (`IdMaterias`) ON DELETE CASCADE;

--
-- Constraints for table `formatoanexomensual19`
--
ALTER TABLE `formatoanexomensual19`
  ADD CONSTRAINT `formatoanexoMensual19_alumno_id_foreign` FOREIGN KEY (`NombreAlumno`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formatoanexoMensual19_carrera_id_foreign	` FOREIGN KEY (`NombreCarrera`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `formatoanexoMensual19_materia_id_foreign` FOREIGN KEY (`NombreMateria`) REFERENCES `materias` (`IdMaterias`) ON DELETE CASCADE;

--
-- Constraints for table `formatos`
--
ALTER TABLE `formatos`
  ADD CONSTRAINT `formatos_calificacion_id` FOREIGN KEY (`calificacion_id`) REFERENCES `calificacions` (`IdCalificacions`) ON DELETE CASCADE;

--
-- Constraints for table `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_carrera_id` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE;

--
-- Constraints for table `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_carrera_id` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE,
  ADD CONSTRAINT `materias_semestre_id` FOREIGN KEY (`semestre_id`) REFERENCES `semestres` (`IdSemestres`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
