DROP PROCEDURE IF EXISTS CusHourly;
DELIMITER $$
CREATE PROCEDURE CusHourly(emailid VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4), bookcan CHAR(1))
BEGIN
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	IF emailid='a' THEN 
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey asc, distance asc;
		END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
		order by date_of_journey desc, distance desc;
	END IF;
	ELSE 
	IF orderbydoj='asc' and orderbydist='asc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
		order by date_of_journey desc, distance desc;
	END IF;
	END IF;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS CusDaily;
DELIMITER $$
CREATE PROCEDURE CusDaily(emailid VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4), bookcan CHAR(1))
BEGIN
		DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	IF orderbydoj='asc' and orderbydist='asc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) and email_id=emailid
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) and email_id=emailid
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1)and email_id=emailid  and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) and email_id=emailid
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1)and email_id=emailid  and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) and email_id=emailid
		order by date_of_journey asc, distance asc;
	END IF;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS CusWeekly;
DELIMITER $$
CREATE PROCEDURE CusWeekly(emailid VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4), bookcan CHAR(1))
BEGIN
		DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	IF orderbydoj='asc' and orderbydist='asc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
		order by date_of_journey desc, distance desc;
	END IF;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS CusMonthly;
DELIMITER $$
CREATE PROCEDURE CusMonthly(emailid VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4), bookcan CHAR(1))
BEGIN
		DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	IF orderbydoj='asc' and orderbydist='asc' THEN
		select * from booking_details where email_id=emailid and travel_status in (bookcan,bookcan1) and and email_id=emailid  EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where email_id=emailid and travel_status in (bookcan,bookcan1) and and email_id=emailid  EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where email_id=emailid and travel_status in (bookcan,bookcan1) and and email_id=emailid  EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where email_id=emailid and travel_status in (bookcan,bookcan1) and and email_id=emailid  EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
		order by date_of_journey desc, distance desc;
	END IF;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS CusYearly;
DELIMITER $$
CREATE PROCEDURE CusYearly(emailid VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4), bookcan CHAR(1))
BEGIN
		DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	IF orderbydoj='asc' and orderbydist='asc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
		order by date_of_journey desc, distance desc;
	END IF;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS CusRange;
DELIMITER $$
CREATE PROCEDURE CusRange(emailid VARCHAR(15), starttime TIMESTAMP, endtime TIMESTAMP, orderbydoj VARCHAR(4), orderbydist VARCHAR(4), bookcan CHAR(1))
BEGIN
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	IF orderbydoj='asc' and orderbydist='asc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and date_of_booking>=starttime and date_of_booking<=endtime
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and date_of_booking>=starttime and date_of_booking<=endtime
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and date_of_booking>=starttime and date_of_booking<=endtime
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where travel_status in (bookcan,bookcan1) and email_id=emailid and date_of_booking>=starttime and date_of_booking<=endtime
		order by date_of_journey desc, distance desc;
	END IF;
END$$
DELIMITER ;;



DROP FUNCTION IF EXISTS MaxCusHourly;
DELIMITER $$
CREATE FUNCTION MaxCusHourly( bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE cnt INT;
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1)  and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by email_id order by count(*) desc limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;


DROP FUNCTION IF EXISTS MaxCusDaily;
DELIMITER $$
CREATE FUNCTION MaxCusDaily( bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE cnt INT;
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1)  and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by email_id order by count(*) desc limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxCusWeekly;
DELIMITER $$
CREATE FUNCTION MaxCusWeekly( bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE cnt INT;
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1) and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE()) group by email_id order by count(*) desc limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxCusMonthly;
DELIMITER $$
CREATE FUNCTION MaxCusMonthly( bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE cnt INT;
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1)  and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE()) group by email_id order by count(*) desc limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxCusYearly;
DELIMITER $$
CREATE FUNCTION MaxCusYearly( bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE cnt INT;
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1) and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE()) group by email_id order by count(*) desc limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxCusRange;
DELIMITER $$
CREATE FUNCTION MaxCusRange(starttime TIMESTAMP, endtime TIMESTAMP,  bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE cnt INT;
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
	select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1)  and date_of_booking>=starttime and date_of_booking<=endtime group by email_id order by count(*) desc limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;


DROP FUNCTION IF EXISTS MinCusHourly;
DELIMITER $$
CREATE FUNCTION MinCusHourly( bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
		select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1) and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by email_id order by count(*) limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;


DROP FUNCTION IF EXISTS MinCusDaily;
DELIMITER $$
CREATE FUNCTION MinCusDaily( bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
		select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by email_id order by count(*) limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinCusWeekly;
DELIMITER $$
CREATE FUNCTION MinCusWeekly( bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
		select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1) and Cus_ac=ac and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE()) group by email_id order by count(*) limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinCusMonthly;
DELIMITER $$
CREATE FUNCTION MinCusMonthly( bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
		select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1) and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE()) group by email_id order by count(*) limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinCusYearly;
DELIMITER $$
CREATE FUNCTION MinCusYearly( bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
		select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1) and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE()) group by email_id order by count(*) limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinCusRange;
DELIMITER $$
CREATE FUNCTION MinCusRange(starttime TIMESTAMP, endtime TIMESTAMP, bookcan CHAR(1))
RETURNS VARCHAR(15)
BEGIN
	DECLARE emailid VARCHAR(15);
	DECLARE bookcan1 CHAR(1);
	IF bookcan='b' THEN SET bookcan1='b'; END IF;
	IF bookcan='c' THEN SET bookcan1='c'; END IF;
	IF bookcan='a' THEN SET bookcan='b'; SET bookcan1='c'; END IF;
		select email_id into emailid from booking_details where travel_status in (bookcan,bookcan1)  and date_of_booking>=starttime and date_of_booking<=endtime group by email_id order by count(*) limit 0,1;
	RETURN emailid;
END$$
DELIMITER ;;


DROP FUNCTION IF EXISTS MaxCusDist;
DELIMITER $$
CREATE PROCEDURE MaxCusDist(starttime TIMESTAMP, endtime TIMESTAMP, OUT emailid VARCHAR(15), OUT dist INT)
BEGIN
	select email_id,sum(distance) into emailid,dist from booking_details where travel_status='b' and end_of_journey<=CURRENT_TIMESTAMP() group by email_id order by distance desc limit 0,1;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinCusDist;
DELIMITER $$
CREATE PROCEDURE MinDist(starttime TIMESTAMP, endtime TIMESTAMP, OUT emailid VARCHAR(15), OUT dist INT)
BEGIN
	select email_id,sum(distance) into emailid,dist from booking_details where travel_status='b' and end_of_journey<=CURRENT_TIMESTAMP() group by email_id order by distance limit 0,1;
END$$
DELIMITER ;;