-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-03-2025 a las 04:06:19
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca1_0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `fecha_apertura` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` text,
  `telefono` varchar(20) DEFAULT NULL,
  `gmail` varchar(50) DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `moroso` tinyint(1) DEFAULT NULL,
  `semestre_actual` int(11) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `credito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `cota` varchar(15) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `tipo_libro` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `carrera` varchar(255) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `editorial` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obreros`
--

CREATE TABLE `obreros` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` text,
  `telefono` varchar(20) DEFAULT NULL,
  `gmail` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `moroso` tinyint(1) DEFAULT NULL,
  `credito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasantias`
--

CREATE TABLE `pasantias` (
  `cota` varchar(15) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `tutor` varchar(255) DEFAULT NULL,
  `fecha_presentacion` date DEFAULT NULL,
  `carrera` varchar(255) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `tutor_comunitario` varchar(100) DEFAULT NULL,
  `lugar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL,
  `cedula_persona` int(11) DEFAULT NULL,
  `tipo_persona` varchar(100) DEFAULT NULL,
  `cota_documento` varchar(100) DEFAULT NULL,
  `tipo_documento` varchar(100) DEFAULT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `estado` enum('Prestado','Devuelto') NOT NULL DEFAULT 'Prestado',
  `observaciones` text,
  `usuario_registro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` text,
  `telefono` varchar(20) DEFAULT NULL,
  `gmail` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `moroso` tinyint(1) DEFAULT NULL,
  `credito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_comunitario`
--

CREATE TABLE `servicio_comunitario` (
  `cota` varchar(15) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `tutor` varchar(255) DEFAULT NULL,
  `fecha_presentacion` date DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `tutor_comunitario` varchar(100) DEFAULT NULL,
  `lugar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos_investigacion`
--

CREATE TABLE `trabajos_investigacion` (
  `cota` varchar(15) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `tutor` varchar(255) DEFAULT NULL,
  `fecha_presentacion` date DEFAULT NULL,
  `carrera` varchar(255) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `linea_investigacion` varchar(255) DEFAULT NULL,
  `mencion` varchar(255) DEFAULT NULL,
  `metodologia` text,
  `metodo` varchar(255) DEFAULT NULL,
  `tipo` enum('post','pre') DEFAULT NULL,
  `palabras_claves` text,
  `nivel_academico` enum('Trabajo de investigacion','Tesis') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`cota`);

--
-- Indices de la tabla `obreros`
--
ALTER TABLE `obreros`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `pasantias`
--
ALTER TABLE `pasantias`
  ADD PRIMARY KEY (`cota`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `servicio_comunitario`
--
ALTER TABLE `servicio_comunitario`
  ADD PRIMARY KEY (`cota`);

--
-- Indices de la tabla `trabajos_investigacion`
--
ALTER TABLE `trabajos_investigacion`
  ADD PRIMARY KEY (`cota`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
