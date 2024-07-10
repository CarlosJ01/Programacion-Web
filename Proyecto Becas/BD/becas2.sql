-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-12-2019 a las 15:11:16
-- Versión del servidor: 10.1.41-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `becas2`
--
CREATE DATABASE IF NOT EXISTS `becas2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `becas2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `usuario` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`usuario`, `nombre`, `clave`) VALUES
('root', 'Jorge Baltazar', 'f865b53623b121fd34ee5426c792e5c33af8c227');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatorias`
--

DROP TABLE IF EXISTS `convocatorias`;
CREATE TABLE IF NOT EXISTS `convocatorias` (
  `idConvocatoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `rutaConvocatoria` text NOT NULL,
  `rutaFormulario` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idConvocatoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `convocatorias`
--

INSERT INTO `convocatorias` (`idConvocatoria`, `nombre`, `descripcion`, `rutaConvocatoria`, `rutaFormulario`, `fecha`) VALUES
(1, 'Beca Alimenticia 2020 2° Periodo', 'El programa beneficiará en especie a estudiantes con necesidad económica.\r\n', 'Documentos/Convocatorias/convocatoria1.pdf', 'Documentos/Convocatorias/solicitud1.pdf', '2020-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `idHistorico` int(11) NOT NULL AUTO_INCREMENT,
  `numeroControl` varchar(100) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `lugar` varchar(100) DEFAULT NULL,
  `estatus` tinyint(4) DEFAULT NULL,
  `periodo` int(11) NOT NULL,
  PRIMARY KEY (`idHistorico`),
  KEY `periodo` (`periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`idHistorico`, `numeroControl`, `tipo`, `lugar`, `estatus`, `periodo`) VALUES
(1, '17120151', 'Completa', 'Cafeteria', 1, 1),
(2, '17120150', 'Par', 'Comedor', 1, 1),
(3, '17120152', ' ', ' ', 2, 1),
(4, '17120150', 'Completa', 'Comedor', 1, 2),
(5, '17120151', ' ', ' ', 2, 2),
(6, '17120152', 'Inpar', 'Comedor', 1, 2),
(7, '17120147', 'Inpar', 'Cafeteria', 1, 2),
(8, '17120147', ' ', ' ', 2, 3),
(9, '15120070', 'Completa', 'Comedor', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

DROP TABLE IF EXISTS `periodo`;
CREATE TABLE IF NOT EXISTS `periodo` (
  `idPeriodo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`idPeriodo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`idPeriodo`, `nombre`) VALUES
(1, 'Ago-Dic'),
(2, 'Ago-Dic 2020'),
(3, 'Enero-Junio 2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE IF NOT EXISTS `solicitudes` (
  `idSolicitud` int(11) NOT NULL AUTO_INCREMENT,
  `numeroControl` varchar(100) NOT NULL,
  `rutaIngresos` text,
  `rutaDomicilio` text,
  `rutaSolicitud` text,
  `tipo` text,
  `lugar` varchar(100) DEFAULT NULL,
  `estatus` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idSolicitud`),
  KEY `numeroControl` (`numeroControl`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `numeroControl` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  PRIMARY KEY (`numeroControl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`numeroControl`, `nombre`, `carrera`, `telefono`, `direccion`, `clave`) VALUES
('15120070', 'juan manuel garciq', 'Ing. en Sistemas Computacionales', '4454254523', 'av tecnologico', '8cb2237d0679ca88db6464eac60da96345513964'),
('17120147', 'jorge luis baltazar perez', 'Ing. en Sistemas Computacionales', '4431741257', 'p verdes paseo del nogal 428', '8cb2237d0679ca88db6464eac60da96345513964'),
('17120150', 'Monserrat Jaimes Echeverria', 'Ing. en Sistemas Computacionales', '44 31 22 98 15', 'Huetamo #123', '8cb2237d0679ca88db6464eac60da96345513964'),
('17120151', 'Juan Pablo', 'Ing. en Sistemas Computacionales', '44 31 22 78 39', 'Unidad Tlatelolco', '8cb2237d0679ca88db6464eac60da96345513964'),
('17120152', 'Fatima Andrea', 'Ing. Mecatronica', '44 31 22 98 17', 'Matamoros #162', '8cb2237d0679ca88db6464eac60da96345513964');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`periodo`) REFERENCES `periodo` (`idPeriodo`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`numeroControl`) REFERENCES `usuarios` (`numeroControl`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
