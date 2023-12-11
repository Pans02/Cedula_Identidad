-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2023 a las 10:13:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registros para cedulas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `rut` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `lugar_de_nacimiento` varchar(50) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `discapacidad` tinyint(1) NOT NULL,
  `donante` tinyint(1) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`id`, `nombres`, `apellido_paterno`, `apellido_materno`, `rut`, `nacionalidad`, `genero`, `fecha_de_nacimiento`, `lugar_de_nacimiento`, `profesion`, `discapacidad`, `donante`, `foto`) VALUES
(40, 'Roberto Nicolas', 'Carrasco', 'Abarca', '207074454', 'Chile', 'masculino', '2023-12-06', 'Valparaiso', 'ninguna', 0, 0, 'img/Captura de pantalla (3).png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
