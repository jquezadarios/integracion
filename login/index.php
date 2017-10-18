<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>NutriciónUCT</title>
 <link rel="stylesheet" type="text/css" href="../PÁG. NUTRICION/css/materialize.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <script src="js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $(".button-collapse").sideNav();
      $('.materialboxed').materialbox();
    });
  </script>
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
        <div class="card-panel #ec407a pink lighten-1"><p style="color:#ffffff; font-size:30px ">Inicio de sesion.</p></div>
      </div>
 	</div>



<div class="row">
      <div width:800px>
        <div class="card-panel #ec407a pink lighten-1">	
		<center><div class="Ingreso">

	<table>
		<tr>
		<td rowspan=2>
		<form action="validar.php" method="post">

		<table border="0" align="center">

		<tr><td><label style="font-size: 14pt;color:#ffffff; width:30px;" align="center"><b>Correo: </b></label></td>  
			<td width=80> <input class="form-group has-success" style="border-radius:15px;color:#ffffff;" type="text" name="mail" placeholder="Ingresa tu correo"  ></td></tr> </div>
		<tr><td><label style="font-size: 14pt;color:#ffffff;" align="center"><b>Contraseña: </b></label></td>
			<td witdh=80><input style="border-radius:30px; width:300px;color:#ffffff;"  type="password" name="pass" placeholder="Ingresa contraseña"></td></tr>
		<tr><td></td>
			<td width=80 ><input class="btn btn-primary" type="submit" value="Aceptar"></td>
			</tr></tr></table>
		</form>
<br>

<!-- formulario registro -->

<form method="post" action="" >
  <fieldset>
    <legend  style="font-size: 18pt; color:#ffffff;"><b>Registro</b></legend>
    <div class="form-group">
      <label style="font-size: 14pt; color:#ffffff;"><b>Ingresa tu nombre</b></label>
      <input style="color:#ffffff;" type="text" name="nombre" class="form-control" placeholder="Ingresa tu nombre" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color:#ffffff;"><b>Ingresa tu email</b></label>
      <input style="color:#ffffff;"type="text" name="nick" class="form-control"  required placeholder="Ingresa mail"/>
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color:#ffffff;"><b>Ingresa tu Password</b></label>
      <input style="color:#ffffff;" type="password" name="pass" class="form-control"  placeholder="Ingresa contraseña" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color:#ffffff;"><b>Repite tu contraseña</b></label>
      <input  style="color:#ffffff;" type="password" name="rpass" class="form-control" required placeholder="repite contraseña" />
    </div>

<div class="form-group">
      <label style="font-size: 14pt; color:#ffffff;"><b>Ingresa tu peso(kg)</b></label>
      <input style="color:#ffffff;" type="text" name="peso" class="form-control" placeholder="Ingresa tu peso" />
	</div>

<div class="form-group">
      <label style="font-size: 14pt; color:#ffffff;"><b>Ingresa tu altura(m)</b></label>
      <input style="color:#ffffff;" type="text" name="altura" class="form-control" placeholder="Ingresa tu altura" />
	</div>

<div class="form-group">
      <label style="font-size: 14pt; color:#ffffff;"><b>Ingresa tu edad</b></label>
      <input style="color:#ffffff;" type="text" name="edad" class="form-control" placeholder="Ingresa tu edad" />
	</div>
<div class="form-group">
      <input name="sexo" type="radio" id="test1" value="hombre"/>
      <label for="test1" style="color:#ffffff;">Hombre</label>

      <input name="sexo" type="radio" id="test2" value="mujer"/>
      <label for="test2" style="color:#ffffff;">Mujer</label>

</div>
<br>
 <label style="font-size: 14pt; color:#ffffff;"><b>Selecciona tu nivel de actividad:</b></label>
<div class="form-group">
      <input name="act" type="radio" id="prob" value="1"/>
      <label for="prob" style="color:#ffffff;">poca actividad</label>

      <input name="act" type="radio" id="prob2" value="2"/>
      <label for="prob2" style="color:#ffffff;">actividad ligera</label>

	<input name="act" type="radio" id="prob3" value="3"/>
      <label for="prob3" style="color:#ffffff;">actividad moderada</label>

<input name="act" type="radio" id="prob4" value="4"/>
      <label for="prob4" style="color:#ffffff;">activdad intensa</label>

<input name="act" type="radio" id="prob5" value="5"/>
      <label for="prob5" style="color:#ffffff;">actividad extrema</label>

</div>

</form>
</div>
<br>

    <input  class="btn btn-danger" type="submit" name="submit" value="Registrarse"/>

  </fieldset>
</form>
</div>
</table>

 </div>
      </div>
    </div>
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
    <!--lo nuevoooooooooooooooooooooooooooooooooo-->

  </div> 
  
</body>

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
</html>













