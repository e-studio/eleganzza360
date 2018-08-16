-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2018 a las 02:09:41
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
  `idc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCitas`, `title`, `tratamiento`, `empleada`, `start`, `end`, `estado`, `idc`) VALUES
(1, 'Alan Urbina', 'Masaje Corporal', '', '2018-08-03 09:15:00', '2018-08-03 10:00:00', '', 0),
(2, 'Alan Didier', 'Botox', '130', '2018-08-02 13:05:00', '2018-08-02 13:50:00', NULL, 0),
(4, 'Alan Didier', 'Masaje', '555', '2018-08-02 12:05:00', '2018-08-02 12:50:00', NULL, 0),
(5, 'Vilma Portillo Armendariz', 'Depilacion', '555', '2018-08-01 10:00:00', '2018-08-01 10:50:00', NULL, 0),
(6, 'Vilma Portillo Armendariz', 'Depilacion', '123456', '2018-08-01 10:00:00', '2018-08-01 10:45:00', 'pago', 0),
(7, 'Vilma Portillo', 'Depilacion', '123456', '2018-08-01 10:00:00', '2018-08-01 10:45:00', 'pago', 0),
(8, 'Vilma Portillo', 'Depilacion', '123456', '2018-08-01 10:00:00', '2018-08-01 10:45:00', 'pago', 0),
(9, 'Vilma Portillo', 'Depilacion', '123456', '2018-08-01 10:00:00', '2018-08-01 10:45:00', 'pago', 0),
(10, 'Vilma Portillo', 'Depilacion', '123456', '2018-08-01 10:00:00', '2018-08-01 10:45:00', 'pago', 0),
(11, 'Vilma Portillo', 'masaje', '555555', '2018-08-08 12:01:00', '2018-08-08 12:46:00', 'atendido', 0),
(12, 'Alan Didier', 'Masaje', '111', '2018-08-09 13:05:00', '2018-08-09 13:50:00', NULL, 0),
(13, 'Vilma Portillo Armendariz', 'prueba', '12345', '2018-08-15 09:00:00', '2018-08-15 09:45:00', NULL, 0),
(14, 'Ricardo Urbina Najera', 'asdad', '', '2018-08-17 09:00:00', '2018-08-17 09:45:00', NULL, 0),
(15, 'Alan Didier Urbina Najera', 'asdsad', NULL, '2018-08-24 09:00:00', '2018-08-24 09:45:00', NULL, 0),
(16, '1', 'qwe', NULL, '2018-08-23 09:00:00', '2018-08-23 09:45:00', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `movil` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `telefono`, `movil`, `email`, `direccion`, `fechaNac`) VALUES
(1, 'Alan Didier', 'Urbina Najera', '6255825230', '6251465670', 'negurbinayeye@gmail.com', '94 y Villa Santa Monica 9406', '1984-08-13'),
(2, 'Vilma', 'Portillo Armendariz', '6255836328', '6251278325', 'vilma_minino@hotmail.com', '94 y Villa Santa Monica 9406', '1988-04-11'),
(5, 'Ricardo', 'Urbina Najera', '1234567', '1234567980', 'rickyurbina@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_presupuesto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id`, `descripcion`, `cantidad`, `precio`, `id_presupuesto`) VALUES
(1, 'sistema de informacion', 1, '5000.00', 1),
(2, 'Sistema de Informacion', 1, '5000.00', 2),
(3, 'Sillas', 10, '5.00', 3),
(4, 'Sobre Manteles', 50, '15.00', 3),
(5, 'sistema web', 1, '10000.00', 4),
(6, 'Asesoria E-Commerce', 1, '5000.00', 4),
(7, 'Sillas', 500, '50.00', 5),
(8, 'Haber', 1, '100.00', 6),
(9, 'haber 2', 2, '100.00', 6),
(10, 'haber', 1, '100.00', 7),
(11, 'haber', 1, '100.00', 8),
(12, 'haber 2', 2, '200.00', 8),
(13, 'producto 1', 2, '200.00', 9),
(14, 'haber', 2, '500.00', 10),
(15, 'crema', 1, '200.00', 10),
(16, 'adfasdf', 1, '1234.00', 11),
(17, 'asdasd', 1, '100.00', 11),
(18, 'item 1', 2, '500.00', 12),
(19, 'item 2', 3, '200.00', 12),
(20, 'asd', 1, '1234.00', 13),
(21, 'asd', 123, '123.00', 14),
(22, 'asd', 123, '123.00', 14),
(23, 'dg', 1, '1234.00', 15),
(24, 'wer', 1, '100.00', 16),
(25, '123', 123, '123.00', 17),
(26, '123', 123, '123.00', 18),
(27, '234', 234, '234.00', 19),
(28, 'bgdht', 234, '234.00', 20),
(29, 'Reloj', 1, '500.00', 21),
(30, 'Cheve', 1, '35.00', 21),
(31, 'adasd', 1, '123.00', 22),
(32, 'limpia', 1, '2.00', 22),
(33, 'haber', 1, '1.00', 22),
(34, 'asd', 1, '1.00', 22),
(35, 'asd', 12, '123.00', 22),
(36, 'jale', 1, '1.00', 22),
(37, '', 1, '1.00', 23),
(38, '', 2, '23.00', 23),
(39, 'haber', 23, '23.00', 23),
(40, 'haber', 1, '1.00', 23),
(41, 'masaje', 1, '300.00', 24),
(42, 'qwe', 1, '123.00', 25),
(43, 'masaje', 1, '300.00', 25),
(44, 'asd', 12, '12.00', 26),
(45, 'qwe', 123, '123.00', 27),
(46, 'asd', 123, '123.00', 28),
(47, 'crema', 1, '200.00', 29),
(48, 'haber', 1, '1.00', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nombre_comercial` varchar(255) NOT NULL,
  `propietario` varchar(255) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `web` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre_comercial`, `propietario`, `telefono`, `direccion`, `email`, `web`) VALUES
(1, 'Eleganzza 360', 'Carlos Castillo', '6258375955', 'Av. Roma<br />\r\nCd. Cuauhtemoc Chihuahua, Mex.<br />', 'contacto@eleganzza360.com', 'eleganzza360.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE `presupuestos` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `presupuestos`
--

INSERT INTO `presupuestos` (`id`, `fecha`, `id_cliente`, `descripcion`, `monto`) VALUES
(1, '2018-04-14 07:00:52', 1, 'Sistema de informacion', '5000.00'),
(2, '2018-04-14 07:03:14', 1, 'proyecto', '5000.00'),
(3, '2018-05-18 00:44:36', 1, 'Evento en Club de Leones', '800.00'),
(4, '2018-07-02 05:02:02', 2, 'Proyecto Pagina Web', '15000.00'),
(5, '2018-08-03 22:08:49', 2, 'Liones', '25000.00'),
(6, '2018-08-08 01:51:50', 2, 'prueba', '300.00'),
(7, '2018-08-08 02:02:05', 2, 'prueba', '100.00'),
(8, '2018-08-08 02:12:20', 2, 'prueba', '500.00'),
(9, '2018-08-08 02:27:08', 2, 'prueba X', '400.00'),
(10, '2018-08-08 02:31:54', 2, 'Ejemplo', '1200.00'),
(11, '2018-08-08 02:47:50', 2, 'asdasd', '1334.00'),
(12, '2018-08-11 01:07:34', 1, 'Prueba sistema 2', '1600.00'),
(13, '2018-08-11 03:16:17', 1, 'asd', '1234.00'),
(14, '2018-08-11 03:28:21', 1, 'asd', '30258.00'),
(15, '2018-08-11 03:39:06', 1, 'prueba 2', '1234.00'),
(16, '2018-08-11 03:43:30', 2, 'er', '100.00'),
(17, '2018-08-11 03:44:31', 1, '123', '15129.00'),
(18, '2018-08-11 03:45:19', 1, '123', '15129.00'),
(19, '2018-08-11 03:46:46', 1, '234', '54756.00'),
(20, '2018-08-11 04:58:09', 1, 'jhfjyr', '54756.00'),
(21, '2018-08-11 05:41:54', 1, 'Prueba X', '535.00'),
(22, '2018-08-14 20:12:57', 1, 'nombres separados', '1604.00'),
(23, '2018-08-14 20:45:44', 3, 'Checking venta', '577.00'),
(24, '2018-08-14 20:47:36', 3, 'Venta 2', '300.00'),
(25, '2018-08-15 03:29:09', 1, 'HHHH', '423.00'),
(26, '2018-08-15 04:49:22', 5, 'asd', '144.00'),
(27, '2018-08-15 05:12:54', 5, 'haber', '15129.00'),
(28, '2018-08-15 05:17:54', 5, 'asd', '15129.00'),
(29, '2018-08-15 06:31:46', 2, 'asd', '200.00'),
(30, '2018-08-15 23:48:01', 1, 'Nota', '1.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `nombre`, `categoria`, `precio`) VALUES
(1, 'Masaje Corporal', 'Puerco', '300'),
(3, 'Depilacion Piernas', 'Patas', '300');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

CREATE TABLE `tmp` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `photo` text NOT NULL,
  `rol` int(11) NOT NULL,
  `sistema` varchar(1) NOT NULL,
  `intentos` int(11) NOT NULL,
  `activo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `email`, `photo`, `rol`, `sistema`, `intentos`, `activo`) VALUES
(1, 'rick', '123', 'Ricardo Urbina N.', 'rickyurbina@gmail.com', '', 0, 'A', 0, 'S'),
(12, 'alan', '123', 'Alan Urbina Najera', 'alan@e-studio.com.mc', '', 1, 'E', 0, 'S'),
(14, 'carlos', '123', 'Carlos Castillo', 'castillo@eleganzza360.com', '', 0, 'E', 0, 'S'),
(16, 'vilma', '123', 'Vilma Portillo', 'vilma@hotmail.com', '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVentas` int(11) NOT NULL,
  `empleadaV` varchar(255) NOT NULL,
  `idProducto` varchar(255) NOT NULL,
  `fechaV` datetime NOT NULL,
  `venta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVentas`, `empleadaV`, `idProducto`, `fechaV`, `venta`) VALUES
(1, '130', 'Masaje Facial', '2018-08-14 09:00:00', '250'),
(2, '130', 'Botox', '2018-08-02 13:05:00', '300'),
(3, '130', 'Botox', '2018-08-02 13:05:00', '300'),
(4, '555', 'Masaje', '2018-08-02 12:05:00', '300'),
(5, '555555', 'masaje', '2018-08-08 12:01:00', '300'),
(6, '111', 'Masaje', '2018-08-09 13:05:00', '300'),
(7, '12345', 'prueba', '2018-08-15 09:00:00', '300');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCitas`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`);

--
-- Indices de la tabla `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVentas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idCitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
