<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
	#tel{
	 margin-right:16px;
	}
</style>

</head>
<body>
	<?php
			include "../plantilla/header.php"
	?>

	<div class="container well">
		<div class="row">
				<div class="col-xs-12"><h2>Tu Perfil de Usuario</h2></div>
			</div>
		<br /><br />

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

	    $consulta=("SELECT * FROM usuarios where Nombre='".$_SESSION['nombre']."' ");

      if ($result = $connection->query($consulta)) {


  $obj = $result->fetch_object();
      ?>
		<form class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="formGroup"></label>
				<div class="col-sm-4">

				<button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>

				<button type="button" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>


				</div>
			</div>
				<div class="form-group">
					    <label class="col-sm-2 control-label" for="formGroup">Nombre del Usuario
                </label>
					    <div class="col-sm-2">
					      <input class="form-control" type="text"  value=<?php echo $obj->Nombre;?> disabled>
					    </div>
					  </div>

					<div class="form-group">
					    <label class="col-sm-2 control-label" for="formGroup">Nombre</label>
					    <div class="col-sm-4">
					      <input class="form-control" type="text"  value=<?php echo $obj->Nombre;?>>
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="col-sm-2 control-label" for="formGroup">Apellidos</label>
					    <div class="col-sm-4">
					      <input class="form-control" type="text"value=<?php echo $obj->apellido;?>>
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="col-sm-2 control-label" id="tel">Teléfono</label>

					    <div class="input-group col-sm-3">
					      <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
					      <input class="form-control" type="text"  value=<?php echo $obj->telefono;?>>

					    </div>
					  </div>
						<div class="form-group">
								<label class="col-sm-2 control-label" for="formGroup">Direccion</label>
								<div class="col-sm-4">
									<input class="form-control" type="text" value=<?php echo $obj->direccion?>>
								</div>
							</div>
							<div class="form-group">
									<label class="col-sm-2 control-label" for="formGroup">Localidad</label>
									<div class="col-sm-4">
										<input class="form-control" type="text"  value=<?php echo $obj->localidad;?>>
									</div>
								</div>
								<div class="form-group">
										<label class="col-sm-2 control-label" for="formGroup">Pais</label>
										<div class="col-sm-4">
											<input class="form-control" type="text" value=<?php echo $obj->pais?>>
										</div>
									</div>

						<div class="form-group">
								<label class="col-sm-2 control-label" for="formGroup">Cuenta</label>
								<div class="col-sm-4">

								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked> Activar
								</label>
								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Desactivar
								</label>

								</div>
							</div>


					  </div>



		</form>
<?php
$result->close();
unset($obj);
unset($connection);
}if($_SESSION["administrador"]=="1"){
?>
<div class="container well">
	<div class="row">
			<div class="col-xs-12"><h2>Datos de los Pedidos</h2></div>
		</div>
	<br /><br />

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

		$consulta1=("SELECT * FROM producto pro join incluyen i on pro.codproducto=i.codproducto
	   join pedidos p on i.codpedido=p.codpedido
	   join usuarios  u on  p.codusuario=u.codusuario
	   where u.Nombre='".$_SESSION['nombre']."' ");
	if ($result1 = $connection->query($consulta1)) {

		?>

		<div class="container">


					<!-- PRINT THE TABLE AND THE HEADER -->
					<table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
					<thead>
						<tr class="info" >
							<th>NOMBRE</th>
							<th>CANTIDAD</th>
							<th>PRECIO</th>
					</thead>

			<?php

					//FETCHING OBJECTS FROM THE RESULT SET
					//THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
					while($obj1 = $result1->fetch_object()) {
							//PRINTING EACH ROW
							echo "<tr>";
							echo "<td>".$obj1->nombre."</td>";
							echo "<td>".$obj1->cantidad."</td>";
							echo "<td>".$obj1->precio.€."</td>";
							echo "</tr>";
					}

					//Free the result. Avoid High Memory Usages
}
$result1->close();
unset($obj1);
unset($connection);
}
?>


</body>
</html>
