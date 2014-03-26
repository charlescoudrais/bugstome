CREATE TABLE `notes` (
  `note_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `note_label` varchar(45) NOT NULL,
  `note_description` text,
  `note_date` varchar(45) NOT NULL,
  `task_id` int(10) unsigned NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`note_id`),
  KEY `fk_task_id_idx` (`task_id`),
  KEY `fk_user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Contenu de la table `notes`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `priorities`
-- 

CREATE TABLE `priorities` (
  `priority_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `priority_name` varchar(45) NOT NULL,
  PRIMARY KEY (`priority_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 
-- Contenu de la table `priorities`
-- 

INSERT INTO `priorities` (`priority_id`, `priority_name`) VALUES (1, 'Low');
INSERT INTO `priorities` (`priority_id`, `priority_name`) VALUES (2, 'Normal');
INSERT INTO `priorities` (`priority_id`, `priority_name`) VALUES (3, 'Urgent');

-- --------------------------------------------------------

-- 
-- Structure de la table `projects`
-- 

CREATE TABLE `projects` (
  `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_title` varchar(45) NOT NULL,
  `project_start` varchar(45) NOT NULL,
  `project_end` varchar(45) NOT NULL,
  `project_description` varchar(500) NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 
-- Contenu de la table `projects`
-- 

INSERT INTO `projects` (`project_id`, `project_title`, `project_start`, `project_end`, `project_description`, `user_id`) VALUES (1, 'My first project', '17-10-2012 22:50:15', '21-12-2012 00:00:01', 'This is an exemple project...', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `roles`
-- 

CREATE TABLE `roles` (
  `role_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(25) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- 
-- Contenu de la table `roles`
-- 

INSERT INTO `roles` (`role_id`, `role_name`) VALUES (1, 'Root');
INSERT INTO `roles` (`role_id`, `role_name`) VALUES (2, 'Admin');
INSERT INTO `roles` (`role_id`, `role_name`) VALUES (3, 'User');
INSERT INTO `roles` (`role_id`, `role_name`) VALUES (4, 'Guest');

-- --------------------------------------------------------

-- 
-- Structure de la table `tasks`
-- 

CREATE TABLE `tasks` (
  `task_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `task_label` varchar(100) NOT NULL,
  `task_start` varchar(45) NOT NULL,
  `task_end` varchar(45) NOT NULL,
  `task_description` text NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL,
  `priority_id` tinyint(3) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `fk_user_id_idx` (`user_id`),
  KEY `fk_priority_id_idx` (`priority_id`),
  KEY `fk_project_id_idx` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- 
-- Contenu de la table `tasks`
-- 

INSERT INTO `tasks` (`task_id`, `task_label`, `task_start`, `task_end`, `task_description`, `user_id`, `priority_id`, `project_id`) VALUES (1, 'Task 1 (Project 1)', '12-12-2012 12:12:12', '21-12-2012 12:12:12', 'description...', 1, 2, 1);
INSERT INTO `tasks` (`task_id`, `task_label`, `task_start`, `task_end`, `task_description`, `user_id`, `priority_id`, `project_id`) VALUES (2, 'Task 2 (Project 1)', '12-12-2012 12:12:12', '21-12-2012 12:12:12', 'description...', 1, 1, 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `users`
-- 

CREATE TABLE `users` (
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `user_mail` varchar(70) NOT NULL,
  `user_password` char(42) NOT NULL,
  `user_function` varchar(45) NOT NULL DEFAULT 'N.R.',
  `user_active` tinyint(4) NOT NULL DEFAULT '0',
  `role_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_mail` (`user_mail`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 
-- Contenu de la table `users`
-- 

INSERT INTO `users` (`user_id`, `user_name`, `user_mail`, `user_password`, `user_function`, `user_active`, `role_id`) VALUES (1, 'Admin', 'admin@test.fr', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Administrator', 1, 1);

-- 
-- Contraintes pour les tables exportées
-- 

-- 
-- Contraintes pour la table `notes`
-- 
ALTER TABLE `notes`
  ADD CONSTRAINT `fk_nuser_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_task_id` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON UPDATE CASCADE;

-- 
-- Contraintes pour la table `tasks`
-- 
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_priority_id` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`priority_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

-- 
-- Contraintes pour la table `users`
-- 
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON UPDATE CASCADE;
