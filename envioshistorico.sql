-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8890
-- Tiempo de generación: 02-06-2020 a las 22:01:45
-- Versión del servidor: 5.7.25
-- Versión de PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `pgolden_nueva_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envioshistorico`
--

CREATE TABLE `envioshistorico` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `envioshistorico`
--

INSERT INTO `envioshistorico` (`id`, `venta_id`, `status`, `created`) VALUES
(1, 377, 'Recolección pendiente', '2020-06-02 21:32:34'),
(2, 378, 'Recolección pendiente', '2020-06-02 21:32:35'),
(3, 379, 'Recolección pendiente', '2020-06-02 21:32:36'),
(4, 388, 'Recolección pendiente', '2020-06-02 21:32:37'),
(5, 473, 'Preparando envio', '2020-06-02 21:59:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `envioshistorico`
--
ALTER TABLE `envioshistorico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `envioshistorico`
--
ALTER TABLE `envioshistorico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
