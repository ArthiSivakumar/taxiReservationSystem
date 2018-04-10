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
	
	if(!isset($_POST['noofbuk'])) $noofbuk='';
	else $noofbuk=$_POST['noofbuk'];
	
	
	
	
	
	
	
	
	$root=99;
	if($time=="hourly"){
		$root=1;
		$query="CALL CusHourly('$aord','$daord','$cbuk')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="daily"){
		$root=1;
		$query="CALL CusDaily('$aord','$daord','$cbuk')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="weekly"){
		$root=1;
		$query="CALL CusWeekly('$aord','$daord','$cbuk')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="monthly"){
		$root=1;
		$query="CALL CusMonthly('$aord','$daord','$cbuk')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="yearly"){
		$root=1;
		$query="CALL CusYearly('$aord','$daord','$cbuk')";
		$result=mysql_query($query) or die(mysql_error());
	}
	if($time=="none"){
		if($dateofjourney!="" and $endofjourney!=""){
			$root=1;
			$query="CALL CusRange('$emailid','$dateofjourney','$endofjourney','$aord','$daord','$cbuk')";
			$result=mysql_query($query) or die(mysql_error());
		}
	}?>
	<label style="postition:relative;left:25%; height:50%;width:12%;font-family:Arial; font-size:20px;">BOOKING/CANCELLATION REPORT</label>
			<div class="myfont">
			<div style="float:right; width:500px; height:25px; line-height:25px; padding-left:3px; font-family:Arial; font-size:20px;">
			REPORT AS ON <?phpecho date("d-m-Y") . "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";echo date("l");?></div>
<br/><br/><br/><br/><br/><br/><br/><br/>	
	<?phpif($root==1){
		echo "asdfghjk";
		echo "<table border='1'>
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
		<th>Cus NO</th>
		</tr>";
		while($row = mysql_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$row['travel_id']."</td>";
			echo "<td>".$row['date_of_booking']."</td>";
			echo "<td>".$row['date_of_journey']."</td>";
			echo "<td>".$row['end_of_journey']."</td>";
			echo "<td>".$row['travel_status']."</td>";
			echo "<td>".$row['source']."</td>";
			echo "<td>".$row['destination']."</td>";
			echo "<td>".$row['distance']."</td>";
			echo "<td>".$row['email_id']."</td>";
			echo "<td>".$row['cug_no']."</td>";
			echo "<td>".$row['Cus_no']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	$root=2;
	if($noofCus=="max"){
		if($time1=="hourly"){
			$root=2;
			$query1="SELECT MaxCusHourly('$cbuk1')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];	
		}
		if($time1=="weekly"){
			$root=2;
			$query1="SELECT MaxCusWeekly('$cbuk1')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];
		}
		if($time1=="yearly"){
			$root=2;
			$query1="SELECT MaxCusYearly('$cbuk1')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];
		}
		if($time1=="daily"){
			$root=2;
			$query1="SELECT MaxCusDaily('$cbuk1')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];	
		}
		if($time1=="monthly"){
			$root=2;
			$query1="SELECT MaxCusMonthly('$cbuk1')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];
		}
		if($time1=="none"){
			if($dateofjourney1!="" and $endofjourney1!=""){
				$root=1;
				$query="CALL MaxCusRange('$dateofjourney1','$endofjourney1','$cbuk1')";
				$result=mysql_query($query) or die(mysql_error());
			}
		}
	}
	if($noofCus=="Min"){
		if($time1=="hourly"){
			$root=2;
			$query1="SELECT MinCusHourly('$cbuk1')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];	
		}
		if($time1=="weekly"){
			$root=2;
			$query1="SELECT MinCusWeekly('$cbuk1')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];
		}
		if($time1=="yearly"){
			$root=2;
			$query1="SELECT MinCusYearly('$cbuk1')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];
		}
		if($time1=="daily"){
			$root=2;
			$query1="SELECT MinCusDaily('$cbuk1')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];	
		}
		if($time1=="monthly"){
			$root=2;
			$query1="SELECT MinCusMonthly('$cbuk1')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];
		}
		if($time=="none"){
			if($dateofjourney1!="" and $endofjourney1!=""){
				$root=1;
				$query="CALL MinCusRange('$dateofjourney1','$endofjourney1','$cbuk1')";
				$result=mysql_query($query) or die(mysql_error());
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