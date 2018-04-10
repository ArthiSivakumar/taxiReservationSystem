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
		var y=document.forms["myform"]["Address"].value;
		var z=document.forms["myform"]["MobileNo"].value;
		var a=document.forms["myform"]["Salary"].value;
		var b=document.forms["myform"]["Name"].value;
		var c=document.forms["myform"]["Doj"].value;
		if (x==null || x==""){
			alert("Cug Number must be filled out!!");
			return false;
		}
		if (y==null || y==""){
			alert("Please fill Drivers Address ");
			return false;
		}
		if (z==null || z==""){
			alert("Please fill Driver Mobile Number");
			return false;
		}
		if (a==null || a==""){
			alert("Please fill Driver Salary");
			return false;
		}
		if(b==null || b==""){
			alert("Please fill driver Name");
			return false;
		}
		if(c==null || c==""){
			alert("Please fill Date of joining");
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
					<form name="myform1" action="insertingdriverinfo.php" onsubmit="return validateForm()" method="post" style="font-family:Arial; font-size:15px;">
						<p>DRIVER CUG NO    :	<INPUT type="tel" 	 name="CugNo"     id="CugNo" 	 size=25  maxlength=10  style="height:4%; width:50%;position:relative;left:15%;"></p>
						<p>DRIVER NAME      :	<INPUT type="text" 	 name="Name"      id="Name" 	 size=25  maxlength=10  style="height:4%; width:50%;position:relative;left:18%;;"></p>
						<p>DRIVER ADDRESS   :	<INPUT type="text" 	 name="Address"   id="Adddress"  size=100 maxlength=70  style="height:10%; width:50%;position:relative;left:13%;"></p>
						<p>DRIVER MOBILENO  :	<INPUT type="tel" 	 name="MobileNo"  id="MobileNo"  size=25  maxlength=10  style="height:4%; width:50%;position:relative;left:12%;"></p>
						<p>DRIVER SALARY  	:	<INPUT type="number" name="Salary" 	  id="Salary"    size=25  maxlength=6   style="height:4%; width:50%;position:relative;left:15%;"></p>
						<p>DATE OF JOINING  :   <INPUT type="date"   name="Doj"       id="Doj"		 size=25  maxlength=20  style="height:4%; width:50%;position:relative;left:13%;"></p>
						<input type="submit" value="INSERT" style="height:4%; width:10%;position:relative;left:30%;">
					</form>
				</p>
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
