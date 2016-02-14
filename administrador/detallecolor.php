<?php

    include "../plantilla/sesionadmin.php"
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COLORES Y TALLAS</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/administrador.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
      <?php
          include "../plantilla/cabeceradmin.php"
      ?>
      <?php
      if(isset($_GET["deta"])){
        $deta=$_GET["deta"];
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


        $consulta2="SELECT * FROM tallas  t join tallasproducto tp  on
  tp.tallas=t.idtalla join producto p on p.codproducto=tp.codproducto join colorproducto cp on p.codproducto=cp.codproducto join
          colores c on c.idcolor=cp.idcolor where p.codproducto=$deta order by nombre;";

     $result2=$connection->query($consulta2);
  ?>


  <div class="col-mod-10 cold-offset-1">
      <div class="nav nav-tabs well well-sm" style="text-aling:center;">
        <h5>Detalles del Producto</h5>
        <div class="table-responsive">
          <table style="margin-top:-1%,text-align:center;font-size:90%" class="table table-hover table-bordered">
            <tr style="font-weight:bold">
              <td>Nombre del Producto</td>
              <td>Talla disponible</td>
              <td>Color disponible</td>

            </tr>

            <?php

            //recorrer objetos
            while ($obj2=$result2->fetch_object()) {
              //pinta la filas

              echo "<tr>";
                echo "<td>$obj2->nombre</td>";
                echo "<td>$obj2->nombretalla</td>";
                echo "<td>$obj2->nombrecolor</td>";
              echo "</tr>";
            }
            ?>
          </table>
        </div>
      </div>
  </div>
  <?php
  }
  ?>



    <div class="col-mod-10 cold-offset-1">
        <div class="nav nav-tabs well well-sm" style="text-aling:center;">

      <?php
      $consulta2="SELECT DISTINCt nombretalla FROM tallas  t join tallasproducto tp  on
  tp.tallas=t.idtalla join producto p on p.codproducto=tp.codproducto join colorproducto cp on p.codproducto=cp.codproducto join
        colores c on c.idcolor=cp.idcolor where p.codproducto=$deta order by nombre;";

   $result2=$connection->query($consulta2);
   echo "<div class='cuerpo'>";
   echo "<center><form name='myform'  method='POST'>";
   echo "<fieldset>";
   echo "<legend>ELIMINAR TALLAS</legend>";
        while ($obj2=$result2->fetch_object()) {
    echo "<label class='radi'>";
    echo  "<a href='eliminar-talla.php?talla=$obj2->tallas'>
    <input type='radio' value='$obj2->idtallas'>$obj2->nombretalla</a><br>";
  echo "</label>";
    }
    echo "  </fieldset>";
    echo "  </form></center>";
    echo "<center><button type='button' class='btn btn-danger'>ELIMINAR</button></center>";
     echo "</div>";?>

     <?php
     $consulta2="SELECT DISTINCt nombrecolor FROM tallas  t join tallasproducto tp  on
   tp.tallas=t.idtalla join producto p on p.codproducto=tp.codproducto join colorproducto cp on p.codproducto=cp.codproducto join
       colores c on c.idcolor=cp.idcolor where p.codproducto=$deta order by nombre;";

   $result2=$connection->query($consulta2);
   echo "<div class='cuerpo'>";
   echo "<center><form name='myform'  method='POST'>";
   echo "<fieldset>";
   echo "<legend>ELIMINAR COLOR</legend>";
       while ($obj2=$result2->fetch_object()) {
   echo "<label class='radi' >";
   echo  "<input  type='radio'  value='$obj2->idcolor'>$obj2->nombrecolor<br>";
   echo "</label>";

   }
   echo "  </fieldset>";
   echo "  </form><center>";
  echo "<center><button type='button' class='btn btn-danger'>ELIMINAR</button></center>";
    echo "</div>";?>
    </div>
  </div>


    </body>
    </html>
