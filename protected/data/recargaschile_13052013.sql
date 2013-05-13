-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-05-2013 a las 20:55:23
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `recargaschile`
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
  `tiempoRespuesta` datetime DEFAULT NULL,
  `estado` varchar(45) DEFAULT 'LISTA',
  PRIMARY KEY (`id`),
  UNIQUE KEY `recarga_id_UNIQUE` (`recarga_id`),
  KEY `cupo_fk_a` (`cupo_id`),
  KEY `user_fk_k` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `atencion`
--

INSERT INTO `atencion` (`id`, `cupo_id`, `user_id`, `recarga_id`, `fecha`, `tiempoRespuesta`, `estado`) VALUES
(1, NULL, 9, 1, '2013-05-31 13:52:52', NULL, 'LISTA'),
(2, NULL, 9, 2, '2013-05-31 13:52:55', NULL, 'RECHAZADA'),
(3, NULL, 9, 3, '2013-05-09 13:52:58', NULL, 'LISTA'),
(4, NULL, 9, 4, '2013-05-22 13:53:00', NULL, 'RECHAZADA'),
(5, NULL, 9, 5, '2013-05-11 04:51:35', NULL, 'LISTA'),
(6, NULL, 9, 8, '2013-05-13 14:51:09', NULL, 'PROCESANDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, 'N;'),
('Empleado', '7', NULL, 'N;'),
('Cliente', '8', NULL, 'N;'),
('Operador', '9', NULL, 'N;'),
('Cliente', '10', NULL, 'N;'),
('Empleado', '11', NULL, 'N;'),
('Operador', '12', NULL, 'N;'),
('Cliente', '13', NULL, 'N;'),
('Empleado', '14', NULL, 'N;'),
('Operador', '21', NULL, 'N;'),
('Operador', '22', NULL, 'N;'),
('Operador', '23', NULL, 'N;'),
('Cliente', '24', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('Empleado', 2, 'Empleado', NULL, 'N;'),
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
('Operador', 2, 'Operador', NULL, 'N;'),
('Cliente', 2, 'Cliente', NULL, 'N;'),
('Local.VerLocalesCliente', 0, NULL, NULL, 'N;'),
('User.Ingresar', 0, NULL, NULL, 'N;'),
('User.Elegir', 0, NULL, NULL, 'N;'),
('Local.VerLocalCliente', 0, NULL, NULL, 'N;'),
('Atencion.VerListasOperador', 0, NULL, NULL, 'N;'),
('Recarga.VerListasEmpleado', 0, NULL, NULL, 'N;'),
('Atencion.CreaAtencion', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Authenticated', 'Recarga.*'),
('Authenticated', 'User.*'),
('Cliente', 'Local.VerLocalCliente'),
('Cliente', 'Local.VerLocalesCliente'),
('Empleado', 'Recarga.*'),
('Empleado', 'Recarga.VerListasEmpleado'),
('Empleado', 'Recarga.VerPendientesEmpleado'),
('Empleado', 'User.*'),
('Operador', 'Atencion.CreaAtencion'),
('Operador', 'Atencion.Update'),
('Operador', 'Atencion.VerListasOperador'),
('Operador', 'Atencion.View'),
('Operador', 'Recarga.VerPendientesOperador');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `cupo`
--

INSERT INTO `cupo` (`id`, `numero`, `cupo`, `fecha`, `estado`) VALUES
(1, NULL, 1, NULL, 'DISPONIBLE');

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

--
-- Volcar la base de datos para la tabla `estado`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `local`
--

INSERT INTO `local` (`id`, `user_id`, `ciudad`, `direccion`, `telefono`, `nombre`) VALUES
(1, 8, 'Arica', 'Colon #74', '55534232', 'Colon'),
(2, 8, 'Arica', 'Baquedano', '85566689', 'Baquedano'),
(3, 10, 'Iquique', 'Las tarrea 345', '789456', 'Tarreas'),
(4, 13, 'Talca', 'Tucapel #1221', '85566689', 'puerto1');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `noprepago`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `recarga`
--

INSERT INTO `recarga` (`id`, `user_id`, `local_id`, `celular`, `compania`, `monto`, `comentario`, `estado`, `fecha`) VALUES
(1, 7, 1, '55667788', 'Movistar', '1000', NULL, 'LISTA', '2013-05-31 13:53:52'),
(2, 1, NULL, '12354654', 'Entel', '2000', NULL, 'RECHAZADA', '2013-05-06 14:54:17'),
(3, 7, 1, '85566689', 'Movistar', '500', NULL, 'LISTA', '2013-05-10 22:34:27'),
(4, 7, 1, '85566689', 'Movistar', '500', NULL, 'RECHAZADA', '2013-05-10 22:37:27'),
(5, 7, 1, '85555555', 'Entel', '1000', NULL, 'LISTA', '2013-05-10 22:39:56'),
(6, 1, NULL, '23423423', 'Movistar', '500', NULL, 'PENDIENTE', '2013-05-13 14:33:26'),
(7, 1, NULL, '23423423', 'Movistar', '500', NULL, 'PENDIENTE', '2013-05-13 14:33:33'),
(8, 1, NULL, '11111111', 'Movistar', '500', NULL, 'PROCESANDO', '2013-05-13 14:33:40'),
(9, 1, NULL, '33333333', 'Entel', '3000', NULL, 'PENDIENTE', '2013-05-13 14:33:50'),
(10, 1, NULL, '99999999', 'Movistar', '1500', NULL, 'PENDIENTE', '2013-05-13 14:34:06'),
(11, 1, NULL, '22222222', 'Movistar', '500', NULL, 'PENDIENTE', '2013-05-13 14:34:19'),
(12, 1, NULL, '55555555', 'Movistar', '500', NULL, 'PENDIENTE', '2013-05-13 14:34:27');

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
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `rights`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcar la base de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user_id`, `username`, `password`, `estado`, `salt`, `tipo`, `entel`, `movistar`) VALUES
(1, 1, 'admin', '97b20f99965554ee4802ff83bbf6ee24', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'ADMIN', 'SI', 'SI'),
(7, 8, 'empleado', '39859e63a43e6a26e42f1e77ddff23ef', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(8, NULL, 'cliente', '8cf529a608d0fc7edc35fb130ffea391', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(9, 1, 'operador', '39859e63a43e6a26e42f1e77ddff23ef', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'OPERADOR', 'SI', 'SI'),
(10, NULL, 'manuel_schaff', '8cf529a608d0fc7edc35fb130ffea391', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(11, 10, 'empleado_schaff', '8cf529a608d0fc7edc35fb130ffea391', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(12, NULL, 'operador_rch', '8cf529a608d0fc7edc35fb130ffea391', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'OPERADOR', 'SI', 'SI'),
(13, 1, 'puerto', '8cf529a608d0fc7edc35fb130ffea391', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(14, 13, 'empleado_puerto', '8cf529a608d0fc7edc35fb130ffea391', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(15, 1, 'cliente_prueba', '97b20f99965554ee4802ff83bbf6ee24', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(16, 8, 'simon', '3dc60b17f3c16ca2683fc51213357127', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(17, 16, 'simon', '3dc60b17f3c16ca2683fc51213357127', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(18, 8, 'Illapel', '2d5e85005ed4078770d21716050a416c', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(19, 1, 'Isla', '2d5e85005ed4078770d21716050a416c', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(21, 1, 'simon', '3dc60b17f3c16ca2683fc51213357127', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'OPERADOR', 'SI', 'SI'),
(22, 1, 'operador_prueba', '39859e63a43e6a26e42f1e77ddff23ef', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'OPERADOR', 'SI', 'SI'),
(24, 1, 'schaf_cliente', '39859e63a43e6a26e42f1e77ddff23ef', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI');

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
-- Volcar la base de datos para la tabla `yiisession`
--

INSERT INTO `yiisession` (`id`, `expire`, `data`) VALUES
('24manni4i5b0kdkcrf97ad96g7', 1368240914, '_local|s:1:"1";_id|s:1:"7";_tipo|s:8:"EMPLEADO";_username|s:8:"empleado";da12acc9d269163383dd9c5d61aaa686__id|s:1:"7";da12acc9d269163383dd9c5d61aaa686__name|s:8:"empleado";da12acc9d269163383dd9c5d61aaa686__states|a:0:{}'),
('nj7jr1uft6t60mh374u0suc417', 1368471981, '_local|N;_id|s:1:"9";_tipo|s:8:"OPERADOR";_username|s:8:"operador";da12acc9d269163383dd9c5d61aaa686__id|s:1:"9";da12acc9d269163383dd9c5d61aaa686__name|s:8:"operador";da12acc9d269163383dd9c5d61aaa686__states|a:0:{}');

-- --------------------------------------------------------

--
-- Estructura para la vista `reporte_general`
--
DROP TABLE IF EXISTS `reporte_general`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte_general` AS select `recarga`.`id` AS `id`,`recarga`.`fecha` AS `fecha_ingreso`,`recarga`.`celular` AS `celular`,`recarga`.`compania` AS `compania`,`recarga`.`monto` AS `monto`,`atencion`.`fecha` AS `fecha_atencion`,`usuario_operador`.`username` AS `nombre_operador`,`usuario_cliente`.`username` AS `nombre_cliente`,`local`.`nombre` AS `nombre`,`local`.`ciudad` AS `ciudad_local`,`atencion`.`estado` AS `estado`,timediff(`recarga`.`fecha`,`atencion`.`fecha`) AS `tiempo_respuesta`,`usuario_operador`.`id` AS `operador_id`,`atencion`.`id` AS `atencion_id`,`usuario_cliente`.`id` AS `cliente_id`,`local`.`id` AS `local_id` from ((((`recarga` join `local` on((`recarga`.`local_id` = `local`.`id`))) join `user` `usuario_cliente` on((`local`.`user_id` = `usuario_cliente`.`id`))) join `atencion` on((`recarga`.`id` = `atencion`.`recarga_id`))) join `user` `usuario_operador` on((`usuario_operador`.`id` = `atencion`.`user_id`)));

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD CONSTRAINT `cupo_fk_a` FOREIGN KEY (`cupo_id`) REFERENCES `cupo` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `recarga_fk_a` FOREIGN KEY (`recarga_id`) REFERENCES `recarga` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk_k` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `user_fk_h` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `user_fk_l` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `noprepago`
--
ALTER TABLE `noprepago`
  ADD CONSTRAINT `atencion_fk_npp` FOREIGN KEY (`atencion_id`) REFERENCES `atencion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recarga`
--
ALTER TABLE `recarga`
  ADD CONSTRAINT `local_fk_r` FOREIGN KEY (`local_id`) REFERENCES `local` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk_r` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_fk_u` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
