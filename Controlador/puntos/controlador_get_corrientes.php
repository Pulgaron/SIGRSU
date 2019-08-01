<?php   
require_once("../Modelo/puntos.php");
$corrientes = new Puntos_Models();
$get_corrientes = $corrientes->get_corriente();
?>