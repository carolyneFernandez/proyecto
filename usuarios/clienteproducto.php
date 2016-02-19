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
    <link rel="stylesheet" href="../css/chaquetamujer.css">
    <link rel="stylesheet" href="../css/colores.css">
      <link rel="stylesheet" href="../css/foot.css">
        <link rel="stylesheet" href="../css/clienteproducto.css">
    </head>
    <body>
<?php
  include "../plantilla/header.php"
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
          echo "<img src='../imagenes/$obj->foto'>";
        echo "</div>";
        echo "<div id='div2'>";
        echo "<h4><b>$obj->nombre</b></h4>";
        echo "<p>Precio de Venta:";
        echo $obj->precio .€ ;
        echo "</p>";
        echo "<p>Colores Disponibles </p>";
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
            $color= $objcolores->nombrecolor;
            switch ($color) {
            case 'Negro':
              echo "<div id='negro'></div>";
            break;
            case 'Rojo':
              echo "<div id='rojo'></div>";
            break;
            case 'Gris':
              echo "<div id='grey'></div>";
            break;
            case 'Marron':
              echo "<div id='marron'></div>";
            break;
            case 'Blanco':
              echo "<div id='blanco'></div>";
            break;
            case 'Verde':
              echo "<div id='verde'></div>";
            break;
            default:
              echo "No hay colores";
                break;
            }

          }
        }echo "<br>";
        echo "<p>Tallas Disponibles :</p>";
        $consultalla="SELECT DISTINCT t.nombretalla FROM tallasproducto tp join tallas  t on  tp.tallas=t.idtalla
         where tp.codproducto=$obj->codproducto ";
        $resultalla = $connection->query($consultalla);
        if (isset($resultalla) && $resultalla->num_rows==0) {
        echo "<p>No existen productos en la categoria indicada.</p>";
        } else {
            echo "<select  name='coddistribuidor'>";
          while($objtalla = $resultalla->fetch_object()){

            echo "<option value='$objtalla->nombretalla'>$objtalla->nombretalla</option>";
          }
          echo "</select><br>";

          }

        echo "<p>Descripcion : </p>";
        echo "<p class='parrafo'>$obj->descripcion</p>";
        echo "<button type='button' class='btn btn-info'>Añadir Carrito</button>";
        echo "</div>";
      }



echo "</div>"
?>


<?php
  include "../plantilla/foot.php"
?>
    </body>
</html>
