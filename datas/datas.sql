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
INSERT INTO `bugsme`.`users`(
	`user_id`,
	`user_name`,
    `user_mail`,
	`user_password`,
	`user_active`,
	`role_id`)
VALUES
(
	1,
	'Admin',
    'admin@test.fr',
	'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',
	1,
	1
)
$$

