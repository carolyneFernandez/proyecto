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
    <title>COLORES Y TALLAS</title>
      <link rel="stylesheet" href="../css/administrador.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
      <?php
          include "../plantilla/cabeceradmin.php"
      ?>
      <div id="izquierda">
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
      echo "<label>AGREGA UNA TALLA Y COLOR A UN PRODUCTO</label>";
      $result=$connection->query($consulta);
      echo "<form method='post' action='#' enctype='multipart/form-data'>";
      echo " <label>Nombre del Producto:</label>";
      echo "<select  name='nombreproducto'>";
      while( $obj = $result->fetch_object()){
      echo "<option value='$obj->codproducto'>$obj->nombre</option>";
      }
       echo "</select><br>";
       $consulta1="SELECT * FROM colores";

       $result1=$connection->query($consulta1);
       echo "<form method='post' action='#' enctype='multipart/form-data'>";
       echo " <label>Nombre del Color:</label>";
       echo "<select  name='nombrecolor'>";
       while( $obj1 = $result1->fetch_object()){
       echo "<option value='$obj1->idcolor'>$obj1->nombrecolor</option>";
       }
       echo "</select><br>";


       $consulta3="SELECT * FROM tallas";

       $result3=$connection->query($consulta3);
       echo "<form method='post' action='#' enctype='multipart/form-data'>";
       echo " <label>Nombre del Color:</label>";
       echo "<select  name='nombretalla'>";
       while( $obj3 = $result3->fetch_object()){
       echo "<option value='$obj3->idtalla'>$obj3->nombretalla</option>";
       }
       echo "</select><br>";
echo "<input type='submit' name='envia' class='btn btn-success' value='Enviar'>";
     }else{
       $nombreproducto=$_POST['nombreproducto'];
       $nombrecolor=$_POST['nombrecolor'];
       $nombretalla=$_POST['nombretalla'];


       $consulta_mysql2="INSERT INTO colorproducto (idrelacion,idcolor,codproducto)
       VALUES  ( NULL,'$nombrecolor','$nombreproducto')";
       $consulta_mysql3="INSERT INTO tallasproducto (idrelacion,codproducto,tallas)
       VALUES  ( NULL,'$nombreproducto','$nombretalla')";


               if($connection->query($consulta_mysql2)==true&&$connection->query($consulta_mysql3)==true){
              header('Location:cyt.php');

                     mysql_close();


               }else{
                   echo $connection->error;

               }
       }
               unset($connection);

     ?>

      </div>
      <?php

        //CREATING THE CONNECTION
            $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */
        $connection->set_charset("utf8");
        if ($result = $connection->query("SELECT * FROM producto ")) {

          ?>

    <div class="container">

              <!-- PRINT THE TABLE AND THE HEADER -->
              <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
              <thead>
                <tr class="info" >
                  <th>Nombre del Producto</th>
                  <th>Ver detalle</th>

              </thead>

          <?php

              //FETCHING OBJECTS FROM THE RESULT SET
              //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
              while($obj = $result->fetch_object()) {
                  //PRINTING EACH ROW
                  echo "<tr>";
                  echo "<td>".$obj->nombre."</td>";
                  echo "<td><center><a href='detallecolor.php?deta=$obj->codproducto'>
                  <button type='button' class='info'>Ver Detalles</button></a></center></td>";

                  echo "</tr>";
              }

              //Free the result. Avoid High Memory Usages
              $result->close();
              unset($obj);
              unset($connection);

          } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

        ?>
        </div>
      </body>
      </html>
