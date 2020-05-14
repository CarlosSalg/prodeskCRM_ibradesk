-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-05-2020 a las 02:32:56
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

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`cal_id`, `cal_user_id`, `cal_event_descripcion`, `cal_type`, `cal_title`, `cal_start_date`, `cal_start_time`, `cal_end_date`, `cal_end_time`, `cal_all_day`, `cal_url`, `cal_background_color`, `cal_border_color`) VALUES
(1, 1, '{\"usuarios\":\"[\\\"1\\\"]\",\"nombreTarea\":\"Tarea de prueba\",\"fechaInicio\":\"2020-05-05\",\"horaInicio\":\"15:20\",\"fechaFin\":\"2020-05-05\",\"horaFin\":\"16:50\",\"descripcionTarea\":\"Tarea de prueba\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Tarea de prueba', '2020-05-05', '15:20', '2020-05-05', '16:50', 0, 'index.php?route=ver-tarea&idTarea=1', '#f56954', '#f56954'),
(2, 1, '{\"usuarios\":\"[\\\"1\\\"]\",\"nombreTarea\":\"Aprender JavaScript\",\"fechaInicio\":\"2020-05-06\",\"horaInicio\":\"04:20\",\"fechaFin\":\"2020-05-07\",\"horaFin\":\"05:10\",\"descripcionTarea\":\"Reporte\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Aprender JavaScript', '2020-05-06', '04:20', '2020-05-07', '05:10', 0, 'index.php?route=ver-tarea&idTarea=2', '#f56954', '#f56954'),
(3, 1, '{\"usuarios\":\"[\\\"1\\\"]\",\"nombreTarea\":\"Prueba\",\"fechaInicio\":\"2020-05-15\",\"horaInicio\":\"12:30\",\"fechaFin\":\"2020-05-18\",\"horaFin\":\"15:20\",\"descripcionTarea\":\"Tarea numero 1\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Prueba', '2020-05-15', '12:30', '2020-05-18', '15:20', 0, 'index.php?route=ver-tarea&idTarea=3', '#f56954', '#f56954'),
(4, 1, '{\"vacante\":\"1\",\"candidato\":\"1\",\"entrevistador\":\"1\",\"fechaEntrevista\":\"2020-05-06\",\"horaEntrevista\":\"10:30\",\"horaEntrevistaFin\":\"12:30\"}', 'entrevista', 'EntrevistaProgramador PHP', '2020-05-06', '10:30', '2020-05-06', '12:30', 0, 'index.php?route=ver-entrevista&idEntrevista=1', '#f39c12', '#f39c12'),
(5, 1, '{\"vacante\":\"1\",\"candidato\":\"1\",\"entrevistador\":\"1\",\"fechaEntrevista\":\"2020-05-06\",\"horaEntrevista\":\"15:00\",\"horaEntrevistaFin\":\"18:00\"}', 'entrevista', 'EntrevistaProgramador PHP', '2020-05-06', '15:00', '2020-05-06', '18:00', 0, 'index.php?route=ver-entrevista&idEntrevista=2', '#f39c12', '#f39c12'),
(6, 1, '{\"usuarios\":\"[\\\"1\\\"]\",\"nombreTarea\":\"Aprender JavaScript\",\"fechaInicio\":\"2020-05-21\",\"horaInicio\":\"02:30\",\"fechaFin\":\"2020-06-21\",\"horaFin\":\"14:50\",\"descripcionTarea\":\"Enviar documentacion fiscal faltante\",\"archivoAdjunto\":\"views\\/docs\\/tareas\\/60\\/Propuesta ACF.docx\",\"archivoNombre\":\"Propuesta ACF.docx\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Aprender JavaScript', '2020-05-21', '02:30', '2020-06-21', '14:50', 0, 'index.php?route=ver-tarea&idTarea=4', '#f56954', '#f56954'),
(7, 1, '{\"vacante\":\"1\",\"candidato\":\"1\",\"entrevistador\":\"1\",\"fechaEntrevista\":\"2020-05-07\",\"horaEntrevista\":\"15:20\",\"horaEntrevistaFin\":\"16:20\"}', 'entrevista', 'EntrevistaProgramador PHP', '2020-05-07', '15:20', '2020-05-07', '16:20', 0, 'index.php?route=ver-entrevista&idEntrevista=3', '#f39c12', '#f39c12'),
(8, 1, '{\"vacante\":\"1\",\"candidato\":\"2\",\"entrevistador\":\"1\",\"fechaEntrevista\":\"2020-05-08\",\"horaEntrevista\":\"13:00\",\"horaEntrevistaFin\":\"14:00\"}', 'entrevista', 'EntrevistaProgramador PHP', '2020-05-08', '13:00', '2020-05-08', '14:00', 0, 'index.php?route=ver-entrevista&idEntrevista=4', '#f39c12', '#f39c12'),
(9, 1, '{\"vacante\":\"1\",\"candidato\":\"2\",\"entrevistador\":\"1\",\"fechaEntrevista\":\"2020-05-12\",\"horaEntrevista\":\"14:00\",\"horaEntrevistaFin\":\"15:00\"}', 'entrevista', 'EntrevistaProgramador PHP', '2020-05-12', '14:00', '2020-05-12', '15:00', 0, 'index.php?route=ver-entrevista&idEntrevista=5', '#f39c12', '#f39c12'),
(10, 1, '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Prueba\",\"fechaInicio\":\"1990-10-10\",\"horaInicio\":\"12:12\",\"fechaFin\":\"2021-12-19\",\"horaFin\":\"23:39\",\"descripcionTarea\":\"Ok\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Prueba', '1990-10-10', '12:12', '2021-12-19', '23:39', 0, 'index.php?route=ver-tarea&idTarea=5', '#f56954', '#f56954'),
(11, 2, '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Prueba\",\"fechaInicio\":\"1990-10-10\",\"horaInicio\":\"12:12\",\"fechaFin\":\"2021-12-19\",\"horaFin\":\"23:39\",\"descripcionTarea\":\"Ok\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Prueba', '1990-10-10', '12:12', '2021-12-19', '23:39', 0, 'index.php?route=ver-tarea&idTarea=5', '#f56954', '#f56954'),
(12, 1, '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Tarea de prueba\",\"fechaInicio\":\"2020-05-13\",\"horaInicio\":\"10:20\",\"fechaFin\":\"2020-05-13\",\"horaFin\":\"18:30\",\"descripcionTarea\":\"Tarea de prueba\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"2\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Tarea de prueba', '2020-05-13', '10:20', '2020-05-13', '18:30', 0, 'index.php?route=ver-tarea&idTarea=6', '#f56954', '#f56954'),
(13, 2, '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Tarea de prueba\",\"fechaInicio\":\"2020-05-13\",\"horaInicio\":\"10:20\",\"fechaFin\":\"2020-05-13\",\"horaFin\":\"18:30\",\"descripcionTarea\":\"Tarea de prueba\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"2\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Tarea de prueba', '2020-05-13', '10:20', '2020-05-13', '18:30', 0, 'index.php?route=ver-tarea&idTarea=6', '#f56954', '#f56954'),
(14, 1, '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Al 70 por ciento\",\"fechaInicio\":\"2020-02-20\",\"horaInicio\":\"20:20\",\"fechaFin\":\"202020-02-20\",\"horaFin\":\"20:20\",\"descripcionTarea\":\"asldkjasd\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Al 70 por ciento', '2020-02-20', '20:20', '202020-02-20', '20:20', 0, 'index.php?route=ver-tarea&idTarea=6', '#f56954', '#f56954'),
(15, 2, '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Al 70 por ciento\",\"fechaInicio\":\"2020-02-20\",\"horaInicio\":\"20:20\",\"fechaFin\":\"202020-02-20\",\"horaFin\":\"20:20\",\"descripcionTarea\":\"asldkjasd\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Al 70 por ciento', '2020-02-20', '20:20', '202020-02-20', '20:20', 0, 'index.php?route=ver-tarea&idTarea=6', '#f56954', '#f56954'),
(16, 1, '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Tiempo 70 por ciento\",\"fechaInicio\":\"2020-02-20\",\"horaInicio\":\"20:20\",\"fechaFin\":\"2020-02-20\",\"horaFin\":\"20:20\",\"descripcionTarea\":\"lkasdljk\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Tiempo 70 por ciento', '2020-02-20', '20:20', '2020-02-20', '20:20', 0, 'index.php?route=ver-tarea&idTarea=7', '#f56954', '#f56954'),
(17, 2, '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Tiempo 70 por ciento\",\"fechaInicio\":\"2020-02-20\",\"horaInicio\":\"20:20\",\"fechaFin\":\"2020-02-20\",\"horaFin\":\"20:20\",\"descripcionTarea\":\"lkasdljk\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', 'tarea', 'Tiempo 70 por ciento', '2020-02-20', '20:20', '2020-02-20', '20:20', 0, 'index.php?route=ver-tarea&idTarea=7', '#f56954', '#f56954');

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

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`can_id`, `can_nombre`, `can_apellidos`, `can_email`, `can_telefono`, `can_fecha_nacimiento`, `can_grado_estudios`, `can_tipo_grado_estudios`, `can_titulo_grado_estudios`, `can_espectativa_economica`, `can_cv`, `can_estatus`, `can_vac_id`) VALUES
(1, 'carlos', 'perez', 'jcperezs2016@gmail.com', '5520453424', '2020-05-05', 'Bachillerato', 'Concluida', '', 15000, 'views/docs/vacantes/candidatos/cv/545/Protocolo volver a casa.pdf.pdf.pdf', 1, 1),
(2, 'jose alberto', 'robles gonzalez', 'jcperezs2016@gmail.com', '12121212', '1212-12-12', 'Carrera Tecnica', 'Concluida', 'Licenciada en Psicologia', 130000, 'views/docs/vacantes/candidatos/cv/462/Propuesta ACF.pdf', 1, 1);

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

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cli_id`, `cli_razon_social`, `cli_nombre_comercial`, `cli_contacto_compras_nombres`, `cli_contacto_compras_apellidos`, `cli_contacto_compras_correo`, `cli_contacto_compras_telefono`, `cli_estatus`, `cli_fecha_alta`) VALUES
(1, 'Ibradesk SA de CV', 'Ibradesk', 'Juan Carlos', 'Perez Salgado', 'contacto@ibradesk.com', '5520453424', 'cliente_activo', '2020-05-05 18:09:25');

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

--
-- Volcado de datos para la tabla `entrevistas`
--

INSERT INTO `entrevistas` (`ent_id`, `ent_vac_id`, `ent_candidato`, `ent_entrevistador`, `ent_fecha`, `ent_hora_inicio`, `ent_hora_fin`, `ent_estatus`, `ent_archivo`, `ent_nota`) VALUES
(1, 1, 1, 1, '2020-05-06', '10:30', '12:30', 'programada', NULL, NULL),
(2, 1, 1, 1, '2020-05-06', '15:00', '18:00', 'programada', NULL, NULL),
(3, 1, 1, 1, '2020-05-07', '15:20', '16:20', 'programada', NULL, NULL),
(4, 1, 2, 1, '2020-05-08', '13:00', '14:00', 'programada', NULL, NULL),
(5, 1, 2, 1, '2020-05-12', '14:00', '15:00', 'programada', NULL, NULL);

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

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`not_id`, `not_usu_id`, `not_usu_id_creador`, `not_tipo`, `not_texto`, `not_descripcion`, `not_fecha`, `not_estatus`) VALUES
(1, 1, 1, 'tarea', 'Tarea Asignada 1', '{\"usuarios\":\"[\\\"1\\\"]\",\"nombreTarea\":\"Tarea de prueba\",\"fechaInicio\":\"2020-05-05\",\"horaInicio\":\"15:20\",\"fechaFin\":\"2020-05-05\",\"horaFin\":\"16:50\",\"descripcionTarea\":\"Tarea de prueba\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', '2020-05-05 13:15:55', 0),
(2, 1, 1, 'tarea', 'Tarea Asignada 2', '{\"usuarios\":\"[\\\"1\\\"]\",\"nombreTarea\":\"Aprender JavaScript\",\"fechaInicio\":\"2020-05-06\",\"horaInicio\":\"04:20\",\"fechaFin\":\"2020-05-07\",\"horaFin\":\"05:10\",\"descripcionTarea\":\"Reporte\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', '2020-05-05 14:43:33', 0),
(3, 1, 1, 'tarea', 'Tarea Asignada 3', '{\"usuarios\":\"[\\\"1\\\"]\",\"nombreTarea\":\"Prueba\",\"fechaInicio\":\"2020-05-15\",\"horaInicio\":\"12:30\",\"fechaFin\":\"2020-05-18\",\"horaFin\":\"15:20\",\"descripcionTarea\":\"Tarea numero 1\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', '2020-05-05 14:44:20', 0),
(4, 1, 1, 'entrevista', 'Nueva Entrevista', '{\"vacante\":\"1\",\"candidato\":\"1\",\"entrevistador\":\"1\",\"fechaEntrevista\":\"2020-05-06\",\"horaEntrevista\":\"10:30\",\"horaEntrevistaFin\":\"12:30\"}', '2020-05-06 18:35:15', 0),
(5, 1, 1, 'entrevista', 'Nueva Entrevista', '{\"vacante\":\"1\",\"candidato\":\"1\",\"entrevistador\":\"1\",\"fechaEntrevista\":\"2020-05-06\",\"horaEntrevista\":\"15:00\",\"horaEntrevistaFin\":\"18:00\"}', '2020-05-06 18:38:29', 0),
(6, 1, 1, 'tarea', 'Tarea Asignada 4', '{\"usuarios\":\"[\\\"1\\\"]\",\"nombreTarea\":\"Aprender JavaScript\",\"fechaInicio\":\"2020-05-21\",\"horaInicio\":\"02:30\",\"fechaFin\":\"2020-06-21\",\"horaFin\":\"14:50\",\"descripcionTarea\":\"Enviar documentacion fiscal faltante\",\"archivoAdjunto\":\"views\\/docs\\/tareas\\/60\\/Propuesta ACF.docx\",\"archivoNombre\":\"Propuesta ACF.docx\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', '2020-05-07 17:36:27', 0),
(7, 1, 1, 'entrevista', 'Nueva Entrevista', '{\"vacante\":\"1\",\"candidato\":\"1\",\"entrevistador\":\"1\",\"fechaEntrevista\":\"2020-05-07\",\"horaEntrevista\":\"15:20\",\"horaEntrevistaFin\":\"16:20\"}', '2020-05-07 17:43:25', 0),
(8, 1, 1, 'entrevista', 'Nueva Entrevista', '{\"vacante\":\"1\",\"candidato\":\"2\",\"entrevistador\":\"1\",\"fechaEntrevista\":\"2020-05-08\",\"horaEntrevista\":\"13:00\",\"horaEntrevistaFin\":\"14:00\"}', '2020-05-08 16:12:57', 0),
(9, 1, 1, 'entrevista', 'Nueva Entrevista', '{\"vacante\":\"1\",\"candidato\":\"2\",\"entrevistador\":\"1\",\"fechaEntrevista\":\"2020-05-12\",\"horaEntrevista\":\"14:00\",\"horaEntrevistaFin\":\"15:00\"}', '2020-05-12 11:37:50', 0),
(10, 1, 1, 'tarea', 'Tarea Asignada 5', '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Prueba\",\"fechaInicio\":\"1990-10-10\",\"horaInicio\":\"12:12\",\"fechaFin\":\"2021-12-19\",\"horaFin\":\"23:39\",\"descripcionTarea\":\"Ok\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', '2020-05-13 14:44:22', 0),
(11, 2, 1, 'tarea', 'Tarea Asignada 5', '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Prueba\",\"fechaInicio\":\"1990-10-10\",\"horaInicio\":\"12:12\",\"fechaFin\":\"2021-12-19\",\"horaFin\":\"23:39\",\"descripcionTarea\":\"Ok\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', '2020-05-13 14:44:22', 1),
(12, 1, 2, 'tarea', 'Tarea Asignada 6', '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Tarea de prueba\",\"fechaInicio\":\"2020-05-13\",\"horaInicio\":\"10:20\",\"fechaFin\":\"2020-05-13\",\"horaFin\":\"18:30\",\"descripcionTarea\":\"Tarea de prueba\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"2\",\"estatusTarea\":\"Asignada\"}', '2020-05-13 17:00:21', 0),
(13, 2, 2, 'tarea', 'Tarea Asignada 6', '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Tarea de prueba\",\"fechaInicio\":\"2020-05-13\",\"horaInicio\":\"10:20\",\"fechaFin\":\"2020-05-13\",\"horaFin\":\"18:30\",\"descripcionTarea\":\"Tarea de prueba\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"2\",\"estatusTarea\":\"Asignada\"}', '2020-05-13 17:00:21', 1),
(14, 1, 1, 'tarea', 'Tarea Asignada 6', '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Al 70 por ciento\",\"fechaInicio\":\"2020-02-20\",\"horaInicio\":\"20:20\",\"fechaFin\":\"202020-02-20\",\"horaFin\":\"20:20\",\"descripcionTarea\":\"asldkjasd\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', '2020-05-13 17:23:29', 0),
(15, 2, 1, 'tarea', 'Tarea Asignada 6', '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Al 70 por ciento\",\"fechaInicio\":\"2020-02-20\",\"horaInicio\":\"20:20\",\"fechaFin\":\"202020-02-20\",\"horaFin\":\"20:20\",\"descripcionTarea\":\"asldkjasd\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', '2020-05-13 17:23:29', 1),
(16, 1, 1, 'tarea', 'Tarea Asignada 7', '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Tiempo 70 por ciento\",\"fechaInicio\":\"2020-02-20\",\"horaInicio\":\"20:20\",\"fechaFin\":\"2020-02-20\",\"horaFin\":\"20:20\",\"descripcionTarea\":\"lkasdljk\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', '2020-05-13 17:23:51', 0),
(17, 2, 1, 'tarea', 'Tarea Asignada 7', '{\"usuarios\":\"[\\\"1\\\",\\\"2\\\"]\",\"nombreTarea\":\"Tiempo 70 por ciento\",\"fechaInicio\":\"2020-02-20\",\"horaInicio\":\"20:20\",\"fechaFin\":\"2020-02-20\",\"horaFin\":\"20:20\",\"descripcionTarea\":\"lkasdljk\",\"archivoAdjunto\":\"\",\"archivoNombre\":\"\",\"creadoPor\":\"1\",\"estatusTarea\":\"Asignada\"}', '2020-05-13 17:23:51', 1);

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
  `tar_creado_por` int(11) NOT NULL,
  `tar_creado` datetime NOT NULL DEFAULT current_timestamp(),
  `tar_avance` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`tar_id`, `tar_usuarios`, `tar_nombre`, `tar_fecha_inicio`, `tar_hora_inicio`, `tar_fecha_fin`, `tar_hora_fin`, `tar_descripcion`, `tar_archivo`, `tar_archivo_nombre`, `tar_estatus`, `tar_creado_por`, `tar_creado`, `tar_avance`) VALUES
(1, '[\"1\"]', 'Tarea de prueba', '2020-05-05', '15:20', '2020-05-05', '16:50', 'Tarea de prueba', '', '', 'Completada', 1, '2020-05-13 18:30:59', 10),
(2, '[\"1\"]', 'Aprender JavaScript', '2020-05-06', '04:20', '2020-05-07', '05:10', 'Reporte', '', '', 'Asignada', 1, '2020-05-13 18:30:59', 60),
(3, '[\"1\"]', 'Prueba', '2020-05-15', '12:30', '2020-05-18', '15:20', 'Tarea numero 1', '', '', 'Completada', 1, '2020-05-13 18:30:59', 80),
(4, '[\"1\"]', 'Aprender JavaScript', '2020-05-21', '02:30', '2020-06-21', '14:50', 'Enviar documentacion fiscal faltante', 'views/docs/tareas/60/Propuesta ACF.docx', 'Propuesta ACF.docx', 'En curso', 1, '2020-05-13 18:30:59', 70),
(5, '[\"1\",\"2\"]', 'Prueba', '1990-10-10', '12:12', '2021-12-19', '23:39', 'Ok', '', '', 'Pendiente', 1, '2020-05-13 19:44:22', 90),
(6, '[\"1\",\"2\"]', 'Tarea de prueba', '2020-05-13', '10:20', '2020-05-13', '18:30', 'Tarea de prueba', '', '', 'Asignada', 2, '2020-05-13 22:00:21', 100),
(7, '[\"1\",\"2\"]', 'Tiempo 70 por ciento', '2020-02-20', '20:20', '2020-02-20', '20:20', 'lkasdljk', '', '', 'Asignada', 1, '2020-05-13 22:23:51', 35);

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

--
-- Volcado de datos para la tabla `tareas_seguimiento`
--

INSERT INTO `tareas_seguimiento` (`tar_seg_id`, `tar_id`, `usu_id`, `tar_seg_nota`, `tar_cambio_estatus`, `tar_seg_nuevo_estatus`, `tar_seg_fecha`) VALUES
(1, 4, 1, 'ok', 'Cambio de estatus de Asignada a Completada', 'Completada', '07/05/2020 07:04:43pm'),
(2, 4, 1, '123', 'Cambio de estatus de Completada a Asignada', 'Asignada', '07/05/2020 07:37:32pm'),
(3, 4, 1, 'ok', 'Cambio de estatus de Asignada a En curso', 'En curso', '12/05/2020 07:31:38pm'),
(4, 3, 1, 'Pendinete', 'Cambio de estatus de Asignada a Pendiente', 'Pendiente', '13/05/2020 01:57:34pm'),
(5, 1, 1, 'oki', 'Cambio de estatus de Asignada a Completada', 'Completada', '13/05/2020 04:21:26pm'),
(6, 1, 1, 'Ok correcto', 'Cambio de estatus de Asignada a Completada', 'Completada', '13/05/2020 05:29:12pm'),
(7, 2, 1, 'asd', 'Cambio de estatus de Asignada a Pendiente', 'Pendiente', '13/05/2020 05:29:46pm'),
(8, 3, 1, 'Por completarse', 'Cambio de estatus de Pendiente a Completada', 'Completada', '13/05/2020 06:02:32pm'),
(9, 2, 1, 'Pendiente pero al 80 por ciento', 'No se cambio el estatus', 'Pendiente', '13/05/2020 06:02:48pm'),
(10, 2, 1, 'asd', 'Cambio de estatus de Pendiente a En curso', 'En curso', '13/05/2020 06:03:47pm'),
(11, 2, 1, 'Lo regrese al 30 por ciento', 'Cambio de estatus de En curso a Pendiente avance del 30', 'Pendiente', '13/05/2020 06:09:32pm'),
(12, 2, 1, 'ok', 'No se cambio el estatus avance del %30', 'Pendiente', '13/05/2020 06:10:12pm'),
(13, 2, 1, 'asd', 'Cambio de estatus de Pendiente a Asignada avance del 60%', 'Asignada', '13/05/2020 06:10:44pm');

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
(1, 'Carlos Perez Salgado', 'jcperezs2016@gmail.com', 'Administrador', '2020-03-24 20:34:25', 1, 'views/img/usuarios/carlos@ibradesk.com/user8-128x128.jpg', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG'),
(2, 'Juan Carlos Perez', 'jcperez@ibrasys.com.mx', 'Estandar', '2020-05-12 16:02:29', 1, '', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG');

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
-- Volcado de datos para la tabla `vacantes`
--

INSERT INTO `vacantes` (`vac_id`, `vac_titulo`, `vac_descripcion`, `vac_zona_trabajo`, `vac_sueldo_ofertado`, `vac_fecha_creacion`, `vac_link_occ`, `vac_estatus`, `vac_token_link`, `vac_cli_id`, `vac_creado_por`) VALUES
(1, 'Programador PHP', 'Descripcion de la Vacante', 'Polanco', 18000, '2020-05-05 18:09:55', '', 'abierta', '64016167', 1, 1),
(2, 'Vendedor de Piso', 'Vendedor con experiencia', 'Polanco', 15000, '2020-05-07 16:52:40', '', 'cerrada', '18482698', 1, 1),
(3, 'Programador JavaScript', 'Experiencia en React', 'Benito Juarez', 12000, '2020-05-07 16:53:10', '', 'pendiente', '46116343', 1, 1),
(4, 'Vendedor de Piso', 'Vendedor de Piso Laminado', 'Benito Juarez', 18000, '2020-05-08 00:35:54', '', 'cerrada', '45923311', 1, 1),
(5, 'Programador PHP', 'Nuevo Programador PHP', 'Ciudad Juarez, Chihuahua', 22000, '2020-05-08 16:12:47', '', 'cerrada', '14692697', 1, 1),
(6, 'Gerente de Ventas', 'Nuevo Gerente de Ventas para zona especial \\n comercial', 'Benito Juarez', 23000, '2020-05-08 19:21:17', '', 'cerrada', '41120773', 1, 1),
(7, 'Gerente Multinivel', 'Se requiere nuevo gerente multinivel para el exito de la compañoa', 'Cancun', 23000, '2020-05-08 19:38:44', 'https://www.occ.com.mx/empleo/oferta/12988244-desarrollador-web-php-y-javascript?ai=false&origin=unknown&page=1&rank=2&returnURL=%2Fempleos%2Fde-programador-PHP%2F%232&sessionid=27fbed27-f1ae-4d28-82c7-2e942805b4d3&showseo=true&type=1&userid=&utm_channel=serp&utm_origin=web&uuid=5d74049c-fea4-496c-9f20-5a167eb8e5f9', 'cerrada', '22227538', 1, 1),
(9, 'Coodinador', 'Events\r\nAll dropdown events are fired at the .dropdown-menu’s parent element and have a relatedTarget property, whose value is the toggling anchor element. hide.bs.dropdown and hidden.bs.dropdown events have a clickEvent property (only when the original event type is click) that contains an Event Object for the click event.\r\nEvents\r\nAll dropdown events are fired at the .dropdown-menu’s parent element and have a relatedTarget property, whose value is the toggling anchor element. hide.bs.dropdown and hidden.bs.dropdown events have a clickEvent property (only when the original event type is click) that contains an Event Object for the click event.', 'Polanco', 14000, '2020-05-08 21:14:55', '', 'cerrada', '77886916', 1, 1),
(10, 'Gerente de Tienda', 'Gerente de Tienda \\n\r\nlkjasdlkj \\n\r\nasdlkasdlkajsd \\n\r\nasdasd', 'Polanco', 12000, '2020-05-08 21:19:30', '', 'cerrada', '14930362', 1, 1),
(11, 'Programador PHP', 'Beneficios\r\n\r\nExcelente ambiente de trabajo\r\nConvivencias mensuales\r\nDescuentos en gimnasios y clases de yoga\r\nDescripción\r\n\r\nObjetivos del puesto\r\n\r\n\r\n\r\nDesarrollar código para elementos visuales de aplicaciones, a partir de las estructuras de diseño de user experience dadas por un diseñador de UX.\r\n\r\n\r\n\r\nDeberes y responsabilidades\r\n\r\n\r\n\r\n\r\n\r\nDesarrollar nuevos sistemas, funcionalidades o módulos y garantizar su viabilidad técnica.\r\nCreación de código y bibliotecas reutilizables para uso futuro (API\'s).\r\nOptimización constante de código y consultas.\r\nProponer, Innovar y actualizarse en nuevas tecnologías de desarrollo.\r\nApoyo en resolución de tickets de clientes.\r\nDocumentar todo lo relacionado a los proyectos y API\'s.\r\nTesteo de desarrollos.\r\n\r\n\r\nCaracterísticas\r\n\r\n\r\n\r\n\r\n\r\nIngeniería o TSU en Sistemas o afín\r\nExperiencia: Recién egresado\r\n\r\n\r\nAptitudes\r\n\r\n\r\n\r\n\r\n\r\nResponsable, dinámico y disciplinado\r\n\r\n\r\nConocimientos\r\n\r\n\r\n\r\n\r\n\r\nConocimiento intermedio de PHP, JavaScript, AJAX, MySQL, Jquery, HTML5 y CSS3.\r\nConocimiento intermedio de plataformas de preprocesamiento CSS, como LESS y SASS.\r\nConocimiento intermedio del manejo asíncrono de solicitudes, actualizaciones de página parcial y AJAX.\r\nConocimiento básico-intermedio de servidores Linux.\r\nConocimiento básico de herramientas de control de versiones de código, como Git.\r\nConocimiento sobre gestión de sesiones.\r\n\r\n\r\nOpcionales pero muy valiosas\r\n\r\n\r\n\r\n\r\n\r\nConocimiento de desarrollo en plataformas Moodle o plataformas LMS\r\nNociones básicas de utilización de software de diseño gráfico.\r\nInglés básico-intermedio.\r\n', 'Polanco', 14000, '2020-05-08 23:13:01', '', 'cerrada', '76443038', 1, 1),
(12, 'Programador PHP', 'Para administrar CMS', 'Huston Texas', 55000, '2020-05-14 00:17:53', '', 'abierta', '55174639', 1, 1);

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
  MODIFY `cal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `can_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  MODIFY `ent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `tar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tareas_seguimiento`
--
ALTER TABLE `tareas_seguimiento`
  MODIFY `tar_seg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  MODIFY `vac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
