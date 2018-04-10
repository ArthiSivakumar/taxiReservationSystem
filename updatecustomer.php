<?php
	session_start();
		$user=$_SESSION['uname'];
		include "conn.php";
		$query="SELECT mobile_no FROM customer_mobile_no where email_id='$user'";
	$result=mysql_query($query) or die(mysql_error());
	$phone=array();
	$pi=0;
	$phone[$pi]='None';
	$pi=$pi+1;
	while($info = mysql_fetch_array($result)){
		$phone[$pi]=$info['mobile_no'];
		$pi=$pi+1;
	}
	$pi=$pi-1;
	
?>
<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>UPDATE</title>
	<link href="layout.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
<script>
function validateForm(){
	var c=document.forms["myform"]["Email"].value;
	var d=document.forms["myform"]["Pass"].value;
	var e=document.forms["myform"]["conPass"].value;
	if (c==null || c==""){
		alert("Please fill ur E-mail ID");
		return false;
	}
	if(d!=null || d!=""){
		if(d!=e){
			alert("PASSWORD and CONFIRM PASSWORD doesnt match");
			return false;
		}
	}
  return true;
}
</script>
<body>
	<div id="navigation">
		<ul>

			<li><a href="bookticket1.php">BACK</a></li>
			<li><a href="signout.php">SIGNOUT</a></li>
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
					<br><center style="font-size:20px;">	UPDATE </center><br>
					<form name="myform" action="updatingcustomer.php" onsubmit="return validateForm()" method="post">
				    <p>NEW USERNAME			 <INPUT type="text" 	name="User" 		 id="User" 		size=25 maxlength=25 style="position:relative;left:25%;">></p>
					<p>NEW PASSWORD			 <INPUT TYPE=PASSWORD 	NAME="mypassword" 	 id = "Pass" 	size=25 maxlength=15 style="position:relative;left:25%;">></p>	
					<p>CONFIRM-PASSWORD	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=PASSWORD 	NAME="conmypassword" id = "conPass" size=25 maxlength=15 style="position:relative;left:14%;">></p>
					<p>CHOOSE A NUMBER TO UPDATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php	$i=0;
									echo "<label style='position:relative;left:4%;'>";
									echo "<select name='phone' id='phone'>";
									
									for($i=0;$i<$pi+1;$i=$i+1){
											echo "<option value='$phone[$i]'>".$phone[$i]."</option>";
									}
									echo "</select></label>";
					?></p>
					<p>NEW PHONE-NO		<INPUT TYPE='tel' name="ph" id="ph" style="position:relative;left:27%;"></p>
					<br><br><p><input type="submit" value="UPDATE" style="position:relative;left:35%;height:3%;width:12%;"></p></br></br><br></br>
				</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>