<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	$dateofjourney=$_POST['DateOfJourney'];
	$endofjourney=$_POST['EndOfJourney'];
	$noofpersons=$_POST['NoOfPersons'];
	$src=$_POST['Source'];
	$dest=$_POST['Destination'];
	$dist = $_POST['Distance'];
	$emailid = $_POST['EmailId'];
	$ac=$_POST['Ac'];
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	if (!$mysqli->query("DROP PROCEDURE IF EXISTS insertBookingProcedure")){
		echo "Drop procedure  failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}	 
	echo "<br>";
	if (!$mysqli->query("CREATE PROCEDURE insertBookingProcedure(
	date_of_journey  	VARCHAR(30),
	end_of_journey		VARCHAR(30),
	no_of_persons		INT,
	sourc	VARCHAR(20),
	destination		VARCHAR(20),
	distance		INT,
	email_id		VARCHAR(30),
	ac CHAR(1)
	)
            BEGIN
		DECLARE nooftaxi INT;
		DECLARE cugno VARCHAR(15);
		DECLARE taxino VARCHAR(15);
		SET nooftaxi = (no_of_persons)/4 + 1;
		allot_taxi:LOOP
			IF nooftaxi=0 THEN
				LEAVE allot_taxi;
			END IF;
			SELECT taxi_no INTO taxino FROM taxi WHERE taxi_no NOT IN 
				(SELECT taxi_no FROM `booking_details` WHERE
				taxi_ac=ac AND date_of_journey>=str_to_date(date_of_journey,'%d-%m-%Y %H:%i:%s') AND 
				end_of_journey<=str_to_date(end_of_journey,'%d-%m-%Y %H:%i:%s') OR travel_status='b')LIMIT 0,1;    
						
			SELECT  cug_no  INTO cugno FROM driver WHERE cug_no NOT IN 
				(SELECT cug_no FROM booking_details WHERE
				taxi_ac=ac AND date_of_journey>=str_to_date(date_of_journey,'%d-%m-%Y %H:%i:%s') AND 
				end_of_journey<=str_to_date(end_of_journey,'%d-%m-%Y %H:%i:%s') OR travel_status='b')LIMIT 0,1; 
                    	insert into booking_details values(NULL,CURRENT_TIMESTAMP(),
				str_to_date(date_of_journey,'%d-%m-%Y %h:%m:%s'),
				str_to_date(end_of_journey,'%d-%m-%Y %h:%m:%s'),'b',sourc,destination,distance,
				email_id,cugno,taxino);
			IF(taxino = '') then
				SET msg = concat('SORRY WE ARE OUT OF TAXI !!');
				SIGNAL sqlstate '45000' SET message_text = msg;
			END IF;
					
			IF(cugno = '') then
				SET msg = concat('SORRY WE ARE OUT OF DRIVERS !!');
				SIGNAL sqlstate '45000' SET message_text = msg;
			END IF;
		END LOOP;
            END;")) {
    echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					}
	echo "<br>";
	if (!$mysqli->query("CALL insertBookingProcedure('$dateofjourney','$endofjourney','$noofpersons','$src','$dest',$dist,'$emailid','$ac')")) {
		echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	else{
		echo "INSERT SUCCESSFUL!!";
	
	}
?>
