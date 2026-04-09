-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2026 a las 00:06:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iniciarsesionprimeraprueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areasprueba`
--

CREATE TABLE `areasprueba` (
  `id_area` varchar(255) NOT NULL,
  `nombre_area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `areasprueba`
--

INSERT INTO `areasprueba` (`id_area`, `nombre_area`) VALUES
('0', 'pendiente'),
('1', 'Ingenieria'),
('2', 'facultad de ciencias de la informacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sindicalizadosprueba`
--

CREATE TABLE `sindicalizadosprueba` (
  `curp` varchar(18) NOT NULL,
  `correo_institucional` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `id_area` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo_personal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sindicalizadosprueba`
--

INSERT INTO `sindicalizadosprueba` (`curp`, `correo_institucional`, `nombres`, `apellidos`, `id_area`, `foto`, `telefono`, `correo_personal`) VALUES
('AAXM720317HNEBXH03', 'mabatal@pampano.unacar.mx', 'mohammed', 'batal', '1', 'escudo_unacar.png', '1234567890', 'correodeejemplo@gmail.com'),
('ROCA070910HCCSRLA7', 'albertoroscruz@gmail.com', 'alberto', 'rosado cruz', '2', '290054001ba4796ea8ff16e92b5aa9ed.jpg', '9381576364', 'recordaresto97@gmail.com'),
('SOFA661006MJCLRD08', 'asolis@pampano.unacar.mx', '', '', '0', NULL, '0', ''),
('SOVA760717MVZTLL02', 'asoto@pampano.unacar.mx', '', '', '0', NULL, '0', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosprueba`
--

CREATE TABLE `usuariosprueba` (
  `id_usuario` int(255) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `curp_usuario` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuariosprueba`
--

INSERT INTO `usuariosprueba` (`id_usuario`, `nombre_usuario`, `contraseña`, `curp_usuario`) VALUES
(1, 'albertoprueba', '123', 'ROCA070910HCCSRLA7'),
(2, 'maestro_batal', '1234', 'AAXM720317HNEBXH03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areasprueba`
--
ALTER TABLE `areasprueba`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `sindicalizadosprueba`
--
ALTER TABLE `sindicalizadosprueba`
  ADD PRIMARY KEY (`curp`),
  ADD UNIQUE KEY `curp` (`curp`),
  ADD UNIQUE KEY `correo` (`correo_institucional`),
  ADD KEY `id_area` (`id_area`);

--
-- Indices de la tabla `usuariosprueba`
--
ALTER TABLE `usuariosprueba`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `curp_usuario` (`curp_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuariosprueba`
--
ALTER TABLE `usuariosprueba`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sindicalizadosprueba`
--
ALTER TABLE `sindicalizadosprueba`
  ADD CONSTRAINT `sindicalizadosprueba_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `areasprueba` (`id_area`);

--
-- Filtros para la tabla `usuariosprueba`
--
ALTER TABLE `usuariosprueba`
  ADD CONSTRAINT `usuariosprueba_ibfk_1` FOREIGN KEY (`curp_usuario`) REFERENCES `sindicalizadosprueba` (`curp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
