-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2024 a las 04:13:16
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spotify`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `Correo` varchar(20) NOT NULL,
  `Contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `music_list`
--

CREATE TABLE `music_list` (
  `Codigo` int(100) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Autor` varchar(50) NOT NULL,
  `img` varchar(500) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `music_list`
--

INSERT INTO `music_list` (`Codigo`, `Nombre`, `Autor`, `img`, `url`) VALUES
(2, 'borro caset', 'Maluma', '../imagenes/casset.jfif', 'https://www.googleapis.com/drive/v3/files/1DhShdc3v0uQxyV8HZbQGOtbIVl0gxK1n?alt=media&key=AIzaSyDB7gZ0jvKCNbkRs7VCLMHA5SrEhdo9OCE'),
(3, 'talvez', 'paulo londra', 'https://i.scdn.co/image/ab67616d0000b273cf7e54f668d6a31dd6566f24', '../mp3/utomp3.com - Paulo Londra  Tal Vez Official Video.mp3'),
(4, 'Luna', 'feid', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfXD5Z1io8clGaBdlcla-2I3zcMXsqH_tI9gHNSWknnA&s', '../mp3/utomp3.com - Feid ATL Jacob  Luna Visualizer.mp3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Tipo_de_documento` varchar(50) NOT NULL,
  `Num_Documento` int(50) NOT NULL,
  `Telefono` int(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Correo`);

--
-- Indices de la tabla `music_list`
--
ALTER TABLE `music_list`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Num_Documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `music_list`
--
ALTER TABLE `music_list`
  MODIFY `Codigo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
