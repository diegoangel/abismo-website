###########################
#
# SI NO FUNCIONA CORRER TODAS LAS QUERIES JUNTAS, CORRANLAS UNA POR UNA A MANO
# EN PHPMYADMIN HAY UN CAMPO PARA ESTABLECER EL DELIMITADOR PARA STORED PROCEDURES, 
# UTILIZAR ESE Y QUITAR LA  CLAUSULA DELIMITER DE LA QUERY
#
###########################

###################
# PROJECTS
#################
ALTER TABLE `projects` ADD `order` SMALLINT( 3 ) UNSIGNED NOT NULL DEFAULT '0' AFTER `active`;
ALTER TABLE `projects`  ADD `show_in_home_link` TINYINT(1) NOT NULL DEFAULT '1' AFTER `show_in_home`;

##################
# TENDERS
###################
ALTER TABLE `tenders` ADD `order` SMALLINT( 3 ) UNSIGNED NOT NULL DEFAULT '0' AFTER `active`;
ALTER TABLE `tenders` ADD `show_in_home` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `proposal`;
ALTER TABLE `tenders`  ADD `show_in_home_link` TINYINT(1) NOT NULL DEFAULT '1' AFTER `show_in_home`;
