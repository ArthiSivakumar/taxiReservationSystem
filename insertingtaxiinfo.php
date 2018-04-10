<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	$taxino=$_POST['TaxiNo'];
	$capacity=$_POST['TaxiCapacity'];
	$ac=$_POST['TaxiAC'];
	if ($mysqli->connect_errno) {
		echo "<script type=\"text/javascript\"> alert('$mysqli->connect_error'); </script>";	
		include "adminpage.php";
		exit;
	}
	if (!$mysqli->query("DROP PROCEDURE IF EXISTS insertTaxiProcedure")){
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";	
		include "adminpage.php";
		exit;
	}	 
	echo "<br>";
	if (!$mysqli->query("CREATE PROCEDURE insertTaxiProcedure(
						IN TaxiNo VARCHAR(15),
						IN TaxiCapacity SMALLINT(5),
						IN TaxiAC CHAR(1)
						)
						BEGIN
							insert into taxi(taxi_no,taxi_capacity,taxi_ac) values(TaxiNo,TaxiCapacity,TaxiAC);
						END;")) {
							echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";	
							include "adminpage.php";
							exit;
						}
	echo "<br>";
	if (!$mysqli->query("CALL insertTaxiProcedure('$taxino',$capacity,'$ac')")) {
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";	
		include "adminpage.php";
		exit;
	}
	else{
		echo "<script type=\"text/javascript\"> alert('INSERT SUCCESSFUL'); </script>";
		include "adminpage.php";
		exit;
	}
?>