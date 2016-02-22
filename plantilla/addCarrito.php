<?PHP
	session_start();
	if(!isset($_SESSION['carrito']) || count($_SESSION['carrito']) <= 0){
		$_SESSION['carrito'] = [];
	}
	$id_producto = null;
	$nombre_producto = null;
	$precio_producto = null;
	$talla = null;
	if(isset($_REQUEST['id_producto']) && $_REQUEST['id_producto'] != ''){
		$id_producto = $_REQUEST['id_producto'];
	}
	if(isset($_REQUEST['nombre_producto']) && $_REQUEST['nombre_producto'] != ''){
		$nombre_producto = $_REQUEST['nombre_producto'];
	}
	if(isset($_REQUEST['precio_producto']) && $_REQUEST['precio_producto'] != ''){
		$precio_producto = $_REQUEST['precio_producto'];
	}
	if(isset($_REQUEST['talla']) && $_REQUEST['talla'] != ''){
		$talla = $_REQUEST['talla'];
	}
	if(!isset($_SESSION['carrito'][$id_producto])){
		$_SESSION['carrito'][$id_producto] = [];
		$_SESSION['carrito'][$id_producto]['cantidad'] = 0;
	}
	$_SESSION['carrito'][$id_producto]['nombre'] = $nombre_producto;
	$_SESSION['carrito'][$id_producto]['talla'] = $talla;
	$_SESSION['carrito'][$id_producto]['precio'] = $precio_producto;
	
	if($id_producto != null){
		if(isset($_REQUEST['cantidad']) && intval($_REQUEST['cantidad']) > 0){
			$_SESSION['carrito'][$id_producto]['cantidad']+=intval($_REQUEST['cantidad']);
		}else{
			$_SESSION['carrito'][$id_producto]['cantidad']++;
		}
	}
	header("location: ../usuarios/clienteproducto.php?id=".$_REQUEST['id_producto']);
?>