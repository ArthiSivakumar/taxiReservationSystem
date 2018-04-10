<?php 
	if(!isset($_SESSION['uname'])){
		include "driversignin.php";
		exit;
	}
	$user=$_SESSION['uname'];
    $mysqli = new mysqli("localhost", "root", "", "DBMS");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	echo "<br>";
	if (!$mysqli->query("DROP VIEW IF EXISTS DriverView")){
		echo "Drop VIEW  failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	if (!$mysqli->query("CREATE VIEW DriverView(driver_name,driver_address,cug_no,driver_mobile_no,driver_salary,date_of_joining) AS
						SELECT driver_name,driver_address,cug_no,driver_mobile_no,driver_salary,date_of_joining FROM driver;"))
						{
							echo "CREATE VIEW FAIED: (".$mysqli->errno .")".$mysqli->error;
						}
	$query="SELECT driver_name,driver_address,cug_no,driver_mobile_no,driver_salary,date_of_joining
							FROM DriverView where cug_no='$user'";
	$result=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result)>0){
		while($info = mysql_fetch_array($result)){
			$name= $info['driver_name'];		
			$address= $info['driver_address'];
			$cugno= $info['cug_no'];
			$mobile= $info['driver_mobile_no'];
			$salary= $info['driver_salary'];
			$doj=$info['date_of_joining'];
		}
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
<body>
<div id="navigation">
	<ul>
		<li><a href="driverpage1.php">PROFILE</a></li>
	    <li><a href="driverschedule.php">SCHEDULE</a></li>
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
				<center style="font-size:20px;">YOUR PROFILE </center>
					<label style="position:relative;left:5%;font-size:18px;">
					<?php
								echo "NAME <label style='position:relative;left:25%'>".$name."</label><br>";
								echo "ADDRESS <label style='position:relative;left:19%'>".$address."</label><br>";
								echo "CUG NO <label style='position:relative;left:22%'>".$cugno."</label><br>";
								echo "MOBILE NO <label style='position:relative;left:17%'>".$mobile."</label><br>";
								echo "SALARY <label style='position:relative;left:22%'>".$salary."</label><br>";
								echo "DATE OF JOURNEY <label style='position:relative;left:5%'>".$doj."</label><br>";
					?></label><br/>
		</div>
	</div></div>
	<div style="clear: both;">&nbsp;</div>
</div>
</body>
</html>