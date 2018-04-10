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
	<ul><center>
		<li><a href="about.html" class="active">About Us</a></li>
	
		<li><a href="bookticket.php">BOOKING</a></li>
		<li><a href="cancelticket.php">CANCELLATION</a></li>
		<li><a href="signout.php">SIGNOUT</a></li>
	</center></ul>	
</div>
<div id="content">
	<div id="logo">
		<h1>Your Taxi Place</h1>
	</div>
	<div id="splash"><img src="images/image03.jpg" alt="" /></div>
	<div id="page">
		<div id="column1">
			<div class="box1">
				<h2>DISTANCE CALCULATION</h2>
				<form name="myform" action="#" onsubmit="return validateForm()" method="post">
					<p>SOURCE			: <INPUT type="text" 	name="source" 		 id="source" 	size=25 maxlength=30></p>
					<p>DESTINATION		: <INPUT TYPE="text" 	NAME="dest" 	 id = "dest" 	size=25 maxlength=15></p>						
					<p><input type="submit" value="Submit"></p>			
		<input type="hidden" name="travel_distance" value="" id="travel_distance"/>
        <input type="hidden" name="travel_duration" value="" id="travel_duration"/>
        <input type="hidden" name="travel_fare" value="" id="travel_fare"/>
        <input type="hidden" name="customer_id" value="" />					
				<p>&nbsp;</p>
			</div>
		</div>
		<div id="column2">
			<h2>Latest News</h2>
			<p>Nunc euismod, felis et adipiscing volutpat, mauris ligula lacinia lacus ac accumsan pede lacus sed nulla.</p>
			<p><a href="#" class="more">Read More</a> </p>
			<p>Nunc euismod, felis et adipiscing volutpat, mauris ligula lacinia lacus ac accumsan pede lacus sed nulla.</p>
			<p><a href="#" class="more">Read More</a> </p>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
<<div id="footer">
	<div id="footer-content">
		<div id="box1" class="box">
			<h2>Company Archives</h2>
			<ul>
				<li><a href="#"></a><a href="#">Nec metus sed donec</a></li>
				<li><a href="#">Magna lacus bibendum mauris</a></li>
				<li><a href="#">Velit semper nisi molestie</a></li>
				<li><a href="#">Eget tempor eget nonummy</a></li>
				<li><a href="#">Nec metus sed donec</a></li>
			</ul>
		</div>
		<div id="box2" class="box">
			<h2>Links To Others</h2>
			<ul>
				<li><a href="#"></a><a href="#">Nec metus sed donec</a></li>
				<li><a href="#">Magna lacus bibendum mauris</a></li>
				<li><a href="#">Velit semper nisi molestie</a></li>
				<li><a href="#">Eget tempor eget nonummy</a></li>
				<li><a href="#">Nec metus sed donec</a></li>
			</ul>
		</div>
		<div id="box3" class="box">
			<h2>Upcoming Events </h2>
			<ul>
				<li><a href="#"></a><a href="#">Nec metus sed donec</a></li>
				<li><a href="#">Magna lacus bibendum mauris</a></li>
				<li><a href="#">Velit semper nisi molestie</a></li>
				<li><a href="#">Eget tempor eget nonummy</a></li>
				<li><a href="#">Nec metus sed donec</a></li>
			</ul>
		</div>
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>
</body>
</html>
<?php

$quote='';
$l1='http://maps.googleapis.com/maps/api/distancematrix/json?origins=';
$src=$_POST['source'];
$l2='&destinations=';
$dest=$_POST['dest'];
$l3='&mode=driving&language=en&sensor=false';
$url=$l1.$src.$l2.$dest.$l3;

$data = file_get_contents($url);
$data = utf8_decode($data);
$obj = json_decode($data);

echo($obj->rows[0]->elements[0]->distance->text)."<br>"; //km
echo($obj->rows[0]->elements[0]->distance->value)."<br>"; // meters
echo($obj->rows[0]->elements[0]->duration->text)."<br>";
echo($obj->rows[0]->elements[0]->duration->value)."<br>";

?>