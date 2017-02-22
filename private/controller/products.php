<?php

include_once "../model/store.class.php";

/*function list_products(){
	$o_product = new Connection();
	$result = $o_product->get_products();
	session_start();
	$_SESSION['data'] = $result;
	header("location: ../view/list_products.php");
}*/



function add_cart(){
	$id_product	= $_POST['p_id_producto'];
	session_start();
	if(isset($_SESSION["_key"]) and $_SESSION['_key']==="1_tghj23!ASAS45_67i%uyt#re_T3M.," )
	{
		$o_product = new Products();
		$result = $o_product->set_product_to_cart($_SESSION['_id_user'], $id_product);
		if($result==true){echo "O.K";}
		else{echo "error-producto no disponible";}
	}
	else{
		header("location: login.php");

	}
}

switch ($_GET['f']) {
	case 'add_cart':
		add_cart();
		break;
	
	default:
		# code...
		break;
}



?>