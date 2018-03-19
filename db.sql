-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-03-2018 a las 19:36:55
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--
create database proad2
use proad2
DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` varchar(9) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `ApellidoP` varchar(20) DEFAULT NULL,
  `ApellidoM` varchar(20) DEFAULT NULL,
  `Status` enum('activo','inactivo') DEFAULT NULL,
  `id_carrera` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Alumnos_Carreras1` (`id_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance_programatico`
--

DROP TABLE IF EXISTS `avance_programatico`;
CREATE TABLE IF NOT EXISTS `avance_programatico` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_nrc` varchar(11) NOT NULL,
  `id_ciclo` enum('2015A','2016B','2017A','2017B','2018A','2018B') NOT NULL DEFAULT '2018A',
  PRIMARY KEY (`id`),
  KEY `fk_Avance_programatico_Ciclo1` (`id_ciclo`),
  KEY `Avance_programatico_NRC` (`id_nrc`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `avance_programatico`
--

INSERT INTO `avance_programatico` (`id`, `id_nrc`, `id_ciclo`) VALUES
(12, 'gt1', '2018A'),
(13, 'gh56', '2018A'),
(14, 'fr56', '2018A'),
(15, 'ft454', '2018A'),
(16, 'dsad', '2018A'),
(17, '123', '2018A'),
(18, '123', '2018A'),
(19, 'gf54', '2018A'),
(20, 'yf56', '2018A'),
(21, 'yf56', '2018A'),
(22, 'gf56', '2018A'),
(23, 'gf56', '2018A'),
(24, 'gf56', '2018A'),
(25, 'gf56', '2018A'),
(26, 'gf56', '2018A'),
(27, 'gf56', '2018A'),
(28, 'gf56', '2018A'),
(29, 'gf56', '2018A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `siglas` varchar(5) DEFAULT NULL,
  `Status` enum('activo','inactivo') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `Nombre`, `siglas`, `Status`) VALUES
(222, 'Licenciatura en informatica', 'INF', 'activo'),
(231, 'Ingeniería en computación', 'COM', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

DROP TABLE IF EXISTS `ciclo`;
CREATE TABLE IF NOT EXISTS `ciclo` (
  `id` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`id`) VALUES
('2014b'),
('2015a'),
('2015b'),
('2016a'),
('2017b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronograma`
--

DROP TABLE IF EXISTS `cronograma`;
CREATE TABLE IF NOT EXISTS `cronograma` (
  `id` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_ciclo` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Cronograma_Departamentos1` (`id_departamento`),
  KEY `fk_Cronograma_Ciclo1` (`id_ciclo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'desarrollo biotecnologico'),
(2, 'site');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE IF NOT EXISTS `evaluacion` (
  `id` int(11) NOT NULL,
  `fecha_programada` varchar(45) DEFAULT NULL,
  `fecha_real` varchar(45) DEFAULT NULL,
  `id_subtema` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_Evaluacion_Subtemas1` (`id_subtema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

DROP TABLE IF EXISTS `horarios`;
CREATE TABLE IF NOT EXISTS `horarios` (
  `dia` enum('Lunes','Martes','Miercoles','Jueves','Viernes') DEFAULT NULL,
  `hora_inicial` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `id_avance` int(11) UNSIGNED DEFAULT NULL,
  KEY `FK_horario_to_avance` (`id_avance`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `Clave` varchar(8) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Creditos` int(11) DEFAULT NULL,
  `Edificio` enum('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P') DEFAULT NULL,
  `id_avance` int(11) UNSIGNED DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  PRIMARY KEY (`Clave`),
  KEY `fk_Materias_Departamentos1` (`id_departamento`),
  KEY `FK_materia_has_carrera` (`id_carrera`),
  KEY `FK_materia_avance` (`id_avance`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`Clave`, `Nombre`, `Creditos`, `Edificio`, `id_avance`, `id_departamento`, `id_carrera`) VALUES
('123', 'diseÃ±o', 9, 'O', 12, 2, 231),
('1235', 'vfgfdg', 3, 'O', 19, 2, 222),
('3453', '243', 23, 'O', 16, 1, 222),
('43243', 'cfsd', 3, 'O', 15, 2, 222),
('4567', 'yrty', 5, 'N', 20, 1, 222),
('5674', 'redes', 4, 'D', 13, 1, 222),
('5678', 'tret', 4, 'M', 29, 1, 222),
('654', 'ejem', 5, 'N', 14, 1, 222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nrc`
--

DROP TABLE IF EXISTS `nrc`;
CREATE TABLE IF NOT EXISTS `nrc` (
  `id` varchar(11) NOT NULL,
  `id_profesor` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_NRC_Profesores1` (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nrc`
--

INSERT INTO `nrc` (`id`, `id_profesor`) VALUES
('123', '123'),
('dsad', '123'),
('fr56', '123'),
('ft454', '123'),
('gf54', '123'),
('gf56', '123'),
('gh56', '123'),
('gt1', '123'),
('yf56', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

DROP TABLE IF EXISTS `observaciones`;
CREATE TABLE IF NOT EXISTS `observaciones` (
  `id` int(11) NOT NULL,
  `Observacion` varchar(250) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `id_avance` int(11) UNSIGNED NOT NULL,
  `id_profesor` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Observaciones_Avance_programatico1` (`id_avance`),
  KEY `fk_Observaciones_Profesores1` (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE IF NOT EXISTS `profesores` (
  `Codigo` varchar(9) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `ApellidoP` varchar(20) DEFAULT NULL,
  `ApellidoM` varchar(20) DEFAULT NULL,
  `Status` enum('activo','inactivo') DEFAULT NULL,
  `password` blob,
  `sexo` enum('Hombre','Mujer') DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`Codigo`, `Nombre`, `ApellidoP`, `ApellidoM`, `Status`, `password`, `sexo`) VALUES
('123', 'mario', 'hdsakjdh', 'djshfj', 'activo', 0x30522191606e962951423466230f8757, 'Hombre'),
('209437991', 'ruben', 'ramirez', 'briseÃ±o', 'activo', 0x74cb38b9bdcc0793f1818c117613fa79, 'Hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `id` int(11) NOT NULL,
  `id_materia` varchar(8) NOT NULL,
  `id_alumno` varchar(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Registro_Materias1` (`id_materia`),
  KEY `fk_Registro_Alumnos1` (`id_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtemas`
--

DROP TABLE IF EXISTS `subtemas`;
CREATE TABLE IF NOT EXISTS `subtemas` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `fecha_programada` date DEFAULT NULL,
  `fecha_real` date DEFAULT NULL,
  `Actividad` varchar(250) DEFAULT NULL,
  `Recurso` varchar(250) DEFAULT NULL,
  `id_unidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Subtemas_Unidad1` (`id_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subtemas`
--

INSERT INTO `subtemas` (`id`, `Nombre`, `fecha_programada`, `fecha_real`, `Actividad`, `Recurso`, `id_unidad`) VALUES
(2, 'saS', '2018-03-23', '2018-03-16', 'dsad', 'sadas', 3),
(3, 'dsad', '2018-03-15', '2018-03-02', 'asd', 'asdas', 5),
(4, 'sadas', '2018-03-24', '2018-03-01', 'dsad', 'dsad', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

DROP TABLE IF EXISTS `unidades`;
CREATE TABLE IF NOT EXISTS `unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` varchar(8) DEFAULT NULL,
  `Nombre` varchar(75) DEFAULT NULL,
  `Evaluacion_programada` date DEFAULT NULL,
  `Evaluacion_real` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materia_unidad` (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id`, `id_materia`, `Nombre`, `Evaluacion_programada`, `Evaluacion_real`) VALUES
(1, '5674', 'sAS', '2018-02-10', '2018-02-03'),
(2, '5674', 'sAS', '2018-02-10', '2018-02-03'),
(3, '5674', 'czc', '2018-02-16', '2018-02-02'),
(4, '5674', 'dasda', '2018-02-14', '2018-02-16'),
(5, '5674', 'borrar', '2018-02-22', '2018-02-10'),
(6, '5674', 'hghf', '2018-03-17', '2018-03-02');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_Alumnos_Carreras1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `avance_programatico`
--
ALTER TABLE `avance_programatico`
  ADD CONSTRAINT `fk_Avance_programatico_Nrc` FOREIGN KEY (`id_nrc`) REFERENCES `nrc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cronograma`
--
ALTER TABLE `cronograma`
  ADD CONSTRAINT `fk_Cronograma_Ciclo1` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cronograma_Departamentos1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `evaluacion_ibfk_1` FOREIGN KEY (`id_subtema`) REFERENCES `subtemas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `FK_horario_to_avance` FOREIGN KEY (`id_avance`) REFERENCES `avance_programatico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `FK_materia_avance` FOREIGN KEY (`id_avance`) REFERENCES `avance_programatico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_materia_has_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `FK_materia_has_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nrc`
--
ALTER TABLE `nrc`
  ADD CONSTRAINT `fk_NRC_Profesores1` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`id_avance`) REFERENCES `avance_programatico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `observaciones_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`Codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `fk_Registro_Alumnos1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Registro_Materias1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`Clave`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subtemas`
--
ALTER TABLE `subtemas`
  ADD CONSTRAINT `fk_Subtemas_Unidad1` FOREIGN KEY (`id_unidad`) REFERENCES `unidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD CONSTRAINT `materia_unidad` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`Clave`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
