-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2022 a las 17:39:03
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.3.27

 


--
-- Base de datos: `mvc`
--

 

-- --------------------------------------------------------

 

--
-- Estructura de tabla para la tabla `departamento`
--

create database if not exists mvc;

use mvc;

CREATE TABLE `departamento` (
  `CodDepartamento` varchar(3) NOT NULL,
  `DescDepartamento` varchar(255) NOT NULL,
  `FechaBaja` date DEFAULT NULL,
  `VolumenNegocio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 

--
-- Volcado de datos para la tabla `departamento`
--

 

INSERT INTO `departamento` (`CodDepartamento`, `DescDepartamento`, `FechaBaja`, `VolumenNegocio`) VALUES
('AAA', 'Descripcion AAAA', NULL, 3),
('ABC', 'Descripcion qweqweq', NULL, 123),
('ASD', 'Descripcion ASD', '2019-11-26', 1),
('BBB', 'Descripcion BBB', '2019-11-24', 1),
('CCC', 'Descripcion CCC', NULL, 1),
('DDD', 'Descripcion DDD', NULL, 1),
('EEE', 'Descripcion EEE', '2019-11-24', 1),
('FFF', 'Descripcion FFF', '2019-11-24', 1),
('FRE', 'Descripcion FRE', '2019-11-24', 1),
('GGG', 'Descripcion GGG', NULL, 1),
('HHH', 'Descripcion HHH', NULL, 1),
('III', 'Descripcion III', '2019-11-24', 1),
('JJJ', 'Descripcion JJJ', '2019-11-24', 1),
('KKK', 'Descripcion KKK', '2019-11-25', 1),
('LLL', 'Descripcion LLL', NULL, 1),
('MMM', 'Descripcion MMM', NULL, 1),
('XXX', 'Descripcion XXX', '2019-11-24', 1),
('ZZZ', 'Descripcion ZZZ', '2019-11-24', 1);

 

-- --------------------------------------------------------

 

--
-- Estructura de tabla para la tabla `usuario`
--

 

CREATE TABLE `usuario` (
  `codUsuario` varchar(15) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `numAccesos` int(11) DEFAULT 0,
  `fechaHoraUltimaConexion` date DEFAULT NULL,
  `Perfil` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 

--
-- Volcado de datos para la tabla `usuario`
--

 

INSERT INTO `usuario` (`codUsuario`, `password`, `nombre`, `numAccesos`, `fechaHoraUltimaConexion`, `Perfil`) VALUES
('admin', 'd6ed7eb369f21acd3d3d66a96de946cc2b514e4279827bf8a7ca9d7005514b27', 'admin', 0, NULL, 'admini'),
('alex', '825e42135272fc44ca59e7bc969aabd49b88fafe3d60a4f774858b8719bd894c', 'alex', 0, NULL, ''),
('amor', 'a8cce9d7335dddb7c1d076d02b698bd23ffa40099eed7d9263f0a91bd752225a', 'amor', 0, NULL, ''),
('antonio', 'b6ac37c1936df57d5a0c2eee5f6296df434ecef42b2ece8f23f0b361cc3eb1a9', 'antonio', 0, NULL, ''),
('bea', '3dab8ab9510f0f3d6a3f7ee00f6c9a241a263917503ac06b2353f9050f5b8317', 'bea', 0, NULL, ''),
('daniel', '1b5941313810d1511eb44b62eacc469c3ba250917a3f825df26ee8d5033e1cb8', 'daniel', 0, NULL, ''),
('david', 'ae52dc722d63e7f96df661af9d6304437052d0106a8e7f2f4728a2bd5b835074', 'david', 0, NULL, ''),
('heraclio', '3f9c1511a87c9eec0d9151ac06d63053adbc269e569da272e72d8e1bfa28a6e3', 'heraclio', 0, NULL, ''),
('ismael', '6387edeab39f02a182a8ddc0fe728304f04db6d1afbe60d40592ca2e10b635c2', 'ismael', 0, NULL, ''),
('maria', '25c0af9a1dc924c388e66d0acf93ef54885d9783a03131e11f6a21e378e4f70a', 'maria', 0, NULL, ''),
('mateo', '90c2187b76dddd79363701fad84a5e49cd7c798ad7851c8e96066d500e8c8fc7', 'mateo', 0, NULL, ''),
('miguel', '6dd4a70e1c1e0a9bac97faba236069ef0b7dcd20f71496a9d3f535a40bb85048', 'miguel', 0, NULL, ''),
('nereaA', 'a92a8672861eca68f7bb7988d8f81cfa732e5acfed7d0d40ceca18500141a6ad', 'nereaA', 0, NULL, ''),
('nereaN', '17feeb4bce8f9b7f3c9966bd043d102f6a8d23c66c32308645be3d974a481972', 'nereaN', 0, NULL, ''),
('rodrigo', '4bb6f8086725b2a328d3025e65edb2853c276a8ac858c2bbdb938dbadeb36bd7', 'rodrigo', 0, NULL, ''),
('ruben', '0ea763d7dce6c22d4d1f55e5fc10d6822cb3c034e3dafa43ca6a024fb3d0d070', 'ruben', 0, NULL, ''),
('victor', 'ab75fd76bea36af351f763946182ff75a0f2ae9bd68e9b547040cd6175574a81', 'victor', 0, NULL, '');

 

--
-- Índices para tablas volcadas
--

 

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`CodDepartamento`);

 

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsuario`);
COMMIT;