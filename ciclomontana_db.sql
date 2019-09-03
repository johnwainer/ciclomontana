-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2019 a las 05:04:18
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ciclomontana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `states_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `name`, `states_id`, `created`) VALUES
(1, 'Bogotá', 2, '2019-09-01 19:43:06'),
(2, 'Chia', 2, '2019-09-03 02:18:22'),
(3, 'Medellín', 1, '2019-09-03 02:18:08'),
(4, 'Envigado', 1, '2019-09-03 02:18:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`id` int(11) NOT NULL,
  `nit` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `cities_id` int(11) NOT NULL,
  `created` varchar(20) NOT NULL,
  `quota` varchar(20) NOT NULL,
  `quota_balance` varchar(20) NOT NULL,
  `visits_percentage` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `nit`, `name`, `address`, `phone`, `cities_id`, `created`, `quota`, `quota_balance`, `visits_percentage`) VALUES
(1, 'ec2157bbe284617ecd88ce82ba07e98b', 'Cliente 1', 'Cll 1 # 123', '312312312', 1, '1567479034', '50000000', '49950050', '0.9'),
(10, 'ec2157bbe284617ecd88ce82ba07e98b', 'Cliente 2', 'cr 4 # 789', '22334455', 3, '1567478071', '12000000', '11977650', '1.5'),
(11, '0abb0cc87846bda30853e04ddcdf8e51', 'Cliente 3', 'transv 3 # 683 - 09', '7685643', 2, '1567478155', '10000000', '9956000', '2'),
(12, '30d2a8bc11db39ca2ac85ae76a16a0d3', 'Cliente 4', 'mz 2a c 12', '99900055', 4, '1567478175', '16000000', '15945000', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `created`) VALUES
(1, 'Colombia', '2019-09-01 19:41:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellers`
--

CREATE TABLE IF NOT EXISTS `sellers` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `created`) VALUES
(1, 'Vendedor 1', '2019-09-01 21:42:57'),
(2, 'Vendedor 2', '2019-09-01 21:42:58'),
(3, 'Vendedor 3', '2019-09-01 21:42:57'),
(4, 'Vendedor 4', '2019-09-01 21:42:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE IF NOT EXISTS `states` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `countries_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name`, `countries_id`, `created`) VALUES
(1, 'Antioquia', 1, '2019-09-01 19:42:10'),
(2, 'Cundinamarca', 1, '2019-09-01 19:42:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `date_added`) VALUES
(1, 'John', 'Valencia', 'johnwainer@gmail.com', '$2y$10$8mVSGv/bIGgcvCikXBPfTunmcnytIULgA1yLiiSSVKH2j/ViNV0j6', '2019-08-31 23:09:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
`id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `clients_id` int(11) NOT NULL,
  `sellers_id` int(11) NOT NULL,
  `price` varchar(20) NOT NULL,
  `visit_price` varchar(20) NOT NULL,
  `observations` text,
  `created` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `visits`
--

INSERT INTO `visits` (`id`, `date`, `clients_id`, `sellers_id`, `price`, `visit_price`, `observations`, `created`) VALUES
(1, '2019-09-01', 1, 1, '25000', '22500', 'Observación 1', '03/09/2019'),
(2, '2019-08-23', 10, 4, '14900', '22350', 'Perfecto', '03/09/2019'),
(3, '2019-09-01', 11, 3, '22000', '44000', 'ok', '03/09/2019'),
(4, '2019-07-09', 12, 4, '11000', '55000', '', '03/09/2019'),
(5, '2019-09-03', 1, 1, '23000', '20700', '', '03/09/2019'),
(7, '2019-08-14', 1, 2, '7500', '6750', '', '03/09/2019');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`), ADD KEY `fk_cities_states1_idx` (`states_id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_Clients_cities_idx` (`cities_id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indices de la tabla `sellers`
--
ALTER TABLE `sellers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`), ADD KEY `fk_states_countries1_idx` (`countries_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `visits`
--
ALTER TABLE `visits`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_visits_sellers1_idx` (`sellers_id`), ADD KEY `clients_id` (`clients_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sellers`
--
ALTER TABLE `sellers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `visits`
--
ALTER TABLE `visits`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cities`
--
ALTER TABLE `cities`
ADD CONSTRAINT `fk_cities_states1` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clients`
--
ALTER TABLE `clients`
ADD CONSTRAINT `fk_Clients_cities` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `states`
--
ALTER TABLE `states`
ADD CONSTRAINT `fk_states_countries1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `visits`
--
ALTER TABLE `visits`
ADD CONSTRAINT `visits_ibfk_2` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_visits_sellers1` FOREIGN KEY (`sellers_id`) REFERENCES `sellers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
