<?php 
	if(!isset($_SESSION['uname'])){
		include "index.php";
		exit;
	}
		$dateofjourney1=$_COOKIE['pdateofjourney'];
		$endofjourney=$_COOKIE['pendofjourney'];
		$noofp=$_COOKIE['pnoofp'];
		$src=$_COOKIE['psource'];
		$dest=$_COOKIE['pdestination'];
		$dist=$_COOKIE['pdistance'];
		//session_start();
		$emailid=$_SESSION['uname'];
		$ac=$_COOKIE['pac'];
		$fare=$_COOKIE['pfare'];
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
	    <li><a href="bookticket1.php">BACK</a></li>
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
				<br><center style="font-size:20px;">	BOOKED DETAILS </center><br>
					<label style="position:relative;left:5%;font-size:18px;">
					<?php
								echo "EMAILID <label style='position:relative;left:25%'>".$emailid."</label><br>";
								echo "DATE OF JOURNEY <label style='position:relative;left:14%'>".$dateofjourney1."</label><br>";
								echo "SOURCE <label style='position:relative;left:24%'>".$src."</label><br>";
								echo "DESTINATION <label style='position:relative;left:19%'>".$dest."</label><br>";
								echo "NO OF PERSONS <label style='position:relative;left:16%'>".$noofp."</label><br>";
								echo "APPROX DISTANCE<label style='position:relative;left:14%'> ".$dist."&nbsp;&nbsp;kilometers</label><br>";
								echo "AC<label style='position:relative;left:30%'> ";
								if($ac=='y') echo "YES"; else echo "NO";
								echo "</label><br>";
								echo "FARE<label style='position:relative;left:27%'> Rs.".$fare."</label><br>";
					?></label><br/>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
</body>
</html>