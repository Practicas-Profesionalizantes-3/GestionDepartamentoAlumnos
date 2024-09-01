-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2024 a las 22:18:05
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
-- Base de datos: `gestiondptoalumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_documento_tipo` int(11) NOT NULL,
  `id_usuario_estado` int(11) NOT NULL,
  `numero_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `password`, `email`, `id_documento_tipo`, `id_usuario_estado`, `numero_documento`) VALUES
(1, 'Benjamin', 'Lazarte', '$2y$10$bO/rJ8WNwVVfyINKmLq25u6knGWo2kPlo7nWv6hC7KL8YF/drBJwW', '42027184@itbeltran.com.ar', 1, 1, 42027184),
(2, 'Maxi', 'Lopez', '$2y$10$sMTrhhWBwWYZ1vWHgpNqcu1lJnUSPCXrP3i5Iw.T2YqIPL.nLKHGC', 'Maximilianolopez@gmail.com', 1, 1, 33222132),
(3, 'Luciano', 'Gomez', '$2y$10$rA/KvY70Pf7QwSB4VwHuUOs7NLMq7nAHlIKctEK9ChRfvx6vb9Kci', 'lucianogomez99@itbeltran.com.ar', 1, 1, 42012321),
(13, 'Sofia', 'Palomo', '$2y$10$/CGqBNy4l1Ginkyt1mIKnO3b.Beu5DHdqwi1lXo8xa4k0q3WU12WW', 'sofipalomo@gmail.com', 1, 1, 35043324);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_documento_tipo` (`id_documento_tipo`),
  ADD KEY `id_usuario_estado` (`id_usuario_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
