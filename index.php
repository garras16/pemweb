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
				<a href="index.php" class="active">Home</a>
				<a href="stefanus.php">Stefanus</a>
				<a href="#hafidza">Hafidza</a>
				<a href="#adit">Adit</a>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			    <i class="fa fa-bars">=</i>
  			</a>
			</div>
		</div>
	</div>

	<div id="footer">
		&copyCopyright 2018. CalisterTEAM
	</div>
	<script>
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
