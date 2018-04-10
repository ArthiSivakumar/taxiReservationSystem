CREATE TABLE booking_details (
	`travel_id`			INT NULL AUTO_INCREMENT,
	`date_of_booking` 	TIMESTAMP,
	`date_of_journey`  	TIMESTAMP,
	`end_of_journey`	TIMESTAMP,
	`travel_status`		CHAR(1) DEFAULT 'b',
	`source`			VARCHAR(20),
	`destination`		VARCHAR(20),
	`distance`			INT,
	`email_id`			VARCHAR(30),
	`cug_no`			VARCHAR(15),
	`taxi_no`			VARCHAR(15),
	CONSTRAINT travel_id_primarykey PRIMARY KEY(`travel_id`),
	CONSTRAINT email_id_fkey FOREIGN KEY(`email_id`) REFERENCES `customer`(`email_id`),
	CONSTRAINT cug_no_fkey FOREIGN KEY(`cug_no`) REFERENCES `driver`(`cug_no`),
	CONSTRAINT taxi_no_fkey FOREIGN KEY(`taxi_no`) REFERENCES `taxi`(`taxi_no`)
);

DROP TRIGGER IF EXISTS booking_check_validity;
delimiter $$
CREATE TRIGGER booking_check_validity BEFORE INSERT ON `booking_details`
	FOR EACH ROW
	BEGIN
		DECLARE msg varchar(255);
		IF (NEW.date_of_booking > New.date_of_journey)
		THEN
			SET msg = concat('Constraint violated : invalid date of journey ', cast(New.date_of_journey as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		IF (NEW.travel_status NOT in('b','c'))
		THEN
			SET msg = concat('Constraint violated : not a valid choice ', cast(New.travel_status as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		IF (NEW.date_of_journey < CURRENT_TIMESTAMP())
		THEN
			SET msg = concat('not a valid date of journey ', cast(New.travel_status as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
	END$$
delimiter ;;

delimiter $$
CREATE TRIGGER booking_check_validity BEFORE INSERT ON `booking_details`
FOR EACH ROW
BEGIN
		DECLARE msg varchar(255);
		IF (New.cug_no='busy' and New.taxi_no='busy')
		THEN
			insert into transaction_error_log values(null,New.date_of_booking,New.date_of_journey,New.end_of_journey,New.email_id,'Not enough taxi and driver');
		ELSE IF (New.cug_no='busy')
		THEN
			insert into transaction_error_log values(null,New.date_of_booking,New.date_of_journey,New.end_of_journey,New.email_id,'Not enough driver');
		ELSE
			insert into transaction_error_log values(null,New.date_of_booking,New.date_of_journey,New.end_of_journey,New.email_id,'Not enough taxi');
		END IF;
		IF (NEW.date_of_booking > New.date_of_journey)
		THEN
			SET msg = concat('Constraint violated : invalid date of journey ', cast(New.date_of_journey as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
		IF (NEW.travel_status NOT in('b','c'))
		THEN
			SET msg = concat('Constraint violated : not a valid choice ', cast(New.travel_status as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
END$$
delimiter ;;