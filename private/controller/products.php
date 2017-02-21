<?php

include_once "../model/store.class.php";


function list_products(){
	$o_product = new Connection();
	$result = $o_product->get_products();
	session_start();
	$_SESSION['data'] = $result;
	header("location: ../view/list_products.php");
}

switch ($_GET['f']) {
	case 'list_products':
		list_products();
		break;
	
	default:
		# code...
		break;
}



?>