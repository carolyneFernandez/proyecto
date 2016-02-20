<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php

    include "../plantilla/sesionadmin.php"
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../css/administrador.css">

    <title></title>
</head>
    <body>
        <center>
          <b><h3>Añadir</h3></b>

        </center>
     <div id="center" class="container">

       <?php

          $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
       if($connection->connect_errno){
           printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
           exit();

       }

       if(!isset($_POST['envia'])){


         $consulta="SELECT * FROM coddistribuidor";
             $result=$connection->query($consulta);
             echo "<form method='post' action='#' enctype='multipart/form-data'>";
          echo "<input type='hidden'name='coddistribuidor'> ";
            echo " <label>Nombre del distribuidor:</label>";
            echo "<input type='text' name='nombre'  class='form-control'>";
            echo " <label>Localidad:</label>";
          echo "<input type='text' name='localidad'  class='form-control'>";
          echo " <label>Provincia : </label><br>";
          echo "<input type='text' name='provincia'  class='form-control'>";
          echo " <label>CIF:</label>";
          echo  "<input type='text' name='cif'  class='form-control'>";
          echo "<input type='submit' name='envia' class='btn btn-success' value='Enviar'>";
          echo "</form>";
    }else{
    $coddistribuidor=$_POST['coddistribuidor'];
    $nombre=$_POST['nombre'];
    $localidad=$_POST['localidad'];
    $provincia=$_POST['provincia'];

    $cif=$_POST['cif'];


    $consulta_mysql2="INSERT INTO distribuidor (coddistribuidor,nombre,localidad,provincia,cif)
    VALUES  ( NULL,'$nombre','$localidad','$provincia','$cif')";


            if($connection->query($consulta_mysql2)==true){
           header('Location:distribuidor.php');

            }else{
                echo $connection->error;

            }
    }
            unset($connection);

    ?>

    </div>
    </body>
    </html>
