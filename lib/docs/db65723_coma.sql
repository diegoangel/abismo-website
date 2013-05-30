-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: internal-db.s65723.gridserver.com
-- Generation Time: May 30, 2013 at 12:53 AM
-- Server version: 5.1.55-rel12.6
-- PHP Version: 5.3.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db65723_coma`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `_read` varchar(2) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `_update` varchar(2) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `_delete` varchar(2) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cake_sessions`
--

CREATE TABLE IF NOT EXISTS `cake_sessions` (
  `id` varchar(255) NOT NULL,
  `data` text,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `referenced_id` int(11) DEFAULT NULL,
  `referenced_type` enum('project','tender') DEFAULT NULL,
  `type` enum('home','slide','thumb') NOT NULL,
  `title` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `link` text,
  `order` smallint(3) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `small_image` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `referenced_id` (`referenced_id`),
  KEY `referenced_type` (`referenced_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `referenced_id`, `referenced_type`, `type`, `title`, `filepath`, `alt`, `link`, `order`, `active`, `small_image`, `created`, `modified`) VALUES
(50, 11, 'project', 'home', 'test', 'proyectos/11/home-home.jpg', 'test HOMEEE', NULL, 0, 0, 'proyectos/11/smalls/home-home-resize-128x128-small.jpg', '2013-04-23 17:35:28', '2013-05-08 17:29:16'),
(51, 11, 'project', 'slide', 'Cavas 01', 'proyectos/11/slide-cavas01-2.jpg', 'Cavas 01', NULL, 1, 1, 'proyectos/11/smalls/slide-cavas01-2-resize-128x128-small.jpg', '2013-04-23 17:36:17', '2013-05-07 14:08:56'),
(52, 11, 'project', 'slide', 'Cavas 02', 'proyectos/11/slide-cavas02-4.jpg', 'Cavas 02', NULL, 2, 1, 'proyectos/11/smalls/slide-cavas02-4-resize-128x128-small.jpg', '2013-04-23 17:36:42', '2013-05-07 14:09:01'),
(53, 11, 'project', 'slide', 'Cavas 03', 'proyectos/11/slide-cavas03-3.jpg', 'Cavas 03', NULL, 3, 1, 'proyectos/11/smalls/slide-cavas03-3-resize-128x128-small.jpg', '2013-04-23 17:36:59', '2013-05-07 14:09:04'),
(54, 11, 'project', 'slide', 'Cavas 04', 'proyectos/11/slide-cavas04-2.jpg', 'Cavas 04', NULL, 4, 1, 'proyectos/11/smalls/slide-cavas04-2-resize-128x128-small.jpg', '2013-04-23 17:44:44', '2013-05-07 14:09:08'),
(55, 11, 'project', 'slide', 'Cavas 05', 'proyectos/11/slide-cavas05-3.jpg', 'Cavas 05', NULL, 5, 1, 'proyectos/11/smalls/slide-cavas05-3-resize-128x128-small.jpg', '2013-04-23 17:55:12', '2013-05-07 14:09:13'),
(56, 11, 'project', 'slide', 'Cavas 06', 'proyectos/11/slide-cavas06-2.jpg', 'Cavas 06', NULL, 0, 1, 'proyectos/11/smalls/slide-cavas06-2-resize-128x128-small.jpg', '2013-04-23 18:01:37', '2013-05-21 08:34:48'),
(57, 11, 'project', 'slide', 'Cavas 07', 'proyectos/11/slide-cavas07-2.jpg', 'Cavas 07', NULL, 6, 1, 'proyectos/11/smalls/slide-cavas07-2-resize-128x128-small.jpg', '2013-04-23 18:02:29', '2013-05-07 14:09:21'),
(62, 11, 'project', 'slide', 'Cavas 08', 'proyectos/11/slide-cavas08-2.jpg', 'Cavas 08', NULL, 7, 1, 'proyectos/11/smalls/slide-cavas08-2-resize-128x128-small.jpg', '2013-04-24 10:57:19', '2013-05-07 14:09:37'),
(64, 12, 'project', 'slide', 'Freire 01', 'proyectos/12/slide-freire01.jpg', 'Freire 01', NULL, 1, 1, 'proyectos/12/smalls/slide-freire01-resize-128x128-small.jpg', '2013-04-24 17:10:48', '2013-05-07 14:12:20'),
(66, 12, 'project', 'slide', 'Freire 02', 'proyectos/12/slide-freire02.jpg', 'Freire 02', NULL, 0, 1, 'proyectos/12/smalls/slide-freire02-resize-128x128-small.jpg', '2013-04-26 16:15:24', '2013-05-07 14:12:43'),
(67, 11, 'project', 'home', 'Cavas22', 'proyectos/11/home-bu-Large-.jpg', 'Cavas Home', NULL, 0, 0, 'proyectos/11/smalls/home-bu-Large--resize-128x128-small.jpg', '2013-04-26 16:59:22', '2013-05-08 17:29:11'),
(74, 13, 'project', 'slide', 'Molino Blanco 01', 'proyectos/13/slide-mblanco01.jpg', 'Molino Blanco 01', NULL, 0, 1, 'proyectos/13/smalls/slide-mblanco01-resize-128x128-small.jpg', '2013-05-07 14:15:17', '2013-05-21 11:30:39'),
(75, 13, 'project', 'slide', 'Molino Blanco 02', 'proyectos/13/slide-mblanco02.jpg', 'Molino Blanco 02', NULL, 1, 1, 'proyectos/13/smalls/slide-mblanco02-resize-128x128-small.jpg', '2013-05-07 14:15:35', '2013-05-21 11:19:42'),
(76, 13, 'project', 'slide', 'Molino Blanco 03', 'proyectos/13/slide-mblanco03.jpg', 'Molino Blanco 03', NULL, 3, 1, 'proyectos/13/smalls/slide-mblanco03-resize-128x128-small.jpg', '2013-05-07 14:15:58', '2013-05-07 14:15:58'),
(77, 13, 'project', 'slide', 'Molino Blanco 04', 'proyectos/13/slide-mblanco04.jpg', 'Molino Blanco 04', NULL, 5, 1, 'proyectos/13/smalls/slide-mblanco04-resize-128x128-small.jpg', '2013-05-07 14:16:13', '2013-05-07 14:16:13'),
(78, 13, 'project', 'slide', 'Molino Blanco 05', 'proyectos/13/slide-mblanco05.jpg', 'Molino Blanco 05', NULL, 6, 1, 'proyectos/13/smalls/slide-mblanco05-resize-128x128-small.jpg', '2013-05-07 14:16:30', '2013-05-07 14:16:30'),
(79, 13, 'project', 'slide', 'Molino Blanco 06', 'proyectos/13/slide-mblanco06.jpg', 'Molino Blanco 06', NULL, 7, 1, 'proyectos/13/smalls/slide-mblanco06-resize-128x128-small.jpg', '2013-05-07 14:16:45', '2013-05-07 14:16:45'),
(80, 13, 'project', 'slide', 'Molino Blanco 07', 'proyectos/13/slide-mblanco07.jpg', 'Molino Blanco 07', NULL, 2, 1, 'proyectos/13/smalls/slide-mblanco07-resize-128x128-small.jpg', '2013-05-07 14:17:01', '2013-05-21 11:30:37'),
(81, 11, 'project', 'home', 'cavas', 'proyectos/11/home-home-fondo.jpg', 'cavas', NULL, 0, 1, 'proyectos/11/smalls/home-home-fondo-resize-128x128-small.jpg', '2013-05-07 14:22:22', '2013-05-08 17:39:53'),
(82, 14, 'project', 'thumb', 'Panamericana thumb', 'proyectos/14/thumb-panamericanathumb.jpg', 'Panamericana thumb', NULL, 0, 1, 'proyectos/14/smalls/thumb-panamericanathumb-resize-128x128-small.jpg', '2013-05-07 14:23:11', '2013-05-07 14:46:37'),
(83, 14, 'project', 'slide', 'Panamericana 01', 'proyectos/14/slide-panamericana01-2.jpg', 'Panamericana 01', NULL, 1, 1, 'proyectos/14/smalls/slide-panamericana01-2-resize-128x128-small.jpg', '2013-05-07 14:24:37', '2013-05-07 14:32:59'),
(84, 14, 'project', 'slide', 'Panamericana 02', 'proyectos/14/slide-panamericana02-1.jpg', 'Panamericana 02', NULL, 1, 1, 'proyectos/14/smalls/slide-panamericana02-1-resize-128x128-small.jpg', '2013-05-07 14:24:56', '2013-05-07 14:33:20'),
(85, 14, 'project', 'slide', 'Panamericana 03', 'proyectos/14/slide-panamericana03-1.jpg', 'Panamericana 03', NULL, 1, 1, 'proyectos/14/smalls/slide-panamericana03-1-resize-128x128-small.jpg', '2013-05-07 14:25:09', '2013-05-07 14:33:26'),
(86, 14, 'project', 'slide', 'Panamericana 04', 'proyectos/14/slide-panamericana04-1.jpg', 'Panamericana 04', NULL, 2, 1, 'proyectos/14/smalls/slide-panamericana04-1-resize-128x128-small.jpg', '2013-05-07 14:25:26', '2013-05-07 14:33:33'),
(87, 14, 'project', 'slide', 'Panamericana 05', 'proyectos/14/slide-panamericana05-1.jpg', 'Panamericana 05', NULL, 3, 1, 'proyectos/14/smalls/slide-panamericana05-1-resize-128x128-small.jpg', '2013-05-07 14:25:49', '2013-05-07 14:33:39'),
(88, 14, 'project', 'slide', 'Panamericana 06', 'proyectos/14/slide-panamericana06-1.jpg', 'Panamericana 06', NULL, 4, 1, 'proyectos/14/smalls/slide-panamericana06-1-resize-128x128-small.jpg', '2013-05-07 14:26:09', '2013-05-07 14:33:47'),
(89, 14, 'project', 'slide', 'Panamericana 07', 'proyectos/14/slide-panamericana07-1.jpg', 'Panamericana 07', NULL, 5, 1, 'proyectos/14/smalls/slide-panamericana07-1-resize-128x128-small.jpg', '2013-05-07 14:26:25', '2013-05-07 14:33:54'),
(90, 14, 'project', 'slide', 'Panamericana 08', 'proyectos/14/slide-panamericana08-1.jpg', 'Panamericana 08', NULL, 6, 1, 'proyectos/14/smalls/slide-panamericana08-1-resize-128x128-small.jpg', '2013-05-07 14:26:45', '2013-05-07 14:34:01'),
(91, 17, 'project', 'thumb', 'Rivera Thumb', 'proyectos/17/thumb-riverathumb.jpg', 'Rivera Thumb', NULL, 1, 1, 'proyectos/17/smalls/thumb-riverathumb-resize-128x128-small.jpg', '2013-05-07 14:45:22', '2013-05-07 14:45:22'),
(92, 17, 'project', 'slide', 'Rivera 01', 'proyectos/17/slide-rivera01.jpg', 'Rivera 01', NULL, 0, 1, 'proyectos/17/smalls/slide-rivera01-resize-128x128-small.jpg', '2013-05-07 14:47:31', '2013-05-07 14:47:31'),
(93, 17, 'project', 'home', 'Rivera 02', 'proyectos/17/home-rivera02.jpg', 'Rivera 02', NULL, 2, 1, 'proyectos/17/smalls/home-rivera02-resize-128x128-small.jpg', '2013-05-07 14:47:52', '2013-05-07 14:47:52'),
(94, 17, 'project', 'slide', 'Rivera 03', 'proyectos/17/slide-rivera03.jpg', 'Rivera 03', NULL, 3, 1, 'proyectos/17/smalls/slide-rivera03-resize-128x128-small.jpg', '2013-05-07 14:48:07', '2013-05-07 14:48:07'),
(95, 17, 'project', 'slide', 'Rivera 04', 'proyectos/17/slide-rivera04.jpg', 'Rivera 04', NULL, 4, 1, 'proyectos/17/smalls/slide-rivera04-resize-128x128-small.jpg', '2013-05-07 14:48:23', '2013-05-07 14:48:23'),
(96, 17, 'project', 'slide', 'Rivera 05', 'proyectos/17/slide-rivera05.jpg', 'Rivera 05', NULL, 5, 1, 'proyectos/17/smalls/slide-rivera05-resize-128x128-small.jpg', '2013-05-07 14:48:42', '2013-05-07 14:48:42'),
(97, 17, 'project', 'slide', 'Rivera 06', 'proyectos/17/slide-rivera06.jpg', 'Rivera 06', NULL, 6, 1, 'proyectos/17/smalls/slide-rivera06-resize-128x128-small.jpg', '2013-05-07 14:49:01', '2013-05-07 14:49:01'),
(98, 17, 'project', 'slide', 'Rivera 07', 'proyectos/17/slide-rivera07.jpg', 'Rivera 07', NULL, 7, 1, 'proyectos/17/smalls/slide-rivera07-resize-128x128-small.jpg', '2013-05-07 14:49:17', '2013-05-07 14:49:17'),
(99, 5, 'tender', 'slide', 'Cancilleria 01', 'concursos/5/slide-cancilleria01.jpg', 'Cancilleria 01', NULL, 1, 1, 'concursos/5/smalls/slide-cancilleria01-resize-128x128-small.jpg', '2013-05-07 14:58:15', '2013-05-07 14:58:15'),
(100, 5, 'tender', 'slide', 'Cancilleria 02', 'concursos/5/slide-cancilleria02.jpg', 'Cancilleria 02', NULL, 0, 1, 'concursos/5/smalls/slide-cancilleria02-resize-128x128-small.jpg', '2013-05-07 14:58:37', '2013-05-07 14:58:37'),
(101, 5, 'tender', 'slide', 'Cancilleria 03', 'concursos/5/slide-cancilleria03.jpg', 'Cancilleria 03', NULL, 2, 1, 'concursos/5/smalls/slide-cancilleria03-resize-128x128-small.jpg', '2013-05-07 14:58:52', '2013-05-07 14:58:52'),
(102, 5, 'tender', 'slide', 'Cancilleria 04', 'concursos/5/slide-cancilleria04.jpg', 'Cancilleria 04', NULL, 3, 1, 'concursos/5/smalls/slide-cancilleria04-resize-128x128-small.jpg', '2013-05-07 14:59:09', '2013-05-07 14:59:09'),
(103, 6, 'tender', 'slide', 'Centro Cultural 01', 'concursos/6/slide-ccc01-1.jpg', 'Centro Cultural 01', NULL, 0, 1, 'concursos/6/smalls/slide-ccc01-1-resize-128x128-small.jpg', '2013-05-07 15:01:45', '2013-05-07 15:04:01'),
(104, 6, 'tender', 'slide', 'Centro Cultural 02', 'concursos/6/slide-ccc02-1.jpg', 'Centro Cultural 0', NULL, 1, 1, 'concursos/6/smalls/slide-ccc02-1-resize-128x128-small.jpg', '2013-05-07 15:02:03', '2013-05-07 15:03:59'),
(105, 6, 'tender', 'slide', 'Centro Cultural 03', 'concursos/6/slide-ccc03.jpg', 'Centro Cultural 03', NULL, 2, 1, 'concursos/6/smalls/slide-ccc03-resize-128x128-small.jpg', '2013-05-07 15:04:41', '2013-05-07 15:04:41'),
(106, 6, 'tender', 'slide', 'Centro Cultural 04', 'concursos/6/slide-ccc04.jpg', 'Centro Cultural 04', NULL, 3, 1, 'concursos/6/smalls/slide-ccc04-resize-128x128-small.jpg', '2013-05-07 15:05:06', '2013-05-07 15:05:06'),
(107, 7, 'tender', 'thumb', 'CGP Thumb', 'concursos/7/thumb-cgpthumb.jpg', 'CGP Thumb', NULL, 0, 1, 'concursos/7/smalls/thumb-cgpthumb-resize-128x128-small.jpg', '2013-05-07 15:09:47', '2013-05-07 15:09:47'),
(108, 7, 'tender', 'slide', 'CGP 01', 'concursos/7/slide-cgp01.jpg', 'CGP 01', NULL, 1, 1, 'concursos/7/smalls/slide-cgp01-resize-128x128-small.jpg', '2013-05-07 15:10:34', '2013-05-07 15:10:34'),
(109, 7, 'tender', 'slide', 'CGP 02', 'concursos/7/slide-cgp02.jpg', 'CGP 02', NULL, 2, 1, 'concursos/7/smalls/slide-cgp02-resize-128x128-small.jpg', '2013-05-07 15:10:58', '2013-05-07 15:10:58'),
(110, 7, 'tender', 'slide', 'CGP 03', 'concursos/7/slide-cgp03.jpg', 'CGP 03', NULL, 3, 1, 'concursos/7/smalls/slide-cgp03-resize-128x128-small.jpg', '2013-05-07 15:11:14', '2013-05-07 15:11:14'),
(111, 7, 'tender', 'slide', 'CGP 04', 'concursos/7/slide-cgp04.jpg', 'CGP 04', NULL, 4, 1, 'concursos/7/smalls/slide-cgp04-resize-128x128-small.jpg', '2013-05-07 15:11:29', '2013-05-07 15:11:29'),
(112, 8, 'tender', 'thumb', 'Manzana Thumb', 'concursos/8/thumb-manzanathumb.jpg', 'Manzana Thumb', NULL, 0, 1, 'concursos/8/smalls/thumb-manzanathumb-resize-128x128-small.jpg', '2013-05-07 15:12:49', '2013-05-07 15:12:49'),
(113, 8, 'tender', 'slide', 'Manzana 01', 'concursos/8/slide-manzana01.jpg', 'Manzana 01', NULL, 1, 1, 'concursos/8/smalls/slide-manzana01-resize-128x128-small.jpg', '2013-05-07 15:15:37', '2013-05-07 15:15:37'),
(114, 8, 'tender', 'slide', 'Manzana 02', 'concursos/8/slide-manzana02.jpg', 'Manzana 02', NULL, 2, 1, 'concursos/8/smalls/slide-manzana02-resize-128x128-small.jpg', '2013-05-07 15:15:54', '2013-05-07 15:15:54'),
(115, 8, 'tender', 'slide', 'Manzana 03', 'concursos/8/slide-manzana03.jpg', 'Manzana 03', NULL, 3, 1, 'concursos/8/smalls/slide-manzana03-resize-128x128-small.jpg', '2013-05-07 15:16:09', '2013-05-07 15:16:09'),
(116, 8, 'tender', 'slide', 'Manzana 04', 'concursos/8/slide-manzana04.jpg', 'Manzana 04', NULL, 4, 1, 'concursos/8/smalls/slide-manzana04-resize-128x128-small.jpg', '2013-05-07 15:16:24', '2013-05-07 15:16:24'),
(118, NULL, NULL, 'home', 'titulo test imagen home', 'concursos//home-arg11.jpg', 'alt test imagen home', 'zeit.de', 56, 0, 'concursos//smalls/home-arg11-resize-260x180-small.jpg', '2013-05-21 08:14:07', '2013-05-21 11:16:25'),
(119, NULL, NULL, 'home', '', 'concursos//home-arg11-1.jpg', 'test test test', 'paymeback.gr/', 57, 0, 'concursos//smalls/home-arg11-1-resize-260x180-small.jpg', '2013-05-21 08:43:48', '2013-05-21 08:46:49'),
(120, NULL, NULL, 'home', '', 'concursos//home-WWF-logo.gif', 'no link no titulo', NULL, 58, 0, 'concursos//smalls/home-WWF-logo-resize-260x180-small.gif', '2013-05-21 08:48:48', '2013-05-21 08:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `project_idea_and_management` text NOT NULL,
  `client` varchar(255) NOT NULL,
  `total_area` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `proposal` text NOT NULL COMMENT 'propuesta',
  `featured` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'proyecto destacado',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `order` smallint(3) unsigned NOT NULL DEFAULT '0',
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `active` (`active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `subtitle`, `location`, `project_idea_and_management`, `client`, `total_area`, `year`, `proposal`, `featured`, `active`, `order`, `created`, `modified`) VALUES
(11, 'Cavas', 'Cavas', '<p>Lorem ipsum dolor sit amet</p>', '<p>Lorem ipsum dolor sit amet</p>', 'Particular', 0, '2011', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 1, 1, 3, '2013-04-24 00:34:53', '2013-05-16 23:33:45'),
(12, 'Freire', 'Freire', '<p>Lorem ipsum dolor sit amet</p>', '<p>Lorem ipsum dolor sit amet</p>', 'Particular', 0, '2012', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 1, 1, 1, '2013-04-24 00:58:45', '2013-05-15 04:49:48'),
(13, 'Molino Blanco', 'Molino Blanco', '<p>Lorem ipsum dolor sit amet</p>', '<p>Lorem ipsum dolor sit amet</p>', 'Particular', 0, '2011', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consete</p>', 1, 1, 0, '2013-04-24 01:08:32', '2013-05-15 11:50:48'),
(14, 'Panamericana y Velez Sarfield', 'Panamericana y Velez Sarfield', '<p>Lorem ipsum dolor sit amet</p>', '<p>Lorem ipsum dolor sit amet</p>', 'Particular', 0, '2012', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consete</p>', 0, 1, 2, '2013-04-24 01:57:05', '2013-05-15 07:11:22'),
(17, 'Rivera', 'Rivera', '<p>Lorem ipsum dolor sit amet</p>', '<p>Lorem ipsum dolor sit amet</p>', 'bara', 0, '2013', '<p>Test Mil</p>', 0, 1, 4, '2013-04-27 01:04:23', '2013-05-14 23:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE IF NOT EXISTS `tenders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `project_idea_and_management` text NOT NULL,
  `client` varchar(255) NOT NULL,
  `total_area` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `proposal` text NOT NULL,
  `featured` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'proyecto destacado',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `order` smallint(3) unsigned NOT NULL DEFAULT '0',
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `title`, `subtitle`, `location`, `project_idea_and_management`, `client`, `total_area`, `year`, `proposal`, `featured`, `active`, `order`, `created`, `modified`) VALUES
(5, 'Cancilleria', 'Cancilleria', '<p>Lorem ipsum dolor sit amet</p>', '<p>Lorem ipsum dolor sit amet</p>', 'Particular', 0, '2003', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 1, 1, 0, '2013-04-24 00:43:01', '2013-05-16 00:00:56'),
(6, 'Centro Cultural Cordoba', 'Centro Cultural Cordoba', '<p>Lorem ipsum dolor sit amet</p>', '<p>Lorem ipsum dolor sit amet</p>', 'Particular', 3, '2009', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 1, 1, 3, '2013-04-24 00:54:11', '2013-05-07 21:51:50'),
(7, 'CGP', 'CGP', '<p>Lorem ipsum dolor sit amet</p>', '<p>Lorem ipsum dolor sit amet</p>', 'Particular', 0, '2013', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consete</p>', 0, 1, 1, '2013-04-24 01:46:09', '2013-05-15 05:58:42'),
(8, 'Manzana Luces', 'Manzana Luces', '<p>Lorem ipsum dolor sit amet</p>', '<p>Lorem ipsum dolor sit amet</p>', 'Particular', 0, '2012', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvoluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 0, 1, 2, '2013-05-07 21:53:00', '2013-05-07 21:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`, `is_active`, `created`, `modified`) VALUES
(1, 'admin', '7e38ad7f72d5a1c414e02d5fcc0dd881a3aa5407', 1, 1, '2013-04-09 00:38:28', '2013-04-09 00:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `referenced_id` int(11) NOT NULL,
  `referenced_type` enum('project','tender') NOT NULL,
  `title` varchar(255) NOT NULL,
  `embed_code` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `referenced_id` (`referenced_id`),
  KEY `referenced_type` (`referenced_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `referenced_id`, `referenced_type`, `title`, `embed_code`, `active`, `created`, `modified`) VALUES
(5, 11, 'project', 'Test', '<p><iframe src="http://player.vimeo.com/video/64570202?byline=0&amp;portrait=0&amp;badge=0" width="330" height="185" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>', 1, '2013-04-23 18:07:29', '2013-04-24 15:00:04'),
(6, 5, 'tender', 'test', '<iframe src="http://player.vimeo.com/video/32830873" width="330" height="230" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>', 1, '2013-04-23 18:22:20', '2013-04-23 18:25:51'),
(7, 12, 'project', 'test', '            <iframe src="http://player.vimeo.com/video/56974716?title=0&amp;byline=0&amp;portrait=0&amp;color=699406" width="330" height="230" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>', 1, '2013-04-23 18:25:17', '2013-04-23 18:25:17'),
(8, 13, 'project', 'test', '<iframe src="http://player.vimeo.com/video/64570202?title=0&amp;byline=0&amp;portrait=0&amp;badge=0" width="330" height="186" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>', 1, '2013-04-24 15:14:14', '2013-04-24 15:14:14'),
(9, 14, 'project', 'Abismo', '<iframe src="http://player.vimeo.com/video/61223734" width="330" height="230" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> ', 1, '2013-05-07 17:33:49', '2013-05-07 17:36:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
