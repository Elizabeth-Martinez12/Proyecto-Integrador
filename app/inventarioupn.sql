-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-05-2024 a las 21:13:48
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventarioupn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id` int NOT NULL,
  `idEdificio` int NOT NULL,
  `numero` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id`, `idEdificio`, `numero`, `tipo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '101', 'Normal', '2024-04-03 00:00:00', NULL, NULL),
(2, 1, '102', 'Normal', '2024-04-03 00:00:00', NULL, NULL),
(3, 2, '201', 'Laboratorio', '2024-04-03 00:00:00', NULL, NULL),
(4, 3, '301', 'Oficina', '2024-04-03 00:00:00', NULL, NULL),
(5, 4, '401', 'Biblioteca', '2024-04-03 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int NOT NULL,
  `nombre` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`) VALUES
(1, 'Mueble'),
(2, 'Electronica'),
(3, 'Material didactico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descontinuado`
--

CREATE TABLE `descontinuado` (
  `id` int NOT NULL,
  `nombre` int NOT NULL,
  `razon` text NOT NULL,
  `fechaSalida` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `descontinuado`
--

INSERT INTO `descontinuado` (`id`, `nombre`, `razon`, `fechaSalida`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 'Obsoleto', '2024-04-01', '2024-04-03 00:00:00', NULL, NULL),
(2, 2, 'Irreparable', '2024-04-02', '2024-04-03 00:00:00', NULL, NULL),
(3, 2, 'Dañado', '2024-04-03', '2024-04-03 00:00:00', NULL, NULL),
(4, 6, 'Obsoletos', '2024-04-04', '2024-04-03 00:00:00', NULL, NULL),
(5, 1, 'Desgaste severo', '2024-04-05', '2024-04-03 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE `edificio` (
  `id` int NOT NULL,
  `nombreEdificio` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `edificio`
--

INSERT INTO `edificio` (`id`, `nombreEdificio`, `tipo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Edificio A', 'Aulas', '2024-04-03 00:00:00', NULL, NULL),
(2, 'Edificio B', 'Laboratorios', '2024-04-03 00:00:00', NULL, NULL),
(3, 'Edificio C', 'Administrativo', '2024-04-03 00:00:00', NULL, NULL),
(4, 'Edificio D', 'Biblioteca', '2024-04-03 00:00:00', NULL, NULL),
(5, 'Edificio E', 'Deportivo', '2024-04-03 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int NOT NULL,
  `idAula` int NOT NULL,
  `imagen` blob NOT NULL,
  `nombre` int NOT NULL,
  `categoria` int NOT NULL,
  `descripcion` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `qr` blob NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `idAula`, `imagen`, `nombre`, `categoria`, `descripcion`, `status`, `qr`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0x68747470733a2f2f69352e77616c6d617274696d616765732e636f6d2e6d782f6d672f676d2f3370702f6173722f65376132633032632d346666642d343333652d623861352d6463653132656230373264342e30373261303736376661643864373137653637333332363632343035636164332e6a7065673f6f646e4865696768743d363132266f646e57696474683d363132266f646e42673d464646464646, 8, 2, 'HD 4K 1080p Blue Ray 165Hz', 1, 0x71725f636f646531, '2024-04-03 00:00:00', NULL, NULL),
(2, 2, 0x68747470733a2f2f68747470322e6d6c7374617469632e636f6d2f445f4e515f4e505f32585f3631333235302d4d4c5534393336353031363832325f3033323032322d462e77656270, 2, 1, 'Pizarra blanca', 1, 0x71725f636f646532, '2024-04-03 00:00:00', NULL, NULL),
(3, 3, 0x68747470733a2f2f6f6669677275702e6d782f696d6167652f63616368652f646174612f35352d363030783630302e6a7067, 4, 1, 'Mesa de madera', 0, 0x71725f636f646533, '2024-04-03 00:00:00', NULL, NULL),
(4, 4, 0x68747470733a2f2f6d2e6d656469612d616d617a6f6e2e636f6d2f696d616765732f492f363152613943444250484c2e5f41435f55463839342c313030305f514c38305f2e6a7067, 9, 2, 'Teclado marca Dell', 1, 0x71725f636f646534, '2024-04-03 00:00:00', NULL, NULL),
(5, 5, 0x68747470733a2f2f6b65796d612e636f6d2e6d782f77702d636f6e74656e742f75706c6f6164732f323032312f30362f6275746163612d617369656e746f2d792d72657370616c646f2d617a756c2e706e67, 1, 1, 'Butaca escolar y  simple', 1, 0x71725f636f646535, '2024-04-03 00:00:00', NULL, NULL),
(8, 1, '', 2, 1, 'Pizarrón blanco', 1, '', '0000-00-00 00:00:00', NULL, NULL),
(9, 2, '', 3, 2, 'Computadora marca Dell', 1, '', '0000-00-00 00:00:00', NULL, NULL),
(10, 3, '', 5, 2, 'Mouse alámbrico color rojo', 1, '', '0000-00-00 00:00:00', NULL, NULL),
(11, 4, '', 9, 2, 'Teclado inalámbrico', 1, '', '0000-00-00 00:00:00', NULL, NULL),
(12, 1, '', 4, 1, 'Mesa color azul de madera', 1, '', '0000-00-00 00:00:00', NULL, NULL),
(13, 4, '', 4, 1, 'Mesa cafe', 1, '', '0000-00-00 00:00:00', NULL, NULL),
(14, 1, '', 4, 1, 'Mesa azul con patas negras 22', 1, '', '0000-00-00 00:00:00', NULL, NULL),
(15, 1, '', 1, 1, 'Silla color verde con mancha de pintura', 1, '', '0000-00-00 00:00:00', NULL, NULL),
(16, 1, '', 1, 1, 'vsgdf', 1, '', '0000-00-00 00:00:00', NULL, NULL),
(17, 1, '', 1, 1, 'hollaaaaaaa', 1, '', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id` int NOT NULL,
  `idAula` int NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `fechaEntrada` date NOT NULL,
  `fechaSalida` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id`, `idAula`, `nombre`, `descripcion`, `fechaEntrada`, `fechaSalida`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Proyector', 'Revisión general', '2024-04-01', '2024-04-02', '2024-04-03 00:00:00', NULL, NULL),
(2, 2, 'Impresora', 'Reemplazo de cartuchos', '2024-04-02', '2024-04-03', '2024-04-03 00:00:00', NULL, NULL),
(3, 3, 'Mesa', 'Reemplazo de patas', '2024-04-03', '2024-04-04', '2024-04-03 00:00:00', NULL, NULL),
(4, 4, 'Computadora', 'Revisión de estado', '2024-04-04', '2024-04-05', '2024-04-03 00:00:00', NULL, NULL),
(5, 5, 'Butaca', 'Colocar tornillos faltantes', '2024-04-05', '2024-04-06', '2024-04-03 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `idMate` int NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`idMate`, `nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Silla', '2024-04-03 00:00:00', NULL, NULL),
(2, 'Pizarron', '2024-04-03 00:00:00', NULL, NULL),
(3, 'Computadora', '2024-04-03 00:00:00', NULL, NULL),
(4, 'Mesa', '2024-04-03 00:00:00', NULL, NULL),
(5, 'Mouse', '2024-04-03 00:00:00', NULL, NULL),
(6, 'Silla', '2024-04-28 14:59:30', NULL, NULL),
(8, 'Proyector', '2024-05-06 21:46:56', NULL, NULL),
(9, 'Teclado', '2024-05-06 21:48:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `comentario` text COLLATE utf8mb4_general_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`, `comentario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrador', 'Perfil de administrador', '2024-04-03 00:00:00', NULL, NULL),
(2, 'Inventario', 'Perfil de inventario', '2024-04-03 00:00:00', NULL, NULL),
(3, 'Auditor', 'Perfil de auditor', '2024-04-03 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion`
--

CREATE TABLE `reparacion` (
  `id` int NOT NULL,
  `idAula` int NOT NULL,
  `nombre` int NOT NULL,
  `tipoReparacion` varchar(50) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaSalida` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reparacion`
--

INSERT INTO `reparacion` (`id`, `idAula`, `nombre`, `tipoReparacion`, `fechaIngreso`, `fechaSalida`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, 5, 'Cambio de lámpara', '2024-04-01', '2024-04-02', '2024-04-03 00:00:00', NULL, NULL),
(9, 3, 2, 'Cambio de bordes', '2024-04-02', '2024-04-03', '2024-04-03 00:00:00', NULL, NULL),
(10, 2, 4, 'Reemplazo de patas', '2024-04-03', '2024-04-04', '2024-04-03 00:00:00', NULL, NULL),
(11, 2, 8, 'Revisión de estado', '2024-04-04', '2024-04-05', '2024-04-03 00:00:00', NULL, NULL),
(12, 1, 3, 'Revision de funciones', '2024-04-05', '2024-04-06', '2024-04-03 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `identificador` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `apaterno` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `amaterno` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `perfil` int NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `identificador`, `nombre`, `apaterno`, `amaterno`, `perfil`, `email`, `password`, `sexo`, `fecha_nacimiento`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 12110219, 'Elizabeth', 'Martinez', 'Lorenzo', 1, 'elizamartlo121102@gmail.com', '$2y$10$pVzoLlc4vNEKrkdgkqKAu.ZrM0I7bvQiHR0OL/UsjiYI45Obva1ji', 'M', '2002-11-12', 1, '0000-00-00 00:00:00', NULL, NULL),
(21, 18239023, 'Jonathan', 'Julian', 'Cruz', 2, 'jjc4us@gmail.com', '$2y$10$P3oUVdLCr7xJ7yxsKjIRR.RS3ov2pHhOeAnBcfulCM6x.Jjw/bViO', 'H', '2003-04-26', 1, '0000-00-00 00:00:00', NULL, NULL),
(22, 12345678, 'Jose', 'Marquez', 'romero', 3, 'josemarquez18@gmail.com', '$2y$10$4D93k9ZzXUnxNz2YVLdkpe7W9Jw1JMNOpocxTFKKO7nlqdy6oHhsy', 'H', '2003-02-15', 1, '0000-00-00 00:00:00', NULL, NULL),
(24, 14725836, 'Fernando', 'sanchez', 'Juarez', 2, 'fer147258@gmail.com', '$2y$10$.B/ZFtEpZ9j0xrE2SYllAeuN..xRb04d10kNwWNef/En8a4Lfs4hK', 'H', '2003-03-21', 1, '0000-00-00 00:00:00', NULL, NULL),
(25, 12345678, 'ElIZABETH', 'MARTINEZ', 'Cruz', 2, 'tillman.imelda@example.org', '$2y$10$d9nMvhWy.CL6nOpBv58ZRuApyWLKjj3LgK0qJpNGJ6PiwNGpHMV3e', 'H', '2024-05-21', 1, '0000-00-00 00:00:00', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEdificio` (`idEdificio`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `descontinuado`
--
ALTER TABLE `descontinuado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAula` (`idAula`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAula` (`idAula`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idMate`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `reparacion`
--
ALTER TABLE `reparacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAula` (`idAula`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `usuarios_ibfk_1` (`perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `descontinuado`
--
ALTER TABLE `descontinuado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `idMate` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reparacion`
--
ALTER TABLE `reparacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`idEdificio`) REFERENCES `edificio` (`id`);

--
-- Filtros para la tabla `descontinuado`
--
ALTER TABLE `descontinuado`
  ADD CONSTRAINT `descontinuado_ibfk_1` FOREIGN KEY (`nombre`) REFERENCES `material` (`idMate`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`idAula`) REFERENCES `aula` (`id`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`nombre`) REFERENCES `material` (`idMate`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`idAula`) REFERENCES `aula` (`id`);

--
-- Filtros para la tabla `reparacion`
--
ALTER TABLE `reparacion`
  ADD CONSTRAINT `reparacion_ibfk_1` FOREIGN KEY (`idAula`) REFERENCES `aula` (`id`),
  ADD CONSTRAINT `reparacion_ibfk_2` FOREIGN KEY (`nombre`) REFERENCES `material` (`idMate`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil`) REFERENCES `perfiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
