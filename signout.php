<?php
	session_start();
	if(isset($_SESSION['uname'])){
		unset($_SESSION['uname']);
	}
	include"index.php";
	exit;
?>