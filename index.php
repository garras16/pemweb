<!DOCTYPE html>
<html>
<head>
	<title>Calister Team</title>
	<link rel="stylesheet" type="text/css" href="src/css/style.css">
</head>
<body>
	<div class="top">
		<div class="containt">
			<h1 class="title">Calister TEAM</h1>
			<div class="nav" id="topnav">
				<a href="/" class="active">Home</a>
				<a href="stefanus">Stefanus</a>
				<a href="hafidza">Hafidza</a>
				<a href="adit">Adit</a>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			    <i class="fa fa-bars">=</i>
  			</a>
			</div>
		</div>
	</div>

	<div id="main">
		<div id="kiri">
			<div class="people">
				<img src="src/img/a1.png">
				<h3>Stefanus Alvin Suanto</h3>
				<h5>Full-Stack Programmer</h5>
			</div>

		</div>
		<div id="tengah">
			<div class="people">
				<img src="src/img/a1.png">
				<h3>Hafidza Anindita Warsito</h3>
				<h5>Front-End Programmer</h5>
			</div>
		</div>
		<div id="kanan">
			<div class="people">
				<img src="src/img/a1.png">
				<h3>Muhammad Aditya Fajriyanto</h3>
				<h5>Back-End Programmer</h5>
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
