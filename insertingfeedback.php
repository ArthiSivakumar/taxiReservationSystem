<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	$tid=$_POST['tid'];
	$dp=$_POST['dp'];
	$tc=$_POST['tc'];
	$jc=$_POST['jc'];
	$cc=$_POST['cc'];
	$bu=$_POST['bu'];
	$nr=$_POST['nr'];
	$tc1=$_POST['tc1'];
	$use=$_POST['use'];
	$com=$_POST['com'];
	if ($mysqli->connect_errno) {
		echo "<script type=\"text/javascript\"> alert('$mysqli->connect_error'); </script>";	
		include "bookticket.php";
		exit;
	}
	if (!$mysqli->query("DROP PROCEDURE IF EXISTS insertFeedbackProcedure")){
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";	
		include "bookticket.php";
		exit;
	}	 
	echo "<br>";
	if (!$mysqli->query("CREATE PROCEDURE insertFeedbackProcedure(IN tid INT,IN dp INT,IN tc INT,IN jc INT,IN cc INT,IN bu INT,IN nr INT,IN tc1 INT,IN use1 CHAR(1),IN com VARCHAR(200))
						BEGIN
							insert into feedback values(tid,dp,tc,jc,cc,bu,nr,tc1,use1,com);
						END;")) {
							echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";	
							include "bookticket.php";
							exit;
						}
	echo "<br>";
	if (!$mysqli->query("CALL insertFeedbackProcedure($tid,$dp,$tc,$jc,$cc,$bu,$nr,$tc1,'$use','$com')")) {
		echo "<script type=\"text/javascript\"> alert('SORRY!WE COULD NOT REACH OUT YOUR FEEDBACK'); </script>";	
		include "bookticket1.php";
		exit;
	}
	else{
		echo "<script type=\"text/javascript\"> alert('THANK YOU FOR YOUR FEEDBACK'); </script>";
		include "bookticket1.php";
		exit;
	}
?>