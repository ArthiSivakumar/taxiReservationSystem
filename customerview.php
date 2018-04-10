<?php 
	session_start();
	if(!isset($_SESSION['uname'])){
		include "bookticket1.php";
		exit;
	}
	include "conn.php";
	$user=$_SESSION['uname'];
    $mysqli = new mysqli("localhost", "root", "", "DBMS");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$query="SELECT date_of_booking,date_of_journey,source,destination,travel_status FROM booking_details where email_id='$user'";
	$result=mysql_query($query) or die(mysql_error());
	$dateofjourney=array();
	$source=array();
	$destination=array();
	$dateofbooking=array();
	$bookingstatus=array();
	$j=0;
	if(mysql_num_rows($result)>0){
		while($info = mysql_fetch_array($result)){
			$dateofbooking[$j]=$info['date_of_booking'];
			$dateofjourney[$j]= $info['date_of_journey'];
			$source[$j]= $info['source'];
			$destination[$j]= $info['destination'];
			$bookingstatus[$j] = $info['travel_status'];
			$j=$j+1;
		}		
		$norow=0;
	}
	else{
		$norow=1;
	}
	$count=$j;
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
		<li><a href="cancelticket.php">CANCELLATION</a></li>
		<li><a href="updatecustomer.php">UPDATE PROFILE</a></li>
		<li><a href="feedback.php">FEEDBACK</a></li>
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
			<div class="box1">
				<center style="font-size:20px;">YOUR HISTORY </center>
					<label style="position:relative;left:20%;font-size:18px;">
					<?php
						$i=0; 
								if($count<1) {
									echo "No history";
								}
								if($norow!=1 && $count!=0){
									echo "<table border='1'>
										<tr>
										<th>DATE OF BOOKING</th>
										<th>DATE OF JOURNEY</th>
										<th>SOURCE</th>
										<th>DESTINATION</th>
										<th>STATUS</th>
										</tr>";
									for($i=0;$i<$count;$i=$i+1){
											echo "<tr>";
											echo "<td>".$dateofbooking[$i]."</td>";
											echo "<td>".$dateofjourney[$i]."</td>";
											echo "<td>".$source[$i]."</td>";
											echo "<td>".$destination[$i]."</td>";
											echo "<td>".$bookingstatus[$i]."</td>";
											echo "</tr>";
									}
								
								}
					?></label>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div></br>
</div>
</body>
</html>