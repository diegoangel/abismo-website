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
-- Base de datos: `abismo`
--

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `referenced_id`, `referenced_type`, `type`, `title`, `filepath`, `alt`, `active`, `small_image`, `created`, `modified`) VALUES
(1, 1, 'project', 'home', 'CASA MIA', 'proyectos/1/home.jpg', 'LAS CAVAS | BUENOS AIRES - ARGENTINA 2012', 1, '', '2013-04-20 00:00:00', '2013-04-22 01:59:39'),
(2, 2, 'project', 'home', 'home.jpg', 'proyectos/2/home.jpg', 'home2', 1, '', '2013-04-08 00:00:00', '0000-00-00 00:00:00'),
(5, 4, 'project', 'home', 'home.jpg', 'proyectos/4/home.jpg', 'home4', 1, '', '2013-04-04 00:00:00', '0000-00-00 00:00:00'),
(6, 3, 'project', 'home', 'home.jpg', 'proyectos/3/home.jpg', 'home3', 1, '', '2013-04-17 00:00:00', '0000-00-00 00:00:00'),
(7, 6, 'project', 'home', 'home.jpg', 'proyectos/6/home.jpg', 'home6', 1, '', '2013-04-16 00:00:00', '0000-00-00 00:00:00'),
(8, 5, 'project', 'home', 'home.jpg', 'proyectos/5/home.jpg', 'home5', 1, '', '2013-04-08 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'project', 'thumb', 'thumb1.jpg', 'proyectos/1/thumb1.jpg', 'thumb1', 1, '', '2013-04-09 00:00:00', '2013-04-20 00:00:00'),
(11, 2, 'project', 'thumb', 'thumb2.jpg', 'proyectos/2/thumb2.jpg', 'thumb2', 1, '', '2013-04-09 00:00:00', '2013-04-20 00:00:00'),
(12, 3, 'project', 'thumb', 'thumb3.jpg', 'proyectos/3/thumb3.jpg', 'thumb3', 1, '', '2013-04-09 00:00:00', '2013-04-20 00:00:00'),
(13, 4, 'project', 'thumb', 'thumb4.jpg', 'proyectos/4/thumb4.jpg', 'thumb4', 1, '', '2013-04-09 00:00:00', '2013-04-20 00:00:00'),
(14, 5, 'project', 'thumb', 'thumb5.jpg', 'proyectos/5/thumb5.jpg', 'thumb5', 1, '', '2013-04-09 00:00:00', '2013-04-20 00:00:00'),
(15, 6, 'project', 'thumb', 'thumb6.jpg', 'proyectos/6/thumb6.jpg', 'thumb6', 1, '', '2013-04-09 00:00:00', '2013-04-20 00:00:00'),
(16, 1, 'project', 'slide', 'slide1.jpg', 'proyectos/1/slide1.jpg', 'slide1', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(17, 1, 'project', 'slide', 'slide2.jpg', 'proyectos/1/slide2.jpg', 'slide2', 1, '', '2013-04-08 00:00:00', '2013-04-19 16:00:00'),
(18, 2, 'project', 'slide', 'slide1.jpg', 'proyectos/2/slide1.jpg', 'slide1', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(19, 2, 'project', 'slide', 'slide2.jpg', 'proyectos/2/slide2.jpg', 'slide2', 1, '', '2013-04-08 00:00:00', '2013-04-19 16:00:00'),
(20, 3, 'project', 'slide', 'slide1.jpg', 'proyectos/3/slide1.jpg', 'slide1', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(21, 3, 'project', 'slide', 'slide2.jpg', 'proyectos/3/slide2.jpg', 'slide2', 1, '', '2013-04-08 00:00:00', '2013-04-19 16:00:00'),
(22, 4, 'project', 'slide', 'slide1.jpg', 'proyectos/4/slide1.jpg', 'slide1', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(23, 4, 'project', 'slide', 'slide2.jpg', 'proyectos/4/slide2.jpg', 'slide2', 1, '', '2013-04-08 00:00:00', '2013-04-19 16:00:00'),
(24, 5, 'project', 'slide', 'slide1.jpg', 'proyectos/5/slide1.jpg', 'slide1', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(25, 5, 'project', 'slide', 'slide2.jpg', 'proyectos/5/slide2.jpg', 'slide2', 1, '', '2013-04-08 00:00:00', '2013-04-19 16:00:00'),
(26, 6, 'project', 'slide', 'slide1.jpg', 'proyectos/6/slide1.jpg', 'slide1', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(27, 6, 'project', 'slide', 'slide2.jpg', 'proyectos/6/slide2.jpg', 'slide2', 1, '', '2013-04-08 00:00:00', '2013-04-19 16:00:00'),
(28, 1, 'tender', 'slide', 'slide1.jpg', 'concursos/1/slide1.jpg', 'slide1', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(29, 1, 'tender', 'slide', 'slide2.jpg', 'concursos/1/slide2.jpg', 'slide2', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(30, 1, 'tender', 'slide', 'slide3.jpg', 'concursos/1/slide3.jpg', 'slide3', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(31, 1, 'tender', 'slide', 'slide4.jpg', 'concursos/1/slide4.jpg', 'slide4', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(32, 1, 'tender', 'slide', 'slide5.jpg', 'concursos/1/slide5.jpg', 'slide5', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(33, 1, 'tender', 'slide', 'slide6.jpg', 'concursos/1/slide6.jpg', 'slide6', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(34, 2, 'tender', 'slide', 'slide1.jpg', 'concursos/2/slide1.jpg', 'slide1', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(35, 1, 'tender', 'thumb', 'thumb1.jpg', 'concursos/1/thumb1.jpg', 'thumb1', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(36, 2, 'tender', 'thumb', 'thumb2.jpg', 'concursos/2/thumb2.jpg', 'thumb2', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(37, 3, 'tender', 'slide', 'slide1.jpg', 'concursos/3/slide1.jpg', 'slide1', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(38, 2, 'tender', 'slide', 'slide2.jpg', 'concursos/2/slide2.jpg', 'slide2', 1, '', '2013-04-10 00:00:00', '2013-04-11 00:00:00'),
(47, 7, 'project', 'slide', 'Ã±lk', 'proyectos/7/slide-slide1.jpg', 'sadsadassad', 1, 'images/proyectos/7/smalls/slide-slide1-resize-128x128-small.jpg', '2013-04-22 12:04:31', '2013-04-22 12:04:31'),
(48, 7, 'project', 'slide', 'qwewqee', 'proyectos/7/slide-slide2.jpg', 'wqewqe', 1, 'proyectos/7/smalls/slide-slide2-resize-128x128-small.jpg', '2013-04-22 12:07:34', '2013-04-22 12:07:34'),
(49, 7, 'project', 'home', 'kjkjhkj', 'proyectos/7/home-road_summer_2-wallpaper-1280x800.jpg', 'lkjl', 1, 'proyectos/7/smalls/home-road_summer_2-wallpaper-1280x800-resize-128x128-small.jpg', '2013-04-22 12:09:05', '2013-04-22 12:09:05');

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `title`, `subtitle`, `location`, `project_idea_and_management`, `client`, `total_area`, `year`, `proposal`, `show_in_home`, `featured`, `active`, `created`, `modified`) VALUES
(1, 'CASA MARIANO ACHA', 'MODIFICACIÃ“N Y AMPLIACIÃ“N VIVIENDA UNIFAMILIAR', '<p><span style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;">Calle Mariano Acha 3000</span><br style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;" /><span style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;">Coghlan</span><br style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;" /><span style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;">Buenos Aires, Argentina</span></p>', '<p style="margin: 0px 0px 14px; padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: top; line-height: 18px; color: #2e2e2e; font-family: Arial, Helvetica, sans-serif;">ab.ismo&nbsp;<br />Oficina de arquitectura</p>', 'Particular', 220, '2011', '<p style="margin: 14px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: top; line-height: 18px; color: #2e2e2e; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id sapien id neque rutrum bibendum id malesuada mi. Aliquam rutrum pulvinar turpis, a dictum libero fringilla ac. Vestibulum sit amet sem diam, eu egestas nisl.</p>\r\n<p style="margin: 14px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: top; line-height: 18px; color: #2e2e2e; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Aliquam id diam sit amet mi tempor ultricies id at eros. Quisque non tristique ligula. Nulla sed leo nec nibh blandit malesuada in quis orci. Sed eget lectus leo, eu luctus eros. Nunc lorem quam, hendrerit ut elementum in, interdum ac nunc.</p>\r\n<p style="margin: 14px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: top; line-height: 18px; color: #2e2e2e; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Suspendisse id ante lobortis justo imperdiet vestibulum a at sem. Nulla arcu purus, congue quis mattis nec, mollis eu libero. Vivamus viverra iaculis dolor, a porta massa vestibulum eget. Donec vel justo massa, sit amet luctus magna. Aliquam rutrum suscipit.</p>', 1, 1, 1, '0000-00-00 00:00:00', '2013-04-19 18:40:05'),
(2, 'PANAMERICANA y VELEZ SARFIELD', 'ModificaciÃ³n y ampliaciÃ³n Edificio oficinas+Local Comercial', '', '', 'Particular', 220, '2012', '', 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'CGP12', 'CONCURSO NACIONAL DE ANTEPROYECTOS', '', '', 'Particular', 345, '2013', '', 0, 0, 1, '2013-04-19 18:51:07', '2013-04-19 18:51:07'),
(4, 'LAS CAVAS', 'Edificio de viviendas | Obra nueva', '', '', 'Particular', 1000, '2011', '', 1, 0, 1, '2013-04-19 18:52:18', '2013-04-19 18:52:18'),
(5, 'CANCILLERÃA', 'CONCURSO NACIONAL DE ANTEPROYECTOS', '', '', 'Particular', 899, '2011', '', 0, 0, 1, '2013-04-19 18:53:33', '2013-04-19 18:53:33'),
(6, 'RIVERA 4560', 'Edificio de viviendas | Obra nueva', '', '', 'Particular', 678, '2011', '', 0, 0, 1, '2013-04-19 18:56:20', '2013-04-19 18:56:20'),
(7, 'Proyecto 43', 'Edificio de viviendas | Obra nueva', 'Lorem ipsum dolor sit amet, consete', 'Lorem ipsum dolor sit amet, consete', 'Particular', 1000, '2011', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua.', 1, 0, 1, '2013-04-21 05:02:41', '2013-04-21 05:02:41'),
(8, 'Otro Proyecto', 'At vero eos et accusam et justo duo dolores et ea rebum', 'At vero eos et accusam', 'At vero eos et accusam', 'Particular', 333, '2012', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua.', 0, 0, 1, '2013-04-21 05:02:41', '2013-04-21 05:02:41'),
(9, 'Proyecto Chafa', 'Edificio de viviendas | Obra nueva', 'Lorem ipsum dolor sit amet, consete', 'Lorem ipsum dolor sit amet, consete', 'Particular', 1000, '2011', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua.', 1, 0, 1, '2013-04-21 05:03:19', '2013-04-21 05:03:19');

--
-- Volcado de datos para la tabla `tenders`
--

INSERT INTO `tenders` (`id`, `title`, `subtitle`, `location`, `project_idea_and_management`, `client`, `total_area`, `year`, `proposal`, `featured`, `active`, `created`, `modified`) VALUES
(1, 'CONCURSO de pruba # 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '<p><span style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;">Calle Mariano Acha 3000</span><br style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;" /><span style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;">Coghlan</span><br style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;" /><span style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;">Buenos Aires, Argentina</span></p>', '<p><span style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;">ab.ismo&nbsp;</span><br style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;" /><span style="color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18px;">Oficina de arquitectura</span></p>', 'Particular', 220, '2011', '<p style="margin: 14px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: top; line-height: 18px; color: #2e2e2e; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Aliquam id diam sit amet mi tempor ultricies id at eros. Quisque non tristique ligula. Nulla sed leo nec nibh blandit malesuada in quis orci. Sed eget lectus leo, eu luctus eros. Nunc lorem quam, hendrerit ut elementum in, interdum ac nunc.</p>\r\n<p style="margin: 14px 0px; padding: 0px; border: 0px; outline: 0px; font-size: 13px; vertical-align: top; line-height: 18px; color: #2e2e2e; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Suspendisse id ante lobortis justo imperdiet vestibulum a at sem. Nulla arcu purus, congue quis mattis nec, mollis eu libero. Vivamus viverra iaculis dolor, a porta massa vestibulum eget. Donec vel justo massa, sit amet luctus magna. Aliquam rutrum suscipit.</p>', 0, 1, '0000-00-00 00:00:00', '2013-04-22 16:47:57'),
(2, 'CONCURSO 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '', '', '', 238, '2012', '', 1, 1, '2013-04-19 19:03:21', '2013-04-19 19:03:21'),
(3, 'CONCURSO 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '', '', 'Particular', 222, '2013', '', 1, 1, '2013-04-19 19:03:39', '2013-04-19 19:03:39'),
(4, 'CONCURSO 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '', '', 'Particular', 345, '2012', '', 0, 1, '2013-04-19 19:04:02', '2013-04-19 19:04:02');

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`, `is_active`, `created`, `modified`) VALUES
(1, 'admin', '7e38ad7f72d5a1c414e02d5fcc0dd881a3aa5407', 1, 1, '2013-04-09 00:38:28', '2013-04-09 00:38:28');

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `referenced_id`, `referenced_type`, `title`, `embed_code`, `active`, `created`, `modified`) VALUES
(1, 1, 'project', 'The ABC of Architects', '<iframe src="http://player.vimeo.com/video/56974716?title=0&amp;byline=0&amp;portrait=0&amp;color=699406" width="330" height="230" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>', 1, '2013-04-19 00:00:00', '2013-04-19 00:00:00'),
(2, 2, 'project', 'Another Video', '<iframe src="http://player.vimeo.com/video/56974716?title=0&amp;byline=0&amp;portrait=0&amp;color=699406" width="330" height="230" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>', 1, '2013-04-19 07:00:00', '2013-04-19 16:00:00'),
(3, 3, 'tender', 'Das ist alles', '<iframe src="http://player.vimeo.com/video/56974716?title=0&amp;byline=0&amp;portrait=0&amp;color=699406" width="330" height="230" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>', 1, '2013-04-08 00:00:00', '2013-04-17 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
