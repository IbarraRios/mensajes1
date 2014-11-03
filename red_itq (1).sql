-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2014 a las 17:56:21
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `red_itq`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `Descripcion`) VALUES
(3, 'Administrador'),
(4, 'Usuario'),
(6, 'temporal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_padre` int(11) NOT NULL DEFAULT '0',
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `Asunto` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `Archivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `id_padre`, `id_categoria`, `id_usuario`, `Asunto`, `descripcion`, `fecha_publicacion`, `Archivo`) VALUES
(1, 0, 1, 1, 'todos van a reprobar ', 'si no hacemos nada vamos a reprobar ', '2014-10-27', ''),
(2, 1, 1, 2, 'respuesta', 'yo tengo que trabajar mas que los demas ', '2014-10-27', ''),
(3, 1, 1, 3, 'respuesta', 'yo estoy de repe asi que voy a pasar con 100', '2014-10-27', ''),
(4, 1, 2, 0, 'REspuesta', 'por eso tenemos que trabajar\r\n', '2014-10-22', ''),
(5, 1, 2, 0, 'REspuesta', 'tengo que aprobar por eso voy hacer muchos ejemplos\r\n		', '2014-10-22', ''),
(6, 1, 2, 0, 'REspuesta', 'hhhhh', '2014-10-22', ''),
(7, 1, 2, 0, 'REspuesta', 'hhhhh', '2014-10-22', ''),
(8, 1, 2, 0, 'REspuesta', 'Mensaje\r\n		', '2014-10-22', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id_status`, `Descripcion`) VALUES
(26, 'Activo'),
(27, 'Suspendido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE IF NOT EXISTS `tipo_usuarios` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id_tipo_usuario`, `descripcion`) VALUES
(3, 'Administrador'),
(5, 'registrado'),
(6, 'invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_corto` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_largo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenna` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `correo_electronico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_corto`, `nombre_largo`, `contrasenna`, `id_tipo_usuario`, `id_status`, `correo_electronico`) VALUES
(1, 'Antonio', 'Antonio Ibarra', '54c67f9cf5639fbc5e7d9052cd2ce301', 3, 1, 'reise234@hotmail.com'),
(3, 'juan', 'juan antonio', '54c67f9cf5639fbc5e7d9052cd2ce301', 5, 2, 'reisew@hotmail.com'),
(6, 'pedro', 'pedro almaraz', '54c67f9cf5639fbc5e7d9052cd2ce301', 3, 1, 'reisec@hotmail.com'),
(7, 'Invitado', 'Invitado', '102ddaf691e1615d5dacd4c86299bfa4', 6, 1, 'sistema@hotmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
