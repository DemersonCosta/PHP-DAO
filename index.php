<?php 

	require_once("config.php");

	$root = new Usuario();

	$root->loadbyId(1);

	echo $root;

	/*$sql = new Sql();

	$usuarios = $sql->select("SELECT * FROM tb_usuario");

	echo json_encode($usuarios);*/


 ?>