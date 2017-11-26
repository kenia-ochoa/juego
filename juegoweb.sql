-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2017 a las 06:40:53
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juegoweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iniciar`
--

CREATE TABLE `iniciar` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `confirmar_contrasena` varchar(234) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `edad` int(3) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `telefono` int(10) NOT NULL,
  `fecha_de_nacimiento` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `iniciar`
--

INSERT INTO `iniciar` (`id`, `usuario`, `contrasena`, `confirmar_contrasena`, `nombres`, `apellidos`, `edad`, `sexo`, `telefono`, `fecha_de_nacimiento`, `correo`) VALUES
(1, 'kenia', '1234', '1234', 'kenia', 'ochoa', 20, 'femenino', 123456789, '1997-10-05', 'kenia8ar@gmail.com'),
(5, 'kl', 'kl', 'kl', 'kl', 'poi', 6, 'femenino', 1234, '', 'jkll'),
(6, 'Anyi', '1234', '1234', 'Anyi', 'Paternina Gomez', 21, 'femenino', 2147483647, '1996-08-08', 'anyipaterninagomez@gmail.com'),
(7, 'Yuri', '9876', '9876', 'Yuritza', 'AnzoÃ¡tegui Llamas', 21, 'femenino', 2147483647, '1996-10-11', 'ypanzoategui20@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `iniciar`
--
ALTER TABLE `iniciar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `iniciar`
--
ALTER TABLE `iniciar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
