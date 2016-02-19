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
      <link rel="stylesheet" href="css/administrador.css">

    <title></title>
</head>
  <body>
    <?php
        include "../plantilla/cabeceradmin.php"
    ?>

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
      if ($result = $connection->query("SELECT p.*,d.nombre nombred FROM  producto p join distribuidor d on p.coddistribuidor=d.coddistribuidor")) {



      ?>
<div class="container">

  <a href="añadirproducto.php"><button type='button' class='btn btn-info'>Añadir Producto</button></a>
          <!-- PRINT THE TABLE AND THE HEADER -->
          <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr class="info" >
              <th>Codigo del Producto</th>
              <th>Nombre del  Distribuidor</th>
              <th>Nombre del Producto</th>
              <th>Descripcion</th>
              <th>Stock</th>
              <th>Foto</th>
              <th>Categoria</th>
              <th>Precio</th>
              <th>Sexo</th>
              <th>Editar</th>
              <th>Eliminar</th>
              <th> Ver Detalles</th>


          </thead>

      <?php

          //FETCHING OBJECTS FROM THE RESULT SET
          //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
          while($obj = $result->fetch_object()) {
              //PRINTING EACH ROW
              echo "<tr>";
              echo "<td>".$obj->codproducto."</td>";
              echo "<td>".$obj->nombred."</td>";
              echo "<td>".$obj->nombre."</td>";
              echo "<td>".$obj->descripcion."</td>";
              echo "<td>".$obj->stock."</td>";
              echo "<td>".$obj->foto."</td>";
              echo "<td>".$obj->categoria."</td>";
              echo "<td>".$obj->precio."</td>";
              echo "<td>".$obj->sexo."</td>";
              echo "<td><center><a href='editar-producto.php?id=$obj->codproducto'><button type='button' class='btn btn-primary'>Editar</button></center></td>";
              echo "<td><center><a href='eliminar-producto.php?id=$obj->codproducto'><button type='button' class='btn btn-danger'>Eliminar</button></center></td>";
              echo "<td><center><a href='?deta=$obj->codproducto'><button type='button' class='btn btn-info'>Detalles</button></center></td>";

              echo "</tr>";

          }
echo "</table>";
          //Free the result. Avoid High Memory Usages
          $result->close();
          unset($obj);
          unset($connection);

      } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

    ?>
    </div>

    <!--DETALLES-->




  </body>
  </html>
