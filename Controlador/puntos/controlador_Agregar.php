<?php
$municipio = htmlentities(addslashes($_POST["Municipio"]));
$latitud = htmlentities(addslashes($_POST["Latitud"]));
$longitud = htmlentities(addslashes($_POST["Longitud"]));
$poblados = htmlentities(addslashes($_POST["Poblados"]));
$cuerpos_agua = htmlentities(addslashes($_POST["Cuerpos_agua"]));
$area_natural = htmlentities(addslashes($_POST["Area_natural"]));
$acuifero = htmlentities(addslashes($_POST["Acuifero"]));
$region = htmlentities(addslashes($_POST["Region"]));
$corriente_aire = htmlentities(addslashes($_POST["corriente_aire"]));
$tipo_sitio = $_POST["Tipo_sitio"];
$toneladas = htmlentities(addslashes($_POST["toneladas"]));
$estado = htmlentities(addslashes($_POST["Estado"]));
require_once("../../Modelo/puntos.php");
$set = new Puntos_Models();
$agregar_punto = $set->insertar_punto($municipio,$latitud,$longitud,$poblados,$cuerpos_agua,$area_natural,$acuifero,$region,$corriente_aire, $tipo_sitio, $toneladas, $estado);
header("location:../../Vista/Agregar.php");
?>

