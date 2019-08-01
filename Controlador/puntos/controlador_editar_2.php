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
$id = $_POST["id"];
require_once("../../Modelo/puntos.php");
$edit = new Puntos_Models();
$edit_punto = $edit->editar_punto($municipio,$latitud,$longitud,$poblados,$cuerpos_agua,$area_natural,$acuifero,$region ,$corriente_aire, $tipo_sitio, $toneladas, $estado, $id);
header("location:../../Vista/Editar.html");
?>