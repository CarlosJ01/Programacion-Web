-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-12-2019 a las 15:11:39
-- Versión del servidor: 10.1.41-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `activosfijos`
--
CREATE DATABASE IF NOT EXISTS `activosfijos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `activosfijos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ACTIVO`
--

DROP TABLE IF EXISTS `ACTIVO`;
CREATE TABLE IF NOT EXISTS `ACTIVO` (
  `ID_ACTIVO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `DESCRIPCION` varchar(45) DEFAULT NULL,
  `CANTIDAD_TOTAL` varchar(45) NOT NULL,
  `CANTIDAD_DISPONIBLE` varchar(45) NOT NULL,
  `FECHA_COMPRA` date NOT NULL,
  `ID_TIPO` int(11) NOT NULL,
  PRIMARY KEY (`ID_ACTIVO`),
  KEY `fk_ACTIVO_TIPO_ACTIVO1_idx` (`ID_TIPO`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ACTIVO`
--

INSERT INTO `ACTIVO` (`ID_ACTIVO`, `NOMBRE`, `DESCRIPCION`, `CANTIDAD_TOTAL`, `CANTIDAD_DISPONIBLE`, `FECHA_COMPRA`, `ID_TIPO`) VALUES
(1, 'Bancas', 'Bancas de madera', '1000', '995', '2019-01-16', 1),
(2, 'Sillas', 'Sillas de plastico', '200', '175', '2019-12-03', 1),
(3, 'Pintarron', 'Pizzarron de plumones blanco, de 10m x 2m', '50', '49', '2019-09-18', 1),
(8, 'Cables HDMI 2.5', 'Cables de tipo HDMI para proyectores y pantal', '1000', '96', '2019-12-03', 7),
(9, 'Cable VGA', 'Cables para proyectores viejos, Azul', '100', '89', '2011-01-04', 7),
(14, 'Imac 27 pulgadas', 'Imac es una computadora para diseño, traen co', '200', '84', '2015-12-10', 2),
(15, 'Cafetera Nescafe', 'Cafetera Dolce Gusto con capsulas ', '1', '0', '2019-12-11', 17),
(16, 'Sillas Plastico', 'Sillas de plastico de una pieza', '100', '20', '2019-12-08', 1),
(17, 'Sillas Madera', 'Sillas de madera antiguas', '10000', '9000', '2019-12-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ADMINISTRADOR`
--

DROP TABLE IF EXISTS `ADMINISTRADOR`;
CREATE TABLE IF NOT EXISTS `ADMINISTRADOR` (
  `USUARIO` varchar(50) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  PRIMARY KEY (`USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ADMINISTRADOR`
--

INSERT INTO `ADMINISTRADOR` (`USUARIO`, `NOMBRE`, `PASSWORD`) VALUES
('Admin', 'Alejandro Garcia', 'root'),
('Admin2', 'Karen Jatziri', 'pass'),
('Conchita', 'Conchita', 'conchita123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ASIGNACION`
--

DROP TABLE IF EXISTS `ASIGNACION`;
CREATE TABLE IF NOT EXISTS `ASIGNACION` (
  `ID_ASIGNACION` int(11) NOT NULL AUTO_INCREMENT,
  `CORREO` varchar(100) NOT NULL,
  `ID_ACTIVO` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `ID_UBICACION` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_ASIGNACION`,`CORREO`,`ID_ACTIVO`),
  KEY `fk_PETICION_USUARIO1_idx` (`CORREO`),
  KEY `fk_PETICION_ACTIVO1_idx` (`ID_ACTIVO`),
  KEY `fk_UBICACION` (`ID_UBICACION`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ASIGNACION`
--

INSERT INTO `ASIGNACION` (`ID_ASIGNACION`, `CORREO`, `ID_ACTIVO`, `CANTIDAD`, `FECHA`, `ID_UBICACION`, `STATUS`) VALUES
(12, 'crucito.g@gmail.com', 3, 1, '2019-12-10', 9, 1),
(13, 'diego.zamora33.dz@gmail.com', 9, 5, '2019-12-10', 10, 1),
(14, 'diego.zamora33.dz@gmail.com', 2, 20, '2019-12-10', 11, 1),
(15, 'karen_jatziri99@hotmail.com', 1, 2, '2019-12-10', 12, 1),
(16, 'crucito.g@gmail.com', 14, 5, '2019-12-10', 13, 1),
(17, 'crucito.g@gmail.com', 1, 2, '2019-12-10', 14, 1),
(19, 'pepinruiz27@gmail.com', 14, 1, '2019-12-10', 16, 1),
(20, 'pepinruiz27@gmail.com', 2, 3, '2019-12-10', 17, 1),
(21, 'boyzo99@outlook.com', 2, 2, '2019-12-11', 18, 1),
(22, 'boyzo99@outlook.com', 14, 110, '2019-12-11', 19, 1),
(23, 'boyzo99@outlook.com', 8, 2, '2019-12-11', 20, 1),
(24, 'boyzo99@outlook.com', 1, 1, '2019-12-11', 21, 1),
(25, 'karen_jatziri99@hotmail.com', 15, 1, '2019-12-11', 22, 1),
(26, 'airamzzja@hotmail.com', 8, 2, '2019-12-11', 23, 1),
(27, 'boyzo99@outlook.com', 16, 50, '2019-12-11', 24, 1),
(28, 'boyzo99@outlook.com', 17, 500, '2019-12-11', 25, 1),
(29, 'crucito.g@gmail.com', 16, 30, '2019-12-11', 26, 1),
(30, 'karen_jatziri99@hotmail.com', 17, 500, '2019-12-11', 27, 1),
(31, 'karen_jatziri99@hotmail.com', 3, 5, '2019-12-11', 28, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DEPARTAMENTO`
--

DROP TABLE IF EXISTS `DEPARTAMENTO`;
CREATE TABLE IF NOT EXISTS `DEPARTAMENTO` (
  `ID_DEPARTAMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_DEPARTAMENTO`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `DEPARTAMENTO`
--

INSERT INTO `DEPARTAMENTO` (`ID_DEPARTAMENTO`, `NOMBRE`) VALUES
(1, 'DSC'),
(2, 'DCEA'),
(3, 'DEPI'),
(4, 'Electrica'),
(5, 'Gestion Empresarial'),
(6, 'Ingenieria Bioquimica'),
(7, 'Ingenieria Industrial'),
(8, 'Ingenieria en Materiales'),
(9, 'Ingenieria Mecanica'),
(10, 'Ingenieria Mecatronica'),
(11, 'Ingenieria en Electronica'),
(12, 'Posgrado Electrica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EDIFICIO`
--

DROP TABLE IF EXISTS `EDIFICIO`;
CREATE TABLE IF NOT EXISTS `EDIFICIO` (
  `ID_EDIFICIO` int(11) NOT NULL AUTO_INCREMENT,
  `EDIFICIO` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_EDIFICIO`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `EDIFICIO`
--

INSERT INTO `EDIFICIO` (`ID_EDIFICIO`, `EDIFICIO`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'CH'),
(5, 'D'),
(6, 'E'),
(7, 'F'),
(8, 'G'),
(9, 'H'),
(10, 'I'),
(11, 'J'),
(12, 'K'),
(13, 'L'),
(14, 'LL'),
(15, 'M'),
(16, 'N'),
(17, 'Ñ'),
(18, 'O'),
(19, 'P'),
(20, 'Q'),
(21, 'R'),
(22, 'S'),
(23, 'S1'),
(24, 'S2'),
(25, 'S3'),
(26, 'T'),
(27, 'U'),
(28, 'V'),
(29, 'W'),
(30, 'X'),
(31, 'Y'),
(32, 'Z'),
(33, 'AA'),
(34, 'AB'),
(35, 'AC'),
(36, 'AD'),
(37, 'AE'),
(38, 'AF'),
(39, 'AG'),
(40, 'AH'),
(41, '2A'),
(42, '2B'),
(43, '2C'),
(44, '2D'),
(45, '2E'),
(46, '2F'),
(47, '2G'),
(48, '2H'),
(49, '2J'),
(50, '2K'),
(51, '3A'),
(52, '3B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HISTORIAL`
--

DROP TABLE IF EXISTS `HISTORIAL`;
CREATE TABLE IF NOT EXISTS `HISTORIAL` (
  `ID_HISTORIAL` double NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` varchar(50) NOT NULL,
  `ID_ACTIVO` int(11) NOT NULL,
  `ID_LUGAR` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `ACCION` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_HISTORIAL`),
  KEY `FK_USUARIO` (`ID_USUARIO`),
  KEY `FK_ACTIVO` (`ID_ACTIVO`),
  KEY `FK_LUGAR` (`ID_LUGAR`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `HISTORIAL`
--

INSERT INTO `HISTORIAL` (`ID_HISTORIAL`, `ID_USUARIO`, `ID_ACTIVO`, `ID_LUGAR`, `CANTIDAD`, `FECHA`, `ACCION`) VALUES
(4, 'luis@gmail.com', 9, 4, 3, '2019-12-09', 'ASIGNACION'),
(5, 'luis@gmail.com', 2, 6, 100, '2019-12-08', 'ASIGNACION'),
(7, 'luis@gmail.com', 2, 6, 100, '2019-12-09', 'LIBERACION'),
(9, 'luis@gmail.com', 8, 2, 2, '2019-12-09', 'LIBERACION'),
(10, 'ariana@gmail.com', 1, 8, 100, '2019-12-10', 'ASIGNACION'),
(11, 'juan@gmail.com', 2, 1, 25, '2019-12-10', 'LIBERACION'),
(12, 'luis@gmail.com', 9, 4, 3, '2019-12-10', 'LIBERACION'),
(13, 'diego.zamora33.dz@gmail.com', 2, 11, 20, '2019-12-10', 'ASIGNACION'),
(14, 'crucito.g@gmail.com', 2, 9, 2, '2019-12-10', 'ASIGNACION'),
(15, 'crucito.g@gmail.com', 3, 9, 1, '2019-12-10', 'ASIGNACION'),
(16, 'diego.zamora33.dz@gmail.com', 9, 10, 5, '2019-12-10', 'ASIGNACION'),
(17, 'crucito.g@gmail.com', 2, 9, 2, '2019-12-10', 'LIBERACION'),
(18, 'karen_jatziri99@hotmail.com', 1, 12, 2, '2019-12-10', 'ASIGNACION'),
(19, 'crucito.g@gmail.com', 1, 14, 2, '2019-12-10', 'ASIGNACION'),
(20, 'crucito.g@gmail.com', 14, 13, 5, '2019-12-10', 'ASIGNACION'),
(21, 'pepinruiz27@gmail.com', 2, 17, 3, '2019-12-10', 'ASIGNACION'),
(22, 'pepinruiz27@gmail.com', 14, 16, 1, '2019-12-10', 'ASIGNACION'),
(23, 'ariana@gmail.com', 1, 8, 100, '2019-12-10', 'LIBERACION'),
(24, 'boyzo99@outlook.com', 2, 18, 2, '2019-12-11', 'ASIGNACION'),
(25, 'boyzo99@outlook.com', 14, 19, 110, '2019-12-11', 'ASIGNACION'),
(26, 'boyzo99@outlook.com', 8, 20, 2, '2019-12-11', 'ASIGNACION'),
(27, 'boyzo99@outlook.com', 1, 21, 1, '2019-12-11', 'ASIGNACION'),
(28, 'karen_jatziri99@hotmail.com', 15, 22, 1, '2019-12-11', 'ASIGNACION'),
(29, 'airamzzja@hotmail.com', 8, 23, 2, '2019-12-11', 'ASIGNACION'),
(30, 'boyzo99@outlook.com', 17, 25, 500, '2019-12-11', 'ASIGNACION'),
(31, 'boyzo99@outlook.com', 16, 24, 50, '2019-12-11', 'ASIGNACION'),
(32, 'crucito.g@gmail.com', 16, 26, 30, '2019-12-11', 'ASIGNACION'),
(33, 'karen_jatziri99@hotmail.com', 17, 27, 500, '2019-12-11', 'ASIGNACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_ACTIVO`
--

DROP TABLE IF EXISTS `TIPO_ACTIVO`;
CREATE TABLE IF NOT EXISTS `TIPO_ACTIVO` (
  `ID_TIPO` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_TIPO`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `TIPO_ACTIVO`
--

INSERT INTO `TIPO_ACTIVO` (`ID_TIPO`, `TIPO`) VALUES
(1, 'Escolar'),
(2, 'Computadoras'),
(6, 'Sin Tipo'),
(7, 'Cables'),
(10, 'Libros'),
(11, 'Revistas'),
(12, 'Mesa'),
(13, 'Pizarron'),
(14, 'Cañon'),
(17, 'Servicio de Cafetería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UBICACION`
--

DROP TABLE IF EXISTS `UBICACION`;
CREATE TABLE IF NOT EXISTS `UBICACION` (
  `ID_UBICACION` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL,
  `ID_EDIFICIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_UBICACION`),
  KEY `fk_UBICACION_EDIFICIO1_idx` (`ID_EDIFICIO`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `UBICACION`
--

INSERT INTO `UBICACION` (`ID_UBICACION`, `NOMBRE`, `ID_EDIFICIO`) VALUES
(1, 'SALON K4', 12),
(2, 'CUBICULO A12', 10),
(3, 'CUBICULO 1', 14),
(4, 'SALON LL2', 14),
(5, 'SALON K3', 12),
(6, 'SALON CH3', 4),
(7, 'AULA MACRO', 51),
(8, 'SALON CH04', 4),
(9, 'SALON K2', 12),
(10, 'K6', 12),
(11, 'CH5', 4),
(12, 'K3', 12),
(13, 'G2', 8),
(14, 'A3', 4),
(15, 'P2KK', 5),
(16, 'K6', 6),
(17, 'UK', 4),
(18, 'A1', 1),
(19, 'A4', 1),
(20, 'A8', 1),
(21, 'B2', 2),
(22, 'CUBICULO 34', 10),
(23, 'K5', 3),
(24, 'SALON O2', 18),
(25, 'SALON Z2', 32),
(26, 'SALA AB', 34),
(27, 'SALON S2', 22),
(28, 'SALA 2A3', 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

DROP TABLE IF EXISTS `USUARIO`;
CREATE TABLE IF NOT EXISTS `USUARIO` (
  `CORREO` varchar(100) NOT NULL,
  `NOMBRES` varchar(45) NOT NULL,
  `APELLIDOS` varchar(45) NOT NULL,
  `TELEFONO` varchar(45) DEFAULT NULL,
  `PASSWORD` varchar(45) NOT NULL,
  `ID_DEPARTAMENTO` int(11) NOT NULL,
  PRIMARY KEY (`CORREO`),
  KEY `fk_USUARIO_DEPARTAMENTO1_idx` (`ID_DEPARTAMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`CORREO`, `NOMBRES`, `APELLIDOS`, `TELEFONO`, `PASSWORD`, `ID_DEPARTAMENTO`) VALUES
('airamzzja@hotmail.com', 'Jazmin', 'Lopez', '00 00 00 00 00', 'Prietito', 3),
('ariana@gmail.com', 'Ariana', 'Hernadez Garcia', '00 00 00 00 00', 'asd', 10),
('boyzo99@outlook.com', 'Jesus Miguel', 'Boyzo', '00 00 00 00 00', '12345seis', 1),
('crucito.g@gmail.com', 'Cruz', 'García garcia', '00 00 00 00 00', 'abcd12345', 1),
('diego.zamora33.dz@gmail.com', 'Diego', 'Zamora', '00 00 00 00 00', '2694teku', 1),
('juan@gmail.com', 'Juan Pablo', 'Perez Escutia', '00 00 00 00 00', '123', 1),
('karen_jatziri99@hotmail.com', 'Karen', 'Vazquez', '00 00 00 00 00', '1234', 1),
('luis@gmail.com', 'luis david', 'Suares', '44 31 22 10 78', '123', 6),
('pepinruiz27@gmail.com', 'JOSE A', 'SANCHEZ', '00 00 00 00 00', 'ctmcrus2', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ACTIVO`
--
ALTER TABLE `ACTIVO`
  ADD CONSTRAINT `fk_ACTIVO_TIPO_ACTIVO1` FOREIGN KEY (`ID_TIPO`) REFERENCES `TIPO_ACTIVO` (`ID_TIPO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ASIGNACION`
--
ALTER TABLE `ASIGNACION`
  ADD CONSTRAINT `fk_PETICION_ACTIVO1` FOREIGN KEY (`ID_ACTIVO`) REFERENCES `ACTIVO` (`ID_ACTIVO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PETICION_USUARIO1` FOREIGN KEY (`CORREO`) REFERENCES `USUARIO` (`CORREO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UBICACION` FOREIGN KEY (`ID_UBICACION`) REFERENCES `UBICACION` (`ID_UBICACION`);

--
-- Filtros para la tabla `HISTORIAL`
--
ALTER TABLE `HISTORIAL`
  ADD CONSTRAINT `FK_ACTIVO` FOREIGN KEY (`ID_ACTIVO`) REFERENCES `ACTIVO` (`ID_ACTIVO`),
  ADD CONSTRAINT `FK_LUGAR` FOREIGN KEY (`ID_LUGAR`) REFERENCES `UBICACION` (`ID_UBICACION`),
  ADD CONSTRAINT `FK_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `USUARIO` (`CORREO`);

--
-- Filtros para la tabla `UBICACION`
--
ALTER TABLE `UBICACION`
  ADD CONSTRAINT `fk_UBICACION_EDIFICIO1` FOREIGN KEY (`ID_EDIFICIO`) REFERENCES `EDIFICIO` (`ID_EDIFICIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD CONSTRAINT `fk_USUARIO_DEPARTAMENTO1` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `DEPARTAMENTO` (`ID_DEPARTAMENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
