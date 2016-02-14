<?php
    include "plantilla/sesionadmin.php"
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar producto</title>
    <link rel="stylesheet" href="estilo.css">
    <script src=""></script>
</head>

<body>


   <?php

    $connection = new mysqli("localhost","root","carolyne","tienda");

      if ($connection->connect_errno) {
          printf("ERROR AL ESTABLECER CONTACTO CON LA BASE DE DATOS", $connection->connect_errno);
          exit();
      }

    $id = $_GET['id'];


    $connection->query("DELETE FROM producto WHERE codproducto=$id ");


        unset($connection);
        header("Location:producto.php");



   ?>


</body>
</html>
