<?php 

	require_once("config.php");

	//Carrega um  unico usuario
	/*$root = new Usuario();
	$root->loadbyId(1);
	echo $root;*/

	//Carrega varios usuarios
	/*$lista = Usuario::getList();
	echo json_encode($lista);*/

	//Carrega uma lista de usuario buscando pelo login
	//$search = Usuario::search("o");
	//echo json_encode($search);

	//carrega um usuario usando login e senha
	/*$usuario = new Usuario();
	$usuario->login("João","2020");
	echo $usuario;*/
	
	/*$aluno = new Usuario("Kênia", "$%$#");
	$aluno->insert();
	echo $aluno;*/

	$usuario = new Usuario();
	$usuario->loadById(8);
	$usuario->update("professor", "1029");

	/*$sql = new Sql();
	$usuarios = $sql->select("SELECT * FROM tb_usuario");
	echo json_encode($usuarios);*/


 ?>