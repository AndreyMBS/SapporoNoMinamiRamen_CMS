-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2021 a las 21:50:38
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectocms3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes_frecuentes`
--

CREATE TABLE `tbl_clientes_frecuentes` (
  `idClienteFrecuente` int(11) NOT NULL,
  `NombreCliente` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `CorreoElectronico` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `NumeroTelefonico` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_clientes_frecuentes`
--

INSERT INTO `tbl_clientes_frecuentes` (`idClienteFrecuente`, `NombreCliente`, `CorreoElectronico`, `NumeroTelefonico`) VALUES
(3, 'Kevin', 'copyninja@gmail.com', '123'),
(5, 'Keilyn', 'keilyn148@gmail.com', '87507723'),
(6, 'Mario Jimenez', 'mario123@gmail.com', '87441125');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalleorden`
--

CREATE TABLE `tbl_detalleorden` (
  `IdOrden` int(11) NOT NULL,
  `IdDetalle` int(11) NOT NULL,
  `idPlatillo` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_detalleorden`
--

INSERT INTO `tbl_detalleorden` (`IdOrden`, `IdDetalle`, `idPlatillo`, `precio`, `cantidad`, `subtotal`, `descuento`, `total`) VALUES
(81, 1, 4, 5600, 1, 5600, 0, 10700),
(81, 2, 8, 5100, 1, 5100, 0, 10700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ordenes`
--

CREATE TABLE `tbl_ordenes` (
  `IdOrden` int(11) NOT NULL,
  `NombreCliente` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Total` int(1) NOT NULL,
  `IdMesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_ordenes`
--

INSERT INTO `tbl_ordenes` (`IdOrden`, `NombreCliente`, `Total`, `IdMesa`) VALUES
(57, 'Hakukito', 127, 44),
(58, 'Hakukito', 127, 45),
(59, 'Hakukito', 127, 45),
(60, 'Hakukito', 127, 45),
(61, 'Hakukito', 127, 45),
(62, 'Hakukito', 127, 46),
(63, 'Hakukito', 127, 46),
(64, 'Hakukito', 127, 46),
(65, 'Hakukito', 127, 46),
(66, 'Hakukito', 127, 46),
(67, 'Hakukito', 127, 46),
(68, 'Hakukito', 127, 46),
(69, 'Keilyn', 127, 45),
(70, 'Keilyn', 127, 45),
(71, 'Keilyn', 127, 45),
(72, 'Keilyn', 127, 45),
(73, 'Keilyn', 127, 45),
(74, 'Keilyn', 127, 45),
(75, 'Keilyn', 88027, 45),
(76, 'Diego', 88027, 88),
(77, 'Hakukito', 88027, 2),
(78, 'Keilyn', 88027, 2),
(79, 'Diego', 131996, 23),
(80, 'Mario Jimenes', 10100, 3),
(81, 'Keilyn', 10700, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_platillos`
--

CREATE TABLE `tbl_platillos` (
  `IdPlatillo` int(11) NOT NULL,
  `NombrePlatillo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Tipo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Tamanno` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `PrecioPlatillo` int(11) NOT NULL,
  `Imagen` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_platillos`
--

INSERT INTO `tbl_platillos` (`IdPlatillo`, `NombrePlatillo`, `Tipo`, `Tamanno`, `PrecioPlatillo`, `Imagen`) VALUES
(4, 'Ramen', 'JaponÃ©s', 'Peque', 5600, 'public/images/2.jpg'),
(7, 'Sopa de Fideos', 'Vietnamita', 'Mediana', 5200, 'public/images/4.jpg'),
(8, 'Sopa de Wantan', 'Chino', 'Grande', 5100, 'public/images/3.jpg'),
(10, 'Olla de carne', 'Sopa', 'Grande', 4500, 'public/images/Olla_de_carne_2.png'),
(11, 'Ramen 2', 'JaponÃ©s', 'Grande', 4500, 'public/images/thai2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `idUser` int(11) DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`idUser`, `nombre`, `username`, `password`) VALUES
(1, 'Keilyn', 'keyramvar', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_clientes_frecuentes`
--
ALTER TABLE `tbl_clientes_frecuentes`
  ADD PRIMARY KEY (`idClienteFrecuente`);

--
-- Indices de la tabla `tbl_detalleorden`
--
ALTER TABLE `tbl_detalleorden`
  ADD PRIMARY KEY (`IdDetalle`);

--
-- Indices de la tabla `tbl_ordenes`
--
ALTER TABLE `tbl_ordenes`
  ADD PRIMARY KEY (`IdOrden`);

--
-- Indices de la tabla `tbl_platillos`
--
ALTER TABLE `tbl_platillos`
  ADD PRIMARY KEY (`IdPlatillo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_clientes_frecuentes`
--
ALTER TABLE `tbl_clientes_frecuentes`
  MODIFY `idClienteFrecuente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_detalleorden`
--
ALTER TABLE `tbl_detalleorden`
  MODIFY `IdDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_ordenes`
--
ALTER TABLE `tbl_ordenes`
  MODIFY `IdOrden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `tbl_platillos`
--
ALTER TABLE `tbl_platillos`
  MODIFY `IdPlatillo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
