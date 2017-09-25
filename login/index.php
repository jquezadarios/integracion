<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>NutriciónUCT</title>
  <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body> 
  <header>
    <nav>
      <div class="nav-wrapper">
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
        <div class="card-panel teal">BIENVENIDOS</div>
      </div>
      <div class="col m6">
        <div class="card-panel pink">FORO</div>
      </div>
      <div class="col m6">
        <div class="card-panel pink">ALIMENTACIÓN</div>
      </div>
    </div>
<center><div class="tit"><h2 style="color: #0000FF; ">Inicio de sesión</h2>
		<center><div class="Ingreso">

	<table border="0" align="left" valign="middle">
		<tr>
		<td rowspan=2>
		<form action="validar.php" method="post">

		<table border="0" align="center">

		<tr><td><label style="font-size: 14pt" align="center"><b>Correo: </b></label></td>
			<td width=80> <input class="form-group has-success" style="border-radius:15px;" type="text" name="mail"></td></tr>
		<tr><td><label style="font-size: 14pt" align="center"><b>Contraseña: </b></label></td>
			<td witdh=80><input style="border-radius:15px;" type="password" name="pass"></td></tr>
		<tr><td></td>
			<td width=80 ><input class="btn btn-primary" type="submit" value="Aceptar"></td>
			</tr></tr></table>
		</form>
<br>
<!-- formulario registro -->

<form method="post" action="" >
  <fieldset>
    <legend  style="font-size: 18pt"><b>Registro</b></legend>
    <div class="form-group">
      <label style="font-size: 14pt"><b>Ingresa tu nombre</b></label>
      <input type="text" name="realname" class="form-control" placeholder="Ingresa tu nombre" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt"><b>Ingresa tu email</b></label>
      <input type="text" name="nick" class="form-control"  required placeholder="Ingresa mail"/>
    </div>
    <div class="form-group">
      <label style="font-size: 14pt"><b>Ingresa tu Password</b></label>
      <input type="password" name="pass" class="form-control"  placeholder="Ingresa contraseña" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt"><b>Repite tu contraseña</b></label>
      <input type="password" name="rpass" class="form-control" required placeholder="repite contraseña" />
    </div>
      
    </div>
   
    <input  class="btn btn-danger" type="submit" name="submit" value="Registrarse"/>

  </fieldset>
</form>
</div>
<?php
		if(isset($_POST['submit'])){
			require("registro.php");
		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		</div></center></div></center>
    
    

   
  </div>
  <script>

  </script>
  <script src="js/jquery.js"></script>
  <script src="js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
       $(".button-collapse").sideNav();
    });
  </script>
</body>
</html>












