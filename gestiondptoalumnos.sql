-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2024 a las 23:07:10
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
-- Estructura de tabla para la tabla `avisos`
--

CREATE TABLE `avisos` (
  `id_aviso` int(11) NOT NULL,
  `id_aviso_tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `adjunto` mediumblob DEFAULT NULL,
  `fijado` int(11) NOT NULL,
  `id_aviso_estado` int(11) NOT NULL,
  `imagen` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `avisos`
--

INSERT INTO `avisos` (`id_aviso`, `id_aviso_tipo`, `id_usuario`, `titulo`, `descripcion`, `fecha_publicacion`, `fecha_vencimiento`, `adjunto`, `fijado`, `id_aviso_estado`, `imagen`) VALUES
(1, 1, 1, 'Aviso importante', 'En el dia de hoy se estara realizando una jornada de limpieza', '2024-10-11 15:41:23', '2025-05-22', , 1, 4, ,);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso_estado`
--

CREATE TABLE `aviso_estado` (
  `id_aviso_estado` int(11) NOT NULL,
  `descripcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aviso_estado`
--

INSERT INTO `aviso_estado` (`id_aviso_estado`, `descripcion`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso_tipo`
--

CREATE TABLE `aviso_tipo` (
  `id_aviso_tipo` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aviso_tipo`
--

INSERT INTO `aviso_tipo` (`id_aviso_tipo`, `descripcion`) VALUES
(1, 'Mantenimiento'),
(2, 'Política'),
(3, 'Reunión'),
(4, 'Actualización');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso_usuario_tipo`
--

CREATE TABLE `aviso_usuario_tipo` (
  `id_aviso` int(11) NOT NULL,
  `id_usuario_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `descripcion`, `url`) VALUES
(1, 'Análisis De Sistemas', 'https://www.ibeltran.com.ar/analista_sistemas.php'),
(2, 'Diseño Industrial', 'https://www.ibeltran.com.ar/disenio_industrial.php'),
(3, 'Enfermería', 'https://www.ibeltran.com.ar/ts_enfermeria.php'),
(4, 'Radiología', 'https://www.ibeltran.com.ar/radiologia.php'),
(5, 'Higiene Y Seguridad En El Trabajo', 'https://www.ibeltran.com.ar/higiene_seguridad.php'),
(6, 'Comunicación Multimedial', 'https://www.ibeltran.com.ar/comunicacion_multimedial.php'),
(7, 'Administración Contable', 'https://www.ibeltran.com.ar/adm_contable.php'),
(8, 'Administración De Pequeñas Y Medianas Empresas', 'https://www.ibeltran.com.ar/adm_empresas.php'),
(9, 'Certificación Superior En Salud Mental', 'https://www.ibeltran.com.ar/certificacion_superior_mental.php'),
(10, 'Tecnicatura Superior En Ciencia De Datos E Inteligencia Artificial', 'https://www.ibeltran.com.ar/cienciadatos_IA.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_tipos`
--

CREATE TABLE `documento_tipos` (
  `id_documento_tipo` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documento_tipos`
--

INSERT INTO `documento_tipos` (`id_documento_tipo`, `descripcion`) VALUES
(1, 'DNI'),
(3, 'Licencia de Conducir'),
(2, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(255) NOT NULL,
  `materia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `materia`) VALUES
(1, 'Inglés I'),
(2, 'Ciencia, Tecnología y Sociedad'),
(3, 'Análisis Matemático I'),
(4, 'Algoritmos y estructuras de datos I'),
(5, 'Sistemas y Organizaciones'),
(6, 'Arquitectura de Computadores'),
(7, 'Prácticas Profesionalizantes I'),
(8, 'Inglés II'),
(9, 'Análisis Matemático II'),
(10, 'Estadística'),
(11, 'Ingeniería de Software I'),
(12, 'Algoritmos y Estructuras de Datos II'),
(13, 'Sistemas Operativos'),
(14, 'Base de Datos'),
(15, 'Prácticas Profesionalizantes II'),
(16, 'Inglés III'),
(17, 'Aspectos Legales de la Profesión'),
(18, 'Seminario de Actualización'),
(19, 'Redes y Comunicaciones'),
(20, 'Ingeniería de Software II'),
(21, 'Algoritmos y Estructuras de Datos III'),
(22, 'Prácticas Profesionalizantes III'),
(23, 'Álgebra'),
(24, 'Inglés I'),
(25, 'Arte y Técnica I'),
(26, 'Física I'),
(27, 'Matemática I'),
(28, 'Diseño Industrial I'),
(29, 'Morfología I'),
(30, 'Gráfica Digital y Modelado 3D I'),
(31, 'Producción Industrial I'),
(32, 'Espacio de Definición Institucional I'),
(33, 'Arte y Técnica II'),
(34, 'Inglés II'),
(35, 'Física II'),
(36, 'Diseño Industrial II'),
(37, 'Morfología II'),
(38, 'Gráfica Digital y Modelado 3D II'),
(39, 'Producción Industrial II'),
(40, 'Práctica Profesional I'),
(41, 'Metodologías de Investigación y Desarrollo'),
(42, 'Espacio de Definición Institucional II'),
(43, 'Arte y Técnica III'),
(44, 'Inglés III'),
(45, 'Diseño Industrial III'),
(46, 'Morfología III'),
(47, 'Gráfica Digital y Modelado 3D III'),
(48, 'Producción Industrial III'),
(49, 'Práctica Profesional II'),
(50, 'Sociología de las Organizaciones'),
(51, 'Propiedad Industrial'),
(52, 'Espacio de Definición Institucional III'),
(53, 'PSICOLOGÍA'),
(54, 'TEORÍAS SOCIOCULTURALES DE LA SALUD'),
(55, 'CONDICIONES Y MEDIO AMBIENTE DEL TRABAJO'),
(56, 'SALUD PÚBLICA I'),
(57, 'BIOLOGÍA HUMANA'),
(58, 'FUNDAMENTOS DEL CUIDADO'),
(59, 'CUIDADOS DE LA SALUD CENTRADOS EN LA COMUNIDAD Y LA FAMILIA'),
(60, 'PRÁCTICA PROFESIONALIZANTE I'),
(61, 'COMUNICACIÓN EN CIENCIAS DE LA SALUD'),
(62, 'INGLÉS'),
(63, 'INTRODUCCIÓN A LA METODOLOGÍA DE INVESTIGACIÓN EN SALUD'),
(64, 'NUTRICIÓN Y DIETOTERAPIA'),
(65, 'SALUD PÚBLICA II'),
(66, 'FARMACOLOGÍA EN ENFERMERÍA'),
(67, 'ENFERMERÍA MATERNO INFANTIL'),
(68, 'ENFERMERÍA DEL ADULTO Y DEL ADULTO MAYOR I'),
(69, 'PRÁCTICA PROFESIONALIZANTE II'),
(70, 'ORGANIZACIÓN Y GESTIÓN DE SERVICIOS DE ENFERMERÍA'),
(71, 'ASPECTOS BIOÉTICOS Y LEGALES DE LA PROFESIÓN'),
(72, 'ENFERMERÍA EN SALUD MENTAL'),
(73, 'ENFERMERÍA DEL ADULTO Y DEL ADULTO MAYOR II'),
(74, 'ENFERMERÍA COMUNITARIA Y PRÁCTICA EDUCATIVA EN SALUD'),
(75, 'ENFERMERÍA EN EMERGENCIAS Y CATÁSTROFES'),
(76, 'PRÁCTICA PROFESIONALIZANTE III'),
(77, 'Inglés'),
(78, 'Salud Pública'),
(79, 'Biología'),
(80, 'Fundamentos de las Ciencias Exactas'),
(81, 'Procesos Tecnológicos en Salud'),
(82, 'Radiofísica 1'),
(83, 'Práctica Profesionalizante 1'),
(84, 'Metodología de la Investigación'),
(85, 'Organización y gestión de los Servicios de Salud'),
(86, 'Seguridad e Higiene'),
(87, 'Radiofísica 2'),
(88, 'Fundamentos de Anatomofisiología y Patología'),
(89, 'Tecnologías Radiológicas de Radiodiagnóstico'),
(90, 'Práctica Profesionalizante 2'),
(91, 'Bioética'),
(92, 'Investigación en Servicios de Salud'),
(93, 'Tecnologías Radiológicas en Tomografía Computada'),
(94, 'Tecnologías Radiológicas: Resonancia Nuclear Magnética'),
(95, 'Tecnologías Radiológicas Especiales: Medicina Nuclear, Densitometría y Ecografía'),
(96, 'Radioterapia'),
(97, 'Práctica Profesionalizante 3'),
(98, 'Administración de las Organizaciones'),
(99, 'Psicología Laboral'),
(100, 'Física I'),
(101, 'Química I'),
(102, 'Medios de Representación'),
(103, 'Medicina del Trabajo I'),
(104, 'Seguridad I'),
(105, 'Derecho del Trabajo'),
(106, 'Práctica Profesionalizante'),
(107, 'Estadística'),
(108, 'Física II'),
(109, 'Química II'),
(110, 'Ingles Técnico'),
(111, 'Ergonomía'),
(112, 'Seguridad II'),
(113, 'Higiene Laboral y Medio Ambiente I'),
(114, 'Medicina del Trabajo II'),
(115, 'Práctica Profesionalizante II'),
(116, 'Comunicación y Administración de Medios'),
(117, 'Capacitación de Personal'),
(118, 'Seguridad III'),
(119, 'Higiene Laboral y Medio Ambiente II'),
(120, 'Control de la Contaminación'),
(121, 'Práctica Profesionalizante III'),
(122, 'Algebra'),
(123, 'Análisis Matemático'),
(124, 'Ingles Técnico I'),
(125, 'Administración e las Organizaciones'),
(126, 'Metodología de la Investigación'),
(127, 'Introducción a la Programación'),
(128, 'Fundamentos de Fotografía, Imagen y Sonido'),
(129, 'Comunicación'),
(130, 'Diseño de Información Conceptual'),
(131, 'Laboratorio de Medios Digitales I'),
(132, 'Probabilidad y Estadística'),
(133, 'Análisis Matemático II'),
(134, 'Ingles Técnico II'),
(135, 'Programación Web'),
(136, 'Medios Audiovisuales'),
(137, 'Medios Editoriales'),
(138, 'Laboratorio de Medios Digitales II'),
(139, 'Espacio de Definición Institucional'),
(140, 'Investigación Operativa'),
(141, 'Economía Empresarial'),
(142, 'Inglés Técnico III'),
(143, 'Marketing Aplicado'),
(144, 'Edición de Video'),
(145, 'Proyecto'),
(146, 'Práctica Profesional'),
(147, 'Espacio de Definición Institucional'),
(148, 'Fundamentos de Matemática'),
(149, 'Derecho'),
(150, 'Economía'),
(151, 'Principios de Contabilidad'),
(152, 'Ingles I'),
(153, 'Principios de Administración'),
(154, 'Gestión Administrativo Contable'),
(155, 'Prácticas Profesionalizantes I: Aproximación al Campo Labora'),
(156, 'Matemática para Administración'),
(157, 'Costos y Planificación'),
(158, 'Inglés II'),
(159, 'Tecnologías y Sistemas para la Administración'),
(160, 'Contabilidad de Gestión'),
(161, 'Matemática Financiera'),
(162, 'Derecho Laboral'),
(163, 'Derecho Comercial'),
(164, 'Prácticas Profesionalizantes II: Diseños de Proyectos de Administración'),
(165, 'Gestión de Estados Contables'),
(166, 'Teoría Técnica Tributaria'),
(167, 'Régimen Tributario'),
(168, 'Finanzas de Empresas'),
(169, 'Administración Financiera'),
(170, 'Administración Estratégica'),
(171, 'Práctica Profesional III: Gestión e Implementación de proyectos de Administración'),
(172, 'Fundamentos de Matemática'),
(173, 'Derecho'),
(174, 'Inglés I'),
(175, 'Principios Administración'),
(176, 'Economía'),
(177, 'Principios de Contabilidad'),
(178, 'Gestión de Información para Administración'),
(179, 'Prácticas Profesionalizantes 1: Aproximación al campo laboral.'),
(180, 'Matemática Financiera'),
(181, 'Inglés II'),
(182, 'Contabilidad de Gestión'),
(183, 'Derecho Laboral'),
(184, 'Derecho Comercial'),
(185, 'Tecnologías y Sistemas para Administración'),
(186, 'Costos y Planificación'),
(187, 'Administración del Personal'),
(188, 'Prácticas Profesionalizantes 2: Diseño de Proyectos de Administración'),
(189, 'Teoría y Técnica Tributaria'),
(190, 'Marketing Estratégico y Operativo'),
(191, 'Administración Estratégica y Control de Gestión'),
(192, 'Administración de las Operaciones'),
(193, 'Negocios Internacionales'),
(194, 'Finanzas de Empresas'),
(195, 'Prácticas Profesionalizantes 3: Gestión e Implementación de Proyectos de Administración'),
(196, 'I- GESTIÓN, MODELOS DE ATENCIÓN E INVESTIGACIÓN EN SALUD MENTAL'),
(197, 'II- CICLOS VITALES Y SALUD MENTAL'),
(198, 'III- CRISIS Y EMERGENCIAS EN SALUD MENTAL'),
(199, 'IV- ABORDAJES ACTUALES DEL PADECIMIENTO MENTAL'),
(200, 'V- PRÁCTICAS PROFESIONALIZANTES'),
(201, 'Lógica Computacional'),
(202, 'Administración y Gestión de Base de Datos'),
(203, 'Elementos de Análisis Matemático'),
(204, 'Estadística y Probabilidades para Gestión de Datos'),
(205, 'Ingles para Ciencia de Datas e IA 1'),
(206, 'Ingles para Ciencia de Datas e IA 2'),
(207, 'Técnicas de Programación'),
(208, 'PP1: Aproximación al Campo Laboral'),
(209, 'Desarrollo de Sistemas de Inteligencia Artificial'),
(210, 'Modelizado de Minería de datos'),
(211, 'Técnicas de Procesamiento del habla'),
(212, 'Procesamiento de Aprendizaje Automático'),
(213, 'Ciencia de Datos'),
(214, 'PP: Análisis y Exploración de Datos'),
(215, 'Gestión de Proyectos'),
(216, 'Taller de Comunicación'),
(217, 'Seminario de Actualización'),
(218, 'Técnicas de Procesamiento Digital de Imágenes'),
(219, 'P: Modelizado de Sistemas de IA'),
(220, 'PP: Proyecto Integrador'),
(221, 'Tecnología y Ambiente'),
(222, 'Trabajo, Tecnología y sociedad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_carreras`
--

CREATE TABLE `materia_carreras` (
  `id` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia_carreras`
--

INSERT INTO `materia_carreras` (`id`, `id_materia`, `id_carrera`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 2),
(25, 25, 2),
(26, 26, 2),
(27, 27, 2),
(28, 28, 2),
(29, 29, 2),
(30, 30, 2),
(31, 31, 2),
(32, 32, 2),
(33, 33, 2),
(34, 34, 2),
(35, 35, 2),
(36, 36, 2),
(37, 37, 2),
(38, 38, 2),
(39, 39, 2),
(40, 40, 2),
(41, 41, 2),
(42, 42, 2),
(43, 43, 2),
(44, 44, 5),
(45, 45, 2),
(46, 46, 2),
(47, 47, 2),
(48, 48, 2),
(49, 49, 2),
(50, 50, 2),
(51, 51, 2),
(52, 52, 2),
(53, 53, 3),
(54, 54, 3),
(55, 55, 3),
(56, 56, 3),
(57, 57, 3),
(58, 58, 3),
(59, 59, 3),
(60, 60, 3),
(61, 61, 3),
(62, 62, 3),
(63, 63, 3),
(64, 64, 3),
(65, 65, 3),
(66, 66, 3),
(67, 67, 3),
(68, 68, 3),
(69, 69, 3),
(70, 70, 3),
(71, 71, 3),
(72, 72, 3),
(73, 73, 3),
(74, 74, 3),
(75, 75, 3),
(76, 76, 3),
(77, 77, 4),
(78, 78, 4),
(79, 79, 4),
(80, 80, 4),
(81, 81, 4),
(82, 82, 4),
(83, 83, 4),
(84, 84, 4),
(85, 85, 4),
(86, 86, 4),
(87, 87, 4),
(88, 88, 4),
(89, 89, 4),
(90, 90, 4),
(91, 91, 4),
(92, 92, 4),
(93, 93, 4),
(94, 94, 4),
(95, 95, 4),
(96, 96, 4),
(97, 97, 4),
(98, 98, 5),
(99, 99, 5),
(100, 100, 5),
(101, 101, 5),
(102, 102, 5),
(103, 103, 5),
(104, 104, 5),
(105, 105, 5),
(106, 106, 5),
(107, 107, 5),
(108, 108, 5),
(109, 109, 5),
(110, 110, 5),
(111, 111, 5),
(112, 112, 5),
(113, 113, 5),
(114, 114, 5),
(115, 115, 5),
(116, 116, 5),
(117, 117, 5),
(118, 118, 5),
(119, 119, 5),
(120, 120, 5),
(121, 121, 5),
(122, 122, 6),
(123, 123, 6),
(124, 124, 6),
(125, 125, 6),
(126, 126, 6),
(127, 127, 6),
(128, 128, 6),
(129, 129, 6),
(130, 130, 6),
(131, 131, 6),
(132, 132, 6),
(133, 133, 6),
(134, 134, 6),
(135, 135, 6),
(136, 136, 6),
(137, 137, 6),
(138, 138, 6),
(139, 139, 6),
(140, 140, 6),
(141, 141, 6),
(142, 142, 6),
(143, 143, 6),
(144, 144, 6),
(145, 145, 6),
(146, 146, 6),
(147, 147, 6),
(148, 148, 7),
(149, 149, 7),
(150, 150, 7),
(151, 151, 7),
(152, 152, 7),
(153, 153, 7),
(154, 154, 7),
(155, 155, 7),
(156, 156, 7),
(157, 157, 7),
(158, 158, 7),
(159, 159, 7),
(160, 160, 7),
(161, 161, 7),
(162, 162, 7),
(163, 163, 7),
(164, 164, 7),
(165, 165, 7),
(166, 166, 7),
(167, 167, 7),
(168, 168, 7),
(169, 169, 7),
(170, 170, 7),
(171, 171, 7),
(172, 172, 9),
(173, 173, 9),
(174, 174, 9),
(175, 175, 9),
(176, 176, 9),
(177, 177, 9),
(178, 178, 9),
(179, 179, 9),
(180, 180, 9),
(181, 181, 9),
(182, 182, 9),
(183, 183, 9),
(184, 184, 9),
(185, 185, 9),
(186, 186, 9),
(187, 187, 9),
(188, 188, 9),
(189, 189, 9),
(190, 190, 9),
(191, 191, 9),
(192, 192, 9),
(193, 193, 9),
(194, 194, 9),
(195, 195, 9),
(196, 196, 10),
(197, 197, 10),
(198, 198, 10),
(199, 199, 10),
(200, 200, 10),
(201, 201, 11),
(202, 202, 11),
(203, 203, 11),
(204, 204, 11),
(205, 205, 11),
(206, 206, 11),
(207, 207, 11),
(208, 208, 11),
(209, 209, 11),
(210, 210, 11),
(211, 211, 11),
(212, 212, 11),
(213, 213, 11),
(214, 214, 11),
(215, 215, 11),
(216, 216, 11),
(217, 217, 11),
(218, 218, 11),
(219, 219, 11),
(220, 220, 11),
(221, 221, 11),
(222, 222, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `id_aviso` int(11) DEFAULT NULL,
  `id_tramite` int(11) DEFAULT NULL,
  `varios` varchar(2000) NOT NULL,
  `id_notificacion_tipo` int(11) NOT NULL,
  `fecha_envio_notificacion` datetime DEFAULT NULL,
  `id_notificacion_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id_notificacion`, `id_aviso`, `id_tramite`, `id_notificacion_tipo`, `fecha_envio_notificacion`, `id_notificacion_estado`) VALUES
(1, 1, NULL, 3, '2024-10-11 15:47:35', 3),
(2, NULL, 1, 3, '2024-10-11 16:12:13', 3),
(3, NULL, 2, 3, '2024-10-11 16:45:23', 1),
(4, NULL, 3, 3, '2024-10-11 16:45:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_estado`
--

CREATE TABLE `notificacion_estado` (
  `id_notificacion_estado` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificacion_estado`
--

INSERT INTO `notificacion_estado` (`id_notificacion_estado`, `descripcion`) VALUES
(1, 'Enviada'),
(2, 'Recibida'),
(3, 'Leída'),
(4, 'No leida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_notificaciones`
--

CREATE TABLE `tipo_notificaciones` (
  `id_notificacion_tipo` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_notificaciones`
--

INSERT INTO `tipo_notificaciones` (`id_notificacion_tipo`, `descripcion`) VALUES
(1, 'Email'),
(2, 'SMS'),
(3, 'Push');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `id_tramite` int(11) NOT NULL,
  `id_usuario_creacion` int(11) NOT NULL,
  `id_usuario_responsable` int(11) DEFAULT NULL,
  `id_tramite_tipo` int(11) NOT NULL,
  `id_estado_tramite` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`id_tramite`, `id_usuario_creacion`, `id_usuario_responsable`, `id_tramite_tipo`, `id_estado_tramite`, `descripcion`, `fecha_creacion`) VALUES
(1, 1, 1, 1, 1, 'Constancia de alumno regular', '2024-10-11 16:04:47'),
(2, 1, 1, 2, 1, 'Ingenieria Informatica  Turno Mañana', '2024-10-11 21:32:29'),
(3, 1, 1, 3, 1, 'Ingenieria Informatica  Turno Mañana - Fecha examen: 2024-10-11', '2024-10-11 21:33:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_tipo`
--

CREATE TABLE `tramites_tipo` (
  `id_tramite_tipo` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tramites_tipo`
--

INSERT INTO `tramites_tipo` (`id_tramite_tipo`, `descripcion`) VALUES
(1, 'Certificado de alumno regular'),
(2, 'Justificación de inasistencias'),
(3, 'Constancia de exámen'),
(4, 'Cambio de turno'),
(5, 'Inscripción como figura oyente'),
(6, 'Inscripción a libre exámen final');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite_adjuntos`
--

CREATE TABLE `tramite_adjuntos` (
  `id_tramite` int(11) NOT NULL,
  `archivo` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tramite_adjuntos`
--

INSERT INTO `tramite_adjuntos` (`id_tramite`, `archivo`) VALUES
(2, 0xffd8ffe000104a46494600010200000100010000ffed009c50686f746f73686f7020332e30003842494d04040000000000801c02670014562d3938506b356b785172385578613473655a591c0228006246424d4430313030306163323033303030303437313630303030373732613030303031343265303030303037333330303030373534303030303035633537303030306637356230303030646436303030303062623636303030303636393130303030ffe2021c4943435f50524f46494c450001010000020c6c636d73021000006d6e74725247422058595a2007dc00010019000300290039616373704150504c0000000000000000000000000000000000000000000000000000f6d6000100000000d32d6c636d7300000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000a64657363000000fc0000005e637072740000015c0000000b777470740000016800000014626b70740000017c000000147258595a00000190000000146758595a000001a4000000146258595a000001b80000001472545243000001cc0000004067545243000001cc0000004062545243000001cc0000004064657363000000000000000363320000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000074657874000000004642000058595a20000000000000f6d6000100000000d32d58595a20000000000000031600000333000002a458595a200000000000006fa2000038f50000039058595a2000000000000062990000b785000018da58595a2000000000000024a000000f840000b6cf63757276000000000000001a000000cb01c903630592086b0bf6103f15511b3421f1299032183b92460551775ded6b707a0589b19a7cac69bf7dd3c3e930ffffffdb004300090607080706090808080a0a090b0e170f0e0d0d0e1c14151117221e2323211e2020252a352d2527322820202e3f2f3237393c3c3c242d4246413a46353b3c39ffdb0043010a0a0a0e0c0e1b0f0f1b392620263939393939393939393939393939393939393939393939393939393939393939393939393939393939393939393939393939ffc2001108021002d003002200011101021101ffc4001b00010002030101000000000000000000000001030204050706ffc4001a010003010101010000000000000000000000010203040506ffc4001a010003010101010000000000000000000000010203040506ffda000c03000001110211000001e6d95d9bc4c4c500089800000004c48c04000112000026000d0009403262600024040090101306800000131200009a602903000006828008012040098941122556d48c2caec564c300444802644b409834000001120000200000981a62401a0000940250000249c48d412001090448008260698048001808180d00022512800060029ba94636d568d12640100d2222624200030000347a1caf56c5f97bafb68e469fa1f99b37b1fb7ae4f89dce57a7d1e7136e0cdfa3d23520f3b753a0cf9bdee9f651f27afe8df2a3f97eb7d3da2f82cbeab8d455abf71bf279f534e7aad8cfecafc9f9d5ff004ff0f67468f43e343f94dfe3facd2f22edf1fd5e4f34debfec83e1b9de85f0415ecf7fbe1e7d7f236b65bd3a16336e624004000c06020112001898908a6ea518db55a3062260403944a7131228030680005ccf56f29f54c2be6b7ebdc9797967a9f9733d630c2c47947aaf947abb3cfb0cf0a5e97e7fe81e770fea3577f403439dd2d06bedbcbbd47cc83d63cfbd07cf53fb7f9efa1f3b0fa2d6fb7f346459b9a7acfde7c1fde7cd635f6de31ebfe5a1eb5cbc7a01e4bec1e31eccd7c27dcf0fb89f927dd7c4fdb35c5e575f9147de7635f9f0fcff00771cb7853728c76f9bd14e40480068000011200180c5375288cf0cd3c91238890900262420326261002061123e67aa795faa60f918e8e32fbbe75e8bf141f4f6f541e55e99f07f781e7f5d95daf4bf3bf44f3c87f59a1bba41a3a1bfa14bedbccbd37cc91eb1e7be85e7a9fdbf9dfa27c2b5dfdbf88f534fceb086b3f7b9e1f0d955d2ddb5d0ececd90fc7bd7fcbfd4038ddaf8afb90f22fb6f89fb6a5c7e3f639c1e87c0fa9ae5fc1eaf5b93b4068a8dcd2de9acc04800680131280000060029ba94636576159102988000091c0100611ad4e7a5f8e119de7132ab57d67c8bed5e5cfc78b04fa4fcdb443a99fce4b3abf57f0fd346b737e93841e87c2d5a026cf98de6b6f42ba83effccfea786cf43e1713e965ec68fce56d77fe9f87cd4f918e1468bd1fe27a7f330fa9def82faca2ce9fc4eec1b5f7fe71de0f95f58f12f410f8dfb7f3bfa964473af0fabe4f37545f5bc5bf613f9dbb2d80b393f4ff00314ba729d8848511268802444b19624400096a357674337b165765d6513028000d0260c639528d3b307176cd6c66b6215a7644e4155b18ed86dcd8e9e6c19995ac06116030ce4257602b9b03ab3ca022ab8135e97353ddd4aec9baf3cc56290319c518e3b99c3d0cada5964e395a243c7a9cdeb3cb09ca748ae72c855c5b08d3e968f466a6625b44840284c310e68fa53c4ea06c04818028e67479986bbb7536eb19214e008049826013a7b7cf9bc6271e3ea84c2728905b4e69d95e3954f433d4daece3ca262d3570e6aaecdbc3ed259658cd489400c4855c5dfe345656c646921b0063308bbb916f9770ca795e3a7bb367cbcf638fea44c4ba14f539bd278c8b906a6046bf479dd18a9983251200c1296b717a3ce9d5b1ac2be872af3ac64342028d2d8d5e4e8dfb2bb3a70914d1302010262198f3f67530dd2cf9f6c632a02d6b6c8a33aec2b1c7280cfa5c8ea7473d846f8f1a9cf08d63a9ccde1746626b34a1290c98609f339f9a6f398934060063d0e777395ed649f274803989251f39f49f35db188f4e6fdfd0e85632349004096975381667a775cda03a79fced8cfa29e3f49ab9122e6f3fabcb9d6027dcb6bb6f1068612f475b629e3eae8595dbd9cb31314c98080900840f46acabe5ebca71ab3adad4b3316bc2da8cf28ca7484649e3b1af9699f4e0eae5e257b1aeb56fe874d2dc35aa2dd6e513ef4f0f26fadcbc015db09b9039218310bbb9cbeb799799a9c8f6dafb09e508923e6fe87e6bba334c7a53674f97d3ac721a48098e58a39433de09550904650175f6383d479e8ead98b51121f537b93d6264526aed73e2d8ce1c5d3b96d56f772053980202400a6ed34ea9cf1e2edd6c36aa273c6abda8595cd46739a782cc429cacc5adba70daebe4e2e36d77319c5e1bfc6cb09a9cc34940720093224000639628fa2b342cf32b6b4763505d0cb4ec93639f7e8b2fe374b9dd6ac84f493d4e5756f1c85c80a094f9785faf9ec90a01a60932c605d2e5590e71d9a6f1762632acc18890e29be9831b6ab593130c44e2c9639088d755b3cfb6234c672ab97a739c225e531886745958af9aa5162bcd9315ded6b7475367a39b9fabb5aba18cc549afc496c53b96e91cd8dccd568ba501cf6ed4debce51348662c31dab1ad5dfa7afc15a39ee472dd76261635ec62ab9bcce857e8469cf467bb3e5f5f5ac26f42e240a406ae8f5b979eb8aedc6f4abdbd41c88b84c32232c059dfafb02ec658e57883010a6ea52c6daad294dfac9f373c28c6f6b1a50d5e709ecf5f89dbdb39aae6a46399144d7cecf4cea63cfa7533e5ce93d5bb1cb7c603491ae4eaed6ace98e1995ca44dfb9a1d0db9926b9a62588ca1284c15202600d5d8a37fcbeaa32b9c7ad0d88655b9ab39d34badcbe8ced27dce1c75b6a1533d3dbcae404c454cbb56b91ede78ceb973a9eaf371de065ba24118678232d9d6da73d6ca26f106021567cd95b96d56ba557603e451b1adcbae5264d8c84ef7cf77fa22c83a73944228e6671cbd583361bd77d7171da9d4dbece4942a1249c9d5dad55ae313056605b1bbabb5b7306b9835242262bc13be753642624cab62babcde9bb1a29e7bdabf9b915d4ae72c2f72bb2798e66a7769f471e6ddab97abcd9e39ea8f6e9af2b224b9cb2b773cbe9d5cedd5df2b75366be89d044f3f580e30b2a167b5abb4976113a620001adcaebf2e174edaedaa86503e36b6d6bf36b289c444c061dce275b78db9874c3472e6c55a38fba508a9840475b8f1d3c9de6b6d6f8839e4eaed6aceb1095531302ded8d7d8df94358902c30b2b9a8c6bb22af9a6db99985c890d7cec8e4dadc74ede0e9b77d970e9315c4972261e3cbeb47467caaf3cfdce5d0b2bcfaf3ca272877efd78fcef7d176deba53a3751d33a194e3da4914e6ab2a459b7a76a5dd9e2c29edb8b2cecb91639e9717775d4efdb55ba0219cad5ddd4e6da0600278f4f99d0da7a03ab3e6d7d0e744e316b375ac255ce723c22cc28dddac33d1c8b5cad5d9d78d30898559016dece9ee6fcb911ae601853b329e190c1211312d0a13b2bb3a3e7746b619ecf9dd1949cd7ad6576eab319009c72ba55f5e5cbaeddaf531e6f4efbb8b6ab2d5af9f5c99d1added2c69ede8e58eb3546776b14d99ce371331341340c012bb3071d3b6ab7d0e29219cfd3ded3e7d2a9c3671aa27a775ae2ee63852ebb4e7a236f9b7e0a69556444c4e0963340db6a75b6f1eeb6bc705b5bbff39d5db82ad7bf5f451084f3980dd4e474f6e6b46d8881490121b04850aa369bbe475ccaaf3b6d6ddd5dbb03228ca2353622632698234f6f4f6f79d4d8b798cdee7e1b1ad4615ebeb79321498278639e5430ce84acb31ca484c0c04000c616562e9db55be970c80d2d2e873f2bdadfd4dc6a38bdae16d119d3943dd9d3b77cb626bcf488a6f49461b4cde8c6fe13b73b3db63b6b46dc8f4766d8bc6aaaeaa354e4e7d892a8b30dadf9ed989eee1225a2012aea55b31a58675b96ea767cee966797be3a19eeeaa9d88661312538e75ea6c8c826034b6f4f73559f3f7f197cca299efa98c6e2e445031314b16321027280022400095d95b5d3b6bb7d2e106a9e575f9195ee6ff37a2270bbbc2e8cabcb0b26abcb1cb7ce6fa22e76231c32aba30ca6e4266533782ccd3a1b128d6aeea49ba61e7fa115db296bd99e1b64caa699ec28ce9658671158e49c358c32b53e9ec619f0ccd176829b76b1c825130e00558e36ecac989c4108d1ddd3dcdd65062f91abd6e5f73ca4ad913806515cb5164e42465135000000120004619e0e7a96d36fa5c321ac78fdae3e57674b97d44387dce1f4635d95e4eb0cebcae328868b3dbd3bf83a36a6a9e4eab184aa9aaad5d33e8dbcee8cd92cdea6bdf476725f313cbdc0940000c71ce5aa66d8030809dfe6f5a73dd93813437abb5366b58172273601a9b5abb5aa91939890696dea6e6a8c74255dcadcd3edace436c63390c666024814c098000004c810404d6d5bcfbb7536fa1c7204e575797155f538d195f4f9439c7299c9e2998ac526a3280c26920635db8e91b7b3ac5becb5c9e34e7afd5c9b71ab672f6dec3286247090400121040b1e8f33a911bd30e19559c51555ceb3bb2e959cbc2e3b6e34675bfb7a3bdcbac8c98a5ad6ca8dceecb53676ebe8caef9ddee6adae989c3ae50094480320200000930562cf571ab6c919ceb8f7adaecdf2998373cbe9f360d064e2d6241a6089402250d09144a073118359e138e8b6b265d2b18b726b5e9d8d6aceb8963bcd9533bdacf4a73d375af6677640aa5128888e90a63735b9f2da8aabcc536e875e59587bbc4435ce70cf0caf7f6b1cbe5fd2119b9d2dce6eb3d7e5f372f4f199963d52895a26120026241130201802624113af49af8b7c2739cf6ce1960df6b2aedacb18ba59469f4b4d3e4cdd5f26cc3bfc8d33a139b55c65843c88a594c229166fc69abb16e0af4a9b75f4cba56ea6e67ba6135ada9b5a9d9c758b60903612f2b68677b796965969b5dce376b956712e428c365a2e3e47b7c21e961205166bf4bcde9bf289f03b5300c791d5e4f76166b6d47b9cda99579f97e966af2c75cc240c0400000026242bd2dad4e8e75b5dfbe6144e19e08ee59cdc1e5d572300ede8f3a13b2bceac35e9f3ab9e9e79b68b5d2bcb18ace328eee76513c5d396fe86f71f56586584de8d5757af3f473c71cb7b14c061a9b7abdbc550281b00000491303dfedf23b1e5eb90e4b4205cc8b2bf7b804fa7841843b7a554fcdfa2bb532c9ec1af0e9d6c2df6f8e625e9f3e1abbbafcbd244f95e948400000000000053abb7a9d1ccbe8bf789890d86780613131ca91a02aea6dab2e98989d79a2daec578619d65dac27bb9b3465c9d33b7a37e7a5b5abb9c6ab6a87b39531d386c46b45e7b14e28231cd8d54b21de2987a00c404c09747b1c2ee797ad889e4b0168ebeee8fb1c990f63958678e17d6e6dfa3e17774eaa2d46f727a5cbb9cd2fa1e00a11330f46dc33f1fd5918ea0000000000014eaed6af4f32fa6eda243a619e29573131cb3312d40556d57539f4c658e5af2c5b4d9378e1960b4cb1c9af3cd955b1bd7957379e784e2e2daadab1e9992f98052804a01309088ca1d6116625e31943d200eefa2f97fa5f3b4bd13c3a0053caec71fd3e6b87b9c498964252e35f63539f6cafd4d9e6d6d1e9f180260cd6658793e8e5313c9d400000000000156a6dea74f34dd4ddb4658e58b738e58a302639018989556557539f4e3963969cd1281032434b2bce37ab2819ce39454675cc4ed91358c01484030000113008ca078636c3babbdc3dee6dbb83cbde481b8dd9e3f6e16227e8384290046a6dea736d1b145fcdbdb313e8f1030055ebed6a79fdb70f3fbc000600020000a7536f53a79b2ba9bb6898986e70cf04633131c80d262155d542768ca178808025009cf0b277a9191985422400c00909000042304ed619b2184276b0c42c9a93a7d465c9cfcce9ea3976237f83d0e3f4c74675acf7786d613739b1809d5bf579b79d8d7d9e7dac989f4b8800031d4dbd4e1ecb879bde00000301000055a9b7a9d1cd95b55dbc20aa9c33c25633133c800010900201900011301719044c4c0818030681120002bf53f2cf589d7ce39dd2d70f42ec61f18af8ff5fa9d00f91fa6a36c3e37d3fcc7d5029f3bd4997f73d4a7e36973e8eefcff00565319ba33c27322356fd7e5e88dbd4dc9aca61e87148622601a7b7a9c3d96cc4f9bde000300010201956a6dea7473657556ef102aa70cf0958cc4cf2000200002032404004c48000000004810040006f0f58f27f588d3ce69ba90f52f8bfb4f8b57d2ded1de0e872fa58879f7aa795faa079351ebbe578d7a779a75feab59f83dcd2e8f9db511b04559e64eae2f4b93d0467367a5cd36618f673dcd7ce8b88735d593ceefc88e0ec0600c0004000146b6c6bf4735965766f281b9c33c12c44f24901210000c80120212000010000c05200011208482bf58f27f589d7ce69b281faafc5fdb7c5aae86f73fa01cefb0f31f4d0f2cf54f2bf540f20c31eb43e67a33e75a86ff00ccf3df5ebe0ebe75ddd1d29e8ce2fb67d0c631b9d19d76290d8a963519c4b5ab9537793e948e6e8449b00000100006b51753d3cb9d95d9b298986e70cf04b1984f2480848212040001200008900026120600e408000002bf58f29ae74f67f8df8a15eabd2f1bcc3adf61e6f58ba9e81e5b8875fd53c503f6bf3df9690f5dbbc7b20ec7a6f8be21f699fc403d9fc875aed27a11559db96385f34b5ee549e488957d5968cddd6556795e964867ac8000000100080d5aacafa796ccf0b3690295d9825892b900010202430000113009890009094060000480000000000080001200180109022411121c48de5650b5b96f3a6d6e46b60ccf099c1e3919696dba6cfab7545b96f904c0000011308d3af3c7ab92ccf0cf62436c33c257ffc4003310000103010604060104030101010000000100020304051011122031132132330622303435404114152342244350602544ffda00080100000105026747fe625edb3a3ff312f6d9d1ff009897a19d1ff9897a23e8fa756f731a2cdb44a2d9e9eaa08ea6ae69682be28e27934f4b4b5b55155d356d2473bc8823a0b4248e2e2b6a6732717f6db493e96d184473891b494f5b56c969ab629ff6cb457ed968a9e8abe08a9cd4d52fda6d059e58659a6c859665a12b6786b28931c1eda8716c50d0d7cd13a82d2608e7f3ccec9153d1d7d443550d651aab7b98dfdbad1c38f2705b675a2e6d25356d533f6db497edb69291b514f554b155d619e8abe08a07678bec4bd11f47d3aee9674f885b92a7c36cfe1b47d834e14563b3259d6db33d9b21c68e87d8c9f28ef7ce39453554354db7e9c452786fda5ab2362b4e1b4a92692591b14768da549351591008285b5f03ab2dea71251f87e1e2cf5f5f15122193c3034c33d5f62ccf8f157019edaa36cf4d2499e92819c3a2f10b3350d49c60674da51706b61ecd8d5d4d4b4f4f51154c7535d4d4cfb52a629ebbc3acc28eb19c4a4a6c4c795798264bcfeacbd0ce8fa75dd2ce9f113335158cce1d9d68fb027fc481a21a6ac6f168f1ff001287d8c9f28ef7d3f67c3aec2b6df6e367f86fda78879d550b432d7b4fe3dcd6fe969bdbd2fcfda9f1fe1a78c9e2489c5b4f6d08699b23a7adabec599f1f5e4b6da70c5acc5eb931b6b333d9d21c6959d3e248b0961ecc2c6ba3f0f7b0b7403694f146c8ac6664b3810e10b724b73d98a85f8fd597a19d1f4ebba476ea07ea6c593fc7a3b47d842388faf764a2a4771291e386287d8c9f28ef7d3f67c3fefedcf8cf0dfb4f107baa4f98b4fe3ddece9bdbd2fcfda9f1f66cff00a3a99a3654421aea3a9557d8b33e3e6b3a79ed7aa94434d66b33d7daf270ecf9071a9f1fe16f265b5189ece87b34fd9f0f7b0b73e52b4ff1d3b7854b63c9c5a0aa6f0ed5bdde497ea4bd0ce8fa75dd23b763bb89665aafc05a3ec2c86e7b46dc765b36c6767b36d46e4b4287d8c9f28ef7d3f67c3fefedbf8cf0dfb4f107bba4f98b4fe3ddece9bdbd2fcfda9f1f147c4a4b0ab0b9b6dd1fea29e9e4e24757d8b33e3e7aea680d7d73ed0758cc06d5f113b0a2b3dd9e86adbc3a8ff5598e15565c632b29fb5e1ef616e7ca4a38b555aec947e1c763496d3725a97cbd2ddbe9cbd0ce8fa75bd23b7e1c7e3496c3ff00ceb47d8787598d6491b256c71b236f881996be87d8c9f28ef7d3f67c3defedd3ff00cdf0dfb4f107bba4f98b4fe3ddece9bdbd2fcfda9f1f45415751054472d05641209e0c9c0afabec599f1f5cd0fb5c00d1e1d19a69628e50c6b58db69992d2ff5786e5ba9fb5e1ef616e7ca59e38b6b39ad7b6286285788db81be5e96edf4e5e8674faae786acc08e2f9a47e64d932a2f76354fccdff5f869ff00c969bf35b968fb0f0d33c96dd5cf04d61d5cd50ef12b39d0fb1a8b2eb1d56fa5a8a6ac91b9a3b2acdfd12f11cb843e1bf69e20f7549f3169fc7918d1504825a286cc9196b5b3208ecef0f499a8adab3a6a99e9a2e0d397716d1abec599f1f57f3323b2b3c3acc28ed9aea886b2c3aa96a60f11b30aaff55912f06d05076bc3dec3c41f21e1f6e6afb6ea64a6a7b22b6a64aef10b3350c3634f2c54d452d455d7d9f2d144cb1269194e1cd9fe9d41c22674fab29c5f9561cba56f7540c07efb4b96cbaa6d1d4cd54d92d2aab669a6a6b2ad3a7a3a6acaa6d6da14156ca1adb5ad282b60a6b6a9a2a7fdfa955a16943533fefd4aa4b79983b8b51259369434505a55b1d6d43666d3da5596cd3cf4b4c03a9a82b9f671fdea8f0abaa92d2961964b3ea196dd23856db3c56439206544c1d1d1db34f052d5ce2a2b5fb59d6ad3d2d257540aaadb22be3a136bd7c35a3f7ca5c831085bd4d8376b2ed4868e9ad4ab8eb2aac8ae86895ab5f1d718a614b6857dad4d53494f6d53454f455f153da16b5a50d653c56e53322a77092a7e9d49e4ce9f50ec3a938e09f7e00acad4e60c220d73786c5c3620d6845ad2b86c5c362c8c5c362c8c400176462c8c45ad2b23100022315c28ee2e003e485672b0582c05fc90d380bb008619f235656a201591ab2316462c8c45a38ad681f525e699d3ea4a706b7629fcd3aefce37c5e593e8e2a5a90139ce720dd781726c122fd2c89d0bdb70d11f735b7bfe8952ca536470513c3c6a3c81e88fa7d498a3b9ea3d67ac757f71d573b911a4ccc058f0ef49ce0c12cc5e80435c11710b181830be5a76b91195d7c5dcd71f7fd199d959742ecafd52f4bfb6ce9f509c651d4dea6f37ffb0758eb1d476c7c9fd603e5bea1f804c7163c1c47a157d1f91ac0cce6343469a98b3346d7403cfae2ef7a3567cb77e5bb6994e2e9ba59b7a6e38346cde4d8f68d37adbd6dee0eb1cc339b4f446707df31c6545539c63f42addcfd0a4621abf0eeaba0ead713c366071bf8ac0848d3a6af433a74eef99336f4e73e57f26bb9336647d398e6f33137ac771899d437feac38b6e7f72ea5db5b8e50f766701acaa71847adfdcba9fab59eb6b9cd42a1493b9cb0413262d4c7870baa4631dc376e971c1acd9e1336f4e4e723b9bddcdcfe96f2194a8c71111964ff00637abfd8eeb1c9f01bdfdcba976b9d2358054b50782b304f998d52ca64407a10e5ced20eb3b3baee83af5ff7d4d71618a40f44e01f3b9d783ce1973699fa06cee966de91439967377fb1ef2e4242133a0070318f3ffb7fd8eddfb3b7c72c82e9c60fba9f0c8a593202e2e207a8553c18a1cae9642d31837e29e7060be1ee6b3dcd6d25a58fe2308ca6fa761cda273e6e65498b5acdbd294e0c6748180cb9c35d8995b8c71738a11e46f5ff00b4f5c9b1e6dfe87ccc85d99952f2d079ded390ba4c18e717168f57f2c0032e0734c2ec4291f954927f00be2ee6b93bbe835d90c99648aea700c8069c062a5e866de94f73b660f2cac249797b5a3c8d18359d787988479803961c99b42707c8c0f0f66437323c54afce40f5bf21b4ef0d870592209861ce44056102ff001d62d75454332c6dbd9dcd738c1fe882436ea7eeeb97a19b7a4ee72dc2ec2f675e9e49dc88e62a7b88a73ce509a1708a208bf92e5e814c382e0bd7e9c9461e4c1cb2828b79363015479d6c562b6236d53b7168bb75c3207a14fddd72f6d9b7a124995472e65c2253a2c06643339730b305e72b1439101ee59b045cb248b142205180a602054f711d113b302315c14220b23570da5705a8c2b2b960e581418f2842508426811c8082b10b10b117fe0e6cf2343a4c8d591a9f1b72c4716ea23145843db1129ac014af007a14fdd1ae5e866d74aecad2f7ae3b971de8ccf28bdc6e80f9c5dc36e382201423684e958d52bdb211c9c26661e4903636b6ec3454f71142f83d67f99dc1017082e1b570dab238264a714e2f099e637e05841c46a79cceba466075854fdcd7276d9b5d3f47e0698ba86995d95b85e10383c6aa9ee2285f1757ab173974bdb99b09e49de4934743efc5190058b9ca2eab8a70caed26ea6eb1a9c72b659bc8cdae97a06da58869970cb8958df006923554f71142f837f50ed096859da171988d446bf52c4d958eba1ee2731ae0e85ec5c570424173db9846f186708c8b995804d198b63707075f30e5f8d06ea6ee0d551db907266d73ba46df9d01339b6f2700e717bb4c3266d553dc450be0db59780b315cca17e0139ad098cc17e99ee3fa47a6d390e3e56d38e57c9135e9ec3121b02a4183b44246587a65cb835c00cc14bce31b68375375ea986319edb36bbf017f6d0145d17d4bb90db4e258e6b811a2a7b88a17c3d1a715838a3835004ac3565705c7c171198711a834c846923152446323ce1edf2b36b8a8a0e5ca36e0f95c216a30c69e3211a4eea97af51d9fc9336bdddc7756983b774d216ac717f2d4484d503b16df53dc4536efc45d1a9cec105e728375918a76454dc8dcfe4d674e8923313b1c474bae6b0bce3943598dce99ad5c6794e123d3a37375734cced59a45cd735e6599e84cf42a14f95e19b5f2775dbe8fcd3f6eea8183f0056559165595655956011da0eddf53dc450be1e8d2ec706c6b0f41ce0d4c0f90b236c6d8412eba7edb3a7438620ff13a51ccb5cd24951bbcad6609f206225cf41a05d880b3b14b971b835650b0f45db336be5eebf4fe69af91b99a3d0280c05f53dd450be03ebbdf828a1c505314d180baa3b4ce8d0f7e553333b5a0bcb6004089817209f2924305c640b338acab284435062c3d476ccdafa8eb7e8c57e69f93af95b95fa3320573595cb17a323c2152535d9854f71142f6727faaf7a861cb7b06796f9fb51f468a9e90a56e52d20a73834173a440609cf0112e71030bc9405c4a6fa6ed99b5f529f73227393606858b1a9e417b1d95fc60b8cb8a539c5c3a4dced822a372c534a7ac552bb1551dc4e4dd119c5be9bdf82862cb7c8ecada6eddf2f6e2e8d153d211188cdc13ce4727c8b0d385df8dc8f4ddb336bea3a5db53b1b96e71f3e3e6ff00668201590acae45ae5814560b9ae6b02b2287f8cce4178e6b2a0d582c165513b03e93dd94411ac2e710d047194432b2f97b70f6f4546c2eaa6621a4657bb13c821acf3387a8ed99b5f3f47e29fb773fb9f9720f2b3a041d672ac18bc8b162ced59d674702b0582c562b15ba6b46b2e0119517bd667a818e7b85eefe478186993b70f6f4542173862d7039f1c1018eac5638a03d576ccdaf97a1bd34dd373fb9f97ed7872c4ac0ac0ac1601601795795621660b305982c51ebbb0582e61090ac5c507382e2ae32cee58bcac2f3cd44dcadba57656c2dcadd32f6e2ede89faefac66040d58aea5861eb3b68f6bddd236a7ea453fb853fa468fc79cacaf591cb8457057057042e105c36ac8d591a9e3079ebd380595730b321aa9c6320be47679354e7063393743f9cf7d48c621b5f99638ac10f5ddb33a740de1eedcfee147a4683d11746932809b2076893acf57a182cab9accb1171da947945eec1b335c0ea9f57ff00a05f50f018ddafc161f45db336d07949177ae7f7563e51a09f2c6e01b9dab3b5660b305339051f5df2751eaf532ac0a38aa6ed5f9462f6e0d63b16e8939cba63e6f45c1a9f2972731a9bcbea97009cfc5336d12775bdd4e99a13b9bf0d786929b8e66330d12757f6f5e9bb57b8e02438c4c710de2b507b4ac6e1ce7d31bc3439d210c2c0e11ba5770c471fe7e9b9f7b36d137773732e2efa1fdb8ad5c50b88567723892fe4e0e41e81f53154bdabdc310e714d7488e672c81655810a9b9b744a7060e68452bd3638e34eab88292adcf6807e939d822ec6ec116f266da2ab7fa18a07120b5660b3859d638a937bb141c83963e80c5c63803443e52b15cdae96524b5a0697726d38c22d1505676c6c92adce47172c3e9b9f82c71bb0b8eccdb4556feb62b9959106e2442b84b84108c2906064df4e2b320ed24aa7660d5234a63b3b79b14d20c8c186ac333869a9e6f78726fd47baf02f3b308c33b5670b3acc5546245dcd62b158ac562b158df9900e726c2b0001e90702c76617cbbc9bfa00a0f58dcd19a468e57398b396a9702fd500c5e341e48f99e9edc102b1fa2fe42e03439318dc32b5602fa84fb9b8613771342c39ac160b04460a36e2e02e76c7a145a25de4dfd2c56654bce41a65efe97285b959a24e865ef6e0e016087af26da9c99b68a94e4571db95cec5c98bf22e373945d773b63d007368c344bbc9bfa9463cc34cfded1f881b99e98fcc6fa87f268e5711881c8fd0936b86872fd4800d438ae3c88cb2159deb3125e9da23dbf22e373945d773ba4f4b7af15982ceb3a3cd4bbfa945b0d355be87ed18cad91c1ac83b79ff00914b2641812744810fa1274dc343b6d2377a3a23dbf2822bf0e519c1d9c2e2845e48fe9f90161762b30479fab4650d357db1a30c64554e5176e2eb44e79349d9bf424d904343b50dde8e866a7ee399b9c797f459d662b1fa1487f9069a81fc2de9bff227186e629b20808c5fd2cd6ee4ff005e4d904343b6d2377a285f1eda5dbe383b32c515fd0fd384e120d32f38e3e9d586289c8e7cb239376d5321b7ad26c821a0ea1bbd1d0cd3f976e77b8a1d050f5b0d0378ce2dd0ed99c86b7f71dd2ce9d52f4b76f5a4d904341d4377a76de87e5dbe8fe87ea533b33348ebd6eee3b68fa753f666deb49b21a5db691bbd1f47f2edcfd8c1523b07e93ded67baeda3e9d47667af26c86976da46ee4ef47f2edfecc472c834e3fcdadddc76ccdb5b36f5a4d90d2edbe80ddff44f259c20ec6e2e0b3ac796759907f3158c0bf5ac5fad62655b1ef92aa362328ce2505670b10b1bb10b300b1c5eed99b6b67af26c86976df44fd17ed67c719a1b400168b959d67c74b1491b256dad47fa2a8b12363aceb72110d75851b1d67db400b4b851ae146add6e16859f67454b1bd914cdb469450d5e50b205902c81640b2847adfb376d47667af26c86976dff0009fb59dec2d1f92a518d6d438b29fc36f7193c483fc6b0fe37c47166a7b07e3adbf934c92ae57c2d7fee55a5c28fc3b3863bc413412c21e16216216216608c9821cd390db51d99ebc9b21a5db7fc27ed677b0b47e4a93dfd5fb5f0d77bc49ed2c3f8daf8b8f4760fc75b7f26a3e342f92673cd3cada882d0a3149582922591ab84c5c18d70d8b2b5380c89e812502353fa5bb7ad26c86976dff09fb59dec2d1f92a4f7f57ed7c35def127b4b0fe369a5cf3d045c08edbf934fe8a2687c363551a69ed0a41594d48f3aa79834038a11a0d0b2059179826bef9761b7ad25c34bb6ff0084fdacef6168fc9527bfabf6be1aef7893da587f1b4f2e4b7d5b7f2683a47be39042a79b8a2c9abfd5d2db717e9eb2e2f684ea96354954e72dcb58b295e659d6376542e937f5e4b9ba5dff000dfb59dec2d3385a346eff0036a41753f8681e27893dad87f1b5f2f06dbdd5b7f269d1ca1f6372b4ed8617d9be1a0789e24f6dc79f2f1a6953b3b564954595660b38588bb0c564c135d8e8de4f5e4b9ba5db7fc27ed677b0c8c2bc44031967d6c7590f92316cd60ab9ec3f8db63e4aca978d416dfc9dd6cca60b5a9aa62aa89ad8a065b158daba93b78676f1077e4edd36cb05902c1c107ac516e29a6e79c0347d09374dd2eff86462b22c8b22c302e323d61cb220d5916459164595005a5c647acab22c8b22c8a33910902c6fc022cc135cb6793802e24877d093a9374bbfed730b394255c4081581cef2012e26f05077acfea434bb6ffba16776bc4841fea3fa90d2edbfffc4002711000201040202020203010100000000000001020310111220312130041332404142502260ffda0008010211013f01ff00d7e3fd87fe6c85fa6a9e4548fa892c3f7e31fa6973447aba48a91f560513557c18bcbd3831c22b9c3b15d121ab288d71484b8256c0d5a575ca231de1d73a4acde04c56a91b2e87c10b82e12b4ae8c1a9a98b478222bc7382f0367e462f35e2cba1db5343512e0b84ad2e11bb4342960def0eccf8e515922bc0d7f22f2f3c304960cb32c42e7b1b1f61b64769708f5c7546b74f06ef943c0a48d9194651b2328d91379118b2a87d88fb11f62363646e88f93546a8489337439678458e64259e0fae48d4d0c0c5237645b918251c1b336b2bcef93666c64a7e119b22a8c4f8646ca6f83e485777a51304d1258b215993ba462f1a8b0276435925487168464d8843289d321942bbe6aeed0ec899328a975664ef1b3bc6a6083c8af286492d58ca71cb178351d3318b60d727d6cfa98e9b35775d5ddb383ed91f748fb64ccb775664ee8cdd221488ac719c722a6461812144c0e26a280a37c22495e36cf06848840a3f1949647f116b925142bd45c92c94e9d97342f54af11993236cd99913232235703aef07d841e451354574af81459f5c8a54f1ea5eb975788c644768c727d4cfaa42a523e991f4b22b5918304e9ec7d02f8e2f8e90a9a4617ae3eb975788c64092305042c1e0954c1096559fe67f1fa3922fcfae52bc468d08c7060c084cc98c91c246e8724e629233c9ddd448fb90aaa15b23a981cdb2927e9c9298f375e9f26b23ea91ae189b14c5313bbbce78253cda0b2c5d5a5d10a6a4469a463d0d8e5c559bc0a593383ec427914726968982a7e5c1498a629a339bd67e6f4617acfc10a8d329cb3e9a8f8e48b324994bb267f25320363ec5e0dd137ff42e50bd65e6d1596423ac44ed5676a15302f3e8a82be6d1ec648a5d93b533ed513ef36f191d491b3b290a627c217ad6a7f91292d48bf0567843b45e1946595e8a82e30ec648a7d93b5327d88febc9314c52b46f5afb329b6de0adf8f0f8cfc7a2a762e30ec6484ccda99310e5e3d098a64257abd70a1d95fae1f1bd153be5178371f0a44fbf460c1ab30c8783646c8a8d31ab60a1d9f23ae1f1bbf454efd919607e88747f6e38b544619ab28c59f2387c6efd153bfd58747f6e2bcf8b2499a23546544ab2cf0f8cbd153b17ea43a31e78a781bc909607325518e4f823e3c7c7a2a0bf522d246c8d91b23646c8d91b23646c893cae308f929f85e89f62ff0007060c8aab442be452c99e32ef87ffc40029110002010303040105010101000000000000010203101104122013213031411422324251405005ffda0008010111013f015ff31ffcd90bc527dcddd88b32c9333f699639332ccb32cdef06599ca32c52ec65927dcdcccb1332c5ebc9210bc33f765667eb7f815d18c2e0ecfd0bd5a9faf2485e29fbe3fadfe0564ed9cc444961707e8f8b52f2485ce53c1d53ac673def8edc307c11b61e2df02f64df076c76bc7df8a4c5eb9326fbf08317873c1b37c4524ef1b60c73cf0a84794c7c2247c8de0ad5f2cdcc8d5944a1577ab46efc0af51f723caa3e54df37657d4cf11e1a47ded1bbb64cf156649f723caa3ef6f5c20fc9aa965918ee6358b6915a377cb0605697a1a7923c65e86fb8b8a641f89fa2741b234b03a0468e0a1151b46ef9266456c0e088f0c93ee38336b3060c336b141908e2e85136336b36bba8b351274d9d6933a923a8ca0c50628b5c1a1446b8215d911929b47559d4641e4c1b0924ad1698a28c2e30be0da8c2306a65f719324e2bda34b35bb0c5e892e182289ae085793223277a77ab23241917ca1c3709daa69a4e593a515ec74e04bb214b0ca5ae7e990aaa68688c0d88afaa71669f53bc9f05c244464ef4fdda6f0897730221213e30bc842b32a6954bd152974c9cf263b66d46bba6ca351545920f256a9b625496e7962a92f5129d4a9fb119655b26e3a88eaa15443688daa5e1eed2369b4da8488f0443862eda46a3598ec894db5976fd2fa6aae9bc9f5314f257d4ef1433ec5130464750750dc64c9932c8daa18c9d2628e043462f2a9815614f841f294b69aad567b23bc9957f96fd2eff00017de8853511233e28da445090d1046d43a68e90e90e88b4e7449a68de6f6516db15dc91d589aad4fc21bc8bec449e5d97e177f8229cb6b31e3446d320409fb21ead2960eac4eb44ebc4fa947d4a2a4d4a16446a60ebb3ea18f51237c999f9272dcca6b2c9cb2eff00a5e7f8ab5296616463c31b4c8112ae0a7343923512bc219251c5bf41f0c99b54ed1b41e06be55e5f8abd4fe11839108ed8db267c0a246d2232c1d62551c8cb3733378cb03cb15390a0f60e263954fc2cbd90d3392ec7d0487a09a2a7678b45658a9648c12258f0e08c0da46d3f5e0c114853823af137a921c4701c0daeede16453ddd99b4d3d1deca74d45182b4b112a3ccad4566634e239333e04b2460256567e8c11a4d92a2e2469e4e8487068f427910dda97abe0da3a63815fb76b297f4d1456322b6baae2381db431cc89d25245486d7e1a48c5d3b64f9212c152a6e452f67c15890addcdac84711e58355f95f42fedb4e5b6392bd4ea48947bf612cb345436f7b6a29e46bc14b8277f9b36537dc53582a8a96e3e9b06dee45533753253cf3d4fe57ffcf623509f4fb14a949c89c1ac9a2a7ba4258b496515a387e0a5c15fe6cc4264d909e10ea367cf859aa57d03ee2b284515a11dbdcd2c56786a577f051b218aff003c6446cbc393510cc6fa27f791bd7f469fd8afaa5e0a565657dbc642f24bba1d09ff000e8cff0086922e2f2c83ec66da87d8d3fb15f55ebc14ecacbc0fc2cf8e3b96716d3cbe1994651a89ac1a615f55cd14ecacbfc2cf8e33db1fbcf689cea4258c9f5133af37f2525292ee69e0d08cdb54fc14f82ff0be4e39f6462a2b08d45273c605a57f253d3c4a7452146c8f8350fbf829f05fe1660c183060c183060a7da5dc58662c8a93c22a777e0a7e8575fec5268556446a8ea0de4d83a6358e2887ae1fffc4003b100001020304070603080301010100000001000203112110122031043032415171722240526191b11381c1334250606273d1f02382a114e163ffda0008010000063f02fcb27f2d1fcb47f2d1eeadba64b69bea8418e6b2511b008ecf14e88e736eb44cd5171355f121b85dcaa508915c2ece5441cd39a6c46b9b27098aa7c2886ad50d90cc8ba8b36faa9ba15f1e55477386e45f09c240caaa1c17385f899556d37d56d37d53a2bdcdbadcea84382d9bb7953f8ace5797c1d21b75c835a26f3b95e2e6c3f2255e8a2f3388578225a6a9b11ae6dd754554e41dc885f0e2b6e3d3884d8ac70baeca6531d19c244ee4dba64a779beab6bb579021cdaf9a2f84e1206552b69beab69bea9b0a33aa6b44ff0082e126f14e8af736eb73aa6939f793dd5a8725023794bd14689e2749691d051507ceaa27948a62d1ff006dbecb49e6568dd43dd127208982fbd2cd33496095ea3944ebfa2d1223cc9adcd0870e2cdc72174a74479935b9a8b0e1c59b88a0ba543f13c5e28e8a277c7a2f8b2ed43f6513487d6e65cd32f824bb705e263c28d00fdd28a81d28c0f883e28fba9d140ff243139f108719c9406fe8083bc2f508a1c94666ebd34ce909ec8d12e92f9e455f84ebcdcb24191a25d7113c8a11613af3437827bbc4f5199c5854a6b68aa1523dd8f756a1c935fe17285e755a47414d1fa9436ee63028cd1bd857272d1ff6dbecb49e6568dd43dd44e929eddc5889e0e0544ebfa2d1c792821a243ff8a3f4a6ba559a85d211fdd77d547e95199be60a851770a150e10805c5a25b4a2462cbb791503a539c373c2238a6c31bdcb800a30f29a87cd0e4a146f10ba533a428a48a8c91eb2a083e01ee5121b5507ceaa950a2c3f0995be6a4731dd4f756af92278c20e50d9c2e33fe851fa0ad1e1f17fd54777e82a13bc4c0a2c3f0b968ff00b6df65a4f32b46ea1eea27495fe8545f97ba89d7f45a37f77a83fddca3f4a675285d211fdd77d547e950e29d8751c9d0dd56b82768d13e46c2a074a312eca15e06f28910fdd6a803f54d4570ce9ee9c3c6d52fd487245e2b764f099d2147e4bfdca83d03dca03cd436f858131c7399f751dbc4cfeb801eea7bab57c9429f985a337c51dab48e82a00e15513ce4141f2a2d21bfaa6b47fdb6fb2d27995a3750f7513a4aff0042a2fcbdd44ebfa2d1ff00bbd41feee51fa533a942e908feebbeaa3f4a97a2ff00c9176d9b3c97c568ff00243af30a7bf7a2a074a22246682376f5f06102d84339ef54ca1b4ff09adf13d403fa028cce0f2be49ad7786e14d6f00a3f247aca83d03dca830b8b80519dc185446f07a63bc4d1de4f756f35f24f6f85eb4167eb9ffd0b48e829eef0b15d88c6bc70215d86c0d1c0053f13015a3fedb7d9693ccad1ba87ba89d251e829fe64289d7f45a3ff0077a83fddca3f4a675285d211fdd77d547e941f0a235acf3284df388d93a6991064f1351e08d99d11503a5460e131ff00c52024b4888a5121b5f2f109a0d63435a370517ce457c94683fec2c8fc91eb2a0f40f72a17919a2d70041dc51f870dac9f844968f1398ef2ed7d54d4a54526952729a6af928ece201500784b07fd5a474151dfc480a0c380fba48aa8cd8efbc5b29280fe6168ff00b6df65162c32c01cee2b45f8e41bcf129734e6f1124f739e1cf7529b94283bdce9a89d7f45a3a83fddca3f4a1e454170f08474998f8732ef5517f55022cdec726458227491aa870bc2d92d2220ca651503a546feee4e3e49eef13d0870625d17544f8afbce0e50dfe262f9284773bb26c8dc91eb2a1fed8f729eef0b530c275d7172f851e25e177241de17a6441a40179a0a8ba388b230e75f9a111d1af4cca89aeffd02a26a231ce9dda7743af038620a5f0e365c07f2be23c38b6eca8bff004c8ddbe0f9a8b0dac8b37348a80be1bdb10b8ba740991181c1a04aaa2ba20716b87dd4d6436c40e0e9f682850cb22cdad00d07f2bece37a0fe568cf635e04274ccc725f671bd07f2bfc501c5dfa93b48d233dc139911af24ba7d90a0ba1870bbe24c8af04b5bc14484d6459b84aa0291de8c288d2e827829cdfcaea14b905a8c586270ce6176afb4f09230b456ba67ef1522eaef45a14384e6459b44a80289159301dc5669909cc8a5c339009f19b3ba729a8bf103c874b6543f86d782d9ed295c8d9701fcabc330509c38b3e43f94e5f0e2362137a7d909912187001b2ed28a6235e4be52ba1416c30f01b9de4c8ce9c8672512086459bb2980a1c32c8b36b40c87f2a3e90e6beec49ca59e69b0e1b62021d3ed04c69645a09643f9519e32719f7496bc9b45b55b216416c8f45b0df45b0df4546855685b0df45b0df45b2df45b0df45b0df454166c37d16c8f455685b0df454555b0df4b2aa8c1e8a94e4ab665ac0b642d90aa02d91e8b647a2d91e8b647a26890540077476b8e018a5c7b9c9aaa75140b656e596bbe5ab9059ea0a76b80c66d07149535532a5bb533dca982942a473d63b5475675c6c251b0a28e0970c12b0773014862bdbc603a87ea80d54b5c54d4ec28a28a28a2b92e780eb25a92fd4385a750e9efc19acf0b75475d252c0437345d39a28a2884e1c57240daeb4ea2689d48d43ad3a872a1550a404b1cf86a4d875d2405b7db9855cb821778d86c08f9a2db5d69b6ab259acecf2d4f6953506d3a876398b0af2b66a58ceb4944d9d914e2aebc48a2af37d112eced9d8d281d4cf5d79d826e380eb1da89a230cf080a811a6bca0d39846d360b795b4c014f5e3057216e6880abdd668badae2cac3ac0304db9852039a958e53c05145aaaa56de765dc04d76625d2aba42ed44253812bb2f92db256f2a4c1459e01dc8b78eaceb0ea1d8c3ac1686d92b2bad901353a05572ece6aa02c94829a9052d5ceda2bddc4eb3354b28176aca3548a33530a4e0a8a6a52555b4a450d467664b2b28b2592caca9b0529666b359e090428b2596a648855b25dc4e19cedcd67867656ccd0baaab3b2988623ae0d5425666cdebb2e575f64dad05179cf04c6a242dbda93a83ab18eb9e018c774271c8e62cf2387c8e2e08eb0ea08c0718e78ab86b9e3188eba5bd6d2ceda1b1d655760cc7052737048d945536491bb55236cf5075871fcd0c134786296fc4314f5d92c95e026a72960270542ad429b4aaa9e1771b6a5668ea0e3388e22860bb8e6b3c235dc4a99c7d872ed05b4a955339639b72c77a79d9c02ad564a4722a58dda82dc2ec4e42d9055d68c43559ea252995238061bc32364b04b7a9badecb554a9e3a15b4b68ada2b696d5950a6309d502b2d48c03594533aae0d5922ec030c9494d711649824a673b380b7359aa1ef46d3a992180623af90cd5e7d9738a95a50e58eef0552b2b2eb14cd4e0a9b32ee63191827a9db59aad83ba4866a6eced73f86028611cecbe152cf254b3cb0d7b9838a966456c95929495757243b9c866a673b4a9f1c0e4308e76907253765648299ef7395aeb062a159ea8118e5acbeecf012a470390c239db3e0a6a43bd9c27b864b2592caccf04b5341666a6ec12dc311430b79da516d933de8d845a7519acd67dc735c564b2b33c1252c1e6711430b39e00e1df0d86d76af359acf0e5a9a6b4375006160fc05dcd1b5ddcc7719e09aa6268c5cb011df5d81dabceca621dc460c94c29e168c4e3654aba28100c9972977c2859c513ae9611dc4609e0ced389cb2905377694eedd08c91ef9f2b2a7b84edc964abdd48529cecabaccd51ca673c257666576cc870532b39a2d68efa3f069055a945b82eb4e228610de2b30bb145da24f7f6f70a0c625af9d979b9d9e4a98c0c4d0a739f7ccd67664b24296e5acada308d7018262857687cd09632711364c77bc964b2b460369d49b0611dd3e58a480c27f031809b4e2369b0611ae2713715ec574619779c9502dcb35b4aa7114700b0e11832d7bb130e208d97459e6af3b0cff0005380631dcc8c53c2d165d4d4e3613c31cbf0818c7793866bcd171571c9c11fc44779189c353d9a1553a89fe123bd0c254bf1a1f803bf1a1de88c4ff00ca80e277e55d92b65cb65c83434d54b68f92bc06a27f912012c6ec0dca381c54902e68314e64abaf6070f35d9fb37d42864b1a73dde6a60765ed9a692c69ed1dca2802429ecbecdbe8becdbe8806097646484da1d177b8a939ad7842efd93f25961cbf22c0e80a3f35a38fd63dd4470cc34951da49966a11fd6a1f33eea1c5f01926f51517e5ed63eee951448f8cad1fe3c42f3785499a8c5bb570c94663de03653a950be1c563dc1df74ceccd66b3b322a7f912074051f9ad1ff71beea374151ba4287d7f450f99f75161ef2da26f51517e5ed644ff0003cccf04d8a048b0a6446e4e0aeba7f05d5695bcfcd64b656cad95904682dcd67f90747e80a3f35a3fee37dd46e82a374850fafe8a1f33eeb4987bd8eff924f87c221928bf2f6b0f2511a7228e8914f65c7b27cd187f7b369f3460be8e66296fb266cc950d95fc7b47e80a3f35a3fee37dd46e82a374850fafe8a1f33eea3b37441f4b22fcbdac7ff9dc2bc51152810c225f794ddf68da3943d25b93f3b7354aaa5156cdab2b8a5f8de8fd0147ea5a39ff00f46fba8ad1996951cee905087eb50f99f74e89e1703645f97b58eff1bf3e0982236530730a281baaa31fbb20a10fd6a5f01de8a8d2792ed3089f15f64ff4556ad8c3d95e780fe3703a02ab47a2805a00333920411f106d3513468cca021fd9c3c8f150fe7eea3ff77284ede05d2a2fcbdad8715b9b5a0abf0dc0f11c11bad6436e66544d10eb0d991e36691febf55a1f33f44ee48e0a155b27827f8de76cda64576e239dcca92ceccd6766764da482bb711cee66dceccf1d14bf2d53f3b7ffc4002b1000020102040504030101010000000000000111213110204151306171a1f0408191b1c1d1e1f15060ffda0008010000013f21b5ff009a36bff346d7fc08ff009eb86ed7fc47ff0059d8f48d4a86264d55e5fd0ae32952a8870af942826f4502589ef24d4bb34e8112102e93af888f638548dc7ccb6751a57ca9ae725554c3ab67f971d223cbf4a88188cea2b39c492a9b46c683fc5fe8ff0017fa22642608c750d576ff0043528bdf33f42eb2d36e481125db37d90bd276e69427b68c8ba515209e2a21062eb4606d451486a2a39aa1a5436414098a680ca498d6ae64f1599b4bc9420df2820094954fe8ace5742be33fc9fe8ff27fa13b205069a0dd9856495c86809823631aa5ae57d02e0bb1e93bb3b31152bf713f92176e8f8afe9e0f63a8dc7722daa3f9b6ca46efdd245ce3ecf25b0f17b9e0f609b28962a2a58869af665634d2d5f92787c845a936d1315367e70fc106252d13043d39404d7a11d2a27ef36ec3deaeac54d5d0ee9569a7cd4684d7344a7bb5f8fb10cbda6cabb20ce3e5d31854cebe1c1dea3b58afea0d2be3714594427b889537a8240a35275839453f6868e767e8ecc396d297a3afe4f29b130854535216c8bc3154957dca2d00a6a7b2e440ec54c9554ee4d3a9f092fe9bc0a2eb03312a49d898a5752cb862e2ae0bb5e93bb3b310869fc3a7e8aeaf37f77fa83c1ec45b861c4a207ec8be0a4f82a88f92d878bdcf07b0f11b0f90abecd087da47d7e4f0f9054c2cff0022adc3f23bd8923562dfc9e2b6c12eee6c3bd88a1a99f95361683f2a3f030aacdc6d63bf5f676b1a8436d7614fec8d313a1aeb61baf70ce5576dcfe0e8164766214546f517fbd8f29b128e4d5b5cf11b214c4a73029f2b154836a8fe6d927692849fabf0704617a83538b0b81d896bd277659f362904bf78493fc1055a91f01e1f635f694754447946a0f824ed43f8273d9f894792d878bdcf07b0f11b17fc2c771f51e1f21db0f3751decf33a9e2b6c12eee3f54fd29ff18905477f4b32cf5b67ef877ebeced65e9facee92562d2cc7efa13dda3f1afe063c682f809bba6af943a3b3f01a53b21ac6a397f8cf29b1e07265df0a2c0a47bd0a77651fb21bbc0fc8d2493e5190db1be2ae07625af49dd967cd85295426fcbfc115fe8a7fe1e0f629c51dfc1364226afdc251aa3f8367363b95fc9e4b61e2f73c9ec3c46c799d0ef7eb3c3e43b51e6ea3bd9e6753c56d825ddc429ef2db731a191a9d767b1a0ae11ee220daca0efd7d9dacb9a0d6bf042d3652d7757e868854176fc8873417b4325172e07f0507884be59e7ec563aafafea06bcba133ba7d33c06cb029a88be4190dde07582aaeb7ca47804aac9a9ccb7e93b32d7a5cb3e6c49ef53e522f3b2378753c1ec6d6b3e5b5fd2bc066a91d043a44447fb0bf0792d878bdcf27b0f11b0b3c8fb9112763dcf0f90ed479ba8ef6799d4f15b6097771bb2b694abe9116b105913150c1f312d926f64d3b33bf5f676b2ad42dec2389364513d927d5b7f81392aa49302cb40442472045f748f3f62faf6fa9fe30ee9f4cf01b2c0a6f24cf826ca60d9a2531022aba19112e92766bf393ef2dfa4ed8b7c792880b6cdc34672774e5e15be915a609bf847fd2b0ff0061f93c1ec41b11f69fd8d02e9c12ad6971976f04a979fc1f317b7f4f25b073e13535c7c0e075554d93f63155dc24a64b1441491de5725fef63c3e43b7fc9e6ea3bd8c6f9a38e9953eaa8c67a8fd6adca9dc901d517bcc54954d393afec4037a7828e75ea56e96a67bb175c464fdff877a8ed6783a044a294c4dba91d125fd1cb63b6a15e5ff0703a94da56836b20f86ff679fb1383867c9fd8c3cee4cf11b21a1e06c9b7e657f47d38f98d21ff0009116343257a339413fb420c4a556928bc4f1e61c405da5a396cdfe0a155489a63964eeed9fa4eb12d8b8bb5170da68e84686349141092a40b85b8b532824f70674b5f286dfb6d58a3f42c2d65c097ee3133076a6b4e7c846a0a2549d258d3845089b994ca945444443e634be3a82528c09293d834bad95e58046a0ed6925f42be2de87e8887cb03565bb152ea1c12d7932bac86aeb31128fa381f6255a921bc9256a5d3f435d69fb829d3b745f9ea58c774e09ef324fe8a21986a885c914053ac0d7c064a2ece07d9247f4d562ecb325ec2da055cee2f1542497a850582d504ed3bbe64db7ca0951c6cf91bcd411e164484cd2d558030bacd2921ad39894b574893996f47cc6966c07113bbe6391a3a094cc6cc5fceaa2eb342d914a502539dc78bb6c412940702529142655a89d617812886b47cc9a2d6d1b412034c24f362e0cf0a6e916c5c468915ee892048d40a884c7604fa9fe40cbc7c45693a1fe030436941f2436965eed60858029fe23085805d318255519acb0f9ac20821125b2109089ad995a48a12a28489b3281e6e5b0db454bc84ddc24888390212d1147721344556490e26c28d90a36424a2c8e42216c7210ac8842fe2894e57c05d975595c6b1a3c8ba1d8d170fdc5c069b6c8b62e24984851e2115122f5135613a85a31699ade88d1296e0d406319c012cca89cc6d68ea38663e449cd28486111824a8b3d4fcb323234264a62d664ca22fae7794254dcb1c686a515aa2b5e85a435bc8572c337152687488d293df2683c4a4a8f08f3647d070241333741b3a8a411704114810b680f8b84162aa22cf71cb85362665e1af518aaa733c43728c017126da2441b32a37b00eb93f65971b54369c5ea35ceea163423abc1a8acc421ae0e9902859ddbab1211612caa722c9152db815f05d0ea0c55a3522c8c88d8343ac15c39e6c426da952c6a17b892f2bc895140d86996e20dcd02c7a4317b70b81224c5715b33b13c9ec2666a596e53ce6358accec4b20a4a3c2606f4352d02649c34143c6d0b2b73f62a9582b87141a9422d44be310289a5fb159149d56e3a71b3b2c1a04b0cf40b52b9463957531b7e7c05b59db866562ceff00370abb0a9f5861560625704d401337542458a13724dd3c65218aa545092cb303537246fb60ae1b44b61a1d984686287a0eb5cbe492dbde14e50e8815fd0b12dd650c292234dd0d3058eae295f9e2e0d8951409a529c8881d658ca2d8158ac92c9e12144d98ce4a18697f3c5dc42ccec3c6be4f90024e6489e8316953609b1be4352c2c4f95f2b54b712111da96b86d0a4f798824aa9b8495443babb51c58147a3c244b9ac30dbd7d4fc0b7b0a542dfb603c92cb30a8ef8ef6af05f34726782a9a92f7c232ac883a5a21158b0464b5b0eabcdb18139e434b9df24b33b14f008018898a93499465050393a859642222abd184b8520c432c53a6398c5b8a42265d550df0905d35c1ba7b0b812ec0ec144c81e5712d6a1dd4dce171ac2645ea63d36c45df1625522924d31124dc90b27668f73901f3325cdce9934a0b3ac373e0ba131e2951220852084a8b2dc311b21139eb4c25c2696303d68885875a2879bde846a9b14ac1334b51681662a41210736087874ad6c412b52027728c6eda61e9c5a4c94d4ef2017711c876c9d47698d18f138228abef06d50413052c6e4e686ac9167887c175469a82c2ff410b376786b855ed113cc6a4a1460e4a04a141a67146a51a3c0f73b1c4f21645421baa24db63584c284ee27770190b680dd04ed4721025a58c26e320a7741dd28a9c0bd8ddccacac8d4cd7256e43726169ea5acfd29824ab4248ebaccc4f0bdd059fb1c3582c6714db5631da6a0992c569e58922b714aaf09ee346b22b80a0ec3213d12208617324f40c4daa628251d06f7348b25dc8ea85236487638aec4b62b71ec5aa10ad3443408e92282c180f4072b88cc577136cc689034ac08dea33aa0b6534345d04eb21b082783b8860d858ea5381e5c9c6944094adb3c17b8f81232da29a2359db166771177a6059bb3c93a54c41d514763a18235215776de3104922a891585b083a98910b4d3a0b04f71125bcc14a92f62604a63994ae10db276d892b8684134cab22cb48892a3f716f443a3f936fb87a3b9312810f726513602a4636a540f4a352bd9a8aad8a5e86a2508439ba0599df05f7215859bb5c924b8d4e341031e1f98ea17645cb07794872ce82408b7376d9cd62859164ea26d4b3218b51edb0859e4162ec4df258b45a8a9c3963bda08a56289a864e2f8165b8586b33258d92a4af84b049c255d8b163c371665567946c7207c84bd86d92b7e8ceedb0b3256582e0c8b05974296d40ea9a0d366626f5173cfcca5cf69839259194f391a5c38ab4131566ba1542a86ad4730c8e40fdb097b0226c3c20a40b2af1612cccd0c4b3e584b0594614d796d0d2322dec341f461184110e55c892b3376d8599295eecf250b51b66829af90dd708a62c85065a0db40af99cd4578cb96324eb8c085dcdc6743159f8221a0ea314345b0919427082ddab151db552c004fb04598978b0eb3470adb0d60ee28683a3665b270223b90598942fb884d254593b6cab2c6670d244c6c2a81ac8282cad26a18ea589ec2458afb89f608d55ec23bc6d1214617c54ad35240fe91d489412c06c76615275ac74815ad1062f1aeac4f7d9984202c29bac953a12bb0d63423329760f38ed3598de672ca33dcf8c256e4adc61412531232be993b6c7660eecea052c2751e25c4b17410c57662582c884aa91e113236290a707932e6a53440be50d2643526813c2954e06ab40f797d88494226d4cbe43d28569236d4278cc0dd452b0f3509b925cc1922285984bdc2747510a8e1e470f0962906a560862fa8f66d8ed38eb84486eceb64776479890e5114c2c3b7c9d9655d9960597ac952596255a119d04b3557d8323d9718fb374c6e313e2caa7b585e4b4653a163048e44a9d48be6422abaec5dd873fc1dc407ac1abcc2728ab182d64245a7055656b1ed348b269347152c3e9aacd4c125adc4392b60b0ec722b0a082e359121cff12122835b4b710fb38339119d4954afa0c9a856932d268ec3023dc5aa3c15652ab1f2445dc67208941526448b8ccb1487e156c568126ed63849e34a5992b23a86d8f6952650a1b3e0de65a208950df1e4d60f0544c5c4a97c2f54560961c8b297f8f315888bbba8965e84f9b1dec56a3a897d0462521d71040b8c358a12504ce488bd2965ab82bb8aaeb02aad84e7c13429143b3c1e1f04a081d46b05c190ea2231db08b0b0583a39205f119452da0a4d68960861b813dc64ed8ecf23c0ad5d0444c4f742c2f81d144b620dd149c95cae42503703e21217a03b6f995b74212a0921976ad44ae85812278ad8688b430dba22d304a6825e588b609f61a46d31a80ac366418ed20470cf5e29ea4410d0db1b2689587a343227c434e66acc20d6e2e8843749c19cce9998d490910bd07ac92ac87eec1db0aad2f4d08097545918993929ba11aed108a22da3604454164374099096c2c2734351656ae7bbb11b8356503aee0891729098b53f305242e1dd543110831391491a2c21a04a995c10dd8897a2f49e9e0b7b8c1db03a0d5160a558a751b2d91016a64584870e614e9906837d0924e85ea3760952ab907671e9a1dcc08eb52309413512909612bbbb1785a99cae66963b8cbe7daa2ad025e394c9ad5c8d329488b0efb1b6e324c2b22a2b130b7f05209771ce11a511698052230741646eb8f7a0f785b864f2bb0895a94b13708423b09666316f41732434c670a5324095029dc48f40b058b1686c1e11ba10ceeb0249b3168a43ca3cada4a4d086516cd15c068f41eb4426a5171335251588df71662d3bd06d5667ab2d399d7a0598cc4a95ae2d491126de8e5644843c2f358f7a365e4508924924809c85bc2dcc32dd284056ee59f43989c30586843c22c5bd9b4934c9a207293955737bcc428989123d518dbdd312b6730fd23160cc1ac89034b49494b7051d06e77812208208208610460adaa08c1365dc593be3da91e41633f024a6c296a2d695ec5a1486ebe495b950d90ad91d1363c2f52708175ed87a89f662f9e0557f3f46da551b6455d5e32c944838235743aa8c4471a5241d5168278190c430ec1a84087c475c2ab128ca2544f0a4121451222de3ca4a2cc34259424ca8c2591ac27527149bc9229dcb0276853bb245276e43c9a4f71617a1407d08814cb8c359349a90471a486e2ea082d058243714d914c8788123273a4009224855779a122476261d218d14dab12d2af7cae06aaef951a5510adc48a52f51225e09169e81636886d5316c2c9c592f8942e1c60d37244944b2352205564441b011090b38996a22864e4a45497783cd5888e62b8e59650b0db2e9eb99c1fdc4851962d8594993691947a362528582584b1b47100eb91d189044a8863944b235b0d93b6411c69448e035a2c3b7308ba318454c5c4421ab012b2700a081182588988730ca7ade7dab594f06c69c10fa92990257a0707512c822cc0494201ec22debc0b4121a2115b2108699004b0316900442c42b215b057702bc8fc48501321a795659746a194c6331e5404eb82c8d0c2a538d4b41114f464856c516e0ac9417188d52ab1dbe92351e2160d11a06c92b889162d3d179dd36650edd656e1992cda5870aac4312d35c89532ac8314c22533d0ebe0ae598a2d14021a242984a5a49ac4914c682c15b0788ae1608a0d186585c2f8f031dc7bc455949335d4e820b7a20a79c1646b37234391fb0b438ab1b411d704d0a85a9996385d0695e82e60ae598ace583416e2cb980af82cc0bd086b647a8f411680dcb100b821b0a834dc60e98823875b344a3632cc9c9842448f90bae47cb88da0a16649643436de82ee176422c165b0358b45832d66acd44c6cd3acb42a14914c06b1b86c4a2c4c4b7cd0470606cd985e5325522dd0d35056f576360741a55d5b28de4242eb9d7dff44dd90b0165b0682d2cc1978d59ae0c4ecb09504896e730a0da856e1411c5f53a20d950b6c1a5c392dc281016f3a557a6088b4596c1722d15b1b19ab15c582b309a98d983a0b38b03118b42b279952502c9cdc0b45e2d675167d13b3145a2c8cb068c056c536b08c5608ef8b24e815b8f04616a88950b23294bdf816f82892eb8e698b70b1580b232c0b62d1701654334823d140c4c2ef61658d2e1558ceb516fbf1eee170b1580b2da63cc160adc05616877f50d1d5e2dcaa5c0bebc3b39dd997bd1358ac059a5f0ac1721dc5c76849c8621a304b990d88d443622e44246e458936e39ca496d151e4240c3b293ddc8a05b873886e4a39c875d24626059ceeccb5fa16f162b017a0d493f44b44dba8d7614c2495a87710bb1767a5698e486c6be892250a71be4ee865226b68f50e316112b4dbf0301171cb5128b429721fe6cff003641fb3892c5658e77d52a4c3d90d36d5a69312538667a6e86db8e49d4398de0ac6652b9ee1abafa26b1580bfe1be1f6c2d0f2cccc1e133e06813255bd443d6a8767fa3ceee2155595d1ff00523c86e76bf5e0bddc2283b1571aa8aa48bc1f0de062068b49492216a25926bf8880a45b6c372c43ae109331a64b19de1d897f44d62b017fc37c3ed8fd1e2f66784dcf0f98f3bb8a2d2c7b955773c86e76bf5e12c4aef79908fe877e6882a73e3ed14686c0d16dec27503624a3086dba6016d04afd43e864b5194a2e9010de7b9391e185a7d1558ac05ff0df07b63f478bd99e1373c3e63ceee2517471d49f99236a2f626e576676bf5e1dc850150bc306d7f43a5093a209c56d443ccda8e58850954ab21ab5827b8239e21d2878bdbe82b71ac5602ff86f83db1fa3c5eccf09b9e1f31e77712fba05ee91fef0ed7ebc122e1ee5474d6a9d043947d44633bb6cc8891423bafe63765163b8501604b9836253812c52e8e45a1048ecc81c9c8b834a056f4a22c17fc37c1ec4882368809225125ec515a15ef2c65b872eccf3bb862bd7ba4213489a7299dafd78422e96d6237232c972bf82c5aa28f24ea5cea27d67fd196f3f4640894d5e454452bc649ca4ac83523db3de332a8fdc4fb32346c2659e0d2e436796f62143a60582acdbd05f98b017fc37c3ec3725b6f5614295648d8580239c9fe8ea5e59751bd4a9adc6aceffee127acbe84ece7e0143b5faf1d0815bd58ac80d73391a3640212751e158ee3565ce87721e0b71dc844faf841e886c1eac3416048d51c96ab932e784a1ef3d38b05ff000a2461759d65238ab342c84db3191a1850eb8d7561254ee73034994941cc63588543ab03ab02335791812ee89583751a2e0cce5434772b0553617104ae33e00b05ff006204ec312798cd509bac08637490e71439e4358350817a5a217fdc92b363dc2bae481a158b37c4d3e25a22dcc7ffda000c03000001110211000010ad5a550410ea041065046881579f57fc1f410bdfff00ff009f7ebf0c380fdf3c34da19a7c83d242242f690418414ff005f6a99c7104df7287b3fff007fcb443480004d0cb3c1fbe03004882bf38f0037563dc68549754548f4d67800dcf5de1aaaa95afd06bfff00f6bf2bf15008afcf3ef7fa34200abc02beec534278a08f687e512f202f0004107f5ffdbc54a49ca1053f870dd0a24016b20a6bf1310eabc60073d148d7767c09506b0c3c3ee341cdf78aa676ecd842cb08988a6bef28f85b8c271346ccf7e8bd83074dec90f3e7b553e8159887a10ed5992c71c1ff00c34f18b10ed7e8c1c383825526800f17cb0703157f3b9067bd183ebbea255938ad67ea3ea4405191beb30250b426a91cf315ec1003125ff7415ad3a592264e5f4fce167f4fd6807f97af325b84c0009ab39456387f802be575a238ff00cc296391030c915d88d804e084165c5a1a28af001548f998e9116f80d8b5ff0023ff00a9b9a14bf97ac9aa186c3d7c610419b9e324128400681300239b8999020fbf5d4eee012986bbb66a2d4a6b5cb49080d10a30756d0b4b1fe679c10e485f540a17562d657b34c8eb7ca37a05fefca2e0dc435a56d903e1cf43dd51adf4069a42fe3ebd59a6d5bb9d2ab97a78d8d7f1103df71608f92bf8fdb6874753c27032ac9627b3d99f62f59035199d0c7bcc817d90c2241a9d384a7053d45a49b5873ffc3b15657b01bcb5b3e56e11681cc43c1901a44bfc7df8852a6116a02877e7cf62c3aba167d7fbdfc976dee8a6d63873c00e38e5119288971c00ecff00ddbc194b89058455af42afd7d0bc8940b5c508b7a242f1f3b7ce9deb23acf0dfd2d6acd16d743dea2c4a5992c09000040f0376d17b9c59dcfc623cf8e6a4b1cd78a0c0d723c1291bd75fd122db4c1040962a2d365d6d06d36597d8780d6900d32b774a1f6afc3e44f10eb7035656351041063bc8367272ddbea3eee8adb742b5679355e6fa8b6bac4edf88f99fc9dd240508b117c9f95804db998e979b55074b8f49377753ab1b26580d0ddb1a23322ea285fcf2892e0a465196e44d57695570ff00ff00f88b4c722b4959da7c1ecda54f66565bcfbefbeaed2b1e4168287db89ca5b8c937fa148c03cfcbe405a163970df355b4395028041054cfe6f6fe376800498fe2938291f259f74d34fed7fa0bd73d8c3c40ab75410410415398886b80bfb8138af5814dcc6f4d3db1072a1ecbfb05eb45a2c30844a95fff004105406f5e84420f4aaeb400248484bd0ce3837e3061d44310fbcb75afdf67557fbe04153dff00be0b57fbecf3d39868c554f01f32fc0e88ebe37a1bb3adea8f40a175ff00f81f7d0d3228a54a2d080f7f7235d5abdf41f2f7a461420422e3a318e0fd584a57fbe07ff438e8a2903efbef00f6803002af3cff00cf40f14428dd1b96a29de2786007f7cf81f7d0c22285c4dbe83c03c03df40f41f130fd23c73ca0b4ff00515617514bc705003e041b09f944058b2c5df0003acb737e07cf3cf9ca05d6ca2c118576e784dff4c112d89e6d9192d645cf8e000014a820fdf7df3c0fcf3cf7d0c10714518350cde4a336082f81fdb5015bffc40020110101010003010100030101000000000001001110213120413051614050ffda0008010211013f10ff00c8cb2cb2cb7ff137fe33cb24b082fdb082c2c2c2c59677649641d59616593ef04ffc39c9e7cfef3fbf3bafc1c13ef0f18763fe2de0d8f3e7f79fd9e1e3c781d7e0bf797a8fe3cb72db787861b2fed9ba6fbdbf678de335b37ae0ceb9cce37be5fbdb6dcb43879381a90016db23d88d49e9e37e8ee1b7f64058166dae21617ae161ee393813e5b24e32d4e0b38198ec1871b28e8d92f1a1b61f19bc1816701bc3962c20bd4f03b8f9f30325df23393c16da1b100eed5ce0f701dc4619338dbd421e4f779c04a2f5cfa84da88b2cbc4f93ef035b0e05b670776700ba109e93bfee38d61d3938a7b6356a3161f067a8e45eb93dbc5901c185e28d753dbc0d80e9ce4d922ea4230e2f020cb2c9d16eb2e82d3d8770b2c82c821c821925b0751e45ae3df2701c320db490d2fde13b1ccf21b216b3884eac2ec8472690225d4090c986c038c2587ec27ed8fee43f642c1b0b484ec8092722ec70c7b75407c13e6781ae406c5908e481900edd810f251a4c292d579be431b595c851fd90ad45ec9d44bf2d075276c8b6f62d1e4bbdc790ecf1e7e1e3d5e2d383c02b84c1dc6254917cbe27ac4c8f92c8321c74b20fdb4f2178e2c6dfb2566a4e652e1760c83d417bbb13c79b2db793dbcf27ae0ef7b01d409c206f52751ef3f17a83858cdd2234ee71dc2742185bc154c2eeecbdf106121f607c217478d32865fe5c0292e3f65c8f525a7a597437fa47e886773e41df3f17ae565ab77857a2e9d61ea7c99ff655ee37b23e587387b0640401752908f38c9756c925d99c602d1c81f6edc8293017216362962dbbc6f2eb08cedb02f1c9c1ede436190449b2643c3cf8e0bc4e7b4688ce1210db06c641d32f1b63c85610fef0009f6484f92fc21bf2c1a9741d59b3ce7071de08e36f60cfe03cf3762f726cbe2358fe894734f8c68e433902c85e0481684b16496f2437a832d963e72ce467d64738e9325d8776bb0d5b0bcdd970f2874e182c0f2c65ea599efc87f3863de49044f0cb083ebf3b883386f5693a3be0619277920f24cb73bf70cd27fb68094101b77e1238dec9d4ce36ccb63a6de5d3b8a298135d48b787938410bd125cef623ce5ecb32deaee5f05bdb770f3780840fb0b0edb395db488b33b5b046380b6f795d58ff201e7d910773adfbbf07b83fb8544b09fda1183c5eeb012839310ea78275c6b027fd913a75c64ae27865d82253a5eca13bc27db0f50efb671b33b67a4bb087d8720eaea5b10881921eb1a924259f02de386c3516017616c0cb86b6dd708f278de4f9f7c338d4ace1eaf529e5b1d975900c64261298778dafadaca1042c77671e387c8f7c200b1b031e09cf3f64af7c269fc27ee11d5b33c1e2f7c5e1871bf7119eacc8fca97f740c4f91d71b9dc27ad9836c0326f7c1d5a6390fb0f0fbc9e2f520f52dbf6fddea58c1d49fb43c90f6eee4c7de0eaf1f889239fc313c3c68d9292d7e074cbb71bf437c9474c27e43455dc7f7dbfec06163636a09a9748e54fcfe089e1e0b5f94392d77f844df96b3785d1383fc213b97808391c320fa89e1ff9c367c61b42ff0008fea80751f9924eacba37f8a3e70fdeff000ef06bbfcfe0f645ac1bd87f2013bf65d8261ae586fedf25df07879df9cb3f8330dfed147edc5fedf157fb4581625b0c96c206041bf213767f07febfce306cc510e9c790c601a70de5f2f58e7fffc40022110101010003010100030101010100000001001110213120413051617181b1c1ffda0008010111013f10f5f1b6ff00211f0727c3c9f07d6db3ea3f8b79db61e46db6db793e1b7e8fb21d70f7e891e189ae9b26bb7fb49bd42ed05fb20bfdaff696fd80c413ec766ff69d431fdd3f867fb2ff006977dbfdada1e0e08f9385d5e2f1f436fc2b3785b91cc3bc7de40b8dd938385bc0e9136f1daa47244fcf8bccf5e5afc8f07d2733ddfbe087be0ec435cf96f0871f0ba49f3e0f9db65d5d4977e561ad3b7c6fd38d733850771ee3aa489d37b380ccdd45a3675bc64ba2fc8ec614b5938fe230ce2c8f8586c8ab24bb2ef0b096161616120d858138ccc8db080f64bf6f120190203016246407271a7c905e24b3925833d5e724893d385ea1d8b787c961e48eb2204b7ede430ffacbd7138f1f0332c3c972d3178f92c9c9ed8364cb23ab5b7a9761c87a8e1612fc3aa25d7961cf67c7c43c0824b31c9e1c4f1f2b86dac0dbb56e776db66c76723d5b6cbb24723812605bf2c9f56ceb9e5e224932196365d793c8ad5e386385936887a67a31b76db6c1db72019026ce0f8eeb2457672ff72aeedbf576d4cfdb7e3e239093243c84fb0e10f4c036f130708209c22325db0db5e4d093193d70b976644d2523690b1817f247e58cc9fc53eb6beb6186fb2243be093493656cbe077c9bc5e249789c3a59bbb2f6c84c81941ba49841765bfd4fb26c197720080917f8414023704b7f63fb3b28cb2408262d78188fed06757eb3d312e4bbf8e05e21d30ede09f71685a39c007b8b25d32c9f7938470a06b03f2d1934c9d7e1b42440e36166248893d51d6c9ea57b600d6c98744472c274c9df09b7a8e7fade2f1cc970f024a9507663db499f782f072facba47221a64c6f48c2eec9d7f2389be3cb1cf62e9b13bb6daf519c613da2d1f784160ede6112bbdbc4f90c79707a8698c8b3c42797a9c9e5e794d8041910bac61f593fbbc67bff790abc67b24fd497bdc3a3c8059320265969c833c63fbaf16c361a8436ddb15259471b68c9b73267dbf25848e1de32ce006b2a6cffd1244fe9c7ffbe7c3ff006de3fa426bdbc0e21d8708d7d9e0e087bbc4c758c3614cb3721cee13f26c92fea956fd211dc0ecbd969816f3be4076c939b3422b1a7eddb70bbffde7ff00b241606192e792ec4129f5eaf1c7a94b1baea231320f6d97acff0074fe5caec025ee58ccf481b226984b3b650299b46ed3faf883affae7a14485bf9c088bf9f447a5e2dbfb4bbbd930fb14edb1fb6af52ac2c8ed19644f5c10c42752d6636ec69f873d0383dbc1fd2ff990e1c18bb7de6f93ade248e1076673e5ec417ec0fecb4c796f36de891f9030930b6af3e36f6de098db0bdb65b721b6ff00c8e100b6ee467700613eff00009b6ed805e381aa57ec6c47580ccb1302f220637c9642ef83d926d3d8ee8fb61a91a08c44eb6d3167117dca94fbf0724ebaba23092f310d449dcbc523f593cc87e5eeca78967626db7973bb121fc81f2519a09a974e769d5e383c0f725781ddb2b96e9924f19659659d44f6c61e1bf09727a3314f5262cf41611770eee90f53a761bc26ee87e3fe484ee5bc0b7c4790a2fc9313fbbb67e27c890e883a80ee4c29fc03ae0e136565ea61e4d964195898b3bd2d76580658076591d110c2d212de5e88f2e9cbc4a40d672a7921b321d58c61c1a169fd976bf60b73837e703cbcc31190eed3d9702233655ed1c77059c0c378b1c7971179b0fdb590ed9e906c078617af1f965fc27ef0f5cbf381e59b611ccc3bee39db79d85767fa739c5a72fb97adbcef8fc8337ecba727d87196b760eb8c86f50c92ce738c94231b4b4b285a7a899acc6b842e8b169113def1c2750fb1f13efc37e46c187d3c7b87e5bf7f7c0631fd6d97acdc0d8d596f04bafa7e53ef07ece3783e7dfd0af5ee1341f670941fecd9b0fd40eb248d5bd5d99c8fc1c489f7f81bf47c7ab7af9da9e2fc012e8f77ee437cbba603c9e9bb4f5ab7cf01f47a8b725e1b696fce59f07c056d5ab56ad5ab76edc707c4fca59e489285f24ed247c8ede1f0f33c7bf07f39f3b78903f645c6c8425dec8663cfa43bbca3ce7fffc4002a1001000201040104020300030101000000010011211031415161207181a191b130c1f040d1e1f150ffda0008010000013f10fdf87338fe436fe3e3536d0d484a87f01ea3d152a1a1eb3f80f4f1ea3534fa93f7e1cce3f90dbf8095a92b53521a1fc07a8d4f490f504a952a5695a1e9e212a54a950d3e21a2fc1a739958d78ff824bd33d697e80bd015aedfc352a54a952a54a812a56a7aec97e8dbf80da61e8a86869c43f8e7eec399c7a2a54a952bd07a42e54a86b58952a54a8434e3d0b972fd273e8a952b53d269503466d72cef4b61bff110d06fd26bf534a6d3897eae3436d5d6b548694501bc7994148120738c231045110eca853497402d466bc41abb29342da2a3de2b107062076191614df150704617442978db28b29ce80e1162a85481a016574c0a673a9000c21ef1f44006a9005afbcab23d71ff0094a628b5b55ecff496ccc9f07514332ecc07ae92084e026e0f2d63558b04cc96652860af310a094500572ae0563b6b13918b4bfeebf710b8a810177b38c23d989607542177c1832af52bc86c611ecd5f39ee2c1e8ab4bdb427c952f147cee3d31dc1200798dca3a334f654ded1171f8697e259bbacaf611c8cdf188e95a3f7288996c00536aec97802c9954a388f1138a036542f20680b1fa8b6230817655f6329daf703497089aaa25407ae86b7262ffa00055866bc32b38e520ca8319da710803161b57994d008bc8a40f082185cf10ce9c7f01e8dde83439d3eb4fd984e195ad4e6138d0db5bf57dafea7f99d4454575d345268d3923c977ee7fc2ed2fb74a8f91fd5cb577679acfa48881623e08fd2cf1c1fc29fd6943fdceba5a4be94d57405b1576858176b01cd6fe21ed69b229b1f74a3ed3ed639f4c2a8f00562295a64482ee80c0cb48cdf50734658c272c19477406d1d04a07946c7c20fccc68dae68ac1bbb01e386028a8a6543d8647e21316c8dee5fb81516bd2082945969d9ef189fc74d87f0c521425e771f2541fe8e74d015ad0516ae925619c2c5466232194ef169e4f2c7b699f3a66fe8fcc715651d20bf6b2b3dd2f77ec24ef902fbc7f91d407144358d957b613fdce914ce716d3bb437188abad6d2ab280f245424e6d4a0da1ba9e754a49aa03c91835221ec0fdb0a717f2215f750b88653ce6519b1f79944070b77017f2bc310823632f1fc07a377a095e61a7d6d29087a49c686dfc3f6bfa9fe67529a5ae5f02bee29200fe7090ff4bb4ca1967c07fe910bb84f00dbf506948efcdd3eea17b9d1f097ff007a50ff0073ae96bfcaed0b2ad13b693f6fe61316f8e2afe8a7dac445b489d8985001343a1a1583ecee7ff04c7fdf8c70dfe87889bc154ed09f55f714f2abf2a2bdb09f8ee28d5ac168ab2930804ae68b85d17b6a0694c2f8dec24d110876a4a9763267b943f700a4096ec06263ec90f8a5e5cd7dff0053fc8ea6ef401b5b67ca28ff0073a40f2cb63952feb4135b668ec99cf7496e5a7eae5a9bbbe51f492b02d58d9a69fee6685e43c8b41508b806c9181a606f983887a0d0d0d776a4e25421ae5210f571a1b6b5eafb5fd688a2918865c27dee080d570f2dfab9feb768289427d8fea18eb286ba541f6c3cde9be5367ee2205473f26fd1a50ff73ae96bfcaed1ff00af9817e187f6b1fb5fd27db7435f6b3feff5d26ff03c45a1a5470e8bf090bf9188de1c81ecc2312ac2f4505d8f03f0e3bf401ab85a135580176ad26d19d0056ef4a1f2d1f32a75fc80e156a62fca1fab85c29c3b1cfee58ddddfcffe20ec22bf8949a905cec5fc8fc4ff0073a4fbad432ecc2726fc03ff0064c207c24dfea2c775bf30fa484714acf27fb3d0419b63ef04411c30f41a1a1aeed49c68435c26bccf695af1a710db4af4069f6bfad1061949bb2041f488d3244f71fb8ff4bb46ce1578a0fba8c5507fe2bf431d0dd7f08faa8441462fc74a87f99d74b5fe5769bffe730ea43f6b1fb3fd27db7415f6b3feff005d26ff0003c4af60f40b311489b2c96fefe1e3da12da426eddf8373d9ee5e5bfcf1cfc9ac1ac31f9893575919b6abb4a6cd360e3e5edf86c228b3df2fcc77995bd89fb08d760e76807ec9b3a10f001f4e8a9e8536f8047d97cc5345e8d9403d1c148b0aeb20eeb18f882ff0026beea3b165c1d1fda198be855f6dfe90d3884207902bf312af821b7f01bca25102b4bd0f5553675a9b7a3895a12b465d5c0b15c7bcb6e8cc111ce67df7eb443598a03a3fb43112602bdc8fd47fa5da3a260afc01f44061900571b34f3981c9d50c4bbb46254b42c3b47f40d287f99d74b5fe5768ab398fe1fee648ffa4bfd4fb58fd9fe93edba0afb59ff007fae937f81e20b1d042c51c2732bf4d1a1f0de5314f89409deb552d1fd4c4253ba161a806b0e80e4993a21805e0a25f7c3bcb0fd22ea6a40bb2cc43c114783c0608d834be4657dde8ab42cd0bf43e0a7992d488fb3819f7509bb5201d2386283c120236ba331ce6123d9803659b4e211943947ee1a1f07ea1b7f01bfacf42a678d0cf43fc218ed768dd31d446dc8a86f8bba47c8a9b76f11340078ec83638253e27fb3c4bb3649ee0feb28ab5a17b2ff00d29fe97697afd1289fd214b1045905a8f4c2986a8371d81d4252308cfc8d141e34bd163792de21eb9163166f0748c08045d8512213182805b42f2db5f88f4b0274a17eec3ed63f6ffacfb6e828c5b5af6b4fee10cc11c051f918d2f79308d8e2959e8f310ea02ed0feadf895ed50db800fe7e9177e0f4d153216551ace0c4660959b0194f17710bc02d9301f92d3fc8ecd35f64865a40679a8a429f7c03f7018d1a7b791b1e20151c108c5180e4652fb07effd61a2ca03f98347ecf8d1d0d85af9d012873489356cc7df480fa20be8d90b564c8f30b99f83034360717297dd3f64fd89108914b8043ee108c8c54ceabb5b8664e6aa2d8cc5565286ac1fee32cac548a8597ed08436952a56a4a952bd0695a076451fc5dc7a1206fe5625b2c5aeb883f263512d6a202060113888232a80380e86eaa1585553922614371cc024cd59d355d5d76f986d164802174daf8991fb8a8032976e92fd334826c0a73dcc88728003942aaff30865c83804b1b7938e233a1e720a4b18b3ad2524eb98414d8adcf7ae235e229e63c5007dacbed89729bf0d001a0381c1bde5f2b23a810a334670cc6c7b7152e2c81b06945d96050e7b8467a582f74dfa825ddd7e5886f6fb9eed86f9b1dfbb914f757f0ce3ee26182edabca795b571fbaf87b6b6b5d3d270f982714ceede14c0b378924dea5cf96aa5ca2ffd03e2076b61bf66319e9649d596be207c5124080320a71dc0d887bcb6605e4ae165d90db8800596001c814deddf9816274d42b75109f6d819e059cc7eae2dd545c71c0dc4c8fd4e106cd97cd749631658ff0071a27c3110725bc751892b001ce42a87328344a50b1ba3a7e2579c35a282ace9fcc736e422871450e7b9463e04002d1bc751641bb905558c5933caefa8cd106c70b190395118d666c44f37ca2a01af8413c1e320a97e7306256a4654a9b5d68b836c352108b153de7d1d5a71e834bd2f3a112eaa2acf128420ed2cf3b0d3ed3748400a6d4b96b8fc3944b4c94619b38169152942406c07830193722315b16e15628529ee604a00f6cffe762dbbfbff00d50ffcc416817a544111047727ff0033100346c4189e6bb0acff00e62032ad82889dab70b180d167b20a400a00c11d1d4e58909f94661ef418106da2f960b01f7801fd507581ec468a027491337b5d4015a0f128563f12cbfd12f69fc12d8c0f150ffc295080077a2157f54e73071287f5604051b10e23a28981065fbafb881181f8403397d91632bee2346c6503516561dd02e1821a10f426255b28ac066e86a7a3a5a89b7d55a71e8256840ed0a09926eb6dc541cb05b355986fa8dcb461752c2f30951b9a55992c96bb159ef038812a54c41832fd04a952b5642072cb34762cda2a523b1296d80182012a568a176988ff004da098300f6c910f61d4679294a649bbc3e49832cb3a2c080b7de6c952a1084e21cee2a8421a0422b4a960e2a5a2a36594e11dc62a701b3d068f33c604a97c1d11b6afa4d496a6dab6fb4b86ed157ec16cc19b10addc172d76c119f08a8abe08615c405176660db215f108d6c16434e25d27a97308c290212cd0671a1e86345846951eb99d0821ed00f6d4d004cc8dfb10c90ae796366d8794429023c2620721d90c3163ff000184ac68911c95366a7a28f10030843435256f04073552c91cade8e03934c6507786de9b71caa50dd936a6cd5f5b2e126d563de3b460ee2e6071058f64061e0a61f88267f0ce47646f00b95237da1bdc1447561ab3d6be22dd82e3a8536bbc409ba9388c5589709c683e96d7828cbfe50c086a45a21b78061d400183794e95ae3645886e457ecc3095a406dea633c1a8420e869c309cbda7b8b9954139971f8b3f72e4e28f4b66228ee28b3d969b7fc221b6990723118ef0b3cd968c0dd736dccb82b433a98c4c99b4fd08a87c5c7b8da2b0ce5304bb0194f5062b3c425e62e66302186642f2648e02daab41a5fa442d9b933705456950951d287425da612a3534a8496c2a006e1a7b4e34785a03d04c1330242a197024f1a505ad1db1ad91e62746fcc08b1b21198397b4ddf02cd84250d7767ee5fe2261e86a9bea25c58808b03accdaf43b8fa09c40837d95501b15d10d0774081e426a1dadc1137eeec7b60b1688c728840fb3a56c1cc3c2186bb9ee8902ec64e3a86c770bf78144731297719387475c42086843433b43200232ae1712a2e1e9768b0839945aca0b04ad0d6ca4615277d4d796a18873e834f09c1e49d3b95a47e22352c74dcf71b348f86242079828ebc9c92c48b445312a121484c0cc48dd3f705170170e7d05d68ccd3dd5c45b60d4daf4b8f525139f0399d119cfb831d2eca869f59460fab09d3a9868364395f3365994bb8ef31f3c1a4f25902be84f0bda013d85cda06e086cd322e5b38d1864106a1005eaf317721b5c3f94ed87351ef3224f8235221e609bca0434d9aa8105560b07967b47908e34106a310b78160777a3b86f022bf786da54a9cc74a1fcfa0d47b40952a5d7ace1dce923720ed2170e712cb7300d306f09802a5afde521876815e8706e5040e88203cf6d11c7a36b8684a95017805c7c85aa8c9f1896505925da04f0586de08802d4261827959ba97c9665a03c1b7b2052f3064f319f7084a0572862c1d9299956ed333bf73ccbc0899e2592e2aa80d6e8c111660b8e49570744632cbec5f13cefccab80254a869b35742caebe8dc0c020360978601f6e386cc5881e7c0832e145d957bdc2b3d931ac72894c66e4dec3d1cc16a0a4f2de8427c7a04a8ae077806a3298e0d11e6585e257622d8ef18a036be671af737df06688f0aa1896a623666cf477a54db5ca59aa2523852d84f396e50a4971c2fccb25db15bf995530d9d312d54559fa8b9964cb0dc703e13f09533ba23362f315beeb621a4c2167bcb43be308f52f2f88f295dc14f3291bd110205fe602880584664f50c3f04dc86bc6a7a0da21f00a0aed2a9e060665730de83b5816ae50522eaa1ce1260e1f99c087c928b2ee11bb80244fde8eca37184a8aa3ce23c436f4f1316d86a4210d4fb807270ca80a822772a37619c43600b26241ed39f45940bda4003416dd04a5e7926ccd9a9197e9ac9ddb4800a360a89eda393cdab00b50cbbf117a5850b1e044da8a23a3dc6e2f812587a10103736836b7e6541ee413b915433925b980d84ce0b36496e9416a58de5034c44300962f78a0345a1e2325acd88421a9a9a1ae170294f1080ce6cf3e630d878caec87607c341fc4bb75f22def1080a5d2db0365ab9612ed6fb20ac4f904327bdc55418e0cbaa06a0cbc4c178b9b587a42d9e4320de8421e8161188ad5f199b6018876636d7a868db1366adce3d1b411da5ae0af1703754866920286c4add86a001cca01b054e507e720e6e0dce20621cdcbc00b60738a7353a4c093ee250c05315b43cc3684a85c98d162c4283ccb836cb04f3f6d059c30840d2b9879806ae5e107031b69590e133f505585da750e8516b66ca94e01f487026bc4a5829588bb4065dd656586d82bc5c72416bbbc4a38428c89891c2ee2b4ec87a02144041be7322007337294b98205a10c970f40b8c29a2aae1e21b7aeb626cd06f1aec8b52b754cbc5d3f88a56e1ef092826e750122ac541a58adb500901bdc166a1847789e40ed8b860761b42316744baaabb62d272b70ac09633bc7801e7942c0775619630bec132276cb683c636aea5645670ed10ae8e06164b455cfbcd36302c3960000e255a8d566211e061d6ce2e5ee40ea6e43b5c053ea9c27e238c93da59b6f862c4b3e489ee9782139d5d90d6be69ba1744e7abcc3c057760b58ae180b44f292c44f60dcb96c7b3b4b20899da13632902414051778aea36081f08a192f8992165896133854b86b7a0bad02a201aadcecc4360e084e5776cf108c71361ed0d289ce82ae47643109b3d1ce9f7f3661b68d692ca592b3538f2c69b28fb4dca9ed1c6f274d4b6b43cb72a239b2a2c1ed321b23505dd09a01ed15911e656d65d973011629bc780239863e166de253021c5a5f0f8b4c7b9a2ade3457295f26801a7db69ca5ee04aa51a6ddcc0b5812a25cc48eda8c66bf12bac7b103ceaf1615571fea95403a84b68ba59c417b1408c03ee8a378c5405a6cac30f98ec1b130c6006aa9c3fb975ab62936e36811da03ad9230b56e1d43a3b3c43d360d03b8a108069bdca837a2ae34ba8e2157d4779615a56bb50510fb0831b3435d8b9945b30db4f69405c71061956429c4475080d753c9ca4d9f1a1311d98d139287a86725673cc08401be08136600ab15ed190a2b546cc4d15f4f13edb4d909984e25b675040ab95377a82a634ba1560250b9c03e66c42a6204a94402987923bd6957e2526388ef09523c0cc8be2f1a0dc028ab1e20c4cbe866591b3bd2e039047021d8842d28ba1940671020d1156418bc02dfb20c5c3549846d9f4e09277e8db0884805379b3396825acd5ccfe32e079d550589e2644d8139bb34183a55623ed0e409dc4f2976d49436a8cf71c2da50c1e9e27db69bd1d8b08ed052dcda095895a1abbcb9839621d997286dd2a2ae5bbbcc37f0ae638505e6888816d5e0885c10e6a0d8879308a0c3640feb799895b75d89bc7a6de4b31cc6c686b797cb75bcc14bbb2220b0cae6e6da0b23bcb6a0c5e8a5f2c3ca1d408c0bee6354d8a711484e6be21c0a784661db69b2a574326eccadde8c34c0cdb3e86877adcb96e4bc919c60ca6cce52a791061c8e453ee340f3035798a89d06794025ead9d06f192dd840ac68a3a27c25b360d925b7039ee0d9aefa7db6b1c30c4b94f6152e5dcb9506a5c47718b2bc02580a072cccda140bdf4e126c43f119b2196f351c51a6eb41d4b428ba43105ca7861c4ca7b89442ea8820297860625153c202115c1de2bb9b86ad209169cdb68f40a6029db7b2a1c5c28512ef69b208803704af96d835e982b7598049dae2d42b2806e8b126653ad186da0c66d60c9e22c56a24b9bc7a4b4c91da782983082364360f4c1e1161a7e60eaed057b2980b7643684e220c736a109d12a54a95a20745e1e238402eae2131a54e19f6da6d9ca1161f6663e67421b68cf34942c07cc6cb5c27330c8701c420310a230670ca9824bd406d5b30654e931022dfc97162d5e1752f62cb132a01405012f104162241c683082552460e5b69e25342d9aee5df414981f88306584f715010ab4be20028ad8ee3a420e1799cf53994a11c1378352043c4a3ce41ef4271a6c694681683f730209ca7e65ff00e8803b53ed29e994e60c16e54b03a57106139449b34f230266c32bc38810d1998778c4f6750da10191c0c749be078828510a4d91be1fca366143e67811261c2b66629eb32dd9ecbee1389c33ecb4d8cdd843b1d4c74f886da112b98b32bf52e2a7d967211229684a0abb8cd9ad5b994021d24b81ed006cccfcc0825d7cca8a7684758d2186712db2d6f5aa202191293b23db4991b113f44beb16b09712c37da1ea05df8618374a03b83509b9c4860003e26d22f74bc28bcbbc70c06c4e25b96a5bb88f4cc54e220399bf4cc238c4596da8d912bc41f283ef365f25cb78ff00336f74e198901ed30ccf344c3226cf336672d37650bbcc60bde2646820c4de3ba4f90542cd118176b1cb0b65f8140d8d32a7fdd306f7bb3cf02d9b2039adf702f5542cee2ca10890fe54aa26d9b5816c161e22b0e46a2f4731de0b7b4615873300087481a10d1418857d8ee3edd673b8948ca254dab508b4a82b0f9d388aae5364cdf621b7a059b4662ad15b69b37c4b84dda62268a61b3110314328398ccaa82c6cf70d646ddbc44b53c06ecb36cf60e61ad167974cd17b986b0661307721d972d2818ba5c4a981601400818d2bd054411107e229bc93621a732f1eed30505ff50e341a8e65531ed1d9c033b8e0895326462a2f729f49bcaa44ea31e2dea3a200809c4b56d2f0c7f91fd459b66c66e8ecfb40b2e4442729c6a4c3304e61b6a42586ecb19060083d5572bc4a14003608000722d242191a029cc310da0bacc94928bbbd3f50dbd18aaef8ccc1bae524bc5592e0a5e309744210306f5017400338a82c1e1e24ccb1bde42602d40f31d1bc35b4b52c3e26e53f2c4308486a00f72ec8aea1d8208b03d15ad436d37a6ccd938d3c84541be9dd4b975d17d8941483b20a1bddc2ab8a2401bbda61eefaee09b3aad0af1044198a695016d6981591b2cda36eb0705a2362a770c8078b270adde59e25fd4b9b19b59ba3cc55616e65c0f7396afa0d48b444066760e20250f9578808032e65b5b7f985ea143a2e03ede1b6bb199ba37a477ed1293a04a0e12e15b082fc31498e026f86caf2cc3d5dbcb036db5b1dca828e84328cf974182a5e5c13bc0ec4004b8ccb25f7e83d06bbf36343a7c1353258d554af444ed3dd94eb172ecc71c358db31aa1498062bb5b335cc2ac31ed05f64cc18a7bca4fa79ea172ee8c59012531242a32a40b51eb4b5146a05a169871ee64b2dd7623c5d42d0dcb9bb337b8dadb8ccd5c439d5d086de82aa316b1c1c466179d5e2541368305260e56097b6ab5d13db5a20efb202938102b5db307e41889c9d238db70c2bde8bc7bc2bb0b7960502810c297d88d6057700aa36d6d80ed0608ab84cc054ce502835611d4d2a6fcda86d081887d80830b72d18b09737dc12813025018ad5700a056312c11d9ee0931513b8272c1222b5e629471d328e11464b06a2a501b25a9ae7cc09c7e128e4f867372cddbf1129638c12f818c9d422c6c97188e27b61160a442df620e2f47d413368132a19e03b940b1ca0f12af682a19628bccab48ca9b2f995d1baaa6da70cb02e98b8b8c542568c7eca08703c10c45df067c91c680337dc717070a73002d45fb8934af0837c568408188a8ced152ea3761344c34b8ed0d2a54a9519b936a1b4213d8598fe354b878ae9bf05fbb053712e399257976798ec54c1305f50186861e53f314eff009226d49df18b88b83e1f89473fc432d3fc4b2df5e658aa3dc06353da5bee3a805e4cdcb0203c5461b0a32710e584f32a9a25107ccb259d45a3a96957c3328f792cea1dca6858a52c11ade60078815368b77cc8e609000280954634369c43f290fe186da1199bc6810f350cdcce908919681b36a2518b53899437e20800db43cc18424ee50b2040d9cbbcaf592a54633726d436d769f28684f6849b4df9f72386868794cc951ada861374b7bd105cdcf04f3665ba7e672cfcb11e4f965724fccbe84e15405b92aea54c42562af68e8040286a015b1176a4266d5066cb0bb017cb36c0f680d504ca33e26c04f988da3de701bc42fb4af3001400476b857708250ea498212e26d57ba28a5b879619271373554fcd40c7c108434dd5630883c436d360462a08daabe61e3d1744032e678a3b80506dcc0a312bd67a19bd2a2ce271a1f24a33c828c7f92944b8b29f81091138625c7b1997c74da348b237a9b05f6439551dbd609baf8826553910079b05bac13661c4303e1004509b4db210aa55c0a225e1979b99439207f719c051f314c246540c4368c1744ad80e2fb82e182585711cc6bb87708a0cd15071a1a991a59f0814d80343686d182f0b017f70cc1b6849ac88ca843886d0ccb01568222377e0972834c5776a83b496b0271eb36d08c66f4e24564a9c42b63b232aee15ed7a6a6ca995cce6172efa095db0db4c12f6f44ee048408697a34442acf925422b8198ea54a8ff001c577f04d810354804da20ef10c8610961f32fdd9216d143ba99c0b3a1b8949c04ac3dc147b832f0c4ad565af7194e1525e7d04b14b45a8676da1934368f30229921968be7ee66b56c751a8ddaa84e275b106a52e036128811c4b9c7ac2569ccac47a7dac344b27909b971793fad39987b9825c07904be421168e3b41be6e5448a9454ff00d08ae243a1106dfcc5aad8ef4c6162d40ed0d19bff001061ed036978f41e9d9b89392c88ca35ed3255704c1cc1bfe7f70e23ce8998f17cc276097d5c06facc35199eae98750faf430f30b4b8688548d74eebec4b42df68653b2208c314b02a2a3151615a0e2b4a952a1cc7f84972e2a63eb15e884a1617826c4d91d6adca0c7c50b4cbe183b6674b7895a143b965561d331200d15ea01c350a362205e20195f30c4416465c0a5f715b2a8f4769f419445f44b2a5f5e83d04ab84ab8ed02c39c4b874a7dcd938970f32a4c455d045178b80741abc6ec7005ddc54c3adeaf3052c6f61042e8fb24bd9d833280c6afc2172a32d74101bdb6533f30ead3617545e2e549352394eaa340366d5be232d37493bd0f49a9a3a04a8470421b60971fcb2d146e26ecd99b212a3e21bd6062c0e4b18a1f19365108c435b83a67bd06b4b9706ed8731e2bfc4e43f89d77f79c427cc46009b4108d44ad57c310670c12c65f98695afcc355ab60e2298a0822deeb8814465dc2acbb31ef2d257ab857885461374cc00129b50103ca2f6947de09e1d6cdc5d83583b1ed32091bbbf3316b744a182c4bf723850bf78e8c3280ca7961a406d6bcc34078a0a404ab4a25fdfcc0867416a5cbd187be952b4604ad025d8a78965808d98c2212da9b3418c09ce5f50edbcb3b40ad07d77e65f98674c2202a0a945a21cb3017caa0b923c2c7814a5ccaa3da00902b69b42c114c56ecda195d4837a2d0c06e55dfa8d840bb4da230309f2980ab4137509d8c106dadde2122361369ed191646d5baca2b1bf32a71098c6e941dce0356c3565244260bb05e5fb98fe54225bec40d59e594fc10b981ba5c0c28a07b138d09539d48fa9d1744bab99db9d9115730ac5cdc0a197c262745c1961bcc381b45222292e5eb7a84a826585dc19745ea3bc1f352c587c4d9b5c30cb01e603881ed05f70b0e61c7db5ad2dee6d915d0ce4201d986484194502d7694e46f7b44583d65ba1ab25e0c6237122c5398ddda61ba5e2e50432b2c0dfd044b6651a744201b1825688d2c3cc5928056562d70ec11d861e497a1086fa73a91f530da302d8a132cb5556d88b2882a1cc61002b5fbc6d62fb12a5ab7c411cff0089b718c6c12b05833d428d9b5a8170bda241a3d42d0a5a8b32dae1b59b808061dd01dca4866778bb823793cc16231d4dc7588cc535737653c9021a0433fd5031af1ab121bd4477c42c0cdb1804894222b0000006c4054c9b625ca72d9cc29c7284376aee876ea00144186aecbe379b50ad0f7a084e274205b06cd46080a472457de254068a09b970ec209ccb38869cbfc666a58a39894b76b116a559814634dacc26befed1ac1c43602155807c419c4565e301580829a9c915cb03b7894a000f1306d142b69b515505e3300ca23851cb280e58f830562178094b5c5f01164ed62e5f8610b36606254b957b71e10dbf82a575114e7197db363c4b1bc34acc44008f0c00800f03de540a84a8171ec6971019b8b579d04bd02caa8625573a5088e4711d02df77a8a2abbd98a14cc28674b9de97a5cb972e5cbd08b2254798376bb5d0184d8ce205c08bf2c229eda9403d2305aa2180f1158519d7519073cdfc937a74c1155cb9f3cfc010d3ea435e64c198da50c332ea5de86d3cd4c04327f1a4f61152f59de1b697a178c409bfa028368461acbdd00280043dd4c2046f5cc43e6b82119cd674e21305d938b8e0958fe720cbcb41869d4aa9b1994df0bd4b6a076c325178231b0f11b4d713081c5b0347ce8ec4a9b74038260fde6f9b59f6e54647e1c444bde7d59f6a021aa1e656b86fdc0f1f8995642f829e58961a54b0d40a54bfe3c57c9fa954d186fa149e85f5e951439547999df205b10f06b0bcaca454c97dc78f7b4235dc9823d4b4d85dd1395368695894371bbda10a67138fe6369f78d36b51da6cd036e20e266674fb5ae980843882bcb12923cf46f4734711fe18b4509bce1da20a758f0a854b979824f6b3782c955253b453a106b621716bed2c87c44c7aca4dc87a6e5e8ed03b6b71a1075ab8d50b41fb9995e4d09b4125795af50e450188ca450aaf10a13ca35dc389ed1159e65ad4b6c7dcf681a9b4160b12a36fe1a21fcc627dad3666d9cb1da6cd1ca06a13ef4c0be26122c21364372dfdd954a572d2ae1789ac2fc9004cc8980b86e0a8d0da50a25cbc5443181116e115e52d7d013c889a894be9b972e533b3f32c9efa5e972cf5685cb29d1a1a26ea775dc5ab04c0e6d9be80d8e980e886ef57078b60448968d035ef2e54ce4df3adcb84a81771037fcc4ded046c89be9b3436b07434fc861dbf3339d886d364556c6379c0c42f9958dbde265cb64319c15045cc5794c8b4bf3336aeb10df86569881fc091b712b132d4c92f53999bb4284782710d4525cb971ced6433ae2aa66ba5f72898022798ae8393984b4c1561bfbc56f778f5d033234c761ecfe626ff00bc26f83069ccd9a6779508682fdc8efd8d3da86d18ea4c465a121bf04fc121b7c9605109bb317ef36c0290fe025e95289b6858de5423734254d85b4cc1b86ab58b62626224a5bfbc3d5732cbc4f99712fb3e9197896379123bb3af5dcbf5137fde1371a9ccd9a7b5f4bee4482f35a0f097a585352f2bdc28c34c4e906f868f151a2eee647b21fe456a848ca245b037112100a4692e6c3526c4abb12070aac486dea60dee098af79b1987a6b10162ca8eebd62710f41fc06e9bdefadb74e7428dafa5b6f3361a23043465e84ee6de9b7418411cf5420dbfe055c4d33032f031c3859b3d1d4a0b6590730f5712f1737fde0a81eabbda9bbee9c43d07f01b33ed434b6e9cea367a098b36199d275691ebfb9ad8d2af40df4e7fe08d388816c01885a5a39cc36d5c67a991bbb021a1ad66612dff00727d7d0f4713eb33e45b09dfa8f51b337fdf4dd36c61a8dbaf1a5a6d14dd8e77847d7f7a61fc12eff84ef17a05482688d16bc42ccb2588b613ca8070705c2b006f59631882971ff73fd47fdcff0021ff0072a10034a3ee3670349b0f9ffa8541325897371dd113c60958becca3857bc08dc3e655761f30e51a3a96caa25171e7ef057b1a1e9faccfb8c277ea3d43866ffbe874586a36c34e3474afe1bab44a2e602b6f137fe7dff78ec1b505699da2016805060e2080abd006587b9a7134e5d836c6f02b45271f7123612b6b3979a53e12208772c7c89077944d0a2ebe43f31293146be4c2f10a080f193fdf7f53fdf7f50488e12c83639607400c49bdbb06d8df98abdd836cfd32e795257beace69a6fa49b08c7c7f6675d3e600fec41b85f99c304060001d4c2872c14bc1087a7e8336fb9fc67a37fdf4df363186a36c343f9af43f9f77de7fa9d27dafe8990b2d3b292e1097a469fa8da1308ef45f779f6958b303e167f4d0067c9abd1ff879d72c24372d48132b554f88b6160f28de65b9b798aa850dc0793cca3ee2041452f944fc1282065202ee96b3045c4505b2a236fc90aac12cff00b2722ded9802ca9e53116494f3324f6c42141588b50f487054ca05c2aff19a8619bfefa1ccd8c61a8d9ff0095fcbc7a37fde7f89d27dcfe89fe274d3b7f91da7d168e0aec240ff00a286b96126702168803e1e65afe40d2c44f84fb94a4e5ba9773d9b1f6990725f29e43b9a7c53cca6a179ff00a452a85164fd3325dc3f30db07c41301515d852ed98c3662d82e5cdb292a26c2ec422929ed8256c61c2fd1efe947b102557f21b31650d3b277e81b3fe01fcdc7a37fde7f81d27dcfe89fe274d3b7f91da7d168e07bee9d7b2c7d26830b406dfa81a6127fa9d4bc7007f1bc0645e0e138f6c3e7de6e4ae78b6f8767dfc4bbe33dc01a4f71c4a95021d4366f6207e3603883605bc12e371ada6dac7b59bbb0e118b7603a5b8d946b08a10ee089874b07660a0744197fc84596bd93bf40d92f32e5ff00cb7d1bfef3fd2e93ee7f44ff0073a69dbfc8ed3e8b470615809d92fa3f2d7090112c02f4b7cc7102d880fdcc47bc2d474d1df98874a9deabed3ec671aed1bd43f947e197d377ccba2d68ed832d838199f17d57106a09c0dac1eb15e6a00583c9398be1225a00471b4426c18d8874a84881577388636f7998fa47f01a3a421a0db4a9b34b64095a1b7a1f554afe7de54a9537fde7fa5d20bc2e5fa225b6585fb223a0fb95604ca110b58b257d4358d88f05dfb34c0892619c8bcf92c86580227269848942641dcf894393099ba34c5e8e94382fd05957e0e81b2bea0d857b9ec5dfb2010102dc3f1291a928b4f7a941dac29ecb332b2f90b57ea2c531d88b42839a86f878e497a1ad5d5c29ba77fb97c02460c5fb43d84e18379984b122ea962a563f94d38671a0db466c98c6c86b52bfe21fc3bfef3fd4e91ce6e20562ff004802b046d01ea456b90872b71fee22609783e64ff71096d0826c78c01ede7410d43878d9464c736f77b80fce984d33ec42db0b0f64b3e66454e52ee781fa63e825a16f2aa8f999c69e22a51e3007b5f33efb5402ff00a5d31412da4c5511367f04beab1e125ae0f4e638a8473c4bf07b21db08e63b8ecc307112839704305196f0f41a1e8752316269b673a710db4f641a972a54a95fc47a6b4afe3dcd529dbf129dff00129dff00104e3169a47c75079ce41bf6ca9e0bdd94edf882d73b2b694edf894ffe257bfe253b7e2185b07150c956ca13e482038d856fe58d0987895eff00895ffe257ff994edf889554572c787a630bb3d9821772873709408c0b2a3d436151dcb5b611669f623a70b608ee0609b3060c34bd6e5eb7a28b6466cf41b4373b212bd15fc1c687ff875ab0889d3509abf94c43f14c43f2402c44ee01f78f106987033a00e2039dd814e272364714b510986e188caf51aa472ed36c21186da1b3f99c687ff008cebc4dd958946efd45b1bc5ca3463b4c954abdc2137949966592ba82d069ee1b6370257a4d5d99bf196d421186da1ffd9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite_estados`
--

CREATE TABLE `tramite_estados` (
  `id_estado_tramite` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tramite_estados`
--

INSERT INTO `tramite_estados` (`id_estado_tramite`, `descripcion`) VALUES
(1, 'Pendiente'),
(2, 'En Proceso'),
(3, 'Completado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite_movimientos`
--

CREATE TABLE `tramite_movimientos` (
  `id_tramite` int(11) NOT NULL,
  `fecha_movimiento` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `id_estado_tramite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tramite_movimientos`
--

INSERT INTO `tramite_movimientos` (`id_tramite`, `fecha_movimiento`, `id_usuario`, `observacion`, `id_estado_tramite`) VALUES
(1, '2024-10-11', 1, 'Cambio de estado a pendiente', 1),
(2, '2024-10-11', 1, 'Cambio de estado a pendiente', 1),
(3, '2024-10-11', 1, 'Cambio de estado a pendiente', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `password`, `email`, `id_documento_tipo`, `id_usuario_estado`, `numero_documento`) VALUES
(1, 'Benjamin', 'Lazarte', '$2y$10$bO/rJ8WNwVVfyINKmLq25u6knGWo2kPlo7nWv6hC7KL8YF/drBJwW', '42027184@itbeltran.com.ar', 1, 1, 42027184),
(2, 'Maxi', 'López', '$2y$10$pMDrSxnPfB3lVTOX2vW/DuzpeN5eaWJtt6JZb8uYKlPTITx7SjojS', 'maximilianojlopez@hotmail.com', 1, 1, 13082019),
(3, 'Luciano', 'Gomez', '$2y$10$rA/KvY70Pf7QwSB4VwHuUOs7NLMq7nAHlIKctEK9ChRfvx6vb9Kci', 'lucianogomez99@itbeltran.com.ar', 1, 2, 42012321);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_carreras`
--

CREATE TABLE `usuario_carreras` (
  `id_usuario` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `comision` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_carreras`
--

INSERT INTO `usuario_carreras` (`id_usuario`, `id_carrera`, `anio`, `comision`) VALUES
(1, 1, 3, '2'),
(2, 1, 2025, '2'),
(3, 4, 2, '2da');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_estados`
--

CREATE TABLE `usuario_estados` (
  `id_usuario_estado` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_estados`
--

INSERT INTO `usuario_estados` (`id_usuario_estado`, `descripcion`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_notificaciones`
--

CREATE TABLE `usuario_notificaciones` (
  `id_usuario` int(11) NOT NULL,
  `id_notificacion` int(11) NOT NULL,
  `id_notificacion_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_roles`
--

CREATE TABLE `usuario_roles` (
  `id_usuario` int(11) NOT NULL,
  `id_usuario_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_roles`
--

INSERT INTO `usuario_roles` (`id_usuario`, `id_usuario_tipo`) VALUES
(1, 3),
(2, 3),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tipos`
--

CREATE TABLE `usuario_tipos` (
  `id_usuario_tipo` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_tipos`
--

INSERT INTO `usuario_tipos` (`id_usuario_tipo`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario Regular'),
(3, 'Departamento alumno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id_aviso`);

--
-- Indices de la tabla `aviso_estado`
--
ALTER TABLE `aviso_estado`
  ADD PRIMARY KEY (`id_aviso_estado`);

--
-- Indices de la tabla `aviso_tipo`
--
ALTER TABLE `aviso_tipo`
  ADD PRIMARY KEY (`id_aviso_tipo`);

--
-- Indices de la tabla `aviso_usuario_tipo`
--
ALTER TABLE `aviso_usuario_tipo`
  ADD PRIMARY KEY (`id_aviso`,`id_usuario_tipo`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `documento_tipos`
--
ALTER TABLE `documento_tipos`
  ADD PRIMARY KEY (`id_documento_tipo`),
  ADD KEY `descripcion` (`descripcion`);

--
-- Indices de la tabla `materia_carreras`
--
ALTER TABLE `materia_carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`);

--
-- Indices de la tabla `notificacion_estado`
--
ALTER TABLE `notificacion_estado`
  ADD PRIMARY KEY (`id_notificacion_estado`);

--
-- Indices de la tabla `tipo_notificaciones`
--
ALTER TABLE `tipo_notificaciones`
  ADD PRIMARY KEY (`id_notificacion_tipo`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`id_tramite`),
  ADD KEY `id_usuario_creacion` (`id_usuario_creacion`),
  ADD KEY `id_usuario_responsable` (`id_usuario_responsable`),
  ADD KEY `id_tramite_tipo` (`id_tramite_tipo`),
  ADD KEY `id_estado_tramite` (`id_estado_tramite`);

--
-- Indices de la tabla `tramites_tipo`
--
ALTER TABLE `tramites_tipo`
  ADD PRIMARY KEY (`id_tramite_tipo`);

--
-- Indices de la tabla `tramite_adjuntos`
--
ALTER TABLE `tramite_adjuntos`
  ADD KEY `fk_idtramite` (`id_tramite`);

--
-- Indices de la tabla `tramite_estados`
--
ALTER TABLE `tramite_estados`
  ADD PRIMARY KEY (`id_estado_tramite`);

--
-- Indices de la tabla `tramite_movimientos`
--
ALTER TABLE `tramite_movimientos`
  ADD PRIMARY KEY (`id_tramite`,`fecha_movimiento`),
  ADD KEY `fecha_movimiento` (`fecha_movimiento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_documento_tipo` (`id_documento_tipo`),
  ADD KEY `id_usuario_estado` (`id_usuario_estado`);

--
-- Indices de la tabla `usuario_carreras`
--
ALTER TABLE `usuario_carreras`
  ADD PRIMARY KEY (`id_usuario`,`id_carrera`,`anio`,`comision`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `usuario_estados`
--
ALTER TABLE `usuario_estados`
  ADD PRIMARY KEY (`id_usuario_estado`),
  ADD KEY `descripcion` (`descripcion`);

--
-- Indices de la tabla `usuario_notificaciones`
--
ALTER TABLE `usuario_notificaciones`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_notificacion` (`id_notificacion`),
  ADD KEY `fk_id_notificacion_estado` (`id_notificacion_estado`);

--
-- Indices de la tabla `usuario_roles`
--
ALTER TABLE `usuario_roles`
  ADD PRIMARY KEY (`id_usuario`,`id_usuario_tipo`),
  ADD KEY `id_usuario_tipo` (`id_usuario_tipo`);

--
-- Indices de la tabla `usuario_tipos`
--
ALTER TABLE `usuario_tipos`
  ADD PRIMARY KEY (`id_usuario_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avisos`
--
ALTER TABLE `avisos`
  MODIFY `id_aviso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aviso_estado`
--
ALTER TABLE `aviso_estado`
  MODIFY `id_aviso_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `aviso_tipo`
--
ALTER TABLE `aviso_tipo`
  MODIFY `id_aviso_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `aviso_usuario_tipo`
--
ALTER TABLE `aviso_usuario_tipo`
  MODIFY `id_aviso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_carreras`
--
ALTER TABLE `materia_carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `notificacion_estado`
--
ALTER TABLE `notificacion_estado`
  MODIFY `id_notificacion_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_notificaciones`
--
ALTER TABLE `tipo_notificaciones`
  MODIFY `id_notificacion_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `id_tramite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario_notificaciones`
--
ALTER TABLE `usuario_notificaciones`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_notificaciones`
--
ALTER TABLE `usuario_notificaciones`
  ADD CONSTRAINT `fk_id_notificacion_estado` FOREIGN KEY (`id_notificacion_estado`) REFERENCES `notificacion_estado` (`id_notificacion_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
