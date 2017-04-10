-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-03-2017 a las 13:28:17
-- Versión del servidor: 5.5.54-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Renfe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Billete`
--

CREATE TABLE IF NOT EXISTS `Billete` (
  `ID_billete` int(4) NOT NULL AUTO_INCREMENT,
  `Tipo_descuento` varchar(100) NOT NULL,
  `Asiento` varchar(100) NOT NULL,
  `Precio_fin` decimal(3,2) NOT NULL,
  `Caducidad` datetime NOT NULL,
  `Origen` varchar(100) NOT NULL,
  `Destino` varchar(100) NOT NULL,
  `Dia_viaje` date NOT NULL,
  `Hora_salida` time NOT NULL,
  `Hora_llegada` time NOT NULL,
  PRIMARY KEY (`ID_billete`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Volcado de datos para la tabla `Billete`
--

INSERT INTO `Billete` (`ID_billete`, `Tipo_descuento`, `Asiento`, `Precio_fin`, `Caducidad`, `Origen`, `Destino`, `Dia_viaje`, `Hora_salida`, `Hora_llegada`) VALUES
(2, 'Jubilado', 'V7', 9.99, '2016-12-31 00:00:00', 'Valdepeñas', 'Madrid', '2016-12-31', '19:40:00', '21:50:00'),
(3, 'Familia numerosa', 'V8', 9.99, '2016-12-31 00:00:00', 'Valdepeñas', 'Madrid', '2016-12-31', '17:30:00', '19:40:00'),
(4, 'Carnet Joven', 'V3', 9.99, '2016-12-31 00:00:00', 'Valdepeñas', 'Madrid', '2016-12-31', '17:30:00', '19:40:00'),
(57, '10', '14P', 9.99, '2017-03-24 00:00:00', 'Madrid - Chamartín', 'Alcázar de San Juan', '2017-03-17', '12:00:00', '15:15:00'),
(59, '10', '6P', 9.99, '2017-03-24 00:00:00', 'Madrid - Chamartín', 'Almagro', '2017-03-17', '12:00:00', '18:40:00'),
(60, '10', '6P', 9.99, '2017-03-24 00:00:00', 'Madrid - Chamartín', 'Almagro', '2017-03-17', '12:00:00', '18:40:00'),
(61, '10', '6P', 9.99, '2017-03-24 00:00:00', 'Madrid - Chamartín', 'Almagro', '2017-03-17', '12:00:00', '18:40:00'),
(62, '10', '6P', 9.99, '2017-03-24 00:00:00', 'Madrid - Chamartín', 'Almagro', '2017-03-17', '12:00:00', '18:40:00'),
(63, '10', '6P', 9.99, '2017-03-24 00:00:00', 'Madrid - Chamartín', 'Almagro', '2017-03-17', '12:00:00', '18:40:00'),
(65, '10', '13V', 9.99, '2017-03-24 00:00:00', 'Madrid - Chamartín', 'Alcázar de San Juan', '2017-03-18', '12:00:00', '15:15:00'),
(66, '10', '14P', 9.99, '2017-03-19 00:00:00', 'Madrid - Chamartín', 'Villacañas', '2017-03-18', '12:00:00', '14:30:00'),
(67, '10', '13V', 9.99, '2017-03-31 00:00:00', 'Madrid - Chamartín', 'Villacañas', '2017-03-27', '12:00:00', '14:30:00'),
(68, '10', '5V', 9.99, '2017-03-30 00:00:00', 'Madrid - Chamartín', 'Daimiel', '2017-03-29', '12:00:00', '18:00:00'),
(69, '', '1V', 0.00, '0000-00-00 00:00:00', '', '', '0000-00-00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE IF NOT EXISTS `Cliente` (
  `DNI` varchar(10) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido1` varchar(100) NOT NULL,
  `Apellido2` varchar(100) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Sexo` enum('Hombre','Mujer','','') DEFAULT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Fecha_nacimiento` datetime DEFAULT NULL,
  `Nivel` int(1) NOT NULL,
  `Clave` varchar(200) NOT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`DNI`, `Nombre`, `Apellido1`, `Apellido2`, `Telefono`, `Direccion`, `Sexo`, `Imagen`, `Edad`, `Fecha_nacimiento`, `Nivel`, `Clave`) VALUES
('32241231 P', 'ARIADNA', 'FAGDSAG', 'FSDAAS', 525533333, 'FDAFSD', 'Hombre', '2cv.jpg', 28, '1987-03-17 00:00:00', 1, 'YYr0LPRFE0'),
('53316433 H', 'Estefanía', 'Cantero', 'Fernández', 222222222, 'Calle Rotermeller 4', 'Mujer', '', 27, '1989-05-16 00:00:00', 1, 'YYr0LPRFE0'),
('53316434 L', 'Ariadna', 'Cantero', 'Fernández', 211111111, 'Calle Frambuesa 4', 'Mujer', '', 27, '1989-05-16 00:00:00', 0, 'ds2IqBIQsb'),
('53316434 R', 'Estefani', 'Cantero', 'Fernández', 618575797, 'Enrique Aguilar Madrid', 'Mujer', 'agenciaV.jpg', 27, '1989-03-17 00:00:00', 1, '8GQZacHio5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Compra`
--

CREATE TABLE IF NOT EXISTS `Compra` (
  `ID_compra` int(4) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `ID_billete` int(4) NOT NULL,
  `Aplique_descuento` int(4) NOT NULL,
  PRIMARY KEY (`ID_compra`),
  KEY `DNI` (`DNI`),
  KEY `ID_billete` (`ID_billete`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Compra`
--

INSERT INTO `Compra` (`ID_compra`, `DNI`, `ID_billete`, `Aplique_descuento`) VALUES
(1, '53316434 L', 1, 5),
(2, '53316433 H', 2, 10),
(3, '53316435 P', 3, 15),
(4, '53316453 H', 4, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estacion`
--

CREATE TABLE IF NOT EXISTS `Estacion` (
  `ID_estacion` int(4) NOT NULL,
  `Nombre_estacion` varchar(100) NOT NULL,
  `Pais` varchar(100) NOT NULL,
  `Provincia` varchar(100) NOT NULL,
  `Localidad` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Horario` time NOT NULL,
  `Telefono` int(9) NOT NULL,
  PRIMARY KEY (`ID_estacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Estacion`
--

INSERT INTO `Estacion` (`ID_estacion`, `Nombre_estacion`, `Pais`, `Provincia`, `Localidad`, `Direccion`, `Horario`, `Telefono`) VALUES
(1, 'Madrid - Chamartín', 'España', 'Madrid', 'Madrid', 'Calle', '12:00:00', 222222224),
(2, 'Madrid - Atocha - Cercanías', 'España', 'Madrid', 'Madrid', 'Calle', '12:15:00', 222222224),
(3, 'Aranjuez', 'España', 'Madrid', 'Madrid', 'Calle', '13:30:00', 222222224),
(4, 'Villacañas', 'España', 'Toledo', 'Toledo', 'Calle', '14:30:00', 222222224),
(5, 'Alcázar de San Juan', 'España', 'Ciudad Real', 'Ciudad Real', 'Calle', '15:15:00', 222222224),
(6, 'Cinco Casas', 'España', 'Ciudad Real', 'Ciudad Real', 'Calle', '16:30:00', 222222224),
(7, 'Manzanares', 'España', 'Ciudad Real', 'Ciudad Real', 'Calle', '17:30:00', 222222224),
(8, 'Daimiel', 'España', 'Ciudad Real', 'Ciudad Real', 'Calle', '18:00:00', 222222224),
(9, 'Almagro', 'España', 'Ciudad Real', 'Ciudad Real', 'Calle', '18:40:00', 222222224),
(10, 'Ciudad Real', 'España', 'Ciudad Real', 'Ciudad Real', 'Calle', '19:15:00', 222222224);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tarifa`
--

CREATE TABLE IF NOT EXISTS `Tarifa` (
  `ID_estacion_origen_tray` int(4) NOT NULL AUTO_INCREMENT,
  `ID_estacion_destino` int(4) NOT NULL,
  `ID_estacion` int(4) NOT NULL,
  `Aplique_descuento` int(4) NOT NULL,
  `Precio` decimal(3,2) NOT NULL,
  PRIMARY KEY (`ID_estacion_origen_tray`,`ID_estacion_destino`),
  KEY `ID_estacion` (`ID_estacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `Tarifa`
--

INSERT INTO `Tarifa` (`ID_estacion_origen_tray`, `ID_estacion_destino`, `ID_estacion`, `Aplique_descuento`, `Precio`) VALUES
(1, 2, 0, 5, 2.00),
(2, 3, 0, 10, 2.50),
(3, 4, 0, 15, 3.00),
(4, 5, 0, 20, 3.50),
(5, 6, 0, 5, 4.00),
(6, 7, 0, 5, 4.50),
(7, 8, 0, 5, 5.00),
(8, 9, 0, 5, 5.50),
(9, 10, 0, 5, 6.00),
(10, 1, 0, 5, 6.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Trayecto_pasapor`
--

CREATE TABLE IF NOT EXISTS `Trayecto_pasapor` (
  `ID_trayecto_pasapor` int(4) NOT NULL,
  `ID_tren` int(6) NOT NULL AUTO_INCREMENT,
  `ID_estacion` int(4) NOT NULL,
  `ID_billete` int(4) NOT NULL,
  `Hora_salida` time NOT NULL,
  `Hora_llegada` time NOT NULL,
  PRIMARY KEY (`ID_trayecto_pasapor`),
  KEY `ID_tren` (`ID_tren`),
  KEY `ID_estacion` (`ID_estacion`),
  KEY `ID_billete` (`ID_billete`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `Trayecto_pasapor`
--

INSERT INTO `Trayecto_pasapor` (`ID_trayecto_pasapor`, `ID_tren`, `ID_estacion`, `ID_billete`, `Hora_salida`, `Hora_llegada`) VALUES
(1, 1, 7, 1, '17:30:00', '19:30:00'),
(2, 2, 27, 2, '17:30:00', '19:30:00'),
(3, 3, 3, 3, '17:30:00', '19:30:00'),
(4, 4, 4, 4, '17:30:00', '19:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tren`
--

CREATE TABLE IF NOT EXISTS `Tren` (
  `ID_tren` int(6) NOT NULL AUTO_INCREMENT,
  `Tipo_tren` varchar(100) NOT NULL,
  `Caracteristicas` varchar(100) NOT NULL,
  `Aforo` int(4) NOT NULL,
  `Disponibilidad` enum('SI','NO') NOT NULL,
  PRIMARY KEY (`ID_tren`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `Tren`
--

INSERT INTO `Tren` (`ID_tren`, `Tipo_tren`, `Caracteristicas`, `Aforo`, `Disponibilidad`) VALUES
(1, 'TALGO', '8 metros de largo', 1000, 'SI'),
(2, 'Media distancia', '8 metros de largo', 1000, 'SI'),
(3, 'Larga distancia', '8 metros de largo', 800, 'NO'),
(4, 'TALGO', '8 metros de largo', 900, 'SI');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
