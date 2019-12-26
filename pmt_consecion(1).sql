-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2019 a las 00:52:27
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pmt_consecion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayudante`
--

CREATE TABLE `ayudante` (
  `id_ayudante` int(11) NOT NULL,
  `cui` bigint(20) DEFAULT NULL,
  `domicilio` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `persona_id_persona` int(11) DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `municipio_id_municipio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ayudante`
--

INSERT INTO `ayudante` (`id_ayudante`, `cui`, `domicilio`, `persona_id_persona`, `telefono`, `municipio_id_municipio`) VALUES
(20, NULL, '', 62, '', 335),
(21, 3342254312543, 'Zona 6', 65, '', 206),
(22, NULL, '', 69, '', 335);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_delete`
--

CREATE TABLE `bitacora_delete` (
  `id_bitacora` int(11) NOT NULL,
  `numero_concesion` int(11) NOT NULL,
  `nombre_contratista` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_piloto` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_ayudante` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `placa_vehiculo` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_borrado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bitacora_delete`
--

INSERT INTO `bitacora_delete` (`id_bitacora`, `numero_concesion`, `nombre_contratista`, `nombre_piloto`, `nombre_ayudante`, `placa_vehiculo`, `fecha_borrado`, `id_responsable`) VALUES
(7, 100, 'Juan casrlos', 'fernando federico', 'juanito Matias', 'M665LLÑ', '2019-10-02 19:09:20', 1),
(8, 101, 'Mauricio fornute', 'Reinaldo Ricardo', '', 'P123USQ', '2019-10-05 17:07:48', 1),
(9, 100, 'Gorge mauricio', 'Juan Carlos', 'Micaelo Benedicto', 'C883JJD', '2019-10-13 15:53:10', 1),
(10, 101, 'Fernando', 'Luis Mauricio', 'Hernesto Miguel ', 'P663RUS', '2019-10-13 15:53:13', 1),
(11, 120, 'Jose Evaristo ', 'Jose Basilio', 'Chocolate Moreno', 'P185GBR', '2019-10-13 15:53:16', 3),
(12, 158, 'angela', 'Angela', '', 'P0185G01', '2019-10-13 15:53:18', 6),
(13, 455, 'miguel cristobal', 'Carlos Cristobal', '', 'M448SSA', '2019-10-13 15:53:21', 1),
(14, 455, 'miguel cristobal', 'Josué Reinaldo', '', 'M655SSE', '2019-10-13 15:53:34', 1),
(15, 480, 'miguel cristobal', 'Carlos Cristobal', '', 'C292BDM', '2019-10-13 15:53:37', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canton_aldea`
--

CREATE TABLE `canton_aldea` (
  `id_canton_aldea` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `municipio_id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `canton_aldea`
--

INSERT INTO `canton_aldea` (`id_canton_aldea`, `nombre`, `municipio_id_municipio`) VALUES
(1, 'Nimasac', 2),
(2, 'Vásquez', 2),
(3, 'Chipuac', 2),
(4, 'La Esperanza', 2),
(5, 'Barreneché', 2),
(6, 'La Concordia ', 2),
(7, 'Chiyax', 2),
(8, 'Paquí', 2),
(9, 'Chotacaj', 2),
(10, 'Juchanep', 2),
(11, 'Chuculjuyup', 2),
(12, 'Xantun', 2),
(13, 'Panquix', 2),
(14, 'Nimapá', 2),
(15, 'Cojxac', 2),
(16, 'Poxlajuj', 2),
(17, 'Chuixchimal', 2),
(18, 'Chuanoj', 2),
(19, 'Pasajoc', 2),
(20, 'Patzarajmac', 2),
(21, 'Paxtocá', 2),
(22, 'Chuisuc', 2),
(23, 'Chuatroj', 2),
(24, 'Xocsacmaljá', 2),
(25, 'Xesacmaljá', 2),
(26, 'Rancho de Teja', 2),
(27, 'Tzanixam', 2),
(28, 'Chuicruz', 2),
(29, 'Pachoc', 2),
(30, 'Chimente', 2),
(31, 'Quiakquix', 2),
(32, 'Mactzul', 2),
(33, 'Chuixtoca', 2),
(34, 'Tierra Blanca, Chuicruz', 2),
(35, 'Chuicaxtum, Chiyax', 2),
(36, 'Pacapox, Chiyax', 2),
(37, 'Pajumujuyup, Chuisuc', 2),
(38, 'Media Cuesta, Chimente', 2),
(39, 'Tres Coronas, Poxlajuj', 2),
(40, 'Chiguan', 3),
(41, 'Gualtux', 3),
(42, 'Ichomchaj', 3),
(43, 'Oxlajuj', 3),
(44, 'Pamaria', 3),
(45, 'Sacsiguán', 3),
(46, 'N/A', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `color` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id_color`, `color`) VALUES
(1, 'Blanco'),
(2, 'Negro'),
(4, 'Gris'),
(5, 'Plateado'),
(6, 'Rojo'),
(7, 'Azul'),
(8, 'Marron'),
(9, 'Amarillo'),
(10, 'Verde'),
(11, 'Blanco Hueso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consecion`
--

CREATE TABLE `consecion` (
  `id_consecion` int(11) NOT NULL,
  `numero` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tarifa` decimal(10,2) NOT NULL COMMENT 'guarda la tarifa de cobro ',
  `parqueo` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL COMMENT 'Hora final de labor de la concesión',
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contratista_id_contratista` int(11) DEFAULT NULL,
  `ruta_id_ruta` int(11) NOT NULL,
  `vehiculo_id_vehiculo` int(11) NOT NULL,
  `empleado_id_empleado` int(11) NOT NULL,
  `piloto_id_piloto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consecion`
--

INSERT INTO `consecion` (`id_consecion`, `numero`, `tarifa`, `parqueo`, `hora_inicio`, `hora_fin`, `fecha_creacion`, `descripcion`, `contratista_id_contratista`, `ruta_id_ruta`, `vehiculo_id_vehiculo`, `empleado_id_empleado`, `piloto_id_piloto`) VALUES
(19, '1ABS', '1.00', 'Frente al parque central', '07:00:00', '19:00:00', '2019-10-13 16:01:59', 'N/A', 9, 7, 19, 1, 19),
(20, '125MTX', '2.00', 'Parque San miguel', '05:22:00', '22:22:00', '2019-10-14 16:28:50', 'N/A', 16, 9, 20, 1, 20),
(21, '100MTX', '3.00', 'N/A', '07:00:00', '18:59:00', '2019-10-16 19:08:31', 'N/A', 17, 8, 21, 1, 21);

--
-- Disparadores `consecion`
--
DELIMITER $$
CREATE TRIGGER `borrar_concesion` BEFORE DELETE ON `consecion` FOR EACH ROW BEGIN  
 	INSERT INTO bitacora_delete(numero_concesion, nombre_contratista, nombre_piloto, nombre_ayudante,placa_vehiculo, id_responsable)

SELECT numero, contra.nombre, pil.nombre , ayu.nombre, veh.numero_placa, empleado_id_empleado from consecion
    
    join contratista con on con.id_contratista = contratista_id_contratista
   	join persona contra on contra.id_persona = con.persona_id_persona
 
    join piloto p on p.id_piloto = piloto_id_piloto
   	join persona pil on pil.id_persona = p.persona_id_persona
    
    join ayudante a on a.id_ayudante = p.ayudante_id_ayudante
   	join persona ayu on ayu.id_persona = a.persona_id_persona
  	
    join vehiculo veh on veh.id_vehiculo = vehiculo_id_vehiculo
    
    WHERE id_consecion = old.id_consecion

;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratista`
--

CREATE TABLE `contratista` (
  `id_contratista` int(11) NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono2` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cui` bigint(20) NOT NULL,
  `domicilio` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `persona_id_persona` int(11) DEFAULT NULL,
  `canton_aldea_id_canton_aldea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contratista`
--

INSERT INTO `contratista` (`id_contratista`, `telefono`, `telefono2`, `cui`, `domicilio`, `persona_id_persona`, `canton_aldea_id_canton_aldea`) VALUES
(3, '57469663', '78487884', 999999999999, 'zona 5', 7, 1),
(6, '57899874', '', 7848987845464, '6ta calle 7-06', 23, 5),
(7, '78978487', '10000000', 8978788978478, 'casa 256', 26, 30),
(8, '45878787', '', 4548878478472, 'carretera al salvador', 31, 32),
(9, '34251436', '', 3428243163546, 'Zona 4', 34, 9),
(10, '24311425', '', 3245243125245, 'Zona 4', 37, 7),
(11, '24523124', '25532525', 3524218535634, 'Zona 0', 40, 7),
(12, '45214878', '84521698', 2545368214580, 'sector 3 casa 161', 48, 1),
(13, '80234865', '77664820', 5389630741236, 'Paraje chomazan', 51, 9),
(14, '44651743', '', 2227347520801, 'chiyax', 54, 7),
(16, '22334114', '', 5244312543163, '8va av. 7-08 zona 3', 64, 7),
(17, '57788748', '12548778', 8778887487874, '7 calle 8-9 casa 195', 68, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_depto` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_depto`) VALUES
(1, 'Totonicapán'),
(2, 'Quetzaltenago'),
(3, 'Quiche'),
(4, 'San Marcos'),
(5, 'Guatemala'),
(6, 'Peten '),
(7, 'Solola'),
(8, 'Alta Verapaz'),
(9, 'Baja Verapaz'),
(10, 'Izabal'),
(11, 'Huehuetenango'),
(12, 'Chimaltenango'),
(13, 'El Progreso'),
(14, 'Escuintla'),
(15, 'Jalapa'),
(16, 'Jutiapa'),
(17, 'Retalhuleu'),
(18, 'Sacatepequez'),
(19, 'Santa Rosa'),
(20, 'Suchitepequez'),
(21, 'Chiquimula'),
(22, 'Zacapa'),
(23, 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `cui` bigint(20) NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `persona_id_persona` int(11) DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `hash_clave` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `salt` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `cui`, `cargo`, `estado`, `rol`, `email`, `persona_id_persona`, `usuario`, `hash_clave`, `salt`) VALUES
(1, 2750050030801, 'Director', 'A', 'Administrador', 'gkevin964@gmail.com', 1, 'tom_castro', '88093b27b185ffc6c49766d2cd5910007acb8a3f832601b115f45ae9640b8ad0', 568084),
(2, 8798487848788, 'Ajente', 'A', 'Usuario', 'appgarcia.15@gmail.com', 22, 'derick.14', '7987a4e28d560872f7dc02ecd0e3ec3048f8efb436c5aac1ec360c8470944485', 972930),
(3, 5431258246164, 'Jefe', 'A', 'Administrador', 'chemo@hotmail.com', 43, 'Chemo.garcia', 'c82562223208f0b3ca72c503604e0b34d69372e4791460bc3d30cbbb4e127c84', 117614),
(4, 3482243125646, 'Asuntos varios', 'A', 'Administrador', 'mynor_garcia@gmail.com', 44, 'mynor_garcia', 'eabe41d95b775a76dc22b30179a6ffe0590e8d97ed14ea588e2404a7517e32a7', 491241),
(5, 7848788748784, 'agente', 'A', 'Usuario', 'odilia@hotmail.com', 45, 'odilia_gacia', '933f444f3fc80f9acb287dcaf99335b3694add9db32bfbd0f95cff7127cd3cbd', 910797),
(6, 5879987878487, 'agente', 'A', 'Usuario', 'angela@gmail.com', 46, 'mary_castro ', '4549264c3210e981bc4e1e39afeff721f7d69e7327c6d89e22735b06d136abde', 450500),
(7, 7888958487878, 'Agente', 'A', 'Usuario', 'meches@gmail.com', 47, 'meches_tz', '92477483ee3143ad6841a57840ebf9e3e20d5cffa7b21a0591ae26b60018ed96', 75042),
(8, 5887888874874, 'Jefa asuntos municipales', 'A', 'Usuario', 'kevin@hotmail.com', 67, 'kevin_garcia', 'ff001fd62cb543d8e71e4cf4cf1255d1240a5a71cf19ca19d1fa61c6f91ba690', 813598);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`) VALUES
(1, 'Honda'),
(2, 'Toyota'),
(3, 'Mazda'),
(4, 'Hyundai'),
(5, 'Nissan'),
(6, 'International'),
(7, 'Ford'),
(8, 'Fire Bird'),
(9, 'Bajaj'),
(10, 'otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_mun` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `departamento_id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_mun`, `departamento_id_departamento`) VALUES
(2, 'Totonicapan', 1),
(3, 'Santa Lucia la Reforma', 1),
(4, 'San Bartolo', 1),
(5, 'Momostenango', 1),
(6, 'Santa Maria Chiquimula', 1),
(7, 'San Francisco El Alto', 1),
(8, 'San Cristobal Totonicapán', 1),
(9, 'San Andres Xecul', 1),
(10, 'Quetzaltenango', 2),
(11, 'San Carlos Sija', 2),
(12, 'Almolonga', 2),
(13, 'Cabrican', 2),
(14, 'Cajolá', 2),
(15, 'Cantel', 2),
(16, 'Coatepeque', 2),
(17, 'Colomba Costa Cuca', 2),
(18, 'Concepción Chiquirichapa', 2),
(19, 'El Palmar', 2),
(20, 'Flores Costa Cuca', 2),
(21, 'Génova Costa Cuca', 2),
(22, 'Huitán', 2),
(23, 'La Esperanza', 2),
(24, 'Olintepeque', 2),
(25, 'Palestina de los Altos', 2),
(26, 'Salcajá', 2),
(27, 'San Francisco La Unión', 2),
(28, 'San Juan Ostuncalco', 2),
(29, 'San Martín Sacatepéquez', 2),
(30, 'San Mateo', 2),
(31, 'San Miguel Siguila', 2),
(32, 'Sibilia', 2),
(33, 'Zunil', 2),
(34, 'Santa Cruz del Quiché', 3),
(35, 'Chiché', 3),
(36, 'Chinique', 3),
(37, 'Zacualpa', 3),
(38, 'Chajul', 3),
(39, 'Chichicastenango', 3),
(40, 'Patzité', 3),
(41, 'San Antonio Ilotenango', 3),
(42, 'San Pedro Jocopilas', 3),
(43, 'Cunén', 3),
(44, 'San Juan Cotzal', 3),
(45, 'Joyabaj', 3),
(46, 'Nebaj', 3),
(47, 'San Andrés Sajcabajá', 3),
(48, 'Uspantán', 3),
(49, 'Sacapulas', 3),
(50, 'San Bartolomé Jocotenango', 3),
(51, 'Canillá', 3),
(52, 'Chicamán', 3),
(53, 'Ixcán', 3),
(54, 'Ayutla', 4),
(55, 'El quetzal', 4),
(56, 'Ixchiguan', 4),
(57, 'Ocòs', 4),
(58, 'San Cridtobal Cucho', 4),
(59, 'San miguel ixchiguan', 4),
(60, 'Sibinal', 4),
(61, 'Tejutla', 4),
(62, 'Catarina', 4),
(63, 'El Rodeo', 4),
(64, 'La Reforma', 4),
(65, 'Pajapita', 4),
(66, 'San José Ojetenam', 4),
(67, 'San Pablo', 4),
(68, 'Sipacapa', 4),
(69, 'Comitancillo', 4),
(70, 'El Tumbador', 4),
(71, 'Malacatán', 4),
(72, 'Río Blanco', 4),
(73, 'San Lorenzo', 4),
(74, 'San Pedro Sacatepéquez', 4),
(75, 'Tacaná', 4),
(76, 'Concepción Tutuapa', 4),
(77, 'Esquipulas Palo Gordo', 4),
(78, 'Nuevo Progreso', 4),
(79, 'San Antonio Sacatepéquez', 4),
(80, 'San Marcos', 4),
(81, 'San Rafael Pie de La Cuesta', 4),
(82, 'Tajumulco', 4),
(83, 'Amatitlán', 5),
(84, 'Guatemala', 5),
(85, 'San José Pinula', 5),
(86, 'San Pedro Sacatepéquez', 5),
(87, 'Villa Nueva', 5),
(88, 'Chinautla', 5),
(89, 'Mixco', 5),
(90, 'San Juan Sacatepéquez', 5),
(91, 'San Raymundo', 5),
(92, 'Chuarrancho', 5),
(93, 'Palencia', 5),
(94, 'San Miguel Petapa', 5),
(95, 'Santa Catarina Pinula', 5),
(96, 'Fraijanes', 5),
(97, 'San José del Golfo', 5),
(98, 'San Pedro Ayampuc', 5),
(99, 'Villa Canales', 5),
(100, 'Dolores', 6),
(101, 'Melchor de Mencos', 6),
(102, 'San Francisco', 6),
(103, 'Sayaxché', 6),
(104, 'Flores', 6),
(105, 'Poptún', 6),
(106, 'San José', 6),
(107, 'La Libertad', 6),
(108, 'San Andrés', 6),
(109, 'San Luis', 6),
(110, 'Las Cruces', 6),
(111, 'San Benito', 6),
(112, 'Santa Ana', 6),
(113, 'Concepción', 7),
(114, 'San Antonio Palopó', 7),
(115, 'San Marcos La Laguna', 7),
(116, 'Santa Catarina Palopó', 7),
(117, 'Santa María Visitación', 7),
(118, 'Nahualá', 7),
(119, 'San José Chacayá', 7),
(120, 'San Pablo La Laguna', 7),
(121, 'Santa Clara La Laguna', 7),
(122, 'Santiago Atitlán', 7),
(123, 'Panajachel', 7),
(124, 'San Juan La Laguna', 7),
(125, 'San Pedro La Laguna', 7),
(126, 'Santa Cruz La Laguna', 7),
(127, 'Sololá', 7),
(128, 'San Andrés Semetabaj', 7),
(129, 'San Lucas Tolimán', 7),
(130, 'Santa Catarina Ixtahuacan', 7),
(131, 'Santa Lucía Utatlán', 7),
(132, 'Chahal', 8),
(133, 'Lanquín', 8),
(134, 'San Juan Chamelco', 8),
(135, 'Santa María Cahabón', 8),
(136, 'Tucurú', 8),
(137, 'Chisec', 8),
(138, 'Panzós', 8),
(139, 'San Pedro Carchá', 8),
(140, 'Senahú', 8),
(141, 'Cobán', 8),
(142, 'Raxruhá', 8),
(143, 'Santa Catalina La Tinta', 8),
(144, 'Tactic', 8),
(145, 'Fray Bartolomé de las Casas', 8),
(146, 'San Cristóbal Verapaz', 8),
(147, 'Santa Cruz Verapaz', 8),
(148, 'Tamahú', 8),
(149, 'Cubulco', 9),
(150, 'Salamá', 9),
(151, 'Granados', 9),
(152, 'San Jerónimo', 9),
(153, 'Purulhá', 9),
(154, 'San Miguel Chicaj', 9),
(155, 'Rabinal', 9),
(156, 'Santa Cruz el Chol', 9),
(157, 'El Estor', 10),
(158, 'Puerto Barrios', 10),
(159, 'Livingston', 10),
(160, 'Los Amates', 10),
(161, 'Morales', 10),
(162, 'Aguacatán', 11),
(163, 'Cuilco', 11),
(164, 'La Libertad', 11),
(165, 'San Gaspar Ixchil', 11),
(166, 'San Mateo Ixtatán', 11),
(167, 'San Rafael La Independencia', 11),
(168, 'Santa Ana Huista', 11),
(169, 'Santiago Chimaltenango', 11),
(170, 'Chiantla', 11),
(171, 'Huehuetenango', 11),
(172, 'Malacatancito', 11),
(173, 'San Ildefonso Ixtahuacán', 11),
(174, 'San Miguel Acatán', 11),
(175, 'San Rafael Petzal', 11),
(176, 'Santa Bárbara', 11),
(177, 'Tectitán', 11),
(178, 'Colotenango', 11),
(179, 'Jacaltenango', 11),
(180, 'Nentón', 11),
(181, 'San Juan Atitán', 11),
(182, 'San Pedro Necta', 11),
(183, 'San Sebastián Coatán', 11),
(184, 'Santa Cruz Barillas', 11),
(185, 'Todos Santos Cuchumatánes', 11),
(186, 'Concepción Huista', 11),
(187, 'La Democracia', 11),
(188, 'San Antonio Huista', 11),
(189, 'San Juan Ixcoy', 11),
(190, 'San Pedro Soloma', 11),
(191, 'San Sebastián', 11),
(192, 'Santa Eulalia', 11),
(193, 'Unión Cantinil', 11),
(194, 'Acatenango', 12),
(195, 'Patzicía', 12),
(196, 'San José Poaquil', 12),
(197, 'Santa Cruz Balanyá', 12),
(198, 'Chimaltenango', 12),
(199, 'Patzún', 12),
(200, 'San Juan Comalapa', 12),
(201, 'Tecpán', 12),
(202, 'El Tejar', 12),
(203, 'Pochuta', 12),
(204, 'San Martín Jilotepeque', 12),
(205, 'Yepocapa', 12),
(206, 'Parramos', 12),
(207, 'San Andrés Itzapa', 12),
(208, 'Santa Apolonia', 12),
(209, 'Zaragoza', 12),
(210, 'El Jícaro', 13),
(211, 'San Antonio La Paz', 13),
(212, 'Guastatoya', 13),
(213, 'San Cristóbal Acasaguastlán', 13),
(214, 'Morazán', 13),
(215, 'Sanarate', 13),
(216, 'San Agustín Acasaguastlán', 13),
(217, 'Sansare', 13),
(218, 'Escuintla', 14),
(219, 'La Gomera', 14),
(220, 'San José', 14),
(221, 'Tiquisate', 14),
(222, 'Guanagazapa', 14),
(223, 'Masagua', 14),
(224, 'San Vicente Pacaya', 14),
(225, 'Iztapa', 14),
(226, 'Nueva Concepción', 14),
(227, 'Santa Lucía Cotzumalguapa', 14),
(228, 'La Democracia', 14),
(229, 'Palín', 14),
(230, 'Siquinalá', 14),
(231, 'Jalapa', 15),
(232, 'San Luis Jilotepeque', 15),
(233, 'Mataquescuintla', 15),
(234, 'San Manuel Chaparrón', 15),
(235, 'Monjas', 15),
(236, 'San Pedro Pinula', 15),
(237, 'San Carlos Alzatate', 15),
(238, 'Agua Blanca', 16),
(239, 'Conguaco', 16),
(240, 'Jerez', 16),
(241, 'Quesada', 16),
(242, 'Zapotitlán', 16),
(243, 'Asunción Mita', 16),
(244, 'El Adelanto', 16),
(245, 'Jutiapa', 16),
(246, 'San José Acatempa', 16),
(247, 'Atescatempa', 16),
(248, 'El Progreso', 16),
(249, 'Moyuta', 16),
(250, 'Santa Catarina Mita', 16),
(251, 'Comapa', 16),
(252, 'Jalpatagua', 16),
(253, 'Pasaco', 16),
(254, 'Yupiltepeque', 16),
(255, 'Champerico', 17),
(256, 'San Andrés Villa Seca', 17),
(257, 'Santa Cruz Muluá', 17),
(258, 'El Asintal', 17),
(259, 'San Felipe', 17),
(260, 'Nuevo San Carlos', 17),
(261, 'San Martín Zapotitlán', 17),
(262, 'Retalhuleu', 17),
(263, 'San Sebastián', 17),
(264, 'Alotenango', 18),
(265, 'Magdalena Milpas Altas', 18),
(266, 'San Lucas Sacatepéquez', 18),
(267, 'Santa María de Jesús', 18),
(268, 'La Antigua Guatemala', 18),
(269, 'Pastores', 18),
(270, 'San Miguel Dueñas', 18),
(271, 'Santiago Sacatepéquez', 18),
(272, 'Ciudad Vieja', 18),
(273, 'San Antonio Aguas Calientes', 18),
(274, 'Santa Catarina Barahona', 18),
(275, 'Santo Domingo Xenacoj', 18),
(276, 'Jocotenango', 18),
(277, 'San Bartolomé Milpas Altas', 18),
(278, 'Santa Lucía Milpas Altas', 18),
(279, 'Sumpango', 18),
(280, 'Barberena', 19),
(281, 'Guazacapán', 19),
(282, 'San Juan Tecuaco', 19),
(283, 'Santa Rosa de Lima', 19),
(284, 'Casillas', 19),
(285, 'Nueva Santa Rosa', 19),
(286, 'San Rafaél Las Flores', 19),
(287, 'Taxisco', 19),
(288, 'Chiquimulilla', 19),
(289, 'Oratorio', 19),
(290, 'Santa Cruz Naranjo', 19),
(291, 'Cuilapa', 19),
(292, 'Pueblo Nuevo Viñas', 19),
(293, 'Santa María Ixhuatán', 19),
(294, 'Chicacao', 20),
(295, 'Pueblo Nuevo', 20),
(296, 'San Bernardino', 20),
(297, 'San Juan Bautista', 20),
(298, 'Santa Bárbara', 20),
(299, 'Cuyotenango', 20),
(300, 'Río Bravo', 20),
(301, 'San Francisco Zapotitlán', 20),
(302, 'San Lorenzo', 20),
(303, 'Santo Domingo', 20),
(304, 'Mazatenango', 20),
(305, 'Samayac', 20),
(306, 'San Gabriel', 20),
(307, 'San Miguel Panán', 20),
(308, 'Santo Tomás La Unión', 20),
(309, 'Patulul', 20),
(310, 'San Antonio', 20),
(311, 'San José El Ídolo', 20),
(312, 'San Pablo Jocopilas', 20),
(313, 'Zunilito', 20),
(314, 'Camotán', 21),
(315, 'Ipala', 21),
(316, 'San Jacinto', 21),
(317, 'Chiquimula', 21),
(318, 'Jocotán', 21),
(319, 'San José La Arada', 21),
(320, 'Concepción Las Minas', 21),
(321, 'Olopa', 21),
(322, 'San Juan Ermita', 21),
(323, 'Esquipulas', 21),
(324, 'Quezaltepeque', 21),
(325, 'Cabañas', 22),
(326, 'La Unión', 22),
(327, 'Usumatlán', 22),
(328, 'Estanzuela', 22),
(329, 'Río Hondo', 22),
(330, 'Zacapa', 22),
(331, 'Gualán', 22),
(332, 'San Diego', 22),
(333, 'Huité', 22),
(334, 'Teculután', 22),
(335, 'N/A', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`) VALUES
(1, 'Kevin Tomás', 'García Castro', '1995-08-09'),
(7, 'Kevin Tomas de jesus', 'Garcia Hernandez', '1996-07-07'),
(22, 'Derick Emmanuel ', 'Vasquez Lòpez', '1992-08-07'),
(23, 'Pedro Rodolfo', 'Garcia Castro', '1980-08-07'),
(26, 'Tomas Rincon', 'Roncero ', '1960-08-08'),
(31, 'Juan casrlos', 'Garcia Hernandez', '1921-01-01'),
(34, 'Mauricio fornute', 'Rocoj zaquiq', '1991-10-02'),
(37, 'Fernando', 'Muslera', '1992-10-04'),
(40, 'Gorge mauricio', 'Méndez lopez', '1997-10-07'),
(43, 'Anselomo', 'Garcia', '1994-10-08'),
(44, 'Mynor', 'García ', '1991-04-20'),
(45, 'odilia', 'garcia', '1985-10-11'),
(46, 'maricruz', 'castro', '1992-05-07'),
(47, 'meches', 'tzunun', '1961-01-29'),
(48, 'angela', 'garcia ', '2004-02-05'),
(51, 'Jose Evaristo ', 'Risales caniz', '2005-09-29'),
(54, 'miguel cristobal', 'pacheco pretzantzin', '1951-07-30'),
(57, 'asdf', 'agustina', '2000-08-07'),
(62, '', '', '0000-00-00'),
(63, 'Carlos Cristobal', 'Pachco Pacheco', '1990-04-04'),
(64, 'Ricardo rolando', 'Ramos hernandez', '1994-10-14'),
(65, 'Juanito mariano', 'Hernandez torrez', '2002-04-07'),
(66, 'René Ricardo ', 'Ajucum Pérez', '1998-10-09'),
(67, 'kevin Tomás', 'Garcia Castro', '2000-04-11'),
(68, 'Melvin Israel', 'Juarez López', '1990-08-07'),
(69, '', '', '0000-00-00'),
(70, 'Julio Daniel', 'Camey Rodriguez', '1990-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piloto`
--

CREATE TABLE `piloto` (
  `id_piloto` int(11) NOT NULL,
  `numero_licencia` bigint(20) NOT NULL,
  `domicilio` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `persona_id_persona` int(11) DEFAULT NULL,
  `tipo_licencia_id_tipo` int(11) NOT NULL,
  `municipio_id_municipio` int(11) DEFAULT NULL,
  `ayudante_id_ayudante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `piloto`
--

INSERT INTO `piloto` (`id_piloto`, `numero_licencia`, `domicilio`, `telefono`, `persona_id_persona`, `tipo_licencia_id_tipo`, `municipio_id_municipio`, `ayudante_id_ayudante`) VALUES
(19, 1000000000000, '4a. callle zona 1', '55587884', 63, 2, 137, 20),
(20, 3346125431463, '12 av 7-08 zona 6', '66431231', 66, 2, 214, 21),
(21, 1558788887871, 'Frente los chorros', '55548788', 70, 1, 8, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id_ruta`, `nombre`, `descripcion`) VALUES
(4, 'Totonicapan-Nimasac', 'Ruta que va desde Nimasac hacia Totonicapán'),
(6, 'Totonicapán-Paqui', ''),
(7, 'Dentro de la ciudad', 'Ruta que se moviliza por toda la ciudad'),
(8, 'Cuatro caminos a Totonicapán', ''),
(9, 'chiyax, rastro municipal', 'viceversa (ampliacion enro )');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo_vehiculo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `abreviatura` varchar(4) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `tipo_vehiculo`, `abreviatura`) VALUES
(1, 'Autobus', 'ABS'),
(2, 'Microbus', 'MCB'),
(3, 'Automóvil', 'AMV'),
(4, 'Camion', 'CMO'),
(5, 'Mototaxi', 'MTX'),
(6, 'Pick-up', 'PKU'),
(7, 'Motocicleta', 'MCT'),
(8, 'Panel', 'PNL'),
(9, 'otros', 'ORS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_licencia`
--

CREATE TABLE `tipo_licencia` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(4) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_licencia`
--

INSERT INTO `tipo_licencia` (`id_tipo`, `tipo`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'M'),
(5, 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `modelo` year(4) DEFAULT NULL,
  `tarjeta_circulacion` int(11) NOT NULL,
  `color_id_color` int(11) NOT NULL,
  `color_variante` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_placa` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_id_tipo` int(11) NOT NULL,
  `marca_id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `modelo`, `tarjeta_circulacion`, `color_id_color`, `color_variante`, `numero_placa`, `tipo_id_tipo`, `marca_id_marca`) VALUES
(19, 1996, 45888788, 1, '', 'M545SSE', 1, 7),
(20, 1996, 334661346, 5, '', 'P236UUA', 5, 9),
(21, 2012, 155455878, 6, 'Con franjas grises', 'M154SSA', 5, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ayudante`
--
ALTER TABLE `ayudante`
  ADD PRIMARY KEY (`id_ayudante`),
  ADD UNIQUE KEY `cui` (`cui`),
  ADD KEY `ayudante_municipio_fk` (`municipio_id_municipio`),
  ADD KEY `ayudante_persona_fk` (`persona_id_persona`);

--
-- Indices de la tabla `bitacora_delete`
--
ALTER TABLE `bitacora_delete`
  ADD PRIMARY KEY (`id_bitacora`);

--
-- Indices de la tabla `canton_aldea`
--
ALTER TABLE `canton_aldea`
  ADD PRIMARY KEY (`id_canton_aldea`),
  ADD KEY `canton_aldea_municipio_fk` (`municipio_id_municipio`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `consecion`
--
ALTER TABLE `consecion`
  ADD PRIMARY KEY (`id_consecion`),
  ADD UNIQUE KEY `consecion_piloto_fk` (`piloto_id_piloto`) USING BTREE,
  ADD UNIQUE KEY `consecion_vehiculo_fk` (`vehiculo_id_vehiculo`) USING BTREE,
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `consecion_contratista_fk` (`contratista_id_contratista`),
  ADD KEY `consecion_empleado_fk` (`empleado_id_empleado`),
  ADD KEY `consecion_ruta_fk` (`ruta_id_ruta`);

--
-- Indices de la tabla `contratista`
--
ALTER TABLE `contratista`
  ADD PRIMARY KEY (`id_contratista`),
  ADD UNIQUE KEY `cui` (`cui`),
  ADD KEY `contratista_canton_aldea_fk` (`canton_aldea_id_canton_aldea`),
  ADD KEY `contratista_persona_fk` (`persona_id_persona`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `cui` (`cui`),
  ADD KEY `empleado_persona_fk` (`persona_id_persona`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `municipio_departamento_fk` (`departamento_id_departamento`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `piloto`
--
ALTER TABLE `piloto`
  ADD PRIMARY KEY (`id_piloto`),
  ADD UNIQUE KEY `numero_licencia` (`numero_licencia`),
  ADD KEY `piloto_ayudante_fk` (`ayudante_id_ayudante`),
  ADD KEY `piloto_municipio_fk` (`municipio_id_municipio`),
  ADD KEY `piloto_persona_fk` (`persona_id_persona`),
  ADD KEY `piloto_tipo_licencia_fk` (`tipo_licencia_id_tipo`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id_ruta`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipo_licencia`
--
ALTER TABLE `tipo_licencia`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `numero_placa` (`numero_placa`),
  ADD UNIQUE KEY `tarjeta_circulación` (`tarjeta_circulacion`),
  ADD KEY `vehiculo_marca_fk` (`marca_id_marca`),
  ADD KEY `vehiculo_tipo_fk` (`tipo_id_tipo`),
  ADD KEY `vehiculo_color_fk` (`color_id_color`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ayudante`
--
ALTER TABLE `ayudante`
  MODIFY `id_ayudante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `bitacora_delete`
--
ALTER TABLE `bitacora_delete`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `canton_aldea`
--
ALTER TABLE `canton_aldea`
  MODIFY `id_canton_aldea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `consecion`
--
ALTER TABLE `consecion`
  MODIFY `id_consecion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `contratista`
--
ALTER TABLE `contratista`
  MODIFY `id_contratista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `piloto`
--
ALTER TABLE `piloto`
  MODIFY `id_piloto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tipo_licencia`
--
ALTER TABLE `tipo_licencia`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ayudante`
--
ALTER TABLE `ayudante`
  ADD CONSTRAINT `ayudante_municipio_fk` FOREIGN KEY (`municipio_id_municipio`) REFERENCES `municipio` (`id_municipio`),
  ADD CONSTRAINT `ayudante_persona_fk` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `canton_aldea`
--
ALTER TABLE `canton_aldea`
  ADD CONSTRAINT `canton_aldea_municipio_fk` FOREIGN KEY (`municipio_id_municipio`) REFERENCES `municipio` (`id_municipio`);

--
-- Filtros para la tabla `consecion`
--
ALTER TABLE `consecion`
  ADD CONSTRAINT `consecion_contratista_fk` FOREIGN KEY (`contratista_id_contratista`) REFERENCES `contratista` (`id_contratista`),
  ADD CONSTRAINT `consecion_empleado_fk` FOREIGN KEY (`empleado_id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `consecion_piloto_fk` FOREIGN KEY (`piloto_id_piloto`) REFERENCES `piloto` (`id_piloto`),
  ADD CONSTRAINT `consecion_ruta_fk` FOREIGN KEY (`ruta_id_ruta`) REFERENCES `ruta` (`id_ruta`),
  ADD CONSTRAINT `consecion_vehiculo_fk` FOREIGN KEY (`vehiculo_id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`);

--
-- Filtros para la tabla `contratista`
--
ALTER TABLE `contratista`
  ADD CONSTRAINT `contratista_canton_aldea_fk` FOREIGN KEY (`canton_aldea_id_canton_aldea`) REFERENCES `canton_aldea` (`id_canton_aldea`),
  ADD CONSTRAINT `contratista_persona_fk` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_persona_fk` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_departamento_fk` FOREIGN KEY (`departamento_id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `piloto`
--
ALTER TABLE `piloto`
  ADD CONSTRAINT `piloto_ayudante_fk` FOREIGN KEY (`ayudante_id_ayudante`) REFERENCES `ayudante` (`id_ayudante`),
  ADD CONSTRAINT `piloto_municipio_fk` FOREIGN KEY (`municipio_id_municipio`) REFERENCES `municipio` (`id_municipio`),
  ADD CONSTRAINT `piloto_persona_fk` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`),
  ADD CONSTRAINT `piloto_tipo_licencia_fk` FOREIGN KEY (`tipo_licencia_id_tipo`) REFERENCES `tipo_licencia` (`id_tipo`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_color_fk` FOREIGN KEY (`color_id_color`) REFERENCES `color` (`id_color`),
  ADD CONSTRAINT `vehiculo_marca_fk` FOREIGN KEY (`marca_id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `vehiculo_tipo_fk` FOREIGN KEY (`tipo_id_tipo`) REFERENCES `tipo` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
