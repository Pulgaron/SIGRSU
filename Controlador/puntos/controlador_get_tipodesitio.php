<?php   
require_once("../Modelo/puntos.php");
$sitio = new Puntos_Models();
$get_sitios = $sitio->get_sitio();
?>