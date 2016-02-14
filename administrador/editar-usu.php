<?php
    include "plantilla/sesionadmin.php"
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src=""></script>
</head>

<body>
       <h3>EDITAR</h3>
 <div id="center" class="container">

   <?php

   $connection = new mysqli("localhost","root","carolyne","tienda");
   if($connection->connect_errno){
       printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
       exit();

   }

   if(!isset($_POST['envia'])){


   $id=$_GET['id'];
   $consulta=("SELECT * FROM usuarios where codusuario=$id");

    $result=$connection->query($consulta);
    $obj = $result->fetch_object();
    echo "<form method='post' action='#'>";
    echo " <label>Nombre :</label>";
    echo  "<input type='text' name='nombre'  value='$obj->Nombre' class='form-control'>";
    echo "<input type='hidden'name='id' value='$obj->codusuario'> ";
    echo " <label>Apellido:</label>";
    echo "<input type='text' name='apellido'  value='$obj->apellido' class='form-control'>";
    echo " <label>DNI:</label>";
    echo  "<input type='text' name='dni'  value='$obj->dni' class='form-control'>";
    echo " <label>Localidad:</label>";
    echo  "<input type='text' name='localidad'  value='$obj->localidad' class='form-control'>";
    echo " <label>Provincia:</label>";
    echo  "<input type='text' name='provincia'  value='$obj->provincia' class='form-control'>";
    echo " <label>Pais:</label>";
    echo  "<input type='text' name='pais'  value='$obj->pais' class='form-control'>";
    echo " <label>Direccion:</label>";
    echo  "<input type='text' name='direccion'  value='$obj->direccion' class='form-control'>";

    echo "<input type='submit' name='envia' class='btn btn-success' value='Enviar'>";
    echo "</form>";
}else{
$id=$_POST['id'];

$nombre=$_POST['nombre'];

$apellido=$_POST['apellido'];

$dni=$_POST['dni'];
$localidad=$_POST['localidad'];
$provincia=$_POST['provincia'];
$pais=$_POST['pais'];
$direccion=$_POST['direccion'];


$consulta_mysql2="UPDATE usuarios SET codusuario='.$id.',nombre='".$nombre."',apellido='".$apellido."',
dni='".$dni."',localidad='".$localidad."',provincia='".$provincia."',
pais='".$pais."',direccion='".$direccion."' WHERE codusuario=$id";



        if($connection->query($consulta_mysql2)==true){
          header('Location:administrador.php');

        }else{
            echo $connection->error;

        }
}
        unset($connection);

?>

</div>
</body>
</html>
