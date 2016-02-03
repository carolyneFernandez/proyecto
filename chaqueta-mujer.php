
<?php
  session_start();
$connection = new mysqli("localhost","root","carolyne","tienda");
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    header('location: index.php');

}



	$result = $connection->query($consulta);

?>

<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="chaqueta.css">
    </head>
    <body>
<?php
  include "plantilla/header.php"
?>

<?php

$connection = new mysqli("localhost","root","carolyne","tienda");
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    header('location: index.php');

}
$connection->set_charset("utf8");
$consulta=("SELECT * from producto where  categoria='chaquetas' and sexo='mujer';");

	$result = $connection->query($consulta);
  if (isset($result) && $result->num_rows==0) {
  echo "<p>
	No existen productos en la categoria indicada.
   </p>";
  } else {
    echo  "<div class='cuerpo'>";

while($obj = $result->fetch_object()) {
      echo "<div class='contenedor_principal'>";
      echo "<center>
      <a href='clienteproducto.php?id=$obj->codproducto'><img src='imagenes/$obj->foto'</a>";
      echo "<p><center>
      <b>$obj->nombre</b>
      </center></p>";
    echo "<button type='button' class='btn btn-info'>$obj->precio €</button>";


      echo "<button type='button' class='btn btn-info'>Añadir Carrito</button></center>";
      echo "</div>";
    }

  }
  echo "</div>";



?>


<div id="foot">
<div class="tarjetas">
<center>
  <h4><b>VENTA ASISTIDA Y ATENCIÓN AL CLIENTE</b></h4>
  <p><b>91 702 19 45</b></p>


<p>HORARIO:</p>
<p>De lunes a viernes de 09:00 a 20:00 horas</p>
</center>
</div>
<div class="tarjetas">
  <center>
  <p>
    Formas de pago
  </p>
  <img src="imagenes/tarjetas/1.png">
<img src="imagenes/tarjetas/2.png">
<img src="imagenes/tarjetas/3.jpg">
<img src="imagenes/tarjetas/4.jpg">
<img src="imagenes/tarjetas/5.png">
</center>
</div>

</div>
    </body>
</html>
