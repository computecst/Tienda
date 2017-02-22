<?php
if(isset($_GET['p'])){

	if($_GET['p'] == "new"){
?>
		<div>
			<h3>Nuevo Producto</h3>
		</div>
		<form method="post">
			<input type="text" name="p_id" placeholder="codigo">
			<input type="text" name="p_name" placeholder="nombre">
			<input type="text" name="p_description" placeholder="descripción">
			<input type="text" name="p_price" placeholder="precio">
			<input type="submit" name="new_product" value="Aceptar">
		</form>
<?php
		if(isset($_POST['new_product']))
		{
			$id = $_POST['p_id'];
			$name = $_POST['p_name'];
			$description = $_POST['p_description'];
			$price = $_POST['p_price'];
		}

	}

	if($_GET['p'] == "update"){
		echo "actualizar producto";
	}

	if($_GET['p'] == "delete"){
		echo "eliminar producto";
	}
}
?>


	
