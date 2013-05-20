-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-05-2013 a las 13:17:52
-- Versión del servidor: 5.1.68-cll
-- Versión de PHP: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `recargas_rch2_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion`
--

CREATE TABLE IF NOT EXISTS `atencion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cupo_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `recarga_id` int(11) DEFAULT NULL COMMENT 'UNIQUE',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `comentario` text,
  `estado` varchar(45) DEFAULT 'LISTA',
  PRIMARY KEY (`id`),
  UNIQUE KEY `recarga_id_UNIQUE` (`recarga_id`),
  KEY `cupo_fk_a` (`cupo_id`),
  KEY `user_fk_k` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Volcado de datos para la tabla `atencion`
--

INSERT INTO `atencion` (`id`, `cupo_id`, `user_id`, `recarga_id`, `fecha`, `comentario`, `estado`) VALUES
(19, NULL, 46, 19, '2013-05-15 15:57:12', NULL, 'LISTA'),
(20, NULL, 46, 22, '2013-05-15 15:59:43', NULL, 'LISTA'),
(21, NULL, 46, 21, '2013-05-15 16:00:04', NULL, 'LISTA'),
(22, NULL, 46, 20, '2013-05-15 16:00:24', NULL, 'LISTA'),
(23, NULL, 117, 23, '2013-05-15 17:32:38', NULL, 'RECHAZADA'),
(24, NULL, 117, 24, '2013-05-15 17:34:00', NULL, 'RECHAZADA NO PREPAGO'),
(25, NULL, 117, 25, '2013-05-15 17:36:36', NULL, 'LISTA'),
(26, NULL, 117, 26, '2013-05-15 17:38:15', NULL, 'LISTA'),
(27, NULL, 117, 27, '2013-05-15 17:41:05', NULL, 'LISTA'),
(28, NULL, 117, 28, '2013-05-15 17:41:36', NULL, 'LISTA'),
(29, NULL, 117, 29, '2013-05-15 17:42:17', NULL, 'RECHAZADA'),
(30, NULL, 117, 30, '2013-05-15 17:43:10', NULL, 'RECHAZADA'),
(31, NULL, 117, 31, '2013-05-15 18:45:07', NULL, 'RECHAZADA'),
(32, NULL, 117, 32, '2013-05-15 18:51:29', NULL, 'RECHAZADA NO PREPAGO'),
(33, NULL, 117, 33, '2013-05-15 18:56:12', NULL, 'LISTA'),
(34, NULL, 117, 34, '2013-05-16 02:50:08', NULL, 'RECHAZADA'),
(35, NULL, 117, 35, '2013-05-16 03:23:58', NULL, 'LISTA'),
(36, NULL, 117, 36, '2013-05-16 04:07:49', NULL, 'RECHAZADA'),
(37, NULL, 117, 37, '2013-05-16 04:07:57', NULL, 'LISTA'),
(38, NULL, 117, 38, '2013-05-16 04:10:18', NULL, 'RECHAZADA'),
(39, NULL, 117, 39, '2013-05-16 17:02:28', NULL, 'RECHAZADA'),
(40, NULL, 117, 40, '2013-05-16 17:14:16', NULL, 'LISTA'),
(41, NULL, 117, 41, '2013-05-17 02:53:00', NULL, 'RECHAZADA NO PREPAGO'),
(42, NULL, 117, 42, '2013-05-17 18:43:46', NULL, 'LISTA'),
(43, NULL, 117, 43, '2013-05-18 02:23:03', NULL, 'RECHAZADA NO PREPAGO'),
(44, NULL, 118, 54, '2013-05-19 19:40:16', 'TEST', 'LISTA'),
(45, NULL, 46, 49, '2013-05-19 19:44:47', NULL, 'LISTA'),
(46, NULL, 46, 50, '2013-05-19 19:45:01', NULL, 'LISTA'),
(47, NULL, 46, 51, '2013-05-19 19:45:21', NULL, 'LISTA'),
(48, NULL, 117, 52, '2013-05-19 20:34:09', NULL, 'RECHAZADA'),
(49, NULL, 117, 56, '2013-05-19 20:35:30', NULL, 'LISTA'),
(50, NULL, 117, 57, '2013-05-19 20:36:31', NULL, 'LISTA'),
(51, NULL, 117, 58, '2013-05-19 20:37:09', NULL, 'LISTA'),
(52, NULL, 117, 53, '2013-05-19 20:38:44', NULL, 'LISTA'),
(53, NULL, 117, 55, '2013-05-19 20:39:06', NULL, 'RECHAZADA'),
(54, NULL, 117, 59, '2013-05-19 20:39:18', NULL, 'LISTA'),
(55, NULL, 117, 60, '2013-05-19 20:52:23', NULL, 'RECHAZADA NO PREPAGO'),
(56, NULL, 117, 61, '2013-05-19 21:04:25', NULL, 'LISTA'),
(57, NULL, 117, 62, '2013-05-19 21:21:22', NULL, 'RECHAZADA NO PREPAGO'),
(58, NULL, 117, 63, '2013-05-20 01:15:36', NULL, 'LISTA'),
(59, NULL, 117, 64, '2013-05-20 01:47:26', NULL, 'RECHAZADA'),
(60, NULL, 117, 65, '2013-05-20 01:47:34', NULL, 'LISTA'),
(61, NULL, 117, 66, '2013-05-20 04:01:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, 'N;'),
('EMPLEADO', '7', NULL, 'N;'),
('CLIENTE', '8', NULL, 'N;'),
('OPERADOR', '9', NULL, 'N;'),
('CLIENTE', '10', NULL, 'N;'),
('EMPLEADO', '11', NULL, 'N;'),
('OPERADOR', '12', NULL, 'N;'),
('CLIENTE', '13', NULL, 'N;'),
('EMPLEADO', '14', NULL, 'N;'),
('OPERADOR', '21', NULL, 'N;'),
('OPERADOR', '22', NULL, 'N;'),
('OPERADOR', '23', NULL, 'N;'),
('CLIENTE', '24', NULL, 'N;'),
('CLIENTE', '15', NULL, 'N;'),
('EMPLEADO', '108', NULL, 'N;'),
('CLIENTE', '25', NULL, 'N;'),
('EMPLEADO', '47', NULL, 'N;'),
('CLIENTE', '26', NULL, 'N;'),
('CLIENTE', '27', NULL, 'N;'),
('CLIENTE', '28', NULL, 'N;'),
('CLIENTE', '29', NULL, 'N;'),
('CLIENTE', '30', NULL, 'N;'),
('CLIENTE', '31', NULL, 'N;'),
('CLIENTE', '32', NULL, 'N;'),
('CLIENTE', '33', NULL, 'N;'),
('CLIENTE', '34', NULL, 'N;'),
('CLIENTE', '35', NULL, 'N;'),
('CLIENTE', '36', NULL, 'N;'),
('CLIENTE', '37', NULL, 'N;'),
('CLIENTE', '38', NULL, 'N;'),
('CLIENTE', '39', NULL, 'N;'),
('CLIENTE', '40', NULL, 'N;'),
('CLIENTE', '41', NULL, 'N;'),
('CLIENTE', '42', NULL, 'N;'),
('CLIENTE', '43', NULL, 'N;'),
('CLIENTE', '44', NULL, 'N;'),
('CLIENTE', '45', NULL, 'N;'),
('CLIENTE', '90', NULL, 'N;'),
('EMPLEADO', '48', NULL, 'N;'),
('EMPLEADO', '49', NULL, 'N;'),
('EMPLEADO', '50', NULL, 'N;'),
('EMPLEADO', '51', NULL, 'N;'),
('EMPLEADO', '52', NULL, 'N;'),
('EMPLEADO', '53', NULL, 'N;'),
('EMPLEADO', '54', NULL, 'N;'),
('EMPLEADO', '55', NULL, 'N;'),
('EMPLEADO', '56', NULL, 'N;'),
('EMPLEADO', '57', NULL, 'N;'),
('EMPLEADO', '58', NULL, 'N;'),
('EMPLEADO', '59', NULL, 'N;'),
('EMPLEADO', '60', NULL, 'N;'),
('EMPLEADO', '61', NULL, 'N;'),
('EMPLEADO', '62', NULL, 'N;'),
('EMPLEADO', '63', NULL, 'N;'),
('EMPLEADO', '64', NULL, 'N;'),
('EMPLEADO', '65', NULL, 'N;'),
('EMPLEADO', '66', NULL, 'N;'),
('EMPLEADO', '67', NULL, 'N;'),
('EMPLEADO', '68', NULL, 'N;'),
('EMPLEADO', '69', NULL, 'N;'),
('EMPLEADO', '70', NULL, 'N;'),
('EMPLEADO', '71', NULL, 'N;'),
('EMPLEADO', '72', NULL, 'N;'),
('EMPLEADO', '73', NULL, 'N;'),
('EMPLEADO', '74', NULL, 'N;'),
('EMPLEADO', '75', NULL, 'N;'),
('EMPLEADO', '76', NULL, 'N;'),
('OPERADOR', '117', NULL, 'N;'),
('EMPLEADO', '77', NULL, 'N;'),
('EMPLEADO', '78', NULL, 'N;'),
('EMPLEADO', '79', NULL, 'N;'),
('EMPLEADO', '80', NULL, 'N;'),
('EMPLEADO', '81', NULL, 'N;'),
('EMPLEADO', '82', NULL, 'N;'),
('EMPLEADO', '84', NULL, 'N;'),
('EMPLEADO', '83', NULL, 'N;'),
('EMPLEADO', '85', NULL, 'N;'),
('EMPLEADO', '86', NULL, 'N;'),
('EMPLEADO', '87', NULL, 'N;'),
('EMPLEADO', '88', NULL, 'N;'),
('EMPLEADO', '89', NULL, 'N;'),
('EMPLEADO', '116', NULL, 'N;'),
('EMPLEADO', '115', NULL, 'N;'),
('EMPLEADO', '114', NULL, 'N;'),
('OPERADOR', '46', NULL, 'N;'),
('EMPLEADO', '113', NULL, 'N;'),
('EMPLEADO', '112', NULL, 'N;'),
('EMPLEADO', '111', NULL, 'N;'),
('EMPLEADO', '109', NULL, 'N;'),
('EMPLEADO', '110', NULL, 'N;'),
('EMPLEADO', '107', NULL, 'N;'),
('EMPLEADO', '106', NULL, 'N;'),
('EMPLEADO', '105', NULL, 'N;'),
('EMPLEADO', '91', NULL, 'N;'),
('EMPLEADO', '92', NULL, 'N;'),
('EMPLEADO', '93', NULL, 'N;'),
('EMPLEADO', '104', NULL, 'N;'),
('EMPLEADO', '103', NULL, 'N;'),
('EMPLEADO', '102', NULL, 'N;'),
('EMPLEADO', '101', NULL, 'N;'),
('EMPLEADO', '100', NULL, 'N;'),
('EMPLEADO', '99', NULL, 'N;'),
('EMPLEADO', '98', NULL, 'N;'),
('EMPLEADO', '97', NULL, 'N;'),
('EMPLEADO', '96', NULL, 'N;'),
('EMPLEADO', '95', NULL, 'N;'),
('EMPLEADO', '94', NULL, 'N;'),
('OPERADOR', '118', NULL, 'N;'),
('EMPLEADO', '119', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('EMPLEADO', 2, 'Empleado', NULL, 'N;'),
('Atencion.*', 1, NULL, NULL, 'N;'),
('Cupo.*', 1, NULL, NULL, 'N;'),
('Estado.*', 1, NULL, NULL, 'N;'),
('Local.*', 1, NULL, NULL, 'N;'),
('Noprepago.*', 1, NULL, NULL, 'N;'),
('Recarga.*', 1, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('UserControll.*', 1, NULL, NULL, 'N;'),
('User.*', 1, NULL, NULL, 'N;'),
('Atencion.View', 0, NULL, NULL, 'N;'),
('Atencion.Create', 0, NULL, NULL, 'N;'),
('Atencion.Update', 0, NULL, NULL, 'N;'),
('Atencion.Delete', 0, NULL, NULL, 'N;'),
('Atencion.Index', 0, NULL, NULL, 'N;'),
('Atencion.Admin', 0, NULL, NULL, 'N;'),
('Cupo.View', 0, NULL, NULL, 'N;'),
('Cupo.Create', 0, NULL, NULL, 'N;'),
('Cupo.Update', 0, NULL, NULL, 'N;'),
('Cupo.Delete', 0, NULL, NULL, 'N;'),
('Cupo.Index', 0, NULL, NULL, 'N;'),
('Cupo.Admin', 0, NULL, NULL, 'N;'),
('Estado.View', 0, NULL, NULL, 'N;'),
('Estado.Create', 0, NULL, NULL, 'N;'),
('Estado.Update', 0, NULL, NULL, 'N;'),
('Estado.Delete', 0, NULL, NULL, 'N;'),
('Estado.Index', 0, NULL, NULL, 'N;'),
('Estado.Admin', 0, NULL, NULL, 'N;'),
('Local.View', 0, NULL, NULL, 'N;'),
('Local.Create', 0, NULL, NULL, 'N;'),
('Local.Update', 0, NULL, NULL, 'N;'),
('Local.Delete', 0, NULL, NULL, 'N;'),
('Local.Index', 0, NULL, NULL, 'N;'),
('Local.Admin', 0, NULL, NULL, 'N;'),
('Noprepago.View', 0, NULL, NULL, 'N;'),
('Noprepago.Create', 0, NULL, NULL, 'N;'),
('Noprepago.Update', 0, NULL, NULL, 'N;'),
('Noprepago.Delete', 0, NULL, NULL, 'N;'),
('Noprepago.Index', 0, NULL, NULL, 'N;'),
('Noprepago.Admin', 0, NULL, NULL, 'N;'),
('Recarga.View', 0, NULL, NULL, 'N;'),
('Recarga.Create', 0, NULL, NULL, 'N;'),
('Recarga.Update', 0, NULL, NULL, 'N;'),
('Recarga.Delete', 0, NULL, NULL, 'N;'),
('Recarga.Index', 0, NULL, NULL, 'N;'),
('Recarga.Admin', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('UserControll.View', 0, NULL, NULL, 'N;'),
('UserControll.Create', 0, NULL, NULL, 'N;'),
('UserControll.Update', 0, NULL, NULL, 'N;'),
('UserControll.Delete', 0, NULL, NULL, 'N;'),
('UserControll.Index', 0, NULL, NULL, 'N;'),
('UserControll.Admin', 0, NULL, NULL, 'N;'),
('User.View', 0, NULL, NULL, 'N;'),
('User.Create', 0, NULL, NULL, 'N;'),
('User.Update', 0, NULL, NULL, 'N;'),
('User.Delete', 0, NULL, NULL, 'N;'),
('User.Index', 0, NULL, NULL, 'N;'),
('User.Admin', 0, NULL, NULL, 'N;'),
('Recarga.RecargasPendientes', 0, NULL, NULL, 'N;'),
('Recarga.RecargasAtendidas', 0, NULL, NULL, 'N;'),
('Recarga.RecargasRealizadas', 0, NULL, NULL, 'N;'),
('Recarga.RecargasIngresadas', 0, NULL, NULL, 'N;'),
('Recarga.VerListas', 0, NULL, NULL, 'N;'),
('Recarga.VerPendientesEmpleado', 0, NULL, NULL, 'N;'),
('Recarga.VerPendientesOperador', 0, NULL, NULL, 'N;'),
('Recarga.Export', 0, NULL, NULL, 'N;'),
('User.Local', 0, NULL, NULL, 'N;'),
('OPERADOR', 2, 'Operador', NULL, 'N;'),
('CLIENTE', 2, 'Cliente', NULL, 'N;'),
('Local.VerLocalesCliente', 0, NULL, NULL, 'N;'),
('User.Ingresar', 0, NULL, NULL, 'N;'),
('User.Elegir', 0, NULL, NULL, 'N;'),
('Local.VerLocalCliente', 0, NULL, NULL, 'N;'),
('Atencion.VerListasOperador', 0, NULL, NULL, 'N;'),
('Recarga.VerListasEmpleado', 0, NULL, NULL, 'N;'),
('Atencion.CreaAtencion', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('Authenticated', 'Recarga.*'),
('Authenticated', 'User.*'),
('CLIENTE', 'Local.VerLocalCliente'),
('CLIENTE', 'Local.VerLocalesCliente'),
('EMPLEADO', 'Recarga.*'),
('EMPLEADO', 'Recarga.VerListasEmpleado'),
('EMPLEADO', 'Recarga.VerPendientesEmpleado'),
('EMPLEADO', 'User.*'),
('OPERADOR', 'Atencion.CreaAtencion'),
('OPERADOR', 'Atencion.Update'),
('OPERADOR', 'Atencion.VerListasOperador'),
('OPERADOR', 'Atencion.View'),
('OPERADOR', 'Recarga.VerPendientesOperador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupo`
--

CREATE TABLE IF NOT EXISTS `cupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) DEFAULT NULL,
  `cupo` int(45) DEFAULT '2',
  `fecha` datetime DEFAULT NULL,
  `estado` varchar(45) DEFAULT 'DISPONIBLE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `cupo`
--

INSERT INTO `cupo` (`id`, `numero`, `cupo`, `fecha`, `estado`) VALUES
(1, NULL, 1, NULL, 'DISPONIBLE'),
(2, NULL, 1, NULL, 'DISPONIBLE'),
(3, NULL, 1, NULL, 'DISPONIBLE'),
(4, NULL, 1, NULL, 'DISPONIBLE'),
(5, NULL, 1, NULL, 'DISPONIBLE'),
(6, NULL, 1, NULL, 'DISPONIBLE'),
(7, NULL, 1, NULL, 'DISPONIBLE'),
(8, NULL, 1, NULL, 'DISPONIBLE'),
(9, NULL, 1, NULL, 'DISPONIBLE'),
(10, NULL, 1, NULL, 'DISPONIBLE'),
(11, NULL, 1, NULL, 'DISPONIBLE'),
(12, NULL, 1, NULL, 'DISPONIBLE'),
(13, NULL, 1, NULL, 'DISPONIBLE'),
(14, NULL, 1, NULL, 'DISPONIBLE'),
(15, NULL, 1, NULL, 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `fechaInicio` datetime DEFAULT NULL,
  `fechaTermino` datetime DEFAULT NULL,
  `estado` varchar(45) DEFAULT 'ACTIVO',
  PRIMARY KEY (`id`),
  KEY `user_fk_h` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE IF NOT EXISTS `local` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_l` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`id`, `user_id`, `ciudad`, `direccion`, `telefono`, `nombre`) VALUES
(5, 25, 'centro', 'centro', 'centro', 'centro'),
(6, 26, 'centro', 'centro', 'centro', 'centro'),
(7, 27, NULL, NULL, NULL, 'centro'),
(8, 28, NULL, NULL, NULL, 'principal'),
(9, 28, NULL, NULL, NULL, 'sucursal'),
(10, 29, NULL, NULL, NULL, 'castro'),
(11, 30, NULL, NULL, NULL, 'isla'),
(12, 31, NULL, NULL, NULL, 'centro'),
(13, 32, NULL, NULL, NULL, 'centro'),
(14, 33, NULL, NULL, NULL, 'baquedano'),
(15, 33, NULL, NULL, NULL, 'colon'),
(16, 33, NULL, NULL, NULL, 'loa'),
(17, 33, NULL, NULL, NULL, '18 sept'),
(18, 34, NULL, NULL, NULL, 'terminal'),
(19, 35, NULL, NULL, NULL, 'terminal1'),
(20, 35, NULL, NULL, NULL, 'terminal2'),
(21, 36, NULL, NULL, NULL, 'centro'),
(22, 36, NULL, NULL, NULL, 'centro'),
(23, 37, NULL, NULL, NULL, 'local1'),
(24, 37, NULL, NULL, NULL, 'local2'),
(25, 37, NULL, NULL, NULL, 'local3'),
(26, 37, NULL, NULL, NULL, 'local4'),
(27, 37, NULL, NULL, NULL, 'local5'),
(28, 38, NULL, NULL, NULL, 'chile1'),
(29, 38, NULL, NULL, NULL, 'chile2'),
(30, 38, NULL, NULL, NULL, 'chile3'),
(31, 38, NULL, NULL, NULL, 'chile4'),
(32, 38, NULL, NULL, NULL, 'ibañez1'),
(33, 38, NULL, NULL, NULL, 'tranquilo'),
(34, 39, NULL, NULL, NULL, 'centro'),
(35, 40, NULL, NULL, NULL, 'prueba'),
(36, 41, NULL, NULL, NULL, 'local1'),
(37, 41, NULL, NULL, NULL, 'local2'),
(38, 41, NULL, NULL, NULL, 'local3'),
(39, 41, NULL, NULL, NULL, 'local4'),
(40, 41, NULL, NULL, NULL, 'local5'),
(41, 42, NULL, NULL, NULL, 'bandera1'),
(42, 42, NULL, NULL, NULL, 'santo domingo'),
(43, 44, NULL, NULL, NULL, 'calle1'),
(44, 90, NULL, NULL, NULL, 'silvana'),
(45, 45, NULL, NULL, NULL, 'Lider Terrazas'),
(46, 45, NULL, NULL, NULL, 'unimarc llanquihue'),
(47, 45, NULL, NULL, NULL, 'centro cauquenes'),
(48, 45, NULL, NULL, NULL, 'ciber terminal acuenta'),
(49, 45, NULL, NULL, NULL, 'confiteria costanera'),
(50, 45, NULL, NULL, NULL, 'don vicente'),
(51, 45, NULL, NULL, NULL, 'kiosco talca'),
(52, 45, NULL, NULL, NULL, 'lider osorno'),
(53, 45, NULL, NULL, NULL, 'lider presidente'),
(54, 45, NULL, NULL, NULL, 'lider puerto varas'),
(55, 45, NULL, NULL, NULL, 'terminal de buses');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noprepago`
--

CREATE TABLE IF NOT EXISTS `noprepago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atencion_id` int(11) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `compania` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `atencion_fk_npp` (`atencion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `noprepago`
--

INSERT INTO `noprepago` (`id`, `atencion_id`, `numero`, `compania`) VALUES
(1, 24, '44332211', 'Movistar'),
(2, 32, '12345678', 'Entel'),
(3, 41, '98765432', 'Movistar'),
(4, 43, '22113344', 'Entel'),
(5, 55, '87654321', 'Movistar'),
(6, 57, '66666666', 'Movistar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recarga`
--

CREATE TABLE IF NOT EXISTS `recarga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `local_id` int(11) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `compania` varchar(45) DEFAULT NULL,
  `monto` varchar(45) DEFAULT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `estado` varchar(45) DEFAULT 'PENDIENTE',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_fk_r` (`user_id`),
  KEY `local_fk_r` (`local_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Volcado de datos para la tabla `recarga`
--

INSERT INTO `recarga` (`id`, `user_id`, `local_id`, `celular`, `compania`, `monto`, `comentario`, `estado`, `fecha`) VALUES
(2, 1, NULL, '12354654', 'Entel', '2000', NULL, 'RECHAZADA', '2013-05-06 18:54:17'),
(6, 1, NULL, '23423423', 'Movistar', '500', NULL, 'LISTA', '2013-05-13 18:33:26'),
(7, 1, NULL, '23423423', 'Movistar', '500', NULL, 'LISTA', '2013-05-13 18:33:33'),
(8, 1, NULL, '11111111', 'Movistar', '500', NULL, 'LISTA', '2013-05-13 18:33:40'),
(9, 1, NULL, '33333333', 'Entel', '3000', NULL, 'LISTA', '2013-05-13 18:33:50'),
(10, 1, NULL, '99999999', 'Movistar', '1500', NULL, 'LISTA', '2013-05-13 18:34:06'),
(11, 1, NULL, '22222222', 'Movistar', '500', NULL, 'LISTA', '2013-05-13 18:34:19'),
(12, 1, NULL, '55555555', 'Movistar', '500', NULL, 'LISTA', '2013-05-13 18:34:27'),
(16, 1, NULL, '16556498', 'Entel', '3000', NULL, 'RECHAZADA', '2013-05-14 16:26:02'),
(17, 1, NULL, '99999999', 'Movistar', '500', NULL, 'LISTA', '2013-05-14 16:34:38'),
(18, 47, 5, '88888888', 'Entel', '3000', NULL, 'LISTA', '2013-05-14 16:45:15'),
(19, 47, 5, '11111111', 'Entel', '3000', NULL, 'LISTA', '2013-05-15 15:51:20'),
(20, 47, 5, '12312312', 'Movistar', '1000', NULL, 'LISTA', '2013-05-15 15:57:42'),
(21, 47, 5, '21321323', 'Movistar', '500', NULL, 'LISTA', '2013-05-15 15:57:58'),
(22, 47, 5, '54654768', 'Entel', '2000', NULL, 'LISTA', '2013-05-15 15:58:07'),
(23, 47, 5, '11223344', 'Entel', '2000', NULL, 'RECHAZADA', '2013-05-15 17:24:01'),
(24, 47, 5, '44332211', 'Movistar', '500', NULL, 'RECHAZADA NO PREPAGO', '2013-05-15 17:33:17'),
(25, 47, 5, '44332210', 'Movistar', '500', NULL, 'LISTA', '2013-05-15 17:35:56'),
(26, 47, 5, '44332210', 'Movistar', '500', NULL, 'LISTA', '2013-05-15 17:37:58'),
(27, 47, 5, '33333333', 'Entel', '1000', NULL, 'LISTA', '2013-05-15 17:40:38'),
(28, 47, 5, '33333333', 'Entel', '2000', NULL, 'LISTA', '2013-05-15 17:41:25'),
(29, 47, 5, '33333333', 'Entel', '3000', NULL, 'RECHAZADA', '2013-05-15 17:41:55'),
(30, 47, 5, '33333333', 'Entel', '2000', NULL, 'RECHAZADA', '2013-05-15 17:42:50'),
(31, 47, 5, '12345678', 'Entel', '3000', NULL, 'RECHAZADA', '2013-05-15 18:44:44'),
(32, 47, 5, '12345678', 'Entel', '2000', NULL, 'RECHAZADA NO PREPAGO', '2013-05-15 18:46:14'),
(33, 47, 5, '12345677', 'Movistar', '1000', NULL, 'LISTA', '2013-05-15 18:55:59'),
(34, 47, 5, '44444444', 'Movistar', '1500', NULL, 'RECHAZADA', '2013-05-16 02:49:40'),
(35, 47, 5, '88888888', 'Entel', '1000', NULL, 'LISTA', '2013-05-16 03:23:23'),
(36, NULL, NULL, '55555555', 'Entel', '2000', NULL, 'RECHAZADA', '2013-05-16 03:47:23'),
(37, 47, 5, '55555555', 'Entel', '2000', NULL, 'LISTA', '2013-05-16 03:48:12'),
(38, 47, 5, '33333333', 'Entel', '2000', NULL, 'RECHAZADA', '2013-05-16 04:09:57'),
(39, 47, 5, '87654321', 'Entel', '2000', NULL, 'RECHAZADA', '2013-05-16 16:55:39'),
(40, 47, 5, '66554433', 'Movistar', '1500', NULL, 'LISTA', '2013-05-16 17:14:01'),
(41, 47, 5, '98765432', 'Movistar', '1000', NULL, 'RECHAZADA NO PREPAGO', '2013-05-17 02:52:43'),
(42, 47, 5, '44553322', 'Movistar', '1000', NULL, 'LISTA', '2013-05-17 18:43:19'),
(43, 47, 5, '22113344', 'Entel', '2000', NULL, 'RECHAZADA NO PREPAGO', '2013-05-18 02:22:23'),
(44, 47, 5, '11111111', 'Movistar', '990', 'Bolsa con 15 minutos a movistar y red fija', 'PENDIENTE', '2013-05-19 02:45:10'),
(45, 47, 5, '11111111', 'Movistar', '1690', 'Bolsa con 30 minutos a movistar y red fija', 'PENDIENTE', '2013-05-19 02:46:46'),
(46, 47, 5, '11111111', 'Movistar', '500', NULL, 'PENDIENTE', '2013-05-19 02:47:01'),
(47, 47, 5, '11111111', 'Movistar', '3990', 'Bolsa combó 100 minutos + 100 SMS + 100 mms', 'PENDIENTE', '2013-05-19 02:47:16'),
(48, 47, 5, '11111111', 'Entel', '1000', NULL, 'PENDIENTE', '2013-05-19 02:47:33'),
(49, 47, 5, '22222222', 'Movistar', '1690', 'Bolsa con 30 minutos a movistar y red fija', 'LISTA', '2013-05-19 14:59:09'),
(50, 47, 5, '33333333', 'Entel', '3000', NULL, 'LISTA', '2013-05-19 14:59:38'),
(51, 47, 5, '33333333', 'Movistar', '2990', 'Bolsa con 60 minutos a movistar y red fija', 'LISTA', '2013-05-19 16:25:24'),
(52, 47, 5, '44444444', 'Movistar', '2990', 'Bolsa con 60 minutos a movistar y red fija', 'RECHAZADA', '2013-05-19 18:26:59'),
(53, 1, NULL, '85566689', 'Entel', '3000', NULL, 'LISTA', '2013-05-19 18:35:48'),
(54, 47, 5, '33221144', 'Movistar', '1690', 'Bolsa con 30 minutos a movistar y red fija', 'LISTA', '2013-05-19 19:13:42'),
(55, 47, 5, '22113343', 'Movistar', '2990', 'Bolsa con 60 minutos a movistar y red fija', 'RECHAZADA', '2013-05-19 19:43:05'),
(56, 47, 5, '12345654', 'Movistar', '1000', NULL, 'LISTA', '2013-05-19 20:35:09'),
(57, 47, 5, '76543218', 'Entel', '1000', NULL, 'LISTA', '2013-05-19 20:36:12'),
(58, 47, 5, '76543218', 'Entel', '3000', NULL, 'LISTA', '2013-05-19 20:36:53'),
(59, 47, 5, '76543218', 'Entel', '2000', NULL, 'LISTA', '2013-05-19 20:38:02'),
(60, 47, 5, '87654321', 'Movistar', '1690', 'Bolsa con 30 minutos a movistar y red fija', 'RECHAZADA NO PREPAGO', '2013-05-19 20:52:00'),
(61, 47, 5, '11111111', 'Movistar', '3990', 'Bolsa combó 100 minutos + 100 SMS + 100 mms', 'LISTA', '2013-05-19 21:04:01'),
(62, 47, 5, '66666666', 'Movistar', '2990', 'Bolsa con 60 minutos a movistar y red fija', 'RECHAZADA NO PREPAGO', '2013-05-19 21:17:16'),
(63, 47, 5, '77887788', 'Movistar', '990', 'Bolsa con 15 minutos a movistar y red fija', 'LISTA', '2013-05-19 23:15:12'),
(64, 47, 5, '77117711', 'Movistar', '1500', NULL, 'RECHAZADA', '2013-05-20 01:12:04'),
(65, 47, 5, '33333333', 'Movistar', '1690', 'Bolsa con 30 minutos a movistar y red fija', 'LISTA', '2013-05-20 01:45:19'),
(66, 47, 5, '99999999', 'Entel', '3000', NULL, NULL, '2013-05-20 04:00:11');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `reporte_general`
--
CREATE TABLE IF NOT EXISTS `reporte_general` (
`id` int(11)
,`fecha_ingreso` timestamp
,`celular` varchar(45)
,`compania` varchar(45)
,`monto` varchar(45)
,`fecha_atencion` timestamp
,`nombre_operador` varchar(45)
,`nombre_cliente` varchar(45)
,`nombre` varchar(45)
,`ciudad_local` varchar(45)
,`estado` varchar(45)
,`tiempo_respuesta` time
,`operador_id` int(11)
,`atencion_id` int(11)
,`cliente_id` int(11)
,`local_id` int(11)
,`comentario` varchar(200)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT 'ACTIVO',
  `salt` varchar(64) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT 'EMPLEADO',
  `entel` varchar(45) DEFAULT 'SI',
  `movistar` varchar(45) DEFAULT 'SI',
  PRIMARY KEY (`id`),
  KEY `user_fk_u` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user_id`, `username`, `password`, `estado`, `salt`, `tipo`, `entel`, `movistar`) VALUES
(1, 1, 'admin', '97b20f99965554ee4802ff83bbf6ee24', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'ADMIN', 'SI', 'SI'),
(25, 1, 'silvia', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(26, 1, 'sonia', 'ebeb7d4e0bbd506972b47b05d8087f70', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(27, 1, 'jlostria', '7132ec8b1c49197bae341b6650398263', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(28, 1, 'luis', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(29, 1, 'graciela', '2e53e71766518f5974050f194fe68b65', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(30, 1, 'juancarlos', '469f6a8629c2be57688f405bf4596135', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(31, 1, 'marcia', 'a9b2281ccf02a42de74d3526f7bae8fe', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(32, 1, 'illapel', 'aea90e8d102f07114901cf0f1d2090c0', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(33, 1, 'manuel', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(34, 1, 'terminal', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(35, 1, 'tbo', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(36, 1, 'francisco', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(37, 1, 'cybermania', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(38, 1, 'maria', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(39, 1, 'alex', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(40, 1, 'jaime', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(41, 1, 'jp', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(42, 1, 'santa', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(43, 1, 'claudio', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(44, 1, 'calle', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(45, 1, 'puerto', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(46, 1, 'operador', '97b20f99965554ee4802ff83bbf6ee24', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'OPERADOR', 'SI', 'SI'),
(47, 25, 'silvia1', '44759c54cce11ad4467249011e37e674', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(48, 26, 'sonia1', 'ebeb7d4e0bbd506972b47b05d8087f70', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(49, 27, 'jlostria1', '7132ec8b1c49197bae341b6650398263', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(50, 28, 'luis1', '7769363b8f9375fe656abdaac4ebebea', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(51, 28, 'luis2', '9a8f96d2ffdb9d8b4d998f4801f0b78d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(52, 29, 'castro', '2e53e71766518f5974050f194fe68b65', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(53, 30, 'isla', '469f6a8629c2be57688f405bf4596135', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(54, 31, 'marcia1', 'a9b2281ccf02a42de74d3526f7bae8fe', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(55, 32, 'illapel1', 'aea90e8d102f07114901cf0f1d2090c0', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(56, 33, 'baque1', '9055583044f7fba1ec7efca178d8702f', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(57, 33, 'baque2', '3346e94abe8362596ac340774779fda5', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(58, 33, 'baque3', 'cdc6e18a38e1b3ad76bb650d631e88dc', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(59, 33, 'baque9', 'a96ee16f9ba8f6b308763eb5628157a4', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(60, 33, 'loa', '7769363b8f9375fe656abdaac4ebebea', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(61, 34, 'terminal1', '294915cb8ceb47620d89073ea67a6765', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(62, 35, 'tbo1', '7769363b8f9375fe656abdaac4ebebea', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(63, 35, 'tbo2', '9a8f96d2ffdb9d8b4d998f4801f0b78d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(64, 36, 'francisco1', '03c04aa67b1d1a9ee5424c977a4710f8', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(65, 37, 'cyber4', 'a96ee16f9ba8f6b308763eb5628157a4', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(66, 37, 'cyber2', 'b2211c41a65239a12cf3a49786c89b12', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(67, 37, 'cyber11', '6be548725ae2554d70152c58e9737296', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(68, 37, 'cyber22', '73132f9943ed25ba6754e044399c0812', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(69, 37, 'cyber33', 'c545a296fa91235a347160870858303d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(70, 38, 'chile2', '94d3313a69f2b3e1e64b259662f7bb8f', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(71, 38, 'chile22', 'e26e95fe3b42af238f1593069fd89e0e', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(72, 38, 'chile3', '46a3a5de4eabc62033a85fbfe0e96c17', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(73, 38, 'ibañez1', '1f7b12b7609899303e739838ad285eab', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(74, 38, 'tranquilo1', '0f85877c58aefc16b650ce738870b36d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(75, 38, 'chile4', '3985a86c2d4c9ef1b12713c5630cca5b', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(76, 39, 'alex1', '7e4557a2635eea0f79d43494bd884ec9', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(77, 40, 'jaime1', 'd24f1ffde63a83c09a69a330f8fc4ea1', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(78, 41, 'jp1', '01d72108d453b9625a3ca18bafe68bd0', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(79, 41, 'jp2', 'cb4a0e4529ba856b9f9c46111031f8fb', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(80, 41, 'jp3', 'a6fb79d116c91dbab9202d4996a2a3fb', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(81, 41, 'afex1', 'd280dcbef84be4edd03d35a03fa1a94c', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(82, 41, 'afex2', '6f5f6087ae20a07f05d10bbfdb80f411', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(83, 33, 'baque4', '47d3483c2db23ca537f29cf9c669160f', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(84, 33, 'baque5', 'a96ee16f9ba8f6b308763eb5628157a4', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(85, 42, 'bandera1', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(86, 42, 'santa1', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(87, 42, 'bandera2', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(88, 43, 'claudio1', '6b019a9119786e6a1d9a1f2d46898f4d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(89, 44, 'calle1', 'fb53176d053eb57b6fc3508e359cd532', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(90, 1, 'silvana', 'adf66925ea28cfffec0a1834a5b5d25d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(91, 90, 'silvana1', '7142b1a3faaf77b8e2f32e77f00b593d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(92, 45, 'dtoledo', 'c2c2d0cf5c9d922cf78e13ea11f38d9f', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(93, 45, 'vbravo', 'ace0f59b76a352c5b24a6c9eb32f4d6d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(94, 45, 'cmansilla', '28eb825eabdae64c88d8345f186b1cbb', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(95, 45, 'chuichaquelen', 'e9ff0ed990100ddf964905287759b83f', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(96, 45, 'kvidal', '3b3120fab97a16635c8f828bcdeade6d', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(97, 45, 'csoto', 'fa55677893658b097df01b6361842366', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(98, 45, 'apinto', '4ec208e05eb3b10d48f47322fdde7800', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(99, 45, 'chermosilla', '62ea175cbc65f97d6672c22a11a3876a', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(100, 45, 'cperez', 'a0ed74c017614a2c85581aaaedb12cee', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(101, 45, 'cdperez', '461018b082f43e4eaaceeb3f03108ac1', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(102, 45, 'dgrothusen', 'a4ab071960dc98f4dfdbe16ad2615efa', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(103, 45, 'asoto', 'f25643108e87dbac9ef265264ea500a7', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(104, 45, 'duribe', '817ad1a286e6aadc25e03b7a21f59d52', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(105, 45, 'cdiaz', 'bcdd5c8f89b265fb6cf63878c6424918', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(106, 45, 'gcardenas', 'e6d83f135d00da3a7ce634e05b5eefeb', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(107, 45, 'curibe', 'b68a6bf8e9763722aec58662fa726d32', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(108, 45, 'josorio', '06157113de830542760a3678c4f08eea', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(109, 45, 'fvivar', 'c633e0a2839d1a5641cd1872dd2497fc', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(110, 45, 'pfuentes', 'c337d73fad0e310a3c1921a5eae0cfb2', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(111, 45, 'mlopez', 'ea6071b8e18b9554ed9688f8733f46cb', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(112, 45, 'criffo', '647005c9f6fa07b985217dfde2e712d0', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(113, 33, 'baque7', '76308a2a14b1ab1c0845580be9b41db9', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(114, 45, 'cperez', 'e0714193f66227d42ea657b92964d07c', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(115, 45, 'dperez', 'a670cebecf47a1a8683980eafeb9c0a1', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(116, 45, 'saraya', '7cbf256f65e5cef11c09286f031d687b', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(117, 46, 'jorge', 'abcb35b6871c22d4ec00ef04ece8b5f3', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'OPERADOR', 'SI', 'SI'),
(118, 1, 'test_op', '39859e63a43e6a26e42f1e77ddff23ef', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'OPERADOR', 'SI', 'SI'),
(119, 1, 'test_em', '39859e63a43e6a26e42f1e77ddff23ef', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `yiisession`
--

CREATE TABLE IF NOT EXISTS `yiisession` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `expire` (`expire`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `yiisession`
--

INSERT INTO `yiisession` (`id`, `expire`, `data`) VALUES
('ac6479e287e19557cae7c51db65d6dda', 1369023404, ''),
('788c9e5765152666332ada73361a2853', 1369057015, 'a5c3927c6e307a017ed8ee03b97ad079__returnUrl|s:40:"/rch2/recarga/verPendientesOperador.html";');

-- --------------------------------------------------------

--
-- Estructura para la vista `reporte_general`
--
DROP TABLE IF EXISTS `reporte_general`;

CREATE ALGORITHM=UNDEFINED DEFINER=`recargas`@`localhost` SQL SECURITY DEFINER VIEW `reporte_general` AS select `recarga`.`id` AS `id`,`recarga`.`fecha` AS `fecha_ingreso`,`recarga`.`celular` AS `celular`,`recarga`.`compania` AS `compania`,`recarga`.`monto` AS `monto`,`atencion`.`fecha` AS `fecha_atencion`,`usuario_operador`.`username` AS `nombre_operador`,`usuario_cliente`.`username` AS `nombre_cliente`,`local`.`nombre` AS `nombre`,`local`.`ciudad` AS `ciudad_local`,`atencion`.`estado` AS `estado`,timediff(`atencion`.`fecha`,`recarga`.`fecha`) AS `tiempo_respuesta`,`usuario_operador`.`id` AS `operador_id`,`atencion`.`id` AS `atencion_id`,`usuario_cliente`.`id` AS `cliente_id`,`local`.`id` AS `local_id`,`recarga`.`comentario` AS `comentario` from ((((`recarga` join `local` on((`recarga`.`local_id` = `local`.`id`))) join `user` `usuario_cliente` on((`local`.`user_id` = `usuario_cliente`.`id`))) join `atencion` on((`recarga`.`id` = `atencion`.`recarga_id`))) join `user` `usuario_operador` on((`usuario_operador`.`id` = `atencion`.`user_id`)));

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD CONSTRAINT `cupo_fk_a` FOREIGN KEY (`cupo_id`) REFERENCES `cupo` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `recarga_fk_a` FOREIGN KEY (`recarga_id`) REFERENCES `recarga` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk_k` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `user_fk_h` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `user_fk_l` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noprepago`
--
ALTER TABLE `noprepago`
  ADD CONSTRAINT `atencion_fk_npp` FOREIGN KEY (`atencion_id`) REFERENCES `atencion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recarga`
--
ALTER TABLE `recarga`
  ADD CONSTRAINT `user_fk_r` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `local_fk_r` FOREIGN KEY (`local_id`) REFERENCES `local` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_fk_u` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
