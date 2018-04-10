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
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error."<br>";
	}
	echo "<br>";
	if (!$mysqli->query("DROP VIEW IF EXISTS CustomerView")){
		echo "Drop VIEW  failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	if (!$mysqli->query("CREATE VIEW CustomerView(email_id,travel_id,date_of_booking,end_of_journey,date_of_journey,source,destination) AS
						SELECT email_id,travel_id,date_of_booking,date_of_journey,end_of_journey,source,destination FROM booking_details WHERE travel_status='b';"))
						{
							echo "CREATE VIEW FAIED: (".$mysqli->errno .")".$mysqli->error;
						}
	$query="SELECT travel_id,date_of_booking,date_of_journey,end_of_journey,source,destination 
							FROM CustomerView where email_id='$user' and end_of_journey<=CURRENT_TIMESTAMP() and travel_id NOT IN(select travel_id from feedback) order by end_of_journey desc LIMIT 0,1;";
	$result=mysql_query($query) or die(mysql_error());
	$travelid=array();
	$dateofbooking=array();
	$dateofjourney=array();
	$source=array();
	$destination=array();
	$j=0;
	$fb=0;
	if(mysql_num_rows($result)>0){
		$fb=1;
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
<script>
	function validateForm(){
		var x=document.forms["myform"]["dp"].value;
		var y=document.forms["myform"]["tc"].value;
		var z=document.forms["myform"]["jc"].value;
		var a=document.forms["myform"]["cc"].value;
		var b=document.forms["myform"]["bu"].value;
		var c=document.forms["myform"]["nr"].value;
		var d=document.forms["myform"]["use"].value;
		var e=document.forms["myform"]["tc1"].value;
		if (x==null || x=="" ||y==null || y==""||z==null || z==""||a==null || a==""||b==null || b==""||c==null || c==""||d==null || d==""||e==null || e==""){
			alert("Please enter all answers");
			return false;
		}
	return true;
}
</script>
<body>
<div id="navigation">
	<ul>
		<li><a href="bookticket1.php" class="active">BACK</a></li>
		
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
				<h2><center>FEEDBACK</center></h2><br/>
			</div><label style="font-size:18px;">
			<?php echo "<b><label style='position:relative;left:1%;'>TravelID </label>";
				  echo "<label style='position:relative;left:5%;'>DateOfBooking </label>";
				  echo "<label style='position:relative;left:15%;'>DateOfJourney  </label>";
				  echo "<label style='position:relative;left:25%;'>Source </label>";
				  echo "<label style='position:relative;left:31%;'>Destination </label></b>";?>
				  <br/><br/>
			<?php if($fb!=0){echo "<label style='position:relative;left:5%;'>".$travelid[0]."</label>";
							echo "<label style='position:relative;left:14%;'>".$dateofbooking[0]."</label>";
							echo "<label style='position:relative;left:19%;'>".$dateofjourney[0]."</label>";
							echo "<label style='position:relative;left:24%;'>".$source[0]."</label>";
							echo "<label style='position:relative;left:26%;'>".$destination[0]."</label>";
						}
					else {
					echo "<script type=\"text/javascript\"> alert('YOU DONT HAVE ANY RECENT TRAVELS!!'); window.location.href='bookticket1.php';</script>";	
					exit;
						}?>
			<form name="myform" action="insertingfeedback.php" onsubmit="return validateForm()" method="post">
			<p>Was the driver Punctual?<label style="position:relative;left:20%;"><input type="radio" name="dp" id="dp" value="1">&#10025;</label>
										<label style="position:relative;left:25%;"><input type="radio" name="dp" id="dp" value="2">&#10025;&#10025;</label>
										<label style="position:relative;left:30%;"><input type="radio" name="dp" id="dp" value="3">&#10025;&#10025;&#10025;</label></p>
			<p>Was the taxi Comfortable?<label style="position:relative;left:18%;"><input type="radio" name="tc" id="tc" value="1">&#10025;</label>
										 <label style="position:relative;left:23%;"><input type="radio" name="tc" id="tc" value="2">&#10025;&#10025;</label>
										<label style="position:relative;left:28%;"><input type="radio" name="tc" id="tc" value="3">&#10025;&#10025;&#10025;</label></p>
			<p>Was Journey Comfortable?  <label style="position:relative;left:16%;"><input type="radio" name="jc" id="jc" value="1">&#10025;</label>
										 <label style="position:relative;left:21%;"><input type="radio" name="jc" id="jc`" value="2">&#10025;&#10025;</label>
										<label style="position:relative;left:26%;"><input type="radio" name="jc" id="jc" value="3">&#10025;&#10025;&#10025;</label></p>
			<p>Customer care 		<label style="position:relative;left:33%;"><input type="radio" name="cc" id="cc" value="1">&#10025;</label>
								   <label style="position:relative;left:38%;"><input type="radio" name="cc" id="cc" value="2">&#10025;&#10025;</label>
								   <label style="position:relative;left:43%;"><input type="radio" name="cc" id="cc" value="3">&#10025;&#10025;&#10025;</label></p>
			<p>Booking user friendly <label style="position:relative;left:24%;"><input type="radio" name="bu" id="bu" value="1">&#10025;</label>
									<label style="position:relative;left:29%;"><input type="radio" name="bu" id="bu" value="2">&#10025;&#10025;</label>
								<label style="position:relative;left:34%;"><input type="radio" name="bu" id="bu" value="3">&#10025;&#10025;&#10025;</label></p>
			<p>Nominal rates		<label style="position:relative;left:34%;"><input type="radio" name="nr" id="nr" value="1">&#10025;</label>
								   <label style="position:relative;left:39%;"><input type="radio" name="nr" id="nr" value="2">&#10025;&#10025;</label>
								<label style="position:relative;left:44%;"><input type="radio" name="nr" id="nr" value="3">&#10025;&#10025;&#10025;</label></p>
			<p>Taxi cleanliness		<label style="position:relative;left:31%;"><input type="radio" name="tc1" id="tc1" value="1">&#10025;</label>
								  <label style="position:relative;left:36%;"> <input type="radio" name="tc1" id="tc1" value="2">&#10025;&#10025;</label>
								<label style="position:relative;left:41%;"><input type="radio" name="tc1" id="tc1" value="3">&#10025;&#10025;&#10025;</label></p>
			<p>Would you use us again?<label style="position:relative;left:19%;"><input type="radio" name="use" id="use" value="y">Yes</label>
									  <label style="position:relative;left:22%;"><input type="radio" name="use" id="use" value="n">NO</label></p>

			<p>Any other comments?<label style="position:relative;left:23%;"><input type="text" name="com" id="com" style="height:10%; width:35%;"></label></p>
			<input type="hidden" name="tid" id="tid" value="<?php echo $travelid[0];?>">
			<br/>	<center>	<input type="submit" value="SUBMIT" style="height:4%;width:12%;">  </center>
	 		</form></label>
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
</body>
</html>