<?php
	require_once("../Modelo/usuarios.php");
	$user = new Usuarios_Models();
	$datos = $user->my_data($_SESSION["iduser"]);
	foreach ($datos as $usuario) {
		$name = $usuario["Usuario"];
	}
	return $name;
 ?>
