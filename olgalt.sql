-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2023 a las 17:06:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `olgalt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `CodigoProducto` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Marca` varchar(100) DEFAULT NULL,
  `TipoProducto` varchar(100) DEFAULT NULL,
  `OrigenProducto` varchar(50) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `ValorCosto` decimal(10,2) DEFAULT NULL,
  `ValorVenta` decimal(10,2) DEFAULT NULL,
  `FechaFabricacion` date DEFAULT NULL,
  `Proveedor` varchar(255) DEFAULT NULL,
  `GarantiaProveedor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`CodigoProducto`, `Nombre`, `Marca`, `TipoProducto`, `OrigenProducto`, `Cantidad`, `ValorCosto`, `ValorVenta`, `FechaFabricacion`, `Proveedor`, `GarantiaProveedor`) VALUES
(7, 'Clavos de Acero', 'MarcaG', 'Herramienta', 'Nacional', 200, 1.99, 4.99, '2022-03-20', 'ProveedorX', '6'),
(8, 'Llave de Tubo', 'MarcaH', 'Herramienta', 'Importado', 45, 11.99, 24.99, '2022-01-10', 'ProveedorY', '1 año'),
(9, 'Pintura Antioxidante', 'MarcaI', 'Pintura', 'Nacional', 25, 15.99, 29.99, '2022-02-28', 'ProveedorZ', '2 años'),
(10, 'Alicate', 'JGB', 'Prueba', 'origen Prueba', 45, 45000.00, 60000.00, '2023-02-02', 'listosas', '1'),
(11, 'espatula', 'sony', '', '', 0, 0.00, 0.00, '0000-00-00', '', ''),
(112, 'espatula', 'sony', '', '', 0, 0.00, 0.00, '0000-00-00', '', ''),
(113, 'espatula', 'sony', 'herramienta', 'Nacional', 10, 2500.00, 3500.00, '2023-02-02', 'soyyo', '2 años'),
(114, 'prueba 114', 'prueba marca', 'prueba tipo', 'origen', 5, 68999.00, 99999999.99, '2023-02-02', 'jgjgjkgk', '1'),
(126, 'canales', 'helena', 'teja', 'nacional', 10, 10000.00, 15000.00, '2023-11-28', 'proveedor', '1'),
(127, 'canales', 'helena', 'teja', 'nacional', 10, 10000.00, 15000.00, '2023-11-28', 'proveedor', '1'),
(128, 'canales', 'helena', 'teja', 'nacional', 10, 10000.00, 15000.00, '2023-11-28', 'proveedor', '1'),
(129, 'canales', 'helena', 'teja', 'nacional', 10, 10000.00, 15000.00, '2023-11-28', 'proveedor', '1'),
(130, 'canales', 'helena', 'teja', 'nacional', 10, 10000.00, 15000.00, '2023-11-28', 'proveedor', '1'),
(131, 'canales', 'helena', 'teja', 'nacional', 10, 10000.00, 15000.00, '2023-11-28', 'proveedor', '1'),
(132, 'canales', 'helena', 'teja', 'nacional', 10, 10000.00, 15000.00, '2023-11-28', 'proveedor', '1'),
(133, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(134, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(135, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(136, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(137, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(138, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(139, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(140, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(141, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(142, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(143, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(144, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(145, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(146, 'reja', 'marca 120', 'herramienta', 'chino', 100, 150000.00, 200000.00, '2023-11-29', 'naci', '3'),
(147, 'puntilla', 'laton', 'metalito', 'nacional', 100, 10.00, 100.00, '2023-12-01', 'nacional', '2'),
(148, 'puntilla', 'laton', 'metalito', 'nacional', 100, 10.00, 100.00, '2023-12-01', 'nacional', '2'),
(149, 'puntilla', 'laton', 'metalito', 'nacional', 100, 10.00, 100.00, '2023-12-01', 'nacional', '2'),
(150, 'puntilla', 'laton', 'metalito', 'nacional', 100, 10.00, 100.00, '2023-12-01', 'nacional', '2'),
(151, 'puntilla', 'laton', 'metalito', 'nacional', 100, 10.00, 100.00, '2023-12-01', 'nacional', '2'),
(152, 'puntilla', 'laton', 'metalito', 'nacional', 100, 10.00, 100.00, '2023-12-01', 'nacional', '2'),
(153, 'puntilla', 'laton', 'metalito', 'nacional', 100, 10.00, 100.00, '2023-12-01', 'nacional', '2'),
(154, 'puntilla', 'laton', 'metalito', 'nacional', 100, 10.00, 100.00, '2023-12-01', 'nacional', '2'),
(155, 'puntilla', 'laton', 'metalito', 'nacional', 100, 10.00, 100.00, '2023-12-01', 'nacional', '2'),
(156, 'puntilla', 'laton', 'metalito', 'nacional', 100, 10.00, 100.00, '2023-12-01', 'nacional', '2'),
(157, 'puntilla', 'laton', 'metalito', 'nacional', 100, 10.00, 100.00, '2023-12-01', 'nacional', '2'),
(158, 'teclado', 'lkslaksd', 'kajsdj', 'jalsdkj', 8, 8.00, 9.00, '2023-12-01', 'lola', '1'),
(159, 'teclado', 'lkslaksd', 'kajsdj', 'jalsdkj', 8, 8.00, 9.00, '2023-12-01', 'lola', '1'),
(160, 'teclado', 'lkslaksd', 'kajsdj', 'jalsdkj', 8, 8.00, 9.00, '2023-12-01', 'lola', '1'),
(161, 'teclado', 'lkslaksd', 'kajsdj', 'jalsdkj', 8, 8.00, 9.00, '2023-12-01', 'lola', '1'),
(162, 'teclado', 'lkslaksd', 'kajsdj', 'jalsdkj', 8, 8.00, 9.00, '2023-12-01', 'lola', '1'),
(163, 'teclado', 'lkslaksd', 'kajsdj', 'jalsdkj', 8, 8.00, 9.00, '2023-12-01', 'lola', '1'),
(164, 'teclado', 'lkslaksd', 'kajsdj', 'jalsdkj', 8, 8.00, 9.00, '2023-12-01', 'lola', '1'),
(165, 'teclado', 'lkslaksd', 'kajsdj', 'jalsdkj', 8, 8.00, 9.00, '2023-12-01', 'lola', '1'),
(166, 'teclado', 'lkslaksd', 'kajsdj', 'jalsdkj', 8, 8.00, 9.00, '2023-12-01', 'lola', '1'),
(167, 's', 's', 's', 's', 3, 4.00, 3.00, '2023-12-20', 'f', '2'),
(168, 's', 's', 's', 's', 3, 4.00, 3.00, '2023-12-20', 'f', '2'),
(169, 's', 's', 's', 's', 3, 4.00, 3.00, '2023-12-20', 'f', '2'),
(170, 's', 's', 's', 's', 3, 4.00, 3.00, '2023-12-20', 'f', '2'),
(171, 's', 's', 's', 's', 3, 4.00, 3.00, '2023-12-20', 'f', '2'),
(172, 's', 's', 's', 's', 3, 4.00, 3.00, '2023-12-20', 'f', '2'),
(173, 's', 's', 's', 's', 3, 4.00, 3.00, '2023-12-20', 'f', '2'),
(174, 's', 's', 's', 's', 3, 4.00, 3.00, '2023-12-20', 'f', '2'),
(175, 's', 's', 's', 's', 3, 4.00, 3.00, '2023-12-20', 'f', '2'),
(176, 's', 's', 's', 's', 3, 4.00, 3.00, '2023-12-20', 'f', '2'),
(177, 's', 's', 's', 's', 3, 4.00, 3.00, '2023-12-20', 'f', '2'),
(178, 's', 'D', 'S', 'R', 3, 3.00, 3.00, '2023-12-22', 'G', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_agregados`
--

CREATE TABLE `productos_agregados` (
  `id_pa` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_agregados`
--

INSERT INTO `productos_agregados` (`id_pa`, `codigo_producto`, `usuario_id`) VALUES
(3, 117, 6),
(18, 131, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Identificacion` varchar(20) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Codigo`, `Nombre`, `Identificacion`, `Telefono`, `Correo`, `Rol`) VALUES
(6, 'dayana', '1092910921', '28763832', 'dayana@example.com', 'Cliente'),
(8, 'dayana numero 8', '4411456789', '97986823', 'carlos3@example.com', 'Cliente'),
(9, 'ricardo', '273498713419804', '81034738', 'ricardo@carvajal.com', 'Empleado'),
(13, 'Hs', '2715876', '637638', 'hs@hs.com', 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `CodigoVenta` int(11) NOT NULL,
  `CodigoCliente` int(11) DEFAULT NULL,
  `ValorVenta` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`CodigoProducto`);

--
-- Indices de la tabla `productos_agregados`
--
ALTER TABLE `productos_agregados`
  ADD PRIMARY KEY (`id_pa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`CodigoVenta`),
  ADD KEY `CodigoCliente` (`CodigoCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `CodigoProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT de la tabla `productos_agregados`
--
ALTER TABLE `productos_agregados`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`CodigoCliente`) REFERENCES `usuarios` (`Codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
