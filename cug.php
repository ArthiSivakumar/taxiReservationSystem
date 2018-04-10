<?php
	include "conn.php";
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	if(!isset($_POST['cugno'])) $Driverno='';
	else $Driverno=$_POST['cugno'];

	if(!isset($_POST['time'])) $time='';
	else $time=$_POST['time'];
	
	$space=' ';
	$colon=':';
	$ss='00';
	
	if(!isset($_POST['doj'])) $doj='';
	else $doj=$_POST['doj'];
	
	if(!isset($_POST['hh'])) $hh='';
	else $hh=$_POST['hh'];
	
	if(!isset($_POST['mm'])) $mm='';
	else{
		$mm=$_POST['mm'];
		$dateofjourney=$doj.$space.$hh.$colon.$mm.$colon.$ss;
	}
	if(!isset($_POST['doj1'])) $doj1='';
	else $doj1=$_POST['doj1'];
	
	if(!isset($_POST['hh1'])) $hh1='';
	else $hh1=$_POST['hh1'];
	
	if(!isset($_POST['mm1'])) $mm1='';
	else{
		$mm1=$_POST['mm1'];
		$endofjourney=$doj1.$space.$hh1.$colon.$mm1.$colon.$ss;
	}
	
	if(!isset($_POST['aord'])) $aord='asc';
	else $aord=$_POST['aord'];

	if(!isset($_POST['daord'])) $daord='asc';
	else $daord=$_POST['daord'];
	
	if(!isset($_POST['noofcug'])) $noofcug='';
	else $noofcug=$_POST['noofcug'];
	
	if(!isset($_POST['time1'])) $time1='';
	else $time1=$_POST['time1'];

	if(!isset($_POST['doj2'])) $doj2='';
	else $doj2=$_POST['doj2'];
	
	if(!isset($_POST['hh2'])) $hh2='';
	else $hh2=$_POST['hh2'];
	
	if(!isset($_POST['mm2'])) $mm2='';
	else{
		$mm2=$_POST['mm2'];
		$dateofjourney1=$doj2.$space.$hh2.$colon.$mm2.$colon.$ss;
	}
	if(!isset($_POST['doj3'])) $doj3='';
	else $doj3=$_POST['doj3'];
	
	if(!isset($_POST['hh3'])) $hh3='';
	else $hh3=$_POST['hh3'];
	
	if(!isset($_POST['mm3'])) $mm3='';
	else{
		$mm3=$_POST['mm3'];
		$endofjourney1=$doj3.$space.$hh3.$colon.$mm3.$colon.$ss;
	}
	if(!isset($_POST['oby'])) $oby='n';
	else $oby=$_POST['oby'];
	$root=99;
	if($time=="hourly"){
		$root=1;
		$query="CALL DriverHourly('$Driverno','$aord','$daord')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="daily"){
		$root=1;
		$query="CALL DriverDaily('$Driverno','$aord','$daord')";
		$result=mysql_query($query) or die(mysql_error());
	}
	 if($time=="weekly"){
		$root=1;
		$query="CALL DriverWeekly('$Driverno','$aord','$daord')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="monthly"){
		$root=1;
		$query="CALL DriverMonthly('$Driverno','$aord','$daord')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="yearly"){
		$root=1;
		$query="CALL DriverYearly('$Driverno','$aord','$daord')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="none"){
		if($dateofjourney!="" and $endofjourney!=""){
			$root=1;
			$query="CALL DriverRange('$Driverno','$dateofjourney','$endofjourney','$aord','$daord')";
			$result=mysql_query($query) or die(mysql_error());
		}
	}
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Driver REPORTS</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="layout.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<script>
function bb(){
	window.location.href='Driverreports.php';
}
</script>
<body>
			<button type="button" style="position:relative;height:5%;width:5%;float:center;" onclick="bb()">BACK</button>
			<br/><br/><br/><br/><br/><br/><center><h1>YOUR TAXI PLACE</h1></center><br/><br/>
			<br/>
			<b><label style="position:relative;left:45%;font-size:20px;">DRIVER REPORT</label></b>
			<div class="myfont">
			<div>
			<br/><br/><br/>
		<b><label style="position:relative;left:60%;font-size:18px;">REPORT AS ON <?php echo date("d-m-Y") ; echo date(" l");?></div></label>
<br/><br/>	</b>
	<?php		
					if($root==1){
		echo "<center><table border='1'>
		<tr>
		<th>TRAVEL ID</th>
		<th>DATE OF BOOKING</th>
		<th>DATE OF JOURNEY</th>
		<th>END OF JOURNEY</th>
		<th>TRAVEL STATUS</th>
		<th>SOURCE</th>
		<th>DESTINATION</th>
		<th>DISTANCE</th>
		<th>EMAILID</th>
		<th>DRIVER NO</th>
		</tr></center>";
		while($row = mysql_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$row['travel_id']."</td>";
			echo "<td>".$row['date_of_booking']."</td>";
			echo "<td>".$row['date_of_journey']."</td>";
			echo "<td>".$row['end_of_journey']."</td>";
			if($row['travel_status']=='b')
				echo "<td>"."booked"."</td>";
			else
				echo "<td>"."cancelled"."</td>";
			echo "<td>".$row['source']."</td>";
			echo "<td>".$row['destination']."</td>";
			echo "<td>".$row['distance']."</td>";
			echo "<td>".$row['email_id']."</td>";
			echo "<td>".$row['cug_no']."</td>";
			echo "</tr>";
		}	
		echo "</table>";
	}
	$root=2;
	if($noofcug=="Max"){
		echo "<label style='position:relative;left:18%;float:left;font-size:18px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MAXIMUM <br/>";
		if($time1=="hourly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MaxDriverHourly() into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>DRIVER NO : ".$row1['_p1_out']."</b>";	
		}
		if($time1=="weekly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MaxDriverWeekly() into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>DRIVER NO : ".$row1['_p1_out']."</b>";
		}
		if($time1=="yearly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MaxDriverYearly() into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>DRIVER NO : ".$row1['_p1_out']."</b>";
		}
		if($time1=="daily"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MaxDriverDaily() into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>DRIVER NO : ".$row1['_p1_out']."</b>";
		}
		if($time1=="monthly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MaxDriverMonthly() into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>DRIVER NO : ".$row1['_p1_out']."</b>";
		}
		if($time1=="none"){
			if($dateofjourney1!="" and $endofjourney1!=""){
				$root=1;
				$query="CALL MaxDriverRange('$dateofjourney1','$endofjourney1')";
				$result=mysql_query($query) or die(mysql_error());
			}
		}
		 echo "</label>";
	}
	if($noofcug=="Min"){
		echo "<label style='position:relative;left:10%;float:left;font-size:18px'>&nbsp;&nbsp;&nbsp;MINIMUM <br/>";
		if($time1=="hourly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MinDriverHourly() into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>DRIVER NO : ".$row1['_p1_out']."</b>";	
		}
		if($time1=="weekly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT   MinDriverWeekly() into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>DRIVER NO : ".$row1['_p1_out']."</b>";
		}
		if($time1=="yearly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT   MinDriverYearly() into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>DRIVER NO : ".$row1['_p1_out']."</b>";
		}
		if($time1=="daily"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT   MinDriverDaily() into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>DRIVER NO : ".$row1['_p1_out']."</b>";
		}
		if($time1=="monthly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT MinDriverMonthly() into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>DRIVER NO : ".$row1['_p1_out']."</b>";
		}
		if($time1=="none"){
			if($dateofjourney1!="" and $endofjourney1!=""){
				$root=2;
				if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT MinDriverRange('$dateofjourney1','$endofjourney1') into @taxdist")) {
					echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
				}
				if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
					echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
				}
				$row1 = $res2->fetch_assoc();
				echo "<br/><b>DRIVER NO : ".$row1['_p1_out']."</b>";
			}
		}
		echo "</label>";
	}
	if($noofcug=="Max" and $oby=='d'){
		echo "<label style='position:relative;left:10%;float:left;font-size:18px'><br/><br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MAXIMUM BASED ON DISTANCE <br/>";
		if (!$mysqli->query("SET @taxnum = ''") ||!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("CALL MaxDriverDist(@taxnum,@taxdist)")) {
			echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!($res1 = $mysqli->query("SELECT @taxnum as _p_out"))) {
			echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
			echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		$row = $res1->fetch_assoc();
		echo "<label style='position:relative;float:left;left:-1%;font-size:18px';><b>";
		echo "<br/> DRIVER NUMBER :  ".$row['_p_out']."<br>";
		$row1 = $res2->fetch_assoc();
		echo "<br/> DISTANCE      :".$row1['_p1_out']."<br>";
		echo "</b></label>";
	}	
	if($noofcug=="Min" and $oby=='d'){
		echo "<label style='position:relative;left:10%;float:left;font-size:18px'><br/><br/><br/><br/>MINIMUM BASED ON DISTANCE <br/>";
		if (!$mysqli->query("SET @taxnum = ''") ||!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("CALL MinDriverDist(@taxnum,@taxdist)")) {
			echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!($res1 = $mysqli->query("SELECT @taxnum as _p_out"))) {
			echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
			echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		$row = $res1->fetch_assoc();
		echo "<label style='position:relative;float:left;left:0%;font-size:18px';><b>";
		echo "<br/> DRIVER NUMBER :  ".$row['_p_out']."<br>";
		$row1 = $res2->fetch_assoc();
		echo "<br/> DISTANCE      :".$row1['_p1_out']."<br>";
		echo "</b></label>";
	}	
	
?>
		<p><CENTER style="position:relative;left:15%;font-size:20px;float:left;"><br/><br/><br/><br/><br/><br/>LOCALHOST/DBMS/Driver</CENTER></p>
</div>
</body>
</html>