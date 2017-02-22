<?php

	class Connection
	{
		/*private $host = "localhost";
		private $user = "santiago";
		private $key = "hola123,";
		private $db = "online_store";*/
		public $connection;

		function __construct(){
			$this->connection = pg_connect("host=localhost dbname=online_store user=santiago password=hola123,") or die('No se ha podido conectar: ' . pg_last_error());
		}
		public function get_products(){
			$lista_user = array();
			
			//$query = "SELECT * FROM products";
			//
			$sql = "SELECT d.id, d.name, d.description, d.price, existencia.total
					from (
						select d.id, count(d.id) as total
						from products as p, descripcion_producto as d
						where p.producto = d.id
						and p.id NOT IN (select id_product from venta_producto)
						group by(d.id)
					) as existencia
					join descripcion_producto as d
					on d.id = existencia.id;";
			//

			$result = pg_query($sql);
			if($result == true){
				while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
					$lista_user += [
									$line['id'] => array(
										$line['name'], $line['description'], $line['price'], $line['total']
									)];
				}
				return json_encode($lista_user);
			}
			else{
				echo "fallo el query";
				return false;
			}
		}

		

		//function __destruct(){}
	}

	final class Login extends Connection
	{
		public function validation_string($data){
			$dato = strip_tags($data);
			$data =  htmlentities($data, ENT_QUOTES | ENT_IGNORE, "UTF-8");
			$data = addslashes($data);
			//$dato = htmlspecialchars($dato); --> no se puede utilizar junto a htmlentities
			return $data;
		}

		public function get_login($a_user, $a_pass){
			$query = "SELECT * FROM users where email='$a_user' and pass='$a_pass' limit 1;";
			$result = pg_query($query);
			if($result == true){
				$num_rows = pg_affected_rows($result);
				if($num_rows === 1){
					$result = pg_fetch_array($result, null, PGSQL_ASSOC);
					return $result;
				}
				else { return false; }
			}
			else{
				echo "fallo el query";
				return false;
			}
			//
		}

	}

	final class Products
	{

		public function set_product_to_cart($a_user, $a_product){
			//
			$con = pg_connect("host=localhost dbname=online_store user=santiago password=hola123,") or die('No se ha podido conectar: ' . pg_last_error());
			//
			$query = "INSERT into carrito(id_product, id_user) values($a_product, $a_user);";
			$result = pg_query($con, $query);
			if($result == true){
				return true;
			}
			else{
				echo "fallo el query";
				return false;
			}
		}
	}


	




?>