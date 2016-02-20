<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
    include "../plantilla/sesionadmin.php"
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar  color</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body>
  <?php
      include "../plantilla/cabeceradmin.php"
  ?>
   <?php
   $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
    if ($connection->connect_errno) {
          printf("ERROR AL ESTABLECER CONTACTO CON LA BASE DE DATOS", $connection->connect_errno);
          exit();
      }
      if(!isset($_POST['envia'])){
    //    $consulta="SELECT DISTINCt nombre FROM colores c join colorproducto cp on c.idcolor=cp.idcolor
      //   join producto p on cp.codproducto=p.codproducto";
      $consulta="SELECT * FROM producto";

$result=$connection->query($consulta);
echo "<form method='post' action='#' enctype='multipart/form-data'>";
echo "<input type='hidden'name='coddistribuidor'> ";
echo " <label>Nombre del Producto:</label>";
echo "<select  name='nombreproducto'>";
while( $obj = $result->fetch_object()){
echo "<option value='$obj->nombre'>$obj->nombre</option>";
}
  echo "</select><br>";
  $consulta1="SELECT * FROM colores";

  $result1=$connection->query($consulta1);
  echo "<form method='post' action='#' enctype='multipart/form-data'>";
  echo "<input type='hidden'name='coddistribuidor'> ";
  echo " <label>Nombre del Color:</label>";
  echo "<select  name='nombreproducto'>";
  while( $obj1 = $result1->fetch_object()){
  echo "<option value='$obj1->nombrecolor'>$obj1->nombrecolor</option>";
  }
  echo "</select><br>";


   //$id = $_POST['producto'];
   //$color = $_POST['color'];
   //$consulta_mysql2="INSERT INTO codproducto (idrelacion,idcolor,codproducto) VALUES  ( NULL,'$color','$codproducto')";

   //var_dump($consulta_mysql2);

   //if($connection->query($consulta_mysql2)==true){
  //header('Location:detallecolor.php');

   //}else{
     //  echo $connection->error;

   //}

   //unset($connection);


}
   ?>
