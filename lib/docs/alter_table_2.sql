ALTER TABLE  `images` CHANGE  `referenced_type`  `referenced_type` ENUM(  'project',  'tender' ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE  `images` CHANGE  `referenced_id`  `referenced_id` INT( 11 ) NULL DEFAULT NULL;

ALTER TABLE  `images` ADD  `link` TEXT NULL DEFAULT NULL AFTER  `alt`;

ALTER TABLE  `images` ADD  `order` SMALLINT( 3 ) NOT NULL AFTER  `link`;

ALTER TABLE  `projects` DROP  `show_in_home` ,
DROP  `show_in_home_link` ;

ALTER TABLE  `tenders` DROP  `show_in_home` ,
DROP  `show_in_home_link` ;
