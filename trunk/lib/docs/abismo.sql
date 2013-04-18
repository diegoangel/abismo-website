-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2013 at 11:42 AM
-- Server version: 5.5.30
-- PHP Version: 5.4.4-14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `abismo`
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
  `referenced_id` int(11) NOT NULL,
  `referenced_type` enum('project','tender') NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referenced_foreign_key` (`referenced_id`,`referenced_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `total area` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `proposal` text NOT NULL COMMENT 'propuesta',
  `show_in_home` tinyint(1) NOT NULL DEFAULT '0',
  `featured` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'proyecto destacado',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `subtitle`, `location`, `project_idea_and_management`, `client`, `total area`, `year`, `proposal`, `show_in_home`, `featured`, `active`, `created`, `modified`) VALUES
(1, 'CASA MARIANO ACHA', 'MODIFICACIÃ“N Y AMPLIACIÃ“N VIVIENDA UNIFAMILIAR', '<p>Calle Mariano Acha 3000 Coghlan Buenos Aires, Argentina</p>', '<p>ab.ismo Oficina de arquitectura</p>', 'Particular', 220, '2011', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id sapien id neque rutrum bibendum id malesuada mi. Aliquam rutrum pulvinar turpis, a dictum libero fringilla ac. Vestibulum sit amet sem diam, eu egestas nisl. Aliquam id diam sit amet mi tempor ultricies id at eros. Quisque non tristique ligula. Nulla sed leo nec nibh blandit malesuada in quis orci. Sed eget lectus leo, eu luctus eros. Nunc lorem quam, hendrerit ut elementum in, interdum ac nunc. Suspendisse id ante lobortis justo imperdiet vestibulum a at sem. Nulla arcu purus, congue quis mattis nec, mollis eu libero. Vivamus viverra iaculis dolor, a porta massa vestibulum eget. Donec vel justo massa, sit amet luctus magna. Aliquam rutrum suscipit.</p>', 0, 1, 1, '0000-00-00 00:00:00', '2013-04-17 15:56:41');

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
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `title`, `subtitle`, `location`, `project_idea_and_management`, `client`, `total_area`, `year`, `proposal`, `featured`, `active`, `created`, `modified`) VALUES
(1, 'CASA MARIANO ACHA', 'MODIFICACIÃ“N Y AMPLIACIÃ“N VIVIENDA UNIFAMILIAR', '<p>Calle Mariano Acha 3000</p>\r\n<p>Coghlan</p>\r\n<p>Buenos Aires, Argentina</p>', '<p>ab.ismo Oficina de arquitectura</p>', 'Particular', 220, '2011', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id sapien id neque rutrum bibendum id malesuada mi. Aliquam rutrum pulvinar turpis, a dictum libero fringilla ac. Vestibulum sit amet sem diam, eu egestas nisl. Aliquam id diam sit amet mi tempor ultricies id at eros. Quisque non tristique ligula. Nulla sed leo nec nibh blandit malesuada in quis orci. Sed eget lectus leo, eu luctus eros. Nunc lorem quam, hendrerit ut elementum in, interdum ac nunc. Suspendisse id ante lobortis justo imperdiet vestibulum a at sem. Nulla arcu purus, congue quis mattis nec, mollis eu libero. Vivamus viverra iaculis dolor, a porta massa vestibulum eget. Donec vel justo massa, sit amet luctus magna. Aliquam rutrum suscipit.</p>', 0, 1, '0000-00-00 00:00:00', '2013-04-17 16:32:27');

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
  `reference_type` enum('project','tender') NOT NULL,
  `title` varchar(255) NOT NULL,
  `embed_code` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referenced_foreign_key` (`referenced_id`,`reference_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
