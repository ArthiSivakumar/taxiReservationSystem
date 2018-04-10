create table `dbms`.`transaction_error_log` (
	`log_id`			INT AUTO_INCREMENT,
	`date_of_booking`	TIMESTAMP,
	`date_of_journey`	TIMESTAMP,
	`end_of_journey`	TIMESTAMP,
	`email_id`			VARCHAR(30),
	`reason`			VARCHAR(30),
	CONSTRAINT trans_log_pm_key PRIMARY KEY(`log_id`)
);

DROP TRIGGER IF EXISTS abort_op;
delimiter $$
CREATE TRIGGER abort_op AFTER INSERT ON `transaction_error_log`
FOR EACH ROW
BEGIN
	DECLARE msg VARCHAR(255);
	IF (New.reason='Not enough taxi and driver')
		THEN
			SET msg = 'in after insert Not enough taxi and driver';
			SIGNAL sqlstate '45000' SET message_text = msg;
	END IF;
	IF (New.reason='Not enough driver')
	THEN
		SET msg = 'in after insert Not enough driver';
		SIGNAL sqlstate '45000' SET message_text = msg;
	END IF;
	IF (New.reason='Not enough taxi')
		THEN
			SET msg = 'in after insert Not enough taxi';
			SIGNAL sqlstate '45000' SET message_text = msg;
	END IF;
END$$
DELIMITER ;;
		