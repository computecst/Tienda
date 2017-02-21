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
			$query = 'SELECT * FROM products';
			$result = pg_query($query);
			if($result == true){
				while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
					$lista_user += [
									$line['id'] => array(
										$line['name'], $line['description'], $line['price'], $line['category']
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
				return $num_rows;
			}
			else{
				echo "fallo el query";
				return false;
			}
			//
		}

	}


	




?>