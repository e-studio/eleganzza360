-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2018 a las 04:42:13
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idCitas` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tratamiento` varchar(255) NOT NULL,
  `empleada` varchar(255) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `estado` text,
  `agendo` int(11) NOT NULL,
  `referida` varchar(70) NOT NULL,
  `nota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCitas`, `title`, `tratamiento`, `empleada`, `start`, `end`, `estado`, `agendo`, `referida`, `nota`) VALUES
(1, 'Alan Urbina', 'Masaje Corporal', '', '2018-09-08 09:15:00', '2018-09-08 10:00:00', '', 0, '', ''),
(2, 'Alan Didier', 'Botox', '130', '2018-08-02 13:05:00', '2018-08-02 13:50:00', NULL, 0, '', ''),
(4, 'Alan Didier', 'Masaje', '555', '2018-08-02 12:05:00', '2018-08-02 12:50:00', NULL, 0, '', ''),
(5, 'Vilma Portillo Armendariz', 'Depilacion', '555', '2018-08-01 10:00:00', '2018-08-01 10:50:00', NULL, 0, '', ''),
(6, 'Vilma Portillo Armendariz', 'Depilacion', '123456', '2018-08-01 10:00:00', '2018-08-01 10:45:00', 'pago', 0, '', ''),
(7, 'Vilma Portillo', 'Depilacion', '123456', '2018-08-01 10:00:00', '2018-08-01 10:45:00', 'pago', 0, '', ''),
(8, 'Vilma Portillo', 'Depilacion', '123456', '2018-08-01 10:00:00', '2018-08-01 10:45:00', 'pago', 0, '', ''),
(9, 'Vilma Portillo', 'Depilacion', '123456', '2018-08-01 10:00:00', '2018-08-01 10:45:00', 'pago', 0, '', ''),
(10, 'Vilma Portillo', 'Depilacion', '123456', '2018-08-01 10:00:00', '2018-08-01 10:45:00', 'pago', 0, '', ''),
(11, 'Vilma Portillo', 'masaje', '555555', '2018-08-08 12:01:00', '2018-08-08 12:46:00', 'atendido', 0, '', ''),
(12, 'Alan Didier', 'Masaje', '111', '2018-08-09 13:05:00', '2018-08-09 13:50:00', NULL, 0, '', ''),
(13, 'Vilma Portillo Armendariz', 'prueba', '12345', '2018-08-15 09:00:00', '2018-08-15 09:45:00', NULL, 0, '', ''),
(14, 'Ricardo Urbina Najera', '', '', '2018-09-01 09:00:00', '2018-09-01 09:45:00', NULL, 0, '', ''),
(15, 'Alan Didier Urbina Najera', 'asdsad', '', '2018-08-25 09:00:00', '2018-08-25 09:45:00', NULL, 0, '', ''),
(16, '1', 'qwe', NULL, '2018-08-23 09:00:00', '2018-08-23 09:45:00', NULL, 0, '', ''),
(17, 'Ricardo Urbina Najera', 'prod1', '12345', '2018-08-17 20:00:00', '2018-08-17 20:45:00', NULL, 0, '', ''),
(18, 'Vilma Portillo Armendariz', '', '', '2018-08-31 09:00:00', '2018-08-31 09:45:00', NULL, 0, '', ''),
(19, 'Alan Didier Urbina Najera', 'Depilacion Piernas', '123', '2018-08-30 09:00:00', '2018-08-30 09:45:00', NULL, 0, '', ''),
(21, 'Ricardo Urbina Najera', 'Masaje Corporal', '', '2018-08-27 12:10:00', '2018-08-27 12:55:00', NULL, 0, '', ''),
(22, '5', 'Depilacion Piernas', NULL, '2018-09-06 09:00:00', '2018-09-06 09:45:00', NULL, 0, '', ''),
(23, 'Alan Didier Urbina Najera', 'Depilacion Piernas', NULL, '2018-09-07 09:00:00', '2018-09-07 09:45:00', NULL, 147, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCitas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idCitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
