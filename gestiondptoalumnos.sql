-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2024 a las 03:03:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-03:00";


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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso_estado`
--

CREATE TABLE `aviso_estado` (
  `id_aviso_estado` int(11) NOT NULL,
  `descripcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aviso_tipo`
--

INSERT INTO `aviso_tipo` (`id_aviso_tipo`, `descripcion`) VALUES
(1, 'Importante'),
(2, 'Mantenimiento'),
(3, 'Tramite'),
(4, 'Taller'),
(5, 'Reunion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso_usuario_tipo`
--

CREATE TABLE `aviso_usuario_tipo` (
  `id_aviso` int(11) NOT NULL,
  `id_usuario_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_notificacion_tipo` int(11) NOT NULL,
  `fecha_envio_notificacion` datetime DEFAULT NULL,
  `id_notificacion_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_estado`
--

CREATE TABLE `notificacion_estado` (
  `id_notificacion_estado` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_tipo`
--

CREATE TABLE `tramites_tipo` (
  `id_tramite_tipo` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite_comentarios`
--

CREATE TABLE `tramite_comentarios` (
  `id_tramite_comentario` int(11) NOT NULL,
  `id_tramite` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `fecha_comentario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite_estados`
--

CREATE TABLE `tramite_estados` (
  `id_estado_tramite` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `fecha_movimiento` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `id_estado_tramite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Benjamin', 'Lazarte', '$2y$10$v5akvlrb50cuhNRz17knzOyj985RROuq5rlj9lkjT1hS7gmHeMg.6', '42027184@itbeltran.com.ar', 1, 1, 42027184),
(2, 'Maximiliano', 'Lopez', '$2y$10$bvqjBSaLNeQQE4W1ioZhBOvvK4H3NJ8KguFJf2AUFMnz4OfjeRkkm', 'Maximilianolopez@gmail.com.ar', 1, 1, 33222132);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_carreras`
--

CREATE TABLE `usuario_carreras` (
  `id_usuario` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `comision` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_carreras`
--

INSERT INTO `usuario_carreras` (`id_usuario`, `id_carrera`, `anio`, `comision`) VALUES
(1, 1, 3, '2da'),
(2, 1, 3, '2da');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_estados`
--

CREATE TABLE `usuario_estados` (
  `id_usuario_estado` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_roles`
--

CREATE TABLE `usuario_roles` (
  `id_usuario` int(11) NOT NULL,
  `id_usuario_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_roles`
--

INSERT INTO `usuario_roles` (`id_usuario`, `id_usuario_tipo`) VALUES
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tipos`
--

CREATE TABLE `usuario_tipos` (
  `id_usuario_tipo` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_tipos`
--

INSERT INTO `usuario_tipos` (`id_usuario_tipo`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Alumno Regular'),
(3, 'Departamento alumnos');

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
-- Indices de la tabla `tramite_comentarios`
--
ALTER TABLE `tramite_comentarios`
  ADD PRIMARY KEY (`id_tramite_comentario`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`),
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
  MODIFY `id_aviso` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_tramite` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tramite_comentarios`
--
ALTER TABLE `tramite_comentarios`
  MODIFY `id_tramite_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
