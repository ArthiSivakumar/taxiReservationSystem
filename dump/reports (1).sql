DROP PROCEDURE IF EXISTS TaxiHistory;
DELIMITER $$
CREATE PROCEDURE TaxiHistory(taxino VARCHAR(15))
BEGIN
	select * from booking_details where taxi_no=taxino
	union
	select * from deleted_details where taxi_no=taxino;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS CustomerHistory;
DELIMITER $$
CREATE PROCEDURE CustomerHistory(emailid VARCHAR(30))
BEGIN
	select * from booking_details where email_id=emailid
	union
	select * from deleted_details where email_id=emailid;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS BukCanHourly;
DELIMITER $$
CREATE PROCEDURE BukCanHourly(StartTime TIMESTAMP, BookOrCan CHAR(1))
BEGIN
	DECLARE endTime TIMESTAMP;
	set endTime = StartTime - str_to_date('00-00-0000 01:00:00','%d-%m-%Y %H:%i:%s');
	select * from booking_details where travel_status=BookOrCan and date_of_booking>=StartTime and date_of_booking<=endTime;
END$$
DELIMITER ;;
call BukCanHistory(str_to_date('05-10-2014 23:00:00','%d-%m-%Y %H:%i:%s'),'b');


DROP PROCEDURE IF EXISTS BukCanDaily;
DELIMITER $$
CREATE PROCEDURE BukCanDaily(StartTime TIMESTAMP, BookOrCan CHAR(1))
BEGIN
	DECLARE endTime TIMESTAMP;
	set endTime = StartTime - str_to_date('01-00-0000 00:00:00','%d-%m-%Y %H:%i:%s');
	select * from booking_details where travel_status=BookOrCan and date_of_booking>=StartTime and date_of_booking<=endTime;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS BukCanWeekly;
DELIMITER $$
CREATE PROCEDURE BukCanWeekly(StartTime TIMESTAMP, BookOrCan CHAR(1))
BEGIN
	DECLARE endTime TIMESTAMP;
	set endTime = StartTime - str_to_date('07-00-0000 00:00:00','%d-%m-%Y %H:%i:%s');
	select * from booking_details where travel_status=BookOrCan and date_of_booking>=StartTime and date_of_booking<=endTime;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS BukCanMonthly;
DELIMITER $$
CREATE PROCEDURE BukCanMonthly(StartTime TIMESTAMP, BookOrCan CHAR(1))
BEGIN
	DECLARE endTime TIMESTAMP;
	set endTime = StartTime - str_to_date('00-01-0000 00:00:00','%d-%m-%Y %H:%i:%s');
	select * from booking_details where travel_status=BookOrCan and date_of_booking>=StartTime and date_of_booking<=endTime;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS BukCanYearly;
DELIMITER $$
CREATE PROCEDURE BukCanYearly(StartTime TIMESTAMP, BookOrCan CHAR(1))
BEGIN
	DECLARE endTime TIMESTAMP;
	set endTime = StartTime - str_to_date('00-00-0001 00:00:00','%d-%m-%Y %H:%i:%s');
	select * from booking_details where travel_status=BookOrCan and date_of_booking>=StartTime and date_of_booking<=endTime;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS InUse;
DELIMITER $$
CREATE PROCEDURE InUse()
BEGIN
DECLARE IN OUT 
	select taxi_no,cug_no	from booking_details where date_of_journey<=CURRENT_TIMESTAMP() and CURRENT_TIMESTAMP()<=end_of_journey;
END$$
DELIMITER ;;