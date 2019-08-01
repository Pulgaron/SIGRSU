<?php   
require_once("../Modelo/puntos.php");
$acuifero = new Puntos_Models();
$get_acuiferos = $acuifero->get_acuifero();
?>