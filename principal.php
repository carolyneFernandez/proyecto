<?php
  session_start();
$connection = new mysqli("localhost","root","carolyne","tienda");
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    header('location: index.php');

}
	$result = $connection->query("SELECT * FROM producto;");
?>

<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
      <link rel="stylesheet" type="text/css" href="css/principal.css">
    </head>
    <body>

<?php

include("./plantilla/header.php");
?>
<div class="contenedor_principal">
<?php
  if (isset($result) && $result->num_rows==0) {
?>
   <p>
	No existen productos en la categoria indicada.
   </p>
<?PHP
  } else {
    while($obj = $result->fetch_object()) {
	?>
	<div class='producto' >
	<img src='<?PHP echo $obj->foto; ?>'/>
	<h4>
	<b> <?PHP echo $obj->nombre; ?> </b>
	</h4>
	<p>
	Precio de Venta: <?PHP echo $obj->precio; ?>
	</p>
	<p>
	Colores Disponibles: <?PHP echo $obj->color; ?>
	</p>
	<p>
	tallas disponibles: <?PHP echo $obj->talla; ?>
	</p>
	<p id='descripcion'>
	<?PHP
		  echo $obj->descripcion;
	?>
	</p>
	</div>
	<?PHP
    }
  }
?>

</div>
    </body>
</html>
