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
				<a href="index">Home</a>
				<a href="stefanus" class="active">Stefanus</a>
				<a href="hafidza">Hafidza</a>
				<a href="adit">Adit</a>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			    <i class="fa fa-bars">=</i>
  			</a>
			</div>
		</div>
	</div>
	<div class="label">ABOUT ME</div>
	<?php
		function tgl_indo($tanggal){
			$bulan = array (
			1 =>'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			$pecahkan = explode('-', $tanggal);

			// variabel pecahkan 0 = tanggal
			// variabel pecahkan 1 = bulan
			// variabel pecahkan 2 = tahun

			return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
		}
		include 'src/process/connection.php';
		$sql = "SELECT * FROM biodata WHERE id=1";
		$query = mysqli_query($dbconnect, $sql) or die (mysqli_error($dbconnect));
		while($row = mysqli_fetch_array($query)) :
	?>
	<div class="bio">
		<div class="containt">
			<div class="tag">
				<img src="src/img/a1.png">
				<div id="bio">
				<table>
					<tr>
						<td>Nama </td>
						<td>:</td>
						<td><?= $row['nama']; ?></td>
					</tr>
					<tr>
						<td>Tempat/Tanggal Lahir </td>
						<td>:</td>
						<td><?= $row['tmpt_lahir']; ?> / <?= tgl_indo($row['tgl_lahir']); ?></td>
					</tr>
					<tr>
						<td>Alamat </td>
						<td>:</td>
						<td><?= $row['alamat']; ?></td>
					</tr>
					<tr>
						<td>Hobi </td>
						<td>:</td>
						<td><?= $row['hobi']; ?></td>
					</tr>
				</table>
				</div>
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
				<div id="kiri">
					<h4>Programming Skill</h4>
					<canvas id="myCanvas"></canvas>
					<div id="myLegend"></div>
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
				<div id="exp">			
				<?php
					$sql = "SELECT * FROM experience WHERE pemilik=1";
					$query = mysqli_query($dbconnect, $sql) or die (mysqli_error($dbconnect));
					while($row = mysqli_fetch_array($query)) :
				?>
				<h4><?= $row['name']; ?> - <?= $row['organization']; ?></h4>
				<h6><?= $row['start']; ?> - 
					<?php
						if($row['end']=="0000")
							echo "now";
						else
							echo $row['end'];
					?></h6>
				<?php endwhile; ?>
				</div>
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
			$sql = "SELECT * FROM skill WHERE id_orang=1 AND tipe='ps'";
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
