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
		var x=document.forms["myform"]["CugNo"].value;
		if (x==null || x==""){
			alert("Cug Number must be filled out!!");
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
				<h2>YOU ARE ABOUT TO UPDATE DRIVER DETAILS</h2>
				<p>
					<form name="myform1" action="updatingdriverinfo.php" onsubmit="return validateForm()" method="post" style="font-family:Arial; font-size:15px;">
						<p>DRIVER CUG NO    :	<INPUT type="tel" 	 name="CugNo"     id="CugNo" 	 size=25  maxlength=10  style="height:3%; width:50%;position:relative;left:20%;"></p>
						<p>DRIVER NAME      :	<INPUT type="text" 	 name="Name"      id="Name" 	 size=25  maxlength=10  style="height:3%; width:50%;position:relative;left:23%;"></p>
						<p>DRIVER ADDRESS   :	<INPUT type="text" 	 name="Address"   id="Adddress"  size=100 maxlength=70  style="height:10%; width:50%;position:relative;left:18%;"></p>
						<p>DRIVER MOBILENO  :	<INPUT type="tel" 	 name="MobileNo"  id="MobileNo"  size=25  maxlength=10  style="height:3%; width:50%;position:relative;left:17%;"></p>
						<p>DRIVER SALARY  	:	<INPUT type="number" name="Salary" 	  id="Salary"    size=25  maxlength=6   style="height:3%; width:50%;position:relative;left:20%;"></p>
						<br/><input type="submit" value="UPDATE" style="height:3%; width:15%;position:relative;left:30%;">
					</form>
				</p>
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
