<?php include_once "../config/config.php";?>
<!DOCTYPE html>
<html>
<head>
	<base href="<?php //echo BASE_URL; ?>">
	<title>productos</title>
</head>
<body>

	<header>
		<?php
			session_start();
			if(isset($_SESSION["_key"]) and $_SESSION['_key']==="1_tghj23!ASAS45_67i%uyt#re_T3M.," ){
				echo "<div> <a href='../config/exit.php'>Salir</a> </div>";
			}
			else{
				echo "<div> <a href='../controller/login.php'>Log In</a> </div>";
			}
		?>
		
	</header>

<?php

include_once "../model/store.class.php";
$o_product = new Connection();
$result = $o_product->get_products();
$data = json_decode($result);



echo "<table border=1>
		<tr><td>nombre</td>
			<td>descripción</td>
			<td>precio</td>
			<td>total</td>
			<td>Carrito</td>
		</tr>";

foreach ($data as $key => $value) {
	echo "<form method='post' action='../controller/products.php?f=add_cart'>";
	echo "<input type='hidden' name='p_id_producto' value='$key' />";
	//echo "<td>".$key[0]."</td>";
	echo "<tr> <td> <input type='text' value='$value[0]'/></td>";
	//echo "<tr><td>".$value[0]."</td>";
	echo "<td> <input type='text' value='$value[1]'/> </td>";
	//echo "<td>".$value[1]."</td>";
	echo "<td> <input type='text' value='$value[2]'/> </td>";
	echo "<td> <input type='text' value='$value[3]'/> </td>";
	echo "<td> <input type='submit' value='agregar' name='add_cart'/> </td> </tr>";
	//echo "<td>".$value[2]."</td></tr>";
	//echo "<td>".$value[3]."</td>";
	echo "</form>";
	//var_dump($value);
}
echo "<table>";

/*
	include_once "../model/store.class.php";
	$o_product = new Products();
	$result = $o_product->get_products();
	$num_row = $result->num_rows;
	if($num_row > 0){
		while($row = $result->fetch_array()){
			echo "<form action='private/view/buy.php'>";
			echo "name: <input type='text' name='p_name' value='$row[0]' /> </br>";
			echo "description: <input type='text' name='p_description' value='$row[1]' /> </br>";
			echo "price: <input type='text' name='p_price' value='$row[2]' /> </br>";
			echo "category: ".$row[3]. "</br>";
			echo "<input type='submit' name='buy' value='comprar'/>";
			echo "</form>";
			echo "</br>";
		}
	}
	else{ echo "no hay productos";}
	*/

?>



</body>
	<style>
		input{
			border: none;
		}
	</style>
</html>
