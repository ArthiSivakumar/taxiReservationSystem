<?php
    session_start();
	if(!isset($_SESSION['uname'])){
		include "admin.html";
		exit;
	}
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="layout.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<script>
	function validateForm(){
		var x=document.forms["myform"]["TaxiNo"].value;
		var y=document.forms["myform"]["TaxiCapacity"].value;
		var z=document.forms["myform"]["TaxiAC"].value;
		if (x==null || x==""){
			alert("Taxi Number must be filled out");
			return false;
		}
		if (y==null || y==""){
			alert("Please fill Taxi Capacity ");
			return false;
		}
		if (z==null || z==""){
			alert("Please fill Taxi is AC or NON AC");
			return false;
		}		
	return true;
}
</script>
<body>
<div id="navigation">
	<ul>
		<li><a href="adminsignin.php" class="active">ADMIN</a></li>
		<li><a href="driversignin.php">DRIVER</a></li>
		<li><a href="#">Solutions</a></li>
		<li><a href="#">Partners</a></li>
		<li><a href="#">Training</a></li>
		<li><a href="#">Support</a></li>
		<li><a href="#">Contact</a></li>
	</ul>
</div>
<div id="content">
	<div id="logo">
		<h1>WELCOME ADMIN</h1>
	</div>
	<div id="splash"><img src="images/image03.jpg" alt="" /></div>
	<div id="page">
		<div id="column1">
			<div class="box1">
				<h2>YOU ARE ABOUT TO INSERT TAXI DETAILS</h2>
				<p style="font-family:verdana ;font-size:50%;postion:relative "><pre><form name="myform1" action="insertingtaxiinfo.php" onsubmit="return validateForm()" method="post">						<p>TAXI NO  	   :		<INPUT type="text" 	 name="TaxiNo"       id="TaxiNo" 	   size=25 maxlength=15></p>						<p>TAXI CAPACITY      :		<INPUT type="number" name="TaxiCapacity" id="TaxiCapacity" size=25 maxlength=2></p>						<p>TAXI AC/NON-AC     :                <input type="radio" name="TaxiAC" id="TaxiAC" value="y">YES         <input type="radio" name="TAxiAC" id="TaxiAC" value="n">NO</p>
				<input type="submit" value="Submit" style="position:relative;height:5%;width:12%">
					</form>
				</pre></p>
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
