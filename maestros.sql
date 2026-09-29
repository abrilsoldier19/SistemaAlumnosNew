-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql209.infinityfree.com
-- Generation Time: Sep 23, 2024 at 02:43 PM
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
-- Table structure for table `maestros`
--

CREATE TABLE `maestros` (
  `IdMaestros` bigint(20) UNSIGNED NOT NULL,
  `NombreMaestro` varchar(255) NOT NULL,
  `Correos` varchar(255) NOT NULL,
  `carrera_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`IdMaestros`),
  ADD KEY `carrera_id` (`carrera_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maestros`
--
ALTER TABLE `maestros`
  MODIFY `IdMaestros` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_carrera_id` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`IdCarreras`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
