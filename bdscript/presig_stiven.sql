-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2014 a las 16:15:35
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `presig`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratista_normalizado`
--

CREATE TABLE IF NOT EXISTS `contratista_normalizado` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_cedula` int(11) NOT NULL,
  `con_empleador` int(15) DEFAULT NULL,
  `con_nombre` varchar(100) DEFAULT NULL,
  `con_lug_nac` int(15) DEFAULT NULL,
  `con_ced_exp` int(15) DEFAULT NULL,
  `con_cargo` varchar(45) DEFAULT NULL,
  `con_per_sol` varchar(45) DEFAULT NULL,
  `con_tp_mobra` varchar(100) DEFAULT NULL,
  `con_tp_contrato` varchar(100) DEFAULT NULL,
  `con_fech_icontrato` date DEFAULT NULL,
  `con_fech_fcontrato` date DEFAULT NULL,
  `con_fren_trabajo` varchar(45) DEFAULT NULL,
  `con_campo` varchar(45) DEFAULT NULL,
  `con_usuario` int(11) DEFAULT NULL,
  `con_fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`con_id`),
  UNIQUE KEY `con_id_UNIQUE` (`con_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `contratista_normalizado`
--

INSERT INTO `contratista_normalizado` (`con_id`, `con_cedula`, `con_empleador`, `con_nombre`, `con_lug_nac`, `con_ced_exp`, `con_cargo`, `con_per_sol`, `con_tp_mobra`, `con_tp_contrato`, `con_fech_icontrato`, `con_fech_fcontrato`, `con_fren_trabajo`, `con_campo`, `con_usuario`, `con_fecha`) VALUES
(1, 0, 0, '11001', 11001, 0, 'MANTENIMIENTO', NULL, NULL, '16/09/2014', NULL, NULL, NULL, NULL, 3, '2014-10-24 14:58:43'),
(2, 0, 0, '25175', 11001, 0, 'NIROSOFT', NULL, NULL, '16/09/2014', NULL, NULL, NULL, NULL, 3, '2014-10-24 14:58:43'),
(3, 0, 0, '8001', 8001, 0, 'MANTENIMIENTO', NULL, NULL, '16/09/2014', NULL, NULL, NULL, NULL, 3, '2014-10-24 14:58:43'),
(4, 0, 0, '5129', 5129, 0, 'MANTENIMIENTO', NULL, NULL, '16/09/2014', NULL, NULL, NULL, NULL, 3, '2014-10-24 14:58:43'),
(5, 0, 0, '11001', 11001, 0, 'MANTENIMIENTO', NULL, NULL, '16/09/2014', NULL, NULL, NULL, NULL, 3, '2014-10-24 14:58:43'),
(6, 67686, 37, 'jgjhjg', 1, 1, 'gjhgj', 'jhgjghj', '1', '1', '2014-10-01', '2014-12-31', 'jhjhhkjh', 'kjhkjhk', 3, '2014-10-24 15:03:59'),
(7, 80252432, 32, 'Halver Stiven Guzman Perez', 15226, 11001, 'OPERADOR CAMION GRUA', 'Experiencia 5 ańos en operación de transporte', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:04:30'),
(8, 1032002222, 31, 'Samir Torres', 11001, 11001, 'AUXILIAR DE FACTURACION', 'Profesional en areas administrativas con 5 ań', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'CAJUA', 3, '2014-10-24 15:04:30'),
(9, 0, 36, 'Ivvone', 25175, 11001, 'AUXILIAR LOGISTICO 2', 'Profesional en areas de Salud Ocupacional o A', 'MOC', 'INDEFINIDO', '1970-01-01', '1970-01-01', 'NIROSOFT', 'RUBIALES', 3, '2014-10-24 15:04:30'),
(10, 1010123242, 39, 'Stephany Guzman ', 8001, 8001, 'AUXILIAR DE INGENIERIA', 'Experiencia 3 ańos conduciendo vehiculo senci', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:04:30'),
(11, 1012039876, 42, 'Caterine Torres', 5129, 5129, 'AYUDANTE DE OBRA CIVILES', 'Experiencia de 2 ańos de experiencia en logis', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'RUBIALES', 3, '2014-10-24 15:04:30'),
(12, 0, 0, '11001', 11001, 0, 'MANTENIMIENTO', NULL, NULL, '16/09/2014', NULL, NULL, NULL, NULL, 3, '2014-10-24 15:10:08'),
(13, 0, 0, '25175', 11001, 0, 'NIROSOFT', NULL, NULL, '16/09/2014', NULL, NULL, NULL, NULL, 3, '2014-10-24 15:10:08'),
(14, 0, 0, '8001', 8001, 0, 'MANTENIMIENTO', NULL, NULL, '16/09/2014', NULL, NULL, NULL, NULL, 3, '2014-10-24 15:10:08'),
(15, 0, 0, '5129', 5129, 0, 'MANTENIMIENTO', NULL, NULL, '16/09/2014', NULL, NULL, NULL, NULL, 3, '2014-10-24 15:10:08'),
(16, 0, 0, '11001', 11001, 0, 'MANTENIMIENTO', NULL, NULL, '16/09/2014', NULL, NULL, NULL, NULL, 3, '2014-10-24 15:10:08'),
(17, 80252432, 32, 'Halver Stiven Guzman Perez', 15226, 11001, 'OPERADOR CAMION GRUA', 'Experiencia 5 ańos en operación de transporte', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:11:16'),
(18, 1032002222, 31, 'Samir Torres', 11001, 11001, 'AUXILIAR DE FACTURACION', 'Profesional en areas administrativas con 5 ań', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'CAJUA', 3, '2014-10-24 15:11:16'),
(19, 0, 36, 'Ivvone', 25175, 11001, 'AUXILIAR LOGISTICO 2', 'Profesional en areas de Salud Ocupacional o A', 'MOC', 'INDEFINIDO', '1970-01-01', '1970-01-01', 'NIROSOFT', 'RUBIALES', 3, '2014-10-24 15:11:16'),
(20, 1010123242, 39, 'Stephany Guzman ', 8001, 8001, 'AUXILIAR DE INGENIERIA', 'Experiencia 3 ańos conduciendo vehiculo senci', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:11:16'),
(21, 1012039876, 42, 'Caterine Torres', 5129, 5129, 'AYUDANTE DE OBRA CIVILES', 'Experiencia de 2 ańos de experiencia en logis', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'RUBIALES', 3, '2014-10-24 15:11:16'),
(22, 80252432, 32, 'Halver Stiven Guzman Perez', 15226, 11001, 'OPERADOR CAMION GRUA', 'Experiencia 5 ańos en operación de transporte', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:26:10'),
(23, 1032002222, 31, 'Samir Torres', 11001, 11001, 'AUXILIAR DE FACTURACION', 'Profesional en areas administrativas con 5 ań', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'CAJUA', 3, '2014-10-24 15:26:10'),
(24, 0, 36, 'Ivvone', 25175, 11001, 'AUXILIAR LOGISTICO 2', 'Profesional en areas de Salud Ocupacional o A', 'MOC', 'INDEFINIDO', '1970-01-01', '1970-01-01', 'NIROSOFT', 'RUBIALES', 3, '2014-10-24 15:26:10'),
(25, 1010123242, 39, 'Stephany Guzman ', 8001, 8001, 'AUXILIAR DE INGENIERIA', 'Experiencia 3 ańos conduciendo vehiculo senci', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:26:10'),
(26, 1012039876, 42, 'Caterine Torres', 5129, 5129, 'AYUDANTE DE OBRA CIVILES', 'Experiencia de 2 ańos de experiencia en logis', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'RUBIALES', 3, '2014-10-24 15:26:10'),
(27, 80252432, 32, 'Halver Stiven Guzman Perez', 15226, 11001, 'OPERADOR CAMION GRUA', 'Experiencia 5 ańos en operación de transporte', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:29:32'),
(28, 1032002222, 31, 'Samir Torres', 11001, 11001, 'AUXILIAR DE FACTURACION', 'Profesional en areas administrativas con 5 ań', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'CAJUA', 3, '2014-10-24 15:29:32'),
(29, 0, 36, 'Ivvone', 25175, 11001, 'AUXILIAR LOGISTICO 2', 'Profesional en areas de Salud Ocupacional o A', 'MOC', 'INDEFINIDO', '1970-01-01', '1970-01-01', 'NIROSOFT', 'RUBIALES', 3, '2014-10-24 15:29:33'),
(30, 1010123242, 39, 'Stephany Guzman ', 8001, 8001, 'AUXILIAR DE INGENIERIA', 'Experiencia 3 ańos conduciendo vehiculo senci', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:29:33'),
(31, 1012039876, 42, 'Caterine Torres', 5129, 5129, 'AYUDANTE DE OBRA CIVILES', 'Experiencia de 2 ańos de experiencia en logis', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'RUBIALES', 3, '2014-10-24 15:29:33'),
(32, 80252432, 32, 'Halver Stiven Guzman Perez', 15226, 11001, 'OPERADOR CAMION GRUA', 'Experiencia 5 ańos en operación de transporte', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:30:16'),
(33, 1032002222, 31, 'Samir Torres', 11001, 11001, 'AUXILIAR DE FACTURACION', 'Profesional en areas administrativas con 5 ań', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'CAJUA', 3, '2014-10-24 15:30:16'),
(34, 0, 36, 'Ivvone', 25175, 11001, 'AUXILIAR LOGISTICO 2', 'Profesional en areas de Salud Ocupacional o A', 'MOC', 'INDEFINIDO', '1970-01-01', '1970-01-01', 'NIROSOFT', 'RUBIALES', 3, '2014-10-24 15:30:16'),
(35, 1010123242, 39, 'Stephany Guzman ', 8001, 8001, 'AUXILIAR DE INGENIERIA', 'Experiencia 3 ańos conduciendo vehiculo senci', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:30:16'),
(36, 1012039876, 42, 'Caterine Torres', 5129, 5129, 'AYUDANTE DE OBRA CIVILES', 'Experiencia de 2 ańos de experiencia en logis', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'RUBIALES', 3, '2014-10-24 15:30:16'),
(37, 80252432, 32, 'Halver Stiven Guzman Perez', 15226, 11001, 'OPERADOR CAMION GRUA', 'Experiencia 5 ańos en operación de transporte', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:30:40'),
(38, 1032002222, 31, 'Samir Torres', 11001, 11001, 'AUXILIAR DE FACTURACION', 'Profesional en areas administrativas con 5 ań', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'CAJUA', 3, '2014-10-24 15:30:40'),
(39, 0, 36, 'Ivvone', 25175, 11001, 'AUXILIAR LOGISTICO 2', 'Profesional en areas de Salud Ocupacional o A', 'MOC', 'INDEFINIDO', '1970-01-01', '1970-01-01', 'NIROSOFT', 'RUBIALES', 3, '2014-10-24 15:30:40'),
(40, 1010123242, 39, 'Stephany Guzman ', 8001, 8001, 'AUXILIAR DE INGENIERIA', 'Experiencia 3 ańos conduciendo vehiculo senci', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:30:40'),
(41, 1012039876, 42, 'Caterine Torres', 5129, 5129, 'AYUDANTE DE OBRA CIVILES', 'Experiencia de 2 ańos de experiencia en logis', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'RUBIALES', 3, '2014-10-24 15:30:40'),
(42, 80252432, 32, 'Halver Stiven Guzman Perez', 15226, 11001, 'OPERADOR CAMION GRUA', 'Experiencia 5 ańos en operación de transporte', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:31:35'),
(43, 1032002222, 31, 'Samir Torres', 11001, 11001, 'AUXILIAR DE FACTURACION', 'Profesional en areas administrativas con 5 ań', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'CAJUA', 3, '2014-10-24 15:31:35'),
(44, 0, 36, 'Ivvone', 25175, 11001, 'AUXILIAR LOGISTICO 2', 'Profesional en areas de Salud Ocupacional o A', 'MOC', 'INDEFINIDO', '1970-01-01', '1970-01-01', 'NIROSOFT', 'RUBIALES', 3, '2014-10-24 15:31:35'),
(45, 1010123242, 39, 'Stephany Guzman ', 8001, 8001, 'AUXILIAR DE INGENIERIA', 'Experiencia 3 ańos conduciendo vehiculo senci', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:31:35'),
(46, 1012039876, 42, 'Caterine Torres', 5129, 5129, 'AYUDANTE DE OBRA CIVILES', 'Experiencia de 2 ańos de experiencia en logis', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'RUBIALES', 3, '2014-10-24 15:31:36'),
(47, 80252432, 32, 'Halver Stiven Guzman Perez', 15226, 11001, 'OPERADOR CAMION GRUA', 'Experiencia 5 ańos en operación de transporte', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:32:06'),
(48, 1032002222, 31, 'Samir Torres', 11001, 11001, 'AUXILIAR DE FACTURACION', 'Profesional en areas administrativas con 5 ań', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'CAJUA', 3, '2014-10-24 15:32:06'),
(49, 0, 36, 'Ivvone', 25175, 11001, 'AUXILIAR LOGISTICO 2', 'Profesional en areas de Salud Ocupacional o A', 'MOC', 'INDEFINIDO', '1970-01-01', '1970-01-01', 'NIROSOFT', 'RUBIALES', 3, '2014-10-24 15:32:06'),
(50, 1010123242, 39, 'Stephany Guzman ', 8001, 8001, 'AUXILIAR DE INGENIERIA', 'Experiencia 3 ańos conduciendo vehiculo senci', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 15:32:07'),
(51, 1012039876, 42, 'Caterine Torres', 5129, 5129, 'AYUDANTE DE OBRA CIVILES', 'Experiencia de 2 ańos de experiencia en logis', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'RUBIALES', 3, '2014-10-24 15:32:07'),
(52, 0, 0, '0', 0, 0, '0', '0', '0', '0', '0000-00-00', '0000-00-00', '0', '0', 3, '2014-10-24 16:10:11'),
(53, 80252432, 32, 'Halver Stiven Guzman Perez', 15226, 11001, 'OPERADOR CAMION GRUA', 'Experiencia 5 ańos en operación de transporte', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 16:19:52'),
(54, 1032002222, 31, 'Samir Torres', 11001, 11001, 'AUXILIAR DE FACTURACION', 'Profesional en areas administrativas con 5 ań', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'CAJUA', 3, '2014-10-24 16:19:52'),
(55, 0, 36, 'Ivvone', 25175, 11001, 'AUXILIAR LOGISTICO 2', 'Profesional en areas de Salud Ocupacional o A', 'MOC', 'INDEFINIDO', '1970-01-01', '1970-01-01', 'NIROSOFT', 'RUBIALES', 3, '2014-10-24 16:19:52'),
(56, 1010123242, 39, 'Stephany Guzman ', 8001, 8001, 'AUXILIAR DE INGENIERIA', 'Experiencia 3 ańos conduciendo vehiculo senci', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 16:19:52'),
(57, 1012039876, 42, 'Caterine Torres', 5129, 5129, 'AYUDANTE DE OBRA CIVILES', 'Experiencia de 2 ańos de experiencia en logis', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'RUBIALES', 3, '2014-10-24 16:19:52'),
(58, 80252432, 32, 'Halver Stiven Guzman Perez', 15226, 11001, 'OPERADOR CAMION GRUA', 'Experiencia 5 ańos en operación de transporte', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 16:21:36'),
(59, 1032002222, 31, 'Samir Torres', 11001, 11001, 'AUXILIAR DE FACTURACION', 'Profesional en areas administrativas con 5 ań', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'CAJUA', 3, '2014-10-24 16:21:36'),
(60, 0, 36, 'Ivvone', 25175, 11001, 'AUXILIAR LOGISTICO 2', 'Profesional en areas de Salud Ocupacional o A', 'MOC', 'INDEFINIDO', '1970-01-01', '1970-01-01', 'NIROSOFT', 'RUBIALES', 3, '2014-10-24 16:21:36'),
(61, 1010123242, 39, 'Stephany Guzman ', 8001, 8001, 'AUXILIAR DE INGENIERIA', 'Experiencia 3 ańos conduciendo vehiculo senci', 'MOC', 'TERMINO FIJO_', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'QUIFA', 3, '2014-10-24 16:21:36'),
(62, 1012039876, 42, 'Caterine Torres', 5129, 5129, 'AYUDANTE DE OBRA CIVILES', 'Experiencia de 2 ańos de experiencia en logis', 'MONC', 'A TERMINO DE OBRA O LABOR', '1970-01-01', '1970-01-01', 'MANTENIMIENTO', 'RUBIALES', 3, '2014-10-24 16:21:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tp_contrato`
--

CREATE TABLE IF NOT EXISTS `tp_contrato` (
  `tp_contrato_id` int(11) NOT NULL AUTO_INCREMENT,
  `tp_contrato_nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tp_contrato_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tp_contrato`
--

INSERT INTO `tp_contrato` (`tp_contrato_id`, `tp_contrato_nombre`) VALUES
(1, 'CONTRATO A TÉRMINO FIJO'),
(2, 'CONTRATO A TÉRMINO INDEFINIDO'),
(3, 'CONTRATO DE OBRA O LABOR'),
(4, 'CONTRATO DE APRENDIZAJE'),
(5, 'CONTRATO TEMPORAL, OCASIONAL O ACCIDENTAL');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
