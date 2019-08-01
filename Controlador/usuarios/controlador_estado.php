<?php
	require_once("../Modelo/usuarios.php");
	$user = new Usuarios_Models();
	return $user->estado($_SESSION["iduser"]);
 ?>
