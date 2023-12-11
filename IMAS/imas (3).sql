-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2023 a las 13:06:04
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
-- Base de datos: `imas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayudas`
--

CREATE TABLE `ayudas` (
  `a_id` int(11) NOT NULL,
  `a_usuarioFK` int(11) NOT NULL,
  `a_tipoayuda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ayudas`
--

INSERT INTO `ayudas` (`a_id`, `a_usuarioFK`, `a_tipoayuda`) VALUES
(1, 2, 'ECONOMICA'),
(2, 4, 'PSICOLOGICAS'),
(3, 4, 'MEDICAS'),
(4, 8, 'ECONOMICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `c_id` int(11) NOT NULL,
  `c_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`c_id`, `c_categoria`) VALUES
(1, 'ECONOMIA'),
(2, 'MEDICINA'),
(3, 'EDUCACION'),
(4, 'TECNOLOGIA'),
(5, 'ARTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `cr_id` int(11) NOT NULL,
  `cr_categoriaFK` int(11) NOT NULL,
  `cr_titulo` varchar(255) NOT NULL,
  `cr_descripcion` text NOT NULL,
  `cr_horainicial` time NOT NULL,
  `cr_horafinal` time NOT NULL,
  `cr_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`cr_id`, `cr_categoriaFK`, `cr_titulo`, `cr_descripcion`, `cr_horainicial`, `cr_horafinal`, `cr_foto`) VALUES
(1, 4, 'PROGRAMACION I', 'Si quieres aumentar tus ingresos, sumar nuevas habilidades profesionales o probar si realmente este es tu camino, estudiar programación es la clave.\r\nEl mundo avanza junto a la tecnología y es imprescindible saber cómo comunicarse en el lenguaje de las computadoras.\r\nApostar por la programación es sumar valor para ti.', '08:00:00', '00:00:00', '/IMAS/Cursos/CURSO20231211F052948.jpg'),
(2, 4, 'PROGRAMACION II', 'El curso de Programación II es un curso diseñado para estudiantes de entre 13 y 14 años que deseen ampliar sus conocimientos y habilidades en programación. El curso se centra en el aprendizaje de diferentes conceptos y técnicas avanzadas en programación, y busca desarrollar las habilidades necesarias para diseñar, codificar y depurar programas más complejos.', '10:00:00', '14:00:00', '/IMAS/Cursos/CURSO20231211F053528.jpg'),
(3, 1, 'CURSO DE CONTABILIDAD BASICA', 'En este curso de contabilidad aprenderás a desarrollar las cuentas y libros contables, el análisis financiero y la aplicación de la disciplina desde un enfoque global, teniendo en cuenta las Normas Internacionales de Información Financiera.  Al completar este curso estarás preparado para aplicar análisis financieros, adquiriendo los conceptos y fundamentos contables, que permitan el aprendizaje de la realización de libros contables.', '14:00:00', '18:00:00', '/IMAS/Cursos/CURSO20231211F053547.jpg'),
(4, 3, 'EDUCACION INFANTIL NEUROCIENCIA', 'Este curso se ha concebido con el objetivo de ofrecerles una alternativa para mejorar la comprensión de los fundamentos teóricos y prácticos de la neurociencia, brindándoles herramientas y conocimientos sólidos para su aplicación en el ámbito clínico y cognitivo. A lo largo de las diferentes unidades temáticas, exploraremos la neuroanatomía, la fisiología y la neurociencia de sistemas, proporcionándoles una base sólida en los principios fundamentales de esta disciplina.', '07:00:00', '17:00:00', '/IMAS/Cursos/CURSO20231211F053555.jpg'),
(5, 2, 'ESTETICA FACIAL', 'EL Curso de Estetica fácial esta desarrollado para todas las personas que quieren aprender todo lo relacionado a tipología de la piel, como realizar diferente terapias, limpiezas y acondicionamientos estéticos que brindan un resultado excelente.', '13:00:00', '20:00:00', '/IMAS/Cursos/CURSO20231211F053604.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleos`
--

CREATE TABLE `empleos` (
  `e_id` int(11) NOT NULL,
  `e_usuarioFK` int(11) NOT NULL,
  `e_nombre` varchar(255) NOT NULL,
  `e_requisitos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleos`
--

INSERT INTO `empleos` (`e_id`, `e_usuarioFK`, `e_nombre`, `e_requisitos`) VALUES
(1, 2, 'ATENCION AL CLIENTE', 'Persona capacitada con amplia atención al cliente.\r\nManejo de Herremientas Ofimatica\r\nExperiencia Laboral 1 año.\r\nEstudios Básicos: Tecnico'),
(2, 4, 'AUXILIAR EN ENFERMERIA', 'Experiencia Laboral 2 años.\r\nAtencion al cliente\r\nDisponibilidad a trabajar mas de 8 horas, cuando sea necesario.\r\nSalario 400 US'),
(3, 8, 'PROGRAMADOR SENIOR', 'Manejo lenguaje PHP MVC; Mysql.\r\nSalario 1000 US');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroayuda`
--

CREATE TABLE `registroayuda` (
  `ra_id` int(11) NOT NULL,
  `ra_usuarioFK` int(11) NOT NULL,
  `ra_ayudaFK` int(11) NOT NULL,
  `ra_motivo` varchar(255) NOT NULL,
  `ra_fecharespuesta` date NOT NULL,
  `ra_evidencia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registroayuda`
--

INSERT INTO `registroayuda` (`ra_id`, `ra_usuarioFK`, `ra_ayudaFK`, `ra_motivo`, `ra_fecharespuesta`, `ra_evidencia`) VALUES
(1, 3, 3, 'Cita medica pago por la atención. Envio epicrisis', '2023-12-18', '/IMAS/Ayudas/AYUDA2023-12-11F042522.pdf'),
(2, 6, 1, 'Préstamo de 500 US. Envio mi solicutud', '2023-12-18', '/IMAS/Ayudas/AYUDA2023-12-11F043359.pdf'),
(3, 7, 4, 'Prestamos bancario para sofwarre. Anexo Evidencia', '2023-12-18', '/IMAS/Ayudas/AYUDA2023-12-11F065528.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrocurso`
--

CREATE TABLE `registrocurso` (
  `rc_id` int(11) NOT NULL,
  `rc_usuarioFK` int(11) NOT NULL,
  `rc_cursoFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registrocurso`
--

INSERT INTO `registrocurso` (`rc_id`, `rc_usuarioFK`, `rc_cursoFK`) VALUES
(2, 3, 4),
(3, 3, 1),
(4, 6, 1),
(5, 6, 5),
(6, 7, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroempleo`
--

CREATE TABLE `registroempleo` (
  `re_id` int(11) NOT NULL,
  `re_usuarioFK` int(11) NOT NULL,
  `re_empleoFK` int(11) NOT NULL,
  `re_fecha` date NOT NULL,
  `re_cv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registroempleo`
--

INSERT INTO `registroempleo` (`re_id`, `re_usuarioFK`, `re_empleoFK`, `re_fecha`, `re_cv`) VALUES
(1, 3, 2, '2023-12-11', '/IMAS/Empleos/EMPLEO20231211F042422.pdf'),
(2, 6, 1, '2023-12-11', '/IMAS/Empleos/EMPLEO20231211F043427.pdf'),
(3, 7, 1, '2023-12-11', '/IMAS/Empleos/EMPLEO20231211F065417.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `u_id` int(11) NOT NULL,
  `u_identificacion` bigint(20) NOT NULL,
  `u_nombresrazon` varchar(255) NOT NULL,
  `u_celular` bigint(20) NOT NULL,
  `u_correo` varchar(255) NOT NULL,
  `u_contrasena` varchar(20) NOT NULL,
  `u_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`u_id`, `u_identificacion`, `u_nombresrazon`, `u_celular`, `u_correo`, `u_contrasena`, `u_rol`) VALUES
(1, 123456789, 'ADMINISTRADOR DEL SISTEMA', 123456789, 'adminsistema@gmail.com', '12345', 1),
(2, 12345, 'EMPRESA FINANZA SOCIAL S.A', 12345, 'finanza@gmail.com', '12345', 2),
(3, 12345, 'MANUEL OQUENDO LOGUERA', 12345, 'manuel@gmail.com', '12345', 3),
(4, 1234, 'INSTITO MEDICO COSTA RICA', 12345, 'intcosta@gmail.com', '12345', 2),
(5, 123456, 'LORAINE CONTRERAS', 12345, 'loraine@gmail.com', '12345', 3),
(6, 1234567, 'ANDRES PINEDA AMADO', 12345, 'andres@gmail.com', '12345', 3),
(7, 54321, 'ANDRE SALAS TORRES', 12345, 'andres@gmail.com', '12345', 3),
(8, 54321, 'ANDRE TECNOLOGY S.A', 12345, 'andres@gmail.com', '12345', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ayudas`
--
ALTER TABLE `ayudas`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `a_usuarioFK` (`a_usuarioFK`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`c_id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cr_id`),
  ADD KEY `cr_categoriaFK` (`cr_categoriaFK`);

--
-- Indices de la tabla `empleos`
--
ALTER TABLE `empleos`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `e_usuarioFK` (`e_usuarioFK`);

--
-- Indices de la tabla `registroayuda`
--
ALTER TABLE `registroayuda`
  ADD PRIMARY KEY (`ra_id`),
  ADD KEY `ra_usuarioFK` (`ra_usuarioFK`),
  ADD KEY `ra_ayudaFK` (`ra_ayudaFK`);

--
-- Indices de la tabla `registrocurso`
--
ALTER TABLE `registrocurso`
  ADD PRIMARY KEY (`rc_id`),
  ADD KEY `rc_usuarioFK` (`rc_usuarioFK`),
  ADD KEY `rc_cursoFK` (`rc_cursoFK`);

--
-- Indices de la tabla `registroempleo`
--
ALTER TABLE `registroempleo`
  ADD PRIMARY KEY (`re_id`),
  ADD KEY `re_usuarioFK` (`re_usuarioFK`),
  ADD KEY `re_empleoFK` (`re_empleoFK`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ayudas`
--
ALTER TABLE `ayudas`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleos`
--
ALTER TABLE `empleos`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registroayuda`
--
ALTER TABLE `registroayuda`
  MODIFY `ra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registrocurso`
--
ALTER TABLE `registrocurso`
  MODIFY `rc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registroempleo`
--
ALTER TABLE `registroempleo`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ayudas`
--
ALTER TABLE `ayudas`
  ADD CONSTRAINT `ayudas_ibfk_1` FOREIGN KEY (`a_usuarioFK`) REFERENCES `usuarios` (`u_id`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`cr_categoriaFK`) REFERENCES `categorias` (`c_id`);

--
-- Filtros para la tabla `empleos`
--
ALTER TABLE `empleos`
  ADD CONSTRAINT `empleos_ibfk_1` FOREIGN KEY (`e_usuarioFK`) REFERENCES `usuarios` (`u_id`);

--
-- Filtros para la tabla `registroayuda`
--
ALTER TABLE `registroayuda`
  ADD CONSTRAINT `registroayuda_ibfk_1` FOREIGN KEY (`ra_usuarioFK`) REFERENCES `usuarios` (`u_id`),
  ADD CONSTRAINT `registroayuda_ibfk_2` FOREIGN KEY (`ra_ayudaFK`) REFERENCES `ayudas` (`a_id`);

--
-- Filtros para la tabla `registrocurso`
--
ALTER TABLE `registrocurso`
  ADD CONSTRAINT `registrocurso_ibfk_1` FOREIGN KEY (`rc_usuarioFK`) REFERENCES `usuarios` (`u_id`),
  ADD CONSTRAINT `registrocurso_ibfk_2` FOREIGN KEY (`rc_cursoFK`) REFERENCES `cursos` (`cr_id`);

--
-- Filtros para la tabla `registroempleo`
--
ALTER TABLE `registroempleo`
  ADD CONSTRAINT `registroempleo_ibfk_1` FOREIGN KEY (`re_usuarioFK`) REFERENCES `usuarios` (`u_id`),
  ADD CONSTRAINT `registroempleo_ibfk_2` FOREIGN KEY (`re_empleoFK`) REFERENCES `empleos` (`e_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
