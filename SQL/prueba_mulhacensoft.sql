-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2021 a las 16:31:06
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_mulhacensoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_diagnostico` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `diagnosticos`
--

INSERT INTO `diagnosticos` (`id`, `id_paciente`, `descripcion`, `fecha_diagnostico`) VALUES
(1, 1, 'Tiene tres muelas picadas', '2021-05-17 14:26:11'),
(2, 1, 'Requiere una limpieza y extraerle la muela de juicio', '2021-05-17 14:28:57'),
(3, 2, 'Necesita varias revisiones más y empastar varias muelas', '2021-05-17 14:29:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `accion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL COMMENT '0=Paciente/1=Diagnóstico',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`id`, `accion`, `tipo`, `fecha`) VALUES
(1, 'Paciente dado de alta correctamente con DNI: 65004204V', 1, '2021-05-17 14:19:17'),
(2, 'Se ha inspeccionado la ficha del paciente con DNI: 65004204V', 1, '2021-05-17 14:19:30'),
(3, 'Se ha eliminado el paciente con DNI: 65004204V', 1, '2021-05-17 14:19:52'),
(4, 'Paciente dado de alta correctamente con DNI: 65004204V', 1, '2021-05-17 14:20:21'),
(5, 'Paciente dado de alta correctamente con DNI: 47561703A', 1, '2021-05-17 14:22:40'),
(6, 'Paciente dado de alta correctamente con DNI: 32089913Z', 1, '2021-05-17 14:23:21'),
(7, 'Se ha inspeccionado la ficha del paciente con DNI: 47561703A', 1, '2021-05-17 14:23:31'),
(8, 'Se ha inspeccionado la ficha del paciente con DNI: 32089913Z', 1, '2021-05-17 14:23:34'),
(9, 'Se ha inspeccionado la ficha del paciente con DNI: 47561703A', 1, '2021-05-17 14:23:38'),
(10, 'Se ha inspeccionado la ficha del paciente con DNI: 65004204V', 1, '2021-05-17 14:23:41'),
(11, 'Se ha inspeccionado la ficha del paciente con DNI: 65004204V', 1, '2021-05-17 14:23:56'),
(12, 'Paciente editado correctamente con DNI: 65004204V', 1, '2021-05-17 14:24:39'),
(13, 'Diagnóstico asignado al paciente con identificador: 1', 2, '2021-05-17 14:26:11'),
(14, 'Se ha visitado el listado de diagnósticos del paciente con identificador: 1', 2, '2021-05-17 14:26:14'),
(15, 'Diagnóstico asignado al paciente con identificador: 1', 2, '2021-05-17 14:26:28'),
(16, 'Diagnóstico asignado al paciente con identificador: 2', 2, '2021-05-17 14:27:05'),
(17, 'Se ha visitado el listado de diagnósticos del paciente con identificador: 2', 2, '2021-05-17 14:27:06'),
(18, 'Se ha visitado el listado de diagnósticos del paciente con identificador: 1', 2, '2021-05-17 14:27:09'),
(19, 'Se ha visitado el listado de diagnósticos del paciente con identificador: 1', 2, '2021-05-17 14:28:13'),
(20, 'Se ha visitado el listado de diagnósticos del paciente con identificador: 2', 2, '2021-05-17 14:28:59'),
(21, 'Se ha visitado el listado de diagnósticos del paciente con identificador: 1', 2, '2021-05-17 14:29:03'),
(22, 'Se ha visitado el listado de diagnósticos del paciente con identificador: 2', 2, '2021-05-17 14:29:07'),
(23, 'Se ha visitado el listado de diagnósticos del paciente con identificador: 2', 2, '2021-05-17 14:29:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `dni`, `fecha_nacimiento`, `direccion`, `email`, `fecha_registro`) VALUES
(1, 'Paciente 1', '65004204V', '2000-02-11', 'Calle Juan Manuel Rodriguez, Bloque 5', 'juanantonio-tm@mulhacen.com', '2021-05-17 14:29:45'),
(2, 'Paciente 2', '47561703A', '1997-05-18', 'Dirección de prueba 2', 'paciente@mulhacen.es', '2021-05-17 14:24:57'),
(3, 'Paciente 3', '32089913Z', '1995-11-12', 'Calle cespedes Nº15', 'francisco@mulhacen.es', '2021-05-17 14:24:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `fecha_registro`) VALUES
(1, 'Administrador', 'admin@mulhacentest.com', 'd4M727bgOesvM', '2021-05-17 14:30:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
