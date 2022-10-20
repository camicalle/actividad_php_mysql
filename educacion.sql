-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2022 a las 21:48:54
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `educacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegios`
--

CREATE TABLE `colegios` (
  `idcol` int(5) UNSIGNED NOT NULL,
  `cnom` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cdir` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ctel` bigint(20) UNSIGNED NOT NULL,
  `fecha_creacion` date NOT NULL,
  `tipo` varchar(2) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colegios`
--

INSERT INTO `colegios` (`idcol`, `cnom`, `cdir`, `ctel`, `fecha_creacion`, `tipo`) VALUES
(2, 'El Nacional', 'Cale132', 3214524112, '2011-02-16', 'pu'),
(123, 'Normal Superior', 'Cra145612', 3001234565, '2011-02-16', 'pu'),
(312, 'Maria Auxiliadora', 'Cra1312', 3512000000, '2014-10-16', 'pr'),
(22155, 'Andrés Rodriguez', 'Calle3232Cra412', 3005548444, '1997-01-28', 'pu'),
(44225, 'Las Mercedes', 'Cra14b#2', 3245445454, '2014-02-16', 'pu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `idest` int(10) UNSIGNED NOT NULL,
  `eidcol` int(5) UNSIGNED NOT NULL,
  `enom` varchar(255) CHARACTER SET latin1 NOT NULL,
  `epal` varchar(255) CHARACTER SET latin1 NOT NULL,
  `edir` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ecel` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`idest`, `eidcol`, `enom`, `epal`, `edir`, `ecel`, `email`) VALUES
(54545, 44225, 'Lola', 'Lopez', 'Cra3#42', 3155485548, 'lolo@gmail.com'),
(100151155, 2, 'Camilio', 'Calle Coavas', 'Cra14b#2d-25, Casa', 3004836926, 'camicalle04@gmail.com'),
(102455454, 312, 'Sara', 'Lara', 'Calle23452', 3265451485, 'sara@gmail.com'),
(105514555, 123, 'Jose', 'Perez', 'Calle21312', 321548548, 'josep@gmail.com'),
(106554554, 312, 'Lucho', 'Dumar', 'Cra544121', 354521323, 'dumar@gmail.com'),
(132213215, 123, 'Pedro', 'Narvaez', 'Calle21231', 3214454541, 'pedro@gmail.com'),
(1011551511, 123, 'Juan', 'Montes', 'Avenida112Calle122', 3052155451, 'juan@gmail.com'),
(4294967295, 123, 'Dora', 'Espinosa', 'Avenida313131', 317554444, 'dora@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(20) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pass`) VALUES
(1, 'calle', '1234'),
(2, 'jime', '12345'),
(4, 'lucas', '123456789');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colegios`
--
ALTER TABLE `colegios`
  ADD PRIMARY KEY (`idcol`) USING BTREE;

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`idest`) USING BTREE,
  ADD KEY `eidcol` (`eidcol`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`eidcol`) REFERENCES `colegios` (`idcol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
