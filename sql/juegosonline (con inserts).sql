-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 21:10:19
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juegosonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegosonline_juegos`
--

CREATE TABLE `juegosonline_juegos` (
  `id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `slug` varchar(256) DEFAULT 'NULL',
  `descripcion` varchar(256) DEFAULT NULL,
  `url_juego` varchar(256) NOT NULL,
  `img_principal` varchar(128) NOT NULL,
  `img_secundaria` varchar(128) DEFAULT NULL,
  `codigo` varchar(16) DEFAULT NULL,
  `destacado` int(11) DEFAULT '0',
  `estado` int(11) NOT NULL,
  `creado` datetime NOT NULL,
  `actualizado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juegosonline_juegos`
--

INSERT INTO `juegosonline_juegos` (`id`, `tipo_id`, `categoria_id`, `nombre`, `slug`, `descripcion`, `url_juego`, `img_principal`, `img_secundaria`, `codigo`, `destacado`, `estado`, `creado`, `actualizado`) VALUES
(1, 2, 1, 'Nova Defender', 'nova-defender', 'Waves of aliens are attacking your base. It\'s time to war! You have to defend your base with all weapons you have!', 'https://cdn.kiz10.com/upload/games/htmlgames/nova-defender-2019/1510027347/index.html', 'juego_VF0C596PSA66IWE1.jpg', NULL, 'VF0C596PSA66IWE1', 0, 1, '2019-06-03 16:43:16', '2019-06-03 17:51:32'),
(2, 1, 2, 'Pinatamasters Online ', 'pinatamasters-online', 'The pinatas are crazy, its time to shot them all. Travel all over the world and destroy all pinatas. Collect coins and buy new weapons and upgrades to smash all this cute and crazys pinatas. Over 100 levels, and 4 awesome worlds.', 'https://cdn.kiz10.com/upload/games/htmlgames/pinatamasters-online-2019/1558526681/index.html', 'juego_1W74472S1Z761A82.jpg', NULL, '1W74472S1Z761A82', 1, 1, '2019-06-03 16:47:43', '2019-06-03 17:51:44'),
(3, 2, 4, 'Road Of Rampage', 'road-of-rampage', 'Set on a post-apocalyptic wasteland, road machines with bursting gun are on rampaging war. Shoot and destroy every enemies who get on your road. Improve your ride to be the strongest war-machine amongst all! ', 'https://cdn.kiz10.com/upload/games/htmlgames/road-of-rampage-2019/1553328030/index.html', 'juego_F512U4874LMN60C3.jpg', NULL, 'F512U4874LMN60C3', 1, 1, '2019-06-03 20:00:41', '2019-06-03 20:00:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegosonline_juegos_categorias`
--

CREATE TABLE `juegosonline_juegos_categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `creado` datetime NOT NULL,
  `actualizado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juegosonline_juegos_categorias`
--

INSERT INTO `juegosonline_juegos_categorias` (`id`, `nombre`, `descripcion`, `estado`, `creado`, `actualizado`) VALUES
(1, 'Acción', NULL, 1, '2019-06-03 17:06:45', '2019-06-03 17:06:45'),
(2, 'Aventura', NULL, 1, '2019-06-03 17:06:52', '2019-06-03 17:06:52'),
(3, 'Chicas', NULL, 1, '2019-06-03 17:06:58', '2019-06-03 17:06:58'),
(4, 'Conducción', NULL, 1, '2019-06-03 17:07:04', '2019-06-03 17:14:08'),
(5, 'Deportes', NULL, 1, '2019-06-03 17:07:10', '2019-06-03 17:07:10'),
(6, 'Divertidos', NULL, 1, '2019-06-03 17:07:16', '2019-06-03 17:07:16'),
(7, 'Estrategia', NULL, 1, '2019-06-03 17:07:22', '2019-06-03 17:07:22'),
(8, 'Gestión', NULL, 1, '2019-06-03 17:07:28', '2019-06-03 17:07:28'),
(9, 'Habilidad', NULL, 1, '2019-06-03 17:07:32', '2019-06-03 17:07:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegosonline_usuarios`
--

CREATE TABLE `juegosonline_usuarios` (
  `id` int(11) NOT NULL,
  `apellido` varchar(64) DEFAULT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  `telefono` varchar(32) DEFAULT NULL,
  `correo` varchar(120) DEFAULT NULL,
  `log_correo` varchar(120) DEFAULT NULL,
  `log_pass` varchar(32) DEFAULT NULL,
  `validado` int(11) DEFAULT NULL,
  `keymaster` varchar(32) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `actualizado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juegosonline_usuarios`
--

INSERT INTO `juegosonline_usuarios` (`id`, `apellido`, `nombre`, `telefono`, `correo`, `log_correo`, `log_pass`, `validado`, `keymaster`, `tipo_id`, `estado`, `creado`, `actualizado`) VALUES
(1, 'Llamas', 'Jonathan', '2604000000', 'demo@demo.com', 'demo@demo.com', 'c514c91e4ed341f263e458d44b3bb0a7', 1, NULL, 1, 1, '2019-06-03 08:31:22', '2019-06-03 08:31:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juegosonline_juegos`
--
ALTER TABLE `juegosonline_juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegosonline_juegos_categorias`
--
ALTER TABLE `juegosonline_juegos_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegosonline_usuarios`
--
ALTER TABLE `juegosonline_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegosonline_juegos`
--
ALTER TABLE `juegosonline_juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `juegosonline_juegos_categorias`
--
ALTER TABLE `juegosonline_juegos_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `juegosonline_usuarios`
--
ALTER TABLE `juegosonline_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
