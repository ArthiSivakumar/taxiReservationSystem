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
	var u=document.forms["myform"]["Email"].value;
	var p=document.forms["myform"]["Pass"].value;
	if (u==null || u==""){
  		alert("E-MAIL must be filled");
  		return false;
	}
	if (p==null || p==""){
		alert("Please fill your password ");
  		return false;
	}
  	return true;
  }
</script>
<body>
<div id="navigation">
	<ul>
		<li><a href="about.html" class="active">ABOUT US</a></li>
		<li><a href="index.php">HOME</a></li>		
	</ul>
</div>
<div id="content">
	<div id="logo">
		<h1>Your Taxi Place</h1>
	</div>
	<div id="splash"><img src="images/image03.jpg" alt="" /></div>
	<div id="page">
			<div class="box1" style="float:left; width:500px; height:25px; line-height:25px; padding-left:3px; font-family:Arial; font-size:18px;">
				<form name="myform" action="check.php" onsubmit="return validateForm()" method="post">
					<p>E-MAIL			&nbsp;     <INPUT type="email" 	name="Email" 		 id="Email" 	size=25 maxlength=30 style="position:relative;left:15%"></p>
					<p>PASSWORD<INPUT TYPE=PASSWORD 	NAME="mypassword" 	 id = "Pass" 	size=25 maxlength=15 style="position:relative;left:9%"></p><br></br>						
					<p><input type="submit" value="Submit" style="position:relative;left:38%;height:95%;width:15%"></p>
				</form>
			<br></br>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
</body>
</html>
