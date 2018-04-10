<?php
if($root==1){
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
		<th>TAXI NO</th>
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
			echo "<td>".$row['taxi_no']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	
?>
if($nooftaxi=="Min"){
		if($time1=="hourly"){
			$root=2;
			$query1="SELECT MinTaxiHourly('$ac')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];	
		}
		if($time1=="weekly"){
			$root=2;
			$query1="SELECT MinTaxiWeekly('$ac')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];
		}
		if($time1=="yearly"){
			$root=2;
			$query1="SELECT MinTaxiYearly('$ac')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];
		}
		if($time1=="daily"){
			$root=2;
			$query1="SELECT MinTaxiDaily('$ac')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];	
		}
		if($time1=="monthly"){
			$root=2;
			$query1="SELECT MinTaxiMonthly('$ac')";
			$result1=mysql_query($query1) or die(mysql_error());
			while($res1=mysql_fetch_array($result1))
				echo "TAXU= =  ".$res1[0];
		}
		if($time=="none"){
			if($dateofjourney1!="" and $endofjourney1!=""){
				$root=1;
				$query="CALL MinTaxiRange('$dateofjourney1','$endofjourney1','$ac')";
				$result=mysql_query($query) or die(mysql_error());
			}
		}
	}