###########################
#
# SI NO FUNCIONA CORRER TODAS LAS QUERIES JUNTAS, CORRANLAS UNA POR UNA A MANO
# EN PHPMYADMIN HAY UN CAMPO PARA ESTABLECER EL DELIMITADOR PARA STORED PROCEDURES, 
# UTILIZAR ESE Y QUITAR LA  CLAUSULA DELIMITER DE LA QUERY
#
# PROBLEMAS CONOCIDOS: NO TENES PERMISO PARA EJECUTAR STORED PROCEDURES EN la DDBB.
#
# PARA VER LOS STORES PROCEDURES QUE CREASTE EN PHPMYADMIN ANDA AL MENU "ROUTINES", 
# PUEDE ESTAR ARRIBA EN EL MENU O DEBAJO DEL LISTADO DE TABLAS
#
###########################

###################
# PROJECTS
#################
DELIMITER //
DROP PROCEDURE IF EXISTS `projects_update_order`//
CREATE PROCEDURE `projects_update_order`()
    DETERMINISTIC
    COMMENT 'Rutina para actualizar el orden en la tabla projects a causa de un nuevo requerimiento en el proyecto'
BEGIN
    DECLARE tempId, tmpOrder, done INT DEFAULT 0;
    DECLARE cur1 CURSOR FOR SELECT id FROM projects;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

    OPEN cur1;

    REPEAT
        FETCH cur1 INTO tempId;
        UPDATE projects p SET p.order = tmpOrder WHERE id = tempId;
        SET tmpOrder = tmpOrder +1;
    UNTIL done  = 1 END REPEAT;
    CLOSE cur1;
END //
DELIMITER ;
CALL projects_update_order();

##################
# TENDERS
###################
DROP PROCEDURE `tenders_update_order`//
CREATE PROCEDURE IF EXISTS `tenders_update_order`()
    DETERMINISTIC
    COMMENT 'Rutina para actualizar el orden en la tabla tenders y tenders a causa de un nuevo requerimiento en el proyecto'
BEGIN
    DECLARE tempId, tmpOrder, done INT DEFAULT 0;
    DECLARE cur1 CURSOR FOR SELECT id FROM tenders;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

    OPEN cur1;

    REPEAT
        FETCH cur1 INTO tempId;
        UPDATE tenders p SET p.order = tmpOrder WHERE id = tempId;
        SET tmpOrder = tmpOrder +1;
    UNTIL done  = 1 END REPEAT;
    CLOSE cur1;
END //
DELIMITER ;
CALL tenders_update_order();
