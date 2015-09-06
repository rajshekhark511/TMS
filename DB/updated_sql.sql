ALTER TABLE `tbl_institute`
CHANGE COLUMN `inst_address1` `inst_address1` TEXT NULL DEFAULT NULL AFTER `inst_name`,
CHANGE COLUMN `inst_address2` `inst_address2` TEXT NULL DEFAULT NULL AFTER `inst_address1`
CHANGE COLUMN `inst_city` `inst_city` VARCHAR(250) NULL DEFAULT NULL AFTER `inst_phone`;

--Table for log
CREATE TABLE `tbl_log` (
	`log_id` INT(10) NULL AUTO_INCREMENT,
	`log_ip` VARCHAR(20) NULL,
	`log_date` DATETIME NULL,
	`log_out_date` DATETIME NULL,
	`log_browser` TEXT NULL,
	`user_id` INT NULL,
	PRIMARY KEY (`log_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

--Branch table
CREATE TABLE `tbl_branches` (
	`br_id` INT(10) NOT NULL AUTO_INCREMENT,
	`inst_id` INT(10) NULL DEFAULT NULL,
	`br_city` VARCHAR(250) NOT NULL,
	`br_name` VARCHAR(250) NULL DEFAULT NULL,
	`br_address_1` VARCHAR(250) NULL DEFAULT NULL,
	`br_address_2` VARCHAR(250) NULL DEFAULT NULL,
	`br_state` INT(10) NULL DEFAULT NULL,
	`br_district` INT(10) NULL DEFAULT NULL,
	`br_phone` VARCHAR(15) NULL DEFAULT NULL,
	`br_date` DATETIME NULL DEFAULT NULL,
	`br_update_date` DATETIME NULL DEFAULT NULL,
	`br_status` INT(2) NULL DEFAULT NULL,
	`br_delete_status` INT(2) NULL DEFAULT '1',
	PRIMARY KEY (`br_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

--Standard table
CREATE TABLE `tbl_standard` (
	`std_id` INT(10) NOT NULL AUTO_INCREMENT,
	`br_id` INT(10) NULL DEFAULT NULL,
	`std_name` VARCHAR(250) NULL DEFAULT NULL,
	`std_date` DATETIME NULL DEFAULT NULL,
	`std_updated_date` DATETIME NULL DEFAULT NULL,
	`std_status` INT(1) NULL DEFAULT NULL,
	`std_del_status` INT(1) NULL DEFAULT '1',
	PRIMARY KEY (`std_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

CREATE TABLE `tbl_subject` (
	`sub_id` INT(10) NULL AUTO_INCREMENT,
	`std_id` INT(10) NULL,
	`br_id` INT(10) NULL,
	`subject` VARCHAR(250) NULL,
	`sub_date` DATETIME NULL,
	`sub_update_date` DATETIME NULL,
	`sub_del_status` INT(1) NULL DEFAULT '1',
	PRIMARY KEY (`sub_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

ALTER TABLE `tbl_institute`
ADD COLUMN `inst_del_status` INT(1) NULL DEFAULT '1' AFTER `inst_status`;

#table for feedback
CREATE TABLE `tbl_feedback` (
	`fd_id` INT NOT NULL AUTO_INCREMENT,
	`fd_name` VARCHAR(250) NULL DEFAULT NULL,
	`fd_email` VARCHAR(250) NULL DEFAULT NULL,
	`fd_subject` VARCHAR(250) NULL DEFAULT NULL,
	`fd_phone` VARCHAR(20) NULL DEFAULT NULL,
	`fd_message` TEXT NULL DEFAULT NULL,
	`fd_date` DATETIME NULL DEFAULT NULL,
	`fd_status` INT(1) NULL DEFAULT NULL,
	PRIMARY KEY (`fd_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

#table for post
CREATE TABLE `tbl_post` (
	`post_id` INT(11) NOT NULL AUTO_INCREMENT,
	`post_title` VARCHAR(250) NULL DEFAULT NULL,
	`inst_id` INT(11) NULL DEFAULT NULL,
	`post_content` TEXT NOT NULL,
	`post_type` VARCHAR(50) NULL DEFAULT NULL,
	`post_start_date` DATETIME NULL DEFAULT NULL,
	`post_end_date` DATETIME NULL DEFAULT NULL,
	`post_status` INT(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (`post_id`)
)
ENGINE=InnoDB;

#table for holiday
CREATE TABLE `tbl_holiday` (
	`hl_id` INT(11) NOT NULL AUTO_INCREMENT,
	`hl_date` DATETIME NULL DEFAULT NULL,
	`inst_id` INT(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (`hl_id`)
)
ENGINE=InnoDB;






