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
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="">Inicio</a></li>
          <li><a href="../Dietas/dieta.html">Dietas</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="">Inicio</a></li>
          <li><a href="../Dietas/dieta.html">Dietas</a></li>
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

<!-- las dieta seleccionada -->
<?php
  $mysqli = new MySQLi("localhost", "root","", "academ");
    if ($mysqli -> connect_errno) {
      die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
        . ") " . $mysqli -> mysqli_connect_error());
    }
    else{}
  $datos =$mysqli->query("SELECT * FROM dieta, sdieta WHERE dieta.id_d=sdieta.id_d");     

?>

<table border="1px">
    <h2>Tu dieta seleccionada</h2>
    <th>lunes</th>
    <th>martes</th>
    <th>miercoles</th>
    <th>jueves</th>
    <th>viernes</th>
    <th>sabado</th>
    <th>domingo</th>
    <th>op1</th>
    <th>op2</th>
  
    <?php while($user = mysqli_fetch_array($datos)){ ?>
    <tr>
      <h3><?php echo $user['nombre_dieta'];?></h3>
      <td><?php echo $user['lunes'];?></td>
      <td><?php echo $user['martes'];?></td>
      <td><?php echo $user['miercoles'];?></td>
      <td><?php echo $user['jueves'];?></td>
      <td><?php echo $user['viernes'];?></td>
      <td><?php echo $user['sabado'];?></td>
      <td><?php echo $user['domingo'];?></td>
      <td><?php echo $user['op1'];?></td>
      <td><?php echo $user['op2'];?></td>
    </tr>
    <?php } ?>
</table>

<!-- hasta aqui -->




		
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
    
if ($row["imc"]<18){

	echo "<p style='font-size:20px;'>estas delgado</p>";
}
if ($row["imc"]>18 and $row["imc"]<=25){
	echo "<p style='font-size:20px;'>tienes un peso normal</p>";
} 
if ($row["imc"]>25 and $row["imc"]<=30){
	echo "<p style='font-size:20px;'>tienes sobrepeso</p>";
}
if ($row["imc"]>30 and $row["imc"]<=35){
	echo "<p style='font-size:20px;'>tienes obesidad 1</p>";
}
if ($row["imc"]>35 and $row["imc"]<=40){
	echo "<p style='font-size:20px;'>tienes obesidad 2</p>";
}
if ($row["imc"]>40){
	echo "<p style='font-size:20px;'>tienes obesidad 3</p>";
}
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
    $total[$número]=$total[$número]+$row["calorias_Dia"];
	} } }
?>



	<div class="row" style="display: inline-block; 	width:600px; ">
         <div class="col s12 m6	" style="width:100%; ">
         <div class="card #ec407a pink lighten-1">
            <div style="height:335px"> <div class="card-content white-text">
              <span class="card-title ">Total calorias consumidas dia.</span>
		<div style=" width:600px; margin-left:-80px"> <canvas id="doughnut-chart" width="500" height="150"></canvas>


</div><?php
$pasaste=$cal-$cals;
if ($pasaste<0) {
	$pasaste=$pasaste*-1;
	echo "<h1 style='font-size:20px;'>haz superado tu limite de calorias diarias por $pasaste</h1>";
	
}

?>
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


<?php
$con=mysqli_connect("localhost", "root","", "academ");
$email=$_SESSION['email'];
$sql="SELECT * FROM seguimiento_usuario,login WHERE login.email='$email' and seguimiento_usuario.id=login.id and fecha=curdate()";
if ($result=mysqli_query($con,$sql))
  {
$totaldiaP=0;
$totaldiaC=0;
$totaldiaG=0;
$totaldiaS=0;
$totaldiaCA=0;
$totaldiaA=0;
$totaldiaV=0;
  while ($row=mysqli_fetch_array($result))
    {
    $totaldiaP=$totaldiaP+$row["Proteinas"];
    $totaldiaC=$totaldiaC+$row["Colesterol"];
    $totaldiaG=$totaldiaG+$row["Grasas_totales"];
    $totaldiaS=$totaldiaS+$row["Sodio"];
    $totaldiaCA=$totaldiaCA+$row["Carbohidratos"];
    $totaldiaA=$totaldiaA+$row["Azucar"];
    $totaldiaV=$totaldiaV+$row["Vitaminas"];
	} }
?>


<?php
$con=mysqli_connect("localhost", "root","", "academ");
$email=$_SESSION['email'];
foreach (range(0, 12, 1) as $número) {
$sql="SELECT * FROM seguimiento_usuario,login WHERE login.email='$email' and seguimiento_usuario.id=login.id and MONTH(fecha)=0$número";
if ($result=mysqli_query($con,$sql))
  {
$totalP[$número]=0;
$totalC[$número]=0;
$totalG[$número]=0;
$totalS[$número]=0;
$totalCA[$número]=0;
$totalA[$número]=0;
$totalV[$número]=0;
  while ($row=mysqli_fetch_array($result))
    {
    $totalP[$número]=$totalP[$número]+$row["Proteinas"];
    $totalC[$número]=$totalC[$número]+$row["Colesterol"];
    $totalG[$número]=$totalG[$número]+$row["Grasas_totales"];
    $totalS[$número]=$totalS[$número]+$row["Sodio"];
    $totalCA[$número]=$totalCA[$número]+$row["Carbohidratos"];
    $totalA[$número]=$totalA[$número]+$row["Azucar"];
    $totalV[$número]=$totalV[$número]+$row["Vitaminas"];
	} } }
	
?>




<div class="row" style="display: inline-block; 	width:560px;">
         <div class="col s12 m6" style="width:100%;">
         <div class="card #ec407a pink lighten-1">
            <div style="height:380px"> <div class="card-content white-text">
              <span class="card-title ">Nutrientes consumidos dia:</span>
<div class="card #ec407a white lighten-1">
	<canvas id="bar-chart" width="800" height="450"></canvas>
</div>
<script>

var totaldiaP = "<?php echo $totaldiaP; ?>";
var totaldiaC = "<?php echo $totaldiaC; ?>";
var totaldiaG = "<?php echo $totaldiaG; ?>";
var totaldiaS = "<?php echo $totaldiaS; ?>";
var totaldiaCA = "<?php echo $totaldiaCA; ?>";
var totaldiaA = "<?php echo $totaldiaA; ?>";
var totaldiaV = "<?php echo $totaldiaV; ?>";

new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
	
    data: {
      labels: ["Proteinas(g)", "Colesterol(mg)", "Grasas_totales(g)", "Sodio(mg)", "Carbohidratos(g)","Azucar(g)","Vitaminas(mg)"],
      datasets: [
        {
          label: "",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [totaldiaP,totaldiaC,totaldiaG,totaldiaS,totaldiaCA,totaldiaA,totaldiaV]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: ''
      }
    }
});

</script>



		<div > </canvas></div>
            </div>
          </div>
        </div>
      </div>
    </div>





<div class="row" style="display: inline-block; 	width:600px;">
         <div class="col s12 m6" style="width:100%;">
         <div class="card #ec407a pink lighten-1">
            <div style="height:380px"> <div class="card-content white-text">
              <span class="card-title ">Nutrientes consumidos mes:</span>
<div class="card #ec407a white lighten-1">
<canvas id="line-chart" width="800" height="420"></canvas>
</div>






<script>
var totalP =  <?php echo json_encode($totalP) ?>;
var totalC =  <?php echo json_encode($totalC) ?>;
var totalG =  <?php echo json_encode($totalG) ?>;
var totalS =  <?php echo json_encode($totalS) ?>;
var totalCA =  <?php echo json_encode($totalCA) ?>;
var totalA =  <?php echo json_encode($totalA) ?>;
var totalV =  <?php echo json_encode($totalV) ?>;

new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ["ENE", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AGOS", "SEP" ,"OCT","NOV","DIC"],
    datasets: [{ 
        data: [totalP[1],totalP[2],totalP[3],totalP[4],totalP[5],totalP[6],totalP[7],totalP[8],totalP[9],totalP[10],totalP[11],totalP[12]],
        label: "Proteinas(g)",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [totalC[1],totalC[2],totalC[3],totalC[4],totalC[5],totalC[6],totalC[7],totalC[8],totalC[9],totalC[10],totalC[11],totalC[12]],
        label: "Colesterol(mg)",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [totalG[1],totalG[2],totalG[3],totalG[4],totalG[5],totalG[6],totalG[7],totalG[8],totalG[9],totalG[10],totalG[11],totalG[12]],
        label: "Grasas_totales(g)",
        borderColor: "#3cba9f",
        fill: false
      }, { 
        data: [totalS[1],totalS[2],totalS[3],totalS[4],totalS[5],totalS[6],totalS[7],totalS[8],totalS[9],totalS[10],totalS[11],totalS[12]],
        label: "Sodio(mg)",
        borderColor: "#e8c3b9",
        fill: false
      }, { 
        data: [totalCA[1],totalCA[2],totalCA[3],totalCA[4],totalCA[5],totalCA[6],totalCA[7],totalCA[8],totalCA[9],totalCA[10],totalCA[11],totalCA[12]],
        label: "Carbohidratos(g)",
        borderColor: "#c45850",
        fill: false
      },  { 
        data: [totalA[1],totalA[2],totalA[3],totalA[4],totalA[5],totalA[6],totalA[7],totalA[8],totalA[9],totalA[10],totalA[11],totalA[12]],
        label: "Azucar(g)",
        borderColor: "#c45850",
        fill: false},
 { 
        data: [totalV[1],totalV[2],totalV[3],totalV[4],totalV[5],totalV[6],totalV[7],totalV[8],totalV[9],totalV[10],totalV[11],totalV[12]],
        label: "Vitaminas(mg)",
        borderColor: "#c45850",
        fill: false}
    ]
  },
  options: {
    title: {
      display: false,
      text: ''
    }
  }
});


</script>










		<div > </canvas></div>
            </div>
          </div>
        </div>
      </div>
    </div>





<!-- insertar alimento -->
      </div>
	</div>
       <div class="container">
        <div class="row">
          <div class="col s12 m20">
           <div class="card #ec407a pink lighten-1">
              <div class="card-content white-text">
   
   <h2 align="center">Busca tu alimento.</h2>
<form method="post" action="">   
<div class="form-group">
    <div class="input-group">
	<h3> buscar: </h3>
     <input style="border-radius:30px; width:300px;color:#ffffff;font-size:15px;" type="text" id="search_text" placeholder="Busca alimentos..." class="form-control" />
     <h3 >cantidad (g): </h3><input style="border-radius:30px; width:300px;color:#ffffff;font-size:15px;" type="text" id="cant" name="cant" placeholder="cantidad:" class="form-control" />
    </div>
<button  class="btn btn-danger" name="submit" type="submit"> elegir </button>
   </div>
   <div id="result"></div>
              </div>

<?php
		if(isset($_POST['submit'])){
			
	$id=$_POST['id'];
	
	if(""==trim($_POST['cant'])){
	$cant=100;
}	else{
	$cant=$_POST['cant'];
}


$con=mysqli_connect("localhost", "root","", "academ");
$email=$_SESSION['email'];
$sql="INSERT INTO seguimiento_usuario VALUES('',((SELECT Calorias FROM alimentos WHERE ID_A='$id')/100)*$cant,(SELECT id FROM login WHERE email='$email'),CURRENT_TIMESTAMP(),((SELECT Proteinas FROM alimentos WHERE ID_A='$id')/100)*$cant,((SELECT Colesterol FROM alimentos WHERE ID_A='$id')/100)*$cant,((SELECT Grasas_totales FROM alimentos WHERE ID_A='$id')/100)*$cant,((SELECT Sodio FROM alimentos WHERE ID_A='$id')/100)*$cant,((SELECT Carbohidratos FROM alimentos WHERE ID_A='$id')/100)*$cant,((SELECT Azucar FROM alimentos WHERE ID_A='$id')/100)*$cant,((SELECT Vitaminas FROM alimentos WHERE ID_A='$id')/100)*$cant)";
mysqli_query($con,$sql);
echo "<script>location.href='nutricion.php';</script>";

;
		}
	?>
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
