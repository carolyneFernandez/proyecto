<html>
<head><title>Registrate</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/entra.css">
</head>
<body>
    <?php if(!isset($_POST["envia"])) : ?>
  <form action="registro.php" method="post">
    <label>Nombre :</label>
    <input type="text" name="nombre"  class="form-control">
    <label>Contraseña:</label>
    <input type="text" name="passwd" class="form-control">
    <label>Apellidos :</label>
    <input type="text" name="apellido"  class="form-control">
    <label>DNI :</label>
    <input type="text" name="dni"  class="form-control">
    <label>Localidad :</label>
    <input type="text" name="localidad" class="form-control">
    <label>Provincia:</label>
    <input type="text" name="provincia"  class="form-control">
    <label>Pais:</label>
    <input type="text" name="pais"  class="form-control">
    <label>Direccion:</label>
    <input type="text" name="direccion"  class="form-control">
    <input type="submit" name="envia" class="btn btn-success"value="Enviar">
  </form>
<?php else: ?>




  <?php


    $nombre=$_POST['nombre'];
    $passwd=$_POST['passwd'];
    $apellido=$_POST['apellido'];
    $dni=$_POST['dni'];
  $localidad=$_POST['localidad'];
  $provincia=$_POST['provincia'];
$pais=$_POST['pais'];
    $direccion=$_POST['direccion'];

      $connection = new mysqli("localhost","root","carolyne","tienda");
      if($connection->connect_errno)
      {
          printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
          exit();

      }


$consulta="INSERT INTO `tienda`.`usuarios` (`codusuario`, `nombre`, `apellido`, `dni`, `localidad`, `provincia`, `pais`, `administrador`, `direccion`, `passwd`)
VALUES (NULL, '$nombre', '$apellido', '$dni', '$localidad', '$provincia', '$pais', '1', '$direccion', MD5('$passwd'))";
          if($connection->query($consulta)==true){

              header('Location:index.php');

          }else{
              echo $connection->error;

          }
          unset($connection);

      ?>
 <?php endif ?>

</body>
</html>
