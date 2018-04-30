<?php
	
	/**
	* 
	*/
	class Sql extends PDO
	{
		
		private $conn;

		//contrutor criado para abrir uma conexao
		function __construct()
		{

			$this->conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","32358115");
			
		}


		private function setParams($statament, $parameters = array())
		{
			foreach ($parameters as $key => $value) {

				$this->setParam($statament, $key, $value);
			}
		}

		private function setParam($statament, $key, $value)
		{

			$statament->bindParam($key, $value);
		}

		public function query($rawQuery, $params = array())
		{

			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt,$params);

			$stmt->execute();

			return $stmt;
		}
		
		//função para carregar todos os dados
		public function select($rawQuery, $params=array()):array
		{
			$stmt = $this->query($rawQuery, $params);

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}


	}

?>