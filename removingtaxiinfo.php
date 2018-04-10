<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	$taxino=$_POST['TaxiNo'];
	if ($mysqli->connect_errno) {
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
		include "adminsigninpage.php";
		exit;
	}
	if (!$mysqli->query("DROP PROCEDURE IF EXISTS RemoveTaxiProcedure")){
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
		include "adminsigninpage.php";
		exit;
	} 	
	echo "<br>";
	if (!$mysqli->query("CREATE PROCEDURE RemoveTaxiProcedure(IN TaxiNo VARCHAR(15))
							BEGIN
							DECLARE msg varchar(255);
							IF (TaxiNo NOT IN (SELECT taxi_no from taxi))
							THEN
								SET msg = concat('Invalid Taxi ID ', cast(TaxiNo as char));
								SIGNAL sqlstate '45000' SET message_text = msg;
							END IF; 	     	
							DELETE FROM taxi WHERE taxi_no = TaxiNo; 
							END;")) {
					echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
					include "adminpage.php";
					exit;
				}
	echo "<br>";
	if (!$mysqli->query("CALL RemoveTaxiProcedure('$taxino')")) {
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
		include "adminpage.php";
		exit;
	}
	else{
		echo "<script type=\"text/javascript\"> alert('TAXI REMOVED SUCCESSFULLY'); </script>";
		include "adminpage.php";
		exit;
	}
?>