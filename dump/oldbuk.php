<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	$src=$_POST['source'];
	$dest=$_POST['destination'];
	$dateofjourney=$_POST['doj'];
	$hh=$_POST['hh'];
	$mm=$_POST['mm'];
	
$url = 'http://maps.googleapis.com/maps/api/distancematrix/json?origins=Chennai&destinations=Peelamedu&mode=driving&language=en&sensor=false';
$data = file_get_contents($url);
$data = utf8_decode($data);
$obj = json_decode($data);

function foo($seconds) {
  $t = round($seconds);
  return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
}

$query = $obj->rows[0]->elements[0]->duration->value;
$dt= foo($query);
$dist=$obj->rows[0]->elements[0]->distance->value;
	$space=' ';
	$colon=':';
	$ss='00';
	$dateofjourney1=$dateofjourney.$space.$hh.$colon.$mm.$colon.$ss;
	$h=$hh+1;
	$m=$mm+23;
	$endofjourney=$dateofjourney.$space.$h.$colon.$m.$colon.$ss;
	$emailid='jayaachu21@gmail.com';
	$cugno='';
	$taxino='';
	
	
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	if (!$mysqli->query("DROP PROCEDURE IF EXISTS insertBookingProcedure")){
		echo "Drop procedure  failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}	 
	echo "<br>";
	if (!$mysqli->query("CREATE PROCEDURE insertBookingProcedure(
						 date_of_journey  	TIMESTAMP,end_of_journey		TIMESTAMP,
						 sourc	VARCHAR(20),destination		VARCHAR(20),
						 distance		INT,email_id		VARCHAR(30),
						 cugno	VARCHAR(15),taxino	VARCHAR(15))
		
		
				BEGIN		
					DECLARE msg varchar(255);
				 
					IF(taxino = '') then
						SET msg = concat('SORRY WE ARE OUT OF TAXI !!');
						SIGNAL sqlstate '45000' SET message_text = msg;
					END IF;
					
						IF(cugno = '') then
						SET msg = concat('SORRY WE ARE OUT OF DRIVERS !!');
						SIGNAL sqlstate '45000' SET message_text = msg;
					END IF;
					
					SELECT taxi_no INTO taxino FROM taxi WHERE taxi_no NOT IN 
						(SELECT taxi_no FROM `booking_details` WHERE
						date_of_journey>=str_to_date(date_of_journey,'%d-%m-%Y %H:%i:%s') AND 
						end_of_journey<=str_to_date(end_of_journey,'%d-%m-%Y %H:%i:%s') OR travel_status='b')LIMIT 0,1;    
						
						SELECT  cug_no  INTO cugno FROM driver WHERE cug_no NOT IN 
						(SELECT cug_no FROM booking_details WHERE
						date_of_journey>=str_to_date(date_of_journey,'%d-%m-%Y %H:%i:%s') AND 
						end_of_journey<=str_to_date(end_of_journey,'%d-%m-%Y %H:%i:%s') OR travel_status='b')LIMIT 0,1; 
					
					
						insert into booking_details values(NULL,CURRENT_TIMESTAMP(),DATE_FORMAT(date_of_journey,'%Y-%m-%d %H:%i:%s'),DATE_FORMAT(end_of_journey,'%Y-%m-%d %H:%i:%s'),'b',sourc,destination,distance,email_id,cugno,taxino);
				
				END;")) {
    echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					}
	echo "<br>";
	if (!$mysqli->query("CALL insertBookingProcedure('$dateofjourney1','$endofjourney','$src','$dest',$dist,'$emailid','$cugno','$taxino')")) {
		echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	else{
		echo "INSERT SUCCESSFUL!!";
	
	}

?>