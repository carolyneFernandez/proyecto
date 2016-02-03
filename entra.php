<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="css/entra.css">
    </head>
    <body>
      <?PHP
		if(isset($_SESSION['ID']) && $_SESSION['ID'] =! ''){
		}else{
	?>
    <div class="jumbotron loginbox">
        <form method="POST"  action="login.php">
          <label>Nombre de Usuario:</label>
          <input type="text" name="usuario" id="usuario" class="form-control">
          <label>Contraseña:</label>
          <input type="text" name="pass" id="pass" class="form-control">
          <input type="submit"  class="btn btn-success"value="Conectarse">
        </form>
    </div>
    <?PHP
	}
	?>



    </body>
</html>
