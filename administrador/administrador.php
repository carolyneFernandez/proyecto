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
    <?php
        include "../plantilla/cabeceradmin.php"
    ?>
    <?php

      //CREATING THE CONNECTION
      $connection = new mysqli("localhost", "root", "carolyne", "tienda");

      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      $connection->set_charset("utf8");
      if ($result = $connection->query("SELECT * FROM usuarios;")) {



      ?>
<div class="container">


          <!-- PRINT THE TABLE AND THE HEADER -->
          <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr class="info" >
              <th>CodCliente</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>DNI</th>
              <th>Localidad</th>
              <th>Provincia</th>
              <th>Pais</th>
              <th>Adminstrador</th>
              <th>Direccion</th>
              <th>Editar</th>
              <th>Eliminar</th>

          </thead>

      <?php

          //FETCHING OBJECTS FROM THE RESULT SET
          //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
          while($obj = $result->fetch_object()) {
              //PRINTING EACH ROW
              echo "<tr>";
              echo "<td>".$obj->codusuario."</td>";
              echo "<td>".$obj->Nombre."</td>";
              echo "<td>".$obj->apellido."</td>";
              echo "<td>".$obj->dni."</td>";
              echo "<td>".$obj->localidad."</td>";
              echo "<td>".$obj->provincia."</td>";
              echo "<td>".$obj->pais."</td>";
              echo "<td>".$obj->administrador."</td>";
              echo "<td>".$obj->direccion."</td>";
              echo "<td><center><a href='editar-usu.php?id=$obj->codusuario'><img src='../admin/1.png'></center></td>";
              echo "<td><center><a href='eliminar-usu.php?id=$obj->codusuario'><img src='../admin/eliminar.jpg'></center></td>";
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
