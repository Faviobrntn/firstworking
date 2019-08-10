-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2019 a las 05:39:23
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `firstworking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `facultad_id` int(11) NOT NULL,
  `creado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `descripcion`, `facultad_id`, `creado`) VALUES
(1, 'Ingeniería en Sistemas de Información', 'El Ingeniero en Sistemas de Información es un profesional de sólida formación analítica que le permite la interpretación y resolución de problemas mediante el empleo de metodologías de sistemas y tecnologías de procesamiento de información.', 1, '2019-07-25 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resumen` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idcarrera` int(11) NOT NULL,
  `materias_aprobadas` int(2) DEFAULT NULL,
  `promedio` double DEFAULT NULL,
  `experiencia_laboral` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `conocimientos` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `objetivos` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo` blob,
  `creado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cv`
--

INSERT INTO `cv` (`id`, `usuario_id`, `titulo`, `resumen`, `idcarrera`, `materias_aprobadas`, `promedio`, `experiencia_laboral`, `conocimientos`, `objetivos`, `archivo`, `creado`) VALUES
(4, 7, 'cv version 2', 'molestie nunc non blandit massa enim. Nibh tellus molestie nunc non blandit massa enim nec dui.\r\n\r\n', 1, 12, 9, 'ninguna', 'Nullam eget felis eget nunc lobortis mattis aliquam faucibus purus. Dictum non consectetur a erat nam. Ipsum consequat nisl vel pretium lectus quam id leo in. Facilisis leo vel fringilla est ullamcorper eget nulla. Ornare massa eget egestas purus. Congue nisi vitae suscipit tellus mauris a diam maecenas. Sed turpis tincidunt id aliquet risus feugiat in ante. Adipiscing elit ut aliquam purus. Cursus euismod quis viverra nibh. Amet volutpat consequat mauris nunc. Nec dui nunc mattis enim ut tellus', 'agittis vitae. Natoque penatibus et magnis dis parturient. Ullamcorper morbi tincidunt ornare massa eget egestas. Nibh tellus molestie nunc non blandit massa enim. Nibh tellus molestie nunc non blandi', NULL, '2019-08-09 05:08:12'),
(3, 7, 'curriculum_asd_php', 'Nullam eget felis eget nunc lobortis mattis aliquam faucibus purus. Dictum non consectetur a erat nam. Ipsum consequa', 1, 12, 9, 'phpphpphpphpphpph pphpphpphpphpphpphpphpphpphpp \r\n  hpphpphpphpphpphp phpphpphpphpphpphpphpphpph pphpphpphpphpphpphpphpphpphp  ', 'PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP PHP ', 'Nullam eget felis eget nunc lobortis mattis aliquam faucibus purus. Dictum non consectetur a erat nam. Ipsum consequat nisl vel pretium lectus quam id leo in. Facilisis leo vel fringilla est ullamcorp', NULL, '2019-08-09 05:07:14'),
(5, 7, 'carpintero (por las dudas que no me tome nadi', 'Nullam eget felis eget nunc lobortis mattis aliquam faucibus purus. Dictum non consectetur a erat nam. Ipsum consequat n', 1, 0, 10, 'Nullam eget felis eget nunc lobortis mattis aliquam faucibus purus. Dictum non consectetur a erat nam. Ipsum consequat nisl vel pretium lectus quam id leo in. Facilisis leo vel fringilla est ullamcorper eget nulla. Ornare massa eget egestas purus. Congue nisi vitae suscipit tellus mauris a diam maecenas. Sed turpis tincidunt id aliquet risus feugiat in ante. Adipiscing elit ut aliquam purus. Cursus euismod quis viverra nibh. Amet volutpat consequat mauris nunc. Nec dui nunc mattis enim ut tellus', 'Nullam eget felis eget nunc lobortis mattis aliquam faucibus purus. Dictum non consectetur a erat nam. Ipsum consequat nisl vel pretium lectus quam id leo in. Facilisis leo vel fringilla est ullamcorper eget nulla. Ornare massa eget egestas purus. Congue nisi vitae suscipit tellus mauris a diam maecenas. Sed turpis tincidunt id aliquet risus feugiat in ante. Adipiscing elit ut aliquam purus. Cursus euismod quis viverra nibh. Amet volutpat consequat mauris nunc. Nec dui nunc mattis enim ut tellus', 'Nullam eget felis eget nunc lobortis mattis aliquam faucibus purus. Dictum non consectetur a erat nam. Ipsum consequat nisl vel pretium lectus quam id leo in. Facilisis leo vel fringilla est ullamcorp', NULL, '2019-08-09 05:08:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `localidad_id` int(11) NOT NULL,
  `creado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`id`, `nombre`, `direccion`, `email`, `descripcion`, `localidad_id`, `creado`) VALUES
(1, 'Universidad Tecnológica Nacional - regional rosario', 'Zeballos 1341', 'consulta@frro.utn.edu.ar', 'FACULTAD REGIONAL ROSARIO\r\nUniversidad Tecnológica Nacional', 1, '2019-07-25 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `provincia_id` int(11) NOT NULL,
  `creado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id`, `nombre`, `descripcion`, `provincia_id`, `creado`) VALUES
(1, 'rosario', 'lorem ipsum dolor sit amet consectetur adipisicing elit.', 1, '2019-05-27 02:02:14'),
(2, 'cordoba', 'lorem ipsum dolor sit amet consectetur adipisicing elit.', 2, '2019-05-27 02:02:14'),
(3, 'buenos aire', 'adffascsvvfdhghpgjhpjgndbnfib sadpai a dpasi di ahsoid ha dhao hoaidh ioahroquhf', 4, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `localidad_id` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `modalidad` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `horario_laboral` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `remuneracion` float DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `creado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `usuario_id`, `carrera_id`, `localidad_id`, `titulo`, `modalidad`, `horario_laboral`, `remuneracion`, `descripcion`, `creado`) VALUES
(1, 6, 1, 2, 'php', 'full time', '12 a 12', 1, 'fdasdfasgasdgas asdgasgasdgsdrferawgah sgasgasfhsg sdgasdfas fdsfsadf gs ag asdfasd ghas h asdg asdgsad g', '2019-08-07 03:24:37'),
(2, 6, 1, 1, 'java', 'part time', '9 a 18', 2e18, 'asdcscacsda csadc sdacsdcasdvcsdcvsdvd asvasdv asgasdgdsgasfaert#$%#@%@#$^@twgasdfgsadgartqwer#@%$tafasdfadsasdgfsafg sadfgasdfasd gsadg as ga sdg asdg asdgas gasg as gsg adsga sdgj dhfgd', '2019-08-07 23:14:26'),
(3, 6, 1, 1, 'c++', 'full time', 'a convenir', 50000, 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. scelerisque eleifend donec pretium vulputate. nisl rhoncus mattis rhoncus urna neque. platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. velit euismod in pellentesque massa placerat. egestas sed tempus urna et pharetra. lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi. metus dictum at tempor commodo ullamcorper. neque sodales ut etiam sit amet nisl purus in mollis. tellus at urna condimentum mattis pellentesque id nibh tortor id. sed tempus urna et pharetra pharetra massa. sociis natoque penatibus et magnis dis parturient. in hac habitasse platea dictumst quisque sagittis purus sit. praesent elementum facilisis leo vel fringilla est ullamcorper.', '2019-08-08 01:26:10'),
(4, 6, 1, 2, 'se busca programador', 'remoto', 'a convenir', 0, 'vitae tempus quam pellentesque nec nam aliquam sem et. vulputate odio ut enim blandit volutpat maecenas volutpat blandit. dui faucibus in ornare quam viverra orci sagittis. ante in nibh mauris cursus mattis. mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. faucibus vitae aliquet nec ullamcorper sit amet. integer quis auctor elit sed vulputate mi sit. morbi tristique senectus et netus et malesuada. pellentesque pulvinar pellentesque habitant morbi.', '2019-08-08 01:26:54'),
(5, 6, 1, 1, 'analistas atencion!', 'remoto', '12 a 12', 0, 'vitae tempus quam pellentesque nec nam aliquam sem et. vulputate odio ut enim blandit volutpat maecenas volutpat blandit. dui faucibus in ornare quam viverra orci sagittis. ante in nibh mauris cursus mattis. mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. faucibus vitae aliquet nec ullamcorper sit amet. integer quis auctor elit sed vulputate mi sit. morbi tristique senectus et netus et malesuada. pellentesque pulvinar pellentesque habitant morbi.vitae tempus quam pellentesque nec nam aliquam sem et. vulputate odio ut enim blandit volutpat maecenas volutpat blandit. dui faucibus in ornare quam viverra orci sagittis. ante in nibh mauris cursus mattis. mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. faucibus vitae aliquet nec ullamcorper sit amet. integer quis auctor elit sed vulputate mi sit. morbi tristique senectus et netus et malesuada. pellentesque pulvinar pellentesque habitant morbi.', '2019-08-08 01:27:15'),
(6, 6, 1, 2, 'urgente!', 'full time', '12 a 12', 1e15, 'nullam eget felis eget nunc lobortis mattis aliquam faucibus purus. dictum non consectetur a erat nam. ipsum consequat nisl vel pretium lectus quam id leo in. facilisis leo vel fringilla est ullamcorper eget nulla. ornare massa eget egestas purus. congue nisi vitae suscipit tellus mauris a diam maecenas. sed turpis tincidunt id aliquet risus feugiat in ante. adipiscing elit ut aliquam purus. cursus euismod quis viverra nibh. amet volutpat consequat mauris nunc. nec dui nunc mattis enim ut tellus elementum sagittis vitae. natoque penatibus et magnis dis parturient. ullamcorper morbi tincidunt ornare massa eget egestas. nibh tellus molestie nunc non blandit massa enim. nibh tellus molestie nunc non blandit massa enim nec dui.\r\n\r\nnullam eget felis eget nunc lobortis mattis aliquam faucibus purus. dictum non consectetur a erat nam. ipsum consequat nisl vel pretium lectus quam id leo in. facilisis leo vel fringilla est ullamcorper eget nulla. ornare massa eget egestas purus. congue nisi vitae suscipit tellus mauris a diam maecenas. sed turpis tincidunt id aliquet risus feugiat in ante. adipiscing elit ut aliquam purus. cursus euismod quis viverra nibh. amet volutpat consequat mauris nunc. nec dui nunc mattis enim ut tellus elementum sagittis vitae. natoque penatibus et magnis dis parturient. ullamcorper morbi tincidunt ornare massa eget egestas. nibh tellus molestie nunc non blandit massa enim. nibh tellus molestie nunc non blandit massa enim nec dui.\r\n\r\n', '2019-08-08 01:27:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulaciones`
--

CREATE TABLE `postulaciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `oferta_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `creado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `postulaciones`
--

INSERT INTO `postulaciones` (`id`, `usuario_id`, `oferta_id`, `cv_id`, `creado`) VALUES
(1, 7, 2, 5, '2019-08-10 04:34:14'),
(2, 7, 1, 5, '2019-08-10 04:34:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `creado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`, `descripcion`, `creado`) VALUES
(1, 'santa fe', 'lorem ipsum dolor sit amet consectetur adipisicing elit. placeat, magnam quibusdam.', '2019-05-21 03:36:19'),
(2, 'cordoba', 'lorem ipsum dolor sit amet consectetur adipisicing elit. placeat, magnam quibusdam.', '2019-05-21 03:36:19'),
(3, 'buenos aires', 'asdfsfasdfsfasfsfsafsaf', '0000-00-00 00:00:00'),
(4, 'tucuman', 'onde los integrantes faltantes desempeñarán roles distintos a los que tuvieron en su grupo original.\r\n\r\nEl trabajo práctico consta de actividades grupales e individuales. Las actividades individuales tendrán el código I y las grupales el código G.\r\n\r\nCada grupo deberá asignar los siguientes roles a sus integrantes, los roles no pueden repetirse ni cambiarse luego de establecerse y cada integrante deberá tener un úni', '0000-00-00 00:00:00'),
(5, 'tucuman', 'deberán úni', '0000-00-00 00:00:00'),
(6, 'jujuy', 'deberán úni', '0000-00-00 00:00:00'),
(7, 'salta', 'deberán úni', '0000-00-00 00:00:00'),
(8, 'san juan', 'deberán úni', '0000-00-00 00:00:00'),
(9, 'santiago del estero', 'deberán úni', '0000-00-00 00:00:00'),
(10, 'corrientes', 'deberán úni', '0000-00-00 00:00:00'),
(11, 'santa cruz', 'deberán úni', '0000-00-00 00:00:00'),
(12, 'tierra del fuego', 'deberán úni', '0000-00-00 00:00:00'),
(13, 'entre rios', 'deberán úni', '0000-00-00 00:00:00'),
(14, 'la pampa', 'deberán úni', '0000-00-00 00:00:00'),
(15, 'mendoza', 'deberán úni', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dni` int(10) DEFAULT NULL,
  `domicilio` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `localidad_id` int(11) NOT NULL,
  `creado` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `rol`, `telefono`, `dni`, `domicilio`, `carrera_id`, `localidad_id`, `creado`) VALUES
(1, 'usuario', 'administrador', 'admin@firstworking.com', '202cb962ac59075b964b07152d234b70', 'admin', NULL, NULL, NULL, NULL, 1, '2019-07-25 00:00:00'),
(6, 'fernando', 'albertengo', 'fernando.albertengo@gmail.com', 'bb267ff3be81d4c809c11b5951b009e9', 'ofertante', NULL, NULL, NULL, NULL, 1, '2019-08-07 01:38:16'),
(7, 'asd', 'asd', 'asd@asd', '7815696ecbf1c96e6894b779456d330e', 'postulante', NULL, NULL, NULL, NULL, 1, '2019-08-07 02:35:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultad_id` (`facultad_id`);

--
-- Indices de la tabla `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcarrera` (`idcarrera`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `localidad_id` (`localidad_id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provincia_id` (`provincia_id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrera_id` (`carrera_id`),
  ADD KEY `localidad_id` (`localidad_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oferta_id` (`oferta_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrera_id` (`carrera_id`),
  ADD KEY `localidad_id` (`localidad_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `facultades`
--
ALTER TABLE `facultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
