CREATE PROCEDURE insertBookingProcedure(
	date_of_booking 	TIMESTAMP,
	date_of_journey  	TIMESTAMP,
	end_of_journey		TIMESTAMP,
	travel_status		CHAR(1),
	sourc	VARCHAR(20),
	destination		VARCHAR(20),
	distance		INT,
	email_id		VARCHAR(30),
	cug_no		VARCHAR(15),
	taxi_no		VARCHAR(15)
	)
     BEGIN
     insert into booking_details values(NULL,date_format(date_of_booking,'%Y-%m-%d %H::%i::%s'),format(date_of_journey,'%Y-%m-%d %H::%i::%s'),date_format(end_of_journey,'%Y-%m-%d %H::%i::%s'),travel_status,sourc,destination,distance,email_id,cug_no,taxi_no);
     END;