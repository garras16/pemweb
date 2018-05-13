<?php
	session_start();

	if(isset($_SESSION['status'])) {
		header("location:stefanus.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stefanus Alvin Susanto</title>
	<link rel="stylesheet" type="text/css" href="src/css/style.css">
</head>
<body>
	<div class="top">
		<div class="containt">
			<h1 class="title">Calister TEAM</h1>
			<div class="nav" id="topnav">
				<a href="home.php">Home</a>
				<a href="stefanus.php" class="active">Stefanus</a>
				<a href="#contact">Contact</a>
				<a href="#about">About</a>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			    <i class="fa fa-bars">=</i>
  			</a>
			</div>
		</div>
	</div>
	<div class="login">
		<div id="form_login">
			<h2>Login Admin</h2>
			<form method="POST" action="src/process/p_login.php">
				<input type="text" name="username" placeholder="Username"><br>
				<input type="password" name="password" placeholder="Password"><br>
				<input type="submit" name="login" value="LOGIN" id="button" style="margin-top: 20px;">
			</form>
		</div>
	</div>
	
	<div id="footer">
		&copyCopyright 2018. CalisterTEAM
	</div>

	<script type="text/javascript">
		function myFunction() {
		    var x = document.getElementById("topnav");
		    if (x.className === "nav") {
		        x.className += " responsive";
		    } else {
		        x.className = "nav";
		    }
		}
	</script>
</body>
</html>
