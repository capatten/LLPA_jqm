/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.19-MariaDB : Database - llpa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`llpa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `llpa`;

/*Table structure for table `emp` */

DROP TABLE IF EXISTS `emp`;

CREATE TABLE `emp` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(255) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `hire_dt` date DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COMMENT='Employee Details';

/*Table structure for table `emp_department` */

DROP TABLE IF EXISTS `emp_department`;

CREATE TABLE `emp_department` (
  `emp_department_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `start_dt` date DEFAULT NULL,
  `end_dt` date DEFAULT '9999-12-31',
  PRIMARY KEY (`emp_department_id`),
  KEY `emp_dtls_id` (`emp_id`),
  KEY `dprtmnt_id` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Table structure for table `emp_status` */

DROP TABLE IF EXISTS `emp_status`;

CREATE TABLE `emp_status` (
  `emp_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `start_dt` date DEFAULT NULL,
  `end_dt` date DEFAULT '9999-12-31',
  PRIMARY KEY (`emp_status_id`),
  KEY `status_id` (`status_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Status of Employee';

/*Table structure for table `emp_title` */

DROP TABLE IF EXISTS `emp_title`;

CREATE TABLE `emp_title` (
  `emp_title_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `title_id` int(11) DEFAULT NULL,
  `start_dt` date DEFAULT NULL,
  `end_dt` date DEFAULT '9999-12-31',
  PRIMARY KEY (`emp_title_id`),
  KEY `title_id` (`title_id`),
  KEY `emp_dtls_id` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Position Title for Employee';

/*Table structure for table `menu_options` */

DROP TABLE IF EXISTS `menu_options`;

CREATE TABLE `menu_options` (
  `menu_option_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_template_id` varchar(11) NOT NULL COMMENT 'PK: menu_template_ref',
  `menu_option_desc` varchar(100) NOT NULL,
  `menu_option_path` varchar(255) NOT NULL,
  PRIMARY KEY (`menu_option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `menu_templates_ref` */

DROP TABLE IF EXISTS `menu_templates_ref`;

CREATE TABLE `menu_templates_ref` (
  `menu_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_template_desc` varchar(100) NOT NULL COMMENT 'FK: menu_options',
  PRIMARY KEY (`menu_template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `ref_emp_department` */

DROP TABLE IF EXISTS `ref_emp_department`;

CREATE TABLE `ref_emp_department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_desc` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `ref_status` */

DROP TABLE IF EXISTS `ref_status`;

CREATE TABLE `ref_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_desc` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Employee Status Reference';

/*Table structure for table `ref_title` */

DROP TABLE IF EXISTS `ref_title`;

CREATE TABLE `ref_title` (
  `title_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_desc` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/* Procedure structure for procedure `create_new_emp` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_new_emp` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `create_new_emp`(
	IN `FirstName` VARCHAR(100),
	IN `LastName` VARCHAR(100),
	IN `Email` VARCHAR(255),
	IN `Department` INT,
	IN `Status` INT,
	IN `Title` INT






)
    COMMENT 'Create a New Employee'
BEGIN
	DECLARE tmp_emp_id INTEGER DEFAULT "";
	
	#insert new record into emp table
	INSERT INTO llpa.emp (
		first_name
		,last_name
		,email_address
	) VALUES (
		FirstName
		,LastName
		,Email
	);
	
	#get emp_id as emp_id is auto generated
	SET tmp_emp_id = (
		SELECT
			emp_id
		FROM
			llpa.emp AS e
		WHERE
			1 = 1
			AND e.email_address = Email
			AND e.first_name = FirstName
			AND e.last_name = LastName
	);
	
	#insert new record into department table
	INSERT INTO llpa.emp_department (
		emp_id
		,department_id
	) VALUES (
		tmp_emp_id
		,Department
	);
	
	#insert new record into status table
	INSERT INTO llpa.emp_status (
		emp_id
		,status_id
	) VALUES (
		tmp_emp_id
		,Status
	);
	
	#insert new record into status table
	INSERT INTO llpa.emp_title (
		emp_id
		,title_id
	) VALUES (
		tmp_emp_id
		,Title
	);
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `get_emp_details` */

/*!50003 DROP PROCEDURE IF EXISTS  `get_emp_details` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `get_emp_details`(
	IN `in_email_address` VARCHAR(255)
)
    COMMENT 'Get Employee Details'
BEGIN
	SELECT
		e.emp_id AS employee_id
		,e.first_name AS first_name
		,e.last_name AS last_name
		,e.hire_dt AS hire_date
		,d.department_desc AS current_department
		,t.title_desc AS current_title
		,s.status_desc AS current_status
	FROM (
		SELECT
			e.emp_id
			,e.email_address
			,e.first_name
			,e.last_name
			,e.hire_dt
		FROM
			LLPA.emp As e
		WHERE
			1 = 1
			AND e.email_address = in_email_address
	) AS e
	
	LEFT JOIN (
		SELECT
			d.emp_id
			,r_d.department_desc
			,d.start_dt
			,d.end_dt
		FROM
			llpa.emp_department AS d
		
		LEFT JOIN llpa.ref_emp_department AS r_d
		ON r_d.department_id = d.department_id
		
		WHERE
			1 = 1
			AND current_date() BETWEEN d.start_dt AND d.end_dt
	) AS d
	ON d.emp_id = e.emp_id
	
	LEFT JOIN (
		SELECT
			t.emp_id
			,r_t.title_desc
		FROM
			llpa.emp_title AS t
		
		LEFT JOIN llpa.ref_title as r_t
		ON r_t.title_id = t.title_id
		
		WHERE
			1 = 1
			AND current_date() BETWEEN t.start_dt AND t.end_dt
	) as t
	ON t.emp_id = e.emp_id
	
	LEFT JOIN (
		SELECT
			s.emp_id
			,r_s.status_desc
		FROM
			llpa.emp_status AS s
			
		LEFT JOIN llpa.ref_status AS r_s
		ON s.status_id = r_s.status_id
	) AS s
	ON s.emp_id = e.emp_id
	;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
