<?php 
	session_start();
	if(!isset($_SESSION['uname'])){
		include "driversignin.php";
		exit;
	}
	include "conn.php";
	$user=$_SESSION['uname'];
    $mysqli = new mysqli("localhost", "root", "", "DBMS");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$query="SELECT date_of_journey,source,destination FROM booking_details where cug_no='$user' and date_of_journey >=CURRENT_TIMESTAMP();";
	$result=mysql_query($query) or die(mysql_error());
	$dateofjourney=array();
	$source=array();
	$destination=array();
	if(mysql_num_rows($result)>0){
		$j=0;
		while($info = mysql_fetch_array($result)){
			$dateofjourney[$j]= $info['date_of_journey'];
			$source[$j]= $info['source'];
			$destination[$j]= $info['destination'];
			$j=$j+1;
		}		
		$norow=0;
	}
	else{
		$norow=1;
	}
	$count=$j-1;
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
				<center style="font-size:20px;">YOUR SCHEDULE </center><br/>
					<label style="position:relative;left:5%;font-size:18px;">
					<?php
						$i=0; 
								if($norow!=1){
									echo "<table border='1'>
										<tr>
										<th>DATE OF JOURNEY</th>
										<th>SOURCE</th>
										<th>DESTINATION</th>	
										</tr>";
									for($i=0;$i<$count;$i=$i+1){
											echo "<tr>";
											echo "<td>".$dateofjourney[$i]."</td>";
											echo "<td>".$source[$i]."</td>";
											echo "<td>".$destination[$i]."</td>";
											echo "</tr>";
									}
								}
								
					?></label><br/>
		</div>
	</div></div>
	<div style="clear: both;">&nbsp;</div>
</div>
</body>
</html>