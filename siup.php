<?php
	include "conn.php";
   $mysqli = new mysqli("localhost", "root", "", "DBMS");
  
    $phone = $_POST["Phno"];  
	$phone1=$_POST["Phno1"];
	$emailid=$_POST['Email'];
	$password=$_POST['mypassword'];
	$name=$_POST['User'];
   
   $query="SELECT * FROM customer WHERE email_id = '$emailid'";
   $result=mysql_query($query) or die(mysql_error());

		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		if (!$mysqli->query("DROP PROCEDURE IF EXISTS insertCusProcedure")){
			echo "Drop procedure  failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}	 
		echo "<br>";
		if (!$mysqli->query("CREATE PROCEDURE insertCusProcedure(
				IN CusEmailId VARCHAR(30),
				IN CusPassword VARCHAR(20),
				IN CusName VARCHAR(30)
		   )
            BEGIN
                    insert into customer values(CusEmailId,CusPassword,CusName);
            END;")) {
						echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					}
		echo "<br>";
		if (!$mysqli->query("DROP PROCEDURE IF EXISTS insertPhoneProcedure")){
			echo "Drop procedure  failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if(!$mysqli->query("CREATE PROCEDURE insertPhoneProcedure(
				IN CusEmailId VARCHAR(30),
				IN CusPhone	  VARCHAR(15)
		   )
            BEGIN
                    insert into customer_mobile_no values(CusEmailId,CusPhone);
            END;")) {
						echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					}
		echo "<br>";
		if (!$mysqli->query("CALL insertCusProcedure('$emailid','$password','$name')")) {
			//echo " (" . $mysqli->errno . ") " . $mysqli->error;
			echo "<script type=\"text/javascript\">
            alert('$mysqli->error');
            </script>";
			echo "<br>";
			include "signin.php";
			echo "<script type=\"text/javascript\">
            alert('EMAILID ALREADY EXISTS');
            </script>";
			exit;
		}
		if (!$mysqli->query("CALL insertPhoneProcedure('$emailid','$phone')")) {
			echo "(" . $mysqli->errno . ") " . $mysqli->error;
			echo "<br>";
		}
		if (!$mysqli->query("CALL insertPhoneProcedure('$emailid','$phone1')")) {
			echo " (" . $mysqli->errno . ") " . $mysqli->error;
			echo "<br>";
		}
		else{
			echo "INSERT SUCCESSFUL!!";	
			include "signin.php";
		}
	
?>