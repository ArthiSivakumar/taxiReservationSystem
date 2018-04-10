DROP PROCEDURE IF EXISTS TaxiHourly;
DELIMITER $$
CREATE PROCEDURE TaxiHourly(taxino VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4))
BEGIN
	IF orderbydoj='asc' and orderbydist='asc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(HOUR FROM date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE())
		order by date_of_journey desc, distance desc;
	END IF;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS TaxiDaily;
DELIMITER $$
CREATE PROCEDURE TaxiDaily(taxino VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4))
BEGIN
	IF orderbydoj='asc' and orderbydist='asc' THEN
		select * from booking_details where travel_status='b' and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) and taxi_no=taxino
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where travel_status='b' and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) and taxi_no=taxino
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where travel_status='b' and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) and taxi_no=taxino
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where travel_status='b' and EXTRACT(DAY FROM date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) and taxi_no=taxino
		order by date_of_journey desc, distance desc;
	END IF;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS TaxiWeekly;
DELIMITER $$
CREATE PROCEDURE TaxiWeekly(taxino VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4))
BEGIN
	IF orderbydoj='asc' and orderbydist='asc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(WEEK FROM date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE())
		order by date_of_journey desc, distance desc;
	END IF;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS TaxiMonthly;
DELIMITER $$
CREATE PROCEDURE TaxiMonthly(taxino VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4))
BEGIN
	IF orderbydoj='asc' and orderbydist='asc' THEN
		select * from booking_details where taxi_no=taxino and travel_status='b' and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where taxi_no=taxino and travel_status='b' and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where taxi_no=taxino and travel_status='b' and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where taxi_no=taxino and travel_status='b' and EXTRACT(MONTH FROM date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE())
		order by date_of_journey desc, distance desc;
	END IF;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS TaxiYearly;
DELIMITER $$
CREATE PROCEDURE TaxiYearly(taxino VARCHAR(15), orderbydoj VARCHAR(4), orderbydist VARCHAR(4))
BEGIN
	IF orderbydoj='asc' and orderbydist='asc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='asc' and orderbydist='desc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and orderbydist='asc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='desc' and orderbydist='desc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE())
		order by date_of_journey desc, distance desc;
	END IF;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS TaxiRange;
DELIMITER $$
CREATE PROCEDURE TaxiRange(taxino VARCHAR(15), starttime TIMESTAMP, endtime TIMESTAMP, orderbydoj VARCHAR(4), dist INT, orderbydist VARCHAR(4))
BEGIN
	IF orderbydoj='asc' and dist='asc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and date_of_booking>=starttime and date_of_booking<=endtime
		order by date_of_journey asc, distance asc;
	END IF;
	IF orderbydoj='desc' and dist='asc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and date_of_booking>=starttime and date_of_booking<=endtime
		order by date_of_journey desc, distance asc;
	END IF;
	IF orderbydoj='asc' and dist='desc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and date_of_booking>=starttime and date_of_booking<=endtime
		order by date_of_journey asc, distance desc;
	END IF;
	IF orderbydoj='desc' and dist='desc' THEN
		select * from booking_details where travel_status='b' and taxi_no=taxino and date_of_booking>=starttime and date_of_booking<=endtime
		order by date_of_journey desc, distance desc;
	END IF;
END$$
DELIMITER ;;



DROP FUNCTION IF EXISTS MaxTaxiHourly;
DELIMITER $$
CREATE FUNCTION MaxTaxiHourly(ac CHAR(1))
RETURNS VARCHAR(15)  NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE cnt INT;
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y'; END IF;
	IF ac='n' THEN set ac1='n'; END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and EXTRACT(HOUR FROM b.date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM b.date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by b.taxi_no order by count(*) desc limit 0,1;
	RETURN taxino;
END $$
DELIMITER ;;


DROP FUNCTION IF EXISTS MaxTaxiDaily;
DELIMITER $$
CREATE FUNCTION MaxTaxiDaily(ac CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE cnt INT;
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y'; END IF;
	IF ac='n' THEN set ac1='n'; END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and EXTRACT(DAY FROM b.date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by b.taxi_no order by count(*) desc limit 0,1;
	RETURN taxino;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxTaxiWeekly;
DELIMITER $$
CREATE FUNCTION MaxTaxiWeekly(ac CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE cnt INT;
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and EXTRACT(WEEK FROM b.date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE()) group by b.taxi_no order by count(*) desc limit 0,1;
	RETURN taxino;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxTaxiMonthly;
DELIMITER $$
CREATE FUNCTION MaxTaxiMonthly(ac CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE cnt INT;
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and EXTRACT(MONTH FROM b.date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE()) group by b.taxi_no order by count(*) desc limit 0,1;
	RETURN taxino;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxTaxiYearly;
DELIMITER $$
CREATE FUNCTION MaxTaxiYearly(ac char(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE cnt INT;
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and EXTRACT(YEAR FROM date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE()) group by b.taxi_no order by count(*) desc limit 0,1;
	RETURN taxino;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MaxTaxiRange;
DELIMITER $$
CREATE FUNCTION MaxTaxiRange(starttime TIMESTAMP, endtime TIMESTAMP, ac CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE cnt INT;
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and b.date_of_booking>=starttime and b.date_of_booking<=endtime group by b.taxi_no order by count(*) desc limit 0,1;
	RETURN taxino;
END$$
DELIMITER ;;


DROP FUNCTION IF EXISTS MinTaxiHourly;
DELIMITER $$
CREATE FUNCTION MinTaxiHourly(ac CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and EXTRACT(HOUR FROM b.date_of_booking)=EXTRACT(HOUR FROM CURRENT_TIMESTAMP()) and EXTRACT(DAY FROM b.date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by t.taxi_no order by count(*) limit 0,1;
	RETURN taxino;
END$$
DELIMITER ;;


DROP FUNCTION IF EXISTS MinTaxiDaily;
DELIMITER $$
CREATE FUNCTION MinTaxiDaily(ac CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where travel_status='b' and t.taxi_ac=ac and EXTRACT(DAY FROM b.date_of_booking)=EXTRACT(DAY FROM CURRENT_DATE()) group by b.taxi_no order by count(*) limit 0,1;
	RETURN taxino;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinTaxiWeekly;
DELIMITER $$
CREATE FUNCTION MinTaxiWeekly(ac CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and EXTRACT(WEEK FROM b.date_of_booking)=EXTRACT(WEEK FROM CURRENT_DATE()) group by b.taxi_no order by count(*) limit 0,1;
	RETURN taxino;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinTaxiMonthly;
DELIMITER $$
CREATE FUNCTION MinTaxiMonthly(ac CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and EXTRACT(MONTH FROM b.date_of_booking)=EXTRACT(MONTH FROM CURRENT_DATE()) group by b.taxi_no order by count(*) limit 0,1;
	RETURN taxino;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinTaxiYearly;
DELIMITER $$
CREATE FUNCTION MinTaxiYearly(ac char(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and EXTRACT(YEAR FROM b.date_of_booking)=EXTRACT(YEAR FROM CURRENT_DATE()) group by b.taxi_no order by count(*) limit 0,1;
	RETURN taxino;
END$$
DELIMITER ;;

DROP FUNCTION IF EXISTS MinTaxiRange;
DELIMITER $$
CREATE FUNCTION MinTaxiRange(starttime TIMESTAMP, endtime TIMESTAMP, ac CHAR(1))
RETURNS VARCHAR(15) NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER
BEGIN
	DECLARE taxino VARCHAR(15);
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no into taxino from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and b.date_of_booking>=starttime and b.date_of_booking<=endtime group by b.taxi_no order by count(*) limit 0,1;
	RETURN taxino;
END$$
DELIMITER ;;


DROP PROCEDURE IF EXISTS MaxDist;
DELIMITER $$
CREATE PROCEDURE MaxDist(starttime TIMESTAMP, endtime TIMESTAMP, ac CHAR(1), OUT taxino VARCHAR(15), OUT dist INT)
BEGIN
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no,sum(b.distance) into taxino,dist from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and b.end_of_journey<=CURRENT_TIMESTAMP() group by b.taxi_no order by b.distance desc limit 0,1;
END$$
DELIMITER ;;

DROP PROCEDURE IF EXISTS MinDist;
DELIMITER $$
CREATE PROCEDURE MinDist(starttime TIMESTAMP, endtime TIMESTAMP, ac CHAR(1), OUT taxino VARCHAR(15), OUT dist INT)
BEGIN
	DECLARE ac1 CHAR(1);
	IF ac='y' THEN set ac1='y';END IF;
	IF ac='n' THEN set ac1='n';END IF;
	IF ac='b' THEN set ac='y';set ac1='n'; END IF;
	select b.taxi_no,sum(distance) into taxino,dist from booking_details b,taxi t where b.travel_status='b' and t.taxi_ac in (ac,ac1) and b.end_of_journey<=CURRENT_TIMESTAMP() group by b.taxi_no order by b.distance limit 0,1;
END$$
DELIMITER ;;