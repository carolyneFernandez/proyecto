<?php function cargarTallas(){
 $connection = new mysqli("localhost","root","carolyne","TIENDA");
 $consulta = 'SELECT * FROM tallas ORDER BY nombre';
 $resultado = $connection->query($consulta);
 $listaTallas = [];
 if($resultado->num_rows > 0){

  while($fila = $resultado->fetch_assoc()){
   array_push($listaTallas, [$fila['id_talla'], $fila['nombre']]);
  }
  return $listaTallas;
 }else{
  return false;
 }
}

function cargarColores(){
 $connection = new mysqli("localhost","root","carolyne","TIENDA");
 $consulta = 'SELECT * FROM colores ORDER BY nombre';
 $resultado = $connection->query($consulta);
 $listaColores = [];
 if($resultado->num_rows > 0){

  while($fila = $resultado->fetch_assoc()){
   array_push($listaColores, [$fila['id_color'], $fila['nombre'], $fila['codigo']]);
  }
  return $listaColores;
 }else{
  return false;
 }
}
echo '<pre>'.print_r(cargarColores()).'</pre>';
echo '<pre>'.print_r(cargarTallas()).'</pre>';
?>
