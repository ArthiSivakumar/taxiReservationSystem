<?php
	include "conn.php";
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	if(!isset($_POST['cbuk'])) $cbuk='';
	else $cbuk=$_POST['cbuk'];

	if(!isset($_POST['time'])) $time='';
	else $time=$_POST['time'];
	
	$spcbuke=' ';
	$colon=':';
	$ss='00';
	
	if(!isset($_POST['doj'])) $doj='';
	else $doj=$_POST['doj'];
	
	if(!isset($_POST['hh'])) $hh='';
	else $hh=$_POST['hh'];
	
	if(!isset($_POST['mm'])) $mm='';
	else{
		$mm=$_POST['mm'];
		$dateofjourney=$doj.$spcbuke.$hh.$colon.$mm.$colon.$ss;
	}
	if(!isset($_POST['doj1'])) $doj1='';
	else $doj1=$_POST['doj1'];
	
	if(!isset($_POST['hh1'])) $hh1='';
	else $hh1=$_POST['hh1'];
	
	if(!isset($_POST['mm1'])) $mm1='';
	else{
		$mm1=$_POST['mm1'];
		$endofjourney=$doj1.$spcbuke.$hh1.$colon.$mm1.$colon.$ss;
	}
	
	if(!isset($_POST['aord'])) $aord='asc';
	else $aord=$_POST['aord'];

	if(!isset($_POST['daord'])) $daord='asc';
	else $daord=$_POST['daord'];
	
	if(!isset($_POST['noofCus'])) $noofCus='';
	else $noofCus=$_POST['noofCus'];
	
	if(!isset($_POST['time1'])) $time1='';
	else $time1=$_POST['time1'];

	if(!isset($_POST['doj2'])) $doj2='';
	else $doj2=$_POST['doj2'];
	
	if(!isset($_POST['hh2'])) $hh2='';
	else $hh2=$_POST['hh2'];
	
	if(!isset($_POST['mm2'])) $mm2='';
	else{
		$mm2=$_POST['mm2'];
		$dateofjourney1=$doj2.$spcbuke.$hh2.$colon.$mm2.$colon.$ss;
	}
	if(!isset($_POST['doj3'])) $doj3='';
	else $doj3=$_POST['doj3'];
	
	if(!isset($_POST['hh3'])) $hh3='';
	else $hh3=$_POST['hh3'];
	
	if(!isset($_POST['mm3'])) $mm3='';
	else{
		$mm3=$_POST['mm3'];
		$endofjourney1=$doj3.$spcbuke.$hh3.$colon.$mm3.$colon.$ss;
	}
	if(!isset($_POST['cbuk'])) $cbuk='';
	else $cbuk=$_POST['cbuk'];
	$root=99;
	if($time=="hourly"){
		$root=1;
		$query="CALL CusHourly('$cbuk','$aord','$daord')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="daily"){
		$root=1;
		$query="CALL CusDaily('$cbuk','$aord','$daord')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="weekly"){
		$root=1;
		$query="CALL CusWeekly('$cbuk','$aord','$daord')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="monthly"){
		$root=1;
		$query="CALL CusMonthly('$cbuk','$aord','$daord')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="yearly"){
		$root=1;
		$query="CALL CusYearly('$cbuk','$aord','$daord')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="none"){
		if($dateofjourney!="" and $endofjourney!=""){
			$root=1;
			$query="CALL CusRange('$cbuk','$dateofjourney','$endofjourney','$aord','$daord')";
			$result=mysql_query($query) or die(mysql_error());
		}
	}
	
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>BOOKING/CANCELLATION REPORTS</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="layout.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<script>
function bb(){
	window.location.href='bookreports.php';
}
</script>
<body>
			<button type="button" style="position:relative;height:5%;width:5%;float:center;" onclick="bb()">BACK</button>
			</br></br></br></br></br></br><center><label style="postition:relative;left:25%; height:50%;width:12%;font-family:Arial; font-size:20px;">BOOKING/CANCELLATION REPORT</label></center><br/></br>
			<div class="myfont">
			<div style="float:right; width:500px; height:25px; line-height:25px; padding-left:3px; font-family:Arial; font-size:20px;">
			REPORT AS ON <?php echo date("d-m-Y") . "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";echo date("l");?></div>
<br/><br/><br/><br/><br/><br/><br/><br/>	
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
		<th>TAXI NO</th>
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
			echo "<td>".$row['taxi_no']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	$root=2;
	if($noofCus=="max"){
		if($time1=="hourly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MaxCusHourly('$cbuk') into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";
		}
		if($time1=="weekly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MaxCusWeekly('$cbuk') into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";
		}
		if($time1=="yearly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MaxCusYearly('$cbuk') into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";
		}
		if($time1=="daily"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MaxCusDaily('$cbuk') into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";
		}
		if($time1=="monthly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT   MaxCusMonthly('$cbuk') into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";
		}
		if($time1=="none"){
			if($dateofjourney1!="" and $endofjourney1!=""){
				$root=2;
				if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MaxCusRange('$dateofjourney1','$endofjourney1','$cbuk') into @taxdist")) {
					echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
				}
				if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
					echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
				}
				$row1 = $res2->fetch_assoc();
				echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";
			}
		}
	}
	if($noofCus=="Min"){
		if($time1=="hourly"){
			$root=2;
			
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT  MinCusHourly('$cbuk') into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";
		}
		if($time1=="weekly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT    MinCusWeekly('$cbuk') into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";
		}
		if($time1=="yearly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT    MinCusYearly('$cbuk') into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";
		}
		if($time1=="daily"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT MinCusDaily('$cbuk') into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";	
		}
		if($time1=="monthly"){
			$root=2;
			if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT MinCusMonthly('$cbuk') into @taxdist")) {
				echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
				echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			$row1 = $res2->fetch_assoc();
			echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";	
		}
		if($time=="none"){
			if($dateofjourney1!="" and $endofjourney1!=""){
				$root=2;
				if (!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("SELECT MinCusRange('$dateofjourney1','$endofjourney1','$cbuk') into @taxdist")) {
					echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
				}
				if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
					echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
				}
				$row1 = $res2->fetch_assoc();
				echo "<br/><b>CUSTOMER  : ".$row1['_p1_out']."</b>";	
			}
		}
	}
	if($noofCus!=""){
		if (!$mysqli->query("SET @taxnum = ''") ||!$mysqli->query("SET @taxdist = ''") || !$mysqli->query("CALL MaxDist(@taxnum,@taxdist)")) {
			echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!($res1 = $mysqli->query("SELECT @taxnum as _p_out"))) {
			echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!($res2 = $mysqli->query("SELECT @taxdist as _p1_out"))) {
			echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		$row = $res1->fetch_assoc();
		echo $row['_p_out'];
		$row1 = $res2->fetch_assoc();
		echo $row1['_p1_out'];
	}		
?>
																<p><CENTER>LOCALHOST/DBMS/booking</CENTER></p>
</div>
</body>
</html>