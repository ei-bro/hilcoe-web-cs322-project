-- user table query
CREATE TABLE `users` (
	`username` VARCHAR(25) NOT NULL,
	`first_name` VARCHAR(25) NOT NULL,
	`last_name` VARCHAR(25) NOT NULL,
	`email` VARCHAR(25) NOT NULL,
	`pasword` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`username`)
);