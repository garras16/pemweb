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
			<h1 class="title">Calister TEAM - ADMIN PAGE</h1>
			<div class="nav" id="topnav">
				<a href="../index"  class="active">Main</a>
				<a href="1">Stefanus</a>
				<a href="2">Hafidza</a>
				<a href="3">Adit</a>
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
				<input type="submit" name="login" value="LOGIN" id="button" style="margin-top: 25px; width: 260px">
			</form>
		</div>
	</div>
	
	<div id="footer" style="width: 100%; text-align: center; bottom: 0; padding: 0px; font-size: 14px; color: #b9b8b8;margin-top: 20px;">
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
