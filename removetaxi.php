<?php
	session_start();
	if(!isset($_SESSION['uname'])){
		include "adminsignin.php";
		exit;
	}
	$user=$_SESSION['uname'];
		include "conn.php";
		$query="SELECT taxi_no FROM taxi";
	$result=mysql_query($query) or die(mysql_error());
	$taxino=array();
	$pi=0;
	while($info = mysql_fetch_array($result)){
		$taxino[$pi]=$info['taxi_no'];
		$pi=$pi+1;
	}
	$pi=$pi-1;
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
		if (x==null || x==""){
			alert("Taxi Number must be filled out");
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
		<h1>WELCOME ADMIN</h1>
	</div>
	<div id="splash"><img src="images/image03.jpg" alt="" /></div>
	<div id="page">
		<div id="column1">
			<div class="box1">
				<h2>YOU ARE ABOUT TO REMOVE A TAXI DETAIL</h2>
				<p>
					<form name="myform1" action="removingtaxiinfo.php" onsubmit="return validateForm()" method="post">
						<p>TAXI NO	:			<?php	$i=0;
									echo "<select name='TaxiNo' id='TaxiNo' style='position:relative;height:3%;width:20%;left:15%'>";
									for($i=0;$i<$pi+1;$i=$i+1){
											echo "<option value='$taxino[$i]'>".$taxino[$i]."</option>";
									}
									echo "</select>";
					?></p><br/>
						<input type="submit" value="Remove" style="position:relative;left:15%;height:4%;width:15%;">
					</form>
				</p>
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
