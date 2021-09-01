-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb33.awardspace.net
-- Tiempo de generación: 01-09-2021 a las 17:06:22
-- Versión del servidor: 5.7.20-log
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `3919009_normal10`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `carrera` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `anio` date NOT NULL,
  `idTipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `dni`, `carrera`, `usuario`, `anio`, `idTipoUsuario`) VALUES
(2, 'fulano', '11111111', 1, 'fulano', '2021-06-23', 2),
(3, 'Maria la del Barrio', '22222222', 2, 'barrio', '2021-07-06', 2),
(4, 'pepe', '33333333', 3, 'pepe', '2021-07-07', 2),
(5, 'Carlos Gardel', '44444444', 1, 'Carlos', '2021-07-08', 2),
(6, 'Mengano', '12345678', 1, 'Mengano', '2021-07-08', 2),
(7, 'Simon', '78965412', 1, 'Simon', '2021-08-10', 2),
(8, 'melanie sinalgas', '42586241', 1, 'sinalgas', '2021-08-17', 2),
(9, 'Luquitas', '7684', 1, 'lucasputo', '2021-08-02', 2),
(10, 'alumno uno', '11111111', 1, 'alumnouno', '2021-08-19', 2),
(11, 'alumno dos', '22222222', 1, 'alumnodos', '2021-08-19', 2),
(12, 'alumno tres', '33333333', 1, 'alumnotres', '2021-08-19', 2),
(13, 'alumno cuatro', '44444444', 1, 'alumnocuatro', '2021-08-19', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `duracionAnios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`, `duracionAnios`) VALUES
(1, 'Tecnicatura Superior en Analisis de Sistemas', 3),
(2, 'Tec. Sup. en Administracion Contable', 3),
(3, 'Tecnicatura Superior en Preceptor', 3),
(4, 'Profesorado de Educacion Primaria', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id_encuesta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT '1970-01-01 03:00:00',
  `fecha_final` timestamp NOT NULL DEFAULT '1970-01-01 03:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id_encuesta`, `id_usuario`, `titulo`, `id_carrera`, `id_materia`, `descripcion`, `estado`, `fecha_inicio`, `fecha_final`) VALUES
(4, 1, 'Encuesta de Prueba', 1, 95, 'Carrera ASC', 1, '2021-08-19 12:53:25', '2021-08-19 20:30:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `idCarrera`, `idMateria`, `idAlumno`) VALUES
(1, 1, 87, 8),
(2, 1, 86, 9),
(3, 1, 89, 9),
(4, 1, 90, 9),
(5, 1, 89, 9),
(6, 1, 90, 9),
(7, 1, 92, 9),
(8, 1, 93, 9),
(9, 1, 94, 9),
(10, 1, 95, 9),
(11, 1, 96, 9),
(12, 1, 97, 9),
(13, 1, 98, 9),
(14, 1, 102, 9),
(15, 1, 103, 9),
(16, 1, 104, 9),
(17, 1, 86, 9),
(18, 1, 99, 9),
(19, 1, 100, 9),
(20, 1, 101, 9),
(21, 1, 95, 9),
(22, 1, 95, 9),
(23, 1, 95, 9),
(24, 1, 95, 9),
(25, 1, 95, 10),
(26, 1, 95, 11),
(27, 1, 95, 12),
(28, 1, 95, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `anio`, `idCarrera`, `idProfesor`) VALUES
(1, 'PEDAGOGIA', 1, 4, 0),
(2, 'FILOSOFIA', 1, 4, 0),
(3, 'PSICOLOGIA EDUCACIONAL', 1, 4, 0),
(4, 'HISTORIA Y POLITICA DE LA EDUCACION ARGENTINA', 1, 4, 0),
(5, 'LENGUA Y LITERATURA', 1, 4, 0),
(6, 'MATEMATICA', 1, 4, 0),
(7, 'CIENCIAS SOCIALES', 1, 4, 0),
(8, 'CIENCIAS NATURALES', 1, 4, 0),
(9, 'PRACTICA, CULTURA Y CONTEXTOS INSTITUCIONALES', 1, 4, 0),
(10, 'EDI I', 1, 4, 0),
(11, 'OPCIONAL I', 1, 4, 0),
(12, 'ESTADISTICA GENERAL', 2, 4, 0),
(13, 'TIC', 2, 4, 0),
(14, 'SUJETO DE NIVEL PRIMARIO', 2, 4, 0),
(15, 'ALFABETIZACION INICIAL', 2, 4, 0),
(16, 'LENGUA Y LITERATURA Y SU ENSE', 2, 4, 0),
(17, 'MATEMATICA Y SU ENSE', 2, 4, 0),
(18, 'CIENCIAS NATURALES Y SU ENSE', 2, 4, 0),
(19, 'CIENCIAS SOCIALES Y SU ENSE', 2, 4, 0),
(20, 'EDUCACION FISICA DE NIVEL PRIMARIO', 2, 4, 0),
(21, 'PRACTICA II ESCENARIO DE LA PRACTICA DOCENTE', 2, 4, 0),
(22, 'ESI', 3, 4, 0),
(23, 'SOCIOLOGIA DE LA EDUCACION', 3, 4, 0),
(24, 'LENGUA Y LITERATURA Y SU ENSE', 3, 4, 0),
(25, 'MATEMATICA Y SU ENSE', 3, 4, 0),
(26, 'CIENCIAS NATURALES Y SU ENSE', 3, 4, 0),
(27, 'CIENCIAS SOCIALES Y SU ENSE', 3, 4, 0),
(28, 'PRACTICA DE LA ENSE', 3, 4, 0),
(29, 'EDI III', 3, 4, 0),
(30, 'FORMACION ETICA Y LA CONSTRUCCION DE CIUDADANIA', 4, 4, 0),
(31, 'SISTEMATIZACION DE EXPERIENCIAS', 4, 4, 0),
(32, 'ATENEO DE LENGUA Y LITERATURA', 4, 4, 0),
(33, 'ATENEO DE MATEMATICA', 4, 4, 0),
(34, 'ATENEO DE CIENCIAS SOCIALES', 4, 4, 0),
(35, 'ATENEO DE CIENCIAS NATURALES', 4, 4, 0),
(36, 'RESIDENCIA PEDAGOGICA', 4, 4, 0),
(37, 'EDI IV', 4, 4, 0),
(38, 'LENGUAJE Y PRODUCCION DEL DISCURSO I', 1, 3, 0),
(39, 'INFORMATICA', 1, 3, 0),
(40, 'TALLER DE TECNICAS PRODUCCION DINAMICAS DE GRUPO', 1, 3, 0),
(41, 'PSICOLOGIA GENERAL', 1, 3, 0),
(42, 'LA PROBLEMATICA EDUCATIVA CONTEMPORANEA', 1, 3, 0),
(43, 'SEMINARIO TALLER I', 1, 3, 0),
(44, 'ANTROPOLOGIA SOCIO-CULTURAL', 1, 3, 0),
(45, 'SISTEMA EDUCATIVO E INSTITUCIONES ESCOLARES', 1, 3, 0),
(46, 'PRACTICA DE CAMPO I', 1, 3, 0),
(47, 'LENGUAJE Y PRODUCCION DEL DISCURSO II', 2, 3, 0),
(48, 'ESTADISTICA', 2, 3, 0),
(49, 'TALLER DE PLANIFICACION DE LAS TAREAS DEL PRECEPTO', 2, 3, 0),
(50, 'PSICOLOGIA DE LA ADOLESCENCIA', 2, 3, 0),
(51, 'PEDAGOG', 2, 3, 0),
(52, 'SEMINARIO TALLER II', 2, 3, 0),
(53, 'ORGANIZACION Y LEGISLACION ESCOLAR', 2, 3, 0),
(54, 'PRACTICA DE CAMPO II', 2, 3, 0),
(55, 'TECNOLOGIA DE LA INFORMACION Y COMUNICACION', 3, 3, 0),
(56, 'PROYECTO DE INVESTIGACION E INTERVENCION SOCIO CULTURAL', 3, 3, 0),
(57, 'ARTE ESTETICA Y SOCIEDAD', 3, 3, 0),
(58, 'TUTORIA Y MEDIACION ESCOLAR', 3, 3, 0),
(59, 'ETICA Y DEONTOLOGIA PROFESIONAL', 3, 3, 0),
(60, 'PRACTICA DE CAMPO III', 3, 3, 0),
(61, 'SEMINARIO DE SISTEMATIZACION DE EXPERIENCIAS', 3, 3, 0),
(62, 'COMUNICACION Y PRODUCCION DEL DISCURSO', 1, 2, 0),
(63, 'INFORMATICA', 1, 2, 0),
(64, 'MATEMATICA', 1, 2, 0),
(65, 'DERECHO CIVIL I', 1, 2, 0),
(66, 'CONTABILIDAD I', 1, 2, 0),
(67, 'ELEMENTOS DE ECONOMIA', 1, 2, 0),
(68, 'INTRODUCCION A LA ADMINISTRACION', 1, 2, 0),
(69, 'PRACTICA PROFESIONALIZANTE I', 1, 2, 0),
(70, 'MATEMATICA II', 2, 2, 0),
(71, 'TALLER DE IDIOMA INGLES TECNICO', 2, 2, 0),
(72, 'DERECHO CIVIL II', 2, 2, 0),
(73, 'CONTABILIDAD II', 2, 2, 0),
(74, 'ECONOMIA', 2, 2, 0),
(75, 'ADMINISTRACION DE PERSONAL', 2, 2, 0),
(76, 'INFORMATICA APLICADA A LOS SISTEMAS DE INFORMACION', 2, 2, 0),
(77, 'PRACTICA PROFESIONALIZANTE II', 2, 2, 0),
(78, 'ETICA Y DEONTOLOGIA DEONTOLOGIA PROFESIONAL', 3, 2, 0),
(79, 'ESTADISTICA APLICADA', 3, 2, 0),
(80, 'RELACIONES LABORALES Y  SEGURIDAD SOCIAL', 3, 2, 0),
(81, 'COSTOS Y PRESUPUESTOS', 3, 2, 0),
(82, 'FINANZAS PUBLICAS E IMPUESTOS', 3, 2, 0),
(83, 'PROYECTO Y GESTION DE MICROEMPRENDIMIENTOS', 3, 2, 0),
(84, 'COMERCIALIZACION', 3, 2, 0),
(85, 'PRACTICA PROFESIONALIZANTE III', 3, 2, 0),
(86, 'MATEMATICA I', 1, 1, 0),
(87, 'PROGRAMACION I', 1, 1, 0),
(88, 'SISTEMA DE PROCESAMIENTO DE DATOS I', 1, 1, 0),
(89, 'FILOSOFIA DE LA CIENCIA Y DE LA TECNICA', 1, 1, 0),
(90, 'INGLES TECNICO', 1, 1, 0),
(91, 'TALLER', 1, 1, 0),
(92, 'PROGRAMACION II', 2, 1, 0),
(93, 'PROGRAMACION CIENTIFICA', 2, 1, 0),
(94, 'MATEMATICA Y METODO NUMERICO II', 2, 1, 0),
(95, 'LENGUAJE GENERADOR DE INFORMES', 2, 1, 0),
(96, 'SISTEMA DE PROCESAMIENTO DE DATOS II', 2, 1, 0),
(97, 'SISTEMAS ADMINISTRATIVOS II', 2, 1, 0),
(98, 'TECNICAS DE PROGRAMACION', 2, 1, 0),
(99, 'MATEMATICA APLICADA', 3, 1, 0),
(100, 'ETICA Y DEONTOLOGIA PROFESIONAL', 3, 1, 0),
(101, 'SISTEMAS ADMINISTRATIVOS II', 3, 1, 0),
(102, 'MINICOMPUTADORAS', 3, 1, 0),
(103, 'SEMINARIO', 3, 1, 0),
(104, 'INVESTIGACON OPERATIVA', 3, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id_opcion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `valor` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id_opcion`, `id_pregunta`, `valor`) VALUES
(43, 19, 'Programación Funcional'),
(44, 19, 'Procedimientos y Estructuras de Datos'),
(49, 19, 'Estructuras de Control y POO'),
(53, 20, 'si, cumple en tiempo y forma'),
(54, 20, 'no, estamos atrasados'),
(55, 20, 'no, el profesor da temas ajenos al programa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_pregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `id_encuesta`, `titulo`, `id_tipo_pregunta`) VALUES
(19, 4, 'De los Siguientes temas, seleccione el mas interesante', 1),
(20, 4, 'el profesor cumple con el programa?', 1),
(21, 4, 'Como aprendió mejor?', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `legajo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id_resultado` int(11) NOT NULL,
  `id_opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id_resultado`, `id_opcion`) VALUES
(34, 43),
(38, 43),
(31, 44),
(36, 44),
(33, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pregunta`
--

CREATE TABLE `tipo_pregunta` (
  `id_tipo_pregunta` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_pregunta`
--

INSERT INTO `tipo_pregunta` (`id_tipo_pregunta`, `nombre`, `descripcion`) VALUES
(1, 'Selección Única', 'Se podrá escoger solo una opción\r\nelemento input type radio'),
(3, 'Selección Múltiple', 'Se podrá escoger más de una opción\r\ninput type checkbox'),
(4, 'Texto', 'Se almacenara la respuesta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(15) NOT NULL,
  `clave` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `clave`, `nombres`, `apellidos`, `email`, `id_tipo_usuario`) VALUES
(1, 'admin', 'Normal 10', 'escuela', 'normal10@gmail.com', 1),
(2, 'alumno', 'fulano', 'fulanes', 'lalala@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_encuestas`
--

CREATE TABLE `usuarios_encuestas` (
  `id_usuario` int(15) NOT NULL,
  `id_encuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id_encuesta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id_opcion`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_encuesta` (`id_encuesta`),
  ADD KEY `id_tipo_pregunta` (`id_tipo_pregunta`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id_resultado`),
  ADD KEY `id_opcion` (`id_opcion`);

--
-- Indices de la tabla `tipo_pregunta`
--
ALTER TABLE `tipo_pregunta`
  ADD PRIMARY KEY (`id_tipo_pregunta`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- Indices de la tabla `usuarios_encuestas`
--
ALTER TABLE `usuarios_encuestas`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_encuesta` (`id_encuesta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id_encuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id_opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `tipo_pregunta`
--
ALTER TABLE `tipo_pregunta`
  MODIFY `id_tipo_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_tipo_pregunta`) REFERENCES `tipo_pregunta` (`id_tipo_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preguntas_ibfk_2` FOREIGN KEY (`id_encuesta`) REFERENCES `encuestas` (`id_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`id_opcion`) REFERENCES `opciones` (`id_opcion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_encuestas`
--
ALTER TABLE `usuarios_encuestas`
  ADD CONSTRAINT `usuarios_encuestas_ibfk_2` FOREIGN KEY (`id_encuesta`) REFERENCES `encuestas` (`id_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_encuestas_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
