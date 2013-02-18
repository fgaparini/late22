-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-02-2013 a las 22:07:06
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `late_nueva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alojamientos`
--

CREATE TABLE IF NOT EXISTS `alojamientos` (
  `ID_Alojamiento` int(11) NOT NULL AUTO_INCREMENT,
  `ID_InformacionGeneral` int(11) NOT NULL,
  `ID_Imagenes` int(11) DEFAULT NULL,
  `ID_TipoAlojamiento` int(11) NOT NULL,
  `ID_Categorias` int(11) DEFAULT NULL,
  `ID_MP` int(11) NOT NULL,
  `ID_Modulos` int(11) NOT NULL,
  `Votos` varchar(2) DEFAULT NULL,
  `Activo` varchar(1) NOT NULL,
  `Url` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DestaOrden` int(11) NOT NULL,
  `DestaHome` tinyint(4) NOT NULL,
  `ID_Estadistica` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Alojamiento`),
  UNIQUE KEY `ID_InformacionGeneral` (`ID_InformacionGeneral`,`ID_Imagenes`,`ID_MP`,`ID_Modulos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `alojamientos`
--

INSERT INTO `alojamientos` (`ID_Alojamiento`, `ID_InformacionGeneral`, `ID_Imagenes`, `ID_TipoAlojamiento`, `ID_Categorias`, `ID_MP`, `ID_Modulos`, `Votos`, `Activo`, `Url`, `DestaOrden`, `DestaHome`, `ID_Estadistica`) VALUES
(1, 1, 0, 2, 2, 1, 0, '0', 'A', 'sanrafaellate.com/fasfasdfafda', 4, 0, NULL),
(2, 2, 0, 8, 3, 2, 0, '0', 'A', '', 0, 0, NULL),
(3, 3, 0, 5, 2, 3, 0, '0', 'A', '', 0, 0, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
