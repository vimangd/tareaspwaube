-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-11-2023 a las 14:04:58
-- Versión del servidor: 5.7.33
-- Versión de PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_de_calificaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `obs` text,
  `usuario_id_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `hora_creacion` time DEFAULT NULL,
  `usuario_id_actualizacion` int(11) DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `hora_actualizacion` time DEFAULT NULL,
  `usuario_id_eliminacion` int(11) DEFAULT NULL,
  `fecha_eliminacion` timestamp NULL DEFAULT NULL,
  `hora_eliminacion` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `nombre`, `obs`, `usuario_id_creacion`, `fecha_creacion`, `hora_creacion`, `usuario_id_actualizacion`, `fecha_actualizacion`, `hora_actualizacion`, `usuario_id_eliminacion`, `fecha_eliminacion`, `hora_eliminacion`) VALUES
(1, 'PHP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'HTML', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas_estudiante`
--

CREATE TABLE `asignaturas_estudiante` (
  `id` int(11) NOT NULL,
  `lugar_id` int(11) DEFAULT NULL,
  `asignatura_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `usuario_id_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `hora_creacion` time DEFAULT NULL,
  `usuario_id_actualizacion` int(11) DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `hora_actualizacion` time DEFAULT NULL,
  `usuario_id_eliminacion` int(11) DEFAULT NULL,
  `fecha_eliminacion` timestamp NULL DEFAULT NULL,
  `hora_eliminacion` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaturas_estudiante`
--

INSERT INTO `asignaturas_estudiante` (`id`, `lugar_id`, `asignatura_id`, `usuario_id`, `usuario_id_creacion`, `fecha_creacion`, `hora_creacion`, `usuario_id_actualizacion`, `fecha_actualizacion`, `hora_actualizacion`, `usuario_id_eliminacion`, `fecha_eliminacion`, `hora_eliminacion`) VALUES
(1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `enlace` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre`, `enlace`) VALUES
(1, 'profesor', 'https://previews.123rf.com/images/sararoom/sararoom1303/sararoom130300119/18782394-ilustraci%C3%B3n-de-dibujos-animados-del-profesor.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `obs` text,
  `usuario_id_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `hora_creacion` time DEFAULT NULL,
  `usuario_id_actualizacion` int(11) DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `hora_actualizacion` time DEFAULT NULL,
  `usuario_id_eliminacion` int(11) DEFAULT NULL,
  `fecha_eliminacion` timestamp NULL DEFAULT NULL,
  `hora_eliminacion` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id`, `nombre`, `obs`, `usuario_id_creacion`, `fecha_creacion`, `hora_creacion`, `usuario_id_actualizacion`, `fecha_actualizacion`, `hora_actualizacion`, `usuario_id_eliminacion`, `fecha_eliminacion`, `hora_eliminacion`) VALUES
(1, 'UBE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'UNIVERSIDAD ANDINA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `asignatura_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `parcial` int(11) DEFAULT NULL,
  `teoria` float(6,2) DEFAULT NULL,
  `practica` float(6,2) DEFAULT NULL,
  `obs` text,
  `usuario_id_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `hora_creacion` time DEFAULT NULL,
  `usuario_id_actualizacion` int(11) DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `hora_actualizacion` time DEFAULT NULL,
  `usuario_id_eliminacion` int(11) DEFAULT NULL,
  `fecha_eliminacion` timestamp NULL DEFAULT NULL,
  `hora_eliminacion` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `asignatura_id`, `usuario_id`, `parcial`, `teoria`, `practica`, `obs`, `usuario_id_creacion`, `fecha_creacion`, `hora_creacion`, `usuario_id_actualizacion`, `fecha_actualizacion`, `hora_actualizacion`, `usuario_id_eliminacion`, `fecha_eliminacion`, `hora_eliminacion`) VALUES
(1, 1, 2, 1, 40.00, 40.00, NULL, 1, '2023-11-26 08:45:58', '03:45:58', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `obs` text,
  `usuario_id_creacion` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `hora_creacion` time DEFAULT NULL,
  `usuario_id_actualizacion` int(11) DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `hora_actualizacion` time DEFAULT NULL,
  `usuario_id_eliminacion` int(11) DEFAULT NULL,
  `fecha_eliminacion` timestamp NULL DEFAULT NULL,
  `hora_eliminacion` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `rol`, `contrasena`, `obs`, `usuario_id_creacion`, `fecha_creacion`, `hora_creacion`, `usuario_id_actualizacion`, `fecha_actualizacion`, `hora_actualizacion`, `usuario_id_eliminacion`, `fecha_eliminacion`, `hora_eliminacion`) VALUES
(1, 'Profesor', NULL, 'profesor@gmail.com', 1, 'e10adc3949ba59abbe56e057f20f883e', 'prueba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Juan', 'Arciniegas', 'ja@gmail.com', 2, '25d55ad283aa400af464c76d713c07ad', NULL, 1, '2023-11-26 07:04:13', '02:04:13', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Luis', 'Andrade', 'ja@gmail.com', 2, '25d55ad283aa400af464c76d713c07ad', NULL, 1, '2023-11-26 07:05:26', '02:05:26', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'JosÃ©', 'Coello', 'jc@gmail.com', 2, '25d55ad283aa400af464c76d713c07ad', NULL, 1, '2023-11-26 07:06:47', '02:06:47', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Alexandra', 'Paredes', 'ap@gmail.com', 2, '25d55ad283aa400af464c76d713c07ad', NULL, 1, '2023-11-26 07:07:42', '02:07:42', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Juan', 'Arciniegas', 'ja@gmail.com', 2, '25d55ad283aa400af464c76d713c07ad', NULL, 1, '2023-11-26 09:25:59', '04:25:59', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignaturas_estudiante`
--
ALTER TABLE `asignaturas_estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `asignaturas_estudiante`
--
ALTER TABLE `asignaturas_estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
