<?php
$latitud = htmlentities(addslashes($_POST["Latitud"]));
$longitud = htmlentities(addslashes($_POST["Longitud"]));
require_once("../../Modelo/puntos.php");
$set = new Puntos_Models();
$eliminar = $set->eliminar_punto($latitud, $longitud);
header("location:../../Vista/Agregar.html");
?>