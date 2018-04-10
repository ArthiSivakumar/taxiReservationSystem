DROP PROCEDURE IF EXISTS DriverHourly;
DELIMITER $$
CREATE PROCEDURE DriverHourly(cugno VARCHAR(15), odojoin VARCHAR(4),odojourn VARCHAR(4), osal VARCHAR(4), odist VARCHAR(4))
BEGIN
	select b.* from booking_details b, driver d where travel_status='b' and b.cug_no=cugno and EXTRACT(HOUR FROM b.date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM b.date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
	order by b.date_of_journey odojourn, d.date_of_joining odojoin, d.driver_salary osal, b.distance odist;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS DriverDaily;
DELIMITER $$
CREATE PROCEDURE DriverDaily(cugno VARCHAR(15), odojoin VARCHAR(4),odojourn VARCHAR(4), osal VARCHAR(4), odist VARCHAR(4))
BEGIN
	select b.* from booking_details b, driver d where travel_status='b' and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) and cug_no=cugno
	order by b.date_of_journey odojourn, d.date_of_joining odojoin, d.driver_salary osal, b.distance odist;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS DriverWeekly;
DELIMITER $$
CREATE PROCEDURE DriverWeekly(cugno VARCHAR(15), odojoin VARCHAR(4),odojourn VARCHAR(4), osal VARCHAR(4), odist VARCHAR(4))
BEGIN
	select b.* from booking_details b, driver d where travel_status='b' and cug_no=cugno and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
	order by b.date_of_journey odojourn, d.date_of_joining odojoin, d.driver_salary osal, b.distance odist;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS DriverMonthly;
DELIMITER $$
CREATE PROCEDURE DriverMonthly(cugno VARCHAR(15), odojoin VARCHAR(4),odojourn VARCHAR(4), osal VARCHAR(4), odist VARCHAR(4))
BEGIN
	select b.* from booking_details b, driver d where cug_no=cugno and travel_status='b' and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
	order by b.date_of_journey odojourn, d.date_of_joining odojoin, d.driver_salary osal, b.distance odist;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS DriverYearly;
DELIMITER $$
CREATE PROCEDURE DriverYearly(cugno VARCHAR(15), odojoin VARCHAR(4),odojourn VARCHAR(4), osal VARCHAR(4), odist VARCHAR(4))
BEGIN
	select b.* from booking_details b, driver d where travel_status='b' and cug_no=cugno and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
	order by b.date_of_journey odojourn, d.date_of_joining odojoin, d.driver_salary osal, b.distance odist;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS DriverRange;
DELIMITER $$
CREATE PROCEDURE DriverRange( starttime TIMESTAMP, endtime TIMESTAMP,cugno VARCHAR(15), odojoin VARCHAR(4),odojourn VARCHAR(4), osal VARCHAR(4), odist VARCHAR(4))
BEGIN
	select b.* from booking_details b, driver d where travel_status='b' and cug_no=cugno and date_of_booking>=starttime and date_of_booking<=endtime
	order by b.date_of_journey odojourn, d.date_of_joining odojoin, d.driver_salary osal, b.distance odist;
END$$
DELIMITER ;;



DROP FUNCTION IF EXISTS MaxDriverHourly;
DELIMITER $$
CREATE FUNCTION MaxDriverHourly()
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	select cug_no into cugno from booking_details where travel_status='b' and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by cug_no order by count(*) desc limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;


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

DROP FUNCTION IF EXISTS MaxDriverWeekly;
DELIMITER $$
CREATE FUNCTION MaxDriverWeekly()
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	select cug_no into cugno from booking_details where travel_status='b' and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE()) group by cug_no order by count(*) desc limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxDriverMonthly;
DELIMITER $$
CREATE FUNCTION MaxDriverMonthly()
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	select cug_no into cugno from booking_details where travel_status='b' and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE()) group by cug_no order by count(*) desc limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxDriverYearly;
DELIMITER $$
CREATE FUNCTION MaxDriverYearly()
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	DECLARE cnt INT;
	select cug_no into cugno from booking_details where travel_status='b' and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE()) group by cug_no order by count(*) desc limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxDriverRange;
DELIMITER $$
CREATE FUNCTION MaxDriverRange(starttime TIMESTAMP, endtime TIMESTAMP)
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	DECLARE cnt INT;
	select cug_no into cugno from booking_details where travel_status='b' and date_of_booking>=starttime and date_of_booking<=endtime group by cug_no order by count(*) desc limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;


DROP FUNCTION IF EXISTS MinDriverHourly;
DELIMITER $$
CREATE FUNCTION MinDriverHourly()
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	select cug_no into cugno from booking_details where travel_status='b' and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by cug_no order by count(*) limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;


DROP FUNCTION IF EXISTS MinDriverDaily;
DELIMITER $$
CREATE FUNCTION MinDriverDaily()
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	select cug_no into cugno from booking_details where travel_status='b' and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by cug_no order by count(*) limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinDriverWeekly;
DELIMITER $$
CREATE FUNCTION MinDriverWeekly()
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	select cug_no into cugno from booking_details where travel_status='b' and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE()) group by cug_no order by count(*) limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinDriverMonthly;
DELIMITER $$
CREATE FUNCTION MinDriverMonthly(ac CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	select cug_no into cugno from booking_details where travel_status='b' and Driver_ac=ac and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE()) group by cug_no order by count(*) limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinDriverYearly;
DELIMITER $$
CREATE FUNCTION MinDriverYearly()
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	select cug_no into cugno from booking_details where travel_status='b' and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE()) group by cug_no order by count(*) limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinDriverRange;
DELIMITER $$
CREATE FUNCTION MinDriverRange(starttime TIMESTAMP, endtime TIMESTAMP)
RETURNS VARCHAR(15)
BEGIN
	DECLARE cugno VARCHAR(15);
	select cug_no into cugno from booking_details where travel_status='b' and date_of_booking>=starttime and date_of_booking<=endtime group by cug_no order by count(*) limit 0,1;
	RETURN cugno;
END$$
DELIMITER ;;


DROP FUNCTION IF EXISTS MaxDriverDist;
DELIMITER $$
CREATE PROCEDURE MaxDriverDist(starttime TIMESTAMP, endtime TIMESTAMP, OUT cugno VARCHAR(15), OUT dist INT)
BEGIN
	select cug_no,sum(distance) into cugno,dist from booking_details where travel_status='b' and end_of_journey<=CURRENT_TIMESTAMP() group by cug_no order by distance desc limit 0,1;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinDriverDist;
DELIMITER $$
CREATE PROCEDURE MinDriverDist(starttime TIMESTAMP, endtime TIMESTAMP, , OUT cugno VARCHAR(15), OUT dist INT)
BEGIN
	select cug_no,sum(distance) into cugno,dist from booking_details where travel_status='b' and end_of_journey<=CURRENT_TIMESTAMP() group by cug_no order by distance limit 0,1;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS OldestDriver;
DELIMITER $$
CREATE PROCEDURE()
BEGIN
	select * from driver order by date_of_joining limit 0,1;
END$$
DELIMITER ;;