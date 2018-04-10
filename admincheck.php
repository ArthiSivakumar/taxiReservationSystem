<?php
    $username = $_POST["User"];
	$password = $_POST["mypassword"];
	$uname= $_POST["User"];
	session_start();
     $_SESSION['uname']=$uname;
	if($username=="admin" and $password=="admin"){
			include"adminpage.php";
			
		}
	else {
  		echo "<script type=\"text/javascript\"> alert('INCORRECT USERNAME OR PASSWORD'); </script>";	
		
	}
?>	
