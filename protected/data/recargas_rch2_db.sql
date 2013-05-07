-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-05-2013 a las 11:29:19
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
  `fecha` datetime DEFAULT NULL,
  `tiempoRespuesta` datetime DEFAULT NULL,
  `estado` varchar(45) DEFAULT 'LISTA',
  PRIMARY KEY (`id`),
  UNIQUE KEY `recarga_id_UNIQUE` (`recarga_id`),
  KEY `cupo_fk_a` (`cupo_id`),
  KEY `user_fk_k` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `atencion`
--

INSERT INTO `atencion` (`id`, `cupo_id`, `user_id`, `recarga_id`, `fecha`, `tiempoRespuesta`, `estado`) VALUES
(1, NULL, 9, 1, NULL, NULL, 'LISTA'),
(2, NULL, 9, 2, NULL, NULL, 'RECHAZADA');

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
('Empleado', '7', NULL, 'N;'),
('Cliente', '8', NULL, 'N;'),
('Operador', '9', NULL, 'N;'),
('Cliente', '10', NULL, 'N;'),
('Empleado', '11', NULL, 'N;'),
('Operador', '12', NULL, 'N;'),
('Cliente', '13', NULL, 'N;'),
('Empleado', '14', NULL, 'N;'),
('Operador', '21', NULL, 'N;');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `local`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `recarga`
--

INSERT INTO `recarga` (`id`, `user_id`, `local_id`, `celular`, `compania`, `monto`, `comentario`, `estado`, `fecha`) VALUES
(1, 7, 1, '55667788', 'Movistar', '1000', NULL, 'LISTA', '2013-04-10 13:26:16'),
(2, 1, NULL, '12354654', 'Entel', '2000', NULL, 'RECHAZADA', '2013-05-06 18:54:17');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `reporte_recarga`
--
CREATE TABLE IF NOT EXISTS `reporte_recarga` (
`OT` int(11)
,`compania` varchar(45)
,`monto` varchar(45)
,`celular` varchar(45)
,`fecha_ingreso` timestamp
,`fecha_atencion` datetime
,`tiempo_respuesta` datetime
,`Empleado` varchar(45)
,`Cliente` varchar(45)
,`estado` varchar(45)
,`Operador` varchar(45)
,`LOCAL` varchar(45)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user_id`, `username`, `password`, `estado`, `salt`, `tipo`, `entel`, `movistar`) VALUES
(1, 1, 'admin', '97b20f99965554ee4802ff83bbf6ee24', 'ACTIVO', '28b206548469ce62182048fd9cf91760', NULL, 'SI', 'SI'),
(7, 8, 'empleado', '9401b8c7297832c567ae922cc596a4dd', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(8, NULL, 'cliente', '8cf529a608d0fc7edc35fb130ffea391', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'CLIENTE', 'SI', 'SI'),
(9, 1, 'operador', '97b20f99965554ee4802ff83bbf6ee24', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'OPERADOR', 'SI', 'SI'),
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
(20, 16, 'fco', '3dc60b17f3c16ca2683fc51213357127', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'EMPLEADO', 'SI', 'SI'),
(21, 1, 'simon', '3dc60b17f3c16ca2683fc51213357127', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'OPERADOR', 'SI', 'SI'),
(22, 1, 'operador_prueba', '39859e63a43e6a26e42f1e77ddff23ef', 'ACTIVO', '28b206548469ce62182048fd9cf91760', 'OPERADOR', 'SI', 'SI');

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
('21f297919e0b93d1df2c9220236c9396', 1367867059, '_local|N;_id|s:1:"1";_tipo|N;_username|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__id|s:1:"1";a5c3927c6e307a017ed8ee03b97ad079__name|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__states|a:0:{}a5c3927c6e307a017ed8ee03b97ad079Rights_isSuperuser|b:1;'),
('7e51faa0404c80670f08635563b192a9', 1367866577, ''),
('e28dcc930a79cd658ab2e16510fa24f1', 1367866583, '_local|N;_id|s:1:"1";_tipo|N;_username|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__id|s:1:"1";a5c3927c6e307a017ed8ee03b97ad079__name|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__states|a:0:{}a5c3927c6e307a017ed8ee03b97ad079Rights_isSuperuser|b:1;'),
('3f41ef4f13036796664cfcdafedb5bc2', 1367867308, ''),
('8372321f35bcdb040e3f963c7d129e2b', 1367867399, '_local|N;_id|s:1:"9";_tipo|s:8:"OPERADOR";_username|s:8:"operador";a5c3927c6e307a017ed8ee03b97ad079__id|s:1:"9";a5c3927c6e307a017ed8ee03b97ad079__name|s:8:"operador";a5c3927c6e307a017ed8ee03b97ad079__states|a:0:{}'),
('1fa0053eaefbfaa3f7660c1c5ff5280b', 1367867293, 'a5c3927c6e307a017ed8ee03b97ad079__returnUrl|s:13:"/rch2/recarga";_local|N;_id|s:1:"1";_tipo|N;_username|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__id|s:1:"1";a5c3927c6e307a017ed8ee03b97ad079__name|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__states|a:0:{}a5c3927c6e307a017ed8ee03b97ad079Rights_isSuperuser|b:1;'),
('d3ad2a4c0dbbe593769ab7e136c79ae6', 1367867204, ''),
('13dddb1420ce57fec3765ed448f406a8', 1367867229, 'a5c3927c6e307a017ed8ee03b97ad079__returnUrl|s:13:"/rch2/recarga";'),
('f4bc77ef69df880a0aeba19759291fd5', 1367867170, 'a5c3927c6e307a017ed8ee03b97ad079__returnUrl|s:10:"/rch2/user";_local|N;_id|s:1:"1";_tipo|N;_username|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__id|s:1:"1";a5c3927c6e307a017ed8ee03b97ad079__name|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__states|a:0:{}a5c3927c6e307a017ed8ee03b97ad079Rights_isSuperuser|b:1;'),
('b682e51a3baa34759dc4f4664fff4055', 1367867116, 'a5c3927c6e307a017ed8ee03b97ad079__returnUrl|s:10:"/rch2/user";'),
('ab3d3c8066df1b7c60d0e9b2b72b1f5b', 1367867107, ''),
('c18da93502ffa59c7b20e5dbc692005e', 1367867130, ''),
('dfd45f110996f55063c4da65b1f005f4', 1367867195, ''),
('1850ed5c0c0069328c8c0851d52348a9', 1367867229, ''),
('d4f0230bbec023c42241fb8764f817a2', 1367940325, ''),
('a4d967f3be331b28c5edcc9adf55c92e', 1367939608, ''),
('e92f1be4b30b40b7276207240b7a30ce', 1367939615, '_local|N;_id|s:1:"1";_tipo|N;_username|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__id|s:1:"1";a5c3927c6e307a017ed8ee03b97ad079__name|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__states|a:0:{}a5c3927c6e307a017ed8ee03b97ad079Rights_isSuperuser|b:1;'),
('fb28567a91265a1dd7d0e79b9e474441', 1367940358, '_local|N;_id|s:1:"1";_tipo|N;_username|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__id|s:1:"1";a5c3927c6e307a017ed8ee03b97ad079__name|s:5:"admin";a5c3927c6e307a017ed8ee03b97ad079__states|a:0:{}a5c3927c6e307a017ed8ee03b97ad079Rights_isSuperuser|b:1;');

-- --------------------------------------------------------

--
-- Estructura para la vista `reporte_recarga`
--
DROP TABLE IF EXISTS `reporte_recarga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`recargas`@`localhost` SQL SECURITY DEFINER VIEW `reporte_recarga` AS select `r`.`id` AS `OT`,`r`.`compania` AS `compania`,`r`.`monto` AS `monto`,`r`.`celular` AS `celular`,`r`.`fecha` AS `fecha_ingreso`,`a`.`fecha` AS `fecha_atencion`,`a`.`tiempoRespuesta` AS `tiempo_respuesta`,`u`.`username` AS `Empleado`,`usr`.`username` AS `Cliente`,`a`.`estado` AS `estado`,`o`.`username` AS `Operador`,`l`.`nombre` AS `LOCAL` from (((((`recarga` `r` join `user` `u`) join `user` `usr`) join `atencion` `a`) join `user` `o`) join `local` `l`) where ((`u`.`id` = `r`.`user_id`) and (`u`.`user_id` = `usr`.`id`) and (`a`.`recarga_id` = `r`.`id`) and (`o`.`id` = `a`.`user_id`) and (`usr`.`id` = `l`.`user_id`) and (`r`.`local_id` = `l`.`id`)) order by `usr`.`id`;

--
-- Restricciones para tablas volcadas
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
