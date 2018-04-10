<?php 
    session_start();
	include "conn.php";
	if(!isset($_SESSION['uname'])){
		include "index.php";
		exit;
	}
	$user=$_SESSION['uname'];
    $mysqli = new mysqli("localhost", "root", "", "DBMS");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	echo "<br>";
	if (!$mysqli->query("DROP VIEW IF EXISTS CustomerView")){
		echo "Drop VIEW  failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	if (!$mysqli->query("CREATE VIEW CustomerView(email_id,travel_id,date_of_booking,date_of_journey,source,destination) AS
						SELECT email_id,travel_id,date_of_booking,date_of_journey,source,destination FROM booking_details WHERE travel_status='b';"))
						{
							echo "CREATE VIEW FAIED: (".$mysqli->errno .")".$mysqli->error;
						}
	$query="SELECT travel_id,date_of_booking,date_of_journey,source,destination 
							FROM CustomerView where email_id='$user' and date_of_journey>=CURRENT_TIMESTAMP();";
	$result=mysql_query($query) or die(mysql_error());
	$travelid=array();
	$dateofbooking=array();
	$dateofjourney=array();
	$source=array();
	$destination=array();
	$j=0;
	if(mysql_num_rows($result)>0){
		while($info = mysql_fetch_array($result)){
			$travelid[$j]= $info['travel_id'];
			$dateofbooking[$j]= $info['date_of_booking'];
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
		<li><a href="bookticket1.php">BACK</a></li>
	    <li><a href="customerview.php">HISTORY</a></li>
		<li><a href="updatecustomer.php">UPDATE PROFILE</a></li>
		<li><a href="feedback.php">FEEDBACK</a></li>
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
				<form name="myform" action="cancellingticket.php" onsubmit="return validateForm()" method="post">	
				<?php	$i=0; 
								if($norow==1) {
									echo "<label style='position:relative;left:40%;font-size:23px;%'>";
									echo "No bookings made";
								}
								if($norow!=1 && $count>0){
									echo "<h2><center>Choose the travel id(s) to cancel</center></h2><br></br>";
									echo "<label style='position:relative;left:45%;font-size:18px;%'>";
											echo "<input type='checkbox' name='$i' id='$i' value='$travelid[0]'> $travelid[0]";
									for($i=1;$i<$count;$i=$i+1){
											echo "<br></br>";
											echo "<label style='position:relative;font-size:18px;%'>";
											echo "<input type='checkbox' name='$i' id='$i' value='$travelid[$i]'> $travelid[$i]";
									}
									echo "<label style='position:relative;right:30%;font-size:18px;%'>";
									echo "<table border='1'>
										<tr><center><th>TRAVELID</th><th>DATE OF BOOKING</th><th>DATE OF JOURNEY</th><th>SOURCE</th><th>DESTINATION</th>";	
									for($i=0;$i<$count;$i=$i+1){
											echo "<tr>";
											echo "<td>".$travelid[$i]."</td>";
											echo "<td>".$dateofbooking[$i]."</td>";
											echo "<td>".$dateofjourney[$i]."</td>";
											echo "<td>".$source[$i]."</td>";
											echo "<td>".$destination[$i]."</td>";
											echo "</center></tr>";
											echo "<br>";
											echo "</label>";
											
									}
									echo "<p><input type='submit' value='CANCEL' style='position:relative;left:25%;height:5%;width:13%;'></p><br></br>";
								echo "<input type='hidden' name='count' id='count' value='$count'>";
								}
								
				?>
					
				</form>
			</div>
		</div>
</div>
</body>
</html>