DELIMITER $$
CREATE PROCEDURE insertBookingProcedure(
	dateofjourney  	TIMESTAMP,
	endofjourney		TIMESTAMP,
	noofpersons		INT,
	sourc	VARCHAR(20),
	destination		VARCHAR(20),
	distance		INT,
	emailid		VARCHAR(30),
	ac CHAR(1)
	)
            BEGIN
		DECLARE nooftaxi INT;
		DECLARE cugno VARCHAR(15);
		DECLARE drivcount INT;
		DECLARE taxicount INT;
		DECLARE taxino VARCHAR(15);
		DECLARE msg VARCHAR(255);
		SET nooftaxi = ((noofpersons-1)/4) + 1;
		allot_taxi:LOOP
			IF nooftaxi=0 THEN
				LEAVE allot_taxi;
			END IF;
			SELECT taxi_no,count(*) into taxino,taxicount  FROM taxi WHERE taxi_no in(select taxi_no from taxi where taxi_ac='y') AND taxi_no NOT IN 
				(SELECT taxi_no FROM `booking_details` WHERE
				 travel_status='b' AND (	(date_of_journey<=DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s') AND
											end_of_journey>=DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s')) OR
											(date_of_journey<=DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s') AND
											end_of_journey>=DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s'))
										)
				) LIMIT 0,1;
			
			SELECT cug_no,count(*) into cugno,drivcount  FROM driver WHERE cug_no NOT IN 
				(SELECT cug_no FROM `booking_details` WHERE
				 travel_status='b' AND (	(date_of_journey<=DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s') AND
											end_of_journey>=DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s')) OR
											(date_of_journey<=DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s') AND
											end_of_journey>=DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s'))
										)
				) LIMIT 0,1;
			IF (drivcount = 0) THEN
				set cugno='b';
			END IF;
			IF (taxicount = 0) THEN
				set taxino='b';
			END IF;
			IF(drivcount =0 and taxicount = 0) THEN
				call InsTransLog(CURRENT_TIMESTAMP(), dateofjourney, endofjourney, emailid, 'Not enough taxi and driver');
				SET msg = 'Not enough taxi and driver';
				SIGNAL sqlstate '45000' SET message_text = msg;
			ELSE IF(drivcount =0)THEN
				call InsTransLog(CURRENT_TIMESTAMP(), dateofjourney, endofjourney, emailid, 'Not enough driver');
				SET msg = 'Not enough driver';
				SIGNAL sqlstate '45000' SET message_text = msg;
			ELSE
				call InsTransLog(CURRENT_TIMESTAMP(), dateofjourney, endofjourney, emailid, 'Not enough taxi');
				SET msg = 'Not enough taxi';
				SIGNAL sqlstate '45000' SET message_text = msg;
			END IF;
            insert into booking_details values(NULL,CURRENT_TIMESTAMP(),
				DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s'),
				DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s'),'b',sourc,destination,distance,
				emailid,cugno,taxino);
			set nooftaxi = nooftaxi - 1;
		END LOOP;
    END$$
DELIMITER ;;


call insertBookingProcedure(str_to_date('07-10-2014 01:45:00','%d-%m-%Y %H:%i:%s'),str_to_date('07-10-2014 02:00:00','%d-%m-%Y %H:%i:%s'),3,'abc','xyz',15,'arthi.siva24@gmail.com','n');
call insertBookingProcedure(str_to_date('07-10-2014 04:45:00','%d-%m-%Y %H:%i:%s'),str_to_date('07-10-2014 10:00:00','%d-%m-%Y %H:%i:%s'),3,'abc','xyz',15,'arthi.siva24@gmail.com','n');
call insertBookingProcedure(str_to_date('07-10-2014 14:45:00','%d-%m-%Y %H:%i:%s'),str_to_date('07-10-2014 19:00:00','%d-%m-%Y %H:%i:%s'),3,'abc','xyz',15,'arthi.siva24@gmail.com','y');
