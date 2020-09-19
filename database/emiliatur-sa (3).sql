-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2020 a las 08:11:44
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emiliatur-sa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `id_usuario` int(20) NOT NULL,
  `id_destino` int(30) NOT NULL,
  `precio` int(10) NOT NULL,
  `fecha_compra` date NOT NULL,
  `num_boleto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`id_usuario`, `id_destino`, `precio`, `fecha_compra`, `num_boleto`) VALUES
(23, 17, 60, '2020-09-10', 10),
(23, 17, 60, '2020-09-10', 11),
(23, 17, 60, '2020-09-10', 12),
(23, 17, 60, '2020-09-10', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buses`
--

CREATE TABLE `buses` (
  `matricula` varchar(10) COLLATE utf32_spanish_ci NOT NULL,
  `peso` int(10) NOT NULL,
  `altura` int(10) NOT NULL,
  `capacidad` int(10) NOT NULL,
  `estado` varchar(10) COLLATE utf32_spanish_ci NOT NULL,
  `numeroVehiculo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `buses`
--

INSERT INTO `buses` (`matricula`, `peso`, `altura`, `capacidad`, `estado`, `numeroVehiculo`) VALUES
('ESP-123', 45, 10, 40, 'activo', 1),
('hps-453', 30, 25, 40, 'activo', 2),
('jps-546', 30, 40, 40, 'activo', 3),
('kls-325', 25, 40, 40, 'activo', 5),
('lsd-753', 30, 25, 40, 'activo', 6),
('lsp-785', 30, 25, 40, 'activo', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_compra` int(15) NOT NULL,
  `destino` int(50) NOT NULL,
  `id_usuario` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_compra`, `destino`, `id_usuario`) VALUES
(19, 15, 21),
(24, 7, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `nombre` varchar(11) COLLATE utf32_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf32_spanish_ci NOT NULL,
  `fecha_1` date NOT NULL,
  `fecha_2` date NOT NULL,
  `fecha_3` date NOT NULL,
  `hora_1` varchar(15) COLLATE utf32_spanish_ci NOT NULL,
  `hora_2` varchar(15) COLLATE utf32_spanish_ci NOT NULL,
  `hora_3` varchar(15) COLLATE utf32_spanish_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_destino`, `nombre`, `descripcion`, `fecha_1`, `fecha_2`, `fecha_3`, `hora_1`, `hora_2`, `hora_3`, `imagen`) VALUES
(1, 'Guallaquil', 'ciudad', '2020-09-19', '0000-00-00', '0000-00-00', '02:25', '0', '0', 'guayaquil.jpg'),
(2, 'Quito', 'capital carondelet', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'quito.jpg'),
(3, 'Ibarra', 'lago', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'ibarra.jpg'),
(4, 'Ambato', 'montañas', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'ambato.jpg'),
(5, 'Salinas', 'playas', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'salinas.jpg'),
(6, 'Manta', 'Ciudad de Manta', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'manta.jpg'),
(7, 'Machala', 'ciudad de machala', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'machala.jpg'),
(8, 'Napo', 'ciudad de la amazonia de napo', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'napo.jpg'),
(9, 'Loja', 'ciudad de loja', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'loja.jpg'),
(10, 'Tena', 'Ciudad de Tena', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'tena.jpg'),
(11, 'Guaranda', 'ciudad de Guaranda', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'guaranda.jpg'),
(12, 'La libertad', 'ciudad de La libertad', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'libertad.jpg'),
(13, 'Sanborondon', 'Ciudad de Samborondon', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'samborondon.jpg'),
(14, 'Baños de Ag', 'Ciudad de baños de agua santa', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'va.png'),
(15, 'Agua Santa', 'Ciudad de Agua Santa', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'aguaSanta.jpg'),
(16, 'Montañita', 'Ciudad de Montañita', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'montanita.jpg'),
(17, 'Rio bamba', 'Ciudad de Rio Bamba', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'riobmba.jpg'),
(18, 'Cuenca', 'la ciudad de Cuenca', '0000-00-00', '0000-00-00', '0000-00-00', '0', '0', '0', 'cuenca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `cedula` int(10) NOT NULL,
  `nombre_emp` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `edad` int(10) NOT NULL,
  `sexo` varchar(10) COLLATE utf32_spanish_ci NOT NULL,
  `telefono` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`cedula`, `nombre_emp`, `apellido`, `edad`, `sexo`, `telefono`) VALUES
(12356543, 'Olatz', 'Fuentes', 35, 'Masculino', 975465762),
(123245324, 'juan', 'diaz', 25, 'hombre', 9142324),
(245653535, 'Andrea', 'Prat', 25, 'femenino', 945454757),
(564545655, 'Pablo', 'Caro', 25, 'masculino', 942572362),
(1207564565, 'Esther', 'Pedraza', 45, 'femenino', 974432455),
(1235454324, 'vicente', 'torrez', 42, 'hombre', 97542435);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `ID` int(11) NOT NULL,
  `id_emple` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `id_buses` varchar(11) COLLATE utf32_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES
(5, 12356543, 1, 'ESP-123', '2020-09-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_spanish_ci NOT NULL,
  `clave` varchar(200) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `username`, `email`, `clave`) VALUES
(8, 'este', 'as@hd.com', '741'),
(16, 'date', 'd@dm.com', '1234567'),
(19, 'N@omy', 'adf@gm.com', '$2y$10$vXnC4uR0wd1gJ.FqarA/MuXzV.4m.WekBdjsVpY7P6b'),
(20, 'jontahan', 'l@gm.com', '$2y$10$VeHjIj3dKBfk46AueZCHq.J.0GcB5P/za.w5LD.nOuT'),
(21, 'coello', 'g@mai.com', '$2y$10$I52109L.Y135.0hWDv6lTePzFEj.CXdwZgcubdGLgKz'),
(23, 'n@omy', 'n@omy.com', '$2y$10$M6u3bK5CPaTSbYXCyh3aYOkA729fEg0g1SGg.Zd8WcHUbzS25q.82'),
(24, 'admin', 'admin@gmail.com', '$2y$10$HPL5aX3NwmmgFju2M5WKregjXYXqt8Y2u4Bf1ic7u8qasSTCacjqi'),
(25, 'lsp12', 'asd2@das.cop', '$2y$10$yjhzBvgMgdPmEErvRbYuxOVSPXmTr4Maw4sboBzAAwpcYvB.lX3FW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`num_boleto`),
  ADD KEY `usuario` (`id_usuario`),
  ADD KEY `id_destino` (`id_destino`) USING BTREE;

--
-- Indices de la tabla `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `numeroVehiculo` (`numeroVehiculo`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `destino` (`destino`) USING BTREE,
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id_destino`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_emple` (`id_emple`),
  ADD KEY `id_destino` (`id_destino`),
  ADD KEY `id_buses` (`id_buses`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleto`
--
ALTER TABLE `boleto`
  MODIFY `num_boleto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `buses`
--
ALTER TABLE `buses`
  MODIFY `numeroVehiculo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_compra` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD CONSTRAINT `boleto_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boleto_ibfk_3` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_destino`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r` FOREIGN KEY (`destino`) REFERENCES `destino` (`id_destino`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD CONSTRAINT `rutas_ibfk_1` FOREIGN KEY (`id_emple`) REFERENCES `empleado` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rutas_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_destino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rutas_ibfk_3` FOREIGN KEY (`id_buses`) REFERENCES `buses` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
