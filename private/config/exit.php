<?php
	echo "muerto";
	session_start();
	unset($_SESSION);
	session_destroy();
	header("location: ../view/list_products.php");
?>