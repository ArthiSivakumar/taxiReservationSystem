<?php
	$distm=0;$distkm=0;$timemin=0;$timesec=0;
	if(isset($_POST['source'])){
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

	$distkm=$obj->rows[0]->elements[0]->distance->text; //km
	$distm=$obj->rows[0]->elements[0]->distance->value; // meters
	$timemin=$obj->rows[0]->elements[0]->duration->text;
	$timesec=$obj->rows[0]->elements[0]->duration->value;
	
	$fare=($distm/1000)*15;
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
<script>
function validateForm(){
	
	var u=document.forms["myform"]["source"].value;
	var p=document.forms["myform"]["dest"].value;
	if (u==null || u==""){
  		alert('Source must be filled');
  		return false;
	}
	if (p==null || p==""){
		alert('Destination must be filled');
  		return false;
	}
  	return true;
  }
</script>
<body>
<div id="navigation">
	<ul><center>
		<li><a href="about.html" class="active">ABOUT US</a></li>
		<li><a href="signin.php">SIGNIN</a></li>
		<li><a href="signup.php">SIGNUP</a></li>
	</center></ul>	
</div>
<div id="content">
	<div id="logo">
		<h1>Your Taxi Place</h1>
	</div>
	<div id="splash"><img src="images/image03.jpg" alt="" /></div>
	<div id="page">
		<div id="column1">
			<div id="myfont">
				<h2><center>DISTANCE & FARE CALCULATION</center></h2>
				<div style="float:center; width:500px; height:25px; line-height:25px; padding-left:3px; font-family:Arial; font-size:18px;">
				<form name="myform" action="" onsubmit="return validateForm()" method="post">
					<p>Source	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <INPUT type="text" 	name="source" 		 id="source" 	size=25 maxlength=30></p>
					<p>Destination	  &nbsp;&nbsp;&nbsp;&nbsp;  <INPUT TYPE="text" 	NAME="dest" 	 id = "dest" 	xml_error_stringsize=25 size=25 maxlength=30></p>						
				<br><center><p><input type="submit"  value="Submit" style="height:25px; float:center; font-family:Arial; font-size:18px;"></p><center></br>
				</form>
				<br><div style="float:left; width:500px; height:25px; line-height:25px; padding-left:3px; font-family:Arial; font-size:18px;">
					<div style="float:left;"><pre>Distance	      : <?php if($distkm!=0) echo $distkm;?></pre></div>
					<br><div style="float:left;"><pre>Approx. driving time  : <?php if($timemin!=0) echo $timemin;?></div>
					<br><div style="float:left;"><pre>Approx. fare	      : <?php if($distkm!=0) echo "RS.".$fare; ?></div>
					<div id="duration" style="float:left; "></div></br>
				</div>		
			</div>
		</div>
		<div id="column2">	
	
	</h3></div>
	
		</div>
		<div id="column2">
			<marquee direction="up" scrollamount="3"><h2>Latest News</h2>
			<p>Festive offer
			20% off on every trip!</p>
			<p>Exclusive for registered users</p>
			<p>Hurry up!</p>
			<p><a href="signup.php" class="more">Click here to register</a></p>
			</marquee>
		</div>
	</div>
	</div>
	<br></br>
</div>
</body>
</html>