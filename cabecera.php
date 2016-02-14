<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
      <nav class="navbar navbar-default" role="navigation">
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
              data-target=".navbar-ex1-collapse">
        <span class="sr-only">Desplegar navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">MODA carolyne</a>
    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Inicio</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            MUJERES<b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="chaqueta-mujer.php">Chaquetas</a> </li>
            <li class="divider"></li>
             <li><a href="sudadera-mujer.php">Sudadera</a> </li>
              <li class="divider"></li>
              <li><a href="vaquero.mujer.php">Vaqueros</a> </li>
              <li class="divider"></li>
              <li><a href="blusa-mujer.php">Blusas</a> </li>
          </ul>

        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            HOMBRE<b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="chaqueta-mujer.php">Chaquetas</a> </li>
            <li class="divider"></li>

              <li><a href="vaquero.php">Vaqueros</a> </li>

          </ul>

        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          NIÑO<b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="accesorios.php">Accesorios</a> </li>
            <li class="divider"></li>
             <li><a href="zapatos.php">Zapatos</a> </li>

          </ul>

        </li>
        <li><a href="#">CONTACTO</a></li>
      </ul>
      <?PHP
    if(isset($_SESSION['nombre']) && $_SESSION['nombre'] != ''){

    ?>

      <div class="container-fluid">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>
                <?PHP
                echo $_SESSION['nombre']; ?></b> <span class="caret"></span></a>
                <ul class='dropdown-menu' style='width:100px;'>
                    <li>
                      <div class='collapse navbar-collapse'>
                        <ul class='nav navbar-nav'>
                          <li><a href='perfil.php'><span class='glyphicon glyphicon-user'></span>
                            Ver perfil
                          </a>
                          </li>
                          <li><a href='plantilla/cerrar.php'>
                          <span class='glyphicon glyphicon-log-in'></span>Cerrar sesion
                          </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                </ul>

            </li>
          </ul>


    <?PHP
    }else{
    ?>
      <div  class="container-fluid">
          <ul class="nav navbar-nav navbar-right">
            <li  class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
          <ul   id="login-dp" class="dropdown-menu">
            <li>


                    <form  method="POST"  action="login.php">
                        <div class="form-group">

                           <input type="text" class="form-control" name="usuario"  required>
                        </div>
                        <div class="form-group">

                           <input type="password" class="form-control" name="pass"  required>

                        </div>
                        <div class="form-group">

                           <input type="submit" class="btn btn-primary btn-block" value="ENTRA"/>

                           <a href="registro.php">Si no tienes una cuenta pincha aqui y registrate</a>
                        </div>

                     </form>
                  </div>

               </div>
            </li>
          </ul>
            </li>
          </ul>

    <?php
    	}
    	?>

    </div>
  </nav>
    </body>
</html>
