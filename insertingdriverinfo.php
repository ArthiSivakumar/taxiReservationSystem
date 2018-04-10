<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	$cugno=$_POST['CugNo'];
	$address=$_POST['Address'];
	$salary=$_POST['Salary'];
	$mobileno=$_POST['MobileNo'];
	$name=$_POST['Name'];
	$doj=$_POST['Doj'];
	if ($mysqli->connect_errno) {
		echo "<script type=\"text/javascript\"> alert('$mysqli->connect_error'); </script>";	
		include "adminpage.php";
		exit;
	}
	if (!$mysqli->query("DROP PROCEDURE IF EXISTS insertDriverProcedure")){
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";	
		include "adminpage.php";
		exit;
	}	 
	echo "<br>";
	if (!$mysqli->query("CREATE PROCEDURE insertDriverProcedure(
	IN DriverName VARCHAR(20),
	IN DriverAddress VARCHAR(70),
	IN DriverCugNo VARCHAR(15),
	IN DriverMobileNo VARCHAR(15),
	IN DriverSalary INT,
	IN DriverDoj DATE
	)
            BEGIN
                    insert into driver values(lower(DriverName),DriverAddress,DriverCugNo,DriverMobileNo,DriverSalary,DATE_FORMAT(DriverDoj,'%Y-%m-%d'),'a');
            END;")) {
					echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";	
					include "adminpage.php";
					exit;
					}
	echo "<br>";
	if (!$mysqli->query("CALL insertDriverProcedure('$name','$address','$cugno','$mobileno',$salary,'$doj')")) {
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";	
		include "adminpage.php";
		exit;
	else{
		echo "<script type=\"text/javascript\"> alert('DRIVER DETAILS INSERTED SUCCESSFULLY'); </script>";	
		include "adminpage.php";
		exit;
	}
?>