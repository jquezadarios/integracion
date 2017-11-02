<?php 
	if(isset($_POST['s1']) && !empty($_POST['s1'])){

		$numerodieta =$_POST['s1'];

		$db ="academ";
		$host="localhost";
		$pw="";
		$user="root";

		$con = mysql_connect($host,$user,$pw) or die("no se pudo conectar!!");
		mysql_select_db($db,$con) or die("no se conecto!!");
		mysql_query("INSERT INTO sdieta(id_d) values ('$numerodieta')");
		echo "guardado correctamente tu dieta";
		echo "<a href='dieta.html'> volver a menu dieta</a>";
	}
	else
	{
		echo "inserta los datos";
	}
?>