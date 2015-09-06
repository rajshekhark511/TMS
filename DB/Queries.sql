**	30 Aug 2014	**

ALTER TABLE `tbl_user` ADD COLUMN `institute_id` INT(11) NOT NULL DEFAULT '0' AFTER `userid`;

ALTER TABLE `tbl_user` ADD COLUMN `user_mname` VARCHAR(250) NOT NULL AFTER `user_fname`;



** 14 Sept 2014 **

ALTER TABLE `tbl_user` ADD COLUMN `user_photo` VARCHAR(250) NOT NULL AFTER `user_type`;

ALTER TABLE `tbl_user` ADD COLUMN `user_gender` VARCHAR(10) NOT NULL AFTER `user_lname`;

CREATE TABLE `tbl_teacher` (
	`teacherid` INT(10) NOT NULL AUTO_INCREMENT,
	`userid` INT(10) NOT NULL,
	`th_dob` DATE NOT NULL,
	`th_blood_group` VARCHAR(10) NOT NULL,
	`th_address` TEXT NOT NULL,
	`th_marital_status` VARCHAR(50) NOT NULL,
	`th_state` INT(10) NOT NULL,
	`th_district` INT(10) NOT NULL,
	`th_city` VARCHAR(100) NOT NULL,
	`th_pincode` VARCHAR(100) NOT NULL,
	`th_language_known` TEXT NOT NULL,
	`created_date` DATETIME NOT NULL,
	`modified_date` DATETIME NOT NULL,
	PRIMARY KEY (`teacherid`)
)

ALTER TABLE `tbl_user`
	ADD COLUMN `modified_time` DATETIME NOT NULL AFTER `created_time`;
	
**	24 Oct 2014 **

CREATE TABLE `tbl_batches` (
	`batch_id` INT(10) NOT NULL AUTO_INCREMENT,
	`std_id` INT(10) NOT NULL,
	`batch_name` VARCHAR(250) NOT NULL,
	`batch_create_date` DATETIME NOT NULL,
	`batch_update_date` DATETIME NOT NULL,
	`batch_status` INT(11) NOT NULL,
	`batch_del_status` INT(11) NULL DEFAULT '1',
	`batch_start` TIME NULL DEFAULT '00:00:01',
	`batch_end` TIME NULL DEFAULT '00:00:01',
	PRIMARY KEY (`batch_id`)
);

CREATE TABLE `tbl_student` (
	`studentid` INT(11) NOT NULL AUTO_INCREMENT,
	`userid` INT(11) NOT NULL,
	`st_dob` DATE NOT NULL,
	`st_birthplace` VARCHAR(100) NOT NULL,
	`st_admissionno` VARCHAR(100) NOT NULL,
	`st_branch` INT(10) NOT NULL,
	`st_class` INT(10) NOT NULL,
	`st_batch` INT(10) NOT NULL,
	`st_division` VARCHAR(50) NOT NULL,
	`st_rollnumber` INT(10) NOT NULL,
	`st_religion` VARCHAR(100) NOT NULL,
	`st_mothertongue` VARCHAR(100) NOT NULL,
	`st_blood_group` VARCHAR(50) NOT NULL,
	`st_height` INT(10) NOT NULL,
	`st_weight` INT(10) NOT NULL,
	`st_address` TEXT NOT NULL,
	`st_city` VARCHAR(100) NOT NULL,
	`st_pincode` VARCHAR(50) NOT NULL,
	`st_state` INT(10) NOT NULL,
	`st_country` VARCHAR(100) NOT NULL,
	`st_language_known` TEXT NOT NULL,
	`st_emergency_contact` VARCHAR(100) NOT NULL,
	`created_by` INT(10) NOT NULL,
	`created_time` DATETIME NOT NULL,
	`modified_time` DATETIME NOT NULL,
	PRIMARY KEY (`studentid`)
);


CREATE TABLE `tbl_parent` (
	`parentid` INT(11) NOT NULL AUTO_INCREMENT,
	`userid` INT(10) NOT NULL,
	`studentid` INT(10) NOT NULL,
	`father_name` VARCHAR(100) NOT NULL,
	`father_email` VARCHAR(100) NOT NULL,
	`father_mobile` VARCHAR(50) NOT NULL,
	`father_occupation` VARCHAR(100) NOT NULL,
	`father_education` VARCHAR(100) NOT NULL,
	`mother_name` VARCHAR(100) NOT NULL,
	`mother_email` VARCHAR(100) NOT NULL,
	`mother_mobile` VARCHAR(50) NOT NULL,
	`mother_occupation` VARCHAR(100) NOT NULL,
	`mother_education` VARCHAR(100) NOT NULL,
	`created_by` INT(10) NOT NULL,
	`created_time` DATETIME NOT NULL,
	`modified_time` DATETIME NOT NULL,
	PRIMARY KEY (`parentid`)
);


ALTER TABLE `tbl_student` ADD COLUMN `st_district` INT(10) NOT NULL AFTER `st_state`;

ALTER TABLE `tbl_student` CHANGE COLUMN `userid` `user_id` INT(11) NOT NULL AFTER `studentid`;


	
	

	