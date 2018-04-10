<?php
/*
	CREATE FUNCTION `MaxHr`() RETURNS INT NOT DETERMINISTIC READS SQL DATA SQL SECURITY DEFINER begin
declare tax int;
	select count(taxi_no) into tax from taxi;
return tax;
end

*/
include "conn.php";
$mysqli = new mysqli("localhost", "root", "", "DBMS");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$query="SELECT MaxHr()";
		$result=mysql_query($query) or die(mysql_error());


while($res=mysql_fetch_array($result))
	echo "maxxxxxx= =  ".$res['MaxHr()'];
	
/*
CREATE PROCEDURE `MAXI`(OUT `maxx` INT) 
begin
select count(taxi_no) into maxx from taxi;
end;
*/
if (!$mysqli->query("SET @maxx = ''") || !$mysqli->query("CALL MAXI(@maxx)")) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!($res1 = $mysqli->query("SELECT @maxx as _p_out"))) {
    echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
echo "<br>";
echo "outtttt"."<br>";
$row = $res1->fetch_assoc();
echo $row['_p_out'];

?>

<?/*DROP FUNCTION IF EXISTS MinTaxiRange;


select MinTaxiRange(str_to_date('07-10-2014 01:00:00','%d-%m-%Y %H:%i:%s'),CURRENT_TIMESTAMP(),'n');
CREATE FUNCTION MinTaxiRange(starttime TIMESTAMP, endtime TIMESTAMP, ac CHAR(1))
RETURNS VARCHAR(15) READS SQL DATA
BEGIN
	DECLARE taxino VARCHAR(15);
	select t.taxi_no into taxino from booking_details b, taxi t where b.travel_status='b' and t.taxi_ac=ac and b.date_of_booking>=starttime and b.date_of_booking<=endtime group by b.taxi_no order by count(*) limit 0,1;
	RETURN taxino;
END*/
?>