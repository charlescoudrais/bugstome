delimiter $$

CREATE DATABASE `bugsme` DEFAULT CHARACTER SET utf8
$$

USE `bugsme`
$$

CREATE TABLE `roles` (
  `role_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(25) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
$$

CREATE TABLE `priorities` (
  `priority_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `priority_name` varchar(45) NOT NULL,
  PRIMARY KEY (`priority_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
$$

CREATE TABLE `users` (
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `user_password` char(42) NOT NULL,
  `user_active` tinyint(4) NOT NULL DEFAULT '0',
  `role_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_role_id` (`role_id`),
  CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
$$

CREATE TABLE `projects` (
  `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_title` varchar(45) NOT NULL,
  `project_end` varchar(45) NOT NULL,
  `project_description` text NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
$$

CREATE TABLE `tasks` (
  `task_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `task_label` varchar(100) NOT NULL,
  `task_start` varchar(45) NOT NULL,
  `task_end` varchar(45) NOT NULL,
  `task_description` text NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL,
  `priority_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `fk_user_id_idx` (`user_id`),
  KEY `fk_priority_id_idx` (`priority_id`),
  CONSTRAINT `fk_priority_id` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`priority_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
$$

CREATE TABLE `notes` (
  `note_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `note_label` varchar(45) NOT NULL,
  `note_description` text,
  `note_date` varchar(45) NOT NULL,
  `task_id` int(10) unsigned NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`note_id`),
  KEY `fk_task_id_idx` (`task_id`),
  KEY `fk_user_id_idx` (`user_id`),
  CONSTRAINT `fk_nuser_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_task_id` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
$$
