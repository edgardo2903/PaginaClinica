-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-10-2016 a las 15:44:28
-- Versión del servidor: 5.7.15-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id_dia` int(11) NOT NULL,
  `dia` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`id_dia`, `dia`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miércoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sábado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id_doctor` int(11) NOT NULL,
  `doctor` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `cupos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doctor`, `doctor`, `especialidad`, `turno`, `cupos`) VALUES
(1, 'José Vargas', 1, 2, 10),
(2, 'María Perez', 2, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `especialidad` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `especialidad`) VALUES
(1, 'Cardiología'),
(2, 'Medicina Interna'),
(3, 'Dermatología'),
(4, 'Traumatología'),
(5, 'Odontología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `id` int(11) NOT NULL,
  `numero` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `mes` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id`, `numero`, `mes`) VALUES
(1, '01', 'Enero'),
(2, '02', 'Febrero'),
(3, '03', 'Marzo'),
(4, '04', 'Abril'),
(5, '05', 'Mayo'),
(6, '06', 'Junio'),
(7, '07', 'Julio'),
(8, '08', 'Agosto'),
(9, '09', 'Septiembre'),
(10, '10', 'Octubre'),
(11, '11', 'Noviembre'),
(12, '12', 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos_sistema`
--

CREATE TABLE `modulos_sistema` (
  `id_modulo` int(11) NOT NULL,
  `modulo` varchar(150) NOT NULL,
  `icono` varchar(20) NOT NULL,
  `orden` int(11) NOT NULL COMMENT 'Orden en que aparecera el modulo en el menu',
  `estatus` int(11) NOT NULL COMMENT '1=habilitado, 2=deshabilitado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos_sistema`
--

INSERT INTO `modulos_sistema` (`id_modulo`, `modulo`, `icono`, `orden`, `estatus`) VALUES
(1, 'Maestro', 'key', 0, 1),
(24, 'Actividades', 'calendar ', 1, 1),
(25, 'Anuncios', 'microphone', 2, 1),
(26, 'Miembros', 'users', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos_usuarios`
--

CREATE TABLE `modulos_usuarios` (
  `id_modulo` int(11) NOT NULL,
  `tipo_user` int(11) NOT NULL COMMENT 'Tipo de usuario que tiene acceso al modulo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos_usuarios`
--

INSERT INTO `modulos_usuarios` (`id_modulo`, `tipo_user`) VALUES
(1, 0),
(4, 0),
(5, 0),
(9, 0),
(7, 0),
(8, 0),
(9, 1),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(13, 1),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(13, 2),
(20, 2),
(14, 2),
(21, 2),
(22, 2),
(0, 1),
(0, 1),
(0, 2),
(0, 0),
(0, 0),
(0, 0),
(0, 0),
(0, 0),
(24, 0),
(0, 0),
(25, 0),
(0, 1),
(24, 1),
(0, 1),
(25, 1),
(0, 2),
(24, 2),
(0, 0),
(26, 0),
(26, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas_sistema`
--

CREATE TABLE `programas_sistema` (
  `id_programa` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `nombre_programa` varchar(200) NOT NULL,
  `ruta` varchar(300) NOT NULL,
  `orden` int(11) NOT NULL COMMENT 'Orden en que aparecera el programa en el menu',
  `opt` int(11) NOT NULL COMMENT 'Esto es para el REQUEST (Este valor es el mismo id_programa)',
  `estatus` int(11) NOT NULL COMMENT '1=Habilitado, 2=Deshabilitado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programas_sistema`
--

INSERT INTO `programas_sistema` (`id_programa`, `id_modulo`, `nombre_programa`, `ruta`, `orden`, `opt`, `estatus`) VALUES
(1, 1, 'Módulos sistema', 'mantenimiento/modulos_sistema.php', 0, 1, 1),
(2, 1, 'Programas sistema', 'mantenimiento/programas_sistema.php', 1, 2, 1),
(5, 1, 'Permisos usuarios', 'mantenimiento/permisos.php', 2, 5, 1),
(11, 1, 'Usuarios', 'mantenimiento/usuarios.php', 3, 11, 1),
(12, 1, 'Tipos de usuarios', 'mantenimiento/tipo_usuarios.php', 4, 12, 1),
(15, 10, 'Bancos', 'mantenimiento/banco.php', 1, 15, 1),
(16, 1, 'Cambio de contraseña', 'mantenimiento/cambio_pass.php', 4, 16, 1),
(52, 20, 'Respaldo', 'respaldo/respaldo.php', 5, 52, 1),
(54, 24, 'Administrar Actividad', 'actividades/actividades.php', 1, 54, 1),
(56, 25, 'Anuncios', 'anuncios/anuncios.php', 1, 56, 1),
(57, 26, 'Administrar Miembros', 'miembros/miembros.php', 1, 57, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_usuarios`
--

CREATE TABLE `programa_usuarios` (
  `id_programa` int(11) NOT NULL,
  `tipo_user` int(11) NOT NULL COMMENT 'Tipo de usuario que tiene acceso al programa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programa_usuarios`
--

INSERT INTO `programa_usuarios` (`id_programa`, `tipo_user`) VALUES
(24, 2),
(54, 2),
(16, 0),
(1, 0),
(5, 0),
(2, 0),
(12, 0),
(11, 0),
(54, 0),
(56, 0),
(26, 0),
(57, 0),
(54, 1),
(56, 1),
(57, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `tipo_user` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`tipo_user`, `nombre`) VALUES
(0, 'Administrador'),
(1, 'Editor General'),
(2, 'Editor'),
(3, 'Usuairo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `turno` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `turno`) VALUES
(1, 'Mañana'),
(2, 'Tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nombre_usuario` varchar(200) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `tipo_user` int(11) NOT NULL COMMENT '0=Admin',
  `id_almacen` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `nombre_usuario`, `user`, `pass`, `tipo_user`, `id_almacen`) VALUES
(1, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, '2'),
(2, '', 'almacenista_generico', '21232f297a57a5a743894a0e4a801fc3', 1, ''),
(3, 'Editor', 'edit1', '3c4a359ade745c27537e3b08672425cb', 1, ''),
(4, 'Editor Actividades', 'edit2', '1a280f6292e3d58de97cb2e01c64a6fc', 2, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos_sistema`
--
ALTER TABLE `modulos_sistema`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `programas_sistema`
--
ALTER TABLE `programas_sistema`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`tipo_user`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `modulos_sistema`
--
ALTER TABLE `modulos_sistema`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `programas_sistema`
--
ALTER TABLE `programas_sistema`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
