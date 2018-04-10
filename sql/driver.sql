/* Driver details */
CREATE TABLE IF NOT EXISTS driver(	
	`driver_name` 		VARCHAR(20) 		NOT NULL,
	`driver_address`	VARCHAR(70)		NOT NULL,
	`cug_no`		VARCHAR(15),
	`driver_mobile_no`	VARCHAR(15),		
	`driver_salary`		INT(5),
	`date_of_joining`	DATE			NOT NULL,
	CONSTRAINT DRIVER_PK	PRIMARY KEY(`cug_no`)
);


DROP TRIGGER IF EXISTS driver_check_validity;
delimiter $$
CREATE TRIGGER driver_check_validity BEFORE INSERT ON `driver`
	FOR EACH ROW
	BEGIN
		DECLARE msg varchar(255);
		IF (NEW.cug_no NOT REGEXP '^[987][0-9]{9}$')
		THEN
			SET msg = concat('Constraint violated : not a valid number ', cast(New.cug_no as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		IF (NEW.driver_mobile_no NOT REGEXP '^[987][0-9]{9}$')
		THEN
			SET msg = concat('Constraint violated : not a valid number ', cast(New.driver_mobile_no as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		IF (NEW.driver_salary < 1000)
		THEN
			SET msg = concat('Constraint violated : Salary cannot be < 1000 ');
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		IF(New.date_of_joining > CURDATE()) then
			SET msg = concat('Constraint violated : not a valid date ');
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		IF(NEW.cug_no != NEW.driver_mobile_no) then
			SET msg = concat('Constraint violated : Cug no and mobile no cannot be same');
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
	END$$
delimiter ;;