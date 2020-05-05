-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-05-2020 a las 18:41:56
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prodesk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `cal_id` int(11) NOT NULL,
  `cal_user_id` int(11) NOT NULL,
  `cal_event_descripcion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `cal_type` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cal_title` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `cal_start_date` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cal_start_time` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cal_end_date` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cal_end_time` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cal_all_day` int(11) NOT NULL,
  `cal_url` varchar(230) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cal_background_color` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cal_border_color` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `can_id` int(11) NOT NULL,
  `can_nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `can_apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `can_email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `can_telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `can_fecha_nacimiento` date NOT NULL,
  `can_grado_estudios` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `can_tipo_grado_estudios` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `can_titulo_grado_estudios` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `can_espectativa_economica` float NOT NULL,
  `can_cv` varchar(220) COLLATE utf8_spanish_ci NOT NULL,
  `can_estatus` int(11) NOT NULL DEFAULT 1,
  `can_vac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cli_id` int(11) NOT NULL,
  `cli_razon_social` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `cli_nombre_comercial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cli_contacto_compras_nombres` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cli_contacto_compras_apellidos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cli_contacto_compras_correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cli_contacto_compras_telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cli_estatus` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cli_fecha_alta` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrevistas`
--

CREATE TABLE `entrevistas` (
  `ent_id` int(11) NOT NULL,
  `ent_vac_id` int(11) NOT NULL,
  `ent_candidato` int(11) NOT NULL,
  `ent_entrevistador` int(11) NOT NULL,
  `ent_fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ent_hora_inicio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ent_hora_fin` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ent_estatus` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'programada',
  `ent_archivo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ent_nota` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `not_id` int(11) NOT NULL,
  `not_usu_id` int(11) NOT NULL,
  `not_usu_id_creador` int(11) NOT NULL,
  `not_tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `not_texto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `not_descripcion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `not_fecha` datetime NOT NULL,
  `not_estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `tar_id` int(11) NOT NULL,
  `tar_usuarios` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `tar_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tar_fecha_inicio` date NOT NULL,
  `tar_hora_inicio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tar_fecha_fin` date NOT NULL,
  `tar_hora_fin` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tar_descripcion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `tar_archivo` varchar(240) COLLATE utf8_spanish_ci NOT NULL,
  `tar_archivo_nombre` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `tar_estatus` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tar_creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas_seguimiento`
--

CREATE TABLE `tareas_seguimiento` (
  `tar_seg_id` int(11) NOT NULL,
  `tar_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `tar_seg_nota` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `tar_cambio_estatus` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `tar_seg_nuevo_estatus` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tar_seg_fecha` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `usu_usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usu_roll` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `usu_ultimo_login` datetime NOT NULL DEFAULT current_timestamp(),
  `usu_estatus` tinyint(4) NOT NULL DEFAULT 1,
  `usu_foto` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `usu_password` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_usuario`, `usu_roll`, `usu_ultimo_login`, `usu_estatus`, `usu_foto`, `usu_password`) VALUES
(1, 'Carlos Perez Salgado', 'jcperezs2016@gmail.com', 'Administrador', '2020-03-24 20:34:25', 1, 'views/img/usuarios/carlos@ibradesk.com/user8-128x128.jpg', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacantes`
--

CREATE TABLE `vacantes` (
  `vac_id` int(11) NOT NULL,
  `vac_titulo` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `vac_descripcion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `vac_zona_trabajo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vac_sueldo_ofertado` float NOT NULL,
  `vac_fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `vac_link_occ` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `vac_estatus` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `vac_token_link` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `vac_cli_id` int(11) NOT NULL,
  `vac_creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`cal_id`);

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`can_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  ADD PRIMARY KEY (`ent_id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD UNIQUE KEY `not_id` (`not_id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`tar_id`);

--
-- Indices de la tabla `tareas_seguimiento`
--
ALTER TABLE `tareas_seguimiento`
  ADD PRIMARY KEY (`tar_seg_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- Indices de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  ADD PRIMARY KEY (`vac_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `cal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `can_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  MODIFY `ent_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `tar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tareas_seguimiento`
--
ALTER TABLE `tareas_seguimiento`
  MODIFY `tar_seg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  MODIFY `vac_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
