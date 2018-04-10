<?php 
session_start();
	if(!isset($_SESSION['uname'])){
		include"index.php";
		exit;
	}
?>
<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	$src=$_POST['source'];
	$dest=$_POST['destination'];
	$dateofjourney=$_POST['doj'];
	$hh=$_POST['hh'];
	$mm=$_POST['mm'];
	$noofp=$_POST['noofpersons'];
	$quote='';
	$ac=$_POST['ac'];
	$l1='http://maps.googleapis.com/maps/api/distancematrix/json?origins=';
//$src=$_POST['source'];
	$l2='&destinations=';
//$dest=$_POST['destination'];
	$l3='&mode=driving&language=en&sensor=false';
	$url=$l1.$src.$l2.$dest.$l3;
	//$url = 'http://maps.googleapis.com/maps/api/distancematrix/json?origins=Chennai&destinations=Peelamedu&mode=driving&language=en&sensor=false';
	$data = file_get_contents($url);
	$data = utf8_decode($data);
	$obj = json_decode($data);
 
function foo($seconds) {
  $t = round($seconds);
  return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
}

$query = $obj->rows[0]->elements[0]->duration->value;
$dist=$obj->rows[0]->elements[0]->distance->value/1000;
	$space=' ';
	$colon=':';
	$ss='00';
	$dateofjourney1=$dateofjourney.$space.$hh.$colon.$mm.$colon.$ss;
	$h=$hh+round(round($query)/3600);
	$m=$mm+round(round($query)/60%60);
	$endofjourney=$dateofjourney.$space.$h.$colon.$m.$colon.$ss;
	
	$emailid=$_SESSION['uname'];
	$cugno='';
	$taxino='';
	$fare=0;
	if($ac=='y') $fare=$dist*25;
	else $fare=$dist*15;
	$fare=$fare*((($noofp-1)/4) + 1);
	setcookie("pfare",$fare);
	setcookie("pdistance",$dist);
	setcookie("pac",$ac);
	setcookie("psource",$src);
	setcookie("pdestination",$dest);
	setcookie("pdistance",$dist);
	setcookie("pdateofjourney",$dateofjourney1);
	setcookie("pendofjourney",$endofjourney);
	setcookie("pnoofp",$noofp);

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
	    <li><a href="signin.php">BACK</a></li>
		<li><a href="feedback.php">FEEDBACK</a></li>
		<li><a href="signout.php">SIGNOUT</a></li>
		<li><a href="updatecustomer.php">UPDATE DETAILS</a></li>
	</ul>
</div>
<div id="content">
	<div id="logo">
		<h1>Your Taxi Place</h1>
	</div>
	<div id="splash"><img src="images/image03.jpg" alt="" /></div>
	<div id="page">
			<div class="box1">
				<br><center style="font-size:20px;">	TICKET CONFIRMATION </center><br>
				<form name="chk" action="ticketdetails.php" method="post">
					<label style="position:relative;left:5%;font-size:18px;">
					<?php
								echo "EMAILID <label style='position:relative;left:25%'>".$emailid."</label><br>";
								echo "DATE OF JOURNEY <label style='position:relative;left:14%'>".$dateofjourney1."</label><br>";
								echo "SOURCE <label style='position:relative;left:24%'>".$src."</label><br>";
								echo "DESTINATION <label style='position:relative;left:19%'>".$dest."</label><br>";
								echo "NO OF PERSONS <label style='position:relative;left:16%'>".$noofp."</label><br>";
								echo "APPROX DISTANCE<label style='position:relative;left:14%'> ".$dist."&nbsp;&nbsp;kilometers</label><br>";
								echo "AC<label style='position:relative;left:30%'> ";
								if($ac==1) echo "YES"; else echo "NO";
								echo "</label><br>";
								echo "FARE<label style='position:relative;left:27%'> Rs.".$fare."</label><br>";
					?></label><br/>
					<input type="submit" id="BOOK" name="BOOK" value="BOOK" style="position:relative;height:5%;width:13%;left:33%"> <input type="submit" id="CANCEL" name="CANCEL" style="position:relative;height:5%;width:13%;left:38%"value="CANCEL">
				</form>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
</body>
</html>