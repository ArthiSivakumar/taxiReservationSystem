/* taxi details */

CREATE TABLE taxi (
	`taxi_no`	VARCHAR(15),
	`taxi_capacity`	SMALLINT(5)	NOT NULL,
	`taxi_ac`	CHAR(1)		NOT NULL,
	CONSTRAINT taxi_no_primarykey	PRIMARY KEY(`taxi_no`)
);

/* to validate data */

DROP TRIGGER IF EXISTS taxi_check_validity;
delimiter $$
CREATE TRIGGER taxi_check_validity BEFORE INSERT ON `taxi`
	FOR EACH ROW
	BEGIN
		DECLARE msg varchar(255);
		IF (NEW.taxi_no NOT REGEXP '^[A-Z]{2} [0-9]{2} [A-Z]+ [0-9]{4}$')
		THEN
			SET msg = concat('Constraint violated : not a number plate ', cast(New.taxi_no as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		IF (NEW.taxi_capacity < 1 or NEW.taxi_capacity > 15)
		THEN
			SET msg = concat('Constraint violated : not a number ', cast(New.taxi_capacity as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		IF (NEW.taxi_ac NOT in('y','n'))
		THEN
			SET msg = concat('Constraint violated : not a valid choice ', cast(New.taxi_ac as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
	END$$
delimiter ;;