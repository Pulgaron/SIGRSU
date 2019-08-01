<?php   
require_once("../Modelo/puntos.php");
$region = new Puntos_Models();
$get_regiones = $region->get_region();
?>