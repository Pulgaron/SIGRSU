<?php   
require_once("../Modelo/puntos.php");
$municipio = new Puntos_Models();
$get_municipios = $municipio->get_municipio();
?>