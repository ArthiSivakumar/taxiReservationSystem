<?php
	session_start();
	include "conn.php";
   $mysqli = new mysqli("localhost", "root", "", "DBMS");
    $emailid=$_SESSION['uname'];
	if(!isset($_POST['phone'])) $phone='';
    else $phone = $_POST["phone"]; 
	if (!isset($_POST['ph'])) $phone1='';
	else $phone1=$_POST['ph'];	
	if(!isset($_POST['PASS'])) $password='';
	else $password=$_POST['PASS'];
	if(!isset($_POST['User'])) $name='';
	else $name=$_POST['User'];
  
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		if (!$mysqli->query("DROP PROCEDURE IF EXISTS updateNameProcedure")){
			echo "Drop procedure  failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if($name!=''){
			if(!$mysqli->query("CREATE PROCEDURE updateNameProcedure(
				IN CusEmailId VARCHAR(30),IN Name VARCHAR(15))
				BEGIN
                    UPDATE customer set cus_name=Name where email_id=CusEmailId;
				END;")) {
						echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					}
					
			if (!$mysqli->query("CALL updateNameProcedure('$emailid','$name')")) {
				echo " (" . $mysqli->errno . ") " . $mysqli->error;
			}
		}
		if (!$mysqli->query("DROP PROCEDURE IF EXISTS updatePhoneProcedure")){
			echo "Drop procedure  failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if($phone!='None' && $phone1!=''){
			if(!$mysqli->query("CREATE PROCEDURE updatePhoneProcedure(
				IN CusEmailId VARCHAR(30),IN CusPhone VARCHAR(15),IN CusPhone1 VARCHAR(15))
				BEGIN
                    UPDATE customer_mobile_no set mobile_no=CusPhone1 where email_id=CusEmailId and mobile_no=CusPhone;
				END;")) {
						echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					}
					
			if (!$mysqli->query("CALL updatePhoneProcedure('$emailid','$phone','$phone1')")) {
				echo " (" . $mysqli->errno . ") " . $mysqli->error;
			}
		}
		if (!$mysqli->query("DROP PROCEDURE IF EXISTS updatePassProcedure")){
			echo "Drop procedure  failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}	
		if($password!=''){
			if(!$mysqli->query("CREATE PROCEDURE updatePassProcedure(
				IN CusEmailId VARCHAR(30),IN CusPassword VARCHAR(20))
				BEGIN
                    UPDATE customer set password=CusPassword where email_id=CusEmailId;
				END;")) {
						echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
					}
					
			if (!$mysqli->query("CALL updatePassProcedure('$emailid','$phone','$phone1')")) {
				echo " (" . $mysqli->errno . ") " . $mysqli->error;
			}
		}
				
		if($name!='' || $password!='' || $phone!=''){
			echo "<script type=\"text/javascript\">alert('UPDATE SUCCESSFUL');</script>";
			include "bookticket1.php";
		}
?>