<?php
	session_start();

	if($_SESSION['status'] != "login") {
		header("location:login.php");
	}
	$my = 1;
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
				<a href="1" class="active">Stefanus</a>
				<a href="2">Adit</a>
				<a href="3">Hafidza</a>
				<a href="src/process/logout">Logout</a>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			    <i class="fa fa-bars">=</i>
  			</a>
			</div>
		</div>
	</div>
	<div class="label">ABOUT ME</div>
	<?php
		include 'src/process/connection.php';
		$sql = "SELECT * FROM biodata WHERE id='$my'";
		$query = mysqli_query($dbconnect, $sql) or die (mysqli_error($dbconnect));
		while($row = mysqli_fetch_array($query)) :
	?>
	<div class="bio">
		<div class="containt">
			<div class="tag">
				<form method="POST" action="src/process/bio.php">
				<img src="src/img/a1.png">
				<div id="bio">
				<table>
					<tr>
						<td>Nama </td>
						<td>:</td>
						<td><input type="text" name="nama" value="<?= $row['nama']; ?>"></td>
					</tr>
					<tr>
						<td>Tempat/Tanggal Lahir </td>
						<td>:</td>
						<td><input type="text" name="tmpt" value="<?= $row['tmpt_lahir']; ?>"> / <input type="text" name="tgl" value="<?= $row['tgl_lahir']; ?>"></td>
					</tr>
					<tr>
						<td>Alamat </td>
						<td>:</td>
						<td><input type="text" name="alamat" value="<?= $row['alamat']; ?>"></td>
					</tr>
					<tr>
						<td>Hobi </td>
						<td>:</td>
						<td><input type="text" name="hobi" value="<?= $row['hobi']; ?>"></td>
					</tr>
					<tr>
						<td>
							<input type="hidden" name="id" value="<?= $my; ?>">
							<input type="submit" name="save" value="Save">
						</td>
					</tr>
				</table>
				</div>
				</form>
			</div>
		</div>
	</div>

	<?php
		endwhile;
	?>

	<div class="label-right">SKILL</div>
	<div class="bio">
		<div class="containt">
			<div class="tag">
				<form method="POST" action="src/process/skill.php">
					<div id="kiri">
						<h4>Programming Skill</h4>
						<canvas id="myCanvas"></canvas>
						<?php
							$sql = "SELECT * FROM skill WHERE tipe='ps' && id_orang='$my'";
							$query = mysqli_query($dbconnect,$sql);

						?>
						<table>
							<tr>
								<td>Skill</td>
								<td>Nilai</td>
							</tr>
							<?php while($data = mysqli_fetch_array($query)) { ?>
							<tr>
								<td><?= $data['nama'] ?></td>
								<td><?= $data['value'] ?></td>
								<td><a href="src/process/delete.php?id=<?= $data['id']; ?>&&orang=<?= $data['id_orang'];?>">X</a></td>
							</tr>
							<?php } ?>
							<form method="POST" action="src/process/skill.php">
							<tr>
								<td><input type="text" name="nama"></td>
								<td><input type="text" name="value"></td>
							</tr>
							<tr>
								<td>
									<input type="submit" name="save" value="Save">
									<input type="hidden" name="pemilik" value="<?= $my; ?>">
									<input type="hidden" name="tipe" value="ps">
								</td>
							</tr>
							</form>
						</table>
					</div>
					<?php include "src/diagram/diagram2.php" ?>
					<?php include 'src/diagram/diagram3.php'; ?>
			</div>
		</div>
	</div>
	<div class="label">EXPERIENCE</div>
	<div class="bio">
		<div class="containt">
			<div class="tag">
				<div id="exp" style="padding: 0px 20px;">
				<?php
					$sql = "SELECT * FROM experience WHERE pemilik='$my'";
					$query = mysqli_query($dbconnect, $sql) or die (mysqli_error($dbconnect));
					while($row = mysqli_fetch_array($query)) :
				?>
				<h4 style="margin: 0px;"><?= $row['name']; ?> - <?= $row['organization']; ?></h4>
				<h6 style="padding-top: 0px; padding-bottom: 0px; margin-top: 0px;"><?= $row['start']; ?> - 
					<?php
							echo '<form action="src/process/exp.php" method="POST"><input type="text" name="akhir" placeholder="'.$row['akhir'].'"><input type="hidden" name="id" value="'.$row['id'].'"><input type="hidden" name="pemilik" value="'.$my.'"></form>';
					?></h6>
				<?php endwhile; ?>

				<form method="POST" action="src/process/experience.php" id="fexp">
					<input type="text" name="name" placeholder="Jabatan"> - <input type="text" name="org" placeholder="Organisasi"><br>
					<input type="text" maxlength="4" name="start" placeholder="Awal Menjabat"> - <input id="date"type="text" name="end" maxlength="4" placeholder="Akhir Menjabat"><br>
					<input type="hidden" name="pemilik" value="1">
					<input type="submit" name="Save" value="Save">
				</form>
				</div>
			</div>
		</div>
	</div>

	<div id="foot" style="width: 100%; text-align: center; bottom: 0; padding: 0px; font-size: 14px; color: #b9b8b8;margin-top: 20px;">
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
	var myCanvas = document.getElementById("myCanvas");
	myCanvas.width = 300;
	myCanvas.height = 300;

	var ctx = myCanvas.getContext("2d");

	function drawLine(ctx, startX, startY, endX, endY){
	    ctx.beginPath();
	    ctx.moveTo(startX,startY);
	    ctx.lineTo(endX,endY);
	    ctx.stroke();
	}
	function drawArc(ctx, centerX, centerY, radius, startAngle, endAngle){
	    ctx.beginPath();
	    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
	    ctx.stroke();
	}

	function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){
	    ctx.fillStyle = color;
	    ctx.beginPath();
	    ctx.moveTo(centerX,centerY);
	    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
	    ctx.closePath();
	    ctx.fill();
	}

	var myVinyls = {
		<?php
			$sql = "SELECT * FROM skill WHERE id_orang='$my' AND tipe='ps'";
			$query = mysqli_query($dbconnect, $sql) or die (mysqli_error($dbconnect));
			while($row = mysqli_fetch_array($query)) :
		?>
	    "<?= $row['nama']; ?>": <?= $row['value']; ?>,
	    <?php
	    	endwhile;
    	?>
		};

	var Piechart = function(options){
	    this.options = options;
	    this.canvas = options.canvas;
	    this.ctx = this.canvas.getContext("2d");
	    this.colors = options.colors;

	    this.draw = function(){
	        var total_value = 0;
	        var color_index = 0;
	        for (var categ in this.options.data){
	            var val = this.options.data[categ];
	            total_value += val;
	        }

	        var start_angle = 0;
	        for (categ in this.options.data){
	            val = this.options.data[categ];
	            var slice_angle = 2 * Math.PI * val / total_value;

	            drawPieSlice(
	                this.ctx,
	                this.canvas.width/2,
	                this.canvas.height/2,
	                Math.min(this.canvas.width/2,this.canvas.height/2),
	                start_angle,
	                start_angle+slice_angle,
	                this.colors[color_index%this.colors.length]
	            );

	            start_angle += slice_angle;
	            color_index++;
	        }

	        //drawing a white circle over the chart
	        //to create the doughnut chart
	        if (this.options.doughnutHoleSize){
						start_angle = 0;
		for (categ in this.options.data){
			val = this.options.data[categ];
			slice_angle = 2 * Math.PI * val / total_value;
			var pieRadius = Math.min(this.canvas.width/2,this.canvas.height/2);
			var labelX = this.canvas.width/2 + (pieRadius / 2) * Math.cos(start_angle + slice_angle/2);
			var labelY = this.canvas.height/2 + (pieRadius / 2) * Math.sin(start_angle + slice_angle/2);

			if (this.options.doughnutHoleSize){
					var offset = (pieRadius * this.options.doughnutHoleSize ) / 2;
					labelX = this.canvas.width/2 + (offset + pieRadius / 2) * Math.cos(start_angle + slice_angle/2);
					labelY = this.canvas.height/2 + (offset + pieRadius / 2) * Math.sin(start_angle + slice_angle/2);
			}

			var labelText = Math.round(100 * val / total_value);
			this.ctx.fillStyle = "white";
			this.ctx.font = "bold 18px Arial";
			this.ctx.fillText(labelText+"%", labelX,labelY);
			start_angle += slice_angle;
		}
							drawPieSlice(
	                this.ctx,
	                this.canvas.width/2,
	                this.canvas.height/2,
	                this.options.doughnutHoleSize * Math.min(this.canvas.width/2,this.canvas.height/2),
	                0,
	                2 * Math.PI,
	                "#FFFFFF"
	            );
	        }
	    }
			if (this.options.legend){
            color_index = 0;
            var legendHTML = "";
            for (categ in this.options.data){
                legendHTML += "<div><span style='display:inline-block;width:20px;background-color:"+this.colors[color_index++]+";'>&nbsp;</span> "+categ+"</div>";
            }
            this.options.legend.innerHTML = legendHTML;
        }

	}

	var myLegend = document.getElementById("myLegend");

	var myDougnutChart = new Piechart(
	    {
	        canvas:myCanvas,
	        data:myVinyls,
	        colors:["#fde23e","#f16e23", "#57d9ff","#937e88"],
	        legend:myLegend,
			doughnutHoleSize:0.5
	    }
	);
	myDougnutChart.draw();
	</script>


</body>
</html>
