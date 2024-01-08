-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2024 a las 06:22:34
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinariapolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anamnesiscatemnesis`
--

CREATE TABLE `anamnesiscatemnesis` (
  `idAnamnesisCatemnesis` int(11) NOT NULL,
  `motivoConsulta` text DEFAULT NULL,
  `signosObservados` text DEFAULT NULL,
  `causaAparente` text DEFAULT NULL,
  `tratamiento` text DEFAULT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anamnesiscatemnesis`
--

INSERT INTO `anamnesiscatemnesis` (`idAnamnesisCatemnesis`, `motivoConsulta`, `signosObservados`, `causaAparente`, `tratamiento`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'Array', 'Array', 'Array', 'Array', '2023-08-31', '17:19:15', 1, 1),
(2, 'ds', 'dsa', 'dsa', 'dsa', '2023-09-01', '10:11:08', 4, 3),
(3, '1', '1', '1', '1', '2023-09-01', '10:20:52', 6, 5),
(4, 'Hola', 'Soy', 'Re', 'Feo', '2023-09-03', '20:35:45', 9, 1),
(5, 'Array1', 'Array2', 'Array1', '222', '2023-09-03', '21:47:31', 1, 1),
(6, 'EditarSoloAdministrador', 'feo', 'das', 'das', '2023-09-06', '10:43:17', 10, 1),
(7, '1', '1', '1', '1', '2023-09-13', '15:49:20', 11, 1),
(8, 'd', 's', '', 's', '2023-09-13', '15:55:32', 9, 1),
(9, '', '', 's', '', '2023-09-13', '15:56:11', 9, 1),
(10, '1', '1', '1', '1', '2023-09-13', '16:29:21', 16, 6),
(11, 'asd', 'asdas', 'das', 'dasda', '2023-09-13', '16:30:32', 17, 7),
(12, 'Motivo Consulta Editar', 'Signos observados Editar', 'Causa aparente Editar', 'Tratamiento Editar', '2023-09-28', '07:47:48', 28, 1),
(13, 'nn', 'nn', 'nn', 'nn', '2023-10-07', '12:06:04', 29, 1),
(14, 'dsadsa', 'g', 'h', 'hh', '2023-10-12', '11:23:41', 30, 1),
(15, 'Inapetencia', 'Fiebre, diarrea, ectoparásitos ', 'hemoparasitos', 'antibioterapia, vitaminizacion ', '2023-10-14', '15:15:57', 32, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexomascotapdf`
--

CREATE TABLE `anexomascotapdf` (
  `idPdf` int(11) NOT NULL,
  `Descripcion` text NOT NULL,
  `urlPDF` text NOT NULL,
  `fechaIngreso` date NOT NULL DEFAULT current_timestamp(),
  `horaIngreso` time NOT NULL DEFAULT current_timestamp(),
  `idMascota` int(11) NOT NULL,
  `idFechaIngreso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anexomascotapdf`
--

INSERT INTO `anexomascotapdf` (`idPdf`, `Descripcion`, `urlPDF`, `fechaIngreso`, `horaIngreso`, `idMascota`, `idFechaIngreso`) VALUES
(5, 'hola', 'Views/pdf/SeguimientoCasa (5).pdf', '2023-09-01', '09:45:33', 1, 1),
(6, 'feo', 'Views/pdf/Historico (7).pdf', '2023-09-01', '10:02:26', 1, 1),
(7, 'ajja', 'Views/pdf/ACA II (4).pdf', '2023-09-01', '10:02:48', 1, 1),
(8, 'Prueba archivo ', 'Views/pdf/SeguimientoCasa (5).pdf', '2023-09-01', '10:09:07', 1, 1),
(9, 'Prueba archivo 2', 'Views/pdf/faja.pdf', '2023-09-01', '10:09:07', 1, 1),
(10, 'das', 'Views/pdf/SeguimientoCasa (5).pdf', '2023-09-01', '14:08:35', 5, 6),
(11, 'Preuba', 'Views/pdf/Dialnet-Colombia-2694382.pdf', '2023-09-01', '20:30:52', 3, 4),
(12, 'Prueba', 'Views/pdf/ACA II.pdf', '2023-09-01', '20:58:18', 1, 1),
(13, 'as', 'Views/pdf/ACA II.pdf', '2023-09-03', '20:42:34', 1, 10),
(14, 'dasd', 'Views/pdf/RECLAMACIÓN DAÑOS A BIENES DE TERCEROS.pdf', '2023-09-11', '16:24:53', 1, 1),
(15, 'dasdad', 'Views/pdf/ACA III.pdf', '2023-09-13', '15:55:35', 1, 9),
(16, 'orueba', 'Views/pdf/ACA 3.1. PAZ Conflicto e Incusión Social _Docente_DIANAGAITAN.pdf', '2023-09-14', '19:37:30', 1, 21),
(17, 'das', 'Views/pdf/Cierre de negocios_compressed.pdf', '2023-09-15', '09:41:01', 1, 1),
(18, 'fasda', 'Views/pdf/Historico (13).pdf', '2023-09-26', '11:52:33', 1, 28),
(19, 'dasda', 'Views/pdf/Historico (18).pdf', '2023-10-12', '11:30:12', 1, 30),
(20, 'sda', 'Views/pdf/Historico (25).pdf', '2023-10-17', '22:20:36', 1, 33),
(21, 'dasd', 'Views/pdf/SeguimientoCasa (20).pdf', '2023-10-18', '12:18:29', 1, 34),
(22, 'asdsa', 'Views/pdf/Historico (27).pdf', '2023-10-19', '16:10:27', 1, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `propietario` text NOT NULL,
  `numeroCedula` text NOT NULL,
  `telefono` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `propietario`, `numeroCedula`, `telefono`) VALUES
(1, 'Johan Rengifo', '1070586140', '3122146368'),
(2, 'Felipe Solarte', '3122146368', '3122146368'),
(3, 'Felipe Caballero', '2', '3122146368'),
(4, 'Johana Torres', '1', '3122134321'),
(5, 'Alba Torres', '13', '3122146368'),
(6, 'Antonio', '00', '3122146368'),
(7, 'jorge', '09', '3122146368'),
(8, 'Felipe Solarte', '999', '3122134321'),
(9, 'Yulieth Godoy', '93151070', '3133408686');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `idDiagnostico` int(11) NOT NULL,
  `damnvitp` text DEFAULT NULL,
  `planDiagnostico` text NOT NULL,
  `diagnosticodefinitivo` text DEFAULT NULL,
  `pronostico` text DEFAULT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`idDiagnostico`, `damnvitp`, `planDiagnostico`, `diagnosticodefinitivo`, `pronostico`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'DAMNVITP Editar', 'Plan diagnostico Editar', 'Diagnostico definitivo Editar', 'Pronostico Editar', '2023-08-31', '17:20:30', 1, 1),
(2, 'sda', 'dsa', 'das', 'dsa', '2023-09-01', '10:11:09', 4, 3),
(3, 'DAMNVITP', 'Plan diagnostico', 'Diagnostico definitivo', 'Pronostico', '2023-09-01', '10:20:54', 6, 5),
(4, 'ja', 'je', 'jo', 'ji', '2023-09-03', '20:35:47', 9, 1),
(5, 'dsada', 'sad', 'asd', 'a', '2023-09-06', '10:43:18', 10, 1),
(6, 'DAMNVITP Editar1', 'Plan diagnostico Editar', 'Diagnostico definitivo Editar', 'Pronostico Edita', '2023-09-11', '15:27:24', 1, 1),
(7, 'DAMNVITP Edita1', 'Plan diagnostico Edita', 'Diagnostico definitivo Edita', 'Pronostico Edita', '2023-09-11', '15:27:55', 1, 1),
(8, '1', '1', '1', '1', '2023-09-13', '15:49:21', 11, 1),
(9, 'a', 'a', 'a', 'a', '2023-09-13', '15:55:34', 9, 1),
(10, 'das', 'dasd', 'asd', 'asd', '2023-09-13', '16:29:22', 16, 6),
(11, 'dsa', 'das', 'das', 'dasd', '2023-09-13', '16:30:33', 17, 7),
(12, 'dsads', 'dsa', 'das', 'dad', '2023-09-28', '07:47:51', 28, 1),
(13, 'sa', 'D', 'DSA', 'SAD', '2023-10-12', '11:30:11', 30, 1),
(14, 'infeccioso (hemoparasasitos)', 'cuadro hemático, test de erliquia, química sanguínea,frotis sanguineo , PCR hemoparasitos', 'erliquiasis ', 'favorable', '2023-10-14', '15:15:58', 32, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edad`
--

CREATE TABLE `edad` (
  `idEdad` int(11) NOT NULL,
  `edad` text NOT NULL,
  `idFechaIngreso` int(11) NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edad`
--

INSERT INTO `edad` (`idEdad`, `edad`, `idFechaIngreso`, `idMascota`) VALUES
(1, '1 año', 1, 1),
(2, '1 año', 2, 1),
(3, '1 año', 3, 2),
(4, '11 año', 4, 3),
(5, '3 año', 5, 4),
(6, '7 año', 6, 5),
(7, '1 año', 7, 1),
(8, '2 año', 8, 3),
(9, '1 año', 9, 1),
(10, '1 año', 10, 1),
(11, '2 año', 11, 1),
(12, '3 año', 12, 1),
(13, '3 año', 13, 1),
(14, '4 año', 14, 1),
(15, '12 año', 15, 6),
(16, '13 año', 16, 6),
(17, '11 año', 17, 7),
(18, '1 año', 18, 7),
(19, '1 año', 19, 7),
(20, '1 año', 20, 1),
(21, '1 año', 21, 1),
(22, '1 año', 22, 1),
(23, '1 año', 23, 1),
(24, '1 año', 24, 1),
(25, '1 año', 25, 1),
(26, '1 año', 26, 1),
(27, '1 año', 27, 1),
(28, '1 año', 28, 1),
(29, '1 año', 29, 1),
(30, '1 año', 30, 1),
(31, '7 año', 31, 8),
(32, '1 año', 32, 9),
(33, '10 dias', 33, 1),
(34, '2 años', 34, 1),
(35, '2 años', 35, 1),
(36, '3 años', 36, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `idEspecie` int(11) NOT NULL,
  `especie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`idEspecie`, `especie`) VALUES
(1, 'Canino'),
(2, 'Felino'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `textColor` varchar(20) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `descripcion`, `color`, `textColor`, `start`, `end`) VALUES
(5, 'hola', 'dsas', '#0d55fd', '#FFFFFF', '2023-08-30 12:00:00', '2023-08-30 12:00:00'),
(6, 'vcx', 'vxc', '#ff0000', '#FFFFFF', '2023-08-19 09:09:00', '2023-08-19 09:09:00'),
(7, 'Medico', 'fsd', '#c8ff00', '#FFFFFF', '2023-09-07 03:47:00', '2023-09-07 03:47:00'),
(8, 'Prueba Paola', 'Preuba ir veterinaria', '#07ed17', '#FFFFFF', '2023-09-02 08:27:00', '2023-09-02 08:27:00'),
(9, 'Prueba calendario', 'Prueba', '#4e2c2c', '#FFFFFF', '2023-09-16 21:14:00', '2023-09-16 21:14:00'),
(10, 'baño totto', 'baño toto', '#00ffd5', '#FFFFFF', '2023-09-07 20:00:00', '2023-09-07 20:00:00'),
(11, 'baño totto', 'baño toto', '#00ffd5', '#FFFFFF', '2023-10-05 20:00:00', '2023-10-05 20:00:00'),
(12, 'baño toto', 'Prueba', '#ff0000', '#FFFFFF', '2023-10-18 15:35:00', '2023-10-18 15:35:00'),
(13, 'hola', 'eqw', '#ff0000', '#FFFFFF', '2023-10-18 11:31:00', '2023-10-18 11:31:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenfisico`
--

CREATE TABLE `examenfisico` (
  `idExamenFisico` int(11) NOT NULL,
  `temperatura` text DEFAULT NULL,
  `pulso` text DEFAULT NULL,
  `mucosas` text DEFAULT NULL,
  `llenadoCapilar` text DEFAULT NULL,
  `Dolor` text DEFAULT NULL,
  `cardiaca` text DEFAULT NULL,
  `respiratoria` text DEFAULT NULL,
  `tusigeno` text DEFAULT NULL,
  `deshidratacion` text DEFAULT NULL,
  `condicionCorporal` text DEFAULT NULL,
  `peso` text DEFAULT NULL,
  `gangliosLinfaticos` text DEFAULT NULL,
  `Observaciones` text DEFAULT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `examenfisico`
--

INSERT INTO `examenfisico` (`idExamenFisico`, `temperatura`, `pulso`, `mucosas`, `llenadoCapilar`, `Dolor`, `cardiaca`, `respiratoria`, `tusigeno`, `deshidratacion`, `condicionCorporal`, `peso`, `gangliosLinfaticos`, `Observaciones`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'Temperatura', 'Pulso', 'Mucosas', 'Capilar', 'Dolor', 'cardiaca', 'respiratoria', 'tusigeno', 'Deshidratación', 'Condicion corporal	', 'Peso', 'Ganglios linfaticos	', 'Observaciones', '2023-08-31', '17:19:32', 1, 1),
(2, '1', '1', '1', '', '', '1', '1', '1', '', '', '1', '', '', '2023-09-01', '10:11:08', 4, 3),
(3, '1', '1', '1', '1', '', '', '', '', '', '', '', '', '', '2023-09-01', '10:20:52', 6, 5),
(4, '1', '', '1', '', '1', '', '', '', '', '1', '', '', '1', '2023-09-03', '20:35:46', 9, 1),
(5, 'Temperatura', 'Pulso', 'Mucosas', 'Capilar', 'Dolor', 'cardiaca', 'respiratoria', 'tusigeno', 'Deshidratación', 'Condicion corporal	', 'Peso', 'Ganglios linfaticos	', 'Observaciones', '2023-09-03', '21:00:09', 1, 1),
(6, '1', '1', '1', '', '1', '1', '1', '1', '', '1', '', '1', 'dsdasdasda', '2023-09-06', '10:43:17', 10, 1),
(7, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2023-09-13', '15:49:21', 11, 1),
(8, 'a', 'a', 'a', 'a', 'a', '', 'a', '', 'a', 'a', 'a', '', 'a', '2023-09-13', '15:55:32', 9, 1),
(9, '1', '', '', '1', '1', '1', '1', '', '1', '', '', '', '1', '2023-09-13', '16:29:21', 16, 6),
(10, '1', '1', '1', '1', '1', '11', '11', '1', '1', '1', '1', '1', '1', '2023-09-13', '16:30:33', 17, 7),
(11, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'adasda', '2023-09-28', '07:47:50', 28, 1),
(12, '19', 'das', 'das', 'dsad', 'asd', '12', 'af||', 'asd', 'asdas', 'das', 'das', 'das', 'dasd', '2023-10-12', '11:30:10', 30, 1),
(13, '40', 'fc', 'palidas', '5s', '3', '120lpm', '60rpm', '+', '0%', '3', '3.7kg', 'reactivos', '', '2023-10-14', '15:15:57', 32, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechaingreso`
--

CREATE TABLE `fechaingreso` (
  `idFechaIngreso` int(11) NOT NULL,
  `fecha` text NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fechaingreso`
--

INSERT INTO `fechaingreso` (`idFechaIngreso`, `fecha`, `idMascota`) VALUES
(1, '2023-08-28', 1),
(2, '2023-08-28', 1),
(3, '2023-08-29', 2),
(4, '2023-09-01', 3),
(5, '2023-09-01', 4),
(6, '2023-09-01', 5),
(7, '', 1),
(8, '2023-09-01', 3),
(9, '2023-09-03', 1),
(10, '2023-09-03', 1),
(11, '2023-09-13', 1),
(12, '2023-09-13', 1),
(13, '2023-09-13', 1),
(14, '2023-09-14', 1),
(15, '2023-09-13', 6),
(16, '2023-09-13', 6),
(17, '2023-09-13', 7),
(18, '2023-09-13', 7),
(19, '2023-09-13', 7),
(20, '2023-09-13', 1),
(21, '2023-09-13', 1),
(22, '2023-09-14', 1),
(23, '2023-09-25', 1),
(24, '2023-09-25', 1),
(25, '2023-09-25', 1),
(26, '2023-09-26', 1),
(27, '2023-09-26', 1),
(28, '2023-09-27', 1),
(29, '2023-10-07', 1),
(30, '2023-10-12', 1),
(31, '2023-10-14', 8),
(32, '2023-10-14', 9),
(33, '2023-10-14', 1),
(34, '2023-10-18', 1),
(35, '2023-10-18', 1),
(36, '2023-10-19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechamedico`
--

CREATE TABLE `fechamedico` (
  `idfechaMedico` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `idFecha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fechamedico`
--

INSERT INTO `fechamedico` (`idfechaMedico`, `idMedico`, `idFecha`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 6),
(7, 1, 6),
(8, 2, 6),
(9, 2, 7),
(10, 1, 8),
(11, 2, 9),
(12, 2, 10),
(13, 1, 11),
(14, 1, 12),
(15, 1, 13),
(16, 1, 14),
(17, 1, 15),
(18, 1, 16),
(19, 1, 17),
(20, 1, 18),
(21, 1, 19),
(22, 3, 20),
(23, 3, 21),
(24, 3, 22),
(25, 1, 23),
(26, 1, 24),
(27, 1, 25),
(28, 1, 26),
(29, 1, 27),
(30, 1, 28),
(31, 1, 29),
(32, 1, 30),
(33, 3, 31),
(34, 3, 32),
(35, 1, 33),
(36, 1, 34),
(37, 1, 35),
(38, 1, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotopeluqueria`
--

CREATE TABLE `fotopeluqueria` (
  `idFotoPeluqueria` int(11) NOT NULL,
  `fotoAntes` text NOT NULL,
  `fotoDespues` text NOT NULL,
  `observaciones` text DEFAULT NULL,
  `idFechaIngreso` int(11) NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fotopeluqueria`
--

INSERT INTO `fotopeluqueria` (`idFotoPeluqueria`, `fotoAntes`, `fotoDespues`, `observaciones`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'Views/img/fotoPeluqueria/nn.png', 'Views/img/fotoPeluqueria/qq.png', 'asd', 2, 1),
(2, 'Views/img/fotoPeluqueria/1.1.PNG', 'Views/img/fotoPeluqueria/1.4.PNG', 'dsa', 7, 1),
(3, 'Views/img/fotoPeluqueria/1.1.PNG', 'Views/img/fotoPeluqueria/1.3.PNG', 'dsa', 8, 3),
(4, 'Views/img/fotoPeluqueria/cc.png', 'Views/img/fotoPeluqueria/nn.png', 'dsasdsadsa', 12, 1),
(5, 'Views/img/fotoPeluqueria/cc.png', 'Views/img/fotoPeluqueria/cc.png', 'hola', 13, 1),
(6, 'Views/img/fotoPeluqueria/cc.png', 'Views/img/fotoPeluqueria/cc.png', 'hola', 14, 1),
(7, 'Views/img/fotoPeluqueria/sa.png', 'Views/img/fotoPeluqueria/sa.png', 'dsad', 15, 6),
(8, 'Views/img/fotoPeluqueria/cc.png', 'Views/img/fotoPeluqueria/cc.png', 'jiji', 19, 7),
(9, 'Views/img/fotoPeluqueria/nn.png', 'Views/img/fotoPeluqueria/nn.png', 'dsada', 20, 1),
(10, 'Views/img/fotoPeluqueria/descarga.jfif', 'Views/img/fotoPeluqueria/descarga (1).jfif', 'dsad', 31, 8),
(11, 'Views/img/fotoPeluqueria/cc.png', 'Views/img/fotoPeluqueria/sa.png', 'Ok', 35, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `genero` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `genero`) VALUES
(1, 'Macho'),
(2, 'Hembra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hopitalarioinsumo`
--

CREATE TABLE `hopitalarioinsumo` (
  `idHospitalInsumo` int(11) NOT NULL,
  `insumo` text NOT NULL,
  `dosis` text NOT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hopitalarioinsumo`
--

INSERT INTO `hopitalarioinsumo` (`idHospitalInsumo`, `insumo`, `dosis`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'nn', '4', '2023-09-25', '09:47:11', 24, 1),
(3, 'Geringas', '1', '2023-09-25', '10:30:21', 24, 1),
(5, 'ee', '2', '2023-09-25', '17:57:42', 28, 1),
(7, 'll', '1', '2023-09-25', '21:30:06', 28, 1),
(8, 'rr', '2', '2023-08-25', '21:30:18', 28, 1),
(9, 'rr', '2', '2023-09-25', '21:41:17', 28, 1),
(11, 'Geringas', '2', '2023-10-12', '11:30:11', 30, 1),
(12, 'Geringas', '3.2', '2023-10-14', '17:07:03', 33, 1),
(13, 'Geringas', '1', '2023-10-14', '22:47:22', 32, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horaingreso`
--

CREATE TABLE `horaingreso` (
  `idHoraIngreso` int(11) NOT NULL,
  `hora` time NOT NULL,
  `idFechaIngreso` int(11) NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horaingreso`
--

INSERT INTO `horaingreso` (`idHoraIngreso`, `hora`, `idFechaIngreso`, `idMascota`) VALUES
(1, '18:44:00', 2, 1),
(2, '20:22:00', 7, 1),
(3, '20:24:00', 8, 3),
(4, '15:59:00', 12, 1),
(5, '15:59:00', 13, 1),
(6, '16:02:00', 14, 1),
(7, '16:27:00', 15, 6),
(8, '16:33:00', 19, 7),
(9, '16:53:00', 20, 1),
(10, '10:33:00', 31, 8),
(11, '12:19:00', 35, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacionoperaciones`
--

CREATE TABLE `informacionoperaciones` (
  `idOperaciones` int(11) NOT NULL,
  `procedimiento` text NOT NULL,
  `tecnica` text NOT NULL,
  `explicacionTecnica` text NOT NULL,
  `ventajas` text NOT NULL,
  `ciudad` text NOT NULL,
  `consecuencias` text NOT NULL,
  `secuelas` text NOT NULL,
  `riesgo` text NOT NULL,
  `extraordinarias` text NOT NULL,
  `especialidad` text NOT NULL,
  `alternativas` text NOT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idMascota` int(11) NOT NULL,
  `idFechaIngreso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `informacionoperaciones`
--

INSERT INTO `informacionoperaciones` (`idOperaciones`, `procedimiento`, `tecnica`, `explicacionTecnica`, `ventajas`, `ciudad`, `consecuencias`, `secuelas`, `riesgo`, `extraordinarias`, `especialidad`, `alternativas`, `fechaHistorico`, `horaHistorico`, `idMascota`, `idFechaIngreso`) VALUES
(1, 'Nombre Del procedimiento1', 'Explicacion tecnica1', 'Explicacion tecnica1', 'Ventajas del mismo1', 'Girardot', 'Consecuencias colaterales1', 'Secuelas1', 'Riesgos1', 'Situaciones extraordinarias1', 'Especialidad1', 'Alternativa1', '2023-10-04', '22:08:31', 1, 28),
(2, 'fhgfhg', 'hgf', 'jhv', 'ghhg', 'hc', 'gc', 'hjv', 'cgnc', 'hgc', 'hcg', 'hd', '2023-10-07', '12:16:38', 1, 29),
(3, 'ashdj', 'jsda', 'dab', 'dasj', 'girardot', 'dasvdh', 'sada', 'asda', 'sda', 'dasd', 'ads', '2023-10-12', '11:30:12', 1, 30),
(4, 'Ovariohisterectomia', 'OVH lateral', 'Procedimiento quirúrgico en el cual se extirpan ambos ovarios y el útero ', 'ausencia de signos y comportamiento propios del estro, infertilidad definitiva y disminución de probabilidades de presentar patologías estrogénicas ', 'girardot', 'paro cardiorespiratorio', 'no aplica', 'paro cardiorespiratorio', 'muerte', 'cirujano', 'tratamiento hormonal inyectado', '2023-10-14', '16:46:59', 9, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `idInsumos` int(11) NOT NULL,
  `Insumo` text NOT NULL,
  `totalImsumos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`idInsumos`, `Insumo`, `totalImsumos`) VALUES
(1, 'Geringas', '0.6'),
(2, 'nn', '7'),
(3, 'ee', '6'),
(4, 'aa', '0'),
(5, 'tt', '8'),
(6, 'rr', '14'),
(7, 'll', '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intrahospitalario`
--

CREATE TABLE `intrahospitalario` (
  `idIntraHospitalario` int(11) NOT NULL,
  `principioActivo` text DEFAULT NULL,
  `posologia` text DEFAULT NULL,
  `dosis` text DEFAULT NULL,
  `via` text DEFAULT NULL,
  `frecuencia` text DEFAULT NULL,
  `duracion` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) DEFAULT NULL,
  `idMascota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `intrahospitalario`
--

INSERT INTO `intrahospitalario` (`idIntraHospitalario`, `principioActivo`, `posologia`, `dosis`, `via`, `frecuencia`, `duracion`, `observaciones`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(12, 'Alsetaideido', 'Posologia', '200', 'Via', 'Frecuencia', 'yguy', 'sa', '2023-09-25', '16:39:59', 24, 1),
(13, 'Asetaminofe', 'Posologia', '20', 'Via', 'dsad', 'das', 'asd', '2023-09-25', '17:37:03', 24, 1),
(15, 'Asetaminofe', 'Posologia', '10', '', '', '', '', '2023-09-26', '06:55:38', 24, 1),
(16, 'Asetaminofe', 'Posologia', '10', '', '', '', '', '2023-08-24', '06:55:38', 24, 1),
(17, 'Asetaminofen', 'Posologia', '30', 'dsa', 's', 'dad', 'as', '2023-09-28', '07:47:51', 28, 1),
(18, 'Asetaminofen', '', '80', '', '', '', '', '2023-10-12', '11:31:03', 30, 1),
(19, 'Meloxicam', '10mg/kg', '0.3', 'oral', 'cada 24 horas', '5 dias consecutivos', 'dar antibiotico con el estomago lleno', '2023-10-14', '15:15:58', 32, 9),
(20, 'Asetaminofen', '', '0.5', '', '', '', '', '2023-10-14', '22:46:26', 33, 1),
(21, 'Meloxicam', '', '0.3', '', '', '', '', '2023-10-14', '23:22:23', 33, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listadepurada`
--

CREATE TABLE `listadepurada` (
  `idListaDepurada` int(11) NOT NULL,
  `depurada` text DEFAULT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `listadepurada`
--

INSERT INTO `listadepurada` (`idListaDepurada`, `depurada`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'depura 11', '2023-08-31', '17:20:09', 1, 1),
(2, 'depura 2', '2023-08-31', '17:20:10', 1, 1),
(3, 'depura 1', '2023-09-01', '10:17:40', 4, 3),
(4, 'depura 2', '2023-09-01', '10:17:40', 4, 3),
(5, '3', '2023-09-01', '10:17:40', 4, 3),
(6, 'depura 1', '2023-09-01', '10:20:53', 6, 5),
(7, 'depura 2', '2023-09-01', '10:20:53', 6, 5),
(8, 'depura 11111', '2023-09-03', '20:35:47', 9, 1),
(9, 'depura 1', '2023-09-06', '10:43:18', 10, 1),
(10, '1', '2023-09-13', '15:49:21', 11, 1),
(11, '2', '2023-09-13', '15:49:21', 11, 1),
(12, 'aaa', '2023-09-13', '15:55:34', 9, 1),
(13, 'bbb', '2023-09-13', '15:55:34', 9, 1),
(14, 'das', '2023-09-13', '16:29:22', 16, 6),
(15, 'asda', '2023-09-13', '16:30:33', 17, 7),
(16, 'depura 1', '2023-09-28', '07:47:50', 28, 1),
(17, 'depura 2', '2023-09-28', '07:47:50', 28, 1),
(18, 'depura 1', '2023-10-12', '11:30:11', 30, 1),
(19, 'depura 2', '2023-10-12', '11:30:11', 30, 1),
(20, 'fiebre', '2023-10-14', '15:15:58', 32, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listaproblema`
--

CREATE TABLE `listaproblema` (
  `idProblema` int(11) NOT NULL,
  `problema` text DEFAULT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `listaproblema`
--

INSERT INTO `listaproblema` (`idProblema`, `problema`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'Problema 111', '2023-08-31', '17:20:09', 1, 1),
(2, 'Problema 12', '2023-08-31', '17:20:09', 1, 1),
(3, 'Problema1', '2023-09-01', '10:11:09', 4, 3),
(4, 'Problema 2', '2023-09-01', '10:11:09', 4, 3),
(5, 'diarrea', '2023-09-01', '10:11:09', 4, 3),
(6, 'Problema1', '2023-09-01', '10:20:53', 6, 5),
(7, 'Problema 2', '2023-09-01', '10:20:53', 6, 5),
(8, 'Problema1222', '2023-09-03', '20:35:47', 9, 1),
(9, 'Problema1', '2023-09-06', '10:43:18', 10, 1),
(10, '1', '2023-09-13', '15:49:21', 11, 1),
(11, '2', '2023-09-13', '15:49:21', 11, 1),
(12, 'aaaa', '2023-09-13', '15:55:33', 9, 1),
(13, 'bbb', '2023-09-13', '15:55:33', 9, 1),
(14, 'dsa', '2023-09-13', '16:29:22', 16, 6),
(15, 'dasd', '2023-09-13', '16:30:33', 17, 7),
(16, 'Problema1', '2023-09-28', '07:47:50', 28, 1),
(17, 'Problema 2', '2023-09-28', '07:47:50', 28, 1),
(18, 'Problema1', '2023-10-12', '11:30:10', 30, 1),
(19, 'Problema 2', '2023-10-12', '11:30:11', 30, 1),
(20, 'diarrea', '2023-10-14', '15:15:58', 32, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idMascota` int(11) NOT NULL,
  `nombreMascota` text NOT NULL,
  `idEspecie` int(11) NOT NULL,
  `idGenero` int(11) NOT NULL,
  `Entero` text NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`idMascota`, `nombreMascota`, `idEspecie`, `idGenero`, `Entero`, `idCliente`) VALUES
(1, 'Zeus', 1, 1, 'Si', 1),
(2, 'Max', 1, 1, 'No', 2),
(3, 'Maxi', 1, 1, 'No', 3),
(4, 'rosita', 2, 2, 'Si', 4),
(5, 'rosa', 1, 2, 'Si', 5),
(6, 'Federico', 1, 1, 'No', 6),
(7, 'jorge', 2, 1, 'No', 7),
(8, 'Maxi', 1, 1, 'No', 8),
(9, 'Sol', 1, 2, 'si', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `IdMedicamento` int(11) NOT NULL,
  `Medicamento` text NOT NULL,
  `TotalMedicamento` text NOT NULL,
  `tipoMedicamento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`IdMedicamento`, `Medicamento`, `TotalMedicamento`, `tipoMedicamento`) VALUES
(1, 'Asetaminofen', '7.9', 'ml'),
(2, 'Alsetaideido', '300', 'ml'),
(3, 'Asetaminofe', '290', 'gr'),
(4, 'nn', '4', 'gr'),
(5, 'rr', '200', 'ml'),
(6, 'mm', '200', 'ml'),
(7, 'Meloxicam', '35.7', 'ml'),
(8, 'diciclin 200', '180', 'tableta'),
(9, 'meloxipet', '30', 'ml'),
(10, '', '0', 'ml');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `idMedico` int(11) NOT NULL,
  `medico` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `MP` int(11) NOT NULL,
  `activo` text NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`idMedico`, `medico`, `password`, `MP`, `activo`, `idRol`) VALUES
(1, 'Johan Rengifo', 'Johan321', 1111, 'Activo', 1),
(2, 'Felipe Rengifo', 'Johan321', 2222, 'Activo', 2),
(3, 'Paola', 'Paola321', 3333, 'Activo', 1),
(4, 'Carlos', 'Johan321', 4444, 'Activo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasprogreso`
--

CREATE TABLE `notasprogreso` (
  `idProgreso` int(11) NOT NULL,
  `progreso` text DEFAULT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) DEFAULT NULL,
  `idMascota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notasprogreso`
--

INSERT INTO `notasprogreso` (`idProgreso`, `progreso`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'Se realiza Ch con  resultados desfavorables por 00 lo que se realiza nuevo tratamiento por 10 días', '2023-08-31', '17:20:40', 1, 1),
(2, 'sad', '2023-09-01', '10:11:10', 4, 3),
(3, 'das', '2023-09-01', '10:20:55', 6, 5),
(4, 'da je', '2023-09-03', '20:35:47', 9, 1),
(5, 'da', '2023-09-06', '10:43:19', 10, 1),
(6, 'saddasdasdasdas 12132131', '2023-09-11', '16:24:53', 1, 1),
(7, '2', '2023-09-13', '15:49:23', 11, 1),
(8, 'dasda', '2023-09-13', '15:55:35', 9, 1),
(9, 'das', '2023-09-13', '16:29:22', 16, 6),
(10, 'sdas', '2023-09-13', '16:30:35', 17, 7),
(11, 'das', '2023-09-28', '07:47:51', 28, 1),
(12, 'dsad', '2023-10-12', '11:30:12', 30, 1),
(13, 'Se realiza Ch con 00 resultados desfavorables por lo que se realiza nuevo tratamiento por 10 días', '2023-10-14', '15:25:50', 32, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proximocontrol`
--

CREATE TABLE `proximocontrol` (
  `idControl` int(11) NOT NULL,
  `controlProximo` text DEFAULT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) DEFAULT NULL,
  `idMascota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proximocontrol`
--

INSERT INTO `proximocontrol` (`idControl`, `controlProximo`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'asdsssss', '2023-08-31', '17:20:40', 1, 1),
(2, 'dsa', '2023-09-01', '10:11:10', 4, 3),
(3, 'dsa', '2023-09-01', '10:20:55', 6, 5),
(4, 'das ja', '2023-09-03', '20:35:47', 9, 1),
(5, 'ada', '2023-09-06', '10:43:19', 10, 1),
(6, '2', '2023-09-13', '15:49:23', 11, 1),
(7, 'dsda', '2023-09-13', '15:55:35', 9, 1),
(8, 'asda', '2023-09-13', '16:29:22', 16, 6),
(9, 'da', '2023-09-13', '16:30:35', 17, 7),
(10, 'das', '2023-09-28', '07:47:51', 28, 1),
(11, 'dsad', '2023-10-12', '11:30:12', 30, 1),
(12, '10 días', '2023-10-14', '15:15:59', 32, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendaciones`
--

CREATE TABLE `recomendaciones` (
  `idRecomendaciones` int(11) NOT NULL,
  `recomendacion` text DEFAULT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) DEFAULT NULL,
  `idMascota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recomendaciones`
--

INSERT INTO `recomendaciones` (`idRecomendaciones`, `recomendacion`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'dasdas', '2023-08-31', '17:20:40', 1, 1),
(2, 'dsa', '2023-09-01', '10:11:10', 4, 3),
(3, 'dsa', '2023-09-01', '10:20:55', 6, 5),
(4, 'das ju', '2023-09-03', '20:35:47', 9, 1),
(5, 'asd', '2023-09-06', '10:43:18', 10, 1),
(6, '2', '2023-09-13', '15:49:22', 11, 1),
(7, 'dssa', '2023-09-13', '15:55:34', 9, 1),
(8, 'sdas', '2023-09-13', '16:29:22', 16, 6),
(9, 'das', '2023-09-13', '16:30:34', 17, 7),
(10, 'das', '2023-09-28', '07:47:51', 28, 1),
(11, 'sdad', '2023-10-12', '11:30:12', 30, 1),
(12, 'Dar medicación con el estomago lleno', '2023-10-14', '15:15:59', 32, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `roles` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `roles`) VALUES
(1, 'administrador'),
(2, 'medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistemasafectados`
--

CREATE TABLE `sistemasafectados` (
  `idSitemasAfectados` int(11) NOT NULL,
  `circulatorio` text DEFAULT NULL,
  `nervisoso` text DEFAULT NULL,
  `organosSentidos` text DEFAULT NULL,
  `Digestivo` text DEFAULT NULL,
  `Genitourinario` text DEFAULT NULL,
  `Linfatico` text DEFAULT NULL,
  `Respiratorio` text DEFAULT NULL,
  `Oseo` text DEFAULT NULL,
  `Dermatologico` text DEFAULT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sistemasafectados`
--

INSERT INTO `sistemasafectados` (`idSitemasAfectados`, `circulatorio`, `nervisoso`, `organosSentidos`, `Digestivo`, `Genitourinario`, `Linfatico`, `Respiratorio`, `Oseo`, `Dermatologico`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'Si', NULL, NULL, NULL, NULL, 'Si', NULL, NULL, NULL, '2023-08-31', '17:19:46', 1, 1),
(2, 'Si', NULL, NULL, NULL, 'Si', 'Si', NULL, NULL, NULL, '2023-09-01', '10:11:08', 4, 3),
(3, 'Si', 'Si', NULL, NULL, NULL, 'Si', NULL, NULL, NULL, '2023-09-01', '10:20:53', 6, 5),
(4, 'Si', NULL, NULL, NULL, 'Si', 'Si', NULL, NULL, 'Si', '2023-09-03', '20:35:46', 9, 1),
(5, NULL, NULL, NULL, NULL, NULL, 'Si', NULL, NULL, NULL, '2023-09-03', '21:03:10', 1, 1),
(6, NULL, 'Si', NULL, 'Si', NULL, NULL, NULL, NULL, NULL, '2023-09-06', '10:43:17', 10, 1),
(7, 'Si', NULL, NULL, 'Si', 'Si', NULL, NULL, NULL, NULL, '2023-09-13', '15:49:21', 11, 1),
(8, NULL, NULL, NULL, NULL, 'Si', NULL, NULL, 'Si', NULL, '2023-09-13', '15:55:33', 9, 1),
(9, NULL, NULL, 'Si', NULL, NULL, NULL, NULL, 'Si', NULL, '2023-09-13', '16:29:21', 16, 6),
(10, NULL, NULL, NULL, 'Si', NULL, NULL, NULL, 'Si', NULL, '2023-09-13', '16:30:33', 17, 7),
(11, 'Si', NULL, NULL, NULL, 'Si', 'Si', NULL, NULL, NULL, '2023-09-28', '07:46:07', 28, 1),
(12, 'Si', NULL, NULL, NULL, NULL, 'Si', NULL, 'Si', NULL, '2023-10-12', '11:30:10', 30, 1),
(13, 'Si', 'Si', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-14', '15:15:57', 32, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapeuticocasa`
--

CREATE TABLE `terapeuticocasa` (
  `idTerapeuticoCasa` int(11) NOT NULL,
  `principioActivo` text DEFAULT NULL,
  `posologia` text DEFAULT NULL,
  `dosis` text DEFAULT NULL,
  `via` text DEFAULT NULL,
  `frecuencia` text DEFAULT NULL,
  `duracion` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `fechaHistorico` date NOT NULL DEFAULT current_timestamp(),
  `horaHistorico` time NOT NULL DEFAULT current_timestamp(),
  `idFechaIngreso` int(11) DEFAULT NULL,
  `idMascota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `terapeuticocasa`
--

INSERT INTO `terapeuticocasa` (`idTerapeuticoCasa`, `principioActivo`, `posologia`, `dosis`, `via`, `frecuencia`, `duracion`, `observaciones`, `fechaHistorico`, `horaHistorico`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'Principio activo 2', 'Posologia 2', 'Dosis 2', 'Via 2', 'Frecuencia 2', 'Duracion 2', '22', '2023-08-28', '21:03:07', 1, 1),
(2, 'Principio activo 2', 'Posologia2', 'Dosis2', 'Via2', 'Frecuencia2', 'Duracion2', 'Observaciones2', '2023-08-30', '07:49:55', 1, 1),
(3, '12', '12', '12', '12', '12', '12', '12', '2023-08-31', '17:20:30', 1, 1),
(4, '2', '', '2', '', '2', '', '2', '2023-09-01', '10:11:09', 4, 3),
(5, '1', '', '1', '', '1', '', '1', '2023-09-01', '10:20:54', 6, 5),
(6, 'das', 'dasdas', 'das', '', '5', '', '6', '2023-09-03', '20:35:47', 9, 1),
(7, 'da', 'sd', 'asda', 'dsa', 'das', 'das', 'da', '2023-09-06', '10:43:18', 10, 1),
(8, '22', '22', '22', '22', '22', '22', '22', '2023-09-11', '15:47:54', 1, 1),
(9, '1', '1', '1', '1', '1', '1', '1', '2023-09-13', '15:49:22', 11, 1),
(10, '2', '2', '2', '2', '2', '2', '2', '2023-09-13', '15:49:22', 11, 1),
(11, '1', '1', '', '1', '', '', '1', '2023-09-13', '15:55:34', 9, 1),
(12, '2', '', '2', '', '2', '2', '', '2023-09-13', '15:55:34', 9, 1),
(13, 'dadas', '', 'dsa', 'as', 'asdas', '', 'dsad', '2023-09-13', '16:29:22', 16, 6),
(14, 'das', 'das', 'das', 'asdas', 'dasd', 'das', 'dasdas', '2023-09-13', '16:30:33', 17, 7),
(15, 'nn', 'Posologia', '100', 'asd', 'sad', 'asda', 'sdsa', '2023-09-28', '07:47:51', 28, 1),
(16, 'nn', 'das', '10', 'dsa', 'asd||', 'asd', 'das', '2023-10-12', '11:30:12', 30, 1),
(17, 'Diciclin 50 mg ', '5mg/kg', '1 tableta', 'oral', 'cada 24 horas', '21 días consecutivos', 'dar antibiotico con el estomago lleno', '2023-10-14', '15:15:58', 32, 9),
(18, 'Hemolitan pet', '0.5ml/kg', '0.3 ml (6gotas)', 'oral', 'cada 12 horas', '21 días consecutivos', '', '2023-10-14', '15:15:58', 32, 9),
(19, 'Prednizoo 5mg', '5mg/kg', '1 tableta', 'oral', 'cada 24 horas', '10 dias consecutivos', '', '2023-10-14', '15:15:58', 32, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoconsulta`
--

CREATE TABLE `tipoconsulta` (
  `idTipoConsulta` int(11) NOT NULL,
  `consulta` text NOT NULL,
  `idFechaIngreso` int(11) NOT NULL,
  `idMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoconsulta`
--

INSERT INTO `tipoconsulta` (`idTipoConsulta`, `consulta`, `idFechaIngreso`, `idMascota`) VALUES
(1, 'Consulta', 1, 1),
(2, 'Consulta', 3, 2),
(3, 'Consulta', 4, 3),
(4, 'Consulta', 5, 4),
(5, 'Consulta', 6, 5),
(6, 'Consulta', 9, 1),
(7, 'Urgencia', 10, 1),
(8, 'Urgencia', 11, 1),
(9, 'Consulta', 16, 6),
(10, 'Urgencia', 17, 7),
(11, 'Consulta', 18, 7),
(12, 'Consulta', 21, 1),
(13, 'Urgencia', 22, 1),
(14, 'Consulta', 23, 1),
(15, 'Consulta', 24, 1),
(16, 'Consulta', 25, 1),
(17, 'Consulta', 26, 1),
(18, 'Consulta', 27, 1),
(19, 'Consulta', 28, 1),
(20, 'Consulta', 29, 1),
(21, 'Urgencia', 30, 1),
(22, 'Consulta', 32, 9),
(23, 'Consulta', 33, 1),
(24, 'Consulta', 34, 1),
(25, 'Consulta', 36, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anamnesiscatemnesis`
--
ALTER TABLE `anamnesiscatemnesis`
  ADD PRIMARY KEY (`idAnamnesisCatemnesis`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `anexomascotapdf`
--
ALTER TABLE `anexomascotapdf`
  ADD PRIMARY KEY (`idPdf`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `numeroCedula` (`numeroCedula`) USING HASH;

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`idDiagnostico`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `edad`
--
ALTER TABLE `edad`
  ADD PRIMARY KEY (`idEdad`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idEspecie`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `examenfisico`
--
ALTER TABLE `examenfisico`
  ADD PRIMARY KEY (`idExamenFisico`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `fechaingreso`
--
ALTER TABLE `fechaingreso`
  ADD PRIMARY KEY (`idFechaIngreso`),
  ADD KEY `idMascota` (`idMascota`);

--
-- Indices de la tabla `fechamedico`
--
ALTER TABLE `fechamedico`
  ADD PRIMARY KEY (`idfechaMedico`),
  ADD KEY `idMedico` (`idMedico`),
  ADD KEY `idFechaIngreso` (`idFecha`);

--
-- Indices de la tabla `fotopeluqueria`
--
ALTER TABLE `fotopeluqueria`
  ADD PRIMARY KEY (`idFotoPeluqueria`),
  ADD UNIQUE KEY `idFechaIngreso` (`idFechaIngreso`),
  ADD KEY `idMascota` (`idMascota`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `hopitalarioinsumo`
--
ALTER TABLE `hopitalarioinsumo`
  ADD PRIMARY KEY (`idHospitalInsumo`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`),
  ADD KEY `idMascota` (`idMascota`);

--
-- Indices de la tabla `horaingreso`
--
ALTER TABLE `horaingreso`
  ADD PRIMARY KEY (`idHoraIngreso`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `informacionoperaciones`
--
ALTER TABLE `informacionoperaciones`
  ADD PRIMARY KEY (`idOperaciones`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`idInsumos`),
  ADD UNIQUE KEY `Insumo` (`Insumo`) USING HASH;

--
-- Indices de la tabla `intrahospitalario`
--
ALTER TABLE `intrahospitalario`
  ADD PRIMARY KEY (`idIntraHospitalario`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `listadepurada`
--
ALTER TABLE `listadepurada`
  ADD PRIMARY KEY (`idListaDepurada`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `listaproblema`
--
ALTER TABLE `listaproblema`
  ADD PRIMARY KEY (`idProblema`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idMascota`),
  ADD KEY `idEspecie` (`idEspecie`),
  ADD KEY `idGenero` (`idGenero`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`IdMedicamento`),
  ADD UNIQUE KEY `Medicamento` (`Medicamento`) USING HASH;

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idMedico`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `notasprogreso`
--
ALTER TABLE `notasprogreso`
  ADD PRIMARY KEY (`idProgreso`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `proximocontrol`
--
ALTER TABLE `proximocontrol`
  ADD PRIMARY KEY (`idControl`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD PRIMARY KEY (`idRecomendaciones`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `sistemasafectados`
--
ALTER TABLE `sistemasafectados`
  ADD PRIMARY KEY (`idSitemasAfectados`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `terapeuticocasa`
--
ALTER TABLE `terapeuticocasa`
  ADD PRIMARY KEY (`idTerapeuticoCasa`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- Indices de la tabla `tipoconsulta`
--
ALTER TABLE `tipoconsulta`
  ADD PRIMARY KEY (`idTipoConsulta`),
  ADD KEY `idMascota` (`idMascota`),
  ADD KEY `idFechaIngreso` (`idFechaIngreso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anamnesiscatemnesis`
--
ALTER TABLE `anamnesiscatemnesis`
  MODIFY `idAnamnesisCatemnesis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `anexomascotapdf`
--
ALTER TABLE `anexomascotapdf`
  MODIFY `idPdf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `idDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `edad`
--
ALTER TABLE `edad`
  MODIFY `idEdad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `idEspecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `examenfisico`
--
ALTER TABLE `examenfisico`
  MODIFY `idExamenFisico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `fechaingreso`
--
ALTER TABLE `fechaingreso`
  MODIFY `idFechaIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `fechamedico`
--
ALTER TABLE `fechamedico`
  MODIFY `idfechaMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `fotopeluqueria`
--
ALTER TABLE `fotopeluqueria`
  MODIFY `idFotoPeluqueria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hopitalarioinsumo`
--
ALTER TABLE `hopitalarioinsumo`
  MODIFY `idHospitalInsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `horaingreso`
--
ALTER TABLE `horaingreso`
  MODIFY `idHoraIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `informacionoperaciones`
--
ALTER TABLE `informacionoperaciones`
  MODIFY `idOperaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `idInsumos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `intrahospitalario`
--
ALTER TABLE `intrahospitalario`
  MODIFY `idIntraHospitalario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `listadepurada`
--
ALTER TABLE `listadepurada`
  MODIFY `idListaDepurada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `listaproblema`
--
ALTER TABLE `listaproblema`
  MODIFY `idProblema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idMascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `IdMedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `idMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `notasprogreso`
--
ALTER TABLE `notasprogreso`
  MODIFY `idProgreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `proximocontrol`
--
ALTER TABLE `proximocontrol`
  MODIFY `idControl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  MODIFY `idRecomendaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sistemasafectados`
--
ALTER TABLE `sistemasafectados`
  MODIFY `idSitemasAfectados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `terapeuticocasa`
--
ALTER TABLE `terapeuticocasa`
  MODIFY `idTerapeuticoCasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tipoconsulta`
--
ALTER TABLE `tipoconsulta`
  MODIFY `idTipoConsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anamnesiscatemnesis`
--
ALTER TABLE `anamnesiscatemnesis`
  ADD CONSTRAINT `anamnesiscatemnesis_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anamnesiscatemnesis_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anexomascotapdf`
--
ALTER TABLE `anexomascotapdf`
  ADD CONSTRAINT `anexomascotapdf_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anexomascotapdf_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnostico_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `edad`
--
ALTER TABLE `edad`
  ADD CONSTRAINT `edad_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `edad_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `examenfisico`
--
ALTER TABLE `examenfisico`
  ADD CONSTRAINT `examenfisico_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examenfisico_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fechaingreso`
--
ALTER TABLE `fechaingreso`
  ADD CONSTRAINT `fechaingreso_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fechamedico`
--
ALTER TABLE `fechamedico`
  ADD CONSTRAINT `fechamedico_ibfk_1` FOREIGN KEY (`idMedico`) REFERENCES `medico` (`idMedico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fechamedico_ibfk_2` FOREIGN KEY (`idFecha`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotopeluqueria`
--
ALTER TABLE `fotopeluqueria`
  ADD CONSTRAINT `fotopeluqueria_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fotopeluqueria_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hopitalarioinsumo`
--
ALTER TABLE `hopitalarioinsumo`
  ADD CONSTRAINT `hopitalarioinsumo_ibfk_1` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hopitalarioinsumo_ibfk_2` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horaingreso`
--
ALTER TABLE `horaingreso`
  ADD CONSTRAINT `horaingreso_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `informacionoperaciones`
--
ALTER TABLE `informacionoperaciones`
  ADD CONSTRAINT `informacionoperaciones_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `informacionoperaciones_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `intrahospitalario`
--
ALTER TABLE `intrahospitalario`
  ADD CONSTRAINT `intrahospitalario_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intrahospitalario_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `listadepurada`
--
ALTER TABLE `listadepurada`
  ADD CONSTRAINT `listadepurada_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listadepurada_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `listaproblema`
--
ALTER TABLE `listaproblema`
  ADD CONSTRAINT `listaproblema_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listaproblema_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`idEspecie`) REFERENCES `especie` (`idEspecie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota_ibfk_3` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mascota_ibfk_7` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notasprogreso`
--
ALTER TABLE `notasprogreso`
  ADD CONSTRAINT `notasprogreso_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notasprogreso_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proximocontrol`
--
ALTER TABLE `proximocontrol`
  ADD CONSTRAINT `proximocontrol_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proximocontrol_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD CONSTRAINT `recomendaciones_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recomendaciones_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sistemasafectados`
--
ALTER TABLE `sistemasafectados`
  ADD CONSTRAINT `sistemasafectados_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sistemasafectados_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `terapeuticocasa`
--
ALTER TABLE `terapeuticocasa`
  ADD CONSTRAINT `terapeuticocasa_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `terapeuticocasa_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipoconsulta`
--
ALTER TABLE `tipoconsulta`
  ADD CONSTRAINT `tipoconsulta_ibfk_1` FOREIGN KEY (`idMascota`) REFERENCES `mascota` (`idMascota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipoconsulta_ibfk_2` FOREIGN KEY (`idFechaIngreso`) REFERENCES `fechaingreso` (`idFechaIngreso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
