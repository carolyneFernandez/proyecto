<?php
session_start();
ob_start();
if(isset($_SESSION["nombre"])){

}else{
  header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="editar.css">
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
   $consulta=("SELECT * FROM producto where codproducto=$id");

    $result=$connection->query($consulta);
    $obj = $result->fetch_object();
    echo "<form method='post' action='#'>";

    echo  "<input type='hidden' name='codproducto'  value='$obj->codproducto' class='form-control'>";
    echo "<input type='hidden' name='coddistribuidor' value='$obj->coddistribuidor'><br> ";
    echo " <label>Nombre del Producto:</label><br>";
    echo "<input type='text' name='nombre'  value='$obj->nombre' class='form-control'>";
    echo " <label>Descripcion:</label> <br>";
    echo "<textarea name='descripcion' style='width: 500px; height: 150px;' >$obj->descripcion</textarea> <br>";

    echo " <label>Stock:</label>";
    echo  "<input type='text' name='stock'  value='$obj->stock' class='form-control'>";
    echo " <label>Foto:</label>";
    echo  "<input type='text' name='foto'  value='$obj->foto' class='form-control'>";
    echo " <label>Categoria:</label>";
    echo  "<input type='text' name='categoria'  value='$obj->categoria' class='form-control'>";
    echo " <label>Precio:</label>";
    echo  "<input type='text' name='precio'  value='$obj->precio' class='form-control'>";
    echo " <label>Sexo:</label>";
    echo  "<input type='text' name='sexo'  value='$obj->sexo' class='form-control'>";

    echo "<input type='submit' name='envia' class='btn btn-success' value='Enviar'>";
    echo "</form>";
}else{
$codproducto=$_POST['codproducto'];

$coddistribuidor=$_POST['coddistribuidor'];

$nombre=$_POST['nombre'];

$descripcion=$_POST['descripcion'];
$stock=$_POST['stock'];
$foto=$_POST['foto'];
$categoria=$_POST['categoria'];
$precio=$_POST['precio'];
$sexo=$_POST['sexo'];


$consulta_mysql2="UPDATE producto SET codproducto='.$codproducto.',coddistribuidor='".$coddistribuidor."',nombre='".$nombre."',
descripcion='".$descripcion."',stock='".$stock."',foto='".$foto."',
categoria='".$categoria."',precio='".$precio."',sexo='".$sexo."' WHERE codproducto=$codproducto;";



        if($connection->query($consulta_mysql2)==true){
          header('Location:producto.php');

        }else{
            echo $connection->error;

        }
}
        unset($connection);

?>

</div>
</body>
</html>
