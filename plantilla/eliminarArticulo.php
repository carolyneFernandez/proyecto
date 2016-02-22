<?PHP
	session_start();
	if(!isset($_SESSION['carrito']) || count($_SESSION['carrito']) <= 0){
		$_SESSION['carrito'] = [];
	}
	if(isset($_REQUEST['id'])){
		unset($_SESSION['carrito'][$_REQUEST['id']]);
	}
	header("location: ../usuarios/carrito.php?id=".$_REQUEST['id_producto']);
?>