-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2020 a las 02:02:59
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
  `id_matricula` int(10) NOT NULL,
  `usuario` varchar(20) COLLATE utf32_spanish_ci NOT NULL,
  `destino` int(30) NOT NULL,
  `precio` int(10) NOT NULL,
  `num_boleto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `nombre` varchar(11) COLLATE utf32_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf32_spanish_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_destino`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Guallaquil', 'ciudad', 'guayaquil.jpg'),
(2, 'Quito', 'capital carondelet', 'quito.jpg'),
(3, 'Ibarra', 'lago', 'ibarra.jpg'),
(4, 'Ambato', 'montañas', 'ambato.jpg'),
(5, 'Salinas', 'playas', 'salinas.jpg'),
(6, 'Manta', 'Ciudad de Manta', 'manta.jpg'),
(7, 'Machala', 'ciudad de machala', 'machala.jpg'),
(8, 'Napo', 'ciudad de la amazonia de napo', 'napo.jpg'),
(9, 'Loja', 'ciudad de loja', 'loja.jpg'),
(10, 'Tena', 'Ciudad de Tena', 'tena.jpg'),
(11, 'Guaranda', 'ciudad de Guaranda', 'guaranda.jpg'),
(12, 'La libertad', 'ciudad de La libertad', 'libertad.jpg'),
(13, 'Sanborondon', 'Ciudad de Samborondon', 'samborondon.jpg'),
(14, 'Baños de Ag', 'Ciudad de baños de agua santa', 'baños.png'),
(15, 'Agua Santa', 'Ciudad de Agua Santa', 'aguaSanta.jpg'),
(16, 'Montañita', 'Ciudad de Montañita', 'montanita.jpg'),
(17, 'Rio bamba', 'Ciudad de Rio Bamba', 'riobmba.jpg'),
(18, 'Cuenca', 'la ciudad de Cuenca', 'cuenca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `cedula` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `edad` int(10) NOT NULL,
  `sexo` varchar(5) COLLATE utf32_spanish_ci NOT NULL,
  `cargo` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `sueldo` decimal(5,0) NOT NULL,
  `telefono` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `username`, `email`, `clave`) VALUES
(8, 'este', 'as@hd.com', '741'),
(16, 'date', 'd@dm.com', '1234567'),
(19, 'N@omy', 'adf@gm.com', '$2y$10$vXnC4uR0wd1gJ.FqarA/MuXzV.4m.WekBdjsVpY7P6b'),
(20, 'jontahan', 'l@gm.com', '$2y$10$VeHjIj3dKBfk46AueZCHq.J.0GcB5P/za.w5LD.nOuT'),
(21, 'coello', 'g@mai.com', '$2y$10$I52109L.Y135.0hWDv6lTePzFEj.CXdwZgcubdGLgKz');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`id_matricula`);

--
-- Indices de la tabla `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`matricula`);

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
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
