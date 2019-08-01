<?php   
require_once("../Modelo/puntos.php");
$estado = new Puntos_Models();
$get_estados = $estado->get_estado();
?>