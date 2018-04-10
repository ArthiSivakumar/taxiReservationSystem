<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	$i=0;
	$value=array();
	$count= $_POST['count'];
	for($t=0;$t<$count;$t++){
		if(isset($_POST[$t])){
			$value[$i]=$_POST[$t];
			$i++;
		}
	}
	$totalcheck=$i;
	if ($mysqli->connect_errno) {
		//echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
		include "home.php";
	}
	if (!$mysqli->query("DROP PROCEDURE IF EXISTS CancelBookingProcedure")){
	//	echo "Drop procedure  failed: (" . $mysqli->errno . ") " . $mysqli->error;
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
		include "bookticket.php";
	} 	
	echo "<br>";
	if (!$mysqli->query("CREATE PROCEDURE CancelBookingProcedure(IN TravelID INT)
            BEGIN
                    UPDATE booking_details SET travel_status='c' WHERE travel_id = TravelID;
            END;")) {
					//echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					include "bookticket.php";
					echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
					}
	echo "<br>";
	for($k=0;$k<$totalcheck;$k++){
			if (!$mysqli->query("CALL CancelBookingProcedure($value[$k])")) {
				echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
				include "bookticket.php";
			}
			else{
				echo "<script type=\"text/javascript\"> alert('TICKET CANCELLED SUCCESSFULLY'); </script>";
								include "bookticket1.php";
			}
	}
?>