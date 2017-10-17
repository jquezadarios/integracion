-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-10-2017 a las 23:55:40
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academ`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `ID_A` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Calorias` int(7) NOT NULL,
  `Proteinas` int(4) NOT NULL,
  `Colesterol` int(4) NOT NULL,
  `Grasas_totales` int(4) NOT NULL,
  `Sodio` int(5) NOT NULL,
  `Carbohidratos` int(4) NOT NULL,
  `Azucar` int(4) NOT NULL,
  `Vitaminas` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`ID_A`, `Nombre`, `Calorias`, `Proteinas`, `Colesterol`, `Grasas_totales`, `Sodio`, `Carbohidratos`, `Azucar`, `Vitaminas`) VALUES
(1, 'Pan', 237, 6, 6, 1, 85, 52, 8, 0),
(2, 'Leche(Entera)', 155, 8, 0, 9, 0, 13, 0, 7),
(3, 'Leche(Descremada)', 351, 35, 3, 15, 0, 48, 0, 36),
(4, 'Manzana', 52, 0, 0, 0, 1, 14, 10, 1),
(5, 'Lechuga', 14, 0, 0, 0, 0, 0, 0, 0),
(6, 'Galletas(Caseras)', 427, 10, 0, 14, 2, 61, 5, 52),
(7, 'Lazaña de carne', 336, 21, 49, 12, 744, 35, 6, 0),
(8, 'Porotos', 325, 0, 0, 0, 0, 0, 0, 0),
(9, 'Yogurth', 105, 25, 3, 1, 160, 0, 0, 50),
(10, 'Manjar(Jumbo)', 564, 25, 0, 3, 366, 117, 68, 178),
(11, 'Papas fritas', 650, 56, 110, 3, 230, 98, 4, 40),
(12, 'Hamburguesa(Carne)', 295, 27, 43, 8, 910, 30, 6, 18),
(13, 'Hamburguesa(Pollo)', 493, 20, 245, 39, 570, 14, 10, 221),
(14, 'Tomate', 85, 0, 0, 0, 0, 18, 18, 0),
(15, 'Zanahoria', 627, 22, 49, 13, 1, 67, 14, 23),
(16, 'Mantequilla', 430, 19, 50, 19, 900, 47, 6, 0),
(17, 'Margarina', 187, 0, 0, 2, 0, 0, 0, 0),
(18, 'Huevo', 890, 26, 235, 37, 165, 99, 16, 15),
(19, 'Huevo Duro', 958, 109, 262, 33, 313, 52, 9, 69),
(20, 'Yema de huevo', 299, 0, 0, 0, 0, 0, 0, 0),
(21, 'Bebida', 2, 176, 576, 53, 4, 130, 66, 15),
(22, 'Cerveza(355ml)', 235, 13, 0, 0, 821, 51, 24, 117);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_usuario`
--

CREATE TABLE `cuenta_usuario` (
  `ID_U` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Fecha_Nacimiento` int(11) NOT NULL,
  `Peso(Kg)` int(5) NOT NULL,
  `Altura(Cm)` int(4) NOT NULL,
  `Sexo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pasadmin` varchar(250) NOT NULL,
  `rol` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `email`, `pasadmin`, `rol`) VALUES
(1, 'Administrador', '', 'admin@gmail.com', '123456', 1),
(6, 'joako', '7815696ecbf1c96e6894b779456d330e', 'asdasd', '', 2),
(7, 'john', '7815696ecbf1c96e6894b779456d330e', 'joako123@gmail.com', '', 2);

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
  `Peso_Fecha` varchar(50) NOT NULL,
  `calorias_Dia` int(10) NOT NULL,
  `calorias_Mes` int(11) NOT NULL,
  `id` int(20) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`ID_A`);

--
-- Indices de la tabla `cuenta_usuario`
--
ALTER TABLE `cuenta_usuario`
  ADD PRIMARY KEY (`ID_U`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguimiento_usuario`
--
ALTER TABLE `seguimiento_usuario`
  ADD PRIMARY KEY (`ID_S`),
  ADD KEY `ID_A` (`ID_A`),
  ADD KEY `ID_U` (`ID_U`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `ID_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `cuenta_usuario`
--
ALTER TABLE `cuenta_usuario`
  MODIFY `ID_U` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `seguimiento_usuario_ibfk_2` FOREIGN KEY (`ID_U`) REFERENCES `cuenta_usuario` (`ID_U`),
  ADD CONSTRAINT `seguimiento_usuario_ibfk_3` FOREIGN KEY (`id`) REFERENCES `login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
