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
var y=document.forms["myform"]["User"].value;
var z=document.forms["myform"]["Pass"].value;
var a=document.forms["myform"]["conPass"].value;
var b=document.forms["myform"]["Phno"].value;
var c=document.forms["myform"]["Email"].value;
if (y==null || y==""){
  alert("Please fill ur username ");
  return false;
}
if (z==null || z==""){
  alert("Please fill ur password");
  return false;
}
if (a==null || a==""){
  alert("Please fill ur confirm password");
  return false;
}
if (b==null || b==""){
  alert("Please fill ur phone no.");
  return false;
}
if (c==null || c==""){
  alert("Please fill ur E-mail ID");
  return false;
}
if(z!=a){
	alert("Password and confirm password doesnot match");
	return false;
}	
  return true;
}
</script>
<body>
<div id="navigation">
	<ul>
	<li><a href="index.php" class="active">BACK</a></li>
	</ul>
</div>
<div id="content">
	<div id="logo">
		<h1>Your Taxi Place</h1>
	</div>
	<div id="splash"><img src="images/image03.jpg" alt="" /></div>
	<div id="page">
		<div id="column1">
			<div class="box1">
				<form name="myform" action="siup.php" onsubmit="return validateForm()" method="post">
					<p>USERNAME			: <INPUT type="text" 	name="User" 		 id="User" 		size=25 maxlength=25 style="position:relative;height:3%;width:25%;left:19%">></p>
					<p>PASSWORD			: <INPUT TYPE=PASSWORD 	NAME="mypassword" 	 id = "Pass" 	size=25 maxlength=15 style="position:relative;height:3%;width:25%;left:19%"></p>	
					<p>CONFIRM-PASSWORD	: <INPUT TYPE=PASSWORD 	NAME="conmypassword" id = "conPass" size=25 maxlength=15 style="position:relative;height:3%;width:25%;left:8%"></p>
					<p>E-MAIL			: <INPUT type="text" 	name="Email" 		 id="Email" 	size=25 maxlength=30 style="position:relative;height:3%;width:25%;left:24%"></p> 
					<p>PHONE-NO			: <INPUT type="tel" 	name="Phno" 		 id="Phno" 		size=25 maxlength=10 style="position:relative;height:3%;width:25%;left:20%"></p>
					<p>ALTERNATE-NO		: <INPUT type="tel" 	name="Phno1" 		 id="Phno1" 	size=25 maxlength=10 style="position:relative;height:3%;width:25%;left:15%"></p>
					<p><input type="submit" value="Submit" style="position:relative;height:4%;width:15%;left:25%"></p>
				</form>
			</div>
		</div>
		<div id="column2">
			<marquee direction="up" scrollamount="3"><h2>Latest News</h2>
			<p>Festive offer
			20% off on every trip!</p>
			<p>Exclusive for registered users</p>
			<p>Hurry up!</p>
			</marquee>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
</body>
</html>
