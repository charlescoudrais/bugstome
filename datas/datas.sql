DELIMITER $$

USE `bugsme`
$$

-- Priorities
INSERT INTO `bugsme`.`priorities`(
	`priority_id`,
	`priority_name`
)
VALUES(
	1,
	'Low'
)
$$

INSERT INTO `bugsme`.`priorities`(
	`priority_id`,
	`priority_name`
)
VALUES(
	2,
	'Normal'
)
$$

INSERT INTO `bugsme`.`priorities`(
	`priority_id`,
	`priority_name`
)
VALUES(
	3,
	'Urgent'
)
$$

-- Roles
INSERT INTO `bugsme`.`roles`(
	`role_id`,
	`role_name`
)
VALUES(
	1,
	'Root'
)
$$

INSERT INTO `bugsme`.`roles`(
	`role_id`,
	`role_name`
)
VALUES(
	2,
	'Admin'
)
$$

INSERT INTO `bugsme`.`roles`(
	`role_id`,
	`role_name`
)
VALUES(
	3,
	'User'
)
$$

INSERT INTO `bugsme`.`roles`(
	`role_id`,
	`role_name`
)
VALUES(
	4,
	'Guest'
)
$$

-- Users
INSERT INTO `bugsme`.`users`
(
    `user_id`,
    `user_name`,
    `user_mail`,
    `user_password`,
    `user_function`,
    `user_active`,
    `role_id`
)
VALUES
(
	1,
	'Admin',
    'admin@test.fr',
	'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',
	'Administrator',
	1,
	1
)
$$
INSERT INTO `bugsme`.`users` (
    `user_id`,
    `user_name`,
    `user_mail`,
    `user_password`,
    `user_function`,
    `user_active`,
    `role_id`
) VALUES (
    2,
    'test',
    'test@test.fr',
    '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',
    'Test',
    1,
    4
);
-- Projects
INSERT INTO `bugsme`.`projects` (
    `project_id`,
    `project_title`,
    `project_start`,
    `project_end`,
    `project_description`,
    `user_id`
) VALUES (
    1,
    'My first project',
    '19-10-2012',
    '21-12-2012 23:59:12',
    'This is an exemple project By Créations 2C...',
    1
);
INSERT INTO `bugsme`.`projects` (
    `project_id`,
    `project_title`,
    `project_start`,
    `project_end`,
    `project_description`,
    `user_id`
) VALUES (
    2,
    'My second project, testing substr',
    '27-11-2012',
    '21-12-2012',
    'ceci est la description project 2... <br />By Créations 2C',
    1
);
$$

-- Tasks
INSERT INTO `bugsme`.`tasks` (
    `task_id`,
    `task_label`,
    `task_start`,
    `task_end`,
    `task_description`,
    `user_id`,
    `priority_id`,
    `project_id`
) VALUES (
    1,
    'Task 1 (Project 1)',
    '12-12-2012 12:12:12',
    '21-12-2012 12:12:12',
    'description...',
    1,
    2,
    1
)
$$
INSERT INTO `bugsme`.`tasks` (
    `task_id`,
    `task_label`,
    `task_start`,
    `task_end`,
    `task_description`,
    `user_id`,
    `priority_id`,
    `project_id`
) VALUES (
    2,
    'Task 1 (Project 2)',
    '12-12-2012 12:12:12',
    '21-12-2012 12:12:12',
    'description...',
    2,
    1,
    2
)
$$