<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	$cugno=$_POST['CugNo'];
	echo $cugno;
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	if (!$mysqli->query("DROP PROCEDURE IF EXISTS RemoveDriverProcedure")){
		echo "Drop procedure  failed: (" . $mysqli->errno . ") " . $mysqli->error;
	} 	
	echo "<br>";
	if (!$mysqli->query("CREATE PROCEDURE RemoveDriverProcedure(IN CugNo VARCHAR(15))
            BEGIN
                    DELETE FROM driver WHERE cug_no = CugNo;
            END;")) {
    echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	echo "<br>";
	if (!$mysqli->query("CALL RemoveDriverProcedure($cugno)")) {
		echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	else{
		echo "DRIVER REMOVED SUCCESSFULLY!!";
	}
?>