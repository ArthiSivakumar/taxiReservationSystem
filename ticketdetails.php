<?php
	$mysqli = new mysqli("localhost", "root", "", "DBMS");
	if ($mysqli->connect_errno) {
		echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
		
		include "bookticket.php";
		exit;
	}
	if(isset($_POST['BOOK'])){
	
		$dateofjourney1=$_COOKIE['pdateofjourney'];
		$endofjourney=$_COOKIE['pendofjourney'];
		$noofp=$_COOKIE['pnoofp'];
		$src=$_COOKIE['psource'];
		$dest=$_COOKIE['pdestination'];
		$dist=$_COOKIE['pdistance'];
		session_start();
		$emailid=$_SESSION['uname'];
		$ac=$_COOKIE['pac'];
		if (!$mysqli->query("DROP PROCEDURE IF EXISTS insertBookingProcedure")){
			echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
			include "bookticket.php";
		}	 
		echo "<br>";
		if (!$mysqli->query("CREATE PROCEDURE insertBookingProcedure(
			dateofjourney  	TIMESTAMP,
			endofjourney		TIMESTAMP,
			noofpersons		INT,
			sourc	VARCHAR(20),
			destination		VARCHAR(20),
			distance		INT,
			emailid		VARCHAR(30),
			ac CHAR(1)
			)
            BEGIN
			DECLARE nooftaxi INT;
			DECLARE cugno VARCHAR(15);
			DECLARE drivcount INT;
			DECLARE taxicount INT;
			DECLARE taxino VARCHAR(15);
			DECLARE msg VARCHAR(255);
			DECLARE bookedtaxi INT;
			SET nooftaxi = ((noofpersons-1)/4) + 1;
			SET bookedtaxi = nooftaxi;
			allot_taxi:LOOP
				IF nooftaxi=0 THEN
					LEAVE allot_taxi;
				END IF;
				SELECT taxi_no,count(*) into taxino,taxicount  FROM taxi WHERE taxi_no in(select taxi_no from taxi where taxi_ac=ac) AND taxi_no NOT IN 
					(SELECT taxi_no FROM `booking_details` WHERE
					travel_status='b' AND (	(date_of_journey<=DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s') AND
											end_of_journey>=DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s')) OR
											(date_of_journey<=DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s') AND
											end_of_journey>=DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s'))
										)
					) LIMIT 0,1;	
				SELECT cug_no,count(*) into cugno,drivcount  FROM driver WHERE cug_no NOT IN 
					(SELECT cug_no FROM `booking_details` WHERE
					travel_status='b' AND (	(date_of_journey<=DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s') AND
											end_of_journey>=DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s')) OR
											(date_of_journey<=DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s') AND
											end_of_journey>=DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s'))
										)
					) LIMIT 0,1;
					
				IF (drivcount = 0 and taxicount!=0) THEN
					insert into test values(null,'NOT ENOUGH DRIVER');
					insert into transaction_error_log values(null,CURRENT_TIMESTAMP(),DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s'),
					DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s'),emailid,'Not enough driver');
					set bookedtaxi = bookedtaxi - 1;
					SET msg = 'Not enough driver';
				SIGNAL sqlstate '45000' SET message_text = msg;
				END IF;
				IF (taxicount = 0 and drivcount!=0) THEN
					insert into test values(null,'NOT ENOUGH TAXI');
					insert into transaction_error_log values(null,CURRENT_TIMESTAMP(),DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s'),
					DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s'),emailid,'Not enough taxi');
					set bookedtaxi = bookedtaxi - 1;
					SET msg = 'Not enough taxi';
					SIGNAL sqlstate '45000' SET message_text = msg;
				END IF;
				if (taxicount=0 and drivcount=0) then
					insert into test values(null,'NOT ENOUGH DRIVER AND TAXI');
					insert into transaction_error_log values(null,CURRENT_TIMESTAMP(),DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s'),
					DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s'),emailid,'Not enough taxi and driver');
					set bookedtaxi = bookedtaxi - 1;
					SET msg = 'Not enough taxi and driver';
					SIGNAL sqlstate '45000' SET message_text = msg;
				end if;
				insert into booking_details values(NULL,CURRENT_TIMESTAMP(),
					DATE_FORMAT(dateofjourney,'%Y-%m-%d %H:%i:%s'),
					DATE_FORMAT(endofjourney,'%Y-%m-%d %H:%i:%s'),'b',sourc,destination,distance,
					emailid,cugno,taxino);
				set nooftaxi = nooftaxi - 1;
			END LOOP;
		END;")) {
				echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
				echo "ghjgyiyfyi";
				include "bookticket.php";
				exit;
				}
				
		if (!$mysqli->query("CALL insertBookingProcedure('$dateofjourney1','$endofjourney','$noofp','$src','$dest',$dist,'$emailid','$ac')")) {
			
			echo "<script type=\"text/javascript\"> alert('$mysqli->error'); </script>";
			//echo "ghjgyiyfyi[poiuy";
			include"conn.php";
			$query="SELECT str from test order by id desc limit 0,1";
			$result=mysql_query($query) or die(mysql_error());
			//echo $result;
			$p=0;
			while($res=mysql_fetch_array($result))
				$p=$res['str'];
			
			if($p!='num'){	
					echo "<script type=\"text/javascript\"> alert($p); </script>";
					$query=("insert into test values(null,'num')");
					$result=mysql_query($query) or die(mysql_error());
					include"bookticket.php";
					exit;
			}
		}
		else{
						include"invoice.php";				
			exit;
		}
	}
	else{
	
		echo "<script type=\"text/javascript\"> alert('booking successful'); </script>";
		include"bookticket1.php";
		exit;
	}
?>


