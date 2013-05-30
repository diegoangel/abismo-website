-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-04-2013 a las 15:44:50
-- Versión del servidor: 5.5.30
-- Versión de PHP: 5.4.4-14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Volcado de datos para la tabla `users`
--
-- username: admin
-- password: 123456 
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`, `is_active`, `created`, `modified`) VALUES
(1, 'admin', '7e38ad7f72d5a1c414e02d5fcc0dd881a3aa5407', 1, 1, '2013-04-09 00:38:28', '2013-04-09 00:38:28');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
