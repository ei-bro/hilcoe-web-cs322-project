-- user table query
CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_id` INT NOT NULL ,
	`username` VARCHAR(25) NOT NULL,
	`email` VARCHAR(25) NOT NULL,
	`password` VARCHAR(250) NOT NULL,
	`role` VARCHAR(250) DEFAULT "user" ,

	PRIMARY KEY (`id`)
);

CREATE TABLE `products` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`price` DOUBLE NOT NULL,
	`name` VARCHAR(155) NOT NULL,
	`image` VARCHAR(255) NOT NULL,
	`featured` BOOLEAN,
	`company` VARCHAR(155) NOT NULL,
	PRIMARY KEY (`id`)
) ;