CREATE TABLE feedback(
	`travel_id` 			INT,
	`driver_punctual` 		INT,
	`taxi_comfortable` 		INT,
	`journey_comfortable` INT,
	`customer_care` INT,
	`user_freindly` INT,
	`nominal_rate` INT,
	`taxi_clean`	INT,
	`use_again` CHAR(1),
	`comments` VARCHAR(200),
	CONSTRAINT FEEDBACK_PK PRIMARY KEY(`travel_id`)
);

DROP PROCEDURE IF EXISTS FailedUpdation;
DELIMITER $$
CREATE PROCEDURE FailedUpdation(orderby dou VARCHAR(15))
BEGIN
	IF orderby='asc'
	select * from update_FailedTrans_error_log order by date_of_updation;
	ELSE
	select * from update_FailedTrans_error_log order by date_of_updation desc;
	END IF;
END$$
DELIMITER 
