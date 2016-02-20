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
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */
        $connection->set_charset("utf8");


        $consulta2="SELECT  DISTINCT nombretalla ,p.codproducto,nombre,nombrecolor FROM tallas  t join tallasproducto tp  on
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
      $consulta1="SELECT DISTINCT nombretalla ,p.codproducto,tp.tallas FROM tallas  t join tallasproducto tp  on
  tp.tallas=t.idtalla join producto p on p.codproducto=tp.codproducto where p.codproducto=$deta order by nombre";

   $result1=$connection->query($consulta1);
   echo "<div class='cuerpo'>";
   echo "<center><form name='myform' action='eliminar-talla.php'  method='POST'>";
   echo "<fieldset>";
   echo "<legend>ELIMINAR TALLAS</legend>";
   $obj1=$result1->fetch_object();
   echo "<input type='hidden' name='producto' value='$obj1->codproducto'>";

    while ($obj1=$result1->fetch_object()) {
    echo "<label class='radi'>";
    echo  "<input id='ta' type='checkbox' name ='talla' value='$obj1->tallas'>$obj1->nombretalla<br>";
    echo "</label>";
    }
    echo "  </fieldset>";
    echo "<center><button type='submit' class='btn btn-danger'>ELIMINAR</button></center>";
    echo "  </form></center>";
   echo "</div>";?>

     <?php
     $consulta3="SELECT DISTINCt nombrecolor,p.codproducto,cp.idcolor FROM  producto p join colorproducto cp on p.codproducto=cp.codproducto join
       colores c on c.idcolor=cp.idcolor where p.codproducto=$deta order by nombre";

   $result3=$connection->query($consulta3);
   echo "<div class='cuerpo'>";
  echo "<center><form name='myform1' action='eliminacolor.php'  method='POST'>";
   echo "<fieldset>";
   echo "<legend>ELIMINAR COLOR</legend>";
   $obj3=$result3->fetch_object();
   echo "<input type='hidden' name='producto' value='$obj3->codproducto'>";
       while ($obj3=$result3->fetch_object()) {
   echo "<label class='radi' >";
   echo  "<input id=color type='checkbox'  name='color' value='$obj3->idcolor'>$obj3->nombrecolor<br>";

   echo "</label>";

   }

   echo "  </fieldset>";
   echo "<center><button type='submit' class='btn btn-danger'>ELIMINAR</button></center>";

   echo "  </form><center>";
    echo "</div>";
  ?>
</div>
  </div>


    </body>
    </html>
