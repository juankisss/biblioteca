-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2021 a las 00:42:19
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rotabuy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `direccion` varchar(350) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id` int(11) NOT NULL,
  `idpedido` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `detalleproducto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopago`
--

CREATE TABLE `estadopago` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopedido`
--

CREATE TABLE `estadopedido` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopromocion`
--

CREATE TABLE `estadopromocion` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gustos`
--

CREATE TABLE `gustos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `detalles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgproducto`
--

CREATE TABLE `imgproducto` (
  `id` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE `intereses` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `detalles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `detalles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `detalles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idsala` int(11) NOT NULL,
  `mensaje` varchar(500) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `idtipopago` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `idestadopago` int(11) NOT NULL,
  `total_pago` decimal(10,0) DEFAULT NULL,
  `pago_inicial` decimal(10,0) DEFAULT NULL,
  `deuda_actual` decimal(10,0) DEFAULT NULL,
  `detalles` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `idpersona` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `idestadopedido` int(1) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `detalles` varchar(60) DEFAULT NULL,
  `lat` varchar(160) DEFAULT NULL,
  `lon` varchar(160) DEFAULT NULL,
  `fechacompra` datetime DEFAULT NULL,
  `fechaentrega` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Revisor'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombres` varchar(128) NOT NULL,
  `apaterno` varchar(64) NOT NULL,
  `amaterno` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telefono` varchar(16) DEFAULT NULL,
  `direccion` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombres`, `apaterno`, `amaterno`, `email`, `telefono`, `direccion`) VALUES
(1, 'Alicia', 'Martines', 'Perez', 'alicia@gmail.com', '7723433', 'El Alto'),
(2, 'Marcos ', 'Antonio', 'Vargas', 'marcos@gmail.com', '71234345', 'La Paz, Zona sur'),
(3, 'Valerio', 'Flores', 'Sans', 'val@gmail.com', NULL, 'El Alto, Villa Adela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `idsubcategoria` int(11) NOT NULL,
  `idmarca` int(11) NOT NULL,
  `idtalla` int(11) DEFAULT NULL,
  `idcolor` int(11) DEFAULT NULL,
  `idpromocion` int(11) NOT NULL,
  `idestado` int(11) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `detalles` varchar(60) DEFAULT NULL,
  `fechapubliado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_favorito`
--

CREATE TABLE `producto_favorito` (
  `id` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `detalles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_sugerido`
--

CREATE TABLE `producto_sugerido` (
  `id` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `detalles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `id` int(11) NOT NULL,
  `idtipopromocion` int(11) NOT NULL,
  `idestadopromocion` int(11) NOT NULL,
  `descuento` decimal(10,0) DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `detalles` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala_persona`
--

CREATE TABLE `sala_persona` (
  `id` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idsala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `detalles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopromocion`
--

CREATE TABLE `tipopromocion` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idperfil` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `socialid` int(11) DEFAULT NULL,
  `socialname` varchar(50) NOT NULL,
  `tokenfirebase` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `idpersona`, `idperfil`, `usuario`, `password`, `socialid`, `socialname`, `tokenfirebase`) VALUES
(1, 2, 1, 'marcos@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '0', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 1, 3, 'alicia@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '0', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 3, 2, 'val@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '0', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpedido` (`idpedido`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `estadopago`
--
ALTER TABLE `estadopago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadopromocion`
--
ALTER TABLE `estadopromocion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gustos`
--
ALTER TABLE `gustos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imgproducto`
--
ALTER TABLE `imgproducto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `idsala` (`idsala`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipopago` (`idtipopago`),
  ADD KEY `idpedido` (`idpedido`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `idestadopago` (`idestadopago`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idestadopedido` (`idestadopedido`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsubcategoria` (`idsubcategoria`);

--
-- Indices de la tabla `producto_favorito`
--
ALTER TABLE `producto_favorito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpersona` (`idpersona`);

--
-- Indices de la tabla `producto_sugerido`
--
ALTER TABLE `producto_sugerido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpersona` (`idpersona`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipopromocion` (`idtipopromocion`),
  ADD KEY `idestadopromocion` (`idestadopromocion`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sala_persona`
--
ALTER TABLE `sala_persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `idsala` (`idsala`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipopromocion`
--
ALTER TABLE `tipopromocion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idperfil` (`idperfil`),
  ADD KEY `idpersona` (`idpersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadopago`
--
ALTER TABLE `estadopago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadopromocion`
--
ALTER TABLE `estadopromocion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gustos`
--
ALTER TABLE `gustos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imgproducto`
--
ALTER TABLE `imgproducto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `intereses`
--
ALTER TABLE `intereses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto_favorito`
--
ALTER TABLE `producto_favorito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto_sugerido`
--
ALTER TABLE `producto_sugerido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sala_persona`
--
ALTER TABLE `sala_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipopromocion`
--
ALTER TABLE `tipopromocion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `imgproducto`
--
ALTER TABLE `imgproducto`
  ADD CONSTRAINT `imgproducto_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`idsala`) REFERENCES `sala` (`id`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`idtipopago`) REFERENCES `tipopago` (`id`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `pago_ibfk_3` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `pago_ibfk_4` FOREIGN KEY (`idestadopago`) REFERENCES `estadopago` (`id`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idestadopedido`) REFERENCES `estadopedido` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idsubcategoria`) REFERENCES `subcategoria` (`id`);

--
-- Filtros para la tabla `producto_favorito`
--
ALTER TABLE `producto_favorito`
  ADD CONSTRAINT `producto_favorito_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_sugerido`
--
ALTER TABLE `producto_sugerido`
  ADD CONSTRAINT `producto_sugerido_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD CONSTRAINT `promocion_ibfk_1` FOREIGN KEY (`idtipopromocion`) REFERENCES `tipopromocion` (`id`),
  ADD CONSTRAINT `promocion_ibfk_2` FOREIGN KEY (`idestadopromocion`) REFERENCES `estadopromocion` (`id`);

--
-- Filtros para la tabla `sala_persona`
--
ALTER TABLE `sala_persona`
  ADD CONSTRAINT `sala_persona_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `sala_persona_ibfk_2` FOREIGN KEY (`idsala`) REFERENCES `sala` (`id`);

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
