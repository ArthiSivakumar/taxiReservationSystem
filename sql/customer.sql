CREATE TABLE customer (
	`email_id`	VARCHAR(30),
	`password`	VARCHAR(20) NOT NULL,
	`cus_name`	VARCHAR(30) NOT NULL,
	CONSTRAINT email_id_primarykey	PRIMARY KEY(`email_id`)
);

CREATE TABLE customer_mobile_no (
	`email_id`	VARCHAR(30),
	`mobile_no`	VARCHAR(15),
	CONSTRAINT email_phone_primarykey PRIMARY KEY(`mobile_no`,`email_id`),
	CONSTRAINT email_id_foreignkey FOREIGN KEY(`email_id`) REFERENCES `customer`(`email_id`)
);
DROP TRIGGER IF EXISTS cus_check_validity;
delimiter $$
CREATE TRIGGER cus_check_validity BEFORE INSERT ON `customer`
	FOR EACH ROW
	BEGIN
		DECLARE msg varchar(255);
		IF (NEW.email_id NOT REGEXP '^[A-Z0-9._]+@[A-Z0-9.]+\.[A-Z]{2,4}$')
		THEN
			SET msg = concat('Not a valid email-id ', cast(New.email_id as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
	END$$
delimiter ;;


DROP TRIGGER IF EXISTS cusmob_check_validity;
delimiter $$
CREATE TRIGGER cusmob_check_validity BEFORE INSERT ON `customer_mobile_no`
	FOR EACH ROW
	BEGIN
		DECLARE msg varchar(255);
		IF (NEW.mobile_no NOT REGEXP '^[987][0-9]{9}$')
		THEN
			SET msg = concat('Not a valid number ', cast(New.mobile_no as char));
			SIGNAL sqlstate '45000' SET message_text = msg;
		END IF;
	END$$
delimiter ;;
