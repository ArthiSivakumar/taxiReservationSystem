create table `dbms`.`update_error_log` (
	`update_id`	INT NULL AUTO_INCREMENT,
	`date_of_updation`	TIMESTAMP,
	`taxi_no`	VARCHAR(15),
	CONSTRAINT update_prim_key PRIMARY KEY(`update_id`),
	CONSTRAINT update_frn_key FOREIGN KEY (`taxi_no`) REFERENCES taxi(`taxi_no`)
);

DROP TRIGGER IF EXISTS taxi_update;
DELIMITER $$
CREATE TRIGGER taxi_update BEFORE UPDATE ON taxi
FOR EACH ROW
BEGIN
	DECLARE taxibooked INT;
	DECLARE msg VARCHAR(255);
	select count(*) into taxibooked from booking_details where taxi_no=Old.taxi_no and end_of_journey>=CURRENT_TIMESTAMP() and travel_status='b';
	IF taxibooked > 0
	THEN
		SET msg = concat('Updation cannot be made now ');
		SIGNAL sqlstate '45000' SET message_text = msg;
	END IF;
END$$
DELIMITER ;;


update taxi
set taxi_ac='y' where taxi_no='tn 38 v 5254';

DROP PROCEDURE IF EXISTS BukCanHourly;
DELIMITER $$
CREATE PROCEDURE BukCanHourly(StartTime TIMESTAMP, BookOrCan CHAR(1))
BEGIN
	DECLARE get_rec CURSOR FOR
	select * from booking_details where travel_status=BookOrCan and date_of_booking>=StartTime and date_of_booking<=(StartTime - str_to_date('00-00-0000 01:00:00','%d-%m-%Y %H:%i:%s'));
END$$
DELIMITER ;;




softechs2k12@googlegroups.com