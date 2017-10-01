-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2017 a las 18:49:48
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nutricion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_usuario`
--

CREATE TABLE `seguimiento_usuario` (
  `ID_S` int(4) NOT NULL,
  `ID_A` int(4) NOT NULL,
  `ID_U` int(4) NOT NULL,
  `Calculo_IMC` varchar(30) NOT NULL,
  `Calculo_Kcal` varchar(30) NOT NULL,
  `Peso_Fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `seguimiento_usuario`
--
ALTER TABLE `seguimiento_usuario`
  ADD PRIMARY KEY (`ID_S`),
  ADD KEY `ID_A` (`ID_A`),
  ADD KEY `ID_U` (`ID_U`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `seguimiento_usuario`
--
ALTER TABLE `seguimiento_usuario`
  MODIFY `ID_S` int(4) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `seguimiento_usuario`
--
ALTER TABLE `seguimiento_usuario`
  ADD CONSTRAINT `seguimiento_usuario_ibfk_1` FOREIGN KEY (`ID_A`) REFERENCES `alimentos` (`ID_A`),
  ADD CONSTRAINT `seguimiento_usuario_ibfk_2` FOREIGN KEY (`ID_U`) REFERENCES `cuenta_usuario` (`ID_U`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
