<?php
    include "plantilla/sesionadmin.php"
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src=""></script>
</head>

<body>
    <center>
      <b><h3>Añadir</h3></b>

    </center>
 <div id="center" class="container">

   <?php

   $connection = new mysqli("localhost","root","carolyne","tienda");
   if($connection->connect_errno){
       printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
       exit();

   }

   if(!isset($_POST['envia'])){


   $consulta="SELECT DISTINCT coddistribuidor FROM producto";
       $result=$connection->query($consulta);



      echo "<form method='post' action='#'>";
    echo "<input type='hidden'name='codproducto'> ";
      echo " <label>Codigo Distribuidor:</label>";
    echo "<select  name='coddistribuidor'>";
  while( $obj = $result->fetch_object()){
    echo "<option value='$obj->coddistribuidor'>$obj->coddistribuidor</option>";
  }
  echo "</select><br>";
    echo " <label>Nombre del Producto:</label>";
    echo "<input type='text' name='nombre'  class='form-control'>";
    echo " <label>Descripcion:</label><br>";
    echo "<textarea name='descripcion' style='width: 500px; height: 150px;' ></textarea> <br>";
    echo " <label>Stock:</label>";
    echo "<select name='stock'>";
    for ($i=1; $i<=100; $i++)
    {
            echo  "<option value= $i;>";
            echo $i;
            echo "</option>";
    }
    echo "</select><br>";
    echo "<label>Elige la Imagen del Producto</label><br>";

    echo "<input type='file' name='imagen'><br>";
    echo " <label>Categoria:</label>";
    echo "<select  name='categoria'>";
    $consulta="SELECT DISTINCT categoria FROM producto";
        $result=$connection->query($consulta);
  while( $obj = $result->fetch_object()){
    echo "<option value='$obj->categoria'>$obj->categoria</option>";
  }
  echo "</select><br>";

      echo " <label>Precio del Producto:</label>";
      echo"<select name='precio'>";
      for ($i=10; $i<=100; $i++)
      {

              echo "<option value='i'>$i €</option>";

      }
      echo "</select><br>";

    echo " <label>Para quien es el producto (Mujer,Hombre,Niño):</label>";
    echo  "<input type='text' name='sexo'  class='form-control'>";

    echo "<input type='submit' name='envia' class='btn btn-success' value='Enviar'>";
    echo "</form>";

}else{
$codproducto=$_POST['codproducto'];
$coddistribuidor=$_POST['coddistribuidor'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

$stock=$_POST['stock'];

$imagen=$_POST['imagen'];
$categoria=$_POST['categoria'];
$precio=$_POST['precio'];
$sexo=$_POST['sexo'];

UPDATE  `tienda`.`producto` SET  `nombre` =  'AMERICANA ',
`descripcion` =  'Tejido con textura, manga larga, dos bolsillos de cremallera, forro interior.
ï¿½ Largo de costado 34.6 cm
ï¿½ Largo de la espalda 56.4 cm
Estas medidas estï¿½n calculadas para una talla M',
`stock` =  '50',
`precio` =  '52.50' WHERE  `producto`.`codproducto` =100;

$consulta_mysql2="UPDATE producto SET codproducto='.$codproducto.',coddistribuidor='".$coddistribuidor."',
nombre='".$nombre."',descripcion='".$descripcion."',stock='".$stock."',foto='".$imagen."',
categoria='".$categoria."',precio='".$precio."',sexo='".$sexo."' WHERE codproducto=$codproducto";



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
