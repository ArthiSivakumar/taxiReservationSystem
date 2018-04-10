<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	$taxino=$_POST['TaxiNo'];
	$taxiac=$_POST['TaxiAC'];
	
	if ($mysqli->connect_errno) {
		echo "<script type=\"text/javascript\"> alert('$mysqli->connect_error'); </script>";	
		include "adminpage1.php";
		exit;
	}
	if (!$mysqli->query("DROP PROCEDURE IF EXISTS updateTaxiProcedure")){
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";	
		include "adminpage1.php";
		exit;
	} 
	echo "<br>";
	if (!$mysqli->query("CREATE PROCEDURE updateTaxiProcedure(IN TaxiNo VARCHAR(15),IN TaxiAC CHAR(1))
            BEGIN
                    UPDATE taxi SET taxi_ac = TaxiAC WHERE taxi_no = TaxiNo;
            END;")) {
					echo "<script type=\"text/javascript\"> alert('$mysqli->connect_error'); </script>";	
					include "adminpage1.php";
					exit;
					}
	echo "<br>";
	if (!$mysqli->query("CALL updateTaxiProcedure('$taxino','$taxiac')")) {
		echo "<script type=\"text/javascript\"> alert('$mysqli->connect_error'); </script>";	
		include "adminpage1.php";
		exit;
	}
	else{
		echo "<script type=\"text/javascript\"> alert('TAXI UPDATED SUCCESSFULLY'); </script>";	
		include "adminpage1.php";
		exit;
	
	}
?>