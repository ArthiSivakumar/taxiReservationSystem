<?php
	include"conn.php";
    $username = $_POST["Email"];
	
	session_start();
     $_SESSION['uname']=$username;


	 $query="SELECT * FROM driver WHERE cug_no = '$username'";
	$result=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result) == 1) {
 		 include "driverpage.php";
	}
	else {
  			echo "<script type=\"text/javascript\"> alert('INCORRECT CUG NUMBER'); </script>";
			include "driversignin.php";
			
	}
?>