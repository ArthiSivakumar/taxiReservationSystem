<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	$cugno=$_POST['CugNo'];
	$address=$_POST['Address'];
	$salary=$_POST['Salary'];
	$mobileno=$_POST['MobileNo'];
	$name=$_POST['Name'];
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	if (!$mysqli->query("DROP PROCEDURE IF EXISTS updateDriverProcedure")){
		echo "Drop procedure  failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}	 
	echo "<br>";
	if($address!=""){
		if (!$mysqli->query("CREATE PROCEDURE updateDriverAddress(IN DriverCugNo VARCHAR(15),IN DriverAddress VARCHAR(70))
            BEGIN
                    UPDATE driver SET driver_address=DriverAddress WHERE cug_no = DriverCugNo;
            END;")) {
		echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					}
		echo "<br>";
		if (!$mysqli->query("CALL updateDriverAddress('$cugno','$address')")) {
			echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else{ echo "UPDATE SUCCESSFUL!!";}
	}
	if($salary!=""){
		if (!$mysqli->query("CREATE PROCEDURE updateDriverSalary(IN DriverCugNo VARCHAR(15),IN DriverSalary INT(5))
            BEGIN
                    UPDATE driver SET driver_salary = DriverSalary WHERE cug_no = DriverCugNo;
            END;")) {
		echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					}
		echo "<br>";
		if (!$mysqli->query("CALL updateDriverSalary('$cugno',$salary)")) {
			echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else{echo "UPDATE SUCCESSFUL!!";}
	}
	if($mobileno!=""){
		if (!$mysqli->query("CREATE PROCEDURE updateDriverMobileno(IN DriverCugNo VARCHAR(15),IN DriverMobileNo VARCHAR(15))
            BEGIN
                    UPDATE driver SET driver_mobile_no = DriverMobileNo WHERE cug_no = DriverCugNo;
            END;")) {
		echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					}
		echo "<br>";
		if (!$mysqli->query("CALL updateDriverMobileNo('$cugno','$mobileno')")) {
			echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else{	echo "UPDATE SUCCESSFUL!!";	}
	}
	if($name!=""){
		if (!$mysqli->query("CREATE PROCEDURE updateDriverName(IN DriverCugNo VARCHAR(15),IN DriverName VARCHAR(20))
            BEGIN
                    UPDATE driver SET driver_name = DriverName WHERE cug_no = DriverCugNo;
            END;")) {
					echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					}
		echo "<br>";
		
		if (!$mysqli->query("CALL updateDriverName('$cugno','$name')")) {
			echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else{	echo "UPDATE SUCCESSFUL!!";	}
	}
?>
