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

DROP PROCEDURE IF EXISTS DriverHistory;
DELIMITER $$
CREATE PROCEDURE DriverHistory(cugno VARCHAR(30))
BEGIN
	select * from booking_details where cug_no=cugno
	union
	select * from deleted_details where cug_no=cugno;
END$$
DELIMITER ;;