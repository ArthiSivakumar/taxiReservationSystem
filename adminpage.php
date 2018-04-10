<?php
	if(!isset($_SESSION['uname'])){
		include "admin.html";
		exit;
	}
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>ADMIN</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="layout.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<script>
	function calling1(){		window.location.href="inserttaxi.php";	}
	function calling2(){		window.location.href="updatetaxi.php";	}
	function calling3(){		window.location.href="removetaxi.php";	}
	function calling4(){		window.location.href="insertdriver.php";	}
	function calling5(){		window.location.href="updatedriver.php";	}
	function calling6(){		window.location.href="removedriver.php";	}
</script>
<body>
<div id="navigation">
	<ul>
		<li><a href="adminsignin.php" class="active">ADMIN</a></li>
		<li><a href="taxireports.php">TAXI</a></li>
		<li><a href="driverreports.php">DRIVER</a></li>
		<li><a href="bookreports.php">BOOKING</a></li>
	</ul>
</div>
<div id="content">
	<div id="logo">
		<h1>WELCOME ADMIN</h1>
	</div>
	<div id="splash"><img src="images/image03.jpg" alt="" /></div>
	<div id="page">
		<div id="column1">
			<div class="box1" style="font-family:Arial;font-size:17px">
				<h2>What do you want to do? </h2><br/>
				<font color="#C0C0C0">
					<button onclick=calling1() style="position:relative;height:4%;width:32%;border:0 none;background-color: #C0C0C0;">INSERT TAXI DETAILS</button>
					<button onclick=calling2() style="position:relative;height:4%;width:32%;border:0 none;background-color: #C0C0C0;">UPDATE TAXI DETAILS</button>
					<button onclick=calling3() style="position:relative;height:4%;width:32%;border:0 none;background-color: #C0C0C0;">REMOVE TAXI DETAILS</button><br/><br/>
					<button onclick=calling4() style="position:relative;height:4%;width:32%;border:0 none;background-color: #C0C0C0;">INSERT DRIVER DETAILS</button>
					<button onclick=calling5() style="position:relative;height:4%;width:32%;border:0 none;background-color: #C0C0C0;">UPDATE DRIVER DETAILS</button>
					<button onclick=calling6() style="position:relative;height:4%;width:32%;border:0 none;background-color: #C0C0C0;">REMOVE DRIVER DETAILS</button>			
				</font>
			</div>
		</div>
	</div>
</div>
</body>
</html>
