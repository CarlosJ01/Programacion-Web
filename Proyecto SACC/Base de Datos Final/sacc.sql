-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-12-2019 a las 15:13:30
-- Versión del servidor: 10.1.41-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sacc`
--
CREATE DATABASE IF NOT EXISTS `sacc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sacc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `numControl` varchar(9) NOT NULL COMMENT 'Numero de control del usuario',
  `tipo` char(1) NOT NULL DEFAULT 'S' COMMENT 'Tipo de administrador:\nP -> Principal\nS ->Secundario',
  PRIMARY KEY (`numControl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`numControl`, `tipo`) VALUES
('A17120151', 'A'),
('A17120157', 'S'),
('A17120159', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `numControl` varchar(9) NOT NULL,
  `idCarrera` int(11) NOT NULL COMMENT 'Carrera que pertenece el alumno',
  `cargaEscolar` text NOT NULL COMMENT 'Ruta del documento del kardex',
  `fchCargaEscolar` date NOT NULL,
  `comentarioCarga` text NOT NULL,
  `idEstatus` int(11) NOT NULL COMMENT 'Estatus del alumno\n Nuevo\n Sin Actividad\n Subio credito\n Modifico credito\n Termino creditos\n Entrego Constancia',
  PRIMARY KEY (`numControl`),
  KEY `fk_Alumno_Carrera1_idx` (`idCarrera`),
  KEY `fk_Alumno_Estatus1_idx` (`idEstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`numControl`, `idCarrera`, `cargaEscolar`, `fchCargaEscolar`, `comentarioCarga`, `idEstatus`) VALUES
('17120151', 1, 'Documentos/Cargas/17120151.pdf', '2019-12-04', 'Todo correcto', 3),
('17120152', 1, 'Documentos/Cargas/17120152.pdf', '2019-12-04', 'Carga escolar en espera de revision', 1),
('17120153', 2, 'Documentos/Cargas/17120153.pdf', '2019-12-04', 'Carga escolar en espera de revision', 2),
('17120154', 1, 'Documentos/Cargas/17120154.pdf', '2019-12-04', 'Todo correcto', 3),
('17120155', 2, 'Documentos/Cargas/17120155.pdf', '2019-12-04', 'Todo correcto', 3),
('17120156', 1, 'Documentos/Cargas/17120156.pdf', '2019-12-04', 'Todo correcto', 3),
('17120157', 1, 'Documentos/Cargas/17120157.pdf', '2019-12-04', 'Todo correcto', 3),
('17120158', 2, 'Documentos/Cargas/17120158.pdf', '2019-12-04', 'Todo correcto', 3),
('19121001', 1, 'Documentos/Cargas/19121001.pdf', '2019-12-04', 'Amiga te falta el sello del DSC, ven a mi cubículo, pero ya te lo voy a validar', 3),
('C17120151', 2, 'Documentos/Cargas/C17120151.pdf', '2019-12-04', 'Por favor, vuelve a subir tu carga de materias', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

DROP TABLE IF EXISTS `carrera`;
CREATE TABLE IF NOT EXISTS `carrera` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de carrera',
  `nombre` varchar(80) NOT NULL COMMENT 'Nombre de la carrera',
  `siglas` varchar(10) NOT NULL COMMENT 'Nombre de la carrera',
  PRIMARY KEY (`idCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idCarrera`, `nombre`, `siglas`) VALUES
(1, 'Ingeniería en sistemas computacionales', 'I.S.C'),
(2, 'Ingeniería en tecnologías de la información y comunicación', 'I.T.I.C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

DROP TABLE IF EXISTS `creditos`;
CREATE TABLE IF NOT EXISTS `creditos` (
  `idCredito` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del credito',
  `actividad` text NOT NULL COMMENT 'Descripcion de la actividad',
  `valor` int(11) NOT NULL DEFAULT '1' COMMENT 'Valor de la actividad',
  `numero` varchar(5) NOT NULL,
  PRIMARY KEY (`idCredito`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `creditos`
--

INSERT INTO `creditos` (`idCredito`, `actividad`, `valor`, `numero`) VALUES
(1, 'Asistir a un Congreso', 1, '1'),
(2, 'Participar activamente en un Evento Académico Como Organizador', 1, '2.1'),
(3, 'Participar activamente en un Evento Académico Como Ponente, Conferencista o en la exposición de carteles', 2, '2.2'),
(4, 'Asesorar un Curso Académico Institucional', 1, '3'),
(5, 'Realizar una estancia Técnico-Científico (evento corto)', 2, '4'),
(6, 'Asistir a un Curso o un Taller de mínimo 20 horas', 1, '5'),
(7, 'Aprobar, dentro de un Programa de Diplomado en su Área de Conocimiento con duración de 120 hrs, un módulo de mínimo 30 hrs.', 1, '6'),
(8, 'Impartir un Curso Extracurricular de mínimo de 20 hrs.', 2, '7'),
(9, 'Participar en Concursos/Eventos organizados por TecNM Regional', 1, '8.1'),
(10, 'Participar en Concursos/Eventos organizados por TecNM Nacional', 2, '8.2'),
(11, 'Elaborar un Prototipo de su Área de Conocimiento Didáctico', 1, '9.1'),
(12, 'Elaborar un Prototipo de su Área de Conocimiento Industrial', 2, '9.2'),
(13, 'Elaborar un Prototipo de su Área de Conocimiento Con Solicitud de Patente', 2, '9.3'),
(14, 'Participar en un Proyecto de Investigación Registrado de Nivel Licenciatura', 2, '10.1'),
(15, 'Participar en un Proyecto de Investigación Registrado de Nivel Maestría', 2, '10.2'),
(16, 'Participar en un Proyecto de Investigación Registrado de Nivel Doctorado', 2, '10.3'),
(17, 'Realizar Difusión Científica en Publicaciones No indexada', 2, '11.1'),
(18, 'Realizar Difusión Científica en Publicaciones Indexada', 2, '11.2'),
(19, 'Obtener una Certificación propia de su ámbito laboral', 2, '12'),
(20, 'Participa en Actividades Extraescolares, culturales o deportivas, durante mínimo un periodo semestral', 1, '13'),
(21, 'Participación en Eventos de Gestión Tecnológica y Vinculación Impulsa', 1, '14.1'),
(22, 'Participación en Eventos de Gestión Tecnológica y Vinculación Finanzas para Emprender y Crecer (BBVA) 20 hrs', 1, '14.2'),
(23, 'Participación en Eventos de Gestión Tecnológica y Vinculación Talento Emprendedor', 1, '14.3'),
(24, 'Participación en Eventos de Gestión Tecnológica y Vinculación Programa Verano Científico de la Investigación (AMC, DELFIN) hasta el 5º Semestre, después será para Residencias Profesionales', 1, '14.4'),
(25, 'Ciclo de Conferencias Organizadas por CEIT 8 ponencias genéricas supervisadas por Jefes Departamentales al semestre', 1, '15.1'),
(26, 'Participación en Actividades de Desarrollo Académico Tutoría Presencial solo en PRIMER Semestre', 1, '16.1'),
(27, 'Participación en Actividades de Desarrollo Académico Participación en aplicación EXANII II y Asistencia Conferencia Magistral', 1, '16.2'),
(28, 'Participación en Actividades de Ingeniería Bioquímica Concurso de Prácticas de Laboratorio (Primer Lugar)', 1, '17.1'),
(29, 'Participación en Actividades de Ingeniería Bioquímica Curso de Análisis Proximal de 30 hrs', 1, '17.2'),
(30, 'Participación en Actividades de Ingeniería Bioquímica Curso de Habilidades Gerenciales de 20 hrs', 1, '17.3'),
(31, 'Participación en Actividades de Ingeniería en Materiales Jornadas Académicas', 1, '18.1'),
(32, 'Participación en Actividades de Ingeniería en Materiales Expositor en Círculos de Estudio', 1, '18.2'),
(33, 'Participación en Actividades de Ingeniería y Computación Asesor de Círculos de Estudio', 1, '19.1'),
(34, 'Participación en Actividades de Ingeniería y Computación Asistente de Laboratorio', 1, '19.2'),
(35, 'Participación en Actividades de Ciencias Básicas Concurso de Ciencias Básicas', 1, '20.1'),
(36, 'Participación en Actividades de Ciencias Básicas En fase local los diez primeros clasificados de TECnM', 1, '20.2'),
(37, 'Participación en Actividades de Ingeniería Industrial Concurso de Taller Herramientas Lean', 1, '21.1'),
(38, 'Participación en Actividades de Ingeniería Industrial Certificación Six Sigma Green Belt', 1, '21.2'),
(39, 'Participación en Actividades de Ingeniería Industrial Primeros Auxilios y Combate contra Incendios', 1, '21.3'),
(40, 'Participación en Actividades de Ingeniería Industrial Solución de Problemas de Ingeniería en Excel', 1, '21.4'),
(41, 'Participación en Actividades de Ingeniería Industrial Manejo de Riesgos', 1, '21.5'),
(42, 'Participación en Actividades de Ingeniería Industrial Habilidades Directivas para Ingenieros', 1, '21.6'),
(43, 'Participación en Actividades de Ingeniería Industrial Taller Haciendo Competitivas a las Micro y Pequeñas Empresas	', 1, '21.7'),
(44, 'Participación en Actividades de Ingeniería Industrial Cátedral INEGI', 1, '21.8'),
(45, 'Participación en Actividades para el Sistema No Escolarizado Ciclo de Conferencias ex profeso', 1, '22.1'),
(46, 'Participación en Actividades para el Sistema No Escolarizado Constancia de experiencia laboral por 2 años en área de formación', 2, '22.2'),
(47, 'Participación en Actividades para el Sistema No Escolarizado Asistencia a Conferencias con Memoria de Evento', 2, '22.3'),
(48, 'Participación en Actividades para el Sistema No Escolarizado En fase local los diez primeros clasificados de TecNM', 1, '22.4'),
(49, 'Participación en Actividades para Ingeniería Electrónica e Ingeniería Mecánica Concurso de Robótica', 1, '23.1'),
(50, 'Participación en Actividades para Ingeniería en Gestión Empresarial Brigada de Seguridad', 1, '24.1'),
(51, 'Participación en Comité de Contraloría Social de la Beca de Manutención', 1, '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditosinformacion`
--

DROP TABLE IF EXISTS `creditosinformacion`;
CREATE TABLE IF NOT EXISTS `creditosinformacion` (
  `idCredito` int(11) NOT NULL AUTO_INCREMENT,
  `actividad` text NOT NULL,
  `creditos` varchar(2) NOT NULL,
  `categoria` varchar(1) NOT NULL,
  PRIMARY KEY (`idCredito`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `creditosinformacion`
--

INSERT INTO `creditosinformacion` (`idCredito`, `actividad`, `creditos`, `categoria`) VALUES
(1, '1.- Asistir a un Congreso', '1', 'p'),
(2, '2.- Participar activamente en un Evento Académico', '0', 'p'),
(3, '	2.1 Como Organizador', '1', 's'),
(4, '	2.2 Como Ponente, Conferencista o en la exposición de carteles', '2', 's'),
(5, '3.- Asesorar un Curso Académico Institucional', '1', 'p'),
(6, '4.- Realizar una estancia Técnico-Científico (evento corto)', '2', 'p'),
(7, '5.- Asistir a un Curso o un Taller de mínimo 20 horas', '1', 'p'),
(8, '6.- Aprobar, dentro de un Programa de Diplomado en su Área de Conocimiento con duración de 120 hrs, un módulo de mínimo 30 hrs.', '1', 'p'),
(9, '7.- Impartir un Curso Extracurricular de mínimo de 20 hrs.', '2', 'p'),
(10, '8.- Participar en Concursos/Eventos organizados por TecNM', '0', 'p'),
(11, '	8.1 Regional', '1', 's'),
(12, '	8.2 Nacional', '2', 's'),
(13, '9.- Elaborar un Prototipo de su Área de Conocimiento', '0', 'p'),
(14, '	9.1 Didáctico', '1', 's'),
(15, '	9.2 Industrial', '2', 's'),
(16, '	9.3 Con Solicitud de Patente', '2', 's'),
(17, '10.- Participar en un Proyecto de Investigación Registrado', '0', 'p'),
(18, '	10.1 de Nivel Licenciatura', '2', 's'),
(19, '	10.2 de Nivel Maestría', '2', 's'),
(20, '	10.3 de Nivel Doctorado', '2', 's'),
(21, '11.- Realizar Difusión Científica en Publicaciones', '0', 'p'),
(22, '	11.1 No indexada', '2', 's'),
(23, '	11.2 Indexada', '2', 's'),
(24, '12.- Obtener una Certificación propia de su ámbito laboral', '2', 'p'),
(25, '13.- Participa en Actividades Extraescolares, culturales o deportivas, durante mínimo un periodo semestral', '1', 'p'),
(26, '14.- Participación en Eventos de Gestión Tecnológica y Vinculación	', '0', 'p'),
(27, '	14.1 Impulsa', '1', 's'),
(28, '	14.2 Finanzas para Emprender y Crecer (BBVA) 20 hrs', '1', 's'),
(29, '	14.3 Talento Emprendedor', '1', 's'),
(30, '	14.4 Programa Verano Científico de la Investigación (AMC, DELFIN) hasta el 5º Semestre, después será para Residencias Profesionales', '1', 's'),
(31, '15.- Ciclo de Conferencias Organizadas por CEIT', '0', 'p'),
(32, '	15.1 8 ponencias genéricas supervisadas por Jefes Departamentales al semestre', '1', 's'),
(33, '16.- Participación en Actividades de Desarrollo Académico', '0', 'p'),
(34, '	16.1 Tutoría Presencial solo en PRIMER Semestre', '1', 's'),
(35, '	16.2 Participación en aplicación EXANII II y Asistencia Conferencia Magistral', '1', 's'),
(36, '17.- Participación en Actividades de Ingeniería Bioquímica', '0', 'p'),
(37, '	17.1 Concurso de Prácticas de Laboratorio (Primer Lugar)', '1', 's'),
(38, '	17.2 Curso de Análisis Proximal de 30 hrs', '1', 's'),
(39, '	17.3 Curso de Habilidades Gerenciales de 20 hrs', '1', 's'),
(40, '18.- Participación en Actividades de Ingeniería en Materiales', '0', 'p'),
(41, '	18.1 Jornadas Académicas', '1', 's'),
(42, '	18.2 Expositor en Círculos de Estudio', '1', 's'),
(43, '19.- Participación en Actividades de Ingeniería y Computación', '0', 'p'),
(44, '	19.1 Asesor de Círculos de Estudio', '1', 's'),
(45, '	19.2 Asistente de Laboratorio', '1', 's'),
(46, '20.- Participación en Actividades de Ciencias Básicas', '0', 'p'),
(47, '	20.1 Concurso de Ciencias Básicas', '1', 's'),
(48, '	20.2 En fase local los diez primeros clasificados de TECnM', '1', 's'),
(49, '21.- Participación en Actividades de Ingeniería Industrial', '0', 'p'),
(50, '	21.1 Concurso de Taller Herramientas Lean', '1', 's'),
(51, '	21.2 Certificación Six Sigma Green Belt', '1', 's'),
(52, '	21.3 Primeros Auxilios y Combate contra Incendios', '1', 's'),
(53, '	21.4 Solución de Problemas de Ingeniería en Excel', '1', 's'),
(54, '	21.5 Manejo de Riesgos', '1', 's'),
(55, '	21.6 Habilidades Directivas para Ingenieros', '1', 's'),
(56, '	21.7 Taller Haciendo Competitivas a las Micro y Pequeñas Empresas	', '1', 's'),
(57, '	21.8 Cátedral INEGI', '1', 's'),
(58, '22.- Participación en Actividades para el Sistema No Escolarizado	', '0', 'p'),
(59, '	22.1 Ciclo de Conferencias ex profeso', '1', 's'),
(60, '	22.2 Constancia de experiencia laboral por 2 años en área de formación', '2', 's'),
(61, '	22.3 Asistencia a Conferencias con Memoria de Evento', '2', 's'),
(62, '	22.4 En fase local los diez primeros clasificados de TecNM', '1', 's'),
(63, '23.- Participación en Actividades para Ingeniería Electrónica e Ingeniería Mecánica', '0', 'p'),
(64, '	23.1 Concurso de Robótica', '1', 's'),
(65, '24.- Participación en Actividades para Ingeniería en Gestión Empresarial', '0', 'p'),
(66, '24.1 Brigada de Seguridad', '1', 's'),
(67, '25.- Participación en Comité de Contraloría Social de la Beca de Manutención', '1', 'p');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

DROP TABLE IF EXISTS `estatus`;
CREATE TABLE IF NOT EXISTS `estatus` (
  `idEstatus` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Estatus',
  `estatus` varchar(45) NOT NULL COMMENT 'Que estatus es',
  PRIMARY KEY (`idEstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`idEstatus`, `estatus`) VALUES
(1, 'Nuevo'),
(2, 'Inactivo'),
(3, 'Activo'),
(4, 'Abierto'),
(5, 'Completo'),
(6, 'Cerrado'),
(7, 'Subio'),
(8, 'Resubio'),
(9, 'Valido'),
(10, 'Invalido'),
(11, 'Espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

DROP TABLE IF EXISTS `expediente`;
CREATE TABLE IF NOT EXISTS `expediente` (
  `numControl` varchar(9) NOT NULL COMMENT 'Numero de control del alumno al que pertenece el expediente',
  `idEstatus` int(11) NOT NULL COMMENT 'Estatus del expediente\n Abierto\n Cerrado',
  `fchRegisto` date NOT NULL COMMENT 'Fecha en el que el usuario se registro y abrio expediente',
  `fchCompleto` date DEFAULT NULL,
  `fchCierre` date DEFAULT NULL COMMENT 'Fecha en la que se cierra el expediente',
  PRIMARY KEY (`numControl`),
  KEY `fk_Expediente_Estatus1_idx` (`idEstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`numControl`, `idEstatus`, `fchRegisto`, `fchCompleto`, `fchCierre`) VALUES
('17120151', 6, '2019-12-04', '2019-12-04', '2019-12-04'),
('17120152', 4, '2019-12-04', NULL, NULL),
('17120153', 4, '2019-12-04', NULL, NULL),
('17120154', 4, '2019-12-04', '0000-00-00', NULL),
('17120155', 4, '2019-12-04', '0000-00-00', NULL),
('17120156', 4, '2019-12-04', '0000-00-00', NULL),
('17120157', 4, '2019-12-04', '0000-00-00', NULL),
('17120158', 5, '2019-12-04', '2019-12-04', NULL),
('19121001', 4, '2019-12-04', NULL, NULL),
('C17120151', 4, '2019-12-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `administrador` varchar(9) NOT NULL,
  `alumno` varchar(9) NOT NULL,
  `Comentario` text NOT NULL,
  `Accion` varchar(50) NOT NULL,
  KEY `administrador` (`administrador`),
  KEY `alumno` (`alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`administrador`, `alumno`, `Comentario`, `Accion`) VALUES
('A17120151', '17120153', 'Carga escolar en espera de revision', 'Valido Alumno'),
('A17120159', '17120153', 'Carga escolar en espera de revision', 'Invalido Alumno'),
('A17120159', '17120154', 'Todo Correcto', 'Valido Credito 4'),
('A17120159', '17120154', 'Todo Correcto', 'Invalido Credito 4'),
('A17120159', '17120154', 'Falta una evidencia correcta, ven al edificio I', 'Invalido Credito 4'),
('A17120151', '17120154', 'Todo correcto y perfecto', 'Valido Credito 4'),
('A17120151', '17120151', 'No we', 'Invalido Alumno'),
('A17120151', '17120151', 'Si we', 'Valido Alumno'),
('A17120151', '17120151', 'Todo correcto', 'Valido Alumno'),
('A17120151', '17120157', 'No we', 'Invalido Credito 12'),
('A17120157', '17120157', 'No que no', 'Valido Credito 12'),
('A17120157', '17120157', 'Todo correcto', 'Valido Credito 12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

DROP TABLE IF EXISTS `registros`;
CREATE TABLE IF NOT EXISTS `registros` (
  `idRegistro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro',
  `idCredito` int(11) NOT NULL COMMENT 'Credito asociado a este registro para obtener la actividad y su valor',
  `numControl` varchar(9) NOT NULL,
  `fchInicio` date NOT NULL COMMENT 'Fecha de inicio de la activadad',
  `fchFin` date NOT NULL COMMENT 'Fecha de finalizacion de la activadad',
  `idEstatus` int(11) NOT NULL COMMENT 'Estatus del registro del credito\n En espera\n Valido\n No valido',
  `evidencia` text NOT NULL COMMENT 'Ruta del documento con la evidencia',
  `rubrica` text NOT NULL COMMENT 'Ruta del documento con la rubrica',
  `comentario` text NOT NULL COMMENT 'Comentario, si el credito no es valido y se necesita comentar',
  `fchRegistro` date NOT NULL,
  PRIMARY KEY (`idRegistro`),
  KEY `fk_Registros_Creditos1_idx` (`idCredito`),
  KEY `fk_Registros_Estatus1_idx` (`idEstatus`),
  KEY `fk_Registros_Expediente1_idx` (`numControl`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`idRegistro`, `idCredito`, `numControl`, `fchInicio`, `fchFin`, `idEstatus`, `evidencia`, `rubrica`, `comentario`, `fchRegistro`) VALUES
(1, 3, '17120151', '2019-12-01', '2019-12-02', 9, 'Documentos/Evidencias/17120151/Evidencia_1.pdf', 'Documentos/Evidencias/17120151/Rubrica_1.pdf', 'Todo correcto', '2019-12-04'),
(2, 12, '17120151', '2018-01-04', '2019-11-10', 9, 'Documentos/Evidencias/17120151/Evidencia_2.pdf', 'Documentos/Evidencias/17120151/Rubrica_2.pdf', 'Todo correcto', '2019-12-04'),
(3, 1, '17120151', '2019-12-04', '2019-12-04', 9, 'Documentos/Evidencias/17120151/Evidencia_3.pdf', 'Documentos/Evidencias/17120151/Rubrica_3.pdf', 'Todo correcto', '2019-12-04'),
(4, 14, '17120154', '2019-11-04', '2019-12-04', 9, 'Documentos/Evidencias/17120154/Evidencia_4.pdf', 'Documentos/Evidencias/17120154/Rubrica_4.pdf', 'Todo correcto y perfecto', '2019-12-04'),
(5, 25, '17120154', '2019-11-11', '2019-11-18', 11, 'Documentos/Evidencias/17120154/Evidencia_5.pdf', 'Documentos/Evidencias/17120154/Rubrica_5.pdf', 'Si comentarios, en espera de ser revisado', '2019-12-04'),
(6, 51, '17120155', '2019-10-01', '2019-10-04', 10, 'Documentos/Evidencias/17120155/Evidencia_6.pdf', 'Documentos/Evidencias/17120155/Rubrica_6.pdf', 'Todo Correcto', '2019-12-04'),
(7, 10, '17120156', '2019-11-11', '2019-11-15', 9, 'Documentos/Evidencias/17120156/Evidencia_7.pdf', 'Documentos/Evidencias/17120156/Rubrica_7.pdf', 'Todo Correcto', '2019-12-04'),
(8, 26, '17120156', '2019-08-13', '2019-09-18', 11, 'Documentos/Evidencias/17120156/Evidencia_8.pdf', 'Documentos/Evidencias/17120156/Rubrica_8.pdf', 'Revisa tu rubrica, tiene que tener la firma del asesor. EL credito a sido resubido, en espera de ser revisado', '2019-12-04'),
(9, 7, '17120156', '2019-12-16', '2019-12-17', 9, 'Documentos/Evidencias/17120156/Evidencia_9.pdf', 'Documentos/Evidencias/17120156/Rubrica_9.pdf', 'Todo Correcto', '2019-12-04'),
(10, 28, '17120156', '2019-12-02', '2019-12-02', 10, 'Documentos/Evidencias/17120156/Evidencia_10.pdf', 'Documentos/Evidencias/17120156/Rubrica_10.pdf', 'Sube tu evidencia en mayor calidad', '2019-12-04'),
(11, 25, '17120157', '2019-12-04', '2019-12-04', 9, 'Documentos/Evidencias/17120157/Evidencia_11.pdf', 'Documentos/Evidencias/17120157/Rubrica_11.pdf', 'Todo correcto', '2019-12-04'),
(12, 13, '17120157', '2019-09-04', '2019-09-04', 9, 'Documentos/Evidencias/17120157/Evidencia_12.pdf', 'Documentos/Evidencias/17120157/Rubrica_12.pdf', 'Todo correcto', '2019-12-04'),
(13, 12, '17120157', '2018-01-05', '2018-01-05', 11, 'Documentos/Evidencias/17120157/Evidencia_13.pdf', 'Documentos/Evidencias/17120157/Rubrica_13.pdf', 'Si comentarios, en espera de ser revisado', '2019-12-04'),
(14, 12, '17120158', '2019-10-04', '2019-11-04', 9, 'Documentos/Evidencias/17120158/Evidencia_14.pdf', 'Documentos/Evidencias/17120158/Rubrica_14.pdf', 'Todo Correcto', '2019-12-04'),
(15, 28, '17120158', '2018-09-03', '2018-09-03', 9, 'Documentos/Evidencias/17120158/Evidencia_15.pdf', 'Documentos/Evidencias/17120158/Rubrica_15.pdf', 'Todo Correcto', '2019-12-04'),
(16, 3, '17120158', '2019-03-16', '2019-03-17', 9, 'Documentos/Evidencias/17120158/Evidencia_16.pdf', 'Documentos/Evidencias/17120158/Rubrica_16.pdf', 'Todo Correcto', '2019-12-04'),
(17, 4, '19121001', '2019-12-31', '2020-01-31', 9, 'Documentos/Evidencias/19121001/Evidencia_17.pdf', 'Documentos/Evidencias/19121001/Rubrica_17.pdf', 'No has traído el sello que te pedí', '2019-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resubircarga`
--

DROP TABLE IF EXISTS `resubircarga`;
CREATE TABLE IF NOT EXISTS `resubircarga` (
  `numControl` varchar(9) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`numControl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resubircarga`
--

INSERT INTO `resubircarga` (`numControl`, `fecha`) VALUES
('C17120151', '2019-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resubircredito`
--

DROP TABLE IF EXISTS `resubircredito`;
CREATE TABLE IF NOT EXISTS `resubircredito` (
  `idRegistro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idRegistro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resubircredito`
--

INSERT INTO `resubircredito` (`idRegistro`, `fecha`) VALUES
(8, '2019-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubrica`
--

DROP TABLE IF EXISTS `rubrica`;
CREATE TABLE IF NOT EXISTS `rubrica` (
  `idRubrica` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la vercion de la rubrica',
  `rubrica` text NOT NULL COMMENT 'Ruta del archivo de la rubrica',
  `descripcion` text NOT NULL COMMENT 'Descripcion del uso de la rubrica',
  PRIMARY KEY (`idRubrica`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rubrica`
--

INSERT INTO `rubrica` (`idRubrica`, `rubrica`, `descripcion`) VALUES
(1, 'Archivos/Rubrica.pdf', 'Esta rúbrica es necesaria, para poder entregar los créditos complementarios, debe de ser imprimida o copiada y ser llenada por, el encargado de la actividad complementaria y ser firmada por el mismo (Una por crecido a cambiar).'),
(2, 'Archivos/Rubrica_2.pdf', 'Esta rúbrica es necesaria, para poder entregar los créditos complementarios, debe de ser imprimida o copiada y ser llenada por, el encargado de la actividad complementaria y ser firmada por el mismo (Una por crecido a cambiar).\r\nAdemas de ser escaniada para poder ser subida en la plataforma.'),
(3, 'Archivos/Rubrica_3.pdf', 'Esta rúbrica es necesaria, para poder entregar los créditos complementarios, debe de ser imprimida o copiada y ser llenada por, el encargado de la actividad complementaria y ser firmada por el mismo (Una por crecido a cambiar).\r\nAdemas de ser escaniada para poder ser subida en la plataforma.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subiocredito`
--

DROP TABLE IF EXISTS `subiocredito`;
CREATE TABLE IF NOT EXISTS `subiocredito` (
  `idRegistro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idRegistro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subiocredito`
--

INSERT INTO `subiocredito` (`idRegistro`, `fecha`) VALUES
(5, '2019-12-04'),
(13, '2019-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `numControl` varchar(9) NOT NULL COMMENT 'Numero de control del usuario',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre del usuario',
  `apePaterno` varchar(45) NOT NULL COMMENT 'Apellido paterno del usuario',
  `apeMaterno` varchar(45) DEFAULT NULL COMMENT 'Apellido materno del usuario',
  `e-mail` varchar(50) DEFAULT 'NoRegistro@SACC.com' COMMENT 'Correo electronico del usuario',
  `telefono` varchar(30) DEFAULT '0000000000' COMMENT 'Numero telefonico (Celular) del usuario',
  `password` varchar(30) NOT NULL COMMENT 'Contraseña del Usuario',
  `estilo` varchar(45) DEFAULT 'claro' COMMENT 'Estilo para el formulario',
  PRIMARY KEY (`numControl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`numControl`, `nombre`, `apePaterno`, `apeMaterno`, `e-mail`, `telefono`, `password`, `estilo`) VALUES
('', '', '', '', '', '', '', 'claro'),
('17120151', 'Carlos Jahir', 'Castro', 'Cázares', 'CarlosJ.CastroC.01@gmail.com', '44-31-22-10-76', '123', 'claro'),
('17120152', 'Brandon Alexis', 'Rodrigez', 'Molina', 'momo@gmail.com', '', '123', 'claro'),
('17120153', 'Jaime Isai', 'Velazques', 'Aguilar', '', '+52 44 31 20 89 67', '123', 'claro'),
('17120154', 'Luis', 'Suares', 'Escutia', 'luigui@hotmail.com', '44 31 28 33 78', '123', 'claro'),
('17120155', 'Eren', 'Jeaguer', '', 'atckTit@gmail.com', '44 31 22 09 56', '123', 'claro'),
('17120156', 'Cristha', 'Hernades', 'Bolaños', '', '', '123', 'claro'),
('17120157', 'Monserrat', 'Jaimes', 'Echeverria', 'crsh@gmail.com', '44 31 22 22 43', '123', 'claro'),
('17120158', 'Fatima Andrea', 'Heracleo', 'Lagunas', 'fati@gmail.com', '44 31 22 55 88', '123', 'claro'),
('19121001', 'Joselin', 'Martínez', 'Barcenas', 'joselyn@itmorelia.edu.mx', '4454854699', '321', 'claro'),
('A17120151', 'Aurelio Amaury', 'Coria', 'Ramirez', 'docencia.dsc@itmorelia.edu.mx', '44-31-60-40-78', 'root', 'claro'),
('A17120157', 'Monserrat', 'Jaimes', 'Echeverria', 'monse@gmail.com', '44 31 22 22 43', 'admin', 'claro'),
('A17120159', 'Ernesto', 'Vyeria', '', 'topo@gmail.com', '', '123', 'claro'),
('C17120151', 'Gustavo', 'Lopez', '', '', '', '123', 'claro');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_Administrador_Usuario` FOREIGN KEY (`numControl`) REFERENCES `usuario` (`numControl`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_Alumno_Carrera1` FOREIGN KEY (`idCarrera`) REFERENCES `carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Alumno_Estatus1` FOREIGN KEY (`idEstatus`) REFERENCES `estatus` (`idEstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Alumno_Usuario1` FOREIGN KEY (`numControl`) REFERENCES `usuario` (`numControl`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `fk_Expediente_Alumno1` FOREIGN KEY (`numControl`) REFERENCES `alumno` (`numControl`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Expediente_Estatus1` FOREIGN KEY (`idEstatus`) REFERENCES `estatus` (`idEstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`administrador`) REFERENCES `administrador` (`numControl`),
  ADD CONSTRAINT `historico_ibfk_2` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`numControl`);

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_Registros_Creditos1` FOREIGN KEY (`idCredito`) REFERENCES `creditos` (`idCredito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Registros_Estatus1` FOREIGN KEY (`idEstatus`) REFERENCES `estatus` (`idEstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Registros_Expediente1` FOREIGN KEY (`numControl`) REFERENCES `expediente` (`numControl`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resubircarga`
--
ALTER TABLE `resubircarga`
  ADD CONSTRAINT `alumno` FOREIGN KEY (`numControl`) REFERENCES `alumno` (`numControl`);

--
-- Filtros para la tabla `resubircredito`
--
ALTER TABLE `resubircredito`
  ADD CONSTRAINT `registroResubio` FOREIGN KEY (`idRegistro`) REFERENCES `registros` (`idRegistro`);

--
-- Filtros para la tabla `subiocredito`
--
ALTER TABLE `subiocredito`
  ADD CONSTRAINT `registro` FOREIGN KEY (`idRegistro`) REFERENCES `registros` (`idRegistro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
