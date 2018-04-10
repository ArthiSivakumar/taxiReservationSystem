<?php




?>

/* Driver details */
CREATE TABLE IF NOT EXISTS driver(	
	`DriverName` 		VARCHAR(20) 		NOT NULL,
	`Address`		VARCHAR(70)		NOT NULL,
	`Cug`			BIGINT(10),		
	`MobileNo`		BIGINT(10),
	`Salary`		BIGINT(10),
	`DateOfJoining`		DATE			NOT NULL,
	CONSTRAINT DRIVER_PK	PRIMARY KEY(`Cug`)
);


/* To validate mobile number */

DROP TRIGGER IF EXISTS driver_check_validity;
delimiter $$
CREATE TRIGGER driver_check_validity BEFORE INSERT ON `driver`
	FOR EACH ROW
	BEGIN
		DECLARE msg varchar(255);
		IF (NEW.Cug <7000000000 OR NEW.Cug > 10000000000)
		THEN
			SET msg = concat('Constraint violated : not a valid number ', cast(New.Cug as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		IF (NEW.MobileNo <7000000000 OR NEW.MobileNo > 10000000000)
		THEN
			SET msg = concat('Constraint violated : not a valid number ', cast(new.MobileNo as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		IF (NEW.Salary < 1000)
		THEN
			SET msg = concat('Constraint violated : Salary cannot be < 1000 ');
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		if(New.DateofJoining > CURDATE()) then
			SET msg = concat('Constraint violated : not a valid date ');
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
	END$$
delimiter ;;


// sample
insert into `driver` values (LOWER('ABC'),'feuhefffeffe',9853933885,9876543210,500,STR_TO_DATE('24-feb-2014','%d-%M-%Y'));



