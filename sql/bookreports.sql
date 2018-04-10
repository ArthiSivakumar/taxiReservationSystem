DROP PROCEDURE IF EXISTS CusHourly;
DELIMITER $$
CREATE PROCEDURE CusHourly(Canbook VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4))
BEGIN
	IF Canbook!='a' THEN
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	ELSEIF Canbook='a' THEN
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	END IF;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS CusDaily;
DELIMITER $$
CREATE PROCEDURE CusDaily(Canbook VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4))
BEGIN
	IF Canbook!='a' THEN
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	ELSEIF Canbook='a' THEN
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where  EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	END IF;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS CusWeekly;
DELIMITER $$
CREATE PROCEDURE CusWeekly(Canbook VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4))
BEGIN
	IF Canbook!='a' THEN 
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	ELSEIF Canbook='a' THEN
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	END IF;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS CusMonthly;
DELIMITER $$
CREATE PROCEDURE CusMonthly(Canbook VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4))
BEGIN
	IF Canbook!='a' THEN
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	ELSEIF Canbook='a' THEN
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	END IF;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS CusYearly;
DELIMITER $$
CREATE PROCEDURE CusYearly(Canbook VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4))
BEGIN
	IF Canbook!='a' THEN 
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	ELSEIF Canbook='a' THEN
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	END IF;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS CusRange;
DELIMITER $$
CREATE PROCEDURE CusRange(Canbook VARCHAR(15), starttime TIMESTAMP, endtime TIMESTAMP, orderbydoj VARCHAR(4), orderbydist VARCHAR(4))
BEGIN
	IF Canbook!='a' THEN 
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and date_of_booking>=starttime and date_of_booking<=endtime
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where travel_status=Canbook and date_of_booking>=starttime and date_of_booking<=endtime
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and date_of_booking>=starttime and date_of_booking<=endtime
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where travel_status=Canbook and date_of_booking>=starttime and date_of_booking<=endtime
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	ELSEIF Canbook='a' THEN
		IF orderbydoj='asc' and orderbydist='asc' THEN
			select * from booking_details where  date_of_booking>=starttime and date_of_booking<=endtime
			order by date_of_journey asc, end_of_journey asc;
		END IF;
		IF orderbydoj='desc' and orderbydist='asc' THEN
			select * from booking_details where date_of_booking>=starttime and date_of_booking<=endtime
			order by date_of_journey desc, end_of_journey asc;
		END IF;
		IF orderbydoj='asc' and orderbydist='desc' THEN
			select * from booking_details where date_of_booking>=starttime and date_of_booking<=endtime
			order by date_of_journey asc, end_of_journey desc;
		END IF;
		IF orderbydoj='desc' and orderbydist='desc' THEN
			select * from booking_details where date_of_booking>=starttime and date_of_booking<=endtime
			order by date_of_journey desc, end_of_journey desc;
		END IF;
	END IF;
END$$
DELIMITER ;;



DROP FUNCTION IF EXISTS MaxCusHourly;
DELIMITER $$
CREATE FUNCTION MaxCusHourly(Canbook CHAR(1))
RETURNS VARCHAR(15)  NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	Declare cus varchar(30);
	select email_id into cus from booking_details where travel_status=Canbook and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by travel_status order by count(*) desc limit 0,1;
	RETURN cus;
END $$
DELIMITER ;;


DROP FUNCTION IF EXISTS MaxCusDaily;
DELIMITER $$
CREATE FUNCTION MaxCusDaily(Canbook CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE cus VARCHAR(30);
	select email_id into cus from booking_details where travel_status=Canbook and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by email_id order by count(*) desc limit 0,1;
	RETURN cus;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxCusWeekly;
DELIMITER $$
CREATE FUNCTION MaxCusWeekly(Canbook CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE cus VARCHAR(30);
	select email_id into cus from booking_details where travel_status=Canbook and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE()) group by email_id order by count(*) desc limit 0,1;
	RETURN cus;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxCusMonthly;
DELIMITER $$
CREATE FUNCTION MaxCusMonthly(Canbook CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE cus VARCHAR(30);
	select email_id into cus from booking_details where travel_status=Canbook and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE()) group by email_id order by count(*) desc limit 0,1;
	RETURN cus;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxCusYearly;
DELIMITER $$
CREATE FUNCTION MaxCusYearly(Canbook char(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE cus VARCHAR(30);
	select email_id into cus from booking_details where travel_status=Canbook and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE()) group by email_id order by count(*) desc limit 0,1;
	RETURN cus;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxCusRange;
DELIMITER $$
CREATE FUNCTION MaxCusRange(starttime TIMESTAMP, endtime TIMESTAMP, Canbook CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE cus VARCHAR(30);
	select email_id into cus from booking_details where travel_status=Canbook and date_of_booking>=starttime and date_of_booking<=endtime group by email_id order by count(*) desc limit 0,1;
	RETURN cus;
END$$
DELIMITER ;;


DROP FUNCTION IF EXISTS MinCusHourly;
DELIMITER $$
CREATE FUNCTION MinCusHourly(Canbook CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE cus VARCHAR(30);
	select email_id into cus from booking_details where travel_status=Canbook  and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by email_id order by count(*) limit 0,1;
	RETURN cus;
END$$
DELIMITER ;;


DROP FUNCTION IF EXISTS MinCusDaily;
DELIMITER $$
CREATE FUNCTION MinCusDaily(Canbook CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE cus VARCHAR(30);
	select email_id into cus from booking_details where travel_status=Canbook and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by email_id order by count(*) limit 0,1;
	RETURN cus;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinCusWeekly;
DELIMITER $$
CREATE FUNCTION MinCusWeekly(Canbook CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE cus VARCHAR(30);
	select email_id into cus from booking_details where travel_status=Canbook and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE()) group by email_id order by count(*) limit 0,1;
	RETURN cus;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinCusMonthly;
DELIMITER $$
CREATE FUNCTION MinCusMonthly(Canbook CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE cus VARCHAR(30);
	select email_id into cus from booking_details where travel_status=Canbook and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE()) group by email_id order by count(*) limit 0,1;
	RETURN cus;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinCusYearly;
DELIMITER $$
CREATE FUNCTION MinCusYearly(Canbook char(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE cus VARCHAR(30);
	select email_id into cus from booking_details where travel_status=Canbook and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE()) group by email_id order by count(*) limit 0,1;
	RETURN cus;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinCusRange;
DELIMITER $$
CREATE FUNCTION MinCusRange(starttime TIMESTAMP, endtime TIMESTAMP, Canbook CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE cus VARCHAR(30);
	select email_id into cus from booking_details where travel_status=Canbook and date_of_booking>=starttime and date_of_booking<=endtime group by email_id order by count(*) limit 0,1;
	RETURN Canbook;
END$$
DELIMITER ;;