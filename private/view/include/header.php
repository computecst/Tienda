<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
</head>
<body>
	<header>
		<div><h3>Tienda en Linea</h3></div>
	</header>
	<nav>
		<ul>
			<li><a href="../admin/product.php?p=new">nuevo producto</a></li>
			<li><a href="../admin/product.php?p=update">actualizar producto</a></li>
			<li><a href="../admin/product.php?p=delete">borrar producto</a></li>
		</ul>
	</nav>

<style>
	*{box-sizing: border-box;}
	header{
		padding: 10px;
		background-color: #2979ff;
	}
	header div h3{
		margin: 0;
		color: white;
	}
	nav{
		/*border: 2px solid;*/
	}
	nav ul{
		/*border: 2px solid red;*/
	}
	nav ul li{
		display: inline-block;
	}

	nav ul li a{
		padding: 5px 10px;
		border: 2px solid green;
		border-radius: 5px;
		cursor: pointer;
		text-decoration: none;
	}
</style>