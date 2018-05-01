<?php

	/**
	* 
	*/
	class Usuario
	{
		private $idusuario;
		private $deslogin;
		private $dessenha;
		private $dtcadastro;


		public function getIdusuario(){
			return $this->idusuario;
		}

		public function setIdusuario($value){
			 $this->idusuario = $value;
		}

		public function getDeslogin(){
			return $this->idusuario;
		}

		public function setDeslogin($value){
			$this->deslogin = $value;
		}	

		public function getDessenha(){
			return $this->dessenha;
		}

		public function setDessenha($value){
			$this->dessenha = $value;
		}

		public function getDtcadastro(){
			return $this->dtcadastro;
		}

		public function setDtcadastro($value){			
			$this->dtcadastro = $value;
		}

		public function loadById($id){

			$sql =  new Sql();

			$results = $sql->select("SELECT * FROM tb_usuario WHERE idusuario = :ID", array(
					":ID"=>$id
			));
			//verifica se existe id no indice 0
			if (isset($results[0])) 			
				$this->setData($results[0]);
			
		}

		public static function getList(){

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuario ORDER BY idusuario");
		}

		public static function search($login){

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuario WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
				':SEARCH'=>"%" . $login . "%"
			));
		}

		public function login($login, $password){

			$sql = new Sql();
			$results = $sql->select("SELECT * FROM tb_usuario WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
				":LOGIN"=>$login,
				"PASSWORD"=>$password
			));
			if (count($results) > 0) {
				
				$this->setData($results[0]);

			}else{

				throw new Exception("Login e/ou senha inválidos");
				
			}
		}

		public function setData($data){

			$this->setIdusuario($data['idusuario']);
			$this->setDeslogin($data['deslogin']);
			$this->setDessenha($data['dessenha']);
			$this->setDtcadastro(new DateTime($data['dtcadastro']));
		}

		//inserir com procidere erro get
		
		/*public function insert(){

			$sql = new Sql();

		  $sql->query("INSERT INTO tb_usuario (deslogin, dessenha) VALUE(:LOGIN, :PASSOWORD)", array(
				'LOGIN'=>$this->getDeslogin(),
				'PASSOWORD'=>$this->getDessenha()
			));
			
		}*/
		
		public function __construct($login = "", $password= ""){

			$this->setDeslogin($login);
			$this->setDessenha($password);
		}
		
		public function __toString(){

			return json_encode(array(
				"idusuario"=>$this->getIdusuario(),
				"deslogin"=>$this->getDeslogin(),
				"dessenha"=>$this->getDessenha(),
				"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
			));
		}

	}


  ?>