-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2023 a las 02:28:50
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marianosam_certificado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canton`
--

CREATE TABLE `canton` (
  `id_canton` int(10) NOT NULL,
  `id_provincia` int(10) NOT NULL,
  `nombre_cant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `canton`
--

INSERT INTO `canton` (`id_canton`, `id_provincia`, `nombre_cant`) VALUES
(12, 5, 'Calvas'),
(15, 6, 'Callao'),
(16, 6, 'Cusco'),
(17, 5, 'Gonzanama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(10) NOT NULL,
  `id_canton` int(10) NOT NULL,
  `nombre_ciud` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `id_canton`, `nombre_ciud`) VALUES
(4, 12, 'Cariamanga'),
(6, 17, 'Gonzanama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinador`
--

CREATE TABLE `coordinador` (
  `id_coordinador` int(10) NOT NULL,
  `nombre_co` varchar(255) NOT NULL,
  `apellido_co` varchar(255) NOT NULL,
  `cedula_co` int(10) NOT NULL,
  `imagen_co` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coordinador`
--

INSERT INTO `coordinador` (`id_coordinador`, `nombre_co`, `apellido_co`, `cedula_co`, `imagen_co`) VALUES
(1, 'Ignacio', 'Minga', 1234567890, NULL),
(5, 'Higor', 'Benitez', 1231231234, NULL),
(7, 'Jean', 'Pardo', 1150334567, NULL),
(9, 'Manuel Ignacio', 'Rodriguez Gomez', 1150338737, NULL),
(11, 'Brayan Javier', 'Lima Ajila', 2147483647, NULL),
(12, 'Carlos Vicente', 'Minga Gonzales', 2147483647, NULL),
(13, 'Rolando Jose', 'Jiménez Jiménez ', 2147483647, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(10) NOT NULL,
  `id_coordinador` int(10) NOT NULL,
  `id_facilitador` int(10) NOT NULL,
  `id_rector` int(10) NOT NULL,
  `id_institucion` int(10) NOT NULL,
  `nombre_cur` text NOT NULL,
  `contenido_cur` text NOT NULL,
  `num_horas` int(10) NOT NULL,
  `tipo_curso` text NOT NULL,
  `tipo_aprobacion` varchar(50) NOT NULL,
  `duracion_cur` varchar(30) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `fecha_certificado` date NOT NULL,
  `desc_cur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `id_coordinador`, `id_facilitador`, `id_rector`, `id_institucion`, `nombre_cur`, `contenido_cur`, `num_horas`, `tipo_curso`, `tipo_aprobacion`, `duracion_cur`, `fecha_inicio`, `fecha_fin`, `fecha_certificado`, `desc_cur`) VALUES
(12, 5, 2, 1, 1, 'Campos Electricos', 'Expresiones y Funciones ', 35, 'Presencial', 'Asistido', '2', '2023-10-02', '2023-10-09', '2023-10-09', 'la vida es una lenteja'),
(14, 5, 2, 1, 1, 'Computacion ', 'Programas y apps', 16, 'Presencial', 'Asistido', '', '2023-10-02', '2023-10-08', '2023-10-10', 'Fuerza y coraje'),
(15, 5, 2, 1, 3, 'fisica', 'matematicas', 40, 'presencial', 'Aprobado', '6 semanas ', '2023-07-12', '2023-10-28', '2023-10-21', 'la vida es una lenteja'),
(16, 9, 3, 4, 1, 'Programación Orientada a Objestos en Python', 'Programación y Modulos', 23, 'Presencial', 'Aprobado', '', '2023-10-01', '2023-10-12', '2023-10-12', 'Yes, Todo Yes '),
(17, 12, 3, 3, 1, 'Analisis y diseño de Apis y desarrollo de software ', 'codigo php y mas herramientas', 20, 'Presencial', 'Asistido', '', '2023-10-08', '2023-11-04', '2023-10-18', 'Un cambio significativo '),
(18, 13, 4, 4, 10, 'Mantenimiento Preventivo de Frenos ABS', 'Teórico y Práctico ', 40, 'Presencial', 'Aprobado', '', '2023-10-18', '2023-11-03', '2023-11-05', 'El curso esta dirigido a mayores de edad,hombres y mujeres interesados en aprender mecánica .');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre`) VALUES
(14, 'ENFERMERÍA '),
(15, 'FÍSICA '),
(16, 'DESARROLLO DE SOFTWARE'),
(17, 'MECÁNICA '),
(18, 'SISTEMA INFORMÁTICO ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(10) NOT NULL,
  `cedula_es` int(11) NOT NULL,
  `nombre_es` varchar(50) NOT NULL,
  `apellido_es` varchar(50) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `id_periodoac` int(10) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_pais` int(10) NOT NULL,
  `id_provincia` int(10) NOT NULL,
  `id_canton` int(10) NOT NULL,
  `id_ciudad` int(10) NOT NULL,
  `telefono_es` int(15) NOT NULL,
  `correo_es` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `cedula_es`, `nombre_es`, `apellido_es`, `id_especialidad`, `id_periodoac`, `genero`, `fecha_nacimiento`, `id_pais`, `id_provincia`, `id_canton`, `id_ciudad`, `telefono_es`, `correo_es`) VALUES
(7, 11587645, 'Luis Enrique', 'Perez For ', 14, 13, '', '2000-09-17', 9, 5, 12, 4, 23456789, 'link@gmail.com'),
(8, 1800234567, 'Manuel Sebas', 'Acaro Lopez', 14, 13, '', '2000-10-02', 9, 5, 12, 4, 23456789, 'link@gmail.com'),
(9, 1150338737, 'Jimmy Stalin', 'Duran Rosillo', 15, 14, '', '1999-10-26', 9, 5, 12, 4, 984635634, 'ker12@gmail.com'),
(10, 1023456789, 'Ana Luisa', 'Jumbo Sarango', 16, 14, '', '2003-07-23', 9, 5, 12, 4, 2147483647, 'lajumbo@bllk123.com'),
(11, 1178903456, 'Maria Enna', 'Lopez Jiménez ', 14, 14, 'Mujer', '2003-06-18', 9, 5, 12, 4, 2147483647, 'lia12@gmail.com'),
(12, 1726159815, 'Rosa Piedad', 'Jumbo Abad', 17, 15, 'Mujer', '2003-07-23', 9, 5, 12, 4, 978710250, 'lk123@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_curso`
--

CREATE TABLE `estudiante_curso` (
  `id_estudiante_curso` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `id_curso` int(10) NOT NULL,
  `id_institucion` int(10) NOT NULL,
  `aprobado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante_curso`
--

INSERT INTO `estudiante_curso` (`id_estudiante_curso`, `id_estudiante`, `id_curso`, `id_institucion`, `aprobado`) VALUES
(36, 7, 14, 8, 'Si'),
(37, 8, 14, 8, 'No'),
(38, 7, 15, 3, 'Si'),
(39, 8, 16, 3, 'Si'),
(40, 8, 12, 3, 'Si'),
(41, 7, 16, 1, 'Si'),
(42, 8, 15, 8, 'Si'),
(43, 10, 16, 1, 'Si'),
(44, 11, 17, 1, 'Si'),
(45, 12, 18, 3, 'Si'),
(46, 10, 17, 10, 'Próximamente '),
(48, 10, 18, 1, 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facilitador`
--

CREATE TABLE `facilitador` (
  `id_facilitador` int(10) NOT NULL,
  `nombre_fa` varchar(255) NOT NULL,
  `apellido_fa` varchar(255) NOT NULL,
  `cedula_fa` int(10) NOT NULL,
  `imagen_fa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facilitador`
--

INSERT INTO `facilitador` (`id_facilitador`, `nombre_fa`, `apellido_fa`, `cedula_fa`, `imagen_fa`) VALUES
(2, 'Louis Miguel', 'Llara Luna', 1123456789, ''),
(3, 'Luis Emanuel ', 'Jaramillo Azis', 2147483647, NULL),
(4, 'Geovanny Eulojio', 'Sarango Jiménez ', 2147483647, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id_institucion` int(10) NOT NULL,
  `nombre_inst` varchar(255) NOT NULL,
  `descripcion_inst` varchar(255) NOT NULL,
  `datos_contacto` varchar(255) NOT NULL,
  `correo_inst` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id_institucion`, `nombre_inst`, `descripcion_inst`, `datos_contacto`, `correo_inst`) VALUES
(1, 'Mariano Samaniego', 'fe ,ciencia y cultura', '20067453', 'aaaaa@aaaaaa'),
(3, 'La Salle ', 'fisica', '0987654321', 'stalink_23@gmail.com'),
(8, 'Luz Maria', 'fe ,ciencia y cultura', '2674578', 'abcgsy@e678'),
(10, 'Instituto Tecnológico Superior ', 'fe ,ciencia y cultura', '20067453', 'itsms12@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(10) NOT NULL,
  `nombre_pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nombre_pais`) VALUES
(9, 'Ecuador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_academico`
--

CREATE TABLE `periodo_academico` (
  `id_periodoac` int(10) NOT NULL,
  `nombre_periac` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `periodo_academico`
--

INSERT INTO `periodo_academico` (`id_periodoac`, `nombre_periac`) VALUES
(13, 'MARZO-OCTUBRE 2023'),
(14, 'MARZO-OCTUBRE 2024'),
(15, 'OCTUBRE-2023-MARZO-2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(10) NOT NULL,
  `nombre_prov` varchar(50) NOT NULL,
  `id_pais` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nombre_prov`, `id_pais`) VALUES
(5, 'Loja', 9),
(6, 'Lima', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rector`
--

CREATE TABLE `rector` (
  `id_rector` int(10) NOT NULL,
  `nombre_re` varchar(255) NOT NULL,
  `apellido_re` varchar(255) NOT NULL,
  `cedula_re` int(10) NOT NULL,
  `imagen_re` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rector`
--

INSERT INTO `rector` (`id_rector`, `nombre_re`, `apellido_re`, `cedula_re`, `imagen_re`) VALUES
(1, 'Carlos Andres', ' Moreno Garcia', 1165789034, ''),
(3, 'Stalin Fabian', 'Castro Torres', 2147483647, NULL),
(4, 'Seguno Rene', 'Ajila Jumbo', 1150567890, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `tipo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `tipo`) VALUES
(1, 'molo', '$2y$10$80ViRl2vFgUmMhxcSdhlAOzRONZoW.ONOKBjGsRIRCn15IhpEZJxW', 'ADMIN'),
(2, 'Rosa ', '$2y$10$Mp9RAxxIV52aTD1shr1qzOHd8eFm0nrNxSnJ.qtY0o.FG8oe9GwKG', 'ADMIN'),
(3, 'Stalin ', '$2y$10$Fg0YLQ748zBivigFPD8aSuKtNShi6KtnT.qDrjU0uJ6.lHUpyq05C', 'ADMIN');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`);

--
-- Indices de la tabla `canton`
--
ALTER TABLE `canton`
  ADD PRIMARY KEY (`id_canton`),
  ADD KEY `r_provincia` (`id_provincia`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `r_canton` (`id_canton`);

--
-- Indices de la tabla `coordinador`
--
ALTER TABLE `coordinador`
  ADD PRIMARY KEY (`id_coordinador`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `r_institucion` (`id_institucion`),
  ADD KEY `r_coordinador` (`id_coordinador`),
  ADD KEY `r_facilitador` (`id_facilitador`),
  ADD KEY `r_rector` (`id_rector`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `r_ciudad` (`id_ciudad`),
  ADD KEY `r_pais` (`id_pais`),
  ADD KEY `r_canton` (`id_canton`),
  ADD KEY `r_especialidad` (`id_especialidad`),
  ADD KEY `r_periodoac` (`id_periodoac`);

--
-- Indices de la tabla `estudiante_curso`
--
ALTER TABLE `estudiante_curso`
  ADD PRIMARY KEY (`id_estudiante_curso`),
  ADD KEY `r_estudiante` (`id_estudiante`),
  ADD KEY `r_curso` (`id_curso`);

--
-- Indices de la tabla `facilitador`
--
ALTER TABLE `facilitador`
  ADD PRIMARY KEY (`id_facilitador`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id_institucion`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `periodo_academico`
--
ALTER TABLE `periodo_academico`
  ADD PRIMARY KEY (`id_periodoac`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `r_pais` (`id_pais`);

--
-- Indices de la tabla `rector`
--
ALTER TABLE `rector`
  ADD PRIMARY KEY (`id_rector`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `canton`
--
ALTER TABLE `canton`
  MODIFY `id_canton` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `coordinador`
--
ALTER TABLE `coordinador`
  MODIFY `id_coordinador` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `estudiante_curso`
--
ALTER TABLE `estudiante_curso`
  MODIFY `id_estudiante_curso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `facilitador`
--
ALTER TABLE `facilitador`
  MODIFY `id_facilitador` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id_institucion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `periodo_academico`
--
ALTER TABLE `periodo_academico`
  MODIFY `id_periodoac` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rector`
--
ALTER TABLE `rector`
  MODIFY `id_rector` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canton`
--
ALTER TABLE `canton`
  ADD CONSTRAINT `r_provincia` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `r_coordinador` FOREIGN KEY (`id_coordinador`) REFERENCES `coordinador` (`id_coordinador`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `r_facilitador` FOREIGN KEY (`id_facilitador`) REFERENCES `facilitador` (`id_facilitador`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `r_institucion` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `r_rector` FOREIGN KEY (`id_rector`) REFERENCES `rector` (`id_rector`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `r_canton` FOREIGN KEY (`id_canton`) REFERENCES `canton` (`id_canton`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `r_ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `r_especialidad` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `r_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `r_periodoac` FOREIGN KEY (`id_periodoac`) REFERENCES `periodo_academico` (`id_periodoac`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante_curso`
--
ALTER TABLE `estudiante_curso`
  ADD CONSTRAINT `r_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `r_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
