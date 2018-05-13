<div id="kanan">
  <h4>Soft Skill</h4>
  <canvas id="myCanvas3"></canvas>
  <?php
        $my = 1;
        $sql = "SELECT * FROM skill WHERE tipe='ss' AND id_orang='$my'";
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
            <td><a href="src/process/delete.php?id=<?= $data['id']; ?>">X</a></td>
        </tr>
        <?php } ?>
        <form method="POST" action="src/process/skill.php">
        <tr>
            <td><input type="text" name="nama"></td>
            <td><input type="text" name="value"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="save" value="save">
                <input type="hidden" name="pemilik" value="<?= $my; ?>">
                <input type="hidden" name="tipe" value="ss">
            </td>
        </tr>
        </form>
    </table>
</div>
<script>
var myCanvas3 = document.getElementById("myCanvas3");
myCanvas3.width = 300;
myCanvas3.height = 300;

var ctx = myCanvas3.getContext("2d");

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

var myVinyls3 = {
    <?php
        $sql = "SELECT * FROM skill WHERE id_orang='$my' AND tipe='ss'";
        $query = mysqli_query($dbconnect, $sql) or die (mysqli_error($dbconnect));
        while($row = mysqli_fetch_array($query)) :
    ?>
    "<?= strtoupper($row['nama']); ?>": <?= $row['value']; ?>,
    <?php
        endwhile;
    ?>
};

var Piechart3 = function(options){
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

var myLegend3 = document.getElementById("myLegend3");

var myDougnutChart3 = new Piechart3(
    {
        canvas:myCanvas3,
        data:myVinyls3,
        colors:["#fde23e","#f16e23", "#57d9ff","#937e88"],
        legend:myLegend3,
        doughnutHoleSize:0.5
    }
);
myDougnutChart3.draw();
</script>
