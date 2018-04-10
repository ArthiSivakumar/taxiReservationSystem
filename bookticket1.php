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
	<ul>
		<li><a href="updatecustomer.php">UPDATE PROFILE</a></li>
		<li><a href="customerview.php">HISTORY</a></li>
		<li><a href="cancelticket.php">CANCELLATION</a></li>
		<li><a href="feedback.php">FEEDBACK</a></li>
		<li><a href="signout.php">SIGNOUT</a></li>

	</ul>
</div>
<div id="content">
	<div id="logo">
		<h1>Your Taxi Place</h1>
	</div>
	<div id="splash"><img src="images/image03.jpg" alt="" /></div>
	<div id="page">
			<div class="box1" style="float:center; font-size:18px;">
				<form name="myform" action="newbuk.php" onsubmit="return validateForm()" method="post">	
					<label style="position:relative;left:30%">
					<?phpecho "ticket1";?>
					<p>SOURCE			 &nbsp;&nbsp;&nbsp;   <INPUT TYPE="text" 	NAME="source" 	 id = "source" 	size=25 maxlength=15 style="position:relative;left:11%"></p>
					<p>DESTINATION		 &nbsp;&nbsp; <INPUT TYPE="text" 	NAME="destination" 	 id = "destination" 	size=25 maxlength=15 style="position:relative;left:7%"></p>
					<p>NO OF PERSONS	   &nbsp; <INPUT TYPE="number" 	NAME="noofpersons" 	 id = "noofpersons" 	size=25 maxlength=3 style="position:relative;left:4%"></p>
					<p>DATE OF JOURNEY	  <INPUT TYPE="date" 	NAME="doj" 	 id = "doj" 	size=25 maxlength=15 style="position:relative;left:3%"></p>
					<p>TIME OF JOURNEY    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="hh" id="hh" style="width:50px;" style="position:relative;left:18%">
											<option value>hh</option>
											<option value="00">00</option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											</select>
										<select name="mm" id="mm" style="width:50px;">
											<option value>mm</option>
											<option value="00">00</option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
											<option value="32">32</option>
											<option value="33">33</option>
											<option value="34">34</option>
											<option value="35">35</option>
											<option value="36">36</option>
											<option value="37">37</option>
											<option value="38">38</option>
											<option value="39">39</option>
											<option value="40">40</option>
											<option value="41">41</option>
											<option value="42">42</option>
											<option value="43">43</option>											
											<option value="44">44</option>											
											<option value="45">45</option>											
											<option value="46">46</option>
											<option value="47">47</option>
											<option value="48">48</option>
											<option value="49">49</option>
											<option value="50">50</option>
											<option value="51">51</option>
											<option value="52">52</option>
											<option value="53">53</option>
											<option value="54">54</option>
											<option value="55">55</option>
											<option value="56">56</option>
											<option value="57">57</option>
											<option value="58">58</option>
											<option value="59">59</option></select>
										</p>
										
	<p> NEED AC ?
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="ac" id="ac" value="y">Yes
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="ac" id="ac" value="n">No</p>
					<p><center><input type="submit" style="position:relative;height:5%;width:15%;right:28%;"value="Submit"></center></p>
				</label></form>
			</div>
		<div id="column2">
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
</body>
</html>
