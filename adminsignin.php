<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>SIGNIN</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="layout.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<script>
	function validateForm(){
		var u=document.forms["myform1"]["User"].value;
		var p=document.forms["myform1"]["Pass"].value;
		if (u==null || u==""){
			alert("Username must be filled out");
			return false;
		}
		if (p==null || p==""){
			alert("Please fill ur password ");
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
	</ul>
</div>
<div id="content">
	<div id="logo">
		<h1>Your Taxi Place</h1>
	</div>
	<div id="splash"><img src="images/image03.jpg" alt="" /></div>
	<div id="page">
		<div id="column1">
			<div class="box1">					<h2>LOG IN </h2>	
			<form name="myform1" action="admincheck.php" onsubmit="return validateForm()" method="post" style="font-family:Arial; font-size:16px;">
			<p style="position:relative;top:2%;"><b>USERNAME  	:		<INPUT type="text" name="User" id="User" size="15" maxlength="10" ></b></p>
			<p style="position:relative;top:2%;"><b>PASSWORD  	:		<INPUT TYPE="PASSWORD" name="mypassword" id = "Pass" size = "15" maxlength = "15" ></b></p>
			<p>		  <input type="submit" value="Submit" style="position:relative;height:4%;width=7%;left:10%">
			</p>
				</form>
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
</body>
</html>
