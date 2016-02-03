<?php
  session_start();
$connection = new mysqli("localhost","root","carolyne","tienda");
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    header('location: index.php');

}
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
    <link rel="stylesheet" href="css/chaquetamujer.css">
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
$id=$_GET['id'];
$consulta=("SELECT * FROM producto where codproducto=$id");

	$result = $connection->query($consulta);
  if (isset($result) && $result->num_rows==0) {
  echo "<p>
	No existen productos en la categoria indicada.
   </p>";
  } else {

echo "<div id='cuerpo'>";


        $result=$connection->query($consulta);
        $obj = $result->fetch_object();
        echo "<div id='div1'>";
          echo "<img src='imagenes/$obj->foto'>";
        echo "</div>";
        echo "<div id='div2'>";
        echo "<p><b>$obj->nombre</b></p>";
        echo "<p>Precio de Venta:</p>";
        echo $obj->precio;
        echo "<p>Colores Disponibles :";
        $consultacolores="SELECT DISTINCT c.nombrecolor FROM colores c join colorproducto cp on c.idcolor=cp.idcolor
         where cp.codproducto=$obj->codproducto ";
  ;
        $resultcolores = $connection->query($consultacolores);
        if (isset($resultcolores) && $resultcolores->num_rows==0) {
        echo "<p>
      	No existen productos en la categoria indicada.
         </p>";
        } else {
          while($objcolores = $resultcolores->fetch_object()){
            echo $objcolores->nombrecolor." ";
          }
        }
        echo "<p>Tallas Disponibles :";
        $consultalla="SELECT DISTINCT t.nombretalla FROM tallasproducto tp join tallas  t on  tp.tallas=t.idtalla
         where tp.codproducto=$obj->codproducto ";
        $resultalla = $connection->query($consultalla);
        if (isset($resultalla) && $resultalla->num_rows==0) {
        echo "<p>No existen productos en la categoria indicada.</p>";
        } else {
          while($objtalla = $resultalla->fetch_object()){
            echo $objtalla->nombretalla." ";
          }
        }
        echo "<p>Descripcion : </p>";
        echo "<p class='parrafo'>$obj->descripcion</p>";
        echo "<button type='button' class='btn btn-info'>Añadir Carrito</button>";
        echo "</div>";
      }



echo "</div>"
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
