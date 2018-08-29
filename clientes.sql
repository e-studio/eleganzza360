-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2018 a las 04:42:40
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `nomCompleto` varchar(70) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `movil` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `alergias` varchar(70) NOT NULL,
  `sangre` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `nomCompleto`, `telefono`, `movil`, `email`, `direccion`, `fechaNac`, `alergias`, `sangre`) VALUES
(1, 'Alan Didier', 'Urbina Najera', '', '6255825230', '6251465670', 'negurbinayeye@gmail.com', '94 y Villa Santa Monica 9406', '1984-08-13', '', ''),
(2, 'Vilma', 'Portillo Armendariz', '', '6255836328', '6251278325', 'vilma_minino@hotmail.com', '94 y Villa Santa Monica 9406', '1988-04-11', '', ''),
(5, 'Ricardo', 'Urbina Najera', '', '1234567', '1234567980', 'rickyurbina@gmail.com', NULL, NULL, '', ''),
(6, NULL, NULL, '0', '123', '123456', 'violeta@violeta.com', 'su casa', '2018-08-01', '', ''),
(7, NULL, NULL, '0', '123', '123456', 'violeta@violeta.com', 'su casa', '2018-08-01', '', ''),
(8, NULL, NULL, '0', '5555555', '7777777777', 'kevin@hotmail.com', 'su casa', '2018-07-31', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
