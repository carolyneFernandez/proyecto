<header>
  
  <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <a href="#" class="navbar-brand" >MODA CAROLYNE</a>
<div class="collapse navbar-collapse" id="navegacion">
  <ul class="nav navbar-nav">
    <li><a href="#">INICIO</a></li>
      <li class="dropdown"><a href="#" class=" dropdown-toggle"type="button" data-toggle="dropdown">
        MUJER<span class="caret"></span> </a>
       <ul class="dropdown-menu" >
         <li><a href="chaqueta-mujer.php">Chaquetas</a> </li>
         <li class="divider"></li>
          <li><a href="sudadera-mujer.php">Sudadera</a> </li>
           <li class="divider"></li>
           <li><a href="vaquero.mujer.php">Vaqueros</a> </li>
           <li class="divider"></li>
           <li><a href="blusa-mujer.php">Blusas</a> </li>
       </ul>
     </li>
     <li class="dropdown"><a href="#" class=" dropdown-toggle"type="button" data-toggle="dropdown">
      HOMBRE<span class="caret"></span>
      </a>
      <ul class="dropdown-menu" >
         <li><a href="#">Sudadera</a> </li>
          <li class="divider"></li>
          <li><a href="#">Vaqueros</a> </li>

      </ul>
    </li>
    <li class="dropdown"><a href="#" class=" dropdown-toggle"type="button" data-toggle="dropdown">
    NIÑOS<span class="caret"></span>
     </a>
     <ul class="dropdown-menu" >
       <li><a href="#">Accesorios</a> </li>
       <li class="divider"></li>
        <li><a href="#">Zapatos</a> </li>
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
</header>
