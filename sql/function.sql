
DROP FUNCTION IF EXISTS MaxDriverDaily;
DELIMITER $$
CREATE FUNCTION MaxDriverDaily()
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	DECLARE cnt INT;
	select cug_no into cugno from booking_details where travel_status='b' and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by cug_no order by count(*) desc limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;