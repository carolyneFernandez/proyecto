<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
  session_start();
   $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
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
    <title>Chaquetas de mujer</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/chaqueta.css">
      <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/foot.css">
    </head>
    <body>

<?php
  include "../plantilla/header.php"
?>

<?php

$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    header('location: index.php');

}
$connection->set_charset("utf8");
$consulta=("SELECT * from producto where  categoria='chaqueta' and sexo='hombre';");

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
      <a href='clienteproducto.php?id=$obj->codproducto'><img src='../imagenes/$obj->foto'</a>";
      echo "<p id='parrafo'><center>
      <b>$obj->nombre</b>
      </center></p>";
    echo "<button type='button' class='btn btn-info'>$obj->precio €</button>";
      echo "<button type='button' class='btn btn-info'>Ver detalles</button></center>";
      echo "</div>";
    }

  }
  echo "</div>";



?>
<?php
  include "../plantilla/foot.php"
?>


    </body>
</html>
