<?php

	$realname=$_POST['nombre'];
	$mail=$_POST['nick'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];
	$peso=$_POST['peso'];
	$altura=$_POST['altura'];
	$sexo=$_POST['sexo'];
	$alturav = substr($altura,0,1).".".substr($altura,1,3);
	$imc= $peso/($alturav**2);
	$edad=$_POST['edad'];
	$act=$_POST['act'];
	if ($act==1){
		$act=1.2;
}	if ($act==2){
		$act=1.375;
}	if ($act==3){
		$act=1.55;
}	if ($act==4){
		$act=1.725;
}	if ($act==5){
		$act=1.9;
	}
	if ($sexo=="hombre") {
		$cal = (($peso*13.7)+(5*$altura)-(6.8*$edad)+66)*$act ;
		echo $cal;
			}
	else {
		$cal = (($peso*9.6)+(1.8*$altura)-(5*$edad)+655)*$act;
		echo "$cal";
			}





	require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$mail'");
	$check_mail=mysqli_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el mail designado para un usuario, verifique sus datos");</script> ';
			}else{
				
				$pass_encriptada1 = md5 ($pass); //Encriptacion nivel 1
				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO login VALUES('','$realname','$pass_encriptada1','$mail','','2','$peso','$altura','$sexo', '$imc','$edad','$cal')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				
			}
			
		}else{
			echo 'Las contraseñas son incorrectas';
		}

	
?>
