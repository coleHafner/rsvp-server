
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- address
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `address`;

CREATE TABLE `address`
(
	`id` INTEGER(10) NOT NULL AUTO_INCREMENT,
	`street_1` VARCHAR(255),
	`street_2` VARCHAR(255),
	`city` VARCHAR(255),
	`state` VARCHAR(255),
	`zip` VARCHAR(255),
	`active` TINYINT(1) DEFAULT 1,
	`created` INT(10),
	`updated` INT(10),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- guest
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `guest`;

CREATE TABLE `guest`
(
	`id` INTEGER(10) NOT NULL AUTO_INCREMENT,
	`parent_id` INTEGER(10),
	`address_id` INTEGER(10),
	`wedding_id` INTEGER(10) NOT NULL,
	`first_name` VARCHAR(255),
	`last_name` VARCHAR(255),
	`activation_code` VARCHAR(255),
	`expected_count` INTEGER(10),
	`actual_count` INTEGER(10),
	`rsvp_through_site` TINYINT(1),
	`is_attending` TINYINT(1),
	`is_new` TINYINT(1) DEFAULT 0,
	`active` TINYINT(1) DEFAULT 1,
	`created` INT(10),
	`updated` INT(10),
	PRIMARY KEY (`id`),
	INDEX `parent_id` (`parent_id`(10)),
	INDEX `address_id` (`address_id`(10)),
	INDEX `wedding_id` (`wedding_id`(10)),
	CONSTRAINT `guest_ibfk_1`
		FOREIGN KEY (`parent_id`)
		REFERENCES `guest` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `guest_ibfk_2`
		FOREIGN KEY (`address_id`)
		REFERENCES `address` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `guest_ibfk_3`
		FOREIGN KEY (`wedding_id`)
		REFERENCES `wedding` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- guest_guest_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `guest_guest_type`;

CREATE TABLE `guest_guest_type`
(
	`guest_id` INTEGER(10) NOT NULL,
	`guest_type_id` INTEGER(10) NOT NULL,
	`created` INT(10),
	PRIMARY KEY (`guest_id`,`guest_type_id`),
	UNIQUE INDEX `guest_id_2` (`guest_id`(10), `guest_type_id`(10)),
	INDEX `guest_id` (`guest_id`(10)),
	INDEX `guest_type_id` (`guest_type_id`(10)),
	CONSTRAINT `guest_guest_type_ibfk_1`
		FOREIGN KEY (`guest_id`)
		REFERENCES `guest` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `guest_guest_type_ibfk_2`
		FOREIGN KEY (`guest_type_id`)
		REFERENCES `guest_type` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- guest_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `guest_type`;

CREATE TABLE `guest_type`
(
	`id` INTEGER(10) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255),
	`is_special` TINYINT(1),
	`active` TINYINT(1) DEFAULT 1,
	`created` INT(10),
	`updated` INT(10),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- session
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session`
(
	`id` INTEGER(10) NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER(10) NOT NULL,
	`hash` VARCHAR(255) NOT NULL,
	`user_agent` VARCHAR(255) NOT NULL,
	`ip_address` VARCHAR(255) NOT NULL,
	`terminated` DATETIME,
	`created` INT(10),
	`updated` INT(10),
	PRIMARY KEY (`id`),
	INDEX `userId` (`user_id`(10)),
	CONSTRAINT `session_ibfk_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
	`id` INTEGER(10) NOT NULL AUTO_INCREMENT,
	`wedding_id` INTEGER(10) NOT NULL,
	`username` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`created` INT(10) NOT NULL,
	`updated` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `wedding_id` (`wedding_id`(10)),
	CONSTRAINT `user_ibfk_1`
		FOREIGN KEY (`wedding_id`)
		REFERENCES `wedding` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- wedding
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `wedding`;

CREATE TABLE `wedding`
(
	`id` INTEGER(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`created` INT(10),
	`updated` INT(10),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
