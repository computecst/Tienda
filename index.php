<?php
	include "private/config/config.php";
	include "private/model/store.class.php";
?>

<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo BASE_URL; ?>">
	<title>Welcome</title>
</head>
<body>
	<header>
		<div>
			<a href="private/view/login.php">Login</a>
		</div>
	</header>
<?php

	if(isset($_GET['view']) and file_exists('private/controller/'.$_GET['view'] . '.php')) {
		header("location: private/controller/".$_GET['view'].'.php');
	}
	else{
		//include_once "private/controller/products.php?f=a";
		header("location: private/view/list_products.php");
	}
?>

</body>
</html>
