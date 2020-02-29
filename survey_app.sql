-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-02-2020 a las 23:19:44
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `survey.app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nombre`) VALUES
(1, 'Actividad física (AF)'),
(2, 'Alimentación (A)'),
(3, 'Factores Psicosociales (FP)'),
(4, 'Datos Antropometricos (DA)'),
(5, 'Muestra de Cabello (MC)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `encuesta_id` int(11) NOT NULL,
  `encuesta_nombre` varchar(255) NOT NULL,
  `encuestador_dni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`encuesta_id`, `encuesta_nombre`, `encuestador_dni`) VALUES
(1, 'niveles de zinc en la sociedad', 33999555),
(2, '0', 33999555);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestado`
--

CREATE TABLE `encuestado` (
  `encuestado_id` int(11) NOT NULL,
  `encuestado_iniciales` varchar(10) NOT NULL,
  `encuestado_sexo` int(11) NOT NULL,
  `encuestado_email` varchar(100) DEFAULT NULL,
  `encuestado_telefono` bigint(20) NOT NULL,
  `encuestado_fecha_nacimiento` date NOT NULL,
  `encuestado_nivel_educativo` varchar(50) NOT NULL,
  `encuestado_ocupacion` varchar(50) DEFAULT NULL,
  `encuestado_estado_civil` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuestado`
--

INSERT INTO `encuestado` (`encuestado_id`, `encuestado_iniciales`, `encuestado_sexo`, `encuestado_email`, `encuestado_telefono`, `encuestado_fecha_nacimiento`, `encuestado_nivel_educativo`, `encuestado_ocupacion`, `encuestado_estado_civil`) VALUES
(2, 'swjg', 0, 'samuelgarro@gmail.com', 2657544336, '1996-10-31', 'secundario', NULL, 'soltero'),
(3, 'iim', 1, NULL, 2657442233, '2019-08-13', 'primario', NULL, 'soltero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestador`
--

CREATE TABLE `encuestador` (
  `encuestador_dni` int(11) NOT NULL,
  `encuestador_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuestador`
--

INSERT INTO `encuestador` (`encuestador_dni`, `encuestador_nombre`) VALUES
(33355588, 'ignacio'),
(33999555, 'Samuel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_categoria`
--

CREATE TABLE `encuesta_categoria` (
  `encuesta_categoria_id` int(11) NOT NULL,
  `encuesta_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuesta_categoria`
--

INSERT INTO `encuesta_categoria` (`encuesta_categoria_id`, `encuesta_id`, `categoria_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `pregunta_id` int(11) NOT NULL,
  `pregunta_texto` varchar(255) NOT NULL,
  `encuesta_categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`pregunta_id`, `pregunta_texto`, `encuesta_categoria_id`) VALUES
(1, '¿Qué frase refleja mejor la actividad física que realiza en su ocupación habitual? Incluyendo las tareas del hogar', 1),
(2, 'En la última semana en su tiempo libre (aparte de la actividad que realizo en su ocupación habitual) ¿Realizó alguna de estas actividades físicas?', 1),
(3, '¿Qué comidas realiza al día?', 2),
(4, '¿Consume habitualmente alguna comida principal fuera del hogar?', 2),
(5, '¿De qué manera consume verduras?', 2),
(6, '¿Consume infusiones luego de almuerzo y cena? (dentro de la 1° hora)', 2),
(7, '¿Consume habitualmente productos integrales?', 2),
(8, '¿Realiza algún tipo especial de dieta?', 2),
(9, '¿Qué infusiones consume?', 2),
(10, '¿Qué tipo de productos integrales consume?', 2),
(12, '¿Con qué frecuencía consume leche?', 2),
(13, '¿Qué tipo de leche consume?', 2),
(14, '¿Qué cantidad de leche consume?', 2),
(15, '¿Con qué frecuencía consume yogurt?', 2),
(16, '¿Qué tipo de yogurt consume?', 2),
(17, '¿Qué cantidad de yogurt consume?', 2),
(18, '¿Con qué frecuencía consume quesos?', 2),
(19, '¿Qué tipo de quesos consume?', 2),
(20, '¿Qué cantidad de quesos consume?', 2),
(21, '¿Con qué frecuencía consume carne de vaca?', 2),
(22, '¿Qué tipo de carne de vaca consume?', 2),
(23, '¿Qué cantidad de carne de vaca consume?', 2),
(24, '¿Con qué frecuencía consume pollo?', 2),
(25, '¿Qué tipo de pollo consume?', 2),
(26, '¿Qué cantidad de pollo consume?', 2),
(27, '¿Con qué frecuencía consume pescado?', 2),
(28, '¿Qué tipo de pescado consume?', 2),
(29, '¿Qué cantidad de pescado consume?', 2),
(30, '¿Con qué frecuencía consume vísceras?', 2),
(31, '¿Qué tipo de vísceras consume?', 2),
(32, '¿Qué cantidad de vísceras consume?', 2),
(33, '¿Con qué frecuencía consume fiambres?', 2),
(34, '¿Qué tipo de fiambres consume?', 2),
(35, '¿Qué cantidad de fiambres consume?', 2),
(36, '¿Con qué frecuencía consume embutidos?', 2),
(37, '¿Qué tipo de embutidos consume?', 2),
(38, '¿Qué cantidad de embutidos consume?', 2),
(39, '¿Con qué frecuencía consume huevos?', 2),
(40, '¿Qué tipo de huevos consume?', 2),
(41, '¿Qué cantidad de huevos consume?', 2),
(42, '¿Con qué frecuencía consume verduras?', 2),
(43, '¿Qué tipo de verduras consume?', 2),
(44, '¿Qué cantidad de verduras consume?', 2),
(45, '¿Con qué frecuencía consume frutas?', 2),
(46, '¿Qué tipo de frutas consume?', 2),
(47, '¿Qué cantidad de frutas consume?', 2),
(48, '¿Con qué frecuencía consume cereales?', 2),
(49, '¿Qué tipo de cereales consume?', 2),
(50, '¿Qué cantidad de cereales consume?', 2),
(51, '¿Con qué frecuencía consume legumbres?', 2),
(52, '¿Qué tipo de legumbres consume?', 2),
(53, '¿Qué cantidad de legumbres consume?', 2),
(54, '¿Con qué frecuencía consume pastas?', 2),
(55, '¿Qué tipo de pastas consume?', 2),
(56, '¿Qué cantidad de pastas consume?', 2),
(57, '¿Con qué frecuencía consume pan?', 2),
(58, '¿Qué tipo de pan consume?', 2),
(59, '¿Qué cantidad de pan consume?', 2),
(60, '¿Con qué frecuencía consume galletas?', 2),
(61, '¿Qué tipo de galletas consume?', 2),
(62, '¿Qué cantidad de galletas consume?', 2),
(63, '¿Con qué frecuencía consume productos de panificación?', 2),
(64, '¿Qué tipo de productos de panificación consume?', 2),
(65, '¿Qué cantidad de productos de panificación consume?', 2),
(66, '¿Con qué frecuencía consume empanadas, pisas o tartas?', 2),
(67, '¿Qué tipo de empanadas, pisas o tartas consume?', 2),
(68, '¿Qué cantidad de empanadas, pisas o tartas consume?', 2),
(69, '¿Con qué frecuencía consume azúcar?', 2),
(70, '¿Qué tipo de azúcar consume?', 2),
(71, '¿Qué cantidad de azúcar consume?', 2),
(72, '¿Con qué frecuencía consume edulcorante?', 2),
(73, '¿Qué tipo de edulcorante consume?', 2),
(74, '¿Qué cantidad de edulcorante consume?', 2),
(75, '¿Con qué frecuencía consume mermelada o dulces?', 2),
(76, '¿Qué tipo de mermelada o dulces consume?', 2),
(77, '¿Qué cantidad de mermelada o dulces consume?', 2),
(78, '¿Con qué frecuencía consume helados?', 2),
(79, '¿Qué tipo de helados consume?', 2),
(80, '¿Qué cantidad de helados consume?', 2),
(81, '¿Con qué frecuencía consume golosinas?', 2),
(82, '¿Qué tipo de golosinas consume?', 2),
(83, '¿Qué cantidad de golosinas consume?', 2),
(84, '¿Con qué frecuencía consume nesquik?', 2),
(85, '¿Qué tipo de nesquik consume?', 2),
(86, '¿Qué cantidad de nesquik consume?', 2),
(87, '¿Con qué frecuencía consume gaseosas o jugos?', 2),
(88, '¿Qué tipo de gaseosas o jugos consume?', 2),
(89, '¿Qué cantidad de gaseosas o jugos consume?', 2),
(90, '¿Con qué frecuencía consume bebidas deportivas?', 2),
(91, '¿Qué tipo de bebidas deportivas consume?', 2),
(92, '¿Qué cantidad de bebidas deportivas consume?', 2),
(93, '¿Con qué frecuencía consume aceite?', 2),
(94, '¿Qué tipo de aceite consume?', 2),
(95, '¿Qué cantidad de aceite consume?', 2),
(96, '¿Con qué frecuencía consume frutas secas?', 2),
(97, '¿Qué tipo de frutas secas consume?', 2),
(98, '¿Qué cantidad de frutas secas consume?', 2),
(99, '¿Con qué frecuencía consume semillas?', 2),
(100, '¿Qué tipo de semillas consume?', 2),
(101, '¿Qué cantidad de semillas consume?', 2),
(102, '¿Con qué frecuencía consume manteca o margarina?', 2),
(103, '¿Qué tipo de manteca o margarina consume?', 2),
(104, '¿Qué cantidad de manteca o margarina consume?', 2),
(105, '¿Con qué frecuencía consume crema de leche?', 2),
(106, '¿Qué tipo de crema de leche consume?', 2),
(107, '¿Qué cantidad de crema de leche consume?', 2),
(108, '¿Con qué frecuencía consume aderezos?', 2),
(109, '¿Qué tipo de aderezos consume?', 2),
(110, '¿Qué cantidad de aderezos consume?', 2),
(111, '¿Con qué frecuencía consume agua?', 2),
(112, '¿Qué tipo de agua consume?', 2),
(113, '¿Qué cantidad de agua consume?', 2),
(114, '¿Con qué frecuencía consume infusiones?', 2),
(115, '¿Qué tipo de infusiones consume?', 2),
(116, '¿Qué cantidad de infusiones consume?', 2),
(117, '¿Con qué frecuencía consume mate cebado?', 2),
(118, '¿Qué tipo de mate cebado consume?', 2),
(119, '¿Qué cantidad de mate cebado consume?', 2),
(120, '¿Con qué frecuencía consume bebidas alcohólicas?', 2),
(121, '¿Qué tipo de bebidas alcohólicas consume?', 2),
(122, '¿Qué cantidad de bebidas alcohólicas consume?', 2),
(123, '¿Se siente con estrés en alguna de las siguientes situaciones: trabajo/hogar/problemas económicos?', 3),
(124, 'Peso', 4),
(125, 'Altura/Talla', 4),
(126, 'Circunferencia de cadera', 4),
(127, 'Porcentaje de agua', 4),
(128, 'porcentaje de grasa', 4),
(129, 'Circunferencia de cintura', 4),
(130, 'Aceptación de la toma de muestra', 5),
(131, 'Muestra de cabello', 5),
(132, 'Color de cabello', 5),
(133, '¿Qué tipos de productos utiliza?', 5),
(134, 'Tintura', 5),
(135, 'Tratamientos capilares', 5),
(136, '¿Qué tipo de tintura?', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `respuesta_id` int(11) NOT NULL,
  `respuesta_texto` varchar(100) NOT NULL,
  `respuesta_imagen` varchar(255) DEFAULT NULL,
  `respuesta_excluyente` tinyint(1) NOT NULL,
  `pregunta_id_anidada` int(11) DEFAULT NULL,
  `pregunta_id` int(11) NOT NULL,
  `respuesta_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`respuesta_id`, `respuesta_texto`, `respuesta_imagen`, `respuesta_excluyente`, `pregunta_id_anidada`, `pregunta_id`, `respuesta_tipo`) VALUES
(1, 'Está sentado la mayor parte del tiempo', NULL, 1, NULL, 1, 3),
(2, 'Está de pie la mayor parte del tiempo', NULL, 1, NULL, 1, 3),
(3, 'Se desplaza o mueve a menudo', NULL, 1, NULL, 1, 3),
(4, 'Tiene que transportar cargas ligeras o debe subir y bajar escaleras frecuentemente', NULL, 1, NULL, 1, 3),
(5, 'Tiene que transportar cargas o realizar tareas pesadas ', NULL, 1, NULL, 1, 3),
(6, 'Caminar', NULL, 0, NULL, 2, 1),
(7, 'Bicicleta', NULL, 0, NULL, 2, 1),
(8, 'Correr', NULL, 0, NULL, 2, 1),
(9, 'Bailar', NULL, 0, NULL, 2, 1),
(10, 'Futbol', NULL, 0, NULL, 2, 1),
(11, 'Gimnasia', NULL, 0, NULL, 2, 1),
(12, 'No realizo actividad física', NULL, 1, NULL, 2, 3),
(13, 'Otra ¿Cuál?', NULL, 0, NULL, 2, 2),
(14, 'Desayuno', NULL, 0, NULL, 3, 1),
(15, 'Almuerzo', NULL, 0, NULL, 3, 1),
(16, 'Merienda', NULL, 0, NULL, 3, 1),
(17, 'Cena', NULL, 0, NULL, 3, 1),
(18, 'Merienda', NULL, 0, NULL, 3, 1),
(19, 'Cena', NULL, 0, NULL, 3, 1),
(20, '1 Colación', NULL, 0, NULL, 3, 1),
(21, '2 Colaciones', NULL, 0, NULL, 3, 1),
(22, 'No', NULL, 1, NULL, 4, 3),
(23, 'Desayuno', NULL, 0, NULL, 4, 1),
(24, 'Almuerzo', NULL, 0, NULL, 4, 1),
(25, 'Merienda', NULL, 0, NULL, 4, 1),
(26, 'Cena', NULL, 0, NULL, 4, 1),
(27, 'Crudas', NULL, 0, NULL, 5, 1),
(28, 'Hervidas', NULL, 0, NULL, 5, 1),
(29, 'Vapor', NULL, 0, NULL, 5, 1),
(30, 'Horno', NULL, 0, NULL, 5, 1),
(31, 'Fritura', NULL, 0, NULL, 5, 1),
(32, 'Guiso', NULL, 0, NULL, 5, 1),
(33, 'Salteado', NULL, 0, NULL, 5, 1),
(34, 'Rellenos', NULL, 0, NULL, 5, 1),
(37, 'No', NULL, 1, NULL, 6, 3),
(38, 'Sí', NULL, 1, 9, 6, 3),
(39, 'Mate cebado', NULL, 0, NULL, 9, 1),
(40, 'Café', NULL, 0, NULL, 9, 1),
(41, 'Mate cocido', NULL, 0, NULL, 9, 1),
(42, 'Té', NULL, 0, NULL, 9, 1),
(43, 'Té de hierbas', NULL, 0, NULL, 9, 1),
(44, 'Otra: ', NULL, 0, NULL, 9, 2),
(45, 'No', NULL, 1, NULL, 7, 3),
(46, 'Sí', NULL, 1, 10, 7, 3),
(47, 'Pan', NULL, 0, NULL, 10, 1),
(48, 'Galletas', NULL, 0, NULL, 10, 1),
(49, 'Fideos', NULL, 0, NULL, 10, 1),
(50, 'Arroz', NULL, 0, NULL, 10, 1),
(51, 'Harina', NULL, 0, NULL, 10, 1),
(52, 'Otros:', NULL, 0, NULL, 10, 2),
(53, 'No', NULL, 1, NULL, 8, 3),
(54, 'Vegetariano. Tipo:', NULL, 0, NULL, 8, 2),
(55, 'Celiaquía', NULL, 0, NULL, 8, 1),
(56, 'Descenso de peso', NULL, 0, NULL, 8, 1),
(57, 'Otro:', NULL, 0, NULL, 8, 2),
(58, 'No consume', NULL, 1, 15, 12, 3),
(59, 'A diario', NULL, 1, 13, 12, 3),
(60, 'Veces por semana', NULL, 1, 13, 12, 2),
(61, 'No consume', NULL, 1, 18, 15, 3),
(62, 'A diario', NULL, 1, 16, 15, 3),
(63, 'Veces por semana', NULL, 1, 16, 15, 2),
(64, 'No consume', NULL, 1, 21, 18, 3),
(65, 'A diario', NULL, 1, 19, 18, 3),
(66, 'Veces por semana', NULL, 1, 19, 18, 2),
(67, 'No consume', NULL, 1, 24, 21, 3),
(68, 'A diario', NULL, 1, 22, 21, 3),
(69, 'Veces por semana', NULL, 1, 22, 21, 2),
(70, 'No consume', NULL, 1, 27, 24, 3),
(71, 'A diario', NULL, 1, 25, 24, 3),
(72, 'Veces por semana', NULL, 1, 25, 24, 2),
(73, 'No consume', NULL, 1, 30, 27, 3),
(74, 'A diario', NULL, 1, 28, 27, 3),
(75, 'Veces por semana', NULL, 1, 28, 27, 2),
(76, 'No consume', NULL, 1, 33, 30, 3),
(77, 'A diario', NULL, 1, 31, 30, 3),
(78, 'Veces por semana', NULL, 1, 31, 30, 2),
(79, 'No consume', NULL, 1, 36, 33, 3),
(80, 'A diario', NULL, 1, 34, 33, 3),
(81, 'Veces por semana', NULL, 1, 34, 33, 2),
(82, 'No consume', NULL, 1, 39, 36, 3),
(83, 'A diario', NULL, 1, 37, 36, 3),
(84, 'Veces por semana', NULL, 1, 37, 36, 2),
(85, 'No consume', NULL, 1, 42, 39, 3),
(86, 'A diario', NULL, 1, 40, 39, 3),
(87, 'Veces por semana', NULL, 1, 40, 39, 2),
(88, 'No consume', NULL, 1, 45, 42, 3),
(89, 'A diario', NULL, 1, 43, 42, 3),
(90, 'Veces por semana', NULL, 1, 43, 42, 2),
(91, 'No consume', NULL, 1, 48, 45, 3),
(92, 'A diario', NULL, 1, 46, 45, 3),
(93, 'Veces por semana', NULL, 1, 46, 45, 2),
(94, 'No consume', NULL, 1, 51, 48, 3),
(95, 'A diario', NULL, 1, 49, 48, 3),
(96, 'Veces por semana', NULL, 1, 49, 48, 2),
(97, 'No consume', NULL, 1, 54, 51, 3),
(98, 'A diario', NULL, 1, 52, 51, 3),
(99, 'Veces por semana', NULL, 1, 52, 51, 2),
(100, 'No consume', NULL, 1, 57, 54, 3),
(101, 'A diario', NULL, 1, 55, 54, 3),
(102, 'Veces por semana', NULL, 1, 55, 54, 2),
(103, 'No consume', NULL, 1, 60, 57, 3),
(104, 'A diario', NULL, 1, 58, 57, 3),
(105, 'Veces por semana', NULL, 1, 58, 57, 2),
(106, 'No consume', NULL, 1, 63, 60, 3),
(107, 'A diario', NULL, 1, 61, 60, 3),
(108, 'Veces por semana', NULL, 1, 61, 60, 2),
(109, 'No consume', NULL, 1, 66, 63, 3),
(110, 'A diario', NULL, 1, 64, 63, 3),
(111, 'Veces por semana', NULL, 1, 64, 63, 2),
(112, 'No consume', NULL, 1, 69, 66, 3),
(113, 'A diario', NULL, 1, 67, 66, 3),
(114, 'Veces por semana', NULL, 1, 67, 66, 2),
(115, 'No consume', NULL, 1, 72, 69, 3),
(116, 'A diario', NULL, 1, 70, 69, 3),
(117, 'Veces por semana', NULL, 1, 70, 69, 2),
(118, 'No consume', NULL, 1, 75, 72, 3),
(119, 'A diario', NULL, 1, 73, 72, 3),
(120, 'Veces por semana', NULL, 1, 73, 72, 2),
(121, 'No consume', NULL, 1, 78, 75, 3),
(122, 'A diario', NULL, 1, 76, 75, 3),
(123, 'Veces por semana', NULL, 1, 76, 75, 2),
(124, 'No consume', NULL, 1, 81, 78, 3),
(125, 'A diario', NULL, 1, 79, 78, 3),
(126, 'Veces por semana', NULL, 1, 79, 78, 2),
(127, 'No consume', NULL, 1, 84, 81, 3),
(128, 'A diario', NULL, 1, 82, 81, 3),
(129, 'Veces por semana', NULL, 1, 82, 81, 2),
(130, 'No consume', NULL, 1, 87, 84, 3),
(131, 'A diario', NULL, 1, 85, 84, 3),
(132, 'Veces por semana', NULL, 1, 85, 84, 2),
(133, 'No consume', NULL, 1, 90, 87, 3),
(134, 'A diario', NULL, 1, 88, 87, 3),
(135, 'Veces por semana', NULL, 1, 88, 87, 2),
(136, 'No consume', NULL, 1, 93, 90, 3),
(137, 'A diario', NULL, 1, 91, 90, 3),
(138, 'Veces por semana', NULL, 1, 91, 90, 2),
(139, 'No consume', NULL, 1, 96, 93, 3),
(140, 'A diario', NULL, 1, 94, 93, 3),
(141, 'Veces por semana', NULL, 1, 94, 93, 2),
(142, 'No consume', NULL, 1, 99, 96, 3),
(143, 'A diario', NULL, 1, 97, 96, 3),
(144, 'Veces por semana', NULL, 1, 97, 96, 2),
(145, 'No consume', NULL, 1, 102, 99, 3),
(146, 'A diario', NULL, 1, 100, 99, 3),
(147, 'Veces por semana', NULL, 1, 100, 99, 2),
(148, 'No consume', NULL, 1, 105, 102, 3),
(149, 'A diario', NULL, 1, 103, 102, 3),
(150, 'Veces por semana', NULL, 1, 103, 102, 2),
(151, 'No consume', NULL, 1, 108, 105, 3),
(152, 'A diario', NULL, 1, 106, 105, 3),
(153, 'Veces por semana', NULL, 1, 106, 105, 2),
(154, 'No consume', NULL, 1, 111, 108, 3),
(155, 'A diario', NULL, 1, 109, 108, 3),
(156, 'Veces por semana', NULL, 1, 109, 108, 2),
(157, 'No consume', NULL, 1, 114, 111, 3),
(158, 'A diario', NULL, 1, 112, 111, 3),
(159, 'Veces por semana', NULL, 1, 112, 111, 2),
(160, 'No consume', NULL, 1, 117, 114, 3),
(161, 'A diario', NULL, 1, 115, 114, 3),
(162, 'Veces por semana', NULL, 1, 115, 114, 2),
(163, 'No consume', NULL, 1, 120, 117, 3),
(164, 'A diario', NULL, 1, 118, 117, 3),
(165, 'Veces por semana', NULL, 1, 118, 117, 2),
(166, 'No consume', NULL, 1, 123, 120, 3),
(167, 'A diario', NULL, 1, 121, 120, 3),
(168, 'Veces por semana', NULL, 1, 121, 120, 2),
(173, 'Entera', NULL, 1, NULL, 13, 3),
(174, 'Descremada', NULL, 1, NULL, 13, 3),
(176, 'Entero', NULL, 1, NULL, 16, 3),
(177, 'Descremado', NULL, 1, NULL, 16, 3),
(178, 'Untables', NULL, 1, NULL, 19, 3),
(179, 'Cremoso', NULL, 1, NULL, 19, 3),
(180, 'Duros', NULL, 1, NULL, 19, 3),
(181, 'Bife', NULL, 1, NULL, 22, 3),
(182, 'Costeleta', NULL, 1, NULL, 22, 3),
(183, 'Milanesa', NULL, 1, NULL, 22, 3),
(184, 'Hamburguesa', NULL, 1, NULL, 22, 3),
(185, 'Albóndiga', NULL, 1, NULL, 22, 3),
(186, 'Pollo', NULL, 1, NULL, 25, 3),
(187, 'Pechuga', NULL, 1, NULL, 25, 3),
(188, 'Milanesas', NULL, 1, NULL, 25, 3),
(189, 'Merluza', NULL, 1, NULL, 28, 3),
(190, 'Pejerrey', NULL, 1, NULL, 28, 3),
(191, 'atún', NULL, 1, NULL, 28, 3),
(192, 'Hígado', NULL, 1, NULL, 31, 3),
(193, 'mondongo', NULL, 1, NULL, 31, 3),
(194, 'riñones', NULL, 1, NULL, 31, 3),
(195, 'sesos', NULL, 1, NULL, 31, 3),
(196, 'lengua', NULL, 1, NULL, 31, 3),
(197, 'paleta', NULL, 1, NULL, 34, 3),
(198, 'jamon cocido', NULL, 1, NULL, 34, 3),
(199, 'salame', NULL, 1, NULL, 34, 3),
(200, 'mortadela', NULL, 1, NULL, 34, 3),
(201, 'picadillo', NULL, 1, NULL, 34, 3),
(202, 'chorizo', NULL, 1, NULL, 37, 3),
(203, 'morcilla', NULL, 1, NULL, 37, 3),
(204, 'salchichas', NULL, 1, NULL, 37, 3),
(205, 'gallina', NULL, 1, NULL, 40, 3),
(206, 'acelga', NULL, 1, NULL, 43, 3),
(207, 'achicoria', NULL, 1, NULL, 43, 3),
(208, 'ají', NULL, 1, NULL, 43, 3),
(209, 'ajo', NULL, 1, NULL, 43, 3),
(210, 'alcaucil', NULL, 1, NULL, 43, 3),
(211, 'apio', NULL, 1, NULL, 43, 3),
(212, 'batata', NULL, 1, NULL, 43, 3),
(213, 'berenjena', NULL, 1, NULL, 43, 3),
(214, 'berro', NULL, 1, NULL, 43, 3),
(215, 'brócoli', NULL, 1, NULL, 43, 3),
(216, 'calabaza', NULL, 1, NULL, 43, 3),
(217, 'cebolla de verdeo', NULL, 1, NULL, 43, 3),
(218, 'cauchas', NULL, 1, NULL, 43, 3),
(219, 'choclo', NULL, 1, NULL, 43, 3),
(220, 'coliflor', NULL, 1, NULL, 43, 3),
(221, 'espárragos', NULL, 1, NULL, 43, 3),
(222, 'espinaca', NULL, 1, NULL, 43, 3),
(223, 'hongos', NULL, 1, NULL, 43, 3),
(224, 'lechuga', NULL, 1, NULL, 43, 3),
(225, 'nabo', NULL, 1, NULL, 43, 3),
(226, 'papa', NULL, 1, NULL, 43, 3),
(227, 'pepino', NULL, 1, NULL, 43, 3),
(228, 'perejil', NULL, 1, NULL, 43, 3),
(229, 'puerro', NULL, 1, NULL, 43, 3),
(230, 'rabanitos', NULL, 1, NULL, 43, 3),
(231, 'remolacha', NULL, 1, NULL, 43, 3),
(232, 'repollitos de brucelas', NULL, 1, NULL, 43, 3),
(233, 'repollo', NULL, 1, NULL, 43, 3),
(234, 'tomate', NULL, 1, NULL, 43, 3),
(235, 'zanahoria', NULL, 1, NULL, 43, 3),
(236, 'zapallito', NULL, 1, NULL, 43, 3),
(237, 'zapallo', NULL, 1, NULL, 43, 3),
(238, 'ananá', NULL, 1, NULL, 46, 3),
(239, 'arándanos', NULL, 1, NULL, 46, 3),
(240, 'banana', NULL, 1, NULL, 46, 3),
(241, 'cereza', NULL, 1, NULL, 46, 3),
(242, 'ciruela', NULL, 1, NULL, 46, 3),
(243, 'damasco', NULL, 1, NULL, 46, 3),
(244, 'durazno', NULL, 1, NULL, 46, 3),
(245, 'higo', NULL, 1, NULL, 46, 3),
(246, 'limón', NULL, 1, NULL, 46, 3),
(247, 'mandarina', NULL, 1, NULL, 46, 3),
(248, 'manzana', NULL, 1, NULL, 46, 3),
(249, 'melón', NULL, 1, NULL, 46, 3),
(250, 'naranja', NULL, 1, NULL, 46, 3),
(251, 'pera', NULL, 1, NULL, 46, 3),
(252, 'pomelo', NULL, 1, NULL, 46, 3),
(253, 'sandia', NULL, 1, NULL, 46, 3),
(254, 'uvas', NULL, 1, NULL, 46, 3),
(255, 'arroz', NULL, 1, NULL, 49, 3),
(256, 'arroz integral', NULL, 1, NULL, 49, 3),
(257, 'avena', NULL, 1, NULL, 49, 3),
(258, 'trigo/germen de trigo', NULL, 1, NULL, 49, 3),
(259, 'maíz', NULL, 1, NULL, 49, 3),
(260, 'lentejas', NULL, 1, NULL, 52, 3),
(261, 'arvejas', NULL, 1, NULL, 52, 3),
(262, 'garbanzos', NULL, 1, NULL, 52, 3),
(263, 'porotos', NULL, 1, NULL, 52, 3),
(264, 'soja', NULL, 1, NULL, 52, 3),
(265, 'fideos (secos/frescos)', NULL, 1, NULL, 55, 3),
(266, 'fideos (común/integral)', NULL, 1, NULL, 55, 3),
(267, 'ravioles', NULL, 1, NULL, 55, 3),
(268, 'ñoquis', NULL, 1, NULL, 55, 3),
(269, 'Francés/lactal', NULL, 1, NULL, 58, 3),
(270, 'blanco/integral', NULL, 1, NULL, 58, 3),
(271, 'de agua', NULL, 1, NULL, 61, 3),
(272, 'dulces', NULL, 1, NULL, 61, 3),
(273, 'salvado', NULL, 1, NULL, 61, 3),
(274, 'grisines', NULL, 1, NULL, 61, 3),
(275, 'facturas', NULL, 1, NULL, 64, 3),
(276, 'criollos', NULL, 1, NULL, 64, 3),
(277, 'masas', NULL, 1, NULL, 64, 3),
(278, 'tortas', NULL, 1, NULL, 64, 3),
(279, 'común/dietético', NULL, 1, NULL, 76, 3),
(280, 'caramelos', NULL, 1, NULL, 82, 3),
(281, 'chocolates', NULL, 1, NULL, 82, 3),
(282, 'alfajores', NULL, 1, NULL, 82, 3),
(283, 'maíz', NULL, 1, NULL, 94, 3),
(284, 'girasol', NULL, 1, NULL, 94, 3),
(285, 'oliva', NULL, 1, NULL, 94, 3),
(286, 'uva', NULL, 1, NULL, 94, 3),
(287, 'canola', NULL, 1, NULL, 94, 3),
(288, 'nuez', NULL, 1, NULL, 97, 3),
(289, 'almendra', NULL, 1, NULL, 97, 3),
(290, 'avellana', NULL, 1, NULL, 97, 3),
(291, 'maní', NULL, 1, NULL, 97, 3),
(292, 'pistacho', NULL, 1, NULL, 97, 3),
(293, 'chia', NULL, 1, NULL, 100, 3),
(294, 'lino', NULL, 1, NULL, 100, 3),
(295, 'sésamo', NULL, 1, NULL, 100, 3),
(296, 'quínoa', NULL, 1, NULL, 100, 3),
(297, 'amaranto', NULL, 1, NULL, 100, 3),
(298, 'calabaza', NULL, 1, NULL, 100, 3),
(299, 'girasol', NULL, 1, NULL, 100, 3),
(300, 'mayonesa', NULL, 1, NULL, 109, 3),
(301, 'salsa golf', NULL, 1, NULL, 109, 3),
(302, 'mostaza', NULL, 1, NULL, 109, 3),
(303, 'kétshup', NULL, 1, NULL, 109, 3),
(304, 'té negro', NULL, 1, NULL, 115, 3),
(305, 'té verde', NULL, 1, NULL, 115, 3),
(306, 'mate cocido', NULL, 1, NULL, 115, 3),
(307, 'tisanas', NULL, 1, NULL, 115, 3),
(308, 'café', NULL, 1, NULL, 115, 3),
(309, 'vino', NULL, 1, NULL, 121, 3),
(310, 'cerveza', NULL, 1, NULL, 121, 3),
(311, 'Nunca', NULL, 1, NULL, 123, 3),
(312, 'A veces', NULL, 1, NULL, 123, 3),
(313, 'Con frecuencia', NULL, 1, NULL, 123, 3),
(314, 'En forma permanente', NULL, 1, NULL, 123, 3),
(315, 'kg:', NULL, 0, NULL, 124, 5),
(316, 'cm:', NULL, 0, NULL, 125, 5),
(317, 'cm:', NULL, 0, NULL, 126, 5),
(318, '%', NULL, 0, NULL, 127, 5),
(319, '%', NULL, 0, NULL, 128, 5),
(320, 'Minima (cm):', NULL, 0, NULL, 129, 5),
(321, 'Umbilical (cm):', NULL, 0, NULL, 129, 5),
(322, 'Sí', NULL, 1, NULL, 130, 3),
(323, 'No. Motivo:', NULL, 1, NULL, 130, 2),
(324, 'g:', NULL, 0, NULL, 131, 5),
(325, 'cm:', NULL, 0, NULL, 131, 5),
(326, 'Color:', NULL, 0, NULL, 132, 2),
(327, 'Shampoo', NULL, 0, NULL, 133, 2),
(328, 'Enjuague', NULL, 0, NULL, 133, 2),
(329, 'Crema de peinar', NULL, 0, NULL, 133, 2),
(330, 'Otro: ', NULL, 0, NULL, 133, 2),
(331, 'No', NULL, 1, NULL, 134, 0),
(332, 'Sí', NULL, 1, 136, 134, 0),
(333, 'Alisado', NULL, 0, NULL, 135, 0),
(334, 'Keratina', NULL, 0, NULL, 135, 0),
(335, 'Baños de crema', NULL, 0, NULL, 135, 0),
(336, 'Para la caída del cabello', NULL, 0, NULL, 135, 0),
(337, 'Otro:', NULL, 0, NULL, 135, 2),
(338, 'Permanente. Marca:', NULL, 1, NULL, 136, 2),
(339, 'Tono sobre tono. Marca:', NULL, 1, NULL, 136, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_encuesta`
--

CREATE TABLE `respuesta_encuesta` (
  `respuesta_encuesta_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `respuesta_id` int(11) NOT NULL,
  `encuestador_dni` int(11) NOT NULL,
  `encuestado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `encuestador_dni` int(11) NOT NULL,
  `usuario_nombre` varchar(100) DEFAULT NULL,
  `usuario_contrasenia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`encuestador_dni`, `usuario_nombre`, `usuario_contrasenia`) VALUES
(33999555, 'aaa', 'ssss');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`encuesta_id`);

--
-- Indices de la tabla `encuestado`
--
ALTER TABLE `encuestado`
  ADD PRIMARY KEY (`encuestado_id`);

--
-- Indices de la tabla `encuestador`
--
ALTER TABLE `encuestador`
  ADD PRIMARY KEY (`encuestador_dni`);

--
-- Indices de la tabla `encuesta_categoria`
--
ALTER TABLE `encuesta_categoria`
  ADD PRIMARY KEY (`encuesta_categoria_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `encuesta_id` (`encuesta_id`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`pregunta_id`),
  ADD KEY `fk_pregunta_categoria1` (`encuesta_categoria_id`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`respuesta_id`),
  ADD KEY `fk_respuesta_pregunta_pregunta1_idx` (`pregunta_id`);

--
-- Indices de la tabla `respuesta_encuesta`
--
ALTER TABLE `respuesta_encuesta`
  ADD PRIMARY KEY (`respuesta_encuesta_id`),
  ADD KEY `pregunta_id` (`pregunta_id`),
  ADD KEY `encuestador_dni` (`encuestador_dni`),
  ADD KEY `encuestado_id` (`encuestado_id`),
  ADD KEY `respuesta_id` (`respuesta_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`encuestador_dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `encuesta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `encuestado`
--
ALTER TABLE `encuestado`
  MODIFY `encuestado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `encuesta_categoria`
--
ALTER TABLE `encuesta_categoria`
  MODIFY `encuesta_categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `pregunta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `respuesta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT de la tabla `respuesta_encuesta`
--
ALTER TABLE `respuesta_encuesta`
  MODIFY `respuesta_encuesta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `encuestador_dni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33999556;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `encuesta_categoria`
--
ALTER TABLE `encuesta_categoria`
  ADD CONSTRAINT `encuesta_categoria_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`),
  ADD CONSTRAINT `encuesta_categoria_ibfk_2` FOREIGN KEY (`encuesta_id`) REFERENCES `encuesta` (`encuesta_id`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_pregunta_categoria1` FOREIGN KEY (`encuesta_categoria_id`) REFERENCES `encuesta_categoria` (`encuesta_categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_respuesta_pregunta_pregunta1` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`pregunta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta_encuesta`
--
ALTER TABLE `respuesta_encuesta`
  ADD CONSTRAINT `respuesta_encuesta_ibfk_1` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`pregunta_id`),
  ADD CONSTRAINT `respuesta_encuesta_ibfk_2` FOREIGN KEY (`encuestador_dni`) REFERENCES `encuestador` (`encuestador_dni`),
  ADD CONSTRAINT `respuesta_encuesta_ibfk_3` FOREIGN KEY (`encuestado_id`) REFERENCES `encuestado` (`encuestado_id`),
  ADD CONSTRAINT `respuesta_encuesta_ibfk_4` FOREIGN KEY (`respuesta_id`) REFERENCES `respuesta` (`respuesta_id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`encuestador_dni`) REFERENCES `encuestador` (`encuestador_dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
