<?php
		include "conn.php";
		$query="SELECT cug_no FROM driver";
	$result=mysql_query($query) or die(mysql_error());
	$taxino=array();
	$pi=0;
	while($info = mysql_fetch_array($result)){
		$taxino[$pi]=$info['cug_no'];
		$pi=$pi+1;
	}
	$pi=$pi-1;

?><html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="layout.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<script>
function validateForm(){
	var u=document.forms["myform1"]["Email"].value;
	var p=document.forms["myform1"]["Pass"].value;
	if (u==null || u==""){
  		alert("CUG NO must be filled out");
  		return false;
	}
  	return true;
  }
</script>
<body>
<div id="navigation">
	<ul>
		<li><a href="about.html" class="active">About Us</a></li>
		<li><a href="index.php">HOME</a></li>		
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
				<form name="myform" action="drivercheck.php" onsubmit="return validateForm()" method="post">
					<p>CUG NO	:			<?php	$i=0;
									echo "<select name='Email' id='Email' style='position:relative;height:3%;width:20%;left:25%'>";
									for($i=0;$i<$pi+1;$i=$i+1){
											echo "<option value='$taxino[$i]'>".$taxino[$i]."</option>";
									}
									echo "</select>";
					?></p>						
					<p><input type="submit" value="SUBMIT" style="position:relative;left:18%;height:5%;width:15%"></p>
				</form>
			</div>
		</div>
		<div id="column2">
			
		</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
</body>
</html>
