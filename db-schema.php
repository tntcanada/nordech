<?php

/*
Create a DB and run these tSQL queries to generate the tables used.

Main Table to store most data from the api end point

CREATE TABLE `universities` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`country` VARCHAR(20) NOT NULL DEFAULT '' COLLATE 'utf8_general_ci',
	`state_province` VARCHAR(50) NULL DEFAULT '' COLLATE 'utf8_general_ci',
	`alpha_two_code` VARCHAR(2) NOT NULL DEFAULT '' COLLATE 'utf8_general_ci',
	`name` VARCHAR(250) NOT NULL DEFAULT '' COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;


Reference table to store multiple domains associated to a university

CREATE TABLE `domains` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`uid` INT(11) NOT NULL DEFAULT '0',
	`domain` VARCHAR(250) NOT NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `uid` (`uid`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;



Reference table to store multiple web pages associated to a university

CREATE TABLE `web_pages` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`uid` INT(11) NOT NULL DEFAULT '0',
	`url` VARCHAR(250) NOT NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `uid` (`uid`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;


*/

?>