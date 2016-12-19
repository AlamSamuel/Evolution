-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-11-2016 a las 11:24:59
-- Versión del servidor: 5.5.52-cll
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sokratom_developer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendarios`
--

CREATE TABLE IF NOT EXISTS `calendarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `type_events` varchar(200) NOT NULL,
  `evento` text NOT NULL,
  `status` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `calendarios`
--

INSERT INTO `calendarios` (`id`, `id_users`, `title`, `type_events`, `evento`, `status`, `fecha`, `created_at`, `updated_at`) VALUES
(8, 3, 'bfdbfd', 'bfdb', '                 \r\n                     bfdbf', 1, '2016-10-09', '2016-10-06 15:59:47', '0000-00-00 00:00:00'),
(10, 3, 'q', 'q', '                 \r\n                     q', 1, '2016-10-21', '2016-10-20 13:30:10', '0000-00-00 00:00:00'),
(11, 3, 'vfdv ', 'fgfdg', '                 \r\n                     gfdgdf', 1, '2016-10-13', '2016-10-24 20:34:08', '0000-00-00 00:00:00'),
(12, 3, 'fv bf', 'b vb ', '                 \r\n                     bvb', 1, '2016-10-14', '2016-10-24 20:34:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `messages` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment_forum`
--

CREATE TABLE IF NOT EXISTS `comment_forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `comments` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_content` varchar(200) NOT NULL,
  `id_courses` int(11) NOT NULL,
  `route` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_test`
--

CREATE TABLE IF NOT EXISTS `content_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_test` int(11) NOT NULL,
  `questions` varchar(300) NOT NULL,
  `answers` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `country` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afganistán'),
(2, 'Albania'),
(3, 'Alemania'),
(4, 'Algeria'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguila'),
(8, 'Antártida'),
(9, 'Antigua y Barbuda'),
(10, 'Antillas Neerlandesas'),
(11, 'Arabia Saudita'),
(12, 'Argentina'),
(13, 'Armenia'),
(14, 'Aruba'),
(15, 'Australia'),
(16, 'Austria'),
(17, 'Azerbayán'),
(18, 'Bélgica'),
(19, 'Bahamas'),
(20, 'Bahrein'),
(21, 'Bangladesh'),
(22, 'Barbados'),
(23, 'Belice'),
(24, 'Benín'),
(25, 'Bhután'),
(26, 'Bielorrusia'),
(27, 'Birmania'),
(28, 'Bolivia'),
(29, 'Bosnia y Herzegovina'),
(30, 'Botsuana'),
(31, 'Brasil'),
(32, 'Brunéi'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cabo Verde'),
(37, 'Camboya'),
(38, 'Camerún'),
(39, 'Canadá'),
(40, 'Chad'),
(41, 'Chile'),
(42, 'China'),
(43, 'Chipre'),
(44, 'Ciudad del Vaticano'),
(45, 'Colombia'),
(46, 'Comoras'),
(47, 'Congo'),
(48, 'Congo'),
(49, 'Corea del Norte'),
(50, 'Corea del Sur'),
(51, 'Costa de Marfil'),
(52, 'Costa Rica'),
(53, 'Croacia'),
(54, 'Cuba'),
(55, 'Dinamarca'),
(56, 'Dominica'),
(57, 'Ecuador'),
(58, 'Egipto'),
(59, 'El Salvador'),
(60, 'Emiratos Ãrabes Unidos'),
(61, 'Eritrea'),
(62, 'Eslovaquia'),
(63, 'Eslovenia'),
(64, 'España'),
(65, 'Estados Unidos de América'),
(66, 'Estonia'),
(67, 'Etiopía'),
(68, 'Filipinas'),
(69, 'Finlandia'),
(70, 'Fiyi'),
(71, 'Francia'),
(72, 'Gabón'),
(73, 'Gambia'),
(74, 'Georgia'),
(75, 'Ghana'),
(76, 'Gibraltar'),
(77, 'Granada'),
(78, 'Grecia'),
(79, 'Groenlandia'),
(80, 'Guadalupe'),
(81, 'Guam'),
(82, 'Guatemala'),
(83, 'Guayana Francesa'),
(84, 'Guernsey'),
(85, 'Guinea'),
(86, 'Guinea Ecuatorial'),
(87, 'Guinea-Bissau'),
(88, 'Guyana'),
(89, 'Haití'),
(90, 'Honduras'),
(91, 'Hong kong'),
(92, 'Hungría'),
(93, 'India'),
(94, 'Indonesia'),
(95, 'Irán'),
(96, 'Irak'),
(97, 'Irlanda'),
(98, 'Isla Bouvet'),
(99, 'Isla de Man'),
(100, 'Isla de Navidad'),
(101, 'Isla Norfolk'),
(102, 'Islandia'),
(103, 'Islas Bermudas'),
(104, 'Islas Caimán'),
(105, 'Islas Cocos (Keeling)'),
(106, 'Islas Cook'),
(107, 'Islas Feroe'),
(108, 'Islas Georgias del Sur y Sandwich del Sur'),
(109, 'Islas Heard y McDonald'),
(110, 'Islas Maldivas'),
(111, 'Islas Malvinas'),
(112, 'Islas Marianas del Norte'),
(113, 'Islas Marshall'),
(114, 'Islas Pitcairn'),
(115, 'Islas Salomón'),
(116, 'Islas Turcas y Caicos'),
(117, 'Islas Ultramarinas Menores de Estados Unidos'),
(118, 'Islas Vírgenes Británicas'),
(119, 'Islas Vírgenes de los Estados Unidos'),
(120, 'Israel'),
(121, 'Italia'),
(122, 'Jamaica'),
(123, 'Japón'),
(124, 'Jersey'),
(125, 'Jordania'),
(126, 'Kazajistán'),
(127, 'Kenia'),
(128, 'Kirgizstán'),
(129, 'Kiribati'),
(130, 'Kuwait'),
(131, 'Líbano'),
(132, 'Laos'),
(133, 'Lesoto'),
(134, 'Letonia'),
(135, 'Liberia'),
(136, 'Libia'),
(137, 'Liechtenstein'),
(138, 'Lituania'),
(139, 'Luxemburgo'),
(140, 'México'),
(141, 'Mónaco'),
(142, 'Macao'),
(143, 'MacedÃ´nia'),
(144, 'Madagascar'),
(145, 'Malasia'),
(146, 'Malawi'),
(147, 'Mali'),
(148, 'Malta'),
(149, 'Marruecos'),
(150, 'Martinica'),
(151, 'Mauricio'),
(152, 'Mauritania'),
(153, 'Mayotte'),
(154, 'Micronesia'),
(155, 'Moldavia'),
(156, 'Mongolia'),
(157, 'Montenegro'),
(158, 'Montserrat'),
(159, 'Mozambique'),
(160, 'Namibia'),
(161, 'Nauru'),
(162, 'Nepal'),
(163, 'Nicaragua'),
(164, 'Niger'),
(165, 'Nigeria'),
(166, 'Niue'),
(167, 'Noruega'),
(168, 'Nueva Caledonia'),
(169, 'Nueva Zelanda'),
(170, 'Omán'),
(171, 'Países Bajos'),
(172, 'Pakistán'),
(173, 'Palau'),
(174, 'Palestina'),
(175, 'Panamá'),
(176, 'Papúa Nueva Guinea'),
(177, 'Paraguay'),
(178, 'Perú'),
(179, 'Polinesia Francesa'),
(180, 'Polonia'),
(181, 'Portugal'),
(182, 'Puerto Rico'),
(183, 'Qatar'),
(184, 'Reino Unido'),
(187, 'República Dominicana'),
(188, 'Reunión'),
(189, 'Ruanda'),
(190, 'Rumanía'),
(191, 'Rusia'),
(192, 'Sahara Occidental'),
(193, 'Samoa'),
(194, 'Samoa Americana'),
(195, 'San Bartolomé'),
(196, 'San Cristóbal y Nieves'),
(197, 'San Marino'),
(198, 'San Martín (Francia)'),
(199, 'San Pedro y Miquelón'),
(200, 'San Vicente y las Granadinas'),
(201, 'Santa Elena'),
(202, 'Santa Lucía'),
(203, 'Santo Tomé y Príncipe'),
(204, 'Senegal'),
(205, 'Serbia'),
(206, 'Seychelles'),
(207, 'Sierra Leona'),
(208, 'Singapur'),
(209, 'Siria'),
(210, 'Somalia'),
(211, 'Sri lanka'),
(212, 'Sudáfrica'),
(213, 'Sudán'),
(214, 'Suecia'),
(215, 'Suiza'),
(216, 'Surinám'),
(217, 'Svalbard y Jan Mayen'),
(218, 'Swazilandia'),
(219, 'Tadjikistán'),
(220, 'Tailandia'),
(221, 'Taiwán'),
(222, 'Tanzania'),
(223, 'Territorio Británico del Océano Ãndico'),
(224, 'Territorios Australes y Antárticas Franceses'),
(225, 'Timor Oriental'),
(226, 'Togo'),
(227, 'Tokelau'),
(228, 'Tonga'),
(229, 'Trinidad y Tobago'),
(230, 'Tunez'),
(231, 'Turkmenistán'),
(232, 'Turquía'),
(233, 'Tuvalu'),
(234, 'Ucrania'),
(235, 'Uganda'),
(236, 'Uruguay'),
(237, 'Uzbekistán'),
(238, 'Vanuatu'),
(239, 'Venezuela'),
(240, 'Vietnam'),
(241, 'Wallis y Futuna'),
(242, 'Yemen'),
(243, 'Yibuti'),
(244, 'Zambia'),
(245, 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(200) NOT NULL,
  `sub_theme` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cvs`
--

CREATE TABLE IF NOT EXISTS `cvs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `file` varchar(300) NOT NULL,
  `category` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `name_user` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cvs`
--

INSERT INTO `cvs` (`id`, `id_users`, `file`, `category`, `date`, `updated_at`, `created_at`, `name_user`) VALUES
(1, 3, 'Analisis_de_sistemas de info.docx', 'Informatica', '0000-00-00', '0000-00-00', '0000-00-00', 'licardof fene'),
(2, 6, 'Daria_Logo.svg.png', 'Contabilidad', '0000-00-00', '0000-00-00', '0000-00-00', 'Claire'),
(3, 6, 'ver ejemplo.docx', 'Contabilidad', '0000-00-00', '0000-00-00', '0000-00-00', 'Claire');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `id_users` int(11) NOT NULL,
  `type_documents` varchar(200) NOT NULL,
  `route` varchar(200) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `email_send` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `documents` varchar(200) NOT NULL,
  `messajes` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluation`
--

CREATE TABLE IF NOT EXISTS `evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions` text NOT NULL,
  `answers` text NOT NULL,
  `type_questions` varchar(200) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_courses` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluation_teacher`
--

CREATE TABLE IF NOT EXISTS `evaluation_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_students` int(11) NOT NULL,
  `id_teachers` int(11) NOT NULL,
  `puntuation` varchar(200) NOT NULL,
  `evaluate` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `messages` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `id_courses` int(11) NOT NULL,
  `cantity_modules` int(11) NOT NULL,
  `description` text NOT NULL,
  `modules` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`id`, `name`, `id_courses`, `cantity_modules`, `description`, `modules`, `created_at`, `updated_at`) VALUES
(0, 'curso de labia', 987654321, 2147483647, 'Vamo a aprender', 'que es esto? ', '2016-09-15 21:07:26', '2016-09-15 21:07:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `comentary` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('enmanuel97@gmail.com', '14bcabbb0a9bf528dd840dc67bc15a4be840cdc844cec908f81e1df29738ff68', '2016-09-06 21:37:41'),
('enmanuel9713@gmail.com', 'ce2ec422dfaeee493e3763d2c03f90b80899777897691314b91e1c2c8275e769', '2016-10-07 16:27:52'),
('cfenelon@sokratomanagement.com', '50aeff364b0d348b12b15131e8e0024c5a059f53d2a52e0fb44920e81e138345', '2016-10-13 16:39:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizarra_digital`
--

CREATE TABLE IF NOT EXISTS `pizarra_digital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `id_students` int(11) NOT NULL,
  `route` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practices`
--

CREATE TABLE IF NOT EXISTS `practices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `type_practice` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `route` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repositos`
--

CREATE TABLE IF NOT EXISTS `repositos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `content` varchar(100) NOT NULL,
  `id_users` int(11) NOT NULL,
  `route` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `original_filename` varchar(233) NOT NULL,
  `mime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `value` varchar(200) NOT NULL,
  `id_practice` int(11) NOT NULL,
  `date_test` date NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_practice` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type_test` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) NOT NULL,
  `id_card` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `country` varchar(300) NOT NULL,
  `address` varchar(200) NOT NULL,
  `genre` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `file` varchar(300) NOT NULL,
  `date_create` date NOT NULL,
  `last_login` datetime NOT NULL,
  `remember_token` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `first_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `full_name`, `id_card`, `email`, `password`, `phone`, `country`, `address`, `genre`, `status`, `rol`, `file`, `date_create`, `last_login`, `remember_token`, `created_at`, `updated_at`, `first_login`) VALUES
(2, 'Enmanuel De La Cruz', '005487824185454132141', 'enmanuel9713@gmail.com', '$2y$10$i0ak1fLH/nuyx3pir3lpPe7HzUmTTJJsYbuZbIWCw71Xdu.YWh36u', '8099060295', '', 'sdcfsdfsdfds', 'Hombre', 1, 1, '', '0000-00-00', '2016-10-04 20:18:03', 'qXx79kk1EJuopCBdLPWSEBHSsOcQGgfWHo9c3Hlvj1yi3ujRuNOTn60lCgSt', '2016-10-05 00:18:03', '2016-09-19 19:57:56', '2016-10-04 20:17:42'),
(3, 'licardof fene', 'pp22222222', 'lifenelon@sokratomanagement.com', '$2y$10$2nF1bPLREyKXlp1kYoWlgOk.N8sNVhNWJMKQvTka33SUwqbQkEfLa', '8094040443', '', 'santo dominguo este ', 'Hombre', 1, 1, '', '0000-00-00', '2016-10-27 14:04:18', 'v4xtiQvEQiX56oTXAeixQU0ilUwh16iYGeTroSJ9GHsrRx65dOVzOBLjnNUy', '2016-10-31 18:41:06', '2016-08-31 21:59:39', '2016-10-31 14:41:06'),
(4, 'angel ', '02454854', 'angel@gmail.com', '$2y$10$GdrAlB46dvgbybnFdxFJ..4HxUcMKkWtVji7ftgNh8ue3h7IM7C1W', '809-452-7896', '', 'Sabana perdida #85', 'Hombre', 1, 1, '', '0000-00-00', '0000-00-00 00:00:00', 'jJzJ8TW8FUxY0SwewhOL1vyHWFDLbnaZyocRsF4LBw2DVNVWbYVTlOd6MARQ', '2016-10-03 14:00:17', '2016-09-08 23:34:34', '2016-09-29 15:06:27'),
(6, 'Claire', '15245845', 'cfenelon@sokratomanagement.com', '$2y$10$ECm/YjaOIiz7mXfMd0ET5OBJHO8uWBPwNBULdpNAaQPg.gjt3Jrci', '545', '', '454554', 'Hombre', 1, 1, '', '0000-00-00', '2016-10-31 10:24:03', 'L5LTpYYwS23BHHTw7POJJpGwBrBQ67UMHSe3GIbOSuQLRARjPqVhLZAW9Cgd', '2016-10-31 20:00:52', '2016-09-21 18:33:25', '2016-10-31 16:00:52'),
(7, 'luigi', '12345', 'luigi@gmail.com', '$2y$10$3PbuUsR1VflgJugqm3CLyOiOMRGKtOlZYuFpl4xPi06H6131Ge.pu', '574858', 'Santo Domingo', 'sadas', 'Hombre', 0, 1, 'fairy_tail_498__gray_vs__juvia_by_iiyametaii-daezyx7.jpg', '0000-00-00', '0000-00-00 00:00:00', '', '2016-09-23 13:21:50', '2016-09-15 20:52:44', '0000-00-00 00:00:00'),
(8, 'Lesk', '40256895326', 'cardolucas1@gmail.com', '$2y$10$4RD1PXHKQpvWt7amvizVwepLLt5adHIbKtBiFBMk5QBWegRk8lhC6', '8092596365', 'santo pueroo', 'lasmismas cosas#43', 'Hombre', 0, 4, 'Screenshot_1.png', '0000-00-00', '0000-00-00 00:00:00', '', '2016-10-31 14:35:08', '2016-09-19 21:06:08', '0000-00-00 00:00:00'),
(9, 'Juanmi Hernadez', '00000000', 'virtualoffice@josemanuelbenavent.com', '$2y$10$94N7T0h/QyWte4CC9k.r/.o.CqrT45/xuUrkyd1xdXLviIMqJ9Gdy', '+1654503287', 'Afganistán', 'Calle prolongacion siervas de maria', 'Hombre', 0, 1, '', '0000-00-00', '0000-00-00 00:00:00', '', '2016-10-31 20:02:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'sssssss', 'ssss', 'cfenelon@sokratomanagement.com', '$2y$10$RrI9FKuiUlGEhqwLeVEluenf/1Snu/URi8pwMaL2rTYV4MKw0yngq', '74444444', 'Afganistán', 'ssss', 'Hombre', 1, 1, '', '0000-00-00', '0000-00-00 00:00:00', '', '2016-10-21 13:30:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'steven', '635667527565352652', 'lfenelon@sokratomanagement.com', '$2y$10$Nl/qcm22ZYdjiflmWXYoiup7CosXRSqq6Qx6aEOcUbMljivXI4feG', '123456787665', 'Afganistán', 'lope', 'Hombre', 0, 3, '', '0000-00-00', '2016-10-12 11:31:04', 'lHPOAJHBPByZjqYxChh5mX9i17uqPwahcn8h9Di7eZLXGm08eeQuXKvrhoXe', '2016-10-31 14:35:25', '0000-00-00 00:00:00', '2016-10-12 11:29:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wikis`
--

CREATE TABLE IF NOT EXISTS `wikis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `name_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `wikis`
--

INSERT INTO `wikis` (`id`, `id_users`, `title`, `content`, `name_user`, `created_at`, `updated_at`, `slug`) VALUES
(1, 6, 'imagen corporal', 'efrsdcx', 'Claire', NULL, NULL, 'imagen-corporal'),
(2, 6, 'gfdg', 'fd', 'Claire', NULL, NULL, 'gfdg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
