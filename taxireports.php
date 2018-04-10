<?php
	session_start();
	if(!isset($_SESSION['uname'])){
		include "admin.html";
		exit;
	}
		$user=$_SESSION['uname'];
		include "conn.php";
		$query="SELECT taxi_no FROM taxi";
	$result=mysql_query($query) or die(mysql_error());
	$taxino=array();
	$pi=0;
	while($info = mysql_fetch_array($result)){
		$taxino[$pi]=$info['taxi_no'];
		$pi=$pi+1;
	}
	$pi=$pi-1;
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>ADMIN</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="layout.css" rel="stylesheet" type="text/css" media="screen" />
</head> 
<body>
<div id="navigation">
	<ul>
		<li><a href="adminsignin.php" class="active">ADMIN</a></li>
		<li><a href="taxireports.php">TAXI REPORTS</a></li>
		<li><a href="driverreports.php">DRIVER REPORTS</a></li>
		<li><a href="bookreports.php">BOOKING REPORTS</a></li>
	</ul>
</div>
<div id="content">
		
	<div id="page">
		<div id="column1" style="font-size:18px";>
		<h1><center>WELCOME ADMIN</center></h1>
<form name="myform1" action="taxi.php"  method="post" style="position:relative;font-fammily:Arial;font-size:15px;">
<p>TAXI NO	:			<?php	$i=0;
									echo "<select name='taxino' id='taxino' style='position:relative;height:3%;width:20%;left:25%'>";
									echo "<option value='all'>".All."</option>";
									for($i=0;$i<$pi+1;$i=$i+1){
											echo "<option value='$taxino[$i]'>".$taxino[$i]."</option>";
									}
									
									echo "</select>";
					?></p>
<br/>					
TIMING	:	<select name="time" id="time" style="position:relative;height:3%;width:20%;left:26%">
						<option value="none">None</option>
						<option value="hourly">Hourly</option>
						<option value="daily">Daily</option>
						<option value="weekly">Weekly</option>
						<option value="monthly">Monthly</option>
						<option value="yearly">Yearly</option>
					</select><br/><br/>
					START DATE	: <INPUT TYPE="date" NAME="doj" id = "doj" 	size=25 maxlength=15 style="position:relative;height:4%;width:25%;left:19%">
					<select name="hh" id="hh" style=";position:relative;height:4%;width:15%;left:22%">
											<option value>hh</option>
											<option value="00">00</option><option value="01">01</option>
											<option value="02">02</option><option value="03">03</option>
											<option value="04">04</option><option value="05">05</option>
											<option value="06">06</option><option value="07">07</option>
											<option value="08">08</option><option value="09">09</option>
											<option value="10">10</option><option value="11">11</option><option value="12">12</option>
											<option value="13">13</option><option value="14">14</option>
											<option value="15">15</option><option value="16">16</option>
											<option value="17">17</option><option value="18">18</option><option value="19">19</option>
											<option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
											</select>
										<select name="mm" id="mm" style="width:50px;position:relative;height:4%;width:15%;left:25%">
											<option value>mm</option>
											<option value="00">00</option>
											<option value="01">01</option><option value="02">02</option>
											<option value="03">03</option><option value="04">04</option><option value="05">05</option>
											<option value="06">06</option><option value="07">07</option><option value="08">08</option>
											<option value="09">09</option><option value="10">10</option><option value="11">11</option>
											<option value="12">12</option><option value="13">13</option><option value="14">14</option>
											<option value="15">15</option><option value="16">16</option><option value="17">17</option>
											<option value="18">18</option><option value="19">19</option><option value="20">20</option>
											<option value="21">21</option><option value="22">22</option><option value="23">23</option>
											<option value="24">24</option><option value="25">25</option><option value="26">26</option>
											<option value="27">27</option><option value="28">28</option><option value="29">29</option>
											<option value="30">30</option><option value="31">31</option><option value="32">32</option>
											<option value="33">33</option><option value="34">34</option><option value="35">35</option>
											<option value="36">36</option><option value="37">37</option><option value="38">38</option>
											<option value="39">39</option><option value="40">40</option><option value="41">41</option>
											<option value="42">42</option><option value="43">43</option><option value="44">44</option>											
											<option value="45">45</option><option value="46">46</option><option value="47">47</option>
									        <option value="48">48</option><option value="49">49</option><option value="50">50</option>
											<option value="51">51</option><option value="52">52</option><option value="53">53</option>
											<option value="54">54</option><option value="55">55</option><option value="56">56</option>
											<option value="57">57</option><option value="58">58</option><option value="59">59</option></select><br/>
<br/>
					END DATE	:      <INPUT TYPE="date" 	NAME="doj1" 	 id = "doj1" 	size=25 maxlength=15 style="position:relative;height:4%;width:25%;left:22%">
					<select name="hh1" id="hh1" style="position:relative;height:4%;width:15%;left:25%">
											<option value>hh</option>
											<option value="00">00</option><option value="01">01</option>
											<option value="02">02</option><option value="03">03</option>
											<option value="04">04</option><option value="05">05</option>
											<option value="06">06</option><option value="07">07</option>
											<option value="08">08</option><option value="09">09</option>
											<option value="10">10</option><option value="11">11</option><option value="12">12</option>
											<option value="13">13</option><option value="14">14</option>
											<option value="15">15</option><option value="16">16</option>
											<option value="17">17</option><option value="18">18</option><option value="19">19</option>
											<option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
											</select>
										<select name="mm1" id="mm1" style="position:relative;height:4%;width:15%;left:28%">
											<option value>MM</option>
											<option value="00">00</option>
											<option value="01">01</option><option value="02">02</option>
											<option value="03">03</option><option value="04">04</option><option value="05">05</option>
											<option value="06">06</option><option value="07">07</option><option value="08">08</option>
											<option value="09">09</option><option value="10">10</option><option value="11">11</option>
											<option value="12">12</option><option value="13">13</option><option value="14">14</option>
											<option value="15">15</option><option value="16">16</option><option value="17">17</option>
											<option value="18">18</option><option value="19">19</option><option value="20">20</option>
											<option value="21">21</option><option value="22">22</option><option value="23">23</option>
											<option value="24">24</option><option value="25">25</option><option value="26">26</option>
											<option value="27">27</option><option value="28">28</option><option value="29">29</option>
											<option value="30">30</option><option value="31">31</option><option value="32">32</option>
											<option value="33">33</option><option value="34">34</option><option value="35">35</option>
											<option value="36">36</option><option value="37">37</option><option value="38">38</option>
											<option value="39">39</option><option value="40">40</option><option value="41">41</option>
											<option value="42">42</option><option value="43">43</option><option value="44">44</option>											
											<option value="45">45</option><option value="46">46</option><option value="47">47</option>
									        <option value="48">48</option><option value="49">49</option><option value="50">50</option>
											<option value="51">51</option><option value="52">52</option><option value="53">53</option>
											<option value="54">54</option><option value="55">55</option><option value="56">56</option>
											<option value="57">57</option><option value="58">58</option><option value="59">59</option></select><br/><br/>	
				ORDER BY <br/> 	
				<p style="position:relative;height:3%;width:100%;left:15%">		DATE OF JOURNEY 
								<input type="radio" name="aord" id="aord" value="asc" style="position:relative;left:13%"><label style="position:relative;left:15%">Ascending</label>
								<input type="radio" name="aord" id="aord" value="desc" style="position:relative;left:20%"><label style="position:relative;left:22%">Descending </label>
				</p>
						<p style="position:relative;height:3%;width:100%;left:15%">		DISTANCE
								<input type="radio" name="daord" id="daord" value="asc"style="position:relative;left:24%"><label style="position:relative;left:26%">Ascending</label>
								<input type="radio" name="daord" id="daord" value="desc" style="position:relative;left:31%"><label style="position:relative;left:33%">Descending </label>
						</p>
				<br/>	
				NUMBER OF TAXIS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="nooftaxi" id="nooftaxi" value="max">&nbsp;&nbsp;&nbsp; MAX &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="nooftaxi" id="nooftaxi" value="min">&nbsp;&nbsp;&nbsp; MIN			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="time1" id="time1">
						<option value="none">None</option>
						<option value="hourly">Hourly</option>
						<option value="daily">Daily</option>
						<option value="weekly">Weekly</option>
						<option value="monthly">Monthly</option>
						<option value="yearly">Yearly</option>
					</select>
					<br/><br/>START DATE	: <INPUT TYPE="date" 	NAME="doj2" 	 id = "doj2" 	size=25 maxlength=15 style="position:relative;height:4%;width:25%;left:19%">
					<select name="hh2" id="hh2" style="width:50px;position:relative;height:4%;width:15%;left:22%">
											<option value>hh</option>
											<option value="00">00</option><option value="01">01</option>
											<option value="02">02</option><option value="03">03</option>
											<option value="04">04</option><option value="05">05</option>
											<option value="06">06</option><option value="07">07</option>
											<option value="08">08</option><option value="09">09</option>
											<option value="10">10</option><option value="11">11</option><option value="12">12</option>
											<option value="13">13</option><option value="14">14</option>
											<option value="15">15</option><option value="16">16</option>
											<option value="17">17</option><option value="18">18</option><option value="19">19</option>
											<option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
											</select>
										<select name="mm2" id="mm2" style="width:50px;position:relative;height:4%;width:15%;left:25%">
											<option value>mm</option>
											<option value="00">00</option>
											<option value="01">01</option><option value="02">02</option>
											<option value="03">03</option><option value="04">04</option><option value="05">05</option>
											<option value="06">06</option><option value="07">07</option><option value="08">08</option>
											<option value="09">09</option><option value="10">10</option><option value="11">11</option>
											<option value="12">12</option><option value="13">13</option><option value="14">14</option>
											<option value="15">15</option><option value="16">16</option><option value="17">17</option>
											<option value="18">18</option><option value="19">19</option><option value="20">20</option>
											<option value="21">21</option><option value="22">22</option><option value="23">23</option>
											<option value="24">24</option><option value="25">25</option><option value="26">26</option>
											<option value="27">27</option><option value="28">28</option><option value="29">29</option>
											<option value="30">30</option><option value="31">31</option><option value="32">32</option>
											<option value="33">33</option><option value="34">34</option><option value="35">35</option>
											<option value="36">36</option><option value="37">37</option><option value="38">38</option>
											<option value="39">39</option><option value="40">40</option><option value="41">41</option>
											<option value="42">42</option><option value="43">43</option><option value="44">44</option>											
											<option value="45">45</option><option value="46">46</option><option value="47">47</option>
									        <option value="48">48</option><option value="49">49</option><option value="50">50</option>
											<option value="51">51</option><option value="52">52</option><option value="53">53</option>
											<option value="54">54</option><option value="55">55</option><option value="56">56</option>
											<option value="57">57</option><option value="58">58</option><option value="59">59</option></select><br/>
<br/>
					END DATE	:      <INPUT TYPE="date" 	NAME="doj3" 	 id = "doj3" 	size=25 maxlength=15 style="position:relative;height:4%;width:25%;left:22%">
					<select name="hh3" id="hh3" style="width:50px;position:relative;height:4%;width:15%;left:25%">
											<option value>hh</option>
											<option value="00">00</option><option value="01">01</option>
											<option value="02">02</option><option value="03">03</option>
											<option value="04">04</option><option value="05">05</option>
											<option value="06">06</option><option value="07">07</option>
											<option value="08">08</option><option value="09">09</option>
											<option value="10">10</option><option value="11">11</option><option value="12">12</option>
											<option value="13">13</option><option value="14">14</option>
											<option value="15">15</option><option value="16">16</option>
											<option value="17">17</option><option value="18">18</option><option value="19">19</option>
											<option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
											</select>
										<select name="mm3" id="mm3" style="width:50px;position:relative;height:4%;width:15%;left:28%">
											<option value>mm</option>
											<option value="00">00</option>
											<option value="01">01</option><option value="02">02</option>
											<option value="03">03</option><option value="04">04</option><option value="05">05</option>
											<option value="06">06</option><option value="07">07</option><option value="08">08</option>
											<option value="09">09</option><option value="10">10</option><option value="11">11</option>
											<option value="12">12</option><option value="13">13</option><option value="14">14</option>
											<option value="15">15</option><option value="16">16</option><option value="17">17</option>
											<option value="18">18</option><option value="19">19</option><option value="20">20</option>
											<option value="21">21</option><option value="22">22</option><option value="23">23</option>
											<option value="24">24</option><option value="25">25</option><option value="26">26</option>
											<option value="27">27</option><option value="28">28</option><option value="29">29</option>
											<option value="30">30</option><option value="31">31</option><option value="32">32</option>
											<option value="33">33</option><option value="34">34</option><option value="35">35</option>
											<option value="36">36</option><option value="37">37</option><option value="38">38</option>
											<option value="39">39</option><option value="40">40</option><option value="41">41</option>
											<option value="42">42</option><option value="43">43</option><option value="44">44</option>											
											<option value="45">45</option><option value="46">46</option><option value="47">47</option>
									        <option value="48">48</option><option value="49">49</option><option value="50">50</option>
											<option value="51">51</option><option value="52">52</option><option value="53">53</option>
											<option value="54">54</option><option value="55">55</option><option value="56">56</option>
											<option value="57">57</option><option value="58">58</option><option value="59">59</option></select><br/><br/>	
				<br/>
				ORDER BY <br/> 	
								<input type="radio" name="oby" id="oby" value="t" style="position:relative;left:37%"><label style="position:relative;left:39%">NUMBER OF TRIPS</label>
								<input type="radio" name="oby" id="oby" value="d"style="position:relative;left:44%"><label style="position:relative;left:46%">DISTANCE</label>
				<br/>
				<br/>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="ac" id="ac" value="y">&nbsp;&nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="ac" id="ac" value="n">&nbsp;&nbsp;No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="ac" id="ac" value="b">&nbsp;&nbsp;Both </br>
				
				
				<br><input type="submit" value="Submit" style="position:relative;height:5%;width:13%;left:45%"> </br>
					</form>
			
		</div>
	</div>
</div>
</body>
</html>
