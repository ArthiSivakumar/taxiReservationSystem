<?php
	include"conn.php";
    $username = $_POST["Email"];
	$password=$_POST["mypassword"];
	session_start();
     $_SESSION['uname']=$username;


	 $query="SELECT * FROM customer WHERE email_id = '$username' and password= '$password'";
	$result=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result) == 1) {
 		 include "bookticket.php";
		 exit;
	}
	else {
  			echo "<script type=\"text/javascript\">alert(INCORRECT USERNAME OR PASSWORD!!TRY AGAIN!!);</script>";
			exit;
	}
?>