<?php

require_once("../../Modelo/puntos.php");
$get = new Puntos_Models();
$get_punto = $get->get_punto($latitud, $longitud);

?>