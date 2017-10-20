<!DOCTYPE html>

<?php
	session_start();
	if (@!$_SESSION['user']) {
		header("Location:../login/index.php");
	}elseif ($_SESSION['rol']==1) {
		header("Location:../login/admin.php");
	}

?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>NutriciónUCT</title>
  <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
  <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>

</head>
<body style="background-color:#F5B7B1;"> 
  <header>
    <nav>
      <div class="nav-wrapper #ec407a pink lighten-1 ">
        <a href="#!" class="brand-logo">Logo</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="">Inicio</a></li>
          <li><a href="">Ayuda</a></li>
          <li><a href="">Dietas</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="">Inicio</a></li>
          <li><a href="">Ayuda</a></li>
          <li><a href="">Dietas</a></li>
        </ul>
      </div>
    </nav>
  </header>
	

  <div class="container">
    <div class="row">
      <div class="col m12">
	<div class="card-content white-text">

        <div class="card-panel #ec407a pink lighten-1">


	<div class="navbar">
  
	<div class="container">
	  		<ul class="nav" color=white>
	
		</ul>
		<form action="#" class="navbar-search form-inline" style="margin-top:6px">
		
		</form>
		<ul >
				<p style='font-size:20px;'> Bienvenido <?php echo $_SESSION['user'];?>
			  <li><a style="font-size:20px;" href="../login/desconectar.php" style='font-size:20px;'> Cerrar sesión </a></li>			 
		</ul>
	 
	</div>
  
</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<div class="row" style="display: inline-block; 	width:560px;">
         <div class="col s12 m6" style="width:100%;">
         <div class="card #ec407a pink lighten-1">
            <div style="height:335px"> <div class="card-content white-text">
              <span class="card-title ">Datos:</span>




		
<?php
$con=mysqli_connect("localhost", "root","", "academ");
$email=$_SESSION['email'];
$sql="SELECT * FROM login WHERE email='$email'";

if ($result=mysqli_query($con,$sql))
  {

  while ($row=mysqli_fetch_array($result))
    { 
    echo "<p style='font-size:20px;'>nombre: ". $row["user"]."</p><br>";
    echo "<p style='font-size:20px;'>peso: ". $row["peso"]." kg</p><br>";
    echo "<p style='font-size:20px;'>altura: ". $row["altura"]. " cm</p><br>"; 
    echo "<p style='font-size:20px;'>imc: ".$row["imc"]." </p><br>";
    $cal=$row["cal"];
    echo "<p style='font-size:20px;'>calorias diarias recomendadas: ".$row["cal"]." </p><br>";
    }

  mysqli_free_result($result);
}

mysqli_close($con);
?> 




	

		<div > </canvas></div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
$con=mysqli_connect("localhost", "root","", "academ");
$email=$_SESSION['email'];
$sql="SELECT * FROM seguimiento_usuario,login WHERE login.email='$email' and seguimiento_usuario.id=login.id and fecha=curdate()";
if ($result=mysqli_query($con,$sql))
  {
$cals=0;
  while ($row=mysqli_fetch_array($result))
    {
    $cals=$cals+$row["calorias_Dia"];
	} }
?>

<?php
$total=[];
$con=mysqli_connect("localhost", "root","", "academ");
$email=$_SESSION['email'];
foreach (range(0, 12, 1) as $número) {
$sql="SELECT * FROM seguimiento_usuario,login WHERE login.email='$email' and seguimiento_usuario.id=login.id and MONTH(fecha)=0$número";
if ($result=mysqli_query($con,$sql))
  {
$total[$número]=0;
  while ($row=mysqli_fetch_array($result))
    {
    $total[$número]=$total[$número]+$row["calorias_Mes"];
	} } }
?>



	<div class="row" style="display: inline-block; 	width:600px; ">
         <div class="col s12 m6	" style="width:100%; ">
         <div class="card #ec407a pink lighten-1">
            <div style="height:335px"> <div class="card-content white-text">
              <span class="card-title ">Total calorias consumidas dia.</span>
		<div style=" width:600px; margin-left:-80px"> <canvas id="doughnut-chart" width="500" height="150"></canvas></div>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>
	<script>
	var cals = "<?php echo $cals; ?>";
	var htmlstring = "<?php echo $cal-$cals; ?>";
	new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Calorias consumidas.",
	       "Maximo de calorias"],
      datasets: [
        {
          label: "",
          backgroundColor: ["#3e95cd",
                            "#8e5ea2"],
          data: [cals,
                 htmlstring]
        }
      ]
    },
    options: {
	legend: {
		labels: {
			fontColor: "#ffffff" } 
	}
    }
});
</script>

<!-- insertar alimento -->
      </div>
	</div>
       <div class="container">
        <div class="row">
          <div class="col s12 m20">
           <div class="card #ec407a pink lighten-1">
              <div class="card-content white-text">
   
   <h2 align="center">Busca tu alimento.</h2>
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Busca:</span>
     <input type="text" name="search_text" id="search_text" placeholder="Busca alimentos..." class="form-control" />
    </div>
   </div>
   <div id="result"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

<!-- grafico circular -->
     
	








<!-- grafico de lineas -->
    <div class="row">
      <div width:800px>
        <div class="card-panel #ec407a pink lighten-1">
          <span class="white-text">Consumo de calorias mensual. 
	  <br>
          <br>
	 </span>
<canvas id="myChart"></canvas>   
        </div>
      </div>
    </div>
        <script>

var mes1 = "<?php echo $total[1]; ?>";
var mes2 = "<?php echo $total[2]; ?>";
var mes3 = "<?php echo $total[3]; ?>";
var mes4 = "<?php echo $total[4]; ?>";
var mes5 = "<?php echo $total[5]; ?>";
var mes6 = "<?php echo $total[6]; ?>";
var mes7 = "<?php echo $total[7]; ?>";
var mes8 = "<?php echo $total[8]; ?>";
var mes9 = "<?php echo $total[9]; ?>";
var mes10 = "<?php echo $total[10]; ?>";
var mes11 = "<?php echo $total[11]; ?>";
var mes12 = "<?php echo $total[12]; ?>";



var ctx = document.getElementById('myChart').getContext("2d")

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["ENE", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AGOS", "SEP" ,"OCT","NOV","DIC"],
        datasets: [{
            label: "Data",
            borderColor: "#80b6f4",
            pointBorderColor: "#80b6f4",
            pointBackgroundColor: "#80b6f4",
            pointHoverBackgroundColor: "#80b6f4",
            pointHoverBorderColor: "#80b6f4",
            pointBorderWidth: 10,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: false,
            borderWidth: 4,
            data: [mes1, mes2, mes3, mes4, mes5, mes6, mes7,mes8,mes9,mes10,mes11,mes12]
        }]
    },
    options: {
        legend: {
            position: "bottom"
        },
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "#ffffff",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 5,
                    padding: 20
                },
                gridLines: {
                    drawTicks: false,
                    display: false
                }

}],
            xAxes: [{
                gridLines: {
                    zeroLineColor: "transparent"

},
                ticks: {
                    padding: 20,
                    fontColor: "#ffffff",
                    fontStyle: "bold"
                }
            }]
        }
    }
});




</script>   



<!-- final de la pagina -->
    <div class="row">

    </div>
	</div>
  </div> 
  <footer class="page-footer teal darken-2">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Para mas Informaión</h5>
                <p class="grey-text text-lighten-4">Puedes contactarnos a las redes sociales como:</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Redes Sociales</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"></a>Facebook/NutriciónUCT</li>
                  <li><a class="grey-text text-lighten-3" href="#!"></a>Instagram/NutriciónUCT</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 5069 Copyright Text
            </div>
          </div>
        </footer>
</body>
</html>
