<?php
$connect = mysqli_connect("localhost", "root", "", "academ");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM alimentos 
  WHERE Nombre LIKE '%".$search."%'
  
  ";
}
else
{
 $query = "
 SELECT * FROM alimentos ORDER BY ID_A
 ";
}
$result = mysqli_query($connect, $query) ;

if(mysqli_num_rows($result) > 0)
{
 $output .= '

<div class=table-responsive">
  <table class"table table bordered">
  <tr>

    <th> elegir </th>
       
    <th>Nombre</th>

           
    <th>Calorias</th>

           
    <th>Proteinas</th>

           
    <th>  Colesterol</th>


    <th>Grasas_totales</th>


    <th>Sodio</th>


    <th>Carbohidratos</th>

    <th>Azucar</th>

    <th> Vitaminas</th>

  </tr>

    
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '

  <tr>
 <td> 
 <input type="checkbox" name="id" value="'.$row["ID_A"].'" id="'.$row["ID_A"].'"><label for="'.$row["ID_A"].'"></label>
 </td>
   
        
    <td>'.$row["Nombre"].'</td>

        
    <td>'.$row["Calorias"].'</td>

        
    <td>'.$row["Proteinas"].'</td>

        
    <td>'.$row["Colesterol"].'</td>

    <td>'.$row["Grasas_totales"].'</td>

    <td>'.$row["Sodio"].'</td>

    <td>'.$row["Carbohidratos"].'</td>

    <td>'.$row["Azucar"].'</td>

    <td>'.$row["Vitaminas"].'</td>
  </tr>

   
  ';
 }
 echo $output;
}
else
{
 echo 'Alimento no encontrado:(';
}
?>
